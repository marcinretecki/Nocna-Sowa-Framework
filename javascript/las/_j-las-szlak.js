//
//  Las Szlak
//


function LasSzlak() {
  "use strict";


  //  get methods from the LasHelper
  //  we can add new methods or overwrite old ones
  var las = new LasHelper();


  //
  //  Elements
  //
  las.szlakWrapper =          document.getElementById('szlak-wrapper');
  las.szlak =                 document.getElementById('szlak');
  las.szlakPopUp =            document.getElementById('szlak-post-popup');
  las.szlakPopUpSection =     document.getElementById('szlak-post-popup__section');
  las.navs = {
    basic:                    document.getElementById('section-basic'),
    fonetyka:                 document.getElementById('section-fonetyka'),
    advanced:                 document.getElementById('section-advanced')
  };

  las.popupBtns = {
    przewodnik:               document.getElementById('szlak-btn-przewodnik'),
    wyzwanie:                 document.getElementById('szlak-btn-wyzwanie'),
    sos:                      document.getElementById('szlak-btn-sos')
  };


  las.clickedLevel =          '';


  //
  //  Tu jest duży problemz  dokładaniem nowych sekcji
  //  za każdym razem będzie trzeba ręcznie aktualizować
  //

  las.btns = {
    basic:                    [],
    fonetyka:                 [],
    advanced:                 []
  };

  las.sections = {
    basic:                    [],
    fonetyka:                 [],
    advanced:                 []
  };

  //
  //  State
  //  this prohibits some functions from firing more than once
  //  it's also usefull in debugging
  //
  las.state = {
    clicked:                  false,
    popupUrl:                 '',
    results:                  false
  };



  //
  //  Results
  //
  las.results = {
    expAdded:                 0,
    levelPercentBefore:       0,
    levelPercentNow:          0,
    levelBefore:              0,
    levelNow:                 0
  };


  //
  //  Initiate
  //
  las.init = function() {

    //  get Elements
    this.getBasicElements();

    //  preopen the section
    this.openSectionInit();

    //  prepare
    this.addListener();

    this.preloadShow( this.animateResults );
  };



  //  open section on page load
  //  show user the next chapter they should do
  las.openSectionInit = function() {

    if ( !this.helper.sectionTopOpen ) {
      return;
    }

    //  get elements
    var sectionToMove = document.getElementById( this.helper.sectionTopOpen );
    var btn = document.getElementById( 'btn-' + this.helper.sectionTopOpen );

    window.console.log(sectionToMove);
    window.console.log(btn);
    window.console.log('open section on init');

    //  store level
    this.clickedLevel = this.helper.sectionTopOpen.split('-')[1];

    //  push element to the proper queue
    if ( this.clickedLevel ) {

      this.sections[ this.clickedLevel ].push( sectionToMove );
      this.btns[ this.clickedLevel ].push( btn );

      //  call animation
      this.toggleSection();

    }

  };



  //
  //  Toggle section with chapter links
  //
  las.toggleSection = function() {

    var l = this.sections[this.clickedLevel].length;
    var toShow;
    var toHide;
    var showFn;
    var hideFn;
    var btnToShow;
    var btnToHide;
    var duration;

    var width = document.body.getBoundingClientRect().width;

    //  there is nothing to do
    if ( l === 0 ) {
      window.console.log('nothing to show');
      return;
    }

    window.console.log(l);

    //  if there is something to hide
    if ( l > 1 ) {
      toHide = this.sections[this.clickedLevel].shift();
      btnToHide = this.btns[this.clickedLevel].shift();
    }
    //  only show
    else {
      toHide = false;
      window.console.log('nothing to hide');
    }

    //  get the element to show, but don't remove it from array
    toShow =  this.sections[this.clickedLevel][0];
    btnToShow =  this.btns[this.clickedLevel][0];


    //  if there are results, no need for animation
    if ( las.state.results ) {
      duration = 0;
    }
    else {
      duration = 2 * this.helper.speed;
    }


    showFn = function() {

      //  change the btn
      btnToShow.classList.add('szlak-list__btn--active');
      btnToShow.blur();

      //  animate section
      this.velocity(
        toShow,
        'slideDown',
        { duration: duration, easing: this.helper.easingQuart, display: 'block', queue: false }
      );

    }.bind(this);


    hideFn = function() {

      //  reverse change on btn
      btnToHide.classList.remove('szlak-list__btn--active');
      btnToHide.blur();

      //  animatio section
      this.velocity(
        toHide,
        'slideUp',
        { duration: duration, easing: this.helper.easingQuart, display: 'none' }
      );

    }.bind(this);


    window.console.log(toShow.id.split('-')[2]);


    //  only hide
    if ( ( toHide && ( toShow === toHide ) ) || ( !toShow.id.split('-')[2] ) ) {

      window.console.log('only hide');

      //  hide section
      hideFn();

      //  clear the queue
      this.sections[this.clickedLevel] = [];
      this.btns[this.clickedLevel] = [];

    }
    //  both hide and show
    else if ( toHide ) {

      window.console.log('both show and hide');

      //  hide section and queue show section
      hideFn();
      showFn();

    }
    //  only show
    else {

      window.console.log('only show');

      //  show section
      showFn();

    }

  };




  //
  //  Popup
  //
  las.togglePopup = function() {

    var props;
    var options;
    var data;

    //  if there is no url
    if ( !this.state.popupUrl ) {
      return;
    }

    window.console.log('togglePopup');

    //  if popup is visble
    if ( this.data( this.szlakPopUp, 'visible') ) {

      //  prepare props
      props = [
        { backgroundColorAlpha: 0 },
        { scale: 0 }
      ];
      options = [
        { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, display: 'none' },
        { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
      ];


      //  save data
      data = this.data( this.szlakPopUp, 'visible', false );

    }
    //  if popup is hidden
    else {

      //  set urls
      this.popupBtns.przewodnik.href =  this.state.popupUrl + 'przewodnik/';
      this.popupBtns.wyzwanie.href =    this.state.popupUrl + 'wyzwanie/';
      this.popupBtns.sos.href =         this.state.popupUrl;

      //  prepare props
      props = [
        { backgroundColor: '#3c454c', backgroundColorAlpha: [0.5, 0]  },
        { scale: [1, 0] }
      ];
      options = [
        { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, display: 'block' },
        { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
      ];

      //  save data
      data = this.data( this.szlakPopUp, 'visible', true );
    }


    this.velocity( this.szlakPopUp, props[0], options[0] );
    this.velocity( this.szlakPopUpSection, props[1], options[1] );

  };


  //
  //  Results
  //
  las.animateResults = function() {

    //  no results to show
    if ( this.results.exp === 0 ) {
      return;
    }

    //  prepare elements
    this.animateResultsEls = {

      levelEl:                document.getElementById( 'results-level' ),
      levelLineEl:            document.getElementById( 'results-level__line' ),
      levelNoEl:              document.getElementById( 'results-level__no' ),
      addedExpEl:             document.getElementById( 'results-added-exp' ),
      levelHighlight:         document.getElementById( 'results-level__highlight' )
    };

    //  this.results.expAdded
    //  this.results.levelPercentBefore
    //  this.results.levelPercentNow
    //  this.results.levelBefore
    //  this.results.levelNow

    console.log( '% before: ' + this.results.levelPercentBefore );
    console.log( '% now: ' + this.results.levelPercentNow );
    console.log( 'exp added: ' + this.results.expAdded );
    console.log( 'level before: ' + this.results.levelBefore );
    console.log( 'level now: ' + this.results.levelNow );


    //  the level is same
    if ( this.results.levelNow === this.results.levelBefore ) {

      //  animate %
      this.animateResultsPercent( false );

    }
    //  user got level up
    else if ( this.results.levelNow > this.results.levelBefore ) {

      //  animate to 100%
      this.animateResultsPercent( true, this.animateLevelChange );

    }


    //  animate number
    window.requestAnimationFrame( this.animateExpCount.bind(this) );


  };

  las.animateResultsPercent = function( toHundred, completeFn ) {

    var now = this.results.levelPercentNow;
    var before = this.results.levelPercentBefore;

    if ( typeof completeFn !== 'undefined'  ) {
      completeFn = completeFn.bind(this);
    }
    //  prevent error if the function is not provided
    else {
      completeFn = Function.prototype;
    }

    if ( toHundred ) {
      now = '100%';
    }

    this.velocity(
      this.animateResultsEls.levelLineEl,
      { width: [now ,before ] },
      { duration: 8 * this.helper.speed, easing: this.helper.easingQuart,
        complete: function() {
          completeFn();
        }
      }
    );

  };

  las.animateExpCount = function( timestamp ) {

    //  the same as @animateResultsPercent
    var duration = 8 * this.helper.speed;
    var expToShow;
    var animStateFraction;

    var easeInOutQuart = function(t) {
      return t < 0.5 ? 8*t*t*t*t : 1-8*(--t)*t*t*t
    };

    //  check if start time was previously saved
    if ( !this.helper.startAnimateExpCount ) {
      this.helper.startAnimateExpCount = timestamp;
    }

    //  if the time has not finished, repeat
    if ( ( timestamp - this.helper.startAnimateExpCount ) < duration ) {

      window.requestAnimationFrame( this.animateExpCount.bind(this) );

    }

    animStateFraction = ( timestamp - this.helper.startAnimateExpCount ) / duration;

    //  change by easing
    animStateFraction = easeInOutQuart( animStateFraction );

    //  how much exp to animate now
    expToShow = Math.ceil( animStateFraction * this.results.expAdded );

    //  change inner HTML
    this.animateResultsEls.addedExpEl.innerHTML = expToShow;

    //  time ended, so set it to proper number
    if ( ( timestamp - this.helper.startAnimateExpCount ) >= duration ) {
      this.animateResultsEls.addedExpEl.innerHTML = this.results.expAdded;
    }

  };

  las.animateLevelChange = function() {

    //  set new x%
    var completeFn = function() {
      this.animateResultsEls.levelLineEl.style.width = this.results.levelPercentNow;
      this.animateResultsEls.levelNoEl.innerHTML = 'Rang ' + this.results.levelNow;
    }.bind( this );

    console.log('level change!');

    //  highlight level up
    this.velocity(
      this.animateResultsEls.levelHighlight,
      { opacity: [ 1, 0 ] },
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, display: 'block',
        complete: function() {
          completeFn();
        }
      }
    );


    //  remove highlight
    this.velocity(
      this.animateResultsEls.levelHighlight,
      { opacity: [ 0, 1 ] },
      { duration: 6 * this.helper.speed, easing: this.helper.easingQuart, display: 'none' }
    );


  };


  //
  //  Hide Results
  //
  las.hideResult = function() {

    var resultsWrapper =  document.getElementById('results-wrapper');
    var results =  document.getElementById('results');
    var sectionToMove;
    var btn;
    var chapterToHighlight;

    var highlightWrapper;
    var highlightOne;
    var highlightTwo;

    var highlightFn;


    if ( this.helper.sectionTopOpen ) {
      sectionToMove = document.getElementById( this.helper.sectionTopOpen );
      btn = document.getElementById( 'btn-' + this.helper.sectionTopOpen );
    }

    if ( this.helper.chapterToHighlight ) {
      chapterToHighlight = document.getElementById( this.helper.chapterToHighlight );
    }

    //  if there is a chapter to hightlight, hook value
    if ( chapterToHighlight ) {

      //  create highlight
      highlightWrapper = document.createElement('div');
      highlightOne = document.createElement('div');
      highlightTwo = document.createElement('div');

      highlightWrapper.className = 'highlight';
      highlightOne.className = 'highlight__one';
      highlightTwo.className = 'highlight__two';

      highlightWrapper.appendChild( highlightOne );
      highlightWrapper.appendChild( highlightTwo );
      chapterToHighlight.appendChild( highlightWrapper );

      //  hook velocity
      this.velocity.hook( chapterToHighlight, 'colorRed', '255');
      this.velocity.hook( chapterToHighlight, 'colorBlue', '255');
      this.velocity.hook( chapterToHighlight, 'colorGree', '255');
      this.velocity.hook( chapterToHighlight, 'colorAlpha', '0.5');

      //  hide shadow and arrow
      chapterToHighlight.classList.add( 'szlak-sublist__btn--highlight' );
    }

    //  hide the popup
    this.velocity(
      resultsWrapper,
      { opacity: [0, 1] },
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, display: 'none' }
    );
    this.velocity(
      results,
      { scale: 0 },
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
    );

    //  if there is a chapter to hightlight, animate
    if ( chapterToHighlight ) {

      //  scroll to the next chapter
      this.velocity(
        chapterToHighlight,
        'scroll',
        {
          container: this.szlakWrapper,
          duration: 6 * this.helper.speed,
          offset: -200,
          easing: this.helper.easingQuart,
          delay: this.helper.speed
        }
      );

      //  move the highlight
      highlightFn = function() {

        this.velocity(
          highlightWrapper,
          { left: ['110%', '-20%'] },
          { duration: 3 * this.helper.speed, easing: this.helper.easingQuart, display: 'none' }
        );

      }.bind( this );

      //  highlight the chapter
      this.velocity(
        chapterToHighlight,
        { backgroundColorAlpha: ['0.9', '0'] },
        { duration: 3 * this.helper.speed, easing: this.helper.easingQuart,
          begin: function() {
            highlightFn();
          },
          complete: function() {
            chapterToHighlight.classList.remove( 'szlak-sublist__btn--highlight' );
          }
        }
      );

      //  remove highlight
      this.velocity(
        chapterToHighlight,
        { backgroundColorAlpha: '0', colorAlpha: '1' },
        { duration: 6 * this.helper.speed, easing: this.helper.easingQuart,
          complete: function() {
            //  clean css
            chapterToHighlight.style.cssText = '';
          }
        }
      );

    }

  };



  //
  //  Events
  //
  las.eventHandler = function( event ) {
    //  this decides what happens after each click
    //  @event comes from addListener

    var throttleTimer;
    var sectionToMove;
    var sectionId;
    var elWithHref;

    //  throttle clicks
    if ( this.state.clicked ) {
      return;
    }

    this.state.clicked = true;

    throttleTimer = window.setTimeout(function() {
      this.state.clicked = false;
      window.clearTimeout( throttleTimer );
    }.bind(this), 150);


    window.console.log('click');


    //  traverse up to find the element with href
    elWithHref = this.checkNodeAndParents( event, false, 'href' );

    //  check if it is a link to other page
    if ( elWithHref && ( elWithHref.href.split('#')[0] !== this.helper.currentUrl ) ) {

      //  show loader
      this.showLoader();

      //  stop eventHandler
      event.stopPropagation();
      return;
    }


    //  if href has section id
    if ( elWithHref && elWithHref.href.split('#sublist')[1] ) {

      //  get the id
      sectionId = elWithHref.href.split('#')[1];

      //  get the sectionToMove
      sectionToMove = document.getElementById( sectionId );

      //  store level
      this.clickedLevel = sectionId.split('-')[1];

      window.console.log(this.clickedLevel);

      //  push element to the proper queue
      if ( this.clickedLevel ) {
        this.sections[this.clickedLevel].push( sectionToMove );
        this.btns[this.clickedLevel].push( elWithHref );

        //  call animation
        this.toggleSection();
      }

      //  prevent jerk
      event.preventDefault();
      event.stopPropagation();
      return;

    }


    //  if it is popup link
    if ( elWithHref && ( elWithHref.href.split('#')[1] === 'popup' ) ) {

      window.console.log('click #popup');

      this.state.popupUrl = elWithHref.getAttribute('data-szlak-url');

      this.togglePopup();

      //  stop eventHandler
      event.stopPropagation();
      return;
    }


    //  if it is upsale link
    if ( elWithHref && ( elWithHref.href.split('#')[1] === 'upsale' ) ) {

      window.console.log('click #upsale');

      //this.togglePopup();

      //  stop eventHandler
      event.stopPropagation();
      return;
    }


    //  if it was clicked somewhere on the popup
    if ( ( event.target === this.szlakPopUp )
      || this.checkNodeAndParents(event, this.szlakPopUp ) ) {

      this.togglePopup();

      //  stop eventHandler
      event.stopPropagation();
      return;
    }


    //  if it iwas "wróć na szlak" button
    if ( event.target.id === 'close-result' ) {
      this.hideResult();

      //  stop eventHandler
      event.stopPropagation();
      return;
    }


  };



  //
  //  Listeners
  //
  las.addListener = function() {
    //  assign click and touchstart events to both sections

    window.console.log('add event listener');

    /*this.szlakWrapper.addEventListener('touchend', function(event) {

      this.eventHandler(event);

    }.bind(this), false);*/

    window.addEventListener('click', function(event) {

      //  ignore right click
      if (event.which === 1) {

        this.eventHandler(event);

      }

    }.bind(this), false);


  };


  //  return augmented object
  return las;


}
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
  las.szlakWrapper =       document.getElementById('szlak-wrapper');
  las.szlakSection =       document.getElementById('szlak-section');
  las.szlakPopUp =         document.getElementById('szlak-post-popup');
  las.szlakPopUpSection =  document.getElementById('szlak-post-popup__section');
  las.navs = {
    basic:                      document.getElementById('section-basic'),
    advanced:                   document.getElementById('section-advanced')
  };

  las.popupBtns = {
    przewodnik:                 document.getElementById('szlak-btn-przewodnik'),
    wyzwanie:                   document.getElementById('szlak-btn-wyzwanie'),
    sos:                        document.getElementById('szlak-btn-sos')
  };


  las.clickedLevel =       '';

  las.btns = {
    basic:                  [],
    advanced:               []
  };

  las.sections = {
    basic:                  [],
    advanced:               []
  };

  //
  //  State
  //  this prohibits some functions from firing more than once
  //  it's also usefull in debugging
  //
  las.state = {
    clicked:                  false,
    popupUrl:                 ''
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
    this.hideLoader();


  };


  las.toggleSection = function() {

    var l = this.sections[this.clickedLevel].length;
    var toShow;
    var toHide;
    var showFn;
    var hideFn;
    var btnToShow;
    var btnToHide;
    var navOutFn;
    var navInFn;

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
    window.console.log(toShow);


    showFn = function() {

      //  change the btn
      btnToShow.classList.add('szlak-list__btn--active');
      btnToShow.blur();

      //  animate section
      this.velocity(
        toShow,
        'slideDown',
        { duration: this.helper.speed*2, easing: this.helper.easingQuart, display: 'block', queue: false }
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
        { duration: 2 * this.helper.speed*2, easing: this.helper.easingQuart, display: 'none' }
      );

    }.bind(this);


    navOutFn = function() {

      //this.szlakWrapper.classList.add('szlak-wrapper--faded');

    }.bind(this);


    navInFn = function() {

      //this.szlakWrapper.classList.remove('szlak-wrapper--faded');

    }.bind(this);

    window.console.log(toShow.id.split('-')[2]);


    //  only hide
    if ( ( toHide && ( toShow === toHide ) ) || ( !toShow.id.split('-')[2] ) ) {

      window.console.log('only hide');

      //  move nav back
      navInFn();

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

      //  move nav out
      navOutFn();

      //  show section
      showFn();


    }

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


  las.togglePopup = function() {


    //  TODO
    //  show wyzwanie result
    //  hide wyzwanie if there is none
    //  think more

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


  las.hideResult = function() {

    //  this should be condensed into the togglePopUp

    var szlakResult =  document.getElementById('szlak-result');
    var szlakResultContent =  document.getElementById('szlak-result-content');
    var sectionToMove;
    var btn;
    var chapterToHighlight;

    if ( this.helper.sectionTopOpen ) {
      sectionToMove = document.getElementById( this.helper.sectionTopOpen );
      btn = document.getElementById( 'btn-' + this.helper.sectionTopOpen );
    }

    if ( this.helper.chapterToHighlight ) {
      chapterToHighlight = document.getElementById( this.helper.chapterToHighlight );
    }

    //  if there is a chapter to hightlight, hook value
    if ( chapterToHighlight ) {
      this.velocity.hook( chapterToHighlight, 'opacity', '0.5');
      this.velocity.hook( chapterToHighlight, 'boxShadowBlur', '10px');
    }

    //  hide the popup
    this.velocity(
      szlakResult,
      { backgroundColorAlpha: 0 },
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, display: 'none' }
    );
    this.velocity(
      szlakResultContent,
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

      //  highlight the chapter
      this.velocity(
        chapterToHighlight,
        { opacity: 1 },
        { duration: 3 * this.helper.speed, easing: this.helper.easingQuart }
      );

      //  highlight the chapter
      this.velocity(
        chapterToHighlight,
        { boxShadowBlur: '20px' },
        { duration: 8 * this.helper.speed, loop: 10 }
      );




    }





  };


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
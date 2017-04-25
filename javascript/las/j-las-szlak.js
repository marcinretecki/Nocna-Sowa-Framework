//
//  Las Szlak
//


function LasSzlak() {
  "use strict";


  //  get methods from the LasHelper
  //  we can add new methods or overwrite old ones
  var lasSzlak = new LasHelper();


  //
  //  Elements
  //
  lasSzlak.szlakWrapper =       document.getElementById('szlak-wrapper');
  lasSzlak.szlakSection =       document.getElementById('szlak-section');
  lasSzlak.szlakPopUp =         document.getElementById('szlak-post-popup');
  lasSzlak.szlakPopUpSection =  document.getElementById('szlak-post-popup__section');
  lasSzlak.navs = {
    basic:                      document.getElementById('section-basic'),
    advanced:                   document.getElementById('section-advanced')
  };

  lasSzlak.popupBtns = {
    przewodnik:                 document.getElementById('szlak-btn-przewodnik'),
    wyzwanie:                   document.getElementById('szlak-btn-wyzwanie'),
    sos:                        document.getElementById('szlak-btn-sos')
  };


  lasSzlak.clickedLevel =       '';

  lasSzlak.btns = {
    basic:                  [],
    advanced:               []
  };

  lasSzlak.sections = {
    basic:                  [],
    advanced:               []
  };

  //
  //  State
  //  this prohibits some functions from firing more than once
  //  it's also usefull in debugging
  //
  lasSzlak.state = {
    clicked:                  false,
    popupUrl:                 ''
  };


  //
  //  Initiate
  //
  lasSzlak.init = function() {

    //  get Elements
    this.getBasicElements();

    //  prepare
    this.addListener();
    this.hideLoader();

    //
    //  init powinien wyczajać, która sekcja była otwarta i otwierać ją od razu
    //
  };


  lasSzlak.toggleSection = function() {

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


  lasSzlak.togglePopup = function() {

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


  lasSzlak.hideResult = function() {

    //  this should be condensed into the togglePopUp

    var szlakResult =  document.getElementById('szlak-result');
    var szlakResultContent =  document.getElementById('szlak-result-content');

    this.velocity( szlakResult, { backgroundColorAlpha: 0 }, { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, display: 'none' } );
    this.velocity( szlakResultContent, { scale: 0 }, { duration: 2 * this.helper.speed, easing: this.helper.easingQuart } );


  };


  lasSzlak.eventHandler = function( event ) {
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


  lasSzlak.addListener = function() {
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
  return lasSzlak;


}
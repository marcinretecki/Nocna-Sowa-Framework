//
//  LAS SZLAK
//

function LasSzlak() {
  "use strict";

  //
  //  Elements
  //
  this.szlakWrapper =       document.getElementById('szlak-wrapper');
  this.szlakPopUp =         document.getElementById('szlak-post-popup');
  this.szlakPopUpSection =  document.getElementById('szlak-post-popup');
  this.navs = {
    basic:                  document.getElementById('section-basic'),
    advanced:               document.getElementById('section-advanced')
  };

  this.popupBtns = {
    przewodnik:             document.getElementById('szlak-btn-przewodnik'),
    wyzwanie:               document.getElementById('szlak-btn-wyzwanie'),
    sos:                    document.getElementById('szlak-btn-sos')
  };


  this.clickedLevel =       '';

  this.btns = {
    basic:                  [],
    advanced:               []
  };

  this.sections = {
    basic:                  [],
    advanced:               []
  };

  //
  //  State
  //  this prohibits some functions from firing more than once
  //  it's also usefull in debugging
  //
  this.state = {
    clicked:                  false,
    popupUrl:                 ''
  };


  //
  //  Helper
  //
  var speed =                 200;
  var answersTranformValue =  '300%';
  var easingSpring =          [ 200, 20 ];
  var easingQuart =           'easeInOutQuart';
  var velocity =              Velocity;


  //
  //  Initiate
  //
  this.init = function() {

    //  add listeners
    this.addListener();

    //
    //  init powinien wyczajać, która sekcja była otwarta i otwierać ją od razu
    //
  };


  this.toggleSection = function() {

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


    showFn = function( delay ) {
      //  change the btn
      if (! btnToShow.classList.contains('btn-white') ) {
        btnToShow.classList.remove('btn-dark');
        btnToShow.classList.add('btn-white');
        btnToShow.blur();
      }

      //  set delay
      if ( delay ) {
        delay = 200;
      }
      else {
        delay = 0;
      }

      //  animate section
      velocity(
        toShow,
        'slideDown',
        { duration: speed*2, easing: easingSpring, delay: delay, display: 'block' }
      );

    }.bind(this);


    hideFn = function( completeFn ) {
      //  @completeFn = function || false
      //  @delay = true || false

      //  reverse change on btn
      btnToHide.classList.remove('btn-white');
      btnToHide.classList.add('btn-dark');
      btnToHide.blur();

      //  animatio section
      velocity(
        toHide,
        'slideUp',
        { duration: speed*2, easing: easingQuart, display: 'none',
          complete: function() {
            if ( completeFn ) {
              completeFn();
            }
          }
        }
      );

    }.bind(this);


    navOutFn = function() {

      this.navs[this.clickedLevel].classList.add('las-szlak-section-nav--out');

    }.bind(this);


    navInFn = function() {

      this.navs[this.clickedLevel].classList.remove('las-szlak-section-nav--out');

    }.bind(this);

    console.log(toShow.id.split('-')[2]);


    //  only hide
    if ( ( toHide && ( toShow === toHide ) ) || ( !toShow.id.split('-')[2] ) ) {

      window.console.log('only hide');

      //  move nav back
      navInFn();

      //  hide section
      hideFn(false);

      //  clear the queue
      this.sections[this.clickedLevel] = [];
      this.btns[this.clickedLevel] = [];

    }
    //  both hide and show
    else if ( toHide ) {

      window.console.log('both show and hide');

      //  hide section and queue show section
      hideFn( showFn );

    }
    //  only show
    else {

      window.console.log('only show');

      //  move nav out
      navOutFn();

      //  show section
      showFn(true);


    }

  };


  this.togglePopup = function() {

    var props;
    var options;
    var data;

    //  if there is no url
    if ( !this.state.popupUrl ) {
      return;
    }

    //  if popup is visble
    if ( this.data( this.szlakPopUp, 'visible') ) {

      //  prepare props
      props = { scale: 0, backgroundColorAlpha: 0 };
      options = { duration: speed*2, easing: easingQuart, display: 'none' };

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
      props = { scale: [1, 0], backgroundColor: '#3c454c', backgroundColorAlpha: 0.5  };
      options = { duration: speed*2, easing: easingQuart, display: 'block' };

      //  save data
      data = this.data( this.szlakPopUp, 'visible', true );
    }



    velocity( this.szlakPopUp, props, options );

  };


  this.eventHandler = function( event ) {
    //  this decides what happens after each click
    //  @event comes from addListener

    var throttleTimer;
    var sectionToMove;
    var sectionId;

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

    var popupModify = function(prop){ return prop.split('#')[1] };

    //  if it is popup link
    if ( event.target.href && this.checkNodeAndParents(event, 'popup', 'href', popupModify) ) {

      this.state.popupUrl = event.target.getAttribute('data-szlak-url');

      this.togglePopup();
      return;
    }

    //  if it is a click on popup button
    if ( ( event.target === this.popupBtns.przewodnik ) || ( event.target === this.popupBtns.wyzwanie ) || ( event.target === this.popupBtns.sos ) ) {
      window.console.log('btn');

      //  here (or somewhere else) we can show loading indicator

      return;
    }

    if ( this.checkNodeAndParents(event, this.szlakPopUp ) ) {

      this.togglePopup();
      return;
    }


    //  if href has section id
    if ( event.target.href && event.target.href.split('#section')[1] ) {

      sectionId = event.target.href.split('#')[1];

      //  get the sectionToMove
      sectionToMove = document.getElementById( sectionId );

      //  store level
      this.clickedLevel = sectionId.split('-')[1];

      window.console.log(this.clickedLevel);

      //  push element to the proper queue
      if ( this.clickedLevel ) {
        this.sections[this.clickedLevel].push( sectionToMove );
        this.btns[this.clickedLevel].push( event.target );

        //  call animation
        this.toggleSection();
      }

      //  prevent jerk
      event.preventDefault();
      return;

    }

  };


  this.addListener = function() {
    //  assign click and touchstart events to both sections

    window.console.log('add event listener');

    //  wrapper
    this.szlakWrapper.addEventListener('touchstart', function(event) {

      this.eventHandler(event);

    }.bind(this), false);

    this.szlakWrapper.addEventListener('click', function(event) {

      this.eventHandler(event);

    }.bind(this), false);

  };


}

//
//  Extend with LasHelper methods
//
LasSzlak.prototype = new LasHelper();
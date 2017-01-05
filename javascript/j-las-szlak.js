//
//  LAS SZLAK
//

function LasSzlak() {
  "use strict";

  //
  //  Elements
  //
  this.szlakWrapper =       document.getElementById('szlak-wrapper');
  this.navs =               {
                              basic:      document.getElementById('section-basic'),
                              advanced:   document.getElementById('section-advanced')
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
    clicked:                  false
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
      if (! btnToShow.classList.contains('btn-white') ) {
        btnToShow.classList.remove('btn-dark');
        btnToShow.classList.add('btn-white');
        btnToShow.blur();
      }

      //  animate section
      velocity(
        toShow,
        'slideDown',
        { duration: speed*2, easing: easingSpring }
      );

    }.bind(this);


    hideFn = function( completeFn ) {
      //  reverse change on btn
      btnToHide.classList.remove('btn-white');
      btnToHide.classList.add('btn-dark');
      btnToHide.blur();

      //  animatio section
      velocity(
        toHide,
        'slideUp',
        { duration: speed*2, easing: easingQuart,
          complete: function() {
            if ( completeFn ) {
              completeFn();
            }
          }
        }
      );

    }.bind(this);


    navOutFn = function() {

      velocity(
        this.navs[this.clickedLevel],
        { translateX: [0, '50%'] },
        { duration: speed, easing: easingQuart }
      );

    }.bind(this);


    navInFn = function() {

      velocity(
        this.navs[this.clickedLevel],
        { translateX: '50%' },
        { duration: speed, easing: easingQuart }
      );

    }.bind(this);


    //  only hide
    if ( toHide && ( toShow === toHide ) ) {

      window.console.log('only hide');
      hideFn();

      navInFn();

      //  clear the queue
      this.sections[this.clickedLevel] = [];
      this.btns[this.clickedLevel] = [];

    }
    //  both hide and show
    else if ( toHide ) {

      window.console.log('both show and hide');
      hideFn( showFn );

    }
    //  only show
    else {

      window.console.log('only show');
      showFn();
      navOutFn();

    }

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


    //  check if href has section id
    if ( event.target.href && event.target.href.split('#')[1] ) {

      sectionId = event.target.href.split('#')[1];

      //  get the sectionToMove
      sectionToMove = document.getElementById( sectionId );

      //  check level
      this.clickedLevel = sectionId.split('-')[1];

      window.console.log(this.clickedLevel);

      //  push element to the basic queue
      if ( this.clickedLevel === 'basic' ) {
        this.sections.basic.push( sectionToMove );
        this.btns.basic.push( event.target );
      }
      //  push element to the advanced queue
      else if ( this.clickedLevel === 'advanced' ) {
        this.sections.advanced.push( sectionToMove );
        this.btns.advanced.push( event.target );
      }

      //  call animation
      this.toggleSection();

      //  prevent jerk
      event.preventDefault();
      return false;

    }

  };


  this.addListener = function() {
    //  assign click and touchstart events to both sections

    window.console.log('add event listener');

    this.szlakWrapper.addEventListener('touchstart', function(event) {

      this.eventHandler(event);

    }.bind(this), false);

    this.szlakWrapper.addEventListener('click', function(event) {

      this.eventHandler(event);

    }.bind(this), false);

  };


}
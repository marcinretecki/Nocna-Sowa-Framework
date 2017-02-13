//
//  Las Liczby
//

function LasLiczby() {
  "use strict";


  //
  //  Elements
  //
  this.wrapper =              document.getElementById('liczby');
  this.number =               document.getElementById('number');


  //
  //  Data
  //
  this.words = {
    j:  ['null', 'en', 'to', 'tre', 'fire', 'fem', 'seks', 'sju', 'åtte', 'ni', 'ti', 'elleve', 'tolv', 'tretten', 'fjorten', 'femten', 'seksten', 'sytten', 'atten', 'nitten'],
    d:  ['', '', 'tjue', 'tretti', 'førti', 'femti', 'seksti', 'sytti', 'åtti', 'nitti'],
  };

  //
  //  Audio Data
  //
  this.lasData =              new LasLiczbyData();


  //
  //  Initiate
  //
  this.init = function() {

    //  get Elements
    this.getBasicElements();


    //  Prepare
    this.addListener();
    this.hideLoader();


  };


  //
  //  Create
  //




  //
  //  Helpers
  //

  //  Random number
  this.getRandomNumber = function( option ) {

    var min, max;

    if ( '0' === option ) {
      min = 0;
      max = 19;
    }
    else if ( '20' === option ) {
      min = 20;
      max = 99;
    }
    else {
      min = 1000;
      max = 9999;
    }

    return Math.floor( Math.random() * (max - min + 1) ) + min;

  };


  this.getWords = function( num ) {
    var j = this.words.j;
    var d = this.words.d;
    var r = '';
    var tusen, hundre, ti, en;

    num = num.toString();

    //  do 20
    if (20 > num) {

      if (1 == num) {
        r += 'én / ei / ett<br />(zgodnie z rodzajem)';
      }
      else {
        r += j[num];
      }

    }
    //  do 100
    else if (100 > num) {

      ti = parseInt( num[0] );
      en = parseInt( num[1] );

      r += d[ti];
      if (0 < en) {
        r += j[en];
      }

    }
    //  tysiące
    else {

      tusen = parseInt( num[0] );
      hundre = parseInt( num[1] );
      ti = parseInt( num[2] );
      en = parseInt( num[3] );

      if (1 < tusen) {
        r += j[tusen];
        r += ' ';
      } else if (1 == tusen) {
         r += 'ett ';
      }

      r += 'tusen';

      if (1 < hundre) {
        r += ' ';
        r += j[hundre];
      }
      else if (1 == hundre) {
        r += ' ett';
      }

      if (0 < hundre) {
        r += ' hundre';
      }

      if ( (0 < ti) || (0 < en) ) {
        r += ' og ';
      }

      if (1 == ti) {
        r += j[ti*10 + en];
      }
      else {

        if (0 < ti) {
          r += d[ti];
        }

        if  (0 < en) {
          r += j[en];
        }

      }

    }

    return r;

  };


  this.eventHandler = function( event ) {
    //  this decides what happens after each click
    //  @event comes from addListener

    var throttleTimer;

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


    if () {
      //  do sth
    }

    event.preventDefault();
    return false;

  };

  this.addListener = function() {
    //  assign click and touchstart events to the wrapper

    window.console.log('add event listener');

    this.wrapper.addEventListener('click', function(event) {

      //  ignore right click
      if (event.which === 1) {

        this.eventHandler(event);

      }

    }.bind(this), false);

  };



}


//
//  Extend with LasHelper methods
//
LasLiczby.prototype = new LasHelper();




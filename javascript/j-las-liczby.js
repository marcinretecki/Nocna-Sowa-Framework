//
//  Las Liczby
//

function LasLiczby() {
  "use strict";


  //
  //  Elements
  //
  this.wrapper =              document.getElementById('liczby');
  this.audioMsgWrapper =      document.getElementById('audio-msg-wrapper');
  this.audioMsg =             document.getElementById('audio-msg');
  this.number =               document.getElementById('number');
  this.audioControls =        document.getElementById('audio-controls');
  this.audioMore =            document.getElementById('audio-more');
  this.audioNext =            document.getElementById('audio-next');
  this.audioRewind =          document.getElementById('audio-rewind');


  //
  //  Data
  //
  this.words = {
    j:                        ['null', 'en', 'to', 'tre', 'fire', 'fem', 'seks', 'sju', 'åtte', 'ni', 'ti',
                               'elleve', 'tolv', 'tretten', 'fjorten', 'femten', 'seksten', 'sytten', 'atten', 'nitten'],
    d:                        ['', '', 'tjue', 'tretti', 'førti', 'femti', 'seksti', 'sytti', 'åtti', 'nitti'],
  };

  //
  //  Audio Data
  //
  this.lasData =              new LasLiczbyData();

  this.msg =                  '';
  this.num =                  0;
  this.answersData =          [];


  //
  //  State
  //  this prohibits some functions from firing more than once
  //  it's also usefull in debugging
  //
  this.state = {
    controls:                 false,

  };


  //
  //  Initiate
  //
  this.init = function() {

    //  get Elements
    this.getBasicElements();

    //  Prepare
    this.addListener();
    this.hideLoader();

    //  get intro
    this.getIntro();
    this.showMsg();
    this.showControls();

  };


  //
  //  Create
  //
  this.getIntro = function() {

    window.console.log( 'show intro' );

    this.msg = this.lasData.intro.msg;

  };

  this.getNewNumber = function() {

    window.console.log( 'get new number' );


    //  reset everything
    this.resetMsg();
    this.resetNum();
    this.resetControls();

    this.getRandomNumber( 20 );

    this.showNum();

  };


  //
  //  MESSAGE
  //
  this.showMsg = function() {
    var beginFn;

    //  we do not check state here, because we want to use Velocity chaining
    //  but we need to check if there is a msg to show
    if ( !this.msg ) {
      return false;
    }

    this.state.msg = true;

    window.console.log('show msg');

    this.audioMsg.innerHTML = this.msg;

  };


  this.resetMsg = function() {
    //  hide the msg

    var completeFn;

    window.console.log('try resetMsg ');
    window.console.log('msg state ' + this.state.msg);

    //  if there was no msg
    if ( !this.state.msg ) {
      return false;
    }

    //  if user clicked fast enough, showMsg could not finish, then we need to stop animation
    this.velocity(
      this.audioMsgWrapper,
      'stop'
    );

    window.console.log('reset msg');

    this.state.msg = false;

    this.audioMsg.innerHTML = '';

  };


  this.waitForMsg = function() {

    //  if timer is already set
    if ( this.waitForMsgTimer ) {
      return false;
    }

    //  wait until msg is reset
    if ( this.state.msg ) {

      window.console.log('set waitForMsg timer');

      this.waitForMsgTimer = window.setTimeout(function() {

        window.clearTimeout(this.waitForMsgTimer);
        this.waitForMsgTimer = undefined;

        this.waitForMsg();

      }.bind(this), 100);

      return false;

    }

    //  show msg
    this.showMsg();

  };

  //
  //  CONTROLS
  //
  this.showControls = function() {

    //  if controls are already in
    //  or there is no time && no more && it is not before the first play
    if (        this.state.controls
          || ( !this.more && ( this.startTime < 0 ) && !this.state.beforeFirstPlay && ( this.bubbleAutoNext !== 'RANDOM' ) )
          || ( !this.msg && !this.answersData.length ) ) {
      return false;
    }

    this.state.controls = true;

    window.console.log('show controls');

    //  if there are answers, we want to match the color to them
    if ( this.state.answers ) {
      this.audioControls.className = 'section-green';
    }
    else {
      this.audioControls.className = 'section-dark';
    }

    //  show the whole controls bar
    this.velocity(
      this.audioControls,
      'slideDown',
      { duration: this.helper.speed*2, easing: this.helper.easingSpring }
    );

    //  below, each this.velocity call need display: block, or buttons will be showed as inline-block

    //  if there is more audio, show MORE button
    if ( ( this.more !== null ) && this.audioFile ) {
      window.console.log('show more button');

      this.velocity(
        this.audioMore,
        'fadeIn',
        { duration: this.helper.speed, easing: this.helper.easingQuart, display: 'block', delay: this.helper.speed }
      );
    }

    //  if there is time, show REWIND
    if ( ( this.startTime >= 0 ) && this.audioFile  ) {
      window.console.log('show rewind button');

      this.velocity(
        this.audioRewind,
        'fadeIn',
        { duration: this.helper.speed, easing: this.helper.easingQuart, display: 'block', delay: this.helper.speed }
      );
    }

    //  if there are no answers, we need NEXT button
    if ( !this.answersData.length ) {
      this.velocity(
        this.audioNext,
        'fadeIn',
        { duration: this.helper.speed, easing: this.helper.easingQuart, display: 'block', delay: this.helper.speed }
      );
    }

  };


  this.resetControls = function() {
    var completeFn;

    //  if there was no controls
    if ( !this.state.controls ) {
      return false;
    }

    //  reset the state instantly, so it doesn't trigger again
    //  this way it can also use Velocity's queue
    this.state.controls = false;

    window.console.log('reset controls');

    //  hide the whole controls element
    this.velocity(
      this.audioControls,
      'slideUp',
      { duration: this.helper.speed*2, easing: this.helper.easingQuart }
    );

    //  hide MORE
    this.velocity(
      this.audioMore,
      'fadeOut',
      { duration: this.helper.speed*2, easing: this.helper.easingQuart }
    );

    //  hide REWIND
    this.velocity(
      this.audioRewind,
      'fadeOut',
      { duration: this.helper.speed*2, easing: this.helper.easingQuart }
    );

    //  hide NEXT
    this.velocity(
      this.audioNext,
      'fadeOut',
      { duration: this.helper.speed*2, easing: this.helper.easingQuart }
    );

  };


  //
  //  Number
  //
  this.showNum = function() {

    this.number.innerHTML = this.num;

  };


  this.resetNum = function() {

    this.number.innerHTML = '';

  };


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

    this.num =  Math.floor( Math.random() * (max - min + 1) ) + min;

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


  //
  //  Helpers
  //
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


    //  if controls are inactive, don't allow the below from testing
    if ( !this.state.controls ) {
      return;
    }

    if ( ( event.target.id === 'audio-rewind' ) || ( event.target.parentNode.id === 'audio-rewind' ) ) {

      //  tu  możemy rozdzielić state na more i rewind, wtedy każde będzie działało osobono zamiast pauzować drugie

      //  if it is playing now, pause it
      if ( this.state.playing ) {
        this.pauseAudio();
      }
      else {
        this.rewindAudio();
      }

    }
    else if ( ( event.target.id === 'audio-next' ) || ( event.target.parentNode.id === 'audio-next' ) ) {
      //  next

      //  get new number
      this.getNewNumber();

    }
    else if ( ( event.target.id === 'audio-more' ) || ( event.target.parentNode.id === 'audio-more' ) ) {
      //  play more

      //  if it is playing now, pause it
      if ( this.state.playing ) {
        this.pauseAudio();
      }
      else {
        this.playMore();
      }
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




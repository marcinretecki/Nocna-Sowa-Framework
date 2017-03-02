//
// Las JavaScript
//


//
//  Helper object that contains methods used by other Las's objects
//
function LasHelper() {
  "use strict";

  //
  //  Helper
  //
  this.helper = {};

  var self = this;


  //
  //  Get basic elements
  //
  this.getBasicElements = function() {

    this.loader =                         document.getElementById('loader');
    this.nav =                            document.getElementById('las-nav');

    //  Velocity
    this.velocity =                       Velocity;

    //  assign helper
    this.helper = {
      speed:                              200,
      answersTranformValue:               '300%',
      easingSpring:                       [ 200, 20 ],
      easingQuart:                        'easeInOutQuart',
      currentUrl:                         window.location.href.split('#')[0]
    };




    //  remove loader when user clicks back button
    window.addEventListener('unload', function(event) {

      this.hideLoader();
      window.console.log('unload');

    }.bind(this), false);


    this.nav.addEventListener('click', function(event) {

      //  ignore right click
      if (event.which === 1) {

        this.navEventHandler(event);

      }

    }.bind(this), false);

  };


  //
  //  NAV
  //
  this.navEventHandler = function( event ) {

    window.console.log('navEventHandler');

    var elWithHref;

    //  traverse up to find the element with href
    elWithHref = this.checkNodeAndParents( event, false, 'href' );

    if ( ( elWithHref.id === 'las-nav-btn-sos' ) || ( elWithHref.id === 'las-nav-btn-szlak' ) ) {

      //  show loader
      this.showLoader();

    }

  };

  //
  //  Save progress
  //  First save progress as a cookie
  //  When user browses back to the list, cookie progress is saved to database (by PHP)
  //  @return object with one method plusOne()
  //
  this.lasSaveChallangeProgress = function() {

    var newCookie = {};
    var saveChallangeProgress = {};

    //  use self or it will point to the wrong this
    var chapter = self.helper.chapter;

    //
    //  Private functions
    //
    function getCookie() {
      return Cookies.getJSON('lasChallangeProgress');
    }

    function setCookie(value) {
      Cookies.set('lasChallangeProgress', value, { expires: 365 });
    }

    function cleanCookie() {
      Cookies.remove('lasChallangeProgress');
    }

    //
    //  Public function
    //
    saveChallangeProgress.plusOne = function() {
      var cookie = getCookie();

      if ( ( cookie !== undefined ) && ( cookie[ chapter ] !== undefined ) ) {
        //  if we have already this cookie

        newCookie = cookie;
        newCookie[ chapter ] = newCookie[ chapter ] * 1 + 1;  // * 1 converts it to integer
      }
      else {
        //  if we don't have such cookie
        newCookie[ chapter ] = 0;
      }

      setCookie(newCookie);
    };

    return saveChallangeProgress;

  }();


  //
  //  Function to create array of bubbles with '1'
  //  @parameter data is feeded in init() with data files by objects making exercises
  //  @return array of first keys in the series of bubbles
  //
  this.getRandomArrayOfFirstBubbles = function( data ) {
    var property,
        propArray = [];

    //  Push first items
    for (property in data) {
      if (data.hasOwnProperty(property) && ( property.slice(-1) === '1' ) ) {
        // if it is own property and last letter is '1'

        propArray.push(property);

      }
    }

    propArray = this.shuffleArray(propArray);

    return propArray;
  };


  this.shuffleArray = function(propArray) {
    //  Fisher-Yates Shuffle

    var counter = propArray.length,
        index,
        temp;

    //  While there are elements in the propArray
    while (counter > 0) {
      //  Pick a random index
      index = Math.floor(Math.random() * counter);

      //  Decrease counter by 1
      counter--;

      //  And swap the last element with it
      temp = propArray[counter];
      propArray[counter] = propArray[index];
      propArray[index] = temp;
    }

    return propArray;
  };


  //
  //  Data bubbles
  //
  this.getRandomBubble = function() {
    window.console.log( 'getRandomBubble');
    window.console.log( this.randomChatArray.length );

    if (this.randomChatArray.length > 0 ) {
      //  if there are still chat items to show

      //  add one to progress progress
      this.lasSaveChallangeProgress.plusOne();

      //  pop data and return the object
      var pop = this.lasData.chat[ this.randomChatArray.pop() ];
      return pop;

    }
    else {
      //  Set state
      this.state.currentState = 'END';

      return this.getEndBubble();
    }

  };


  this.getIntroBubble = function() {
    window.console.log( 'getIntroBubble');
    var pop = this.lasData.intro[ this.randomIntroArray.pop() ];

    //  Set state
    this.state.currentState = 'INTRO';

    //  Return bubble
    return pop;

  };


  this.getEndBubble = function() {
    window.console.log( 'getEndBubble' );
    var pop = this.lasData.end[ this.randomEndArray.pop() ];
    //  Return bubble
    return pop;

  };


  this.getNextBubble = function(no) {

    var data;

    if ( ( this.state.currentState === 'INTRO' ) && ( no !== '' )  && ( no !== 'ENDINTRO' ) ) {
      //  if it is intro and we need next bubble
      window.console.log('if it is intro and we need next bubble');
      data = this.lasData.intro[ no ];

    } else if ( ( no === 'INTRO' ) ) {
      //  if it is intro and we need first bubble
      window.console.log('if it is intro and we need first bubble');
      data = this.getIntroBubble();

    }
    else if ( no === 'ENDINTRO' ) {
      //  if it is the end of intro,  move one to chat
      window.console.log('if it is the end of intro,  move one to chat');
      //  Set state
      this.state.currentState = 'CHAT';
      data = this.getRandomBubble();

    }
    else if ( ( this.state.currentState === 'CHAT' ) && ( no === 'RANDOM' ) ) {
      //  if we are at the chat, move one
      window.console.log('if we are at the chat, move one');
      data = this.getRandomBubble();

    }
    else if ( ( this.state.currentState === 'CHAT' ) && ( no !== '' ) ) {
      //  if we are at chat, but need exact bubble
      window.console.log('if we are at chat, but need exact bubble');
      data = this.lasData.chat[ no ];

    }
    else if ( this.state.currentState === 'END' ) {
      //  if we got to the end and need an exact bubble
      window.console.log('if we got to the end and need an exact bubble');
      data = this.lasData.end[ no ];
    }

    window.console.log('No: ' + no);
    window.console.log('Data:');
    window.console.log(data);


    //  Assign data
    //  Method available at subObject
    this.assignBubbleData(no, data);

  };


  //
  //  LOADER
  //
  this.hideLoader = function() {

    window.console.log('hide loader');

    this.velocity(
      this.loader,
      'fadeOut',
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
    );
  };


  this.showLoader = function() {

    window.console.log('show loader');

    this.velocity(
      this.loader,
      'fadeIn',
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
    );
  };


  //
  //  PAUSE TIMER
  //
  this.pauseTimer = function(duration) {

    /*! SVG Pie Timer 0.9.1 | Anders Grimsrud, grint.no | MIT License | github.com/agrimsrud/svgPieTimer.js */
    //  Modified

    var loader;
    var n;
    var end;
    var totaldur;
    var frame;

    if (this.pauseTimerAnimationFrame !== undefined) {
      cancelAnimationFrame(this.pauseTimerAnimationFrame);
      this.pauseTimerAnimationFrame = undefined;
    }

    Date.now = Date.now || function() { return +new Date; };

    loader = document.getElementById('circle');
    n = 1;

    function draw(rate) {
        var angle = 360 * rate;

        angle %= 360;

        var rad = (angle * Math.PI / 180),
            x = Math.sin(rad) * 40,
            y = Math.cos(rad) * - 40,
            mid = (angle > 180) ? 1 : 0,
            shape = 'M 0 0 v -40 A 40 40 1 '
                   + mid + ' 1 '
                   +  x  + ' '
                   +  y  + ' z';

        loader.setAttribute('d', shape);
    }


    end = Date.now() + duration * n;
    totaldur = duration * n;

    // Animate frame by frame

    frame = function() {
        var current = Date.now(),
            remaining = end - current,

            // Now set rotation rate
            // E.g. 50% of first loop returns 1.5
            // E.g. 75% of sixth loop returns 6.75
            // Has to return >0 for SVG to be drawn correctly
            // If you need the current loop, use Math.floor(rate)

            rate = n + 1 - remaining / duration;

        // As requestAnimationFrame will draw whenever capable,
        // the animation might end before it reaches 100%.
        // Let's simulate completeness on the last visual
        // frame of the loop, regardless of actual progress

        if(remaining < 60) {

            // 1.0 might break, set to slightly lower than 1
            // Update: Set to slightly lower than n instead

            draw(n - 0.0001);


            // Stop animating when we reach n loops (if n is set)

            if ( remaining < totaldur && n ) {
              return;
            }
        }

        // Draw

        draw(rate);

        // Request next frame

       this.pauseTimerAnimationFrame = requestAnimationFrame(frame);

    }.bind(this);

    frame();

  };


  //
  //  DATA
  //
  this.expando = "las" + ( new Date().getTime() );

  this.data = function(node, key, value) {
    //  function adapted from Velocity.js

    //  get data
    if ( value === undefined ) {

      //  if there is not data in node
      if ( node[this.expando] === undefined ) {

        return false;

      }

      //  if key is not provided, return alla data
      if ( key === undefined ) {

        return node[this.expando];

      }
      //  if there is key, return it's value
      else {

        if ( key in node[this.expando] ) {
          return node[this.expando][key];
        }

      }

    }
    //  set data
    else if ( key !== undefined ) {

      //  check if object exists
      if ( typeof node[this.expando] !== "object" ) {

        node[this.expando] = {};

      }

      //  store value
      node[this.expando][key] = value;

      return value;
    }

  };



  //
  //  Encode special character from the bubble
  //  it has return
  //
  this.encodeBubble = function( bubbleString ) {

    //  EMOJI
    //  <svg class="emojione-svg emojione-svg--text"><use xlink:href="/las/c/i/emojione.sprites.svg#emoji-1f58a"></use></svg>
    //  #emoji-1f58a;

    var bubbleArray = bubbleString.split('#');
    var bubbleArrayL = bubbleArray.length;
    var subArray;
    var newString;
    var i;


    //  if bubbleArray has only one element, emotes were not found
    if ( 2 > bubbleArray.length ) {
      return bubbleString;
    }

    //  iteriate over the array
    //  start from 1, becuae 0 has no emoji
    for ( i = 1; i < bubbleArrayL; i++ ) {

      //  check if it is emoji
      if ( bubbleArray[i].indexOf('emoji') !== -1 ) {

        //  split again to get only emoji
        subArray = bubbleArray[i].split(';');

        //  check if there was ';'
        if ( 1 < subArray.length ) {

          //  replace this part with svg
          subArray[0] = '<svg class="emojione-svg emojione-svg--text"><use xlink:href="/las/c/i/emojione.sprites.svg#' + subArray[0] + '"></use></svg>';

        }

        //  join back subArray
        bubbleArray[i] = subArray.join('');

      }
      //  there is no emoji
      else {
        //  join back subArray and put back #
        bubbleArray[i] = subArray.join('#');
      }


    }

    //  join all parts back
    newString = bubbleArray.join('');

    return newString;


  };



  //
  //  Traversing
  //
  this.checkNodeAndParents = function( event, value, prop, modify ) {
    //  @event
    //  @value is the thing to check
    //  @prop optional, can be href, id or other property of the @node
    //  @mod optional function to modify prop before checking

    var nodeToCheck =   event.target;
    var wrapper =       event.currentTarget;
    var thingToCheck;
    var i =             0;

    //  while the traverse has not reached the wrapper
    //  or it has checked 5 direct parents
    while ( ( nodeToCheck !== wrapper ) && ( i < 5 ) ) {

      //window.console.log(value);
      //window.console.log(nodeToCheck);
      //window.console.log(prop);

      //  if there is prop
      if ( prop !== undefined ) {

        thingToCheck = nodeToCheck[prop];

        //  if we need to modify prop
        if ( thingToCheck && ( modify !== undefined ) ) {
          //window.console.log(modify);
          thingToCheck = modify(thingToCheck);
        }
      }
      else {
        thingToCheck = nodeToCheck;
      }

      //window.console.log(thingToCheck);

      //  if there is no value to check
      //  check if the thing exists
      if ( thingToCheck && ( value === false ) ) {
        return nodeToCheck;
      }
      //  if it is the same
      else if ( thingToCheck && ( thingToCheck === value ) ) {
        return nodeToCheck;
      }

      //  else, traverse to the parent
      nodeToCheck = nodeToCheck.parentNode;

      window.console.log('traverse up');

      //  count traverses, so we don't check all the divs
      i++;
    }

    //  haven't found anything
    return false;

  };


  //
  //  AUDIO
  //

  //  not only plays the file at specific time but also sets the autoPause
  //  uses @this.audioTimes
  this.playAudio = function() {

    var startTime = this.audioTimes[0];

    if ( this.state.playing || ( startTime < 0 ) || !this.audioFile ) {
      return;
    }

    //  reset listeners
    this.resetAudioListeners();

    //  unmute just in case
    this.audioFile.muted = false;

    //  try to set the time and play
    try {
      //  set the current time
      this.audioFile.currentTime = startTime;

      this.playAudioListener = function() {
        this.autoPauseAudio();
      }.bind(this);

      //  add pause listener
      this.audioFile.addEventListener('timeupdate', this.playAudioListener, false);

      //  show spinner
      this.showSpinner();

      window.console.log('play ' + this.audioFile.currentTime);

      //  play the file
      this.state.playing = true;
      this.audioFile.play();
    }
    //  if the audio is not loaded
    catch (e) {
      window.console.log('can not set time or play');

      this.loadAudioFile();
    }


  };


  this.rewindAudio = function() {
    //  If the user want to listen to it again

    if ( !this.audioFile ) {
      return;
    }

    window.console.log('rewind');

    //  pause
    this.pauseAudio();

    //  play again
    this.playAudio();

  };


  //  automaticaly pause
  //  uses @this.audioTimes
  this.autoPauseAudio = function() {
    //  before pause, call prePause
    //  when the time finishes, pause playback and call atPause

    //  the eventListener guarantees accuracy up to one second,
    //  but half a second should be enough to begin animation
    //  so it finishes together with the playback

    var stopTime = this.audioTimes[1];
    var pauseTime = this.audioTimes[2];

    //  prePause
    //  half a second before the end of audio
    if ( ( this.audioFile.currentTime + 0.5 > stopTime ) && this.state.prePause ) {

      //  prevent prePause from firing too many times
      this.state.prePause = false;

      //  if there is a pause and the prePauseTimer is not yet set
      if ( ( pauseTime > 0 ) && !this.prePauseTimer ) {

        window.console.log('set prePauseTimer');

        //  set prePauseTimer
        this.prePauseTimer = window.setTimeout(function() {

          window.clearTimeout(this.prePauseTimer);
          this.prePauseTimer = undefined;
          this.prePause();

        }.bind(this), (pauseTime * 1000) );

      }
      //  if there is no pause
      else if ( pauseTime < 0 ) {

        this.prePause();

      }

    }

    //  at the end of audio
    if ( this.audioFile.currentTime > stopTime ) {

      //  reset listener
      this.resetAudioListeners();

      // pause
      this.pauseAudio();
      window.console.log('auto pause!');

      //  if there is a pause and the atPauseTimer is not yet set
      if ( ( pauseTime > 0 ) && !this.atPauseTimer ) {

        window.console.log('set atPauseTimer');

        //  set atPauseTimer
        this.atPauseTimer = window.setTimeout(function() {

          window.clearTimeout(this.atPauseTimer);
          this.atPauseTimer = undefined;
          this.atPause();

        }.bind(this), (pauseTime * 1000) );

        //  show skip button
        this.showSkipButton();

      }
      //  if there was no pause time
      else if ( pauseTime < 0 ) {

        this.atPause();

      }

    }

  };



  this.skipPauseTimers = function() {
    //  if the user doesn;t want to wait
    //  she can skip the pause timers

    if ( this.atPauseTimer === undefined ) {
      return false;
    }

    window.console.log('skipPauseTimers');

    //  reset the skip button, first arg means NOW
    this.resetSkipButton( true );

    //  reset pre pause timer
    window.clearTimeout(this.prePauseTimer);

    this.prePauseTimer = undefined;

    //  call prePause
    this.prePause();

    //  reset at pause timer
    window.clearTimeout(this.atPauseTimer);

    this.atPauseTimer = undefined;

    //  give a bit of breathing time for the animations to get going
    //  I know the name is ridiculous...
    this.skipPauseTimersTimer = window.setTimeout(function() {

      window.clearTimeout( this.skipPauseTimersTimer );

      this.skipPauseTimersTimer = undefined;

      this.atPause();

    }.bind(this), 200);


  };


  this.pauseAudio = function() {
    //  simple as that

    if ( !this.audioFile ) {
      return;
    }

    //  pause audio
    this.audioFile.pause();

    //  reset state
    this.state.playing = false;

    //  reset spinner
    this.resetSpinner();

  };


  this.resetAudioListeners = function() {

    if ( !this.audioFile ) {
      return;
    }

    // remove play listener
    this.audioFile.removeEventListener('timeupdate', this.playAudioListener, false);
    this.playAudioListener = undefined;

  };


  //
  //  LOAD FILE
  //
  this.loadAudioFile = function() {

    var force;
    var progress;

    window.console.log('loadAudioFile');

    //  pause immitiately when the play starts and remove listener
    force = function() {

      window.console.log('force');
      this.audioFile.pause();
      this.audioFile.removeEventListener('play', force, false);

    }.bind( this );

    //  when the progress fires, we can seek the audio file and set the time for playback
    progress = function () {

      window.console.log('progress');

      //  remove its listener
      this.audioFile.removeEventListener('progress', progress, false);

      //  trigger the playback again
      this.state.playing = false;
      this.playAudio();

    }.bind( this );

    this.audioFile.addEventListener( 'play', force, false );
    this.audioFile.addEventListener( 'progress', progress, false );

    //  play and trigger events
    this.audioFile.play();

  };



  //
  //  Test mode audio
  //
  this.playAudioTestMode = function(startTime, stopTime) {

    var pauseTimer;

    if ( !this.audioFile ) {
      return;
    }

    if ( startTime === 0 ) {
      startTime = 0.01;
    }

    console.log(this);

    try {
      //  set the current time
      this.audioFile.currentTime = startTime;

      this.audioFile.play();
    }
    //  if the audio is not loaded
    catch (e) {
      window.console.log('can not set time or play');

      this.loadAudioFile();
    }

    pauseTimer = window.setTimeout(function() {

      window.clearTimeout(pauseTimer);
      pauseTimer = undefined;
      this.audioFile.pause();

    }.bind(this), (stopTime - startTime) * 1000 );


  };





}




// @codekit-append 'j-las-szlak.js';
// @codekit-append 'j-las-chat.js';
// @codekit-append 'j-las-audio-test.js';
// @codekit-append 'j-las-liczby.js';
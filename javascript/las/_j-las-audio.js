//
//  AUDIO
//

(function() {

  //
  //  Check if there is a correct audioStack
  //  @return true or false
  //
  LasHelper.prototype.isCorrectAudioStack = function() {

    var stack = this.audioStack.stack;
    var stackL;
    var i;
    var audioObject;

    //  no stack
    if ( !stack ) {
      return false;
    }

    stackL = this.audioStack.stack.length;

    //  stack is empty
    if ( stackL === 0 ) {
      return false;
    }

    //  check each object in stack
    for ( i = 0; stackL > i; i++ ) {

      audioObject = stack[i];

      this.isCorrectAudioObject( audioObject );

    }

    return true;

  };



  //
  //  Check if audio object is correct
  //  @return true or false
  //
  LasHelper.prototype.isCorrectAudioObject = function( audioObject ) {

    if ( !audioObject ) {
      return false;
    }

    if ( !audioObject.hasOwnProperty('startTime') || ( typeof audioObject.startTime !== 'number' ) || ( audioObject.startTime < 0 ) ) {
      return false;
    }

    if ( !audioObject.hasOwnProperty('duration') || !audioObject.duration || ( typeof audioObject.startTime !== 'number' ) || ( audioObject.duration < 0 ) ) {
      return false;
    }

    return true;

  };



  //
  //  Create new audioObject
  //  @return audioObject or false
  //
  LasHelper.prototype.createNewAudioObject = function( data ) {

    if ( !this.isCorrectAudioObject( data ) ) {
      return false;
    }

    var audioObject = {};

    audioObject.startTime = data.startTime;
    audioObject.duration = data.duration;

    //  fix the problem with time 0
    if ( audioObject.startTime === 0 ) {
      audioObject.startTime = 0.01;
    }

    window.console.log('Start time: ' + audioObject.startTime + ' Duration: ' + audioObject.duration);

    //  if there is pause time
    if ( data.hasOwnProperty('pauseTime') ) {
      audioObject.pauseTime = this.currentBubbleData.pauseTime;
    }

    return audioObject;

  };



  //
  //  Play Audio
  //  set the autoPause
  //
  LasHelper.prototype.playAudio = function() {

    //  already playing or no file
    if ( this.state.playing || !this.audioFile ) {
      return;
    }

    //  single audio object
    if ( this.isCorrectAudioObject( this.currentAudioObject ) ) {

      //  play the single object
      this.playSingleAudio( this.currentAudioObject );

    }
    //  if there is no object, check the stack
    else if ( this.isCorrectAudioStack() ) {

      //  loop the stack
      this.loopAudioStack();

    }
    //  no audio data
    else {
      return;
    }

  };



  //
  //  play audio from single object
  //
  LasHelper.prototype.playSingleAudio = function( audioObject ) {

    var startTime;
    var stopTime;
    var pauseTime;

    //  if no audioObject or start time
    if ( !this.isCorrectAudioObject( audioObject ) ) {
      return;
    }

    startTime = audioObject.startTime;
    stopTime = audioObject.startTime + audioObject.duration;

    if ( audioObject.pauseTime ) {
      pauseTime = audioObject.pauseTime;
    } else {
      pauseTime = 0;
    }


    //  assign file duration if it wasn't assigned yet
    if ( this.helper.audioFileDuration === -1 ) {
      this.helper.audioFileDuration = this.audioFile.duration;
    }

    if ( stopTime > this.helper.audioFileDuration ) {
      window.console.log('stopTime > duration, can not play');
      return;
    }


    window.console.log('play single audio');


    //  reset listeners
    this.resetAudioListeners();

    //  unmute just in case
    this.audioFile.muted = false;

    window.console.log('prePause: ' + this.state.prePause);

    //  try to set the time and play
    try {

      //  set the current time
      this.audioFile.currentTime = startTime;


      this.playAudioListener = function() {
        //  before pause, call prePause
        //  when the time finishes, pause playback and call atPause

        //  the eventListener guarantees accuracy up to one second,
        //  but half a second should be enough to begin animation
        //  so it finishes together with the playback

        //
        //  if prePause
        //  half a second before the end of audio
        //
        if ( this.state.prePause && ( this.audioFile.currentTime + 0.5 >= stopTime ) ) {

          //  prevent prePause from firing again
          this.state.prePause = false;

          //  if there is a pause and the prePauseTimer is not yet set
          if ( pauseTime && ( pauseTime > 0 ) && !this.prePauseTimer ) {

            window.console.log('set prePauseTimer');

            //  set prePauseTimer
            this.prePauseTimer = window.setTimeout(function() {

              window.clearTimeout(this.prePauseTimer);
              this.prePauseTimer = undefined;
              this.prePause();

            }.bind(this), (pauseTime * 1000) );

          }
          //  if there is no pause
          else if ( !pauseTime ) {

            this.prePause();

          }

        }

        //  at the end of audio
        if ( this.audioFile.currentTime >= stopTime ) {

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
            this.showSkipButton( pauseTime );

          }
          //  if there was no pause time
          else if ( !pauseTime || ( pauseTime < 0 ) ) {

            this.atPause();

          }

        }

      }.bind(this);


      //  add pause listener
      this.audioFile.addEventListener('timeupdate', this.playAudioListener, false);

      //  show spinner
      this.showSpinner();

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



  //
  //  loop over audio stack
  //
  LasHelper.prototype.loopAudioStack = function() {

    var stack;
    var pointer;

    //  if no stack or stack is wrong
    if ( !this.isCorrectAudioStack() ) {
      return;
    }

    stack = this.audioStack.stack;
    pointer = this.audioStack.pointer;

    window.console.log('audio loop, no: ' + pointer );

    //  is there more in the stack?
    //  array begin on 0, but length shows 1, therefore +1 on pointer
    if ( stack.length > ( pointer + 1 ) ) {

      this.playAudioFromStack();

    }
    //  this is the last from the stack
    //  playSingleAudio to active prePause and atPause
    else if ( stack.length === ( pointer + 1 ) ) {

      this.playSingleAudio( stack[ pointer ] );

    }
    else {
      return;
    }

  };



  //
  //  Single audio from the stack
  //  recursive with loopAudioStack()
  //
  LasHelper.prototype.playAudioFromStack = function() {

    var stack = this.audioStack.stack;
    var pointer = this.audioStack.pointer;
    var audioObject = stack[ pointer ];
    var startTime;
    var stopTime;

    //  no audio
    if ( !this.isCorrectAudioObject( audioObject ) ) {
      return;
    }

    startTime = audioObject.startTime;
    stopTime = audioObject.startTime + audioObject.duration;


    //  assign file duration if it wasn't assigned yet
    if ( this.helper.audioFileDuration === -1 ) {
      this.helper.audioFileDuration = this.audioFile.duration;
    }

    if ( stopTime > this.helper.audioFileDuration ) {
      window.console.log('stopTime > duration, can not play');
      return;
    }


    window.console.log('play audio from stack');

    //  reset listeners
    this.resetAudioListeners();

    //  unmute just in case
    this.audioFile.muted = false;

    //  try to set the time and play
    try {

      //  set the current time
      this.audioFile.currentTime = startTime;


      this.playAudioListener = function() {

        //  time ended
        if ( this.audioFile.currentTime >= stopTime ) {

          //  reset listener
          this.resetAudioListeners();

          //
          //  pause
          //  do it directly, or spinner will blink
          //
          window.console.log('pause');

          //  pause audio
          this.audioFile.pause();

          //  reset playing state
          this.state.playing = false;


          //  move the pointer
          this.audioStack.pointer += 1;

          //  back to loop
          this.loopAudioStack();

        }

      }.bind(this);


      //  add pause listener
      this.audioFile.addEventListener('timeupdate', this.playAudioListener, false);

      //  show spinner
      this.showSpinner();

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




  //
  //   Rewind the main audio stack
  //
  LasHelper.prototype.rewindAudio = function() {
    //  If the user want to listen to it again

    if ( !this.audioFile ) {
      return;
    }

    window.console.log('rewind');

    //  pause
    this.pauseAudio();

    //  reset currentAudioObject so it doesn't interfere
    this.currentAudioObject = {};

    //  reset pointer
    this.audioStack.pointer = 0;

    //  play again
    this.playAudio();

  };





  LasHelper.prototype.skipPauseTimers = function() {
    //  if the user doesn;t want to wait
    //  she can skip the pause timers

    if ( this.atPauseTimer === undefined ) {
      return false;
    }

    window.console.log('skipPauseTimers');

    //  reset the skip button, first arg means NOW
    this.resetSkipButton();

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



  LasHelper.prototype.pauseAudio = function() {
    //  simple as that

    if ( !this.audioFile ) {
      return;
    }

    window.console.log('pause');

    //  pause audio
    this.audioFile.pause();

    //  reset spinner
    this.resetSpinner();

    //  reset state
    this.state.playing = false;

  };



  LasHelper.prototype.resetAudioListeners = function() {

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
  LasHelper.prototype.loadAudioFile = function() {

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
  //  SPINNER
  //
  LasHelper.prototype.showSpinner = function() {
    //  if the spinner is in
    if ( this.state.spinner || !this.audioSpinner ) {
      return false;
    }

    window.console.log('showSpinner');

    this.state.spinner = true;

    //  spinner's animation queue is controlled by this.velocity

    //  reset this.velocity queue
    this.velocity(
      this.audioSpinner,
      'stop'
    );

    this.velocity(
      this.audioSpinner,
      'fadeIn',
      { duration: this.helper.speed, easing: this.helper.easingQuart, display: 'inline-block' }
    );
  };


  LasHelper.prototype.resetSpinner = function() {
    //  if there was no spinner
    if ( !this.state.spinner || !this.audioSpinner ) {
      return false;
    }

    this.state.spinner = false;

    this.velocity(
      this.audioSpinner,
      'stop'
    );

    this.velocity(
      this.audioSpinner,
      'fadeOut',
      { duration: this.helper.speed, easing: this.helper.easingQuart }
    );
  };




  //
  //  SKIP BUTTON
  //  pause timer
  //
  LasHelper.prototype.showSkipButton = function( pauseTime ) {

    //  if the timer is already in
    //  or no pause timer el
    //  or controls are in
    //  or there is no pause time
    if ( this.state.skipButton || !this.audioPauseTimer || this.state.controls || !pauseTime || ( pauseTime < 0 ) ) {
      return false;
    }

    this.state.skipButton = true;

    window.console.log('show pause timer');

    //  reset this.velocity queue
    this.velocity(
      this.audioPauseTimer,
      'stop'
    );

    //  show the timer
    this.velocity(
      this.audioPauseTimer,
      'fadeIn',
      { duration: this.helper.speed*2, easing: this.helper.easingQuart }
    );

    //  start the timer
    //  we multiply by 1000 because pauseTime is in seconds and the timer in miliseconds
    this.pauseTimer( pauseTime * 1000 );

  };


  LasHelper.prototype.resetSkipButton = function() {

    //  if the timer is not active
    if ( !this.state.skipButton || !this.audioPauseTimer ) {
      return false;
    }

    this.state.skipButton = false;

    window.console.log('reset pause timer');

    //  reset this.velocity queue
    this.velocity(
      this.audioPauseTimer,
      'stop'
    );

    this.velocity(
      this.audioPauseTimer,
      'fadeOut',
      { duration: this.helper.speed, easing: this.helper.easingQuart }
    );

  };


  //
  //  PAUSE TIMER
  //
  LasHelper.prototype.pauseTimer = function(duration) {

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
  //  Test mode audio
  //
  LasHelper.prototype.playAudioTestMode = function(startTime, duration) {

    var pauseTimer;
    var stopTime;

    if ( !this.audioFile ) {
      return;
    }

    if ( startTime === 0 ) {
      startTime = 0.01;
    }

    stopTime = startTime + duration;

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


})();
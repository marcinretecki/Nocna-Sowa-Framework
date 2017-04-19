//
//  AUDIO
//
(function() {

  //
  //  Private functions
  //
  function private() {


  }


  //
  //  Play Audio
  //  set the autoPause
  //
  LasHelper.prototype.playAudio = function() {

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


  LasHelper.prototype.rewindAudio = function() {
    //  If the user want to listen to it again

    if ( !this.audioFile ) {
      return;
    }

    window.console.log('rewind');

    //  pause
    this.pauseAudio();

    //  assign times
    this.audioTimes = [
      this.startTime,
      this.stopTime,
      -1
    ];

    //  play again
    this.playAudio();

  };


  //  automaticaly pause
  //  uses @this.audioTimes
  LasHelper.prototype.autoPauseAudio = function() {
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



  LasHelper.prototype.skipPauseTimers = function() {
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



  LasHelper.prototype.pauseAudio = function() {
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
    if ( !this.state.spinner || ( this.numAudioStack && ( this.numAudioStack.length > this.numAudioStackPointer + 1 ) ) ) {
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
  //  Test mode audio
  //
  LasHelper.prototype.playAudioTestMode = function(startTime, stopTime) {

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


})();
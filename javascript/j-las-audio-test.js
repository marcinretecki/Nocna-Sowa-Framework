//
// Las Audio Test
//


function LasAudioTest() {
  "use strict";

  //
  //  Elements
  //
  this.wrapper =              document.getElementById('audio-test');
  this.loader =               document.getElementById('loader');
  this.audioFile =            document.getElementById('audio-file');
  this.audioMsg =             document.getElementById('audio-msg');
  this.audioScore =           document.getElementById('audio-score');
  this.audioScoreNumber =     document.getElementById('audio-score-number');
  this.audioControls =        document.getElementById('audio-controls');
  this.audioSpinner =         document.getElementById('audio-spinner');
  this.audioPauseTimer =      document.getElementById('audio-pause-timer');
  this.audioMore =            document.getElementById('audio-more');
  this.audioNext =            document.getElementById('audio-next');
  this.audioRewind =          document.getElementById('audio-rewind');

  //  answers
  this.answersEl =            document.getElementById('audio-test-answers');
  this.answersElArray =       [];
  this.answersElArray[0] =    document.getElementById('answer-one');
  this.answersElArray[1] =    document.getElementById('answer-two');
  this.answersElArray[2] =    document.getElementById('answer-three');
  this.answersElArray[3] =    document.getElementById('answer-four');

  //  we use this to start downloading images earlier
  this.prefetch =             document.createElement('div');


  //
  //  Audio Data
  //
  this.lasData =              new LasAudioData();

  //  this will we assigned at assignBubbleData
  this.currentBubbleData =    null;
  this.more =                 null;
  this.msg =                  '';
  this.bubbleAutoNext =       '';
  this.startTime =            -1;
  this.stopTime =             -1;
  this.pauseTime =            -1;

  //  this will be assigned with assignAnswersData
  this.answersData =          [];

  //  this comes from the click handler
  this.nextBubbleName =       '';


  //
  //  State
  //
  this.state = {
    currentState:             '',   // END / INTRO / CHAT
    beforeFirstPlay:          true,
    answers:                  false,
    playing:                  false,
    score:                    false,
    msg:                      false,
    controls:                 false,
    bubbling:                 false,
    pauseTimer:               false,
    vibrating:                false,
    spinner:                  false,
    clicked:                  false,
    prePause:                 false,
    exNumber:                 0
  };


  //
  //  Helper
  //
  var speed =                 200;
  var answersTranformValue =  '300%';
  var easingSpring =          [ 200, 20 ];
  var easingQuart =           'easeInOutQuart';
  var velocity =              Velocity;

  // don't use this, only for testing quick code
  var self =                  this;


  //
  //  Initiate
  //
  this.init = function() {

    //  Random chat arrays
    this.randomIntroArray =   this.createRandomArrayOfFirstBubbles( this.lasData.intro );
    this.randomChatArray =    this.createRandomArrayOfFirstBubbles( this.lasData.chat );
    this.randomEndArray =     this.createRandomArrayOfFirstBubbles( this.lasData.end );

    //  Prepare
    this.addListener();
    this.hideLoader();

    //  to remove
    //  add css for audio-test-clue
    var style = document.createElement('style');
    style.type = 'text/css';
    style.appendChild(document.createTextNode('.audio-test-clue{background: #60B3B3 none repeat scroll 0 0;border-radius:3px;font-style:italic;padding:0.25rem 0.5rem;display:inline-block;}'));
    var head = document.getElementsByTagName('head')[0];
    head.appendChild(style);

    document.querySelector('.section-beige.wrapper').style.cssText = 'background-image: url("/i/las_test_6.jpg"); background-size: cover;';

    //  Get the intro
    this.getNextBubble( 'INTRO' );
    this.showMsg();
    this.showControls();
  };


  //
  //  BUBBLE
  //
  this.assignBubbleData = function(no, data) {
    this.currentBubble = no;
    this.currentBubbleData = data;

    window.console.log('Assign bubble data');

    //  if there is time
    if ( this.currentBubbleData.hasOwnProperty('startTime') ) {

      //  assign playback times
      this.startTime = this.currentBubbleData.startTime;
      this.stopTime = this.currentBubbleData.stopTime;

      window.console.log('Start time: ' + this.startTime + ' Stop time: ' + this.stopTime);

    }
    //  if no time, we have a quiz
    else {

      //  reset times
      this.startTime = -1;
      this.stopTime  = -1;

      window.console.log('No time.');
    }

    //  if there is pause time
    if ( this.currentBubbleData.hasOwnProperty('pauseTime') ) {

      //  assign it
      this.pauseTime = this.currentBubbleData.pauseTime;

    }
    else {

      //  reset pause
      this.pauseTime = -1;

    }


    //  there is either autoNext or answers, never both

    //  if there is autoNext
    if ( this.currentBubbleData.hasOwnProperty('autoNext') ) {

      this.bubbleAutoNext = this.currentBubbleData.autoNext;

    }
    //  if there are answers
    else if ( this.currentBubbleData.hasOwnProperty('answers') ) {

      //  loop over all available answers
      this.assignAnswersData();

      //  Reset autoNext
      this.bubbleAutoNext = '';

    }

    //  if there is msg
    if ( this.currentBubbleData.hasOwnProperty('msg') ) {

      //  assign the msg
      this.msg = this.currentBubbleData.msg;

    }
    else {

      //  reset msg
      this.msg = '';

    }

    //  if there is more
    if ( this.currentBubbleData.hasOwnProperty('more') ) {

      //  assign more
      this.more = this.currentBubbleData.more;

    }
    else {

      //  reset more
      this.more = null;

    }

  };


  this.assignAnswersData = function() {
    //  this.answers = [
    //    { answer: '', next: '', wrong: true },
    //    { answer: '', next: '' }
    //  ]

    var i;
    var c = this.currentBubbleData.answers.length;

    window.console.log('assignAnswersData');

    //  shuffle answers
    this.currentBubbleData.answers = this.shuffleArray( this.currentBubbleData.answers );

    //  loop over answers to create array
    for ( i = 0; i < c; i++ ) {

      this.answersData[i] = {};
      this.answersData[i].answer = this.currentBubbleData.answers[i].answer;

      //  if it has next
      if ( this.currentBubbleData.answers[i].hasOwnProperty( 'next' ) ) {

        this.answersData[i].next = this.currentBubbleData.answers[i].next;

        window.console.log('Next: ' + this.answersData[i].next);

      }

      //  if it has wrong
      //  it can have both, so do not use 'else'
      if ( this.currentBubbleData.answers[i].hasOwnProperty( 'wrong' ) ) {

        this.answersData[i].wrong = this.currentBubbleData.answers[i].wrong;

        window.console.log('Has wrong');

      }

    }

  };


  this.createBubble = function() {
    //  here we have audio/quiz logic when the new bubble should appear

    //  if it is the end
    if ( this.bubbleAutoNext === 'END' ) {

      this.finish();
      return false;

    }

    //  or it can be another question

    //  if there is no time (and no score)
    if ( this.startTime < 0  ) {

      this.showAnswers();

      window.console.log('no time, no score, show answers?');

    }
    //  there is time, so we can play it
    else {

      //  allow prepause event
      this.state.prePause = true;

      //  answers show on autoPause
      this.playAudio();

      //  if it is callan, we need to show msg earlier
      if ( ( this.bubbleAutoNext === 'RANDOM' ) && !this.score ) {

        this.showMsg();

      }

    }

  };


  this.answerToBubble = function() {
    //  convert clicked answer into the next bubble

    //  this one prevents some glitches
    if ( this.state.bubbling ) {
      return false;
    }

    this.state.bubbling = true;

    //  stop all animations
    velocity.pauseAll();

    //  pause, if user clicked an answer, we need to pause audio, so we can play the next one
    this.pauseAudio();

    window.console.log('answerToBubble');
    window.console.log(this.nextBubbleName);

    //  reset everything
    this.resetMsg();
    this.resetAnswers();
    this.resetControls();
    this.resetListeners();

    //  get next bubble
    this.getNextBubble( this.nextBubbleName );

    //  create new bubble
    this.createBubble();

    //  reset bubbling state
    this.state.bubbling = false;

  };


  //
  //  AUDIO
  //
  this.playAudio = function() {
    //  not only plays the fime at specific time but also sets the autoPause

    if ( this.state.playing || ( this.startTime < 0 ) ) {
      return false;
    }

    //  reset listeners
    this.resetListeners();

    //  set the current time
    this.audioFile.currentTime = this.startTime;

    this.playAudioListener = function() {
      this.autoPauseAudio();
    }.bind(this);

    //  add pause listener
    this.audioFile.addEventListener('timeupdate', this.playAudioListener, false);

    //  show spinner
    this.showSpinner();

    window.console.log('play!');

    //  play the file
    this.state.playing = true;
    this.audioFile.play();

  };


  this.rewindAudio = function() {
    //  If the user want to listen to it again

    window.console.log('rewind');

    //  pause
    this.pauseAudio();

    //  play again
    this.playAudio();

  };


  this.autoPauseAudio = function() {
    //  before pause, call prePause
    //  when the time finishes, pause playback and call atPause

    //  the eventListener guarantees accuracy up to one second,
    //  but half a second should be enough to begin animation
    //  so it finishes together with the playback

    //  half a second before the end of audio
    if ( ( this.audioFile.currentTime + 0.5 > this.stopTime ) && this.state.prePause ) {

      //  prevent prePause from firing too many times
      this.state.prePause = false;

      //  if there is a pause and the prePauseTimer is not yet set
      if ( ( this.pauseTime > 0 ) && !this.prePauseTimer ) {

        window.console.log('set prePauseTimer');

        //  set prePauseTimer
        this.prePauseTimer = window.setTimeout(function() {

          window.clearTimeout(this.prePauseTimer);
          this.prePauseTimer = undefined;
          this.prePause();

        }.bind(this), (this.pauseTime * 1000) );

      }
      //  if there is no pause
      else if ( this.pauseTime < 0 ) {

        this.prePause();

      }

    }

    //  at the end of audio
    if ( this.audioFile.currentTime > this.stopTime ) {

      //  reset listener
      this.resetListeners();

      // pause
      this.pauseAudio();
      window.console.log('auto pause!');

      //  if there is a pause and the atPauseTimer is not yet set
      if ( ( this.pauseTime > 0 ) && !this.atPauseTimer ) {

        window.console.log('set atPauseTimer');

        //  set atPauseTimer
        this.atPauseTimer = window.setTimeout(function() {

          window.clearTimeout(this.atPauseTimer);
          this.atPauseTimer = undefined;
          this.atPause();

        }.bind(this), (this.pauseTime * 1000) );

        //  show skip button
        this.showSkipButton();

      }
      else if ( this.pauseTime < 0 ) {

        this.atPause();

      }

    }

  };


  this.prePause = function() {
    //  half a second before the end of audio

    window.console.log('pre pause');

    //  reset timer
    this.resetSkipButton();

    //  reset spinner
    this.resetSpinner();

    //  if the bubble has answers, show them
    this.showAnswers();
  };


  this.atPause = function() {
    //  at the end of audio

    window.console.log('at pause');

    //  if there is autoNext but not random one
    if ( ( this.bubbleAutoNext !== '' ) && ( this.bubbleAutoNext !== 'RANDOM' ) ) {

      //  get next bubble
      this.getNextBubble( this.bubbleAutoNext );

      //  create new bubble
      this.createBubble();

      //  if it is callan, we need to show controls here, because there is no score
      if ( ( this.bubbleAutoNext === 'RANDOM' ) && !this.score ) {

        this.showControls();

      }

    }
    //  if it is the end
    else if ( this.bubbleAutoNext === 'END' ) {

      this.finish();

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

    this.audioFile.pause();
    this.state.playing = false;

    //  reset spinner
    this.resetSpinner();

  };


  //
  //  MORE
  //
  this.playMore = function() {
    //  some bubbles have more content to play
    //  we need seperate logic for those

    //  if the file is playing, we can't force it to stop
    //  or can we?
    if ( this.state.playing ) {
      return false;
    }

    //  set the current time for more
    this.audioFile.currentTime = this.more.startTime;

    //  prepare the autoPauseMore listener
    this.playMoreListener = function(){
      this.autoPauseMore();
    }.bind(this);

    //  add pause listener
    this.audioFile.addEventListener('timeupdate', this.playMoreListener, false);

    window.console.log('play more!');

    //  play more
    this.state.playing = true;
    this.audioFile.play();

  };


  this.autoPauseMore = function() {
    //  when the time finishes, pause playback of more
    //  it is seperate from the normal autoPause,
    //  because we do not have prePause and atPause additions

    window.console.log('check pause more ' + this.audioFile.currentTime);

    //  at the end of audio
    if ( this.audioFile.currentTime > this.more.stopTime ) {

      // pause
      this.state.playing = false;
      this.pauseAudio();

      window.console.log('auto pause more!');

      // reset listener
      this.resetListeners();

      //  should we first reset the listners or pause?
      //  this pattern repeats and we could have consistency at this

    }

  };


  this.resetListeners = function() {

    // remove play listener
    this.audioFile.removeEventListener('timeupdate', this.playAudioListener, false);
    this.playAudioListener = undefined;

    // remove more listener
    this.audioFile.removeEventListener('timeupdate', this.playMoreListener, false);
    this.playMoreListener = undefined;

  };



  //
  //  ANSWERS
  //
  this.showAnswers = function() {

    var i;
    var c = this.answersData.length;
    var completeFn;

    //  answers are waiting or the timer is set or there is no answers to show
    if ( this.state.answers || this.showAnswersTimer || ( this.answersData.length === 0 ) ) {

      window.console.log('no answers or timer set or answers waiting');

      return false;
    }

    //  wait untill answers, score or controls is reset
    if ( this.state.score || this.state.msg ) {

      window.console.log('set answers timer');

      this.showAnswersTimer = window.setTimeout(function() {

        window.clearTimeout(this.showAnswersTimer);
        this.showAnswersTimer = undefined;

        this.showAnswers();

      }.bind(this), 200);

      return false;

    }

    window.clearTimeout(this.showAnswersTimer);
    this.showAnswersTimer = undefined;

    window.console.log('show answers');

    this.state.answers = true;

    //  if there is msg, show it
    this.showMsg();

    //  Loop over answers
    for ( i = 0; i < 4; i++ ) {

      //  if there is such answer
      if ( i < c ) {

        //  we use IIFE to lock the variable i
        (function( self, i ) {
          self.answersElArray[i].innerHTML = self.answersData[i].answer;

          //  animate
          velocity(
            self.answersElArray[i],
            'slideDown',
            { duration: speed*2, easing: easingSpring, display: 'block', queue: false }
          );

          velocity(
            self.answersElArray[i],
            { borderColor: '#60B3B3' },
            { duration: speed*2, easing: easingQuart }
          );

          window.console.log('show answer');
        })( this, i );

      }
      //  if there is no such answer, hide it
      else {

        this.answersElArray[i].style.display = 'none';

        window.console.log('if not such answr, hide it');
      }

      //  end loop
    }

    //  if the question has no msg, it will usually have audio
    //  then we should show controls for this audio
    //  should I be doing som if statement to check if my assuption is valid?
    this.showControls();

  };


  this.resetAnswers = function() {
    //  reset the answers

    //  if there was no answers
    if ( !this.state.answers ) {
      return false;
    }

    //  Loop over answers
    var i;
    var c = this.answersData.length;
    var completeFn;

    completeFn = function() {
      this.state.answers = false;
      //  show msg if there is one
      //  why show msg here???
      this.showMsg();
    }.bind(this);

    for (i = 0; i < 4; i++) {

      //  if there is such an answer, hide it
      if ( i < c ) {

        //  IIFE to lock the i variable
        (function( self, i, c ) {

          velocity(
            self.answersElArray[i],
            { borderColor: '#308c8c' },
            { duration: speed*2, easing: easingQuart, queue: false }
          );

          //  if it is the last answer to reset
          if ( i === (c - 1) ) {

            velocity(
              self.answersElArray[i],
              'slideUp',
              { duration: speed*2, easing: easingQuart,
                complete: function() {
                  completeFn();
                }
              }
            );

          }
          //  all other answers
          else {

            velocity(
              self.answersElArray[i],
              'slideUp',
              { duration: speed*2, easing: easingQuart }
            );

          }

        })( this, i, c );

      }

      //  end loop
    }

    //  clear answer data
    this.answersData = [];

    window.console.log('clear answer data');

  };


  //
  //  MESSAGE
  //
  this.showMsg = function() {
    var beginFn;

    //  we do not check state here, because we want to use Velocity chaining
    //  but we need to check if there is a msg to show
    if ( this.msg === '' ) {
      return false;
    }

    this.state.msg = true;

    window.console.log('show msg');

    //  if there is a msg, set it
    //  we use begin here because of the chaining
    //  if the msg is reseted and the immidiately showed again,
    //  the innerHTML would update before reset animation would finish
    beginFn = function() {
      this.audioMsg.innerHTML = this.msg;
    }.bind(this);

    //  animate
    velocity(
      this.audioMsg,
      'slideDown',
      { duration: speed*2, easing: easingSpring,
        begin: function() {
          beginFn();
        }
      }
    );

  };


  this.resetMsg = function() {
    //  hide the msg

    var completeFn;

    //  if there was no msg
    if ( !this.state.msg ) {
      return false;
    }

    //  if user clicked fast enough, showMsg could not finish, then we need to stop animation
    velocity(
      this.audioMsg,
      'stop'
    );

    window.console.log('reset msg');

    //  to let the msg chaining to happen
    completeFn = function() {
      this.state.msg = false;
    }.bind(this);

    velocity(
      this.audioMsg,
      'slideUp',
      { duration: speed*2, easing: easingQuart,
        complete: function() {
          completeFn();
        }
      }
    );
  };


  this.showScore = function() {
    //  this shows that the user made a good decision

    //  if there is score already
    //  or the bubble has no score
    if ( this.state.score ) {
      return false;
    }

    window.console.log('score');

    this.state.score = true;

    //  add 1 to the number of excercises user made
    this.state.exNumber = this.state.exNumber + 1;

    //  change the number in element
    this.audioScoreNumber.innerHTML = this.state.exNumber;

    velocity.hook( this.audioScore, "translateX", "-50%" );
    velocity.hook( this.audioScore, "translateY", "-40%" );
    velocity.hook( this.audioScore, "scale", "0" );

    //  some numbers are not centered properly
    //  here we can fix this
    if ( ( this.state.exNumber === 1 )  || ( this.state.exNumber === 11 ) ) {
      velocity.hook( this.audioScoreNumber, "left", "-4px" );
    }
    else if ( this.state.exNumber === 4 ) {
      velocity.hook( this.audioScoreNumber, "left", "-5px" );
    }
    else {
      velocity.hook( this.audioScoreNumber, "left", "0" );
    }

    velocity(
      this.audioScore,
      { opacity: [1, 0], scale: 1 },
      { duration: speed, easing: easingQuart, display: 'block' }
    );

    velocity(
      this.audioScoreNumber,
      { scale: [1.5, 1] },
      { duration: speed, easing: easingQuart, delay: speed }
    );

    velocity(
      this.audioScoreNumber,
      { scale: 1 },
      { duration: speed*2, easing: easingQuart }
    );


    window.console.log('add score timer');

    //  Add the timer to reset score
    this.showScoreTimer = window.setTimeout(function() {

      this.resetScore();
      this.showScoreTimer = undefined;

    }.bind(this), speed*4);

  };


  this.resetScore = function() {
    //  hide the score
    //  it can be called on showScore (via setTimeout)

    var completeFn;

    //  if there was no score
    if ( !this.state.score ) {
      window.console.log('there was no score');
      return false;
    }

    window.console.log('reset score');

    //  when score hides, show controls
    completeFn = function() {

      this.state.score = false;

      //  true arg prevents showControls from calling if there was audio
      //  with audio, controls show atPause
      this.showControls( true );

    }.bind(this);

    //  animate
    velocity(
      this.audioScore,
      'fadeOut',
      { duration: speed*2, easing: easingQuart,
        complete: function() {
          completeFn();
        }
      }
    );
  };


  //
  //  CONTROLS
  //
  this.showControls = function( afterScore ) {

    //  if controls are already in
    //  or each of the single controls has no purpose and it is not afterScore and it is not before the first play
    if ( this.state.controls || ( ( this.more === null ) && ( this.startTime < 0 ) && !this.state.beforeFirstPlay && !afterScore ) ) {
      return false;
    }

    this.state.controls = true;

    window.console.log('show controls');

    //  if there are answers, we want to mach the color to them
    if ( this.state.answers ) {
      this.audioControls.className = 'section-green';
    }
    else {
      this.audioControls.className = 'section-dark';
    }

    //  show the whole controls bar
    velocity(
      this.audioControls,
      { height: '2rem' },
      { duration: speed, easing: easingSpring, display: "block" }
    );

    //  below, each velocity call need display: block, or buttons will be showed as inline-block

    //  if there is more audio, show MORE button
    if ( this.more !== null ) {
      window.console.log('show controls, more: ' + this.more.startTime);

      velocity(
        this.audioMore,
        'fadeIn',
        { duration: speed, easing: easingQuart, display: 'block', delay: speed }
      );
    }

    //  if there is time, show REWIND
    if ( this.startTime >= 0 ) {
      window.console.log('show controls, rewind: ' + this.startTime);

      velocity(
        this.audioRewind,
        'fadeIn',
        { duration: speed, easing: easingQuart, display: 'block', delay: speed }
      );
    }

    //  if this is the first play or the end of automatic sequence, show NEXT button
    if ( this.state.beforeFirstPlay || ( this.bubbleAutoNext === 'RANDOM' ) ) {
      velocity(
        this.audioNext,
        'fadeIn',
        { duration: speed, easing: easingQuart, display: 'block', delay: speed }
      );
    }

  };


  this.resetControls = function() {
    var completeFn;

    //  if there was no controls
    if ( !this.state.controls ) {
      return false;
    }

    //  we reset the state instantly, so it doesn't trigger again
    //  this way we can also use Velocity's queue
    this.state.controls = false;

    window.console.log('reset controls');

    //  hide the whole controls element
    velocity(
      this.audioControls,
      { height: '0' },
      { duration: speed*2, easing: easingQuart, display: 'none' }
    );

    //  hide MORE
    velocity(
      this.audioMore,
      'fadeOut',
      { duration: speed*2, easing: easingQuart }
    );

    //  hide REWIND
    velocity(
      this.audioRewind,
      'fadeOut',
      { duration: speed*2, easing: easingQuart }
    );

    //  hide NEXT
    velocity(
      this.audioNext,
      'fadeOut',
      { duration: speed*2, easing: easingQuart }
    );

  };


  //
  //  SPINNER
  //
  this.showSpinner = function() {
    //  if the spinner is in
    if ( this.state.spinner ) {
      return false;
    }

    this.state.spinner = true;

    //  spinner's animation queue is controlled by velocity

    //  reset velocity queue
    velocity(
      this.audioSpinner,
      'stop'
    );

    velocity(
      this.audioSpinner,
      'fadeIn',
      { duration: speed, easing: easingQuart, display: 'inline-block' }
    );
  };


  this.resetSpinner = function() {
    //  if there was no spinner
    if ( !this.state.spinner ) {
      return false;
    }

    this.state.spinner = false;

    velocity(
      this.audioSpinner,
      'stop'
    );

    velocity(
      this.audioSpinner,
      'fadeOut',
      { duration: speed, easing: easingQuart }
    );
  };


  //
  //  SKIP BUTTON
  //  pause timer
  //
  this.showSkipButton = function() {
    //  if the timer is already in
    //  or there is no pause time
    if ( this.state.skipButton || ( this.pauseTime < 0 ) ) {
      return false;
    }

    this.state.skipButton = true;

    window.console.log('show pause timer');

    //  reset velocity queue
    velocity(
      this.audioPauseTimer,
      'stop'
    );

    //  show the timer
    velocity(
      this.audioPauseTimer,
      'fadeIn',
      { duration: speed*2, easing: easingQuart }
    );

    //  start the timer
    //  we multiply by 1000 because pauseTime is in seconds and the timer in miliseconds
    this.pauseTimer( this.pauseTime * 1000 );

  };


  this.resetSkipButton = function( now ) {

    //  move @now into some state prop

    var completeFn;
    var delayCalc;

    //  if the timer is not active
    if ( !this.state.skipButton ) {
      return false;
    }

    this.state.skipButton = false;

    window.console.log('reset pause timer');

    //  reset velocity queue
    velocity(
      this.audioPauseTimer,
      'stop'
    );

    //  if @now arg is true, there is no delay in hiding the
    if ( now ) {
      delayCalc = 0;
    }
    else {
      delayCalc = 1000 - speed*2;
    }

    velocity(
      this.audioPauseTimer,
      'fadeOut',
      { duration: speed*2, easing: easingQuart, delay: delayCalc }
    );

  };


  //
  //  HELPERS
  //
  this.clickAnswer = function( target, answerData ) {
    //  controls the click event logic for answers
    //  @target comes from event handler
    //  @answerData is assigned in assignAnswersData

    var vibratingTimer;
    var answerEl;

    //  if it was the right answer
    if ( answerData.hasOwnProperty('next') && answerData.next ) {

      //  show score
      this.showScore();

      //  assign next bubble name
      this.nextBubbleName = answerData.next;

      //  convert
      this.answerToBubble();

    }
    //  wrong answer, only animate, do not change anything
    else if ( answerData.hasOwnProperty('wrong') && answerData.wrong ) {

      window.console.log('wrong!');

      if ( this.more !== null ) {
        window.console.log('wrong answer has more');
        this.playMore();
      }

      if ( this.state.vibrating ) {
        return false;
      }

      this.state.vibrating = true;

      //  reduce number of vibrating calls
      vibratingTimer = window.setTimeout(function() {
        this.state.vibrating = false;
      }.bind(this), speed*2);


      //  check if user clicked on button or some node inside it
      //  we want to animate only the button
      if ( target.getAttribute('role') === 'button' ) {
        answerEl = target;
      }
      else if ( target.parentNode.getAttribute('role') === 'button' )  {
        answerEl = target.parentNode;
      }


      //  animate

      //  if there is next, we show the answer is wrong with color change
      if ( answerData.hasOwnProperty('next') && answerData.next ) {
        velocity(
        answerEl,
          { backgroundColor: '#dd4b39' },
          { duration: speed, easing: easingQuart }
        );

        velocity(
        answerEl,
          'reverse',
          { duration: speed*4, easing: easingQuart }
        );
      }
      //  if there is no next, we only vibrate the answer
      else {
        velocity(
        answerEl,
          { translateX: ['0', '-0.5rem'] },
          { duration: speed*4, easing: [ 5000, 20 ], queue: false }
        );
      }

    }

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

    if ( ( event.target.id === 'answer-one' ) || ( event.target.parentNode.id === 'answer-one' ) ) {
      //  load the answer no 1
      if ( this.state.answers ) {
        this.clickAnswer( event.target, this.answersData[0] );
      }

    }
    else if ( ( event.target.id === 'answer-two' ) || ( event.target.parentNode.id === 'answer-two' ) ) {
      //  load the answer no 2
      if ( this.state.answers ) {
        this.clickAnswer( event.target, this.answersData[1] );
      }

    }
    else if ( ( event.target.id === 'answer-three' ) || ( event.target.parentNode.id === 'answer-three' ) ) {
      //  load the answer no 3
      if ( this.state.answers ) {
        this.clickAnswer( event.target, this.answersData[2] );
      }

    }
    else if ( ( event.target.id === 'answer-four' ) || ( event.target.parentNode.id === 'answer-four' ) ) {
      //  load the answer no 4
      if ( this.state.answers ) {
        this.clickAnswer( event.target, this.answersData[3] );
      }

    }
    else if ( ( event.target.id === 'audio-skip-pause' ) || ( event.target.parentNode.id === 'audio-skip-pause' ) ) {
      //  skip the pause
      if ( this.state.skipButton ) {
        this.skipPauseTimers();
      }

    }
    else if ( ( event.target.id === 'audio-rewind' ) || ( event.target.parentNode.id === 'audio-rewind' ) ) {
      //  if the fragment is longer this 10 s, rewind 10 s, otherwise rewidn to the begging o the current fragment

      if ( this.state.controls ) {
        if ( this.state.playing ) {
          //  if it is playing now, pause it
          this.pauseAudio();
        }
        else {
          this.rewindAudio();
        }
      }

    }
    else if ( ( event.target.id === 'audio-next' ) || ( event.target.parentNode.id === 'audio-next' ) ) {

      if ( this.state.beforeFirstPlay ) {
        //  if it is the first time we click play
        this.state.beforeFirstPlay = false;
      }

      //  if controls are active, allow the click
      if ( this.state.controls ) {

        //  assign next bubble
        this.nextBubbleName = this.bubbleAutoNext;

        //  convert
        this.answerToBubble();
      }
    }
    else if ( ( event.target.id === 'audio-more' ) || ( event.target.parentNode.id === 'audio-more' ) ) {
      //  play more

      if ( this.state.controls ) {
        this.playMore();
      }
    }

    event.preventDefault();
    return false;

  };


  this.addListener = function() {
    //  assign click and touchstart events to the wrapper

    window.console.log('add event listener');

    this.wrapper.addEventListener('touchstart', function(event) {

      this.eventHandler(event);

    }.bind(this), false);

    this.wrapper.addEventListener('click', function(event) {

      this.eventHandler(event);

    }.bind(this), false);

  };

}

//
//  Extend with LasHelper methods
//
LasAudioTest.prototype = new LasHelper();
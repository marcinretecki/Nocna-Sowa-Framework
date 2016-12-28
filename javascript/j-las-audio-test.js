//
// Las Audio Test
//


function LasAudioTest() {
  //
  //  Elements
  //
  this.wrapper =              document.getElementById('audio-test');
  this.loader =               document.getElementById('loader');
  this.audioFile =            document.getElementById('audio-file');
  this.audioMsg =             document.getElementById('audio-msg');
  this.audioScore =           document.getElementById('audio-score');
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

  this.prefetch =             document.createElement('div');


  //
  //  Audio Data
  //
  this.lasData =              new LasAudioData();
  this.currentBubbleData =    null;
  this.more =                 null;
  this.msg =                  '';
  this.bubbleAutoNext =       '';
  this.startTime =            -1;
  this.stopTime =             -1;
  this.pauseTime =            -1;
  this.autoNext =             '';
  this.score =                false;
  this.answersData =          [];


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
    clicked:                  false
  };
  this.prePauseCheck =        false;


  //
  //  Helper
  //
  var self =                  this;
  var speed =                 200;
  var answersTranformValue =  '300%';
  var easingSpring =          [ 200, 20 ];
  var easingQuart =           'easeInOutQuart';
  var velocity =              Velocity;


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

    //  playback times
    if ( this.currentBubbleData.hasOwnProperty('startTime') ) {
      //  if there is time
      this.startTime = this.currentBubbleData.startTime;
      this.stopTime = this.currentBubbleData.stopTime;

      window.console.log('Start time: ' + this.startTime);
      window.console.log('Stop time: ' + this.stopTime);
    }
    else {
      //  if no time, we have a quiz
      //  reset times
      this.startTime = -1;
      this.stopTime  = -1;

      window.console.log('No time.');
    }

    //  pause time
    if ( this.currentBubbleData.hasOwnProperty('pauseTime') ) {
      this.pauseTime = this.currentBubbleData.pauseTime;

    }
    else {
      //  reset pause
      this.pauseTime = 0;
    }

    //  autoNext or answers
    if ( this.currentBubbleData.hasOwnProperty('autoNext') ) {
      //  if there is autoNext
      this.bubbleAutoNext = this.currentBubbleData.autoNext;
    }
    else if ( this.currentBubbleData.hasOwnProperty('answers') ) {
      //  if there are answers
      //  loop over all available answers
      this.assignAnswers();

      //  Reset autoNext
      this.bubbleAutoNext = '';

    }

    //  msg
    if ( this.currentBubbleData.hasOwnProperty('msg') ) {
      //  assign the msg
      this.msg = this.currentBubbleData.msg;

    }
    else {
      //  reset msg
      this.msg = '';
    }

    //  more
    if ( this.currentBubbleData.hasOwnProperty('more') ) {
      //  assign more
      this.more = this.currentBubbleData.more;
    }
    else {
      //  reset more
      this.more = null;
    }

    //  score
    if ( this.currentBubbleData.hasOwnProperty('score') ) {
      //  assign more
      this.score = this.currentBubbleData.score;
    }
    else {
      //  reset more
      this.score = false;
    }

  };


  this.assignAnswers = function() {
    //  this.answers = [
    //    { answer: '', next: '', wrong: true },
    //    { answer: '', next: '' }
    //  ]

    var i;
    var c = this.currentBubbleData.answers.length;

    window.console.log('assignAnswers');

    //  shuffle answers
    this.currentBubbleData.answers = this.shuffleArray( this.currentBubbleData.answers );

    //  loop over answers to create array
    for ( i = 0; i < c; i++ ) {
      this.answersData[i] = {};
      this.answersData[i].answer = this.currentBubbleData.answers[i].answer;

      if ( this.currentBubbleData.answers[i].hasOwnProperty( 'next' ) ) {
        //  if it has next
        this.answersData[i].next = this.currentBubbleData.answers[i].next;

        window.console.log('Next: ' + this.answersData[i].next);
      }

      if ( this.currentBubbleData.answers[i].hasOwnProperty( 'wrong' ) ) {
        //  if it has wrong
        this.answersData[i].wrong = this.currentBubbleData.answers[i].wrong;

        window.console.log('Has wrong');
      }

    }

  };


  this.createBubble = function() {
    //  here we have audio/quiz logic when the new bubble should appear

    if ( this.bubbleAutoNext === 'END' ) {
      //  if it is the end
      this.finish();
      return false;
    }

    //  the bubble can be a score
    this.showScore();

    //  or it can be another question
    if ( ( this.startTime < 0 ) && !this.score ) {
      //  no time or score
      window.console.log('no time, no score, show answers?');
      this.showAnswers();
    }
    else {
      //  we have audio, se we can play it
      //  answers shown there
      this.playAudio();

      //  allow prepause event
      this.prePauseCheck = true;

      if ( ( this.bubbleAutoNext === 'RANDOM' ) && !this.score ) {
        //  if it is callan, we need to show msg earlier
        this.showMsg();
      }
    }

  };


  this.answerToBubble = function( next ) {
    if ( this.state.bubbling ) {
      return false;
    }

    this.state.bubbling = true;


    //  stop all animations
    velocity.pauseAll();

    //  pause, if user clicked an answer, we need to pause audio, so we can play the next one
    this.pauseAudio();

    window.console.log('answerToBubble');
    window.console.log(next);

    //  reset everything
    this.resetMsg();
    this.resetAnswers();
    this.resetControls();
    this.resetListeners();

    //  get next bubble
    this.getNextBubble( next );

    //  create new bubble
    this.createBubble();

    //  reset bubbling state
    this.state.bubbling = false;
  };


  //
  //  AUDIO
  //
  this.playAudio = function() {
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


    window.console.log('play!');
    this.state.playing = true;
    this.audioFile.play();

    //  spinner
    this.showSpinner();

  };

  this.rewindAudio = function() {
    //  If the user want to listen to it again

    window.console.log('rewind');

    //  pause
    this.pauseAudio();

    //  play again
    this.playAudio();

  };


  this.autoPauseAudio = function(rewind) {
    //  when the time finishes, pause playback

    if ( ( this.audioFile.currentTime + 1 > this.stopTime ) && this.prePauseCheck ) {
      //  one second before the end of audio

      //  prevent prePause from firing too many times
      this.prePauseCheck = false;

      if ( ( this.pauseTime > 0 ) && !this.prePauseTimer ) {
        window.console.log('set prePauseTimer');
        this.prePauseTimer = window.setTimeout(function() {
          window.clearTimeout(this.prePauseTimer);
          this.prePauseTimer = undefined;
          this.prePause();
        }.bind(this), (this.pauseTime * 1000) );
      }
      else if ( this.pauseTime < 0 ) {
        this.prePause();
      }

    }

    if ( this.audioFile.currentTime > this.stopTime ) {
      //  at the end of audio

      //  reset listener
      this.resetListeners();

      // pause
      this.pauseAudio();
      window.console.log('auto pause!');

      if ( ( this.pauseTime > 0 ) && !this.atPauseTimer ) {
        window.console.log('set atPauseTimer');
        this.atPauseTimer = window.setTimeout(function() {
          window.clearTimeout(this.atPauseTimer);
          this.atPauseTimer = undefined;
          this.atPause();
        }.bind(this), (this.pauseTime * 1000) );

        //  show pause timer
        this.showPauseTimer();
      }
      else if ( this.pauseTime < 0 ) {
        this.atPause();
      }

    }

  };


  this.prePause = function() {
    //  one second before the end of audio

    window.console.log('pre pause');

    //  if the score was shown, reset it and on complete show controls
    this.resetScore();

    //  reset timer
    this.resetPauseTimer();

    //  rese spinner
    this.resetSpinner();

    //  if the bubble has answers, show them
    this.showAnswers();
  };


  this.atPause = function() {
    //  at the end of audio

    window.console.log('at pause');

    if ( ( this.bubbleAutoNext !== '' ) && ( this.bubbleAutoNext !== 'RANDOM' ) ) {
      //  if there is autoNext but not random one

      //  get next bubble
      this.getNextBubble( this.bubbleAutoNext );

      //  create new bubble
      this.createBubble();

      if ( ( this.bubbleAutoNext === 'RANDOM' ) && !this.score ) {
        //  if it is callan, we need to show controls here, because there is no score
        this.showControls();
      }
    }
    else if ( this.bubbleAutoNext === 'END' ) {
      //  if it is the end
      this.finish();
    }

  };


  this.skipPauseTimers = function() {
    if ( this.atPauseTimer === undefined ) {
      return false;
    }

    window.console.log('skipPauseTimers');

    this.resetPauseTimer(true);

    //  reset pre pause timer
    window.clearTimeout(this.prePauseTimer);
    this.prePauseTimer = undefined;

    this.prePause();

    //  reset at pause timer
    window.clearTimeout(this.atPauseTimer);
    this.atPauseTimer = undefined;

    //  give a bit of breathing time for the animations to get going
    this.skipPauseTimersTimer = window.setTimeout(function() {
      window.clearTimeout( this.skipPauseTimersTimer );
      this.skipPauseTimersTimer = undefined;
      this.atPause();
    }.bind(this), 200);


  };


  this.pauseAudio = function() {
    this.audioFile.pause();
    this.state.playing = false;

    //  Spinner
    this.resetSpinner();
  };


  //
  //  MORE
  //
  this.playMore = function() {
    if ( this.state.playing ) {
      return false;
    }
    //  set the current time
    this.audioFile.currentTime = this.more.startTime;

    this.playMoreListener = function(){
      this.autoPauseMore();
    }.bind(this);

    //  add pause listener
    this.audioFile.addEventListener('timeupdate', this.playMoreListener, false);

    window.console.log('play more!');
    this.state.playing = true;
    this.audioFile.play();

  };


  this.autoPauseMore = function() {
    //  when the time finishes, pause playback of more

    window.console.log('check pause more ' + this.audioFile.currentTime);

    if ( this.audioFile.currentTime > this.more.stopTime ) {
      //  at the end of audio

      // pause
      this.pauseAudio();
      window.console.log('auto pause more!');

      // reset listener
      this.resetListeners();

      this.state.playing = false;

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

    if ( this.state.answers || this.showAnswersTimer || ( this.answersData.length === 0 ) ) {
      //  answers are waiting or the timer is set or there is no answers to show
      window.console.log('no answers or timer set or answers waiting');
      return false;
    }

    if ( this.state.score || this.state.msg ) {
      //  wait untill answers, score or controls is reset
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

      if ( i < c ) {
        //  if there is such answer

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
      else {
        //  if there is no such answer, hide it
        this.answersElArray[i].style.display = 'none';

        window.console.log('if not such answr, hide it');
      }

      //  end loop
    }

    this.showControls();

  };


  this.resetAnswers = function() {
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

      if ( i < c ) {
        //  if there is such an answer, hide it
        (function( self, i, c ) {
          velocity(
        self.answersElArray[i],
            { borderColor: '#308c8c' },
            { duration: speed*2, easing: easingQuart, queue: false }
          );

          if ( i === (c - 1) ) {
            //  if it is the last answer to reset
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
          else {
            velocity(
        self.answersElArray[i],
              'slideUp',
              { duration: speed*2, easing: easingQuart }
            );
          }
        })( this, i, c );

      }

    } //  end loop

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
    if ( this.msg === '' ) {
      return false;
    }

    this.state.msg = true;

    window.console.log('show msg');

    //  if there is a msg, show it
    beginFn = function() {
      this.audioMsg.innerHTML = this.msg;
    }.bind(this);

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
    var completeFn;

    if ( !this.state.msg ) {
      //  if there was no msg at all
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
    if ( this.state.score || !this.score ) {
      //  if there is score already
      return false;
    }

    window.console.log('score');

    this.state.score = true;

    velocity(
      this.audioScore,
      'fadeIn',
      { duration: speed*2, easing: easingQuart, display: 'block' }
    );

    if ( this.startTime > 0 ) {
      //  no startTime, add timeout to reset score automatically
      window.console.log('add score timer');
      this.showScoreTimer = window.setTimeout(function() {
        this.resetScore();
        this.showScoreTimer = undefined;
      }.bind(this), speed*4);
    }
  };


  this.resetScore = function() {

    var completeFn;

    if ( !this.state.score ) {
      //  if there was no score
      return false;
    }

    window.console.log('reset score');

    //  when score hides, show controls
    completeFn = function() {
      this.state.score = false;
      //  true arg prevents showControls from calling if there was audio
      this.showControls( true );
    }.bind(this);

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
    if ( this.state.controls || ( ( this.more === null ) && ( this.startTime < 0 ) && !this.state.beforeFirstPlay && !afterScore ) ) {
      //  if controls are already in
      //  or each of the single controls has no purpose and it is not afterScore and it is not before the first play
      return false;
    }

    this.state.controls = true;

    window.console.log('show controls');

    if ( this.state.answers ) {
      //  if there are answers, we want to mach the color to them
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

    if ( !this.state.controls ) {
      //  if there was no controls
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
    //  spinner's animation is controlled only by velocity
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
    var completeFn;

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
  //  PAUSE TIMER
  //  This can be moved to helper class
  //
  this.showPauseTimer = function() {
    //  if the timer is already in
    //  or there is no pause time
    if ( this.state.pauseTimer || ( this.pauseTime < 0 ) ) {
      return false;
    }

    this.state.pauseTimer = true;

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

  this.resetPauseTimer = function( now ) {

    var completeFn;
    var delayCalc;

    //  if the timer is not active
    if ( !this.state.pauseTimer ) {
      return false;
    }

    this.state.pauseTimer = false;

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
  this.clickAnswer = function(target, answerData) {
    //  controls the click event logic for answers
    //  @target comes from even handler
    //  @answerData is assign in assignAnswers

    var vibratingTimer
    var answerEl;

    if ( answerData.hasOwnProperty('next') && answerData.next ) {
      //  if not wrong, then run answer to bubble
      this.answerToBubble( answerData.next );
    }
    else if ( answerData.hasOwnProperty('wrong') && answerData.wrong ) {
      //  wrong answer, only animate, do not change anything
      window.console.log('wrong!');

      if ( this.more !== null ) {
        window.console.log('wrong answer has more');
        this.playMore();
      }

      if ( this.state.vibrating ) {
        return false;
      }

      this.state.vibrating = true;

      vibratingTimer = window.setTimeout(function() {
        //  reduce number of vibrating calls
        this.state.vibrating = false;
      }.bind(this), speed*2);


      if ( target.getAttribute('role') === 'button' ) {
        answerEl = target;
      }
      else if ( target.parentNode.getAttribute('role') === 'button' )  {
        answerEl = target.parentNode;
      }

      //  animate
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
      else {
        velocity(
        answerEl,
          { translateX: ['0', '-0.5rem'] },
          { duration: speed*4, easing: [ 5000, 20 ], queue: false }
        );
      }

    }

  };


  this.eventHandler = function(event) {

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
      if ( this.state.pauseTimer ) {
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

      if ( this.state.controls ) {
        //  get the next bubble
        this.answerToBubble( this.bubbleAutoNext );
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
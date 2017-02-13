//
// Las Audio Test
//


//
//  TODO
//  - add this.velocity hooks, to prevent layout trashing at the beggining of the app
//  - change spinner, so it looks good with answers
//  - add state to buttons, so they look clicked



function LasAudioTest() {
  "use strict";

  //
  //  Elements
  //
  this.audioFile =            document.getElementById('audio-file');
  this.wrapper =              document.getElementById('audio-test');
  this.audioMsgWrapper =      document.getElementById('audio-msg-wrapper');
  this.audioMsg =             document.getElementById('audio-msg');
  this.audioTrans =           document.getElementById('audio-trans');
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
  this.trans =                '';
  this.bubbleAutoNext =       '';
  this.startTime =            -1;
  this.stopTime =             -1;
  this.pauseTime =            -1;

  //  this will be assigned with assignAnswersData
  this.answersData =          [];

  //  this comes from the click handler
  this.nextBubbleName =       '';


  //
  //  Sequence type
  //  pimp || quiz || ''
  //
  this.sequenceType =         '';


  //
  //  State
  //  this prohibits some functions from firing more than once
  //  it's also usefull in debugging
  //
  this.state = {
    currentState:             '',   // END / INTRO / CHAT
    beforeFirstPlay:          true,
    answers:                  false,
    playing:                  false,
    score:                    false,
    msg:                      false,
    trans:                    false,
    controls:                 false,
    bubbling:                 false,
    pauseTimer:               false,
    vibrating:                false,
    spinner:                  false,
    clicked:                  false,
    prePause:                 false,
    exNumber:                 0
  };


  //  on case there is no audio file and we have pimp
  this.audioFileErrorMsg =    '<p class="size-2">';
  this.audioFileErrorMsg +=   '<svg class="emojione-svg">';
  this.audioFileErrorMsg +=   '<description>&#x1f622;</description>';
  this.audioFileErrorMsg +=   '<use xlink:href="/las/c/i/emojione.sprites.svg#emoji-1f622"></use>';
  this.audioFileErrorMsg +=   '</svg>';
  this.audioFileErrorMsg +=   '<br />Niestety nie udało nam się załadować pliku audio. Spróbuj <a href="#" onClick="window.location.reload(true);">odświerzyć</a> stronę.</p><p class="space-0">Jeśli to nie podziała, napisz do nas. Zaraz zajmiemy się tą sprawą.</p>';


  this.canNotPlayFn =         null;



  // don't use this, only for testing quick code
  var self =                  this;


  //
  //  Initiate
  //
  this.init = function() {

    window.console.log('init');

    if ( !this.audioFile ) {
      window.console.log('there is no audio file');
    }


    //  get Elements
    this.getBasicElements();

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

    //  Get the intro
    this.getNextBubble( 'INTRO' );
    this.showMsg();
    this.showControls();
  };


  //
  //  BUBBLE
  //
  this.assignBubbleData = function(no, data) {
    //  check what data is available, assign it and reset those unavailable

    //  new sequence?
    //  before assign, check the previous bubble

    var sequenceTypeData;

    //  if it is the first bubble
    if ( this.state.currentState === 'INTRO' ) {
      //  intro has no sequence type
      sequenceTypeData = false;
    }
    // if there is previous bubble and it was random, we have a new sequence
    else if ( this.currentBubbleData && ( ( this.currentBubbleData.autoNext === "RANDOM" ) || ( this.currentBubbleData.autoNext === "ENDINTRO" ) ) ) {
      sequenceTypeData = data;
    }
    else {
      sequenceTypeData = false;
    }

    //  if there is any data
    if ( sequenceTypeData ) {

      window.console.log('check sequence');

      //  if the new bubble has answers, it is a quiz
      if ( sequenceTypeData.hasOwnProperty( 'answers' ) ) {
        this.sequenceType = 'quiz';

        window.console.log('quiz');
      }
      //  if the new bubble has autoNext and pause, it is a pimp
      else if ( sequenceTypeData.hasOwnProperty( 'autoNext' ) && sequenceTypeData.hasOwnProperty( 'pauseTime' ) ) {
        this.sequenceType = 'pimp';

        window.console.log('pimp');
      }
      else {
        window.console.log('wtf is this?');
        window.console.log('not a pimp or a quiz');
      }

    }

    window.console.log('Assign bubble data');

    //  assign
    this.currentBubble = no;
    this.currentBubbleData = data;

    //  if there is time
    if ( this.currentBubbleData.hasOwnProperty('startTime') ) {

      //  assign playback times
      this.startTime = this.currentBubbleData.startTime;
      this.stopTime = this.currentBubbleData.stopTime;

      //  fix the problem with time 0
      if ( this.startTime === 0 ) {
        this.startTime = 0.01;
      }

      window.console.log('Start time: ' + this.startTime + ' Stop time: ' + this.stopTime);

    }
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
    //  it can be end
    else if ( this.state.currentState === 'END' ) {
      //  we will show finish
    }
    else {
      throw "There is no nautoNext or answers – audio test can't work";
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

    //  if there is trans
    if ( this.currentBubbleData.hasOwnProperty('trans') ) {

      //  assign the trans
      this.trans = this.currentBubbleData.trans;

    }
    else {

      //  reset trans
      this.trans = '';

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

    //  if there is no audio file, we need to inform the user
    if ( !this.audioFile ) {
      window.console.log('no way to do pimp with no audio');

      //  get error msg
      this.msg = this.audioFileErrorMsg;

      this.showMsg();
    }


    //  if there is no time (and no score?)
    if ( this.startTime < 0  ) {

      //  show answers and msg
      //  if there was time, they would be showed prePause
      this.waitForMsg();

    }
    //  there is time, so we can play it
    else {

      //  allow prepause event
      this.state.prePause = true;

      //  answers show on autoPause
      this.playAudio();


      //  if it is a pimp, we need to show msg earlier, it is blocked at waitForMsg
      //  if it is quiz, showMsg will be called at resetAnswers
      if ( this.sequenceType === 'pimp' ) {

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
    this.velocity.pauseAll();

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

    if ( this.state.playing || ( this.startTime < 0 ) || !this.audioFile ) {
      return;
    }

    //  reset listeners
    this.resetListeners();

    //  unmute just in case
    this.audioFile.muted = false;

    //  try to set the time and play
    try {
      //  set the current time
      this.audioFile.currentTime = this.startTime;

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
      //  if there was no pause time
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

    //  if the bubble has answers or msg, show them
    this.waitForMsg();

    //  if there was audio, we need to show controls
    this.showControls();
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

    }
    //  if it is the end
    else if ( this.bubbleAutoNext === 'END' ) {

      this.finish();

    }

    //  do nothing
    //  it is a rewind or we have answers

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


    if ( !this.audioFile ) {
      return;
    }

    try {
      //  set the current time for more
      this.audioFile.currentTime = this.more.startTime;

      //  prepare the autoPauseMore listener
      this.playMoreListener = function(){
        this.autoPauseMore();
      }.bind(this);

      //  add pause listener
      this.audioFile.addEventListener('timeupdate', this.playMoreListener, false);


      //  show spinner
      this.showSpinner();

      window.console.log('play more!');

      //  play more
      this.state.playing = true;
      this.audioFile.play();
    }
    catch (e) {
      window.console.log('can not set time or play');

      this.loadAudioFile();
    }

  };


  this.autoPauseMore = function() {
    //  when the time finishes, pause playback of more
    //  it is seperate from the normal autoPause,
    //  because we do not have prePause and atPause additions

    //  at the end of audio
    if ( this.audioFile.currentTime > this.more.stopTime ) {

      // reset listener
      this.resetListeners();

      window.console.log('auto pause more!');

      // pause
      this.state.playing = false;
      this.pauseAudio();

    }

  };


  this.resetListeners = function() {

    if ( !this.audioFile ) {
      return;
    }

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
    var c;
    var completeFn;

    //  answers are waiting or the timer is set or there is no answers to show
    if ( this.state.answers || !this.answersData.length ) {

      window.console.log('answers waitin or no answers');

      return false;
    }

    this.state.answers = true;

    window.console.log('show answers');

    c = this.answersData.length;

    //  Loop over answers
    for ( i = 0; i < 4; i++ ) {

      //  if there is such answer
      if ( i < c ) {

        //  we use IIFE to lock the variable i
        (function( i ) {
          this.answersElArray[i].innerHTML = this.answersData[i].answer;

          //  animate size
          this.velocity(
            this.answersElArray[i],
            'slideDown',
            { duration: this.helper.speed*2, easing: this.helper.easingSpring, display: 'block', queue: false }
          );

          //  animate border
          this.velocity(
            this.answersElArray[i],
            { borderColor: '#60B3B3' },
            { duration: this.helper.speed*2, easing: this.helper.easingQuart }
          );

          window.console.log('show answer ' + i);
        }).bind( this )( i );

      }
      //  if there is no such answer, hide it
      else {

        this.answersElArray[i].style.display = 'none';

        window.console.log('hide answer ' + i);
      }

      //  end loop
    }

  };


  this.resetAnswers = function() {
    //  reset the answers

    var i;
    var c;
    var completeFn;

    //  if there was no answers
    if ( !this.state.answers ) {
      return false;
    }

    window.console.log('reset answers');

    completeFn = function() {

      //  reset state
      this.state.answers = false;

    }.bind(this);

    c = this.answersData.length;

    //  Loop over answers
    for (i = 0; i < 4; i++) {

      //  if there is such an answer, hide it
      if ( i < c ) {

        //  IIFE to lock the i variable
        (function( i, c ) {

          this.velocity(
            this.answersElArray[i],
            { borderColor: '#308c8c' },
            { duration: this.helper.speed*2, easing: this.helper.easingQuart, queue: false }
          );

          //  if it is the last answer to reset
          if ( i === (c - 1) ) {

            this.velocity(
              this.answersElArray[i],
              'slideUp',
              { duration: this.helper.speed*2, easing: this.helper.easingQuart,
                complete: function() {
                  completeFn();
                }
              }
            );

          }
          //  all other answers
          else {

            this.velocity(
              this.answersElArray[i],
              'slideUp',
              { duration: this.helper.speed*2, easing: this.helper.easingQuart }
            );

          }

        }).bind( this )( i, c );

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
    if ( !this.msg ) {
      return false;
    }

    this.state.msg = true;

    window.console.log('show msg');

    //  if there is a msg, set it
    //  we use begin here because of the chaining
    //  if the msg is reseted and the immidiately showed again,
    //  the innerHTML would update before reset animation would finish
    beginFn = function() {

      if ( ( this.msg.substr(0, 3) === '<p>' ) && !this.audioFile ) {
        this.audioMsg.parentNode.innerHTML = this.msg;
      }
      else {
        this.audioMsg.innerHTML = this.msg;
      }

    }.bind(this);

    //  animate
    this.velocity(
      this.audioMsgWrapper,
      'slideDown',
      { duration: this.helper.speed*2, easing: this.helper.easingSpring,
        begin: function() {
          beginFn();
        }
      }
    );

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

    //  to let the msg chaining to happen
    completeFn = function() {

      //  reset state
      this.state.msg = false;

      //  reset trans
      this.resetTrans();

    }.bind(this);

    this.velocity(
      this.audioMsgWrapper,
      'slideUp',
      { duration: this.helper.speed*2, easing: this.helper.easingQuart,
        complete: function() {
          completeFn();
        }
      }
    );
  };


  this.waitForMsg = function() {

    //  if timer is already set
    //  or it is pimp
    //  in the second case, msg is showed earlier
    if ( this.waitForMsgTimer || ( this.sequenceType === 'pimp' ) ) {
      return false;
    }

    //  wait until msg is reset
    if ( this.state.msg || this.state.answers ) {

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


    //  show answers
    this.showAnswers();


    //  if it has no audio
    if ( this.startTime < 0 ) {
      window.console.log("try showControls");
      this.showControls();
    }

  };


  this.showTrans = function() {

    //  if there is no trans to show or it is already showed
    if ( !this.trans || this.state.trans ) {
      return false;
    }

    this.state.trans = true;

    window.console.log('show trans');

    this.audioTrans.innerHTML = '<i>' + this.trans + '</i>';

    //  animate
    this.velocity(
      this.audioTrans,
      'slideDown',
      { duration: this.helper.speed, easing: this.helper.easingSpring }
    );

  };


  this.resetTrans = function() {

    if ( !this.state.trans ) {
      return;
    }

    //  hide
    this.velocity(
      this.audioTrans,
      'slideUp',
      { duration: 0 }
    );

    this.audioTrans.innerHTML = '';

    this.state.trans = false;

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

    //  reset this.velocity queue
    this.velocity(
      this.audioPauseTimer,
      'stop'
    );

    //  if @now arg is true, there is no delay in hiding the
    if ( now ) {
      delayCalc = 0;
    }
    else {
      delayCalc = 1000 - this.helper.speed*2;
    }

    this.velocity(
      this.audioPauseTimer,
      'fadeOut',
      { duration: this.helper.speed*2, easing: this.helper.easingQuart, delay: delayCalc }
    );

  };


  //
  //  SCORE
  //
  this.showScore = function() {
    //  this shows that the user made a good decision

    var completeFn,
        leftPx;

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

    //  hook the current state of audioScore
    //  ! TO REMOVE
    this.velocity.hook( this.audioScore, 'translateX', '-50%' );
    this.velocity.hook( this.audioScore, 'translateY', '-40%' );
    this.velocity.hook( this.audioScore, 'scale', '0' );

    //  some numbers in Bariol are not centered properly
    //  this fixes it
    if ( ( this.state.exNumber === 1 )  || ( this.state.exNumber === 11 ) ) {
      leftPx = '-4px';
    }
    else if ( this.state.exNumber === 4 ) {
      leftPx = '-5px';
    }
    else {
      leftPx = '0';
    }

    this.velocity.hook( this.audioScoreNumber, 'left', leftPx );

    //  call resetScore after the animation has completed
    completeFn = function() {

      this.resetScore();

    }.bind(this);

    this.velocity(
      this.audioScore,
      { opacity: [1, 0], scale: 1 },
      { duration: this.helper.speed, easing: this.helper.easingQuart, display: 'block',
        complete: function() {
          completeFn();
        }
      }
    );

    this.velocity(
      this.audioScoreNumber,
      { scale: [1.5, 1] },
      { duration: this.helper.speed, easing: this.helper.easingQuart, delay: this.helper.speed }
    );

    this.velocity(
      this.audioScoreNumber,
      { scale: 1 },
      { duration: this.helper.speed*2, easing: this.helper.easingQuart }
    );


    /*window.console.log('add score timer');

    //  Add the timer to reset score
    this.showScoreTimer = window.setTimeout(function() {

      this.resetScore();
      this.showScoreTimer = undefined;

    }.bind(this), this.helper.speed*4);*/

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

    //  prevent score from showing again, before it is fully reset
    completeFn = function() {

      this.state.score = false;

    }.bind(this);

    //  animate
    this.velocity(
      this.audioScore,
      'fadeOut',
      { duration: this.helper.speed*2, easing: this.helper.easingQuart, delay: this.helper.speed,
        complete: function() {
          completeFn();
        }
      }
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


  this.resetSpinner = function() {
    //  if there was no spinner
    if ( !this.state.spinner ) {
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






  this.finish = function() {

    window.console.log('END');

    //  here we need to redirect user to the next ex

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

      //  assign next bubble name
      this.nextBubbleName = answerData.next;

      //  convert
      this.answerToBubble();

      //  show score
      this.showScore();

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
      }.bind(this), this.helper.speed*2);


      //  check if user clicked on button or some node inside it
      //  we want to animate only the button
      if ( target.getAttribute('role') === 'button' ) {
        answerEl = target;
      }
      else if ( target.parentNode.getAttribute('role') === 'button' )  {
        answerEl = target.parentNode;
      }


      //  animate

      //  if there is next, show the answer is wrong with color change
      if ( answerData.hasOwnProperty('next') && answerData.next ) {
        this.velocity(
          answerEl,
          { backgroundColor: '#c55c27' },
          { duration: this.helper.speed, easing: this.helper.easingQuart }
        );

        this.velocity(
          answerEl,
          'reverse',
          { duration: this.helper.speed*4, easing: this.helper.easingQuart }
        );
      }
      //  if there is no next, only vibrate the answer
      else {
        this.velocity(
          answerEl,
          { translateX: ['0', '-0.5rem'] },
          { duration: this.helper.speed*4, easing: [ 5000, 20 ], queue: false }
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
    else if ( ( event.target.id === 'audio-msg-wrapper' ) || ( event.target.parentNode.id === 'audio-msg-wrapper' ) ) {
      //  show trans

      this.showTrans();
    }

    //  if controls are inactive, don't allow the below from testing
    if ( !this.state.controls ) {
      return;
    }

    if ( ( event.target.id === 'audio-rewind' ) || ( event.target.parentNode.id === 'audio-rewind' ) ) {

      //  if controls are inactive, don't allow the click
      if ( !this.state.controls ) {
        return;
      }

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

      //  if it is the first time user clicks play
      if ( this.state.beforeFirstPlay ) {
        this.state.beforeFirstPlay = false;
      }

      if ( this.state.currentState === 'END' ) {
        this.finish();
        return false;
      }

      //  assign next bubble
      this.nextBubbleName = this.bubbleAutoNext;

      //  convert
      this.answerToBubble();

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

    /*this.wrapper.addEventListener('touchend', function(event) {

      this.eventHandler(event);

    }.bind(this), false);*/

    this.wrapper.addEventListener('click', function(event) {

      //  ignore right click
      if (event.which === 1) {

        this.eventHandler(event);

      }

    }.bind(this), false);

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



  this.test = function() {
    var property;
    var data = this.lasData.chat;
    var bubble;
    var content;
    var bubbleData;
    var bubbleProp;
    var line;
    var i;
    var answers;
    var answersL;

    this.wrapper.innerHTML = '';

    //  iteriate over all data props
    for ( property in data ) {
      if ( data.hasOwnProperty(property) ) {

        //  create bubble
        bubble = document.createElement('div');
        bubble.className = 'pad section-dark space size-0';
        bubble.style.position = 'relative';

        //  reset content
        content = '';

        bubbleData = data[property];

        for ( bubbleProp in bubbleData ) {
          if ( bubbleData.hasOwnProperty(bubbleProp) ) {

            if ( ( bubbleProp === 'msg' ) || ( bubbleProp === 'spokenWord' ) ) {
              content += '<p class="size-1 space-half">' + bubbleData[bubbleProp] + '</p>';
            }
            else if ( bubbleProp === 'trans' ) {
              content += '<p class="size-1 space-half" style="opacity:0.75;"><i>Trans</i>: ' + bubbleData[bubbleProp] + '</p>';
            }
            else if ( ( bubbleProp === 'answers' ) ) {

              answers = bubbleData.answers;
              answersL = answers.length;

              content += 'Odpowiedzi:<br />';


              for (i = 0; i < answersL; i++) {

                if ( answers[i].wrong ) {
                  content += '<span style="width:0.5rem;height:0.5rem;border-radius:50%;vertical-align: middle;margin-left:0.5rem;margin-right:0.5rem;background-color:#dd4b39;display:inline-block;"></span>' + answers[i].answer;
                }
                else {
                  content += '<span style="width:0.5rem;height:0.5rem;border-radius:50%;vertical-align: middle;margin-left:0.5rem;margin-right:0.5rem;background-color:#308c8c;display:inline-block;"></span>' + answers[i].answer
                }

                content += '<br />';

              }


            } else {
              content += ' <span style="opacity:0.75;">| ' + bubbleProp + ': ' + bubbleData[bubbleProp] + '</span>';
            }

            if ( ( bubbleProp === 'startTime' ) && this.audioFile ) {
              content += '<button style="position:absolute;right:0.5rem;top:0.5rem;" class="btn btn-white btn-small" onClick="las.playAudioTestMode(' + bubbleData.startTime +  ', ' + bubbleData.stopTime + ');">TestAudio &raquo;</button>';
            }

          }

        }

        bubble.innerHTML = content;
        this.wrapper.appendChild(bubble);

      // end if has property
      }
    // end loop
    }


  };

}

//
//  Extend with LasHelper methods
//
LasAudioTest.prototype = new LasHelper();
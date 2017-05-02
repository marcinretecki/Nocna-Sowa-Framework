//
//  Las Audio Test
//


//
//  TODO
//  - add this.velocity hooks, to prevent layout trashing at the beggining of the app
//  - change spinner, so it looks good with answers
//  - add state to buttons, so they look clicked



function LasAudioTest() {
  "use strict";

  //  get methods from the LasHelper
  //  we can add new methods or overwrite old ones
  var las = new LasHelper();


  //
  //  Elements
  //
  las.audioFile =            document.getElementById('audio-file');
  las.wrapper =              document.getElementById('audio-test');
  las.audioMsgWrapper =      document.getElementById('audio-msg-wrapper');
  las.audioMsg =             document.getElementById('audio-msg');
  las.audioTrans =           document.getElementById('audio-trans');
  las.audioScore =           document.getElementById('audio-score');
  las.audioScoreNumber =     document.getElementById('audio-score-number');
  las.audioControls =        document.getElementById('audio-controls');
  las.audioSpinner =         document.getElementById('audio-spinner');
  las.audioPauseTimer =      document.getElementById('audio-pause-timer');
  las.audioMore =            document.getElementById('audio-more');
  las.audioNext =            document.getElementById('audio-next');
  las.audioRewind =          document.getElementById('audio-rewind');

  //  answers
  las.answersEl =            document.getElementById('audio-test-answers');
  las.answersElArray =       [];
  las.answersElArray[0] =    document.getElementById('answer-one');
  las.answersElArray[1] =    document.getElementById('answer-two');
  las.answersElArray[2] =    document.getElementById('answer-three');
  las.answersElArray[3] =    document.getElementById('answer-four');

  //  we use this to start downloading images earlier
  las.prefetch =             document.createElement('div');




  //  this will we assigned at assignBubbleData
  las.currentBubbleData =    null;
  las.more =                 null;
  las.msg =                  '';
  las.trans =                '';
  las.bubbleAutoNext =       '';



  //  this will be assigned with assignAnswersData
  las.answersData =          [];

  //  this comes from the click handler
  las.nextBubbleName =       '';


  //
  //  Sequence type
  //  pimp || quiz || ''
  //
  las.sequenceType =         '';


  //
  //  State
  //  this prohibits some functions from firing more than once
  //  it's also usefull in debugging
  //
  las.state = {
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
  las.audioFileErrorMsg =    '<p class="size-2">';
  las.audioFileErrorMsg +=   '<svg class="emojione-svg">';
  las.audioFileErrorMsg +=   '<description>&#x1f622;</description>';
  las.audioFileErrorMsg +=   '<use xlink:href="/las/c/i/emojione.sprites.svg#emoji-1f622"></use>';
  las.audioFileErrorMsg +=   '</svg>';
  las.audioFileErrorMsg +=   '<br />Niestety nie udało nam się załadować pliku audio. Spróbuj <a href="#" onClick="window.location.reload(true);">odświerzyć</a> stronę.</p><p class="space-0">Jeśli to nie podziała, napisz do nas. Zaraz zajmiemy się tą sprawą.</p>';


  las.canNotPlayFn =         null;






  //
  //  Initiate
  //
  las.init = function() {

    window.console.log('init');

    if ( !this.audioFile ) {
      window.console.log('there is no audio file');
    }


    //
    //  Get Data
    //
    this.lasData =              new LasAudioData();


    //  get Elements
    this.getBasicElements();

    //  Random chat arrays
    this.randomIntroArray =     this.getRandomArrayOfFirstBubbles( this.lasData.intro );
    this.randomChatArray =      this.getRandomArrayOfFirstBubbles( this.lasData.chat );
    this.randomEndArray =       this.getRandomArrayOfFirstBubbles( this.lasData.end );

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
  //  check what data is available, assign it and reset those unavailable
  //
  las.assignBubbleData = function(no, data) {


    //  new sequence?
    //  before assign, check the previous bubble

    var sequenceTypeData;
    var audioObject;
    var audioStackL;

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


    //  reset
    this.audioStack.stack = [];
    this.audioStack.pointer = 0;
    this.currentAudioObject = {};
    this.bubbleAutoNext = '';
    this.msg = '';
    this.trans = '';
    this.more = null;


    //
    //  Create new audioObject
    //
    audioObject = this.createNewAudioObject( this.currentBubbleData );
    //  Push new audio object onto the stack
    if ( audioObject ) {
      audioStackL = this.audioStack.stack.push( audioObject );
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


    }
    //  it can be end
    else if ( this.state.currentState === 'END' ) {
      //  we will show finish
    }
    else {
      throw "There is no autoNext or answers – audio test can't work";
    }

    //  if there is msg
    if ( this.currentBubbleData.hasOwnProperty('msg') ) {

      //  assign the msg
      this.msg = this.currentBubbleData.msg;

    }

    //  if there is trans
    if ( this.currentBubbleData.hasOwnProperty('trans') ) {

      //  assign the trans
      this.trans = this.currentBubbleData.trans;

    }


    //  if there is more
    if ( this.currentBubbleData.hasOwnProperty('more') ) {

      //  assign more
      this.more = this.currentBubbleData.more;

    }


  };


  las.assignAnswersData = function() {
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


  las.createBubble = function() {
    //  here we have audio/quiz logic when the new bubble should appear

    //  if it is the end
    if ( this.bubbleAutoNext === 'END' ) {

      this.finish();
      return;

    }

    //  if there is no audio file, we need to inform the user
    if ( !this.audioFile ) {
      window.console.log('no way to do pimp with no audio');

      //  get error msg
      this.msg = this.audioFileErrorMsg;

      this.showMsg();
    }


    //  if there is no time (and no score?)
    if ( this.audioStack.stack.length === 0  ) {

      //  show answers and msg
      //  if there was time, they would be showed prePause
      this.waitForMsg();

    }
    //  there is time, so we can play it
    //  answers show on autoPause
    else {

      //  allow prePause event
      this.state.prePause = true;

      //  play Audio
      this.playAudio();

    }


    //  if it is a pimp, we need to show msg earlier, it is blocked at waitForMsg
    //  if it is quiz, showMsg will be called at resetAnswers
    //  I added waitForMsg earlier, so this one should be useless now
/*    if ( this.sequenceType === 'pimp' ) {

      this.showMsg();

    }*/

  };


  las.answerToBubble = function() {
    //  convert clicked answer into the next bubble

    //  this one prevents some glitches
    if ( this.state.bubbling ) {
      return false;
    }

    this.state.bubbling = true;

    //  stop all animations
    //  is this necessary?
    //  this.velocity.pauseAll();

    //  pause, if user clicked an answer, we need to pause audio, so we can play the next one
    this.pauseAudio();

    window.console.log('answerToBubble');
    window.console.log(this.nextBubbleName);

    //  reset everything
    this.resetMsg();
    this.resetAnswers();
    this.resetControls();
    this.resetAudioListeners();
    this.resetSpinner();

    //  get next bubble
    this.getNextBubble( this.nextBubbleName );

    //  create new bubble
    this.createBubble();

    //  reset bubbling state
    this.state.bubbling = false;

  };


  //
  //  AUDIO PAUSE EVENTS
  //

  las.prePause = function() {
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


  las.atPause = function() {
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


  //
  //  ANSWERS
  //
  las.showAnswers = function() {

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


  las.resetAnswers = function() {
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
  las.showMsg = function() {
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

        //  set the cursor on msg
        if ( this.trans ) {
          this.audioMsgWrapper.style.cursor = 'pointer';
        }
        else {
          this.audioMsgWrapper.style.cursor = 'auto';
        }

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


  las.resetMsg = function() {
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


  las.waitForMsg = function() {

    //  if timer is already set
    //  or it is pimp
    //  in the second case, msg is showed earlier
    if ( this.waitForMsgTimer /*|| ( this.sequenceType === 'pimp' )*/ ) {
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
    if ( !this.isCorrectAudioStack() ) {
      window.console.log("try showControls");
      this.showControls();
    }

  };


  las.showTrans = function() {

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


  las.resetTrans = function() {

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
  las.showControls = function() {

    //  if controls are already in
    //  or there is no time && no more && it is not before the first play
    if (        this.state.controls
          || ( !this.more && !this.state.beforeFirstPlay && ( this.bubbleAutoNext !== 'RANDOM' ) && !this.isCorrectAudioStack() )
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
    if ( this.isCorrectAudioStack() && this.audioFile  ) {
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


  las.resetControls = function() {
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
  //  SCORE
  //
  las.showScore = function() {
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


  las.resetScore = function() {
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







  las.finish = function() {

    //  add one to progress
    this.cookieSetT();

    window.console.log('END');

    //  here we can show summary user to the next ex

  };


  //
  //  HELPERS
  //
  las.clickAnswer = function( target, answerData ) {
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

      //  add one to progress progress
      this.cookiePlusOne( 'wrong' );


      window.console.log('wrong!');

      if ( this.more !== null ) {
        window.console.log('wrong answer has more');
        //  assign play times
        this.currentAudioObject = this.more;

        //  play audio
        this.playAudio();
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


  las.eventHandler = function( event ) {
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

      //  add one to progress
      this.cookiePlusOne( 'trans' );

      this.showTrans();
    }

    //  if controls are inactive, don't allow the below from testing
    if ( !this.state.controls ) {
      return;
    }

    if ( ( event.target.id === 'audio-rewind' ) || ( event.target.parentNode.id === 'audio-rewind' ) ) {

      //  we are/were playing other file than stack
      if ( this.state.playing && this.isCorrectAudioObject( this.currentAudioObject ) ) {

        //  add one to progress progress
        this.cookiePlusOne( 'repeat' );

        this.rewindAudio();

      }
      //  we are (probably playing main stack
      else if ( this.state.playing ) {

        this.pauseAudio();


      }
      //  nothing is playing, simply rewind
      else {

        //  add one to progress progress
        this.cookiePlusOne( 'repeat' );

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

      //  if more is playing now, pause it
      if ( this.state.playing && this.isCorrectAudioObject( this.currentAudioObject ) ) {

        this.pauseAudio();

      }
      //  if nothing or something else is playing
      else {

        this.pauseAudio();

        //  add one to progress
        this.cookiePlusOne( 'more' );

        //  assign play times
        this.currentAudioObject = this.more;

        //  play audio
        this.playAudio();
      }
    }

    event.preventDefault();
    return false;

  };


  las.addListener = function() {
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




  las.test = function() {
    var property;
    var data = this.lasData.chat;
    var testNotes = this.lasData.testNotes;
    var testNotesEl;
    var testNotesContent = '';
    var bubble;
    var content;
    var bubbleData;
    var bubbleProp;
    var line;
    var i;
    var j;
    var answers;
    var answersL;
    var moreProp;
    var moreData;
    var quantity = 0;

    //  clean wrapper
    this.wrapper.innerHTML = '';


    if ( testNotes ) {
      //  create test notes
      testNotesEl = document.createElement('div');
      testNotesEl.className = 'pad section-dark space size-0';
      testNotesEl.style.position = 'relative';
      testNotesContent += '<p class="size-1 space-half">Test Notes</p><ul class="light-dots">';

      //  show test notes
      for ( j = 0; j < testNotes.length; j++ ) {

        testNotesContent += '<li>' + testNotes[j] + '</li>';

      }

      testNotesContent += '</ul>';

      testNotesEl.innerHTML = testNotesContent;
      this.wrapper.appendChild(testNotesEl);
    }

    if ( data ) {
      //  iteriate over all data props
      for ( property in data ) {
        if ( data.hasOwnProperty(property) ) {

          //  if it is has 1 in prop name, then add to quantity
          if ( property.slice(-1) === '1' ) {
            quantity++;
          }

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

                content += '<div style="margin:0.5rem 0;">Odpowiedzi:<br />';


                for (i = 0; i < answersL; i++) {

                  if ( answers[i].wrong ) {
                    content += '<span style="width:0.5rem;height:0.5rem;border-radius:50%;vertical-align: middle;margin-left:0.5rem;margin-right:0.5rem;background-color:#dd4b39;display:inline-block;"></span>' + answers[i].answer;
                  }
                  else {
                    content += '<span style="width:0.5rem;height:0.5rem;border-radius:50%;vertical-align: middle;margin-left:0.5rem;margin-right:0.5rem;background-color:#308c8c;display:inline-block;"></span>' + answers[i].answer;
                  }

                  content += '<br />';

                }

                content += '</div>';

              }
              else if ( ( bubbleProp === 'more' ) ) {

                moreData = bubbleData[bubbleProp];

                for ( moreProp in moreData ) {
                  if ( moreData.hasOwnProperty(moreProp) ) {

                    if ( moreProp === 'spokenWord' ) {

                      content += '<p class="size-1 space-half" style="opacity:0.75;"><i>More</i>: ' + moreData[moreProp] + '</p>';

                    }
                    else {
                      content += ' <span style="opacity:0.75;">| ' + moreProp + ': ' + moreData[moreProp] + '</span>';
                    }


                  }
                }

              }
              else {
                content += ' <span style="opacity:0.75;">| ' + bubbleProp + ': ' + bubbleData[bubbleProp] + '</span>';
              }

              if ( ( bubbleProp === 'startTime' ) && this.audioFile ) {
                content += '<button style="position:absolute;right:0.5rem;top:0.5rem;" class="btn btn-white btn-small" onClick="las.playAudioTestMode(' + bubbleData.startTime +  ', ' + bubbleData.duration + ');">TestAudio &raquo;</button>';
              }

            }

          }

          bubble.innerHTML = content;
          this.wrapper.appendChild(bubble);

        // end if has property
        }
      // end loop
      }

      // dodaj liczby do testNotesEl
      testNotesEl.appendChild( document.createElement('p') );
      testNotesEl.lastChild.className = 'size-0 space-0';
      testNotesEl.lastChild.innerHTML = 'Ilość zestawów pytań: ' + quantity;

    //  end if data
    }

  };



  //  return augmented object
  return las;

}
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
  las.wrapper =               document.getElementById('audio-test');
  las.audioMsgWrapper =       document.getElementById('audio-test-msg');
  las.audioMsg =              document.getElementById('audio-test-msg-main');
  las.audioTrans =            document.getElementById('audio-test-msg-trans');
  las.audioControls =         document.getElementById('audio-controls');
  las.audioSpinner =          document.getElementById('audio-spinner');
  las.audioPauseTimer =       document.getElementById('audio-pause-timer');
  las.audioMore =             document.getElementById('audio-more');
  las.audioNext =             document.getElementById('audio-next');
  las.audioRewind =           document.getElementById('audio-rewind');


  //  answers
  las.answersWrapper =        document.getElementById('audio-test-answers');
  las.answerElements =        [];
  las.answerElements[0] =     document.getElementById('answer-0');
  las.answerElements[1] =     document.getElementById('answer-1');
  las.answerElements[2] =     document.getElementById('answer-2');
  las.answerElements[3] =     document.getElementById('answer-3');

  //  we use this to start downloading images earlier
  las.prefetch =              document.createElement('div');


  //
  //  Data
  //
  //  this will we assigned at assignBubbleData
  //
  las.currentBubbleData =     null;


  //
  //  Clicked Answer
  //
  las.clickedAnswer =         0;
  las.clickedAnswerEl =       null;


  //
  //  State
  //  this prohibits some functions from firing more than once
  //  it's also usefull in debugging
  //
  las.state = {
    currentState:             '',   // END / INTRO / CHAT
    answers:                  false,
    playing:                  false,
    msg:                      false,
    trans:                    false,
    controls:                 false,
    bubbling:                 false,
    pauseTimer:               false,
    vibrating:                false,
    spinner:                  false,
    clicked:                  false,
    prePause:                 false,
    testmode:                 false
  };


  //  this should go to egen function
  //  on case there is no audio file and we have pimp
  las.audioFileErrorMsg =     '<p class="size-2">';
  las.audioFileErrorMsg +=    '<svg class="emojione-svg">';
  las.audioFileErrorMsg +=    '<description>&#x1f622;</description>';
  las.audioFileErrorMsg +=    '<use xlink:href="/las/c/i/emojione.sprites.svg#emoji-1f622"></use>';
  las.audioFileErrorMsg +=    '</svg>';
  las.audioFileErrorMsg +=    '<br />Niestety nie udało nam się załadować pliku audio. Spróbuj <a href="#" onClick="window.location.reload(true);">odświerzyć</a> stronę.</p><p class="space-0">Jeśli to nie podziała, napisz do nas. Zaraz zajmiemy się tą sprawą.</p>';



  //
  //  tego nigdzie nie ma, po co to?
  //  czy tu mieliśmy dać funkcję, gdy nie ma audio
  //  a bubble nie ma msg (jest pimp)?
  //
  las.canNotPlayFn =          null;






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
    this.lasData =              new LasData();

    //  get Elements
    this.getBasicElements();

    //  Prepare
    this.addListener();

    //  If not test mode, begin
    //  Get the intro
    if ( !las.state.testmode ) {
      this.hideLoader();

      this.currentBubbleData = this.getNextBubble( 'INTRO' );

      this.createBubble();

    }
  };


  //
  //  Create Bubble
  //
  las.createBubble = function() {
    //  here we have audio/quiz logic when the new bubble should appear



    //
    //  z tym poniżej trzeba pomyśleć.....
    //

    //  if there is no audio file, we need to inform the user
    //  if ( !this.audioFile ) {
    //    window.console.log('no way to do pimp with no audio');

    //    //  get error msg

    //    //
    //    //  Add special function just to show error msgs
    //    //
    //    this.currentBubbleData.msg = this.audioFileErrorMsg;

    //    this.showMsg();
    //  }


    var audioObject;
    var audioStackL;


    //  If this is the END
    if ( this.currentBubbleData.state === 'END' ) {
      this.finish();
      return;
    }


    //  reset audio stack
    this.audioStack.stack = [];
    this.audioStack.pointer = 0;
    this.currentAudioObject = {};


    //
    //  Create new audioObject
    //
    audioObject = this.createNewAudioObject( this.currentBubbleData );

    //  Push new audio object onto the stack
    if ( audioObject ) {
      audioStackL = this.audioStack.stack.push( audioObject );
    }


    //  there is either autoNext or answers, never both

    //  if there is no autoNext or answers
    if ( !( this.currentBubbleData.hasOwnProperty('autoNext') || this.currentBubbleData.hasOwnProperty('answers') ) ) {

      throw "There is no autoNext or answers – audio test can't work";

    }


    //  if there is no time
    if ( this.audioStack.stack.length === 0  ) {

      //  show answers and msg
      //  if there was time, they would be showed prePause
      this.waitForMsg();
      return;

    }
    //  there is time, so we can play it
    //  answers show on autoPause
    else {

      //  allow prePause event
      this.state.prePause = true;

      //  play Audio
      this.playAudio();

    }


  };


  //
  //  Answer to Bubble
  //
  las.answerToBubble = function() {

    //  this one prevents some glitches
    if ( this.state.bubbling ) {
      return false;
    }

    //  if was wrong answer, vibrate and return
    if ( this.clickedAnswer.score === 'wrong' ) {

      window.console.log('wrong!');
      this.markWrongAnswer();

      return false;
    }


    this.state.bubbling = true;


    //  pause, if user clicked an answer, we need to pause audio, so we can play the next one
    this.pauseAudio();

    //  reset everything
    this.resetMsg();
    this.resetAnswers();
    this.resetControls();
    this.resetAudioListeners();
    this.resetSpinner();

    //  get next bubble
    this.currentBubbleData = this.getNextBubble( this.clickedAnswer.next );

    //  create new bubble
    this.createBubble();

    //  reset bubbling state
    this.state.bubbling = false;

  };


  //  Next bubble
  las.nextToBubble = function() {

    this.clickedAnswer = {
      next: this.currentBubbleData.autoNext
    };

    this.answerToBubble();

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
    if ( this.currentBubbleData.autoNext && ( this.currentBubbleData.autoNext !== 'RANDOM' ) ) {

      //  get next bubble
      this.currentBubbleData = this.getNextBubble( this.currentBubbleData.autoNext );

      //  create new bubble
      this.createBubble();

    }

    //  do nothing
    //  it is a rewind or we have answers

  };


  //
  //  ANSWERS
  //
  las.showAnswers = function() {

    var i;
    var l;
    var completeFn;

    //  answers are waiting or the timer is set or there is no answers to show
    if ( this.state.answers || !this.currentBubbleData.answers ) {

      window.console.log('answers waitin or no answers');

      return false;
    }

    this.state.answers = true;

    //  Shuffle answers
    this.currentBubbleData.answers = this.shuffleArray( this.currentBubbleData.answers );

    window.console.log('show answers');

    l = this.currentBubbleData.answers.length;

    //  Loop over answers
    for ( i = 0; i < 4; i++ ) {

      //  if there is such answer
      if ( i < l ) {

        //  we use IIFE to lock the variable i
        (function( i ) {
          this.answerElements[i].innerHTML = this.currentBubbleData.answers[i].answer;

          //  animate size
          this.velocity(
            this.answerElements[i],
            'slideDown',
            { duration: 2 * this.helper.speed, easing: this.helper.easingSpring, display: 'block', queue: false }
          );

          //  animate border
          this.velocity(
            this.answerElements[i],
            { borderColor: '#60B3B3' },
            { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
          );

          window.console.log('show answer ' + i);
        }).bind( this )( i );

      }
      //  if there is no such answer, hide it
      else {

        this.answerElements[i].style.display = 'none';

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

    c = this.currentBubbleData.answers.length;

    //  Loop over answers
    for (i = 0; i < 4; i++) {

      //  if there is such an answer, hide it
      if ( i < c ) {

        //  IIFE to lock the i variable
        (function( i, c ) {

          this.velocity(
            this.answerElements[i],
            { borderColor: '#308c8c' },
            { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, queue: false }
          );

          //  if it is the last answer to reset
          if ( i === (c - 1) ) {

            this.velocity(
              this.answerElements[i],
              'slideUp',
              { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, queue: false,
                complete: function() {
                  completeFn();
                }
              }
            );

          }
          //  all other answers
          else {

            this.velocity(
              this.answerElements[i],
              'slideUp',
              { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, queue: false }
            );

          }

        }).bind( this )( i, c );

      }

      //  end loop
    }

  };


  las.markWrongAnswer = function() {

    var vibratingTimer;

    if ( this.state.vibrating ) {
      return false;
    }

    this.state.vibrating = true;

    //  reduce number of vibrating calls
    vibratingTimer = window.setTimeout(function() {
      this.state.vibrating = false;
    }.bind(this), this.helper.speed*2);


    //  vibrate
    this.velocity(
        this.clickedAnswerEl,
      { translateX: ['0', '-0.5rem'] },
      { duration: 4 * this.helper.speed, easing: [ 5000, 20 ], queue: false }
    );

    //  change color
    this.velocity(
      this.clickedAnswerEl,
      { backgroundColor: '#c55c27' },
      { duration: this.helper.speed, easing: this.helper.easingQuart, queue: false }
    );

    this.velocity(
      this.clickedAnswerEl,
      { backgroundColorAlpha: 0 },
      { duration: 4 * this.helper.speed, easing: this.helper.easingQuart }
    );


  };


  //
  //  MESSAGE
  //
  las.showMsg = function() {
    var beginFn;

    //  we do not check state here, because we want to use Velocity chaining
    //  but we need to check if there is a msg to show
    if ( !this.currentBubbleData.msg ) {
      return false;
    }

    this.state.msg = true;

    window.console.log('show msg');

    //  if there is a msg, set it
    //  we use begin here because of the chaining
    //  if the msg is reseted and the immidiately showed again,
    //  the innerHTML would update before reset animation would finish
    beginFn = function() {

      window.console.log('begin velocity show msg');

      this.audioMsg.innerHTML = this.currentBubbleData.msg;

      //  set the cursor on msg
      if ( this.currentBubbleData.trans ) {
        this.audioMsgWrapper.style.cursor = 'pointer';
      }
      else {
        this.audioMsgWrapper.style.cursor = 'auto';
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
    if ( this.waitForMsgTimer ) {
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
    if ( !this.currentBubbleData.trans || this.state.trans ) {
      return false;
    }

    this.state.trans = true;

    window.console.log('show trans');

    this.audioTrans.innerHTML = '<i>' + this.currentBubbleData.trans + '</i>';

    //  animate
    this.velocity(
      this.audioTrans,
      'slideDown',
      { duration: this.helper.speed, easing: this.helper.easingSpring }
    );

    //  add one to progress
    this.addScore( 'trans' );

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

    this.state.trans = false;

  };



  //
  //  CONTROLS
  //
  las.showControls = function() {


    //  jest msg i autoNext
    //  lub są odpowiedzi i audio
    if ( !(    ( this.currentBubbleData.msg && this.currentBubbleData.autoNext )
            || ( this.currentBubbleData.answers && this.isCorrectAudioStack() ) ) ) {
      return;
    }


    this.state.controls = true;

    window.console.log('show controls');

    //  reset color
    this.audioControls.classList.remove( 'section-green' );
    this.audioControls.classList.remove( 'section-dark' );

    //  match the color to answers or msg
    if ( this.state.answers ) {
      this.audioControls.classList.add( 'section-green' );
    }
    else {
      this.audioControls.classList.add( 'section-dark' );
    }

    //  show the whole controls bar
    this.velocity(
      this.audioControls,
      'slideDown',
      { duration: 2 * this.helper.speed, easing: this.helper.easingSpring }
    );

    //  below, each this.velocity call need display: block, or buttons will be showed as inline-block

    //  if there is more audio, show MORE button
    if ( this.currentBubbleData.more && this.audioFile ) {
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
    if ( !this.currentBubbleData.answers ) {
      window.console.log('show next button');
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
  //  HELPERS
  //

  //
  //  this decides what happens after each click
  //  @event comes from addListener
  //
  las.eventHandler = function( event ) {

    var elWithId;
    var answerSplit;
    var answerNo;

    //  throttle clicks
    if ( this.checkClickState() ) {
      return;
    }

    //  traverse up to find the element with ID
    elWithId = this.checkNodeAndParents( event, false, 'id' );


    //  Answer
    if ( elWithId && ( elWithId.id.indexOf('answer-') !== -1 ) && this.state.answers ) {

      answerSplit = elWithId.id.split('-');

      //  answer has number
      if ( answerSplit.length > 1 ) {

        answerNo = answerSplit[1];

        //  assign clicked answer
        this.clickedAnswer = this.currentBubbleData.answers[ answerNo ];
        this.clickedAnswerEl = this.answerElements[ answerNo ];


        //  Add score by answer
        this.addScoreAnswer();


        //
        //
        //  tu zamiast assign, moze być samo przekazanie numeru odpowiedzi do   answerToBubble

        //  Answer to Bubble
        this.answerToBubble();



        //  If this is the END
        if ( this.clickedAnswer.hasOwnProperty('next') && ( this.clickedAnswer.next === 'END' ) ) {

          this.finish();

        }

      }

      //  stop eventHandler
      event.stopPropagation();
      return;

    }


    //  Skip
    if ( elWithId && ( ( elWithId.id === 'audio-skip-pause' ) || ( elWithId.id === 'audio-pause-timer' ) ) ) {

      //  skip the pause
      if ( this.state.skipButton ) {
        this.skipPauseTimers();
      }

      //  stop eventHandler
      event.stopPropagation();
      return;

    }


    //  Translate
    if ( elWithId && ( elWithId.id === 'audio-test-msg' ) ) {

      this.showTrans();

      //  stop eventHandler
      event.stopPropagation();
      return;
    }


    //
    //  Controls
    //

    //  if controls are inactive, don't allow the below from testing
    if ( !this.state.controls ) {
      return;
    }


    //  Next
    if ( elWithId && ( elWithId.id === 'audio-next' ) ) {

      this.nextToBubble();

      //  stop eventHandler
      event.stopPropagation();
      return;

    }


    //  Rewind
    if ( elWithId && ( elWithId.id === 'audio-rewind' ) ) {

      //  we are/were playing other file than stack
      if ( this.state.playing && this.isCorrectAudioObject( this.currentAudioObject ) ) {

        this.rewindAudio();

      }
      //  we are (probably playing main stack
      else if ( this.state.playing ) {

        this.pauseAudio();


      }
      //  nothing is playing, simply rewind
      else {

        this.rewindAudio();
      }

      //  stop eventHandler
      event.stopPropagation();
      return;

    }


    //  More
    if ( elWithId && ( elWithId.id === 'audio-more' ) ) {

      //  if more is playing now, pause it
      if ( this.state.playing && this.isCorrectAudioObject( this.currentAudioObject ) ) {

        this.pauseAudio();

      }
      //  if nothing or something else is playing
      else {

        this.pauseAudio();

        //  add one to progress
        this.addScore( 'more' );

        //  assign play times
        this.currentAudioObject = this.currentBubbleData.more;

        //  play audio
        this.playAudio();
      }

      //  stop eventHandler
      event.stopPropagation();
      return;
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


  //
  //  Testmode
  //
  las.test = function() {

    var data = this.lasData;
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
    var loopDataFn;
    var bigLineCss = 'width:100%;padding-top:2rem;padding-bottom:2rem;background: rgba(0,0,0,0.15);color: #fff;text-align:center;clear:both;margin:2rem 0;';


    //  clean wrapper
    this.wrapper.innerHTML = '';

    line = document.createElement('div');
    line.className = 'pad section-dark space size-0';
    line.innerHTML = '<p class="space-0">Category: ' + data.category + '<br />' + 'Max correct: ' + this.countMaxCorrectAnswers(data.chat) + '<br />' + 'Extra: ' + this.countMaxCorrectAnswers(data.extra) + '</p>';
    this.wrapper.appendChild(line);


    if ( testNotes ) {
      //  create test notes
      testNotesEl = document.createElement('div');
      testNotesEl.className = 'pad section-dark space size-0 space-4';
      testNotesEl.style.position = 'relative';
      testNotesContent += '<p class="size-1 space-half">Test Notes</p>';
      testNotesContent += '<ul class="light-dots">';

      //  show test notes
      for ( j = 0; j < testNotes.length; j++ ) {

        testNotesContent += '<li>' + testNotes[j] + '</li>';

      }

      testNotesContent += '</ul>';

      testNotesEl.innerHTML = testNotesContent;
      this.wrapper.appendChild(testNotesEl);
    }


    loopDataFn = function( data ) {

      var property;

      if ( !data ) {
        return;
      }

      for ( property in data ) {
        if ( data.hasOwnProperty(property) ) {

          //  create bubble
          bubble = document.createElement('div');
          bubble.className = 'pad section-dark space size-0';
          bubble.style.position = 'relative';
          bubble.style.paddingRight = '2rem';

          if ( data[property]['autoNext'] && ( data[property]['autoNext'] === 'RANDOM' ) ) {

            bubble.style.marginBottom = '4rem';

          }

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

                  if ( answers[i].score === 'wrong' ) {
                    content += '<span style="width:0.5rem;height:0.5rem;border-radius:50%;vertical-align: middle;margin-left:0.5rem;margin-right:0.5rem;background-color:#dd4b39;display:inline-block;"></span>';
                  }
                  else if ( answers[i].score === 'correct' ) {
                    content += '<span style="width:0.5rem;height:0.5rem;border-radius:50%;vertical-align: middle;margin-left:0.5rem;margin-right:0.5rem;background-color:#308c8c;display:inline-block;"></span>';
                  }

                  content += answers[i].answer

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
                content += '<span style="opacity:0.5;">' + bubbleProp + ': ' + bubbleData[bubbleProp] + ' |</span> ';
              }

              if ( ( bubbleProp === 'startTime' ) && this.audioFile ) {
                content += '<button style="position:absolute;left:100%;transform:translateX(-50%);top:-0.75rem;height:1.5rem;margin:0;" class="btn btn-green btn-small" onClick="las.playAudioTestMode(' + bubbleData.startTime +  ', ' + bubbleData.duration + ');">Audio &raquo;</button>';
              }

            }

          }

          bubble.innerHTML = content;
          this.wrapper.appendChild(bubble);

        // end if has property
        }
      // end loop
      }

    //  function
    }.bind(this);


    loopDataFn( data.intro );

    line = document.createElement('div');
    line.style.cssText = bigLineCss;
    line.innerHTML = 'AUDIO TEST';
    this.wrapper.appendChild(line);
    loopDataFn( data.chat );

    line = document.createElement('div');
    line.style.cssText = bigLineCss;
    line.innerHTML = 'EXTRA';
    this.wrapper.appendChild(line);
    loopDataFn( data.extra );


  };



  //  return augmented object
  return las;

}
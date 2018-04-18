//
//  Las Word Quiz
//  Extends Audio Test
//




function LasWordQuiz() {
  "use strict";

  //  get methods from the LasAudioTest
  //  we can add new methods or overwrite old ones
  var las = new LasAudioTest();


  las.wqBlink =               document.getElementById('audio-test');


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


  //
  //  Animate good answer
  //
  las.showGoodAnswer = function() {

  };


  //
  //  Mark wrong answers
  //
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
    Velocity(
        this.clickedAnswerEl,
      { translateX: ['0', '-0.5rem'] },
      { duration: 4 * this.helper.speed, easing: [ 5000, 20 ], queue: false }
    );

    //  change color
    Velocity(
      this.clickedAnswerEl,
      { backgroundColor: '#c55c27' },
      { duration: this.helper.speed, easing: this.helper.easingQuart, queue: false }
    );

    Velocity(
      this.clickedAnswerEl,
      { backgroundColorAlpha: 0 },
      { duration: 4 * this.helper.speed, easing: this.helper.easingQuart }
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
    if ( elWithId &&
         ( ( elWithId.id === 'audio-skip-pause' ) ||
           ( elWithId.id === 'audio-pause-timer' ) ) ) {

      //  skip the pause
      if ( this.state.skipButton ) {
        this.skipPauseTimers();
      }

      //  stop eventHandler
      event.stopPropagation();
      return;

    }


    //  Translate
    if ( elWithId &&
         ( ( elWithId.id === 'audio-test-msg' ) ) ||
           ( elWithId.id === 'audio-test-msg-main' ) ) {

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


  //  return augmented object
  return las;

}

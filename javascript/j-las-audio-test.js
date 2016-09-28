//
// Las Audio Test
//


function LasAudioTest() {
  //
  //  Elements
  //
  this.wrapper = document.getElementById('audio-test');
  this.loader = document.getElementById('loader');
  //this.playBtn = document.getElementById('audio-play');
  //this.rewindBtn = document.getElementById('audio-rewind');
  this.audioFile = document.getElementById('audio-file');
  this.answers =
  this.answerOne =
  this.answerTwo = null;

  this.prefetch = document.createElement("div");


  //
  //  Audio Data
  //
  this.chatData = new LasAudioData();
  this.msg = '';
  this.startTime = '';
  this.stopTime = '';
  this.answerOneText = 'test';
  this.answerTwoText = 'test2';
  this.answerOneNext =
  this.answerTwoNext =
  this.autoNext = '';

  //
  //  State
  //
  this.answersWaiting = false;
  this.currentState = '';

  //
  //  Helper
  //
  var that = this,
      speed = 200,
      answersTranformValue = "300%";      // is it needed in this object?

  //
  //  Initiate
  //
  this.init = function() {

    //  Random chat arrays
    this.randomIntroArray = lasHelper.createRandomArrayOfFirstBubbles( this.chatData.intro );
    this.randomChatArray = lasHelper.createRandomArrayOfFirstBubbles( this.chatData.chat );
    this.randomEndArray = lasHelper.createRandomArrayOfFirstBubbles( this.chatData.end );

    this.createAudioTest();


    this.addListener();
    //this.resetAnswers();
    //this.getNextBubble( 'INTRO' );
    //this.createBubble();
  };

  this.createAudioTest = function() {
    var answers = document.createElement('div'),
        answerOne = document.createElement('button'),
        answerTwo;

    answers.className = 'audio-test-answers';
    answers.id = 'audio-test-answers';

    answerOne.className = 'btn btn-blue btn-s-2 btn-audio-test-answer';
    answerOne.setAttribute("role", "button");
    answerOne.innerHTML = "&nbsp;"

    answerTwo = answerOne.cloneNode(false);

    answerOne.id = 'answer-one';
    answerTwo.id = 'answer-two';
    answerTwo.innerHTML = "&nbsp;"

    // Append
    answers.appendChild(answerOne);
    answers.appendChild(answerTwo);
    //this.wrapper.appendChild(answers);

    // Assign
    this.answers = answers;
    this.answerOne = answerOne;
    this.answerTwo = answerTwo;


    Velocity(this.loader, { opacity: 0 }, { duration: speed*2, easing: [ 200, 20 ], queue: false, display: 'none' } );
  };


  //
  //  ANSWERS
  //
  this.showAnswers = function() {
    this.answersWaiting = true;

    this.answerOne.innerHTML = this.answerOneText;

    this.answerOne.style.display = "inline-block";

    if (this.answerTwoText !== "") {
      this.answerTwo.innerHTML = this.answerTwoText;
      this.answerTwo.style.display = "inline-block";
    }

    Velocity(this.answers, { translateY: 0 }, { duration: speed*5, easing: [ 200, 20 ], queue: false } );

    if (this.answerTwoText !== "") {
      Velocity(this.answerTwo, { translateY: 0 }, { duration: speed*3, easing: "easeInOutQuart" });
    }

  };

  this.resetAnswers = function() {
    this.answersWaiting = false;

    // testing whole answers animation
    Velocity(this.answers,
      { translateY: "100%" },
      { duration: speed*2, easing: [ 300, 20 ], queue: false }
    );
    Velocity(this.answerOne,
      { translateY: "0" },
      { duration: speed*2, easing: [ 300, 20 ], display: "none", complete: function() { that.answerOne.style.visibility = "visible"; } }
    );

    //if (this.answerTwoText !== "") {
      Velocity(this.answerTwo,
        { translateY: "100%" },
        { duration: speed*2, easing: [ 300, 20 ], display: "none", complete: function() { that.answerTwo.style.visibility = "visible"; } }
      );
    //}
  }


  //
  //  AUDIO
  //
  this.playAudio = function() {
    //  get saved start time
    //  seek time in the file

    console.log("play!");
    this.audioFile.play();
  };

  this.autoPauseAudio = function() {
    //  when the time finishes, pause playback

    if ( that.audioFile.currentTime > 5 ) {
      that.audioFile.pause();
      console.log('pause!');
      that.audioFile.removeEventListener('timeupdate', that.autoPauseAudio, false);
    }

  };


  //
  //  HELPERS
  //
  this.eventHandler = function(event) {

    console.log('click');

    if ( ( event.target.id == 'answer-one' ) || ( event.target.parentNode.id =='answer-one' ) ) {
      //  load the answer no 1

      //that.clickedAnswer = that.answerOne;
      //that.answerToBubble();
    }
    else if ( ( event.target.id =='answer-two' ) || ( event.target.parentNode.id =='answer-two' ) ) {
      //  load the answer no 2

      //that.clickedAnswer = that.answerOne;
      //that.answerToBubble();
    }
    else if ( ( event.target.id =='audio-play' ) || ( event.target.parentNode.id =='audio-play' ) ) {
      //  Play audio at specific time
      //  Add event listener that will stop the file


      this.playAudio();

      this.audioFile.addEventListener('timeupdate', that.autoPauseAudio, false);
    }
    else if ( ( event.target.id =='audio-rewind' ) || ( event.target.parentNode.id =='audio-rewind' ) ) {
      //  if the fragment is longer that 10 s, rewind 10 s, otherwise rewidn to the begging o the current fragment
    }

    event.preventDefault();
    return false;

  };


  this.addListener = function() {
    console.log('add event listener');
    this.wrapper.addEventListener('touchstart', function(event) {
      that.eventHandler(event);
    }, false);

    this.wrapper.addEventListener('click', function(event) {
      that.eventHandler(event);
    }, false);

  };

}
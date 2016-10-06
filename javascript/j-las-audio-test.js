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
  this.audioMsg = document.getElementById('audio-msg');
  this.answersEl = null;
  this.answersElArray = [];

  this.prefetch = document.createElement("div");


  //
  //  Audio Data
  //
  this.lasData = new LasAudioData();
  this.currentBubbleData = null;
  this.msg =
  this.bubbleAutoNext =
  this.startTime =
  this.stopTime =
  this.autoNext = '';

  this.answersData = [];

  //
  //  State
  //
  this.answersWaiting = false;
  this.currentState = '';   // END / INTRO / CHAT
  this.firstPlay = false;

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
    this.randomIntroArray = this.createRandomArrayOfFirstBubbles( this.lasData.intro );
    this.randomChatArray = this.createRandomArrayOfFirstBubbles( this.lasData.chat );
    this.randomEndArray = this.createRandomArrayOfFirstBubbles( this.lasData.end );

    //  Create
    this.createAudioTest();
    this.addListener();
    this.resetAnswers();
    this.hideLoader();

    //  Get the intro
    this.getNextBubble( 'INTRO' );
  };


  this.createAudioTest = function() {
    var answersEl = document.createElement('div'),
        answerOne = document.createElement('button'),
        answerTwo;

    answersEl.className = 'audio-test-answers';
    answersEl.id = 'audio-test-answers';

    answerOne.className = 'btn btn-blue btn-s-2 btn-audio-test-answer';
    answerOne.setAttribute("role", "button");
    answerOne.innerHTML = "&nbsp;"

    answerTwo = answerOne.cloneNode(false);
    answerThree = answerOne.cloneNode(false);
    answerFour = answerOne.cloneNode(false);

    answerOne.id = 'answer-one';
    answerTwo.id = 'answer-two';
    answerThree.id = 'answer-three';
    answerFour.id = 'answer-four';

    // Append
    answersEl.appendChild(answerOne);
    answersEl.appendChild(answerTwo);
    answersEl.appendChild(answerThree);
    answersEl.appendChild(answerFour);
    this.wrapper.appendChild(answersEl);

    // Assign
    this.answersEl = answersEl;
    this.answersElArray[0] = answerOne;
    this.answersElArray[1] = answerTwo;
    this.answersElArray[2] = answerThree;
    this.answersElArray[3] = answerFour;

  };


  //
  //  AUDIO
  //
  this.playAudio = function() {
    if ( this.answersWaiting ) {
      console.log("Can't play!");
      return false;
    }

    //  set the current time
    this.audioFile.currentTime = this.startTime;

    //  add pause listener
    this.audioFile.addEventListener('timeupdate', that.autoPauseAudio, false);

    console.log("play!");
    this.audioFile.play();

  };


  this.autoPauseAudio = function() {
    //  when the time finishes, pause playback
    //  all @this change to @that or it won't work

    console.log("check pause");

    if ( that.audioFile.currentTime > that.stopTime ) {
      that.audioFile.pause();
      console.log('auto pause!');
      that.audioFile.removeEventListener('timeupdate', that.autoPauseAudio, false);

      if ( that.bubbleAutoNext !== "" ) {
        //  if there is autoNext
        that.getNextBubble( that.bubbleAutoNext );
        this.playAudio();
      }
      else if ( that.bubbleAutoNext === "END" ) {
        //  if it is the end
        that.finish();
      }
      else {
        //  if no autoNext or END, then show answers
        that.showAnswers();
      }
    }

  };



  //
  //  ANSWERS
  //
  this.showAnswers = function() {
    console.log('show answers');

    this.answersWaiting = true;

    //  Show msg
    if ( this.msg !== "" ) {
      this.audioMsg.innerHTML = this.msg;
    }

    //  Loop over answers
    var i,
        c = this.answersData.length;

    for (i = 0; i < 4; i++) {
      //  this.answersData[i] = {answer: this.currentBubbleData.answers[i].answer, next: this.currentBubbleData.answers[i].next};
      //  tu możemy jeszcze coś zrobić z "next" albo zostawić to do inne metody

      if ( i < c ) {
        //  if there is such an answer, display it
        this.answersElArray[i].innerHTML = this.answersData[i].answer;
        this.answersElArray[i].style.display = "inline-block";
      }
      else {
        //  if there is no such answer, hide it
        this.answersElArray[i].style.display = "none";
      }
    }

    Velocity(this.answersEl, { translateX: 0 }, { duration: speed*5, easing: [ 200, 20 ], queue: false } );

  };

  this.resetAnswers = function() {
    this.answersWaiting = false;

    //  Reset msg
    this.resetMsg();

    //  Reset answers
    Velocity(this.answersEl,
      { translateX: "100%" },
      { duration: speed*2, easing: [ 300, 20 ], queue: false }
    );

    //  Here we need to check how many answers there are and loop those visible
    /*Velocity(this.answerOne,
      { translateX: "0" },
      { duration: speed*2, easing: [ 300, 20 ], display: "none", complete: function() { that.answerOne.style.visibility = "visible"; } }
    );

    if (this.answerTwoText !== "") {
      Velocity(this.answerTwo,
        { translateX: "100%" },
        { duration: speed*2, easing: [ 300, 20 ], display: "none", complete: function() { that.answerTwo.style.visibility = "visible"; } }
      );
    }*/
  };

  this.resetMsg = function() {
    if ( this.msg !== "" ) {
      this.audioMsg.innerHTML = "";
      this.msg = "";
    }
  };


  this.answerToBubble = function( next ) {
    //  reset answers and msg
    this.resetAnswers();

    //  There needs to be animation and then:
    this.getNextBubble( next );

    //  Play next bubble
    this.playAudio();
  };


  //
  //  ASSIGN data from bubble
  //
  this.assignBubbleData = function(no, data) {
    this.currentBubble = no;
    this.currentBubbleData = data;

    if ( this.currentBubbleData.startTime || (this.currentBubbleData.startTime === 0) ) {
      //  if there is time
      this.startTime = this.currentBubbleData.startTime;
      console.log(this.startTime);
      this.stopTime = this.currentBubbleData.stopTime;
      console.log(this.stopTime);
    }
    else {
      //  if no time, no fun
      console.log("FAIL! No time.")
    }

    if ( this.currentBubbleData.autoNext ) {
      //  if there is autoNext
      this.bubbleAutoNext = this.currentBubbleData.autoNext;

      //  reset msg
      this.msg = "";
    }
    else if ( this.currentBubbleData.answers && this.currentBubbleData.msg ) {
      //  if there are answers and msg
      //  loop over all available answers

      this.assignAnswers();
      console.log(this.answersData);

      //  Reset autoNext
      this.bubbleAutoNext = "";

      //  assign the msg
      this.msg = this.currentBubbleData.msg;

    }
  };


  this.assignAnswers = function() {
    //  this.answers = [
    //    {answer: '', next: ''},
    //    {answer: '', next: ''}
    //  ]
    var i,
        c = this.currentBubbleData.answers.length;

    for (i = 0; i < c; i++) {
      this.answersData[i] = {answer: this.currentBubbleData.answers[i].answer, next: this.currentBubbleData.answers[i].next};
    }

  };


  //
  //  HELPERS
  //
  this.eventHandler = function(event) {

    console.log('click');

    if ( ( event.target.id == 'answer-one' ) || ( event.target.parentNode.id =='answer-one' ) ) {
      //  load the answer no 1
      that.answerToBubble( that.answersData[0].next );

    }
    else if ( ( event.target.id =='answer-two' ) || ( event.target.parentNode.id =='answer-two' ) ) {
      //  load the answer no 2
      that.answerToBubble( that.answersData[1].next );

    }
    else if ( ( event.target.id =='answer-three' ) || ( event.target.parentNode.id =='answer-three' ) ) {
      //  load the answer no 3
      that.answerToBubble( that.answersData[2].next );

    }
    else if ( ( event.target.id =='answer-four' ) || ( event.target.parentNode.id =='answer-four' ) ) {
      //  load the answer no 4
      that.answerToBubble( that.answersData[3].next );

    }
    else if ( ( event.target.id =='audio-play' ) || ( event.target.parentNode.id =='audio-play' ) ) {
      //  Play audio at specific time
      //  Add event listener that will stop the file

      if ( this.firstPlay ) {
        //  if it is the first time we click play, reset the intro msg
        this.resetMsg();
      }
      this.firstPlay = false;

      this.playAudio();

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

//
//  Extend with LasHelper methods
//
LasAudioTest.prototype = new LasHelper();
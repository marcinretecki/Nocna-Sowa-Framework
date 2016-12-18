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
  this.audioScore = document.getElementById('audio-score');
  this.audioControls = document.getElementById('audio-controls');
  this.audioMore = document.getElementById('audio-more');
  this.answersEl = null;
  this.answersElArray = [];

  this.prefetch = document.createElement("div");


  //
  //  Audio Data
  //
  this.lasData = new LasAudioData();
  this.currentBubbleData =
  this.more = null;
  this.msg =
  this.bubbleAutoNext =
  this.startTime =
  this.stopTime =
  this.autoNext = '';

  this.answersData = [];


  //
  //  State
  //
  this.state = {
    answersWaiting: false,
    currentState:   '',   // END / INTRO / CHAT
    firstPlay:      true,
    playing:        false,
    score:          false,
    controls:       false,
    bubbling:       false
  };


  //
  //  Helper
  //
  var that = this,
      speed = 200,
      answersTranformValue = "300%";


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
    this.showMsg();
    this.showAnswers();
  };


  this.createAudioTest = function() {
    var answersEl = document.createElement('div'),
        answerOne = document.createElement('button'),
        answerTwo,
        answerThree,
        answerFour;

    answersEl.className = 'audio-test-answers';
    answersEl.id = 'audio-test-answers';

    answerOne.className = 'btn btn-white-outline btn-audio-test-answer';
    answerOne.setAttribute("role", "button");
    answerOne.innerHTML = "&nbsp;";

    //  To remove
    answerOne.style.cssText = "width:100%;display:block;padding:2rem;opacity:0;margin:1rem auto;";

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
    if ( this.state.playing ) {
      return false;
    }
    //  set the current time
    this.audioFile.currentTime = this.startTime;


    //  add pause listener
    this.audioFile.addEventListener('timeupdate', that.autoPauseAudio, false);

    window.console.log("play!");
    this.state.playing = true;
    this.audioFile.play();

  };


  this.autoPauseAudio = function() {
    //  when the time finishes, pause playback
    //  must change @this to @that or it won't work

    window.console.log("check pause " + that.audioFile.currentTime);

    if ( ( that.audioFile.currentTime + 1 > that.stopTime ) ) {
      //  one second before the end of audio

      if ( that.bubbleAutoNext === "RANDOM" ) {
        //  if random autoNext, then reset score and show controls
        that.resetScore();
        that.showControls();
      }
      else if ( that.bubbleAutoNext !== "" ) {
        //  if there is autoNext
        //  reset msg
        that.resetMsg();
        window.console.log('reset msg');
      }
      else if ( that.bubbleAutoNext === "" ) {
        //  if no autoNext, then show answers
        that.showAnswers();
      }

    }

    if ( that.audioFile.currentTime > that.stopTime ) {
      //  at the end of audio

      // pause
      that.pauseAudio();
      window.console.log('auto pause!');

      // remove listener
      that.audioFile.removeEventListener('timeupdate', that.autoPauseAudio, false);

      if ( ( that.bubbleAutoNext !== "" ) && ( that.bubbleAutoNext !== "RANDOM" ) ) {
        //  if there is autoNext but not random one
        //  get next bubble
        that.getNextBubble( that.bubbleAutoNext );

        //  play
        that.playAudio();
        //  show msg
        this.showMsg();
      }
      else if ( that.bubbleAutoNext === "END" ) {
        //  if it is the end
        that.finish();
      }
    }

  };


  this.rewindAudio = function() {
    //  If the user want to listen to it again
    //  all @this change to @that or it won't work

    //  pause
    that.pauseAudio();

    //  rewind to the beginning
    that.audioFile.currentTime = that.startTime;
    window.console.log('rewind to begining');

    //  add pause listener
    this.audioFile.addEventListener('timeupdate', that.autoPauseAudio, false);

    //  Resume
    that.state.playing = true;
    that.audioFile.play();

  };


  this.pauseAudio = function() {
    that.state.playing = false;
    that.audioFile.pause();
  };


  this.playMore = function() {
    if ( this.state.playing ) {
      return false;
    }
    //  set the current time
    this.audioFile.currentTime = this.more.startTime;

    //  add pause listener
    this.audioFile.addEventListener('timeupdate', that.autoPauseMore, false);

    window.console.log("play more!");
    this.state.playing = true;
    this.audioFile.play();

  };


  this.autoPauseMore = function() {
    //  when the time finishes, pause playback of more
    //  must change @this to @that or it won't work

    window.console.log("check pause more " + that.audioFile.currentTime);

    if ( that.audioFile.currentTime > that.more.stopTime ) {
      //  at the end of audio

      // pause
      that.pauseAudio();
      window.console.log('auto pause more!');

      // remove listener
      that.audioFile.removeEventListener('timeupdate', that.autoPauseMore, false);

      that.state.playing = false;

    }

  };



  //
  //  ANSWERS
  //
  this.showAnswers = function() {
    if ( this.state.answersWaiting ) {
      return false;
    }

    this.resetScore();

    window.console.log('show answers');

    this.state.answersWaiting = true;

    //  Loop over answers
    var i,
        c = this.answersData.length;

    for (i = 0; i < 4; i++) {

      if ( i < c ) {
        //  if there is such an answer, display it
        this.answersElArray[i].innerHTML = this.answersData[i].answer;

        //  animate
        Velocity(this.answersElArray[i],
          { opacity: [1, 0] },
          { duration: speed*5, easing: [ 300, 20 ], delay: speed*i, display: "block" }
        );
      }
      else {
        //  if there is no such answer, hide it
        this.answersElArray[i].style.display = "none";
      }
    }

  };


  this.resetAnswers = function() {
    if ( !this.state.answersWaiting ) {
      return false;
    }

    this.state.answersWaiting = false;

    //  Loop over answers
    var i,
        c = this.answersData.length;

    for (i = 0; i < 4; i++) {

      if ( i < c ) {
        //  if there is such an answer, hide it
        Velocity(this.answersElArray[i],
          { opacity: 0 },
          { duration: speed*5, easing: [ 300, 20 ], display: "none", queue: false }
        );
      }

    }

    window.console.log('clear answer data');
    this.answersData = [];
  };


  this.answerToBubble = function( next ) {
    //if ( this.state.bubbling ) {
    //  return false;
    //}
    ////
    //this.state.bubbling = true;

    //  pause
    //  if user clicked an answer, we need to pause audio, so we can play the next one
    that.pauseAudio();


    window.console.log('answerToBubble');
    window.console.log(next);

    //  reset answers and msg
    this.resetAnswers();
    this.resetMsg();
    this.resetControls();

    //  There needs to be animation and then:
    this.getNextBubble( next );

    //  Play next bubble
    this.playAudio();
    //  show msg
    this.showMsg();

    //  reset bubbling state
    //this.state.bubbling = false;
  };


  //
  //  MESSAGE
  //
  this.showMsg = function() {
    if ( this.msg === "SCORE") {

      //  if it was the right answer, show it
      window.console.log('SCORE');
      this.state.score = true;

      Velocity(this.audioScore,
        { opacity: 1 },
        { duration: speed*5, easing: [ 300, 20 ] }
      );
    }
    else if ( this.msg !== "" ) {
      this.audioMsg.innerHTML = this.msg;
      Velocity(this.audioMsg,
        { opacity: 1 },
        { duration: speed*5, easing: [ 300, 20 ], queue: false }
      );
    }

  };


  this.resetMsg = function() {
    this.resetScore();

    if ( this.msg !== "" ) {
      this.msg = "";

      window.console.log("reset msg");

      Velocity(this.audioMsg,
        { opacity: 0 },
        { duration: speed*2, easing: [ 300, 20 ], queue: false }
      );
    }
  };


  this.resetScore = function() {
    if ( !this.state.score ) {
      return false;
    }

    this.state.score = false;

    window.console.log("reset score");

    Velocity(this.audioScore,
      { opacity: 0 },
      { duration: speed*5, easing: [ 300, 20 ], queue: false }
    );
  };


  //
  //  CONTROLS
  //
  this.showControls = function() {
    if ( this.state.controls === true ) {
      return false;
    }

    this.state.controls = true;

    window.console.log("show controls");

    if ( this.more !== null ) {
      this.audioMore.style.display = "inline-block";
    }
    else {
      this.audioMore.style.display = "none";
    }

    Velocity(this.audioControls,
      { opacity: [1, 0] },
      { duration: speed*5, easing: [ 300, 20 ], queue: false, display: "block" }
    );


  };


  this.resetControls = function() {
    if ( this.state.controls === false ) {
      return false;
    }

    this.state.controls = false;

    window.console.log("reset controls");

    Velocity(this.audioControls,
      { opacity: 0 },
      { duration: speed*5, easing: [ 300, 20 ], queue: false, display: "none" }
    );

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
      window.console.log(this.startTime);
      this.stopTime = this.currentBubbleData.stopTime;
      window.console.log(this.stopTime);
    }
    else {
      //  if no time, no fun
      window.console.log("FAIL! No time.");
    }

    if ( this.currentBubbleData.autoNext ) {
      //  if there is autoNext
      this.bubbleAutoNext = this.currentBubbleData.autoNext;
    }
    else if ( this.currentBubbleData.answers ) {
      //  if there are answers
      //  loop over all available answers

      this.assignAnswers();
      window.console.log(this.answersData);

      //  Reset autoNext
      this.bubbleAutoNext = "";

    }

    if ( this.currentBubbleData.msg ) {
      //  assign the msg
      this.msg = this.currentBubbleData.msg;

    }
    else {
      //  reset msg
      this.msg = "";
    }

    if ( this.currentBubbleData.more ) {
      //  assign more
      this.more = this.currentBubbleData.more;
    }
    else {
      //  reset more
      this.more = null;
    }

  };


  this.assignAnswers = function() {
    //  this.answers = [
    //    {answer: '', next: ''},
    //    {answer: '', next: ''}
    //  ]

    window.console.log('assignAnswers');
    var i,
        c = this.currentBubbleData.answers.length;

    for (i = 0; i < c; i++) {
      this.answersData[i] = { answer: this.currentBubbleData.answers[i].answer, next: this.currentBubbleData.answers[i].next };
    }

  };


  //
  //  HELPERS
  //
  this.eventHandler = function(event) {

    window.console.log('click');

    if ( ( event.target.id === 'answer-one' ) || ( event.target.parentNode.id === 'answer-one' ) ) {
      //  load the answer no 1
      that.answerToBubble( that.answersData[0].next );

      if ( that.state.firstPlay ) {
        that.state.firstPlay = false;
      }

    }
    else if ( ( event.target.id === 'answer-two' ) || ( event.target.parentNode.id === 'answer-two' ) ) {
      //  load the answer no 2
      that.answerToBubble( that.answersData[1].next );

      if ( that.state.firstPlay ) {
        that.state.firstPlay = false;
      }

    }
    else if ( ( event.target.id === 'answer-three' ) || ( event.target.parentNode.id === 'answer-three' ) ) {
      //  load the answer no 3
      that.answerToBubble( that.answersData[2].next );

      if ( that.state.firstPlay ) {
        that.state.firstPlay = false;
      }

    }
    else if ( ( event.target.id === 'answer-four' ) || ( event.target.parentNode.id === 'answer-four' ) ) {
      //  load the answer no 4
      that.answerToBubble( that.answersData[3].next );

      if ( that.state.firstPlay ) {
        that.state.firstPlay = false;
      }

    }
    else if ( ( event.target.id === 'audio-play' ) || ( event.target.parentNode.id === 'audio-play' ) ) {
      //  Play audio at specific time
      //  Add event listener that will stop the file

      if ( that.state.firstPlay ) {
        //  if it is the first time we click play, reset the intro msg and answer
        //  and allow the play button to work
        that.answerToBubble('ENDINTRO');
        that.state.firstPlay = false;
      }
      else {

        if ( that.state.playing ) {
          //  if it is playing now, pause it
          that.pauseAudio();
        }
        else if ( that.state.answersWaiting ) {
          //  if there are answers waiting, play once again the question
          that.playAudio();
        }
        else if ( !that.state.playing && !that.state.answersWaiting ) {
          //  if it is paused, resume
          that.state.playing = true;
          that.audioFile.play();
        }

      }


    }
    else if ( ( event.target.id === 'audio-rewind' ) || ( event.target.parentNode.id === 'audio-rewind' ) ) {
      //  if the fragment is longer that 10 s, rewind 10 s, otherwise rewidn to the begging o the current fragment
      that.rewindAudio();
    }
    else if ( ( event.target.id === 'audio-next' ) || ( event.target.parentNode.id === 'audio-next' ) ) {
      //  get the next bubble
      that.answerToBubble( that.bubbleAutoNext );
    }
    else if ( ( event.target.id === 'audio-more' ) || ( event.target.parentNode.id === 'audio-more' ) ) {
      //  play more
      that.playMore();
    }

    event.preventDefault();
    return false;

  };


  this.addListener = function() {
    window.console.log('add event listener');
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
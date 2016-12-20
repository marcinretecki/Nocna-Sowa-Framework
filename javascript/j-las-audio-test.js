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
    answerOne.style.cssText = "width:100%;display:block;padding:2rem;margin:1rem auto;opacity:0;";

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
  //  New Bubble
  //
  this.createBubble = function() {
    //  here we have audio/quiz logic when the new bubble should appear

    if ( that.bubbleAutoNext === "END" ) {
      //  if it is the end
      this.finish();
      return false;
    }

    //  show the msg
    this.showMsg();

    if ( ( this.startTime === "" ) && ( this.msg !== "SCORE" ) ) {
      //  no time or score, this should be a quiz
      this.showAnswers();
    }
    else if ( ( this.startTime === "" ) && ( this.msg === "SCORE" ) ) {
      //  if no time and score
      window.setTimeout(that.resetScore.bind(this), speed*2);
    }
    else {
      //  we have audio, se we can play it
      this.playAudio();
    }

  };


  //
  //  AUDIO
  //
  this.playAudio = function() {
    if ( this.state.playing || ( this.startTime === "" ) ) {
      return false;
    }

    //  reset listeners
    that.resetListeners();

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
      }
      else if ( that.bubbleAutoNext !== "" ) {
        //  if there is autoNext
        //  reset msg
        that.resetMsg();
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

      // reset listener
      that.resetListeners();

      if ( ( that.bubbleAutoNext !== "" ) && ( that.bubbleAutoNext !== "RANDOM" ) ) {
        //  if there is autoNext but not random one

        //  get next bubble
        that.getNextBubble( that.bubbleAutoNext );

        //  create new bubble
        that.createBubble();
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

    //  reset listeners
    that.resetListeners();

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

      // reset listener
      that.resetListeners();

      that.state.playing = false;

    }

  };

  this.resetListeners = function() {
    // remove play listener
    that.audioFile.removeEventListener('timeupdate', that.autoPauseAudio, false);
    // remove more listener
    that.audioFile.removeEventListener('timeupdate', that.autoPauseMore, false);
  };



  //
  //  ANSWERS
  //
  this.showAnswers = function() {
    if ( this.state.answersWaiting || this.state.score || this.state.controls ) {
      //  wait untill answers or score is reset
      window.setTimeout(that.showAnswers.bind(this), 100);

      return false;
    }

    window.clearTimeout(that.showAnswers.bind(this));

    this.resetScore();

    window.console.log('show answers');

    this.state.answersWaiting = true;

    //  Loop over answers
    var i,
        c = this.answersData.length,
        answerEl,
        answer;

    for (i = 0; i < 4; i++) {

      if ( i < c ) {
        //  if there is such answer
        this.answersElArray[i].innerHTML = this.answersData[i].answer;

        //  animate
        Velocity(this.answersElArray[i],
          { opacity: [1, 0] },
          { duration: speed, easing: "easeInOutQuart", display: "block", delay: speed*i}
        );

        window.console.log('show answer');
      }
      else {
        //  if there is no such answer, hide it
        this.answersElArray[i].style.display = "none";

        window.console.log('if not such answr, hide it');
      }
    }

  };


  this.resetAnswers = function() {
    if ( !this.state.answersWaiting ) {
      return false;
    }

    //  Loop over answers
    var i,
        c = this.answersData.length,
        completeFn = function(){};

    for (i = 0; i < 4; i++) {

      if ( i === (c - 1) ) {
        completeFn = function() {
          that.state.answersWaiting = false;
        }
      }

      if ( i < c ) {
        //  if there is such an answer, hide it
        Velocity(this.answersElArray[i],
          { opacity: [0, 1] },
          { duration: speed, easing: "easeInOutQuart", display: "none",
            complete: function() {
              completeFn();
            }
          }
        );
      }



    }

    //  clear answer data
    this.answersData = [];

    window.console.log('clear answer data');

  };


  this.answerToBubble = function( next ) {
    if ( this.state.bubbling ) {
      return false;
    }

    this.state.bubbling = true;

    //  pause, if user clicked an answer, we need to pause audio, so we can play the next one
    that.pauseAudio();

    window.console.log('answerToBubble');
    window.console.log(next);

    //  reset everything
    this.resetAnswers();
    this.resetMsg();
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
  //  MESSAGE
  //
  this.showMsg = function() {
    if ( this.msg === "SCORE") {
      //  if it was the right answer, show it
      this.showScore();
    }
    else if ( this.msg !== "" ) {
      //  if there is another msg, show it
      this.audioMsg.innerHTML = this.msg;
      Velocity(this.audioMsg,
        { opacity: [1, 0] },
        { duration: speed, easing: "easeInOutQuart" }
      );
    }

  };


  this.resetMsg = function() {
    this.resetScore();

    if ( this.msg !== "" ) {
      this.msg = "";

      window.console.log("reset msg");

      Velocity(this.audioMsg,
        { opacity: [0, 1] },
        { duration: speed, easing: "easeInOutQuart", queue: false }
      );
    }
  };


  this.showScore = function() {
    if ( this.state.score ) {
      return false;
    }

    window.console.log('SCORE');
    this.state.score = true;

    Velocity(this.audioScore,
        { opacity: 1 },
        { duration: speed*2, easing: "easeInOutQuart" }
      );
  };


  this.resetScore = function() {
    if ( !this.state.score ) {
      return false;
    }

    window.console.log("reset score");

    Velocity(this.audioScore,
      { opacity: 0 },
      { duration: speed*2, easing: "easeInOutQuart", queue: false,
        complete: function() {
          that.state.score = false;
          that.showControls();
        }
      }
    );
  };


  //
  //  CONTROLS
  //
  this.showControls = function() {
    if ( this.state.controls ) {
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
      { duration: speed, easing: "easeInOutQuart", display: "block" }
    );


  };


  this.resetControls = function() {
    if ( !this.state.controls ) {
      return false;
    }

    window.console.log("reset controls");

    Velocity(this.audioControls,
      { opacity: 0 },
      { duration: speed, easing: "easeInOutQuart", queue: false, display: "none",
        complete: function() {
          that.state.controls = false;
        }
      }
    );

  };



  //
  //  ASSIGN data from bubble
  //
  this.assignBubbleData = function(no, data) {
    this.currentBubble = no;
    this.currentBubbleData = data;

    window.console.log("Assign bubble data");

    //  playback times
    if ( this.currentBubbleData.hasOwnProperty("startTime") || (this.currentBubbleData.startTime === 0) ) {
      //  if there is time
      this.startTime = this.currentBubbleData.startTime;
      this.stopTime = this.currentBubbleData.stopTime;

      window.console.log("Start time: " + this.startTime);
      window.console.log("Stop time: " + this.stopTime);
    }
    else {
      //  if no time, we have a quiz
      //  reset times
      this.startTime =
      this.stopTime  = "";

      window.console.log("No time.");
    }

    //  autoNext or answers
    if ( this.currentBubbleData.hasOwnProperty("autoNext") ) {
      //  if there is autoNext
      this.bubbleAutoNext = this.currentBubbleData.autoNext;
    }
    else if ( this.currentBubbleData.hasOwnProperty("answers") ) {
      //  if there are answers
      //  loop over all available answers
      this.assignAnswers();

      //  Reset autoNext
      this.bubbleAutoNext = "";

    }

    //  msg
    if ( this.currentBubbleData.hasOwnProperty("msg") ) {
      //  assign the msg
      this.msg = this.currentBubbleData.msg;

    }
    else {
      //  reset msg
      this.msg = "";
    }

    //  more
    if ( this.currentBubbleData.hasOwnProperty("more") ) {
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
    //    { answer: '', next: '', wrong: true },
    //    { answer: '', next: '' }
    //  ]


    window.console.log('assignAnswers');

    //  loop over answers to create array
    var i,
        c = this.currentBubbleData.answers.length;

    for (i = 0; i < c; i++) {
      this.answersData[i] = {};
      this.answersData[i].answer = this.currentBubbleData.answers[i].answer;

      if ( this.currentBubbleData.answers[i].hasOwnProperty("next") ) {
        //  if it has next
        this.answersData[i].next = this.currentBubbleData.answers[i].next;

        window.console.log("Next: " + this.answersData[i].next);
      }

      if ( this.currentBubbleData.answers[i].hasOwnProperty("wrong") ) {
        //  if it has wrong
        this.answersData[i].wrong = this.currentBubbleData.answers[i].wrong;

        window.console.log("Wrong");
      }

    }

  };


  //
  //  HELPERS
  //
  this.clickAnswer = function(target, answerData) {
    //  controls the click event logic for answers
    //  @target comes from even handler
    //  @answerData is assign in assignAnswers

    if ( that.state.firstPlay ) {
      //  if it was first play, change the state
      that.state.firstPlay = false;
    }


    if ( answerData.hasOwnProperty("wrong") && answerData.wrong ) {
      //  wrong answer, only animate, do not change anything
      window.console.log("wrong!");

      var answerEl;

      if ( target.getAttribute("role") === 'button' ) {
        answerEl = target;
      }
      else if ( target.parentNode.getAttribute("role") === 'button' )  {
        answerEl = target.parentNode;
      }

      //  animate
      Velocity(answerEl,
        { translateX: ["0", "-0.5rem"] },
        { duration: 400*2, easing: [ 5000, 20 ] }
      );

      return false;
    }
    else {
      //  if not wrong, then run answer to bubble
      that.answerToBubble( answerData.next );
    }

  };


  this.eventHandler = function(event) {

    window.console.log('click');

    if ( ( event.target.id === 'answer-one' ) || ( event.target.parentNode.id === 'answer-one' ) ) {
      //  load the answer no 1
      that.clickAnswer( event.target, that.answersData[0] );

    }
    else if ( ( event.target.id === 'answer-two' ) || ( event.target.parentNode.id === 'answer-two' ) ) {
      //  load the answer no 2
      that.clickAnswer( event.target, that.answersData[1] );

    }
    else if ( ( event.target.id === 'answer-three' ) || ( event.target.parentNode.id === 'answer-three' ) ) {
      //  load the answer no 3
      that.clickAnswer( event.target, that.answersData[2] );

    }
    else if ( ( event.target.id === 'answer-four' ) || ( event.target.parentNode.id === 'answer-four' ) ) {
      //  load the answer no 4
      that.clickAnswer( event.target, that.answersData[3] );

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
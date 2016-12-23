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

  this.prefetch =             document.createElement("div");


  //
  //  Audio Data
  //
  this.lasData =              new LasAudioData();
  this.currentBubbleData =    null;
  this.more =                 null;
  this.msg =                  '';
  this.bubbleAutoNext =       '';
  this.startTime =            '';
  this.stopTime =             '';
  this.autoNext =             '';
  this.score =                false;

  this.answersData = [];


  //
  //  State
  //
  this.state = {
    currentState:             '',   // END / INTRO / CHAT
    firstPlay:                true,
    answersWaiting:           false,
    playing:                  false,
    score:                    false,
    msg:                      false,
    controls:                 false,
    bubbling:                 false,
    vibrating:                false
  };


  //
  //  Helper
  //
  var that =                  this,
      speed =                 200,
      answersTranformValue =  "300%",
      easingSpring =          [ 200, 20 ],
      easingQuart =           "easeInOutQuart";


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
    var style = document.createElement("style");
    style.type = "text/css";
    style.appendChild(document.createTextNode(".audio-test-clue{background: #60B3B3 none repeat scroll 0 0;border-radius:3px;font-style:italic;padding:0.25rem 0.5rem;display:inline-block;}"));
    var head = document.getElementsByTagName("head")[0];
    head.appendChild(style);

    //  Get the intro
    this.getNextBubble( 'INTRO' );
    this.showMsg();
    this.showControls();
  };


  //
  //  New Bubble
  //
  this.createBubble = function() {
    //  here we have audio/quiz logic when the new bubble should appear

    if ( this.bubbleAutoNext === "END" ) {
      //  if it is the end
      this.finish();
      return false;
    }

    //  the bubble can be a score
    this.showScore();

    //  or it can be another question
    if ( ( this.startTime === "" ) && !this.score ) {
      //  no time or score
      window.console.log('no time, no score, show answers?');
      this.showAnswers();
    }
    else {
      //  we have audio, se we can play it
      //  answers shown there
      this.playAudio();
    }

  };


  this.answerToBubble = function( next ) {
    if ( this.state.bubbling ) {
      return false;
    }

    this.state.bubbling = true;

    //  stop all animation
    Velocity("stop");

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
    if ( this.state.playing || ( this.startTime === "" ) ) {
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

    window.console.log("play!");
    this.state.playing = true;
    this.audioFile.play();

  };


  this.autoPauseAudio = function() {
    //  when the time finishes, pause playback
    //  must change @this to @this or it won't work

    window.console.log("check pause " + this.audioFile.currentTime);

    if ( ( this.audioFile.currentTime + 1 > this.stopTime ) ) {
      //  one second before the end of audio

      //  if the score was shown, reset it and on complete show controls
      this.resetScore();

      //  if the bubble has answers, show them
      window.console.log('time + 1, show answers?');
      this.showAnswers();

    }

    if ( this.audioFile.currentTime > this.stopTime ) {
      //  at the end of audio

      // pause
      this.pauseAudio();
      window.console.log('auto pause!');

      // reset listener
      this.resetListeners();

      if ( ( this.bubbleAutoNext !== "" ) && ( this.bubbleAutoNext !== "RANDOM" ) ) {
        //  if there is autoNext but not random one

        //  get next bubble
        this.getNextBubble( this.bubbleAutoNext );

        //  create new bubble
        this.createBubble();
      }
      else if ( this.bubbleAutoNext === "END" ) {
        //  if it is the end
        this.finish();
      }
    }

  };


  this.rewindAudio = function() {
    //  If the user want to listen to it again
    //  all @this change to @this or it won't work

    //  pause
    this.pauseAudio();

    //  reset listeners
    this.resetListeners();

    //  rewind to the beginning
    this.audioFile.currentTime = this.startTime;
    window.console.log('rewind to begining');

    this.rewindAudioListener = function(){
      this.autoPauseAudio();
    }.bind(this);

    //  add pause listener
    this.audioFile.addEventListener('timeupdate', this.rewindAudioListener, false);

    //  Resume
    this.state.playing = true;
    this.audioFile.play();

  };


  this.pauseAudio = function() {
    this.audioFile.pause();
    this.state.playing = false;
  };


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

    window.console.log("play more!");
    this.state.playing = true;
    this.audioFile.play();

  };


  this.autoPauseMore = function() {
    //  when the time finishes, pause playback of more
    //  must change @this to @this or it won't work

    window.console.log("check pause more " + this.audioFile.currentTime);

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

    //  remove rewidn listener
    this.audioFile.removeEventListener('timeupdate', this.rewindAudioListener, false);
    this.rewindAudioListener = undefined;
  };



  //
  //  ANSWERS
  //
  this.showAnswers = function() {
    if ( this.state.answers || this.showAnswersTimer || ( this.answersData.length === 0 ) ) {
      //  answers are waiting or the timer is set or there is no answers to show
      window.console.log('timer set or answers waiting');
      return false;
    }

    if ( this.state.score || this.state.controls || this.state.msg ) {
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
    var i,
        c = this.answersData.length,
        completeFn;

    for (i = 0; i < 4; i++) {

      if ( i < c ) {
        //  if there is such answer
        this.answersElArray[i].innerHTML = this.answersData[i].answer;

        //  animate
        Velocity(this.answersElArray[i],
          "slideDown",
          { duration: speed*2, easing: easingSpring, display: "block", queue: false }
        );

        Velocity(this.answersElArray[i],
          { borderColorAlpha: [1, 0] },
          { duration: speed*2, easing: easingQuart }
        );

        window.console.log('show answer');
      }
      else {
        //  if there is no such answer, hide it
        this.answersElArray[i].style.display = "none";

        window.console.log('if not such answr, hide it');
      }

    } //  end loop

  };


  this.resetAnswers = function() {
    if ( !this.state.answers ) {
      return false;
    }

    //  Loop over answers
    var i,
        c = this.answersData.length,
        completeFn;

    completeFn = function() {
      this.state.answers = false;
      //  show msg if there is one
      this.showMsg();
    }.bind(this);

    for (i = 0; i < 4; i++) {

      if ( i < c ) {
        //  if there is such an answer, hide it
        Velocity(this.answersElArray[i],
          { borderColorAlpha: [0, 1] },
          { duration: speed*2, easing: easingQuart, queue: false }
        );

        if ( i === (c - 1) ) {
          Velocity(this.answersElArray[i],
            "slideUp",
            { duration: speed*2, easing: easingQuart,
              complete: function() {
                completeFn();
              }
            }
          );
        }
        else {
          Velocity(this.answersElArray[i],
            "slideUp",
            { duration: speed*2, easing: easingQuart }
          );
        }

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
    //  we do not check state here, because we want to use Velocity chaining
    if ( this.msg === "" ) {
      return false;
    }

    this.state.msg = true;

    window.console.log("show msg");

    //  if there is another msg, show it
    var beginFn = function() {
      this.audioMsg.innerHTML = this.msg;
    }.bind(this);

    Velocity(this.audioMsg,
      "slideDown",
      { duration: speed*2, easing: easingSpring,
        begin: function() {
          beginFn();
        }
      }
    );

  };


  this.resetMsg = function() {
    if ( !this.state.msg ) {
      return false;
    }

    var completeFn = function() {
      this.state.msg = false;
    }.bind(this);

    window.console.log("reset msg");

    Velocity(this.audioMsg,
      "slideUp",
      { duration: speed*2, easing: easingQuart,
        complete: function() {
          completeFn();
        }
      }
    );
  };


  this.showScore = function() {
    if ( this.state.score || !this.score ) {
      return false;
    }

    window.console.log('score');
    this.state.score = true;

    Velocity(this.audioScore,
      { opacity: [1, 0] },
      { duration: speed*2, easing: easingQuart, display: "block" }
    );

    if ( ( this.startTime === "" ) ) {
      //  no time, add timeout to reset score
      window.console.log('add score timer');
      this.showScoreTimer = window.setTimeout(function() {
        this.resetScore();
        this.showScoreTimer = undefined;
      }.bind(this), speed*4);
    }
  };


  this.resetScore = function() {
    if ( !this.state.score ) {
      return false;
    }

    window.console.log("reset score");

    var completeFn = function() {
      this.state.score = false;
      this.showControls();
    }.bind(this);

    Velocity(this.audioScore,
      { opacity: [0, 1] },
      { duration: speed*2, easing: easingQuart, display: "none",
        complete: function() {
          completeFn();
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

    if ( this.startTime !== "" ) {
      this.audioRewind.style.display = "inline-block";
    }
    else {
      this.audioRewind.style.display = "none";
    }

    this.audioNext.style.display = "inline-block";

    Velocity(this.audioControls,
      "fadeIn",
      { duration: speed*2, easing: easingQuart}
    );

  };


  this.resetControls = function() {
    if ( !this.state.controls ) {
      return false;
    }

    window.console.log("reset controls");

    var completeFn = function() {
      this.state.controls = false;
    }.bind(this);

    this.audioNext.style.display = "none";
    this.audioMore.style.display = "none";
    this.audioRewind.style.display = "none";

    Velocity(this.audioControls,
      "fadeOut",
      { duration: speed*2, easing: easingQuart, queue: false,
        complete: function() {
          completeFn();
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
    if ( this.currentBubbleData.hasOwnProperty("startTime") ) {
      //  if there is time
      this.startTime = this.currentBubbleData.startTime;
      this.stopTime = this.currentBubbleData.stopTime;

      window.console.log("Start time: " + this.startTime);
      window.console.log("Stop time: " + this.stopTime);
    }
    else {
      //  if no time, we have a quiz
      //  reset times
      this.startTime = "";
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

    //  score
    if ( this.currentBubbleData.hasOwnProperty("score") ) {
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


    window.console.log('assignAnswers');

    //  loop over answers to create array
    var i,
        c = this.currentBubbleData.answers.length;

    //  shuffle answers
    this.currentBubbleData.answers = this.shuffleArray(this.currentBubbleData.answers);

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

        window.console.log("Has wrong");
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

    if ( this.state.firstPlay ) {
      //  if it was first play, change the state
      this.state.firstPlay = false;
    }

    if ( answerData.hasOwnProperty("next") && answerData.next ) {
      //  if not wrong, then run answer to bubble
      this.answerToBubble( answerData.next );
    }
    else if ( answerData.hasOwnProperty("wrong") && answerData.wrong ) {
      //  wrong answer, only animate, do not change anything
      window.console.log("wrong!");

      if ( this.more !== null ) {
        window.console.log("wrong answer has more");
        this.playMore();
      }

      if ( this.state.vibrating ) {
        return false;
      }

      var vibratingTimer,
          answerEl;

      this.state.vibrating = true;

      vibratingTimer = window.setTimeout(function() {
        //  reduce number of vibrating calls
        this.state.vibrating = false;
      }.bind(this), speed*2);


      if ( target.getAttribute("role") === 'button' ) {
        answerEl = target;
      }
      else if ( target.parentNode.getAttribute("role") === 'button' )  {
        answerEl = target.parentNode;
      }

      //  animate
      if ( answerData.hasOwnProperty("next") && answerData.next ) {
        Velocity(answerEl,
          { backgroundColor: '#dd4b39' },
          { duration: speed, easing: easingQuart }
        );

        Velocity(answerEl,
          "reverse",
          { duration: speed*4, easing: easingQuart }
        );
      }
      else {
        Velocity(answerEl,
          { translateX: ["0", "-0.5rem"] },
          { duration: speed*4, easing: [ 5000, 20 ], queue: false }
        );
      }

    }

  };


  this.eventHandler = function(event) {

    window.console.log('click');

    if ( ( event.target.id === 'answer-one' ) || ( event.target.parentNode.id === 'answer-one' ) ) {
      //  load the answer no 1
      this.clickAnswer( event.target, this.answersData[0] );

    }
    else if ( ( event.target.id === 'answer-two' ) || ( event.target.parentNode.id === 'answer-two' ) ) {
      //  load the answer no 2
      this.clickAnswer( event.target, this.answersData[1] );

    }
    else if ( ( event.target.id === 'answer-three' ) || ( event.target.parentNode.id === 'answer-three' ) ) {
      //  load the answer no 3
      this.clickAnswer( event.target, this.answersData[2] );

    }
    else if ( ( event.target.id === 'answer-four' ) || ( event.target.parentNode.id === 'answer-four' ) ) {
      //  load the answer no 4
      this.clickAnswer( event.target, this.answersData[3] );

    }
    else if ( ( event.target.id === 'audio-play' ) || ( event.target.parentNode.id === 'audio-play' ) ) {
      //  Play audio at specific time
      //  Add event listener this will stop the file

      if ( this.state.firstPlay ) {
        //  if it is the first time we click play, reset the intro msg and answer
        //  and allow the play button to work
        this.answerToBubble('ENDINTRO');
        this.state.firstPlay = false;
      }
      else {

        if ( this.state.playing ) {
          //  if it is playing now, pause it
          this.pauseAudio();
        }
        else if ( this.state.answers ) {
          //  if there are answers waiting, play once again the question
          this.playAudio();
        }
        else if ( !this.state.playing && !this.state.answers ) {
          //  if it is paused, resume
          this.state.playing = true;
          this.audioFile.play();
        }

      }


    }
    else if ( ( event.target.id === 'audio-rewind' ) || ( event.target.parentNode.id === 'audio-rewind' ) ) {
      //  if the fragment is longer this 10 s, rewind 10 s, otherwise rewidn to the begging o the current fragment
      this.rewindAudio();
    }
    else if ( ( event.target.id === 'audio-next' ) || ( event.target.parentNode.id === 'audio-next' ) ) {
      //  get the next bubble
      this.answerToBubble( this.bubbleAutoNext );
    }
    else if ( ( event.target.id === 'audio-more' ) || ( event.target.parentNode.id === 'audio-more' ) ) {
      //  play more
      this.playMore();
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
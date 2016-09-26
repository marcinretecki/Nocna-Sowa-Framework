//
// Las Audio Test
//


function LasAudioTest() {
  //
  //  Elements
  //
  this.wrapper = document.getElementById('audio-test');
  this.answers =
  this.answerLeft =
  this.answerRight = null;

  this.prefetch = document.createElement("div");


  //
  //  Chat Data
  //
  this.chatData = new LasAudioData();
  this.bubbleArray = [];
  this.answerLeftText =
  this.answerRightText =
  this.answerLeftNext =
  this.answerRightNext =
  this.autoNext = '';

  //
  //  State
  //
  this.answersWaiting = false;
  this.currentState = '';
  this.challangeProgress = new LasSaveChallangeProgress();

  //
  //  Helper
  //
  var that = this,
      answersTranformValue = "300%";      // ???

  //
  //  Initiate
  //
  this.init = function() {

    //  Random chat arrays
    this.randomIntroArray = this.createRandomChatArray( this.chatData.intro );
    this.randomChatArray = this.createRandomChatArray( this.chatData.chat );
    this.randomEndArray = this.createRandomChatArray( this.chatData.end );

    this.createChat();
    this.addListener();
    this.resetAnswers();
    this.getNextBubble( 'INTRO' );
    this.createBubble();
  };



}
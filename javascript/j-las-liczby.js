//
//  Las Liczby
//

function LasLiczby() {
  "use strict";

  //  get methods from the LasAudioTest
  //  we can add new methods or overwrite old ones
  var lasLiczby = new LasAudioTest();


  lasLiczby.currentNum =          0;

  lasLiczby.sequenceType =        'pimp';

  //  there are 3 levels
  //  0 (0-19)
  //  1 (20-99)
  //  2 (100-9999)
  lasLiczby.state.level =         1;


  //
  //  Initiate
  //
  lasLiczby.init = function() {

    //
    //  Get Data
    //
    this.lasData =                new LasLiczbyData();

    //  get Elements
    this.getBasicElements();


    //  Random chat arrays
    this.randomIntroArray =       this.createRandomArrayOfFirstBubbles( this.lasData.intro );
    this.randomChatArray =        this.createRandomArrayOfNumbers();
    this.randomEndArray =         this.createRandomArrayOfFirstBubbles( this.lasData.end );

    //  Prepare
    this.addListener();
    this.hideLoader();

    //  Get the intro
    this.getNextBubble( 'INTRO' );
    this.showMsg();
    this.showControls();

  };


  //
  //  Create
  //
  lasLiczby.getIntro = function() {

    window.console.log( 'show intro' );

    this.msg = this.lasData.intro.msg;

  };

  lasLiczby.getNewNumber = function() {

    window.console.log( 'get new number' );


    //  reset everything
    this.resetMsg();
    this.resetNum();
    this.resetControls();

    this.getRandomNumber();

    //this.showNum();

  };


  //
  //  BUBBLE
  //
  lasLiczby.assignBubbleData = function(no, data) {
    //  check what data is available, assign it and reset those unavailable

    //  msg
    //  start/stop times
    //  more
    //  there will be a sequence of playback, not single play/stop


    //  if it is intro or ending
    if ( ( this.state.currentState === 'INTRO' ) || ( this.state.currentState === 'END' ) ) {

      //  assign
      this.currentBubble = no;
      this.currentBubbleData = data;

    }
    //  if it is chat
    else {

      //  tu robimy całą logikę z liczbami

      this.msg = 'liczba';






      return;


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


  lasLiczby.answerToBubble = function() {
    //  convert clicked answer into the next bubble

    //  this one prevents some glitches
    if ( this.state.bubbling ) {
      return false;
    }

    this.state.bubbling = true;

    //  pause, if user clicked an answer, we need to pause audio, so we can play the next one
    this.pauseAudio();

    window.console.log('answerToBubble');

    //  reset everything
    this.resetMsg();
    this.resetAnswers();
    this.resetControls();
    this.resetAudioListeners();

    //  get next bubble
    this.getNextBubble( this.nextBubbleName );

    //  create new bubble
    this.createBubble();

    //  reset bubbling state
    this.state.bubbling = false;

  };


  lasLiczby.getRandomBubble = function() {
    window.console.log( 'getRandomBubble in lasLiczby');

    //  level 1

    if (this.numberCount < 0 ) {
      //  if there are still chat items to show

      //  add one to progress progress
      this.lasSaveChallangeProgress.plusOne();

      //  pop data and return the object
      var pop = this.lasData.chat[ this.randomChatArray.pop() ];
      return pop;

    }
    else {
      //  Set state
      this.state.currentState = 'END';

      return this.getEndBubble();
    }

  };


  //
  //  Create random array
  //
  lasLiczby.createRandomArrayOfNumbers = function() {

    var i;
    var tensL;
    var num;
    var tens;

    //  reset array
    this.randomChatArray = [];

    //  from 0 to 19
    if ( this.state.level === 0 ) {

      this.randomChatArray = this.shuffleArray( [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19] );

    }
    //  bigger numbers
    else if ( this.state.level === 1 ) {

      //  we use IIFE to lock the variable i
      (function() {

        i = this.randomChatArray.length;

        tens = [2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9];
        tensL = tens.length;

        while ( i < tensL ) {

          num = parseInt ( tens[i] + '' + this.getRandomNumber( 0 ) );

          //  check if array contains the number
          if ( !this.randomChatArray.includes( num ) ) {

            i = this.randomChatArray.unshift( num );

          }

        }

        //  fill up rest of the arrays
        while ( i < 20 ) {

          //  get random number
          num = this.getRandomNumber( 1 );

          //  check if array contains the number
          if ( !this.randomChatArray.includes( num ) ) {

            i = this.randomChatArray.unshift( num );

          }

        }

        //  shuffel
        this.randomChatArray = this.shuffleArray( this.randomChatArray );


      }).bind( this )();

    }
    //  thousands
    else if ( this.state.level === 2 ) {

      //  we use IIFE to lock the variable i
      (function() {

        i = this.randomChatArray.length;

        //  fill up the array
        while ( i < 20 ) {

          //  get random number
          num = this.getRandomNumber( 2 );

          //  check if array contains the number
          if ( !this.randomChatArray.includes( num ) ) {

            i = this.randomChatArray.unshift( num );

          }

        }

      }).bind( this )();

    }

    window.console.log( this.randomChatArray );

  };



  //
  //  Numbers
  //

  //  Random number
  //  returns a number in chosen span
  lasLiczby.getRandomNumber = function( option ) {

    var min;
    var max;

    if ( 0 === option ) {
      min = 0;
      max = 9;
    }
    else if ( 1 === option ) {
      min = 20;
      max = 99;
    }
    else if ( 2 === option ) {
      min = 1000;
      max = 9999;
    }

    return Math.floor( Math.random() * (max - min + 1) ) + min;

  };


  //  Number to words
  lasLiczby.getWords = function() {
    var j = this.words.j;
    var d = this.words.d;
    var r = '';
    var tusen, hundre, ti, en;

    num = this.currentNum.toString();

    //  do 20
    if (20 > num) {

      if (1 == num) {
        r += 'én / ei / ett<br />(zgodnie z rodzajem)';
      }
      else {
        r += j[num];
      }

    }
    //  do 100
    else if (100 > num) {

      ti = parseInt( num[0] );
      en = parseInt( num[1] );

      r += d[ti];
      if (0 < en) {
        r += j[en];
      }

    }
    //  tysiące
    else {

      tusen = parseInt( num[0] );
      hundre = parseInt( num[1] );
      ti = parseInt( num[2] );
      en = parseInt( num[3] );

      if (1 < tusen) {
        r += j[tusen];
        r += ' ';
      } else if (1 == tusen) {
         r += 'ett ';
      }

      r += 'tusen';

      if (1 < hundre) {
        r += ' ';
        r += j[hundre];
      }
      else if (1 == hundre) {
        r += ' ett';
      }

      if (0 < hundre) {
        r += ' hundre';
      }

      if ( (0 < ti) || (0 < en) ) {
        r += ' og ';
      }

      if (1 == ti) {
        r += j[ti*10 + en];
      }
      else {

        if (0 < ti) {
          r += d[ti];
        }

        if  (0 < en) {
          r += j[en];
        }

      }

    }

    return r;

  };




  //  return augmented object
  return lasLiczby;

}



console.log('num: ' + LasLiczby.currentNum);
console.log('state:');
console.log(LasLiczby.state);



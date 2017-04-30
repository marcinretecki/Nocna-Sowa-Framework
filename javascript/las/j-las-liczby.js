//
//  Las Liczby
//



/*
TODO
- check if there is a Stack (or autoNext pimp) so the spinner won't hide
- last of stack doesn't show msg after pauseTime

*/

function LasLiczby() {
  "use strict";

  //  get methods from the LasAudioTest
  //  we can add new methods or overwrite old ones
  var lasLiczby = new LasAudioTest();


  lasLiczby.currentNum =            0;

  lasLiczby.sequenceType =          'pimp';



  //
  //  Initiate
  //
  lasLiczby.init = function() {

    //
    //  Get Data
    //
    this.lasData =                  new LasLiczbyData();

    //  there are 3 levels
    //  0 (0-19)
    //  20 (20-99)
    //  100 (1000-9999)
    if ( this.helper.chapter ) {
      this.state.level =            parseInt ( this.helper.chapter.split('-')[1] );
    }

    //  get Elements
    this.getBasicElements();


    //  Random chat arrays
    this.randomIntroArray =         this.getRandomArrayOfFirstBubbles( this.lasData.intro );
    this.randomChatArray =          this.getRandomArrayOfNumbers();
    this.randomEndArray =           this.getRandomArrayOfFirstBubbles( this.lasData.end );

    //  Prepare
    this.addListener();
    this.hideLoader();

    //  Get the intro
    this.getNextBubble( 'INTRO' );
    this.showMsg();
    this.showControls();

  };


  //
  //  BUBBLE
  //
  lasLiczby.assignBubbleData = function(no, data) {

    var audioObject;
    var audioStackL;


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


    //  if it is chat, manipulate some stuff
    if ( this.state.currentState === 'CHAT' ) {

      //  if the bubble is a new number
      if ( typeof this.currentBubbleData === 'number' ) {

        window.console.log('typeof jest liczbą');

        //  assign current number
        this.currentNum = this.currentBubbleData;

        //  create words and audioStack
        //  this also saves new msg
        this.createWordsFromNum();

        //  reassign bubbleData
        this.assignBubbleDataFromNum();

        //  reasign autoNext
        this.bubbleAutoNext = 'RANDOM';

      }

    }


    //
    //  Create new audioObject
    //
    audioObject = this.createNewAudioObject( this.currentBubbleData );

    //  Push new audio object onto the stack
    if ( audioObject ) {

      audioStackL = this.audioStack.stack.push( audioObject );

    }


    //  if there is autoNext
    if ( this.currentBubbleData.hasOwnProperty('autoNext') ) {

      this.bubbleAutoNext = this.currentBubbleData.autoNext;

    }
    //  it can be end
    else if ( this.state.currentState === 'END' ) {
      //  we will show finish
    }


    //  if there is msg
    if ( this.currentBubbleData.hasOwnProperty('msg') ) {

      //  assign the msg
      this.msg = this.currentBubbleData.msg;

    }

    //  if there is more
    if ( this.currentBubbleData.hasOwnProperty('more') ) {

      //  assign more
      this.more = this.currentBubbleData.more;

    }

  };


  lasLiczby.assignBubbleDataFromNum = function() {

    var stack = this.audioStack.stack;
    var stackL;
    var newStack;
    var i;

    //  if there is no stack
    if ( !stack || !stack.length ) {
      return;
    }

    stackL = stack.length;
    newStack = [];
    i = 0;

    for ( ; stackL > i; i++ ) {

      //  push new audioObject from the liczby chat data
      newStack.push( this.lasData.chat[ stack[ i ] ] );

      //  if it is the last, assign pause time
      if ( stackL === i + 1 ) {
        newStack[ i ].pauseTime = ( i * 0.5 ) + 2;
      }

    }

    window.console.log( newStack );

    //  assign new stack
    this.audioStack.stack = newStack;

  };


  lasLiczby.getRandomBubble = function() {
    window.console.log( 'getRandomBubble in lasLiczby');

    if ( this.randomChatArray.length ) {
      //  if there are still chat items to show

      //  pop data and return the object
      var pop = this.randomChatArray.pop();
      return pop;

    }
    else {
      //  Set state
      this.state.currentState = 'END';

      return this.getEndBubble();
    }

  };



  //
  //  Numbers
  //


  //  Create random array
  lasLiczby.getRandomArrayOfNumbers = function() {

    var i;
    var tensL;
    var num;
    var tens;
    var newArray = [];

    window.console.log('Level: ' + this.state.level);

    //  from 0 to 19
    if ( this.state.level === 0 ) {

      newArray = this.shuffleArray( [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19] );

      window.console.log(newArray);

    }
    //  bigger numbers
    else if ( this.state.level === 20 ) {

      //  we use IIFE to lock the variable i
      (function() {

        i = newArray.length;

        tens = [2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9];
        tensL = tens.length;

        while ( i < tensL ) {

          num = parseInt ( tens[i] + '' + this.getRandomNumber( 0 ) );

          //  check if array contains the number
          if ( !newArray.includes( num ) ) {

            i = newArray.unshift( num );

          }

        }

        //  fill up rest of the arrays
        while ( i < 20 ) {

          //  get random number
          num = this.getRandomNumber( 20 );

          //  check if array contains the number
          if ( !newArray.includes( num ) ) {

            i = newArray.unshift( num );

          }

        }

        //  shuffel
        newArray = this.shuffleArray( newArray );


      }).bind( this )();

    }
    //  thousands
    else if ( this.state.level === 100 ) {

      //  we use IIFE to lock the variable i
      (function() {

        i = newArray.length;

        //  fill up the array
        while ( i < 20 ) {

          //  get random number
          num = this.getRandomNumber( 100 );

          //  check if array contains the number
          if ( !newArray.includes( num ) ) {

            i = newArray.unshift( num );

          }

        }

      }).bind( this )();

    }

    window.console.log( newArray );

    return newArray;

  };


  //  Random number
  //  returns a number in chosen span
  lasLiczby.getRandomNumber = function( option ) {

    var min;
    var max;

    if ( 0 === option ) {
      min = 0;
      max = 9;
    }
    else if ( 20 === option ) {
      min = 20;
      max = 99;
    }
    else if ( 100 === option ) {
      min = 1000;
      max = 9999;
    }

    return Math.floor( Math.random() * (max - min + 1) ) + min;

  };


  //  Number to words
  //  save new msg
  //  fill the audioStack with numbers to read
  lasLiczby.createWordsFromNum = function() {
    var j = this.lasData.words.j;
    var d = this.lasData.words.d;
    var r = '';
    var num = this.currentNum.toString();
    var numAudioStackL, tusen, hundre, ti, en;

    //  do 20
    if ( 20 > num ) {

      if ( 1 == num ) {

        r += 'én, ei, ett<br />zgodnie z rodzajem';

        //  push to audio sequence
        numAudioStackL = this.audioStack.stack.push('numEnEiEt');

      }
      else {

        r += j[num];

        //  push to audio sequence
        numAudioStackL = this.audioStack.stack.push('num' + num);

      }

    }
    //  do 100
    else if ( 100 > num ) {

      ti = parseInt( num[0] );
      en = parseInt( num[1] );

      r += d[ti];

      //  push to audio sequence
      numAudioStackL = this.audioStack.stack.push('num' + ti + '0');

      //  większe od 0
      if ( 0 < en ) {

        r += j[en];

        //  push to audio sequence
        numAudioStackL = this.audioStack.stack.push('num' + en);
      }

    }
    //  tysiące
    else {

      tusen =   parseInt( num[0] );
      hundre =  parseInt( num[1] );
      ti =      parseInt( num[2] );
      en =      parseInt( num[3] );

      //  kilka tysięcy
      if ( 1 < tusen ) {
        r += j[tusen];
        r += ' tusen';

        //  push to audio sequence
        numAudioStackL = this.audioStack.stack.push('num' + tusen);
      }
      //  jeden tysiąc
      else if ( 1 == tusen ) {
        r += 'ett tusen ';

        //  push to audio sequence
        numAudioStackL = this.audioStack.stack.push('numEt');
      }

      //  push to audio sequence
      numAudioStackL = this.audioStack.stack.push('num1000');

      //  jeśli są setki
      if ( 0 < hundre ) {

        //  kilka setek
        if ( 1 < hundre ) {
          r += ' ' + j[hundre] + ' hundre';

          //  push to audio sequence
          numAudioStackL = this.audioStack.stack.push('num' + hundre);
        }
        //  jedna setka
        else if ( 1 == hundre ) {
          r += ' ett hundre';

          //  push to audio sequence
          numAudioStackL = this.audioStack.stack.push('numEt');
        }

        //  push to audio sequence
        numAudioStackL = this.audioStack.stack.push('num100');

      }

      //  jeśli są dziesiątki lub jedności
      if ( (0 < ti) || (0 < en) ) {
        r += ' og ';

        //  push to audio sequence
        numAudioStackL = this.audioStack.stack.push('og');
      }

      //  od 10 do 19
      if ( 1 == ti ) {
        r += j[10 + en];

        //  push to audio sequence
        numAudioStackL = this.audioStack.stack.push('num' + (10 + en) );
      }
      else {
        //  dziesiątki
        if (0 < ti) {
          r += d[ti];

          //  push to audio sequence
          numAudioStackL = this.audioStack.stack.push('num' + (ti*10) );
        }
        //  jedności
        if  (0 < en) {
          r += j[en];

          //  push to audio sequence
          numAudioStackL = this.audioStack.stack.push('num' + en );
        }

      }

    }


    //  assign msg
    this.msg = '<span class="h1 size-6">' + num + '</span><br />' + r;

    window.console.log(this.audioStack.stack);

  };




  //  return augmented object
  return lasLiczby;

}

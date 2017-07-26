//
//  Las Chat
//



//
//  problem ze znikaniem poprzedniej odpowiedzi, jeśli w następnej jest tylko jedna
//

function LasChat() {
  "use strict";


  //  get methods from the LasHelper
  //  we can add new methods or overwrite old ones
  var las = new LasHelper();

  //
  //  Elements
  //
  las.wrapper =              document.getElementById('chat-bot');
  las.clickedAnswer =        null;
  las.chatFlow =             null;
  las.answersWrapper =       null;
  las.answerElements =       [];
  las.currentBubble =        null;
  las.prefetch =             document.createElement('div');


  //
  //  Chat Data
  //
  las.currentBubbleData =    null;
  las.bubbleArray =          [];
  //  this will be assigned with assignAnswersData
  las.answersData =         [];
  las.bubbleAutoNext =       '';

  //
  //  State
  //
  las.state = {
    answersWaiting:           false,
    currentState:             '',             // END / INTRO / CHAT
    testmode:                 false,
    bubbling:                 false
  };

  las.scrollFn =             function(){};



  //
  //  Initiate
  //
  las.init = function() {

    //  get Elements
    this.getBasicElements();

    //  random chat arrays
    this.randomIntroArray =   this.getRandomArrayOfFirstBubbles( this.lasData.intro );
    this.randomChatArray =    this.getRandomArrayOfFirstBubbles( this.lasData.chat );
    this.randomEndArray =     this.getRandomArrayOfFirstBubbles( this.lasData.end );

    //  create chat
    this.createChat();
    this.addListener();
    this.resetAnswers();

    if ( !las.state.testmode ) {
      this.hideLoader();

      //  get the intro
      this.getNextBubble( 'INTRO' );
      this.createBubble();
    }
  };


  las.createChat = function() {
    var chatWrapper = document.createElement('div');
    var chatWindow = document.createElement('div');
    var chatRow = document.createElement('div');
    var chatFlow = document.createElement('ul');
    var answersWrapper = document.createElement('li');
    var answerElements = [];

    chatWrapper.className = 'chat-wrapper';
    chatWrapper.setAttribute('role', 'main');
    chatWindow.className = 'section-content chat-window';
    chatRow.className = 'row';
    chatFlow.className = 'main-column center chat-flow nodots group';

    chatRow.appendChild(chatFlow);
    chatWindow.appendChild(chatRow);
    chatWrapper.appendChild(chatWindow);

    answersWrapper.className = 'chat-answers';
    answersWrapper.id = 'chat-answers';

    answerElements[0] = document.createElement('button');
    answerElements[0].className = 'btn btn-blue btn-s-2 btn-chat-answer';
    answerElements[0].setAttribute('role', 'button');
    answerElements[0].innerHTML = '&nbsp;';

    answerElements[1] = answerElements[0].cloneNode(true);
    answerElements[2] = answerElements[0].cloneNode(true);
    answerElements[3] = answerElements[0].cloneNode(true);

    answerElements[0].id = 'answer-0';
    answerElements[1].id = 'answer-1';
    answerElements[2].id = 'answer-2';
    answerElements[3].id = 'answer-3';

    // Append
    answersWrapper.appendChild(answerElements[0]);
    answersWrapper.appendChild(answerElements[1]);
    answersWrapper.appendChild(answerElements[2]);
    answersWrapper.appendChild(answerElements[3]);
    chatFlow.appendChild(answersWrapper);
    this.wrapper.appendChild(chatWrapper);

    // Assign
    this.chatFlow = chatFlow;
    this.chatWindow = chatWindow;
    this.answersWrapper = answersWrapper;
    this.answerElements[0] = answerElements[0];
    this.answerElements[1] = answerElements[1];
    this.answerElements[2] = answerElements[2];
    this.answerElements[3] = answerElements[3];
  };


  //
  //  BUBBLE
  //  check what data is available, assign it and reset those unavailable
  //
  las.assignBubbleData = function(no, data) {

    //  assign
    this.currentBubble = no;
    this.currentBubbleData = data;
    this.bubbleArray = this.currentBubbleData.bubbles;

    //  reset
    this.bubbleAutoNext = '';


    //
    //  tu dojdzie audio....
    //

    //  if there is autoNext
    if ( this.currentBubbleData.hasOwnProperty('autoNext') ) {

      this.bubbleAutoNext = this.currentBubbleData.autoNext;

    }
    //  if there are answers
    else if ( this.currentBubbleData.hasOwnProperty('answers') ) {

      //  loop over all available answers
      this.assignAnswersData();

    }
    else {
      throw "There is no autoNext or answers – can't work";
    }

  };

  //  do usunięcia
  las.assignAnswersData = function() {
    //  this.answers = [
    //    { answer: '', next: '', score: 'wrong' },
    //    { answer: '', next: '', score: 'correct' },
    //    { answer: '', next: '', score: 'partial' },
    //    { answer: '', next: '', score: 'more' }
    //  ]

    var i;
    var c = this.currentBubbleData.answers.length;

    //  reset
    this.answersData = [];

    window.console.log('assignAnswersData');

    //  shuffle answers
    this.currentBubbleData.answers = this.shuffleArray( this.currentBubbleData.answers );

    //  loop over answers to create array
    for ( i = 0; i < c; i++ ) {

      this.answersData[i] = this.currentBubbleData.answers[i];

    }

  };


  //
  //  Create Bubble
  //
  las.createBubble = function() {
    if (this.state.answersWaiting) {
      return false;
    }

    var bubble = document.createElement('li');
    var content = this.encodeBubble( this.bubbleArray.shift() );
    var nextFunction;

    this.prefetch.innerHTML = content;

    bubble.className = 'white chat-bubble';
    bubble.innerHTML = '<span class="ball-pulse-sync ball-pulse-sync-dark"><div></div><div></div><div></div></span>';
    bubble.id = 'bubble-' + this.currentBubble;

    this.scrollFn = function() { las.chatFlow.insertBefore(bubble, las.chatFlow.lastChild); };
    this.scrollAfterChange();


    if ( this.bubbleArray.length > 0 ) {
      // if there are more bubbles in the array

      nextFunction = function() { las.createBubble(); };

    }
    else if (this.bubbleAutoNext !== '') {
      // if there is a autoNext bubble

      nextFunction = function() {
        las.getNextBubble( las.bubbleAutoNext );
        las.createBubble();
      };

    }
    else {

      nextFunction = function() { las.showAnswers(); };
    }

    //  Show bubble with loader
    this.velocity(bubble,
      { right: [0, '100%'] },
      { duration: 5 * las.helper.speed, easing: las.helper.easingSpring }
    );

    //  Hide bubble and swap content
    this.velocity(bubble,
      { translateX: '-130%' },
      { duration: this.helper.speed, easing: las.helper.easingSpring, delay: this.helper.speed,
        complete: function() {
          if (content.indexOf('<img') !== -1 ) {
            bubble.className += ' chat-bubble-img';
          }

          las.scrollFn = function() { bubble.innerHTML = content; };
          las.scrollAfterChange();

        }
      }
    );

    //  Show bubble with content
    this.velocity(bubble,
      { translateX: 0 },
      { duration: 5 * las.helper.speed, easing: las.helper.easingSpring, delay: 0.5 * las.helper.speed,
        complete: function() { nextFunction(); }
      }
    );

  };


  //
  //  Answer to Bubble
  //
  las.answerToBubble = function() {

    //  this one prevents some glitches
    if ( this.state.bubbling ) {
      return false;
    }

    this.state.bubbling = true;

    var answerBubble = document.createElement('li');
    var clickedAnswerRect;
    var answerBubbleRect;
    var newLeft;
    var newTop;
    var completeFn;

    answerBubble.innerHTML = this.encodeBubble( this.clickedAnswer.answer );
    answerBubble.className = 'chat-bubble-answer';

    // Append answer
    this.chatFlow.insertBefore( answerBubble, this.chatFlow.lastChild );

    // Get coordinates for the animation
    clickedAnswerRect = this.clickedAnswerEl.getBoundingClientRect();
    answerBubbleRect = answerBubble.getBoundingClientRect();
    newLeft = clickedAnswerRect.left - answerBubbleRect.left + 'px';
    newTop = clickedAnswerRect.top - answerBubbleRect.top + 'px';

    //  Reset
    this.resetAnswers();

    // Adjust padding
    this.velocity(
      this.chatFlow,
      { paddingBottom: '4rem' },
      { duration: 4 * this.helper.speed, easing: 'easeInOutQuart' }
    );

    completeFn = function() {

      //  get next bubble
      this.getNextBubble( this.clickedAnswer.next );
      //  set timer
      setTimeout(function() {
        this.createBubble();
      }.bind(this), 2 * this.helper.speed);

    }.bind(this);

    // Animate answerBubble
    this.velocity(
      answerBubble,
      { translateY: [0, newTop], translateX: [0, newLeft], backgroundColor: ['#73b9e6', '#3a8ac0'], opacity: [1, 1] },
      { duration: 2 * this.helper.speed, easing: [ 300, 20 ],
        complete: function() {
          completeFn();
        }
      }
    );

    //  reset bubbling state
    this.state.bubbling = false;

  };


  //
  //  ANSWERS
  //
  las.showAnswers = function() {
    var i;
    var l = this.answersData.length;

    this.state.answersWaiting = true;

    //  loop over answers
    for ( i=0; i<l; i++ ) {

      //  check if answer has text
      if ( this.answersData[i].answer && ( this.answersData[i].answer !== '' ) ) {

        this.answerElements[i].innerHTML = this.encodeBubble( this.answersData[i].answer );
        this.answerElements[i].style.display = 'inline-block';

      }

    }

    //  Adjust padding
    this.velocity(this.chatFlow,
      { paddingBottom: las.answersWrapper.offsetHeight + 5 + 'px' },
      { duration: 1 * las.helper.speed, easing: 'easeInOutQuart' }
    );
    las.scrollAfterChange();

    //  show answers
    this.velocity(this.answersWrapper, { translateY: 0 }, { duration: 5 * las.helper.speed, easing: las.helper.easingSpring, queue: false } );

    //  animate sequential answers
    for ( i=0; i<l; i++ ) {

      //  check if answer has text
      if ( this.answersData[i].answer && ( this.answersData[i].answer !== '' ) ) {

        //  use IIFE to lock the variable i
        (function( i ) {
          this.velocity(
            this.answerElements[i],
            { translateY: 0 },
            { duration: 3 * las.helper.speed, easing: 'easeInOutQuart', /*delay: 3*las.helper.speed*/ }
          );
        }).bind( this )( i );

      }

    }

  };


  las.resetAnswers = function() {
    var i;
    var l = this.answerElements.length;
    var completeFn;

    this.state.answersWaiting = false;

    if ( this.clickedAnswerEl ) {
      this.clickedAnswerEl.style.visibility = 'hidden';
    }

    // testing whole answers animation
    this.velocity(
      this.answersWrapper,
      { translateY: '100%' },
      { duration: 2 * las.helper.speed, easing: [ 300, 20 ], queue: false }
    );

    //  animate sequential answers
    for ( i=0; i<l; i++ ) {

      //  use IIFE to lock the variable i
      (function( i ) {

        completeFn = function( i ) {
          //  get next bubble
          this.answerElements[i].style.visibility = 'visible';
        }.bind( this );

        this.velocity(
          this.answerElements[i],
          { translateY: (i * 33) + '%' },
          { duration: 2 * las.helper.speed, easing: [ 300, 20 ], display: 'none',
            complete: function() {
              completeFn( i );
            }
          }
        );

      }).bind( this )( i );

    }

  };





  //
  //  HELPERS
  //
  las.scrollAfterChange = function() {
    var scrollNo;

    // Get offset before append
    scrollNo = this.wrapper.scrollTop;

    // Append or other scrollFn
    this.scrollFn();

    // Keep the scroll at place
    this.wrapper.scrollTop = scrollNo;

    this.velocity(las.answersWrapper, 'scroll', { container: las.wrapper, duration: 4 * las.helper.speed, offset: -5, easing: 'easeInOutQuart', queue: false });

    // Reset scroll function
    this.scrollFn = function() {};
  };


  las.eventHandler = function(event) {

    var elWithId;
    var answerSplit;
    var answerNo;

    //  throttle clicks
    if ( this.checkClickState() ) {
      return;
    }

    //  traverse up to find the element with ID
    elWithId = this.checkNodeAndParents( event, false, 'id' );

    //  this is an answer
    if ( elWithId && ( elWithId.id.indexOf('answer-') !== -1 ) ) {

      answerSplit = elWithId.id.split('-');

      //  answer has number
      if ( answerSplit.length > 1 ) {

        answerNo = answerSplit[1];

        //  assign clicked answer
        this.clickedAnswer = this.answersData[ answerNo ];
        this.clickedAnswerEl = this.answerElements[ answerNo ];


        //  Answer to Bubble
        this.answerToBubble();

        //  Add score by answer
        this.addScoreAnswer( this.clickedAnswer );


        //  If this is the END
        if ( this.clickedAnswer.hasOwnProperty('next') && ( this.clickedAnswer.next === 'END' ) ) {

          this.finish();

        }

        //  stop eventHandler
        event.stopPropagation();
        return;
      }

    }

    event.preventDefault();
    return false;
  };


  las.addListener = function() {
    /*this.answersWrapper.addEventListener('touchend', function(event) {
      las.eventHandler(event);
    }, false);*/

    this.answersWrapper.addEventListener('click', function(event) {

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
    var property;
    var bubble;
    var content;
    var i;
    var l;
    var liEl;
    var line;
    var lineIntro;
    var lineChat;
    var loopDataFn;
    var bigLineCss = 'width:100%;padding-top:2.5rem;padding-bottom:2.5rem;background: rgba(0,0,0,0.15);color: #fff;text-align:center;clear:both;';

    window.console.log('testmode');

    this.state.answersWaiting = true;
    this.resetAnswers();
    this.state.answersWaiting = true;
    this.bubbleArray = [];
    this.velocity(this.answersWrapper, 'stop', true);
    this.chatFlow.innerHTML = '';
    this.chatFlow.style.display = 'none';

    loopDataFn = function ( data ) {
      for (property in data) {
        if (data.hasOwnProperty(property)) {

          data[property].bubbles.forEach( function(item, index, array) {
            bubble = document.createElement('li');
            content = this.encodeBubble( item );

            bubble.className = 'white chat-bubble';
            bubble.style.right = '0';
            bubble.innerHTML = content;

            this.chatFlow.appendChild(bubble);
          }.bind(this) );

          //  if there are answers
          if ( data[property].hasOwnProperty('answers') ) {

            l = data[property].answers.length;

            for ( i=0; i<l; i++) {

              liEl = document.createElement('li');
              liEl.className = 'chat-bubble-answer';
              liEl.style.opacity = '1';
              liEl.innerHTML = this.encodeBubble( data[property].answers[i].answer );
              this.chatFlow.appendChild( liEl );

            }

          }

          line = document.createElement('li');

          if ( data[property].autoNext === 'RANDOM' ) {
            line.style.cssText = bigLineCss;
            line.innerHTML = 'Koniec sekcji<br /><span class="size-0">W ramach sekcji, kolejność jest stała. Sekcje są wybierane losowo.</span>';
          }
          else {
            line.style.cssText = 'width:100%;height:3px;background:#fff;margin:2.5rem 0;clear:both;';
          }

          this.chatFlow.appendChild(line);

        } // end if has property
      } // end loop
    }.bind(this);



    loopDataFn( this.lasData.intro );
    lineIntro = document.createElement('li');
    lineIntro.style.cssText = bigLineCss;
    lineIntro.innerHTML = 'Koniec INTRO';
    this.chatFlow.appendChild(lineIntro);

    loopDataFn( this.lasData.chat );
    lineChat = document.createElement('li');
    lineChat.style.cssText = bigLineCss;
    this.chatFlow.appendChild(lineChat);

    loopDataFn( this.lasData.end );



    this.chatFlow.style.display = 'block';

    this.hideLoader();

  };


  //  return augmented object
  return las;

}
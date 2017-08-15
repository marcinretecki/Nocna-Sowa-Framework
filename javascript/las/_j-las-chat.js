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
  las.wrapper =               document.getElementById('chat-bot');
  las.chatFlow =              null;
  las.answersWrapper =        null;
  las.answerElements =        [];
  las.currentBubble =         null;
  las.prefetch =              document.createElement('div');


  //
  //  Data
  //
  //  this will we assigned at assignBubbleData
  //
  las.currentBubbleData =     null;

  las.bubbleStack = {
    stack:                    [],
    pointer:                  0
  };


  //
  //  Clicked Answer
  //
  las.clickedAnswer =         0;
  las.clickedAnswerEl =       null;


  //
  //  State
  //
  las.state = {
    currentState:             '',             // END / INTRO / CHAT
    answers:                  false,
    testmode:                 false,
    bubbling:                 false,
    clicked:                  false
  };

  las.scrollFn =              function(){};



  //
  //  Initiate
  //
  las.init = function() {

    window.console.log('init');

    if ( !this.audioFile ) {
      window.console.log('there is no audio file');
    }

    //
    //  Get Data
    //
    this.lasData =            new LasData();

    //  get Elements
    this.getBasicElements();


    //  Prepare
    this.createChat();
    this.addListener();
    this.resetAnswers();

    //  If not test mode, begin
    //  Get the intro
    if ( !this.state.testmode ) {
      this.hideLoader();

      //  get the intro
      this.currentBubbleData = this.getNextBubble( 'INTRO' );

      this.createBubble();
    }
  };


  las.createChat = function() {
    var chatWrapper = document.createElement('div');
    var chatWindow = document.createElement('div');
    var chatFlow = document.createElement('ul');
    var answersWrapper = document.createElement('li');
    var answerElements = [];

    chatWrapper.className = 'chat-wrapper';
    chatWrapper.setAttribute('role', 'main');
    chatWindow.className = 'section-content chat-window';
    chatFlow.className = 'main-column main-column--back chat-flow nodots group';

    chatWindow.appendChild(chatFlow);
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


  //  //
  //  //  BUBBLE
  //  //  check what data is available, assign it and reset those unavailable
  //  //
  //  las.assignBubbleData = function(no, data) {

  //    //  assign
  //    this.currentBubbleData = data;

  //    //  reset bubble stack
  //    this.bubbleStack.stack = [];
  //    this.bubbleStack.pointer = 0;

  //    //  new bubble stack
  //    this.bubbleStack.stack = this.currentBubbleData.bubbles;


  //    //
  //    //  tu dojdzie audio....
  //    //


  //    //  if there is no autoNext or answers
  //    if ( !( this.currentBubbleData.hasOwnProperty('autoNext') || this.currentBubbleData.hasOwnProperty('answers') ) ) {

  //      throw "There is no autoNext or answers – audio test can't work";

  //    }

  //  };



  //
  //  Create Bubble
  //
  las.createBubble = function() {

    var l;

    if ( this.state.answers ) {
      return false;
    }

    window.console.log( 'createBubble' );

    //  if there is no autoNext or answers or bubbles
    if ( !( this.currentBubbleData.hasOwnProperty('autoNext') ||
            this.currentBubbleData.hasOwnProperty('answers') ||
            this.currentBubbleData.hasOwnProperty('bubbles') ) ) {

      throw "There is no autoNext or answers or bubbles – chat can't work";

    }


    //  if there is bubble stack
    if ( this.bubbleStack.stack && this.bubbleStack.stack.length ) {

      l = this.bubbleStack.stack.length;

      //  pointer is at the end
      if ( ( l > 0 ) && ( l === this.bubbleStack.pointer  ) ) {

        //  reset bubble stack
        this.bubbleStack.stack = [];
        this.bubbleStack.pointer = 0;

        //  if there is autoNext
        if ( this.currentBubbleData.autoNext ) {

          this.currentBubbleData = this.getNextBubble( this.currentBubbleData.autoNext );

          this.createBubble();
        }
        //  if there are answers
        else if ( this.currentBubbleData.answers ) {

          this.showAnswers();

        }

      }

    }
    //  there is no stack
    else {

      //  new bubble stack
      this.bubbleStack.stack = this.currentBubbleData.bubbles;

      //  start the loop
      this.loopBubbleStack();

    }


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
    Velocity(
      this.chatFlow,
      { paddingBottom: '4rem' },
      { duration: 4 * this.helper.speed, easing: 'easeInOutQuart' }
    );

    completeFn = function() {

      //  get next bubble
      this.currentBubbleData = this.getNextBubble( this.clickedAnswer.next );

      //  set timer
      setTimeout(function() {
        this.createBubble();
      }.bind(this), 2 * this.helper.speed);

    }.bind(this);

    // Animate answerBubble
    Velocity(
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
  //  loop over bubble stack
  //
  las.loopBubbleStack = function() {

    var l;

    //  if no stack or stack is empty
    if ( !this.bubbleStack.stack ) {
      return;
    }

    l = this.bubbleStack.stack.length;


    //  is there sth left on stack?
    if ( l > this.bubbleStack.pointer ) {

      //  show bubble
      this.showBubble();

    }
    //  there is nothing more on stack
    else if ( l === this.bubbleStack.pointer ) {

      //  back to createBubble()
      this.createBubble();

    }

  };

  //
  //  Single bubble from the stack
  //  recursive with loopBubbleStack()
  //
  las.showBubble = function() {

    var bubble;
    var content;
    var swapContentFn;
    var backToLoopFn;

    //  no bubble in the stack
    if ( !this.bubbleStack.stack[ this.bubbleStack.pointer ] ) {
      return;
    }

    //  encode content
    content = this.encodeBubble( this.bubbleStack.stack[ this.bubbleStack.pointer ] );

    //  prefetch to start loading images
    this.prefetch.innerHTML = content;

    //  create loader bubble element
    bubble = document.createElement('li');
    bubble.className = 'white chat-bubble';
    bubble.innerHTML = '<span class="ball-pulse-sync ball-pulse-sync-dark"><div></div><div></div><div></div></span>';


    //  insert loader bubble
    this.scrollFn = function() {
      this.chatFlow.insertBefore(bubble, this.chatFlow.lastChild);
    }.bind(this);

    this.scrollAfterChange();


    //  after show bubble with loader
    swapContentFn = function() {

      var currentBubble = this.currentBubbleData;
      var stackL = this.bubbleStack.stack.length;
      var pointer = this.bubbleStack.pointer;

      console.log('pointer: ' + pointer);
      console.log('stackL: ' + stackL);

      //  add class name for img bubbles
      if ( content.indexOf( '<img' ) !== -1 ) {
        bubble.className += ' chat-bubble--img';
      }

      //  if it is last from stack
      if (     currentBubble.hasOwnProperty('autoNext') && ( currentBubble.autoNext === 'RANDOM' ) && ( stackL === pointer + 1 ) ) {
        bubble.className += ' chat-bubble--eng-segment';
      }

      this.scrollFn = function() { bubble.innerHTML = content; };
      this.scrollAfterChange();

    }.bind(this);

    //  Show bubble with loader
    Velocity(bubble,
      { right: [0, '100%'] },
      { duration: 5 * this.helper.speed, easing: this.helper.easingSpring }
    );


    //  Hide bubble and swap content
    Velocity(bubble,
      { translateX: '-130%' },
      { duration: this.helper.speed, easing: this.helper.easingSpring, delay: this.helper.speed,
        complete: function() {
          swapContentFn();
        }
      }
    );


    //  after show bubble with content
    backToLoopFn = function() {

      //  move the pointer
      this.bubbleStack.pointer += 1;

      //  back to loop
      this.loopBubbleStack();

    }.bind(this);

    //  Show bubble with content
    Velocity(bubble,
      { translateX: 0 },
      { duration: 5 * this.helper.speed, easing: this.helper.easingSpring, delay: 0.5 * this.helper.speed,
        complete: function() {
          backToLoopFn();
        }
      }
    );

  };


  //
  //  ANSWERS
  //
  las.showAnswers = function() {

    var i;
    var l;

    if ( this.state.answers || !this.currentBubbleData.answers ) {

      window.console.log('answers waitin or no answers');

      return false;
    }

    this.state.answers = true;

    window.console.log('show answers');

    //  Shuffle answers
    this.currentBubbleData.answers = this.shuffleArray( this.currentBubbleData.answers );

    l = this.currentBubbleData.answers.length;


    //  loop over answers
    //  this is needed for padding fix later
    for ( i=0; i<l; i++ ) {

      this.answerElements[i].innerHTML = this.encodeBubble( this.currentBubbleData.answers[i].answer );
      this.answerElements[i].style.display = 'inline-block';

    }

    //  Adjust padding
    Velocity(
      this.chatFlow,
      { paddingBottom: this.answersWrapper.offsetHeight + 5 + 'px' },
      { duration: 1 * this.helper.speed, easing: 'easeInOutQuart' }
    );
    this.scrollAfterChange();


    //  show answers
    Velocity(
      this.answersWrapper,
      { translateY: [0, '100%'] },
      { duration: 5 * this.helper.speed, easing: this.helper.easingSpring, queue: false }
    );

    //  animate sequential answers
    for ( i=0; i<l; i++ ) {

      //  check if answer has text
      if ( this.currentBubbleData.answers[i].answer && ( this.currentBubbleData.answers[i].answer !== '' ) ) {

        //  use IIFE to lock the variable i
        (function( i ) {
          Velocity(
            this.answerElements[i],
            { translateY: [0, (i * 33) + '%'] },
            { duration: 3 * this.helper.speed, easing: 'easeInOutQuart' }
          );

          window.console.log('show answer ' + i);
        }).bind( this )( i );

      }
      //  if there is no such answer, hide it
      else {
        this.answerElements[i].style.visibility = 'hidden';

        window.console.log('hide answer ' + i);
      }

    }

  };


  las.resetAnswers = function() {
    var i;
    var l;
    var completeFn;

    //  if there was no answers
    if ( !this.state.answers ) {
      return false;
    }

    this.state.answers = false;

    window.console.log('reset answers');


    if ( this.clickedAnswerEl ) {
      this.clickedAnswerEl.style.visibility = 'hidden';
    }

    //  hide answers
    Velocity(
      this.answersWrapper,
      { translateY: ['100%', 0] },
      { duration: 2 * this.helper.speed, easing: [ 300, 20 ], queue: false }
    );

    l = this.answerElements.length;

    //  animate sequential answers
    for ( i=0; i<l; i++ ) {

      //  use IIFE to lock the variable i
      (function( i ) {

        completeFn = function( i ) {
          this.answerElements[i].style.visibility = 'visible';
        }.bind( this );

        Velocity(
          this.answerElements[i],
          { translateY: (i * 33) + '%' },
          { duration: 2 * this.helper.speed, easing: [ 300, 20 ], display: 'none',
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

    Velocity(this.answersWrapper, 'scroll', { container: this.wrapper, duration: 4 * this.helper.speed, offset: -5, easing: 'easeInOutQuart', queue: false });

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
        this.clickedAnswer = this.currentBubbleData.answers[ answerNo ];
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
      this.eventHandler(event);
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
    var data = this.lasData;
    var bubble;
    var testNotes = data.testNotes;
    var testNotesEl;
    var testNotesContent = '';
    var content;
    var i;
    var j;
    var l;
    var liEl;
    var line;
    var loopDataFn;
    var bigLineCss = 'width:100%;padding-top:2rem;padding-bottom:2rem;background: rgba(0,0,0,0.15);color: #fff;text-align:center;clear:both;';

    window.console.log('testmode');

    document.styleSheets[0].insertRule('.chat-flow::before { height: 4rem !important; }', 1);

    this.state.answers = true;
    this.resetAnswers();
    this.bubbleStack = [];
    Velocity(this.answersWrapper, 'stop', true);
    this.chatFlow.innerHTML = '';
    this.chatFlow.style.display = 'none';

    line = document.createElement('li');
    line.style.cssText = 'width:100%; padding-top:1rem; padding-bottom:1rem; margin:0 0 1rem; clear:both; position:relative;';
    line.className = 'section-dark';
    line.innerHTML = '<h3>' + this.helper.chapter + '</h3><p class="space-0">Category: ' + data.category +
        '<br />' + 'Max correct: ' + this.countMaxCorrectAnswers(data.chat) +
        '<br />' + 'Extra: ' + this.countMaxCorrectAnswers(data.extra) +
        '</p>';
    this.chatFlow.appendChild(line);

    if ( testNotes ) {
      //  create test notes
      testNotesEl = document.createElement('li');
      testNotesEl.style.cssText = 'width:100%; padding-top:1rem; padding-bottom:1rem; margin:0 0 1rem; clear:both; position:relative;';
      testNotesEl.className = 'section-dark';
      testNotesContent += '<p class="size-1 space-half">Test Notes</p>';
      testNotesContent += '<ul class="light-dots">';

      //  show test notes
      for ( j = 0; j < testNotes.length; j++ ) {

        testNotesContent += '<li>' + testNotes[j] + '</li>';

      }

      testNotesEl.innerHTML = testNotesContent;
      this.chatFlow.appendChild(testNotesEl);
    }

    loopDataFn = function ( data ) {

      var property;

      if ( !data ) {
        return;
      }

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

              //  if wrong, change background
              if ( data[property].answers[i].score === 'wrong' ) {

                liEl.style.backgroundColor = '#de7642';

              }
              else if ( data[property].answers[i].score === 'correct' ) {

                liEl.style.backgroundColor = '#308c8c';

              }

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



    loopDataFn( data.intro );

    line = document.createElement('li');
    line.style.cssText = bigLineCss;
    line.innerHTML = 'CHAT';
    this.chatFlow.appendChild(line);
    loopDataFn( data.chat );

    line = document.createElement('li');
    line.style.cssText = bigLineCss;
    line.innerHTML = 'END';
    this.chatFlow.appendChild(line);
    loopDataFn( data.end );

    line = document.createElement('li');
    line.style.cssText = bigLineCss;
    line.innerHTML = 'EXTRA';
    this.chatFlow.appendChild(line);
    loopDataFn( data.extra );




    this.chatFlow.style.display = 'block';

    this.hideLoader();

  };


  //  return augmented object
  return las;

}
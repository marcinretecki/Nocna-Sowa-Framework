//
//  Las Word Quiz
//  Extends Audio Test
//




function LasTerminal() {
  "use strict";

  //  get methods from LasChat
  //  we can add new methods or overwrite old ones
  var las = new LasChat();


  //  if we need a blink element
  //las.wqBlink =               document.getElementById('wq-blink');



  //
  //  Create Terminal Chat
  //
  las.createChat = function() {
    this.answersWrapper = document.createElement('li');

    this.answersWrapper.className = 'terminal-answers';
    this.answersWrapper.id = 'terminal-answers';
    this.chatFlow.appendChild(this.answersWrapper);
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

    if ( this.state.answers || !this.currentBubbleData.answers ) {

      window.console.log('answers waitin or no answers');

      return false;
    }

    this.state.answers = true;

    window.console.log('show answers');

    this.answersWrapper.innerHTML = this.encodeBubble( this.currentBubbleData.command );

    //  Adjust padding
    Velocity(
      this.chatFlow,
      { paddingBottom: this.answersWrapper.offsetHeight + 20 + 'px' },
      { duration: 1 * this.helper.speed, easing: 'easeInOutQuart' }
    );
    this.scrollAfterChange();

    //  show answers
    Velocity(
      this.answersWrapper,
      { translateY: [0, '100%'] },
      { duration: 5 * this.helper.speed, easing: this.helper.easingSpring, queue: false }
    );

  };


  las.resetAnswers = function() {

    var completeFn;

    //  if there was no answers
    if ( !this.state.answers ) {
      return false;
    }

    this.state.answers = false;

    window.console.log('reset answers');


    //  hide answers
    Velocity(
      this.answersWrapper,
      { translateY: ['100%', 0] },
      { duration: 2 * this.helper.speed, easing: [ 300, 20 ], queue: false }
    );

  };



  //  return augmented object
  return las;

}

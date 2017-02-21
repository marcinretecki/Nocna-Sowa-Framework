//
// Las Chat
//


function LasChat() {
  //
  //  Elements
  //
  this.wrapper =              document.getElementById('chat-bot');
  this.clickedAnswer =        null;
  this.chatFlow =             null;
  this.answersWrapper =       null;
  this.answerElements =      [];
  this.currentBubble =        null;

  this.prefetch =             document.createElement('div');


  //
  //  Chat Data
  //
  this.lasData =              new LasChatData();
  this.currentBubbleData =    null;
  this.bubbleArray =          [];
  this.answersArray =         [];
  this.bubbleAutoNext =       '';

  //
  //  State
  //
  this.state = {
    answersWaiting:           false,
    currentState:             ''              // END / INTRO / CHAT
  };

  this.scrollFn =             function(){};

  //
  //  Helper
  //
  var self =                  this;

  //
  //  Initiate
  //
  this.init = function() {

    //  get Elements
    this.getBasicElements();

    //  random chat arrays
    this.randomIntroArray =   this.createRandomArrayOfFirstBubbles( this.lasData.intro );
    this.randomChatArray =    this.createRandomArrayOfFirstBubbles( this.lasData.chat );
    this.randomEndArray =     this.createRandomArrayOfFirstBubbles( this.lasData.end );

    //  create chat
    this.createChat();
    this.addListener();
    this.resetAnswers();

    this.hideLoader();

    //  get the intro
    this.getNextBubble( 'INTRO' );
    this.createBubble();
  };


  this.createChat = function() {
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
    chatFlow.className = 'col-10 center chat-flow nodots group';

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
  //  BUBBLES
  //
  this.createBubble = function() {
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

    this.scrollFn = function() { self.chatFlow.insertBefore(bubble, self.chatFlow.lastChild); };
    this.scrollAfterChange();


    if ( this.bubbleArray.length > 0 ) {
      // if there are more bubbles in the array

      nextFunction = function() { self.createBubble(); };

    }
    else if (this.bubbleAutoNext === 'END') {
      // if it is the end of chat

      nextFunction = function() {
        self.finish();
      };

    }
    else if (this.bubbleAutoNext !== '') {
      // if there is a autoNext bubble

      nextFunction = function() {
        self.getNextBubble( self.bubbleAutoNext );
        self.createBubble();
      };

    }
    else {

      nextFunction = function() { self.showAnswers(); };
    }

    //  Show bubble with loader
    this.velocity(bubble,
      { right: [0, '100%'] },
      { duration: 5 * self.helper.speed, easing: [ 200, 20 ]}
    );

    //  Hide bubble and swap content
    this.velocity(bubble,
      { translateX: '-130%' },
      { duration: this.helper.speed, easing: [ 200, 20 ], delay: this.helper.speed,
        complete: function() {
          if (content.indexOf('<img') !== -1 ) {
            bubble.className += ' chat-bubble-img';
          }

          self.scrollFn = function() { bubble.innerHTML = content; };
          self.scrollAfterChange();

        }
      }
    );

    //  Show bubble with content
    this.velocity(bubble,
      { translateX: 0 },
      { duration: 5 * self.helper.speed, easing: [ 200, 20 ], delay: 0.5 * self.helper.speed,
        complete: function() { nextFunction(); }
      }
    );

  };


  //
  //  ANSWERS
  //
  this.showAnswers = function() {
    var i;
    var l = this.answersArray.length;

    this.state.answersWaiting = true;

    //  loop over answers
    for ( i=0; i<l; i++ ) {

      //  check if answer has text
      if ( this.answersArray[i].answer && ( this.answersArray[i].answer !== '' ) ) {

        this.answerElements[i].innerHTML = this.encodeBubble( this.answersArray[i].answer );
        this.answerElements[i].style.display = 'inline-block';

      }

    }

    //  Adjust padding
    this.velocity(this.chatFlow,
      { paddingBottom: self.answersWrapper.offsetHeight + 5 + 'px' },
      { duration: 1 * self.helper.speed, easing: 'easeInOutQuart' }
    );
    self.scrollAfterChange();

    //  show answers
    this.velocity(this.answersWrapper, { translateY: 0 }, { duration: 5 * self.helper.speed, easing: [ 200, 20 ], queue: false } );

    //  animate sequential answers
    for ( i=0; i<l; i++ ) {

      //  check if answer has text
      if ( this.answersArray[i].answer && ( this.answersArray[i].answer !== '' ) ) {

        //  use IIFE to lock the variable i
        (function( i ) {
          this.velocity(
            this.answerElements[i],
            { translateY: 0 },
            { duration: 3 * self.helper.speed, easing: 'easeInOutQuart', /*delay: 3*self.helper.speed*/ }
          );
        }).bind( this )( i );

      }

    }

  };


  this.answerToBubble = function() {

    var answerBubble = document.createElement('li');
    var clickedAnswerRect;
    var answerBubbleRect;
    var newLeft;
    var newTop;
    var completeFn;

    answerBubble.innerHTML = this.clickedAnswer.answer;
    answerBubble.className = 'chat-bubble-answer';

    // Append answer
    this.chatFlow.insertBefore( answerBubble, this.chatFlow.lastChild );

    // Get coordinates for te animation
    clickedAnswerRect = this.clickedAnswerEl.getBoundingClientRect();
    answerBubbleRect = answerBubble.getBoundingClientRect();
    newLeft = clickedAnswerRect.left - answerBubbleRect.left + 'px';
    newTop = clickedAnswerRect.top - answerBubbleRect.top + 'px';

    // Hide answers
    this.clickedAnswerEl.style.visibility = 'hidden';
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

  };


  this.resetAnswers = function() {
    var i;
    var l = this.answerElements.length;
    var completeFn;

    this.state.answersWaiting = false;

    // testing whole answers animation
    this.velocity(
      this.answersWrapper,
      { translateY: '100%' },
      { duration: 2 * self.helper.speed, easing: [ 300, 20 ], queue: false }
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
          { duration: 2 * self.helper.speed, easing: [ 300, 20 ], display: 'none',
            complete: function() {
              completeFn( i );
            }
          }
        );

      }).bind( this )( i );

    }

  };


  //
  //  ASSIGN data from bubble
  //
  this.assignBubbleData = function(no, data) {
    var i;
    var l;

    this.currentBubble = no;
    this.currentBubbleData = data;

    this.bubbleArray = this.currentBubbleData.bubbles;

    if ( this.currentBubbleData.autoNext ) {

      //  assign autonext
      this.bubbleAutoNext = this.currentBubbleData.autoNext;

    }
    else {

      //  reset auto next
      this.bubbleAutoNext = '';

      l = this.currentBubbleData.answers.length;

      //  loop over answers
      for ( i=0; i<l; i++ ) {

        this.answersArray[i] = this.currentBubbleData.answers[i];

      }

    }

  };


  //
  //  HELPERS
  //
  this.scrollAfterChange = function() {
    var scrollNo;

    // Get offset before append
    scrollNo = this.wrapper.scrollTop;

    // Append or other scrollFn
    this.scrollFn();

    // Keep the scroll at place
    this.wrapper.scrollTop = scrollNo;

    this.velocity(self.answersWrapper, 'scroll', { container: self.wrapper, duration: 4 * self.helper.speed, offset: -5, easing: 'easeInOutQuart', queue: false });

    // Reset scroll function
    this.scrollFn = function() {};
  };


  this.eventHandler = function(event) {

    if ( ( event.target.id === 'answer-0' ) || ( event.target.parentNode.id === 'answer-0' ) ) {
      this.clickedAnswer = this.answersArray[ 0 ];
      this.clickedAnswerEl = this.answerElements[ 0 ];
      this.answerToBubble();
    }
    else if ( ( event.target.id === 'answer-1' ) || ( event.target.parentNode.id === 'answer-1' ) ) {
      this.clickedAnswer = this.answersArray[ 1 ];
      this.clickedAnswerEl = this.answerElements[ 1 ];
      this.answerToBubble();
    }
    else if ( ( event.target.id === 'answer-2' ) || ( event.target.parentNode.id === 'answer-2' ) ) {
      this.clickedAnswer = this.answersArray[ 2 ];
      this.clickedAnswerEl = this.answerElements[ 2 ];
      this.answerToBubble();
    }
    else if ( ( event.target.id === 'answer-3' ) || ( event.target.parentNode.id === 'answer-3' ) ) {
      this.clickedAnswer = this.answersArray[ 3 ];
      this.clickedAnswerEl = this.answerElements[ 3 ];
      this.answerToBubble();
    }

    event.preventDefault();
    return false;

  };


  this.addListener = function() {
    /*this.answersWrapper.addEventListener('touchend', function(event) {
      self.eventHandler(event);
    }, false);*/

    this.answersWrapper.addEventListener('click', function(event) {

      //  ignore right click
      if (event.which === 1) {

        this.eventHandler(event);

      }

    }.bind(this), false);

  };





  this.finish = function() {

    var finish = document.createElement('li');

    finish.className = 'nocnasowa centered size-1';
    finish.style.cssText = 'display:block;clear:both;margin:0;padding:2.5rem 0 0;opacity:0;';
    finish.innerHTML = '<span>Nocna</span> Sowa';

    this.scrollFn = function() { self.chatFlow.insertBefore(finish, self.chatFlow.lastChild); };
    this.scrollAfterChange();

    this.velocity(finish,
        { opacity: [1, 0] },
        { duration: 6 * self.helper.speed, easing: 'easeInOutQuart' }
      );

    window.console.log('END');

  };


  this.test = function() {
    var property;
    var data = this.lasData.chat;
    var bubble;
    var content;
    var i;
    var l;
    var liEl;

    this.showLoader();

    this.state.answersWaiting = true;
    this.resetAnswers();
    this.state.answersWaiting = true;
    this.bubbleArray = [];
    this.velocity(self.answersWrapper, 'stop', true);
    this.chatFlow.innerHTML = '';
    this.chatFlow.style.display = 'none';

    for (property in data) {
      if (data.hasOwnProperty(property)) {

        data[property].bubbles.forEach(function(item, index, array) {
          bubble = document.createElement('li');
          content = this.encodeBubble( item );

          bubble.className = 'white chat-bubble';
          bubble.style.right = '0';
          bubble.innerHTML = content;

          self.chatFlow.appendChild(bubble);
        }.bind(this));

        //  if there are answers
        if ( data[property].answers ) {

          l = data[property].answers.length;

          for ( i=0; i<l; i++) {

            liEl = document.createElement('li');
            liEl.className = 'chat-bubble-answer';
            liEl.style.opacity = '1';
            liEl.innerHTML = data[property].answers[i].answer;
            self.chatFlow.appendChild( liEl );

          }

        }

      var line = document.createElement('li');
      line.style.cssText = 'width:100%;height:3px;background:#fff;margin:2.5rem 0;clear:both;';

      self.chatFlow.appendChild(line);

      } // end if has property
    } // end loop

    self.chatFlow.style.display = 'block';

    this.hideLoader();

  };


}

//
//  Extend with LasHelper methods
//
LasChat.prototype = new LasHelper();
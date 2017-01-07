//
// Las Chat
//


function LasChat() {
  //
  //  Elements
  //
  this.wrapper =              document.getElementById('chat-bot');
  this.clickedAnswer =
  this.chatFlow =
  this.answers =
  this.answerOne =
  this.answerTwo =
  this.currentBubble =        null;

  this.prefetch =             document.createElement('div');


  //
  //  Chat Data
  //
  this.lasData =              new LasChatData();
  this.currentBubbleData =    null;
  this.bubbleArray =          [];
  this.answerOneText =
  this.answerTwoText =
  this.answerOneNext =
  this.answerTwoNext =
  this.bubbleAutoNext =       '';

  //
  //  State
  //
  this.state = {
    answersWaiting:           false,
    currentState:             ''              // END / INTRO / CHAT
  }

  this.scrollFn =             function(){};

  //
  //  Helper
  //
  var self =                  this,
      speed =                 200,
      answersTranformValue =  '300%',
      velocity =              Velocity;

  //
  //  Initiate
  //
  this.init = function() {

    //  Random chat arrays
    this.randomIntroArray =   this.createRandomArrayOfFirstBubbles( this.lasData.intro );
    this.randomChatArray =    this.createRandomArrayOfFirstBubbles( this.lasData.chat );
    this.randomEndArray =     this.createRandomArrayOfFirstBubbles( this.lasData.end );

    //  Create
    this.createChat();
    this.addListener();
    this.resetAnswers();

    //  Get the intro
    this.getNextBubble( 'INTRO' );
    this.createBubble();
  };


  this.createChat = function() {
    var chatWrapper = document.createElement('div'),
        chatWindow = document.createElement('div'),
        chatRow = document.createElement('div'),
        chatFlow = document.createElement('ul'),
        answers = document.createElement('li'),
        answerOne = document.createElement('button'),
        answerTwo;

    chatWrapper.className = 'chat-wrapper';
    chatWrapper.setAttribute('role', 'main');
    chatWindow.className = 'section-content chat-window';
    chatRow.className = 'row';
    chatFlow.className = 'col-10 white center chat-flow nodots group';

    chatRow.appendChild(chatFlow);
    chatWindow.appendChild(chatRow);
    chatWrapper.appendChild(chatWindow);

    answers.className = 'chat-answers';
    answers.id = 'chat-answers';

    answerOne.className = 'btn btn-blue btn-s-2 btn-chat-answer';
    //answerOne.type = 'button';
    answerOne.setAttribute('role', 'button');
    answerOne.innerHTML = '&nbsp;';

    answerTwo = answerOne.cloneNode(false);

    answerOne.id = 'answer-left';
    answerTwo.id = 'answer-right';
    answerTwo.innerHTML = '&nbsp;';

    // Append
    answers.appendChild(answerOne);
    answers.appendChild(answerTwo);
    chatFlow.appendChild(answers);
    this.wrapper.appendChild(chatWrapper);

    // Assign
    this.chatFlow = chatFlow;
    this.chatWindow = chatWindow;
    this.answers = answers;
    this.answerOne = answerOne;
    this.answerTwo = answerTwo;
  };


  //
  //  BUBBLES
  //
  this.createBubble = function() {
    if (this.state.answersWaiting) {
      return false;
    }

    var bubble = document.createElement('li'),
        content = this.bubbleArray.shift(),
        nextFunction;

    this.prefetch.innerHTML = content;

    bubble.className = 'beige chat-bubble';
    bubble.innerHTML = '<span class="ball-pulse-sync ball-pulse-sync-dark"><div></div><div></div><div></div></span>';
    bubble.id = 'bubble-' + this.currentBubble;

    this.scrollFn = function() { self.chatFlow.insertBefore(bubble, self.chatFlow.lastChild) };
    this.scrollAfterChange();


    if ( this.bubbleArray.length > 0 ) {
      // if there are more bubbles in the array

      nextFunction = function() { self.createBubble() };

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
    velocity(bubble,
      { right: [0, '100%'] },
      { duration: speed*5, easing: [ 200, 20 ]}
    );

    //  Hide bubble and swap content
    velocity(bubble,
      { translateX: '-130%' },
      { duration: speed, easing: [ 200, 20 ], delay: speed,
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
    velocity(bubble,
      { translateX: 0 },
      { duration: speed*5, easing: [ 200, 20 ], delay: speed*0.5,
        complete: function() { nextFunction(); }
      }
    );

  };


  //
  //  ANSWERS
  //
  this.showAnswers = function() {
    this.state.answersWaiting = true;

    this.answerOne.innerHTML = this.answerOneText;

    this.answerOne.style.display = 'inline-block';

    if (this.answerTwoText !== '') {
      this.answerTwo.innerHTML = this.answerTwoText;
      this.answerTwo.style.display = 'inline-block';
    }

    // Adjust padding
    velocity(this.chatFlow,
      { paddingBottom: self.answers.offsetHeight + 5 + 'px' },
      { duration: speed*1, easing: 'easeInOutQuart' }
    );
    self.scrollAfterChange();

    velocity(this.answers, { translateY: 0 }, { duration: speed*5, easing: [ 200, 20 ], queue: false } );

    if (this.answerTwoText !== '') {
      velocity(this.answerTwo, { translateY: 0 }, { duration: speed*3, easing: 'easeInOutQuart', /*delay: speed*3*/ });
    }

  };


  this.answerToBubble = function() {

    var answerBubble = document.createElement('li'),
        next,
        text,
        clickedAnswerRect,
        answerBubbleRect,
        newLeft,
        newTop;

    if (this.clickedAnswer == this.answerOne) {
      next = this.answerOneNext;
      text = this.answerOneText;
    } else {
      next = this.answerTwoNext;
      text = this.answerTwoText;
    }

    answerBubble.innerHTML = text;
    answerBubble.className = 'chat-bubble-answer';

    // Append answer
    self.chatFlow.insertBefore(answerBubble, this.chatFlow.lastChild);

    // Get coordinates for te animation
    clickedAnswerRect = this.clickedAnswer.getBoundingClientRect();
    answerBubbleRect = answerBubble.getBoundingClientRect();
    newLeft = clickedAnswerRect.left - answerBubbleRect.left + 'px';
    newTop = clickedAnswerRect.top - answerBubbleRect.top + 'px';

    // Hide answers
    this.clickedAnswer.style.visibility = 'hidden';
    this.resetAnswers();

    // Adjust padding
    velocity(this.chatFlow,
      { paddingBottom: '4rem' },
      { duration: speed*4, easing: 'easeInOutQuart' }
    );

    // Animate answerBubble
    velocity(answerBubble,
      { translateY: [0, newTop], translateX: [0, newLeft], backgroundColor: ['#73b9e6', '#3a8ac0'], opacity: [1, 1] },
      { duration: speed*2, easing: [ 300, 20 ],
        complete: function() {
          self.getNextBubble(next);
          setTimeout(function() { self.createBubble(); }, speed*2);
        }
      }
    );

  };


  this.resetAnswers = function() {
    this.state.answersWaiting = false;

    // testing whole answers animation
    velocity(this.answers,
      { translateY: '100%' },
      { duration: speed*2, easing: [ 300, 20 ], queue: false }
    );
    velocity(this.answerOne,
      { translateY: '0' },
      { duration: speed*2, easing: [ 300, 20 ], display: 'none', complete: function() { self.answerOne.style.visibility = 'visible'; } }
    );

    //if (this.answerTwoText !== '') {
      velocity(this.answerTwo,
        { translateY: '100%' },
        { duration: speed*2, easing: [ 300, 20 ], display: 'none', complete: function() { self.answerTwo.style.visibility = 'visible'; } }
      );
    //}
  };


  //
  //  ASSIGN data from bubble
  //
  this.assignBubbleData = function(no, data) {
    this.currentBubble = no;
    this.currentBubbleData = data;

    this.bubbleArray = this.currentBubbleData.bubbles;

    if (this.currentBubbleData.autoNext) {

      this.bubbleAutoNext = this.currentBubbleData.autoNext;

    } else {

      this.bubbleAutoNext = '';
      this.answerOneText = this.currentBubbleData.answerOne.answer;
      this.answerOneNext = this.currentBubbleData.answerOne.next;

      if (this.currentBubbleData.answerTwo) {
        this.answerTwoText = this.currentBubbleData.answerTwo.answer;
        this.answerTwoNext = this.currentBubbleData.answerTwo.next;
      } else {
        this.answerTwoText =
        this.answerTwoNext = '';
      }

    } // end if data.autoNext
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

    velocity(self.answers, 'scroll', { container: self.wrapper, duration: speed*3, offset: -5, easing: 'easeInOutQuart', queue: false });

    // Reset scroll function
    this.scrollFn = function() {};
  };


  this.eventHandler = function(event) {

    if ( ( event.target.id === 'answer-left' ) || ( event.target.parentNode.id === 'answer-left' ) ) {
      self.clickedAnswer = self.answerOne;
      self.answerToBubble();
    }
    else if ( ( event.target.id === 'answer-right' ) || ( event.target.parentNode.id === 'answer-right' ) ) {
      self.clickedAnswer = self.answerTwo;
      self.answerToBubble();
    }

    event.preventDefault();
    return false;

  };


  this.addListener = function() {
    this.answers.addEventListener('touchend', function(event) {
      self.eventHandler(event);
    }, false);

    this.answers.addEventListener('click', function(event) {
      self.eventHandler(event);
    }, false);

  };





  this.finish = function() {

    var finish = document.createElement('li');

    finish.className = 'nocnasowa centered size-1';
    finish.style.cssText = 'display:block;clear:both;margin:0;padding:2.5rem 0 0;opacity:0;';
    finish.innerHTML = '<span>Nocna</span> Sowa';

    this.scrollFn = function() { self.chatFlow.insertBefore(finish, self.chatFlow.lastChild); };
    this.scrollAfterChange();

    velocity(finish,
        { opacity: [1, 0] },
        { duration: speed*6, easing: 'easeInOutQuart' }
      );

    console.log('END');

  };


  this.test = function() {
    var property,
        data = this.lasData.chat,
        bubble,
        content,
        answerOne,
        answerTwo;

    this.resetAnswers();
    self.chatFlow.innerHTML = '';
    self.chatFlow.style.display = 'none';

    for (property in data) {
      if (data.hasOwnProperty(property)) {

        data[property].bubbles.forEach(function(item, index, array) {
          bubble = document.createElement('li');
          content = item;

          bubble.className = 'beige chat-bubble';
          bubble.style.right = '0';
          bubble.innerHTML = content;

          self.chatFlow.appendChild(bubble);
        });

        if (data[property].answerOne) {

          answerOne = document.createElement('li');
          answerOne.className = 'chat-bubble-answer';
          answerOne.style.opacity = '1';
          answerOne.innerHTML = data[property].answerOne.answer;
          self.chatFlow.appendChild(answerOne);

          if (data[property].answerTwo) {
            answerTwo = answerOne.cloneNode(false);
            answerTwo.innerHTML = data[property].answerTwo.answer;
            self.chatFlow.appendChild(answerTwo);
          }

        }

      var line = document.createElement('li');
      line.style.cssText = 'width:100%;height:3px;background:#000;margin:2.5rem 0;clear:both;';

      self.chatFlow.appendChild(line);

      } // end if has property
    } // end loop

    self.chatFlow.style.display = 'block';

  };

}

//
//  Extend with LasHelper methods
//
LasChat.prototype = new LasHelper();
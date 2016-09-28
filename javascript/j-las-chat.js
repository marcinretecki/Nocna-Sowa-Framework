//
// Las Chat
//


function LasChat() {
  //
  //  Elements
  //
  this.wrapper = document.getElementById('chat-bot');
  this.clickedAnswer =
  this.chatFlow =
  this.answers =
  this.answerLeft =
  this.answerRight =
  this.currentBubble = null;

  this.prefetch = document.createElement("div");


  //
  //  Chat Data
  //
  this.chatData = new ChatData();
  this.bubbleArray = [];
  this.answerLeftText =
  this.answerRightText =
  this.answerLeftNext =
  this.answerRightNext =
  this.bubbleAutoNext = '';

  //
  //  State
  //
  this.answersWaiting = false;
  this.currentState = ''; // END / INTRO / CHAT
  this.scrollFn = function(){};

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
    this.randomIntroArray = lasHelper.createRandomArrayOfFirstBubbles( this.chatData.intro );
    this.randomChatArray = lasHelper.createRandomArrayOfFirstBubbles( this.chatData.chat );
    this.randomEndArray = lasHelper.createRandomArrayOfFirstBubbles( this.chatData.end );

    this.createChat();
    this.addListener();
    this.resetAnswers();
    this.getNextBubble( 'INTRO' );
    this.createBubble();
  };


  this.createChat = function() {
    var chatWrapper = document.createElement('div'),
        chatWindow = document.createElement('div'),
        chatRow = document.createElement('div'),
        chatFlow = document.createElement('ul'),
        answers = document.createElement('li'),
        answerLeft = document.createElement('button'),
        answerRight;

    chatWrapper.className = 'chat-wrapper';
    chatWrapper.setAttribute("role", "main");
    chatWindow.className = 'section-content chat-window';
    chatRow.className = "row";
    chatFlow.className = 'col-10 white center chat-flow nodots group';

    chatRow.appendChild(chatFlow);
    chatWindow.appendChild(chatRow);
    chatWrapper.appendChild(chatWindow);

    answers.className = 'chat-answers';
    answers.id = 'chat-answers';

    answerLeft.className = 'btn btn-blue btn-s-2 btn-chat-answer';
    //answerLeft.type = 'button';
    answerLeft.setAttribute("role", "button");
    answerLeft.innerHTML = "&nbsp;"

    answerRight = answerLeft.cloneNode(false);

    answerLeft.id = 'answer-left';
    answerRight.id = 'answer-right';
    answerRight.innerHTML = "&nbsp;"

    // Append
    answers.appendChild(answerLeft);
    answers.appendChild(answerRight);
    chatFlow.appendChild(answers);
    this.wrapper.appendChild(chatWrapper);

    // Assign
    this.chatFlow = chatFlow;
    this.chatWindow = chatWindow;
    this.answers = answers;
    this.answerLeft = answerLeft;
    this.answerRight = answerRight;
  };


  this.getRandomBubble = function() {
    console.log( 'getRandomBubble');
    console.log( this.randomChatArray.length );

    if (this.randomChatArray.length > 0 ) {
      //  if there are still chat items to show

      //  add one to progress progress
      lasHelper.lasSaveChallangeProgress.plusOne();

      //  pop data and return the object
      var pop = this.chatData.chat[ this.randomChatArray.pop() ];
      return pop;

    }
    else {
      //  Set state
      this.currentState = 'END';

      return this.getEndBubble();
    }

  };


  this.getIntroBubble = function() {
    console.log( 'getIntroBubble');
    var pop = this.chatData.intro[ this.randomIntroArray.pop() ];

    //  Set state
    this.currentState = 'INTRO';

    //  Return bubble
    return pop;

  };


  this.getEndBubble = function() {
    console.log( 'getEndBubble' );
    var pop = this.chatData.end[ this.randomEndArray.pop() ];
    //  Return bubble
    return pop;

  };



  this.getNextBubble = function(no) {

    var data;

    if ( ( no === 'INTRO' ) ) {
      //  if it is intro and we need next bubble

      data = this.getIntroBubble();

    }
    else if ( no === 'ENDINTRO' ) {
      //  if it is the end of intro,  move one to chat

      //  Set state
      this.currentState = 'CHAT';
      data = this.getRandomBubble();

    }
    else if ( ( this.currentState === 'INTRO' ) && ( no !== '' ) ) {
      //  if it is intro and we need next bubble

      data = this.chatData.intro[ no ];

    }
    else if ( ( this.currentState === 'CHAT' ) && ( no === 'RANDOM' ) ) {
      //  if we are at the chat, move one

      data = this.getRandomBubble();

    }
    else if ( ( this.currentState === 'CHAT' ) && ( no !== '' ) ) {
      //  if we are at chat, but need exact bubble

      data = this.chatData.chat[ no ]

    }
    else if ( this.currentState === 'END' ) {
      //  if we got to the end and need an exact bubble

      data = this.chatData.end[ no ];
    }

    console.log("No: " + no);
    console.log("Data: " + data);


    // Assign
    this.currentBubble = no;
    this.bubbleArray = data.bubbles;

    if (data.autoNext) {

      this.bubbleAutoNext = data.autoNext;

    } else {

      this.bubbleAutoNext = "";
      this.answerLeftText = data.answerLeft.answer;
      this.answerLeftNext = data.answerLeft.next;

      if (data.answerRight) {
        this.answerRightText = data.answerRight.answer;
        this.answerRightNext = data.answerRight.next;
      } else {
        this.answerRightText =
        this.answerRightNext = "";
      }

    } // end if data.autoNext

  };


  //
  //  BUBBLES
  //
  this.createBubble = function() {
    if (this.answersWaiting) {
      return false;
    }

    var bubble = document.createElement('li'),
        content = this.bubbleArray.shift(),
        nextFunction;

    this.prefetch.innerHTML = content;

    bubble.className = "beige chat-bubble";
    bubble.innerHTML = '<span class="ball-pulse-sync ball-pulse-sync-dark"><div></div><div></div><div></div></span>';
    bubble.id = "bubble-" + this.currentBubble;

    this.scrollFn = function() { that.chatFlow.insertBefore(bubble, that.chatFlow.lastChild) };
    this.scrollAfterChange();


    if ( this.bubbleArray.length > 0 ) {
      // if there are more bubbles in the array

      nextFunction = function() { that.createBubble() };

    }
    else if (this.bubbleAutoNext === "END") {
      // if it is the end of chat

      nextFunction = function() {
        that.finish();
      };

    }
    else if (this.bubbleAutoNext !== "") {
      // if there is a autoNext bubble

      nextFunction = function() {
        that.getNextBubble( that.bubbleAutoNext );
        that.createBubble();
      };

    }
    else {

      nextFunction = function() { that.showAnswers(); };
    }

    Velocity(bubble,
      { right: [0, "100%"] },
      { duration: speed*5, easing: [ 200, 20 ]}
    );

    Velocity(bubble,
      { translateX: "-130%" },
      { duration: speed, easing: [ 200, 20 ], delay: speed,
        complete: function() {
          if (content.indexOf('<img') !== -1 ) {
            bubble.className += " chat-bubble-img";
          }

          that.scrollFn = function() { bubble.innerHTML = content; };
          that.scrollAfterChange();

        }
      }
    );

    Velocity(bubble,
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
    this.answersWaiting = true;

    this.answerLeft.innerHTML = this.answerLeftText;

    this.answerLeft.style.display = "inline-block";

    if (this.answerRightText !== "") {
      this.answerRight.innerHTML = this.answerRightText;
      this.answerRight.style.display = "inline-block";
    }

    // Adjust padding
    Velocity(this.chatFlow,
      { paddingBottom: that.answers.offsetHeight + 5 + "px" },
      { duration: speed*1, easing: "easeInOutQuart" }
    );
    that.scrollAfterChange();

    Velocity(this.answers, { translateY: 0 }, { duration: speed*5, easing: [ 200, 20 ], queue: false } );

    if (this.answerRightText !== "") {
      Velocity(this.answerRight, { translateY: 0 }, { duration: speed*3, easing: "easeInOutQuart", /*delay: speed*3*/ });
    }

  };


  this.answerToBubble = function() {

    var answerBubble = document.createElement('li'),
        secondAnswer,
        next,
        text,
        clickedAnswerRect,
        answerBubbleRect,
        newLeft,
        newTop;

    if (this.clickedAnswer == this.answerLeft) {
      secondAnswer = this.answerRight;
      next = this.answerLeftNext;
      text = this.answerLeftText;
    } else {
      secondAnswer = this.answerLeft;
      next = this.answerRightNext;
      text = this.answerRightText;
    }

    answerBubble.innerHTML = text;
    answerBubble.className = 'chat-bubble-answer';

    // Append answer
    that.chatFlow.insertBefore(answerBubble, this.chatFlow.lastChild);

    // Get coordinates for te animation
    clickedAnswerRect = this.clickedAnswer.getBoundingClientRect();
    answerBubbleRect = answerBubble.getBoundingClientRect();
    newLeft = clickedAnswerRect.left - answerBubbleRect.left + 'px';
    newTop = clickedAnswerRect.top - answerBubbleRect.top + 'px';

    // Hide answers
    this.clickedAnswer.style.visibility = 'hidden';
    this.resetAnswers();

    // Adjust padding
    Velocity(this.chatFlow,
      { paddingBottom: "4rem" },
      { duration: speed*4, easing: "easeInOutQuart" }
    );

    // Animate answerBubble
    Velocity(answerBubble,
      { translateY: [0, newTop], translateX: [0, newLeft], backgroundColor: ['#73b9e6', '#3a8ac0'], opacity: [1, 1] },
      { duration: speed*2, easing: [ 300, 20 ],
        complete: function() {
          that.getNextBubble(next);
          setTimeout(function() { that.createBubble(); }, speed*2);
        }
      }
    );

  }


  this.resetAnswers = function() {
    this.answersWaiting = false;

    // testing whole answers animation
    Velocity(this.answers,
      { translateY: "100%" },
      { duration: speed*2, easing: [ 300, 20 ], queue: false }
    );
    Velocity(this.answerLeft,
      { translateY: "0" },
      { duration: speed*2, easing: [ 300, 20 ], display: "none", complete: function() { that.answerLeft.style.visibility = "visible"; } }
    );

    //if (this.answerRightText !== "") {
      Velocity(this.answerRight,
        { translateY: "100%" },
        { duration: speed*2, easing: [ 300, 20 ], display: "none", complete: function() { that.answerRight.style.visibility = "visible"; } }
      );
    //}
  }


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

    Velocity(that.answers, "scroll", { container: that.wrapper, duration: speed*3, offset: -5, easing: "easeInOutQuart", queue: false });

    // Reset scroll function
    this.scrollFn = function() {};
  };


  this.eventHandler = function(event) {

    if ( ( event.target.id == 'answer-left' ) || ( event.target.parentNode.id =='answer-left' ) ) {
      that.clickedAnswer = that.answerLeft;
      that.answerToBubble();
    }
    else if ( ( event.target.id =='answer-right' ) || ( event.target.parentNode.id =='answer-right' ) ) {
      that.clickedAnswer = that.answerRight;
      that.answerToBubble();
    }

    event.preventDefault();
    return false;

  };


  this.addListener = function() {
    this.answers.addEventListener('touchstart', function(event) {
      that.eventHandler(event);
    }, false);

    this.answers.addEventListener('click', function(event) {
      that.eventHandler(event);
    }, false);

  };


  this.finish = function() {

    var finish = document.createElement('li');

    finish.className = "nocnasowa centered size-1";
    finish.style.cssText = "display:block;clear:both;margin:0;padding:2.5rem 0 0;opacity:0;";
    finish.innerHTML = '<span>Nocna</span> Sowa';

    this.scrollFn = function() { that.chatFlow.insertBefore(finish, that.chatFlow.lastChild) };
    this.scrollAfterChange();

    Velocity(finish,
        { opacity: ["1", "0"] },
        { duration: speed*6, easing: "easeInOutQuart" }
      );

    console.log("END");

  }


  this.test = function() {
    var property,
        data = this.chatData.chat,
        bubble,
        content,
        answerLeft,
        answerRight;

    this.resetAnswers();
    that.chatFlow.innerHTML = '';
    that.chatFlow.style.display = "none";

    for (property in data) {
      if (data.hasOwnProperty(property)) {

        data[property].bubbles.forEach(function(item, index, array) {
          bubble = document.createElement('li');
          content = item;

          bubble.className = "beige chat-bubble";
          bubble.style.right = "0";
          bubble.innerHTML = content;

          that.chatFlow.appendChild(bubble);
        });

        if (data[property].answerLeft) {

          answerLeft = document.createElement('li');
          answerLeft.className = 'chat-bubble-answer';
          answerLeft.style.opacity = "1";
          answerLeft.innerHTML = data[property].answerLeft.answer;
          that.chatFlow.appendChild(answerLeft);

          if (data[property].answerRight) {
            answerRight = answerLeft.cloneNode(false);
            answerRight.innerHTML = data[property].answerRight.answer;
            that.chatFlow.appendChild(answerRight);
          }

        }

      var line = document.createElement('li');
      line.style.cssText = 'width:100%;height:3px;background:#000;margin:2.5rem 0;clear:both;';

      that.chatFlow.appendChild(line);

      } // end if has property
    } // end loop

    that.chatFlow.style.display = "block";

  }

}
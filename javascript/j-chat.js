/*
 * Chat


 Notes
 - jak zakończyć? gdy nie ma już answers, to koniec chatu.
 */

function Chat() {
  //
  //  Elements
  //
  this.wrapper = document.getElementById('chat-bot');
  this.clickedAnswer =
  this.chatFlow =
  this.answers =
  this.answerLeft =
  this.answerRight =
  this.bubble =
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
  this.bubbleAutoNext =
  this.cookie = '';

  //
  //  State
  //
  this.answersWaiting = false;
  this.scrollFn = function(){};

  //
  //  Helper
  //
  var self = this,
      speed = 200,
      answersTranformValue = "300%",
      gaLabel = document.title.split(' | Nocna Sowa')[0];


  this.init = function() {

    this.getCookie();
    this.createChat();
    this.addListener();
    this.resetAnswers();

    if (this.cookie) {
      this.resumeChat()
    } else {
      this.getNextBubble('intro1');
    }

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

    chatWrapper.className = 'section-beige chat-wrapper';
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
  }


  this.getNextBubble = function(no) {
    var data = this.chatData.getBubble(no);

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

    this.setCookie();
  };

  this.resumeChat = function() {
    var data = this.chatData.getBubble('resume');

    // Assign
    this.bubbleArray = data.bubbles;

    this.answerLeftText = data.answerLeft.answer;
    this.answerLeftNext = this.cookie;

    if (data.answerRight) {
      this.answerRightText = data.answerRight.answer;
      this.answerRightNext = 'intro1';
    } else {
      this.answerRightText =
      this.answerRightNext = "";
    }
  }


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

    this.scrollFn = function() { self.chatFlow.insertBefore(bubble, self.chatFlow.lastChild) };
    this.scrollAfterChange();

    if ( this.bubbleArray.length > 0 ) {

      nextFunction = function() { self.createBubble() };

    } else if (this.bubbleAutoNext === "END") {

      nextFunction = function() {
        self.finish();
      };

    } else if (this.bubbleAutoNext !== "") {

      nextFunction = function() {
        self.getNextBubble( self.bubbleAutoNext );
        self.createBubble();
      };

    } else {

      nextFunction = function() { self.showAnswers(); };
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

          self.scrollFn = function() { bubble.innerHTML = content; };
          self.scrollAfterChange();

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
      { paddingBottom: self.answers.offsetHeight + 5 + "px" },
      { duration: speed*1, easing: "easeInOutQuart" }
    );
    self.scrollAfterChange();

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
    Velocity(this.chatFlow,
      { paddingBottom: "4rem" },
      { duration: speed*4, easing: "easeInOutQuart" }
    );

    // Animate answerBubble
    Velocity(answerBubble,
      { translateY: [0, newTop], translateX: [0, newLeft], backgroundColor: ['#73b9e6', '#3a8ac0'], opacity: [1, 1] },
      { duration: speed*2, easing: [ 300, 20 ],
        complete: function() {
          self.getNextBubble(next);
          setTimeout(function() { self.createBubble(); }, speed*2);
        }
      }
    );

  }


  this.resetAnswers = function() {
    this.answersWaiting = false;

  //Velocity(this.answerLeft,
  //  { translateY: answersTranformValue },
  //  { duration: speed*2, easing: [ 300, 20 ], display: "none", complete: function() { self.answerLeft.style.visibility = "visible"; } }
  //);

  //if (this.answerRightText !== "") {
  //  Velocity(this.answerRight,
  //    { translateY: answersTranformValue },
  //    { duration: speed*2, easing: [ 300, 20 ], display: "none", complete: function() { self.answerRight.style.visibility = "visible"; } }
  //  );
  //}

  // testing whole answers animation
    Velocity(this.answers,
      { translateY: "100%" },
      { duration: speed*2, easing: [ 300, 20 ], queue: false }
    );
    Velocity(this.answerLeft,
      { translateY: "0" },
      { duration: speed*2, easing: [ 300, 20 ], display: "none", complete: function() { self.answerLeft.style.visibility = "visible"; } }
    );
    //if (this.answerRightText !== "") {
      Velocity(this.answerRight,
        { translateY: "100%" },
        { duration: speed*2, easing: [ 300, 20 ], display: "none", complete: function() { self.answerRight.style.visibility = "visible"; } }
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

    Velocity(self.answers, "scroll", { container: self.wrapper, duration: speed*3, offset: -5, easing: "easeInOutQuart", queue: false });

    // Reset scroll function
    this.scrollFn = function() {};
  };


  this.eventHandler = function(event) {

    if ( ( event.target.id == 'answer-left' ) || ( event.target.parentNode.id =='answer-left' ) ) {
      self.clickedAnswer = self.answerLeft;
      self.sendGaEvent(self.answerLeftText);
      self.answerToBubble();
    } else if ( ( event.target.id =='answer-right' ) || ( event.target.parentNode.id =='answer-right' ) ) {
      self.clickedAnswer = self.answerRight;
      self.sendGaEvent(self.answerRightText);
      self.answerToBubble();
    }

    event.preventDefault();
    return false;

  };


  this.sendGaEvent = function(action) {
    var category = 'Chat Bot Rzeczownik',
        label = gaLabel;

    try { ga('send', 'event', category, action, label); }
    catch(err) {};

    window.console.log('Category: ' + category);
    window.console.log('Action: ' + action);
    window.console.log('Label: ' + label);
  };


  this.addListener = function() {
    this.answers.addEventListener('touchstart', function(event) {
      self.eventHandler(event);
    }, false);

    this.answers.addEventListener('click', function(event) {
      self.eventHandler(event);
    }, false);

  };


  this.setCookie = function() {
    Cookies.set('ns_chat_status', self.currentBubble, { expires: 365 });
  };

  this.getCookie = function() {
    this.cookie = Cookies.get('ns_chat_status');
  };


  this.finish = function() {

    var finish = document.createElement('li');

    finish.className = "nocnasowa centered size-1";
    finish.style.cssText = "display:block;clear:both;margin:0;padding:2.5rem 0 0;opacity:0;";
    finish.innerHTML = '<span>Nocna</span> Sowa';

    this.scrollFn = function() { self.chatFlow.insertBefore(finish, self.chatFlow.lastChild) };
    this.scrollAfterChange();

    Velocity(finish,
        { opacity: ["1", "0"] },
        { duration: speed*6, easing: "easeInOutQuart" }
      );

    window.console.log("END");

  }


  this.test = function() {
    var property,
        data = this.chatData.data,
        bubble,
        content,
        answerLeft,
        answerRight;

    this.resetAnswers();
    self.chatFlow.innerHTML = '';
    self.chatFlow.style.display = "none";

    for (property in data) {
      if (data.hasOwnProperty(property)) {

        data[property].bubbles.forEach(function(item, index, array) {
          bubble = document.createElement('li');
          content = item;

          bubble.className = "beige chat-bubble";
          bubble.style.right = "0";
          bubble.innerHTML = content;

          self.chatFlow.appendChild(bubble);
        });

        if (data[property].answerLeft) {

          answerLeft = document.createElement('li');
          answerLeft.className = 'chat-bubble-answer';
          answerLeft.style.opacity = "1";
          answerLeft.innerHTML = data[property].answerLeft.answer;
          self.chatFlow.appendChild(answerLeft);

          if (data[property].answerRight) {
            answerRight = answerLeft.cloneNode(false);
            answerRight.innerHTML = data[property].answerRight.answer;
            self.chatFlow.appendChild(answerRight);
          }

        }

      var line = document.createElement('li');
      line.style.cssText = 'width:100%;height:3px;background:#000;margin:2.5rem 0;clear:both;';

      self.chatFlow.appendChild(line);

      } // end if has property
    } // end loop

    self.chatFlow.style.display = "block";

  }

}
var chat = new Chat();


window.addEventListener('load', function() {

  chat.init();

  //chat.test();

}, false);
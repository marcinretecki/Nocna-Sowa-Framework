//
// Las JavaScript
//


//
//  Helper object that contains methods used by other Las's objects
//
function LasHelper() {

  //
  //  Save progress
  //  First save progress as a cookie
  //  When user browses back to the list, cookie progress is saved to database (by PHP)
  //  @return object with one method plusOne()
  //
  this.lasSaveChallangeProgress = function() {

    var self = this,
        newCookie = new Object(),
        chapter = lasChapter,         //  it is defined in the head
        saveChallangeProgress = new Object();

    //
    //  Private functions
    //
    function getCookie() {
      return Cookies.getJSON('lasChallangeProgress');
    };

    function setCookie(value) {
      Cookies.set('lasChallangeProgress', value, { expires: 365 });
    };

    function cleanCookie() {
      Cookies.remove('lasChallangeProgress');
    };

    //
    //  Public function
    //
    saveChallangeProgress.plusOne = function() {
      var cookie = getCookie();

      if ( ( cookie !== undefined ) && ( cookie[ chapter ] !== undefined ) ) {
        //  if we have already this cookie

        newCookie = cookie;
        newCookie[ chapter ] = newCookie[ chapter ] * 1 + 1;  // * 1 converts it to integer
      }
      else {
        //  if we don't have such cookie
        newCookie[ chapter ] = 0;
      }

      setCookie(newCookie);
    };

    return saveChallangeProgress;

  }();


  //
  //  Function to create array of bubbles with '1'
  //  @parameter data is feeded in init() with data files by objects making exercises
  //  @return array of first keys in the series of bubbles
  //
  this.createRandomArrayOfFirstBubbles = function( data ) {
    var property,
        propArray = [];

    //  Push first items
    for (property in data) {
      if (data.hasOwnProperty(property) && ( property.slice(-1) === '1' ) ) {
        // if it is own property and last letter is '1'

        propArray.push(property);

      }
    }

    propArray = this.shuffleArray(propArray)

    return propArray;
  };


  this.shuffleArray = function(propArray) {
    //  Fisher-Yates Shuffle

    var counter = propArray.length,
        index,
        temp;

    //  While there are elements in the propArray
    while (counter > 0) {
      //  Pick a random index
      index = Math.floor(Math.random() * counter);

      //  Decrease counter by 1
      counter--;

      //  And swap the last element with it
      temp = propArray[counter];
      propArray[counter] = propArray[index];
      propArray[index] = temp;
    }

    return propArray;
  };


  //
  //  Data bubbles
  //
  this.getRandomBubble = function() {
    console.log( 'getRandomBubble');
    console.log( this.randomChatArray.length );

    if (this.randomChatArray.length > 0 ) {
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


  this.getIntroBubble = function() {
    console.log( 'getIntroBubble');
    var pop = this.lasData.intro[ this.randomIntroArray.pop() ];

    //  Set state
    this.state.currentState = 'INTRO';

    //  Return bubble
    return pop;

  };


  this.getEndBubble = function() {
    console.log( 'getEndBubble' );
    var pop = this.lasData.end[ this.randomEndArray.pop() ];
    //  Return bubble
    return pop;

  };


  this.getNextBubble = function(no) {

    var data;

    if ( ( this.state.currentState === 'INTRO' ) && ( no !== '' )  && ( no !== 'ENDINTRO' ) ) {
      //  if it is intro and we need next bubble
      console.log('if it is intro and we need next bubble')
      data = this.lasData.intro[ no ];

    } else if ( ( no === 'INTRO' ) ) {
      //  if it is intro and we need first bubble
      console.log('if it is intro and we need first bubble')
      data = this.getIntroBubble();

    }
    else if ( no === 'ENDINTRO' ) {
      //  if it is the end of intro,  move one to chat
      console.log('if it is the end of intro,  move one to chat')
      //  Set state
      this.state.currentState = 'CHAT';
      data = this.getRandomBubble();

    }
    else if ( ( this.state.currentState === 'CHAT' ) && ( no === 'RANDOM' ) ) {
      //  if we are at the chat, move one
      console.log('if we are at the chat, move one')
      data = this.getRandomBubble();

    }
    else if ( ( this.state.currentState === 'CHAT' ) && ( no !== '' ) ) {
      //  if we are at chat, but need exact bubble
      console.log('if we are at chat, but need exact bubble')
      data = this.lasData.chat[ no ]

    }
    else if ( this.state.currentState === 'END' ) {
      //  if we got to the end and need an exact bubble
      console.log('if we got to the end and need an exact bubble')
      data = this.lasData.end[ no ];
    }

    console.log('No: ' + no);
    console.log('Data:');
    console.log(data);


    //  Assign data
    //  Method available at subObject
    this.assignBubbleData(no, data);

  };


  this.hideLoader = function() {
    Velocity(this.loader, { opacity: 0 }, { duration: 400, easing: [ 300, 20 ], queue: false, display: 'none' } );
  };


  this.pauseTimer = function(duration) {

    /*! SVG Pie Timer 0.9.1 | Anders Grimsrud, grint.no | MIT License | github.com/agrimsrud/svgPieTimer.js */
    //  Modified

    if (this.pauseTimerAnimationFrame !== undefined) {
      cancelAnimationFrame(this.pauseTimerAnimationFrame);
      this.pauseTimerAnimationFrame = undefined;
    }

    Date.now = Date.now || function() { return +new Date };

    var loader = document.getElementById('circle'),
        n = 1;

    function draw(rate) {
        var angle = 360 * rate;

        angle %= 360;

        var rad = (angle * Math.PI / 180),
            x = Math.sin(rad) * 40,
            y = Math.cos(rad) * - 40,
            mid = (angle > 180) ? 1 : 0,
            shape = 'M 0 0 v -40 A 40 40 1 '
                   + mid + ' 1 '
                   +  x  + ' '
                   +  y  + ' z';

        loader.setAttribute('d', shape);
    }


    var end = Date.now() + duration * n,
        totaldur = duration * n;

    // Animate frame by frame

    var frame = function() {
        var current = Date.now(),
            remaining = end - current,

            // Now set rotation rate
            // E.g. 50% of first loop returns 1.5
            // E.g. 75% of sixth loop returns 6.75
            // Has to return >0 for SVG to be drawn correctly
            // If you need the current loop, use Math.floor(rate)

            rate = n + 1 - remaining / duration;

        // As requestAnimationFrame will draw whenever capable,
        // the animation might end before it reaches 100%.
        // Let's simulate completeness on the last visual
        // frame of the loop, regardless of actual progress

        if(remaining < 60) {

            // 1.0 might break, set to slightly lower than 1
            // Update: Set to slightly lower than n instead

            draw(n - 0.0001);


            // Stop animating when we reach n loops (if n is set)

            if ( remaining < totaldur && n ) {
              return
            }
        }

        // Draw

        draw(rate);

        // Request next frame

       this.pauseTimerAnimationFrame = requestAnimationFrame(frame);

    }.bind(this);

    frame();

  };


  //
  //  DATA
  //
  this.expando = "las" + ( new Date().getTime() );

  this.data = function(node, key, value) {
    //  function adapted from Velocity.js

    //  get data
    if ( value === undefined ) {

      //  if there is not data in node
      if ( node[this.expando] === undefined ) {

        return false;

      }

      //  if key is not provided, return alla data
      if ( key === undefined ) {

        return node[this.expando];

      }
      //  if there is key, return it's value
      else {

        if ( key in node[this.expando] ) {
          return node[this.expando][key];
        }

      }

    }
    //  set data
    else if ( key !== undefined ) {

      //  check if object exists
      if ( typeof node[this.expando] !== "object" ) {

        node[this.expando] = {};

      }

      //  store value
      node[this.expando][key] = value;

      return value;
    }

  };



  //
  //  Traversing
  //
  this.checkNodeAndParents = function( event, value, prop, modify ) {
    //  @event
    //  @value is the thing to check
    //  @prop optional, can be href, id or other property of the @node
    //  @mod optional function to modify prop before checking

    var nodeToCheck = event.target;
    var wrapper = event.currentTarget;
    var thingToCheck;
    var i = 0;

    //  while the traverse has not reached the wrapper
    //  or it has checked 10 direct parents
    while ( ( nodeToCheck !== wrapper ) && ( i < 10 ) ) {

      window.console.log('value');
      window.console.log(value);
      window.console.log('nodeToCheck');
      window.console.log(nodeToCheck);
      window.console.log('prop');
      window.console.log(prop);

      //  if there is prop
      if ( prop !== undefined ) {
        thingToCheck = nodeToCheck[prop];

        window.console.log('thingToCheck');
        window.console.log(thingToCheck);

        //  if we need to modify prop
        if ( thingToCheck && ( modify !== undefined ) ) {
          window.console.log('modify');
          window.console.log(modify);
          thingToCheck = modify(thingToCheck);
        }
      }
      else {
        thingToCheck = nodeToCheck;
      }

      window.console.log('thingToCheck');
      window.console.log(thingToCheck);

      //  if it is the same
      if ( thingToCheck && ( thingToCheck === value ) ) {
        return true;
      }

      //  else, traverse to the parent
      nodeToCheck = nodeToCheck.parentNode;

      window.console.log('traverse up');

      //  count traverses, so we don't check all the divs
      i++;
    }

    //  haven't found anything
    return false;

  };


}




// @codekit-append 'j-las-szlak.js';
// @codekit-append 'j-las-chat.js';
// @codekit-append 'j-las-audio-test.js';





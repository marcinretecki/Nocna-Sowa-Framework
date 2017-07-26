//
//  HELPER
//

//
//  Helper object that contains methods used by other Las's objects
//
function LasHelper() {
  "use strict";

  //
  //  Helper
  //
  this.helper = {
    speed:                              200,
    answersTranformValue:               '300%',
    easingSpring:                       [ 200, 20 ],
    easingQuart:                        'easeInOutQuart',
    currentUrl:                         window.location.href.split('#')[0],
    audioFileDuration:                  -1
  };

  var self = this;



  //
  //  Audio Stack
  //  used only for the main audio and repeat
  //  "more" is seperate
  //
  this.audioStack = {
    stack:                              [],
    pointer:                            0
  };
  this.currentAudioObject =             {};


  //
  //  Get basic elements
  //
  this.getBasicElements = function() {

    this.audioFile =                    document.getElementById( 'audio-file' );

    this.loader =                       document.getElementById( 'loader' );
    this.nav =                          document.getElementById( 'las-nav' );
    this.navCharLog =                   document.getElementById( 'las-nav-char-log' );

    //  Velocity
    this.velocity =                     Velocity;

    //  remove loader when user clicks back button
    window.addEventListener('unload', function(event) {

      this.hideLoader();
      window.console.log('unload');

    }.bind(this), false);


    this.nav.addEventListener('click', function(event) {

      //  ignore right click
      if (event.which === 1) {

        this.navEventHandler(event);

      }

    }.bind(this), false);

  };


  //
  //  NAV
  //
  this.navEventHandler = function( event ) {

    window.console.log('navEventHandler');

    //  traverse up to find the element with href
    var elWithId = this.checkNodeAndParents( event, false, 'id' );

    console.log(elWithId);

    if ( elWithId.id === 'las-nav-btn-szlak' ) {

      //  show loader
      this.showLoader();

    }

    if ( elWithId.id === 'las-nav-char' ) {

      //  show char nav log
      this.toggleNavCharLog();

      elWithId.classList.toggle( 'btn-dark-outline--active' );

    }

  };


  //
  //  Toggle visibility of nav-char-log
  //
  this.toggleNavCharLog = function() {

    window.console.log( 'toggleNavCharLog' );

    this.navCharLog.classList.toggle( 'las-nav-char-log--visible' );

  };


  //
  //  Finish
  //
  this.finish = function() {

    if ( this.state.currentState !== 'END') {
      window.console.log('Wrong state. Can not finish now.');
      return;
    }

    window.console.log('Finish');

    //  show loader
    this.showLoader();

    //  redirect to Szlak
    window.location.href = "/las/szlak/";


  };



  //
  //  Function to create array of bubbles with '1'
  //  @parameter data is feeded in init() with data files by objects making exercises
  //  @return array of first keys in the series of bubbles
  //
  this.getRandomArrayOfFirstBubbles = function( data ) {
    var property;
    var propArray = [];

    //  Push first items
    for ( property in data ) {
      if ( data.hasOwnProperty( property ) && ( property.slice(-1) === '1' ) ) {
        // if it is own property and last letter is '1'

        propArray.push( property );

      }
    }

    propArray = this.shuffleArray( propArray );

    return propArray;
  };


  //  Fisher-Yates Shuffle
  this.shuffleArray = function( propArray ) {

    var counter = propArray.length;
    var index;
    var temp;

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
    var pop;

    window.console.log( 'getRandomBubble');
    window.console.log( this.randomChatArray.length );

    //  if there are still chat items to show
    if ( this.randomChatArray.length > 0 ) {

      //  add one to progress
      this.addScore( 'ex' );

      //  pop data and return the object
      pop = this.lasData.chat[ this.randomChatArray.pop() ];
      return pop;

    }
    //  no more random bubbles
    else {
      return this.getEndBubble();
    }

  };


  this.getIntroBubble = function() {

    window.console.log( 'getIntroBubble');
    var pop = this.lasData.intro[ this.randomIntroArray.pop() ];

    //  Set state
    this.state.currentState = 'INTRO';

    //  Return bubble
    return pop;

  };


  this.getEndBubble = function() {

    window.console.log( 'getEndBubble' );

    //  Set state
    this.state.currentState = 'END';

    var pop = this.lasData.end[ this.randomEndArray.pop() ];

    //  Return bubble
    return pop;

  };



  //  ta funkcja powinna mieć return zamiast call do assign
  this.getNextBubble = function(no) {

    var data;

    if ( ( this.state.currentState === 'INTRO' ) && ( no !== '' )  && ( no !== 'ENDINTRO' ) ) {
      //  if it is intro and we need next bubble
      window.console.log('if it is intro and we need next bubble');
      data = this.lasData.intro[ no ];

    } else if ( ( no === 'INTRO' ) ) {
      //  if it is intro and we need first bubble
      window.console.log('if it is intro and we need first bubble');
      data = this.getIntroBubble();

    }
    else if ( no === 'ENDINTRO' ) {
      //  if it is the end of intro,  move one to chat
      window.console.log('if it is the end of intro,  move one to chat');

      //  start chapter timer
      Date.now = Date.now || function() { return +new Date; };
      this.helper.beginT = Math.floor( Date.now() / 1000 );

      //  Set state
      this.state.currentState = 'CHAT';
      data = this.getRandomBubble();

    }
    else if ( ( this.state.currentState === 'CHAT' ) && ( no === 'RANDOM' ) ) {
      //  if we are at the CHAT, get random
      //  if there is no random, it will return random from END
      window.console.log('if we are at the chat, move one');
      data = this.getRandomBubble();

    }
    else if ( ( this.state.currentState === 'CHAT' ) && ( no !== '' ) ) {
      //  if we are at chat, but need exact bubble
      window.console.log('if we are at chat, but need exact bubble');
      data = this.lasData.chat[ no ];

    }
    else if ( this.state.currentState === 'END' ) {
      //  if we got to the end and need an exact bubble
      window.console.log('if we got to the end and need an exact bubble');
      data = this.lasData.end[ no ];
    }

    window.console.log('No: ' + no);
    window.console.log('Data:');
    window.console.log(data);


    //  Assign data
    //  Method available at subObject
    this.assignBubbleData(no, data);

    //  return data;

  };


  //
  //  LOADER
  //
  this.hideLoader = function() {

    window.console.log('hide loader');

    this.velocity(
      this.loader,
      'fadeOut',
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
    );

  };


  this.showLoader = function() {

    window.console.log('show loader');

    var t1 = document.querySelectorAll('.tree__branch--one');
    var t2 = document.querySelectorAll('.tree__branch--two');
    var t3 = document.querySelectorAll('.tree__branch--three');
    var w = document.querySelectorAll( '.tree-wind' );

    var i = 0;
    var max = 10;

    this.velocity(
      this.loader,
      'fadeIn',
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
    );

    for ( ; i < max; i++ ) {

      this.velocity(
        t1,
        { skewX: [4, 0] },
        { duration: 4 * this.helper.speed, easing: 'easeInOutQuad', delay: 2 * this.helper.speed }
      );
      this.velocity(
        t2,
        { skewX: [8, 0] },
        { duration: 4 * this.helper.speed, easing: 'easeInOutQuad', delay: 2 * this.helper.speed }
      );
      this.velocity(
        t3,
        { skewX: [8, 0] },
        { duration: 4 * this.helper.speed, easing: 'easeInOutQuad', delay: 2 * this.helper.speed }
      );

      this.velocity(
        w,
        { translateX: ['-13rem', 0] },
        { duration: 6 * this.helper.speed, easing: 'easeInOutQuad', delay: this.helper.speed }
      );

      this.velocity(
        t1,
        { skewX: [0, 4] },
        { duration: 6 * this.helper.speed, easing: 'easeOutSine', delay: this.helper.speed }
      );
      this.velocity(
        t2,
        { skewX: [0, 8] },
        { duration: 6 * this.helper.speed, easing: 'easeOutSine', delay: this.helper.speed }
      );
      this.velocity(
        t3,
        { skewX: [0, 8] },
        { duration: 6 * this.helper.speed, easing: 'easeOutSine', delay: this.helper.speed }
      );

      this.velocity(
        w,
        { translateX: [0, 0] },
        { duration: this.helper.speed, easing: 'easeInOutSine', delay: 5 * this.helper.speed }
      );
    }
  };



  //
  //  Preload show
  //
  this.preloadShow = function( completeFn ) {

    var preload = document.querySelectorAll('.preload--hidden > *');

    if ( typeof completeFn !== 'undefined'  ) {
      completeFn = completeFn.bind(this);
    }
    //  prevent error if the function is not provided
    else {
      completeFn = Function.prototype;
    }

    this.velocity(
      preload,
      { opacity: [1, 0], translateY: [0, '1rem'] },
      { duration: 4 * this.helper.speed, easing: this.helper.easingQuart,
        complete: function() {
          completeFn();
          window.console.log('preloadShow complete');
        }
      }
    );

  };



  //
  //  DATA
  //
  //  expando
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
  //  Encode special character from the bubble
  //  @return new string
  //
  this.encodeBubble = function( bubbleString ) {

    //  EMOJI example
    //  <svg class="emojione-svg emojione-svg--text"><use xlink:href="/las/c/i/emojione.sprites.svg#emoji-1f58a"></use></svg>
    //  #emoji-1f58a;

    var bubbleArray = bubbleString.split('#');
    var bubbleArrayL = bubbleArray.length;
    var subArray;
    var newString;
    var i;


    //  if bubbleArray has only one element, emotes were not found
    if ( 2 > bubbleArray.length ) {
      return bubbleString;
    }

    //  iteriate over the array
    //  start from 1, becuae 0 has no emoji
    for ( i = 1; i < bubbleArrayL; i++ ) {

      //  split again to get only code
      subArray = bubbleArray[i].split(';');

      //  check if there was ';'
      if ( 1 < subArray.length ) {

        //  check if it is emoji
        if ( bubbleArray[i].indexOf('emoji') !== -1 ) {

          //  replace this part with svg
          subArray[0] = '<svg class="emojione-svg emojione-svg--text"><use xlink:href="/las/c/i/emojione.sprites.svg#' + subArray[0] + '"></use></svg>';

        }
        //  check if it is fill-space
        else if ( bubbleArray[i].indexOf('fill-space') !== -1 ) {

          //  replace with u element
          subArray[0] = '<u class="fill-space">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>';

        }

      }


      //  join back subArray
      bubbleArray[i] = subArray.join('');

    }

    //  problem occurs if there is no emoji
    //  the joined string will have lacking #

    //  join all parts back
    newString = bubbleArray.join('');

    return newString;


  };



  //
  //  Traversing
  //
  this.checkNodeAndParents = function( event, value, prop, modify ) {
    //  @event
    //  @value is the thing to check
    //  @prop optional, can be href, id or other property of the @node
    //  @mod optional function to modify prop before checking

    var nodeToCheck =   event.target;
    var wrapper =       event.currentTarget;
    var thingToCheck;
    var i =             0;

    //  while the traverse has not reached the wrapper
    //  or it has checked 5 direct parents
    while ( ( nodeToCheck !== wrapper ) && ( nodeToCheck !== document.body ) && ( i < 5 ) ) {

      //window.console.log(value);
      //window.console.log(nodeToCheck);
      //window.console.log(prop);

      //  if there is prop
      if ( prop !== undefined ) {

        thingToCheck = nodeToCheck[prop];

        //  if we need to modify prop
        if ( thingToCheck && ( modify !== undefined ) ) {
          //window.console.log(modify);
          thingToCheck = modify(thingToCheck);
        }
      }
      else {
        thingToCheck = nodeToCheck;
      }

      //window.console.log(thingToCheck);

      //  if there is no value to check
      //  check if the thing exists
      if ( thingToCheck && ( value === false ) ) {
        return nodeToCheck;
      }
      //  if it is the same
      else if ( thingToCheck && ( thingToCheck === value ) ) {
        return nodeToCheck;
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


  //
  //  Get parent element that has attribute
  //
  this.getParentWithAtt = function( el, att ) {

    var parent;

    if ( el.hasAttribute( att ) ) {
      return el;
    }

    parent = el.parentNode;

    while ( !parent.hasAttribute( att ) ) {

      parent = parent.parentNode;

      if ( parent == document.body ) {
        return false;
      }


    }

    return parent;

  };



  //
  //  Get user input for further usage
  //  @return input
  //
  this.getValueFromInput = function( field ) {

    if ( field.value ) {
      return field.value;
    }
    else {
      return false;
    }

  };



  //
  //  Throttle clicks
  //  true if still waiting
  //  false if there was no click in last 150 ms
  this.checkClickState = function() {

    var throttleTimer;

    //  throttle clicks
    if ( this.state.clicked ) {
      window.console.log('Throttled');
      return true;
    }

    this.state.clicked = true;

    window.console.log('Click');

    throttleTimer = window.setTimeout(function() {
      this.state.clicked = false;
      window.clearTimeout( throttleTimer );
    }.bind(this), 150);

    return false;

  };



}
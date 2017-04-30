//
//  Las JavaScript
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

    this.loader =                         document.getElementById('loader');
    this.nav =                            document.getElementById('las-nav');

    //  Velocity
    this.velocity =                       Velocity;

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

    var elWithHref;

    //  traverse up to find the element with href
    elWithHref = this.checkNodeAndParents( event, false, 'href' );

    if ( ( elWithHref.id === 'las-nav-btn-sos' ) || ( elWithHref.id === 'las-nav-btn-szlak' ) ) {

      //  show loader
      this.showLoader();

    }

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
    for (property in data) {
      if (data.hasOwnProperty(property) && ( property.slice(-1) === '1' ) ) {
        // if it is own property and last letter is '1'

        propArray.push(property);

      }
    }

    propArray = this.shuffleArray(propArray);

    return propArray;
  };


  //  Fisher-Yates Shuffle
  this.shuffleArray = function(propArray) {

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
      this.cookiePlusOne( 'ex' );

      //  pop data and return the object
      pop = this.lasData.chat[ this.randomChatArray.pop() ];
      return pop;

    }
    //  no more random bubbles
    else {
      //  Set state
      this.state.currentState = 'END';

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
    var pop = this.lasData.end[ this.randomEndArray.pop() ];

    //  Return bubble
    return pop;

  };


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
      //  if we are at the chat, move one
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

    this.velocity(
      this.loader,
      'fadeIn',
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
    );

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

      //  check if it is emoji
      if ( bubbleArray[i].indexOf('emoji') !== -1 ) {

        //  split again to get only emoji
        subArray = bubbleArray[i].split(';');

        //  check if there was ';'
        if ( 1 < subArray.length ) {

          //  replace this part with svg
          subArray[0] = '<svg class="emojione-svg emojione-svg--text"><use xlink:href="/las/c/i/emojione.sprites.svg#' + subArray[0] + '"></use></svg>';

        }

        //  join back subArray
        bubbleArray[i] = subArray.join('');

      }
      //  there is no emoji
      else {
        //  join back subArray and put back #
        bubbleArray[i] = subArray.join('#');
      }


    }

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
    while ( ( nodeToCheck !== wrapper ) && ( i < 5 ) ) {

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



}




// @codekit-append 'j-las-cookie.js';
// @codekit-append 'j-las-audio.js';
// @codekit-append 'j-las-szlak.js';
// @codekit-append 'j-las-chat.js';
// @codekit-append 'j-las-audio-test.js';
// @codekit-append 'j-las-liczby.js';
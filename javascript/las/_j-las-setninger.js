//
//  Las Setninger
//


//
//  TODO
//  - add this.velocity hooks, to prevent layout trashing at the beggining of the app
//  - change spinner, so it looks good with answers
//  - add state to buttons, so they look clicked



function LasSetninger() {
  "use strict";

  //  get methods from the LasHelper
  //  we can add new methods or overwrite old ones
  var las = new LasHelper();


  //
  //  Elements
  //
  las.wrapper =                 document.getElementById('setninger');
  las.setningerWords =          document.getElementById('setninger-words');
  las.setningerTrans =          document.getElementById('setninger-trans');
  las.setningerMsg =            document.getElementById('setninger-msg');
  las.setningerControls =       document.getElementById('setninger-controls');
  las.setningerControlsNext =   document.getElementById('setninger-controls__next');
  las.setningerControlsTrans =  document.getElementById('setninger-controls__trans');

  //  this will be filled as needed
  //  depends on number of items in the sentence
  las.setningerWordsElements = [];


  //
  //  State
  //
  las.state = {
    currentState:             '',   // END / INTRO / CHAT
    words:                    false,
    msg:                      false,
    trans:                    false,
    controls:                 false,
    bubbling:                 false,
    testmode:                 false
  };



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
    this.lasData =              new LasData();

    //  get Elements
    this.getBasicElements();

    //  Prepare
    this.addListener();

     //  check cookie access time
    this.setAccessTimeToHelper();

    //  If not test mode, begin
    //  Get the intro
    if ( !this.state.testmode ) {
      this.hideLoader();

      //  get the intro
      this.currentBubbleData =  this.getNextBubble( 'INTRO' );

      this.createBubble();
    }

  };


  //
  //  Create Bubble
  //
  las.createBubble = function() {

    window.console.log('createBubble');

    //  If this is the END
    if ( this.currentBubbleData.state === 'END' ) {
      this.finish();
      return;
    }

    //  if there is msg
    if ( this.currentBubbleData.msg  ) {

      this.showMsg();

    }
    //  if there is at least one sentence
    else if ( this.currentBubbleData.set && ( this.currentBubbleData.set.length > 0 ) ) {

      this.showBubble();

    }


  };


  //  Next bubble
  las.nextToBubble = function() {

    //  this one prevents some glitches
    if ( this.state.bubbling ) {
      return false;
    }

    this.state.bubbling = true;

    window.console.log('nextToBubble');


    //  reset everything
    this.resetMsg();
    this.resetTrans();
    this.resetComposedSentence();
    this.resetControls();

    //  get next bubble
    this.currentBubbleData = this.getNextBubble( this.currentBubbleData.autoNext );

    //  create new bubble
    this.createBubble();

    //  reset bubbling state
    this.state.bubbling = false;

  };


  //
  //  Show words from the bubble
  //
  las.showBubble = function() {

    window.console.log('showBubble');

    //  check if we can show words to avoid double execution

    var set = this.shuffleArray ( this.currentBubbleData.set[ 0 ] );
    var l = set.length;
    var i;
    var item;

    for ( i=0; l > i; i++ ) {

      //  check if we have an item to insert word into
      if ( las.setningerWordsElements[ i ] ) {

        item = las.setningerWordsElements[ i ];

      }
      //  create new item
      else {

        item = this.createNewWord();

      }

      //  add word from set
      item.innerHTML = set[i];

      //  show item
      item.classList.remove( 'setninger-words__word--hidden' );

      //  will there be sentences with words that can't be moved???

    }



  };

  //
  //  Create a new word
  //  @return new element
  //
  las.createNewWord = function() {

    window.console.log('createNewWord');

    var item = document.createElement('div');
    item.className = 'setninger-words__word setninger-words__word--hidden';

    //  add new element into array reference
    this.setningerWordsElements.push( item );

    //  append new element into html
    this.setningerWords.append( item );

    return item;

  };


  //
  //  Change words into a sentence
  //
  las.showComposedSentence = function() {

    window.console.log('showComposedSentence');

    //  called when the right sentence is created by user

    //  this.addScore( 'correct' );

  };

  las.resetComposedSentence = function() {

    window.console.log('resetComposedSentence');

    //  when user clicks next


    var elL = las.setningerWordsElements.length;
    var i;


    for ( i=0; elL > i; i++ ) {

      //  hide
      las.setningerWordsElements[ i ].classList.add( 'setninger-words__word--hidden' );

    }

  };



  //
  //  Msg
  //
  las.showMsg = function() {

    //  if there is no trans to show or it is already showed
    if ( !this.currentBubbleData.msg || this.state.msg ) {
      return false;
    }

    this.state.msg = true;

    window.console.log('show msg');

    this.setningerMsg.innerHTML = this.currentBubbleData.msg;

  };


  las.resetMsg = function() {

    //  if there is no trans to show or it is already showed
    if ( !this.state.msg ) {
      return false;
    }

    this.state.msg = false;

    window.console.log('reset msg');

    this.setningerMsg.innerHTML = '';

  };



  //
  //  Trans
  //
  las.showTrans = function() {

    //  if there is no trans to show or it is already showed
    if ( !this.currentBubbleData.trans || this.state.trans ) {
      return false;
    }

    this.state.trans = true;

    window.console.log('show trans');

    this.setningerTrans.innerHTML = this.currentBubbleData.trans;

    //  //  animate
    //  this.velocity(
    //    this.audioTrans,
    //    'slideDown',
    //    { duration: this.helper.speed, easing: this.helper.easingSpring }
    //  );

    //  //  add one to progress
    //  this.addScore( 'trans' );

  };


  las.resetTrans = function() {

    if ( !this.state.trans ) {
      return;
    }

    window.console.log('resetTrans');

    this.setningerTrans.innerHTML = '';

    //  hide
    //  this.velocity(
    //    this.audioTrans,
    //    'slideUp',
    //    { duration: 0 }
    //  );

    this.state.trans = false;

  };


  //
  //  CONTROLS
  //
  las.showControls = function() {

    //  next button
    //  trans button


    this.state.controls = true;

    window.console.log('show controls');

  };


  las.resetControls = function() {


    //  if there was no controls
    if ( !this.state.controls ) {
      return false;
    }

    this.state.controls = false;

    window.console.log('reset controls');

  };


  //
  //  HELPERS
  //


  //
  //  remember to count number of moves to create a sentece
  //

  //
  //  this decides what happens after each click
  //  @event comes from addListener
  //
  las.eventHandler = function(event) {

    var elWithId;

    //  throttle clicks
    if ( this.checkClickState() ) {
      return;
    }

    //  traverse up to find the element with ID
    elWithId = this.checkNodeAndParents( event, false, 'id' );


    //  check if it is a setninger item

    //  or controls

    //  Next
    if ( elWithId && ( elWithId.id === 'setninger-controls__next' ) ) {


      //  if it is the first time user clicks play
      if ( this.state.beforeFirstPlay ) {
        this.state.beforeFirstPlay = false;
      }

      this.nextToBubble();

      //  stop eventHandler
      event.stopPropagation();
      return;

    }

    //  Trans
    if ( elWithId && ( elWithId.id === 'setninger-controls__trans' ) ) {



      //  stop eventHandler
      event.stopPropagation();
      return;

    }



    event.preventDefault();
    return false;
  };



  las.addListener = function() {

    this.wrapper.addEventListener('click', function(event) {

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


    //  wyświetl całe data


  };


  //  return augmented object
  return las;

}
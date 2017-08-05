//
//  Las Przewodnik
//


//
//  limitations!
//  - the play event is only suited for the table element
//  - change it to be more universal


function LasPrzewodnik() {
  "use strict";

  //  get methods from the LasHelper
  //  we can add new methods or overwrite old ones
  var las = new LasHelper();



  //
  //  Elements
  //
  las.przewodnikWrapper =           document.getElementById('przewodnik-wrapper');
  las.przewodnik =                  document.getElementById('przewodnik');


  las.clickedAudioRow =             false;

  //
  //  State
  //  this prohibits some functions from firing more than once
  //  it's also usefull in debugging
  //
  las.state = {
    clicked:                  false,
    playing:                  false
  };


  //
  //  Initiate
  //
  las.init = function() {

    //  get Elements
    this.getBasicElements();

    //  preopen the section

    //  prepare
    this.addListener();
    this.preloadShow();
  };


  //  toggle play icon background
  las.togglePlayIcon = function() {

    this.clickedAudioRow.classList.toggle('przewodnik-table__audio-row--playing');


    //
    //  some nice animation for the whole element?
    //

  };


  //
  //  AUDIO PAUSE EVENTS
  //
  las.atPause = function() {
    //  at the end of audio

    window.console.log('at pause');

    this.togglePlayIcon();

  };


  //
  //  Events
  //
  las.eventHandler = function( event ) {
    //  this decides what happens after each click
    //  @event comes from addListener

    var throttleTimer;
    var audioRow;
    var audioStartTime;
    var audioDuration;
    var newAudioObject;

    //  throttle clicks
    if ( this.state.clicked ) {
      return;
    }

    this.state.clicked = true;

    throttleTimer = window.setTimeout(function() {
      this.state.clicked = false;
      window.clearTimeout( throttleTimer );
    }.bind(this), 150);


    window.console.log('click');

    //  check if the el or parent has audio data
    audioRow = this.getParentWithAtt(event.target, 'data-audioStartTime');

    if ( audioRow && audioRow.hasAttribute( 'data-audioDuration' ) ) {

      window.console.log( 'we have audio data' );

      //  pause previous audioObject
      if ( this.state.playing ) {
        //  pause audio
        this.pauseAudio();

        //  do at pause
        this.atPause();
      }

      audioStartTime = audioRow.getAttribute( 'data-audioStartTime' );
      audioDuration = audioRow.getAttribute( 'data-audioDuration' );

      //  prepare audio object
      //  convert to numbers with +
      newAudioObject = this.createNewAudioObject(
        {
          startTime: +audioStartTime,
          duration: +audioDuration
        }
      );



      //  if objects are different
      if ( newAudioObject && ( newAudioObject !== this.currentAudioObject )  ) {

        window.console.log('new object is good, play');

        //  assign audiio object
        this.currentAudioObject = newAudioObject;
        this.clickedAudioRow = audioRow;

        //  change the background icon to pause
        this.togglePlayIcon();

        //  play
        this.playAudio();

      }
      else {
        window.console.log('sth went wrong');
      }


    }



  };



  //
  //  Listeners
  //
  las.addListener = function() {

    window.console.log('add event listener');

    this.przewodnikWrapper.addEventListener('click', function(event) {

      //  ignore right click
      if (event.which === 1) {

        this.eventHandler(event);

      }

    }.bind(this), false);


  };


  //  return augmented object
  return las;


}
//
//  Las Profile
//


function LasProfile() {
  "use strict";

  //  get methods from the LasHelper
  //  we can add new methods or overwrite old ones
  var las = new LasHelper();

  //
  //  Elements
  //
  las.charsWrapper =        document.getElementById('chars-wrapper');
  las.charsWrapperRect =    null;
  las.chars = [
                            null,
                            document.getElementById('char-1'),
                            document.getElementById('char-2'),
                            document.getElementById('char-3'),
                            document.getElementById('char-4')
  ];
  las.charsRectArray =      [];

  las.charsRow =            document.getElementById( 'chars-row' );
  las.charsRowRect =        null;




  las.clickedCharNo =       0;
  las.activeCharNo =        0;




  //
  //  State
  //  this prohibits some functions from firing more than once
  //  it's also usefull in debugging
  //
  las.state = {
    clicked:                false,
    state:                  ''
  };



  //
  //  Initiate
  //
  las.init = function() {

    //  get Elements
    this.getBasicElements();

    //  position nodes
    this.positionCharNodes();

    //  prepare
    this.addListener();
    this.hideLoader();

  };


  //
  //  Position chars
  //
  las.positionCharNodes = function() {

    var charRect;
    var charToMove;
    var charsL;
    var i;
    var j;
    var singleRect;

    if ( !this.charsRow ) {
      return;
    }

    charsL = this.chars.length;

    this.charsRowRect = this.charsRow.getBoundingClientRect();
    this.charsWrapperRect = this.charsWrapper.getBoundingClientRect();

    //  get all positions
    //  begin from 1
    //  0 is null
    for ( i = 1; i < charsL; i++ ) {

      charToMove = this.chars[ i ];
      this.charsRectArray[ i ] = charToMove.getBoundingClientRect();

    }


    //  prepare Velocity

    //  set row's height
    this.velocity( this.charsRow, { height: this.charsRowRect.height + 'px' }, { duration: 0 } );

    for ( j = 1; j < charsL; j++ ) {

      charToMove = this.chars[ j ];
      singleRect = this.charsRectArray[ j ];

      this.velocity(
        charToMove,
        { top: singleRect.top - this.charsWrapperRect.top + 'px',
          left: singleRect.left - this.charsWrapperRect.left + 'px',
          width: singleRect.width + 'px'
        },
        { duration: 0,
          begin: function( elements ) {
            elements[0].style.position = 'absolute';
          }
        }
      );

    }


  };




  //
  //  Toggle Char
  //
  las.toggleChar = function() {

    var i;
    var charsL;
    var charToMove;
    var left = 0;
    var leftP;
    var charsRow = this.charsRow;
    var finishFn;
    var beginFn;

    console.log( 'charAnimation :' + this.state.charAnimation );

    //  if charNo is 0,
    //  it should be assigned on eventHandler
    if ( !this.clickedCharNo ) {
      return;
    }

    this.state.charAnimation = true;

    console.log('clickedCharNo :' + this.clickedCharNo);
    console.log('activeCharNo :' + this.activeCharNo);

    //  if clicked is same as active
    if ( this.activeCharNo === this.clickedCharNo ) {
      this.closeChar();
      return;
    }

    //var charToMove = this.chars[ this.clickedCharNo ];

    charsL = this.chars.length;

    //  begin from 1
    //  0 is null
    for ( i = 1; i <= charsL; i++ ) {

      charToMove = this.chars[ i ];

      //  stop previous animation
      this.velocity( charToMove, 'stop');

      if ( charToMove ) {

        //  this char is clicked
        if ( i === this.clickedCharNo ) {

          this.velocity(
            charToMove,
            {
              width:    this.charsRowRect.width  + 'px',
              left:     this.charsRowRect.left - this.charsWrapperRect.left + 'px',
              top:      this.charsRowRect.top - this.charsWrapperRect.top + 'px'
            },
            { duration: 4 * this.helper.speed, easing: this.helper.easingSpring,
              complete: function() {
                charToMove.style.position = 'static';
                charsRow.style.height = 'auto';
              }
            }
          );

        }
        else {

          if ( left > 0 ) {
            leftP = left + '%';
          }

          this.velocity(
            charToMove,
            {
              left:         leftP,
              top:          '2rem',
              padding:      0,
              width:        '33.33%'
            },
            { duration: 4 * this.helper.speed, easing: this.helper.easingSpring,
              begin: function() {
                charToMove.style.position = 'absolute';
              }
            }
          );

          //  used to position chars from left to right
          left += 33.33;

        }

      }

    }


    //  set active char
    this.activeCharNo = this.clickedCharNo;

    //  reset clickedCharNo
    this.clickedCharNo = 0;

  };


  //
  //  Close Char
  //
  las.closeChar = function() {

  };



  //
  //  Even Handler
  //  this decides what happens after each click
  //  @event comes from addListener
  //
  las.eventHandler = function( event ) {

    var throttleTimer;
    var elWithId;

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


    //  traverse up to find the element with ID
    elWithId = this.checkNodeAndParents( event, false, 'id' );


    //  char-btn-1
    //  char-btn-2
    //  char-btn-3
    //  char-btn-4

    //  if it is char button
    if ( elWithId && ( elWithId.id.split('-btn-')[0] === 'char' ) ) {

      this.clickedCharNo = parseInt( elWithId.id.split('-btn-')[1] );

      this.toggleChar();

      //  stop eventHandler
      event.stopPropagation();
      return;
    }



    //  if it iwas "wróć na szlak" button
    if ( event.target.id === 'close-result' ) {


      //  stop eventHandler
      event.stopPropagation();
      return;
    }


  };


  las.addListener = function() {

    window.console.log('add event listener');

    window.addEventListener('click', function(event) {

      //  ignore right click
      if (event.which === 1) {

        this.eventHandler(event);

      }

    }.bind(this), false);


  };


  //  return augmented object
  return las;


}
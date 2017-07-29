//
//  Las Profile
//


function LasCreateProfile() {
  "use strict";

  //  get methods from the LasHelper
  //  we can add new methods or overwrite old ones
  var las =                   new LasHelper();

  //
  //  Elements
  //
  las.wrapper =               document.getElementById('wrapper');
  las.charsWrapper =          document.getElementById('chars-wrapper');
  las.charsWrapperRect =      null;
  las.chars = [
                              null,
                              document.getElementById('char-1'),
                              document.getElementById('char-2'),
                              document.getElementById('char-3'),
                              document.getElementById('char-4')
  ];
  las.charsRectArray =        [];

  las.charsRow =              document.getElementById('chars-row');
  las.charsRowRect =          null;
  las.charImgs =              [];
  las.charTitles =            [];
  las.charDescs =             [];
  las.charBacks = [
                              null,
                              document.getElementById('char-back-1'),
                              document.getElementById('char-back-2'),
                              document.getElementById('char-back-3'),
                              document.getElementById('char-back-4')
  ];

  las.charForm =              document.getElementById('char-form');
  las.charType =              document.getElementById('char-type');
  las.charFname =             document.getElementById('char-fname');
  las.charNick =              document.getElementById('char-nick');
  las.charBlocker =           document.getElementById('char-blocker');


  las.clickedCharNo =         0;
  las.activeCharNo =          0;




  //
  //  State
  //  this prohibits some functions from firing more than once
  //  it's also usefull in debugging
  //
  las.state = {
    clicked:                  false,
    writing:                  false,
    drawOpen:                 false,
    animatingDraw:            false,
    //  start, toggle, form, accept
    state:                    'start'
  };


  las.timers =              {};


  //
  //  Initiate
  //
  las.init = function() {

    //
    //  Get Data
    //
    this.lasData =              new LasNicknames();


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
    var charBack;
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

      //  get rect
      this.charsRectArray[ i ] = charToMove.getBoundingClientRect();

      //  get img
      this.charImgs[ i ] = charToMove.querySelector('.char-item__img');

      //  get title
      this.charTitles[ i ] = charToMove.querySelector('.char-item__title');

      //  get title
      this.charDescs[ i ] = charToMove.querySelector('.char-item__desc');

    }


    //  prepare Velocity

    //  set row's height
    this.velocity( this.charsRow, { height: this.charsRowRect.height + 'px' }, { duration: 0 } );

    for ( j = 1; j < charsL; j++ ) {

      charToMove = this.chars[ j ];
      charBack = this.charBacks[ j ];
      singleRect = this.charsRectArray[ j ];

      this.velocity(
        charToMove,
        {
          width:        singleRect.width + 'px',
          translateY:   singleRect.top - this.charsRowRect.top + 'px',
          translateX:   singleRect.left - this.charsRowRect.left + 'px'
        },
        { duration: 0,
          begin: function( elements ) {
            elements[0].style.position = 'absolute';
            charToMove.style.float = 'none';
            charToMove.style.top = '0';
            charToMove.style.left = '0';
          }
        }
      );

      //  prepare images
      this.velocity.hook( charBack, 'opacity', '0' );

    }


  };




  //
  //  Toggle Char
  //
  las.toggleChar = function() {

    var charsRow = this.charsRow;
    var charsRowW = this.charsRowRect.width;
    var left = 0;
    var charToMove;
    var charImg;
    var charBack;
    var charDesc;
    var completeFn;
    var beginFn;
    var charsL;
    var i;

    console.log( 'charAnimation :' + this.state.charAnimation );

    //  if charNo is 0,
    //  it should be assigned on eventHandler
    if ( !this.clickedCharNo ) {
      return;
    }

    this.state.charAnimation = true;

    console.log('clickedCharNo :' + this.clickedCharNo);
    console.log('activeCharNo :' + this.activeCharNo);

    //  change the type
    this.charType.value = this.clickedCharNo;

    //  this can be removed, unnecesary
    //  if clicked is same as active
    if ( this.activeCharNo === this.clickedCharNo ) {
      //this.closeChar();
      return;
    }

    if ( this.state.state = 'start' ) {

      //  change state
      this.state.state = 'toggle';

      //  hide title
      this.charsWrapper.classList.add( 'char-selection--toggle' );

    }



    //  prepare form
    this.velocity( this.charForm, 'stop', true );
    this.charForm.style.display = 'none';



    charsL = this.chars.length;

    //  begin from 1
    //  0 is null
    for ( i = 1; i < charsL; i++ ) {

      charToMove = this.chars[ i ];
      charImg = this.charImgs[ i ];
      charDesc = this.charDescs[ i ];
      charBack = this.charBacks[ i ];

      //  stop previous animation
      this.velocity( charToMove, 'stop', true );
      this.velocity( charImg, 'stop', true );
      this.velocity( charDesc, 'stop', true );
      this.velocity( charBack, 'stop', true );


      if ( charToMove ) {

        //
        //  Clicked Char
        //
        if ( i === this.clickedCharNo ) {

          //  use IIFE to lock variables
          (function( charToMove, charsRow, charImg, charBack ) {

            completeFn = function() {
              charToMove.style.position = 'static';
              charsRow.style.height = 'auto';
            }.bind( this );

            charToMove.classList.remove('char-item--small');
            charToMove.classList.add('char-item--active');

            window.console.log(this.charsRowRect.top);

            this.velocity(
              charToMove,
              {
                width:      '100%',
                padding:    '0px',
                translateY: '0px',
                translateX: '0px',

              },
              { duration: 4 * this.helper.speed, easing: this.helper.easingSpring,
                complete: function() {
                  completeFn();
                }
              }
            );

            this.velocity(
              charImg,
              { width: '50%', borderWidth: '0.5rem' },
              { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
            );

            this.velocity(
              charDesc,
              'slideDown',
              { duration: 2 * this.helper.speed, easing: this.helper.easingSpring, delay: 2 * this.helper.speed }
            );

            this.velocity(
              charBack,
              { opacity: 1 },
              { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, delay: this.helper.speed }
            );


          }).bind( this )( charToMove, charsRow, charImg, charBack );

        }
        //
        //  Other chars
        //
        else {

          //  use IIFE to lock variables
          (function( charToMove, charImg, charBack ) {

            charToMove.classList.remove('char-item--active');
            charToMove.classList.add('char-item--small');


            beginFn = function() {
              charToMove.style.position = 'absolute';
            };

            this.velocity(
              charToMove,
              {
                width:        '33.33%',
                padding:      '0px',
                translateY:   '-100%',
                translateX:   left + 'px',

              },
              { duration: 4 * this.helper.speed, easing: this.helper.easingSpring,
                begin: function() {
                  beginFn();
                }
              }
            );

            this.velocity(
              charImg,
              { width: '50%', borderWidth: '3px' },
              { duration: 1 * this.helper.speed, easing: this.helper.easingQuart }
            );

            this.velocity(
              charDesc,
              'slideUp',
              { duration: 1 * this.helper.speed, easing: this.helper.easingQuart }
            );

            this.velocity(
              charBack,
              { opacity: 0 },
              { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, delay: this.helper.speed }
            );

          }).bind( this )( charToMove, charImg, charBack );


          //  used to position chars from left to right
          left += (charsRowW / 3 );

        }

      }

    }


    //  show form
    this.velocity(
      this.charForm,
      'slideDown',
      { duration: 2 * this.helper.speed, easing: this.helper.easingSpring, delay: 4 * this.helper.speed }
    );


    //  set active char
    this.activeCharNo = this.clickedCharNo;

    //  reset clickedCharNo
    this.clickedCharNo = 0;

  };


  //
  //  Draw a nickname
  //
  las.drawNickname = function() {

    var completeFn;
    var nicknames;
    var nick;

    if ( this.state.animatingDraw || !this.activeCharNo || !this.charForm || !this.charNick ) {
      return;
    }

    this.state.animatingDraw = true;


    //  zasłaniamy blocker od lewej
    //  jeśli pirwszy raz, trzeba dodać classy do input
    //  losujemy nick
    //  odsłaniamy blocker od lewej
    //  pokazujemy przyciski
    //  resetujemy blocker


    completeFn = function() {

      //  first time
      //  add new classes
      if ( !this.state.nick ) {

        this.charFname.classList.add('char-form__text--name');
        this.charNick.classList.add('char-form__text--nick');
        this.charNick.classList.remove('char-form__text--hidden');

        this.openNicknameDraw();

      }

      //  add nick
      nicknames = this.shuffleArray( this.lasData.nicknames );
      nick = nicknames[ 3 ].trim();
      this.charNick.value = nick;

      this.state.animatingDraw = false;

    }.bind(this);

    //  show blocker from left
    this.velocity(
      this.charBlocker,
      { translateX: ['100%', '0%'] },
      { duration: 4 * this.helper.speed, easing: this.helper.easingQuart,
        complete: function() {
          completeFn();
        }
      }
    );

    //  hide blocker from left
    this.velocity(
      this.charBlocker,
      { translateX: ['200%', '100%'] },
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart,
        complete: function( elements ) {
          elements[0].style.cssText = '';
        }
      }
    );


  };




  //  this function creates an array of spans for each letter in a string
  //  then animates each span
  //  las.loopNameCharacteres = function() {

  //    var nicknames;
  //    var nick;
  //    var fname;
  //    var fullName;
  //    var charactersArray;
  //    var charactersArrayL;
  //    var i;
  //    var characterElsArray = [];
  //    var charactersWrapper;

  //    nicknames = this.shuffleArray( this.lasData.nicknames );
  //    nick = nicknames[ 3 ].trim();
  //    fname = this.charFname.value.trim();
  //    fullName = fname + ' ' +  nick;

  //    //  split the name
  //    charactersArray = fullName.split( '' );
  //    charactersArrayL = charactersArray.length;

  //    //  create wrapper
  //    charactersWrapper = document.createElement('span');

  //    //  loop over characters and add spans
  //    for ( i = 0; i < charactersArrayL; i++ ) {

  //      //  create
  //      characterElsArray[ i ] = document.createElement('span');
  //      characterElsArray[ i ].style.opacity = 0;
  //      if ( charactersArray[ i ] !== ' ' ) {
  //        characterElsArray[ i ].style.display = 'inline-block';
  //      }
  //      characterElsArray[ i ].innerHTML = charactersArray[ i ];

  //      //  append to wrapper
  //      charactersWrapper.appendChild( characterElsArray[ i ] );

  //    }


  //    //  append wrapper onto the
  //    this.charNick.appendChild( charactersWrapper );

  //    //  loop over characters and animate
  //    for ( i = 0; i < charactersArrayL; i++ ) {

  //      this.velocity(
  //        characterElsArray[ i ],
  //        { opacity: [1, 0], scale: [1, '0.5'], translateX: [0, '-5px'] },
  //        { duration: 2* this.helper.speed, easing: this.helper.easingQuart, delay: i * 0.25 * this.helper.speed }
  //      );

  //      if ( i + 1 === charactersArrayL ) {
  //        this.state.animatingDraw = false;
  //      }

  //    }


  //  };


  //
  //  Open nick drawing button
  //
  las.openNicknameDraw = function() {

    var charNo = this.activeCharNo;
    var charNickWrapper;

    if ( !this.activeCharNo || !this.charForm || this.state.drawOpen ) {
      return;
    }

    this.state.drawOpen = true;

    charNickWrapper = document.getElementById( 'char-nick-btn' ).parentNode;

    console.log(charNickWrapper);

    this.velocity(
      charNickWrapper,
      'slideDown',
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, delay: this.helper.speed }
    );

  };



  //
  //  Even Handler
  //  this decides what happens after each click
  //  @event comes from addListener
  //
  las.eventHandler = function( event ) {

    var elWithId;

    //  throttle clicks
    var wasClicked = checkClickState();

    if ( wasClicked ) {
      return;
    }


    window.console.log('click');


    //  traverse up to find the element with ID
    elWithId = this.checkNodeAndParents( event, false, 'id' );


    //  char-btn-1 etc.
    //  if it is char button
    if ( elWithId && ( elWithId.id.split('-btn-')[0] === 'char' ) ) {

      this.clickedCharNo = parseInt( elWithId.id.split('-btn-')[1] );

      this.toggleChar();

      //  stop eventHandler
      event.stopPropagation();
      return;
    }


    //  if it is char nick btn
    if ( elWithId && ( elWithId.id === 'char-nick-btn' ) ) {

      this.drawNickname();

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


  //
  //  Key Even Handler
  //  this decides what happens after each keyup
  //  @event comes from addListener
  //
  las.keyEventHandler = function( event ) {

    //  if there is timer, remove it
    if ( this.timers.keyEvent ) {
      window.clearTimeout( this.timers.keyEvent );
      this.timers.keyEvent = null;
    }

    //  add new timer
    //  it debounces keyup
    this.timers.keyEvent = window.setTimeout(function() {

      window.console.log('keyup');

      window.clearTimeout( this.timers.keyEvent );
      this.timers.keyEvent = null;

      this.drawNickname();

    }.bind(this), 1000);

  };


  las.addListener = function() {

    window.console.log('add event listener');

    window.addEventListener('click', function(event) {

      //  ignore right click
      if (event.which === 1) {

        this.eventHandler(event);

      }

    }.bind(this), false);

    this.charFname.addEventListener('keyup', function(event) {

      this.keyEventHandler(event);

    }.bind(this), false);


  };


  //  return augmented object
  return las;


}



function LasDisplayProfile() {
  "use strict";

  //  get methods from the LasHelper
  //  we can add new methods or overwrite old ones
  var las = new LasHelper();



  //
  //  Initiate
  //
  las.init = function() {

    //  get Elements
    this.getBasicElements();

    //  prepare
    //this.addListener();
    this.preloadShow();

  };


  //  return augmented object
  return las;


}
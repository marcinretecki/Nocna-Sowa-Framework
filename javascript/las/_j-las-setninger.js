//
//  Las Setninger
//


//
//  TODO
//  - add Velocity hooks, to prevent layout trashing at the beggining of the app
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
  las.setningerWordsB =         document.getElementById('setninger-words-b');
  las.setningerTrans =          document.getElementById('setninger-trans');
  las.setningerMsg =            document.getElementById('setninger-msg');
  las.setningerControls =       document.getElementById('setninger-controls');
  las.setningerControlsBtns = {
    next:                         document.getElementById('setninger-controls__next'),
    trans:                        document.getElementById('setninger-controls__trans')
  };

  //  this will be filled as needed
  //  depends on number of items in the sentence
  las.setningerWordsElements = [];

  //  we are animating words for now,
  //  maybe in the future we will move back to clones
  //las.setningerWordsClones= [];


  //
  //  State
  //
  las.state = {
    currentState:             '',   // END / INTRO / CHAT

    //  words are showed
    words:                    false,

    //  composed sentece is showed
    sentence:                 false,

    msg:                      false,
    trans:                    false,
    controls: {
      next:                     false,
      trans:                    false
    },
    bubbling:                 false,
    testmode:                 false,
    clicked:                  false
  };

  las.wordPositions = [];

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
    this.prepareSortable();
    this.addListener();

    //  reset background
    this.resetWordsB();

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
  //  Prepare sortable
  //

  las.prepareSortable = function() {

    var animateBackground = function() {

      this.adjustWordsB();

    }.bind(this);

    var checkBubble = function() {

      this.checkBubble();

    }.bind(this);

    var storeOrder = function( what, how ) {

      //if ( how === 'set' ) {
        window.console.log(what);
        window.console.log(how);
      //}

    }.bind(this);


    this.sortable = Sortable.create(
      this.setningerWords,
      {
        animation: 100,
        easing:   'cubic-bezier(0.77, 0, 0.175, 1)',
        delay: 0,
        scroll: false,
        draggable: '.setninger-words__word-wrap',
        dragClass: 'setninger-words__word-wrap--drag',
        chosenClass: 'setninger-words__word-wrap--chosen',
        ghostClass: 'setninger-words__word-wrap--ghost',
        onUpdate: function( evt ) {
          animateBackground();

        },
        onEnd: function( evt ) {
          checkBubble();
        }
      }
    );

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
      this.showControls( 'next' );

    }
    //  if there is at least one sentence
    else if ( this.currentBubbleData.set && ( this.currentBubbleData.set.length > 0 ) ) {

      this.waitForBubble();

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

    window.console.log(this.state.sentence);

    //  reset everything
    this.resetMsg();
    this.resetTrans();
    this.resetWordsB();
    this.resetComposedSentence();
    this.resetControls( 'next' );
    this.resetControls( 'trans' );

    //  get next bubble
    this.currentBubbleData = this.getNextBubble( this.currentBubbleData.autoNext );

    //  create new bubble
    this.createBubble();

    //  reset bubbling state
    this.state.bubbling = false;

  };


  //
  //  Wait till bubble data and elements are changed before showing new bubble
  //
  las.waitForBubble = function() {

    //  if timer is already set
    //  or it is pimp
    //  in the second case, msg is showed earlier
    if ( this.waitForBubbleTimer ) {
      return false;
    }

    //  wait until msg or bubble is reset
    if ( this.state.msg || this.state.sentence ) {

      window.console.log('set waitForMsg timer');

      this.waitForBubbleTimer = window.setTimeout(function() {

        window.clearTimeout(this.waitForBubbleTimer);
        this.waitForBubbleTimer = undefined;

        this.waitForBubble();

      }.bind(this), 100);

      return false;

    }

    this.showBubble();
    this.showWordsB();
    this.showControls( 'trans' );

  };


  //
  //  Show words from the bubble
  //
  las.showBubble = function() {

    if ( this.state.words ) {
      return false;
    }

    this.state.words = true;

    window.console.log('showBubble');
    window.console.log(this.currentBubbleData.set[ 0 ]);

    //  use slice to copy the array, not make referece
    var set = this.shuffleArray ( this.currentBubbleData.set[ 0 ] );
    var l = set.length;
    var i;

    //  if shuffle returned the same array
    while ( set[ 0 ] === this.currentBubbleData.set[ 0 ][ 0 ] ) {

      //  shuffle again
      set = this.shuffleArray ( this.currentBubbleData.set[ 0 ] );

    }



    //  create proper html first
    (function( i ) {

      for ( i=0; l > i; i++ ) {

        //  if there are not enough words
        if ( !this.setningerWordsElements[ i ] ) {

          //  create new word
          this.createNewWord();

        }

        //  change html
        this.setningerWordsElements[ i ].firstChild.innerHTML = set[ i ];

        //  add data
        this.setningerWordsElements[ i ].setAttribute('data-set-word', set[ i ]);

        //  append the word
        this.setningerWords.append( this.setningerWordsElements[ i ] );

      }

    }).bind( this )( i );


    //  fade words in
    (function( i ) {

      for ( i=0; l > i; i++ ) {

        Velocity(
          this.setningerWordsElements[ i ],
          { opacity: [1, 0] },
          { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
        );

      }

    }).bind( this )( i );


  };



  //
  //  Create a new word
  //  @return new element
  //
  las.createNewWord = function() {

    var wordWrap;
    var word;

    window.console.log('createNewWord');

    wordWrap = document.createElement('div');
    word = document.createElement('div');
    wordWrap.className = 'setninger-words__word-wrap';
    word.className = 'setninger-words__word';
    wordWrap.append( word );

    //  add new word into array reference
    this.setningerWordsElements.push( wordWrap );

  };


  //
  //  Check bubble
  //
  las.checkBubble = function() {

    if ( !this.state.words ) {
      return;
    }

    var i;
    var j;
    var setNo = this.currentBubbleData.set.length;
    var wordsNo = this.currentBubbleData.set[ 0 ].length;
    var checkedWord = this.setningerWords.firstChild;
    var set;
    var checkArray = [];
    var checkArrayResult;

    function checkWord( word, wordEl ) {

      if ( word === wordEl.getAttribute('data-set-word') ) {
        return true;
      }
      else {
        return false;
      }
    }

    //  loop words number
    for ( j=0; j < wordsNo; j++ ) {

      //  get the first element node (not text node)
      while ( checkedWord.nodeType !== 1 ) {
        checkedWord = checkedWord.nextSibling;
      }

      //  loop sets
      for ( i=0; i < setNo; i++ ) {

        set = this.currentBubbleData.set[ i ];

        //console.log('check: ' + j + ' | set: ' + i + ', correct: ' +  set[ j ] + ' | checked: ' + checkedWord.getAttribute('data-set-word'));

        if ( !checkWord( set[ j ], checkedWord ) ) {
          checkArray[ i ] = 0;
        }
        else {
          checkArray[ i ] = 1;
        }

      }

      window.console.log(checkArray);

      checkArrayResult = checkArray.every(function( item, index, array ) {
        window.console.log(item);
        return item === 0;
      });

      if ( checkArrayResult ) {
        return false;
      }

      //  get the next word
      checkedWord = checkedWord.nextSibling;

    }


    this.showTrans();
    this.showComposedSentence();
    this.showControls( 'next' );

  };


  //
  //  Change words into a sentence
  //  called when the right sentence is created by user
  //
  las.showComposedSentence = function() {

    var i;
    var wordsNo;

    if ( !this.state.words || this.state.sentence ) {
      return false;
    }

    this.state.words = false;
    this.state.sentence = true;

    window.console.log('showComposedSentence');

    this.setningerWords.classList.add( 'setninger-words--composed' );

    this.addScore( 'correct' );

  };

  las.resetComposedSentence = function() {

    var i;
    var l;
    var completeFn;

    if ( !this.state.sentence ) {
      return;
    }

    l = this.currentBubbleData.set[ 0 ].length;

    completeFn = function() {

      var j;

      //  remove children from dom

      for ( j=0; j<l; j++ ) {

        this.setningerWords.removeChild( this.setningerWordsElements[ j ] );

      }

      //  reset state when animation completes
      this.state.sentence = false;

    }.bind(this);

    window.console.log('resetComposedSentence');

    this.setningerWords.classList.remove( 'setninger-words--composed' );

    //  fade words out
    for ( i=0; l > i; i++ ) {

      (function( i, l ) {

        if ( i === (l - 1) ) {

          Velocity(
            this.setningerWordsElements[ i ],
            { opacity: [0, 1] },
            { duration: 2 * this.helper.speed, easing: this.helper.easingQuart,
              complete: function() {
                completeFn();
              }
            }
          );

        }
        else {

          Velocity(
            this.setningerWordsElements[ i ],
            { opacity: [0, 1] },
            { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
          );

        }

      }).bind( this )( i, l );

    }

  };


  //
  //  Background
  //
  las.showWordsB = function() {

    if ( !this.state.words ) {
      return;
    }

    //  get rect
    var rect = this.setningerWords.getBoundingClientRect();

    //  example
    this.setningerWordsB.style.left =  rect.left + 'px';
    this.setningerWordsB.style.top =  rect.top + 'px';
    this.setningerWordsB.style.height =  rect.height + 'px';

    Velocity(
      this.setningerWordsB,
      { scaleY: [1, 0] },
      { duration: 2 * this.helper.speed, easing: this.helper.easingSpring }
    );

  };


  las.adjustWordsB = function() {

    if ( !this.state.words ) {
      return;
    }

    //  get rect
    var rect = this.setningerWords.getBoundingClientRect();

    Velocity(
      this.setningerWordsB,
      { left: rect.left + 'px', top: rect.top + 'px', height: rect.height + 'px' },
      { duration: 2 * this.helper.speed, easing: this.helper.easingSpring }
    );

  };


  las.resetWordsB = function() {

    if ( !this.state.sentence ) {
      return;
    }

    Velocity(
      this.setningerWordsB,
      { scaleY: [0, 1] },
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
    );

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
    //  Velocity(
    //    this.audioTrans,
    //    'slideDown',
    //    { duration: this.helper.speed, easing: this.helper.easingSpring }
    //  );

    //  //  add one to progress
    //  this.addScore( 'trans' );

    //  reset button
    this.resetControls( 'trans' );

  };


  las.resetTrans = function() {

    if ( !this.state.trans ) {
      return;
    }

    window.console.log('resetTrans');

    this.setningerTrans.innerHTML = '';

    //  hide
    //  Velocity(
    //    this.audioTrans,
    //    'slideUp',
    //    { duration: 0 }
    //  );

    this.state.trans = false;

  };


  //
  //  CONTROLS
  //  @type = next || trans
  //
  las.showControls = function( type ) {

    //  next button
    //  trans button

    if ( !type || this.state.controls[ type ] ) {
      return;
    }

    window.console.log('show control: ' + type);

    this.state.controls[ type ] = true;

    Velocity(
      this.setningerControlsBtns[ type ],
      'fadeIn',
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, display: 'block' }
    );


  };


  las.resetControls = function( type ) {

    //  if there was no controls
    if ( !type || !this.state.controls[ type ] ) {
      return false;
    }

    this.state.controls[ type ] = false;

    window.console.log('reset control: ' + type);

    Velocity(
      this.setningerControlsBtns[ type ],
      'fadeOut',
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart }
    );

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

      //  show translate
      this.showTrans();

      //  stop eventHandler
      event.stopPropagation();
      return;

    }



    event.preventDefault();
    return false;
  };



  las.addListener = function() {

    this.setningerControls.addEventListener('click', function(event) {

      //  ignore right click
      if (event.which === 1) {

        this.eventHandler(event);

      }

    }.bind(this), false);

    window.addEventListener('resize', function(event) {

      this.adjustWordsB();
      console.log('resize');

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








/**!
 * Sortable
 * @author  RubaXa   <trash@rubaxa.org>
 * @license MIT
 */

(function sortableModule(factory) {
  "use strict";

  if (typeof define === "function" && define.amd) {
    define(factory);
  }
  else if (typeof module != "undefined" && typeof module.exports != "undefined") {
    module.exports = factory();
  }
  else {
    /* jshint sub:true */
    window["Sortable"] = factory();
  }
})(function sortableFactory() {
  "use strict";

  if (typeof window == "undefined" || !window.document) {
    return function sortableError() {
      throw new Error("Sortable.js requires a window with a document");
    };
  }

  var dragEl,
    parentEl,
    ghostEl,
    cloneEl,
    rootEl,
    nextEl,
    lastDownEl,

    scrollEl,
    scrollParentEl,
    scrollCustomFn,

    lastEl,
    lastCSS,
    lastParentCSS,

    oldIndex,
    newIndex,

    activeGroup,
    putSortable,

    autoScroll = {},

    tapEvt,
    touchEvt,

    moved,

    /** @const */
    R_SPACE = /\s+/g,
    R_FLOAT = /left|right|inline/,

    expando = 'Sortable' + (new Date).getTime(),

    win = window,
    document = win.document,
    parseInt = win.parseInt,

    $ = win.jQuery || win.Zepto,
    Polymer = win.Polymer,

    captureMode = false,

    supportDraggable = !!('draggable' in document.createElement('div')),
    supportCssPointerEvents = (function (el) {
      // false when IE11
      if (!!navigator.userAgent.match(/Trident.*rv[ :]?11\./)) {
        return false;
      }
      el = document.createElement('x');
      el.style.cssText = 'pointer-events:auto';
      return el.style.pointerEvents === 'auto';
    })(),

    _silent = false,

    abs = Math.abs,
    min = Math.min,

    savedInputChecked = [],
    touchDragOverListeners = [],

    _autoScroll = _throttle(function (/**Event*/evt, /**Object*/options, /**HTMLElement*/rootEl) {
      // Bug: https://bugzilla.mozilla.org/show_bug.cgi?id=505521
      if (rootEl && options.scroll) {
        var _this = rootEl[expando],
          el,
          rect,
          sens = options.scrollSensitivity,
          speed = options.scrollSpeed,

          x = evt.clientX,
          y = evt.clientY,

          winWidth = window.innerWidth,
          winHeight = window.innerHeight,

          vx,
          vy,

          scrollOffsetX,
          scrollOffsetY
        ;

        // Delect scrollEl
        if (scrollParentEl !== rootEl) {
          scrollEl = options.scroll;
          scrollParentEl = rootEl;
          scrollCustomFn = options.scrollFn;

          if (scrollEl === true) {
            scrollEl = rootEl;

            do {
              if ((scrollEl.offsetWidth < scrollEl.scrollWidth) ||
                (scrollEl.offsetHeight < scrollEl.scrollHeight)
              ) {
                break;
              }
              /* jshint boss:true */
            } while (scrollEl = scrollEl.parentNode);
          }
        }

        if (scrollEl) {
          el = scrollEl;
          rect = scrollEl.getBoundingClientRect();
          vx = (abs(rect.right - x) <= sens) - (abs(rect.left - x) <= sens);
          vy = (abs(rect.bottom - y) <= sens) - (abs(rect.top - y) <= sens);
        }


        if (!(vx || vy)) {
          vx = (winWidth - x <= sens) - (x <= sens);
          vy = (winHeight - y <= sens) - (y <= sens);

          /* jshint expr:true */
          (vx || vy) && (el = win);
        }


        if (autoScroll.vx !== vx || autoScroll.vy !== vy || autoScroll.el !== el) {
          autoScroll.el = el;
          autoScroll.vx = vx;
          autoScroll.vy = vy;

          clearInterval(autoScroll.pid);

          if (el) {
            autoScroll.pid = setInterval(function () {
              scrollOffsetY = vy ? vy * speed : 0;
              scrollOffsetX = vx ? vx * speed : 0;

              if ('function' === typeof(scrollCustomFn)) {
                return scrollCustomFn.call(_this, scrollOffsetX, scrollOffsetY, evt);
              }

              if (el === win) {
                win.scrollTo(win.pageXOffset + scrollOffsetX, win.pageYOffset + scrollOffsetY);
              } else {
                el.scrollTop += scrollOffsetY;
                el.scrollLeft += scrollOffsetX;
              }
            }, 24);
          }
        }
      }
    }, 30),

    _prepareGroup = function (options) {
      function toFn(value, pull) {
        if (value === void 0 || value === true) {
          value = group.name;
        }

        if (typeof value === 'function') {
          return value;
        } else {
          return function (to, from) {
            var fromGroup = from.options.group.name;

            return pull
              ? value
              : value && (value.join
                ? value.indexOf(fromGroup) > -1
                : (fromGroup == value)
              );
          };
        }
      }

      var group = {};
      var originalGroup = options.group;

      if (!originalGroup || typeof originalGroup != 'object') {
        originalGroup = {name: originalGroup};
      }

      group.name = originalGroup.name;
      group.checkPull = toFn(originalGroup.pull, true);
      group.checkPut = toFn(originalGroup.put);
      group.revertClone = originalGroup.revertClone;

      options.group = group;
    }
  ;


  /**
   * @class  Sortable
   * @param  {HTMLElement}  el
   * @param  {Object}       [options]
   */
  function Sortable(el, options) {
    if (!(el && el.nodeType && el.nodeType === 1)) {
      throw 'Sortable: `el` must be HTMLElement, and not ' + {}.toString.call(el);
    }

    this.el = el; // root element
    this.options = options = _extend({}, options);


    // Export instance
    el[expando] = this;

    // Default options
    var defaults = {
      group: Math.random(),
      sort: true,
      disabled: false,
      store: null,
      handle: null,
      scroll: true,
      scrollSensitivity: 30,
      scrollSpeed: 10,
      draggable: /[uo]l/i.test(el.nodeName) ? 'li' : '>*',
      ghostClass: 'sortable-ghost',
      chosenClass: 'sortable-chosen',
      dragClass: 'sortable-drag',
      ignore: 'a, img',
      filter: null,
      preventOnFilter: true,
      animation: 0,
      setData: function (dataTransfer, dragEl) {
        dataTransfer.setData('Text', dragEl.textContent);
      },
      dropBubble: false,
      dragoverBubble: false,
      dataIdAttr: 'data-id',
      delay: 0,
      forceFallback: false,
      fallbackClass: 'sortable-fallback',
      fallbackOnBody: false,
      fallbackTolerance: 0,
      fallbackOffset: {x: 0, y: 0}
    };


    // Set default options
    for (var name in defaults) {
      !(name in options) && (options[name] = defaults[name]);
    }

    _prepareGroup(options);

    // Bind all private methods
    for (var fn in this) {
      if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
        this[fn] = this[fn].bind(this);
      }
    }

    // Setup drag mode
    this.nativeDraggable = options.forceFallback ? false : supportDraggable;

    // Bind events
    _on(el, 'mousedown', this._onTapStart);
    _on(el, 'touchstart', this._onTapStart);
    _on(el, 'pointerdown', this._onTapStart);

    if (this.nativeDraggable) {
      _on(el, 'dragover', this);
      _on(el, 'dragenter', this);
    }

    touchDragOverListeners.push(this._onDragOver);

    // Restore sorting
    options.store && this.sort(options.store.get(this));
  }


  Sortable.prototype = /** @lends Sortable.prototype */ {
    constructor: Sortable,

    _onTapStart: function (/** Event|TouchEvent */evt) {
      var _this = this,
        el = this.el,
        options = this.options,
        preventOnFilter = options.preventOnFilter,
        type = evt.type,
        touch = evt.touches && evt.touches[0],
        target = (touch || evt).target,
        originalTarget = evt.target.shadowRoot && evt.path[0] || target,
        filter = options.filter,
        startIndex;

      _saveInputCheckedState(el);


      // Don't trigger start event when an element is been dragged, otherwise the evt.oldindex always wrong when set option.group.
      if (dragEl) {
        return;
      }

      if (/mousedown|pointerdown/.test(type) && evt.button !== 0 || options.disabled) {
        return; // only left button or enabled
      }


      target = _closest(target, options.draggable, el);

      if (!target) {
        return;
      }

      if (lastDownEl === target) {
        // Ignoring duplicate `down`
        return;
      }

      // Get the index of the dragged element within its parent
      startIndex = _index(target, options.draggable);

      // Check filter
      if (typeof filter === 'function') {
        if (filter.call(this, evt, target, this)) {
          _dispatchEvent(_this, originalTarget, 'filter', target, el, startIndex);
          preventOnFilter && evt.preventDefault();
          return; // cancel dnd
        }
      }
      else if (filter) {
        filter = filter.split(',').some(function (criteria) {
          criteria = _closest(originalTarget, criteria.trim(), el);

          if (criteria) {
            _dispatchEvent(_this, criteria, 'filter', target, el, startIndex);
            return true;
          }
        });

        if (filter) {
          preventOnFilter && evt.preventDefault();
          return; // cancel dnd
        }
      }

      if (options.handle && !_closest(originalTarget, options.handle, el)) {
        return;
      }

      // Prepare `dragstart`
      this._prepareDragStart(evt, touch, target, startIndex);
    },

    _prepareDragStart: function (/** Event */evt, /** Touch */touch, /** HTMLElement */target, /** Number */startIndex) {
      var _this = this,
        el = _this.el,
        options = _this.options,
        ownerDocument = el.ownerDocument,
        dragStartFn;

      if (target && !dragEl && (target.parentNode === el)) {
        tapEvt = evt;

        rootEl = el;
        dragEl = target;
        parentEl = dragEl.parentNode;
        nextEl = dragEl.nextSibling;
        lastDownEl = target;
        activeGroup = options.group;
        oldIndex = startIndex;

        this._lastX = (touch || evt).clientX;
        this._lastY = (touch || evt).clientY;

        dragEl.style['will-change'] = 'transform';

        dragStartFn = function () {
          // Delayed drag has been triggered
          // we can re-enable the events: touchmove/mousemove
          _this._disableDelayedDrag();

          // Make the element draggable
          dragEl.draggable = _this.nativeDraggable;

          // Chosen item
          _toggleClass(dragEl, options.chosenClass, true);

          // Bind the events: dragstart/dragend
          _this._triggerDragStart(evt, touch);

          // Drag start event
          _dispatchEvent(_this, rootEl, 'choose', dragEl, rootEl, oldIndex);
        };

        // Disable "draggable"
        options.ignore.split(',').forEach(function (criteria) {
          _find(dragEl, criteria.trim(), _disableDraggable);
        });

        _on(ownerDocument, 'mouseup', _this._onDrop);
        _on(ownerDocument, 'touchend', _this._onDrop);
        _on(ownerDocument, 'touchcancel', _this._onDrop);
        _on(ownerDocument, 'pointercancel', _this._onDrop);
        _on(ownerDocument, 'selectstart', _this);

        if (options.delay) {
          // If the user moves the pointer or let go the click or touch
          // before the delay has been reached:
          // disable the delayed drag
          _on(ownerDocument, 'mouseup', _this._disableDelayedDrag);
          _on(ownerDocument, 'touchend', _this._disableDelayedDrag);
          _on(ownerDocument, 'touchcancel', _this._disableDelayedDrag);
          _on(ownerDocument, 'mousemove', _this._disableDelayedDrag);
          _on(ownerDocument, 'touchmove', _this._disableDelayedDrag);
          _on(ownerDocument, 'pointermove', _this._disableDelayedDrag);

          _this._dragStartTimer = setTimeout(dragStartFn, options.delay);
        } else {
          dragStartFn();
        }


      }
    },

    _disableDelayedDrag: function () {
      var ownerDocument = this.el.ownerDocument;

      clearTimeout(this._dragStartTimer);
      _off(ownerDocument, 'mouseup', this._disableDelayedDrag);
      _off(ownerDocument, 'touchend', this._disableDelayedDrag);
      _off(ownerDocument, 'touchcancel', this._disableDelayedDrag);
      _off(ownerDocument, 'mousemove', this._disableDelayedDrag);
      _off(ownerDocument, 'touchmove', this._disableDelayedDrag);
      _off(ownerDocument, 'pointermove', this._disableDelayedDrag);
    },

    _triggerDragStart: function (/** Event */evt, /** Touch */touch) {
      touch = touch || (evt.pointerType == 'touch' ? evt : null);

      if (touch) {
        // Touch device support
        tapEvt = {
          target: dragEl,
          clientX: touch.clientX,
          clientY: touch.clientY
        };

        this._onDragStart(tapEvt, 'touch');
      }
      else if (!this.nativeDraggable) {
        this._onDragStart(tapEvt, true);
      }
      else {
        _on(dragEl, 'dragend', this);
        _on(rootEl, 'dragstart', this._onDragStart);
      }

      try {
        if (document.selection) {
          // Timeout neccessary for IE9
          setTimeout(function () {
            document.selection.empty();
          });
        } else {
          window.getSelection().removeAllRanges();
        }
      } catch (err) {
      }
    },

    _dragStarted: function () {
      if (rootEl && dragEl) {
        var options = this.options;

        // Apply effect
        _toggleClass(dragEl, options.ghostClass, true);
        _toggleClass(dragEl, options.dragClass, false);

        Sortable.active = this;

        // Drag start event
        _dispatchEvent(this, rootEl, 'start', dragEl, rootEl, oldIndex);
      } else {
        this._nulling();
      }
    },

    _emulateDragOver: function () {
      if (touchEvt) {
        if (this._lastX === touchEvt.clientX && this._lastY === touchEvt.clientY) {
          return;
        }

        this._lastX = touchEvt.clientX;
        this._lastY = touchEvt.clientY;

        if (!supportCssPointerEvents) {
          _css(ghostEl, 'display', 'none');
        }

        var target = document.elementFromPoint(touchEvt.clientX, touchEvt.clientY),
          parent = target,
          i = touchDragOverListeners.length;

        if (parent) {
          do {
            if (parent[expando]) {
              while (i--) {
                touchDragOverListeners[i]({
                  clientX: touchEvt.clientX,
                  clientY: touchEvt.clientY,
                  target: target,
                  rootEl: parent
                });
              }

              break;
            }

            target = parent; // store last element
          }
          /* jshint boss:true */
          while (parent = parent.parentNode);
        }

        if (!supportCssPointerEvents) {
          _css(ghostEl, 'display', '');
        }
      }
    },


    _onTouchMove: function (/**TouchEvent*/evt) {
      if (tapEvt) {
        var options = this.options,
          fallbackTolerance = options.fallbackTolerance,
          fallbackOffset = options.fallbackOffset,
          touch = evt.touches ? evt.touches[0] : evt,
          dx = (touch.clientX - tapEvt.clientX) + fallbackOffset.x,
          dy = (touch.clientY - tapEvt.clientY) + fallbackOffset.y,
          translate3d = evt.touches ? 'translate3d(' + dx + 'px,' + dy + 'px,0)' : 'translate(' + dx + 'px,' + dy + 'px)';

        // only set the status to dragging, when we are actually dragging
        if (!Sortable.active) {
          if (fallbackTolerance &&
            min(abs(touch.clientX - this._lastX), abs(touch.clientY - this._lastY)) < fallbackTolerance
          ) {
            return;
          }

          this._dragStarted();
        }

        // as well as creating the ghost element on the document body
        this._appendGhost();

        moved = true;
        touchEvt = touch;

        _css(ghostEl, 'webkitTransform', translate3d);
        _css(ghostEl, 'mozTransform', translate3d);
        _css(ghostEl, 'msTransform', translate3d);
        _css(ghostEl, 'transform', translate3d);

        evt.preventDefault();
      }
    },

    _appendGhost: function () {
      if (!ghostEl) {
        var rect = dragEl.getBoundingClientRect(),
          css = _css(dragEl),
          options = this.options,
          ghostRect;

        ghostEl = dragEl.cloneNode(true);

        _toggleClass(ghostEl, options.ghostClass, false);
        _toggleClass(ghostEl, options.fallbackClass, true);
        _toggleClass(ghostEl, options.dragClass, true);

        _css(ghostEl, 'top', rect.top - parseInt(css.marginTop, 10));
        _css(ghostEl, 'left', rect.left - parseInt(css.marginLeft, 10));
        _css(ghostEl, 'width', rect.width);
        _css(ghostEl, 'height', rect.height);
        _css(ghostEl, 'opacity', '0.8');
        _css(ghostEl, 'position', 'fixed');
        _css(ghostEl, 'zIndex', '100000');
        _css(ghostEl, 'pointerEvents', 'none');

        options.fallbackOnBody && document.body.appendChild(ghostEl) || rootEl.appendChild(ghostEl);

        // Fixing dimensions.
        ghostRect = ghostEl.getBoundingClientRect();
        _css(ghostEl, 'width', rect.width * 2 - ghostRect.width);
        _css(ghostEl, 'height', rect.height * 2 - ghostRect.height);
      }
    },

    _onDragStart: function (/**Event*/evt, /**boolean*/useFallback) {
      var dataTransfer = evt.dataTransfer,
        options = this.options;

      this._offUpEvents();

      if (activeGroup.checkPull(this, this, dragEl, evt)) {
        cloneEl = _clone(dragEl);

        cloneEl.draggable = false;
        cloneEl.style['will-change'] = '';

        _css(cloneEl, 'display', 'none');
        _toggleClass(cloneEl, this.options.chosenClass, false);

        rootEl.insertBefore(cloneEl, dragEl);
        _dispatchEvent(this, rootEl, 'clone', dragEl);
      }

      _toggleClass(dragEl, options.dragClass, true);

      if (useFallback) {
        if (useFallback === 'touch') {
          // Bind touch events
          _on(document, 'touchmove', this._onTouchMove);
          _on(document, 'touchend', this._onDrop);
          _on(document, 'touchcancel', this._onDrop);
          _on(document, 'pointermove', this._onTouchMove);
          _on(document, 'pointerup', this._onDrop);
        } else {
          // Old brwoser
          _on(document, 'mousemove', this._onTouchMove);
          _on(document, 'mouseup', this._onDrop);
        }

        this._loopId = setInterval(this._emulateDragOver, 50);
      }
      else {
        if (dataTransfer) {
          dataTransfer.effectAllowed = 'move';
          options.setData && options.setData.call(this, dataTransfer, dragEl);
        }

        _on(document, 'drop', this);
        setTimeout(this._dragStarted, 0);
      }
    },

    _onDragOver: function (/**Event*/evt) {
      var el = this.el,
        target,
        dragRect,
        targetRect,
        revert,
        options = this.options,
        group = options.group,
        activeSortable = Sortable.active,
        isOwner = (activeGroup === group),
        isMovingBetweenSortable = false,
        canSort = options.sort;

      if (evt.preventDefault !== void 0) {
        evt.preventDefault();
        !options.dragoverBubble && evt.stopPropagation();
      }

      if (dragEl.animated) {
        return;
      }

      moved = true;

      if (activeSortable && !options.disabled &&
        (isOwner
          ? canSort || (revert = !rootEl.contains(dragEl)) // Reverting item into the original list
          : (
            putSortable === this ||
            (
              (activeSortable.lastPullMode = activeGroup.checkPull(this, activeSortable, dragEl, evt)) &&
              group.checkPut(this, activeSortable, dragEl, evt)
            )
          )
        ) &&
        (evt.rootEl === void 0 || evt.rootEl === this.el) // touch fallback
      ) {
        // Smart auto-scrolling
        _autoScroll(evt, options, this.el);

        if (_silent) {
          return;
        }

        target = _closest(evt.target, options.draggable, el);
        dragRect = dragEl.getBoundingClientRect();

        if (putSortable !== this) {
          putSortable = this;
          isMovingBetweenSortable = true;
        }

        if (revert) {
          _cloneHide(activeSortable, true);
          parentEl = rootEl; // actualization

          if (cloneEl || nextEl) {
            rootEl.insertBefore(dragEl, cloneEl || nextEl);
          }
          else if (!canSort) {
            rootEl.appendChild(dragEl);
          }

          return;
        }


        if ((el.children.length === 0) || (el.children[0] === ghostEl) ||
          (el === evt.target) && (_ghostIsLast(el, evt))
        ) {
          //assign target only if condition is true
          if (el.children.length !== 0 && el.children[0] !== ghostEl && el === evt.target) {
            target = el.lastElementChild;
          }

          if (target) {
            if (target.animated) {
              return;
            }

            targetRect = target.getBoundingClientRect();
          }

          _cloneHide(activeSortable, isOwner);

          if (_onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt) !== false) {
            if (!dragEl.contains(el)) {
              el.appendChild(dragEl);
              parentEl = el; // actualization
            }

            this._animate(dragRect, dragEl);
            target && this._animate(targetRect, target);
          }
        }
        else if (target && !target.animated && target !== dragEl && (target.parentNode[expando] !== void 0)) {
          if (lastEl !== target) {
            lastEl = target;
            lastCSS = _css(target);
            lastParentCSS = _css(target.parentNode);
          }

          targetRect = target.getBoundingClientRect();

          var width = targetRect.right - targetRect.left,
            height = targetRect.bottom - targetRect.top,
            floating = R_FLOAT.test(lastCSS.cssFloat + lastCSS.display)
              || (lastParentCSS.display == 'flex' && lastParentCSS['flex-direction'].indexOf('row') === 0),
            isWide = (target.offsetWidth > dragEl.offsetWidth),
            isLong = (target.offsetHeight > dragEl.offsetHeight),
            halfway = (floating ? (evt.clientX - targetRect.left) / width : (evt.clientY - targetRect.top) / height) > 0.5,
            nextSibling = target.nextElementSibling,
            after = false
          ;

          if (floating) {
            var elTop = dragEl.offsetTop,
              tgTop = target.offsetTop;

            if (elTop === tgTop) {
              after = (target.previousElementSibling === dragEl) && !isWide || halfway && isWide;
            }
            else if (target.previousElementSibling === dragEl || dragEl.previousElementSibling === target) {
              after = (evt.clientY - targetRect.top) / height > 0.5;
            } else {
              after = tgTop > elTop;
            }
            } else if (!isMovingBetweenSortable) {
            after = (nextSibling !== dragEl) && !isLong || halfway && isLong;
          }

          var moveVector = _onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, after);

          if (moveVector !== false) {
            if (moveVector === 1 || moveVector === -1) {
              after = (moveVector === 1);
            }

            _silent = true;
            setTimeout(_unsilent, 30);

            _cloneHide(activeSortable, isOwner);

            if (!dragEl.contains(el)) {
              if (after && !nextSibling) {
                el.appendChild(dragEl);
              } else {
                target.parentNode.insertBefore(dragEl, after ? nextSibling : target);
              }
            }

            parentEl = dragEl.parentNode; // actualization

            this._animate(dragRect, dragEl);
            this._animate(targetRect, target);
          }
        }
      }
    },

    _animate: function (prevRect, target) {
      var ms = this.options.animation;
      var easing = this.options.easing;

      if (ms) {
        var currentRect = target.getBoundingClientRect();

        if (prevRect.nodeType === 1) {
          prevRect = prevRect.getBoundingClientRect();
        }

        _css(target, 'transition', 'none');
        _css(target, 'transform', 'translate3d('
          + (prevRect.left - currentRect.left) + 'px,'
          + (prevRect.top - currentRect.top) + 'px,0)'
        );

        target.offsetWidth; // repaint

        if ( easing ) {
          _css(target, 'transition', 'all ' + ms + 'ms ' + easing);
        }
        else {
          _css(target, 'transition', 'all ' + ms + 'ms');
        }
        _css(target, 'transform', 'translate3d(0,0,0)');

        clearTimeout(target.animated);
        target.animated = setTimeout(function () {
          _css(target, 'transition', '');
          _css(target, 'transform', '');
          target.animated = false;
        }, ms);
      }
    },

    _offUpEvents: function () {
      var ownerDocument = this.el.ownerDocument;

      _off(document, 'touchmove', this._onTouchMove);
      _off(document, 'pointermove', this._onTouchMove);
      _off(ownerDocument, 'mouseup', this._onDrop);
      _off(ownerDocument, 'touchend', this._onDrop);
      _off(ownerDocument, 'pointerup', this._onDrop);
      _off(ownerDocument, 'touchcancel', this._onDrop);
      _off(ownerDocument, 'pointercancel', this._onDrop);
      _off(ownerDocument, 'selectstart', this);
    },

    _onDrop: function (/**Event*/evt) {
      var el = this.el,
        options = this.options;

      clearInterval(this._loopId);
      clearInterval(autoScroll.pid);
      clearTimeout(this._dragStartTimer);

      // Unbind events
      _off(document, 'mousemove', this._onTouchMove);

      if (this.nativeDraggable) {
        _off(document, 'drop', this);
        _off(el, 'dragstart', this._onDragStart);
      }

      this._offUpEvents();

      if (evt) {
        if (moved) {
          evt.preventDefault();
          !options.dropBubble && evt.stopPropagation();
        }

        ghostEl && ghostEl.parentNode && ghostEl.parentNode.removeChild(ghostEl);

        if (rootEl === parentEl || Sortable.active.lastPullMode !== 'clone') {
          // Remove clone
          cloneEl && cloneEl.parentNode && cloneEl.parentNode.removeChild(cloneEl);
        }

        if (dragEl) {
          if (this.nativeDraggable) {
            _off(dragEl, 'dragend', this);
          }

          _disableDraggable(dragEl);
          dragEl.style['will-change'] = '';

          // Remove class's
          _toggleClass(dragEl, this.options.ghostClass, false);
          _toggleClass(dragEl, this.options.chosenClass, false);

          // Drag stop event
          _dispatchEvent(this, rootEl, 'unchoose', dragEl, rootEl, oldIndex);

          if (rootEl !== parentEl) {
            newIndex = _index(dragEl, options.draggable);

            if (newIndex >= 0) {
              // Add event
              _dispatchEvent(null, parentEl, 'add', dragEl, rootEl, oldIndex, newIndex);

              // Remove event
              _dispatchEvent(this, rootEl, 'remove', dragEl, rootEl, oldIndex, newIndex);

              // drag from one list and drop into another
              _dispatchEvent(null, parentEl, 'sort', dragEl, rootEl, oldIndex, newIndex);
              _dispatchEvent(this, rootEl, 'sort', dragEl, rootEl, oldIndex, newIndex);
            }
          }
          else {
            if (dragEl.nextSibling !== nextEl) {
              // Get the index of the dragged element within its parent
              newIndex = _index(dragEl, options.draggable);

              if (newIndex >= 0) {
                // drag & drop within the same list
                _dispatchEvent(this, rootEl, 'update', dragEl, rootEl, oldIndex, newIndex);
                _dispatchEvent(this, rootEl, 'sort', dragEl, rootEl, oldIndex, newIndex);
              }
            }
          }

          if (Sortable.active) {
            /* jshint eqnull:true */
            if (newIndex == null || newIndex === -1) {
              newIndex = oldIndex;
            }

            _dispatchEvent(this, rootEl, 'end', dragEl, rootEl, oldIndex, newIndex);

            // Save sorting
            this.save();
          }
        }

      }

      this._nulling();
    },

    _nulling: function() {
      rootEl =
      dragEl =
      parentEl =
      ghostEl =
      nextEl =
      cloneEl =
      lastDownEl =

      scrollEl =
      scrollParentEl =

      tapEvt =
      touchEvt =

      moved =
      newIndex =

      lastEl =
      lastCSS =

      putSortable =
      activeGroup =
      Sortable.active = null;

      savedInputChecked.forEach(function (el) {
        el.checked = true;
      });
      savedInputChecked.length = 0;
    },

    handleEvent: function (/**Event*/evt) {
      switch (evt.type) {
        case 'drop':
        case 'dragend':
          this._onDrop(evt);
          break;

        case 'dragover':
        case 'dragenter':
          if (dragEl) {
            this._onDragOver(evt);
            _globalDragOver(evt);
          }
          break;

        case 'selectstart':
          evt.preventDefault();
          break;
      }
    },


    /**
     * Serializes the item into an array of string.
     * @returns {String[]}
     */
    toArray: function () {
      var order = [],
        el,
        children = this.el.children,
        i = 0,
        n = children.length,
        options = this.options;

      for (; i < n; i++) {
        el = children[i];
        if (_closest(el, options.draggable, this.el)) {
          order.push(el.getAttribute(options.dataIdAttr) || _generateId(el));
        }
      }

      return order;
    },


    /**
     * Sorts the elements according to the array.
     * @param  {String[]}  order  order of the items
     */
    sort: function (order) {
      var items = {}, rootEl = this.el;

      this.toArray().forEach(function (id, i) {
        var el = rootEl.children[i];

        if (_closest(el, this.options.draggable, rootEl)) {
          items[id] = el;
        }
      }, this);

      order.forEach(function (id) {
        if (items[id]) {
          rootEl.removeChild(items[id]);
          rootEl.appendChild(items[id]);
        }
      });
    },


    /**
     * Save the current sorting
     */
    save: function () {
      var store = this.options.store;
      store && store.set(this);
    },


    /**
     * For each element in the set, get the first element that matches the selector by testing the element itself and traversing up through its ancestors in the DOM tree.
     * @param   {HTMLElement}  el
     * @param   {String}       [selector]  default: `options.draggable`
     * @returns {HTMLElement|null}
     */
    closest: function (el, selector) {
      return _closest(el, selector || this.options.draggable, this.el);
    },


    /**
     * Set/get option
     * @param   {string} name
     * @param   {*}      [value]
     * @returns {*}
     */
    option: function (name, value) {
      var options = this.options;

      if (value === void 0) {
        return options[name];
      } else {
        options[name] = value;

        if (name === 'group') {
          _prepareGroup(options);
        }
      }
    },


    /**
     * Destroy
     */
    destroy: function () {
      var el = this.el;

      el[expando] = null;

      _off(el, 'mousedown', this._onTapStart);
      _off(el, 'touchstart', this._onTapStart);
      _off(el, 'pointerdown', this._onTapStart);

      if (this.nativeDraggable) {
        _off(el, 'dragover', this);
        _off(el, 'dragenter', this);
      }

      // Remove draggable attributes
      Array.prototype.forEach.call(el.querySelectorAll('[draggable]'), function (el) {
        el.removeAttribute('draggable');
      });

      touchDragOverListeners.splice(touchDragOverListeners.indexOf(this._onDragOver), 1);

      this._onDrop();

      this.el = el = null;
    }
  };


  function _cloneHide(sortable, state) {
    if (sortable.lastPullMode !== 'clone') {
      state = true;
    }

    if (cloneEl && (cloneEl.state !== state)) {
      _css(cloneEl, 'display', state ? 'none' : '');

      if (!state) {
        if (cloneEl.state) {
          if (sortable.options.group.revertClone) {
            rootEl.insertBefore(cloneEl, nextEl);
            sortable._animate(dragEl, cloneEl);
          } else {
            rootEl.insertBefore(cloneEl, dragEl);
          }
        }
      }

      cloneEl.state = state;
    }
  }


  function _closest(/**HTMLElement*/el, /**String*/selector, /**HTMLElement*/ctx) {
    if (el) {
      ctx = ctx || document;

      do {
        if ((selector === '>*' && el.parentNode === ctx) || _matches(el, selector)) {
          return el;
        }
        /* jshint boss:true */
      } while (el = _getParentOrHost(el));
    }

    return null;
  }


  function _getParentOrHost(el) {
    var parent = el.host;

    return (parent && parent.nodeType) ? parent : el.parentNode;
  }


  function _globalDragOver(/**Event*/evt) {
    if (evt.dataTransfer) {
      evt.dataTransfer.dropEffect = 'move';
    }
    evt.preventDefault();
  }


  function _on(el, event, fn) {
    el.addEventListener(event, fn, captureMode);
  }


  function _off(el, event, fn) {
    el.removeEventListener(event, fn, captureMode);
  }


  function _toggleClass(el, name, state) {
    if (el) {
      if (el.classList) {
        el.classList[state ? 'add' : 'remove'](name);
      }
      else {
        var className = (' ' + el.className + ' ').replace(R_SPACE, ' ').replace(' ' + name + ' ', ' ');
        el.className = (className + (state ? ' ' + name : '')).replace(R_SPACE, ' ');
      }
    }
  }


  function _css(el, prop, val) {
    var style = el && el.style;

    if (style) {
      if (val === void 0) {
        if (document.defaultView && document.defaultView.getComputedStyle) {
          val = document.defaultView.getComputedStyle(el, '');
        }
        else if (el.currentStyle) {
          val = el.currentStyle;
        }

        return prop === void 0 ? val : val[prop];
      }
      else {
        if (!(prop in style)) {
          prop = '-webkit-' + prop;
        }

        style[prop] = val + (typeof val === 'string' ? '' : 'px');
      }
    }
  }


  function _find(ctx, tagName, iterator) {
    if (ctx) {
      var list = ctx.getElementsByTagName(tagName), i = 0, n = list.length;

      if (iterator) {
        for (; i < n; i++) {
          iterator(list[i], i);
        }
      }

      return list;
    }

    return [];
  }



  function _dispatchEvent(sortable, rootEl, name, targetEl, fromEl, startIndex, newIndex) {
    sortable = (sortable || rootEl[expando]);

    var evt = document.createEvent('Event'),
      options = sortable.options,
      onName = 'on' + name.charAt(0).toUpperCase() + name.substr(1);

    evt.initEvent(name, true, true);

    evt.to = rootEl;
    evt.from = fromEl || rootEl;
    evt.item = targetEl || rootEl;
    evt.clone = cloneEl;

    evt.oldIndex = startIndex;
    evt.newIndex = newIndex;

    rootEl.dispatchEvent(evt);

    if (options[onName]) {
      options[onName].call(sortable, evt);
    }
  }


  function _onMove(fromEl, toEl, dragEl, dragRect, targetEl, targetRect, originalEvt, willInsertAfter) {
    var evt,
      sortable = fromEl[expando],
      onMoveFn = sortable.options.onMove,
      retVal;

    evt = document.createEvent('Event');
    evt.initEvent('move', true, true);

    evt.to = toEl;
    evt.from = fromEl;
    evt.dragged = dragEl;
    evt.draggedRect = dragRect;
    evt.related = targetEl || toEl;
    evt.relatedRect = targetRect || toEl.getBoundingClientRect();
    evt.willInsertAfter = willInsertAfter;

    fromEl.dispatchEvent(evt);

    if (onMoveFn) {
      retVal = onMoveFn.call(sortable, evt, originalEvt);
    }

    return retVal;
  }


  function _disableDraggable(el) {
    el.draggable = false;
  }


  function _unsilent() {
    _silent = false;
  }


  /** @returns {HTMLElement|false} */
  function _ghostIsLast(el, evt) {
    var lastEl = el.lastElementChild,
      rect = lastEl.getBoundingClientRect();

    // 5 — min delta
    // abs — нельзя добавлять, а то глюки при наведении сверху
    return (evt.clientY - (rect.top + rect.height) > 5) ||
      (evt.clientX - (rect.left + rect.width) > 5);
  }


  /**
   * Generate id
   * @param   {HTMLElement} el
   * @returns {String}
   * @private
   */
  function _generateId(el) {
    var str = el.tagName + el.className + el.src + el.href + el.textContent,
      i = str.length,
      sum = 0;

    while (i--) {
      sum += str.charCodeAt(i);
    }

    return sum.toString(36);
  }

  /**
   * Returns the index of an element within its parent for a selected set of
   * elements
   * @param  {HTMLElement} el
   * @param  {selector} selector
   * @return {number}
   */
  function _index(el, selector) {
    var index = 0;

    if (!el || !el.parentNode) {
      return -1;
    }

    while (el && (el = el.previousElementSibling)) {
      if ((el.nodeName.toUpperCase() !== 'TEMPLATE') && (selector === '>*' || _matches(el, selector))) {
        index++;
      }
    }

    return index;
  }

  function _matches(/**HTMLElement*/el, /**String*/selector) {
    if (el) {
      selector = selector.split('.');

      var tag = selector.shift().toUpperCase(),
        re = new RegExp('\\s(' + selector.join('|') + ')(?=\\s)', 'g');

      return (
        (tag === '' || el.nodeName.toUpperCase() == tag) &&
        (!selector.length || ((' ' + el.className + ' ').match(re) || []).length == selector.length)
      );
    }

    return false;
  }

  function _throttle(callback, ms) {
    var args, _this;

    return function () {
      if (args === void 0) {
        args = arguments;
        _this = this;

        setTimeout(function () {
          if (args.length === 1) {
            callback.call(_this, args[0]);
          } else {
            callback.apply(_this, args);
          }

          args = void 0;
        }, ms);
      }
    };
  }

  function _extend(dst, src) {
    if (dst && src) {
      for (var key in src) {
        if (src.hasOwnProperty(key)) {
          dst[key] = src[key];
        }
      }
    }

    return dst;
  }

  function _clone(el) {
    return $
      ? $(el).clone(true)[0]
      : (Polymer && Polymer.dom
        ? Polymer.dom(el).cloneNode(true)
        : el.cloneNode(true)
      );
  }

  function _saveInputCheckedState(root) {
    var inputs = root.getElementsByTagName('input');
    var idx = inputs.length;

    while (idx--) {
      var el = inputs[idx];
      el.checked && savedInputChecked.push(el);
    }
  }

  // Fixed #973:
  _on(document, 'touchmove', function (evt) {
    if (Sortable.active) {
      evt.preventDefault();
    }
  });

  try {
    window.addEventListener('test', null, Object.defineProperty({}, 'passive', {
      get: function () {
        captureMode = {
          capture: false,
          passive: false
        };
      }
    }));
  } catch (err) {}

  // Export utils
  Sortable.utils = {
    on: _on,
    off: _off,
    css: _css,
    find: _find,
    is: function (el, selector) {
      return !!_closest(el, selector, el);
    },
    extend: _extend,
    throttle: _throttle,
    closest: _closest,
    toggleClass: _toggleClass,
    clone: _clone,
    index: _index
  };


  /**
   * Create sortable instance
   * @param {HTMLElement}  el
   * @param {Object}      [options]
   */
  Sortable.create = function (el, options) {
    return new Sortable(el, options);
  };


  // Export
  Sortable.version = '1.6.0';
  return Sortable;
});

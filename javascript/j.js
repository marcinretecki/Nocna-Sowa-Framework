//
//  JavaScript
//


//  @codekit-append '_j-debug.js';
//  @codekit-append '_j-libs.js';
//  @codekit-append '_j-helpers.js';









//
//  Send Events to Analytics
//  @target should be checked by interceptClicks()
//  if @target doesn't exist, function should never be called
//
function sendGaEvent(target) {

  var targetSplit = [];
  var currentUrlSplit = window.location.href.split('#');
  var category = '';
  var action = '';
  var label = '';

  //  No target, so ignore
  if ( ( typeof target === 'undefined' ) || ( target == null ) ) {
    return;
  }


  //  if it is an anchor, check hrefs
  if ( ( target.tagName.toLowerCase() === 'a' ) && ( target.href !== undefined ) ) {
    //  if it has hrefs, make a split
    targetSplit = target.href.split('#');
  }


  //
  //  Label
  //
  if ( ( target.getAttribute('data-ga-label') !== null ) && ( target.getAttribute('data-ga-label') !== '' ) ) {
    label = target.getAttribute('data-ga-label');
  }
  else {
    label = 'Page: ' + document.title.split(' | Nocna Sowa')[0];
  }


  //
  //  Action
  //

  //  If action is in data
  if ( ( target.getAttribute('data-ga-action') !== null ) && ( target.getAttribute('data-ga-action') !== '' ) ) {
    action = target.getAttribute('data-ga-action');
  }
  //  if href is an inbound link
  else if ( ( targetSplit.length > 0 ) && target.href.indexOf('nocnasowa.pl') != '-1' ) {
    action = target.href.split('nocnasowa.pl')[1];
  }
  //  if it is other link
  else if ( targetSplit.length > 0 )  {
    //  nie ma opisu, ale może ma href
    action = target.href;
  }
  //  not a link so prob. button
  else {
    action = 'Button';
  }


  //
  //  Category
  //
  if ( ( target.getAttribute('data-ga-category') !== null ) && ( target.getAttribute('data-ga-category') !== '' ) ) {
    // Link has a special category
    category = target.getAttribute('data-ga-category');
  }
  else if ( hasClass(target, 'check') ) {
    // This is an anchor
    category = 'Ćwiczenie';
  }
  else if ( ( targetSplit.length > 1 ) && ( currentUrlSplit[0] === targetSplit[0] ) ) {
    // This is an anchor
    category = 'Anchors';
  }
  else if ( ( typeof targetSplit[0] !== 'undefined' ) && ( targetSplit[0].indexOf('nocnasowa.pl/') != '-1' ) && ( targetSplit[0].indexOf('?replytocom=') != '-1' ) ) {
    // This is a comment reply
    category = 'Comment';
    action = 'Odpowiedz';
  }
  else if ( ( typeof targetSplit[0] !== 'undefined' ) &&  ( targetSplit[0].indexOf('facebook.com/sharer/') != '-1' ) ) {
    // This is a share
    category = 'Share';
  }
  else if ( ( typeof targetSplit[0] !== 'undefined' ) && ( targetSplit[0].indexOf('nocnasowa.pl/') != '-1' ) ) {
    // This is internal link
    category = 'Internal Link';
  }
  else if ( ( typeof targetSplit[0] !== 'undefined' ) && ( targetSplit[0].indexOf('nocnasowa.pl/') == '-1' ) ) {
    // This should be an outgoing link
    category = 'Outgoing';
  }
  else {
    category = 'Other';
  }


  if ( target.id === 'js-submenu-toggle' ) {
    category = 'Blog Submenu';
    action = 'Toggle Blog Submenu';
  }


  showDebugMsg('Category: ' + category);
  showDebugMsg('Action: ' + action);
  showDebugMsg('Label: ' + label);


  try { ga('send', 'event', category, action, label); }
  catch(err) {};
}


//
//  Smooth Scroll
//  Used in link handler to scroll anchors
//  can be used alone or automatically in all anchors
//
function smoothScrollTo(target, event) {
  if ( (target === null) || ( target === '!' ) ) {
    // no target, so ignore
    return;
  }

  var el = document.getElementById(target);

  if ( event ) {
    //  Prevent jerk
    event.preventDefault();
    event.stopPropagation();
  }

  // if it is not ex
  if ( target.indexOf('ex') === -1 ) {
    //  Update url
    history.pushState(null, '', '#' + target);
  }


  Velocity( el, 'scroll', { duration: 600, easing: 'easeInOutQuart', queue: false, offset: -40 } );


  showDebugMsg('Scroll target: ' + target);

};


//
//  Toggle ex class name to check
//  used only when history api is used
//  because it does not trigger hash change
//
function toggleEx(target) {

  var el;
  //  split to check if it is check or close
  var targetSplit = target.split('ex');

  //  if close
  if ( targetSplit[0] === '!' ) {
    //  remove ! from target to get element
    el = document.getElementById(target.split('!')[1]);
    try { el.classList.remove('ex--checked'); }
    catch(err) {};
  }
  //  if check
  else {
    el = document.getElementById(target);
    try { el.classList.add('ex--checked'); }
    catch(err) {};
  }


  showDebugMsg('toggleEx: ' + target);


}


//
//  Toggle Submenu
//  Used in index for tags sorting
//
function toggleSubmenu() {
  var ul = document.getElementById('navbar-submenu__list');
  var btn = document.getElementById('js-submenu-toggle');
  var section = ul.parentNode;
  var ulHeight = ul.offsetHeight;
  var sectionHeight = section.offsetHeight;
  var heightRem = '2rem';
  var rem = 20;
  var sectionHeightRem = (sectionHeight / 20) + 'rem';
  var newHeighRem;
  var buttonOrient;

  //  if it is bigger
  if ( ulHeight > sectionHeight ) {
    newHeightRem = (ulHeight / 20) + 'rem';
    buttonOrient = 90;
  }
  //  if same size or smaller
  else {
    newHeightRem = heightRem;
    buttonOrient = 0;
  }

  //  toggle submenu
  Velocity(
    section,
    { height: [newHeightRem, sectionHeightRem] },
    { duration: 300, easing: 'easeInOutQuart' }
  );

  //  rotate btn
  Velocity(
    btn,
    { rotateZ: buttonOrient },
    { duration: 300, easing: 'easeInOutQuart' }
  );
}


//
//  Show Data from Blob Click
//  This function is called 2 times if dataBlob is open and user clicks on second blob
//  First to close and then to open new
//
function toggleBlobData(btnBlob) {

  var dataBlob = document.getElementById('js-blob-data');
  var dataBlobField = dataBlob.firstChild;

  showDebugMsg('btnBlob:');
  showDebugMsg(btnBlob);

  showDebugMsg('dataBlob.nsCurrentBlob:');
  showDebugMsg(dataBlob.nsCurrentBlob);


  //  check if there is a blob assigned
  //  and if btnBlob is undefined or null
  if ( ( ( typeof dataBlob.nsCurrentBlob !== 'undefined' ) && ( dataBlob.nsCurrentBlob !== null ) ) && ( ( typeof btnBlob === 'undefined' ) || ( btnBlob == null ) ) ) {

    closeBlob();

    //  function will be called again to open another blob if it was clicked
    return;
  }


  //  if there is no btnBlob, ignore
  if ( ( typeof btnBlob === 'undefined' ) || ( btnBlob == null ) ) {

    showDebugMsg('btnBlob is undefined');

    return;
  }


  //  it new blob is the same as previous one
  if ( dataBlob.nsCurrentBlob === btnBlob ) {

    showDebugMsg('remove currentBlob');

    //  remove currentBlob
    dataBlob.nsCurrentBlob = null;

    return;
  }

  //  Assign the new blob
  dataBlob.nsCurrentBlob = btnBlob;

  //  show the new blob
  showBlob();



  function showBlob() {

    showDebugMsg('Show blob');

    var bodyRect = document.body.getBoundingClientRect();
    var btnBlobRect = btnBlob.getBoundingClientRect();
    var offsetTop = Math.floor( btnBlobRect.top - bodyRect.top );
    var offsetLeft = Math.floor( btnBlobRect.left - bodyRect.left );

    var blobColor = getBlobColor( btnBlob );

    showDebugMsg(offsetTop);
    showDebugMsg(offsetLeft);

    document.body.classList.add( 'js-body--blob-open' );


    Velocity(
      dataBlob,
      { scale: 1, opacity: [1, 0], },
      { duration: 400, easing: 'easeInOutQuart', display: 'block',
        begin: function( elements ) {
          dataBlob.classList.add('blob-data-wrapper--open');
          dataBlob.classList.add('top-' + blobColor);
          dataBlob.innerHTML = dataBlob.getAttribute('data-ns-blob-' + blobColor);

          //  Prepare
          Velocity.hook( dataBlob, 'scale', '0' );
          Velocity.hook( dataBlob, 'top', offsetTop + 'px' );
          Velocity.hook( dataBlob, 'left', offsetLeft + 'px' );
        },
      }
    );

  }

  function closeBlob() {

    showDebugMsg('Close blob');

    document.body.classList.remove( 'js-body--blob-open' );

    Velocity(
      dataBlob,
      { scale: 0, opacity: 0, },
      { duration: 400, easing: 'easeInOutQuart', display: 'none',
        complete: function( elements ) {
          var dataBlob = elements[0];

          dataBlob.classList.remove('top-green');
          dataBlob.classList.remove('top-orange');
          dataBlob.classList.remove('top-red');
          dataBlob.classList.remove('top-dark');
        },
      }
    );

  }


}



//
//  Expand Blob
//
function expandBlob( target ) {

  var postWrapper = getClosest(target, '.post-index');
  var blobColor;
  var blobsArr;
  var btnBlob
  var blob;
  var blobRotate;

  //  if postWrapper has no post-index
  if ( postWrapper === null ) {
    return;
  }

  showDebugMsg( 'expandBlob' );
  showDebugMsg( postWrapper );

  //  get HTMLcollection of all btn-blob inside post-index
  //  should be only one
  blobsArr = postWrapper.getElementsByClassName( 'btn-blob' );
  blobExpand = document.getElementById( 'js-blob-expand' );

  //  if no blob or blobExpand was found
  if ( ( blobsArr.length === 0 ) || ( blobExpand == null ) ) {
    showDebugMsg( 'sth is wrong in the blob land' );
    return;
  }

  btnBlob = blobsArr[0];
  blob = btnBlob.firstChild;

  showDebugMsg( 'blobColor: ' + blobColor );

  showDebugMsg( 'hook rotate: ' + blob.style.transform );

  blobRotate =  0;

  Velocity(
    blob,
    { scale: [4, 1], rotateZ: '180deg', opacity: [0.5, 1] },
    { duration: 800, easing: [0.3, 0, 0.175, 1],
      begin: function( elements ) {
        //  Prepare
      },
    }
  );

}



//
//  Section Toggle
//
function sectionToggle(s, addClassName, overflow){
  var section = document.getElementById(s),
      sectionStyle = section.style,
      bodyStyle = document.body.style,
      timeout = 500,
      className,
      whileOpening,
      whileClosing;

  if (addClassName) {
    className = addClassName;
  } else {
    className = 'section-inside';
  }

  whileOpening = function() {
    // show the section
    sectionStyle.visibility = 'visible';

    // hide overflow in body
    window.setTimeout(function() {
      if (overflow !== false) {
        bodyStyle.overflow = 'hidden';
      }

      if (section.id === 'search') {
        document.getElementById('s').focus();
      }
    }, timeout);

  };

  whileClosing = function() {
    // show overflow
    // hide the section
    window.setTimeout(function() {
      bodyStyle.overflow = 'auto';
      sectionStyle.visibility = 'hidden';
    }, timeout);
  };

  if (section.classList) {
    if (section.classList.contains(className)) {
      section.classList.toggle(className);
      whileClosing();
    } else {
      whileOpening();
      window.setTimeout(function() {
        section.classList.toggle(className);
      }, 1);
    }
  } else {
    var classes = section.className.split(' ');
    var existingIndex = classes.indexOf(className);

    if (existingIndex >= 0) {
      // If has the class
      classes.splice(existingIndex, 1);
      whileClosing();
    } else {
      // If not
      whileOpening();
      classes.push(className);
    }
    section.className = classes.join(' ');
  }

  // change button
  if (section.id === 'search') {
    var headerSearchBtn = document.getElementById('header-search-btn');
    headerSearchBtn.classList.toggle('section-nav__search--x');
  }

}





//
// Open Nav when on small screen
//
function menuHandler(event) {
  var eventTarget = event.target;


  // jeśli to nie jest naszy przycisk, to koniec funkcji
  if ( !hasClass( eventTarget, 'js-open-nav' ) ) {
    return;
  }

  var openTarget = eventTarget.getAttribute('data-open-target'),
      nav = document.getElementById(openTarget),
      state = eventTarget.getAttribute('data-open-state');


  if ( !state ) {
    eventTarget.setAttribute('data-open-state', 'closed');
    state = 'closed';
  }


  function closeMenu() {
    // usuń event, który zamyka menu
    document.removeEventListener("click", closeMenu, false);

    eventTarget.setAttribute('data-open-state', 'closed');

    // Animate
    Velocity( nav, "reverse", { display: "none" } );
  }

  function openMenu() {
    // Dodaj event, który zamyka menu
    document.addEventListener("click", closeMenu, false);

    eventTarget.setAttribute('data-open-state', 'open');

    // Animate
    Velocity(nav, { translateY: [0, "-150%"] }, { duration: 400, easing: 'ease', display: 'block' } );

  }

  // check if the menu is open
  if ( state === 'closed' ) {
    openMenu();
  }
}
document.addEventListener("click", menuHandler, false);








//
//  Detect if element is scrolled into view
//
function isScrolledIntoView(el) {
  var t = el.offsetTop;
  var l = el.offsetLeft;
  var w = el.offsetWidth;
  var h = el.offsetHeight;
  while( el.offsetParent ) {
    el = el.offsetParent;
    t += el.offsetTop;
    l += el.offsetLeft;
  }
  return (t < (window.pageYOffset + window.innerHeight) && l < (window.pageXOffset + window.innerWidth) && (t + h) > window.pageYOffset && (l + w) > window.pageXOffset);
}


//
//  Spinner on buttons
//
//  it should stop spinning after some fixed time and/or on back batton
//
function spinHandler(event) {

  function spin(target) {
    var spans = target.getElementsByClassName('raquo');

    if (spans[0]) {
      spans[0].innerHTML = '<div></div><div></div><div></div>';
      spans[0].className = 'ball-pulse-sync';
    }
  }

  var eventTarget = event.target,
      dataTarget = eventTarget.getAttribute('data-target');

  //showDebugMsg(event);

  if (dataTarget) {
    spin(eventTarget);
  }
  else if (eventTarget.className === 'raquo') {
    spin(eventTarget.parentNode);
  }
}

document.addEventListener("click", spinHandler, false);




//
//  Track clicks on links, buttons and body
//
function interceptClicks(event) {

  var target;
  var currentUrlSplit = [];
  var targetSplit = [];

  //
  //  How to ignore right button clicks?
  //

  //
  //  Clicks anywhere
  //

  //  if body has blob open class
  if ( hasClass( document.body, 'js-body--blob-open' ) ) {

    //  close blob
    toggleBlobData( null );
  }


  //
  //  Check links and buttons
  //

  //  Get the target
  target = getClosest(event.target, 'button');

  //  if target is not a button, try a
  if ( target === null ) {
    target = getClosest(event.target, 'a');
  }

  //  if it is still null, ignore
  if ( target === null ) {
    return;
  }

  //  if it is an anchor, but has no href, ignore
  if ( ( target.tagName.toLowerCase() === 'a' ) && ( (target.href === undefined) || (target.href === '') ) ) {
    return;
  }


  //
  //  Intercept the click
  //

  //  if target has hrefs, make a split
  if ( target.tagName.toLowerCase() === 'a' ) {
    targetSplit = target.href.split('#');
    showDebugMsg( targetSplit );
  }

  //  Get the current URL and split by hash
  currentUrlSplit = window.location.href.split('#');


  //  Scroll
  if ( ( targetSplit.length > 1 ) && ( currentUrlSplit[0] === targetSplit[0] ) ) {
    smoothScrollTo(targetSplit[1], event);
  }

  //  this is our page
  if ( ( targetSplit.length > 0 ) && ( targetSplit[0].indexOf('nocnasowa.pl/') != '-1' ) ) {
    expandBlob(target);
  }

  //  Trigger ex check
  if ( ( targetSplit.length > 1 ) && ( currentUrlSplit[0] === targetSplit[0] ) && ( targetSplit[1].indexOf('ex') !== -1 ) ) {
    toggleEx(targetSplit[1]);
  }

  //  Trigger Submenu Toggle
  if ( target.id === 'js-submenu-toggle' ) {
    toggleSubmenu();
  }

  //  Trigger Blob toggle
  if ( hasClass(target, 'btn-blob') ) {
    toggleBlobData(target);
  }


  //  Send Google Analytics Event
  sendGaEvent(target);


}
window.addEventListener('click', interceptClicks, false);
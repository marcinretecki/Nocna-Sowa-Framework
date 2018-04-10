//
//  JavaScript
//


//  @codekit-append '_j-libs.js';
//  @codekit-append '_j-helpers.js';


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

  //  if it is livecopy, debug
  if ( window.location.href.split('livecopy').length > 1 ) {
    window.console.log('Scroll target: ' + target);
  }
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

  //  if it is livecopy, debug
  if ( window.location.href.split('livecopy').length > 1 ) {
    window.console.log('toggleEx: ' + target);
  }

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
//  Track events on links and buttons
//
function trackLinksHandler(event) {

  var target = getClosest(event.target, 'button');
  var currentUrlSplit;
  var targetSplit = [];
  var category;
  var action;
  var label;

  //  if target is not a button, try a
  if ( target === null ) {
    target = getClosest(event.target, 'a');
  }

  //  if it is still null, ignore
  if ( target === null ) {
    return;
  }

  //  if it is an anchor, check hrefs
  if ( ( target.tagName.toLowerCase() === 'a' ) && ( (target.href === undefined) || (target.href === '') ) ) {
    // not a link, so ignore
    return;
  }
  else if ( target.tagName.toLowerCase() === 'a' ) {
    //  if it has hrefs, make a split
    targetSplit = target.href.split('#');
  }

  //  Get the current URL
  currentUrlSplit = window.location.href.split('#');


  //
  //  Label
  //
  if ( ( target.getAttribute('data-ga-label') !== null ) && ( target.getAttribute('data-ga-label') !== '' ) ) {
    action = target.getAttribute('data-ga-label');
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
  else if ( target.className.indexOf('check') != '-1' ) {
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


  //  Scroll
  if ( ( targetSplit.length > 1 ) && ( currentUrlSplit[0] === targetSplit[0] ) ) {
    smoothScrollTo(targetSplit[1], event);
  }

  //  Trigger ex check
  if ( ( targetSplit.length > 1 ) && ( currentUrlSplit[0] === targetSplit[0] ) && ( targetSplit[1].indexOf('ex') !== -1 ) ) {
    toggleEx(targetSplit[1]);
  }

  //  Trigger Submenu Toggle
  if ( target.id === 'js-submenu-toggle' ) {
    toggleSubmenu();

    category = 'Blog Submenu';
    action = 'Toggle Blog Submenu';
  }


  //  if it is livecopy, debug
  if ( window.location.href.split('livecopy').length > 1 ) {
    window.console.log('Category: ' + category);
    window.console.log('Action: ' + action);
    window.console.log('Label: ' + label);
  }

  try { ga('send', 'event', category, action, label); }
  catch(err) {};

}
window.addEventListener('click', trackLinksHandler, false);






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
// Spinner on buttons
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

  //console.log(event);

  if (dataTarget) {
    spin(eventTarget);
  }
  else if (eventTarget.className === 'raquo') {
    spin(eventTarget.parentNode);
  }
}

document.addEventListener("click", spinHandler, false);







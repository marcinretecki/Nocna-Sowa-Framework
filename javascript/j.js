//
// JavaScript
//


//
// Section Toggle
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
  if (eventTarget.id !== 'buttonOpenNav') {
    return;
  }

  function closeHandler(event) {
    console.log('closeHandler');
    closeMenu();
  }

  var nav = document.getElementById('nav-main'),
      isOpen = false,
      className = 'js-navbar--open';

  // check if the menu is open
  if ( nav.classList ) {
    if ( nav.classList.contains(className) ) { isOpen = true; }
    else { openMenu(); }
  }
  else {
    if ( new RegExp('(^| )' + className + '( |$)', 'gi').test(nav.className) ) { isOpen = true; }
    else { openMenu(); }
  }

  function closeMenu() {
    // usuń event, który zamyka menu
    document.removeEventListener("click", closeHandler, false);

    if ( nav.classList ) {
      nav.classList.remove(className);
    }
    else {
      nav.className = nav.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
    }
    // Animate
    Velocity(nav, "reverse", { display: "none" } );
  }

  function openMenu() {
    // Dodaj event, który zamyka menu
    document.addEventListener("click", closeHandler, false);

    if ( nav.classList ) {
      nav.classList.add(className);
    }
    else {
      nav.className += ' ' + className;
    }
    // Animate
    Velocity(nav, { translateY: [0, "-150%"] }, { duration: 400, easing: 'ease', display: 'block' } );

  }
}
document.addEventListener("click", menuHandler, false);




//
// Scroll
// to trzeba zawrzeć chyba w singleton
//
function animation(effectFrame, duration, from, to, easing, framespacing) {
  var start = Date.now(), change;

  if (animation.existing) { window.clearTimeout(animation.existing); }

  duration = duration || 500;
  if (typeof from === 'function') {
    easing = from;
    from = 0;
  }
  easing = easing || function (x, t, b, c, d) {
    if ( (t/=d/2) < 1 ) { return c/2*t*t + b };
    return -c/2 * ((--t)*(t-2) - 1) + b;
  };
  from = from || 0;
  to = to || 1;
  framespacing = framespacing || 1;
  change = to - from;

  (function interval() {
    var time = Date.now() - start;
    if (time < duration) {
      effectFrame(easing(100, time, from, change, duration));
      animation.existing = window.setTimeout(interval, framespacing);
    } else { effectFrame(to); }
  }());
}

window.smoothScrollTo = function (t, duration) {
  var el = document.getElementById(t);
  /*
  var target = elm.offsetTop;
  var node = elm;
  while (node.offsetParent && node.offsetParent !== document.body) {
    node = node.offsetParent;
    target += node.offsetTop;
    target += 0;
  }
  var start;
  if (self.pageYOffset) { start = self.pageYOffset; }
  if (document.documentElement && document.documentElement.scrollTop) { start = document.documentElement.scrollTop; }
  if (document.body.scrollTop) { start = document.body.scrollTop; }
  duration = duration || 600;
  animation(function (position) { window.scroll(0,position-40); }, duration, start, target);*/

  Velocity(el, "scroll", { duration: 600, offset: -10, easing: "easeInOutQuart", queue: false });
};


//
// Detect if element is scrolled into view
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
function spin(target) {
  var spans = target.getElementsByClassName('raquo');

  if (spans[0]) {
    spans[0].innerHTML = '<div></div><div></div><div></div>';
    spans[0].className = 'ball-pulse-sync';
  }
}
document.addEventListener("click", spinHandler, false);


/*
 countdown.js v2.3.4 http://countdownjs.org
 Copyright (c)2006-2012 Stephen M. McKamey.
 Licensed under The MIT License.
*/
var module,countdown=function(r){function v(a,b){var c=a.getTime();a.setUTCMonth(a.getUTCMonth()+b);return Math.round((a.getTime()-c)/864E5)}function t(a){var b=a.getTime(),c=new Date(b);c.setUTCMonth(a.getUTCMonth()+1);return Math.round((c.getTime()-b)/864E5)}function f(a,b){return a+" "+(1===a?p[b]:q[b])}function n(){}function l(a,b,c,g,x,d){0<=a[c]&&(b+=a[c],delete a[c]);b/=x;if(1>=b+1)return 0;if(0<=a[g]){a[g]=+(a[g]+b).toFixed(d);switch(g){case "seconds":if(60!==a.seconds||isNaN(a.minutes))break;
a.minutes++;a.seconds=0;case "minutes":if(60!==a.minutes||isNaN(a.hours))break;a.hours++;a.minutes=0;case "hours":if(24!==a.hours||isNaN(a.days))break;a.days++;a.hours=0;case "days":if(7!==a.days||isNaN(a.weeks))break;a.weeks++;a.days=0;case "weeks":if(a.weeks!==t(a.refMonth)/7||isNaN(a.months))break;a.months++;a.weeks=0;case "months":if(12!==a.months||isNaN(a.years))break;a.years++;a.months=0;case "years":if(10!==a.years||isNaN(a.decades))break;a.decades++;a.years=0;case "decades":if(10!==a.decades||
isNaN(a.centuries))break;a.centuries++;a.decades=0;case "centuries":if(10!==a.centuries||isNaN(a.millennia))break;a.millennia++;a.centuries=0}return 0}return b}function w(a,b,c,g,d,k){a.start=b;a.end=c;a.units=g;a.value=c.getTime()-b.getTime();if(0>a.value){var f=c;c=b;b=f}a.refMonth=new Date(b.getFullYear(),b.getMonth(),15);try{a.millennia=0;a.centuries=0;a.decades=0;a.years=c.getUTCFullYear()-b.getUTCFullYear();a.months=c.getUTCMonth()-b.getUTCMonth();a.weeks=0;a.days=c.getUTCDate()-b.getUTCDate();
a.hours=c.getUTCHours()-b.getUTCHours();a.minutes=c.getUTCMinutes()-b.getUTCMinutes();a.seconds=c.getUTCSeconds()-b.getUTCSeconds();a.milliseconds=c.getUTCMilliseconds()-b.getUTCMilliseconds();var h;0>a.milliseconds?(h=s(-a.milliseconds/1E3),a.seconds-=h,a.milliseconds+=1E3*h):1E3<=a.milliseconds&&(a.seconds+=m(a.milliseconds/1E3),a.milliseconds%=1E3);0>a.seconds?(h=s(-a.seconds/60),a.minutes-=h,a.seconds+=60*h):60<=a.seconds&&(a.minutes+=m(a.seconds/60),a.seconds%=60);0>a.minutes?(h=s(-a.minutes/
60),a.hours-=h,a.minutes+=60*h):60<=a.minutes&&(a.hours+=m(a.minutes/60),a.minutes%=60);0>a.hours?(h=s(-a.hours/24),a.days-=h,a.hours+=24*h):24<=a.hours&&(a.days+=m(a.hours/24),a.hours%=24);for(;0>a.days;)a.months--,a.days+=v(a.refMonth,1);7<=a.days&&(a.weeks+=m(a.days/7),a.days%=7);0>a.months?(h=s(-a.months/12),a.years-=h,a.months+=12*h):12<=a.months&&(a.years+=m(a.months/12),a.months%=12);10<=a.years&&(a.decades+=m(a.years/10),a.years%=10,10<=a.decades&&(a.centuries+=m(a.decades/10),a.decades%=
10,10<=a.centuries&&(a.millennia+=m(a.centuries/10),a.centuries%=10)));b=0;!(g&1024)||b>=d?(a.centuries+=10*a.millennia,delete a.millennia):a.millennia&&b++;!(g&512)||b>=d?(a.decades+=10*a.centuries,delete a.centuries):a.centuries&&b++;!(g&256)||b>=d?(a.years+=10*a.decades,delete a.decades):a.decades&&b++;!(g&128)||b>=d?(a.months+=12*a.years,delete a.years):a.years&&b++;!(g&64)||b>=d?(a.months&&(a.days+=v(a.refMonth,a.months)),delete a.months,7<=a.days&&(a.weeks+=m(a.days/7),a.days%=7)):a.months&&
b++;!(g&32)||b>=d?(a.days+=7*a.weeks,delete a.weeks):a.weeks&&b++;!(g&16)||b>=d?(a.hours+=24*a.days,delete a.days):a.days&&b++;!(g&8)||b>=d?(a.minutes+=60*a.hours,delete a.hours):a.hours&&b++;!(g&4)||b>=d?(a.seconds+=60*a.minutes,delete a.minutes):a.minutes&&b++;!(g&2)||b>=d?(a.milliseconds+=1E3*a.seconds,delete a.seconds):a.seconds&&b++;if(!(g&1)||b>=d){var e=l(a,0,"milliseconds","seconds",1E3,k);if(e&&(e=l(a,e,"seconds","minutes",60,k))&&(e=l(a,e,"minutes","hours",60,k))&&(e=l(a,e,"hours","days",
24,k))&&(e=l(a,e,"days","weeks",7,k))&&(e=l(a,e,"weeks","months",t(a.refMonth)/7,k))){g=e;var n,p=a.refMonth,q=p.getTime(),r=new Date(q);r.setUTCFullYear(p.getUTCFullYear()+1);n=Math.round((r.getTime()-q)/864E5);if(e=l(a,g,"months","years",n/t(a.refMonth),k))if(e=l(a,e,"years","decades",10,k))if(e=l(a,e,"decades","centuries",10,k))if(e=l(a,e,"centuries","millennia",10,k))throw Error("Fractional unit overflow");}}}finally{delete a.refMonth}return a}function d(a,b,c,d,f){var k;c=+c||222;d=0<d?d:NaN;
f=0<f?20>f?Math.round(f):20:0;"function"===typeof a?(k=a,a=null):a instanceof Date||(a=null!==a&&isFinite(a)?new Date(a):null);"function"===typeof b?(k=b,b=null):b instanceof Date||(b=null!==b&&isFinite(b)?new Date(b):null);if(!a&&!b)return new n;if(!k)return w(new n,a||new Date,b||new Date,c,d,f);var l=c&1?1E3/30:c&2?1E3:c&4?6E4:c&8?36E5:c&16?864E5:6048E5,h,e=function(){k(w(new n,a||new Date,b||new Date,c,d,f),h)};e();return h=setInterval(e,l)}var s=Math.ceil,m=Math.floor,p,q,u;n.prototype.toString=
function(){var a=u(this),b=a.length;if(!b)return"";1<b&&(a[b-1]="and "+a[b-1]);return a.join(", ")};n.prototype.toHTML=function(a){a=a||"span";var b=u(this),c=b.length;if(!c)return"";for(var d=0;d<c;d++)b[d]="\x3c"+a+"\x3e"+b[d]+"\x3c/"+a+"\x3e";--c&&(b[c]="and "+b[c]);return b.join(", ")};u=function(a){var b=[],c=a.millennia;c&&b.push(f(c,10));(c=a.centuries)&&b.push(f(c,9));(c=a.decades)&&b.push(f(c,8));(c=a.years)&&b.push(f(c,7));(c=a.months)&&b.push(f(c,6));(c=a.weeks)&&b.push(f(c,5));(c=a.days)&&
b.push(f(c,4));(c=a.hours)&&b.push(f(c,3));(c=a.minutes)&&b.push(f(c,2));(c=a.seconds)&&b.push(f(c,1));(c=a.milliseconds)&&b.push(f(c,0));return b};d.MILLISECONDS=1;d.SECONDS=2;d.MINUTES=4;d.HOURS=8;d.DAYS=16;d.WEEKS=32;d.MONTHS=64;d.YEARS=128;d.DECADES=256;d.CENTURIES=512;d.MILLENNIA=1024;d.DEFAULTS=222;d.ALL=2047;d.setLabels=function(a,b){a=a||[];a.split&&(a=a.split("|"));b=b||[];b.split&&(b=b.split("|"));for(var c=0;10>=c;c++)p[c]=a[c]||p[c],q[c]=b[c]||q[c]};(d.resetLabels=function(){p="millisecond second minute hour day week month year decade century millennium".split(" ");
q="milliseconds seconds minutes hours days weeks months years decades centuries millennia".split(" ")})();r&&r.exports?r.exports=d:"function"===typeof window.define&&window.define.amd&&window.define("countdown",[],function(){return d});return d}(module);



/*! gumshoe v3.1.2 | (c) 2016 Chris Ferdinandi | MIT License | http://github.com/cferdinandi/gumshoe */
!function(e,t){"function"==typeof define&&define.amd?define([],t(e)):"object"==typeof exports?module.exports=t(e):e.gumshoe=t(e)}("undefined"!=typeof global?global:this.window||this.global,function(e){"use strict";var t,n,o,r,a,c,i={},s="querySelector"in document&&"addEventListener"in e&&"classList"in document.createElement("_"),l=[],u={selector:"[data-gumshoe] a",selectorHeader:"[data-gumshoe-header]",offset:0,activeClass:"active",callback:function(){}},f=function(e,t,n){if("[object Object]"===Object.prototype.toString.call(e))for(var o in e)Object.prototype.hasOwnProperty.call(e,o)&&t.call(n,e[o],o,e);else for(var r=0,a=e.length;a>r;r++)t.call(n,e[r],r,e)},d=function(){var e={},t=!1,n=0,o=arguments.length;"[object Boolean]"===Object.prototype.toString.call(arguments[0])&&(t=arguments[0],n++);for(var r=function(n){for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(t&&"[object Object]"===Object.prototype.toString.call(n[o])?e[o]=d(!0,e[o],n[o]):e[o]=n[o])};o>n;n++){var a=arguments[n];r(a)}return e},v=function(e){return Math.max(e.scrollHeight,e.offsetHeight,e.clientHeight)},m=function(){return Math.max(document.body.scrollHeight,document.documentElement.scrollHeight,document.body.offsetHeight,document.documentElement.offsetHeight,document.body.clientHeight,document.documentElement.clientHeight)},g=function(e){var n=0;if(e.offsetParent){do n+=e.offsetTop,e=e.offsetParent;while(e)}else n=e.offsetTop;return n=n-a-t.offset,n>=0?n:0},h=function(e){var t=e.getBoundingClientRect();return t.top>=0&&t.left>=0&&t.bottom<=(window.innerHeight||document.documentElement.clientHeight)&&t.right<=(window.innerWidth||document.documentElement.clientWidth)},p=function(){l.sort(function(e,t){return e.distance>t.distance?-1:e.distance<t.distance?1:0})};i.setDistances=function(){o=m(),a=r?v(r)+g(r):0,f(l,function(e){e.distance=g(e.target)}),p()};var b=function(){var e=document.querySelectorAll(t.selector);f(e,function(e){if(e.hash){var t=document.querySelector(e.hash);t&&l.push({nav:e,target:t,parent:"li"===e.parentNode.tagName.toLowerCase()?e.parentNode:null,distance:0})}})},y=function(){c&&(c.nav.classList.remove(t.activeClass),c.parent&&c.parent.classList.remove(t.activeClass))},H=function(e){y(),e.nav.classList.add(t.activeClass),e.parent&&e.parent.classList.add(t.activeClass),t.callback(e),c={nav:e.nav,parent:e.parent}};i.getCurrentNav=function(){var n=e.pageYOffset;if(e.innerHeight+n>=o&&h(l[0].target))return H(l[0]),l[0];for(var r=0,a=l.length;a>r;r++){var c=l[r];if(c.distance<=n)return H(c),c}y(),t.callback()};var C=function(){f(l,function(e){e.nav.classList.contains(t.activeClass)&&(c={nav:e.nav,parent:e.parent})})};i.destroy=function(){t&&(e.removeEventListener("resize",L,!1),e.removeEventListener("scroll",L,!1),l=[],t=null,n=null,o=null,r=null,a=null,c=null)};var L=function(e){n||(n=setTimeout(function(){n=null,"scroll"===e.type&&i.getCurrentNav(),"resize"===e.type&&(i.setDistances(),i.getCurrentNav())},200))};return i.init=function(n){s&&(i.destroy(),t=d(u,n||{}),r=document.querySelector(t.selectorHeader),b(),0!==l.length&&(C(),i.setDistances(),i.getCurrentNav(),e.addEventListener("resize",L,!1),e.addEventListener("scroll",L,!1)))},i});
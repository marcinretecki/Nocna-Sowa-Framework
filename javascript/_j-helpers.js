//
//  JS Helper functions
//


function hasClass( el, className ) {
  if ( el.classList ) {
    if ( el.classList.contains(className) ) {
      return true;
    }
    else {
      return false;
    }
  }
  else {
    if ( new RegExp('(^| )' + className + '( |$)', 'gi').test(el.className) ) {
      return true;
    }
    else {
      return false;
    }
  }
}


//
//  Get closest parent
//
/**
 * Get the closest matching element up the DOM tree.
 * @param  {Element} elem     Starting element
 * @param  {String}  selector Selector to match against (class, ID, data attribute, or tag)
 * @return {Boolean|Element}  Returns null if not match found
 */
function getClosest( elem, selector ) {

    // Variables
    var firstChar = selector.charAt(0);
    var supports = 'classList' in document.documentElement;
    var attribute, value;

    // If selector is a data attribute, split attribute from value
    if ( firstChar === '[' ) {
        selector = selector.substr( 1, selector.length - 2 );
        attribute = selector.split( '=' );

        if ( attribute.length > 1 ) {
            value = true;
            attribute[1] = attribute[1].replace( /"/g, '' ).replace( /'/g, '' );
        }
    }

    // Get closest match
    for ( ; elem && elem !== document && elem.nodeType === 1; elem = elem.parentNode ) {

        // If selector is a class and support classList
        if ( ( firstChar === '.' ) && supports ) {
          if ( elem.classList.contains( selector.substr(1) ) ) {
            return elem;
          }
        } else if ( firstChar === '.' ) {
          if ( new RegExp('(^|\\s)' + selector.substr(1) + '(\\s|$)').test( elem.className ) ) {
            return elem;
          }
        }

        // If selector is an ID
        if ( ( firstChar === '#' ) && ( elem.id === selector.substr(1) ) ) {
          return elem;
        }

        // If selector is a data attribute
        if ( ( firstChar === '[' ) && elem.hasAttribute( attribute[0] ) ) {
          if ( value ) {
              if ( elem.getAttribute( attribute[0] ) === attribute[1] ) {
                  return elem;
              }
          } else {
              return elem;
          }
        }

        // If selector is a tag
        if ( elem.tagName.toLowerCase() === selector.toLowerCase() ) {
            return elem;
        }

    }

    return null;

}
//
// Las JavaScript
//


//
//  Object saving progress
//  First save progress as a cookie
//  When user browses back to the list, cookie progress is saved to database (by PHP)
//
function LasSaveChallangeProgress() {

  var that = this,
      newCookie = new Object();

  this.chapter = lasChapter;

  //
  //  Private functions
  //
  function getCookie() {
    return Cookies.getJSON("lasChallangeProgress");
  };

  function setCookie(value) {
    Cookies.set('lasChallangeProgress', value, { expires: 365 });
  };

  function cleanCookie() {
    Cookies.remove("lasChallangeProgress");
  };

  //
  //  Public function
  //
  this.plusOne = function() {
    var cookie = getCookie();

    if ( ( cookie !== undefined ) && ( cookie[ this.chapter ] !== undefined ) ) {
      //  if we have already this cookie

      newCookie = cookie;
      newCookie[ this.chapter ] = newCookie[ this.chapter ] * 1 + 1;  // * 1 converts it to integer
    }
    else {
      //  if we don't have such cookie
      newCookie[ this.chapter ] = 0;
    }

    setCookie(newCookie);
  }


}

//  The object is created in each exercise function
//  var challangeProgress = new LasSaveChallangeProgress();




// @codekit-append "j-las-chat.js";
// @codekit-append "j-las-autio-test.js";
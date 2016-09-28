//
// Las JavaScript
//



//
//  Helper object that contains methods used by other Las's objects
//
function LasHelper() {

  //
  //  Save progress
  //  First save progress as a cookie
  //  When user browses back to the list, cookie progress is saved to database (by PHP)
  //  @return object with one method plusOne()
  //
  this.lasSaveChallangeProgress = function() {

    var that = this,
        newCookie = new Object(),
        chapter = lasChapter,         //  it is defined in the head
        saveChallangeProgress = new Object();

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
    saveChallangeProgress.plusOne = function() {
      var cookie = getCookie();

      if ( ( cookie !== undefined ) && ( cookie[ chapter ] !== undefined ) ) {
        //  if we have already this cookie

        newCookie = cookie;
        newCookie[ chapter ] = newCookie[ chapter ] * 1 + 1;  // * 1 converts it to integer
      }
      else {
        //  if we don't have such cookie
        newCookie[ chapter ] = 0;
      }

      setCookie(newCookie);
    };

    return saveChallangeProgress;

  }();


  //
  //  Function to create array of bubbles with "1"
  //  @parameter chatData is feeded in init() with data files by objects making exercises
  //  @return array of first keys in the series of bubbles
  //
  this.createRandomArrayOfFirstBubbles = function( chatData ) {
    var property,
        propArray = [];

    //  Push first items
    for (property in chatData) {
      if (chatData.hasOwnProperty(property) && ( property.slice(-1) === '1' ) ) {
        // if it is own property and last letter is "1"

        propArray.push(property);

      }
    }

    //  Fisher-Yates Shuffle
    let counter = propArray.length;

    //  While there are elements in the propArray
    while (counter > 0) {
      //  Pick a random index
      let index = Math.floor(Math.random() * counter);

      //  Decrease counter by 1
      counter--;

      //  And swap the last element with it
      let temp = propArray[counter];
      propArray[counter] = propArray[index];
      propArray[index] = temp;
    }

    return propArray;
  }

}
var lasHelper = new LasHelper();




// @codekit-append "j-las-chat.js";
// @codekit-append "j-las-audio-test.js";
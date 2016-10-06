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
  //  @parameter data is feeded in init() with data files by objects making exercises
  //  @return array of first keys in the series of bubbles
  //
  this.createRandomArrayOfFirstBubbles = function( data ) {
    var property,
        propArray = [];

    //  Push first items
    for (property in data) {
      if (data.hasOwnProperty(property) && ( property.slice(-1) === '1' ) ) {
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
  };


  //
  //  Data bubbles
  //
  this.getRandomBubble = function() {
    console.log( 'getRandomBubble');
    console.log( this.randomChatArray.length );

    if (this.randomChatArray.length > 0 ) {
      //  if there are still chat items to show

      //  add one to progress progress
      this.lasSaveChallangeProgress.plusOne();

      //  pop data and return the object
      var pop = this.lasData.chat[ this.randomChatArray.pop() ];
      return pop;

    }
    else {
      //  Set state
      this.currentState = 'END';

      return this.getEndBubble();
    }

  };


  this.getIntroBubble = function() {
    console.log( 'getIntroBubble');
    var pop = this.lasData.intro[ this.randomIntroArray.pop() ];

    //  Set state
    this.currentState = 'INTRO';

    //  Return bubble
    return pop;

  };


  this.getEndBubble = function() {
    console.log( 'getEndBubble' );
    var pop = this.lasData.end[ this.randomEndArray.pop() ];
    //  Return bubble
    return pop;

  };


  this.getNextBubble = function(no) {

    var data;

    if ( ( no === 'INTRO' ) ) {
      //  if it is intro and we need next bubble

      data = this.getIntroBubble();

    }
    else if ( no === 'ENDINTRO' ) {
      //  if it is the end of intro,  move one to chat

      //  Set state
      this.currentState = 'CHAT';
      data = this.getRandomBubble();

    }
    else if ( ( this.currentState === 'INTRO' ) && ( no !== '' ) ) {
      //  if it is intro and we need next bubble

      data = this.lasData.intro[ no ];

    }
    else if ( ( this.currentState === 'CHAT' ) && ( no === 'RANDOM' ) ) {
      //  if we are at the chat, move one

      data = this.getRandomBubble();

    }
    else if ( ( this.currentState === 'CHAT' ) && ( no !== '' ) ) {
      //  if we are at chat, but need exact bubble

      data = this.lasData.chat[ no ]

    }
    else if ( this.currentState === 'END' ) {
      //  if we got to the end and need an exact bubble

      data = this.lasData.end[ no ];
    }

    console.log("No: " + no);
    console.log("Data: " + data);


    //  Assign data
    //  Method available at subObject
    this.assignBubbleData(no, data);

  };


  this.hideLoader = function() {
    Velocity(this.loader, { opacity: 0 }, { duration: 400, easing: [ 200, 20 ], queue: false, display: 'none' } );
  };

}




// @codekit-append "j-las-chat.js";
// @codekit-append "j-las-audio-test.js";
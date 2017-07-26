//
//  Las Char Log
//

//  character icon in the header acts as a history wrapper for experience (in wyzwanie)
//  it can show:
//  - extra info about the example
//  - msgs from us about extra features we are introducing
//  - experience points for examples
//  - exp sum and how much left for next level


(function() {
  "use strict";

  //
  //  Leveling system
  //  same as in f-user-progress.php
  //
  var levelingSystemMulti = {
    chapter:                            200,
    correct:                            10,
    repeat:                             2,
    trans:                              2,
    more:                               5,
    wrong:                             -5
  };


  //
  //  Public functions
  //


  //
  //  Extra Info
  //
  LasHelper.prototype.showExtraInfoIcon = function(  ) {


  };


  LasHelper.prototype.addScoreAnswer = function() {

    //  no score prop
    if ( !this.clickedAnswer.hasOwnProperty('score') ) {
      return;
    }

    //  Correct answer
    if ( this.clickedAnswer.score === 'correct' ) {

      this.addScore( 'ex' );

    }
    //  Wrong answer
    else if ( this.clickedAnswer.score === 'wrong' ) {

      this.addScore( 'wrong' );

    }//  More
    else if ( this.clickedAnswer.score === 'more' ) {

      this.addScore( 'more' );

    }

  };

  //
  //  Check the prop
  //  Update cookie
  //  Trigger header animation
  //  props: ex, wrong, more, repeat etc.
  //
  LasHelper.prototype.addScore = function( prop ) {

    //  add one point to cookie for this prop
    this.cookiePlusOne( prop );

    //  if the prop is in the leveling system
    if ( levelingSystemMulti[ prop ] ) {

      //  show exp
      this.showScoreExp( levelingSystemMulti[ prop ] );

    }

  };

  LasHelper.prototype.showScoreExp = function( exp ) {

    var navExpEl = document.getElementById( 'las-nav-char-exp' );

    //  update value
    navExpEl.innerHTML = exp;

    //  clean classes
    navExpEl.classList.remove( 'las-green', 'las-red' );

    //  change color
    if ( exp > 0 ) {
      navExpEl.classList.add( 'las-green' );
    }
    else if ( exp < 0 ) {
      navExpEl.classList.add( 'las-red' );
    }

    this.velocity( navExpEl,
      { translateY: ['1rem', '2rem'], opacity: [0.9, 0] },
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, display: 'block'  }
    );

    this.velocity( navExpEl,
      { translateY: ['0.5rem', '1rem'], opacity: 0 },
      { duration: 8 * this.helper.speed, easing: this.helper.easingQuart, display: 'none' }
    );

  };


  //
  //  Private functions
  //




})();

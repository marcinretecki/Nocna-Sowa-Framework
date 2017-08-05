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
    firstTime:                        100,
    correct:                           10,
    wrong:                             -5,
    repeat:                             2,
    trans:                              2,
    more:                               2
  };



  //
  //  Private functions
  //

  //
  //  Count how much exp to add
  //
  function countExpFromMulti( prop ) {

    if ( levelingSystemMulti[ prop ] ) {
      return levelingSystemMulti[ prop ];
    }
    else {
      return 0;
    }

  }


  //
  //  Public functions
  //


  //
  //  Extra Info
  //
  LasHelper.prototype.showExtraInfoIcon = function(  ) {


  };


  //  If user clicked an answer, it will add proper score
  LasHelper.prototype.addScoreAnswer = function() {

    //  no score prop
    if ( !this.clickedAnswer.hasOwnProperty('score') ) {
      return;
    }

    window.console.log('Score: ' + this.clickedAnswer.score);

    this.addScore( this.clickedAnswer.score );

  };



  //
  //  Check the prop
  //  Update cookie
  //  Trigger header animation
  //  props: correct, wrong, more, repeat etc.
  //
  LasHelper.prototype.addScore = function( prop ) {

    if ( !prop ) {
      return;
    }

    var exp = countExpFromMulti( prop );

    //  if no exp
    if ( exp === 0 ) {
      return;
    }

    //  show exp
    this.showScoreExp( exp );

    //  count exp sum
    this.addExpToProgress( exp );

    //  add one point to cookie for this prop
    this.addOneToProgress( prop );

  };



  //
  //  Show exp icon
  //
  LasHelper.prototype.showScoreExp = function( exp ) {

    var navExpEl;
    var beginFn;

    //  if there is no exp
    if ( exp === 0 ) {
      return;
    }


    navExpEl = document.getElementById( 'las-nav-char-exp' );


    //  before animation begins, change the html
    beginFn = function() {

      //  clean classes
      navExpEl.classList.remove( 'las-green', 'las-red' );

      //  change color
      if ( exp > 0 ) {
        navExpEl.classList.add( 'las-green' );

        //  update value
        navExpEl.innerHTML = '+' + exp;
      }
      else if ( exp < 0 ) {
        navExpEl.classList.add( 'las-red' );

        //  update value
        navExpEl.innerHTML = exp;
      }

    }.bind(this);


    //  animate in
    Velocity( navExpEl,
      { translateY: ['1rem', '2rem'], opacity: [0.9, 0] },
      { duration: 2 * this.helper.speed, easing: this.helper.easingQuart, display: 'block',
        begin: function() {
          beginFn();
        }
      }
    );

    //  animate out
    Velocity( navExpEl,
      { translateY: ['0.5rem', '1rem'], opacity: [0, 0.9] },
      { duration: 8 * this.helper.speed, easing: this.helper.easingQuart, display: 'none' }
    );



  };







})();

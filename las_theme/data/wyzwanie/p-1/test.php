<script>
function LasData() {

  this.category = 'audio-test';     // chat|setninger|etc

  //  Audio Test

  this.testNotes = [
  ];

  //  Albo answers
  //  albo autoNext
  //  ale nie oba na raz!
  //  msg jest dowolne
  //  more jest dowolne
  //  gdy nie startTime, mamy quiz
  //  answer jest poiminięte tylko w intro 1


  this.intro = {
    _a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w"></i>.',
      autoNext:   'ENDINTRO'
    }
  };


  this.chat = {

    //  msg + audio + answers
    //  more
    //  Powiedz to dziecko
    _aa1: {
      msg:        'Powiedz <span class="mark mark--green">to dziecko</span>.',
      startTime:  0,
      duration:   1.5,
      answers: [
        { answer: '<i>barnet</i>', score: 'correct', next: '_aa2' },
        { answer: '<i>et barn</i>', score: 'wrong' }
      ],
      more:       {
        startTime:  5,
        duration:   14 - 5,
      }
    },
    _aa2: {
      msg:        '<i>barnet</i>',
      score:      true,
      startTime:  3,
      duration:   4 - 3,
      autoNext:   'RANDOM'
    },


    //  msg + answers
    //  no audio on question
    //  audion on answer
    //  no more
    //  Powiedz ta żona
    _bb1: {
      msg:        'Powiedz <span class="mark mark--green">ta żona</span>. (no audio on q)',
      answers: [
        { answer: '<i>kona</i>', score: 'correct', next: '_bb2' },
        { answer: '<i>ei kone</i>', score: 'wrong' }
      ]
    },
    _bb2: {
      msg:        '<i>kona</i>',
      startTime:  15,
      duration:   16 - 15,
      autoNext:   'RANDOM'
    },


    //  msg + answers
    //  no audio at all
    //  no more
    //  Powiedz ta żona
    _bd1: {
      msg:        'Powiedz <span class="mark mark--green">ta żona</span>. (no audio on q&a)',
      answers: [
        { answer: '<i>kona</i>', score: 'correct', next: '_bd2' },
        { answer: '<i>ei kone</i>', score: 'wrong' }
      ]
    },
    _bd2: {
      msg:        '<i>kona</i>',
      autoNext:   'RANDOM'
    },


    //  audio + autoNext
    //  no more
    //  no answers
    //  no msg
    //  pause
    //  Telefon nie leży na szawce.
    _cc1: {
      startTime:  17,
      duration:   19.5 - 17,
      pauseTime:  5,
      autoNext:   '_cc2'
    },
    _cc2: {
      msg:        '<i>Mobilen ligger ikke på skapet.</i>',
      trans:      'Telefon nie leży na szawce.',
      startTime:  21,
      duration:   23.5 - 21,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    //  audio + answers
    //  no msg
    //  more after answers
    //  Powiedz to dziecko
    _dd1: {
      startTime:  0,
      duration:   1.5 - 0,
      answers: [
        { answer: '<i>barnet</i>', next: '_dd2', score: 'correct' },
        { answer: '<i>et barn</i>', score: 'wrong' }
      ],

    },
    _dd2: {
      msg:        '<i>barnet</i>',
      startTime:  3,
      duration:   4 - 3,
      more:       {
        startTime:  5,
        duration:   14 - 5,
      },
      autoNext:   'RANDOM'
    },



    //  To jest zły przykład kodu
    //  nie rób jednocześnie time i msg
    //
    //  //  audio
    //  //  msg
    //  //  single bubble
    //  _ee1: {
    //    msg:        '<i>Mobilen ligger ikke på skapet.</i>',
    //    startTime:  17,
    //    duration:   19.5 - 17,
    //    pauseTime:  5,
    //    score:      'correct',
    //    autoNext:   'RANDOM'
    //  },




  };


  this.extra = {

    //  msg + answers
    //  no audio at all
    //  no more
    //  Powiedz ta żona
    _xx1: {
      msg:        'Powiedz <span class="mark mark--green">ta żona</span>. (extra)',
      answers: [
        { answer: '<i>kona</i>', score: 'correct', next: '_bd2' },
        { answer: '<i>ei kone</i>', score: 'wrong' }
      ]
    },
    _xx2: {
      msg:        '<i>kona</i>',
      autoNext:   'RANDOM'
    },

  }


  this.end = {

    _end1: {
      state: 'END'
    }

  };



}
</script>
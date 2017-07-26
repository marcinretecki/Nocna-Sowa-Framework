<script>
function LasData() {

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
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w las-icon-size-2-w las-icon-size-2"></i>.',
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
      msg:        'barnet',
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
      msg:        'kona',
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
      msg:        'kona',
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
      msg:        'Mobilen ligger ikke på skapet.',
      trans:      'Telefon nie leży na szawce.',
      startTime:  21,
      duration:   23.5 - 21,
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
        { answer: '<i>barnet', next: '_dd2</i>', score: 'correct' },
        { answer: '<i>et barn</i>', score: 'wrong' }
      ],

    },
    _dd2: {
      msg:        'barnet',
      startTime:  3,
      duration:   4 - 3,
      more:       {
        startTime:  5,
        duration:   14 - 5,
      },
      autoNext:   'RANDOM'
    },




  };


  this.end = {

    _end1: {
      autoNext: 'END'
    }

  };



}
</script>
<script>
function LasData() {

  this.category = 'audio-test';   // chat|setninger|etc


  //  answers = [
  //    { answer: '', score: 'wrong', next: '' },
  //    { answer: '', score: 'correct', next: '' },
  //    { answer: '', score: 'partial', next: '' },
  //    { answer: '', score: 'more', next: '' }
  //  ]


  this.testNotes = [
    'note'
  ];

  //  Albo answers
  //  albo autoNext
  //  ale nie oba na raz!
  //  msg jest dowolne
  //  more jest dowolne
  //  gdy nie startTime, mamy quiz
  //  answer jest poiminięte tylko w intro 1
  //  cmd + alt + n -> aa

  //  jeśli nie ma answers
  //  dodajemy score do bubble z msg


  this.intro = {
    _a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w las-icon-size-2"></i>.',
      autoNext:     'ENDINTRO'/*,
      more: {
        startTime:  0,
        duration:   1.5,
      }*/
    }
  };


  //  main wyzwanie
  this.chat = {

    _aa1: {
      msg:        ' <span class="mark mark--green"></span>.',
      answers: [
        { answer: '', score: 'correct', next: '_aa2' },
        { answer: '', score: 'wrong' },
        { answer: '', score: 'wrong' },
        { answer: '', score: 'wrong' }
      ]
    },
    _aa2: {
      msg:        '',
      startTime:  0,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ab1: {
      msg:        ' <span class="mark mark--green"></span>.',
      answers: [
        { answer: '', score: 'correct', next: '_ab2' },
        { answer: '', score: 'wrong' },
        { answer: '', score: 'wrong' },
        { answer: '', score: 'wrong' }
      ]
    },
    _ab2: {
      msg:        '',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    }

  };


  //  extra examples
  //  if user finished at least 2 times
  this.extra = {

    _aa1: {
      msg:        ' <span class="mark mark--green"></span>.',
      answers: [
        { answer: '', score: 'correct', next: '_aa2' },
        { answer: '', score: 'wrong' },
        { answer: '', score: 'wrong' },
        { answer: '', score: 'wrong' }
      ]
    },
    _aa2: {
      msg:        '',
      startTime:  0,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


  };



}
</script>
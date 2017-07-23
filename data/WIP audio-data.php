<script>
function LasAudioData() {

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


  this.intro = {
    _a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:     'ENDINTRO'/*,
      more: {
        startTime:  0,
        duration:   1.5,
      }*/
    }
  };


  this.chat = {

    _aa1: {
      msg:        ' <span class="audio-test-clue"></span>.',
      answers: [
        { answer: '',   next: '_aa2' },
        { answer: '',   wrong: true },
        { answer: '',   wrong: true },
        { answer: '',   wrong: true }
      ]
    },
    _aa2: {
      msg:        '',
      startTime:  0,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ab1: {
      msg:        ' <span class="audio-test-clue"></span>.',
      answers: [
        { answer: '',   next: '_ab2' },
        { answer: '',   wrong: true },
        { answer: '',   wrong: true },
        { answer: '',   wrong: true }
      ]
    },
    _ab2: {
      msg:        '',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    }

  };


  this.end = {

    _end1: {
      msg:        'END',
      startTime:  0,
      duration:   1.5,
    }

  };



}
</script>
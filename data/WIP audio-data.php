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
    a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO',
      more: { startTime: 0, stopTime: 1 }
    }
  };


  this.chat = {

    aa1: {
      msg:        ' <span class="audio-test-clue"></span>.',
      answers: [
        { answer: '',   next: 'aa2' },
        { answer: '',   wrong: true },
        { answer: '',   wrong: true },
        { answer: '',   wrong: true }
      ]
    },
    aa2: {
      msg:        '',
//      startTime:  0,
//      stopTime:   2,
      autoNext:   'RANDOM'
    },


    ab1: {
      msg:        ' <span class="audio-test-clue"></span>.',
      answers: [
        { answer: '',   next: 'ab2' },
        { answer: '',   wrong: true },
        { answer: '',   wrong: true },
        { answer: '',   wrong: true }
      ]
    },
    ab2: {
      msg:        '',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    }

  };


  this.end = {

    end1: {
      msg: 'END',
      startTime: 0,
      stopTime: 0
    }

  };



}
</script>
<script>
function LasAudioData() {

  //  Albo answers
  //  albo autoNext
  //  ale nie oba na raz!
  //  msg jest dowolne
  //  more jest dowolne
  //  gdy nie startTime, mamy quiz
  //  answer jest poiminięte tylko w intro 1


  this.intro = {
    a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO'
    }
  };


  this.chat = {

    //  msg + audio + answers
    //  more
    //  Powiedz to dziecko
    aa1: {
      msg:        'Powiedz <span class="audio-test-clue">to dziecko</span>.',
      startTime:  0,
      stopTime:   1.5,
      answers: [
        { answer: 'barnet', next: 'aa2' },
        { answer: 'et barn', wrong: true }
      ],
      more:       { startTime: 5, stopTime: 14 }
    },
    aa2: {
      msg:        'barnet',
      score:      true,
      startTime:  3,
      stopTime:   4,
      autoNext:   'RANDOM'
    },


    //  msg + answers
    //  no audio on question
    //  audion on answer
    //  no more
    //  Powiedz ta żona
    bb1: {
      msg:        'Powiedz <span class="audio-test-clue">ta żona</span>. (no audio on q)',
      answers: [
        { answer: 'kona', next: 'bb2' },
        { answer: 'ei kone', wrong: true }
      ]
    },
    bb2: {
      msg:        'kona',
      startTime:  15,
      stopTime:   16,
      autoNext:   'RANDOM'
    },


    //  msg + answers
    //  no audio at all
    //  no more
    //  Powiedz ta żona
    bb1: {
      msg:        'Powiedz <span class="audio-test-clue">ta żona</span>. (no audio on q&a)',
      answers: [
        { answer: 'kona', next: 'bb2' },
        { answer: 'ei kone', wrong: true }
      ]
    },
    bb2: {
      msg:        'kona',
      autoNext:   'RANDOM'
    },


    //  audio + autoNext
    //  no more
    //  no answers
    //  no msg
    //  pause
    //  Telefon nie leży na szwce.
    cc1: {
      startTime:  17,
      stopTime:   19.5,
      pauseTime:  5,
      autoNext:   'cc2'
    },
    cc2: {
      msg:        'Mobilen ligger ikke på skapet.',
      startTime:  21,
      stopTime:   23.5,
      autoNext:   'RANDOM'
    },


    //  audio + answers
    //  no msg
    //  more after answers
    //  Powiedz to dziecko
    dd1: {
      startTime:  0,
      stopTime:   1.5,
      answers: [
        { answer: 'barnet', next: 'dd2' },
        { answer: 'et barn', wrong: true }
      ],

    },
    dd2: {
      msg:        'barnet',
      startTime:  3,
      stopTime:   4,
      more:       { startTime: 5, stopTime: 14 },
      autoNext:   'RANDOM'
    },




  };


  this.end = {

    end1: {
      msg: 'END'
    }

  };



}
</script>
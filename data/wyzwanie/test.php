<script>
function LasAudioData() {

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
      duration:   1.5,
      answers: [
        { answer: 'barnet', next: 'aa2' },
        { answer: 'et barn', wrong: true }
      ],
      more:       {
        startTime:  5,
        duration:   14 - 5,
      }
    },
    aa2: {
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
      duration:   16 - 15,
      autoNext:   'RANDOM'
    },


    //  msg + answers
    //  no audio at all
    //  no more
    //  Powiedz ta żona
    bd1: {
      msg:        'Powiedz <span class="audio-test-clue">ta żona</span>. (no audio on q&a)',
      answers: [
        { answer: 'kona', next: 'bd2' },
        { answer: 'ei kone', wrong: true }
      ]
    },
    bd2: {
      msg:        'kona',
      autoNext:   'RANDOM'
    },


    //  audio + autoNext
    //  no more
    //  no answers
    //  no msg
    //  pause
    //  Telefon nie leży na szawce.
    cc1: {
      startTime:  17,
      duration:   19.5 - 17,
      pauseTime:  5,
      autoNext:   'cc2'
    },
    cc2: {
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
    dd1: {
      startTime:  0,
      duration:   1.5 - 0,
      answers: [
        { answer: 'barnet', next: 'dd2' },
        { answer: 'et barn', wrong: true }
      ],

    },
    dd2: {
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

    end1: {
      autoNext: 'END'
    }

  };



}
</script>
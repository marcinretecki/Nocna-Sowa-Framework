<script>
function LasAudioData() {

  this.testNotes = [
    'nie ma czasów ani nagrania'
  ];

  this.intro = {
    a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO'/*,
      more: { startTime: 0, stopTime: 26 }*/
    }
  };


  this.chat = {

    aa1: {
      spokenWord: 'Powiedz: Oni chcą ugotować obiad.',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'aa2'
    },
    aa2: {
      msg:        'De vil lage middag.',
      trans:      'Oni chcą ugotować obiad.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ab1: {
      spokenWord: 'Powiedz: Ona chce kupić mieszkanie.',
      startTime:  8,
      stopTime:   10.5,
      pauseTime:  6,
      autoNext:   'ab2'
    },
    ab2: {
      msg:        'Hun vil kjøpe en leilighet.',
      trans:      'Ona chce kupić mieszkanie.',
      startTime:  12,
      stopTime:   13.5,
      autoNext:   'RANDOM'
    },


    ac1: {
      spokenWord: 'Powiedz: Chcę leżeć na plaży.',
      startTime:  15,
      stopTime:   18,
      pauseTime:  6,
      autoNext:   'ac2'
    },
    ac2: {
      msg:        'Jeg vil ligge på stranda.',
      trans:      'Chcę leżeć na plaży.',
      startTime:  19,
      stopTime:   21,
      autoNext:   'RANDOM'
    },


    ae1: {
      spokenWord: 'Powiedz: Chcemy lecieć na Svalbard.',
      startTime:  29,
      stopTime:   31.5,
      pauseTime:  5,
      autoNext:   'ae2'
    },
    ae2: {
      msg:        'Vi vil fly på Svalbard.',
      trans:      'Chcemy lecieć na Svalbard.',
      startTime:  33,
      stopTime:   34.5,
      autoNext:   'RANDOM'
    },


    af1: {
      spokenWord: 'Powiedz: Muszę zrobić zakupy.',
      startTime:  36,
      stopTime:   39,
      pauseTime:  6,
      autoNext:   'af2'
    },
    af2: {
      msg:        'Jeg må handle.',
      trans:      'Muszę zrobić zakupy.',
      startTime:  40,
      stopTime:   42,
      autoNext:   'RANDOM'
    },


    ah1: {
      spokenWord: 'Powiedz: Oni muszą się zastanowić.',
      startTime:  43,
      stopTime:   45.5,
      pauseTime:  6,
      autoNext:   'ah2'
    },
    ah2: {
      msg:        'De må tenke seg om.',
      trans:      'Oni muszą się zastanowić.',
      startTime:  47,
      stopTime:   49,
      autoNext:   'RANDOM'
    },


    aj1: {
      spokenWord: 'Powiedz: My musimy uczyć się dużo.',
      startTime:  50,
      stopTime:   52.5,
      pauseTime:  6,
      autoNext:   'aj2'
    },
    aj2: {
      msg:        'Vi må lære mye.',
      trans:      'My musimy uczyć się dużo.',
      startTime:  54,
      stopTime:   56,
      autoNext:   'RANDOM'
    },


    ai1: {
      spokenWord: 'Powiedz: Musicie tu posprzątać.',
      startTime:  57,
      stopTime:   59,
      pauseTime:  5,
      autoNext:   'ai2'
    },
    ai2: {
      msg:        'Dere må rydde her.',
      trans:      'Musicie tu posprzątać.',
      startTime:  60,
      stopTime:   61.5,
      autoNext:   'RANDOM'
    },


    ak1: {
      spokenWord: 'Powiedz: On musi dużo jeść.',
      startTime:  63,
      stopTime:   65.5,
      pauseTime:  5,
      autoNext:   'ak2'
    },
    ak2: {
      msg:        'Han må spise mye.',
      trans:      'On musi dużo jeść.',
      startTime:  67,
      stopTime:   68.5,
      autoNext:   'RANDOM'
    },


    al1: {
      spokenWord: 'Powiedz: On umie pływać.',
      startTime:  70,
      stopTime:   72.5,
      pauseTime:  6,
      autoNext:   'al2'
    },
    al2: {
      msg:        'Han kan svømme.',
      trans:      'On umie pływać.',
      startTime:  74,
      stopTime:   76,
      autoNext:   'RANDOM'
    },


    ba1: {
      spokenWord: 'Powiedz: Ona może jechać. albo Umie jechać.',
      startTime:  77,
      stopTime:   79.5,
      pauseTime:  8,
      autoNext:   'ba2'
    },
    ba2: {
      msg:        'Hun kan kjøre.',
      trans:      'Ona może jechać. / Umie jechać.',
      startTime:  81,
      stopTime:   83.5,
      autoNext:   'RANDOM'
    },


    bb1: {
      spokenWord: 'Powiedz: Mogę zapłacić.',
      startTime:  85,
      stopTime:   87.5,
      pauseTime:  5,
      autoNext:   'bb2'
    },
    bb2: {
      msg:        'Jeg kan betale.',
      trans:      'Mogę zapłacić.',
      startTime:  89,
      stopTime:   90.5,
      autoNext:   'RANDOM'
    },


    bc1: {
      spokenWord: 'Powiedz: To może zaczekać.',
      startTime:  92,
      stopTime:   94,
      pauseTime:  6,
      autoNext:   'bc2'
    },
    bc2: {
      msg:        'Det kan vente.',
      trans:      'To może zaczekać.',
      startTime:  95,
      stopTime:   97,
      autoNext:   'RANDOM'
    },


    bd1: {
      spokenWord: 'Powiedz: Mogę zostać w domu.',
      startTime:  98,
      stopTime:   100.5,
      pauseTime:  8,
      autoNext:   'bd2'
    },
    bd2: {
      msg:        'Jeg kan bli hjemme.',
      trans:      'Mogę zostać w domu.',
      startTime:  102,
      stopTime:   104.5,
      autoNext:   'RANDOM'
    },


    bf1: {
      spokenWord: 'Powiedz: Oni zamierzają pójść na wycieczkę.',
      startTime:  113,
      stopTime:   115,
      pauseTime:  6,
      autoNext:   'bf2'
    },
    bf2: {
      msg:        'De skal gå på tur.',
      trans:      'Oni zamierzają pójść na wycieczkę.',
      startTime:  116,
      stopTime:   118,
      autoNext:   'RANDOM'
    },


    bh1: {
      spokenWord: 'Powiedz: On planuje zmienić pracę.',
      startTime:  126,
      stopTime:   128.5,
      pauseTime:  6,
      autoNext:   'bh2'
    },
    bh2: {
      msg:        'Han skal bytte jobben.',
      trans:      'On planuje zmienić pracę.',
      startTime:  130,
      stopTime:   131.5,
      autoNext:   'RANDOM'
    },


    bi1: {
      spokenWord: 'Powiedz: My zamierzamy uczyć się cierpliwości.',
      startTime:  133,
      stopTime:   134.5,
      pauseTime:  5,
      autoNext:   'bi2'
    },
    bi2: {
      msg:        'Vi skal lære tålmodighet.',
      trans:      'My zamierzamy uczyć się cierpliwości.',
      startTime:  136,
      stopTime:   137.5,
      autoNext:   'RANDOM'
    },


    bj1: {
      spokenWord: 'Powiedz: Oni planują ćwiczyć więcej.',
      startTime:  139,
      stopTime:   140.5,
      pauseTime:  5,
      autoNext:   'bj2'
    },
    bj2: {
      msg:        'De skal øve mer.',
      trans:      'Oni planują ćwiczyć więcej.',
      startTime:  142,
      stopTime:   143.5,
      autoNext:   'RANDOM'
    },


    bk1: {
      spokenWord: 'Powiedz: Ona zamierza czytać więcej.',
      startTime:  145,
      stopTime:   147,
      pauseTime:  5,
      autoNext:   'bk2'
    },
    bk2: {
      msg:        'Hun skal lese mer.',
      trans:      'Ona zamierza czytać więcej.',
      startTime:  148,
      stopTime:   149.5,
      autoNext:   'RANDOM'
    }



  };


  this.end = {

    end1: {
      msg:        'END',
      startTime:  0,
      stopTime:   0
    }

  };



}
</script>
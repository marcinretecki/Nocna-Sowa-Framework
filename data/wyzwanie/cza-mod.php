<script>
function LasAudioData() {

  this.intro = {
    a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO'/*,
      more: { startTime: 0, stopTime: 26 }*/
    }
  };


  this.chat = {

    aa1: {
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'aa2'
    },
    aa2: {
      trans:      'Oni chcą ugotować obiad.',
      msg:        'De vil lage middag.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ab1: {
      startTime:  8,
      stopTime:   10.5,
      pauseTime:  6,
      autoNext:   'ab2'
    },
    ab2: {
      trans:      'Ona chce kupić mieszkanie.',
      msg:        'Hun vil kjøpe en leilighet.',
      startTime:  12,
      stopTime:   13.5,
      autoNext:   'RANDOM'
    },


    ac1: {
      startTime:  15,
      stopTime:   18,
      pauseTime:  6,
      autoNext:   'ac2'
    },
    ac2: {
      trans:      'Chcę leżeć na plaży.',
      msg:        'Jeg vil ligge på stranda.',
      startTime:  19,
      stopTime:   21,
      autoNext:   'RANDOM'
    },


    ae1: {
      startTime:  29,
      stopTime:   31.5,
      pauseTime:  5,
      autoNext:   'ae2'
    },
    ae2: {
      trans:      'Chcemy lecieć na Svalbard.',
      msg:        'Vi vil fly på Svalbard.',
      startTime:  33,
      stopTime:   34.5,
      autoNext:   'RANDOM'
    },


    af1: {
      startTime:  36,
      stopTime:   39,
      pauseTime:  6,
      autoNext:   'af2'
    },
    af2: {
      trans:      'Muszę zrobić zakupy.',
      msg:        'Jeg må handle.',
      startTime:  40,
      stopTime:   42,
      autoNext:   'RANDOM'
    },


    ah1: {
      startTime:  43,
      stopTime:   45.5,
      pauseTime:  6,
      autoNext:   'ah2'
    },
    ah2: {
      trans:      'Oni muszą się zastanowić.',
      msg:        'De må tenke seg om.',
      startTime:  47,
      stopTime:   49,
      autoNext:   'RANDOM'
    },


    aj1: {
      startTime:  50,
      stopTime:   52.5,
      pauseTime:  6,
      autoNext:   'aj2'
    },
    aj2: {
      trans:      'My musimy uczyć się dużo.',
      msg:        'Vi må lære mye.',
      startTime:  54,
      stopTime:   56,
      autoNext:   'RANDOM'
    },


    ai1: {
      startTime:  57,
      stopTime:   59,
      pauseTime:  5,
      autoNext:   'ai2'
    },
    ai2: {
      trans:      'Musicie tu posprzątać.',
      msg:        'Dere må rydde her.',
      startTime:  60,
      stopTime:   61.5,
      autoNext:   'RANDOM'
    },


    ak1: {
      startTime:  63,
      stopTime:   65.5,
      pauseTime:  5,
      autoNext:   'ak2'
    },
    ak2: {
      trans:      'On musi dużo jeść.',
      msg:        'Han må spise mye.',
      startTime:  67,
      stopTime:   68.5,
      autoNext:   'RANDOM'
    },


    al1: {
      startTime:  70,
      stopTime:   72.5,
      pauseTime:  6,
      autoNext:   'al2'
    },
    al2: {
      trans:      'On umie pływać.',
      msg:        'Han kan svømme.',
      startTime:  74,
      stopTime:   76,
      autoNext:   'RANDOM'
    },


    ba1: {
      startTime:  77,
      stopTime:   79.5,
      pauseTime:  8,
      autoNext:   'ba2'
    },
    ba2: {
      trans:      'Ona może jechać. / Umie jechać.',
      msg:        'Hun kan kjøre.',
      startTime:  81,
      stopTime:   83.5,
      autoNext:   'RANDOM'
    },


    bb1: {
      startTime:  85,
      stopTime:   87.5,
      pauseTime:  5,
      autoNext:   'bb2'
    },
    bb2: {
      trans:      'Mogę zapłacić.',
      msg:        'Jeg kan betale.',
      startTime:  89,
      stopTime:   90.5,
      autoNext:   'RANDOM'
    },


    bc1: {
      startTime:  92,
      stopTime:   94,
      pauseTime:  6,
      autoNext:   'bc2'
    },
    bc2: {
      trans:      'To może zaczekać.',
      msg:        'Det kan vente.',
      startTime:  95,
      stopTime:   97,
      autoNext:   'RANDOM'
    },


    bd1: {
      startTime:  98,
      stopTime:   100.5,
      pauseTime:  8,
      autoNext:   'bd2'
    },
    bd2: {
      trans:      'Mogę zostać w domu.',
      msg:        'Jeg kan bli hjemme.',
      startTime:  102,
      stopTime:   104.5,
      autoNext:   'RANDOM'
    },


    bf1: {
      startTime:  113,
      stopTime:   115,
      pauseTime:  6,
      autoNext:   'bf2'
    },
    bf2: {
      trans:      'Oni zamierzają pójść na wycieczkę.',
      msg:        'De skal gå på tur.',
      startTime:  116,
      stopTime:   118,
      autoNext:   'RANDOM'
    },


    bh1: {
      startTime:  126,
      stopTime:   128.5,
      pauseTime:  6,
      autoNext:   'bh2'
    },
    bh2: {
      trans:      'On planuje zmienić pracę.',
      msg:        'Han skal bytte jobben.',
      startTime:  130,
      stopTime:   131.5,
      autoNext:   'RANDOM'
    },


    bi1: {
      startTime:  133,
      stopTime:   134.5,
      pauseTime:  5,
      autoNext:   'bi2'
    },
    bi2: {
      trans:      'My zamierzamy uczyć się cierpliwości.',
      msg:        'Vi skal lære tålmodighet.',
      startTime:  136,
      stopTime:   137.5,
      autoNext:   'RANDOM'
    },


    bj1: {
      startTime:  139,
      stopTime:   140.5,
      pauseTime:  5,
      autoNext:   'bj2'
    },
    bj2: {
      trans:      'Oni planują ćwiczyć więcej.',
      msg:        'De skal øve mer.',
      startTime:  142,
      stopTime:   143.5,
      autoNext:   'RANDOM'
    },


    bk1: {
      startTime:  145,
      stopTime:   147,
      pauseTime:  5,
      autoNext:   'bk2'
    },
    bk2: {
      trans:      'Ona zamierza czytać więcej.',
      msg:        'Hun skal lese mer.',
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
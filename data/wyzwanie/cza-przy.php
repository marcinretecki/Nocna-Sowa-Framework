<script>
function LasAudioData() {

  this.testNotes = [
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
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'aa2'
    },
    aa2: {
      msg:        'Jeg skal på jobb i morgen.',
      trans:      'Jutro mam iść do pracy.',
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
      msg:        'Jeg går på jobb i morgen.',
      trans:      'Jutro idę do pracy.',
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
      msg:        'Jeg skal komme til deg.',
      trans:      'Przyjdę do Ciebie.',
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
      msg:        'Jeg kommer til deg.',
      trans:      'Przyjdę do Ciebie.',
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
      msg:        'Jeg skal skrive e-posten til deg.',
      trans:      'Napiszę do Ciebie maila.',
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
      msg:        'Jeg skriver e-posten til deg.',
      trans:      'Napiszę do Ciebie maila.',
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
      msg:        'Han skal hente pakka på posten.',
      trans:      'On ma odebrać paczkę z poczty.',
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
      msg:        'Han henter pakka på posten.',
      trans:      'On odbierze paczkę z poczty.',
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
      msg:        'Jeg skal lese denne boka neste måned.',
      trans:      'Zamierzam przeczytać tę książkę w przyszłym miesiącu.',
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
      msg:        'Jeg leser denne boka neste måned.',
      trans:      'Przeczytam tę książkę w przyszłym miesiącu.',
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
      msg:        'Jeg skal handle på vei hjem.',
      trans:      'Planuję zrobić zakupy w drodze do domu.',
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
      msg:        'Jeg handler på vei hjem.',
      trans:      'Zrobię zakupy w drodze do domu.',
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
      msg:        'Jeg skal selge bilen i år.',
      trans:      'Zamierzam sprzedać samochód w tym roku.',
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
      msg:        'Jeg selger bilen i år.',
      trans:      'Sprzedam samochód w tym roku.',
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
      msg:        'Jeg skal åpne en konto i banken.',
      trans:      'Zamierzam otworzyć konto w banku.',
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
      msg:        'Jeg åpner en konto i banken.',
      trans:      'Otworzę konto w banku.',
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
      msg:        'Jeg skal snakke med sjefen i morgen.',
      trans:      'Jutro będę rozmawiał z szefem.',
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
      msg:        'Jeg snakker med sjefen i morgen.',
      trans:      'Jutro porozmawiam z szefem.',
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
      msg:        'Jeg skal gå til fysioterapeut.',
      trans:      'W czwartek idę do fizjoterapeuty.',
      startTime:  148,
      stopTime:   149.5,
      autoNext:   'RANDOM'
    },


    bl1: {
      startTime:  145,
      stopTime:   147,
      pauseTime:  5,
      autoNext:   'bl2'
    },
    bl2: {
      msg:        'Jeg går til fysjoteraput.',
      trans:      'W czwartek idę do fizjoterapeuty.',
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
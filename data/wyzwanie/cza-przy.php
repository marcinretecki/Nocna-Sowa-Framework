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
      trans:      'Jutro mam iść do pracy.',
      msg:        'Jeg skal på jobb i morgen.',
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
      trans:      'Jutro idę do pracy.',
      msg:        'Jeg går på jobb i morgen.',
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
      trans:      'Przyjdę do Ciebie.',
      msg:        'Jeg skal komme til deg.',
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
      trans:      'Przyjdę do Ciebie.',
      msg:        'Jeg kommer til deg.',
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
      trans:      'Napiszę do Ciebie maila.',
      msg:        'Jeg skal skrive e-posten til deg.',
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
      trans:      'Napiszę do Ciebie maila.',
      msg:        'Jeg skriver e-posten til deg.',
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
      trans:      'On ma odebrać paczkę z poczty.',
      msg:        'Han skal hente pakka på posten.',
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
      trans:      'On odbierze paczkę z poczty.',
      msg:        'Han henter pakka på posten.',
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
      trans:      'Zamierzam przeczytać tę książkę w przyszłym miesiącu.',
      msg:        'Jeg skal lese denne boka neste måned.',
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
      trans:      'Przeczytam tę książkę w przyszłym miesiącu.',
      msg:        'Jeg leser denne boka neste måned.',
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
      trans:      'Planuję zrobić zakupy w drodze do domu.',
      msg:        'Jeg skal handle på vei hjem.',
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
      trans:      'Zrobię zakupy w drodze do domu.',
      msg:        'Jeg handler på vei hjem.',
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
      trans:      'Zamierzam sprzedać samochód w tym roku.',
      msg:        'Jeg skal selge bilen i år.',
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
      trans:      'Sprzedam samochód w tym roku.',
      msg:        'Jeg selger bilen i år.',
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
      trans:      'Zamierzam otworzyć konto w banku.',
      msg:        'Jeg skal åpne en konto i banken.',
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
      trans:      'Otworzę konto w banku.',
      msg:        'Jeg åpner en konto i banken.',
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
      trans:      'Jutro będę rozmawiał z szefem.',
      msg:        'Jeg skal snakke med sjefen i morgen.',
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
      trans:      'Jutro porozmawiam z szefem.',
      msg:        'Jeg snakker med sjefen i morgen.',
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
      trans:      'W czwartek idę do fizjoterapeuty.',
      msg:        'Jeg skal gå til fysioterapeut.',
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
      trans:      'W czwartek idę do fizjoterapeuty.',
      msg:        'Jeg går til fysjoteraput.',
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
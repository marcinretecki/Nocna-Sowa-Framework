<script>
function LasData() {

  this.category = 'audio-test'; // chat|setninger|etc


  this.testNotes = [
  ];


  this.intro = {
    _intro1: {
      msg:          'Załóż słuchawki, jeśli chcesz. #emoji-1f3a7;',
      autoNext:     '_intro2'
    },
    _intro2: {
      msg:          '<p>Ułóż zdania po norwesku zgodnie z poleceniem, które usłyszysz.</p>',
      autoNext:     'ENDINTRO'
    },
  };


  this.chat = {

    _aa1: {
      spokenWord: 'Powiedz: Jutro mam iść do pracy. Użyj skal.',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_aa2'
    },
    _aa2: {
      msg:        '<i>Jeg skal på jobb i morgen.</i>',
      trans:      'Jutro mam/zamierzam iść do pracy.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ab1: {
      spokenWord: 'Powiedz: Jutro idę do pracy. Bez użycia skal.',
      startTime:  8,
      duration:   10.5 - 8,
      pauseTime:  6,
      autoNext:   '_ab2'
    },
    _ab2: {
      msg:        '<i>Jeg går på jobb i morgen.</i>',
      trans:      'Jutro idę do pracy.',
      startTime:  12,
      duration:   13.5 - 12,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ac1: {
      spokenWord: 'Powiedz: Przyjdę do Ciebie. Użyj skal.',
      startTime:  15,
      duration:   18 - 15,
      pauseTime:  6,
      autoNext:   '_ac2'
    },
    _ac2: {
      msg:        '<i>Jeg skal komme til deg.</i>',
      trans:      'Przyjdę do Ciebie.',
      startTime:  19,
      duration:   21 - 19,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ae1: {
      spokenWord: 'Powiedz: Przyjdę do Ciebie. Bez użycia skal.',
      startTime:  29,
      duration:   31.5 - 29,
      pauseTime:  5,
      autoNext:   '_ae2'
    },
    _ae2: {
      msg:        '<i>Jeg kommer til deg.</i>',
      trans:      'Przyjdę do Ciebie.',
      startTime:  33,
      duration:   34.5 - 33,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _af1: {
      spokenWord: 'Powiedz: Napiszę do Ciebie maila. Użyj skal.',
      startTime:  36,
      duration:   39 - 36,
      pauseTime:  6,
      autoNext:   '_af2'
    },
    _af2: {
      msg:        '<i>Jeg skal skrive e-posten til deg.</i>',
      trans:      'Napiszę do Ciebie maila.',
      startTime:  40,
      duration:   42 - 40,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ah1: {
      spokenWord: 'Powiedz: Napiszę do Ciebie maila. Bez użycia skal.',
      startTime:  43,
      duration:   45.5 - 43,
      pauseTime:  6,
      autoNext:   '_ah2'
    },
    _ah2: {
      msg:        '<i>Jeg skriver e-posten til deg.</i>',
      trans:      'Napiszę do Ciebie maila.',
      startTime:  47,
      duration:   49 - 47,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _aj1: {
      spokenWord: 'Powiedz: On ma odebrać paczkę z poczty. Użyj skal.',
      startTime:  50,
      duration:   52.5 - 50,
      pauseTime:  6,
      autoNext:   '_aj2'
    },
    _aj2: {
      msg:        '<i>Han skal hente pakka på posten.</i>',
      trans:      'On ma odebrać paczkę z poczty.',
      startTime:  54,
      duration:   56 - 54,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ai1: {
      spokenWord: 'Powiedz: On odbierze paczkę z poczty. Bez użycia skal.',
      startTime:  57,
      duration:   59 - 57,
      pauseTime:  5,
      autoNext:   '_ai2'
    },
    _ai2: {
      msg:        '<i>Han henter pakka på posten.</i>',
      trans:      'On odbierze paczkę z poczty.',
      startTime:  60,
      duration:   61.5 - 60,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ak1: {
      spokenWord: 'Powiedz: Zamierzam przeczytać tę książkę w przyszłym miesiącu. Użyj skal.',
      startTime:  63,
      duration:   65.5 - 63,
      pauseTime:  5,
      autoNext:   '_ak2'
    },
    _ak2: {
      msg:        '<i>Jeg skal lese denne boka neste måned.</i>',
      trans:      'Zamierzam przeczytać tę książkę w przyszłym miesiącu.',
      startTime:  67,
      duration:   68.5 - 67,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _al1: {
      spokenWord: 'Powiedz: Przeczytam tę książkę w przyszłym miesiącu. Bez użycia skal.',
      startTime:  70,
      duration:   72.5 - 70,
      pauseTime:  6,
      autoNext:   '_al2'
    },
    _al2: {
      msg:        '<i>Jeg leser denne boka neste måned.</i>',
      trans:      'Przeczytam tę książkę w przyszłym miesiącu.',
      startTime:  74,
      duration:   76 - 74,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ba1: {
      spokenWord: 'Powiedz: Planuję zrobić zakupy w drodze do domu. Użyj skal.',
      startTime:  77,
      duration:   79.5 - 77,
      pauseTime:  8,
      autoNext:   '_ba2'
    },
    _ba2: {
      msg:        '<i>Jeg skal handle på vei hjem.</i>',
      trans:      'Planuję zrobić zakupy w drodze do domu.',
      startTime:  81,
      duration:   83.5 - 81,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bb1: {
      spokenWord: 'Powiedz: Zrobię zakupy w drodze do domu. Bez użycia skal.',
      startTime:  85,
      duration:   87.5 - 85,
      pauseTime:  5,
      autoNext:   '_bb2'
    },
    _bb2: {
      msg:        '<i>Jeg handler på vei hjem.</i>',
      trans:      'Zrobię zakupy w drodze do domu.',
      startTime:  89,
      duration:   90.5 - 89,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bc1: {
      spokenWord: 'Powiedz: Zamierzam sprzedać samochód w tym roku. Użyj skal.',
      startTime:  92,
      duration:   94 - 92,
      pauseTime:  6,
      autoNext:   '_bc2'
    },
    _bc2: {
      msg:        '<i>Jeg skal selge bilen i år.</i>',
      trans:      'Zamierzam sprzedać samochód w tym roku.',
      startTime:  95,
      duration:   97 - 95,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bd1: {
      spokenWord: 'Powiedz: Sprzedam samochód w tym roku. Bez użycia skal.',
      startTime:  98,
      duration:   100.5 - 98,
      pauseTime:  8,
      autoNext:   '_bd2'
    },
    _bd2: {
      msg:        '<i>Jeg selger bilen i år.</i>',
      trans:      'Sprzedam samochód w tym roku.',
      startTime:  102,
      duration:   104.5 - 102,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bf1: {
      spokenWord: 'Powiedz: Zamierzam otworzyć konto w banku. Użyj skal.',
      startTime:  113,
      duration:   115 - 113,
      pauseTime:  6,
      autoNext:   '_bf2'
    },
    _bf2: {
      msg:        '<i>Jeg skal åpne en konto i banken.</i>',
      trans:      'Zamierzam otworzyć konto w banku.',
      startTime:  116,
      duration:   118 - 116,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bh1: {
      spokenWord: 'Powiedz: Otworzę konto w banku. Bez użycia skal.',
      startTime:  126,
      duration:   128.5 - 126,
      pauseTime:  6,
      autoNext:   '_bh2'
    },
    _bh2: {
      msg:        '<i>Jeg åpner en konto i banken.</i>',
      trans:      'Otworzę konto w banku.',
      startTime:  130,
      duration:   131.5 - 130,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bi1: {
      spokenWord: 'Powiedz: Jutro będę rozmawiał z szefem. Użyj skal.',
      startTime:  133,
      duration:   134.5 - 133,
      pauseTime:  5,
      autoNext:   '_bi2'
    },
    _bi2: {
      msg:        '<i>Jeg skal snakke med sjefen i morgen.</i>',
      trans:      'Jutro będę rozmawiał z szefem.',
      startTime:  136,
      duration:   137.5 - 136,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bj1: {
      spokenWord: 'Powiedz: Jutro porozmawiam z szefem. Bez użycia skal.',
      startTime:  139,
      duration:   140.5 - 139,
      pauseTime:  5,
      autoNext:   '_bj2'
    },
    _bj2: {
      msg:        '<i>Jeg snakker med sjefen i morgen.</i>',
      trans:      'Jutro porozmawiam z szefem.',
      startTime:  142,
      duration:   143.5 - 142,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bk1: {
      spokenWord: 'Powiedz: W czwartek idę do fizjoterapeuty. Użyj skal. [fysioterapøyt]',
      startTime:  145,
      duration:   147 - 145,
      pauseTime:  5,
      autoNext:   '_bk2'
    },
    _bk2: {
      msg:        '<i>Jeg skal gå til fysioterapeut.</i>',
      trans:      'W czwartek idę do fizjoterapeuty.',
      startTime:  148,
      duration:   149.5 - 148,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bl1: {
      spokenWord: 'Powiedz: W czwartek idę do fizjoterapeuty. Bez użycia skal. [fysioterapøyt]',
      startTime:  145,
      duration:   147 - 145,
      pauseTime:  5,
      autoNext:   '_bl2'
    },
    _bl2: {
      msg:        '<i>Jeg går til fysjoteraput.</i>',
      trans:      'W czwartek idę do fizjoterapeuty.',
      startTime:  148,
      duration:   149.5 - 148,
      score:      'correct',
      autoNext:   'RANDOM'
    }



  };



}
</script>
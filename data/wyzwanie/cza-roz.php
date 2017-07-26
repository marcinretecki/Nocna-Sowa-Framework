<script>
function LasData() {

  this.testNotes = [
    'Slipp meg frem! – jest zachrypnięte',
    'Ti stille! – złe nagranie',
    'dodaj: Powiedz: Podaj mi sól! Rekk meg saltet!',
    'Ikke glem å komme! – złe nagranie'
  ];

  this.intro = {
    _a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w las-icon-size-2"></i>.',
      autoNext:     'ENDINTRO'/*,
      more: {
        startTime:  0,
        duration:   26  -   0,
      }*/
    }
  };


  this.chat = {


    _aa1: {
      spokenWord: 'Powiedz: Przepuść mnie!',
      startTime:  0,
      duration:   2 - 0,
      pauseTime:  5,
      autoNext:   '_aa2'
    },
    _aa2: {
      msg:        'Slipp meg frem!',
      startTime:  3,
      duration:   4.5 - 3,
      autoNext:   'RANDOM'
    },


    _ab1: {
      spokenWord: 'Powiedz: Nie dotykaj tego!',
      startTime:  5,
      duration:   7 - 5,
      pauseTime:  5,
      autoNext:   '_ab2'
    },
    _ab2: {
      msg:        'Ikke rør det!',
      startTime:  8,
      duration:   9 - 8,
      autoNext:   'RANDOM'
    },


    _ac1: {
      spokenWord: 'Powiedz: Słuchaj mnie!',
      startTime:  10,
      duration:   12 - 10,
      pauseTime:  5,
      autoNext:   '_ac2'
    },
    _ac2: {
      msg:        'Hør på meg!',
      startTime:  13,
      duration:   14 - 13,
      autoNext:   'RANDOM'
    },


    _ad1: {
      spokenWord: 'Powiedz: Usiądź!',
      startTime:  15,
      duration:   16.5 - 15,
      pauseTime:  5,
      autoNext:   '_ad2'
    },
    _ad2: {
      msg:        'Sett deg ned!',
      startTime:  17,
      duration:   18 - 17,
      autoNext:   'RANDOM'
    },


    //  _ae1: {
    //    spokenWord: 'Powiedz: Bądź cicho!',
    //    startTime:  ,
    //    duration:   ,
    //    pauseTime:  5,
    //    autoNext:   '_ae2'
    //  },
    //  _ae2: {
    //    msg:        'Ti stille!',
    //    startTime:  22,
    //    duration:   23 - 22,
    //    autoNext:   'RANDOM'
    //  },


    _af1: {
      spokenWord: 'Powiedz: Zamknij się!',
      startTime:  24,
      duration:   26 - 24,
      pauseTime:  5,
      autoNext:   '_af2'
    },
    _af2: {
      msg:        'Hold kjeft!',
      startTime:  27,
      duration:   28 - 27,
      autoNext:   'RANDOM'
    },


    _ag1: {
      spokenWord: 'Powiedz: Nie pal!',
      startTime:  29,
      duration:   30.5 - 29,
      pauseTime:  5,
      autoNext:   '_ag2'
    },
    _ag2: {
      msg:        'Ikke røyk!',
      startTime:  31,
      duration:   32   - 31,
      autoNext:   'RANDOM'
    },


    _ah1: {
      spokenWord: 'Powiedz: Nie pij!',
      startTime:  33,
      duration:   34.5 - 33,
      pauseTime:  5,
      autoNext:   '_ah2'
    },
    _ah2: {
      msg:        'Ikke drikk!',
      startTime:  36,
      duration:   37 - 36,
      autoNext:   'RANDOM'
    },


    _aj1: {
      spokenWord: 'Powiedz: Zaczekaj chwilę!',
      startTime:  38,
      duration:   40 - 38,
      pauseTime:  5,
      autoNext:   '_aj2'
    },
    _aj2: {
      msg:        'Vent litt!',
      startTime:  41,
      duration:   42 - 41,
      autoNext:   'RANDOM'
    },


    _ai1: {
      spokenWord: 'Powiedz: Sprawdź to!',
      startTime:  43,
      duration:   45 - 43,
      pauseTime:  5,
      autoNext:   '_ai2'
    },
    _ai2: {
      msg:        'Sjekk det!',
      startTime:  46,
      duration:   47 - 46,
      autoNext:   'RANDOM'
    },


    _ak1: {
      spokenWord: 'Powiedz: Trzymaj psa!',
      startTime:  48,
      duration:   50 - 48,
      pauseTime:  5,
      autoNext:   '_ak2'
    },
    _ak2: {
      msg:        'Hold hunden!',
      startTime:  51,
      duration:   52 - 51,
      autoNext:   'RANDOM'
    },


    _al1: {
      spokenWord: 'Powiedz: Zamknij drzwi!',
      startTime:  53,
      duration:   55 - 53,
      pauseTime:  5,
      autoNext:   '_al2'
    },
    _al2: {
      msg:        'Lukk døra!',
      startTime:  56,
      duration:   57 - 56,
      autoNext:   'RANDOM'
    },


    _ba1: {
      spokenWord: 'Powiedz: Nie bijcie się!',
      startTime:  58,
      duration:   60 - 58,
      pauseTime:  6,
      autoNext:   '_ba2'
    },
    _ba2: {
      msg:        'Ikke slå hverandre!',
      startTime:  61,
      duration:   62.5 - 61,
      autoNext:   'RANDOM'
    },


    _bb1: {
      spokenWord: 'Powiedz: Przestań krzyczeć!',
      startTime:  64,
      duration:   66 - 64,
      pauseTime:  5,
      autoNext:   '_bb2'
    },
    _bb2: {
      msg:        'Stopp å skrike!',
      startTime:  67,
      duration:   68.5 - 67,
      autoNext:   'RANDOM'
    },


    _bc1: {
      spokenWord: 'Powiedz: Pozwól mi zobaczyć!',
      startTime:  70,
      duration:   72 - 70,
      pauseTime:  5,
      autoNext:   '_bc2'
    },
    _bc2: {
      msg:        'La meg se!',
      startTime:  73,
      duration:   74 - 73,
      autoNext:   'RANDOM'
    },


    _bd1: {
      spokenWord: 'Powiedz: Pozwól mi coś powiedzieć!',
      startTime:  75,
      duration:   77.5 - 75,
      pauseTime:  5,
      autoNext:   '_bd2'
    },
    _bd2: {
      msg:        'La meg si noe!',
      startTime:  79,
      duration:   80.5 - 79,
      autoNext:   'RANDOM'
    },


    _be1: {
      spokenWord: 'Powiedz: Weź to ze spokojem!',
      startTime:  82,
      duration:   84.5 - 82,
      pauseTime:  5,
      autoNext:   '_be2'
    },
    _be2: {
      msg:        'Ta det med ro!',
      startTime:  86,
      duration:   87 - 86,
      autoNext:   'RANDOM'
    },


    _bf1: {
      spokenWord: 'Powiedz: Nie płacz!',
      startTime:  88,
      duration:   90 - 88,
      pauseTime:  5,
      autoNext:   '_bf2'
    },
    _bf2: {
      msg:        'Ikke gråt!',
      startTime:  91,
      duration:   92.5 - 91,
      autoNext:   'RANDOM'
    },


    _bg1: {
      spokenWord: 'Powiedz: Przyjdź!',
      startTime:  94,
      duration:   96 - 94,
      pauseTime:  5,
      autoNext:   '_bg2'
    },
    _bg2: {
      msg:        'Kom!',
      startTime:  97,
      duration:   98 - 97,
      autoNext:   'RANDOM'
    },


    _bh1: {
      spokenWord: 'Powiedz: Wyluzuj!',
      startTime:  99,
      duration:   101 - 99,
      pauseTime:  5,
      autoNext:   '_bh2'
    },
    _bh2: {
      msg:        'Slapp av!',
      startTime:  102,
      duration:   103 - 102,
      autoNext:   'RANDOM'
    },


    _bi1: {
      spokenWord: 'Powiedz: Nie spiesz się i nie stresuj!',
      startTime:  104,
      duration:   106.5 - 104,
      pauseTime:  5,
      autoNext:   '_bi2'
    },
    _bi2: {
      msg:        'Ikke stress!',
      startTime:  108,
      duration:   109 - 108,
      autoNext:   'RANDOM'
    },


    _bk1: {
      spokenWord: 'Powiedz: Oddychaj głęboko!',
      startTime:  110,
      duration:   112 - 110,
      pauseTime:  5,
      autoNext:   '_bk2'
    },
    _bk2: {
      msg:        'Pust dypt!',
      startTime:  113,
      duration:   114 - 113,
      autoNext:   'RANDOM'
    },


    _bl1: {
      spokenWord: 'Powiedz: Uspokój się!',
      startTime:  115,
      duration:   117 - 115,
      pauseTime:  5,
      autoNext:   '_bl2'
    },
    _bl2: {
      msg:        'Ro deg ned!',
      startTime:  118,
      duration:   119 - 118,
      autoNext:   'RANDOM'
    },


    _bm1: {
      spokenWord: 'Powiedz: Nie zapomnij przyjść!',
      startTime:  120,
      duration:   122.5 - 120,
      pauseTime:  5,
      autoNext:   '_bm2'
    },
    _bm2: {
      msg:        'Ikke glem å komme!',
      startTime:  124,
      duration:   125.5 - 124,
      autoNext:   'RANDOM'
    },


    _bn1: {
      spokenWord: 'Powiedz: Bądź ostrożny! Uważaj!',
      startTime:  127,
      duration:   130.5 - 127,
      pauseTime:  5,
      autoNext:   '_bn2'
    },
    _bn2: {
      msg:        'Vær forsiktig!',
      startTime:  132,
      duration:   133 - 132,
      autoNext:   'RANDOM'
    },


    _bp1: {
      spokenWord: 'Powiedz: Pomóż mi!',
      startTime:  134,
      duration:   135.5 - 134,
      pauseTime:  5,
      autoNext:   '_bp2'
    },
    _bp2: {
      msg:        'Hjelp meg!',
      startTime:  137,
      duration:   138 - 137,
      autoNext:   'RANDOM'
    },


    _bo1: {
      spokenWord: 'Powiedz: Bądź tak miły! albo Poproszę.',
      startTime:  139,
      duration:   143 - 139,
      pauseTime:  5,
      autoNext:   '_bo2'
    },
    _bo2: {
      msg:        'Vær så snill!',
      startTime:  144,
      duration:   145 - 144,
      autoNext:   'RANDOM'
    },


    _br1: {
      spokenWord: 'Powiedz: Zrób to!',
      startTime:  146,
      duration:   147.5 - 146,
      pauseTime:  5,
      autoNext:   '_br2'
    },
    _br2: {
      msg:        'Gjør det!',
      startTime:  149,
      duration:   150 - 149,
      autoNext:   'RANDOM'
    }



  };


  this.end = {

    _end1: {
      msg:        'END',
      startTime:  0,
      duration:   0,
    }

  };



}
</script>
<script>
function LasAudioData() {

  this.testNotes = [
    'Slipp meg frem! – jest zachrypnięte',
    'Ti stille! – złe nagranie',
    'dodaj: Powiedz: Podaj mi sól! Rekk meg saltet!',
    'Ikke glem å komme! – złe nagranie'
  ];

  this.intro = {
    a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:     'ENDINTRO'/*,
      more: {
        startTime:  0,
        duration:   26  -   0,
      }*/
    }
  };


  this.chat = {


    aa1: {
      spokenWord: 'Powiedz: Przepuść mnie!',
      startTime:  0,
      duration:   2 - 0,
      pauseTime:  5,
      autoNext:   'aa2'
    },
    aa2: {
      msg:        'Slipp meg frem!',
      startTime:  3,
      duration:   4.5 - 3,
      autoNext:   'RANDOM'
    },


    ab1: {
      spokenWord: 'Powiedz: Nie dotykaj tego!',
      startTime:  5,
      duration:   7 - 5,
      pauseTime:  5,
      autoNext:   'ab2'
    },
    ab2: {
      msg:        'Ikke rør det!',
      startTime:  8,
      duration:   9 - 8,
      autoNext:   'RANDOM'
    },


    ac1: {
      spokenWord: 'Powiedz: Słuchaj mnie!',
      startTime:  10,
      duration:   12 - 10,
      pauseTime:  5,
      autoNext:   'ac2'
    },
    ac2: {
      msg:        'Hør på meg!',
      startTime:  13,
      duration:   14 - 13,
      autoNext:   'RANDOM'
    },


    ad1: {
      spokenWord: 'Powiedz: Usiądź!',
      startTime:  15,
      duration:   16.5 - 15,
      pauseTime:  5,
      autoNext:   'ad2'
    },
    ad2: {
      msg:        'Sett deg ned!',
      startTime:  17,
      duration:   18 - 17,
      autoNext:   'RANDOM'
    },


    //  ae1: {
    //    spokenWord: 'Powiedz: Bądź cicho!',
    //    startTime:  ,
    //    duration:   ,
    //    pauseTime:  5,
    //    autoNext:   'ae2'
    //  },
    //  ae2: {
    //    msg:        'Ti stille!',
    //    startTime:  22,
    //    duration:   23 - 22,
    //    autoNext:   'RANDOM'
    //  },


    af1: {
      spokenWord: 'Powiedz: Zamknij się!',
      startTime:  24,
      duration:   26 - 24,
      pauseTime:  5,
      autoNext:   'af2'
    },
    af2: {
      msg:        'Hold kjeft!',
      startTime:  27,
      duration:   28 - 27,
      autoNext:   'RANDOM'
    },


    ag1: {
      spokenWord: 'Powiedz: Nie pal!',
      startTime:  29,
      duration:   30.5 - 29,
      pauseTime:  5,
      autoNext:   'ag2'
    },
    ag2: {
      msg:        'Ikke røyk!',
      startTime:  31,
      duration:   32   - 31,
      autoNext:   'RANDOM'
    },


    ah1: {
      spokenWord: 'Powiedz: Nie pij!',
      startTime:  33,
      duration:   34.5 - 33,
      pauseTime:  5,
      autoNext:   'ah2'
    },
    ah2: {
      msg:        'Ikke drikk!',
      startTime:  36,
      duration:   37 - 36,
      autoNext:   'RANDOM'
    },


    aj1: {
      spokenWord: 'Powiedz: Zaczekaj chwilę!',
      startTime:  38,
      duration:   40 - 38,
      pauseTime:  5,
      autoNext:   'aj2'
    },
    aj2: {
      msg:        'Vent litt!',
      startTime:  41,
      duration:   42 - 41,
      autoNext:   'RANDOM'
    },


    ai1: {
      spokenWord: 'Powiedz: Sprawdź to!',
      startTime:  43,
      duration:   45 - 43,
      pauseTime:  5,
      autoNext:   'ai2'
    },
    ai2: {
      msg:        'Sjekk det!',
      startTime:  46,
      duration:   47 - 46,
      autoNext:   'RANDOM'
    },


    ak1: {
      spokenWord: 'Powiedz: Trzymaj psa!',
      startTime:  48,
      duration:   50 - 48,
      pauseTime:  5,
      autoNext:   'ak2'
    },
    ak2: {
      msg:        'Hold hunden!',
      startTime:  51,
      duration:   52 - 51,
      autoNext:   'RANDOM'
    },


    al1: {
      spokenWord: 'Powiedz: Zamknij drzwi!',
      startTime:  53,
      duration:   55 - 53,
      pauseTime:  5,
      autoNext:   'al2'
    },
    al2: {
      msg:        'Lukk døra!',
      startTime:  56,
      duration:   57 - 56,
      autoNext:   'RANDOM'
    },


    ba1: {
      spokenWord: 'Powiedz: Nie bijcie się!',
      startTime:  58,
      duration:   60 - 58,
      pauseTime:  6,
      autoNext:   'ba2'
    },
    ba2: {
      msg:        'Ikke slå hverandre!',
      startTime:  61,
      duration:   62.5 - 61,
      autoNext:   'RANDOM'
    },


    bb1: {
      spokenWord: 'Powiedz: Przestań krzyczeć!',
      startTime:  64,
      duration:   66 - 64,
      pauseTime:  5,
      autoNext:   'bb2'
    },
    bb2: {
      msg:        'Stopp å skrike!',
      startTime:  67,
      duration:   68.5 - 67,
      autoNext:   'RANDOM'
    },


    bc1: {
      spokenWord: 'Powiedz: Pozwól mi zobaczyć!',
      startTime:  70,
      duration:   72 - 70,
      pauseTime:  5,
      autoNext:   'bc2'
    },
    bc2: {
      msg:        'La meg se!',
      startTime:  73,
      duration:   74 - 73,
      autoNext:   'RANDOM'
    },


    bd1: {
      spokenWord: 'Powiedz: Pozwól mi coś powiedzieć!',
      startTime:  75,
      duration:   77.5 - 75,
      pauseTime:  5,
      autoNext:   'bd2'
    },
    bd2: {
      msg:        'La meg si noe!',
      startTime:  79,
      duration:   80.5 - 79,
      autoNext:   'RANDOM'
    },


    be1: {
      spokenWord: 'Powiedz: Weź to ze spokojem!',
      startTime:  82,
      duration:   84.5 - 82,
      pauseTime:  5,
      autoNext:   'be2'
    },
    be2: {
      msg:        'Ta det med ro!',
      startTime:  86,
      duration:   87 - 86,
      autoNext:   'RANDOM'
    },


    bf1: {
      spokenWord: 'Powiedz: Nie płacz!',
      startTime:  88,
      duration:   90 - 88,
      pauseTime:  5,
      autoNext:   'bf2'
    },
    bf2: {
      msg:        'Ikke gråt!',
      startTime:  91,
      duration:   92.5 - 91,
      autoNext:   'RANDOM'
    },


    bg1: {
      spokenWord: 'Powiedz: Przyjdź!',
      startTime:  94,
      duration:   96 - 94,
      pauseTime:  5,
      autoNext:   'bg2'
    },
    bg2: {
      msg:        'Kom!',
      startTime:  97,
      duration:   98 - 97,
      autoNext:   'RANDOM'
    },


    bh1: {
      spokenWord: 'Powiedz: Wyluzuj!',
      startTime:  99,
      duration:   101 - 99,
      pauseTime:  5,
      autoNext:   'bh2'
    },
    bh2: {
      msg:        'Slapp av!',
      startTime:  102,
      duration:   103 - 102,
      autoNext:   'RANDOM'
    },


    bi1: {
      spokenWord: 'Powiedz: Nie spiesz się i nie stresuj!',
      startTime:  104,
      duration:   106.5 - 104,
      pauseTime:  5,
      autoNext:   'bi2'
    },
    bi2: {
      msg:        'Ikke stress!',
      startTime:  108,
      duration:   109 - 108,
      autoNext:   'RANDOM'
    },


    bk1: {
      spokenWord: 'Powiedz: Oddychaj głęboko!',
      startTime:  110,
      duration:   112 - 110,
      pauseTime:  5,
      autoNext:   'bk2'
    },
    bk2: {
      msg:        'Pust dypt!',
      startTime:  113,
      duration:   114 - 113,
      autoNext:   'RANDOM'
    },


    bl1: {
      spokenWord: 'Powiedz: Uspokój się!',
      startTime:  115,
      duration:   117 - 115,
      pauseTime:  5,
      autoNext:   'bl2'
    },
    bl2: {
      msg:        'Ro deg ned!',
      startTime:  118,
      duration:   119 - 118,
      autoNext:   'RANDOM'
    },


    bm1: {
      spokenWord: 'Powiedz: Nie zapomnij przyjść!',
      startTime:  120,
      duration:   122.5 - 120,
      pauseTime:  5,
      autoNext:   'bm2'
    },
    bm2: {
      msg:        'Ikke glem å komme!',
      startTime:  124,
      duration:   125.5 - 124,
      autoNext:   'RANDOM'
    },


    bn1: {
      spokenWord: 'Powiedz: Bądź ostrożny! Uważaj!',
      startTime:  127,
      duration:   130.5 - 127,
      pauseTime:  5,
      autoNext:   'bn2'
    },
    bn2: {
      msg:        'Vær forsiktig!',
      startTime:  132,
      duration:   133 - 132,
      autoNext:   'RANDOM'
    },


    bp1: {
      spokenWord: 'Powiedz: Pomóż mi!',
      startTime:  134,
      duration:   135.5 - 134,
      pauseTime:  5,
      autoNext:   'bp2'
    },
    bp2: {
      msg:        'Hjelp meg!',
      startTime:  137,
      duration:   138 - 137,
      autoNext:   'RANDOM'
    },


    bo1: {
      spokenWord: 'Powiedz: Bądź tak miły! albo Poproszę.',
      startTime:  139,
      duration:   143 - 139,
      pauseTime:  5,
      autoNext:   'bo2'
    },
    bo2: {
      msg:        'Vær så snill!',
      startTime:  144,
      duration:   145 - 144,
      autoNext:   'RANDOM'
    },


    br1: {
      spokenWord: 'Powiedz: Zrób to!',
      startTime:  146,
      duration:   147.5 - 146,
      pauseTime:  5,
      autoNext:   'br2'
    },
    br2: {
      msg:        'Gjør det!',
      startTime:  149,
      duration:   150 - 149,
      autoNext:   'RANDOM'
    }



  };


  this.end = {

    end1: {
      msg:        'END',
      startTime:  0,
      duration:   0,
    }

  };



}
</script>
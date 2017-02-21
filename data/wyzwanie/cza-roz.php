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
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO'/*,
      more: { startTime: 0, stopTime: 26 }*/
    }
  };


  this.chat = {


    aa1: {
      spokenWord: 'Powiedz: Przepuść mnie!',
      startTime:  0,
      stopTime:   2,
      pauseTime:  5,
      autoNext:   'aa2'
    },
    aa2: {
      msg:        'Slipp meg frem!',
      startTime:  3,
      stopTime:   4.5,
      autoNext:   'RANDOM'
    },


    ab1: {
      spokenWord: 'Powiedz: Nie dotykaj tego!',
      startTime:  5,
      stopTime:   7,
      pauseTime:  5,
      autoNext:   'ab2'
    },
    ab2: {
      msg:        'Ikke rør det!',
      startTime:  8,
      stopTime:   9,
      autoNext:   'RANDOM'
    },


    ac1: {
      spokenWord: 'Powiedz: Słuchaj mnie!',
      startTime:  10,
      stopTime:   12,
      pauseTime:  5,
      autoNext:   'ac2'
    },
    ac2: {
      msg:        'Hør på meg!',
      startTime:  13,
      stopTime:   14,
      autoNext:   'RANDOM'
    },


    ad1: {
      spokenWord: 'Powiedz: Usiądź!',
      startTime:  15,
      stopTime:   16.5,
      pauseTime:  5,
      autoNext:   'ad2'
    },
    ad2: {
      msg:        'Sett deg ned!',
      startTime:  17,
      stopTime:   18,
      autoNext:   'RANDOM'
    },


    ae1: {
      spokenWord: 'Powiedz: Bądź cicho!',
      startTime:  ,
      stopTime:   ,
      pauseTime:  5,
      autoNext:   'ae2'
    },
    ae2: {
      msg:        'Ti stille!',
      startTime:  22,
      stopTime:   23,
      autoNext:   'RANDOM'
    },


    af1: {
      spokenWord: 'Powiedz: Zamknij się!',
      startTime:  24,
      stopTime:   26,
      pauseTime:  5,
      autoNext:   'af2'
    },
    af2: {
      msg:        'Hold kjeft!',
      startTime:  27,
      stopTime:   28,
      autoNext:   'RANDOM'
    },


    ag1: {
      spokenWord: 'Powiedz: Nie pal!',
      startTime:  29,
      stopTime:   30.5,
      pauseTime:  5,
      autoNext:   'ag2'
    },
    ag2: {
      msg:        'Ikke røyk!',
      startTime:  31,
      stopTime:   32  ,
      autoNext:   'RANDOM'
    },


    ah1: {
      spokenWord: 'Powiedz: Nie pij!',
      startTime:  33,
      stopTime:   34.5,
      pauseTime:  5,
      autoNext:   'ah2'
    },
    ah2: {
      msg:        'Ikke drikk!',
      startTime:  36,
      stopTime:   37,
      autoNext:   'RANDOM'
    },


    aj1: {
      spokenWord: 'Powiedz: Zaczekaj chwilę!',
      startTime:  38,
      stopTime:   40,
      pauseTime:  5,
      autoNext:   'aj2'
    },
    aj2: {
      msg:        'Vent litt!',
      startTime:  41,
      stopTime:   42,
      autoNext:   'RANDOM'
    },


    ai1: {
      spokenWord: 'Powiedz: Sprawdź to!',
      startTime:  43,
      stopTime:   45,
      pauseTime:  5,
      autoNext:   'ai2'
    },
    ai2: {
      msg:        'Sjekk det!',
      startTime:  46,
      stopTime:   47,
      autoNext:   'RANDOM'
    },


    ak1: {
      spokenWord: 'Powiedz: Trzymaj psa!',
      startTime:  48,
      stopTime:   50,
      pauseTime:  5,
      autoNext:   'ak2'
    },
    ak2: {
      msg:        'Hold hunden!',
      startTime:  51,
      stopTime:   52,
      autoNext:   'RANDOM'
    },


    al1: {
      spokenWord: 'Powiedz: Zamknij drzwi!',
      startTime:  53,
      stopTime:   55,
      pauseTime:  5,
      autoNext:   'al2'
    },
    al2: {
      msg:        'Lukk døra!',
      startTime:  56,
      stopTime:   57,
      autoNext:   'RANDOM'
    },


    ba1: {
      spokenWord: 'Powiedz: Nie bijcie się!',
      startTime:  58,
      stopTime:   60,
      pauseTime:  6,
      autoNext:   'ba2'
    },
    ba2: {
      msg:        'Ikke slå hverandre!',
      startTime:  61,
      stopTime:   62.5,
      autoNext:   'RANDOM'
    },


    bb1: {
      spokenWord: 'Powiedz: Przestań krzyczeć!',
      startTime:  64,
      stopTime:   66,
      pauseTime:  5,
      autoNext:   'bb2'
    },
    bb2: {
      msg:        'Stopp å skrike!',
      startTime:  67,
      stopTime:   68.5,
      autoNext:   'RANDOM'
    },


    bc1: {
      spokenWord: 'Powiedz: Pozwól mi zobaczyć!',
      startTime:  70,
      stopTime:   72,
      pauseTime:  5,
      autoNext:   'bc2'
    },
    bc2: {
      msg:        'La meg se!',
      startTime:  73,
      stopTime:   74,
      autoNext:   'RANDOM'
    },


    bd1: {
      spokenWord: 'Powiedz: Pozwól mi coś powiedzieć!',
      startTime:  75,
      stopTime:   77.5,
      pauseTime:  5,
      autoNext:   'bd2'
    },
    bd2: {
      msg:        'La meg si noe!',
      startTime:  79,
      stopTime:   80.5,
      autoNext:   'RANDOM'
    },


    be1: {
      spokenWord: 'Powiedz: Weź to ze spokojem!',
      startTime:  82,
      stopTime:   84.5,
      pauseTime:  5,
      autoNext:   'be2'
    },
    be2: {
      msg:        'Ta det med ro!',
      startTime:  86,
      stopTime:   87,
      autoNext:   'RANDOM'
    },


    bf1: {
      spokenWord: 'Powiedz: Nie płacz!',
      startTime:  88,
      stopTime:   90,
      pauseTime:  5,
      autoNext:   'bf2'
    },
    bf2: {
      msg:        'Ikke gråt!',
      startTime:  91,
      stopTime:   92.5,
      autoNext:   'RANDOM'
    },


    bg1: {
      spokenWord: 'Powiedz: Przyjdź!',
      startTime:  94,
      stopTime:   96,
      pauseTime:  5,
      autoNext:   'bg2'
    },
    bg2: {
      msg:        'Kom!',
      startTime:  97,
      stopTime:   98,
      autoNext:   'RANDOM'
    },


    bh1: {
      spokenWord: 'Powiedz: Wyluzuj!',
      startTime:  99,
      stopTime:   101,
      pauseTime:  5,
      autoNext:   'bh2'
    },
    bh2: {
      msg:        'Slapp av!',
      startTime:  102,
      stopTime:   103,
      autoNext:   'RANDOM'
    },


    bi1: {
      spokenWord: 'Powiedz: Nie spiesz się i nie stresuj!',
      startTime:  104,
      stopTime:   106.5,
      pauseTime:  5,
      autoNext:   'bi2'
    },
    bi2: {
      msg:        'Ikke stress!',
      startTime:  108,
      stopTime:   109,
      autoNext:   'RANDOM'
    },


    bk1: {
      spokenWord: 'Powiedz: Oddychaj głęboko!',
      startTime:  110,
      stopTime:   112,
      pauseTime:  5,
      autoNext:   'bk2'
    },
    bk2: {
      msg:        'Pust dypt!',
      startTime:  113,
      stopTime:   114,
      autoNext:   'RANDOM'
    },


    bl1: {
      spokenWord: 'Powiedz: Uspokój się!',
      startTime:  115,
      stopTime:   117,
      pauseTime:  5,
      autoNext:   'bl2'
    },
    bl2: {
      msg:        'Ro deg ned!',
      startTime:  118,
      stopTime:   119,
      autoNext:   'RANDOM'
    },


    bm1: {
      spokenWord: 'Powiedz: Nie zapomnij przyjść!',
      startTime:  120,
      stopTime:   122.5,
      pauseTime:  5,
      autoNext:   'bm2'
    },
    bm2: {
      msg:        'Ikke glem å komme!',
      startTime:  124,
      stopTime:   125.5,
      autoNext:   'RANDOM'
    },


    bn1: {
      spokenWord: 'Powiedz: Bądź ostrożny! Uważaj!',
      startTime:  127,
      stopTime:   130.5,
      pauseTime:  5,
      autoNext:   'bn2'
    },
    bn2: {
      msg:        'Vær forsiktig!',
      startTime:  132,
      stopTime:   133,
      autoNext:   'RANDOM'
    },


    bp1: {
      spokenWord: 'Powiedz: Pomóż mi!',
      startTime:  134,
      stopTime:   135.5,
      pauseTime:  5,
      autoNext:   'bp2'
    },
    bp2: {
      msg:        'Hjelp meg!',
      startTime:  137,
      stopTime:   138,
      autoNext:   'RANDOM'
    },


    bo1: {
      spokenWord: 'Powiedz: Bądź tak miły! albo Poproszę.',
      startTime:  139,
      stopTime:   143,
      pauseTime:  5,
      autoNext:   'bo2'
    },
    bo2: {
      msg:        'Vær så snill!',
      startTime:  144,
      stopTime:   145,
      autoNext:   'RANDOM'
    },


    br1: {
      spokenWord: 'Powiedz: Zrób to!',
      startTime:  146,
      stopTime:   147.5,
      pauseTime:  5,
      autoNext:   'br2'
    },
    br2: {
      msg:        'Gjør det!',
      startTime:  149,
      stopTime:   150,
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
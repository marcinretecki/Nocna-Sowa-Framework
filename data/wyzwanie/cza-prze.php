<script>
function LasData() {

  this.testNotes = [
    'dwa przykłady mają jakiś błąd',
    'czy gwarancja powinna być z rodzajnikiem?',
    'Vi drar ikke til Stavanger. - zrobic moze znak zapytania i napisac im ze moze byc reise',
    'jak powiesz nie wiem: jeg sier ikke noe',
    'nigdzie nie idziemy, czy da sie inaczej poprawnie to samo powiedziec w znaku zapytania'
  ];

  this.intro = {
    _a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w las-icon-size-2"></i>.',
      autoNext:     'ENDINTRO'/*,
      more: {
        startTime:  0,
        duration:   26 -   0,
      }*/
    }
  };


  this.chat = {

    _aa1: {
      spokenWord: 'Powiedz: Telefon nie leży na szafce.',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_aa2'
    },
    _aa2: {
      msg:        'Mobilen ligger ikke på skapet.',
      startTime:  4,
      duration:   6.5 - 4,
      more:       {
        spokenWord: 'En mobil to skrót od en mobiltelefon.',
        startTime:  0,
        duration:   0 - 0,
      },
      autoNext:   'RANDOM'
    },


    _ab1: {
      spokenWord: 'Oni nie mieszkają razem.',
      startTime:  8,
      duration:   10.5 - 8,
      pauseTime:  6,
      autoNext:   '_ab2'
    },
    _ab2: {
      msg:        'De bor ikke sammen.',
      startTime:  12,
      duration:   13.5 - 12,
      autoNext:   'RANDOM'
    },


    _ac1: {
      spokenWord: 'One nie lubią dzwonić.',
      startTime:  15,
      duration:   18 - 15,
      pauseTime:  6,
      autoNext:   '_ac2'
    },
    _ac2: {
      msg:        'De liker ikke å ringe.',
      startTime:  19,
      duration:   21 - 19,
      autoNext:   'RANDOM'
    },


    _ae1: {
      spokenWord: 'Ona nie daje rady.',
      startTime:  29,
      duration:   31.5 - 29,
      pauseTime:  5,
      autoNext:   '_ae2'
    },
    _ae2: {
      msg:        'Hun klarer ikke.',
      startTime:  33,
      duration:   34.5 - 33,
      autoNext:   'RANDOM'
    },


    /*  złe nagranie
    _af1: {
      spokenWord: 'Mężczyzna nie mówi wszystkiego.',
      startTime:  36,
      duration:   39 - 36,
      pauseTime:  6,
      autoNext:   '_af2'
    },
    _af2: {
      msg:        'Mannen sier ikke alt.',
      startTime:  40,
      duration:   42 - 40,
      autoNext:   'RANDOM'
    },*/


    _ah1: {
      spokenWord: 'Dzieci nie lubią czekać.',
      startTime:  43,
      duration:   45.5 - 43,
      pauseTime:  6,
      autoNext:   '_ah2'
    },
    _ah2: {
      msg:        'Barna liker ikke å vente.',
      startTime:  47,
      duration:   49 - 47,
      autoNext:   'RANDOM'
    },


    _aj1: {
      spokenWord: 'Rodzice nie słuchają dzieci.',
      startTime:  50,
      duration:   52.5 - 50,
      pauseTime:  6,
      autoNext:   '_aj2'
    },
    _aj2: {
      msg:        'Foreldrene hører ikke på barna.',
      startTime:  54,
      duration:   56 - 54,
      autoNext:   'RANDOM'
    },


    _ai1: {
      spokenWord: 'Tor nie wierzy.',
      startTime:  57,
      duration:   59 - 57,
      pauseTime:  5,
      autoNext:   '_ai2'
    },
    _ai2: {
      msg:        'Tor tror ikke.',
      startTime:  60,
      duration:   61.5 - 60,
      autoNext:   'RANDOM'
    },


    _ak1: {
      spokenWord: 'Nie rozumiem wszystkiego.',
      startTime:  63,
      duration:   65.5 - 63,
      pauseTime:  5,
      autoNext:   '_ak2'
    },
    _ak2: {
      msg:        'Jeg forstår ikke alt.',
      startTime:  67,
      duration:   68.5 - 67,
      autoNext:   'RANDOM'
    },


    _al1: {
      spokenWord: 'Nie jedziemy do Stavanger.',
      startTime:  70,
      duration:   72.5 - 70,
      pauseTime:  6,
      autoNext:   '_al2'
    },
    _al2: {
      msg:        'Vi drar ikke til Stavanger.',
      startTime:  74,
      duration:   76 - 74,
      autoNext:   'RANDOM'
    },


    _ba1: {
      spokenWord: 'Sprzedawca nie daje gwarancji.',
      startTime:  77,
      duration:   79.5 - 77,
      pauseTime:  8,
      autoNext:   '_ba2'
    },
    _ba2: {
      msg:        'Selgeren gir ikke en garanti.',
      startTime:  81,
      duration:   83.5 - 81,
      autoNext:   'RANDOM'
    },


    _bb1: {
      spokenWord: 'Nie zostanę królem.',
      startTime:  85,
      duration:   87.5 - 85,
      pauseTime:  5,
      autoNext:   '_bb2'
    },
    _bb2: {
      msg:        'Jeg blir ikke konge.',
      startTime:  89,
      duration:   90.5 - 89,
      autoNext:   'RANDOM'
    },


    _bc1: {
      spokenWord: 'Nigdzie nie idziemy.',
      startTime:  92,
      duration:   94 - 92,
      pauseTime:  6,
      autoNext:   '_bc2'
    },
    _bc2: {
      msg:        'Vi går ikke noe sted.',
      startTime:  95,
      duration:   97 - 95,
      autoNext:   'RANDOM'
    },


    _bd1: {
      spokenWord: 'Teresa nie bierze narkotyków.',
      startTime:  98,
      duration:   100.5 - 98,
      pauseTime:  8,
      autoNext:   '_bd2'
    },
    _bd2: {
      msg:        'Teresa tar ikke narkotika.',
      startTime:  102,
      duration:   104.5 - 102,
      autoNext:   'RANDOM'
    },


    _bf1: {
      spokenWord: 'Ona nie pije mleka.',
      startTime:  113,
      duration:   115 - 113,
      pauseTime:  6,
      autoNext:   '_bf2'
    },
    _bf2: {
      msg:        'Hun drikker ikke melk.',
      startTime:  116,
      duration:   118 - 116,
      autoNext:   'RANDOM'
    },


    _bh1: {
      spokenWord: 'Oni nie są teraz w domu.',
      startTime:  126,
      duration:   128.5 - 126,
      pauseTime:  6,
      autoNext:   '_bh2'
    },
    _bh2: {
      msg:        'De er ikke hjemme nå.',
      startTime:  130,
      duration:   131.5 - 130,
      autoNext:   'RANDOM'
    },


    _bi1: {
      spokenWord: 'Nie szkodzi.',
      startTime:  133,
      duration:   134.5 - 133,
      pauseTime:  5,
      autoNext:   '_bi2'
    },
    _bi2: {
      msg:        'Det gjør ikke noe.',
      startTime:  136,
      duration:   137.5 - 136,
      autoNext:   'RANDOM'
    },


    _bj1: {
      spokenWord: 'Nie wiem.',
      startTime:  139,
      duration:   140.5 - 139,
      pauseTime:  5,
      autoNext:   '_bj2'
    },
    _bj2: {
      msg:        'Jeg vet ikke.',
      startTime:  142,
      duration:   143.5 - 142,
      autoNext:   'RANDOM'
    },


    _bk1: {
      spokenWord: 'Nic nie powiem.',
      startTime:  145,
      duration:   147 - 145,
      pauseTime:  5,
      autoNext:   '_bk2'
    },
    _bk2: {
      msg:        'Jeg sier ikke noe.',
      startTime:  148,
      duration:   149.5 - 148,
      autoNext:   'RANDOM'
    },


    _bm1: {
      spokenWord: '??? ZNIKŁ PRZYKŁAD Z IA',
      startTime:  158,
      duration:   160 - 158,
      pauseTime:  6,
      autoNext:   '_bm2'
    },
    _bm2: {
      msg:        'Vi trenger ikke å rydde.',
      startTime:  161,
      duration:   163 - 161,
      autoNext:   'RANDOM'
    },


    _bo1: {
      spokenWord: 'Ona nie przestaje rozmawiać.',
      startTime:  178,
      duration:   180.5 - 178,
      pauseTime:  6,
      autoNext:   '_bo2'
    },
    _bo2: {
      msg:        'Hun stopper ikke å snakke.',
      startTime:  182,
      duration:   184 - 182,
      autoNext:   'RANDOM'
    },


    _ca1: {
      spokenWord: 'On nie kończy jeszcze pracy.',
      startTime:  185,
      duration:   187.5 - 185,
      pauseTime:  7,
      autoNext:   '_ca2'
    },
    _ca2: {
      msg:        'Han slutter ikke jobben ennå.',
      startTime:  189,
      duration:   191 - 189,
      autoNext:   'RANDOM'
    },


    _cb1: {
      spokenWord: 'Ona nie próbuje zrozumieć.',
      startTime:  192,
      duration:   194.5 - 192,
      pauseTime:  6,
      autoNext:   '_cb2'
    },
    _cb2: {
      msg:        'Hun prøver ikke å forstå.',
      startTime:  196,
      duration:   197.5 - 196,
      autoNext:   'RANDOM'
    },


    _cc1: {
      spokenWord: 'Nie dostaję wiadomości.',
      startTime:  199,
      duration:   201.5 - 199,
      pauseTime:  6,
      autoNext:   '_cc2'
    },
    _cc2: {
      msg:        'Jeg får ikke meldinger.',
      startTime:  203,
      duration:   204.5 - 203,
      autoNext:   'RANDOM'
    },


    _cd1: {
      spokenWord: 'Nie lubię krwi.',
      startTime:  206,
      duration:   208 - 206,
      pauseTime:  6,
      autoNext:   '_cd2'
    },
    _cd2: {
      msg:        'Jeg liker ikke blod.',
      startTime:  209,
      duration:   210.5 - 209,
      autoNext:   'RANDOM'
    },


    _ce1: {
      spokenWord: 'Nie mam jeszcze firmy.',
      startTime:  212,
      duration:   214 - 212,
      pauseTime:  7,
      autoNext:   '_ce2'
    },
    _ce2: {
      msg:        'Jeg har ikke et firma ennå.',
      startTime:  215,
      duration:   216.5 - 215,
      autoNext:   'RANDOM'
    },


    _cf1: {
      spokenWord: 'Nie jestem jeszcze gotowy.',
      startTime:  218,
      duration:   220.5 - 218,
      pauseTime:  7,
      autoNext:   '_cf2'
    },
    _cf2: {
      msg:        'Jeg er ikke ferdig ennå.',
      startTime:  222,
      duration:   223.5 - 222,
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
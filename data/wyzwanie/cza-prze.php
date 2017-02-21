<script>
function LasAudioData() {

  this.testNotes = [
    'dwa przykłady mają jakiś błąd',
    'czy gwarancja powinna być z rodzajnikiem?',
    'Vi drar ikke til Stavanger. - zrobic moze znak zapytania i napisac im ze moze byc reise',
    'jak powiesz nie wiem: jeg sier ikke noe',
    'nigdzie nie idziemy, czy da sie inaczej poprawnie to samo powiedziec w znaku zapytania'
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
      spokenWord: 'Powiedz: Telefon nie leży na szafce.',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'aa2'
    },
    aa2: {
      msg:        'Mobilen ligger ikke på skapet.',
      startTime:  4,
      stopTime:   6.5,
      more:       {
        spokenWord: 'En mobil to skrót od en mobiltelefon.',
        startTime:  0,
        stopTime:   0,
      },
      autoNext:   'RANDOM'
    },


    ab1: {
      spokenWord: 'Oni nie mieszkają razem.',
      startTime:  8,
      stopTime:   10.5,
      pauseTime:  6,
      autoNext:   'ab2'
    },
    ab2: {
      msg:        'De bor ikke sammen.',
      startTime:  12,
      stopTime:   13.5,
      autoNext:   'RANDOM'
    },


    ac1: {
      spokenWord: 'One nie lubią dzwonić.',
      startTime:  15,
      stopTime:   18,
      pauseTime:  6,
      autoNext:   'ac2'
    },
    ac2: {
      msg:        'De liker ikke å ringe.',
      startTime:  19,
      stopTime:   21,
      autoNext:   'RANDOM'
    },


    ae1: {
      spokenWord: 'Ona nie daje rady.',
      startTime:  29,
      stopTime:   31.5,
      pauseTime:  5,
      autoNext:   'ae2'
    },
    ae2: {
      msg:        'Hun klarer ikke.',
      startTime:  33,
      stopTime:   34.5,
      autoNext:   'RANDOM'
    },


    /*  złe nagranie
    af1: {
      spokenWord: 'Mężczyzna nie mówi wszystkiego.',
      startTime:  36,
      stopTime:   39,
      pauseTime:  6,
      autoNext:   'af2'
    },
    af2: {
      msg:        'Mannen sier ikke alt.',
      startTime:  40,
      stopTime:   42,
      autoNext:   'RANDOM'
    },*/


    ah1: {
      spokenWord: 'Dzieci nie lubią czekać.',
      startTime:  43,
      stopTime:   45.5,
      pauseTime:  6,
      autoNext:   'ah2'
    },
    ah2: {
      msg:        'Barna liker ikke å vente.',
      startTime:  47,
      stopTime:   49,
      autoNext:   'RANDOM'
    },


    aj1: {
      spokenWord: 'Rodzice nie słuchają dzieci.',
      startTime:  50,
      stopTime:   52.5,
      pauseTime:  6,
      autoNext:   'aj2'
    },
    aj2: {
      msg:        'Foreldrene hører ikke på barna.',
      startTime:  54,
      stopTime:   56,
      autoNext:   'RANDOM'
    },


    ai1: {
      spokenWord: 'Tor nie wierzy.',
      startTime:  57,
      stopTime:   59,
      pauseTime:  5,
      autoNext:   'ai2'
    },
    ai2: {
      msg:        'Tor tror ikke.',
      startTime:  60,
      stopTime:   61.5,
      autoNext:   'RANDOM'
    },


    ak1: {
      spokenWord: 'Nie rozumiem wszystkiego.',
      startTime:  63,
      stopTime:   65.5,
      pauseTime:  5,
      autoNext:   'ak2'
    },
    ak2: {
      msg:        'Jeg forstår ikke alt.',
      startTime:  67,
      stopTime:   68.5,
      autoNext:   'RANDOM'
    },


    al1: {
      spokenWord: 'Nie jedziemy do Stavanger.',
      startTime:  70,
      stopTime:   72.5,
      pauseTime:  6,
      autoNext:   'al2'
    },
    al2: {
      msg:        'Vi drar ikke til Stavanger.',
      startTime:  74,
      stopTime:   76,
      autoNext:   'RANDOM'
    },


    ba1: {
      spokenWord: 'Sprzedawca nie daje gwarancji.',
      startTime:  77,
      stopTime:   79.5,
      pauseTime:  8,
      autoNext:   'ba2'
    },
    ba2: {
      msg:        'Selgeren gir ikke en garanti.',
      startTime:  81,
      stopTime:   83.5,
      autoNext:   'RANDOM'
    },


    bb1: {
      spokenWord: 'Nie zostanę królem.',
      startTime:  85,
      stopTime:   87.5,
      pauseTime:  5,
      autoNext:   'bb2'
    },
    bb2: {
      msg:        'Jeg blir ikke konge.',
      startTime:  89,
      stopTime:   90.5,
      autoNext:   'RANDOM'
    },


    bc1: {
      spokenWord: 'Nigdzie nie idziemy.',
      startTime:  92,
      stopTime:   94,
      pauseTime:  6,
      autoNext:   'bc2'
    },
    bc2: {
      msg:        'Vi går ikke noe sted.',
      startTime:  95,
      stopTime:   97,
      autoNext:   'RANDOM'
    },


    bd1: {
      spokenWord: 'Teresa nie bierze narkotyków.',
      startTime:  98,
      stopTime:   100.5,
      pauseTime:  8,
      autoNext:   'bd2'
    },
    bd2: {
      msg:        'Teresa tar ikke narkotika.',
      startTime:  102,
      stopTime:   104.5,
      autoNext:   'RANDOM'
    },


    bf1: {
      spokenWord: 'Ona nie pije mleka.',
      startTime:  113,
      stopTime:   115,
      pauseTime:  6,
      autoNext:   'bf2'
    },
    bf2: {
      msg:        'Hun drikker ikke melk.',
      startTime:  116,
      stopTime:   118,
      autoNext:   'RANDOM'
    },


    bh1: {
      spokenWord: 'Oni nie są teraz w domu.',
      startTime:  126,
      stopTime:   128.5,
      pauseTime:  6,
      autoNext:   'bh2'
    },
    bh2: {
      msg:        'De er ikke hjemme nå.',
      startTime:  130,
      stopTime:   131.5,
      autoNext:   'RANDOM'
    },


    bi1: {
      spokenWord: 'Nie szkodzi.',
      startTime:  133,
      stopTime:   134.5,
      pauseTime:  5,
      autoNext:   'bi2'
    },
    bi2: {
      msg:        'Det gjør ikke noe.',
      startTime:  136,
      stopTime:   137.5,
      autoNext:   'RANDOM'
    },


    bj1: {
      spokenWord: 'Nie wiem.',
      startTime:  139,
      stopTime:   140.5,
      pauseTime:  5,
      autoNext:   'bj2'
    },
    bj2: {
      msg:        'Jeg vet ikke.',
      startTime:  142,
      stopTime:   143.5,
      autoNext:   'RANDOM'
    },


    bk1: {
      spokenWord: 'Nic nie powiem.',
      startTime:  145,
      stopTime:   147,
      pauseTime:  5,
      autoNext:   'bk2'
    },
    bk2: {
      msg:        'Jeg sier ikke noe.',
      startTime:  148,
      stopTime:   149.5,
      autoNext:   'RANDOM'
    },


    bm1: {
      spokenWord: '??? ZNIKŁ PRZYKŁAD Z IA',
      startTime:  158,
      stopTime:   160,
      pauseTime:  6,
      autoNext:   'bm2'
    },
    bm2: {
      msg:        'Vi trenger ikke å rydde.',
      startTime:  161,
      stopTime:   163,
      autoNext:   'RANDOM'
    },


    bo1: {
      spokenWord: 'Ona nie przestaje rozmawiać.',
      startTime:  178,
      stopTime:   180.5,
      pauseTime:  6,
      autoNext:   'bo2'
    },
    bo2: {
      msg:        'Hun stopper ikke å snakke.',
      startTime:  182,
      stopTime:   184,
      autoNext:   'RANDOM'
    },


    ca1: {
      spokenWord: 'On nie kończy jeszcze pracy.',
      startTime:  185,
      stopTime:   187.5,
      pauseTime:  7,
      autoNext:   'ca2'
    },
    ca2: {
      msg:        'Han slutter ikke jobben ennå.',
      startTime:  189,
      stopTime:   191,
      autoNext:   'RANDOM'
    },


    cb1: {
      spokenWord: 'Ona nie próbuje zrozumieć.',
      startTime:  192,
      stopTime:   194.5,
      pauseTime:  6,
      autoNext:   'cb2'
    },
    cb2: {
      msg:        'Hun prøver ikke å forstå.',
      startTime:  196,
      stopTime:   197.5,
      autoNext:   'RANDOM'
    },


    cc1: {
      spokenWord: 'Nie dostaję wiadomości.',
      startTime:  199,
      stopTime:   201.5,
      pauseTime:  6,
      autoNext:   'cc2'
    },
    cc2: {
      msg:        'Jeg får ikke meldinger.',
      startTime:  203,
      stopTime:   204.5,
      autoNext:   'RANDOM'
    },


    cd1: {
      spokenWord: 'Nie lubię krwi.',
      startTime:  206,
      stopTime:   208,
      pauseTime:  6,
      autoNext:   'cd2'
    },
    cd2: {
      msg:        'Jeg liker ikke blod.',
      startTime:  209,
      stopTime:   210.5,
      autoNext:   'RANDOM'
    },


    ce1: {
      spokenWord: 'Nie mam jeszcze firmy.',
      startTime:  212,
      stopTime:   214,
      pauseTime:  7,
      autoNext:   'ce2'
    },
    ce2: {
      msg:        'Jeg har ikke et firma ennå.',
      startTime:  215,
      stopTime:   216.5,
      autoNext:   'RANDOM'
    },


    cf1: {
      spokenWord: 'Nie jestem jeszcze gotowy.',
      startTime:  218,
      stopTime:   220.5,
      pauseTime:  7,
      autoNext:   'cf2'
    },
    cf2: {
      msg:        'Jeg er ikke ferdig ennå.',
      startTime:  222,
      stopTime:   223.5,
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
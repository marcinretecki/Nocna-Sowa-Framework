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
      msg:          '<p>Teraz przećwiczysz budowanie przeczeń. Skoncentruj się na tym, żeby w odpowiednim miejscu umieścić <i>ikke</i>.</p>' + '<p>To wyzwanie powinno być dla Ciebie proste, dlatego jeszcze bardziej skup się na poprawnej wymowie.</p>',
      autoNext:     'ENDINTRO'
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
      msg:        '<i>Mobilen ligger ikke på skapet.</i>',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>De bor ikke sammen.</i>',
      startTime:  12,
      duration:   13.5 - 12,
      score:      'correct',
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
      msg:        '<i>De liker ikke å ringe.</i>',
      startTime:  19,
      duration:   21 - 19,
      score:      'correct',
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
      msg:        '<i>Hun klarer ikke.</i>',
      startTime:  33,
      duration:   34.5 - 33,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ah1: {
      spokenWord: 'Dzieci nie lubią czekać.',
      startTime:  43,
      duration:   45.5 - 43,
      pauseTime:  6,
      autoNext:   '_ah2'
    },
    _ah2: {
      msg:        '<i>Barna liker ikke å vente.</i>',
      startTime:  47,
      duration:   49 - 47,
      score:      'correct',
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
      msg:        '<i>Foreldrene hører ikke på barna.</i>',
      startTime:  54,
      duration:   56 - 54,
      score:      'correct',
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
      msg:        '<i>Tor tror ikke.</i>',
      startTime:  60,
      duration:   61.5 - 60,
      score:      'correct',
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
      msg:        '<i>Jeg forstår ikke alt.</i>',
      startTime:  67,
      duration:   68.5 - 67,
      score:      'correct',
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
      msg:        '<i>Vi drar ikke til Stavanger.</i>',
      startTime:  74,
      duration:   76 - 74,
      score:      'correct',
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
      msg:        '<i>Selgeren gir ikke en garanti.</i>',
      startTime:  81,
      duration:   83.5 - 81,
      score:      'correct',
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
      msg:        '<i>Hun drikker ikke melk.</i>',
      startTime:  116,
      duration:   118 - 116,
      score:      'correct',
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
      msg:        '<i>De er ikke hjemme nå.</i>',
      startTime:  130,
      duration:   131.5 - 130,
      score:      'correct',
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
      msg:        '<i>Det gjør ikke noe.</i>',
      startTime:  136,
      duration:   137.5 - 136,
      score:      'correct',
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
      msg:        '<i>Jeg vet ikke.</i>',
      startTime:  142,
      duration:   143.5 - 142,
      score:      'correct',
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
      msg:        '<i>Hun stopper ikke å snakke.</i>',
      startTime:  182,
      duration:   184 - 182,
      score:      'correct',
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
      msg:        '<i>Han slutter ikke jobben ennå.</i>',
      startTime:  189,
      duration:   191 - 189,
      score:      'correct',
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
      msg:        '<i>Hun prøver ikke å forstå.</i>',
      startTime:  196,
      duration:   197.5 - 196,
      score:      'correct',
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
      msg:        '<i>Jeg får ikke meldinger.</i>',
      startTime:  203,
      duration:   204.5 - 203,
      score:      'correct',
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
      msg:        '<i>Jeg har ikke et firma ennå.</i>',
      startTime:  215,
      duration:   216.5 - 215,
      score:      'correct',
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
      msg:        '<i>Jeg er ikke ferdig ennå.</i>',
      startTime:  222,
      duration:   223.5 - 222,
      score:      'correct',
      autoNext:   'RANDOM'
    }



  };


  this.extra = {

    _bm1: {
      spokenWord: 'Nie musimy sprzątać',
      startTime:  158,
      duration:   160 - 158,
      pauseTime:  6,
      autoNext:   '_bm2'
    },
    _bm2: {
      msg:        '<i>Vi trenger ikke å rydde.</i>',
      startTime:  161,
      duration:   163 - 161,
      score:      'correct',
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
      msg:        '<i>Jeg blir ikke konge.</i>',
      startTime:  89,
      duration:   90.5 - 89,
      score:      'correct',
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
      msg:        '<i>Jeg liker ikke blod.</i>',
      startTime:  209,
      duration:   210.5 - 209,
      score:      'correct',
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
      msg:        '<i>Vi går ikke noe sted.</i>',
      startTime:  95,
      duration:   97 - 95,
      score:      'correct',
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
      msg:        '<i>Teresa tar ikke narkotika.</i>',
      startTime:  102,
      duration:   104.5 - 102,
      score:      'correct',
      autoNext:   'RANDOM'
    },

    _af1: {
      spokenWord: 'Mężczyzna nie mówi wszystkiego.',
      startTime:  36,
      duration:   39 - 36,
      pauseTime:  6,
      autoNext:   '_af2'
    },
    _af2: {
      msg:        '<i>Mannen sier ikke alt.</i>',
      startTime:  40,
      duration:   42 - 40,
      score:      'correct',
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
      msg:        '<i>Jeg sier ikke noe.</i>',
      startTime:  148,
      duration:   149.5 - 148,
      score:      'correct',
      autoNext:   'RANDOM'
    },


  };


}
</script>
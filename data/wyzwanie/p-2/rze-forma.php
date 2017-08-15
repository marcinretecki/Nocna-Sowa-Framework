<script>
function LasData() {

  this.category = 'audio-test';   // chat|setninger|etc


  this.testNotes = [
    'Można dodać "mieszkanie" do bonusowych przykładów.'
  ];

  this.intro = {
    _intro1: {
      msg:        'Załóż słuchawki, jeśli chcesz. #emoji-1f3a7;',
      autoNext:   '_intro2',
    },
    _intro2: {
      msg:        '<p>W tym wyzwaniu będziesz mieć dwa zadania:</p>' +
        '<ol>' + '
        <li>wybranie poprawnej formy rzeczownika,</li>' +
        '<li>powtarzanie na głos.</li>' +
        '</ol>' +
        '<p>Drugie zadanie nie będzie punktowane, ale robisz je dla siebie, bo przecież zależy Ci na tym, żeby nauczyć się poprawnie mówić po norwesku.</p>',
      autoNext:   'ENDINTRO',
    }


  };


  this.chat = {

    _buss1: {
      spokenWord: 'Powiedz "jakiś autobus".',
      startTime:  27,
      duration:   30 - 27,
      answers: [
        { answer: '<i>en buss</i>', score: 'correct', next: '_buss2' },
        { answer: '<i>bussen</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnym autobusie, przed rzeczownikiem stoi rodzajnik.',
        startTime:  34,
        duration:   40 - 34
      }
    },
    _buss2: {
      msg:        '<i>en buss</i>',
      score:      'correct',
      startTime:  31,
      duration:   33 - 31,
      autoNext:   'RANDOM'
    },



    _mann1: {
      spokenWord: 'Powiedz "ten mężczyzna" albo "mąż":',
      startTime:  57,
      duration:   61 - 57,
      answers: [
        { answer: '<i>mannen</i>', score: 'correct', next: '_mann2' },
        { answer: '<i>en mann</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /en/ wskazuje na jednego, nieokreślonego mężczyznę. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  65,
        duration:   75 - 65
      }
    },
    _mann2: {
      msg:        '<i>mannen</i>',
      score:      'correct',
      startTime:  62,
      duration:   64 - 62,
      autoNext:   'RANDOM'
    },



    _barn1: {
      spokenWord: 'Powiedz "to dziecko":',
      startTime:  123,
      duration:   125 - 123,
      answers: [
        { answer: '<i>barnet</i>', score: 'correct', next: '_barn2' },
        { answer: '<i>et barn</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jedno, nieokreślone dziecko. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. ',
        startTime:  129,
        duration:   138 - 129
      }
    },
    _barn2: {
      msg:        '<i>barnet</i>',
      score:      'correct',
      startTime:  126,
      duration:   128 - 126,
      autoNext:   'RANDOM'
    },



    _kone1: {
      spokenWord: 'Jak powiesz "żona" w formie określonej?',
      startTime:  139,
      duration:   142 - 139,
      answers: [
        { answer: '<i>kona</i>', score: 'correct', next: '_kone2' },
        { answer: '<i>ei kone</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /ei/ wskazuje na jedną, nieokreśloną żonę. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  146,
        duration:   156 - 146
      }
    },
    _kone2: {
      msg:        '<i>kona</i>',
      score:      'correct',
      startTime:  143,
      duration:   145 - 143,
      autoNext:   'RANDOM'
    },



    _hytte1: {
      spokenWord: 'Powiedz "jakiś domek letniskowy" albo "chatka":',
      startTime:  173,
      duration:   177 - 173,
      answers: [
        { answer: '<i>ei hytte</i>', score: 'correct', next: '_hytte2' },
        { answer: '<i>hytta</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnym domku, przed rzeczownikiem stawiamy rodzajnik.',
        startTime:  181,
        duration:   187 - 181
      }
    },
    _hytte2: {
      msg:        '<i>ei hytte</i>',
      score:      'correct',
      startTime:  178,
      duration:   180 - 178,
      autoNext:   'RANDOM',
      more:       {
        spokenWord: '/ei hytte/ może oznaczać tradycyjną norweską chatkę z drewna. Norwedzy często wynajmują je na weekend, żeby pobyć bliżej natury. Niektórzy mówiąc /hytte/ mają na myśli jakikolwiek dom nad wodą lub w lesie.',
        startTime:  188,
        duration:   201 - 188
      }
    },



    _hylle1: {
      spokenWord: 'Powiedz "ta półka":',
      startTime:  202,
      duration:   204 - 202,
      answers: [
        { answer: '<i>hylla</i>', score: 'correct', next: '_hylle2' },
        { answer: '<i>ei hylle</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /ei/ wskazuje na jedną, nieokreśloną półkę. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  208,
        duration:   217 - 208
      }
    },
    _hylle2: {
      msg:        '<i>hylla</i>',
      score:      'correct',
      startTime:  205,
      duration:   207 - 205,
      autoNext:   'RANDOM'
    },



    _vindu1: {
      spokenWord: 'Powiedz "jakieś okno":',
      startTime:  218,
      duration:   220 - 218,
      answers: [
        { answer: '<i>et vindu</i>', score: 'correct', next: '_vindu2' },
        { answer: '<i>vinduet</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnym oknie, przed rzeczownikiem stawiamy rodzajnik.',
        startTime:  224,
        duration:   230 - 224
      }
    },
    _vindu2: {
      msg:        '<i>et vindu</i>',
      score:      'correct',
      startTime:  221,
      duration:   223 - 221,
      autoNext:   'RANDOM'
    },



    _gulv1: {
      spokenWord: 'Jak powiesz "podłoga" w formie określonej?',
      startTime:  231,
      duration:   234 - 231,
      answers: [
        { answer: '<i>gulvet</i>', score: 'correct', next: '_gulv2' },
        { answer: '<i>et gulv</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jedną, nieokreśloną podłogę. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  238,
        duration:   248 - 238
      }
    },
    _gulv2: {
      msg:        '<i>gulvet</i>',
      score:      'correct',
      startTime:  235,
      duration:   237 - 235,
      autoNext:   'RANDOM'
    },



    _bord1: {
      spokenWord: 'Jak powiesz "stół" w formie nieokreślonej?',
      startTime:  249,
      duration:   252 - 249,
      answers: [
        { answer: '<i>et bord</i>', score: 'correct', next: '_bord2' },
        { answer: '<i>bordet</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o nieokreślonym stole, przed rzeczownikiem stawiamy rodzajnik.',
        startTime:  256,
        duration:   262 - 256
      }
    },
    _bord2: {
      msg:        '<i>et bord</i>',
      score:      'correct',
      startTime:  253,
      duration:   255 - 253,
      autoNext:   'RANDOM'
    },



    _skap1: {
      spokenWord: 'Powiedz "ta szafka":',
      startTime:  263,
      duration:   265 - 263,
      answers: [
        { answer: '<i>skapet</i>', score: 'correct', next: '_skap2' },
        { answer: '<i>et skap</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jedną, nieokreśloną szafkę. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  269,
        duration:   279 - 269
      }
    },
    _skap2: {
      msg:        '<i>skapet</i>',
      score:      'correct',
      startTime:  266,
      duration:   268 - 266,
      autoNext:   'RANDOM'
    },



    _stol1: {
      spokenWord: 'Jak powiesz "krzesło", jakieś dowolne?',
      startTime:  280,
      duration:   283 - 280,
      answers: [
        { answer: '<i>en stol</i>', score: 'correct', next: '_stol2' },
        { answer: '<i>stolen</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnym krześle, przed rzeczownikiem stawiamy rodzajnik.',
        startTime:  287,
        duration:   294 - 287
      }
    },
    _stol2: {
      msg:        '<i>en stol</i>',
      score:      'correct',
      startTime:  284,
      duration:   286 - 284,
      autoNext:   'RANDOM'
    },


    _melding1: {
      spokenWord: 'Powiedz "jakaś wiadomość":',
      startTime:  323,
      duration:   325 - 323,
      answers: [
        { answer: '<i>en melding</i>', score: 'correct', next: '_melding2' },
        { answer: '<i>meldingen</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnej wiadomości, przed rzeczownikiem stawiamy rodzajnik.',
        startTime:  329,
        duration:   335 - 329
      }
    },
    _melding2: {
      msg:        '<i>en melding</i>',
      score:      'correct',
      startTime:  326,
      duration:   328 - 326,
      autoNext:   'RANDOM',
      more:       {
        spokenWord: 'Na wiadomości na telefon mówią też /et beskjed/ lub /en sms/',
        startTime:  336,
        duration:   342 - 336
      }
    },



    _tog1: {
      spokenWord: 'Powiedz "ten pociąg":',
      startTime:  343,
      duration:   345 - 343,
      answers: [
        { answer: '<i>toget</i>', score: 'correct', next: '_tog2' },
        { answer: '<i>et tog</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jeden, dowolny pociąg. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  349,
        duration:   358 - 349
      }
    },
    _tog2: {
      msg:        '<i>toget</i>',
      score:      'correct',
      startTime:  346,
      duration:   348 - 346,
      autoNext:   'RANDOM'
    },



    _hus1: {
      spokenWord: 'Powiedz "jakiś dom":',
      startTime:  359,
      duration:   361 - 359,
      answers: [
        { answer: '<i>et hus</i>', score: 'correct', next: '_hus2' },
        { answer: '<i>huset</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o nieokreślonym domu, przed rzeczownikiem stawiamy rodzajnik. ',
        startTime:  365,
        duration:   371 - 365
      }
    },
    _hus2: {
      msg:        '<i>et hus</i>',
      score:      'correct',
      startTime:  362,
      duration:   364 - 362,
      autoNext:   'RANDOM'
    },



    _seng1: {
      spokenWord: 'Powiedz "to łóżko":',
      startTime:  372,
      duration:   374 - 372,
      answers: [
        { answer: '<i>senga</i>', score: 'correct', next: '_seng2' },
        { answer: '<i>ei seng</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /ei/ wskazuje na jedno, dowolne łóżko. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  378,
        duration:   387 - 378
      }
    },
    _seng2: {
      msg:        '<i>senga</i>',
      score:      'correct',
      startTime:  375,
      duration:   377 - 375,
      autoNext:   'RANDOM'
    },



    _fly1: {
      spokenWord: 'Powiedz "ten samolot":',
      startTime:  416,
      duration:   418 - 416,
      answers: [
        { answer: '<i>flyet</i>', score: 'correct', next: '_fly2' },
        { answer: '<i>et fly</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jeden, nieokreślony samolot. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  422,
        duration:   431 - 422
      }
    },
    _fly2: {
      msg:        '<i>flyet</i>',
      score:      'correct',
      startTime:  419,
      duration:   421 - 419,
      autoNext:   'RANDOM'
    },



    _hund1: {
      spokenWord: 'Powiedz "jeden pies", nieokreślony:',
      startTime:  432,
      duration:   435 - 432,
      answers: [
        { answer: '<i>en hund</i>', score: 'correct', next: '_hund2' },
        { answer: '<i>hunden</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o nieokreślonym psie, przed rzeczownikiem stawiamy rodzajnik.',
        startTime:  439,
        duration:   445 - 439
      }
    },
    _hund2: {
      msg:        '<i>en hund</i>',
      score:      'correct',
      startTime:  436,
      duration:   438 - 436,
      autoNext:   'RANDOM'
    },



    _avtale1: {
      spokenWord: 'Jak powiesz "umowa" w formie określonej?',
      startTime:  446,
      duration:   449 - 446,
      answers: [
        { answer: '<i>avtalen</i>', score: 'correct', next: '_avtale2' },
        { answer: '<i>en avtale</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /en/ wskazuje na jedną, dowolną umowę. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  453,
        duration:   463 - 453
      }
    },
    _avtale2: {
      msg:        '<i>avtalen</i>',
      score:      'correct',
      startTime:  450,
      duration:   452 - 450,
      autoNext:   'RANDOM'
    },



    _by1: {
      spokenWord: 'Powiedz "miasto" w formie nieokreślonej:',
      startTime:  464,
      duration:   467 - 464,
      answers: [
        { answer: '<i>en by</i>', score: 'correct', next: '_by2' },
        { answer: '<i>byen</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnym mieście, przed rzeczownikiem stawiamy rodzajnik.',
        startTime:  471,
        duration:   476 - 471
      }
    },
    _by2: {
      msg:        '<i>en by</i>',
      score:      'correct',
      startTime:  468,
      duration:   470 - 468,
      autoNext:   'RANDOM'
    },



    _skog1: {
      spokenWord: 'Powiedz "ten las":',
      startTime:  491,
      duration:   493 - 491,
      answers: [
        { answer: '<i>skogen</i>', score: 'correct', next: '_skog2' },
        { answer: '<i>en skog</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /en/ wskazuje na jeden, dowolny las. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  497,
        duration:   505 - 497
      }
    },
    _skog2: {
      msg:        '<i>skogen</i>',
      score:      'correct',
      startTime:  494,
      duration:   496 - 494,
      autoNext:   'RANDOM'
    }


  };


  this.extra = {

    _land1: {
      spokenWord: 'Powiedz "ten kraj":',
      startTime:  157,
      duration:   159 - 157,
      answers: [
        { answer: '<i>landet</i>', score: 'correct', next: '_land2' },
        { answer: '<i>et land</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jeden, nieokreślony kraj. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  163,
        duration:   172 - 163
      }
    },
    _land2: {
      msg:        '<i>landet</i>',
      score:      'correct',
      startTime:  160,
      duration:   162 - 160,
      autoNext:   'RANDOM'
    },



    _speil1: {
      spokenWord: 'Powiedz "to lustro"',
      startTime:  41,
      duration:   43 - 41,
      answers: [
        { answer: '<i>speilet</i>', score: 'correct', next: '_speil2' },
        { answer: '<i>et speil</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jedno, nieokreślone lustro. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  47,
        duration:   56 - 47
      }
    },
    _speil2: {
      msg:        '<i>speilet</i>',
      score:      'correct',
      startTime:  44,
      duration:   46 - 44,
      autoNext:   'RANDOM'
    },



    _kontakt1: {
      spokenWord: 'Jak powiesz "kontakt", jakiś dowolny?',
      startTime:  388,
      duration:   391 - 388,
      answers: [
        { answer: '<i>en kontakt</i>', score: 'correct', next: '_kontakt2' },
        { answer: '<i>kontakten</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnym kontakcie, przed rzeczownikiem stawiamy rodzajnik.',
        startTime:  395,
        duration:   401 - 395
      }
    },
    _kontakt2: {
      msg:        '<i>en kontakt</i>',
      score:      'correct',
      startTime:  392,
      duration:   394 - 392,
      autoNext:   'RANDOM'
    },



    _firma1: {
      spokenWord: 'Powiedz "firma" w formie nieokreślonej:',
      startTime:  477,
      duration:   480 - 477,
      answers: [
        { answer: '<i>et firma</i>', score: 'correct', next: '_firma2' },
        { answer: '<i>firmaet</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o nieokreślonej firmie, przed rzeczownikiem stawiamy rodzajnik.',
        startTime:  484,
        duration:   490 - 484
      }
    },
    _firma2: {
      msg:        '<i>et firma</i>',
      score:      'correct',
      startTime:  481,
      duration:   483 - 481,
      autoNext:   'RANDOM'
    },



    _kvinne1: {
      spokenWord: 'Powiedz "jakaś kobieta":',
      startTime:  76,
      duration:   79 - 76,
      answers: [
        { answer: '<i>ei kvinne</i>', score: 'correct', next: '_kvinne2' },
        { answer: '<i>kvinna</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnej kobiecie, przed rzeczownikiem stoi rodzajnik.',
        startTime:  83,
        duration:   89 - 83
      }
    },
    _kvinne2: {
      msg:        '<i>ei kvinne</i>',
      score:      'correct',
      startTime:  80,
      duration:   82 - 80,
      autoNext:   'RANDOM'
    },



    _gutt1: {
      spokenWord: 'Powiedz "ten chłopiec":',
      startTime:  90,
      duration:   92 - 90,
      answers: [
        { answer: '<i>gutten</i>', score: 'correct', next: '_gutt2' },
        { answer: '<i>en gutt</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /en/ wskazuje na jednego, nieokreślonego chłopca. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  96,
        duration:   106 - 96
      }
    },
    _gutt2: {
      msg:        '<i>gutten</i>',
      score:      'correct',
      startTime:  93,
      duration:   95 - 93,
      autoNext:   'RANDOM'
    },



    _jente1: {
      spokenWord: 'Powiedz "jakaś dziewczyna" albo "dziewczynka":',
      startTime:  107,
      duration:   111 - 107,
      answers: [
        { answer: '<i>ei jente</i>', score: 'correct', next: '_jente2' },
        { answer: '<i>jenta</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o nieokreślonej dziewczynie, przed rzeczownikiem stoi rodzajnik.',
        startTime:  115,
        duration:   121 - 115
      }
    },
    _jente2: {
      msg:        '<i>ei jente</i>',
      score:      'correct',
      startTime:  112,
      duration:   114 - 112,
      autoNext:   'RANDOM'
    },



    _mobil1: {
      spokenWord: 'Powiedz "ten telefon":',
      startTime:  295,
      duration:   297 - 295,
      answers: [
        { answer: '<i>mobilen</i>', score: 'correct', next: '_mobil2' },
        { answer: '<i>en mobil</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /en/ wskazuje na jeden, nieokreślony telefon. W formie określonej zabieramy rodzajnik i dodajemy końcówkę.',
        startTime:  301,
        duration:   311 - 301
      }
    },
    _mobil2: {
      msg:        '<i>mobilen</i>',
      score:      'correct',
      startTime:  298,
      duration:   300 - 298,
      autoNext:   'RANDOM',
      more:       {
        spokenWord: '/en mobil/ to skrót od /en mobiltelefon/.',
        startTime:  312,
        duration:   321 - 312
      }

    },



    _menneske1: {
      spokenWord: 'Powiedz "człowiek", w formie nieokreślonej:',
      startTime:  402,
      duration:   405 - 402,
      answers: [
        { answer: '<i>et menneske</i>', score: 'correct', next: '_menneske2' },
        { answer: '<i>mennesket</i>', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o nieokreślonym człowieku, przed rzeczownikiem stawiamy rodzajnik.',
        startTime:  409,
        duration:   415 - 409
      }
    },
    _menneske2: {
      msg:        '<i>et menneske</i>',
      score:      'correct',
      startTime:  406,
      duration:   408 - 406,
      autoNext:   'RANDOM'
    },


  };


}
</script>
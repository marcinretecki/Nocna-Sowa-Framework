<script>
function LasAudioData() {

  this.testNotes = [
    'czy w "more" powinniśmy czytać poprawną odpowiedź?',
    'trzeba zastanowić się nad treścią "more"',
    'nie ma zakończenia'
  ];

  this.intro = {
    _a1: {
      msg: 'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext: 'ENDINTRO'/*,
      more: {
        startTime: 0,
        duration: 26,
      }*/
    }
  };


  this.chat = {

    _buss1: {
      spokenWord: 'Powiedz "jakiś autobus".',
      startTime:  27,
      duration:   30 - 27,
      answers: [
        { answer: 'en buss', next: '_buss2', score: 'correct' },
        { answer: 'bussen', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnym autobusie, przed rzeczownikiem stoi rodzajnik. Dlatego "jakiś autobus" to /en buss/',
        startTime:  34,
        duration:   40 - 34
      }
    },
    _buss2: {
      msg:        '<i>en buss</i>',
      score:      true,
      startTime:  31,
      duration:   33 - 31,
      autoNext:   'RANDOM'
    },



    _speil1: {
      spokenWord: 'Powiedz "to lustro"',
      startTime:  41,
      duration:   43 - 41,
      answers: [
        { answer: 'speilet', next: '_speil2', score: 'correct' },
        { answer: 'et speil', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jedno, nieokreślone lustro. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "to lustro" to /speilet/',
        startTime:  47,
        duration:   56 - 47
      }
    },
    _speil2: {
      msg:        '<i>speilet</i>',
      score:      true,
      startTime:  44,
      duration:   46 - 44,
      autoNext:   'RANDOM'
    },



    _mann1: {
      spokenWord: 'Powiedz "ten mężczyzna" albo "mąż":',
      startTime:  57,
      duration:   61 - 57,
      answers: [
        { answer: 'mannen', next: '_mann2', score: 'correct' },
        { answer: 'en mann', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /en/ wskazuje na jednego, nieokreślonego mężczyznę. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "ten mężczyzna" to /mannen/',
        startTime:  65,
        duration:   75 - 65
      }
    },
    _mann2: {
      msg:        '<i>mannen</i>',
      score:      true,
      startTime:  62,
      duration:   64 - 62,
      autoNext:   'RANDOM'
    },



    _kvinne1: {
      spokenWord: 'Powiedz "jakaś kobieta":',
      startTime:  76,
      duration:   79 - 76,
      answers: [
        { answer: 'ei kvinne', next: '_kvinne2', score: 'correct' },
        { answer: 'kvinna', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnej kobiecie, przed rzeczownikiem stoi rodzajnik. Dlatego "jakaś kobieta" to /ei kvinne/',
        startTime:  83,
        duration:   89 - 83
      }
    },
    _kvinne2: {
      msg:        '<i>ei kvinne</i>',
      score:      true,
      startTime:  80,
      duration:   82 - 80,
      autoNext:   'RANDOM'
    },



    _gutt1: {
      spokenWord: 'Powiedz "ten chłopiec":',
      startTime:  90,
      duration:   92 - 90,
      answers: [
        { answer: 'gutten', next: '_gutt2', score: 'correct' },
        { answer: 'en gutt', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /en/ wskazuje na jednego, nieokreślonego chłopca. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "ten chłopiec" to /gutten/',
        startTime:  96,
        duration:   106 - 96
      }
    },
    _gutt2: {
      msg:        '<i>gutten</i>',
      score:      true,
      startTime:  93,
      duration:   95 - 93,
      autoNext:   'RANDOM'
    },



    _jente1: {
      spokenWord: 'Powiedz "jakaś dziewczyna" albo "dziewczynka":',
      startTime:  107,
      duration:   111 - 107,
      answers: [
        { answer: 'ei jente', next: '_jente2', score: 'correct' },
        { answer: 'jenta', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o nieokreślonej dziewczynie, przed rzeczownikiem stoi rodzajnik. Dlatego "jakaś dziwczyna" to /ei jente/',
        startTime:  115,
        duration:   121 - 115
      }
    },
    _jente2: {
      msg:        '<i>ei jente</i>',
      score:      true,
      startTime:  112,
      duration:   114 - 112,
      autoNext:   'RANDOM'
    },



    _barn1: {
      spokenWord: 'Powiedz "to dziecko":',
      startTime:  123,
      duration:   125 - 123,
      answers: [
        { answer: 'barnet', next: '_barn2', score: 'correct' },
        { answer: 'et barn', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jedno, nieokreślone dziecko. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "to dziecko" to /barnet/',
        startTime:  129,
        duration:   138 - 129
      }
    },
    _barn2: {
      msg:        '<i>barnet</i>',
      score:      true,
      startTime:  126,
      duration:   128 - 126,
      autoNext:   'RANDOM'
    },



    _kone1: {
      spokenWord: 'Jak powiesz "żona" w formie określonej?',
      startTime:  139,
      duration:   142 - 139,
      answers: [
        { answer: 'kona', next: '_kone2', score: 'correct' },
        { answer: 'ei kone', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /ei/ wskazuje na jedną, nieokreśloną żonę. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego określona "żona" to /kona/',
        startTime:  146,
        duration:   156 - 146
      }
    },
    _kone2: {
      msg:        '<i>kona</i>',
      score:      true,
      startTime:  143,
      duration:   145 - 143,
      autoNext:   'RANDOM'
    },



    _land1: {
      spokenWord: 'Powiedz "ten kraj":',
      startTime:  157,
      duration:   159 - 157,
      answers: [
        { answer: 'landet', next: '_land2', score: 'correct' },
        { answer: 'et land', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jeden, nieokreślony kraj. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "ten kraj" to /landet/',
        startTime:  163,
        duration:   172 - 163
      }
    },
    _land2: {
      msg: '<i>landet</i>',
      score: true,
      startTime:  160,
      duration:   162 - 160,
      autoNext:   'RANDOM'
    },



    _hytte1: {
      spokenWord: 'Powiedz "jakiś domek letniskowy" albo "chatka":',
      startTime:  173,
      duration:   177 - 173,
      answers: [
        { answer: 'ei hytte', next: '_hytte2', score: 'correct' },
        { answer: 'hytta', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnym domku, przed rzeczownikiem stawiamy rodzajnik. Dlatego "jakiś domek" to /ei hytte/',
        startTime:  181,
        duration:   187 - 181
      }
    },
    _hytte2: {
      msg: '<i>ei hytte</i>',
      score: true,
      startTime:  178,
      duration:   180 - 178,
      autoNext:   'RANDOM',
      more:       {
        spokenWord: '/ei hytte/ może oznaczać tradycyjną norweską chatkę z drewna. Norwedzy często wynajmują je na week_END, żeby pobyć bliżej natury. Niektórzy mówiąc /hytte/ mają na myśli jakikolwiek dom nad wodą lub w lesie.',
        startTime:  188,
        duration:   201 - 188
      }
    },



    _hylle1: {
      spokenWord: 'Powiedz "ta półka":',
      startTime:  202,
      duration:   204 - 202,
      answers: [
        { answer: 'hylla', next: '_hylle2', score: 'correct' },
        { answer: 'ei hylle', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /ei/ wskazuje na jedną, nieokreśloną półkę. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "ta półka" to /hylla/',
        startTime:  208,
        duration:   217 - 208
      }
    },
    _hylle2: {
      msg: '<i>hylla</i>',
      score: true,
      startTime:  205,
      duration:   207 - 205,
      autoNext:   'RANDOM'
    },



    _vindu1: {
      spokenWord: 'Powiedz "jakieś okno":',
      startTime:  218,
      duration:   220 - 218,
      answers: [
        { answer: 'et vindu', next: '_vindu2', score: 'correct' },
        { answer: 'vinduet', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnym oknie, przed rzeczownikiem stawiamy rodzajnik. Dlatego "jakieś okno" to /et vindu/',
        startTime:  224,
        duration:   230 - 224
      }
    },
    _vindu2: {
      msg: '<i>et vindu</i>',
      score: true,
      startTime:  221,
      duration:   223 - 221,
      autoNext:   'RANDOM'
    },



    _gulv1: {
      spokenWord: 'Jak powiesz "podłoga" w formie określonej?',
      startTime:  231,
      duration:   234 - 231,
      answers: [
        { answer: 'gulvet', next: '_gulv2', score: 'correct' },
        { answer: 'et gulv', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jedną, nieokreśloną podłogę. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "ta podłoga" to /gulvet/',
        startTime:  238,
        duration:   248 - 238
      }
    },
    _gulv2: {
      msg: '<i>gulvet</i>',
      score: true,
      startTime:  235,
      duration:   237 - 235,
      autoNext:   'RANDOM'
    },



    _bord1: {
      spokenWord: 'Jak powiesz "stół" w formie nieokreślonej?',
      startTime:  249,
      duration:   252 - 249,
      answers: [
        { answer: 'et bord', next: '_bord2', score: 'correct' },
        { answer: 'bordet', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o nieokreślonym stole, przed rzeczownikiem stawiamy rodzajnik. Dlatego "jakiś stół" to /et bord/',
        startTime:  256,
        duration:   262 - 256
      }
    },
    _bord2: {
      msg: '<i>et bord</i>',
      score: true,
      startTime:  253,
      duration:   255 - 253,
      autoNext:   'RANDOM'
    },



    _skap1: {
      spokenWord: 'Powiedz "ta szafka":',
      startTime:  263,
      duration:   265 - 263,
      answers: [
        { answer: 'skapet', next: '_skap2', score: 'correct' },
        { answer: 'et skap', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jedną, nieokreśloną szafkę. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "ta szafka" to /skapet/',
        startTime:  269,
        duration:   279 - 269
      }
    },
    _skap2: {
      msg: '<i>skapet</i>',
      score: true,
      startTime:  266,
      duration:   268 - 266,
      autoNext:   'RANDOM'
    },



    _stol1: {
      spokenWord: 'Jak powiesz "krzesło", jakieś dowolne?',
      startTime:  280,
      duration:   283 - 280,
      answers: [
        { answer: 'en stol', next: '_stol2', score: 'correct' },
        { answer: 'stolen', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnym krześle, przed rzeczownikiem stawiamy rodzajnik. Dlatego "nieokreślone krzesło" to /en stol/',
        startTime:  287,
        duration:   294 - 287
      }
    },
    _stol2: {
      msg: '<i>en stol</i>',
      score: true,
      startTime:  284,
      duration:   286 - 284,
      autoNext:   'RANDOM'
    },



    _mobil1: {
      spokenWord: 'Powiedz "ten telefon":',
      startTime:  295,
      duration:   297 - 295,
      answers: [
        { answer: 'mobilen', next: '_mobil2', score: 'correct' },
        { answer: 'en mobil', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /en/ wskazuje na jeden, nieokreślony telefon. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "ten telefon" to /mobilen/',
        startTime:  301,
        duration:   311 - 301
      }
    },
    _mobil2: {
      msg: '<i>mobilen</i>',
      score: true,
      startTime:  298,
      duration:   300 - 298,
      autoNext:   'RANDOM',
      more:       {
        spokenWord: '/en mobil/ to skrót od /en mobiltelefon/. Możesz też powiedzieć /en telefon/ lub /en smarttelefon/',
        startTime:  312,
        duration:   321 - 312
      }

    },


    _melding1: {
      spokenWord: 'Powiedz "jakaś wiadomość":',
      startTime:  323,
      duration:   325 - 323,
      answers: [
        { answer: 'en melding', next: '_melding2', score: 'correct' },
        { answer: 'meldingen', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnej wiadomości, przed rzeczownikiem stawiamy rodzajnik. Dlatego "jakaś wiadomość" to /en melding/',
        startTime:  329,
        duration:   335 - 329
      }
    },
    _melding2: {
      msg: '<i>en melding</i>',
      score: true,
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
        { answer: 'toget', next: '_tog2', score: 'correct' },
        { answer: 'et tog', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jeden, dowolny pociąg. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "ten pociąg" to /toget/',
        startTime:  349,
        duration:   358 - 349
      }
    },
    _tog2: {
      msg: '<i>toget</i>',
      score: true,
      startTime:  346,
      duration:   348 - 346,
      autoNext:   'RANDOM'
    },



    _hus1: {
      spokenWord: 'Powiedz "jakiś dom":',
      startTime:  359,
      duration:   361 - 359,
      answers: [
        { answer: 'et hus', next: '_hus2', score: 'correct' },
        { answer: 'huset', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o nieokreślonym domie, przed rzeczownikiem stawiamy rodzajnik. Dlatego "jakiś dom" to /et hus/',
        startTime:  365,
        duration:   371 - 365
      }
    },
    _hus2: {
      msg: '<i>et hus</i>',
      score: true,
      startTime:  362,
      duration:   364 - 362,
      autoNext:   'RANDOM'
    },



    _seng1: {
      spokenWord: 'Powiedz "to łóżko":',
      startTime:  372,
      duration:   374 - 372,
      answers: [
        { answer: 'senga', next: '_seng2', score: 'correct' },
        { answer: 'ei seng', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /ei/ wskazuje na jedno, dowolne łóżko. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "to łóżko" to /senga/',
        startTime:  378,
        duration:   387 - 378
      }
    },
    _seng2: {
      msg: '<i>senga</i>',
      score: true,
      startTime:  375,
      duration:   377 - 375,
      autoNext:   'RANDOM'
    },



    _kontakt1: {
      spokenWord: 'Jak powiesz "kontakt", jakiś dowolny?',
      startTime:  388,
      duration:   391 - 388,
      answers: [
        { answer: 'en kontakt', next: '_kontakt2', score: 'correct' },
        { answer: 'kontakten', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnym kontakcie, przed rzeczownikiem stawiamy rodzajnik. Dlatego "jakiś kontakt" to /en kontakt/',
        startTime:  395,
        duration:   401 - 395
      }
    },
    _kontakt2: {
      msg: '<i>en kontakt</i>',
      score: true,
      startTime:  392,
      duration:   394 - 392,
      autoNext:   'RANDOM'
    },



    _menneske1: {
      spokenWord: 'Powiedz "człowiek", w formie nieokreślonej:',
      startTime:  402,
      duration:   405 - 402,
      answers: [
        { answer: 'et menneske', next: '_menneske2', score: 'correct' },
        { answer: 'mennesket', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o nieokreślonym człowieku, przed rzeczownikiem stawiamy rodzajnik. Dlatego "jakiś człowiek" to /et menneske/',
        startTime:  409,
        duration:   415 - 409
      }
    },
    _menneske2: {
      msg: '<i>et menneske</i>',
      score: true,
      startTime:  406,
      duration:   408 - 406,
      autoNext:   'RANDOM'
    },



    _fly1: {
      spokenWord: 'Powiedz "ten samolot":',
      startTime:  416,
      duration:   418 - 416,
      answers: [
        { answer: 'flyet', next: '_fly2', score: 'correct' },
        { answer: 'et fly', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /et/ wskazuje na jeden, nieokreślony samolot. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "ten samolot" to /flyet/',
        startTime:  422,
        duration:   431 - 422
      }
    },
    _fly2: {
      msg: '<i>flyet</i>',
      score: true,
      startTime:  419,
      duration:   421 - 419,
      autoNext:   'RANDOM'
    },



    _hund1: {
      spokenWord: 'Powiedz "jeden pies", nieokreślony:',
      startTime:  432,
      duration:   435 - 432,
      answers: [
        { answer: 'en hund', next: '_hund2', score: 'correct' },
        { answer: 'hunden', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o nieokreślonym psie, przed rzeczownikiem stawiamy rodzajnik. Dlatego "jakiś pies" to /en hund/',
        startTime:  439,
        duration:   445 - 439
      }
    },
    _hund2: {
      msg: '<i>en hund</i>',
      score: true,
      startTime:  436,
      duration:   438 - 436,
      autoNext:   'RANDOM'
    },



    _avtale1: {
      spokenWord: 'Jak powiesz "umowa" w formie określonej?',
      startTime:  446,
      duration:   449 - 446,
      answers: [
        { answer: 'avtalen', next: '_avtale2', score: 'correct' },
        { answer: 'en avtale', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /en/ wskazuje na jedną, dowolną umowę. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "umowa" w formie określonej to /avtalen/',
        startTime:  453,
        duration:   463 - 453
      }
    },
    _avtale2: {
      msg: '<i>avtalen</i>',
      score: true,
      startTime:  450,
      duration:   452 - 450,
      autoNext:   'RANDOM'
    },



    _by1: {
      spokenWord: 'Powiedz "miasto" w formie nieokreślonej:',
      startTime:  464,
      duration:   467 - 464,
      answers: [
        { answer: 'en by', next: '_by2', score: 'correct' },
        { answer: 'byen', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o dowolnym mieście, przed rzeczownikiem stawiamy rodzajnik. Dlatego "jakieś miasto" to /en by/',
        startTime:  471,
        duration:   476 - 471
      }
    },
    _by2: {
      msg: '<i>en by</i>',
      score: true,
      startTime:  468,
      duration:   470 - 468,
      autoNext:   'RANDOM'
    },



    _firma1: {
      spokenWord: 'Powiedz "firma" w formie nieokreślonej:',
      startTime:  477,
      duration:   480 - 477,
      answers: [
        { answer: 'et firma', next: '_firma2', score: 'correct' },
        { answer: 'firmaet', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Gdy mówimy o nieokreślonej firmie, przed rzeczownikiem stawiamy rodzajnik. Dlatego "jakaś firma" to /et firma/',
        startTime:  484,
        duration:   490 - 484
      }
    },
    _firma2: {
      msg: '<i>et firma</i>',
      score: true,
      startTime:  481,
      duration:   483 - 481,
      autoNext:   'RANDOM'
    },



    _skog1: {
      spokenWord: 'Powiedz "ten las":',
      startTime:  491,
      duration:   493 - 491,
      answers: [
        { answer: 'skogen', next: '_skog2', score: 'correct' },
        { answer: 'en skog', score: 'wrong' }
      ],
      more:       {
        spokenWord: 'Rodzajnik /en/ wskazuje na jeden, dowolny las. W formie określonej zabieramy rodzajnik i dodajemy końcówkę. Dlatego "ten las" to /skogen/',
        startTime:  497,
        duration:   505 - 497
      }
    },
    _skog2: {
      msg: '<i>skogen</i>',
      score: true,
      startTime:  494,
      duration:   496 - 494,
      autoNext:   'RANDOM'
    }


  };


  this.end = {

    _end1: {
      msg: 'END',
      startTime: 506,
      duration: 511 - 506,
    }

  };



}
</script>
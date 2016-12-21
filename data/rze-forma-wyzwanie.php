<script>
function LasAudioData() {

  //  Albo answers
  //  albo autoNext
  //  ale nie oba na raz!
  //  msg jest dowolne
  //  more jest dowolne
  //  gdy nie startTime, mamy quiz

  this.intro = {
    a1: {
      msg: "Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i>start</i>.",
      autoNext: "ENDINTRO",
      more: { startTime: 0, stopTime: 26 }
    }
  };


  this.chat = {

    buss1: {
      startTime:  27,
      stopTime:   30,
      msg: 'Powiedz "jakiś autobus":',
      answers: [
        { answer: '<i>en buss</i>', next: 'buss2' },
        { answer: '<i>bussen</i>', next: 'buss1b' }
      ]
    },
    buss1b: {
      msg: 'Niestety',
      startTime:  34,
      stopTime:   40,
      answers: [
        { answer: '<i>en buss</i>', next: 'buss2' }
      ]
    },
    buss2: {
      msg: 'SCORE',
      startTime:  31,
      stopTime:   33,
      autoNext:   'RANDOM'
    },



    speil1: {
      startTime:  41,
      stopTime:   43,
      msg: 'Powiedz "to lustro":',
      answers: [
        { answer: '<i>et speil</i>', next: 'speil1b' },
        { answer: '<i>speilet</i>', next: 'speil2' }
      ]
    },
    speil1b: {
      msg: 'Niestety',
      startTime:  47,
      stopTime:   56,
      answers: [
        { answer: '<i>speilet</i>', next: 'speil2' }
      ]
    },
    speil2: {
      msg: 'SCORE',
      startTime:  44,
      stopTime:   46,
      autoNext:   'RANDOM'
    },



    mann1: {
      startTime:  57,
      stopTime:   61,
      msg: 'Powiedz "ten mężczyzna" albo "mąż":',
      answers: [
        { answer: '<i>en mann</i>', next: 'mann1b' },
        { answer: '<i>mannen</i>', next: 'mann2' }
      ]
    },
    mann1b: {
      msg: 'Niestety',
      startTime:  65,
      stopTime:   75,
      answers: [
        { answer: '<i>mannen</i>', next: 'mann2' }
      ]
    },
    mann2: {
      msg: 'SCORE',
      startTime:  62,
      stopTime:   64,
      autoNext:   'RANDOM'
    },



    kvinne1: {
      startTime:  76,
      stopTime:   79,
      msg: 'Powiedz "jakaś kobieta":',
      answers: [
        { answer: '<i>ei kvinne</i>', next: 'kvinne2' },
        { answer: '<i>kvinna</i>', next: 'kvinne1b' }
      ]
    },
    kvinne1b: {
      msg: 'Niestety',
      startTime:  83,
      stopTime:   89,
      answers: [
        { answer: '<i>ei kvinne</i>', next: 'kvinne2' }
      ]
    },
    kvinne2: {
      msg: 'SCORE',
      startTime:  80,
      stopTime:   82,
      autoNext:   'RANDOM'
    },



    gutt1: {
      startTime:  90,
      stopTime:   92,
      msg: 'Powiedz "ten chłopiec":',
      answers: [
        { answer: '<i>en gutt</i>', next: 'gutt1b' },
        { answer: '<i>gutten</i>', next: 'gutt2' }
      ]
    },
    gutt1b: {
      msg: 'Niestety',
      startTime:  96,
      stopTime:  106,
      answers: [
        { answer: '<i>gutten</i>', next: 'gutt2' }
      ]
    },
    gutt2: {
      msg: 'SCORE',
      startTime:  93,
      stopTime:   95,
      autoNext:   'RANDOM'
    },



    jente1: {
      startTime:  107,
      stopTime:   111,
      msg: 'Powiedz "jakaś dziewczyna" albo "dziewczynka":',
      answers: [
        { answer: '<i>ei jente</i>', next: 'jente2' },
        { answer: '<i>jenta</i>', next: 'jente1b' }
      ]
    },
    jente1b: {
      msg: 'Niestety',
      startTime:  115,
      stopTime:   121,
      answers: [
        { answer: '<i>ei jente</i>', next: 'jente2' }
      ]
    },
    jente2: {
      msg: 'SCORE',
      startTime:  112,
      stopTime:   114,
      autoNext:   'RANDOM'
    },



    barn1: {
      startTime:  123,
      stopTime:   125,
      msg: 'Powiedz "to dziecko":',
      answers: [
        { answer: '<i>et barn</i>', next: 'barn1b' },
        { answer: '<i>barnet</i>', next: 'barn2' }
      ]
    },
    barn1b: {
      msg: 'Niestety',
      startTime:  129,
      stopTime:   138,
      answers: [
        { answer: '<i>barnet</i>', next: 'barn2' }
      ]
    },
    barn2: {
      msg: 'SCORE',
      startTime:  126,
      stopTime:   128,
      autoNext:   'RANDOM'
    },



    kone1: {
      startTime:  139,
      stopTime:   142,
      msg: 'Jak powiesz "żona" w formie określonej?',
      answers: [
        { answer: '<i>ei kone</i>', next: 'kone1b' },
        { answer: '<i>kona</i>', next: 'kone2' }
      ]
    },
    kone1b: {
      msg: 'Niestety',
      startTime:  146,
      stopTime:   156,
      answers: [
        { answer: '<i>kona</i>', next: 'kone2' }
      ]
    },
    kone2: {
      msg: 'SCORE',
      startTime:  143,
      stopTime:   145,
      autoNext:   'RANDOM'
    },



    land1: {
      startTime:  157,
      stopTime:   159,
      msg: 'Powiedz "ten kraj":',
      answers: [
        { answer: '<i>et land</i>', next: 'land1b' },
        { answer: '<i>landet</i>', next: 'land2' }
      ]
    },
    land1b: {
      msg: 'Niestety',
      startTime:  163,
      stopTime:   172,
      answers: [
        { answer: '<i>landet</i>', next: 'land2' }
      ]
    },
    land2: {
      msg: 'SCORE',
      startTime:  160,
      stopTime:   162,
      autoNext:   'RANDOM'
    },



    hytte1: {
      startTime:  173,
      stopTime:   177,
      msg: 'Powiedz "jakiś domek letniskowy" albo "chatka":',
      answers: [
        { answer: '<i>ei hytte</i>', next: 'hytte2' },
        { answer: '<i>hytta</i>', next: 'hytte1b' }
      ]
    },
    hytte1b: {
      msg: 'Niestety',
      startTime:  181,
      stopTime:   187,
      answers: [
        { answer: '<i>ei hytte</i>', next: 'hytte2' }
      ]
    },
    hytte2: {
      msg: 'SCORE',
      startTime:  178,
      stopTime:   180,
      autoNext:   'RANDOM',
      more:       { startTime: 188, stopTime: 201 }
    },



    hylle1: {
      startTime:  202,
      stopTime:   204,
      msg: 'Powiedz "ta półka":',
      answers: [
        { answer: '<i>ei hylle</i>', next: 'hylle1b' },
        { answer: '<i>hylla</i>', next: 'hylle2' }
      ]
    },
    hylle1b: {
      msg: 'Niestety',
      startTime:  208,
      stopTime:   217,
      answers: [
        { answer: '<i>hylla</i>', next: 'hylle2' }
      ]
    },
    hylle2: {
      msg: 'SCORE',
      startTime:  205,
      stopTime:   207,
      autoNext:   'RANDOM'
    },



    vindu1: {
      startTime:  218,
      stopTime:   220,
      msg: 'Powiedz "jakieś okno":',
      answers: [
        { answer: '<i>et vindu</i>', next: 'vindu2' },
        { answer: '<i>vinduet</i>', next: 'vindu1b' }
      ]
    },
    vindu1b: {
      msg: 'Niestety',
      startTime:  224,
      stopTime:   230,
      answers: [
        { answer: '<i>et vindu</i>', next: 'vindu2' }
      ]
    },
    vindu2: {
      msg: 'SCORE',
      startTime:  221,
      stopTime:   223,
      autoNext:   'RANDOM'
    },



    gulv1: {
      startTime:  231,
      stopTime:   234,
      msg: 'Jak powiesz "podłoga" w formie określonej?',
      answers: [
        { answer: '<i>et gulv</i>', next: 'gulv1b' },
        { answer: '<i>gulvet</i>', next: 'gulv2' }
      ]
    },
    gulv1b: {
      msg: 'Niestety',
      startTime:  238,
      stopTime:   248,
      answers: [
        { answer: '<i>gulvet</i>', next: 'gulv2' }
      ]
    },
    gulv2: {
      msg: 'SCORE',
      startTime:  235,
      stopTime:   237,
      autoNext:   'RANDOM'
    },



    bord1: {
      startTime:  249,
      stopTime:   252,
      msg: 'Jak powiesz "stół" w formie nieokreślonej?',
      answers: [
        { answer: '<i>et bord</i>', next: 'bord2' },
        { answer: '<i>bordet</i>', next: 'bord1b' }
      ]
    },
    bord1b: {
      msg: 'Niestety',
      startTime:  256,
      stopTime:   262,
      answers: [
        { answer: '<i>et bord</i>', next: 'bord2' }
      ]
    },
    bord2: {
      msg: 'SCORE',
      startTime:  253,
      stopTime:   255,
      autoNext:   'RANDOM'
    },



    skap1: {
      startTime:  263,
      stopTime:   265,
      msg: 'Powiedz "ta szafka":',
      answers: [
        { answer: '<i>et skap</i>', next: 'skap1b' },
        { answer: '<i>skapet</i>', next: 'skap2' }
      ]
    },
    skap1b: {
      msg: 'Niestety',
      startTime:  269,
      stopTime:   279,
      answers: [
        { answer: '<i>skapet</i>', next: 'skap2' }
      ]
    },
    skap2: {
      msg: 'SCORE',
      startTime:  266,
      stopTime:   268,
      autoNext:   'RANDOM'
    },



    stol1: {
      startTime:  280,
      stopTime:   283,
      msg: 'Jak powiesz "krzesło", jakieś dowolne?',
      answers: [
        { answer: '<i>en stol</i>', next: 'stol2' },
        { answer: '<i>stolen</i>', next: 'stol1b' }
      ]
    },
    stol1b: {
      msg: 'Niestety',
      startTime:  287,
      stopTime:   294,
      answers: [
        { answer: '<i>en stol</i>', next: 'stol2' }
      ]
    },
    stol2: {
      msg: 'SCORE',
      startTime:  284,
      stopTime:   286,
      autoNext:   'RANDOM'
    },



    mobil1: {
      startTime:  295,
      stopTime:   297,
      msg: 'Powiedz "ten telefon":',
      answers: [
        { answer: '<i>en mobil</i>', next: 'mobil1b' },
        { answer: '<i>mobilen</i>', next: 'mobil2' }
      ]
    },
    mobil1b: {
      msg: 'Niestety',
      startTime:  301,
      stopTime:   311,
      answers: [
        { answer: '<i>mobilen</i>', next: 'mobil2' }
      ]
    },
    mobil2: {
      msg: 'SCORE',
      startTime:  298,
      stopTime:   300,
      autoNext:   'RANDOM',
      more:       { startTime: 312, stopTime: 321 }

    },


    melding1: {
      startTime:  323,
      stopTime:   325,
      msg: 'Powiedz "jakaś wiadomość":',
      answers: [
        { answer: '<i>en melding</i>', next: 'melding2' },
        { answer: '<i>meldingen</i>', next: 'melding1b' }
      ]
    },
    melding1b: {
      msg: 'Niestety',
      startTime:  329,
      stopTime:   335,
      answers: [
        { answer: '<i>en melding</i>', next: 'melding2' }
      ]
    },
    melding2: {
      msg: 'SCORE',
      startTime:  326,
      stopTime:   328,
      autoNext:   'RANDOM',
      more:       { startTime: 336, stopTime: 342 }
    },



    tog1: {
      startTime:  343,
      stopTime:   345,
      msg: 'Powiedz "ten pociąg":',
      answers: [
        { answer: '<i>et tog</i>', next: 'tog1b' },
        { answer: '<i>toget</i>', next: 'tog2' }
      ]
    },
    tog1b: {
      msg: 'Niestety',
      startTime:  349,
      stopTime:   358,
      answers: [
        { answer: '<i>toget</i>', next: 'tog2' }
      ]
    },
    tog2: {
      msg: 'SCORE',
      startTime:  346,
      stopTime:   348,
      autoNext:   'RANDOM'
    },



    hus1: {
      startTime:  359,
      stopTime:   361,
      msg: 'Powiedz "jakiś dom":',
      answers: [
        { answer: '<i>et hus</i>', next: 'hus2' },
        { answer: '<i>huset</i>', next: 'hus1b' }
      ]
    },
    hus1b: {
      msg: 'Niestety',
      startTime:  365,
      stopTime:   371,
      answers: [
        { answer: '<i>et hus</i>', next: 'hus2' }
      ]
    },
    hus2: {
      msg: 'SCORE',
      startTime:  362,
      stopTime:   364,
      autoNext:   'RANDOM'
    },



    seng1: {
      startTime:  372,
      stopTime:   374,
      msg: 'Powiedz "to łóżko":',
      answers: [
        { answer: '<i>ei seng</i>', next: 'seng1b' },
        { answer: '<i>senga</i>', next: 'seng2' }
      ]
    },
    seng1b: {
      msg: 'Niestety',
      startTime:  378,
      stopTime:   387,
      answers: [
        { answer: '<i>senga</i>', next: 'seng2' }
      ]
    },
    seng2: {
      msg: 'SCORE',
      startTime:  375,
      stopTime:   377,
      autoNext:   'RANDOM'
    },



    kontakt1: {
      startTime:  388,
      stopTime:   391,
      msg: 'Jak powiesz "kontakt", jakiś dowolny?',
      answers: [
        { answer: '<i>en kontakt</i>', next: 'kontakt2' },
        { answer: '<i>kontakten</i>', next: 'kontakt1b' }
      ]
    },
    kontakt1b: {
      msg: 'Niestety',
      startTime:  395,
      stopTime:   401,
      answers: [
        { answer: '<i>en kontakt</i>', next: 'kontakt2' }
      ]
    },
    kontakt2: {
      msg: 'SCORE',
      startTime:  392,
      stopTime:   394,
      autoNext:   'RANDOM'
    },



    menneske1: {
      startTime:  402,
      stopTime:   405,
      msg: 'Powiedz "człowiek", w formie nieokreślonej:',
      answers: [
        { answer: '<i>et menneske</i>', next: 'menneske2' },
        { answer: '<i>mennesket</i>', next: 'menneske1b' }
      ]
    },
    menneske1b: {
      msg: 'Niestety',
      startTime:  409,
      stopTime:   415,
      answers: [
        { answer: '<i>et menneske</i>', next: 'menneske2' }
      ]
    },
    menneske2: {
      msg: 'SCORE',
      startTime:  406,
      stopTime:   408,
      autoNext:   'RANDOM'
    },



    fly1: {
      startTime:  416,
      stopTime:   418,
      msg: 'Powiedz "ten samolot":',
      answers: [
        { answer: '<i>et fly</i>', next: 'fly1b' },
        { answer: '<i>flyet</i>', next: 'fly2' }
      ]
    },
    fly1b: {
      msg: 'Niestety',
      startTime:  422,
      stopTime:   431,
      answers: [
        { answer: '<i>flyet</i>', next: 'fly2' }
      ]
    },
    fly2: {
      msg: 'SCORE',
      startTime:  419,
      stopTime:   421,
      autoNext:   'RANDOM'
    },



    hund1: {
      startTime:  432,
      stopTime:   435,
      msg: 'Powiedz "jeden pies", nieokreślony:',
      answers: [
        { answer: '<i>en hund</i>', next: 'hund2' },
        { answer: '<i>hunden</i>', next: 'hund1b' }
      ]
    },
    hund1b: {
      msg: 'Niestety',
      startTime:  439,
      stopTime:   445,
      answers: [
        { answer: '<i>en hund</i>', next: 'hund2' }
      ]
    },
    hund2: {
      msg: 'SCORE',
      startTime:  436,
      stopTime:   438,
      autoNext:   'RANDOM'
    },



    avtale1: {
      startTime:  446,
      stopTime:   449,
      msg: 'Jak powiesz "umowa" w formie określonej?',
      answers: [
        { answer: '<i>en avtale</i>', next: 'avtale1b' },
        { answer: '<i>avtalen</i>', next: 'avtale2' }
      ]
    },
    avtale1b: {
      msg: 'Niestety',
      startTime:  453,
      stopTime:   463,
      answers: [
        { answer: '<i>avtalen</i>', next: 'avtale2' }
      ]
    },
    avtale2: {
      msg: 'SCORE',
      startTime:  450,
      stopTime:   452,
      autoNext:   'RANDOM'
    },



    by1: {
      startTime:  464,
      stopTime:   467,
      msg: 'Powiedz "miasto" w formie nieokreślonej:',
      answers: [
        { answer: '<i>en by</i>', next: 'by2' },
        { answer: '<i>byen</i>', next: 'by1b' }
      ]
    },
    by1b: {
      msg: 'Niestety',
      startTime:  471,
      stopTime:   476,
      answers: [
        { answer: '<i>en by</i>', next: 'by2' }
      ]
    },
    by2: {
      msg: 'SCORE',
      startTime:  468,
      stopTime:   470,
      autoNext:   'RANDOM'
    },



    firma1: {
      startTime:  477,
      stopTime:   480,
      msg: 'Powiedz "firma" w formie nieokreślonej:',
      answers: [
        { answer: '<i>et firma</i>', next: 'firma2' },
        { answer: '<i>firmaet</i>', next: 'firma1b' }
      ]
    },
    firma1b: {
      msg: 'Niestety',
      startTime:  484,
      stopTime:   490,
      answers: [
        { answer: '<i>et firma</i>', next: 'firma2' }
      ]
    },
    firma2: {
      msg: 'SCORE',
      startTime:  481,
      stopTime:   483,
      autoNext:   'RANDOM'
    },



    skog1: {
      startTime:  491,
      stopTime:   493,
      msg: 'Powiedz "ten las":',
      answers: [
        { answer: '<i>en skog</i>', next: 'skog1b' },
        { answer: '<i>skogen</i>', next: 'skog2' }
      ]
    },
    skog1b: {
      msg: 'Niestety',
      startTime:  497,
      stopTime:   505,
      answers: [
        { answer: '<i>skogen</i>', next: 'skog2' }
      ]
    },
    skog2: {
      msg: 'SCORE',
      startTime:  494,
      stopTime:   496,
      autoNext:   'RANDOM'
    }









//    xx1: {
//      msg: '',          //  message or question string showed over answer buttons
//      startTime:  1,        //  startTime time in seconds
//      stopTime:   3,        //  stopTime time in seconds
//      answers: [
//        { answer: '<i>xx</i>', next: 'xx1b' },
//        { answer: '<i>xx</i>', next: 'xx2' }
//      ]
//    },
//    xx1b: {
//      msg: '',
//      startTime:  1,
//      stopTime:   3,
//      answers: [
//        { answer: '<i>xx</i>', next: 'xx2' }
//      ]
//    },
//    xx2: {
//      msg: '',
//      startTime:  1,
//      stopTime:   3,
//      autoNext:   'RANDOM'
//      more:       { startTime: 1, stopTime: 3 }
//    }

  };


  this.end = {

    end1: {
      msg: 'END',
      startTime: 506,
      stopTime: 511
    }

  };



}
</script>
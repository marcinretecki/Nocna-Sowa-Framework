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
      msg: "Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i>play</i>.",
      autoNext: "ENDINTRO",
      more: { startTime: 0, stopTime: 26 }
    }
  };


  this.chat = {

    buss1: {
      startTime:  27,
      stopTime:   30,
      answers: [
        { answer: 'en buss', next: 'buss2' },
        { answer: 'bussen', wrong: true }
      ],
      more:       { startTime: 34, stopTime: 40 }
    },
    buss2: {
      msg:        '<i>en buss</i>',
      score:      true,
      startTime:  31,
      stopTime:   33,
      autoNext:   'RANDOM'
    },



    speil1: {
      startTime:  41,
      stopTime:   43,
      answers: [
        { answer: 'speilet', next: 'speil2' },
        { answer: 'et speil', wrong: true }
      ],
      more:       { startTime: 47, stopTime: 56 }
    },
    speil2: {
      msg:        '<i>speilet</i>',
      score:      true,
      startTime:  44,
      stopTime:   46,
      autoNext:   'RANDOM'
    },



    mann1: {
      startTime:  57,
      stopTime:   61,
      answers: [
        { answer: 'mannen', next: 'mann2' },
        { answer: 'en mann', wrong: true }
      ],
      more:       { startTime: 65, stopTime: 75 }
    },
    mann2: {
      msg:        '<i>mannen</i>',
      score:      true,
      startTime:  62,
      stopTime:   64,
      autoNext:   'RANDOM'
    },



    kvinne1: {
      startTime:  76,
      stopTime:   79,
      answers: [
        { answer: 'ei kvinne', next: 'kvinne2' },
        { answer: 'kvinna', wrong: true }
      ],
      more:       { startTime: 83, stopTime: 89 }
    },
    kvinne2: {
      msg:        '<i>ei kvinne</i>',
      score:      true,
      startTime:  80,
      stopTime:   82,
      autoNext:   'RANDOM'
    },



    gutt1: {
      startTime:  90,
      stopTime:   92,
      answers: [
        { answer: 'gutten', next: 'gutt2' },
        { answer: 'en gutt', wrong: true }
      ],
      more:       { startTime: 96, stopTime: 106 }
    },
    gutt2: {
      msg:        '<i>gutten</i>',
      score:      true,
      startTime:  93,
      stopTime:   95,
      autoNext:   'RANDOM'
    },



    jente1: {
      startTime:  107,
      stopTime:   111,
      answers: [
        { answer: 'ei jente', next: 'jente2' },
        { answer: 'jenta', wrong: true }
      ],
      more:       { startTime: 115, stopTime: 121 }
    },
    jente2: {
      msg:        '<i>ei jente</i>',
      score:      true,
      startTime:  112,
      stopTime:   114,
      autoNext:   'RANDOM'
    },



    barn1: {
      startTime:  123,
      stopTime:   125,
      answers: [
        { answer: 'barnet', next: 'barn2' },
        { answer: 'et barn', wrong: true }
      ],
      more:       { startTime: 129, stopTime: 138 }
    },
    barn2: {
      msg:        '<i>barnet</i>',
      score:      true,
      startTime:  126,
      stopTime:   128,
      autoNext:   'RANDOM'
    },



    kone1: {
      startTime:  139,
      stopTime:   142,
      answers: [
        { answer: 'kona', next: 'kone2' },
        { answer: 'ei kone', wrong: true }
      ],
      more:       { startTime: 146, stopTime: 156 }
    },
    kone2: {
      msg:        '<i>kona</i>',
      score:      true,
      startTime:  143,
      stopTime:   145,
      autoNext:   'RANDOM'
    },



    land1: {
      startTime:  157,
      stopTime:   159,
      answers: [
        { answer: 'landet', next: 'land2' },
        { answer: 'et land', wrong: true }
      ],
      more:       { startTime: 163, stopTime: 172 }
    },
    land2: {
      msg: '<i>landet</i>',
      score: true,
      startTime:  160,
      stopTime:   162,
      autoNext:   'RANDOM'
    },



    hytte1: {
      startTime:  173,
      stopTime:   177,
      answers: [
        { answer: 'ei hytte', next: 'hytte2' },
        { answer: 'hytta', wrong: true }
      ],
      more:       { startTime: 181, stopTime: 187 }
    },
    hytte2: {
      msg: '<i>ei hytte</i>',
      score: true,
      startTime:  178,
      stopTime:   180,
      autoNext:   'RANDOM',
      more:       { startTime: 188, stopTime: 201 }
    },



    hylle1: {
      startTime:  202,
      stopTime:   204,
      answers: [
        { answer: 'hylla', next: 'hylle2' },
        { answer: 'ei hylle', wrong: true }
      ],
      more:       { startTime: 208, stopTime: 217 }
    },
    hylle2: {
      msg: '<i>hylla</i>',
      score: true,
      startTime:  205,
      stopTime:   207,
      autoNext:   'RANDOM'
    },



    vindu1: {
      startTime:  218,
      stopTime:   220,
      answers: [
        { answer: 'et vindu', next: 'vindu2' },
        { answer: 'vinduet', wrong: true }
      ],
      more:       { startTime: 224, stopTime: 230 }
    },
    vindu2: {
      msg: '<i>et vindu</i>',
      score: true,
      startTime:  221,
      stopTime:   223,
      autoNext:   'RANDOM'
    },



    gulv1: {
      startTime:  231,
      stopTime:   234,
      answers: [
        { answer: 'gulvet', next: 'gulv2' },
        { answer: 'et gulv', wrong: true }
      ],
      more:       { startTime: 238, stopTime: 248 }
    },
    gulv2: {
      msg: '<i>gulvet</i>',
      score: true,
      startTime:  235,
      stopTime:   237,
      autoNext:   'RANDOM'
    },



    bord1: {
      startTime:  249,
      stopTime:   252,
      answers: [
        { answer: 'et bord', next: 'bord2' },
        { answer: 'bordet', wrong: true }
      ],
      more:       { startTime: 256, stopTime: 262 }
    },
    bord2: {
      msg: '<i>et bord</i>',
      score: true,
      startTime:  253,
      stopTime:   255,
      autoNext:   'RANDOM'
    },



    skap1: {
      startTime:  263,
      stopTime:   265,
      answers: [
        { answer: 'skapet', next: 'skap2' },
        { answer: 'et skap', wrong: true }
      ],
      more:       { startTime: 269, stopTime: 279 }
    },
    skap2: {
      msg: '<i>skapet</i>',
      score: true,
      startTime:  266,
      stopTime:   268,
      autoNext:   'RANDOM'
    },



    stol1: {
      startTime:  280,
      stopTime:   283,
      answers: [
        { answer: 'en stol', next: 'stol2' },
        { answer: 'stolen', wrong: true }
      ],
      more:       { startTime: 287, stopTime: 294 }
    },
    stol2: {
      msg: '<i>en stol</i>',
      score: true,
      startTime:  284,
      stopTime:   286,
      autoNext:   'RANDOM'
    },



    mobil1: {
      startTime:  295,
      stopTime:   297,
      answers: [
        { answer: 'mobilen', next: 'mobil2' },
        { answer: 'en mobil', wrong: true }
      ],
      more:       { startTime: 301, stopTime: 311 }
    },
    mobil2: {
      msg: '<i>mobilen</i>',
      score: true,
      startTime:  298,
      stopTime:   300,
      autoNext:   'RANDOM',
      more:       { startTime: 312, stopTime: 321 }

    },


    melding1: {
      startTime:  323,
      stopTime:   325,
      answers: [
        { answer: 'en melding', next: 'melding2' },
        { answer: 'meldingen', wrong: true }
      ],
      more:       { startTime: 329, stopTime: 335 }
    },
    melding2: {
      msg: '<i>en melding</i>',
      score: true,
      startTime:  326,
      stopTime:   328,
      autoNext:   'RANDOM',
      more:       { startTime: 336, stopTime: 342 }
    },



    tog1: {
      startTime:  343,
      stopTime:   345,
      answers: [
        { answer: 'toget', next: 'tog2' },
        { answer: 'et tog', wrong: true }
      ],
      more:       { startTime: 349, stopTime: 358 }
    },
    tog2: {
      msg: '<i>toget</i>',
      score: true,
      startTime:  346,
      stopTime:   348,
      autoNext:   'RANDOM'
    },



    hus1: {
      startTime:  359,
      stopTime:   361,
      answers: [
        { answer: 'et hus', next: 'hus2' },
        { answer: 'huset', wrong: true }
      ],
      more:       { startTime: 365, stopTime: 371 }
    },
    hus2: {
      msg: '<i>et hus</i>',
      score: true,
      startTime:  362,
      stopTime:   364,
      autoNext:   'RANDOM'
    },



    seng1: {
      startTime:  372,
      stopTime:   374,
      answers: [
        { answer: 'senga', next: 'seng2' },
        { answer: 'ei seng', wrong: true }
      ],
      more:       { startTime: 378, stopTime: 387 }
    },
    seng2: {
      msg: '<i>senga</i>',
      score: true,
      startTime:  375,
      stopTime:   377,
      autoNext:   'RANDOM'
    },



    kontakt1: {
      startTime:  388,
      stopTime:   391,
      answers: [
        { answer: 'en kontakt', next: 'kontakt2' },
        { answer: 'kontakten', wrong: true }
      ],
      more:       { startTime: 395, stopTime: 401 }
    },
    kontakt2: {
      msg: '<i>en kontakt</i>',
      score: true,
      startTime:  392,
      stopTime:   394,
      autoNext:   'RANDOM'
    },



    menneske1: {
      startTime:  402,
      stopTime:   405,
      answers: [
        { answer: 'et menneske', next: 'menneske2' },
        { answer: 'mennesket', wrong: true }
      ],
      more:       { startTime: 409, stopTime: 415 }
    },
    menneske2: {
      msg: '<i>et menneske</i>',
      score: true,
      startTime:  406,
      stopTime:   408,
      autoNext:   'RANDOM'
    },



    fly1: {
      startTime:  416,
      stopTime:   418,
      answers: [
        { answer: 'flyet', next: 'fly2' },
        { answer: 'et fly', wrong: true }
      ],
      more:       { startTime: 422, stopTime: 431 }
    },
    fly2: {
      msg: '<i>flyet</i>',
      score: true,
      startTime:  419,
      stopTime:   421,
      autoNext:   'RANDOM'
    },



    hund1: {
      startTime:  432,
      stopTime:   435,
      answers: [
        { answer: 'en hund', next: 'hund2' },
        { answer: 'hunden', wrong: true }
      ],
      more:       { startTime: 439, stopTime: 445 }
    },
    hund2: {
      msg: '<i>en hund</i>',
      score: true,
      startTime:  436,
      stopTime:   438,
      autoNext:   'RANDOM'
    },



    avtale1: {
      startTime:  446,
      stopTime:   449,
      answers: [
        { answer: 'avtalen', next: 'avtale2' },
        { answer: 'en avtale', wrong: true }
      ],
      more:       { startTime: 453, stopTime: 463 }
    },
    avtale2: {
      msg: '<i>avtalen</i>',
      score: true,
      startTime:  450,
      stopTime:   452,
      autoNext:   'RANDOM'
    },



    by1: {
      startTime:  464,
      stopTime:   467,
      answers: [
        { answer: 'en by', next: 'by2' },
        { answer: 'byen', wrong: true }
      ],
      more:       { startTime: 471, stopTime: 476 }
    },
    by2: {
      msg: '<i>en by</i>',
      score: true,
      startTime:  468,
      stopTime:   470,
      autoNext:   'RANDOM'
    },



    firma1: {
      startTime:  477,
      stopTime:   480,
      answers: [
        { answer: 'et firma', next: 'firma2' },
        { answer: 'firmaet', wrong: true }
      ],
      more:       { startTime: 484, stopTime: 490 }
    },
    firma2: {
      msg: '<i>et firma</i>',
      score: true,
      startTime:  481,
      stopTime:   483,
      autoNext:   'RANDOM'
    },



    skog1: {
      startTime:  491,
      stopTime:   493,
      answers: [
        { answer: 'skogen', next: 'skog2' },
        { answer: 'en skog', wrong: true }
      ],
      more:       { startTime: 497, stopTime: 505 }
    },
    skog2: {
      msg: '<i>skogen</i>',
      score: true,
      startTime:  494,
      stopTime:   496,
      autoNext:   'RANDOM'
    }









//    xx1: {
//      msg: '',          //  message or question string showed over answer buttons
//      startTime:  1,        //  startTime time in seconds
//      stopTime:   3,        //  stopTime time in seconds
//      answers: [
//        { answer: 'xx', wrong: true },
//        { answer: 'xx', next: 'xx2' }
//      ]
//    },
//    xx1b: {
//      msg: '',
//      startTime:  1,
//      stopTime:   3,
//      answers: [
//        { answer: 'xx', next: 'xx2' }
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
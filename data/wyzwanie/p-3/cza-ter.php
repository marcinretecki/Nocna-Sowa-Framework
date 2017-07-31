<script>
function LasData() {

  this.category = 'audio-test';   // chat|setninger|etc


  this.testNotes = [
  ];


  this.intro = {
    _a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w las-icon-size-2"></i>.',
      autoNext:     'ENDINTRO'
    }
  };


  this.chat = {

    _aa1: {
      spokenWord: 'Czytać po norwesku to: å lese. Jak powiesz: “Ela czyta.”?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_aa2'
    },
    _aa2: {
      spokenWord: 'Ela leser.',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_aa3'
    },
    _aa3: {
      spokenWord: 'Ela czyta książkę.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_aa4'
    },
    _aa4: {
      msg:        '<i>Ela leser ei bok.</i>',
      trans:      'Ela czyta książkę.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ab1: {
      spokenWord: 'Przychodzić, przybywać to: å komme. Powiedz po norwesku: Przyjdę.',
      startTime:  8,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_ab2'
    },
    _ab2: {
      spokenWord: 'Jeg kommer.',
      startTime:  12,
      duration:   1.5,
      autoNext:   '_ab3'
    },
    _ab3: {
      spokenWord: 'Przyjdę do Ciebie.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_ab4'
    },
    _ab4: {
      msg:        '<i>Jeg kommer til deg.</i>',
      trans:      'Przyjdę do Ciebie.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ae1: {
      spokenWord: 'Mieć to: å ha. Jak powiedzieć: Wy macie.',
      startTime:  29,
      duration:   1.5,
      pauseTime:  5,
      autoNext:   '_ae2'
    },
    _ae2: {
      spokenWord: 'Dere har.',
      startTime:  33,
      duration:   1.5,
      autoNext:   '_ae3'
    },
    _ae3: {
      spokenWord: 'Wy macie dzieci.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_ae4'
    },
    _ae4: {
      msg:        '<i>Dere har barn.</i>',
      trans:      'Wy macie dzieci.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _af1: {
      spokenWord: 'Brać po norwesku to: å ta. Jak powiesz w sklepie: Biorę.',
      startTime:  36,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_af2'
    },
    _af2: {
      spokenWord: 'Jeg tar.',
      startTime:  40,
      duration:   1.5,
      autoNext:   '_af3'
    },
    _af3: {
      spokenWord: 'Wezmę to.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_af4'
    },
    _af4: {
      msg:        '<i>Jeg tar det.</i>',
      trans:      'Wezmę to.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ah1: {
      spokenWord: 'Dostać to: å få. Powiedz: Olaf dostaje.',
      startTime:  43,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_ah2'
    },
    _ah2: {
      spokenWord: 'Olaf får.',
      startTime:  47,
      duration:   1.5,
      autoNext:   '_ah3'
    },
    _ah3: {
      spokenWord: 'Olaf dostaje prezenty.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_ah4'
    },
    _ah4: {
      msg:        '<i>Olaf får gaver.</i>',
      trans:      'Olaf dostaje prezenty.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _aj1: {
      spokenWord: 'Iść to: å gå. Powiedz: Idziemy.',
      startTime:  50,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_aj2'
    },
    _aj2: {
      spokenWord: 'Vi går.',
      startTime:  54,
      duration:   1.5,
      autoNext:   '_aj3'
    },
    _aj3: {
      spokenWord: 'Idziemy do lasu.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_aj4'
    },
    _aj4: {
      msg:        '<i>Vi går til skogen.</i>',
      trans:      'Idziemy do lasu.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ai1: {
      spokenWord: 'Å bli znaczy stać się lub zostać. Powiedz: Zostaję.',
      startTime:  57,
      duration:   1.5,
      pauseTime:  5,
      autoNext:   '_ai2'
    },
    _ai2: {
      spokenWord: 'Jeg blir.',
      startTime:  60,
      duration:   1.5,
      autoNext:   '_ai3'
    },
    _ai3: {
      spokenWord: 'Zostaję w domu.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_ai4'
    },
    _ai4: {
      msg:        '<i>Jeg blir hjemme.</i>',
      trans:      'Zostaję w domu.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ak1: {
      spokenWord: 'Dać to: å gi. Sklep daje.',
      startTime:  63,
      duration:   1.5,
      pauseTime:  5,
      autoNext:   '_ak2'
    },
    _ak2: {
      spokenWord: 'Butikken gir.',
      startTime:  67,
      duration:   1.5,
      autoNext:   '_ak3'
    },
    _ak3: {
      spokenWord: 'Sklep daje rabat.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_ak4'
    },
    _ak4: {
      msg:        '<i>Butikken gir rabatt.</i>',
      trans:      'Sklep daje rabat.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _al1: {
      spokenWord: 'Potrzebować to: å trenge. Powiedz: Ona potrzebuje.',
      startTime:  70,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_al2'
    },
    _al2: {
      spokenWord: 'Hun trenger.',
      startTime:  74,
      duration:   1.5,
      autoNext:   '_al3'
    },
    _al3: {
      spokenWord: 'Ona potrzebuje klucza.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_al4'
    },
    _al4: {
      msg:        '<i>Hun trenger nøkkelen.</i>',
      trans:      'Ona potrzebuje klucza.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ba1: {
      spokenWord: 'Czekać to: å vente. Powiedz: Czekam albo zaczekam. ',
      startTime:  77,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ba2'
    },
    _ba2: {
      spokenWord: 'Jeg venter.',
      startTime:  81,
      duration:   1.5,
      autoNext:   '_ba3'
    },
    _ba3: {
      spokenWord: 'Czekam na Ciebie, albo Zaczekam na Ciebie.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_ba4'
    },
    _ba4: {
      msg:        '<i>Jeg venter på deg.</i>',
      trans:      'Czekam na Ciebie. / Zaczekam na Ciebie.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bb1: {
      spokenWord: 'Rozmawiać to: å snakke. Powiedz: Oni rozmawiają. ',
      startTime:  85,
      duration:   1.5,
      pauseTime:  5,
      autoNext:   '_bb2'
    },
    _bb2: {
      spokenWord: 'De snakker.',
      startTime:  89,
      duration:   1.5,
      autoNext:   '_bb3'
    },
    _bb3: {
      spokenWord: 'Oni rozmawiają z policją.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_bb4'
    },
    _bb4: {
      msg:        '<i>De snakker med politi.</i>',
      trans:      'Oni rozmawiają z policją.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bc1: {
      spokenWord: 'Lubić to: å like. Powiedz: On lubi.',
      startTime:  92,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_bc2'
    },
    _bc2: {
      spokenWord: 'Han liker.',
      startTime:  95,
      duration:   1.5,
      autoNext:   '_bc3'
    },
    _bc3: {
      spokenWord: 'On lubi dziewczynę, lub podoba mu się dziewczyna.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_bc4'
    },
    _bc4: {
      msg:        '<i>Han liker jenta.</i>',
      trans:      'On lubi dziewczynę. / Podoba mu się dziewczyna.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bd1: {
      spokenWord: 'Podróżować, jeździć to: å reise. Powiedz: Jedziemy.',
      startTime:  98,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_bd2'
    },
    _bd2: {
      spokenWord: 'Vi reiser.',
      startTime:  102,
      duration:   1.5,
      more:       {
        spokenWord: 'Synonimem å reise jest å dra. Dlatego możesz też powiedzieć: Vi drar.'
      },
      autoNext:   '_bd3'
    },
    _bd3: {
      spokenWord: 'Jedziemy na wakacje.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_bd4'
    },
    _bd4: {
      msg:        '<i>Vi reiser på ferie.</i>',
      trans:      'Jedziemy na wakacje.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bh1: {
      spokenWord: 'Rozumieć to å forstå. Powiedz: Rozumiem. ',
      startTime:  126,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_bh2'
    },
    _bh2: {
      spokenWord: 'Jeg forstår.',
      startTime:  130,
      duration:   1.5,
      more:       {
        spokenWord: 'Synonimem å forstå jest å skjønne. Dlatego możesz też powiedzieć: Jeg skjønner.'
      },
      autoNext:   '_bh3'
    },
    _bh3: {
      spokenWord: 'Rozumiem wszystko.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_bh4'
    },
    _bh4: {
      msg:        '<i>Jeg forstår alt.</i>',
      trans:      'Rozumiem wszystko.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bj1: {
      spokenWord: 'Å høre på znaczy słuchać. Powiedz: Oni słuchają. ',
      startTime:  139,
      duration:   1.5,
      pauseTime:  5,
      autoNext:   '_bj2'
    },
    _bj2: {
      spokenWord: 'De hører på.',
      startTime:  142,
      duration:   1.5,
      autoNext:   '_bj3'
    },
    _bj3: {
      spokenWord: 'Oni słuchają black metalu.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_bj4'
    },
    _bj4: {
      msg:        '<i>De hører på black metal.</i>',
      trans:      'Oni słuchają black metalu.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bo1: {
      spokenWord: 'Å klare to dawać radę. Powiedz: Daję radę. Albo: Radzę sobie z tym.',
      startTime:  178,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_bo2'
    },
    _bo4: {
      msg:        '<i>Jeg klarer det.</i>',
      trans:      'Daję radę. / Radzę sobie z tym.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ca1: {
      spokenWord: 'Å be znaczy prosić. Powiedz: On prosi. ',
      startTime:  185,
      duration:   1.5,
      pauseTime:  7,
      autoNext:   '_ca2'
    },
    _ca2: {
      spokenWord: 'Han ber.',
      startTime:  189,
      duration:   1.5,
      autoNext:   '_ca3'
    },
    _ca3: {
      spokenWord: 'On prosi o pomoc.',
      startTime:  190,
      duration:   1.5,
      pause:      6,
      autoNext:   '_ca4'
    },
    _ca4: {
      msg:        '<i>Han ber om hjelp.</i>',
      trans:      'On prosi o pomoc.',
      startTime:  192,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _cb1: {
      spokenWord: 'Dzwonić to: å ringe. Powiedz: One dzwonią.',
      startTime:  192,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_cb2'
    },
    _cb2: {
      spokenWord: 'De ringer.',
      startTime:  196,
      duration:   1.5,
      autoNext:   '_cb3'
    },
    _cb3: {
      spokenWord: 'One dzwonią po karetkę.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_cb4'
    },
    _cb4: {
      msg:        '<i>De ringer etter ambulansen.</i>',
      trans:      'One dzwonią po karetkę.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ccb1: {
      spokenWord: 'Mieszakć to: å bo. Powiedz: Oni mieszkają.',
      startTime:  199,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_ccb2'
    },
    _ccb2: {
      spokenWord: 'De bor.',
      startTime:  203,
      duration:   1.5,
      autoNext:   '_ccb3'
    },
    _ccb3: {
      spokenWord: 'Oni mieszkają razem.',
      startTime:  205,
      duration:   1.5,
      pause:      6,
      autoNext:   '_ccb4'
    },
    _ccb4: {
      msg:        '<i>De bor sammen.</i>',
      trans:      'Oni mieszkają razem.',
      startTime:  207,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _cc1: {
      spokenWord: 'Leżeć to: å ligge. Powiedz: Telefon leży.',
      startTime:  199,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_cc2'
    },
    _cc2: {
      spokenWord: 'Mobilen ligger.',
      startTime:  203,
      duration:   1.5,
      autoNext:   '_cc3'
    },
    _cc3: {
      spokenWord: 'Telefon leży na stole.',
      startTime:  205,
      duration:   1.5,
      pause:      6,
      autoNext:   '_cc4'
    },
    _cc4: {
      msg:        '<i>Mobilen ligger på bordet.</i>',
      trans:      'Telefon leży na stole.',
      startTime:  207,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    }



  };


  this.extra = {

    _cd1: {
      spokenWord: 'Myśleć to: å tenke. Powiedz: Ona myśli.',
      startTime:  206,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_cd2'
    },
    _cd2: {
      spokenWord: 'Hun tenker.',
      startTime:  209,
      duration:   1.5,
      autoNext:   '_cd3'
    },
    _cd3: {
      spokenWord: 'Ona myśli dużo.',
      startTime:  210,
      duration:   1.5,
      pause:      6,
      autoNext:   '_cd4'
    },
    _cd4: {
      msg:        '<i>Hun tenker mye.</i>',
      trans:      'Ona myśli dużo.',
      startTime:  210,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bi1: {
      spokenWord: 'Å tro to wierzeć. Powiedz: On wierzy. ',
      startTime:  133,
      duration:   1.5,
      pauseTime:  5,
      autoNext:   '_bi2'
    },
    _bi2: {
      spokenWord: 'Han tror.',
      startTime:  136,
      duration:   1.5,
      autoNext:   '_bi3'
    },
    _bi3: {
      spokenWord: 'On wierzy w siebie.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_bi4'
    },
    _bi4: {
      msg:        '<i>Han tror i seg selv.</i>',
      trans:      'On wierzy w siebie.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bf1: {
      spokenWord: 'Å elske znaczy kochać. Powiedz: Oni kochają.',
      startTime:  113,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_bf2'
    },
    _bf2: {
      spokenWord: 'De elsker.',
      startTime:  116,
      duration:   1.5,
      autoNext:   '_bf3'
    },
    _bf3: {
      spokenWord: 'Oni kochają góry.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_bf4'
    },
    _bf4: {
      msg:        '<i>De elsker fjell.</i>',
      trans:      'Oni kochają góry.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ac1: {
      spokenWord: 'Pić to: å drikke. Powiedz: Pijemy. ',
      startTime:  15,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_ac2'
    },
    _ac2: {
      spokenWord: 'Vi drikker.',
      startTime:  19,
      duration:   1.5,
      autoNext:   '_ac3'
    },
    _ac3: {
      spokenWord: 'My pijemy wodę.',
      startTime:  0,
      duration:   1.5,
      pause:      6,
      autoNext:   '_ac4'
    },
    _ac4: {
      msg:        '<i>Vi drikker vann.</i>',
      trans:      'My pijemy wodę.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },

  };



}
</script>
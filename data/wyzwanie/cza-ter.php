<script>
function LasAudioData() {

  this.testNotes = [
    'nie ma startTime stopTime'
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
      spokenWord: 'Czytać po norwesku to: å lese. Jak powiesz: “Ela czyta.”?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'aa2'
    },
    aa2: {
      spokenWord: 'Ela leser.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'aa3'
    },
    aa3: {
      spokenWord: 'Ela czyta książkę.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'aa4'
    },
    aa4: {
      msg:        'Ela leser ei bok.',
      trans:      'Ela czyta książkę.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ab1: {
      spokenWord: 'Przychodzić, przybywać to: å komme. Powiedz po norwesku: Przyjdę.',
      startTime:  8,
      stopTime:   10.5,
      pauseTime:  6,
      autoNext:   'ab2'
    },
    ab2: {
      spokenWord: 'Jeg kommer.',
      startTime:  12,
      stopTime:   13.5,
      autoNext:   'ab3'
    },
    ab3: {
      spokenWord: 'Przyjdę do Ciebie.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'ab4'
    },
    ab4: {
      msg:        'Jeg kommer til deg.',
      trans:      'Przyjdę do Ciebie.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ac1: {
      spokenWord: 'Pić to: å drikke. Powiedz: Pijemy. ',
      startTime:  15,
      stopTime:   18,
      pauseTime:  6,
      autoNext:   'ac2'
    },
    ac2: {
      spokenWord: 'Vi drikker.',
      startTime:  19,
      stopTime:   21,
      autoNext:   'ac3'
    },
    ac3: {
      spokenWord: 'My pijemy wodę.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'ac4'
    },
    ac4: {
      msg:        'Vi drikker vann.',
      trans:      'My pijemy wodę.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ae1: {
      spokenWord: 'Mieć to: å ha. Jak powiedzieć: Wy macie.',
      startTime:  29,
      stopTime:   31.5,
      pauseTime:  5,
      autoNext:   'ae2'
    },
    ae2: {
      spokenWord: 'Dere har.',
      startTime:  33,
      stopTime:   34.5,
      autoNext:   'ae3'
    },
    ae3: {
      spokenWord: 'Wy macie dzieci.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'ae4'
    },
    ae4: {
      msg:        'Dere har barn.',
      trans:      'Wy macie dzieci.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    af1: {
      spokenWord: 'Brać po norwesku to: å ta. Jak powiesz w sklepie: Biorę.',
      startTime:  36,
      stopTime:   39,
      pauseTime:  6,
      autoNext:   'af2'
    },
    af2: {
      spokenWord: 'Jeg tar.',
      startTime:  40,
      stopTime:   42,
      autoNext:   'af3'
    },
    af3: {
      spokenWord: 'Wezmę to.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'af4'
    },
    af4: {
      msg:        'Jeg tar det.',
      trans:      'Wezmę to.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ah1: {
      spokenWord: 'Dostać to: å få. Powiedz: Olaf dostaje.',
      startTime:  43,
      stopTime:   45.5,
      pauseTime:  6,
      autoNext:   'ah2'
    },
    ah2: {
      spokenWord: 'Olaf får.',
      startTime:  47,
      stopTime:   49,
      autoNext:   'ah3'
    },
    ah3: {
      spokenWord: 'Olaf dostaje prezenty.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'ah4'
    },
    ah4: {
      msg:        'Olaf får gaver.',
      trans:      'Olaf dostaje prezenty.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    aj1: {
      spokenWord: 'Iść to: å gå. Powiedz: Idziemy.',
      startTime:  50,
      stopTime:   52.5,
      pauseTime:  6,
      autoNext:   'aj2'
    },
    aj2: {
      spokenWord: 'Vi går.',
      startTime:  54,
      stopTime:   56,
      autoNext:   'aj3'
    },
    aj3: {
      spokenWord: 'Idziemy do lasu.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'aj4'
    },
    aj4: {
      msg:        'Vi går til skogen.',
      trans:      'Idziemy do lasu.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ai1: {
      spokenWord: 'Å bli znaczy stać się lub zostać. Powiedz: Zostaję.',
      startTime:  57,
      stopTime:   59,
      pauseTime:  5,
      autoNext:   'ai2'
    },
    ai2: {
      spokenWord: 'Jeg blir.',
      startTime:  60,
      stopTime:   61.5,
      autoNext:   'ai3'
    },
    ai3: {
      spokenWord: 'Zostaję w domu.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'ai4'
    },
    ai4: {
      msg:        'Jeg blir hjemme.',
      trans:      'Zostaję w domu.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ak1: {
      spokenWord: 'Dać to: å gi. Sklep daje.',
      startTime:  63,
      stopTime:   65.5,
      pauseTime:  5,
      autoNext:   'ak2'
    },
    ak2: {
      spokenWord: 'Butikken gir.',
      startTime:  67,
      stopTime:   68.5,
      autoNext:   'ak3'
    },
    ak3: {
      spokenWord: 'Sklep daje rabat.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'ak4'
    },
    ak4: {
      msg:        'Butikken gir rabatt.',
      trans:      'Sklep daje rabat.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    al1: {
      spokenWord: 'Potrzebować to: å trenge. Powiedz: Ona potrzebuje.',
      startTime:  70,
      stopTime:   72.5,
      pauseTime:  6,
      autoNext:   'al2'
    },
    al2: {
      spokenWord: 'Hun trenger.',
      startTime:  74,
      stopTime:   76,
      autoNext:   'al3'
    },
    al3: {
      spokenWord: 'Ona potrzebuje klucza.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'al4'
    },
    al4: {
      msg:        'Hun trenger nøkkelen.',
      trans:      'Ona potrzebuje klucza.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ba1: {
      spokenWord: 'Czekać to: å vente. Powiedz: Czekam albo zaczekam. ',
      startTime:  77,
      stopTime:   79.5,
      pauseTime:  8,
      autoNext:   'ba2'
    },
    ba2: {
      spokenWord: 'Jeg venter.',
      startTime:  81,
      stopTime:   83.5,
      autoNext:   'ba3'
    },
    ba3: {
      spokenWord: 'Czekam na Ciebie, albo Zaczekam na Ciebie.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'ba4'
    },
    ba4: {
      msg:        'Jeg venter på deg.',
      trans:      'Czekam na Ciebie. / Zaczekam na Ciebie.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    bb1: {
      spokenWord: 'Rozmawiać to: å snakke. Powiedz: Oni rozmawiają. ',
      startTime:  85,
      stopTime:   87.5,
      pauseTime:  5,
      autoNext:   'bb2'
    },
    bb2: {
      spokenWord: 'De snakker.',
      startTime:  89,
      stopTime:   90.5,
      autoNext:   'bb3'
    },
    bb3: {
      spokenWord: 'Oni rozmawiają z policją.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'bb4'
    },
    bb4: {
      msg:        'De snakker med politi.',
      trans:      'Oni rozmawiają z policją.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    bc1: {
      spokenWord: 'Lubić to: å like. Powiedz: On lubi.',
      startTime:  92,
      stopTime:   94,
      pauseTime:  6,
      autoNext:   'bc2'
    },
    bc2: {
      spokenWord: 'Han liker.',
      startTime:  95,
      stopTime:   97,
      autoNext:   'bc3'
    },
    bc3: {
      spokenWord: 'On lubi dziewczynę, lub podoba mu się dziewczyna.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'bc4'
    },
    bc4: {
      msg:        'Han liker jenta.',
      trans:      'On lubi dziewczynę. / Podoba mu się dziewczyna.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    bd1: {
      spokenWord: 'Podróżować, jeździć to: å reise. Powiedz: Jedziemy.',
      startTime:  98,
      stopTime:   0.5,
      pauseTime:  8,
      autoNext:   'bd2'
    },
    bd2: {
      spokenWord: 'Vi reiser.',
      startTime:  102,
      stopTime:   104.5,
      more:       {
        spokenWord: 'Synonimem å reise jest å dra. Dlatego możesz też powiedzieć: Vi drar.'
      },
      autoNext:   'bd3'
    },
    bd3: {
      spokenWord: 'Jedziemy na wakacje.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'bd4'
    },
    bd4: {
      msg:        'Vi reiser på ferie.',
      trans:      'Jedziemy na wakacje.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    bf1: {
      spokenWord: 'Å elske znaczy kochać. Powiedz: Oni kochają.',
      startTime:  113,
      stopTime:   115,
      pauseTime:  6,
      autoNext:   'bf2'
    },
    bf2: {
      spokenWord: 'De elsker.',
      startTime:  116,
      stopTime:   118,
      autoNext:   'bf3'
    },
    bf3: {
      spokenWord: 'Oni kochają góry.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'bf4'
    },
    bf4: {
      msg:        'De elsker fjell.',
      trans:      'Oni kochają góry.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    bh1: {
      spokenWord: 'Rozumieć to å forstå. Powiedz: Rozumiem. ',
      startTime:  126,
      stopTime:   128.5,
      pauseTime:  6,
      autoNext:   'bh2'
    },
    bh2: {
      spokenWord: 'Jeg forstår.',
      startTime:  130,
      stopTime:   131.5,
      more:       {
        spokenWord: 'Synonimem å forstå jest å skjønne. Dlatego możesz też powiedzieć: Jeg skjønner.'
      },
      autoNext:   'bh3'
    },
    bh3: {
      spokenWord: 'Rozumiem wszystko.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'bh4'
    },
    bh4: {
      msg:        'Jeg forstår alt.',
      trans:      'Rozumiem wszystko.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    bi1: {
      spokenWord: 'Å tro to wierzeć. Powiedz: On wierzy. ',
      startTime:  133,
      stopTime:   134.5,
      pauseTime:  5,
      autoNext:   'bi2'
    },
    bi2: {
      spokenWord: 'Han tror.',
      startTime:  136,
      stopTime:   137.5,
      autoNext:   'bi3'
    },
    bi3: {
      spokenWord: 'On wierzy w siebie.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'bi4'
    },
    bi4: {
      msg:        'Han tror i seg selv.',
      trans:      'On wierzy w siebie.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    bj1: {
      spokenWord: 'Å høre på znaczy słuchać. Powiedz: Oni słuchają. ',
      startTime:  139,
      stopTime:   140.5,
      pauseTime:  5,
      autoNext:   'bj2'
    },
    bj2: {
      spokenWord: 'De hører på.',
      startTime:  142,
      stopTime:   143.5,
      autoNext:   'bj3'
    },
    bj3: {
      spokenWord: 'Oni słuchają black metalu.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'bj4'
    },
    bj4: {
      msg:        'De hører på black metal.',
      trans:      'Oni słuchają black metalu.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    bk1: {
      spokenWord: 'Å fortelle to opowiadać. Powiedz: Wy opowiadacie.',
      startTime:  145,
      stopTime:   147,
      pauseTime:  5,
      autoNext:   'bk2'
    },
    bk2: {
      spokenWord: 'Dere forteller.',
      startTime:  148,
      stopTime:   149.5,
      autoNext:   'xx3'
    },
    xx3: {
      spokenWord: 'Opowiadacie bajki.',
      startTime:  0,
      stopTime:   0,
      pause:      6,
      autoNext:   'xx4'
    },
    xx4: {
      msg:        'Dere forteller eventyr.',
      trans:      'Opowiadacie bajki.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    bm1: {
      spokenWord: 'Znaczyć to å bety. Powiedz: To coś znaczy.',
      startTime:  158,
      stopTime:   160,
      pauseTime:  6,
      autoNext:   'bm2'
    },
    bm2: {
      msg:        'Det betyr noe.',
      trans:      'To coś znaczy.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    bo1: {
      spokenWord: 'Å klare to dawać radę. Powiedz: Daję radę. Albo: Radzę sobie z tym.',
      startTime:  178,
      stopTime:   180.5,
      pauseTime:  6,
      autoNext:   'bo2'
    },
    bo4: {
      msg:        'Jeg klarer det.',
      trans:      'Daję radę. / Radzę sobie z tym.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ca1: {
      spokenWord: 'Å be znaczy prosić. Powiedz: On prosi. ',
      startTime:  185,
      stopTime:   187.5,
      pauseTime:  7,
      autoNext:   'ca2'
    },
    ca2: {
      spokenWord: 'Han ber.',
      startTime:  189,
      stopTime:   191,
      autoNext:   'ca3'
    },
    ca3: {
      spokenWord: 'On prosi o pomoc.',
      startTime:  190,
      stopTime:   191,
      pause:      6,
      autoNext:   'ca4'
    },
    ca4: {
      msg:        'Han ber om hjelp.',
      trans:      'On prosi o pomoc.',
      startTime:  192,
      stopTime:   193,
      autoNext:   'RANDOM'
    },


    cb1: {
      spokenWord: 'Dzwonić to: å ringe. Powiedz: One dzwonią.',
      startTime:  192,
      stopTime:   194.5,
      pauseTime:  6,
      autoNext:   'cb2'
    },
    cb2: {
      spokenWord: 'De ringer.',
      startTime:  196,
      stopTime:   197.5,
      autoNext:   'cb3'
    },
    cb3: {
      spokenWord: 'One dzwonią po karetkę.',
      startTime:  0,
      stopTime:   110,
      pause:      6,
      autoNext:   'cb4'
    },
    cb4: {
      msg:        'De ringer etter ambulansen.',
      trans:      'One dzwonią po karetkę.',
      startTime:  0,
      stopTime:   110,
      autoNext:   'RANDOM'
    },


    ccb1: {
      spokenWord: 'Mieszakć to: å bo. Powiedz: Oni mieszkają.',
      startTime:  199,
      stopTime:   201.5,
      pauseTime:  6,
      autoNext:   'ccb2'
    },
    ccb2: {
      spokenWord: 'De bor.',
      startTime:  203,
      stopTime:   204.5,
      autoNext:   'ccb3'
    },
    ccb3: {
      spokenWord: 'Oni mieszkają razem.',
      startTime:  205,
      stopTime:   206,
      pause:      6,
      autoNext:   'ccb4'
    },
    ccb4: {
      msg:        'De bor sammen.',
      trans:      'Oni mieszkają razem.',
      startTime:  207,
      stopTime:   208,
      autoNext:   'RANDOM'
    },


    cc1: {
      spokenWord: 'Leżeć to: å ligge. Powiedz: Telefon leży.',
      startTime:  199,
      stopTime:   201.5,
      pauseTime:  6,
      autoNext:   'cc2'
    },
    cc2: {
      spokenWord: 'Mobilen ligger.',
      startTime:  203,
      stopTime:   204.5,
      autoNext:   'cc3'
    },
    cc3: {
      spokenWord: 'Telefon leży na stole.',
      startTime:  205,
      stopTime:   206,
      pause:      6,
      autoNext:   'cc4'
    },
    cc4: {
      msg:        'Mobilen ligger på bordet.',
      trans:      'Telefon leży na stole.',
      startTime:  207,
      stopTime:   208,
      autoNext:   'RANDOM'
    },


    cd1: {
      spokenWord: 'Myśleć to: å tenke. Powiedz: Ona myśli.',
      startTime:  206,
      stopTime:   208,
      pauseTime:  6,
      autoNext:   'cd2'
    },
    cd2: {
      spokenWord: 'Hun tenker.',
      startTime:  209,
      stopTime:   210.5,
      autoNext:   'cd3'
    },
    cd3: {
      spokenWord: 'Ona myśli dużo.',
      startTime:  210,
      stopTime:   211,
      pause:      6,
      autoNext:   'cd4'
    },
    cd4: {
      msg:        'Hun tenker mye.',
      trans:      'Ona myśli dużo.',
      startTime:  210,
      stopTime:   211,
      autoNext:   'RANDOM'
    }



  };


  this.end = {

    end1: {
      msg:        '',
      /*startTime:  0,
      stopTime:   0*/
    }

  };



}
</script>
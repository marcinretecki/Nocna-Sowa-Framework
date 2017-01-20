<script>
function LasAudioData() {

  this.intro = {
    a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO'/*,
      more: { startTime: 0, stopTime: 26 }*/
    }
  };


  this.chat = {

    aa1: {
      /*startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'aa2'
    },
    aa2: {
      /*startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'aa3'
    },
    aa3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'aa4'
    },
    aa4: {
      msg:        'Ela leser ei bok.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    ab1: {
      /*startTime:  8,
      stopTime:   10.5,*/
      pauseTime:  6,
      autoNext:   'ab2'
    },
    ab2: {
      /*startTime:  12,
      stopTime:   13.5,*/
      autoNext:   'ab3'
    },
    ab3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'ab4'
    },
    ab4: {
      msg:        'Jeg kommer til deg.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    ac1: {
      /*startTime:  15,
      stopTime:   18,*/
      pauseTime:  6,
      autoNext:   'ac2'
    },
    ac2: {
      /*startTime:  19,
      stopTime:   21,*/
      autoNext:   'ac3'
    },
    ac3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'ac4'
    },
    ac4: {
      msg:        'Vi drikker vann.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    ae1: {
      /*startTime:  29,
      stopTime:   31.5,*/
      pauseTime:  5,
      autoNext:   'ae2'
    },
    ae2: {
      /*startTime:  33,
      stopTime:   34.5,*/
      autoNext:   'ae3'
    },
    ae3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'ae4'
    },
    ae4: {
      msg:        'Dere har barn.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    af1: {
      /*startTime:  36,
      stopTime:   39,*/
      pauseTime:  6,
      autoNext:   'af2'
    },
    af2: {
      /*startTime:  40,
      stopTime:   42,*/
      autoNext:   'af3'
    },*/
    af3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'af4'
    },
    af4: {
      msg:        'Jeg tar det.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    ah1: {
      /*startTime:  43,
      stopTime:   45.5,*/
      pauseTime:  6,
      autoNext:   'ah2'
    },
    ah2: {
      /*startTime:  47,
      stopTime:   49,*/
      autoNext:   'ah3'
    },
    ah3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'ah4'
    },
    ah4: {
      msg:        'Olaf får gaver.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    aj1: {
      /*startTime:  50,
      stopTime:   52.5,*/
      pauseTime:  6,
      autoNext:   'aj2'
    },
    aj2: {
      /*startTime:  54,
      stopTime:   56,*/
      autoNext:   'aj3'
    },
    aj3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'aj4'
    },
    aj4: {
      msg:        'Vi går til skogen.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    ai1: {
      /*startTime:  57,
      stopTime:   59,*/
      pauseTime:  5,
      autoNext:   'ai2'
    },
    ai2: {
      /*startTime:  60,
      stopTime:   61.5,*/
      autoNext:   'ai3'
    },
    ai3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'ai4'
    },
    ai4: {
      msg:        'Jeg blir hjemme.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    ak1: {
      /*startTime:  63,
      stopTime:   65.5,*/
      pauseTime:  5,
      autoNext:   'ak2'
    },
    ak2: {
      /*startTime:  67,
      stopTime:   68.5,*/
      autoNext:   'ak3'
    },
    ak3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'ak4'
    },
    ak4: {
      msg:        'Butikken gir rabatt.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    al1: {
      /*startTime:  70,
      stopTime:   72.5,*/
      pauseTime:  6,
      autoNext:   'al2'
    },
    al2: {
      /*startTime:  74,
      stopTime:   76,*/
      autoNext:   'al3'
    },
    al3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'al4'
    },
    al4: {
      msg:        'Hun trenger nøkkelen.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    ba1: {
      /*startTime:  77,
      stopTime:   79.5,*/
      pauseTime:  8,
      autoNext:   'ba2'
    },
    ba2: {
      /*startTime:  81,
      stopTime:   83.5,*/
      autoNext:   'ba3'
    },
    ba3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'ba4'
    },
    ba4: {
      msg:        'Jeg venter på deg.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    bb1: {
      /*startTime:  85,
      stopTime:   87.5,*/
      pauseTime:  5,
      autoNext:   'bb2'
    },
    bb2: {
      /*startTime:  89,
      stopTime:   90.5,*/
      autoNext:   'bb3'
    },
    bb3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'bb4'
    },
    bb4: {
      msg:        'De snakker med politi.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    bc1: {
      /*startTime:  92,
      stopTime:   94,*/
      pauseTime:  6,
      autoNext:   'bc2'
    },
    bc2: {
      /*startTime:  95,
      stopTime:   97,*/
      autoNext:   'bc3'
    },
    bc3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'bc4'
    },
    bc4: {
      msg:        'Han liker jenta.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    bd1: {
      /*startTime:  98,
      stopTime:   100.5,*/
      pauseTime:  8,
      autoNext:   'bd2'
    },
    bd2: {
      /*startTime:  102,
      stopTime:   104.5,*/
      autoNext:   'bd3'
    },
    bd3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'bd4'
    },
    bd4: {
      msg:        'Vi reiser på ferie.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    bf1: {
      /*startTime:  113,
      stopTime:   115,*/
      pauseTime:  6,
      autoNext:   'bf2'
    },
    bf2: {
      /*startTime:  116,
      stopTime:   118,*/
      autoNext:   'bf3'
    },
    bf3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'bf4'
    },
    bf4: {
      msg:        'De elsker fjell.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    bh1: {
      /*startTime:  126,
      stopTime:   128.5,*/
      pauseTime:  6,
      autoNext:   'bh2'
    },
    bh2: {
      /*startTime:  130,
      stopTime:   131.5,*/
      autoNext:   'bh3'
    },
    bh3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'bh4'
    },
    bh4: {
      msg:        'Jeg forstår alt.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    bi1: {
      /*startTime:  133,
      stopTime:   134.5,*/
      pauseTime:  5,
      autoNext:   'bi2'
    },
    bi2: {
      /*startTime:  136,
      stopTime:   137.5,*/
      autoNext:   'bi3'
    },
    bi3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'bi4'
    },
    bi4: {
      msg:        'Han tror i seg selv.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    bj1: {
      /*startTime:  139,
      stopTime:   140.5,*/
      pauseTime:  5,
      autoNext:   'bj2'
    },
    bj2: {
      /*startTime:  142,
      stopTime:   143.5,*/
      autoNext:   'bj3'
    },
    bj3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'bj4'
    },
    bj4: {
      msg:        'De hører på black metal.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    bk1: {
      /*startTime:  145,
      stopTime:   147,*/
      pauseTime:  5,
      autoNext:   'bk2'
    },
    bk2: {
      /*startTime:  148,
      stopTime:   149.5,*/
      autoNext:   'xx3'
    },
    xx3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'xx4'
    },
    xx4: {
      msg:        'Dere forteller eventyr.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    bm1: {
      /*startTime:  158,
      stopTime:   160,*/
      pauseTime:  6,
      autoNext:   'bm2'
    },
    bm2: {
      msg:        'Det betyr noe.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    bo1: {
      /*startTime:  178,
      stopTime:   180.5,*/
      pauseTime:  6,
      autoNext:   'bo2'
    },
    bo4: {
      msg:        'Jeg klarer det.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    ca1: {
      /*startTime:  185,
      stopTime:   187.5,*/
      pauseTime:  7,
      autoNext:   'ca2'
    },
    ca2: {
      /*startTime:  189,
      stopTime:   191,*/
      autoNext:   'ca3'
    },
    ca3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'ca4'
    },
    ca4: {
      msg:        'Han ber om hjelp.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    cb1: {
      /*startTime:  192,
      stopTime:   194.5,*/
      pauseTime:  6,
      autoNext:   'cb2'
    },
    cb2: {
      /*startTime:  196,
      stopTime:   197.5,*/
      autoNext:   'cb3'
    },
    cb3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'cb4'
    },
    cb4: {
      msg:        'De bor sammen.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    cc1: {
      /*startTime:  199,
      stopTime:   201.5,*/
      pauseTime:  6,
      autoNext:   'cc2'
    },
    cc2: {
      /*startTime:  203,
      stopTime:   204.5,*/
      autoNext:   'cc3'
    },
    cc3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'cc4'
    },
    cc4: {
      msg:        'Mobilen ligger på bordet.',
      /*startTime:
      stopTime:   ,*/
      autoNext:   'RANDOM'
    },


    cd1: {
      /*startTime:  206,
      stopTime:   208,*/
      pauseTime:  6,
      autoNext:   'cd2'
    },
    cd2: {
      /*startTime:  209,
      stopTime:   210.5,*/
      autoNext:   'cd3'
    },
    cd3: {
      /*startTime:
      stopTime:   ,*/
      pause:      6,
      autoNext:   'cd4'
    },
    cd4: {
      msg:        'Hun tenker mye.',
      /*startTime:
      stopTime:   ,*/
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
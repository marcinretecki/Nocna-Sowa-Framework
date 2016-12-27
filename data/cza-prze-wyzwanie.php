<script>
function LasAudioData() {

  //  Albo answers
  //  albo autoNext
  //  ale nie oba na raz!
  //  msg jest dowolne
  //  more jest dowolne
  //  gdy nie startTime, mamy quiz
  //  answer jest poiminięte tylko w intro 1


  this.intro = {
    a1: {
      msg:        "Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i>play</i>.",
      autoNext:   "ENDINTRO",
      more: { startTime: 0, stopTime: 26 }
    }
  };


  this.chat = {

    aa1: {
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   "aa2"
    },
    aa2: {
      msg:        'Mobilen ligger ikke på skapet.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ab1: {
      startTime:  8,
      stopTime:   10.5,
      pauseTime:  6,
      autoNext:   "ab2"
    },
    ab2: {
      msg:        'De bor ikke sammen.',
      startTime:  12,
      stopTime:   13.5,
      autoNext:   'RANDOM'
    },


    ac1: {
      startTime:  15,
      stopTime:   18,
      pauseTime:  6,
      autoNext:   "ac2"
    },
    ac2: {
      msg:        'De liker ikke å ringe.',
      startTime:  19,
      stopTime:   21,
      autoNext:   'RANDOM'
    },


    ad1: {
      startTime:  22,
      stopTime:   25,
      pauseTime:  8,
      autoNext:   "ad2"
    },
    ad2: {
      msg:        'Han kan ikke be om hjelp.',
      startTime:  26,
      stopTime:   28,
      autoNext:   'RANDOM'
    },


    ae1: {
      startTime:  29,
      stopTime:   31.5,
      pauseTime:  5,
      autoNext:   "ae2"
    },
    ae2: {
      msg:        'Hun klarer ikke.',
      startTime:  34,
      stopTime:   36.5,
      autoNext:   'RANDOM'
    },


    /*af1: {
      startTime:  38,
      stopTime:   40.5,
      pauseTime:  6,
      autoNext:   "af2"
    },
    af2: {
      msg:        'Mannen snakker ikke alt.',
      startTime:  42,
      stopTime:   44,
      autoNext:   'RANDOM'
    },*/


    ah1: {
      startTime:  52,
      stopTime:   55.5,
      pauseTime:  8,
      autoNext:   "ah2"
    },
    ah2: {
      msg:        'Barna liker ikke å vente.',
      startTime:  57,
      stopTime:   59.5,
      autoNext:   'RANDOM'
    },


    aj1: {
      startTime:  61,
      stopTime:   64,
      pauseTime:  8,
      autoNext:   "aj2"
    },
    aj2: {
      msg:        'Foreldrene hører ikke på barna.',
      startTime:  65,
      stopTime:   67.5,
      autoNext:   'RANDOM'
    },


    ai1: {
      startTime:  69,
      stopTime:   71.5,
      pauseTime:  8,
      autoNext:   "ai2"
    },
    ai2: {
      msg:        'Tor tror ikke.',
      startTime:  73,
      stopTime:   75.5,
      autoNext:   'RANDOM'
    },


    ak1: {
      startTime:  77,
      stopTime:   80,
      pauseTime:  6,
      autoNext:   "ak2"
    },
    ak2: {
      msg:        'Jeg forstår ikke alt.',
      startTime:  81,
      stopTime:   83,
      autoNext:   'RANDOM'
    },


    al1: {
      startTime:  84,
      stopTime:   87,
      pauseTime:  9,
      autoNext:   "al2"
    },
    al2: {
      msg:        'Vi drar ikke til Stavanger.',
      startTime:  88,
      stopTime:   91,
      autoNext:   'RANDOM'
    },


    ba1: {
      startTime:  92,
      stopTime:   95,
      pauseTime:  8,
      autoNext:   "ba2"
    },
    ba2: {
      msg:        'Selgeren gir ikke en garanti.',
      startTime:  96,
      stopTime:   98.5,
      autoNext:   'RANDOM'
    },


    bb1: {
      startTime:  100,
      stopTime:   102.5,
      pauseTime:  6,
      autoNext:   "bb2"
    },
    bb2: {
      msg:        'Jeg blir ikke konge.',
      startTime:  104,
      stopTime:   105.5,
      autoNext:   'RANDOM'
    },


    bc1: {
      startTime:  107,
      stopTime:   109.5,
      pauseTime:  6,
      autoNext:   "bc2"
    },
    bc2: {
      msg:        'Vi går ikke noe sted.',
      startTime:  111,
      stopTime:   113,
      autoNext:   'RANDOM'
    },


    bd1: {
      startTime:  114,
      stopTime:   116.5,
      pauseTime:  6,
      autoNext:   "bd2"
    },
    bd2: {
      msg:        'Teresa tar ikke narkotika.',
      startTime:  118,
      stopTime:   120,
      autoNext:   'RANDOM'
    },


    be1: {
      startTime:  121,
      stopTime:   124.5,
      pauseTime:  10,
      autoNext:   "be2"
    },
    be2: {
      msg:        'Jeg kan ikke komme til deg.',
      startTime:  126,
      stopTime:   129.5,
      autoNext:   'RANDOM'
    },


    bf1: {
      startTime:  131,
      stopTime:   134,
      pauseTime:  8,
      autoNext:   "bf2"
    },
    bf2: {
      msg:        'Hun drikker ikke melk.',
      startTime:  135,
      stopTime:   138.5,
      autoNext:   'RANDOM'
    },


    bg1: {
      startTime:  140,
      stopTime:   143,
      pauseTime:  6,
      autoNext:   "bg2"
    },
    bg2: {
      msg:        'De vil ikke spise hjemme.',
      startTime:  144,
      stopTime:   146,
      autoNext:   'RANDOM'
    },


    bh1: {
      startTime:  147,
      stopTime:   149.5,
      pauseTime:  6,
      autoNext:   "bh2"
    },
    bh2: {
      msg:        'De er ikke hjemme nå.',
      startTime:  151,
      stopTime:   153.5,
      autoNext:   'RANDOM'
    },


    bi1: {
      startTime:  155,
      stopTime:   158,
      pauseTime:  8,
      autoNext:   "bi2"
    },
    bi2: {
      msg:        'Det gjør ikke noe.',
      startTime:  159,
      stopTime:   161.5,
      autoNext:   'RANDOM'
    },


    bk1: {
      startTime:  163,
      stopTime:   165.5,
      pauseTime:  6,
      autoNext:   "bk2"
    },
    bk2: {
      msg:        'Jeg sier ikke noe.',
      startTime:  167,
      stopTime:   169,
      autoNext:   'RANDOM'
    },


    bl1: {
      startTime:  170,
      stopTime:   172.5,
      pauseTime:  8,
      autoNext:   "bl2"
    },
    bl2: {
      msg:        'Jeg vil ikke fly på Bjørnøya.',
      startTime:  174,
      stopTime:   176.5,
      autoNext:   'RANDOM'
    },


    bm1: {
      startTime:  178,
      stopTime:   180.5,
      pauseTime:  6,
      autoNext:   "bm2"
    },
    bm2: {
      msg:        'Vi trenger ikke å rydde.',
      startTime:  182,
      stopTime:   183.5,
      autoNext:   'RANDOM'
    },


    bn1: {
      startTime:  185,
      stopTime:   187.5,
      pauseTime:  6,
      autoNext:   "bn2"
    },
    bn2: {
      msg:        'Det kan ikke vente.',
      startTime:  189,
      stopTime:   190.5,
      autoNext:   'RANDOM'
    },


    bp1: {
      startTime:  192,
      stopTime:   195,
      pauseTime:  8,
      autoNext:   "bp2"
    },
    bp2: {
      msg:        'Jeg skal ikke bytte huset.',
      startTime:  196,
      stopTime:   199,
      autoNext:   'RANDOM'
    },


    bo1: {
      startTime:  200,
      stopTime:   203,
      pauseTime:  8,
      autoNext:   "bo2"
    },
    bo2: {
      msg:        'Hun stopper ikke å snakke.',
      startTime:  204,
      stopTime:   206.5,
      autoNext:   'RANDOM'
    },


    ca1: {
      startTime:  200,
      stopTime:   203,
      pauseTime:  8,
      autoNext:   "ca2"
    },
    ca2: {
      msg:        'Han slutter ikke jobben ennå.',
      startTime:  204,
      stopTime:   206.5,
      autoNext:   'RANDOM'
    },


    cb1: {
      startTime:  200,
      stopTime:   203,
      pauseTime:  8,
      autoNext:   "cb2"
    },
    cb2: {
      msg:        'Hun prøver ikke å forstå.',
      startTime:  204,
      stopTime:   206.5,
      autoNext:   'RANDOM'
    },


    cc1: {
      startTime:  200,
      stopTime:   203,
      pauseTime:  8,
      autoNext:   "cc2"
    },
    cc2: {
      msg:        'Jeg får ikke meldinger.',
      startTime:  204,
      stopTime:   206.5,
      autoNext:   'RANDOM'
    },


    cd1: {
      startTime:  200,
      stopTime:   203,
      pauseTime:  8,
      autoNext:   "cd2"
    },
    cd2: {
      msg:        'Powiedz: Nie lubię krwi.
Jeg liker ikke blod.',
      startTime:  204,
      stopTime:   206.5,
      autoNext:   'RANDOM'
    },


    ce1: {
      startTime:  200,
      stopTime:   203,
      pauseTime:  8,
      autoNext:   "ce2"
    },
    ce2: {
      msg:        'Jeg har ikke et firma ennå.',
      startTime:  204,
      stopTime:   206.5,
      autoNext:   'RANDOM'
    },


    cf1: {
      startTime:  200,
      stopTime:   203,
      pauseTime:  8,
      autoNext:   "cf2"
    },
    cf2: {
      msg:        'Jeg er ikke ferdig ennå.',
      startTime:  204,
      stopTime:   206.5,
      autoNext:   'RANDOM'
    }



  };


  this.end = {

    end1: {
      msg:        "END",
      startTime:  0,
      stopTime:   0
    }

  };



}
</script>
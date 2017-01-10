<script>
function LasAudioData() {

  this.intro = {
    a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO'/*,
      more: { startTime: 0, stopTime: 0 }*/
    }
  };


  this.chat = {

    aa1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'aa2'
    },
    aa2: {
      msg:        'Kan du åpne døra?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'aa3'
    },
    aa3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'aa4'
    },
    aa4: {
      msg:        'Ja, jeg kan åpne døra.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ab1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ab2'
    },
    ab2: {
      msg:        'Kan jeg lukke vinduet?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ab3'
    },
    ab3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ab4'
    },
    ab4: {
      msg:        'Ja, du kan lukke vinduet.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ac1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ac2'
    },
    ac2: {
      msg:        'Kan du sende meg en melding med adressa?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ac3'
    },
    ac3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ac4'
    },
    ac4: {
      msg:        'Selvfølgelig. Jeg sender deg adressa.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ad1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ad2'
    },
    ad2: {
      msg:        'Kan jeg komme med mannen min?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ad3'
    },
    ad3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ad4'
    },
    ad4: {
      msg:        'Selvfølgelig. Du kan komme med mannen.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ae1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ae2'
    },
    ae2: {
      msg:        'Kan du gi meg e-posten?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ae3'
    },
    ae3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ae4'
    },
    ae4: {
      msg:        'Ja, jeg kan skrive den her.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    af1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'af2'
    },
    af2: {
      msg:        'Kan du gi meg nøkkelen?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'af3'
    },
    af3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'af4'
    },
    af4: {
      msg:        'Ja. Vær så god.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ah1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ah2'
    },
    ah2: {
      msg:        'Vil du gå på fjellet?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ah3'/*,
      more:       {}*/
    },
    ah3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ah4'
    },
    ah4: {
      msg:        'Jeg vil gjerne gå på fjellet.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ag1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ag2'
    },
    ag2: {
      msg:        'Vil du ha kaffe?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ag3'
    },
    ag3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ag4'
    },
    ag4: {
      msg:        'Jeg vil gjerne ha kaffe.',
/*      startTime:  4,
      stopTime:   6.5,
      more:       {},*/
      autoNext:   'RANDOM'
    },


    aj1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'aj2'
    },
    aj2: {
      msg:        'Vil du kjøpe et fly?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'aj3'
    },
    aj3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'aj4'
    },
    aj4: {
      msg:        'Nei, jeg må kjøpe ei hytte først.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ak1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ak2'
    },
    ak2: {
      msg:        'Må vi kjøpe et hus?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ak3'
    },
    ak3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ak4'
    },
    ak4: {
      msg:        'Vi trenger ikke. Vi kan leie det.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    al1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'al2'
    },
    al2: {
      msg:        'Kan hun hente barnet fra barnehagen?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'al3'
    },
    al3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'al4'
    },
    al4: {
      msg:        'Ja, hun kan gjøre det.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    am1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'am2'
    },
    am2: {
      msg:        'Kan hun levere barnet til skolen?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'am3'
    },
    am3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'am4'
    },
    am4: {
      msg:        'Ja, hun kan levere barnet til skolen.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    an1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'an2'
    },
    an2: {
      msg:        'Skal du skifte dekk?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'an3'
    },
    an3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'an4'
    },
    an4: {
      msg:        'Jeg skal skifte dekk.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ao1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ao2'
    },
    ao2: {
      msg:        'Skal du gå på toppen?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ao3'
    },
    ao3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ao4'
    },
    ao4: {
      msg:        'Jeg skal gå på toppen.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ap1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ap2'
    },
    ap2: {
      msg:        'Vil du prøve genseren?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ap3'
    },
    ap3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ap4'
    },
    ap4: {
      msg:        'Nei, jeg vil ikke vente i køen til prøverommet.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ar1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ar2'
    },
    ar2: {
      msg:        'Kan du komme til meg?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ar3'
    },
    ar3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ar4'
    },
    ar4: {
      msg:        'Jeg kan ikke komme til deg.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    as1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'as2'
    },
    as2: {
      msg:        'Vil de spise hjemme?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'as3'
    },
    as3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'as4'
    },
    as4: {
      msg:        'De vil ikke spise hjemme.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    at1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'at2'
    },
    at2: {
      msg:        'Vil du fly til Nord-Norge?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'at3'
    },
    at3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'at4'
    },
    at4: {
      msg:        'Jeg vil ikke fly til Nord-Norge.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ax1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ax2'
    },
    ax2: {
      msg:        'Må dere rydde?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ax3'
    },
    ax3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ax4'
    },
    ax4: {
      msg:        'Vi trenger ikke å rydde.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ay1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ay2'
    },
    ay2: {
      msg:        'Kan det ikke vente?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ay3'
    },
    ay3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ay4'
    },
    ay4: {
      msg:        'Det kan ikke vente.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    az1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'az2'
    },
    az2: {
      msg:        'Skal du bytte jobb?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'az3'
    },
    az3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'az4'
    },
    az4: {
      msg:        'Jeg skal ikke bytte jobb.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    }

  };


  this.end = {

    end1: {
      msg: 'END',
      startTime: 0,
      stopTime: 0
    }

  };



}
</script>
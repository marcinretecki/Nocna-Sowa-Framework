<script>
function LasData() {

  this.category = 'audio-test'; // chat|setninger|etc


  this.testNotes = [
    'nie ma czasów ani nagrania'
  ];


  this.intro = {
    _a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w las-icon-size-2"></i>.',
      autoNext:     'ENDINTRO'/*,
      more: {
        startTime:  0,
        duration:   1.5,
      }*/
    }
  };


  this.chat = {

    _aa1: {
      spokenWord: 'Powiedz: "Oni chcą ugotować obiad".',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_aa2'
    },
    _aa2: {
      msg:        '<i>De vil lage middag.</i>',
      trans:      'Oni chcą ugotować obiad.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ab1: {
      spokenWord: 'Powiedz: "Ona chce kupić mieszkanie".',
      startTime:  8,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_ab2'
    },
    _ab2: {
      msg:        '<i>Hun vil kjøpe en leilighet.</i>',
      trans:      'Ona chce kupić mieszkanie.',
      startTime:  12,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ac1: {
      spokenWord: 'Powiedz: "Chcę leżeć na plaży".',
      startTime:  15,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_ac2'
    },
    _ac2: {
      msg:        '<i>Jeg vil ligge på stranda.</i>',
      trans:      'Chcę leżeć na plaży.',
      startTime:  19,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ae1: {
      spokenWord: 'Powiedz: "Chcemy lecieć na Svalbard".',
      startTime:  29,
      duration:   1.5,
      pauseTime:  5,
      autoNext:   '_ae2'
    },
    _ae2: {
      msg:        '<i>Vi vil fly på Svalbard.</i>',
      trans:      'Chcemy polecieć na Svalbard.',
      startTime:  33,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _af1: {
      spokenWord: 'Powiedz: "Muszę zrobić zakupy".',
      startTime:  36,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_af2'
    },
    _af2: {
      msg:        '<i>Jeg må handle.</i>',
      trans:      'Muszę zrobić zakupy.',
      startTime:  40,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ah1: {
      spokenWord: 'Powiedz: "Oni muszą się zastanowić".',
      startTime:  43,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_ah2'
    },
    _ah2: {
      msg:        '<i>De må tenke seg om.</i>',
      trans:      'Oni muszą się zastanowić.',
      startTime:  47,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _aj1: {
      spokenWord: 'Powiedz: "My musimy uczyć się dużo".',
      startTime:  50,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_aj2'
    },
    _aj2: {
      msg:        '<i>Vi må lære mye.</i>',
      trans:      'My musimy uczyć się dużo.',
      startTime:  54,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ai1: {
      spokenWord: 'Powiedz: "Musicie tu posprzątać".',
      startTime:  57,
      duration:   1.5,
      pauseTime:  5,
      autoNext:   '_ai2'
    },
    _ai2: {
      msg:        '<i>Dere må rydde her.</i>',
      trans:      'Musicie tu posprzątać.',
      startTime:  60,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ak1: {
      spokenWord: 'Powiedz: "On musi dużo jeść".',
      startTime:  63,
      duration:   1.5,
      pauseTime:  5,
      autoNext:   '_ak2'
    },
    _ak2: {
      msg:        '<i>Han må spise mye.</i>',
      trans:      'On musi dużo jeść.',
      startTime:  67,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _al1: {
      spokenWord: 'Powiedz: "On umie pływać".',
      startTime:  70,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_al2'
    },
    _al2: {
      msg:        '<i>Han kan svømme.</i>',
      trans:      'On umie pływać.',
      startTime:  74,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ba1: {
      spokenWord: 'Powiedz: "Ona może jechać". albo "Umie jechać".',
      startTime:  77,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ba2'
    },
    _ba2: {
      msg:        '<i>Hun kan kjøre.</i>',
      trans:      'Ona może jechać. / Umie jechać.',
      startTime:  81,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bb1: {
      spokenWord: 'Powiedz: Mogę zapłacić.',
      startTime:  85,
      duration:   1.5,
      pauseTime:  5,
      autoNext:   '_bb2'
    },
    _bb2: {
      msg:        '<i>Jeg kan betale.</i>',
      trans:      'Mogę zapłacić.',
      startTime:  89,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bc1: {
      spokenWord: 'Powiedz: "To może zaczekać".',
      startTime:  92,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_bc2'
    },
    _bc2: {
      msg:        '<i>Det kan vente.</i>',
      trans:      'To może zaczekać.',
      startTime:  95,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bd1: {
      spokenWord: 'Powiedz: "Mogę zostać w domu".',
      startTime:  98,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_bd2'
    },
    _bd2: {
      msg:        '<i>Jeg kan bli hjemme.</i>',
      trans:      'Mogę zostać w domu.',
      startTime:  102,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bf1: {
      spokenWord: 'Powiedz: "Oni zamierzają pójść na wycieczkę".',
      startTime:  113,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_bf2'
    },
    _bf2: {
      msg:        '<i>De skal gå på tur.</i>',
      trans:      'Oni zamierzają pójść na wycieczkę.',
      startTime:  116,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bh1: {
      spokenWord: 'Powiedz: "On planuje zmienić pracę".',
      startTime:  126,
      duration:   1.5,
      pauseTime:  6,
      autoNext:   '_bh2'
    },
    _bh2: {
      msg:        '<i>Han skal bytte jobben.</i>',
      trans:      'On planuje zmienić pracę.',
      startTime:  130,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bi1: {
      spokenWord: 'Powiedz: "My zamierzamy uczyć się cierpliwości".',
      startTime:  133,
      duration:   1.5,
      pauseTime:  5,
      autoNext:   '_bi2'
    },
    _bi2: {
      msg:        '<i>Vi skal lære tålmodighet.</i>',
      trans:      'My zamierzamy uczyć się cierpliwości.',
      startTime:  136,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bj1: {
      spokenWord: 'Powiedz: "Oni planują ćwiczyć więcej".',
      startTime:  139,
      duration:   1.5,
      pauseTime:  5,
      autoNext:   '_bj2'
    },
    _bj2: {
      msg:        '<i>De skal øve mer.</i>',
      trans:      'Oni planują ćwiczyć więcej.',
      startTime:  142,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _bk1: {
      spokenWord: 'Powiedz: "Ona zamierza czytać więcej".',
      startTime:  145,
      duration:   1.5,
      pauseTime:  5,
      autoNext:   '_bk2'
    },
    _bk2: {
      msg:        '<i>Hun skal lese mer.</i>',
      trans:      'Ona zamierza czytać więcej.',
      startTime:  148,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    }



  };



}
</script>
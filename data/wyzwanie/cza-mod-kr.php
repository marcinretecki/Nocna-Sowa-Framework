<script>
function LasData() {

  this.category = 'audio-test'; // chat|setninger|etc


  this.testNotes = [
    'nie ma nagrania ani czasów'
  ];


  this.intro = {
    _a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w las-icon-size-2"></i>.',
      autoNext:   'ENDINTRO',
      more: {
        startTime:  0,
        duration:   1
      }
    }
  };


  this.chat = {

    _aa1: {
      spokenWord: 'Kan du snakke norsk?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_aa2'
    },
    _aa2: {
      msg:        '<i>Ja, det kan jeg.<br />Nei, det kan jeg ikke.</i>',
      trans:      'Tak, potrafię.<br />Nie, niepotrafię.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ab1: {
      spokenWord: 'Kan du trene mer?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_ab2'
    },
    _ab2: {
      msg:        '<i>Ja, det kan jeg.<br />Nei, det kan jeg ikke.</i>',
      trans:      'Tak, mogę.<br />Nie, nie mogę.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ac1: {
      spokenWord: 'Kan hun synge noen sanger?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_ac2'
    },
    _ac2: {
      msg:        '<i>Ja, det kan hun.<br />Nei, det kan hun ikke.</i>',
      trans:      'Tak, może.<br />Nie, nie może.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ad1: {
      spokenWord: 'Kan du lese fort?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_ad2'
    },
    _ad2: {
      msg:        '<i>Ja, det kan jeg.<br />Nei, det kan jeg ikke.</i>',
      trans:      'Tak, umiem.<br />Nie, nie umiem.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ae1: {
      spokenWord: 'Kan du fortelle noe om deg selv?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_ae2'
    },
    _ae2: {
      msg:        '<i>Ja, det kan jeg.<br />Nei, det kan jeg ikke.</i>',
      trans:      'Tak, mogę.<br />Nie, nie mogę.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _af1: {
      spokenWord: 'Kan du svømme i havet om vinteren?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_af2'
    },
    _af2: {
      msg:        '<i>Ja, det kan jeg.<br />Nei, det kan jeg ikke.</i>',
      trans:      'Tak, mogę.<br />Nie, nie mogę.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ag1: {
      spokenWord: 'Vil du spise noe?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_ag2'
    },
    _ag2: {
      msg:        '<i>Ja, det vil jeg.<br />Nei, det vil jeg ikke.</i>',
      trans:      'Tak, chcę.<br />Nie, nie chcę.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ah1: {
      spokenWord: 'Vil du bli med?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_ah2'
    },
    _ah2: {
      msg:        '<i>Ja, det vil jeg.<br />Nei, det vil jeg ikke.</i>',
      trans:      'Tak, chcę.<br />Nie, nie chcę.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ai1: {
      spokenWord: 'Vil du besøke Tromsø?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_ai2'
    },
    _ai2: {
      msg:        '<i>Ja, det vil jeg.<br />Nei, det vil jeg ikke.</i>',
      trans:      'Tak, chce.<br />Nie, nie chcę.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _aj1: {
      spokenWord: 'Vil du strikke ei lue?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_aj2'
    },
    _aj2: {
      msg:        '<i>Ja, det vil jeg.<br />Nei, det vil jeg ikke.</i>',
      trans:      'Tak, chcę.<br />Nie, nie chcę.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ak1: {
      spokenWord: 'Vil du bli statsminister?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_ak2'
    },
    _ak2: {
      msg:        '<i>Ja, det vil jeg.<br />Nei, det vil jeg ikke.</i>',
      trans:      'Tak, chcę.<br />Nie, nie chcę.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _al1: {
      spokenWord: 'Vil dere bli hjemme?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_al2'
    },
    _al2: {
      msg:        '<i>Ja, det vil vi.<br />Nei, det vil vi ikke.</i>',
      trans:      'Tak, chcemy.<br />Nie, nie chcemy.',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _am1: {
      spokenWord: 'Skal vi hente nøkkelen?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_am2'
    },
    _am2: {
      msg:        '<i>Ja, det skal vi.<br />Nei, det skal vi ikke.</i>',
      trans:      'Tak, (pójdziemy po niego).<br />Nie, (nie pójdziemy po niego).',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _an1: {
      spokenWord: 'Skal du møte venner?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_an2'
    },
    _an2: {
      msg:        '<i>Ja, det skal jeg.<br />Nei, det skal jeg ikke.</i>',
      trans:      'Tak, (spotkam się z nimi).<br />Nie, (nie spotkam się z nimi).',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ao1: {
      spokenWord: 'Skal du være med?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_ao2'
    },
    _ao2: {
      msg:        '<i>Ja, det skal jeg.<br />Nei, det skal jeg ikke.</i>',
      trans:      'Tak, (dołączę).<br />Nie, nie (dołączę).',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ap1: {
      spokenWord: 'Skal du jobbe hjemme?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_ap2'
    },
    _ap2: {
      msg:        '<i>Ja, det skal jeg.<br />Nei, det skal jeg ikke.</i>',
      trans:      'Tak, (zamierzam pracować w domu).<br />Nie, nie (zamierzam pracować w domu).',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _aq1: {
      spokenWord: 'Skal du lese det?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_aq2'
    },
    _aq2: {
      msg:        '<i>Ja, det skal jeg.<br />Nei, det skal jeg ikke.</i>',
      trans:      'Tak, (przeczytam to).<br />Nie, nie (przeczytam tego).',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ar1: {
      spokenWord: 'Må han sortere avfallet?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_ar2'
    },
    _ar2: {
      msg:        '<i>Ja, det må han.<br />Nei, det trenger han ikke.</i>',
      trans:      'Tak, musi.<br />Nie, nie musi (nie ma takiej potrzeby).',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _as1: {
      spokenWord: 'Må du kjøpe tomater?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_as2'
    },
    _as2: {
      msg:        '<i>Ja, det må jeg.<br />Nei, det trenger jeg ikke.</i>',
      trans:      'Tak, muszę.<br />Nie, nie muszę (nie ma takiej potrzeby).',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _at1: {
      spokenWord: 'Må du skrive kontrakt?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_at2'
    },
    _at2: {
      msg:        '<i>Ja, det må jeg.<br />Nei, det trenger jeg ikke.</i>',
      trans:      'Tak, muszę.<br />Nie, nie muszę (nie ma takiej potrzeby).',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _au1: {
      spokenWord: 'Må de gå på skolen?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_au2'
    },
    _au2: {
      msg:        '<i>Ja, det må de.<br />Nei, det trenger de ikke.</i>',
      trans:      'Tak, muszą.<br />Nie, nie muszą (nie ma takiej potrzeby).',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _av1: {
      spokenWord: 'Må vi vaske bilen?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  3,
      autoNext:   '_av2'
    },
    _av2: {
      msg:        '<i>Ja, det må vi.<br />Nei, det trenger vi ikke.</i>',
      trans:      'Tak, musimy.<br />Nie, nie musimy (nie ma takiej potrzeby).',
      startTime:  0,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    }




  };




}
</script>
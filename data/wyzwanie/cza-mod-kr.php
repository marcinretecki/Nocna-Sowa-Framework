<script>
function LasAudioData() {

  this.testNotes = [
    'nie ma nagrania ani czasów'
  ];


  this.intro = {
    a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO',
      more: { startTime: 0, stopTime: 1 }
    }
  };


  this.chat = {

    aa1: {
      spokenWord: 'Kan du snakke norsk?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'aa2'
    },
    aa2: {
      msg:        'Ja, det kan jeg.<br />Nei, det kan jeg ikke.',
      trans:      'Tak, potrafię.<br />Nie, niepotrafię.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },



    ab1: {
      spokenWord: 'Kan du trene mer?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'ab2'
    },
    ab2: {
      msg:        'Ja, det kan jeg.<br />Nei, det kan jeg ikke.',
      trans:      'Tak, mogę.<br />Nie, nie mogę.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ac1: {
      spokenWord: 'Kan hun synge noen sanger?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'ac2'
    },
    ac2: {
      msg:        'Ja, det kan hun.<br />Nei, det kan hun ikke.',
      trans:      'Tak, może.<br />Nie, nie może.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ad1: {
      spokenWord: 'Kan du lese fort?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'ad2'
    },
    ad2: {
      msg:        'Ja, det kan jeg.<br />Nei, det kan jeg ikke.',
      trans:      'Tak, umiem.<br />Nie, nie umiem.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ae1: {
      spokenWord: 'Kan du fortelle noe om deg selv?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'ae2'
    },
    ae2: {
      msg:        'Ja, det kan jeg.<br />Nei, det kan jeg ikke.',
      trans:      'Tak, mogę.<br />Nie, nie mogę.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    af1: {
      spokenWord: 'Kan du svømme i havet om vinteren?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'af2'
    },
    af2: {
      msg:        'Ja, det kan jeg.<br />Nei, det kan jeg ikke.',
      trans:      'Tak, mogę.<br />Nie, nie mogę.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ag1: {
      spokenWord: 'Vil du spise noe?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'ag2'
    },
    ag2: {
      msg:        'Ja, det vil jeg.<br />Nei, det vil jeg ikke.',
      trans:      'Tak, chcę.<br />Nie, nie chcę.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ah1: {
      spokenWord: 'Vil du bli med?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'ah2'
    },
    ah2: {
      msg:        'Ja, det vil jeg.<br />Nei, det vil jeg ikke.',
      trans:      'Tak, chcę.<br />Nie, nie chcę.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ai1: {
      spokenWord: 'Vil du besøke Tromsø?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'ai2'
    },
    ai2: {
      msg:        'Ja, det vil jeg.<br />Nei, det vil jeg ikke.',
      trans:      'Tak, chce.<br />Nie, nie chcę.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    aj1: {
      spokenWord: 'Vil du strikke ei lue?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'aj2'
    },
    aj2: {
      msg:        'Ja, det vil jeg.<br />Nei, det vil jeg ikke.',
      trans:      'Tak, chcę.<br />Nie, nie chcę.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ak1: {
      spokenWord: 'Vil du bli statsminister?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'ak2'
    },
    ak2: {
      msg:        'Ja, det vil jeg.<br />Nei, det vil jeg ikke.',
      trans:      'Tak, chcę.<br />Nie, nie chcę.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    al1: {
      spokenWord: 'Vil dere bli hjemme?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'al2'
    },
    al2: {
      msg:        'Ja, det vil vi.<br />Nei, det vil vi ikke.',
      trans:      'Tak, chcemy.<br />Nie, nie chcemy.',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    am1: {
      spokenWord: 'Skal vi hente nøkkelen?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'am2'
    },
    am2: {
      msg:        'Ja, det skal vi.<br />Nei, det skal vi ikke.',
      trans:      'Tak, (pójdziemy po niego).<br />Nie, (nie pójdziemy po niego).',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    an1: {
      spokenWord: 'Skal du møte venner?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'an2'
    },
    an2: {
      msg:        'Ja, det skal jeg.<br />Nei, det skal jeg ikke.',
      trans:      'Tak, (spotkam się z nimi).<br />Nie, (nie spotkam się z nimi).',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ao1: {
      spokenWord: 'Skal du være med?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'ao2'
    },
    ao2: {
      msg:        'Ja, det skal jeg.<br />Nei, det skal jeg ikke.',
      trans:      'Tak, (dołączę).<br />Nie, nie (dołączę).',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ap1: {
      spokenWord: 'Skal du jobbe hjemme?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'ap2'
    },
    ap2: {
      msg:        'Ja, det skal jeg.<br />Nei, det skal jeg ikke.',
      trans:      'Tak, (zamierzam pracować w domu).<br />Nie, nie (zamierzam pracować w domu).',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    aq1: {
      spokenWord: 'Skal du lese det?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'aq2'
    },
    aq2: {
      msg:        'Ja, det skal jeg.<br />Nei, det skal jeg ikke.',
      trans:      'Tak, (przeczytam to).<br />Nie, nie (przeczytam tego).',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    ar1: {
      spokenWord: 'Må han sortere avfallet?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'ar2'
    },
    ar2: {
      msg:        'Ja, det må han.<br />Nei, det trenger han ikke.',
      trans:      'Tak, musi.<br />Nie, nie musi (nie ma takiej potrzeby).',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    as1: {
      spokenWord: 'Må du kjøpe tomater?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'as2'
    },
    as2: {
      msg:        'Ja, det må jeg.<br />Nei, det trenger jeg ikke.',
      trans:      'Tak, muszę.<br />Nie, nie muszę (nie ma takiej potrzeby).',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    at1: {
      spokenWord: 'Må du skrive kontrakt?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'at2'
    },
    at2: {
      msg:        'Ja, det må jeg.<br />Nei, det trenger jeg ikke.',
      trans:      'Tak, muszę.<br />Nie, nie muszę (nie ma takiej potrzeby).',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    au1: {
      spokenWord: 'Må de gå på skolen?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'au2'
    },
    au2: {
      msg:        'Ja, det må de.<br />Nei, det trenger de ikke.',
      trans:      'Tak, muszą.<br />Nie, nie muszą (nie ma takiej potrzeby).',
      startTime:  0,
      stopTime:   0,
      autoNext:   'RANDOM'
    },


    av1: {
      spokenWord: 'Må vi vaske bilen?',
      startTime:  0,
      stopTime:   0,
      pauseTime:  3,
      autoNext:   'av2'
    },
    av2: {
      msg:        'Ja, det må vi.<br />Nei, det trenger vi ikke.',
      trans:      'Tak, musimy.<br />Nie, nie musimy (nie ma takiej potrzeby).',
      startTime:  0,
      stopTime:   0,
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
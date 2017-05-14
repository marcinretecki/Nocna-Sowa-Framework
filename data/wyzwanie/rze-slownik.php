<script>
function LasAudioData() {

  this.newMsg = function( word ) {

    var a = '<span class="audio-test-clue">';

    a += word;
    a += '</span>';
    a += '<br />';
    a += '<a class="size-1 a-light" target="_blank" href="http://ordbok.uib.no/perl/ordbok.cgi?bokmaal=+&OPP=';
    a += word;
    a += '">Sprawdź w słowniku &rarr;</a>';

    return a;
  };


  this.testNotes = [
    'mamy za mało słów, które mają jeden rodzaj i nie są jednocześnie czasownikiem/przymiotnikiem (żeby nie robić zamieszania)'
  ];

  //  Albo answers
  //  albo autoNext
  //  ale nie oba na raz!
  //  msg jest dowolne
  //  more jest dowolne
  //  gdy nie startTime, mamy quiz
  //  answer jest poiminięte tylko w intro 1
  //  cmd + alt + n -> aa


  this.intro = {
    a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:     'ENDINTRO'
    }
  };


  this.chat = {

    barn1: {
      msg:        this.newMsg( 'barn' ),
      answers: [
        { answer: '<i>et</i>',   next: 'barn2' },
        { answer: '<i>en/ei</i>',   wrong: true },
        { answer: '<i>en</i>',   wrong: true },
      ]
    },
   barn2: {
      msg:        '<i>et barn</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    hand1: {
      msg:        this.newMsg( 'hånd' ),
      answers: [
        { answer: '<i>en/ei</i>',   next: 'hand2' },
        { answer: '<i>en</i>',   wrong: true },
        { answer: '<i>et</i>',   wrong: true },
      ]
    },
    hand2: {
      msg:        '<i>ei hånd</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    spor1: {
      msg:        this.newMsg( 'spor' ),
      answers: [
        { answer: '<i>et</i>',   next: 'spor2' },
        { answer: '<i>en</i>',   wrong: true },
        { answer: '<i>en/ei</i>',   wrong: true },
      ]
    },
    spor2: {
      msg:        '<i>et spor</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    lys1: {
      msg:        this.newMsg( 'lys' ),
      answers: [
        { answer: '<i>et</i>',   next: 'lys2' },
        { answer: '<i>en</i>',   wrong: true },
        { answer: '<i>en/ei</i>',   wrong: true },
      ]
    },
    lys2: {
      msg:        '<i>et lys</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    kamp1: {
      msg:        this.newMsg( 'kamp' ),
      answers: [
        { answer: '<i>en</i>',   next: 'kamp2' },
        { answer: '<i>en/ei</i>',   wrong: true },
        { answer: '<i>et</i>',   wrong: true },
      ]
    },
    kamp2: {
      msg:        '<i>en kamp</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    bat1: {
      msg:        this.newMsg( 'båt' ),
      answers: [
        { answer: '<i>en</i>',   next: 'bat2' },
        { answer: '<i>en/ei</i>',   wrong: true },
        { answer: '<i>et</i>',   wrong: true },
      ]
    },
    bat2: {
      msg:        '<i>en båt</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    morgen1: {
      msg:        this.newMsg( 'morgen' ),
      answers: [
        { answer: '<i>en</i>',   next: 'morgen2' },
        { answer: '<i>en/ei</i>',   wrong: true },
        { answer: '<i>et</i>',   wrong: true },
      ]
    },
    morgen2: {
      msg:        '<i>en morgen</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    helg1: {
      msg:        this.newMsg( 'helg' ),
      answers: [
        { answer: '<i>en/ei</i>',   next: 'helg2' },
        { answer: '<i>en</i>',   wrong: true },
        { answer: '<i>et</i>',   wrong: true },
      ]
    },
    helg2: {
      msg:        '<i>ei helg</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    navn1: {
      msg:        this.newMsg( 'navn' ),
      answers: [
        { answer: '<i>et</i>',   next: 'navn2' },
        { answer: '<i>en/ei</i>',   wrong: true },
        { answer: '<i>en</i>',   wrong: true },
      ]
    },
    navn2: {
      msg:        '<i>et navn</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    moete1: {
      msg:        this.newMsg( 'møte' ),
      answers: [
        { answer: '<i>et</i>',   next: 'moete2' },
        { answer: '<i>en</i>',   wrong: true },
        { answer: '<i>en/ei</i>',   wrong: true },
      ]
    },
    moete2: {
      msg:        '<i>et møte</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    land1: {
      msg:        this.newMsg( 'land' ),
      answers: [
        { answer: '<i>et</i>',   next: 'land2' },
        { answer: '<i>en</i>',   wrong: true },
        { answer: '<i>en/ei</i>',   wrong: true },
      ]
    },
    land2: {
      msg:        '<i>et land</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    jord1: {
      msg:        this.newMsg( 'jord' ),
      answers: [
        { answer: '<i>en/ei</i>',   next: 'jord2' },
        { answer: '<i>en</i>',   wrong: true },
        { answer: '<i>et</i>',   wrong: true },
      ]
    },
    jord2: {
      msg:        '<i>ei jord</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    //  xx1: {
    //    msg:        this.newMsg( '' ),
    //    answers: [
    //      { answer: '<i>en/ei</i>',   next: 'xx2' },
    //      { answer: '<i>en</i>',   wrong: true },
    //      { answer: '<i>et</i>',   wrong: true },
    //    ]
    //  },
    //  xx2: {
    //    msg:        '<i></i>',
    //    //  startTime:  0,
    //    //  duration:   1.5,
    //    autoNext:   'RANDOM'
    //  },

    //  xx1: {
    //    msg:        this.newMsg( '' ),
    //    answers: [
    //      { answer: '<i>en/ei</i>',   next: 'xx2' },
    //      { answer: '<i>en</i>',   wrong: true },
    //      { answer: '<i>et</i>',   wrong: true },
    //    ]
    //  },
    //  xx2: {
    //    msg:        '<i></i>',
    //    //  startTime:  0,
    //    //  duration:   1.5,
    //    autoNext:   'RANDOM'
    //  },

    //  xx1: {
    //    msg:        this.newMsg( '' ),
    //    answers: [
    //      { answer: '<i>en/ei</i>',   next: 'xx2' },
    //      { answer: '<i>en</i>',   wrong: true },
    //      { answer: '<i>et</i>',   wrong: true },
    //    ]
    //  },
    //  xx2: {
    //    msg:        '<i></i>',
    //    //  startTime:  0,
    //    //  duration:   1.5,
    //    autoNext:   'RANDOM'
    //  },

    //  xx1: {
    //    msg:        this.newMsg( '' ),
    //    answers: [
    //      { answer: '<i>en/ei</i>',   next: 'xx2' },
    //      { answer: '<i>en</i>',   wrong: true },
    //      { answer: '<i>et</i>',   wrong: true },
    //    ]
    //  },
    //  xx2: {
    //    msg:        '<i></i>',
    //    //  startTime:  0,
    //    //  duration:   1.5,
    //    autoNext:   'RANDOM'
    //  },

    //  xx1: {
    //    msg:        this.newMsg( '' ),
    //    answers: [
    //      { answer: '<i>en/ei</i>',   next: 'xx2' },
    //      { answer: '<i>en</i>',   wrong: true },
    //      { answer: '<i>et</i>',   wrong: true },
    //    ]
    //  },
    //  xx2: {
    //    msg:        '<i></i>',
    //    //  startTime:  0,
    //    //  duration:   1.5,
    //    autoNext:   'RANDOM'
    //  }





  };


  this.end = {

    end1: {
      msg:        'END'
    }

  };



}
</script>
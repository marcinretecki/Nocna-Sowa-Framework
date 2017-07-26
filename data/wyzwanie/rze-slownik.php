<script>
function LasData() {

  var newMsg = function( word ) {
    var a = ''

    a += '<span class="mark mark--green">';

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
    _a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w las-icon-size-2"></i>.',
      autoNext:     'ENDINTRO'
    }
  };


  this.chat = {

    _barn1: {
      msg:        newMsg( 'barn' ),
      answers: [
        { answer: '<i>et</i>',   next: '_barn2', score: 'correct' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>en</i>',   score: 'wrong' },
      ]
    },
   _barn2: {
      msg:        '<i>et barn</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    _hand1: {
      msg:        newMsg( 'hånd' ),
      answers: [
        { answer: '<i>en/ei</i>',   next: '_hand2', score: 'correct' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _hand2: {
      msg:        '<i>ei hånd</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    _spor1: {
      msg:        newMsg( 'spor' ),
      answers: [
        { answer: '<i>et</i>',   next: '_spor2', score: 'correct' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
      ]
    },
    _spor2: {
      msg:        '<i>et spor</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    _lys1: {
      msg:        newMsg( 'lys' ),
      answers: [
        { answer: '<i>et</i>',   next: '_lys2', score: 'correct' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
      ]
    },
    _lys2: {
      msg:        '<i>et lys</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    _kamp1: {
      msg:        newMsg( 'kamp' ),
      answers: [
        { answer: '<i>en</i>',   next: '_kamp2', score: 'correct' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _kamp2: {
      msg:        '<i>en kamp</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    _bat1: {
      msg:        newMsg( 'båt' ),
      answers: [
        { answer: '<i>en</i>',   next: '_bat2', score: 'correct' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _bat2: {
      msg:        '<i>en båt</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    _morgen1: {
      msg:        newMsg( 'morgen' ),
      answers: [
        { answer: '<i>en</i>',   next: '_morgen2', score: 'correct' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _morgen2: {
      msg:        '<i>en morgen</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    _helg1: {
      msg:        newMsg( 'helg' ),
      answers: [
        { answer: '<i>en/ei</i>',   next: '_helg2', score: 'correct' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _helg2: {
      msg:        '<i>ei helg</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    _navn1: {
      msg:        newMsg( 'navn' ),
      answers: [
        { answer: '<i>et</i>',   next: '_navn2', score: 'correct' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>en</i>',   score: 'wrong' },
      ]
    },
    _navn2: {
      msg:        '<i>et navn</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    _moete1: {
      msg:        newMsg( 'møte' ),
      answers: [
        { answer: '<i>et</i>',   next: '_moete2', score: 'correct' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
      ]
    },
    _moete2: {
      msg:        '<i>et møte</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    _land1: {
      msg:        newMsg( 'land' ),
      answers: [
        { answer: '<i>et</i>',   next: '_land2', score: 'correct' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
      ]
    },
    _land2: {
      msg:        '<i>et land</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    _jord1: {
      msg:        newMsg( 'jord' ),
      answers: [
        { answer: '<i>en/ei</i>',   next: '_jord2', score: 'correct' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _jord2: {
      msg:        '<i>ei jord</i>',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM'
    },

    //  _xx1: {
    //    msg:        newMsg( '' ),
    //    answers: [
    //      { answer: '<i>en/ei</i>',   next: '_xx2', score: 'correct' },
    //      { answer: '<i>en</i>',   score: 'wrong' },
    //      { answer: '<i>et</i>',   score: 'wrong' },
    //    ]
    //  },
    //  _xx2: {
    //    msg:        '<i></i>',
    //    //  startTime:  0,
    //    //  duration:   1.5,
    //    autoNext:   'RANDOM'
    //  },

  };


  this.end = {

    _end1: {
      msg:        'END'
    }

  };



}
</script>
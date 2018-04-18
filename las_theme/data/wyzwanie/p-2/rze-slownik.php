<script>
function LasData() {

  this.category = 'audio-test';   // chat|setninger|etc


  var newMsg = function( word ) {
    var a = ''

    a += '<div class="space size-3"><i>';
    a += word;
    a += '</i></div>';


    a += '<div class="space">';
    a += '<a class="btn btn-white-outline margin-0" target="_blank" href="http://ordbok.uib.no/perl/ordbok.cgi?bokmaal=+&OPP=';
    a += word;
    a += '">Bokmålsordboka</a>';
    a += '</div>';


    a += '<div>';
    a += '<a class="btn btn-white-outline margin-0" target="_blank" href="http://lexin.udir.no/?search=';
    a += word;
    a += '&dict=nbo-pol-maxi&ui-lang=NBO&startingfrom=&count=10&checked-languages=NBO&checked-languages=POL&checked-languages=B">Lexin</a>';
    a += '</div>';


    return a;
  };


  this.testNotes = [
    ''
  ];


  this.intro = {
    _intro1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w"></i>',
      autoNext:     '_intro2',
    },
    _intro2: {
      msg:          '<div class="leftened">' +
          '<p>W tym wyzwaniu mamy dla Ciebie 12 podstawowych słów wraz z linkami do słowników.</p>' +
          '<p>Linki otwierają się zawsze w nowej zakładce, żeby łatwo było Ci wrócić do wyzwania.</p>' +
          '<p>Po wybraniu prawidłowego rodzajnkia, usłyszysz nagranie z poprawną wymową tego słowa.</p>' +
          '<p>Nie zgaduj odpowiedzi. To jest nauka korzystania ze słownika.</p>' +
          '</div>',
      autoNext:     'ENDINTRO',
    },
  };


  this.chat = {

    _gulv1: {
      msg:        newMsg( 'gulv' ),
      answers: [
        { answer: '<i>et</i>', score: 'correct', next: '_gulv2' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
      ]
    },
    _gulv2: {
      msg:        '<i>et gulv</i>',
      trans:      'podłoga',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _skap1: {
      msg:        newMsg( 'skap' ),
      answers: [
        { answer: '<i>et</i>', score: 'correct', next: '_skap2' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
      ]
    },
    _skap2: {
      msg:        '<i>et skap</i>',
      trans:      'szafka',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _stol1: {
      msg:        newMsg( 'stol' ),
      answers: [
        { answer: '<i>en</i>', score: 'correct', next: '_stol2' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _stol2: {
      msg:        '<i>en stol</i>',
      trans:      'krzesło',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _mobil1: {
      msg:        newMsg( 'mobil' ),
      answers: [
        { answer: '<i>en</i>', score: 'correct', next: '_mobil2' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _mobil2: {
      msg:        '<i>en mobil</i>',
      trans:      'telefon komórkowy',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _kontakt1: {
      msg:        newMsg( 'kontakt' ),
      answers: [
        { answer: '<i>en</i>', score: 'correct', next: '_kontakt2' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _kontakt2: {
      msg:        '<i>en kontakt</i>',
      trans:      'kontakt',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _avtale1: {
      msg:        newMsg( 'avtale' ),
      answers: [
        { answer: '<i>en</i>', score: 'correct', next: '_avtale2' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _avtale2: {
      msg:        '<i>en avtale</i>',
      trans:      'umowa',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _by1: {
      msg:        newMsg( 'by' ),
      answers: [
        { answer: '<i>en</i>', score: 'correct', next: '_by2' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _by2: {
      msg:        '<i>en by</i>',
      trans:      'miasto',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _menneske1: {
      msg:        newMsg( 'menneske' ),
      answers: [
        { answer: '<i>et</i>', score: 'correct', next: '_menneske2' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
      ]
    },
    _menneske2: {
      msg:        '<i>et menneske</i>',
      trans:      'człowiek',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _firma1: {
      msg:        newMsg( 'firma' ),
      answers: [
        { answer: '<i>et</i>', score: 'correct', next: '_firma2' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
      ]
    },
    _firma2: {
      msg:        '<i>et firma</i>',
      trans:      'firma',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },

    _hand1: {
      msg:        newMsg( 'hånd' ),
      answers: [
        { answer: '<i>en/ei</i>', score: 'correct', next: '_hand2' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _hand2: {
      msg:        '<i>ei hånd</i>',
      trans:      'ręka',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _helg1: {
      msg:        newMsg( 'helg' ),
      answers: [
        { answer: '<i>en/ei</i>', score: 'correct', next: '_helg2' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _helg2: {
      msg:        '<i>ei helg</i>',
      trans:      'weekend',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _seng1: {
      msg:        newMsg( 'seng' ),
      answers: [
        { answer: '<i>en/ei</i>', score: 'correct', next: '_seng2' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _seng2: {
      msg:        '<i>ei seng</i>',
      trans:      'weekend',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


  };


  //
  //  Extra
  //
  this.extra = {

    _barn1: {
      msg:        newMsg( 'barn' ),
      answers: [
        { answer: '<i>et</i>', score: 'correct', next: '_barn2' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>en</i>',   score: 'wrong' },
      ]
    },
   _barn2: {
      msg:        '<i>et barn</i>',
      trans:      'dziecko',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },

    _spor1: {
      msg:        newMsg( 'spor' ),
      answers: [
        { answer: '<i>et</i>', score: 'correct', next: '_spor2' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
      ]
    },
    _spor2: {
      msg:        '<i>et spor</i>',
      trans:      'ślad, tor',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _lys1: {
      msg:        newMsg( 'lys' ),
      answers: [
        { answer: '<i>et</i>', score: 'correct', next: '_lys2' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
      ]
    },
    _lys2: {
      msg:        '<i>et lys</i>',
      trans:      'światło',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _kamp1: {
      msg:        newMsg( 'kamp' ),
      answers: [
        { answer: '<i>en</i>', score: 'correct', next: '_kamp2' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _kamp2: {
      msg:        '<i>en kamp</i>',
      trans:      'walka, mecz',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _bat1: {
      msg:        newMsg( 'båt' ),
      answers: [
        { answer: '<i>en</i>', score: 'correct', next: '_bat2' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _bat2: {
      msg:        '<i>en båt</i>',
      trans:      'łódź',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _morgen1: {
      msg:        newMsg( 'morgen' ),
      answers: [
        { answer: '<i>en</i>', score: 'correct', next: '_morgen2' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _morgen2: {
      msg:        '<i>en morgen</i>',
      trans:      'ranek, poranek',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _navn1: {
      msg:        newMsg( 'navn' ),
      answers: [
        { answer: '<i>et</i>', score: 'correct', next: '_navn2' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
        { answer: '<i>en</i>',   score: 'wrong' },
      ]
    },
    _navn2: {
      msg:        '<i>et navn</i>',
      trans:      'imię',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _moete1: {
      msg:        newMsg( 'møte' ),
      answers: [
        { answer: '<i>et</i>', score: 'correct', next: '_moete2' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
      ]
    },
    _moete2: {
      msg:        '<i>et møte</i>',
      trans:      'spotkanie',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _land1: {
      msg:        newMsg( 'land' ),
      answers: [
        { answer: '<i>et</i>', score: 'correct', next: '_land2' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>en/ei</i>',   score: 'wrong' },
      ]
    },
    _land2: {
      msg:        '<i>et land</i>',
      trans:      'kraj',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


    _jord1: {
      msg:        newMsg( 'jord' ),
      answers: [
        { answer: '<i>en/ei</i>', score: 'correct', next: '_jord2' },
        { answer: '<i>en</i>',   score: 'wrong' },
        { answer: '<i>et</i>',   score: 'wrong' },
      ]
    },
    _jord2: {
      msg:        '<i>ei jord</i>',
      trans:      'ziemia',
      //  startTime:  0,
      //  duration:   1.5,
      autoNext:   'RANDOM',
    },


  };



}
</script>
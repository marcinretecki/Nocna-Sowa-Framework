<script>
function LasData() {

  this.category = 'audio-test'; // chat|setninger|etc


  this.testNotes = [
  ];


  this.intro = {
    _intro1: {
      msg:          'Załóż słuchawki, jeśli chcesz. #emoji-1f3a7;',
      autoNext:     '_intro2'
    },
    _intro2: {
      msg:          '<p>W wyzwaniu czeka na Ciebie test. Przetłumacz na norweski podane określenie czasu.</p>' + '<p>Następnie powtórz na głos poprawne zdanie.</p>',
      autoNext:     'ENDINTRO'
    },
  };


  this.chat = {

    _ikveld1: {
      msg:        '<i>Vi går på festen <span class="mark mark--green">dziś wieczorem</span>.</i>',
      trans:      'Idziemy na imprezę dziś wieczorem.',
      answers: [
        { answer: '<i>i kveld</i>', score: 'correct', next: '_ikveld2' },
        { answer: '<i>om kvelden</i>', score: 'wrong' },
        { answer: '<i>i dag</i>', score: 'wrong' },
        { answer: '<i>om natta</i>', score: 'wrong' }
      ]
    },
    _ikveld2: {
      msg:        '<i>Vi går på festen i kveld.</i>',
      trans:      'Idziemy na imprezę dziś wieczorem.',
      startTime:  0,
      duration:   2 - 0,
      autoNext:   'RANDOM'
    },


    _omkvelden1: {
      msg:        '<i>Jeg lærer norsk <span class="mark mark--green">wieczorami</span>.</i>',
      trans:      'Uczę się norweskiego wieczorami.',
      answers: [
        { answer: '<i>om kvelden</i>', score: 'correct', next: '_omkvelden2' },
        { answer: '<i>i kveld</i>', score: 'wrong' },
        { answer: '<i>hver dag</i>', score: 'wrong' },
        { answer: '<i>i natt</i>', score: 'wrong' }
      ]
    },
    _omkvelden2: {
      msg:        '<i>Jeg lærer norsk om kvelden.</i>',
      trans:      'Uczę się norweskiego wieczorami.',
      startTime:  3,
      duration:   5 - 3,
      autoNext:   'RANDOM'
    },


    _imorgen1: {
      msg:        '<i>Jeg går på jobb <span class="mark mark--green">jutro</span>.</i>',
      trans:      'Idę do pracy jutro.',
      answers: [
        { answer: '<i>i morgen</i>', score: 'correct', next: '_imorgen2' },
        { answer: '<i>om morgenen</i>', score: 'wrong' },
        { answer: '<i>i dag</i>', score: 'wrong' },
        { answer: '<i>om dagen</i>', score: 'wrong' }
      ]
    },
    _imorgen2: {
      msg:        '<i>Jeg går på jobb i morgen.</i>',
      trans:      'Idę do pracy jutro.',
      startTime:  6,
      duration:   8 - 6,
      autoNext:   'RANDOM'
    },


    _ommorgen1: {
      msg:        '<i>Han står opp tidlig <span class="mark mark--green">rano/rankami</span>.</i>',
      trans:      'On wstaje wcześnie rano.',
      answers: [
        { answer: '<i>om morgenen</i>', score: 'correct', next: '_ommorgen2' },
        { answer: '<i>i morges</i>', score: 'wrong' },
        { answer: '<i>i morgen tidlig</i>', score: 'wrong' },
        { answer: '<i>i dag</i>', score: 'wrong' }
      ]
    },
    _ommorgen2: {
      msg:        '<i>Han står opp tidlig om morgenen.</i>',
      trans:      'On wstaje wcześnie rano.',
      startTime:  13,
      duration:   2.5,
      autoNext:   'RANDOM'
    },


    _idag1: {
      msg:        '<i>Takk for <span class="mark mark--green">dziś</span>.</i>',
      trans:      'Dzięki za dziś.',
      answers: [
        { answer: '<i>i dag</i>', score: 'correct', next: '_idag2' },
        { answer: '<i>i morges</i>', score: 'wrong' },
        { answer: '<i>i natt</i>', score: 'wrong' },
        { answer: '<i>sist</i>', score: 'wrong' }
      ]
    },
    _idag2: {
      msg:        '<i>Takk for i dag.</i>',
      trans:      'Dzięki za dziś.',
      startTime:  17,
      duration:   18.5 - 17,
      autoNext:   'RANDOM'
    },


    _omettermiddagen1: {
      msg:        '<i>Jeg vil løpe <span class="mark mark--green">popołudniami</span>.</i>',
      trans:      'Chcę biegać popołudniami.',
      answers: [
        { answer: '<i>om ettermiddagen</i>', score: 'correct', next: '_omettermiddagen2' },
        { answer: '<i>om formiddagen</i>', score: 'wrong' },
        { answer: '<i>i ettermiddag</i>', score: 'wrong' },
        { answer: '<i>i formiddag</i>', score: 'wrong' }
      ]
    },
    _omettermiddagen2: {
      msg:        '<i>Jeg vil løpe om ettermiddagen.</i>',
      trans:      'Chcę biegać popołudniami.',
      startTime:  24,
      duration:   26 - 24,
      autoNext:   'RANDOM'
    },


    _iettermiddag1: {
      msg:        '<i>Jeg går til frisøren <span class="mark mark--green">dziś popołudniu</span>.</i>',
      trans:      'Idę do fryzjera dziś popołudniu.',
      answers: [
        { answer: '<i>i ettermiddag</i>', score: 'correct', next: '_iettermiddag2' },
        { answer: '<i>i formiddag</i>', score: 'wrong' },
        { answer: '<i>om formiddagen</i>', score: 'wrong' },
        { answer: '<i>om ettermiddagen</i>', score: 'wrong' }
      ]
    },
    _iettermiddag2: {
      msg:        '<i>Jeg går til frisøren i ettermiddag.</i>',
      trans:      'Idę do fryzjera dziś popołudniu.',
      startTime:  27,
      duration:   30 - 27,
      autoNext:   'RANDOM'
    },


    _omformiddagen1: {
      msg:        '<i>Han lufter hunden <span class="mark mark--green">przedpołudniami</span>.</i>',
      trans:      'On wychodzi z psem przedpołudniami.',
      answers: [
        { answer: '<i>om formiddagen</i>', score: 'correct', next: '_omformiddagen2' },
        { answer: '<i>om ettermiddagen</i>', score: 'wrong' },
        { answer: '<i>i ettermiddag</i>', score: 'wrong' },
        { answer: '<i>i formiddag</i>', score: 'wrong' }
      ]
    },
    _omformiddagen2: {
      msg:        '<i>Han lufter hunden om formiddagen.</i>',
      trans:      'On wychodzi z psem przedpołudniami.',
      startTime:  31,
      duration:   33.5 - 31,
      autoNext:   'RANDOM'
    },


    _omnatta1: {
      msg:        '<i>Han kan ikke sove <span class="mark mark--green">w nocy/nocami</span>.</i>',
      trans:      'On nie może spać nocami.',
      answers: [
        { answer: '<i>om natta</i>', score: 'correct', next: '_omnatta2' },
        { answer: '<i>om kvelden</i>', score: 'wrong' },
        { answer: '<i>i natt</i>', score: 'wrong' },
        { answer: '<i>i kveld</i>', score: 'wrong' }
      ]
    },
    _omnatta2: {
      msg:        '<i>Han kan ikke sove om natta.</i>',
      trans:      'On nie może spać nocami.',
      startTime:  35,
      duration:   37 - 35,
      autoNext:   'RANDOM'
    },

    inatt: {
      msg:        '<i>Naboene fester <span class="mark mark--green">dziś w nocy</span>.</i>',
      trans:      'Sąsiedzi imprezują dziś w nocy.',
      answers: [
        { answer: '<i>i natt</i>', score: 'correct', next: '_inatt' },
        { answer: '<i>i kveld</i>', score: 'wrong' },
        { answer: '<i>om kvelden</i>', score: 'wrong' },
        { answer: '<i>om ettermiddagen</i>', score: 'wrong' }
      ]
    },
    inatt: {
      msg:        '<i>Naboene fester i natt.</i>',
      trans:      'Sąsiedzi imprezują dziś w nocy.',
      startTime:  38,
      duration:   40 - 38,
      autoNext:   'RANDOM'
    },


    _na1: {
      msg:        '<i>Jeg må stikke <span class="mark mark--green">teraz</span>.</i>',
      trans:      'Muszę teraz spadać.',
      answers: [
        { answer: '<i>nå</i>', score: 'correct', next: '_na2' },
        { answer: '<i>om en stund</i>', score: 'wrong' },
        { answer: '<i>om et øyeblikk</i>', score: 'wrong' },
        { answer: '<i>etterpå</i>', score: 'wrong' }
      ]
    },
    _na2: {
      msg:        '<i>Jeg må stikke nå.</i>',
      trans:      'Muszę teraz spadać.',
      startTime:  44,
      duration:   45.5 - 44,
      autoNext:   'RANDOM'
    },


    _omentime1: {
      msg:        '<i>Vi skal reise <span class="mark mark--green">za godzinę</span>.</i>',
      trans:      'Wyjeżdżamy za godzinę.',
      answers: [
        { answer: '<i>om en time</i>', score: 'correct', next: '_omentime2' },
        { answer: '<i>om en tid</i>', score: 'wrong' },
        { answer: '<i>i en time</i>', score: 'wrong' },
        { answer: '<i>timehvis</i>', score: 'wrong' }
      ]
    },
    _omentime2: {
      msg:        '<i>Vi skal reise om en time.</i>',
      trans:      'Wyjeżdżamy za godzinę.',
      startTime:  47,
      duration:   49 - 47,
      autoNext:   'RANDOM'
    },


    _omtredager1: {
      msg:        '<i>Han slutter prosjektet <span class="mark mark--green">za trzy dni</span>.</i>',
      trans:      'On skończy projekt za trzy dni.',
      answers: [
        { answer: '<i>om tre dager</i>', score: 'correct', next: '_omtredager2' },
        { answer: '<i>i tre dager</i>', score: 'wrong' },
        { answer: '<i>om tre timer</i>', score: 'wrong' },
        { answer: '<i>på torsdag</i>', score: 'wrong' }
      ]
    },
    _omtredager2: {
      msg:        '<i>Han slutter prosjektet om tre dager.</i>',
      trans:      'On skończy projekt za trzy dni.',
      startTime:  53,
      duration:   56 - 53,
      autoNext:   'RANDOM'
    },


    _omfemuker1: {
      msg:        '<i>Jeg kommer tilbake til Norge <span class="mark mark--green">za pięć tygodni</span>.</i>',
      trans:      'Wracam do Norwegii za pięć tygodni.',
      answers: [
        { answer: '<i>om fem uker</i>', score: 'correct', next: '_omfemuker2' },
        { answer: '<i>om fem måneder</i>', score: 'wrong' },
        { answer: '<i>om ei uke</i>', score: 'wrong' },
        { answer: '<i>om to måneder</i>', score: 'wrong' }
      ]
    },
    _omfemuker2: {
      msg:        '<i>Jeg kommer tilbake til Norge om fem uker.</i>',
      trans:      'Wracam do Norwegii za pięć tygodni.',
      startTime:  57,
      duration:   60 - 57,
      autoNext:   'RANDOM'
    },


    _nextar1: {
      msg:        '<i>De gifter seg <span class="mark mark--green">w przyszłym roku</span>.</i>',
      trans:      'Ożenią się w przyszłym roku.',
      answers: [
        { answer: '<i>neste år</i>', score: 'correct', next: '_nextar2' },
        { answer: '<i>siste år</i>', score: 'wrong' },
        { answer: '<i>i år</i>', score: 'wrong' },
        { answer: '<i>om fem måneder</i>', score: 'wrong' }
      ]
    },
    _nextar2: {
      msg:        '<i>De gifter seg neste år.</i>',
      trans:      'Ożenią się w przyszłym roku.',
      startTime:  72,
      duration:   74 - 72,
      autoNext:   'RANDOM'
    },

    _nesteuke1: {
      msg:        '<i>Vi sees <span class="mark mark--green">w przyszłym tygodniu</span>.</i>',
      trans:      'Widzimy się w przyszłym tygodniu.',
      answers: [
        { answer: '<i>neste uke</i>', score: 'correct', next: '_nesteuke2' },
        { answer: '<i>igjen</i>', score: 'wrong' },
        { answer: '<i>om ei uke</i>', score: 'wrong' },
        { answer: '<i>om sju dager</i>', score: 'wrong' }
      ]
    },
    _nesteuke2: {
      msg:        '<i>Vi sees neste uke.</i>',
      trans:      'Widzimy się w przyszłym tygodniu.',
      startTime:  75,
      duration:   77 - 75,
      autoNext:   'RANDOM'
    },

    _nestemaned1: {
      msg:        '<i>Jeg begynner et dansekurs <span class="mark mark--green">w następnym/przyszłym miesiącu</span>.</i>',
      answers: [
        { answer: '<i>neste måned</i>', score: 'correct', next: '_nestemaned2' },
        { answer: '<i>neste år</i>', score: 'wrong' },
        { answer: '<i>neste gang</i>', score: 'wrong' },
        { answer: '<i>om en måned</i>', score: 'wrong' }
      ]
    },
    _nestemaned2: {
      msg:        'Jeg begynner et dansekurs neste måned.',
      startTime:  78,
      duration:   81 - 78,
      autoNext:   'RANDOM'
    },


    _nytthverdag1: {
      msg:        '<i>Jeg lærer noe nytt <span class="mark mark--green">codziennie</span>.</i>',
      trans:      'Uczę się czegoś nowego każdego dnia.',
      answers: [
        { answer: '<i>hver dag</i>', score: 'correct', next: '_nytthverdag2' },
        { answer: '<i>i dag</i>', score: 'wrong' },
        { answer: '<i>om en dag</i>', score: 'wrong' },
        { answer: '<i>hver andre dag</i>', score: 'wrong' }
      ]
    },
    _nytthverdag2: {
      msg:        '<i>Jeg lærer noe nytt hver dag.</i>',
      trans:      'Uczę się czegoś nowego każdego dnia.',
      startTime:  86,
      duration:   88 - 86,
      autoNext:   'RANDOM'
    },


    _hvermorgen1: {
      msg:        '<i>Jeg løper i parken <span class="mark mark--green">każdego ranka</span>.</i>',
      trans:      'Biegam w parku każdego ranka.',
      answers: [
        { answer: '<i>hver morgen</i>', score: 'correct', next: '_hvermorgen2' },
        { answer: '<i>i morgen</i>', score: 'wrong' },
        { answer: '<i>i morges</i>', score: 'wrong' },
        { answer: '<i>hver dag</i>', score: 'wrong' }
      ]
    },
    _hvermorgen2: {
      msg:        '<i>Jeg løper i parken hver morgen.</i>',
      trans:      'Biegam w parku każdego ranka.',
      startTime:  89,
      duration:   91.5 - 89,
      autoNext:   'RANDOM'
    },


    _hveruke1: {
      msg:        '<i>Hun ringer til foreldrene <span class="mark mark--green">co tydzień</span>.</i>',
      trans:      'Ona dzwoni do rodziców co tydzień.',
      answers: [
        { answer: '<i>hver uke</i>', score: 'correct', next: '_hveruke2' },
        { answer: '<i>hver søndag</i>', score: 'wrong' },
        { answer: '<i>om uka</i>', score: 'wrong' },
        { answer: '<i>mange ganger</i>', score: 'wrong' }
      ]
    },
    _hveruke2: {
      msg:        '<i>Hun ringer til foreldrene hver uke.</i>',
      trans:      'Ona dzwoni do rodziców co tydzień.',
      startTime:  97,
      duration:   100 - 97,
      autoNext:   'RANDOM'
    },




    _ihelga1: {
      msg:        '<i>Jeg drar med familien på hytta <span class="mark mark--green">w weekend</span>.</i>',
      trans:      'Jadę z rodzinę do hytty w weekend.',
      answers: [
        { answer: '<i>i helga</i>', score: 'correct', next: '_ihelga2' },
        { answer: '<i>på fredag</i>', score: 'wrong' },
        { answer: '<i>på lørdag</i>', score: 'wrong' },
        { answer: '<i>hver helg</i>', score: 'wrong' }
      ]
    },
    _ihelga2: {
      msg:        '<i>Jeg drar med familien på hytta i helga.</i>',
      trans:      'Jadę z rodzinę do hytty w weekend.',
      startTime:  138,
      duration:   140.5 - 138,
      autoNext:   'RANDOM'
    }

  };


  this.extra = {

    _itoar1: {
      msg:        '<i>Vi skal bo i Ålesund <span class="mark mark--green">przez dwa lata</span>.</i>',
      trans:      'Będziemy mieszkali w Ålesund przez dwa lata.',
      answers: [
        { answer: '<i>i to år</i>', score: 'correct', next: '_itoar2' },
        { answer: '<i>om to år</i>', score: 'wrong' },
        { answer: '<i>for to år siden</i>', score: 'wrong' },
        { answer: '<i>for to år</i>', score: 'wrong' }
      ]
    },
    _itoar2: {
      msg:        '<i>Vi skal bo i Ålesund i to år.</i>',
      trans:      'Będziemy mieszkali w ',
      startTime:  131,
      duration:   134 - 131,
      autoNext:   'RANDOM'
    },


    _iovermorgen1: {
      msg:        '<i>De leverer skapene <span class="mark mark--green">pojutrze</span>.</i>',
      trans:      'Dostarczą szafki pojutrze.',
      answers: [
        { answer: '<i>i overmorgen</i>', score: 'correct', next: '_iovermorgen2' },
        { answer: '<i>om noen dager</i>', score: 'wrong' },
        { answer: '<i>på tirsdag</i>', score: 'wrong' },
        { answer: '<i>i morgen</i>', score: 'wrong' }
      ]
    },
    _iovermorgen2: {
      msg:        '<i>De leverer skapene i overmorgen.</i>',
      trans:      'Dostarczą szafki pojutrze.',
      startTime:  135,
      duration:   137 - 135,
      autoNext:   'RANDOM'
    },


    _hversommer1: {
      msg:        '<i>De besøker venner <span class="mark mark--green">każdego lata</span>.</i>',
      trans:      'Odwiedzają przyjaciół każdego lata.',
      answers: [
        { answer: '<i>hver sommer</i>', score: 'correct', next: '_hversommer2' },
        { answer: '<i>hver vinter</i>', score: 'wrong' },
        { answer: '<i>hver måned</i>', score: 'wrong' },
        { answer: '<i>hver vår</i>', score: 'wrong' }
      ]
    },
    _hversommer2: {
      msg:        '<i>De besøker venner hver sommer.</i>',
      trans:      'Odwiedzają przyjaciół każdego lata.',
      startTime:  117,
      duration:   119.5 - 117,
      autoNext:   'RANDOM'
    },


    _hvervinter1: {
      msg:        '<i>De reiser til Spania <span class="mark mark--green">każdej zimy</span>.</i>',
      trans:      'Jeżdżą do Hiszpani każdej zimy.',
      answers: [
        { answer: '<i>hver vinter</i>', score: 'correct', next: '_hvervinter2' },
        { answer: '<i>om vinteren</i>', score: 'wrong' },
        { answer: '<i>i helga</i>', score: 'wrong' },
        { answer: '<i>hver ferie</i>', score: 'wrong' }
      ]
    },
    _hvervinter2: {
      msg:        '<i>De reiser til Spania hver vinter.</i>',
      trans:      'Jeżdżą do Hiszpani każdej zimy.',
      startTime:  121,
      duration:   123.5 - 121,
      autoNext:   'RANDOM'
    },


    _ihost1: {
      msg:        '<i>Det regner ikke <span class="mark mark--green">tej jesieni</span>.</i>',
      trans:      'Nie pada tej jesieni.',
      answers: [
        { answer: '<i>i høst</i>', score: 'correct', next: '_ihost2' },
        { answer: '<i>siste høst</i>', score: 'wrong' },
        { answer: '<i>om høsten</i>', score: 'wrong' },
        { answer: '<i>hver høst</i>', score: 'wrong' }
      ]
    },
    _ihost2: {
      msg:        '<i>Det regner ikke i høst.</i>',
      trans:      'Nie pada tej jesieni.',
      startTime:  125,
      duration:   126.5 - 125,
      autoNext:   'RANDOM'
    },


    _ivar1: {
      msg:        '<i>De bytter dørklokka <span class="mark mark--green">tej wiosny</span>.</i>',
      trans:      'Zmieniają zamek tej wiosny.',
      answers: [
        { answer: '<i>i vår</i>', score: 'correct', next: '_ivar2' },
        { answer: '<i>hver vår</i>', score: 'wrong' },
        { answer: '<i>hver andre høst</i>', score: 'wrong' },
        { answer: '<i>hver høst</i>', score: 'wrong' }
      ]
    },
    _ivar2: {
      msg:        '<i>De bytter dørklokka i vår.</i>',
      trans:      'Zmieniają zamek tej wiosny.',
      startTime:  128,
      duration:   130 - 128,
      autoNext:   'RANDOM'
    },


    _nestegang1: {
      msg:        '<i>De vil ikke ta opp lån <span class="mark mark--green">następnym razem</span>.</i>',
      trans:      'Nie chcą brać pożyczki następnym razem.',
      answers: [
        { answer: '<i>neste gang</i>', score: 'correct', next: '_nestegang2' },
        { answer: '<i>hver gang</i>', score: 'wrong' },
        { answer: '<i>om en stund</i>', score: 'wrong' },
        { answer: '<i>nesten gang</i>', score: 'wrong' }
      ]
    },
    _nestegang2: {
      msg:        '<i>De vil ikke ta opp lån neste gang.</i>',
      trans:      'Nie chcą brać pożyczki następnym razem.',
      startTime:  82,
      duration:   84.5 - 82,
      autoNext:   'RANDOM'
    },


    _omenstund1: {
      msg:        '<i>Jeg kommer  <span class="mark mark--green">za chwilę</span>.</i>',
      trans:      'Przyjdę za chwilę.',
      answers: [
        { answer: '<i>om en stund</i>', score: 'correct', next: '_omenstund2' },
        { answer: '<i>i en stund</i>', score: 'wrong' },
        { answer: '<i>for en stund</i>', score: 'wrong' },
        { answer: '<i>en stund</i>', score: 'wrong' }
      ]
    },
    _omenstund2: {
      msg:        '<i>Jeg kommer om en stund.</i>',
      trans:      'Przyjdę za chwilę.',
      startTime:  41,
      duration:   42.5 - 41,
      autoNext:   'RANDOM'
    },


    _annenhveruke1: {
      msg:        '<i>Han jobber om morgenen <span class="mark mark--green">co drugi tydzień</span>.</i>',
      trans:      'On pracuje rankiem co drugi tydzień.',
      answers: [
        { answer: '<i>annenhver uke</i>', score: 'correct', next: '_annenhveruke2' },
        { answer: '<i>hver andre måned</i>', score: 'wrong' },
        { answer: '<i>hver uke</i>', score: 'wrong' },
        { answer: '<i>hver andre gang</i>', score: 'wrong' }
      ]
    },
    _annenhveruke2: {
      msg:        '<i>Han jobber om morgenen annenhver uke.</i>',
      trans:      'On pracuje rankiem co drugi tydzień.',
      startTime:  101,
      duration:   104 - 101,
      autoNext:   'RANDOM'
    },


    _annenhvermaned1: {
      msg:        '<i>Jeg flyr til Bergen <span class="mark mark--green">co drugi miesiąc</span>.</i>',
      trans:      'Latam do Bergen co drugi miesiąc.',
      answers: [
        { answer: '<i>annehver måned</i>', score: 'correct', next: '_annenhvermaned2' },
        { answer: '<i>hver andre uke</i>', score: 'wrong' },
        { answer: '<i>hver måned</i>', score: 'wrong' },
        { answer: '<i>annenhver uke</i>', score: 'wrong' }
      ]
    },
    _annenhvermaned2: {
      msg:        '<i>Jeg flyr til Bergen annehver måned.</i>',
      trans:      'Latam do Bergen co drugi miesiąc.',
      startTime:  105,
      duration:   108 - 105,
      autoNext:   'RANDOM'
    },


    _hvergang1: {
      msg:        '<i>Han kommer for sent <span class="mark mark--green">za każdym razem</span>.</i>',
      trans:      'On przychodzi spóźniony za każdym razem.',
      answers: [
        { answer: '<i>hver gang</i>', score: 'correct', next: '_hvergang2' },
        { answer: '<i>annenhver gang</i>', score: 'wrong' },
        { answer: '<i>hver time</i>', score: 'wrong' },
        { answer: '<i>timevis</i>', score: 'wrong' }
      ]
    },
    _hvergang2: {
      msg:        '<i>Han kommer for sent hver gang.</i>',
      trans:      'On przychodzi spóźniony za każdym razem.',
      startTime:  109,
      duration:   111.5 - 109,
      autoNext:   'RANDOM'
    },


    _hvertar1: {
      msg:        '<i>Dere betaler skatt <span class="mark mark--green">każdego roku</span>.</i>',
      trans:      'Płacicie podatek każdego roku.',
      answers: [
        { answer: '<i>hvert år</i>', score: 'correct', next: '_hvertar2' },
        { answer: '<i>hver andre år</i>', score: 'wrong' },
        { answer: '<i>aldri</i>', score: 'wrong' },
        { answer: '<i>hvis dere husker det</i>', score: 'wrong' }
      ]
    },
    _hvertar2: {
      msg:        '<i>Dere betaler skatt hvert år.</i>',
      trans:      'Płacicie podatek każdego roku.',
      startTime:  113,
      duration:   115.5 - 113,
      autoNext:   'RANDOM'
    },


    _omethalvtar1: {
      msg:        '<i>Han vil slanke seg <span class="mark mark--green">za pół roku</span>.</i>',
      trans:      'On chce się odchudzić za pół roku.',
      answers: [
        { answer: '<i>om et halvt år</i>', score: 'correct', next: '_omethalvtar2' },
        { answer: '<i>om fem måneder</i>', score: 'wrong' },
        { answer: '<i>i seks måneder</i>', score: 'wrong' },
        { answer: '<i>om et år</i>', score: 'wrong' }
      ]
    },
    _omethalvtar2: {
      msg:        '<i>Han vil slanke seg om et halvt år.</i>',
      trans:      'On chce się odchudzić za pół roku.',
      startTime:  65,
      duration:   67.5 - 65,
      autoNext:   'RANDOM'
    },


    _omnoenar1: {
      msg:        '<i>Hun blir sjef her <span class="mark mark--green">za kilka lat</span>.</i>',
      trans:      'Ona zostanie tu szefem za kilka lat.',
      answers: [
        { answer: '<i>om noen år</i>', score: 'correct', next: '_omnoenar2' },
        { answer: '<i>i noen år</i>', score: 'wrong' },
        { answer: '<i>hvert år</i>', score: 'wrong' },
        { answer: '<i>neste år</i>', score: 'wrong' }
      ]
    },
    _omnoenar2: {
      msg:        '<i>Hun blir sjef her om noen år.</i>',
      trans:      'Ona zostanie tu szefem za kilka lat.',
      startTime:  69,
      duration:   71 - 69,
      autoNext:   'RANDOM'
    },


    _imorgenkveld1: {
      msg:        '<i>De skal på treningssenter <span class="mark mark--green">jutro wieczorem</span>.</i>',
      trans:      'Idą na siłowię jutro wieczorem.',
      answers: [
        { answer: '<i>i morgen kveld</i>', score: 'correct', next: '_imorgenkveld2' },
        { answer: '<i>i kveld</i>', score: 'wrong' },
        { answer: '<i>om kvelden</i>', score: 'wrong' },
        { answer: '<i>i morgen tidlig</i>', score: 'wrong' }
      ]
    },
    _imorgenkveld2: {
      msg:        '<i>De skal på treningssenter i morgen kveld.</i>',
      trans:      'Idą na siłowię jutro wieczorem.',
      startTime:  20,
      duration:   23 - 20,
      autoNext:   'RANDOM'
    },


    _imorgentidlig1: {
      msg:        '<i>Jeg skal lage kaffe <span class="mark mark--green">jutro rano</span>.</i>',
      trans:      'Zrobię kawę jutro rano.',
      answers: [
        { answer: '<i>i morgen tidlig</i>', score: 'correct', next: '_imorgentidlig2' },
        { answer: '<i>i morgen</i>', score: 'wrong' },
        { answer: '<i>i morgen kveld</i>', score: 'wrong' },
        { answer: '<i>om morgenen</i>', score: 'wrong' }
      ]
    },
    _imorgentidlig2: {
      msg:        '<i>Jeg skal lage kaffe i morgen tidlig</i>',
      trans:      'Zrobię kawę jutro rano.',
      startTime:  9,
      duration:   12 - 9,
      autoNext:   'RANDOM'
    },


    _omettminutt1: {
      msg:        '<i>Vi er på stedet <span class="mark mark--green">za minutę</span>.</i>',
      trans:      'Jesteśmy na miejscu za minutę.',
      answers: [
        { answer: '<i>om ett minutt</i>', score: 'correct', next: '_omettminutt2' },
        { answer: '<i>i et minutt</i>', score: 'wrong' },
        { answer: '<i>om noen minutter</i>', score: 'wrong' },
        { answer: '<i>på minutt</i>', score: 'wrong' }
      ]
    },
    _omettminutt2: {
      msg:        '<i>Vi er på stedet om ett minutt.</i>',
      trans:      'Jesteśmy na miejscu za minutę.',
      startTime:  50,
      duration:   52 - 50,
      autoNext:   'RANDOM'
    },


    _hvertime1: {
      msg:        '<i>Jeg sjekker mobilen <span class="mark mark--green">co godzinę</span>.</i>',
      trans:      'Sprawdzam telefon co godzinę.',
      answers: [
        { answer: '<i>hver time</i>', score: 'correct', next: '_hvertime2' },
        { answer: '<i>i en time</i>', score: 'wrong' },
        { answer: '<i>på en time</i>', score: 'wrong' },
        { answer: '<i>hver gang</i>', score: 'wrong' }
      ]
    },
    _hvertime2: {
      msg:        '<i>Jeg sjekker mobilen hver time.</i>',
      trans:      'Sprawdzam telefon co godzinę.',
      startTime:  93,
      duration:   95.5 - 93,
      autoNext:   'RANDOM'
    },


    _omfireman1: {
      msg:        '<i>Jeg åpner en ny butikk <span class="mark mark--green">za cztery miesiące</span>.</i>',
      trans:      'Otwieram nowy sklep za cztery miesiące.',
      answers: [
        { answer: '<i>om fire måneder</i>', score: 'correct', next: '_omfireman2' },
        { answer: '<i>om et halvt år</i>', score: 'wrong' },
        { answer: '<i>om fire uker</i>', score: 'wrong' },
        { answer: '<i>i fire måneder</i>', score: 'wrong' }
      ]
    },
    _omfireman2: {
      msg:        '<i>Jeg åpner en ny butikk om fire måneder.</i>',
      trans:      'Otwieram nowy sklep za cztery miesiące.',
      startTime:  61,
      duration:   64 - 61,
      autoNext:   'RANDOM'
    },

  };



}
</script>
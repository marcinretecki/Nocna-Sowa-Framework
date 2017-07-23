<script>
function LasAudioData() {

  this.testNotes = [
    'De leverer skapene i overmorgen. - nie ma quizu :(',
    'De bytter dørklokka i vår. - czytanie dørklokka',
    'Vi skal reise om en time. - czy jest prawidlowa odpowiedz zaznaczona',
    'Takk for i dag. - czytanie takk',
    'po przykladzie han lufter hunden om formiddagen nie bylo punktow',
    'Han står opp tidlig om morgenen. - czytana tylko końcówka zdania',
    'De vil ikke ta opp lånn neste gang. Po tym przykﬁadzie wyswietla sie zle zdanie: Jeg lærer noe nytt hver dag., a czytane jest dobre'
  ];

  this.intro = {
    _a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:     'ENDINTRO'/*,
      more:       {
        startTime:  0,
        duration:   26,
      }*/
    }
  };


  this.chat = {

    _ikveld1: {
      msg:        'Vi går på festen <span class="audio-test-clue">dziś wieczorem</span>.',
      trans:      'Idziemy na imprezę dziś wieczorem.',
      answers: [
        { answer: 'i kveld', next: '_ikveld2' },
        { answer: 'om kvelden', wrong: true },
        { answer: 'i dag', wrong: true },
        { answer: 'om natta', wrong: true }
      ]
    },
    _ikveld2: {
      msg:        'Vi går på festen i kveld.',
      trans:      'Idziemy na imprezę dziś wieczorem.',
      score:      true,
      startTime:  0,
      duration:   2 - 0,
      autoNext:   'RANDOM'
    },
1: {
    _omkvelden
      msg:        'Jeg lærer norsk <span class="audio-test-clue">wieczorami</span>.',
      trans:      'Uczę się norweskiego wieczorami.',
      answers: [
        { answer: 'om kvelden', next: '_omkvelden2' },
        { answer: 'i kveld', wrong: true },
        { answer: 'hver dag', wrong: true },
        { answer: 'i natt', wrong: true }
      ]
    },
    _omkvelden2: {
      msg:        'Jeg lærer norsk om kvelden.',
      trans:      'Uczę się norweskiego wieczorami.',
      score:      true,
      startTime:  3,
      duration:   5 - 3,
      autoNext:   'RANDOM'
    },

    _imorgen1: {
      msg:        'Jeg går på jobb <span class="audio-test-clue">jutro</span>.',
      trans:      'Idę do pracy jutro.',
      answers: [
        { answer: 'i morgen', next: '_imorgen2' },
        { answer: 'om morgenen', wrong: true },
        { answer: 'i dag', wrong: true },
        { answer: 'om dagen', wrong: true }
      ]
    },
    _imorgen2: {
      msg:        'Jeg går på jobb i morgen.',
      trans:      'Idę do pracy jutro.',
      score:      true,
      startTime:  6,
      duration:   8 - 6,
      autoNext:   'RANDOM'
    },

    _imorgentidlig1: {
      msg:        'Jeg skal lage kaffe <span class="audio-test-clue">jutro rano</span>.',
      trans:      'Zrobię kawę jutro rano.',
      answers: [
        { answer: 'i morgen tidlig', next: '_imorgentidlig2' },
        { answer: 'i morgen', wrong: true },
        { answer: 'i morgen kveld', wrong: true },
        { answer: 'om morgenen', wrong: true }
      ]
    },
    _imorgentidlig2: {
      msg:        'Jeg skal lage kaffe i morgen tidlig',
      trans:      'Zrobię kawę jutro rano.',
      score:      true,
      startTime:  9,
      duration:   12 - 9,
      autoNext:   'RANDOM'
    },

    _ommorgen1: {
      msg:        'Han står opp tidlig <span class="audio-test-clue">rano/rankami</span>.',
      trans:      '',
      answers: [
        { answer: 'om morgenen', next: '_ommorgen2' },
        { answer: 'i morges', wrong: true },
        { answer: 'i morgen tidlig', wrong: true },
        { answer: 'i dag', wrong: true }
      ]
    },
    _ommorgen2: {
      msg:        'Han står opp tidlig om morgenen.',
      trans:      '',
      score:      true,
      startTime:  14,
      duration:   15.5 - 14,
      autoNext:   'RANDOM'
    },

    _idag1: {
      msg:        'Takk for <span class="audio-test-clue">dziś</span>.',
      trans:      'Dzięki za dziś.',
      answers: [
        { answer: 'i dag', next: '_idag2' },
        { answer: 'i morges', wrong: true },
        { answer: 'i natt', wrong: true },
        { answer: 'sist', wrong: true }
      ]
    },
    _idag2: {
      msg:        'Takk for i dag.',
      trans:      'Dzięki za dziś.',
      score:      true,
      startTime:  17,
      duration:   18.5 - 17,
      autoNext:   'RANDOM'
    },

    _imorgenkveld1: {
      msg:        'De skal på treningssenter <span class="audio-test-clue">jutro wieczorem</span>.',
      trans:      'Idą na siłowię jutro wieczorem.',
      answers: [
        { answer: 'i morgen kveld', next: '_imorgenkveld2' },
        { answer: 'i kveld', wrong: true },
        { answer: 'om kvelden', wrong: true },
        { answer: 'i morgen tidlig', wrong: true }
      ]
    },
    _imorgenkveld2: {
      msg:        'De skal på treningssenter i morgen kveld.',
      trans:      'Idą na siłowię jutro wieczorem.',
      score:      true,
      startTime:  20,
      duration:   23 - 20,
      autoNext:   'RANDOM'
    },

    _omettermiddagen1: {
      msg:        'Jeg vil løpe <span class="audio-test-clue">popołudniami</span>.',
      trans:      'Chcę biegać popołudniami.',
      answers: [
        { answer: 'om ettermiddagen', next: '_omettermiddagen2' },
        { answer: 'om formiddagen', wrong: true },
        { answer: 'i ettermiddag', wrong: true },
        { answer: 'i formiddag', wrong: true }
      ]
    },
    _omettermiddagen2: {
      msg:        'Jeg vil løpe om ettermiddagen.',
      trans:      'Chcę biegać popołudniami.',
      score:      true,
      startTime:  24,
      duration:   26 - 24,
      autoNext:   'RANDOM'
    },

    _iettermiddag1: {
      msg:        'Jeg går til frisøren <span class="audio-test-clue">dziś popołudniu</span>.',
      trans:      'Idę do fryzjera dziś popołudniu.',
      answers: [
        { answer: 'i ettermiddag', next: '_iettermiddag2' },
        { answer: 'i formiddag', wrong: true },
        { answer: 'om formiddagen', wrong: true },
        { answer: 'om ettermiddagen', wrong: true }
      ]
    },
    _iettermiddag2: {
      msg:        'Jeg går til frisøren i ettermiddag.',
      trans:      'Idę do fryzjera dziś popołudniu.',
      score:      true,
      startTime:  27,
      duration:   30 - 27,
      autoNext:   'RANDOM'
    },

    _omformiddagen1: {
      msg:        'Han lufter hunden <span class="audio-test-clue">przedpołudniami</span>.',
      trans:      'On wychodzi z psem przedpołudniami.',
      answers: [
        { answer: 'om formiddagen', next: '_omformiddagen2' },
        { answer: 'om ettermiddagen', wrong: true },
        { answer: 'i ettermiddag', wrong: true },
        { answer: 'i formiddag', wrong: true }
      ]
    },
    _omformiddagen2: {
      msg:        'Han lufter hunden om formiddagen.',
      trans:      'On wychodzi z psem przedpołudniami.',
      score:      true,
      startTime:  31,
      duration:   33.5 - 31,
      autoNext:   'RANDOM'
    },

    _omnatta1: {
      msg:        'Han kan ikke sove <span class="audio-test-clue">w nocy/nocami</span>.',
      trans:      'On nie może spać nocami.',
      answers: [
        { answer: 'om natta', next: '_omnatta2' },
        { answer: 'om kvelden', wrong: true },
        { answer: 'i natt', wrong: true },
        { answer: 'i kveld', wrong: true }
      ]
    },
    _omnatta2: {
      msg:        'Han kan ikke sove om natta.',
      trans:      'On nie może spać nocami.',
      score:      true,
      startTime:  35,
      duration:   37 - 35,
      autoNext:   'RANDOM'
    },

    inatt: {
      msg:        'Naboene fester <span class="audio-test-clue">dziś w nocy</span>.',
      trans:      'Sąsiedzi imprezują dziś w nocy.',
      answers: [
        { answer: 'i natt', next: '_inatt' },
        { answer: 'i kveld', wrong: true },
        { answer: 'om kvelden', wrong: true },
        { answer: 'om ettermiddagen', wrong: true }
      ]
    },
    inatt: {
      msg:        'Naboene fester i natt.',
      trans:      'Sąsiedzi imprezują dziś w nocy.',
      score:      true,
      startTime:  38,
      duration:   40 - 38,
      autoNext:   'RANDOM'
    },

    _omenstund1: {
      msg:        'Jeg kommer  <span class="audio-test-clue">za chwilę</span>.',
      trans:      'Przyjdę za chwilę.',
      answers: [
        { answer: 'om en stund', next: '_omenstund2' },
        { answer: 'i en stund', wrong: true },
        { answer: 'for en stund', wrong: true },
        { answer: 'en stund', wrong: true }
      ]
    },
    _omenstund2: {
      msg:        'Jeg kommer om en stund.',
      trans:      'Przyjdę za chwilę.',
      score:      true,
      startTime:  41,
      duration:   42.5 - 41,
      autoNext:   'RANDOM'
    },

    _na1: {
      msg:        'Jeg må stikke <span class="audio-test-clue">teraz</span>.',
      trans:      'Muszę teraz spadać.',
      answers: [
        { answer: 'nå', next: '_na2' },
        { answer: 'om en stund', wrong: true },
        { answer: 'om et øyeblikk', wrong: true },
        { answer: 'etterpå', wrong: true }
      ]
    },
    _na2: {
      msg:        'Jeg må stikke nå.',
      trans:      'Muszę teraz spadać.',
      score:      true,
      startTime:  44,
      duration:   45.5 - 44,
      autoNext:   'RANDOM'
    },

    _omentime1: {
      msg:        'Vi skal reise <span class="audio-test-clue">za godzinę</span>.',
      trans:      'Wyjeżdżamy za godzinę.',
      answers: [
        { answer: 'om en time', next: '_omentime2' },
        { answer: 'om en tid', wrong: true },
        { answer: 'i en time', wrong: true },
        { answer: 'timehvis', wrong: true }
      ]
    },
    _omentime2: {
      msg:        'Vi skal reise om en time.',
      trans:      'Wyjeżdżamy za godzinę.',
      score:      true,
      startTime:  47,
      duration:   49 - 47,
      autoNext:   'RANDOM'
    },

    _omettminutt1: {
      msg:        'Vi er på stedet <span class="audio-test-clue">za minutę</span>.',
      trans:      'Jesteśmy na miejscu za minutę.',
      answers: [
        { answer: 'om ett minutt', next: '_omettminutt2' },
        { answer: 'i et minutt', wrong: true },
        { answer: 'om noen minutter', wrong: true },
        { answer: 'på minutt', wrong: true }
      ]
    },
    _omettminutt2: {
      msg:        'Vi er på stedet om ett minutt.',
      trans:      'Jesteśmy na miejscu za minutę.',
      score:      true,
      startTime:  50,
      duration:   52 - 50,
      autoNext:   'RANDOM'
    },

    _omtredager1: {
      msg:        'Han slutter prosjektet <span class="audio-test-clue">za trzy dni</span>.',
      trans:      'On skończy projekt za trzy dni.',
      answers: [
        { answer: 'om tre dager', next: '_omtredager2' },
        { answer: 'i tre dager', wrong: true },
        { answer: 'om tre timer', wrong: true },
        { answer: 'på torsdag', wrong: true }
      ]
    },
    _omtredager2: {
      msg:        'Han slutter prosjektet om tre dager.',
      trans:      'On skończy projekt za trzy dni.',
      score:      true,
      startTime:  53,
      duration:   56 - 53,
      autoNext:   'RANDOM'
    },

    _omfemuker1: {
      msg:        'Jeg kommer tilbake til Norge <span class="audio-test-clue">za pięć tygodni</span>.',
      trans:      'Wracam do Norwegii za pięć tygodni.',
      answers: [
        { answer: 'om fem uker', next: '_omfemuker2' },
        { answer: 'om fem måneder', wrong: true },
        { answer: 'om ei uke', wrong: true },
        { answer: 'om to måneder', wrong: true }
      ]
    },
    _omfemuker2: {
      msg:        'Jeg kommer tilbake til Norge om fem uker.',
      trans:      'Wracam do Norwegii za pięć tygodni.',
      score:      true,
      startTime:  57,
      duration:   60 - 57,
      autoNext:   'RANDOM'
    },

    _omfireman1: {
      msg:        'Jeg åpner en ny butikk <span class="audio-test-clue">za cztery miesiące</span>.',
      trans:      'Otwieram nowy sklep za cztery miesiące.',
      answers: [
        { answer: 'om fire måneder', next: '_omfireman2' },
        { answer: 'om et halvt år', wrong: true },
        { answer: 'om fire uker', wrong: true },
        { answer: 'i fire måneder', wrong: true }
      ]
    },
    _omfireman2: {
      msg:        'Jeg åpner en ny butikk om fire måneder.',
      trans:      'Otwieram nowy sklep za cztery miesiące.',
      score:      true,
      startTime:  61,
      duration:   64 - 61,
      autoNext:   'RANDOM'
    },

    _omethalvtar1: {
      msg:        'Han vil slanke seg <span class="audio-test-clue">za pół roku</span>.',
      trans:      'On chce się odchudzić za pół roku.',
      answers: [
        { answer: 'om et halvt år', next: '_omethalvtar2' },
        { answer: 'om fem måneder', wrong: true },
        { answer: 'i seks måneder', wrong: true },
        { answer: 'om et år', wrong: true }
      ]
    },
    _omethalvtar2: {
      msg:        'Han vil slanke seg om et halvt år.',
      trans:      'On chce się odchudzić za pół roku.',
      score:      true,
      startTime:  65,
      duration:   67.5 - 65,
      autoNext:   'RANDOM'
    },

    _omnoenar1: {
      msg:        'Hun blir sjef her <span class="audio-test-clue">za kilka lat</span>.',
      trans:      'Ona zostanie tu szefem za kilka lat.',
      answers: [
        { answer: 'om noen år', next: '_omnoenar2' },
        { answer: 'i noen år', wrong: true },
        { answer: 'hvert år', wrong: true },
        { answer: 'neste år', wrong: true }
      ]
    },
    _omnoenar2: {
      msg:        'Hun blir sjef her om noen år.',
      trans:      'Ona zostanie tu szefem za kilka lat.',
      score:      true,
      startTime:  69,
      duration:   71 - 69,
      autoNext:   'RANDOM'
    },

    _nextar1: {
      msg:        'De gifter seg <span class="audio-test-clue">w przyszłym roku</span>.',
      trans:      'Ożenią się w przyszłym roku.',
      answers: [
        { answer: 'neste år', next: '_nextar2' },
        { answer: 'siste år', wrong: true },
        { answer: 'i år', wrong: true },
        { answer: 'om fem måneder', wrong: true }
      ]
    },
    _nextar2: {
      msg:        'De gifter seg neste år.',
      trans:      'Ożenią się w przyszłym roku.',
      score:      true,
      startTime:  72,
      duration:   74 - 72,
      autoNext:   'RANDOM'
    },

    nesteuke: {
      msg:        'Vi sees <span class="audio-test-clue">w przyszłym tygodniu</span>.',
      trans:      'Widzimy się w przyszłym tygodniu.',
      answers: [
        { answer: 'neste uke', next: '_nesteuke' },
        { answer: 'igjen', wrong: true },
        { answer: 'om ei uke', wrong: true },
        { answer: 'om sju dager', wrong: true }
      ]
    },
    nesteuke: {
      msg:        'Vi sees neste uke.',
      trans:      'Widzimy się w przyszłym tygodniu.',
      score:      true,
      startTime:  75,
      duration:   77 - 75,
      autoNext:   'RANDOM'
    },

/*    _nestemaned1: {
      msg: 'Jeg begynner et dansekurs <span class="audio-test-clue">w następnym/przyszłym miesiącu</span>.',
      answers: [
        { answer: 'neste måned', next: '_nestemaned2' },
        { answer: 'neste år', wrong: true },
        { answer: 'neste gang', wrong: true },
        { answer: 'om en måned', wrong: true }
      ]
    },
    _nestemaned2: {
      msg:        'Jeg begynner et dansekurs neste måned.',
      score:      true,
      startTime:  78,
      duration:   81 - 78,
      autoNext:   'RANDOM'
    },*/


    _nestegang1: {
      msg:        'De vil ikke ta opp lån <span class="audio-test-clue">następnym razem</span>.',
      trans:      'Nie chcą brać pożyczki następnym razem.',
      answers: [
        { answer: 'neste gang', next: '_nestegang2' },
        { answer: 'hver gang', wrong: true },
        { answer: 'om en stund', wrong: true },
        { answer: 'nesten gang', wrong: true }
      ]
    },
    _nestegang2: {
      msg:        'De vil ikke ta opp lån neste gang.',
      trans:      'Nie chcą brać pożyczki następnym razem.',
      score:      true,
      startTime:  82,
      duration:   84.5 - 82,
      autoNext:   'RANDOM'
    },


    _nytthverdag1: {
      msg:        'Jeg lærer noe nytt <span class="audio-test-clue">codziennie</span>.',
      trans:      'Uczę się czegoś nowego każdego dnia.',
      answers: [
        { answer: 'hver dag', next: '_nytthverdag2' },
        { answer: 'i dag', wrong: true },
        { answer: 'om en dag', wrong: true },
        { answer: 'hver andre dag', wrong: true }
      ]
    },
    _nytthverdag2: {
      msg:        'Jeg lærer noe nytt hver dag.',
      trans:      'Uczę się czegoś nowego każdego dnia.',
      score:      true,
      startTime:  86,
      duration:   88 - 86,
      autoNext:   'RANDOM'
    },


    _hvermorgen1: {
      msg:        'Jeg løper i parken <span class="audio-test-clue">każdego ranka</span>.',
      trans:      'Biegam w parku każdego ranka.',
      answers: [
        { answer: 'hver morgen', next: '_hvermorgen2' },
        { answer: 'i morgen', wrong: true },
        { answer: 'i morges', wrong: true },
        { answer: 'hver dag', wrong: true }
      ]
    },
    _hvermorgen2: {
      msg:        'Jeg løper i parken hver morgen.',
      trans:      'Biegam w parku każdego ranka.',
      score:      true,
      startTime:  89,
      duration:   91.5 - 89,
      autoNext:   'RANDOM'
    },

    _hvertime1: {
      msg:        'Jeg sjekker mobilen <span class="audio-test-clue">co godzinę</span>.',
      trans:      'Sprawdzam telefon co godzinę.',
      answers: [
        { answer: 'hver time', next: '_hvertime2' },
        { answer: 'i en time', wrong: true },
        { answer: 'på en time', wrong: true },
        { answer: 'hver gang', wrong: true }
      ]
    },
    _hvertime2: {
      msg:        'Jeg sjekker mobilen hver time.',
      trans:      'Sprawdzam telefon co godzinę.',
      score:      true,
      startTime:  93,
      duration:   95.5 - 93,
      autoNext:   'RANDOM'
    },

    _hveruke1: {
      msg:        'Hun ringer til foreldrene <span class="audio-test-clue">co tydzień</span>.',
      trans:      'Ona dzwoni do rodziców co tydzień.',
      answers: [
        { answer: 'hver uke', next: '_hveruke2' },
        { answer: 'hver søndag', wrong: true },
        { answer: 'om uka', wrong: true },
        { answer: 'mange ganger', wrong: true }
      ]
    },
    _hveruke2: {
      msg:        'Hun ringer til foreldrene hver uke.',
      trans:      'Ona dzwoni do rodziców co tydzień.',
      score:      true,
      startTime:  97,
      duration:   100 - 97,
      autoNext:   'RANDOM'
    },

    _annenhveruke1: {
      msg:        'Han jobber om morgenen <span class="audio-test-clue">co drugi tydzień</span>.',
      trans:      'On pracuje rankiem co drugi tydzień.',
      answers: [
        { answer: 'annenhver uke', next: '_annenhveruke2' },
        { answer: 'hver andre måned', wrong: true },
        { answer: 'hver uke', wrong: true },
        { answer: 'hver andre gang', wrong: true }
      ]
    },
    _annenhveruke2: {
      msg:        'Han jobber om morgenen annenhver uke.',
      trans:      'On pracuje rankiem co drugi tydzień.',
      score:      true,
      startTime:  101,
      duration:   104 - 101,
      autoNext:   'RANDOM'
    },

    _annenhvermaned1: {
      msg:        'Jeg flyr til Bergen <span class="audio-test-clue">co drugi miesiąc</span>.',
      trans:      'Latam do Bergen co drugi miesiąc.',
      answers: [
        { answer: 'annehver måned', next: '_annenhvermaned2' },
        { answer: 'hver andre uke', wrong: true },
        { answer: 'hver måned', wrong: true },
        { answer: 'annenhver uke', wrong: true }
      ]
    },
    _annenhvermaned2: {
      msg:        'Jeg flyr til Bergen annehver måned.',
      trans:      'Latam do Bergen co drugi miesiąc.',
      score:      true,
      startTime:  105,
      duration:   108 - 105,
      autoNext:   'RANDOM'
    },

    _hvergang1: {
      msg:        'Han kommer for sent <span class="audio-test-clue">za każdym razem</span>.',
      trans:      'On przychodzi spóźniony za każdym razem.',
      answers: [
        { answer: 'hver gang', next: '_hvergang2' },
        { answer: 'annenhver gang', wrong: true },
        { answer: 'hver time', wrong: true },
        { answer: 'timevis', wrong: true }
      ]
    },
    _hvergang2: {
      msg:        'Han kommer for sent hver gang.',
      trans:      'On przychodzi spóźniony za każdym razem.',
      score:      true,
      startTime:  109,
      duration:   111.5 - 109,
      autoNext:   'RANDOM'
    },

    _hvertar1: {
      msg:        'Dere betaler skatt <span class="audio-test-clue">każdego roku</span>.',
      trans:      'Płacicie podatek każdego roku.',
      answers: [
        { answer: 'hvert år', next: '_hvertar2' },
        { answer: 'hver andre år', wrong: true },
        { answer: 'aldri', wrong: true },
        { answer: 'hvis dere husker det', wrong: true }
      ]
    },
    _hvertar2: {
      msg:        'Dere betaler skatt hvert år.',
      trans:      'Płacicie podatek każdego roku.',
      score:      true,
      startTime:  113,
      duration:   115.5 - 113,
      autoNext:   'RANDOM'
    },

    _hversommer1: {
      msg:        'De besøker venner <span class="audio-test-clue">każdego lata</span>.',
      trans:      'Odwiedzają przyjaciół każdego lata.',
      answers: [
        { answer: 'hver sommer', next: '_hversommer2' },
        { answer: 'hver vinter', wrong: true },
        { answer: 'hver måned', wrong: true },
        { answer: 'hver vår', wrong: true }
      ]
    },
    _hversommer2: {
      msg:        'De besøker venner hver sommer.',
      trans:      'Odwiedzają przyjaciół każdego lata.',
      score:      true,
      startTime:  117,
      duration:   119.5 - 117,
      autoNext:   'RANDOM'
    },

    _hvervinter1: {
      msg:        'De reiser til Spania <span class="audio-test-clue">każdej zimy</span>.',
      trans:      'Jeżdżą do Hiszpani każdej zimy.',
      answers: [
        { answer: 'hver vinter', next: '_hvervinter2' },
        { answer: 'om vinteren', wrong: true },
        { answer: 'i helga', wrong: true },
        { answer: 'hver ferie', wrong: true }
      ]
    },
    _hvervinter2: {
      msg:        'De reiser til Spania hver vinter.',
      trans:      'Jeżdżą do Hiszpani każdej zimy.',
      score:      true,
      startTime:  121,
      duration:   123.5 - 121,
      autoNext:   'RANDOM'
    },

    _ihost1: {
      msg:        'Det regner ikke <span class="audio-test-clue">tej jesieni</span>.',
      trans:      'Nie pada tej jesieni.',
      answers: [
        { answer: 'i høst', next: '_ihost2' },
        { answer: 'siste høst', wrong: true },
        { answer: 'om høsten', wrong: true },
        { answer: 'hver høst', wrong: true }
      ]
    },
    _ihost2: {
      msg:        'Det regner ikke i høst.',
      trans:      'Nie pada tej jesieni.',
      score:      true,
      startTime:  125,
      duration:   126.5 - 125,
      autoNext:   'RANDOM'
    },

    _ivar1: {
      msg:        'De bytter dørklokka <span class="audio-test-clue">tej wiosny</span>.',
      trans:      'Zmieniają zamek tej wiosny.',
      answers: [
        { answer: 'i vår', next: '_ivar2' },
        { answer: 'hver vår', wrong: true },
        { answer: 'hver andre høst', wrong: true },
        { answer: 'hver høst', wrong: true }
      ]
    },
    _ivar2: {
      msg:        'De bytter dørklokka i vår.',
      trans:      'Zmieniają zamek tej wiosny.',
      score:      true,
      startTime:  128,
      duration:   130 - 128,
      autoNext:   'RANDOM'
    },

    _itoar1: {
      msg:        'Vi skal bo i Ålesund <span class="audio-test-clue">przez dwa lata</span>.',
      trans:      'Będziemy mieszkali w Ålesund przez dwa lata.',
      answers: [
        { answer: 'i to år', next: '_itoar2' },
        { answer: 'om to år', wrong: true },
        { answer: 'for to år siden', wrong: true },
        { answer: 'for to år', wrong: true }
      ]
    },
    _itoar2: {
      msg:        'Vi skal bo i Ålesund i to år.',
      trans:      'Będziemy mieszkali w ',
      score:      true,
      startTime:  131,
      duration:   134 - 131,
      autoNext:   'RANDOM'
    },

    _iovermorgen1: {
      msg:        'De leverer skapene <span class="audio-test-clue">pojutrze</span>.',
      trans:      'Dostarczą szafki pojutrze.',
      answers: [
        { answer: 'i overmorgen', next: '_iovermorgen2' },
        { answer: 'om noen dager', wrong: true },
        { answer: 'på tirsdag', wrong: true },
        { answer: 'i morgen', wrong: true }
      ]
    },
    _iovermorgen2: {
      msg:        'De leverer skapene i overmorgen.',
      trans:      'Dostarczą szafki pojutrze.',
      score:      true,
      startTime:  135,
      duration:   137 - 135,
      autoNext:   'RANDOM'
    },

    _ihelga1: {
      msg:        'Jeg drar med familien på hytta <span class="audio-test-clue">w weekend</span>.',
      trans:      'Jadę z rodzinę do hytty w weekend.',
      answers: [
        { answer: 'i helga', next: '_ihelga2' },
        { answer: 'på fredag', wrong: true },
        { answer: 'på lørdag', wrong: true },
        { answer: 'hver helg', wrong: true }
      ]
    },
    _ihelga2: {
      msg:        'Jeg drar med familien på hytta i helga.',
      trans:      'Jadę z rodzinę do hytty w weekend.',
      score:      true,
      startTime:  138,
      duration:   140.5 - 138,
      autoNext:   'RANDOM'
    }

  };


  this.end = {

    _end1: {
      msg: 'END',
      startTime: 0,
      duration: 0 -  0,
    }

  };



}
</script>
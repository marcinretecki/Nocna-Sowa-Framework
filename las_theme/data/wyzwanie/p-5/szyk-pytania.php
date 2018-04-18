<script>
function LasData() {

  this.category = 'setninger';   // chat|audio-test|etc


  this.testNotes = [
    'maskonur dodac zdjecie w nagrodę, https://thenounproject.com/search/?q=puffin',
    '(http://forskning.no/biologi-planteverden-okologi/2008/04/verdens-eldste-tre-lever-i-sverige)',
    '(ikona puchar)',
    '(ikona lodów)',
    '(foto padle)',
    'ikona maliny',
  ];


  this.intro = {
    _aintro1: {
      msg:        'Ułóż pytania z podanych słów.',
      autoNext:   'ENDINTRO'
    }
  };

  //
  //  Main
  //
  this.chat = {


    _ab1: {
      set: [
                  ['hvor', 'finner', 'jeg', 'en grønnsaksbutikk', 'i', 'nærheten', '?', ],
      ],
      trans:      'Gdzie znajdę sklep z warzywami w pobliżu?',
      autoNext:   'RANDOM',
    },


    _ac1: {
      set: [
                  ['hvor', 'gammel', 'er', 'sønnen', 'din', '?', ],
      ],
      trans:      'Ile lat ma Twój syn?',
      autoNext:   'RANDOM',
    },


    _ad1: {
      set: [
                  ['hvor', 'mange', 'timer', 'arbeider', 'du', 'per', 'dag', '?', ],
      ],
      trans:      'Ile godzin pracujesz dziennie?',
      autoNext:   'RANDOM',
    },


    _ae1: {
      set: [
                  ['hvor', 'er', 'nøklene', 'til', 'leiligheten', '?', ],
      ],
      trans:      'Gdzie są klucze do mieszkania?',
      autoNext:   'RANDOM',
    },


    _ag1: {
      set: [
                  ['hvor', 'er', 'prøverommet', '?', ],
      ],
      trans:      'Gdzie jest przymierzalnia?',
      autoNext:   'RANDOM',
    },


    _ah1: {
      set: [
                  ['hva', 'synes', 'du', 'om', 'norske', 'filmer', '?', ],
      ],
      trans:      'Co myślisz o norweskich filmach?',
      autoNext:   'RANDOM',
    },


    _aj1: {
      set: [
                  ['hvor', 'mye', 'koster', 'bensin', 'i', 'dag', '?', ],
      ],
      trans:      'Ile dziś kosztuje benzyna?',
      autoNext:   'RANDOM',
    },


    _ak1: {
      set: [
                  ['hva', 'er', 'klokka', '?', ],
      ],
      trans:      'Która jest godzina?',
      autoNext:   'RANDOM',
    },


    _al1: {
      set: [
                  ['hva', 'sier', 'du', '?', ],
      ],
      trans:      'Co mówisz?',
      autoNext:   'RANDOM',
    },


    _am1: {
      set: [
                  ['hva', 'skal', 'vi', 'gjøre', 'etterpå', '?', ],
      ],
      trans:      'Co będziemy robić później?',
      autoNext:   'RANDOM',
    },


    _an1: {
      set: [
                  ['hvordan', 'går', 'det', 'med', 'dere', '?', ],
      ],
      trans:      'Jak się macie?',
      autoNext:   'RANDOM',
    },


    _ao1: {
      set: [
                  ['hvordan', 'smaker', 'brunost', 'med', 'syltetøy', '?', ],
      ],
      trans:      'Jak smakuje brązowy ser z dżemem?',
      autoNext:   'RANDOM',
    },


    _at1: {
      set: [
                  ['hvem', 'hjelper', 'deg', 'med', 'jobben', '?', ],
      ],
      trans:      'Kto Ci pomaga w pracy?',
      autoNext:   'RANDOM',
    },


    _au1: {
      set: [
                  ['hvilken', 'radio', 'liker', 'du', 'best', '?', ],
      ],
      trans:      'Które radio lubisz najbardziej?',
      autoNext:   'RANDOM',
    },


    _av1: {
      set: [
                  ['hvilken', 'farge', 'er', 'skjorta di', '?', ],
      ],
      trans:      'Jakiego koloru jest Twoja koszula?',
      autoNext:   'RANDOM',
    },


    _aw1: {
      set: [
                  ['hvilket', 'språk', 'liker', 'du', 'best', '?', ],
      ],
      trans:      'Jaki język lubisz najbardziej?',
      autoNext:   'RANDOM',
    },


    _ax1: {
      set: [
                  ['hvilke', 'land', 'skal', 'du', 'besøke', '?', ],
      ],
      trans:      'Jakie kraje zamierzasz odwiedzić?',
      autoNext:   'RANDOM',
    },


    _ay1: {
      set: [
                  ['Når', 'skal', 'du', 'reise', 'til', 'Canada', '?', ],
      ],
      trans:      'Kiedy planujesz jechać do Kanady?',
      autoNext:   'RANDOM',
    },


    _bb1: {
      set: [
                  ['Når', 'begynner', 'du', 'jobben', '?', ],
      ],
      trans:      'Kiedy zaczynasz pracę?',
      autoNext:   'RANDOM',
    },


    _bc1: {
      set: [
                  ['Når', 'slutter', 'du', 'treningen', '?', ],
      ],
      trans:      'Kiedy kończysz trening?',
      autoNext:   'RANDOM',
    },


    _bd1: {
      set: [
                  ['Når', 'kan', 'vi', 'møtes', '?', ],
      ],
      trans:      'Kiedy możemy się spotkać?',
      autoNext:   'RANDOM',
    },

  };

  //
  //  Extra
  //
  this.extra = {


    _az1: {
      set: [
                  ['Når', 'står', 'du', 'opp', '?', ],
      ],
      trans:      'Kiedy wstajesz?',
      autoNext:   'RANDOM',
    },


    _aq1: {
      set: [
                  ['hvordan', 'er', 'været', 'i', 'dag', '?', ],
      ],
      trans:      'Jaka jest dziś pogoda?',
      autoNext:   'RANDOM',
    },


    _ap1: {
      set: [
                  ['hvordan', 'ser', 'Lunde', 'ut', '?', ],
      ],
      trans:      'Jak wygląda Lunde?',
      autoNext:   'RANDOM',
    },


    _as1: {
      set: [
                  ['hvem', 'kan', 'reparere', 'sykkelen min', '?', ],
      ],
      trans:      'Kto może naprawić mój rower?',
      autoNext:   'RANDOM',
    },


    _ba1: {
      set: [
                  ['Når', 'pleier', 'du', 'å', 'legge', 'deg', '?', ],
      ],
      trans:      'Kiedy zazwyczaj się kładziesz?',
      autoNext:   'RANDOM',
    },


    _af1: {
      set: [
                  ['hvor', 'mange', 'gjester', 'kommer', 'det', 'i',  'kveld', '?', ],
      ],
      trans:      'Jak wielu gości przyjdzie dziś wieczorem?',
      autoNext:   'RANDOM',
    },


    _ai1: {
      set: [
                  ['hva', 'liker', 'du', 'best:', 'å padle', 'eller', 'seile', '?', ],
      ],
      trans:      'Co lubisz najbardziej: pływać kajakiem czy żeglować?',
      autoNext:   'RANDOM',
    },

    _be1: {
      set: [
                  ['Når', 'blir', 'vi', 'på', 'stedet', '?', ],
      ],
      trans:      'Kiedy będziemy na miejscu?',
      autoNext:   'RANDOM',
    },


    _bf1: {
      set: [
                  ['Når', 'åpner', 'de', 'restauranten', '?', ],
      ],
      trans:      'Kiedy otwierają restaurację?',
      autoNext:   'RANDOM',
    },


    _bg1: {
      set: [
                  ['hvilket', 'vær', 'er', 'det', 'hos', 'deg', 'i', 'dag', '?', ],
      ],
      trans:      'Jaka pogoda jest dziś u Ciebie?',
      autoNext:   'RANDOM',
    },


    _bh1: {
      set: [
                  ['hvilke', 'bær', 'liker', 'du', 'å', 'spise', '?', ],
      ],
      trans:      'Jakie jagody lubisz jeść?',
      autoNext:   'RANDOM',
    },


    _bi1: {
      set: [
                  ['hvilket', 'tre', 'er', 'det', 'eldste', '?', ],
      ],
      trans:      'Które drzewo jest najstarsze?',
      autoNext:   'RANDOM',
    },


    _bj1: {
      set: [
                  ['hvem', 'vil', 'vinne', 'konkurransen', '?', ],
      ],
      trans:      'Kto wygra zawody?',
      autoNext:   'RANDOM',
    },


    _bk1: {
      set: [
                  ['hvem', 'vil', 'spise', 'softis', '?', ],
      ],
      trans:      'Kto chce zjeść lody włoskie?',
      autoNext:   'RANDOM',
    },


    _bl1: {
      set: [
                  ['hvem', 'sitter', 'på', 'stranda', '?', ],
      ],
      trans:      'Kto siedzi na plaży?',
      autoNext:   'RANDOM',
    },


    _bm1: {
      set: [
                  ['hvordan', 'kan', 'man', 'beregne', 'skatten', '?', ],
      ],
      trans:      'Jak można obliczyć podatek?',
      autoNext:   'RANDOM',
    },


    _bn1: {
      set: [
                  ['hvordan', 'kan', 'jeg', 'melde', 'flytting', 'på', 'posten', '?', ],
      ],
      trans:      'Jak mogę zgłosić przeprowadzkę na poczcie?',
      autoNext:   'RANDOM',
    },


    _bo1: {
      set: [
                  ['hvordan', 'kan', 'jeg', 'slå', 'av', 'alarmen', '?', ],
      ],
      trans:      'Jak mogę wyłączyć alarm?',
      autoNext:   'RANDOM',
    },


    _bp1: {
      set: [
                  ['hvorfor', 'er', 'butikkene', 'stengt', 'på', 'søndag', '?', ],
      ],
      trans:      'Dlaczego sklepy są zamknięte w niedzielę?',
      autoNext:   'RANDOM',
    },


    _bq1: {
      set: [
                  ['hvorfor', 'kan', 'vi', 'ikke', 'sove', 'i', 'teltet', '?', ],
      ],
      trans:      'Dlaczego nie możemy spać w namiocie?',
      autoNext:   'RANDOM',
    },


    _br1: {
      set: [
                  ['hvorfor', 'leier', 'vi', 'ikke', 'en', 'båt', '?', ],
      ],
      trans:      'Dlaczego nie wynajmiemy łodzi?',
      autoNext:   'RANDOM',
    },


    _bs1: {
      set: [
                  ['hvorfor', 'fester', 'studentene', 'så', 'mye', '?', ],
      ],
      trans:      'Dlaczego studenci imprezują tak dużo?',
      autoNext:   'RANDOM',
    },




  };



}
</script>
<script>
function LasData() {

  this.category = 'setninger';   // chat|audio-test|etc


  this.testNotes = [
    'https://www.google.no/search?q=Strand%C3%A5tind&client=firefox-b&biw=1440&bih=794&tbm=isch&tbo=u&source=univ&sa=X&ved=0ahUKEwjkgOK295LVAhUCJpoKHRweBlIQsAQILA',
    'http://nordlandturselskap.no/opplevelser/guidet-tur-strandatind/',
    'https://no.wikipedia.org/wiki/Panteordning_for_flasker ikona butelki i opis jak to dziala. kiedy kupujesz butelkę lub puszkę płacisz kaucję. mozesz ją odzyskac wrzucajac pustą butelkę do maszyny. wyciagasz lappen i idziesz do kasy, gdzie odzyskasz kwote.'
  ];


  this.intro = {
    _a1: {
      msg:        'Ułóż zdania z podanych słów.',
      autoNext:   'ENDINTRO'
    }
  };

  //
  //  Main
  //
  this.chat = {

    _aa1: {
      set: [
                  [ 'Mathias', 'vil', 'også', 'bli', 'ballettdanser' ],
      ],
      trans:      'Mathias chce także zostać tancerzem baletowym.',
      autoNext:   'RANDOM',
    },


    _ac1: {
      set: [
                  [ 'vi', 'er', 'ofte', 'forsinket' ],
      ],
      trans:      'Często się spóźniamy.',
      autoNext:   'RANDOM',
    },


    _ad1: {
      set: [
                  [ 'Emilie', 'lufter', 'ofte', 'hunden' ],
      ],
      trans:      'Emilie często wychodzi na spacer z psem.',
      autoNext:   'RANDOM',
    },


    _ae1: {
      set: [
                  [ 'de', 'trenger', 'ikke', 'å', 'kjøpe', 'nye soveposer' ],
      ],
      trans:      'Oni nie muszą kupić nowych śpiworów.',
      autoNext:   'RANDOM',
    },


    _af1: {
      set: [
                  [ 'jeg', 'er', 'ikke', 'herfra' ],
      ],
      trans:      'Nie jestem stąd.',
      autoNext:   'RANDOM',
    },


    _ag1: {
      set: [
                  [ 'det', 'går', 'ikke', 'så', 'bra' ],
      ],
      trans:      'Nie idzie tak dobrze.',
      autoNext:   'RANDOM',
    },


    _ai1: {
      set: [
                  [ 'Elias', 'vil', 'gjerne', 'hjelpe', 'henne' ],
      ],
      trans:      'Elias chętnie jej pomoże.',
      autoNext:   'RANDOM',
    },


    _al1: {
      set: [
                  [ 'vi', 'får', 'kanskje', 'ekstra', 'penger' ],
      ],
      trans:      'Dostaniemy może dodatkowe pieniądze.',
      autoNext:   'RANDOM',
    },


    _am1: {
      set: [
                  [ 'de', 'snakker', 'sikkert', 'norsk', 'hjemme' ],
      ],
      trans:      'Oni rozmawiają pewnie po norwesku w domu.',
      autoNext:   'RANDOM',
    },


    _ao1: {
      set: [
                  [ 'jeg', 'har', 'virkelig', 'mye', 'å', 'gjøre' ],
      ],
      trans:      'Mam naprawdę dużo do zrobienia.',
      autoNext:   'RANDOM',
    },


    _aq1: {
      set: [
                  [ 'vi', 'må', 'dessverre', 'komme', 'tilbake' ],
      ],
      trans:      'Muszę niestety wracać.',
      autoNext:   'RANDOM',
    },


    _ar1: {
      set: [
                  [ 'ryggproblemer', 'gjelder', 'dessverre', 'mange' ],
      ],
      trans:      'Problemy z kręgosłupem dotyczą niestety wielu.',
      autoNext:   'RANDOM',
    },


    _as1: {
      set: [
                  [ 'Knut', 'har', 'sannsynligvis', 'hodepine', 'igjen' ],
      ],
      trans:      'Knut ma prawdopodobnie ból głowy znowu.',
      autoNext:   'RANDOM',
    },


    _au1: {
      set: [
                  [ 'barnet', 'er', 'heldigvis', 'friskt' ],
      ],
      trans:      'Dziecko jest na szczęśćie zdrowe.',
      autoNext:   'RANDOM',
    },


    _aw1: {
      set: [
                  [ 'jeg', 'tenker', 'alltid', 'positivt' ],
      ],
      trans:      'Zawsze myślę pozytywnie.',
      autoNext:   'RANDOM',
    },


    _ax1: {
      set: [
                  [ 'han', 'har', 'alltid', 'mye', 'å', 'si' ],
      ],
      trans:      'On ma zawsze dużo do powiedzenia.',
      autoNext:   'RANDOM',
    },


    _az1: {
      set: [
                  [ 'jeg', 'blir', 'aldri', 'prest' ],
      ],
      trans:      'Nigdy nie będę kapłanem.',
      autoNext:   'RANDOM',
    },


    _bb1: {
      set: [
                  [ 'jeg', 'er', 'sjelden', 'nervøs' ],
      ],
      trans:      'Rzadko jestem zdenerwowany.',
      autoNext:   'RANDOM',
    },


    _bd1: {
      set: [
                  [ 'sultne', 'mennesker', 'kjøper', 'vanligvis', 'mer enn de trenger' ],
      ],
      trans:      'Głodni ludzie kupują zazwyczaj więcej niż potrzebują.',
      autoNext:   'RANDOM',
    },


    _bf1: {
      set: [
                  [ 'jeg', 'prøver', 'jo', 'å', 'snakke', 'norsk' ],
      ],
      trans:      'Przecież próbuję rozmawiać po norwesku.',
      autoNext:   'RANDOM',
    },


    _bh1: {
      set: [
                  [ 'det', 'er', 'faktisk', 'litt', 'vanskelig' ],
      ],
      trans:      'To jest faktycznie trochę trudne.',
      autoNext:   'RANDOM',
    },




  };

  //
  //  Extra
  //
  this.extra = {




    _an1: {
      set: [
                  [ 'Markus', 'spiser', 'sikkert', 'alt' ],
      ],
      trans:      'Markus zje na pewno wszystko.',
      autoNext:   'RANDOM',
    },


    _bc1: {
      set: [
                  [ 'han', 'er', 'sjelden', 'med', 'kona' ],
      ],
      trans:      'On jest rzadko z żoną.',
      autoNext:   'RANDOM',
    },


    _ap1: {
      set: [
                  [ 'jeg', 'vil', 'virkelig', 'lære', 'norsk' ],
      ],
      trans:      'Ja naprawdę chcę się nauczyć norweskiego.',
      autoNext:   'RANDOM',
    },


    _ah1: {
      set: [
                  [ 'Isak', 'kjenner', 'ikke', 'byen' ],
      ],
      trans:      'Isak nie zna miasta.',
      autoNext:   'RANDOM',
    },


    _ay1: {
      set: [
                  [ 'treningen', 'er', 'alltid', 'tung' ],
      ],
      trans:      'Trening jest zawsze ciężki.',
      autoNext:   'RANDOM',
    },



    _be1: {
      set: [
                  [ 'marius', 'har', 'vanligvis', 'ei', 'regnjakke', 'i', 'ryggsekken' ],
      ],
      trans:      'Marius ma zazwyczaj kurtkę przeciwdeszczową w plecaku.',
      autoNext:   'RANDOM',
    },

    _bg1: {
      set: [
                  [ 'vi', 'kan', 'jo', 'finne', 'på', 'noe', 'annet' ],
      ],
      trans:      'Możemy przecież wymyślić coś innego.',
      autoNext:   'RANDOM',
    },


    _bi1: {
      set: [
                  [ 'du', 'kan', 'faktisk', 'si', 'det', 'sånt' ],
      ],
      trans:      'Możesz faktycznie tak to powiedzieć.',
      autoNext:   'RANDOM',
    },

    _bj1: {
      set: [
                  [ 'hun', 'kjører', 'ofte', 'til', 'Stavanger' ],
      ],
      trans:      'Ona jeździ często do Stavanger.',
      autoNext:   'RANDOM',
    },


    _bk1: {
      set: [
                  [ 'han', 'vil', 'gjerne', 'spille', 'piano' ],
      ],
      trans:      'On chętnie gra na pianinie.',
      autoNext:   'RANDOM',
    },


    _bl1: {
      set: [
                  [ 'Alexander', 'snakker', 'kanskje', 'svensk' ],
      ],
      trans:      'Alexander mówi może po szwedzku.',
      autoNext:   'RANDOM',
    },


    _bm1: {
      set: [
                  [ 'det', 'er', 'virkelig', 'en', 'god', 'idé' ],
      ],
      trans:      'To jest naprawdę dobry pomysł.',
      autoNext:   'RANDOM',
    },


    _bn1: {
      set: [
                  [ 'jeg', 'leser', 'aldri', 'alle', 'bøkene' ],
      ],
      trans:      'Nigdy nie przeczytam wszystkich książek.',
      autoNext:   'RANDOM',
    },


    _bo1: {
      set: [
                  [ 'biene', 'er', 'jo', 'viktige', 'til', 'livet' ],
      ],
      trans:      'Pszczoły są przecież ważne dla życia.',
      autoNext:   'RANDOM',
    },


    _bp1: {
      set: [
                  [ 'Ingrid', 'skal', 'også', 'komme' ],
      ],
      trans:      'Ingri też planuje przyjść.',
      autoNext:   'RANDOM',
    },


    _bq1: {
      set: [
                  [ 'de', 'liker', 'ikke', 'å', 'prøve', 'klær' ],
      ],
      trans:      'One nie lubią przymierzać ubrań.',
      autoNext:   'RANDOM',
    },


    _br1: {
      set: [
                  [ 'de', 'svarer', 'sikkert', 'på', 'mandag' ],
      ],
      trans:      'Odpowiedzą pewnie w poniedziałek.',
      autoNext:   'RANDOM',
    },


    _bs1: {
      set: [
                  [ 'det', 'er', 'virkelig', 'viktig' ],
      ],
      trans:      'To jest naprawdę ważne.',
      autoNext:   'RANDOM',
    },


    _bt1: {
      set: [
                  [ 'jeg', 'kan', 'dessverre', 'ikke', 'gjøre', 'det' ],
      ],
      trans:      'Nie mogę niestety tego zrobić.',
      autoNext:   'RANDOM',
    },


    _bu1: {
      set: [
                  [ 'det', 'blir', 'sannsynligvis', 'en', 'kjent', 'bygning' ],
      ],
      trans:      'To będzie prawdopodobnie znany budynek.',
      autoNext:   'RANDOM',
    },


    _bv1: {
      set: [
                  [ 'kollegaene', 'fra', 'jobben', 'er', 'heldigvis', 'hyggelige' ],
      ],
      trans:      'Koledzy z pracy są na szczęście mili.',
      autoNext:   'RANDOM',
    },


    _bw1: {
      set: [
                  [ 'de', 'er', 'sjelden', 'hjemme', 'hele', 'dagen' ],
      ],
      trans:      'Oni rzadko są w domu cały dzień.',
      autoNext:   'RANDOM',
    },


    _bx1: {
      set: [
                  [ 'kniven', 'er', 'vanligvis', 'skarp' ],
      ],
      trans:      'Nóż jest zazwyczaj ostry.',
      autoNext:   'RANDOM',
    },


    _by1: {
      set: [
                  [ 'du', 'kan', 'jo', 'pante', 'tomflasker', 'i', 'butikken' ],
      ],
      trans:      'Możesz przecież zwrócić puste butelki w sklepie.',
      autoNext:   'RANDOM',
    },


    _bz1: {
      set: [
                  [ 'turistene', 'er', 'faktisk', 'i', 'alle', 'steder' ],
      ],
      trans:      'Turyści są faktycznie wszędzie.',
      autoNext:   'RANDOM',
    },





    _aj1: {
      set: [
                  [ 'jeg', 'kommer', 'gjerne', 'på', 'festen' ],
      ],
      trans:      'Chętnie przyjdę na imprezę.',
      autoNext:   'RANDOM',
    },


    _av1: {
      set: [
                  [ 'lærerne', 'vil', 'heldigvis', 'hjelpe', 'oss' ],
      ],
      trans:      'Nauczyciele chcą na szczęście nam pomóc.',
      autoNext:   'RANDOM',
    },


    _da1: {
      set: [
                  [ 'jeg', 'har', 'også', 'lyst', 'på', 'en kopp', 'te', ],
      ],
      trans:      'Ja też mam ochotę na kubek herbaty.',
      autoNext:   'RANDOM',
    },


  };


}
</script>
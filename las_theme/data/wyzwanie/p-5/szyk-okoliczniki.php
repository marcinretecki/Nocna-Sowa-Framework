<script>
function LasData() {

  this.category = 'setninger';   // chat|audio-test|etc


  this.testNotes = [
    'zdjęcie łódki i opis, że Norwegowie mówią duńska łódka na te wszystkie promy',
    'zdjęcie Hurtigruten i klimaciarski opis, że wpływa głeboko w fiordy, albo dalej na polnoc: Svalbard albo nawet Grenlandia i Islandia',
    'Oni rozmawiają po angielsku w domu. – to za krótkie'
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
                  [ 'jeg', 'er', 'jo', 'hjemme', 'nå', ],
      ],
      trans:      'Jestem przecież w domu teraz.',
      autoNext:   'RANDOM',
    },


    _ab1: {
      set: [
                  [ 'jeg', 'har', 'ofte', 'vondt', 'i', 'hodet' ],
      ],
      trans:      'Mam ból głowy.',
      autoNext:   'RANDOM',
    },


    _ad1: {
      set: [
                  [ 'barna', 'har', 'stor', 'lyst', 'på', 'brus', 'i', 'helga', ],
      ],
      trans:      'Dzieci mają dużą ochotę na napoje gazowane w weekend.',
      autoNext:   'RANDOM',
    },


    _ag1: {
      set: [
                  [ 'jeg', 'har', 'intervju', 'på', 'mandag', 'på', 'treningssenteret' ],
      ],
      trans:      'Mam rozmowę kwalifikacyjną w poniedziałek na siłowni.',
      autoNext:   'RANDOM',
    },


    _ah1: {
      set: [
                  [ 'vi', 'tar', 'kontakt', 'med', 'deg', 'i løpet av', 'to', 'uker', ],
      ],
      trans:      'Skontaktujemy się z tobą w ciągu dwóch tygodni.',
      autoNext:   'RANDOM',
    },


    _ai1: {
      set: [
                  [ 'jeg', 'ser', 'etter', 'dokumenter', 'på', 'kontoret', 'hele', 'dagen', ],
      ],
      trans:      'Szukam dokumentów w biurze cały dzień.',
      autoNext:   'RANDOM',
    },


    _aj1: {
      set: [
                  [ 'Yvonne', 'har', 'mange', 'venner', 'i', 'Lillestrøm', ],
      ],
      trans:      'Yvonne ma wielu przyjaciół w Lillestrøm.',
      autoNext:   'RANDOM',
    },


    _ak1: {
      set: [
                  [ 'det', 'er', 'mange', 'mennesker', 'ute', 'nå', ],
      ],
      trans:      'Jest wielu ludzi na dworze teraz.',
      autoNext:   'RANDOM',
    },


    _al1: {
      set: [
                  [ 'de', 'går', 'på', 'loppemarked', 'neste', 'måned', ],
      ],
      trans:      'Oni idą na pchli targ w przyszłym miesiącu.',
      autoNext:   'RANDOM',
    },


    _an1: {
      set: [
                  [ 'man', 'kan', 'finne', 'gode', 'apper', 'veldig', 'fort', 'på', 'nettet' ],
      ],
      trans:      'Można znaleźć dobre aplikacje bardzo szybko w internecie.',
      autoNext:   'RANDOM',
    },


    _ap1: {
      set: [
                  [ 'det', 'er', 'mange', 'barnehager', 'i', 'nærheten', 'for det er babyboom' ],
      ],
      trans:      'Jest wiele przedszkoli w pobliżu, bo jest wyż demograficzny.',
      autoNext:   'RANDOM',
    },


    _aq1: {
      set: [
                  [ 'de', 'spiser', 'kanelboller', 'hver', 'fredag', 'hos', 'Hansen' ],
      ],
      trans:      'Oni jedzą bułki z cynamonem w każdy piątek u Hansena.',
      autoNext:   'RANDOM',
    },


    _ar1: {
      set: [
                  [ 'det', 'er', 'så', 'pent', 'i', 'Tromsø', 'hver', 'gang', ],
      ],
      trans:      'Jest tak pięknie w Tromsø za każdym razem.',
      autoNext:   'RANDOM',
    },


    _as1: {
      set: [
                  [ 'de', 'kan', 'dessverre', 'ikke', 'snakke', 'saktere', ],
      ],
      trans:      'Oni niestety nie mogą mówić wolniej.',
      autoNext:   'RANDOM',
    },


    _at1: {
      set: [
                  [ 'Håkon', 'spiser', 'Kvikk Lunsj', 'med', 'glede', 'på', 'fjellet', ],
      ],
      trans:      'Håkon je Kvikk Lunsj z radością w górach.',
      autoNext:   'RANDOM',
    },


    _av1: {
      set: [
                  [ 'hurtigruten', 'drar', 'fra', 'Bergen', 'til', 'Kirkenes', 'på', '7', 'dager', ],
      ],
      trans:      'Hurtigruten płynie z Bergen do Kirkenes w ciągu 7 dni.',
      autoNext:   'RANDOM',
    },


    _ay1: {
      set: [
                  [ 'de', 'bruker', 'jo', 'tid', 'i', 'hagen', 'når været er bra', ],
      ],
      trans:      'Oni spędzają przecież czas w ogrodzie kiedy pogoda jest dobra.',
      autoNext:   'RANDOM',
    },


    _az1: {
      set: [
                  [ 'det', 'er', 'ganske', 'lett', 'å', 'finne', 'ei', 'hytte', 'ved', 'fjorden', 'når du er i Norge', ],
      ],
      trans:      'Jest całkiem łatwo znaleźć domek nad fiordem kiedy jesteś w Norwegii.',
      autoNext:   'RANDOM',
    },


    _ba1: {
      set: [
                  [ 'Brage', 'tar', 'mange bilder', 'på turer', 'på Hardangervidda', 'hver', 'dag', ],
      ],
      trans:      'Brage robi wiele zdjęć na wycieczkach na Hardangervidda codziennie.',
      autoNext:   'RANDOM',
    },


    _da1: {
      set: [
                  [ 'han', 'bor', 'sannsynligvis', 'i', 'Bodø', 'nå' ],
      ],
      trans:      'On mieszka prawdopodobnie w Bodø teraz.',
      autoNext:   'RANDOM',
    },


  };

  //
  //  Extra
  //
  this.extra = {




    _ax1: {
      set: [
                  [ 'skipturen', 'fra', 'Svalbard', 'til', 'Island', 'koster', '69 000', 'kroner', 'per', 'person', 'fordi alt er inkludert', ],
      ],
      trans:      'Wycieczka łodzią ze Svalbardu do Islandii kosztuje 69 000 kroner za osobę, ponieważ wszystko jest zapewnione.',
      autoNext:   'RANDOM',
    },



    _aw1: {
      set: [
                  [ 'Henrik Ibsens', 'dramaer', 'er', 'populære', 'over', 'hele', 'verden', 'nå', 'fordi de gjelder kvinnesaken', ],
      ],
      trans:      'Dramaty Henrika Ibsena są popularne na całym świecie teraz, ponieważ dotyczą spraw kobiet.',
      autoNext:   'RANDOM',
    },


    _au1: {
      set: [
                  [ 'danskebåten', 'kommer', 'fra', 'København', 'til', 'Oslo', 'hver', 'dag', 'klokka', '9:30', ],
      ],
      trans:      'Danskebåten przypływa z Kopenhagi do Oslo codziennie o 9:30.',
      autoNext:   'RANDOM',
    },


    _ea1: {
      set: [
                  [ 'stadig flere', 'mennesker', 'blir', 'avhengige', 'av', 'sosiale', 'medier', 'i våre dager' ],
      ],
      trans:      'Coraz więcej ludzi staje się uzależniona od mediów społecznościowych w dzisiejszych czasach.',
      autoNext:   'RANDOM',
    },


    _eb1: {
      set: [
                  [ 'det', 'er', 'buss', 'for', 'tog', 'neste', 'uke', 'fordi sporet er under oppgradering' ],
      ],
      trans:      'Będzie autobus zastępczy za pociąg w przyszłym tygodniu, ponieważ tor jest w trakcie modernizacji.',
      autoNext:   'RANDOM',
    },


    _ec1: {
      set: [
                  [ 'du', 'må', 'ta', 'neste', 'buss', 'om', 'tre', 'minutter', 'for den er ikke i trafikk' ],
      ],
      trans:      'Musisz wziąć następny autobus za 3 minuty, bo ten nie jest <q>w ruchu</q>.',
      autoNext:   'RANDOM',
    },


  };


}
</script>
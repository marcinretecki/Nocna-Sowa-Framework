<script>
function LasData() {

  this.category = 'audio-test';   // chat|setninger|etc
  this.maxEx = 10;


  //  answers = [
  //    { answer: '<i>', score: 'wrong', next: '', },
  //    { answer: '<i>', score: 'correct', next: '', },
  //    { answer: '<i>', score: 'partial', next: '', },
  //    { answer: '<i>', score: 'more', next: '', }
  //  ]


  this.testNotes = [
    'Man kan finne venner i alle steder – nie jestem pewny jak to przetłumaczyć',
    'Dette fine huset som ligger ved fossen – nie jestem pewny podmiotu',
  ];

  //  Albo answers
  //  albo autoNext
  //  ale nie oba na raz!
  //  msg jest dowolne
  //  more jest dowolne
  //  gdy nie startTime, mamy quiz
  //  answer jest poiminięte tylko w intro 1
  //  cmd + alt + n -> aa

  //  jeśli nie ma answers
  //  dodajemy score do bubble z msg


  this.intro = {
    _intro1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w las-icon-size-2"></i>.',
      autoNext:     '_intro2',
    },
    _intro2: {
      msg:          'Wskaż podmiot w zdaniu.',
      autoNext:     'ENDINTRO',
    },

  };


  //  main wyzwanie
  this.chat = {


    _aa1: {
      msg:      '<i>Jeg vil gi kongen et brev.</i>',
      trans:    'Chcę dać królowi list.',
      answers: [
        { answer: '<i>jeg</i>', score: 'correct', next: '_aa2' },
        { answer: '<i>kongen</i>', score: 'wrong' },
        { answer: '<i>et brev</i>', score: 'wrong' },
      ],
    },
    _aa2: {
      msg:      '<i><span class="mark mark--green">Jeg</span> vil gi kongen et brev.</i>',
      trans:    'Chcę dać królowi list.',
      autoNext: 'RANDOM',
    },


    _ab1: {
      msg:      '<i>Hele familien og naboene deres sitter på terrasser og griller.</i>',
      trans:    'Cała rodzina i ich sąsiedzi siedzą na tarasach i grilują.',
      answers: [
        { answer: '<i>hele familien og naboene deres</i>', score: 'correct', next: '_ab2' },
        { answer: '<i>naboene deres</i>', score: 'wrong' },
        { answer: '<i>hele familien</i>', score: 'wrong' },
      ],
    },
    _ab2: {
      msg:      '<i><span class="mark mark--green">Hele familien og naboene deres</span> sitter på terrasser og griller.</i>',
      trans:    'Cała rodzina i ich sąsiedzi siedzą na tarasach i grilują.',
      autoNext: 'RANDOM',
    },


    _ac1: {
      msg:      '<i>Middagen med besteforeldre er alltid klokka tre.</i>',
      trans:    'Obiad z dziadkami jest zawsze o godzinie trzeciej.',
      answers: [
        { answer: '<i>middagen med besteforeldre</i>', score: 'correct', next: '_ac2' },
        { answer: '<i>besteforeldre</i>', score: 'wrong' },
        { answer: '<i>middagen</i>', score: 'wrong' },
      ],
    },
    _ac2: {
      msg:      '<i><span class="mark mark--green">Middagen med besteforeldre</span> er alltid klokka tre.</i>',
      trans:    'Obiad z dziadkami jest zawsze o godzinie trzeciej.',
      autoNext: 'RANDOM',
    },


    _ad1: {
      msg:      '<i>Man kan finne venner i alle steder.</i>',
      trans:    'Można znaleźć przyjaciół we wszystkich miejscach.',
      answers: [
        { answer: '<i>man</i>', score: 'correct', next: '_ad2' },
        { answer: '<i>venner</i>', score: 'wrong' },
        { answer: '<i>alle steder</i>', score: 'wrong' },
      ],
    },
    _ad2: {
      msg:      '<i><span class="mark mark--green">Man</span> kan finne venner i alle steder.</i>',
      trans:    'Można znaleźć przyjaciół we wszystkich miejscach.',
      autoNext: 'RANDOM',
    },


    _ae1: {
      msg:      '<i>Man må trekke en kølapp og gå til skranken.</i>',
      trans:    'Trzeba wziąć numerek i pójść do okienka.',
      answers: [
        { answer: '<i>man</i>', score: 'correct', next: '_ae2' },
        { answer: '<i>skranken</i>', score: 'wrong' },
        { answer: '<i>en kølapp</i>', score: 'wrong' },
      ],
    },
    _ae2: {
      msg:      '<i><span class="mark mark--green">Man</span> må trekke en kølapp og gå til skranken.</i>',
      trans:    'Trzeba wziąć numerek i pójść do okienka.',
      autoNext: 'RANDOM',
    },


    _af1: {
      msg:      '<i>Det fine huset som ligger ved fossen er fra 30-tallet.</i>',
      trans:    'Ten świetny dom, który leży nad wodospadem jest z lat 30-tych.',
      answers: [
        { answer: '<i>dette fine huset som ligger ved fossen</i>', score: 'correct', next: '_af2' },
        { answer: '<i>huset</i>', score: 'wrong' },
        { answer: '<i>dette fine huset</i>', score: 'wrong' },
      ],
    },
    _af2: {
      msg:      '<i><span class="mark mark--green">Det fine huset som ligger ved fossen</span> er fra 30-tallet.</i>',
      trans:    'Ten świetny dom, który leży nad wodospadem jest z lat 30-tych.',
      autoNext: 'RANDOM',
    },


    _ag1: {
      msg:      '<i>Disse fine joggeskoene er på salg bare på mandag.</i>',
      trans:    'Te świetne buty do biegania są na wyprzedaży tylko w poniedziałek.',
      answers: [
        { answer: '<i>disse fine joggeskoene</i>', score: 'correct', next: '_ag2' },
        { answer: '<i>joggeskoene</i>', score: 'wrong' },
        { answer: '<i>disse</i>', score: 'wrong' },
      ],
    },
    _ag2: {
      msg:      '<i><span class="mark mark--green">Disse fine joggeskoene</span> er på salg bare på mandag.</i>',
      trans:    'Te świetne buty do biegania są na wyprzedaży tylko w poniedziałek.',
      autoNext: 'RANDOM',
    },


    _ah1: {
      msg:      '<i>Vi kan jo bruke engangsgrillen på turen.</i>',
      trans:    'Możemy przecież użyć jednorazowego grilla na wycieczce.',
      answers: [
        { answer: '<i>vi</i>', score: 'correct', next: '_ah2' },
        { answer: '<i>engangsgrillen</i>', score: 'wrong' },
        { answer: '<i>turen</i>', score: 'wrong' },
      ],
    },
    _ah2: {
      msg:      '<i><span class="mark mark--green">Vi</span> kan jo bruke engangsgrillen på turen.</i>',
      trans:    'Możemy przecież użyć jednorazowego grilla na wycieczce.',
      autoNext: 'RANDOM',
    },


    _ai1: {
      msg:      '<i>Det er et sofistikert kølappsystem på apoteket.</i>',
      trans:    'Jest wyszukany system kolejkowy w aptece.',
      answers: [
        { answer: '<i>det</i>', score: 'correct', next: '_ai2' },
        { answer: '<i>kølappsystem</i>', score: 'wrong' },
        { answer: '<i>apoteket</i>', score: 'wrong' },
      ],
    },
    _ai2: {
      msg:      '<i><span class="mark mark--green">Det</span> er et sofistikert kølappsystem på apoteket.</i>',
      trans:    'Jest wyszukany system kolejkowy w aptece.',
      autoNext: 'RANDOM',
    },


    _aj1: {
      msg:      '<i>Sander kommer med familien på besøk.</i>',
      trans:    'Sander przychodzi z rodziną w odwiedziny.',
      answers: [
        { answer: '<i>Sander</i>', score: 'correct', next: '_aj2' },
        { answer: '<i>familien</i>', score: 'wrong' },
        { answer: '<i>Sander med familien</i>', score: 'wrong' },
      ],
    },
    _aj2: {
      msg:      '<i><span class="mark mark--green">Sander</span> kommer med familien på besøk.</i>',
      trans:    'Sander przychodzi z rodziną w odwiedziny.',
      autoNext: 'RANDOM',
    },


    _ak1: {
      msg:      '<i>Arnulf og familien kommer på besøk.</i>',
      trans:    'Arnulf i rodzina przychodzą w odwiedziny.',
      answers: [
        { answer: '<i>Arnulf og familien</i>', score: 'correct', next: '_ak2' },
        { answer: '<i>familien</i>', score: 'wrong' },
        { answer: '<i>Arnulf</i>', score: 'wrong' },
      ],
    },
    _ak2: {
      msg:      '<i><span class="mark mark--green">Arnulf og familien</span> kommer på besøk.</i>',
      trans:    'Arnulf i rodzina przychodzą w odwiedziny.',
      autoNext: 'RANDOM',
    },


    _al1: {
      msg:      '<i>Elias, Tobias og Amalie med gjengen kommer hit.</i>',
      trans:    'Elias, Tobias i Amalie z ekipą idą tu.',
      answers: [
        { answer: '<i>Elias, Tobias og Amalie med gjengen</i>', score: 'correct', next: '_al2' },
        { answer: '<i>Elias, Tobias og Amalie</i>', score: 'wrong' },
        { answer: '<i>Elias</i>', score: 'wrong' },
      ],
    },
    _al2: {
      msg:      '<i><span class="mark mark--green">Elias, Tobias og Amalie med gjengen</span> kommer hit.</i>',
      trans:    'Elias, Tobias i Amalie z ekipą idą tu.',
      autoNext: 'RANDOM',
    },


    _am1: {
      msg:      '<i>Kamil prosjekterer alle fortauene, fortauskanter og trapper i bydelen.</i>',
      trans:    'Kamil projektuje wszystkie chodniki, krawężniki i schody w dzielnicy.',
      answers: [
        { answer: '<i>Kamil</i>', score: 'correct', next: '_am2' },
        { answer: '<i>alle fortauene, fortauskanter og trapper</i>', score: 'wrong' },
        { answer: '<i>bydelen</i>', score: 'wrong' },
      ],
    },
    _am2: {
      msg:      '<i><span class="mark mark--green">Kamil</span> prosjekterer alle fortauene, fortauskanter og trapper i bydelen.</i>',
      trans:    'Kamil projektuje wszystkie chodniki, krawężniki i schody w dzielnicy.',
      autoNext: 'RANDOM',
    },


    _an1: {
      msg:      '<i>Morten vil drikke femte kaffe på kantina i dag.</i>',
      trans:    'Morten chce wypić piątą kawę w kantynie dziś.',
      answers: [
        { answer: '<i>Morten</i>', score: 'correct', next: '_an2' },
        { answer: '<i>kaffe</i>', score: 'wrong' },
        { answer: '<i>kantina</i>', score: 'wrong' },
      ],
    },
    _an2: {
      msg:      '<i><span class="mark mark--green">Morten</span> vil drikke femte kaffe på kantina i dag.</i>',
      trans:    'Morten chce wypić piątą kawę w kantynie dziś.',
      autoNext: 'RANDOM',
    },


    _ao1: {
      msg:      '<i>De bygger Munchmuseet og Nationalgalleriet på nytt i 2017.</i>',
      trans:    'Budują Munch muzeum i Galerię Narodową na nowo w 2017 roku.',
      answers: [
        { answer: '<i>de</i>', score: 'correct', next: '_ao2' },
        { answer: '<i>Munchmuseet</i>', score: 'wrong' },
        { answer: '<i>Munchmuseet og Nationalgalleriet</i>', score: 'wrong' },
      ],
    },
    _ao2: {
      msg:      '<i><span class="mark mark--green">De</span> bygger Munchmuseet og Nationalgalleriet på nytt i 2017.</i>',
      trans:    'Budują Munch muzeum i Galerię Narodową na nowo w 2017 roku.',
      autoNext: 'RANDOM',
    },


    _ap1: {
      msg:      '<i>Det er nesten umulig å se nordlys om sommeren.</i>',
      trans:    'Jest prawie niemożliwe zobaczenie zorzy polarnej latem.',
      answers: [
        { answer: '<i>det</i>', score: 'correct', next: '_ap2' },
        { answer: '<i>nordlys</i>', score: 'wrong' },
        { answer: '<i>sommeren</i>', score: 'wrong' },
      ],
    },
    _ap2: {
      msg:      '<i><span class="mark mark--green">Det</span> er nesten umulig å se nordlys om sommeren.</i>',
      trans:    'Jest prawie niemożliwe zobaczenie zorzy polarnej latem.',
      autoNext: 'RANDOM',
    },


    _aq1: {
      msg:      '<i>Noen løper med hunder på Kolsåstoppen hver andre dag.</i>',
      trans:    'Niektórzy biegają z psami na szczyt Kolsås co drugi dzień.',
      answers: [
        { answer: '<i>noen</i>', score: 'correct', next: '_aq2' },
        { answer: '<i>løper</i>', score: 'wrong' },
        { answer: '<i>noen løper</i>', score: 'wrong' },
      ],
    },
    _aq2: {
      msg:      '<i><span class="mark mark--green">Noen</span> løper med hunder på Kolsåstoppen hver andre dag.</i>',
      trans:    'Niektórzy biegają z psami na szczyt Kolsås co drugi dzień.',
      autoNext: 'RANDOM',
    },


    _as1: {
      msg:      '<i>Man kan reise til nord for å se sjeldne arktiske blomster.</i>',
      trans:    'Można pojechać na północ, żeby zobaczyć rzadkie arktyczne kwiaty.',
      answers: [
        { answer: '<i>man</i>', score: 'correct', next: '_as2' },
        { answer: '<i>nord</i>', score: 'wrong' },
        { answer: '<i>arktiske blomster</i>', score: 'wrong' },
      ],
    },
    _as2: {
      msg:      '<i><span class="mark mark--green">Man</span> kan reise til nord for å se sjeldne arktiske blomster.</i>',
      trans:    'Można pojechać na północ, żeby zobaczyć rzadkie arktyczne kwiaty.',
      autoNext: 'RANDOM',
    },


    _at1: {
      msg:      '<i><span class="mark mark--green">Botaniskhagen ved universitetet</span> er ikke stor, men utrolig vakker.</i>',
      trans:    'Ogród botaniczny przy uniwersytecie nie jest duży, ale niezwykle ładny.',
      answers: [
        { answer: '<i>Botaniskhagen ved universitetet</i>', score: 'correct', next: '_at2' },
        { answer: '<i>Botaniskhagen</i>', score: 'wrong' },
        { answer: '<i>universitetet</i>', score: 'wrong' },
      ],
    },
    _at2: {
      msg:      '<i>Botaniskhagen ved universitetet er ikke stor, men utrolig vakker.</i>',
      trans:    'Ogród botaniczny przy uniwersytecie nie jest duży, ale niezwykle ładny.',
      autoNext: 'RANDOM',
    },


  };



}
</script>
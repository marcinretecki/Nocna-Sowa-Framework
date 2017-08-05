<script>
function LasData() {

  this.category = 'audio-test';   // chat|setninger|etc
  this.maxEx = 10;


  //  answers = [
  //    { answer: '', next: '', score: 'wrong' },
  //    { answer: '', next: '', score: 'correct' },
  //    { answer: '', next: '', score: 'partial' },
  //    { answer: '', next: '', score: 'more' }
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
      msg:      'Jeg vil gi kongen et brev.',
      trans:    'Chcę dać królowi list.',
      answers: [
        { answer: 'jeg', score: 'correct', next: '_aa2' },
        { answer: 'kongen', score: 'wrong' },
        { answer: 'et brev', score: 'wrong' },
      ],
    },
    _aa2: {
      msg:      '<span class="mark mark--green">Jeg</span> vil gi kongen et brev.',
      trans:    'Chcę dać królowi list.',
      autoNext: 'RANDOM',
    },


    _ab1: {
      msg:      'Hele familien og naboene deres sitter på terrasser og griller.',
      trans:    'Cała rodzina i ich sąsiedzi siedzą na tarasach i grilują.',
      answers: [
        { answer: 'hele familien og naboene deres', score: 'correct', next: '_ab2' },
        { answer: 'naboene deres', score: 'wrong' },
        { answer: 'hele familien', score: 'wrong' },
      ],
    },
    _ab2: {
      msg:      '<span class="mark mark--green">Hele familien og naboene deres</span> sitter på terrasser og griller.',
      trans:    'Cała rodzina i ich sąsiedzi siedzą na tarasach i grilują.',
      autoNext: 'RANDOM',
    },


    _ac1: {
      msg:      'Middagen med besteforeldre er alltid klokka tre.',
      trans:    'Obiad z dziadkami jest zawsze o godzinie trzeciej.',
      answers: [
        { answer: 'middagen med besteforeldre', score: 'correct', next: '_ac2' },
        { answer: 'besteforeldre', score: 'wrong' },
        { answer: 'middagen', score: 'wrong' },
      ],
    },
    _ac2: {
      msg:      '<span class="mark mark--green">Middagen med besteforeldre</span> er alltid klokka tre.',
      trans:    'Obiad z dziadkami jest zawsze o godzinie trzeciej.',
      autoNext: 'RANDOM',
    },


    _ad1: {
      msg:      'Man kan finne venner i alle steder.',
      trans:    'Można znaleźć przyjaciół we wszystkich miejscach.',
      answers: [
        { answer: 'man', score: 'correct', next: '_ad2' },
        { answer: 'venner', score: 'wrong' },
        { answer: 'alle steder', score: 'wrong' },
      ],
    },
    _ad2: {
      msg:      '<span class="mark mark--green">Man</span> kan finne venner i alle steder.',
      trans:    'Można znaleźć przyjaciół we wszystkich miejscach.',
      autoNext: 'RANDOM',
    },


    _ae1: {
      msg:      'Man må trekke en kølapp og gå til skranken.',
      trans:    'Trzeba wziąć numerek i pójść do okienka.',
      answers: [
        { answer: 'man', score: 'correct', next: '_ae2' },
        { answer: 'skranken', score: 'wrong' },
        { answer: 'en kølapp', score: 'wrong' },
      ],
    },
    _ae2: {
      msg:      '<span class="mark mark--green">Man</span> må trekke en kølapp og gå til skranken.',
      trans:    'Trzeba wziąć numerek i pójść do okienka.',
      autoNext: 'RANDOM',
    },


    _af1: {
      msg:      'Dette fine huset som ligger ved fossen er fra 30-tallet.',
      trans:    'Ten świetny dom, który leży nad wodospadem jest z lat 30-tych.',
      answers: [
        { answer: 'dette fine huset som ligger ved fossen', score: 'correct', next: '_af2' },
        { answer: 'huset', score: 'wrong' },
        { answer: 'dette fine huset', score: 'wrong' },
      ],
    },
    _af2: {
      msg:      '<span class="mark mark--green">Dette fine huset som ligger ved fossen</span> er fra 30-tallet.',
      trans:    'Ten świetny dom, który leży nad wodospadem jest z lat 30-tych.',
      autoNext: 'RANDOM',
    },


    _ag1: {
      msg:      'Disse fine joggeskoene er på salg bare på mandag.',
      trans:    'Te świetne buty do biegania są na wyprzedaży tylko w poniedziałek.',
      answers: [
        { answer: 'disse fine joggeskoene', score: 'correct', next: '_ag2' },
        { answer: 'joggeskoene', score: 'wrong' },
        { answer: 'disse', score: 'wrong' },
      ],
    },
    _ag2: {
      msg:      '<span class="mark mark--green">Disse fine joggeskoene</span> er på salg bare på mandag.',
      trans:    'Te świetne buty do biegania są na wyprzedaży tylko w poniedziałek.',
      autoNext: 'RANDOM',
    },


    _ah1: {
      msg:      'Vi kan jo bruke engangsgrillen på turen.',
      trans:    'Możemy przecież użyć jednorazowego grilla na wycieczce.',
      answers: [
        { answer: 'vi', score: 'correct', next: '_ah2' },
        { answer: 'engangsgrillen', score: 'wrong' },
        { answer: 'turen', score: 'wrong' },
      ],
    },
    _ah2: {
      msg:      '<span class="mark mark--green">Vi</span> kan jo bruke engangsgrillen på turen.',
      trans:    'Możemy przecież użyć jednorazowego grilla na wycieczce.',
      autoNext: 'RANDOM',
    },


    _ai1: {
      msg:      'Det er et sofistikert kølappsystem på apoteket.',
      trans:    'Jest wyszukany system kolejkowy w aptece.',
      answers: [
        { answer: 'det', score: 'correct', next: '_ai2' },
        { answer: 'kølappsystem', score: 'wrong' },
        { answer: 'apoteket', score: 'wrong' },
      ],
    },
    _ai2: {
      msg:      '<span class="mark mark--green">Det</span> er et sofistikert kølappsystem på apoteket.',
      trans:    'Jest wyszukany system kolejkowy w aptece.',
      autoNext: 'RANDOM',
    },


    _aj1: {
      msg:      'Sander kommer med familien på besøk.',
      trans:    'Sander przychodzi z rodziną w odwiedziny.',
      answers: [
        { answer: 'Sander', score: 'correct', next: '_aj2' },
        { answer: 'familien', score: 'wrong' },
        { answer: 'Sander med familien', score: 'wrong' },
      ],
    },
    _aj2: {
      msg:      '<span class="mark mark--green">Sander</span> kommer med familien på besøk.',
      trans:    'Sander przychodzi z rodziną w odwiedziny.',
      autoNext: 'RANDOM',
    },


    _ak1: {
      msg:      'Arnulf og familien kommer på besøk.',
      trans:    'Arnulf i rodzina przychodzą w odwiedziny.',
      answers: [
        { answer: 'Arnulf og familien', score: 'correct', next: '_ak2' },
        { answer: 'familien', score: 'wrong' },
        { answer: 'Arnulf', score: 'wrong' },
      ],
    },
    _ak2: {
      msg:      '<span class="mark mark--green">Arnulf og familien</span> kommer på besøk.',
      trans:    'Arnulf i rodzina przychodzą w odwiedziny.',
      autoNext: 'RANDOM',
    },


    _al1: {
      msg:      'Elias, Tobias og Amalie med gjengen kommer hit.',
      trans:    'Elias, Tobias i Amalie z ekipą idą tu.',
      answers: [
        { answer: 'Elias, Tobias og Amalie med gjengen', score: 'correct', next: '_al2' },
        { answer: 'Elias, Tobias og Amalie', score: 'wrong' },
        { answer: 'Elias', score: 'wrong' },
      ],
    },
    _al2: {
      msg:      '<span class="mark mark--green">Elias, Tobias og Amalie med gjengen</span> kommer hit.',
      trans:    'Elias, Tobias i Amalie z ekipą idą tu.',
      autoNext: 'RANDOM',
    },


    _am1: {
      msg:      'Kamil prosjekterer alle fortauene, fortauskanter og trapper i bydelen.',
      trans:    'Kamil projektuje wszystkie chodniki, krawężniki i schody w dzielnicy.',
      answers: [
        { answer: 'Kamil', score: 'correct', next: '_am2' },
        { answer: 'alle fortauene, fortauskanter og trapper', score: 'wrong' },
        { answer: 'bydelen', score: 'wrong' },
      ],
    },
    _am2: {
      msg:      '<span class="mark mark--green">Kamil</span> prosjekterer alle fortauene, fortauskanter og trapper i bydelen.',
      trans:    'Kamil projektuje wszystkie chodniki, krawężniki i schody w dzielnicy.',
      autoNext: 'RANDOM',
    },


    _an1: {
      msg:      'Morten vil drikke femte kaffe på kantina i dag.',
      trans:    'Morten chce wypić piątą kawę w kantynie dziś.',
      answers: [
        { answer: 'Morten', score: 'correct', next: '_an2' },
        { answer: 'kaffe', score: 'wrong' },
        { answer: 'kantina', score: 'wrong' },
      ],
    },
    _an2: {
      msg:      '<span class="mark mark--green">Morten</span> vil drikke femte kaffe på kantina i dag.',
      trans:    'Morten chce wypić piątą kawę w kantynie dziś.',
      autoNext: 'RANDOM',
    },


    _ao1: {
      msg:      'De bygger Munchmuseet og Nationalgalleriet på nytt i 2017.',
      trans:    'Budują Munch muzeum i Galerię Narodową na nowo w 2017 roku.',
      answers: [
        { answer: 'de', score: 'correct', next: '_ao2' },
        { answer: 'Munchmuseet', score: 'wrong' },
        { answer: 'Munchmuseet og Nationalgalleriet', score: 'wrong' },
      ],
    },
    _ao2: {
      msg:      '<span class="mark mark--green">De</span> bygger Munchmuseet og Nationalgalleriet på nytt i 2017.',
      trans:    'Budują Munch muzeum i Galerię Narodową na nowo w 2017 roku.',
      autoNext: 'RANDOM',
    },


    _ap1: {
      msg:      'Det er nesten umulig å se nordlys om sommeren.',
      trans:    'Jest prawie niemożliwe zobaczenie zorzy polarnej latem.',
      answers: [
        { answer: 'det', score: 'correct', next: '_ap2' },
        { answer: 'nordlys', score: 'wrong' },
        { answer: 'sommeren', score: 'wrong' },
      ],
    },
    _ap2: {
      msg:      '<span class="mark mark--green">Det</span> er nesten umulig å se nordlys om sommeren.',
      trans:    'Jest prawie niemożliwe zobaczenie zorzy polarnej latem.',
      autoNext: 'RANDOM',
    },


    _aq1: {
      msg:      'Noen løper med hunder på Kolsåstoppen hver andre dag.',
      trans:    'Niektórzy biegają z psami na szczyt Kolsås co drugi dzień.',
      answers: [
        { answer: 'noen', score: 'correct', next: '_aq2' },
        { answer: 'løper', score: 'wrong' },
        { answer: 'noen løper', score: 'wrong' },
      ],
    },
    _aq2: {
      msg:      '<span class="mark mark--green">Noen</span> løper med hunder på Kolsåstoppen hver andre dag.',
      trans:    'Niektórzy biegają z psami na szczyt Kolsås co drugi dzień.',
      autoNext: 'RANDOM',
    },


    _as1: {
      msg:      'Man kan reise til nord for å se sjeldne arktiske blomster.',
      trans:    'Można pojechać na północ, żeby zobaczyć rzadkie arktyczne kwiaty.',
      answers: [
        { answer: 'man', score: 'correct', next: '_as2' },
        { answer: 'nord', score: 'wrong' },
        { answer: 'arktiske blomster', score: 'wrong' },
      ],
    },
    _as2: {
      msg:      '<span class="mark mark--green">Man</span> kan reise til nord for å se sjeldne arktiske blomster.',
      trans:    'Można pojechać na północ, żeby zobaczyć rzadkie arktyczne kwiaty.',
      autoNext: 'RANDOM',
    },


    _at1: {
      msg:      '<span class="mark mark--green">Botaniskhagen ved universitetet</span> er ikke stor, men utrolig vakker.',
      trans:    'Ogród botaniczny przy uniwersytecie nie jest duży, ale niezwykle ładny.',
      answers: [
        { answer: 'Botaniskhagen ved universitetet', score: 'correct', next: '_at2' },
        { answer: 'Botaniskhagen', score: 'wrong' },
        { answer: 'universitetet', score: 'wrong' },
      ],
    },
    _at2: {
      msg:      'Botaniskhagen ved universitetet er ikke stor, men utrolig vakker.',
      trans:    'Ogród botaniczny przy uniwersytecie nie jest duży, ale niezwykle ładny.',
      autoNext: 'RANDOM',
    },


  };



}
</script>
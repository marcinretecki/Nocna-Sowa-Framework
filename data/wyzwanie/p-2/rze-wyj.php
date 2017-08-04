<script>
function LasData() {

  this.category = 'audio-test';   // chat|setninger|etc


  //  answers = [
  //    { answer: '', next: '', score: 'wrong' },
  //    { answer: '', next: '', score: 'correct' },
  //    { answer: '', next: '', score: 'partial' },
  //    { answer: '', next: '', score: 'more' }
  //  ]


  this.testNotes = [
    'W podstawowym zestawie są główienie słowa zgodne z zasadą z przewodnika.',
    'W extra są zupełnie nieregularne słowa.'
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
      msg:          'Załóż słuchawki, jeśli chcesz. #emoji-1f3a7;',
      autoNext:     '_a2'
    },
    _a2: {
      msg:          '<p class="leftened">Wybraliśmy dla Ciebie 30 często używanych rzeczowników, które odmieniają się nieregularnie. Wiemy, że nikt nie lubi uczyć się wyjątków, ale warto je opanować co najmniej z dwóch powodów:</p>' + '<ol class="leftened">' + '<li>będziesz ich często używać,</li>' + '<li>jeśli je zapamiętasz, to o wiele łatwiej opanujesz kolejne.</li>' + '</ol>' + '<p class="leftened">Szybko zauważysz, że będą odmieniały się zgodnie z pewnym schematem. My to nazywamy wyczuciem. Możesz je budować przez lata obcowania z językiem, albo poprzez zapamiętanie odpowiedniej bazy słów już na starcie. Później poznasz kolejne wyjątki, które będą pasowały do schematu i będą łatwe do zapamiętania.</p>',
      autoNext:     '_a3'
    },
    _a3: {
      msg:          '<p class="leftened">Jak opanować wyjątki?</p>' + '<p class="leftened">Najłatwiej uczyć się ich w odpowiedniej kolejności, po cztery, wypowiadając wszystkie na głos. Na początku możesz je tylko powtarzać, ale cel jest taki, żebyśmy mogli Cię przepytać.</p>' + '<p class="leftened">Rób to wyzwanie cierpliwie – aż wszystkie zapamiętasz i nabierzesz dobrego tempa. Przy pierwszym kontakcie może się to wydawać trochę trudne. To normalne. A! no i nie mów nam, że jesteś wzrokowcem, bo naprawdę chcemy nauczyć się szybciej. Wiemy, co robimy. To także ćwiczenie koncentracji, która naszym zdaniem jest jedną z najcenniejszych umiejętności w życiu.</p>' + '<p class="leftened">To co? Zacznijmy już.</p>',
      autoNext:     'ENDINTRO'
    }
  };


  this.chat = {


    _aa1: {
      spokenWord: 'Et barn to jedno dziecko. Jak odmienisz to słowo we wszystkich 4 formach?',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_aa2'
    },
    _aa2: {
      msg:        'et barn barnet barn barna',
      trans:      'dziecko',
      startTime:  0,
      duration:   2,
      more: {
        spokenWord: 'W liczbie mnogiej określonej najczęściej spotkasz się z barna, zamiast barnene. Obie są poprawne, jednak ta jest częściej używana w życiu. Np. na znakach drogowych: barna leker - dzieci się bawią',
        startTime: 0,
        duration:  4
      },
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _ac1: {
      spokenWord: 'Rower to … en sykkel. Jak będzie określony rower, rowery w liczbie mnogiej nieokreślonej i określonej?',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ac2'
    },
    _ac2: {
      msg:        'en sykkel sykkelen sykler syklene',
      trans:      'rower',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _ad1: {
      spokenWord: 'Jeden jakiś nauczyciel to: en lærer. Powiedz na głos pozostałe formy?',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ad2'
    },
    _ad2: {
      msg:        'en lærer læreren lærere lærerne',
      trans:      'nauczyciel',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _ae1: {
      spokenWord: 'Jak są po norwesku określone klucze? Nøklene. Ale czy pamiętasz całą odmianę słowa klucz?',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ae2'
    },
    _ae2: {
      msg:        'en nøkkel nøkkelen nøkler nøklene',
      trans:      'klucz',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _af1: {
      spokenWord: 'Palec to… en finger. Powiedz na głos pełną odmianę',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_af2'
    },
   _af: {
      msg:        'en finger fingeren fingre fingrene',
      trans:      'palec',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _ag1: {
      spokenWord: 'Sweter nieokreślony to: en genser. Powiedz na głos cztery formy.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ag2'
    },
    _ag2: {
      msg:        'en genser genseren gensere genserne',
      trans:      'sweter',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _ah1: {
      spokenWord: 'Buty nieokreślone to: sko. Tak jak napis na sklepach obuwniczych. Jak będzie jeden but i reszta odmiany?',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ah2'
    },
    _ah2: {
      msg:        'en sko skoen sko skoene',
      trans:      'but',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _ai1: {
      spokenWord: 'Matka, jedna określona to: mora. Ale na spotkaniach matek bywa ich więcej, więc pełna odmiana brzmi:',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ai2'
    },
    _ai2: {
      msg:        'ei mor mora mødre mødrene',
      trans:      'matka',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _aj1: {
      spokenWord: 'Jakiś ojciec, to: en far. Jak odmienisz to słowo?',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_aj2'
    },
    _aj2: {
      msg:        'en far faren fedre fedrene',
      trans:      'ojciec',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _ak1: {
      spokenWord: 'Jeg har to døtre. - znaczy mam dwie córki. Odmień zaczynając od ei datter.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ak2'
    },
    _ak2: {
      msg:        'ei datter dattera døtre døtrene',
      trans:      'córka',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _al1: {
      spokenWord: 'Miejsce to et sted. Umiesz je odmienić?',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_al2'
    },
    _al2: {
      msg:        'et sted stedet steder stedene',
      trans:      'miejsce',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _am1: {
      spokenWord: 'En mann oznacza mężczyzna lub mąż. Wszystko zależy od kontekstu. Odmień sam na głos.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_am2'
    },
   _am: {
      msg:        'en mann mannen menn mennene',
      trans:      'mężczyzna, mąż',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _an1: {
      spokenWord: 'En ting to rzecz. Przydatne słowo, więc odmień je na głos.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '__an2'
    },
    __an2: {
      msg:        'en ting tingen ting tingene',
      trans:      'rzecz',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _ao1: {
      spokenWord: 'Drzewo nieokreślone to: et tre. A co z określonym i liczbą mnogą? Odmień na głos.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ao2'
    },
    _ao2: {
      msg:        'et tre treet trær trærne',
      trans:      'drzewo',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _ar1: {
      spokenWord: 'Przykład to et eksempel. A pozostałe formy to:',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ar2'
    },
    _ar2: {
      msg:        'et eksempel eksempelet eksempler eksemplene',
      trans:      'przykład',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _as1: {
      spokenWord: 'Artykuł to en artikkel. Jak odmienisz to słowo?',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_as2'
    },
    _as2: {
      msg:        'en artikkel artikkelen artikler artiklene',
      trans:      'artykuł',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _at1: {
      spokenWord: 'Mięsień to en muskel. A we wszystkich formach:',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_at2'
    },
    _at2: {
      msg:        'en muskel muskelen muskler musklene',
      trans:      'mięsień',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _au1: {
      spokenWord: 'Koło albo okrąg to en sirkel. Odmień to słowo na głos.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_au2'
    },
    _au2: {
      msg:        'en sirkel sirkelen sirkler sirklene',
      trans:      'koło, okrąg',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _av1: {
      spokenWord: 'Niebo to en himmel. Jak w całości odmienisz to słowo?',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_av2'
    },
    _av2: {
      msg:        'en himmel himmelen himler himlene',
      trans:      'niebo',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _aw1: {
      spokenWord: 'Wiek, albo epoka to en alder. Stwórz pozostałe formy.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_aw2'
    },
    _aw2: {
      msg:        'en alder alderen aldere alderne',
      trans:      'wiek, epoka',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    }

  };



  this.extra = {

    _ax1: {
      spokenWord: 'Mandat po norwesku to ei bot. Jak odmienisz to słowo we wszystkich 4 formach?',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ax2'
    },
    _ax2: {
      msg:        'ei bot bota bøter bøtene',
      trans:      'mandat',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _ay1: {
      spokenWord: 'En parameter to jeden parametr. Jak stworzysz pozostałe formy?',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ay2'
    },
    _ay2: {
      msg:        'en parameter parameteren parametere parameterne',
      trans:      'parametr',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _az1: {
      spokenWord: 'Średnica po norwesku to en diameter. Stwórz pozostałe formy.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_az2'
    },
    _az2: {
      msg:        'en diameter diameteren diametere diameterne',
      trans:      'średnica',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _ba1: {
      spokenWord: 'Określone kolano to: kneet. Jak w całości odmienisz to słowo?',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ba2'
    },
    _ba2: {
      msg:        'et kne kneet knær knærne',
      trans:      'kolano',
      startTime:  0,
      duration:   2,
      score:      'correct',
      more: {
        spokenWord: 'Jeg har vondt i kneet. (Boli mnie kolano.) Har du vondt i knærne? (Czy bolą Cię kolana?)',
        startTime:  0,
        duration:   1.5,
      },
      autoNext:   'RANDOM'
    },



    _bb1: {
      spokenWord: 'Ei strand to plaża. Podaj wszystkie formy.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_bb2'
    },
    _bb2: {
      msg:        'ei strand stranda strender strendene',
      trans:      'plaża',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _ap1: {
      spokenWord: 'Ząb nieokreślony to: ei tann. Jak odmienisz to słowo?',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ap2'
    },
    _ap2: {
      msg:        'ei tann tanna tenner tennene',
      trans:      'ząb',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _bc1: {
      spokenWord: 'Siła to ei kraft. W liczbie mnogiej jest przegłos. Odmień: ei kraft.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_bc2'
    },
    _bc2: {
      msg:        'ei kraft krafta krefter kreftene',
      trans:      'siła',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _bd1: {
      spokenWord: 'Błąd to en feil. Podaj 4 formy.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_bd2'
    },
    _bd2: {
      msg:        'en feil feilen feil feilene',
      trans:      'błąd',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _be1: {
      spokenWord: 'Stopy nieokreślone to: føtter. Jak będzie jedna stopa? Odmień na głos.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_be2'
    },
    _be2: {
      msg:        'en fot foten føtter føttene',
      trans:      'stopa',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _bf1: {
      spokenWord: 'Jak jest jedna książka? Oczywiście: ei bok. Dobrze! Odmień teraz całosć',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_bf2'
    },
    _bf2: {

      msg:        'ei bok boka bøker bøkene',
      trans:      'książka',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },



    _aq1: {
      spokenWord: 'Ręcznik to et håndkle. Odmień to słowo na głos.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_aq2'
    },
    _aq2: {
      msg:        'et håndkle håndklet håndklær håndklærne',
      trans:      'ręcznik',
      startTime:  0,
      duration:   2,
      score:      'correct',
      more: {
        spokenWord: 'Często spotkasz się też ze słowem klær i klærne, które oznaczają ubrania. Nie mają one liczby pojedynczej.',
        startTime:  0,
        duration:   1.5,
      },
      autoNext:   'RANDOM'
    },



    _ab1: {
      spokenWord: 'Pamiętasz jak jest ręka po norwesku? Ei hånd. To powiedz jeszcze na głos pełną odmianę.',
      startTime:  0,
      duration:   2,
      pauseTime:  6,
      autoNext:   '_ab2'
    },
    _ab2: {
      msg:        'ei hånd hånda hender hendene',
      trans:      'ręka, dłoń',
      startTime:  0,
      duration:   2,
      score:      'correct',
      autoNext:   'RANDOM'
    },

  };

}
</script>
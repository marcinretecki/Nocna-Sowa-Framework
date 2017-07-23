<script>
function LasChatData() {

  this.testNotes = [
    'oczy mają druga odmianę, można by ją też podać'
  ];

  this.intro = {
    _a1: {
      bubbles: [
        '<i>Hallo, er det noen der?</i> (Czy ktoś tu jest?)',
        '<img src="/las/c/i/rze-wsz/HetvlijUZmKic.gif" />'
      ],
      answers: [
        { answer: 'jestem, jestem', next: '_a2' }
      ]
    },
    _a2: {
      bubbles: [
        '<i>Fint!</i> Przed nami sporo pracy.',
        'Mam zamiar zrobić z Ciebie mistrza odmiany rzeczownika. #emoji-1f3c6;',
        'Piszesz się na to? #emoji-1f58a;'
      ],
      answers: [
        { answer: 'z radością', next: '_a3' },
        { answer: 'mogę zaryzykować', next: '_a3' }
      ]

    },
    _a3: {
      bubbles: [
        'Mam dla Ciebie ponad 100 najpopularniejszych rzeczowników w języku norweskiem i chcę, żebyś je wszystkie dobrze znał i potrafił odmienić.'
      ],
      answers: [
        { answer: 'brzmi super, robimy!', next: '_a5' },
        { answer: 'skąd znasz najpopularniejsze???', next: '_a4' }
      ]
    },
    _a4: {
      bubbles: [
        'Z norweskich filmów. Proste. Przecież chcesz używać słów z życia, a nie nudnych czytanek?',
        '<img src="/las/c/i/rze-wsz/l41lUYJGipkMD3NPa.gif" />'
      ],
      answers: [
        { answer: 'no raczej', next: '_a5' }
      ]
    },
    _a5: {
      bubbles: [
        'OK. To ja będę Ci podawać słowa, a Ty wskazuj prawidłową formę.'
      ],
      autoNext: 'ENDINTRO'
    }

  };


  this.chat = {

    _bil1: {
      bubbles: [
        'Jak powiedzieć <q>samochody</q> #emoji-1f698; #emoji-1f696;, kiedy masz na myśli jakieś dowolne, nieokreślone?'
      ],
      answers: [
        { answer: '<i>bilen</i>', next: '_bil1b', wrong: true },
        { answer: '<i>biler</i>', next: '_bil2', correct: true }
      ]

    },
    _bil1b: {
      bubbles: [
        '<i>Bilen</i> to jeden określony samochód. Skąd wiedzieć, że dodajemy końcówkę <i>-en</i>?',
        '<i>en bil – bilen</i>',
        'W liczbie mnogiej dodajemy końcówkę <i>-er</i> lub <i>-ene</i>',
        'Dlatego <i>biler</i> (nieokreślone samochody), <i>bilene</i> (określone).'
      ],
      answers: [
        { answer: 'OK, <i>biler</i>', next: '_bil2' }
      ]
    },
    _bil2: {
      bubbles: [
        'Świetnie!',
        '<img src="/las/c/i/rze-wsz/AkKtWEPSyS9Pi.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _blikk1: {
      bubbles: [
        'Jak powiedzieć <q>murugnięcie okiem</q> albo <q>chwila</q>?'
      ],
      answers: [
        { answer: '<i>et øyeblikk</i>',  next: '_blikk2', correct: true },
        { answer: '<i>ei øyeblikk</i>',  next: '_blikk1b', wrong: true }
      ]

    },
    _blikk1b: {
      bubbles: [
        '<i>Øyeblikk</i> jest rodzaju <i>et</i>. Zapamiętasz?'
      ],
      answers: [
        { answer: 'zapamiętam', next: '_blikk2' }
      ]
    },
    _blikk2: {
      bubbles: [
        'Dobrze!',
        '<img src="/las/c/i/rze-wsz/tumblr_mpnbbcgkRO1rb324eo1_500.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _oye1: {
      bubbles: [
        '<q>Oczy</q> #emoji-1f441;#emoji-1f441; w formie określonej?'
      ],
      answers: [
        { answer: '<i>øyene</i>',  next: '_oye2', correct: true },
        { answer: '<i>øyet</i>',  next: '_oye1b', wrong: true }
      ]

    },
    _oye1b: {
      bubbles: [
        '<i>Øyet</i> to jedno określone oko. W liczbie mnogiej określonej dodajemy zawsze końcówkę <i>-ene</i>. Dlatego prawidłowo będzie...'
      ],
      answers: [
        { answer: '<i>øyene</i>', next: '_oye2' }
      ]
    },
    _oye2: {
      bubbles: [
        'Znowu dobrze!',
        '<img src="/las/c/i/rze-wsz/3ornk3noLGE88V6xFK.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _moro1: {
      bubbles: [
        'Jak jest <q>zabawa, rozrywka, przyjemność</q>?',
        'Przypominam, że jest to słowo niepoliczalne.'
      ],
      answers: [
        { answer: '<i>(ei) moro</i>', next: '_moro2', correct: true },
        { answer: '<i>moroer</i>', next: '_moro1b', wrong: true }
      ]

    },
    _moro1b: {
      bubbles: [
        'Końcówkę <i>-er</i> dodajemy w liczbie mnogiej, ale tylko do słów policzalnych. Rozrywki po norwesku nie można policzyć: jedna rozrywka, dwie rozrywki... nie pasuje. OK?'
      ],
      answers: [
        { answer: 'OK', next: '_moro2' }
      ]
    },
    _moro2: {
      bubbles: [
        'Yeah!',
        '<img src="/las/c/i/rze-wsz/yoJC2GnSClbPOkV0eA.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _gave1: {
      bubbles: [
        'A <q>prezenty</q>? Określone?'
      ],
      answers: [
        { answer: '<i>gavene</i>', next: '_gave2', correct: true },
        { answer: '<i>gaver</i>', next: '_gave1b', wrong: true }
      ]

    },
    _gave1b: {
      bubbles: [
        'W formie określonej liczby mnogiej zawsze jest końcówka <i>-ene</i>. Proste.'
      ],
      answers: [
        { answer: '<i>gavene</i>', next: '_2' }
      ]
    },
    _gave2: {
      bubbles: [
        '#emoji-1f44d-1f3fc; #emoji-1f381;'
      ],
      autoNext: 'RANDOM'
    },


    _idiot1: {
      bubbles: [
        'Jakie słowo przychodzi Ci do głowy, kiedy widzisz takiego gościa na Preikestolen?',
        '<img src="/las/c/i/rze-wsz/NdbmK4ndXLTs4-2.gif" />'
      ],
      answers: [
        { answer: '<i>Idioten!</i>', next: '_idiot2' },
        { answer: '<i>Jeg vil gifte ham!</i>', next: '_idiot1b' },
      ]

    },
    _idiot1b: {
      bubbles: [
        'Miało być jedno słowo. #emoji-1f609;'
      ],
      autoNext: '_idiot2'
    },
    _idiot2: {
      bubbles: [
        'W jakiej formie jest słowo <q>idioten</q>?'
      ],
      answers: [
        { answer: 'określonej pojedynczej', next: '_idiot3', correct: true },
        { answer: 'nieokreślonej pojedynczej', next: '_idiot2b', wrong: true }
      ]

    },
    _idiot2b: {
      bubbles: [
        'en idiot (jakiś idiota) – idioten (określony idiota)'
      ],
      answers: [
        { answer: 'OK', next: 'RANDOM' }
      ]
    },
    _idiot3: {
      bubbles: [
        '<i>Bra!</i>'
      ],
      autoNext: 'RANDOM'
    },


    _par1: {
      bubbles: [
        'Jak powiedzieć <q>para</q>? No wiesz, para butów <span class="no-break">#emoji-1f45e;#emoji-1f45e;</span> albo ludzi #emoji-1f46b;. Najprościej, <span class="no-break">w nieokreślonej</span> formie.'
      ],
      answers: [
        { answer: '<i>et par</i>', next: '_par2', correct: true },
        { answer: '<i>pæra</i>', next: '_par1b', wrong: true }
      ]

    },
    _par1b: {
      bubbles: [
        '<i>Pæra</i> to określona gruszka. #emoji-1f350;',
        'Więc?'
      ],
      answers: [
        { answer: 'OK, <i>et par</i>', next: '_par2' }
      ]
    },
    par2:{
      bubbles: [
        'To jak będzie określona <q>para</q>?'
      ],
      answers: [
        { answer: '<i>paret</i>', next: '_par3' },
        { answer: '<i>para</i>', next: '_par2b' }
      ]

    },
    _par2b: {
      bubbles: [
        'Zobacz:',
        '<i>et par – paret</i>',
        'Która to określona?'
      ],
      answers: [
        { answer: 'Ah, <i>paret</i>', next: '_par3' }
      ]
    },
    _par3: {
      bubbles: [
        '<i>Godt! Et par hamstere til deg!</i>',
        '<img src="/las/c/i/rze-wsz/tumblr_n5zo6bBwT71s96utdo1_400.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _fyr1: {
      bubbles: [
        'Określony <q>ogień</q> #emoji-1f525; to:'
      ],
      answers: [
        { answer: '<i>fyren</i>', next: '_fyr2', correct: true },
        { answer: '<i>fyr</i>', next: '_fyr1b', wrong: true }
      ]

    },
    _fyr1b: {
      bubbles: [
        '<i>(En) fyr</i> to forma nieokreślona. W nawiasie rodzajnik, żebyś pamiętał, że ogień jest niepoliczalny. Także określony ogień to:'
      ],
      answers: [
        { answer: '<i>fyren</i>', next: '_fyr2' }
      ]
    },
    _fyr2: {
      bubbles: [
        '#emoji-1f918-1f3fe;',
        '<img src="/las/c/i/rze-wsz/axn-cinemagraphs-11.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _enfyr1: {
      bubbles: [
        'Jak jest <q>facet</q>? Nie znasz gościa, dopiero wchodzi.'
      ],
      answers: [
        { answer: '<i>en fyr</i>', next: '_enfyr2', correct: true },
        { answer: '<i>karen</i>', next: '_enfyr1b', wrong: true }
      ]

    },
    _enfyr1b: {
      bubbles: [
        '<i>En kar</i> to jakiś facet, mężczyzna. Ale tu było <i>karen</i> – określony facet. Dlatego miało być...'
      ],
      answers: [
        { answer: '<i>en fyr</i>', next: '_enfyr2' }
      ]
    },
    _enfyr2: {
      bubbles: [
        '<i>Fantastisk!</i>',
        '<img src="/las/c/i/rze-wsz/lgVdC.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _dor1: {
      bubbles: [
        'Jak będą drzwi w liczbie mnogiej?'
      ],
      answers: [
        { answer: '<i>dører, dørene</i>', next: '_dor2', correct: true },
        { answer: '<i>døren, døra</i>', next: '_dor1b', wrong: true }
      ]

    },
    _dor1b: {
      bubbles: [
        'To była liczba pojedyncza. A w mnogiej?'
      ],
      answers: [
        { answer: 'OK, <i>dører, dørene</i>', next: '_dor2' }
      ]
    },
    _dor2: {
      bubbles: [
        '<i>Dørene åpnes!</i> #emoji-1f5dd;',
        '<img src="/las/c/i/rze-wsz/tumblr_me7xtozqYx1rjcfxro1_250.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _hund1: {
      bubbles: [
        '<q>Pies</q> #emoji-1f429; określony?'
      ],
      answers: [
        { answer: '<i>hunden</i>', next: '_hund2', correct: true },
        { answer: '<i>hunder</i>', next: '_hund1b', wrong: true }
      ]

    },
    _hund1b: {
      bubbles: [
        'Końcówka <i>-er</i> jest przecież w liczbie mnogiej. #emoji-1f609; Dlatego...'
      ],
      answers: [
        { answer: '<i>hunden</i>', next: '_hund2' }
      ]
    },
    _hund2: {
      bubbles: [
        '<i>Fint!</i>',
        '<img src="/las/c/i/rze-wsz/tumblr_m5h30bSsH91qelkf9o1_500.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _vann1: {
      bubbles: [
        '<q>Woda</q> okeślona, np. taka w basenie?'
      ],
      answers: [
        { answer: '<i>vannet</i>', next: '_vann2', correct: true },
        { answer: '<i>vannene</i>', next: '_vann1b', wrong: true }
      ]

    },
    _vann1b: {
      bubbles: [
        '<i>Vannene</i> to określone wody albo jeziora. Określona woda to...'
      ],
      answers: [
        { answer: 'Aha, <i>vannet</i>', next: '_vann2' }
      ]
    },
    _vann2: {
      bubbles: [
        'Dobrze Ci idzie!',
        '<img src="/las/c/i/rze-wsz/tumblr_n7n52ysAZ61r3gb3zo1_400.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _barn1: {
      bubbles: [
        'Jak są <q>dzieci</q> w liczbie mnogiej nieokreślonej?'
      ],
      answers: [
        { answer: '<i>barn</i>', next: '_barn2', correct: true },
        { answer: '<i>barna</i>', next: '_barn1b', wrong: true }
      ]

    },
    _barn1b: {
      bubbles: [
        'Barna to określone dzieci. Pełna odmiana wygląda tak:',
        '<i>et barn – barnet – barn – barna</i>',
        'Dlatego nieokreślone dzieci to...'
      ],
      answers: [
        { answer: '<i>barn</i>', next: '_barn2' }
      ]
    },
    _barn2: {
      bubbles: [
        'W nagrodę mały Azjata:',
        '<img src="/las/c/i/rze-wsz/3oEjHKtwp6WjUaJ0kM.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _syn1: {
      bubbles: [
        'Jak byś powiedział: <q>On ma syna.</q>?',
        '<i>Han har...</i>'
      ],
      answers: [
        { answer: '<i>en sønn</i>', next: '_syn2', correct: true },
        { answer: '<i>sønner</i>', next: '_syn1b', wrong: true }
      ]

    },
    _syn1b: {
      bubbles: [
        '<i>Sønner</i> to liczba mnoga. Więc...'
      ],
      answers: [
        { answer: '<i>en sønn</i>', next: '_syn2' }
      ]
    },
    _syn2: {
      bubbles: [
        'Wspaniale.',
        '<img src="/las/c/i/rze-wsz/tumblr-m25p9yiv4y1qgn0dyo1-250.gif" />',
        'A <q>córki</q>?'
      ],
      answers: [
        { answer: '<i>datter</i>', next: '_syn2b' },
        { answer: '<i>døtre</i>', next: '_syn3' }
      ]

    },
    _syn2b: {
      bubbles: [
        'Zobacz:',
        '<i>ei datter – dattera – døtre – døtrene</i>',
        'Jakieś córki to...'
      ],
      answers: [
        { answer: '<i>døtre</i>', next: '_syn3' }
      ]
    },
    _syn3: {
      bubbles: [
        'Zgadza się. <i>Han har søte døtre.</i>',
        '<img src="/las/c/i/rze-wsz/tumblr_mzwj71IIl51r6b6qeo1_500.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _mat1: {
      bubbles: [
        '<q>Jedzenie</q> określone? #emoji-1f373;#emoji-1f953;'
      ],
      answers: [
        { answer: '<i>mat</i>', next: '_mat1b', wrong: true },
        { answer: '<i>maten</i>', next: '_mat2', correct: true }
      ]

    },
    _mat1b: {
      bubbles: [
        'Pełna odmiana to: <i>(en) mat – maten</i>, bo jedzenie jest niepoliczalne. Określone to...'
      ],
      answers: [
        { answer: '<i>maten</i>', next: '_mat2' }
      ]
    },
    _mat2: {
      bubbles: [
        '<i>Takk for maten!</i>',
        '<img src="/las/c/i/rze-wsz/1IejF9MZ0ivG8.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _ben1: {
      bubbles: [
        '<q>Noga</q> określona?'
      ],
      answers: [
        { answer: '<i>bein</i>', next: '_ben1b', wrong: true },
        { answer: '<i>beinet</i>', next: '_ben2', correct: true }
      ]

    },
    _ben1b: {
      bubbles: [
        '<i>et bein – beinet – bein – beina</i>',
        'To jak? Zmieniasz odpowiedź?'
      ],
      answers: [
        { answer: '<i>beinet</i>', next: '_ben2' }
      ]
    },
    _ben2: {
      bubbles: [
        'Dobra decyzja. Ćwiczymy dalej.',
        '<img src="/las/c/i/rze-wsz/20bein.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _hand1: {
      bubbles: [
        '<q>Dłonie</q> nieokreślone?'
      ],
      answers: [
        { answer: '<i>hender</i>', next: '_hand2', correct: true },
        { answer: '<i>hendene</i>', next: '_hand1b', wrong: true }
      ]

    },
    _hand1b: {
      bubbles: [
        'Ach, bo to nieregularne słowo:','<i>ei hånd – hånda – hender – hendene</i>',
        'Nieokreślone dłonie to...'
      ],
      answers: [
        { answer: '<i>hender</i>', next: '_hand2' }
      ]
    },
    _hand2: {
      bubbles: [
        'Jak Ty to robisz?',
        '<img src="/las/c/i/rze-wsz/35hand.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _kaffe1: {
      bubbles: [
        'Jedna <q>kawa</q> nieokreślona? W domyśle jako kubek kawy.'
      ],
      answers: [
        { answer: '<i>en kaffe</i>', next: '_kaffe2', correct: true },
        { answer: '<i>en kafé</i>', next: '_kaffe1b', wrong: true }
      ]

    },
    _kaffe1b: {
      bubbles: [
        '<i>En kafé</i> to kawiarnia. Wymawiamy długo. Kawę za to krótko:'
      ],
      answers: [
        { answer: '<i>en kaffe</i>', next: '_kaffe2' }
      ]
    },
    _kaffe2: {
      bubbles: [
        'Ammm',
        '<img src="/las/c/i/rze-wsz/xT9DPJcpQqpR6icVCE.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _bok1: {
      bubbles: [
        '<q>Książki</q> nieokreślone?'
      ],
      answers: [
        { answer: '<i>boker</i>', next: '_bok1b', wrong: true },
        { answer: '<i>bøker</i>', next: '_bok2', correct: true }
      ]

    },
    _bok1b: {
      bubbles: [
        'Zobacz:',
        '<i>ei bok – boka – bøker – bøkene</i>'
      ],
      answers: [
        { answer: 'OK, <i>bøker</i>', next: '_bok2' }
      ]
    },
    _bok2: {
      bubbles: [
        '<i>Fint!</i>',
        '<img src="/las/c/i/rze-wsz/girl-reading-book-animation-16.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _spor1: {
      bubbles: [
        '<q>Tor</q> albo <q>ślad</q> nieokreślony to:'
      ],
      answers: [
        { answer: '<i>et spor</i>', next: '_spor2', correct: true },
        { answer: '<i>ei spor</i>', next: '_spor1b', wrong: true }
      ]

    },
    _spor1b: {
      bubbles: [
        '<i>Spor</i> jest rodzaju <i>et</i>. Więc?'
      ],
      answers: [
        { answer: '<i>et spor</i>', next: '_spor2' }
      ]
    },
    _spor2: {
      bubbles: [
        '<i>Greit</i>.',
        '<img src="/las/c/i/rze-wsz/lKi1jDjWCRNmM.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _kvinne1: {
      bubbles: [
        '<q>Kobieta</q>? Jakaś na ulicy, której nie znasz.'
      ],
      answers: [
        { answer: '<i>kvinna</i>', next: '_kvinne1b', wrong: true },
        { answer: '<i>ei kvinne</i>', next: '_kvinne2', correct: true }
      ]

    },
    _kvinne1b: {
      bubbles: [
        '<i>Kvinna</i> to określona kobieta.',
        '<i>ei kvinne – kvinna</i>',
        'Co proponujesz?'
      ],
      answers: [
        { answer: '<i>ei kvinne</i>', next: '_kvinne2' }
      ]
    },
    _kvinne2: {
      bubbles: [
        'OK',
        '<img src="/las/c/i/rze-wsz/7blow.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _venn1: {
      bubbles: [
        '<q>Przyjaciel</q> określony?'
      ],
      answers: [
        { answer: '<i>venner</i>', next: '_venn1b', wrong: true },
        { answer: '<i>vennen</i>', next: '_venn2', correct: true }
      ]

    },
    _venn1b: {
      bubbles: [
        'To słowo trzeba znać w każdej formie.',
        '<i>en venn – vennen – venner – vennene</i>',
        'A jeden określony to...'
      ],
      answers: [
        { answer: '<i>vennen</i>', next: '_venn2' }
      ]
    },
    _venn2: {
      bubbles: [
        '<i>Ja!</i>',
        '<img src="/las/c/i/rze-wsz/19skate.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _fly1: {
      bubbles: [
        '<q>Samoloty</q> nieokreślone? #emoji-1f6eb; #emoji-1f6ec;'
      ],
      answers: [
        { answer: '<i>fly</i>', next: '_fly2', correct: true },
        { answer: '<i>flyer</i>', next: '_fly1b', wrong: true }
      ]

    },
    _fly1b: {
      bubbles: [
        'Poznaj całość:',
        '<i>et fly – flyet – fly – flyene</i>',
        'Dlatego nieokreślone to...'
      ],
      answers: [
        { answer: '<i>fly</i>', next: '_fly2' }
      ]
    },
    _fly2: {
      bubbles: [
        '<i>Kjempebra!</i>',
        '<img src="/las/c/i/rze-wsz/32bird.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _tele1: {
      bubbles: [
        '<q>Telefony</q> określone? #emoji-1f4f1;#emoji-1f4f1;#emoji-1f4f1;'
      ],
      answers: [
        { answer: '<i>mobiler</i>', next: '_tele1b', wrong: true },
        { answer: '<i>telefonene</i>', next: '_tele2', correct: true }
      ]

    },
    _tele1b: {
      bubbles: [
        'Jedne i drugie to telefony, ale nieokreślone mają końcówkę <i>-er</i>, a określone <i>-ene</i>. Dlatego...'
      ],
      answers: [
        { answer: '<i>telefonene</i>', next: '_tele2' }
      ]
    },
    _tele2: {
      bubbles: [
        '<i>Bra!</i>',
        '<img src="/las/c/i/rze-wsz/ESpe7v3ZSleec.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _bror1: {
      bubbles: [
        '<q>Brat</q> #emoji-1f938; określony?'
      ],
      answers: [
        { answer: '<i>en bror</i>', next: '_bror1b', wrong: true },
        { answer: '<i>broren</i>', next: '_bror2', correct: true }
      ]

    },
    _bror1b: {
      bubbles: [
        'Rodzajnik z przodu oznacza jedną nieokreśloną sztukę czegoś lub kogoś. Dlatego określony brat to...'
      ],
      answers: [
        { answer: '<i>broren</i>', next: '_bror2' }
      ]
    },
    _bror2: {
      bubbles: [
        'Znów go zwinęli.',
        '<img src="/las/c/i/rze-wsz/17125c33392f0d050fe621fe04774793.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _lys1: {
      bubbles: [
        '<q>Światła</q> nieokreślone?'
      ],
      answers: [
        { answer: '<i>lys</i>', next: '_lys2', correct: true },
        { answer: '<i>lyset</i>', next: '_lys1b', wrong: true }
      ]

    },
    _lys1b: {
      bubbles: [
        '<i>Lyset</i> to określone światło. Przecież wiesz. W liczbie mnogiej nie dodajemy końcówki <i>-er</i>, bo <i>et lys</i> ma tylko jedną sylabę i jest rodzaju <i>et</i> #emoji-1f609;'
      ],
      answers: [
        { answer: 'OK, <i>lys</i>', next: '_lys2' }
      ]
    },
    _lys2: {
      bubbles: [
        '<i>Bra!</i>',
        '<img src="/las/c/i/rze-wsz/xlGYf1RUbYYes.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _onkel1: {
      bubbles: [
        '<q>Wujek</q> określony?'
      ],
      answers: [
        { answer: '<i>onkel</i>', next: '_onkel1b', wrong: true },
        { answer: '<i>onkelen</i>', next: '_onkel2', correct: true }
      ]

    },
    _onkel1b: {
      bubbles: [
        '<i>en onkel – onkelen – onkler – onklene</i>',
        'Zobacz, nie było do wyboru samego <i>onkel</i>. Musi być...'
      ],
      answers: [
        { answer: '<i>onkelen</i>', next: '_onkel2' }
      ]
    },
    _onkel2: {
      bubbles: [
        '<i>Supert!</i>',
        'Nie każdy ma takiego wujka.',
        '<img src="/las/c/i/rze-wsz/5sheet.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _kone1: {
      bubbles: [
        '<q>Żona</q> określona?'
      ],
      answers: [
        { answer: '<i>kone</i>', next: '_kone1b', wrong: true },
        { answer: '<i>kona</i>', next: '_kone2', correct: true }
      ]

    },
    _kone1b: {
      bubbles: [
        'To słowo warto znać, żeby uniknąć nieporozumień:',
        '<i>ei kone – kona – koner – konene</i>',
        'Ale ta jedna, wymarzona żona to...'
      ],
      answers: [
        { answer: '<i>kona</i>', next: '_kone2' }
      ]
    },
    _kone2: {
      bubbles: [
        'Tak jest!',
        '<img src="/las/c/i/rze-wsz/magda.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _kamp1: {
      bubbles: [
        'Określone <q>walki</q>, <q>bitwy</q> #emoji-2694; lub <q>mecze</q>?'
      ],
      answers: [
        { answer: '<i>kamp</i>', next: '_kamp1b', wrong: true },
        { answer: '<i>kampene</i>', next: '_kamp2', correct: true }
      ]

    },
    _kamp1b: {
      bubbles: [
        'Forma określona w liczbie mnogiej ma zawsze końcówkę <i>-ene</i>. Tak więc...'
      ],
      answers: [
        { answer: '<i>kampene</i>', next: '_kamp2' }
      ]
    },
    _kamp2: {
      bubbles: [
        'O tak!',
        '<img src="/las/c/i/rze-wsz/X60jpxh.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _dame1: {
      bubbles: [
        'Określone <q>kobiety</q>?'
      ],
      answers: [
        { answer: '<i>damer</i>', next: '_dame1b', wrong: true },
        { answer: '<i>kvinnene</i>', next: '_dame2', correct: true }
      ]

    },
    _dame1b: {
      bubbles: [
        '<i>Damer</i> to nieokreślone kobiety. Określone to <i>damene</i>, albo...'
      ],
      answers: [
        { answer: '<i>kvinnene</i>', next: '_dame2' }
      ]
    },
    _dame2: {
      bubbles: [
        'Świetnie!',
        '<img src="/las/c/i/rze-wsz/6288960204_23fcc5a01a_o.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _by1: {
      bubbles: [
        '<q>Miasto</q> nieokreślone?'
      ],
      answers: [
        { answer: '<i>et by</i>', next: '_by1b', wrong: true },
        { answer: '<i>en by</i>', next: '_by2', correct: true }
      ]

    },
    _by1b: {
      bubbles: [
        'Nie będę się sprzeczać, ale w słowniku jest <i>en by</i>. Zgoda?'
      ],
      answers: [
        { answer: 'no dobra, <i>en by</i>', next: '_by2' }
      ]
    },
    _by2: {
      bubbles: [
        '<i>Veldig bra!</i>',
        '<img src="/las/c/i/rze-wsz/newspaper-man-429.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _liv1: {
      bubbles: [
        '<q>Życie</q> określone?'
      ],
      answers: [
        { answer: '<i>livet</i>', next: '_liv2', correct: true },
        { answer: '<i>liva</i>', next: '_liv1b', wrong: true }
      ]

    },
    _liv1b: {
      bubbles: [
        '<i>et liv – livet – liv – livene</i> (el <i>liva</i>)',
        'Jednak w formie określonej pojedynczej jest tylko jedna opcja:'
      ],
      answers: [
        { answer: '<i>livet</i>', next: '_liv2' }
      ]
    },
    _liv2: {
      bubbles: [
        '<img src="/las/c/i/rze-wsz/7177997572_fdeaeb4463_o.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _film1: {
      bubbles: [
        'Jakiś <q>film</q> to:'
      ],
      answers: [
        { answer: '<i>en film</i>', next: '_film2', correct: true },
        { answer: '<i>en movie</i>', next: '_film1b', rong: true }
      ]

    },
    _film1b: {
      bubbles: [
        '#emoji-1f926-1f3fb;'
      ],
      answers: [
        { answer: '<i>en film</i>', next: '_film2' }
      ]
    },
    _film2: {
      bubbles: [
        '<i>Flott!</i> #emoji-1f4fd;#emoji-1f39e;'
      ],
      autoNext: 'RANDOM'
    },


    _vindu1: {
      bubbles: [
        'Jakieś <q>okno</q>?'
      ],
      answers: [
        { answer: '<i>et vindu</i>', next: '_vindu2', correct: true },
        { answer: '<i>en vindu</i>', next: '_vindu1b', wrong: true }
      ]

    },
    _vindu1b: {
      bubbles: [
        'Sorry, rodzajnik <i>et</i>. A w całości regularnie:',
        '<i>et vindu – vinduet – vinduer – vinduene</i>',
        'To jak było to określone okno?'
      ],
      answers: [
        { answer: '<i>vinduet</i>', next: '_vindu2' }
      ]
    },
    _vindu2: {
      bubbles: [
        '<i>Jøss!</i>',
        '<img src="/las/c/i/rze-wsz/cab-window-429.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _venn1: {
      bubbles: [
        '<q>Przyjaciele</q>?'
      ],
      answers: [
        { answer: '<i>friends</i>', next: '_venn1b', wrong: true },
        { answer: '<i>venner</i>', next: '_venn2', correct: true }
      ]

    },
    _venn1b: {
      bubbles: [
        'To nie ten serial. #emoji-1f609; W liczbie mnogiej przecież końcówka <i>-er</i> lub <i>-ene</i>. W nieokreślonej będzie...'
      ],
      answers: [
        { answer: '<i>venner</i>', next: '_venn2' }
      ]
    },
    _venn2: {
      bubbles: [
        '<i>Ja!</i>',
        '<img src="/las/c/i/rze-wsz/12UlfHpF05ielO.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _stol1: {
      bubbles: [
        'Nieokreślone <q>krzesła</q>?'
      ],
      answers: [
        { answer: '<i>bord</i>', next: '_stol1b' },
        { answer: '<i>stoler</i>', next: '_stol2' }
      ]

    },
    _stol1b: {
      bubbles: [
        '<i>Et bord</i> to stół.',
        'Krzesło to <i>en stol</i>. Więc?'
      ],
      answers: [
        { answer: '<i>stoler</i>', next: '_stol2' }
      ]
    },
    _stol2: {
      bubbles: [
        '<i>Bra!</i>',
        '<img src="/las/c/i/rze-wsz/tumblr_nt2vth7sTX1qef46ho1_500.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _tur1: {
      bubbles: [
        'Określone <q>wycieczki</q>?'
      ],
      answers: [
        { answer: '<i>tur</i>', next: '_tur1b', wrong: true },
        { answer: '<i>turene</i>', next: '_tur2', correct: true }
      ]

    },
    _tur1b: {
      bubbles: [
        '<i>en tur – turen – turer – turene</i>',
        'Co obstawiasz?'
      ],
      answers: [
        { answer: '<i>turene</i>', next: '_tur2' }
      ]
    },
    _tur2: {
      bubbles: [
        'Dobrze!',
        '<img src="/las/c/i/rze-wsz/rUlu713yOz2wM.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _baby1: {
      bubbles: [
        'Określone <q>niemowlę</q>?'
      ],
      answers: [
        { answer: '<i>babyen</i>', next: '_baby2', correct: true },
        { answer: '<i>baby</i>', next: '_baby1b', wrong: true }
      ]

    },
    _baby1b: {
      bubbles: [
        'Końcóweczka <i>-en</i> śmiało może być dodana. Tak się robi norweski. #emoji-1f609;'
      ],
      answers: [
        { answer: '<i>babyen</i>', next: '_baby2' }
      ]
    },
    _baby2: {
      bubbles: [
        '<img src="/las/c/i/rze-wsz/8BdOabytiFWk8.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _jente1: {
      bubbles: [
        'Jak będzie <q>dziewczyna</q> w formie nieokreślonej?'
      ],
      answers: [
        { answer: '<i>ei jenta</i>', next: '_jente1b', wrong: true },
        { answer: '<i>ei jente</i>', next: '_jente2', correct: true }
      ]

    },
    _jente1b: {
      bubbles: [
        'Mała podpowiedź: <i>ei jente – jenta</i>, więc będzie...'
      ],
      answers: [
        { answer: '<i>ei jente</i>', next: '_jente2' }
      ]
    },
    _jente2: {
      bubbles: [
        '<i>Lurt!</i>',
        '<img src="/las/c/i/rze-wsz/12hair.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _kontroll1: {
      bubbles: [
        '<q>Kontrola</q>, <q>sprawdzenie</q> #emoji-1f575; w nieokreślonej formie?'
      ],
      answers: [
        { answer: '<i>en kontroll</i>', next: '_kontroll2', correct: true },
        { answer: '<i>en kontrol</i>', next: '_kontroll1b', wrong: true }
      ]

    },
    _kontroll1b: {
      bubbles: [
        '<img src="/las/c/i/rze-wsz/bkKvvzE9PEcTK.gif" />',
        'Jednak przez dwa <q>ll</q>:',
        '<i>en kontroll – kontrollen – kontroller – kontrollene</i>'
      ],
      answers: [
        { answer: 'OK, <i>en kontroll</i>', next: '_kontroll2' }
      ]
    },
    _kontroll2: {
      bubbles: [
        'Dobrze.',
        'Masz siłę na dalszą walkę?'
      ],
      answers: [
        { answer: 'pewnie #emoji-1f4aa-1f3fc;', next: '_kontroll3' }
      ]
    },
    _kontroll3: {
      bubbles: [
        '<img src="/las/c/i/rze-wsz/26BRJ42FrwYMrKXV6.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _gutt1: {
      bubbles: [
        '<q>Chłopiec</q> #emoji-1f466-1f3fc; nieokreślony?'
      ],
      answers: [
        { answer: '<i>gutten</i>', next: '_gutt1b', wrong: true },
        { answer: '<i>en gutt</i>', next: '_gutt2', correct: true }
      ]

    },
    _gutt1b: {
      bubbles: [
        '<i>Gutten</i> to określony chłopak. Nieokreślony to ten z rodzajnikiem:'
      ],
      answers: [
        { answer: 'no tak, <i>en gutt</i>', next: '_gutt2' }
      ]
    },
    _gutt2: {
      bubbles: [
        '<i>High five!</i>',
        '<img src="/las/c/i/rze-wsz/tumblr_n6nl9svyjs1rc7zl1o1_400.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _baat1: {
      bubbles: [
        '<q>Łódka</q> #emoji-1f6a4; określona?'
      ],
      answers: [
        { answer: '<i>båten</i>', next: '_baat2', correct: true },
        { answer: '<i>båter</i>', next: '_baat1b', wrong: true }
      ]

    },
    _baat1b: {
      bubbles: [
        'Końcówka <i>-er</i> jest w liczbie mnogiej.',
        '<i>en båt – båten</i>'
      ],
      answers: [
        { answer: '<i>båten</i>', next: '_baat2' }
      ]
    },
    _baat2: {
      bubbles: [
        '<i>Yeah!</i>',
        '<img src="/las/c/i/rze-wsz/tumblr_m9nbokxIgu1r6g7k5o1_500.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _famielien1: {
      bubbles: [
        'Określona <q>rodzina</q>?'
      ],
      answers: [
        { answer: '<i>familien</i>', next: '_famielien2', correct: true },
        { answer: '<i>familia</i>', next: '_famielien1b', wrong: true }
      ]

    },
    _famielien1b: {
      bubbles: [
        '<i>en familie – familien – familier – familiene</i>',
        'Zatem jedna określona to...'
      ],
      answers: [
        { answer: '<i>familien</i>', next: '_famielien2' }
      ]
    },
    _famielien2: {
      bubbles: [
        'Jesteś niesamowity!',
        '<img src="/las/c/i/rze-wsz/YGJBp5EgyVP9K.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _netter1: {
      bubbles: [
        '<q>Noce</q> nieokreślone?'
      ],
      answers: [
        { answer: '<i>netter</i>', next: '_netter2', correct: true },
        { answer: '<i>nøtter</i>', next: '_netter1b', wrong: true }
      ]

    },
    _netter1b: {
      bubbles: [
        '<i>Nøtter</i> to orzeszki. Noc jest nieregularna, zobacz:',
        '<i>ei natt – natta – netter – nettene</i>',
        'Dlatego...'
      ],
      answers: [
        { answer: '<i>netter</i>', next: '_netter2' }
      ]
    },
    _netter2: {
      bubbles: [
        'Uff. Dobrze.',
        '<img src="/las/c/i/rze-wsz/tumblr_nhqepgKJqs1qef46ho1_500.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _kompis1: {
      bubbles: [
        '<q>Kumpel</q>, <q>kolega</q> nieokreślony?'
      ],
      answers: [
        { answer: '<i>en kompis</i>', next: '_kompis2', correct: true },
        { answer: '<i>kameraten</i>', next: '_kompis1b', wrong: true }
      ]

    },
    _kompis1b: {
      bubbles: [
        '<i>Kameraten</i> to określony kolega. Nieokreślony jest z rodzajnikiem:'
      ],
      answers: [
        { answer: '<i>en kompis</i>', next: '_kompis2' }
      ]
    },
    _kompis2: {
      bubbles: [
        'Świetnie! Bawimy się dalej.',
        '<img src="/las/c/i/rze-wsz/tumblr_myw0w7EBOA1t361sto1_400.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _laerer1: {
      bubbles: [
        '<q>Nauczyciel</q> określony?'
      ],
      answers: [
        { answer: '<i>læreren</i>', next: '_laerer2', correct: true },
        { answer: '<i>lærer</i>', next: '_laerer1b', wrong: true }
      ]

    },
    _laerer1b: {
      bubbles: [
        'Musi być z końcówką określoną. Dlatego...'
      ],
      answers: [
        { answer: '<i>læreren</i>', next: '_laerer2' }
      ]
    },
    _laerer2: {
      bubbles: [
        'Brawo!',
        '<img src="/las/c/i/rze-wsz/StQCmtZt4GvqE.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _politi1: {
      bubbles: [
        '<q>Policja</q> #emoji-1f694; #emoji-1f52b; określona to:'
      ],
      answers: [
        { answer: '<i>politi</i>', next: '_politi1b', wrong: true },
        { answer: '<i>politiet</i>', next: '_politi2', correct: true }
      ]

    },
    _politi1b: {
      bubbles: [
        'Musi być z końcówką odpowiednią dla rodzaju <i>et</i>, czyli...'
      ],
      answers: [
        { answer: '<i>politiet</i>', next: '_politi2' }
      ]
    },
    _politi2: {
      bubbles: [
        '<img src="/las/c/i/rze-wsz/NJXDSvnpx21.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _historie1: {
      bubbles: [
        '<q>Historia</q> nieokreślona?'
      ],
      answers: [
        { answer: '<i>ei historie</i>', next: '_historie2', correct: true },
        { answer: '<i>ei historia</i>', next: '_historie1b', wrong: true }
      ]

    },
    _historie1b: {
      bubbles: [
        '<i>Historia</i> to jedna, określona. W nieokreślonej będzie...'
      ],
      answers: [
        { answer: '<i>ei historie</i>', next: '_historie2' }
      ]
    },
    _historie2: {
      bubbles: [
        'Może tak być.',
        '<img src="/las/c/i/rze-wsz/EF4UWro.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _vinner1: {
      bubbles: [
        '<q>Zwycięzca</q> #emoji-1f3c5; określony?'
      ],
      answers: [
        { answer: '<i>vinner</i>', next: '_vinner1b', wrong: true },
        { answer: '<i>vinneren</i>', next: '_vinner2', correct: true }
      ]

    },
    _vinner1b: {
      bubbles: [
        'Końcówka <i>-er</i> jest w liczbie mnogiej. W pojedynczej zwycięzca jest tylko jeden:'
      ],
      answers: [
        { answer: '<i>vinneren</i>', next: '_vinner2' }
      ]
    },
    _vinner2: {
      bubbles: [
        '<img src="/las/c/i/rze-wsz/26ght2GFICFOl41Ak.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _finalen1: {
      bubbles: [
        'Jesteś tu jeszcze?',
        '<img src="/las/c/i/rze-wsz/GxRJqOTR2vv0Y.gif" />'
      ],
      answers: [
        { answer: 'jestem', next: '_finalen2' }
      ]
    },
    _finalen2: {
      bubbles: [
        'To dobrze, bo teraz kolejny etap. Zbliżamy się do finału.'
      ],
      autoNext: 'RANDOM'
    },


    _gang1: {
      bubbles: [
        'Jeden <q>korytarz</q> albo <q>raz</q>?'
      ],
      answers: [
        { answer: '<i>en gang</i>', next: '_gang2', correct: true },
        { answer: '<i>ei gang</i>', next: '_gang1b', wrong: true }
      ]

    },
    _gang1b: {
      bubbles: [
        '<i>en gang – gangen – ganger – gangene</i>',
        'To jaki rodzajnik?'
      ],
      answers: [
        { answer: '<i>en gang</i>', next: '_gang2' }
      ]
    },
    _gang2: {
      bubbles: [
        '<i>Veldig godt!</i> Tylko w którą stronę pójdziesz?',
        '<img src="/las/c/i/rze-wsz/KnXkh8WI2WCJO.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _tid1: {
      bubbles: [
        '<q>Czas</q> #emoji-23f1; określony?'
      ],
      answers: [
        { answer: '<i>tid</i>', next: '_tid1b', wrong: true },
        { answer: '<i>tida</i>', next: '_tid2', correct: true }
      ]

    },
    _tid1b: {
      bubbles: [
        '<i>Tid</i> to nieokreślony czas. Np. <i>tid til å tenke</i> – czas na myślenie.',
        'Ale: <i>tida flyr!</i> – czas leci.'
      ],
      answers: [
        { answer: 'OK, <i>tida</i>', next: '_tid2' }
      ]
    },
    _tid2: {
      bubbles: [
        '<i>Veldig bra!</i>'
      ],
      autoNext: 'RANDOM'
    },


    _morgen1: {
      bubbles: [
        'Jak będą określone <q>poranki</q>?'
      ],
      answers: [
        { answer: '<i>morgenene</i>', next: '_morgen2', correct: true },
        { answer: '<i>morgene</i>', next: '_morgen1b', wrong: true }
      ]

    },
    _morgen1b: {
      bubbles: [
        'To wymaga uwagi i przećwiczenia wymowy:',
        '<i>en morgen – morgenen – morgener – morgenene</i>'
      ],
      answers: [
        { answer: '<i>morgenene</i>', next: '_morgen2' }
      ]
    },
    _morgen2: {
      bubbles: [
        '<i>Bra!</i>',
        '<img src="/las/c/i/rze-wsz/mNg6J8yQ3wRVK.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _modre1: {
      bubbles: [
        '<q>Matki</q> nieokreślone? #emoji-1f469-1f469-1f467-1f466;'
      ],
      answers: [
        { answer: '<i>mødre</i>', next: '_modre2', correct: true },
        { answer: '<i>mødrene</i>', next: '_modre1b', wrong: true }
      ]

    },
    _modre1b: {
      bubbles: [
        'Matki są wyjątkowe:',
        '<i>ei mor – mora – mødre – mødrene</i>',
        'Dlatego nie określone to...'
      ],
      answers: [
        { answer: '<i>mødre</i>', next: '_modre2' }
      ]
    },
    _modre2: {
      bubbles: [
        '<i>Flott!</i>'
      ],
      autoNext: 'RANDOM'
    },


    _fedrene1: {
      bubbles: [
        '<q>Ojcowie</q> #emoji-1f468-2764-1f468; określeni?'
      ],
      answers: [
        { answer: '<i>fedre</i>', next: '_fedrene1b', wrong: true },
        { answer: '<i>fedrene</i>', next: '_fedrene2', correct: true }
      ]

    },
    _fedrene1b: {
      bubbles: [
        '<i>en far – faren – fedre – fedrene</i>',
        'Wyjątek, co?'
      ],
      answers: [
        { answer: '<i>fedrene</i>', next: '_fedrene2' }
      ]
    },
    _fedrene2: {
      bubbles: [
        '<i>Jøss!</i>'
      ],
      autoNext: 'RANDOM'
    },


    _kvelder1: {
      bubbles: [
        'Nieokreślone <q>wieczory</q>?'
      ],
      answers: [
        { answer: '<i>kvelder</i>', next: '_kvelder2', correct: true },
        { answer: '<i>kveld</i>', next: '_kvelder1b', wrong: true }
      ]

    },
    _kvelder1b: {
      bubbles: [
        'Jest <i>en kveld</i>, więc śmiało dodajemy końcówkę <i>-er</i> w liczbie mnogiej.'
      ],
      answers: [
        { answer: 'OK, <i>kvelder</i>', next: '_kvelder2' }
      ]
    },
    _kvelder2: {
      bubbles: [
        '<i>Ha en hyggelig kveld!</i>',
        '<img src="/las/c/i/rze-wsz/1kTH8ButyMnYs.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _steder1: {
      bubbles: [
        '<q>Wiele miejsc</q> #emoji-1f5fa; to:'
      ],
      answers: [
        { answer: '<i>mange steder</i>', next: '_steder2', correct: true },
        { answer: '<i>mye steder</i>', next: '_steder1b', wrong: true }
      ]

    },
    _steder1b: {
      bubbles: [
        'Kiedy masz końcówkę <i>-er</i>, to z pewnością jest to coś policzalnego: 1, 2, 3... miejsca. Dla policzalnych jest <i>mange</i>. Dla niepoliczalnych <i>mye</i>.'
      ],
      answers: [
        { answer: '<i>mange steder</i>', next: '_steder2' }
      ]
    },
    _steder2: {
      bubbles: [
        'Tak. #emoji-1f642;'
      ],
      autoNext: 'RANDOM'
    },


    _guder1: {
      bubbles: [
        'Nieokreśleni <q>bogowie</q>?'
      ],
      answers: [
        { answer: '<i>guder</i>', next: '_guder2', correct: true },
        { answer: '<i>Gud</i>', next: '_guder1b', wrong: true }
      ]

    },
    _guder1b: {
      bubbles: [
        '<i>en gud – guden – guder – gudene</i>',
        'Dlatego...'
      ],
      answers: [
        { answer: '<i>guder</i>', next: '_guder2' }
      ]
    },
    _guder2: {
      bubbles: [
        'Lepiej z nimi nie zadzieraj.',
        '<img src="/las/c/i/rze-wsz/a8weqme-460sa.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _feil1: {
      bubbles: [
        'Jak powiedzieć <q>kilka błędów</q>?'
      ],
      answers: [
        { answer: '<i>noen feil</i>', next: '_feil2', correct: true },
        { answer: '<i>noen feils</i>', next: '_feil1b', wrong: true }
      ]

    },
    _feil1b: {
      bubbles: [
        '<i>-s</i> dodajemy po angielsku, jak w...',
        '<img src="/las/c/i/rze-wsz/abf918a8d7e74da0cd8280037171f277.gif" />',
        'A norweskie <i>feil</i> jest wyjątkiem:',
        '<i>en feil – feilen – feil – feilene</i>'
      ],
      answers: [
        { answer: '<i>noen feil</i>', next: '_feil2' }
      ]
    },
    _feil2: {
      bubbles: [
        '<i>Riktig svar!</i>',
        '<img src="/las/c/i/rze-wsz/5M94d.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _veier1: {
      bubbles: [
        'Nieokreślone #emoji-1f6e3; <q>drogi</q>?'
      ],
      answers: [
        { answer: '<i>vei</i>', next: '_veier1b', wrong: true },
        { answer: '<i>veier</i>', next: '_veier2', correct: true }
      ]

    },
    _veier1b: {
      bubbles: [
        'Tu się nic dziwnego nie dzieje:',
        '<i>en vei – veien – veier – veiene</i>',
        'Więc w liczbie mnogiej nieokreślonej będzie:'
      ],
      answers: [
        { answer: '<i>veier</i>', next: '_veier2' }
      ]
    },
    _veier2: {
      bubbles: [
        '<i>Nydelig!</i>',
        '<img src="/las/c/i/rze-wsz/obeFfKertEkBa.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _navn1: {
      bubbles: [
        '<q>Nazwa</q> lub <q>imię</q>?'
      ],
      answers: [
        { answer: '<i>en navn</i>', next: '_navn1b', wrong: true },
        { answer: '<i>et navn</i>', next: '_navn2', correct: true }
      ]

    },
    _navn1b: {
      bubbles: [
        'Jednosylabowy <i>et</i>:',
        '<i>et navn – navnet – navn – navnene</i>'
      ],
      answers: [
        { answer: 'OK, <i>et navn</i>', next: '_navn2' }
      ]
    },
    _navn2: {
      bubbles: [
        '<i>Riktig!</i>',
        '<img src="/las/c/i/rze-wsz/3oEjHNCWpx4iQYytAA.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _hav1: {
      bubbles: [
        'Określone <q>morze</q> albo <q>ocean</q>?'
      ],
      answers: [
        { answer: '<i>havet</i>', next: '_hav2', correct: true },
        { answer: '<i>hava</i>', next: '_hav1b', wrong: true }
      ]

    },
    _hav1b: {
      bubbles: [
        'Jednosylabowy <i>et</i>:',
        '<i>et hav – havet – hav – havene</i>',
        'W formie określonej po prostu...'
      ],
      answers: [
        { answer: '<i>havet</i>', next: '_hav2' }
      ]
    },
    _hav2: {
      bubbles: [
        '<i>Imponerende!</i>',
        '<img src="/las/c/i/rze-wsz/l41m1a8cuTkchgHfy.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _jobb1: {
      bubbles: [
        'Określona <q>praca</q>?'
      ],
      answers: [
        { answer: '<i>jobben</i>', next: '_jobb2', correct: true },
        { answer: '<i>et arbeid</i>', next: '_jobb1b', wrong: true }
      ]

    },
    _jobb1b: {
      bubbles: [
        'Czy może być rodzajnik z przodu, gdy mowa o formie okreslonej?',
        '<i>en jobb – jobben</i>'
      ],
      answers: [
        { answer: '<i>jobben</i>', next: '_jobb2' }
      ]
    },
    _jobb2: {
      bubbles: [
        '<i>Fint!</i> #emoji-1f6e0;#emoji-1f4b0;'
      ],
      autoNext: 'RANDOM'
    },


    _del1: {
      bubbles: [
        'Nieokreślone <q>części</q>?'
      ],
      answers: [
        { answer: '<i>deler</i>', next: '_del2', correct: true },
        { answer: '<i>dealer</i>', next: '_del1b', wrong: true }
      ]

    },
    _del1b: {
      bubbles: [
        '<img src="/las/c/i/rze-wsz/11uPwtlLq91Rni.gif" />',
        'Oj, nie tędy droga. Miało być o częściach:',
        '<i>en del – delen – deler – delene</i>',
        'Więc, nieokreślone części to...'
      ],
      answers: [
        { answer: '<i>deler</i>', next: '_del2' }
      ]
    },
    _del2: {
      bubbles: [
        '<i>Så lurt!</i>'
      ],
      autoNext: 'RANDOM'
    },


    _ord1: {
      bubbles: [
        'Nieokreślone <q>słowo</q>?'
      ],
      answers: [
        { answer: '<i>et ord</i>', next: '_ord2', correct: true },
        { answer: '<i>ei ord</i>', next: '_ord1b', wrong: true }
      ]

    },
    _ord1b: {
      bubbles: [
        'Jednak <i>et</i>. I na dodatek jednosylabowy.',
        '<i>et ord – ordet – ord – ordene</i>'
      ],
      answers: [
        { answer: '<i>et ord</i>', next: '_ord2' }
      ]
    },
    _ord2: {
      bubbles: [
        '<i>Utrolig!</i> #emoji-1f638;'
      ],
      autoNext: 'RANDOM'
    },


    _time1: {
      bubbles: [
        'Jedna <q>godzina</q> #emoji-1f570; to:'
      ],
      answers: [
        { answer: '<i>en time</i>', next: '_time2', correct: true },
        { answer: '<i>ei tid</i>', next: '_time1b', wrong: true }
      ]

    },
    _time1b: {
      bubbles: [
        '<i>(Ei) tid</i> to czas. Jedna godzina to: <i>en time</i>, a dwie godziny: <i>to timer</i>.'
      ],
      answers: [
        { answer: 'OK, <i>en time</i>', next: '_time2' }
      ]
    },
    _time2: {
      bubbles: [
        '<i>Utmerket!</i>'
      ],
      autoNext: 'RANDOM'
    },


    _moete1: {
      bubbles: [
        'Nieokreślone <q>spotkanie</q>, <q>zebranie</q>?'
      ],
      answers: [
        { answer: '<i>et møte</i>', next: '_moete2', correct: true },
        { answer: '<i>en måte</i>', next: '_moete1b', wrong: true }
      ]

    },
    _moete1b: {
      bubbles: [
        '<i>En måte</i> to sposób. Spotkanie to:'
      ],
      answers: [
        { answer: '<i>et møte</i>', next: '_moete2' }
      ]
    },
    _moete2: {
      bubbles: [
        '<i>Kjempefint!</i>',
        '<img src="/las/c/i/rze-wsz/YC6ZedMDgR1Fm.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _problem1: {
      bubbles: [
        '<q>Problem</q>, jakiś dowolny? #emoji-1f415;#emoji-1f4a9;'
      ],
      answers: [
        { answer: '<i>et problem</i>', next: '_problem2', correct: true },
        { answer: '<i>ei problem</i>', next: '_problem1b', wrong: true }
      ]

    },
    _problem1b: {
      bubbles: [
        'Jednak <i>et</i>. Nie zapominaj o rodzajniku.'
      ],
      answers: [
        { answer: '<i>et problem</i>', next: '_problem2' }
      ]
    },
    _problem2: {
      bubbles: [
        '<i>Kjempegodt!</i>',
        '<img src="/las/c/i/rze-wsz/fmVbF5EpioNPy.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _rom1: {
      bubbles: [
        'Określony <q>pokój</q> #emoji-1f6cb; lub <q>przestrzeń</q>? #emoji-1f6f0;'
      ],
      answers: [
        { answer: '<i>romet</i>', next: '_rom1b', wrong: true },
        { answer: '<i>rommet</i>', next: '_rom2', correct: true }
      ]

    },
    _rom1b: {
      bubbles: [
        'Podwajamy <i>m</i> w formie określonej.',
        '<i>et rom – rommet</i>',
        'Takich słów spotkasz więcej. Np. kałuża: <i>en dam – dammen</i>.',
        'Dlatego określony pokój to...'
      ],
      answers: [
        { answer: '<i>rommet</i>', next: '_rom2' }
      ]
    },
    _rom2: {
      bubbles: [
        '<i>Perfekt!</i>',
        '<img src="/las/c/i/rze-wsz/UmVFuejI8ntew.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _uke1: {
      bubbles: [
        'Określone <q>tygodnie</q>?'
      ],
      answers: [
        { answer: '<i>ukene</i>', next: '_uke2', correct: true },
        { answer: '<i>veker</i>', next: '_uke1b', wrong: true }
      ]

    },
    _uke1b: {
      bubbles: [
        'W określonej mnogiej zawsze końcówka <i>-ene</i>'
      ],
      answers: [
        { answer: '<i>ukene</i>', next: '_uke2' }
      ]
    },
    _uke2: {
      bubbles: [
        'Raz w tygodniu warto zrobić trening.',
        '<img src="/las/c/i/rze-wsz/Mw1EyMExatybS.gif" />'
      ],
      autoNext: 'RANDOM'
    },




    _skole1: {
      bubbles: [
        'Jakaś dowolna <q>szkoła</q>?'
      ],
      answers: [
        { answer: '<i>en skole</i>', next: '_skole2', correct: true },
        { answer: '<i>en skolen</i>', next: '_skole1b', wrong: true }
      ]

    },
    _skole1b: {
      bubbles: [
        'Nie może być jednocześnie rodzajnik z przodu i końcówka określona z tyłu. Nigdzie takiej formy nie spotkasz.'
      ],
      answers: [
        { answer: 'OK, <i>en skole</i>', next: '_skole2' }
      ]
    },
    _skole2: {
      bubbles: [
        '<i>Fint!</i>',
        '<img src="/las/c/i/rze-wsz/zr6jd.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _maaned1: {
      bubbles: [
        'Określony <q>miesiąc</q>? #emoji-1f315;'
      ],
      answers: [
        { answer: '<i>månen</i>', next: '_maaned1b', wrong: true },
        { answer: '<i>måneden</i>', next: '_maaned2', correct: true }
      ]

    },
    _maaned1b: {
      bubbles: [
        'Zerknij na całość:',
        '<i>en måned – måneden – måneder – månedene</i>',
        'Który to określony?'
      ],
      answers: [
        { answer: '<i>måneden</i>', next: '_maaned2' }
      ]
    },
    _maaned2: {
      bubbles: [
        '<i>Supert!</i>'
      ],
      autoNext: 'RANDOM'
    },


    _vaapen1: {
      bubbles: [
        '<q>Broń</q> #emoji-1f52b;#emoji-1f5e1;#emoji-26cf; w liczbie mnogiej nieokreślonej?'
      ],
      answers: [
        { answer: '<i>våpen</i>', next: '_vaapen2', correct: true },
        { answer: '<i>våpnene</i>', next: '_vaapen1b', wrong: true }
      ]

    },
    _vaapen1b: {
      bubbles: [
        'To było trudniejsze, co? <i>-ene</i> odpada, bo to forma określona, ale czemu nie ma <i>-er</i>? Dobre pytanie.',
        '<i>en våpen – våpenet – våpen – våpnene</i>'
      ],
      answers: [
        { answer: 'czyli <i>våpen</i>', next: '_vaapen2' }
      ]
    },
    _vaapen2: {
      bubbles: [
        'Zastrzeliłeś mnie!',
        '<img src="/las/c/i/rze-wsz/OmBhM.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _tale1: {
      bubbles: [
        'Norwegowie lubią długie przemowy na uroczystościach. Jak są określone <q>przemowy</q>?'
      ],
      answers: [
        { answer: '<i>taler</i>', next: '_tale1b', wrong: true },
        { answer: '<i>talene</i>', next: '_tale2', correct: true }
      ]

    },
    _tale1b: {
      bubbles: [
        '<i>en tale – talen – taler – talene</i>',
        'Nic dziwnego z tym słowem się nie dzieje.'
      ],
      answers: [
        { answer: '<i>talene</i>', next: '_tale2' }
      ]
    },
    _tale2: {
      bubbles: [
        'Muszę powiedzieć, że dajesz radę.',
        '<img src="/las/c/i/rze-wsz/mtlwOSac6agE0.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _blod1: {
      bubbles: [
        'Czy możemy zrobić liczbę mnogą od słowa <q>krew</q>, czyli <i>blod</i>? #emoji-1f489;'
      ],
      answers: [
        { answer: 'tak', next: '_blod1b', wrong: true },
        { answer: 'nie', next: '_blod2', correct: true }
      ]

    },
    _blod1b: {
      bubbles: [
        'Krew po norwesku jest niepoliczalna. Nie powiesz jedna krew, dwie krwie... czy coś podobnego. Czy możesz więc zrobić liczbę mnogą? Nie.'
      ],
      answers: [
        { answer: 'OK', next: '_blod2' }
      ]
    },
    _blod2: {
      bubbles: [
        'Słusznie.'
      ],
      autoNext: 'RANDOM'
    },


    _land1: {
      bubbles: [
        'Jak są po norwesku <q>kraje</q>, nieokreślone?'
      ],
      answers: [
        { answer: '<i>land</i>', next: '_land2', correct: true },
        { answer: '<i>lander</i>', next: '_land1b', wrong: true }
      ]

    },
    _land1b: {
      bubbles: [
        '<i>et land – landet – land – landene</i>',
        'Jak widzisz to słowo jest jednosylabowe rodzaju <i>et</i> i dlatego nie otrzymuje już końcówki <i>-er</i>.'
      ],
      answers: [
        { answer: 'OK, <i>land</i>', next: '_land2' }
      ]
    },
    _land2: {
      bubbles: [
        'Dobrze.',
        'A przy okazji, <q>kraje nordyckie</q> to po norwesku <i>Norden</i>.',
        '#emoji-1f1e7-1f1fb;#emoji-1f1e9-1f1f0;#emoji-1f1f8-1f1ea;#emoji-1f1e9-1f1f0;#emoji-1f1eb-1f1ee;#emoji-1f1eb-1f1f4;#emoji-1f1ee-1f1f8;#emoji-1f1e6-1f1fd;#emoji-1f1ec-1f1f1;'
      ],
      autoNext: 'RANDOM'
    },


    _bord1: {
      bubbles: [
        'Jak jest nieokreślony <q>stół</q>?'
      ],
      answers: [
        { answer: '<i>et bord</i>', next: '_bord2', correct: true },
        { answer: '<i>en stol</i>', next: '_bord1b', wrong: true }
      ]

    },
    _bord1b: {
      bubbles: [
        '<i>En stol</i> to krzesło, a stół?'
      ],
      answers: [
        { answer: '<i>et bord</i>', next: '_bord2' }
      ]
    },
    _bord2: {
      bubbles: [
        'OK',
        '<img src="/las/c/i/rze-wsz/10ZoZ6owAU8Bnq.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _krig1: {
      bubbles: [
        'Na świecie jest teraz wiele wojen. Jak są <q>wojny</q>, nieokreślone?'
      ],
      answers: [
        { answer: '<i>kriger</i>', next: '_krig2', correct: true },
        { answer: '<i>krigene</i>', next: '_krig1b', wrong: true }
      ]

    },
    _krig1b: {
      bubbles: [
        '<i>Krigene</i> to określone wojny. Niestety. Nieokreślone to...'
      ],
      answers: [
        { answer: '<i>kriger</i>', next: '_krig2' }
      ]
    },
    _krig2: {
      bubbles: [
        'Dobra odpowiedź.',
        '<img src="/las/c/i/rze-wsz/XPmEZedldC1QA.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _pris1: {
      bubbles: [
        'Jak są określone ceny?'
      ],
      answers: [
        { answer: '<i>priser</i>', next: '_pris1b', wrong: true },
        { answer: '<i>prisene</i>', next: '_pris2', correct: true }
      ]

    },
    _pris1b: {
      bubbles: [
        '<i>en pris – prisen – priser – prisene</i>',
        'W liczbie mnogiej określonej zawsze <i>-ene</i>.'
      ],
      answers: [
        { answer: '<i>prisene</i>', next: '_pris2' }
      ]
    },
    _pris2: {
      bubbles: [
        '#emoji-263a;'
      ],
      autoNext: 'RANDOM'
    },


    _hjerte1: {
      bubbles: [
        'Jak jest <q>serce</q>? Określone.'
      ],
      answers: [
        { answer: '<i>hjertet</i>', next: '_hjerte2', correct: true },
        { answer: '<i>hjernen</i>', next: '_hjerte1b', wrong: true }
      ]

    },
    _hjerte1b: {
      bubbles: [
        '<i>En hjerne</i> to mózg. <i>Et hjerte</i> to serce. A określone?'
      ],
      answers: [
        { answer: '<i>hjertet</i>', next: '_hjerte2' }
      ]
    },
    _hjerte2: {
      bubbles: [
        '#emoji-2764; #emoji-2764; #emoji-2764;',
        '<img src="/las/c/i/rze-wsz/szCjFvyBhXPYk.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _klokke1: {
      bubbles: [
        '<q>Zegar</q>, <q>zegarek</q> #emoji-231a; nieokreślony to:'
      ],
      answers: [
        { answer: '<i>ei klokka</i>', next: '_klokke1b', wrong: true },
        { answer: '<i>ei klokke</i>', next: '_klokke2', correct: true }
      ]

    },
    _klokke1b: {
      bubbles: [
        'Zobacz: <i>ei klokke – klokka – klokker – klokkene</i>',
        'Dlatego...'
      ],
      answers: [
        { answer: '<i>ei klokke</i>', next: '_klokke2' }
      ]
    },
    _klokke2: {
      bubbles: [
        '<i>Riktig!</i>',
        '<img src="/las/c/i/rze-wsz/IX89WTEnYgvM4.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _person1: {
      bubbles: [
        'Określona <q>osoba</q>? #emoji-1f470-1f3fb; #emoji-1f448-1f3fc;'
      ],
      answers: [
        { answer: '<i>personer</i>', next: '_person1b', wrong: true },
        { answer: '<i>personen</i>', next: '_person2', correct: true }
      ]

    },
    _person1b: {
      bubbles: [
        '<i>Personer</i> to osoby, bo w liczbie mnogiej jest końcówka <i>-er</i>.',
        'W pojedynczej masz do wyboru: <i>en person – personen</i>. Która jest określona?'
      ],
      answers: [
        { answer: '<i>personen</i>', next: '_person2' }
      ]
    },
    _person2: {
      bubbles: [
        '<i>Fint!</i>',
        '<img src="/las/c/i/rze-wsz/w9WS1R9ZAA1Ik.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _oel1: {
      bubbles: [
        'Kiedy zamawiasz jedno <q>piwo</q>, to mówisz:'
      ],
      answers: [
        { answer: '<i>en øl</i>', next: '_oel2', correct: true },
        { answer: '<i>øl</i>', next: '_oel2', wrong: true }
      ]

    },
    _oel1b: {
      bubbles: [
        'Rodzajniki <i>en, ei, et</i> oznaczają jedną sztukę. Dlatego...'
      ],
      answers: [
        { answer: '<i>en øl</i>', next: '_oel2' }
      ]
    },
    _oel2: {
      bubbles: [
        '<i>Så flink du er!</i>'
      ],
      autoNext: 'RANDOM'
    },


    _ting1: {
      bubbles: [
        '<q>Rzeczy</q> bliżej nieokreślone #emoji-1f459;#emoji-1f452;#emoji-1f48d; to:'
      ],
      answers: [
        { answer: '<i>ting</i>', next: '_ting2', correct: true },
        { answer: '<i>tinger</i>', next: '_ting1b', wrong: true }
      ]

    },
    _ting1b: {
      bubbles: [
        'Zobacz, to wyjątek:',
        '<i>en ting – tingen – ting – tingene</i>',
        'To jak są jakieś <q>rzeczy</q>?'
      ],
      answers: [
        { answer: '<i>ting</i>', next: '_ting2' }
      ]
    },
    _ting2: {
      bubbles: [
        '<i>Uten feil!</i>'
      ],
      autoNext: 'RANDOM'
    },


    _konge1: {
      bubbles: [
        '<q>Król</q> #emoji-1f451; określony?'
      ],
      answers: [
        { answer: '<i>kongen</i>', next: '_konge2', correct: true },
        { answer: '<i>King Kong</i>', next: '_konge1b', wrong: true }
      ]

    },
    _konge1b: {
      bubbles: [
        '<img src="/las/c/i/rze-wsz/3oEdv9Xaqm76AzUsvu.gif" />'
      ],
      answers: [
        { answer: '<i>kongen</i>', next: '_konge2' }
      ]
    },
    _konge2: {
      bubbles: [
        '<i>Det er helt konge!</i>',
        '<img src="/las/c/i/rze-wsz/jT698wBbaJX8c.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _eier1: {
      bubbles: [
        '<q>Właściciele</q> określeni?'
      ],
      answers: [
        { answer: '<i>eiere</i>', next: '_eier1b', wrong: true },
        { answer: '<i>eierne</i>', next: '_eier2', correct: true }
      ]

    },
    _eier1b: {
      bubbles: [
        '<i>en eier – eieren – eiere – eierne</i>',
        'Określeni to?'
      ],
      answers: [
        { answer: '<i>eierne</i>', next: '_eier2' }
      ]
    },
    _eier2: {
      bubbles: [
        '<i>Yes!</i> #emoji-1f474-1f3fb;#emoji-1f475-1f3fb;'
      ],
      autoNext: 'RANDOM'
    },


    _hjerne1: {
      bubbles: [
        '<q>Mózg</q> nieokreślony?'
      ],
      answers: [
        { answer: '<i>en hjerne</i>', next: '_hjerne2', correct: true },
        { answer: '<i>en hjern</i>', next: '_hjerne1b', wrong: true }
      ]

    },
    _hjerne1b: {
      bubbles: [
        '<i>en hjerne – hjernen – hjerner – hjernene</i>',
        'Więc?'
      ],
      answers: [
        { answer: '<i>en hjerne</i>', next: '_hjerne2' }
      ]
    },
    _hjerne2: {
      bubbles: [
        'Jest OK!',
        '<img src="/las/c/i/rze-wsz/tumblr_mvspokcAed1t0uxv8o1_250.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _tegn1: {
      bubbles: [
        '<q>Znak</q> #emoji-2622; nieokreślony?'
      ],
      answers: [
        { answer: '<i>et tegn</i>', next: '_tegn2', correct: true },
        { answer: '<i>et tegne</i>', next: '_tegn1b', wrong: true }
      ]

    },
    _tegn1b: {
      bubbles: [
        '<i>et tegn – tegnet – tegn – tegnene</i>'
      ],
      answers: [
        { answer: 'Aha, <i>et tegn</i>', next: '_tegn2' }
      ]
    },
    _tegn2: {
      bubbles: [
        '<i>Godt.</i>'
      ],
      autoNext: 'RANDOM'
    },


    _svin1: {
      bubbles: [
        '<q>Świnia</q> #emoji-1f43d; nieokreślona? No co, też popularne słowo.'
      ],
      answers: [
        { answer: '<i>et svin</i>', next: '_svin2', correct: true },
        { answer: '<i>et svina</i>', next: '_svin1b', wrong: true }
      ]

    },
    _svin1b: {
      bubbles: [
        '<i>et svin – svinet – svin – svinene</i>',
        'To jak będą dwie świnie?',
        '<i>To svin</i>.',
        'A jedna?'
      ],
      answers: [
        { answer: '<i>et svin</i>', next: '_svin2' }
      ]
    },
    _svin2: {
      bubbles: [
        '<img src="/las/c/i/rze-wsz/U8Mn2NSL6OR0Y.gif" />',
        'Dobrze. A <i>et pinnsvin</i>? To oczywiście:',
        '<img src="/las/c/i/rze-wsz/hedgehog476r-2.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _tak1: {
      bubbles: [
        'Jak będą <q>dachy</q> lub <q>sufity</q> w formie nieokreślonej?'
      ],
      answers: [
        { answer: '<i>takk</i>', next: '_tak1b', wrong: true },
        { answer: '<i>tak</i>', next: '_tak2', correct: true }
      ]

    },
    _tak1b: {
      bubbles: [
        'Dach odmieniamy tak:',
        '<i>et tak – taket – tak – takene</i>'
      ],
      answers: [
        { answer: '<i>tak</i>', next: '_tak2' }
      ]
    },
    _tak2: {
      bubbles: [
        'OK. <i>Takk for svaret</i>!',
        '<img src="/las/c/i/rze-wsz/XD0udYYcgeVRS.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _bad1: {
      bubbles: [
        '<q>Łazienka</q> lub <q>kąpiel</q> określona? #emoji-1f6c1;'
      ],
      answers: [
        { answer: '<i>et bad</i>', next: '_bad1b', wrong: true },
        { answer: '<i>badet</i>', next: '_bad2', correct: true }
      ]

    },
    _bad1b: {
      bubbles: [
        'Rodzajnik z przodu oznacza zawsze formę nieokreśloną. Dlatego prawidłowo jest...'
      ],
      answers: [
        { answer: '<i>badet</i>', next: '_bad2' }
      ]
    },
    _bad2: {
      bubbles: [
        '<i>Korrekt!</i>',
        '<img src="/las/c/i/rze-wsz/ivMHHIEAG86t2.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _sykehus1: {
      bubbles: [
        'Nieokreślone <q>szpitale</q>?'
      ],
      answers: [
        { answer: '<i>sykehuser</i>', next: '_sykehus1b', wrong: true },
        { answer: '<i>sykehus</i>', next: '_sykehus2', correct: true }
      ]

    },
    _sykehus1b: {
      bubbles: [
        'Pamiętasz jak odmieniamy dom?',
        '<i>et hus – huset – hus – husene</i>',
        'Szpital odmieniamy tak samo. Ostatni człon jest jednosylabowy, rodzaju <i>et</i> i dlatego nie otrzymuje koncówki <i>-er</i>.'
      ],
      answers: [
        { answer: '<i>sykehus</i>', next: '_sykehus2' }
      ]
    },
    _sykehus2: {
      bubbles: [
        '<i>Riktig!</i>',
        '<img src="/las/c/i/rze-wsz/Scrubs-JD-pours-Kittens-on-Patient.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _kropp1: {
      bubbles: [
        '<q>Ciało</q> w formie określonej?'
      ],
      answers: [
        { answer: '<i>koppen</i>', next: '_kropp1b', wrong: true },
        { answer: '<i>kroppen</i>', next: '_kropp2', correct: true }
      ]

    },
    _kropp1b: {
      bubbles: [
        'Wybrałeś #emoji-2615;',
        'Ciało to <i>en kropp</i>, a w formie określonej...'
      ],
      answers: [
        { answer: '<i>kroppen</i>', next: '_kropp2' }
      ]
    },
    _kropp2: {
      bubbles: [
        '<i>Uten feil!</i>',
        '<img src="/las/c/i/rze-wsz/Dkv7sJS.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _jorda1: {
      bubbles: [
        '<q>Ziemia</q> #emoji-1f30d;, <q>gleba</q> określona?'
      ],
      answers: [
        { answer: '<i>jorda</i>', next: '_jorda2', correct: true },
        { answer: '<i>jord</i>', next: '_jorda1b', wrong: true }
      ]

    },
    _jorda1b: {
      bubbles: [
        'Zabrakło końcówki odpowiedniej dla rodzaju <i>ei</i> Czyli?'
      ],
      answers: [
        { answer: '<i>jorda</i>', next: '_jorda2' }
      ]
    },
    _jorda2: {
      bubbles: [
        'Tak! Pędzimy dalej!',
        '<img src="/las/c/i/rze-wsz/toaC2uZnfTiWk.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _sjanse1: {
      bubbles: [
        '<q>Szansa</q> określona?'
      ],
      answers: [
        { answer: '<i>sjansen</i>', next: '_sjanse2', correct: true },
        { answer: '<i>sjansa</i>', next: '_sjanse1b', wrong: true }
      ]

    },
    _sjanse1b: {
      bubbles: [
        'Nie ma więcej opcji poza:',
        '<i>en sjanse – sjansen – sjanser – sjansene</i>',
        'Która jest określona?'
      ],
      answers: [
        { answer: '<i>sjansen</i>', next: '_sjanse2' }
      ]
    },
    _sjanse2: {
      bubbles: [
        '<i>Det var en god jobb!</i> (To była dobra robota!)',
        '<img src="/las/c/i/rze-wsz/3osxY8yHdijYBl6p2w.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _forelder1: {
      bubbles: [
        '<q>Rodzic</q> nieokreślony?'
      ],
      answers: [
        { answer: '<i>en forelder</i>', next: '_forelder2', correct: true },
        { answer: '<i>fordeler</i>', next: '_forelder1b', wrong: true }
      ]

    },
    _forelder1b: {
      bubbles: [
        '<i>Fordeler</i> to <q>zalety</q>. A rodzic?'
      ],
      answers: [
        { answer: '<i>en forelder</i>', next: '_forelder2' }
      ]
    },
    _forelder2: {
      bubbles: [
        '<i>Det var bra!</i>',
        '<img src="/las/c/i/rze-wsz/original-2-roundround.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _lege1: {
      bubbles: [
        '<q>Lekarz</q> określony?'
      ],
      answers: [
        { answer: '<i>en lege</i>', next: '_lege1b', wrong: true },
        { answer: '<i>legen</i>', next: '_lege2', correct: true }
      ]

    },
    _lege1b: {
      bubbles: [
        '<img src="/las/c/i/rze-wsz/UzHxxqF1WO6UE.gif" />',
        'Określony z rodzajnikiem? Coś nie tak...'
      ],
      answers: [
        { answer: '<i>legen</i>', next: '_lege2' }
      ]
    },
    _lege2: {
      bubbles: [
        'Mhmm',
        '<img src="/las/c/i/rze-wsz/tumblr_m3viuiMFVr1ru06ato1_500.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _saker1: {
      bubbles: [
        '<q>Sprawy</q> nieokreślone?'
      ],
      answers: [
        { answer: '<i>saken</i>', next: '_saker1b', wrong: true },
        { answer: '<i>saker</i>', next: '_saker2', correct: true }
      ]

    },
    _saker1b: {
      bubbles: [
        'W liczbie mnogiej końcówka <i>-er</i>.'
      ],
      answers: [
        { answer: '<i>saker</i>', next: '_saker2' }
      ]
    },
    _saker2: {
      bubbles: [
        'Zgadza się.',
        '<img src="/las/c/i/rze-wsz/n6M6H9R0474ty.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _skade1: {
      bubbles: [
        '<q>Krzywdy</q>, <q>rany</q>, <q>szkody</q> określone?'
      ],
      answers: [
        { answer: '<i>skadene</i>', next: '_skade2', correct: true },
        { answer: '<i>skader</i>', next: '_skade1b', wrong: true }
      ]

    },
    _skade1b: {
      bubbles: [
        'Końcówka <i>-er</i> jest dla nieokreślsonej. Dla określonej jest <i>-ene</i>. Dlatego...'
      ],
      answers: [
        { answer: '<i>skadene</i>', next: '_skade2' }
      ]
    },
    _skade2: {
      bubbles: [
        '<img src="/las/c/i/rze-wsz/13ZHjidRzoi7n2.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _peolse1: {
      bubbles: [
        '<q>Kiełbasy</q>, <q>parówki</q> nieokreślone?'
      ],
      answers: [
        { answer: '<i>pølsa</i>', next: '_peolse1b', wrong: true },
        { answer: '<i>pølser</i>', next: '_peolse2', correct: true }
      ]

    },
    _peolse1b: {
      bubbles: [
        '<i>Pølsa</i> to jedna, konkret parówa. Jeśli chcesz kilka, to mówisz...'
      ],
      answers: [
        { answer: '<i>pølser</i>', next: '_peolse2' }
      ]
    },
    _peolse2: {
      bubbles: [
        '<img src="/las/c/i/rze-wsz/xNk979fe8QFck.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _fengsel1: {
      bubbles: [
        '<q>Więzienie</q> nieokreślone?'
      ],
      answers: [
        { answer: '<i>et fengsel</i>', next: '_fengsel2', correct: true },
        { answer: '<i>fengsler</i>', next: '_fengsel1b', wrong: true }
      ]

    },
    _fengsel1b: {
      bubbles: [
        'To było w liczbie mnogiej.',
        '<i>et fengsel – fengselet – fengsler – fengslene</i>',
        'Jak będzie jedno?'
      ],
      answers: [
        { answer: '<i>et fengsel</i>', next: '_fengsel2' }
      ]
    },
    _fengsel2: {
      bubbles: [
        'OK',
        '<img src="/las/c/i/rze-wsz/l0OWistc2HUjf6PKM.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _zzzz1: {
      bubbles: [
        'Nie zasypiasz?'
      ],
      answers: [
        { answer: 'trochę', next: '_zzzz2' },
        { answer: 'daję radę #emoji-1f4aa-1f3ff;', next: 'RANDOM' }
      ]

    },
    _zzzz2: {
      bubbles: [
        '#emoji-1f388;#emoji-1f4cc;',
        '<img src="/las/c/i/rze-wsz/4N8EsSk.gif" />'
      ],
      autoNext: 'RANDOM'
    }


  };


  this.end = {
    _a1: {
      bubbles: [
        'Gładko Ci poszło!',
        '<img src="/las/c/i/rze-wsz/When-Gang-Does-Group-Dance-Too.gif" />',
        ''
      ],
      autoNext: 'END'
    },
    _b1: {
      bubbles: [
        'To były najczęściej używane rzeczowniki w potocznym języku. Jeśli opanowałeś zasady tworzenia wszystkich czterech form, to na tej zasadzie będziesz już tworzyć kolejne!',
        '<img src="/las/c/i/rze-wsz/Bi6FcO7UoutWM.gif" />'
      ],
      autoNext: 'END'
    },
    _c1: {
      bubbles: [
        'Muszę już jechać.',
        '<img src="/las/c/i/rze-wsz/vjnLzg78di4wM.gif" />',
        'Trzymaj się!'
      ],
      autoNext: 'END'
    }
  };



}
</script>
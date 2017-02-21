<script>
function LasChatData() {

  this.testNotes = [
  ];

  this.intro = {
    a1: {
      bubbles: ['<i>Hallo, er det noen der?</i> (Czy ktoś tu jest?)', '<img src="/las/c/i/rze-wsz/HetvlijUZmKic.gif" />'],
      answers: [
        { answer: 'jestem, jestem', next: 'a2' }
      ]
    },
    a2: {
      bubbles: ['<i>Fint!</i> Przed nami sporo pracy.', 'Mam zamiar zrobić z Ciebie mistrza odmiany rzeczownika. #emoji-1f3c6;', 'Piszesz się na to? #emoji-1f58a;'],
      answers: [
        { answer: 'z radością', next: 'a3' },
        { answer: 'mogę zaryzykować', next: 'a3' }
      ]

    },
    a3: {
      bubbles: ['Mam dla Ciebie ponad 100 najpopularniejszych rzeczowników w języku norweskiem i chcę, żebyś je wszystkie dobrze znał i potrafił odmienić.'],
      answers: [
        { answer: 'brzmi super, robimy!', next: 'a5' },
        { answer: 'skąd znasz najpopularniejsze???', next: 'a4' }
      ]
    },
    a4: {
      bubbles: ['Z norweskich filmów. Proste. Przecież chcesz używać słów z życia, a nie nudnych czytanek?', '<img src="/las/c/i/rze-wsz/l41lUYJGipkMD3NPa.gif" />'],
      answers: [
        { answer: 'no raczej', next: 'a5' }
      ]
    },
    a5: {
      bubbles: ['OK. To ja będę Ci podawać słowa, a Ty wskazuj prawidłową formę.'],
      autoNext: 'ENDINTRO'
    }

  };


  this.chat = {

    bil1: {
      bubbles: ['Jak powiedzieć <q>samochody</q> #emoji-1f698; #emoji-1f696;, kiedy masz na myśli jakieś dowolne, nieokreślone?'],
      answers: [
        { answer: '<i>bilen</i>', next: 'bil1b' },
        { answer: '<i>biler</i>', next: 'bil2' }
      ]

    },
    bil1b: {
      bubbles: ['<i>Bilen</i> to jeden określony samochód. Skąd wiedzieć, że dodajemy końcówkę <i>-en</i>?', '<i>en bil – bilen</i>', 'W liczbie mnogiej dodajemy końcówkę <i>-er</i> lub <i>-ene</i>', 'Dlatego <i>biler</i> (nieokreślone samochody), <i>bilene</i> (określone).'],
      answers: [
        { answer: 'OK, <i>biler</i>', next: 'bil2' }
      ]
    },
    bil2: {
      bubbles: ['Świetnie!', '<img src="/las/c/i/rze-wsz/AkKtWEPSyS9Pi.gif" />'],
      autoNext: 'RANDOM'
    },


    blikk1: {
      bubbles: ['Jak powiedzieć <q>murugnięcie okiem</q> albo <q>chwila</q>?'],
      answers: [
        { answer: '<i>et øyeblikk</i>',  next: 'blikk2' },
        { answer: '<i>ei øyeblikk</i>',  next: 'blikk1b' }
      ]

    },
    blikk1b: {
      bubbles: ['<i>Øyeblikk</i> jest rodzaju <i>et</i>. Zapamiętasz?'],
      answers: [
        { answer: 'zapamiętam', next: 'blikk2' }
      ]
    },
    blikk2: {
      bubbles: ['Dobrze!', '<img src="/las/c/i/rze-wsz/tumblr_mpnbbcgkRO1rb324eo1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    oye1: {
      bubbles: ['<q>Oczy</q> #emoji-1f441;#emoji-1f441; w formie określonej?'],
      answers: [
        { answer: '<i>øyene</i>',  next: 'oye2' },
        { answer: '<i>øyet</i>',  next: 'oye2' }
      ]

    },
    oye1b: {
      bubbles: ['<i>Øyet</i> to jedno określone oko. W liczbie mnogiej określonej dodajemy zawsze końcówkę <i>-ene</i>. Dlatego prawidłowo będzie...'],
      answers: [
        { answer: '<i>øyene</i>', next: 'oye2' }
      ]
    },
    oye2: {
      bubbles: ['Znowu dobrze!', '<img src="/las/c/i/rze-wsz/3ornk3noLGE88V6xFK.gif" />'],
      autoNext: 'RANDOM'
    },


    moro1: {
      bubbles: ['Jak jest <q>zabawa, rozrywka, przyjemność</q>?', 'Przypominam, że jest to słowo niepoliczalne.'],
      answers: [
        { answer: '<i>(ei) moro</i>', next: 'moro2' },
        { answer: '<i>moroer</i>', next: 'moro1b' }
      ]

    },
    moro1b: {
      bubbles: ['Końcówkę <i>-er</i> dodajemy w liczbie mnogiej, ale tylko do słów policzalnych. Rozrywki po norwesku nie można policzyć: jedna rozrywka, dwie rozrywki... nie pasuje. OK?'],
      answers: [
        { answer: 'OK', next: 'moro2' }
      ]
    },
    moro2: {
      bubbles: ['Yeah!', '<img src="/las/c/i/rze-wsz/yoJC2GnSClbPOkV0eA.gif" />'],
      autoNext: 'RANDOM'
    },


    gave1: {
      bubbles: ['A <q>prezenty</q>? Określone?'],
      answers: [
        { answer: '<i>gavene</i>', next: 'gave2' },
        { answer: '<i>gaver</i>', next: 'gave1b' }
      ]

    },
    gave1b: {
      bubbles: ['W formie określonej liczby mnogiej zawsze jest końcówka <i>-ene</i>. Proste.'],
      answers: [
        { answer: '<i>gavene</i>', next: '2' }
      ]
    },
    gave2: {
      bubbles: ['#emoji-1f44d-1f3fc; #emoji-1f381;'],
      autoNext: 'RANDOM'
    },


    idiot1: {
      bubbles: ['Jakie słowo przychodzi Ci do głowy, kiedy widzisz takiego gościa na Preikestolen?', '<img src="/las/c/i/rze-wsz/NdbmK4ndXLTs4-2.gif" />'],
      answers: [
        { answer: '<i>Idioten!</i>', next: 'idiot2' },
        { answer: '<i>Jeg vil gifte ham!</i>', next: 'idiot1b' },
      ]

    },
    idiot1b: {
      bubbles: ['Miało być jedno słowo. #emoji-1f609;'],
      autoNext: 'idiot2'
    },
    idiot2: {
      bubbles: ['W jakiej formie jest słowo <q>idioten</q>?'],
      answers: [
        { answer: 'określonej pojedynczej', next: 'idiot3' },
        { answer: 'nieokreślonej pojedynczej', next: 'idiot2b' }
      ]

    },
    idiot2b: {
      bubbles: ['en idiot (jakiś idiota) – idioten (określony idiota)'],
      answers: [
        { answer: 'OK', next: 'RANDOM' }
      ]
    },
    idiot3: {
      bubbles: ['<i>Bra!</i>'],
      autoNext: 'RANDOM'
    },


    par1: {
      bubbles: ['Jak powiedzieć <q>para</q>? No wiesz, para butów <span class="no-break">#emoji-1f45e;#emoji-1f45e;</span> albo ludzi #emoji-1f46b;. Najprościej, <span class="no-break">w nieokreślonej</span> formie.'],
      answers: [
        { answer: '<i>et par</i>', next: 'par2' },
        { answer: '<i>pæra</i>', next: 'par1b' }
      ]

    },
    par1b: {
      bubbles: ['<i>Pæra</i> to określona gruszka. #emoji-1f350;', 'Więc?'],
      answers: [
        { answer: 'OK, <i>et par</i>', next: 'par2' }
      ]
    },
    par2:{
      bubbles: ['To jak będzie określona <q>para</q>?'],
      answers: [
        { answer: '<i>paret</i>', next: 'par3' },
        { answer: '<i>para</i>', next: 'par2b' }
      ]

    },
    par2b: {
      bubbles: ['Zobacz:', '<i>et par – paret</i>', 'Która to określona?'],
      answers: [
        { answer: 'Ah, <i>paret</i>', next: 'par3' }
      ]
    },
    par3: {
      bubbles: ['<i>Godt! Et par hamstere til deg!</i>', '<img src="/las/c/i/rze-wsz/tumblr_n5zo6bBwT71s96utdo1_400.gif" />'],
      autoNext: 'RANDOM'
    },


    fyr1: {
      bubbles: ['Określony <q>ogień</q> #emoji-1f525; to:'],
      answers: [
        { answer: '<i>fyr</i>', next: 'fyr1b' },
        { answer: '<i>fyren</i>', next: 'fyr2' }
      ]

    },
    fyr1b: {
      bubbles: ['<i>(En) fyr</i> to forma nieokreślona. W nawiasie rodzajnik, żebyś pamiętał, że ogień jest niepoliczalny. Także określony ogień to:'],
      answers: [
        { answer: '<i>fyren</i>', next: 'fyr2' }
      ]
    },
    fyr2: {
      bubbles: ['#emoji-1f918-1f3fe;', '<img src="/las/c/i/rze-wsz/axn-cinemagraphs-11.gif" />'],
      autoNext: 'RANDOM'
    },


    enfyr1: {
      bubbles: ['Jak jest <q>facet</q>? Nie znasz gościa, dopiero wchodzi.'],
      answers: [
        { answer: '<i>en fyr</i>', next: 'enfyr2' },
        { answer: '<i>karen</i>', next: 'enfyr1b' }
      ]

    },
    enfyr1b: {
      bubbles: ['<i>En kar</i> to jakiś facet, mężczyzna. Ale tu było <i>karen</i> – określony facet. Dlatego miało być...'],
      answers: [
        { answer: '<i>en fyr</i>', next: 'enfyr2' }
      ]
    },
    enfyr2: {
      bubbles: ['<i>Fantastisk!</i>', '<img src="/las/c/i/rze-wsz/lgVdC.gif" />'],
      autoNext: 'RANDOM'
    },


    dor1: {
      bubbles: ['Jak będą drzwi w liczbie mnogiej?'],
      answers: [
        { answer: '<i>døren, døra</i>', next: 'dor1b' },
        { answer: '<i>dører, dørene</i>', next: 'dor2' }
      ]

    },
    dor1b: {
      bubbles: ['To była liczba pojedyncza. A w mnogiej?'],
      answers: [
        { answer: 'OK, <i>dører, dørene</i>', next: 'dor2' }
      ]
    },
    dor2: {
      bubbles: ['<i>Dørene åpnes!</i> #emoji-1f5dd;', '<img src="/las/c/i/rze-wsz/tumblr_me7xtozqYx1rjcfxro1_250.gif" />'],
      autoNext: 'RANDOM'
    },


    hund1: {
      bubbles: ['<q>Pies</q> #emoji-1f429; określony?'],
      answers: [
        { answer: '<i>hunden</i>', next: 'hund2' },
        { answer: '<i>hunder</i>', next: 'hund1b' }
      ]

    },
    hund1b: {
      bubbles: ['Końcówka <i>-er</i> jest przecież w liczbie mnogiej. #emoji-1f609; Dlatego...'],
      answers: [
        { answer: '<i>hunden</i>', next: 'hund2' }
      ]
    },
    hund2: {
      bubbles: ['<i>Fint!</i>', '<img src="/las/c/i/rze-wsz/tumblr_m5h30bSsH91qelkf9o1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    vann1: {
      bubbles: ['<q>Woda</q> okeślona, np. taka w basenie?'],
      answers: [
        { answer: '<i>vannet</i>', next: 'vann2' },
        { answer: '<i>vannene</i>', next: 'vann1b' }
      ]

    },
    vann1b: {
      bubbles: ['<i>Vannene</i> to określone wody albo jeziora. Określona woda to...'],
      answers: [
        { answer: 'Aha, <i>vannet</i>', next: 'vann2' }
      ]
    },
    vann2: {
      bubbles: ['Dobrze Ci idzie!', '<img src="/las/c/i/rze-wsz/tumblr_n7n52ysAZ61r3gb3zo1_400.gif" />'],
      autoNext: 'RANDOM'
    },


    barn1: {
      bubbles: ['Jak są <q>dzieci</q> w liczbie mnogiej nieokreślonej?'],
      answers: [
        { answer: '<i>barn</i>', next: 'barn2' },
        { answer: '<i>barna</i>', next: 'barn1b' }
      ]

    },
    barn1b: {
      bubbles: ['Barna to określone dzieci. Pełna odmiana wygląda tak:', '<i>et barn – barnet – barn – barna</i>', 'Dlatego nieokreślone dzieci to...'],
      answers: [
        { answer: '<i>barn</i>', next: 'barn2' }
      ]
    },
    barn2: {
      bubbles: ['W nagrodę mały Azjata:', '<img src="/las/c/i/rze-wsz/3oEjHKtwp6WjUaJ0kM.gif" />'],
      autoNext: 'RANDOM'
    },


    syn1: {
      bubbles: ['Jak byś powiedział: <q>On ma syna.</q>?', '<i>Han har...</i>'],
      answers: [
        { answer: '<i>en sønn</i>', next: 'syn2' },
        { answer: '<i>sønner</i>', next: 'syn1b' }
      ]

    },
    syn1b: {
      bubbles: ['<i>Sønner</i> to liczba mnoga. Więc...'],
      answers: [
        { answer: '<i>en sønn</i>', next: 'syn2' }
      ]
    },
    syn2: {
      bubbles: ['Wspaniale.', '<img src="/las/c/i/rze-wsz/tumblr-m25p9yiv4y1qgn0dyo1-250.gif" />', 'A <q>córki</q>?'],
      answers: [
        { answer: '<i>datter</i>', next: 'syn2b' },
        { answer: '<i>døtre</i>', next: 'syn3' }
      ]

    },
    syn2b: {
      bubbles: ['Zobacz:', '<i>ei datter – dattera – døtre – døtrene</i>', 'Jakieś córki to...'],
      answers: [
        { answer: '<i>døtre</i>', next: 'syn3' }
      ]
    },
    syn3: {
      bubbles: ['Zgadza się. <i>Han har søte døtre.</i>', '<img src="/las/c/i/rze-wsz/tumblr_mzwj71IIl51r6b6qeo1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    mat1: {
      bubbles: ['<q>Jedzenie</q> określone? #emoji-1f373;#emoji-1f953;'],
      answers: [
        { answer: '<i>mat</i>', next: 'mat1b' },
        { answer: '<i>maten</i>', next: 'mat2' }
      ]

    },
    mat1b: {
      bubbles: ['Pełna odmiana to: <i>(en) mat – maten</i>, bo jedzenie jest niepoliczalne. Określone to...'],
      answers: [
        { answer: '<i>maten</i>', next: 'mat2' }
      ]
    },
    mat2: {
      bubbles: ['<i>Takk for maten!</i>', '<img src="/las/c/i/rze-wsz/1IejF9MZ0ivG8.gif" />'],
      autoNext: 'RANDOM'
    },


    ben1: {
      bubbles: ['<q>Noga</q> określona?'],
      answers: [
        { answer: '<i>bein</i>', next: 'ben1b' },
        { answer: '<i>beinet</i>', next: 'ben2' }
      ]

    },
    ben1b: {
      bubbles: ['<i>et bein – beinet – bein – beina</i>', 'To jak? Zmieniasz odpowiedź?'],
      answers: [
        { answer: '<i>beinet</i>', next: 'ben2' }
      ]
    },
    ben2: {
      bubbles: ['Dobra decyzja. Ćwiczymy dalej.', '<img src="/las/c/i/rze-wsz/20bein.gif" />'],
      autoNext: 'RANDOM'
    },


    hand1: {
      bubbles: ['<q>Dłonie</q> nieokreślone?'],
      answers: [
        { answer: '<i>hender</i>', next: 'hand2' },
        { answer: '<i>hendene</i>', next: 'hand1b' }
      ]

    },
    hand1b: {
      bubbles: ['Ach, bo to nieregularne słowo:','<i>ei hånd – hånda – hender – hendene</i>', 'Nieokreślone dłonie to...'],
      answers: [
        { answer: '<i>hender</i>', next: 'hand2' }
      ]
    },
    hand2: {
      bubbles: ['Jak Ty to robisz?', '<img src="/las/c/i/rze-wsz/35hand.gif" />'],
      autoNext: 'RANDOM'
    },


    kaffe1: {
      bubbles: ['Jedna <q>kawa</q> nieokreślona? W domyśle jako kubek kawy.'],
      answers: [
        { answer: '<i>en kaffe</i>', next: 'kaffe2' },
        { answer: '<i>en kafé</i>', next: 'kaffe1b' }
      ]

    },
    kaffe1b: {
      bubbles: ['<i>En kafé</i> to kawiarnia. Wymawiamy długo. Kawę za to krótko:'],
      answers: [
        { answer: '<i>en kaffe</i>', next: 'kaffe2' }
      ]
    },
    kaffe2: {
      bubbles: ['Ammm', '<img src="/las/c/i/rze-wsz/xT9DPJcpQqpR6icVCE.gif" />'],
      autoNext: 'RANDOM'
    },


    bok1: {
      bubbles: ['<q>Książki</q> nieokreślone?'],
      answers: [
        { answer: '<i>boker</i>', next: 'bok1b' },
        { answer: '<i>bøker</i>', next: 'bok2' }
      ]

    },
    bok1b: {
      bubbles: ['Zobacz:', '<i>ei bok – boka – bøker – bøkene</i>'],
      answers: [
        { answer: 'OK, <i>bøker</i>', next: 'bok2' }
      ]
    },
    bok2: {
      bubbles: ['<i>Fint!</i>', '<img src="/las/c/i/rze-wsz/girl-reading-book-animation-16.gif" />'],
      autoNext: 'RANDOM'
    },


    spor1: {
      bubbles: ['<q>Tor</q> albo <q>ślad</q> nieokreślony to:'],
      answers: [
        { answer: '<i>et spor</i>', next: 'spor2' },
        { answer: '<i>ei spor</i>', next: 'spor1b' }
      ]

    },
    spor1b: {
      bubbles: ['<i>Spor</i> jest rodzaju <i>et</i>. Więc?'],
      answers: [
        { answer: '<i>et spor</i>', next: 'spor2' }
      ]
    },
    spor2: {
      bubbles: ['<i>Greit</i>.', '<img src="/las/c/i/rze-wsz/lKi1jDjWCRNmM.gif" />'],
      autoNext: 'RANDOM'
    },


    kvinne1: {
      bubbles: ['<q>Kobieta</q>? Jakaś na ulicy, której nie znasz.'],
      answers: [
        { answer: '<i>kvinna</i>', next: 'kvinne1b' },
        { answer: '<i>ei kvinne</i>', next: 'kvinne2' }
      ]

    },
    kvinne1b: {
      bubbles: ['<i>Kvinna</i> to określona kobieta.', '<i>ei kvinne – kvinna</i>', 'Co proponujesz?'],
      answers: [
        { answer: '<i>ei kvinne</i>', next: 'kvinne2' }
      ]
    },
    kvinne2: {
      bubbles: ['OK', '<img src="/las/c/i/rze-wsz/7blow.gif" />'],
      autoNext: 'RANDOM'
    },


    venn1: {
      bubbles: ['<q>Przyjaciel</q> określony?'],
      answers: [
        { answer: '<i>venner</i>', next: 'venn1b' },
        { answer: '<i>vennen</i>', next: 'venn2' }
      ]

    },
    venn1b: {
      bubbles: ['To słowo trzeba znać w każdej formie.', '<i>en venn – vennen – venner – vennene</i>', 'A jeden określony to...'],
      answers: [
        { answer: '<i>vennen</i>', next: 'venn2' }
      ]
    },
    venn2: {
      bubbles: ['<i>Ja!</i>', '<img src="/las/c/i/rze-wsz/19skate.gif" />'],
      autoNext: 'RANDOM'
    },


    fly1: {
      bubbles: ['<q>Samoloty</q> nieokreślone? #emoji-1f6eb; #emoji-1f6ec;'],
      answers: [
        { answer: '<i>fly</i>', next: 'fly2' },
        { answer: '<i>flyer</i>', next: 'fly1b' }
      ]

    },
    fly1b: {
      bubbles: ['Poznaj całość:', '<i>et fly – flyet – fly – flyene</i>', 'Dlatego nieokreślone to...'],
      answers: [
        { answer: '<i>fly</i>', next: 'fly2' }
      ]
    },
    fly2: {
      bubbles: ['<i>Kjempebra!</i>', '<img src="/las/c/i/rze-wsz/32bird.gif" />'],
      autoNext: 'RANDOM'
    },


    tele1: {
      bubbles: ['<q>Telefony</q> określone? #emoji-1f4f1;#emoji-1f4f1;#emoji-1f4f1;'],
      answers: [
        { answer: '<i>mobiler</i>', next: 'tele1b' },
        { answer: '<i>telefonene</i>', next: 'tele2' }
      ]

    },
    tele1b: {
      bubbles: ['Jedne i drugie to telefony, ale nieokreślone mają końcówkę <i>-er</i>, a określone <i>-ene</i>. Dlatego...'],
      answers: [
        { answer: '<i>telefonene</i>', next: 'tele2' }
      ]
    },
    tele2: {
      bubbles: ['<i>Bra!</i>', '<img src="/las/c/i/rze-wsz/ESpe7v3ZSleec.gif" />'],
      autoNext: 'RANDOM'
    },


    bror1: {
      bubbles: ['<q>Brat</q> #emoji-1f938; określony?'],
      answers: [
        { answer: '<i>en bror</i>', next: 'bror1b' },
        { answer: '<i>broren</i>', next: 'bror2' }
      ]

    },
    bror1b: {
      bubbles: ['Rodzajnik z przodu oznacza jedną nieokreśloną sztukę czegoś lub kogoś. Dlatego określony brat to...'],
      answers: [
        { answer: '<i>broren</i>', next: 'bror2' }
      ]
    },
    bror2: {
      bubbles: ['Znów go zwinęli.', '<img src="/las/c/i/rze-wsz/17125c33392f0d050fe621fe04774793.gif" />'],
      autoNext: 'RANDOM'
    },


    lys1: {
      bubbles: ['<q>Światła</q> nieokreślone?'],
      answers: [
        { answer: '<i>lys</i>', next: 'lys2' },
        { answer: '<i>lyset</i>', next: 'lys1b' }
      ]

    },
    lys1b: {
      bubbles: ['<i>Lyset</i> to określone światło. Przecież wiesz. W liczbie mnogiej nie dodajemy końcówki <i>-er</i>, bo <i>et lys</i> ma tylko jedną sylabę i jest rodzaju <i>et</i> #emoji-1f609;'],
      answers: [
        { answer: 'OK, <i>lys</i>', next: 'lys2' }
      ]
    },
    lys2: {
      bubbles: ['<i>Bra!</i>', '<img src="/las/c/i/rze-wsz/xlGYf1RUbYYes.gif" />'],
      autoNext: 'RANDOM'
    },


    onkel1: {
      bubbles: ['<q>Wujek</q> określony?'],
      answers: [
        { answer: '<i>onkel</i>', next: 'onkel1b' },
        { answer: '<i>onkelen</i>', next: 'onkel2' }
      ]

    },
    onkel1b: {
      bubbles: ['<i>en onkel – onkelen – onkler – onklene</i>', 'Zobacz, nie było do wyboru samego <i>onkel</i>. Musi być...'],
      answers: [
        { answer: '<i>onkelen</i>', next: 'onkel2' }
      ]
    },
    onkel2: {
      bubbles: ['<i>Supert!</i>', 'Nie każdy ma takiego wujka.', '<img src="/las/c/i/rze-wsz/5sheet.gif" />'],
      autoNext: 'RANDOM'
    },


    kone1: {
      bubbles: ['<q>Żona</q> określona?'],
      answers: [
        { answer: '<i>kone</i>', next: 'kone1b' },
        { answer: '<i>kona</i>', next: 'kone2' }
      ]

    },
    kone1b: {
      bubbles: ['To słowo warto znać, żeby uniknąć nieporozumień:', '<i>ei kone – kona – koner – konene</i>', 'Ale ta jedna, wymarzona żona to...'],
      answers: [
        { answer: '<i>kona</i>', next: 'kone2' }
      ]
    },
    kone2: {
      bubbles: ['Tak jest!', '<img src="/las/c/i/rze-wsz/magda.gif" />'],
      autoNext: 'RANDOM'
    },


    kamp1: {
      bubbles: ['Określone <q>walki</q>, <q>bitwy</q> #emoji-2694; lub <q>mecze</q>?'],
      answers: [
        { answer: '<i>kamp</i>', next: 'kamp1b' },
        { answer: '<i>kampene</i>', next: 'kamp2' }
      ]

    },
    kamp1b: {
      bubbles: ['Forma określona w liczbie mnogiej ma zawsze końcówkę <i>-ene</i>. Tak więc...'],
      answers: [
        { answer: '<i>kampene</i>', next: 'kamp2' }
      ]
    },
    kamp2: {
      bubbles: ['O tak!', '<img src="/las/c/i/rze-wsz/X60jpxh.gif" />'],
      autoNext: 'RANDOM'
    },


    dame1: {
      bubbles: ['Określone <q>kobiety</q>?'],
      answers: [
        { answer: '<i>damer</i>', next: 'dame1b' },
        { answer: '<i>kvinnene</i>', next: 'dame2' }
      ]

    },
    dame1b: {
      bubbles: ['<i>Damer</i> to nieokreślone kobiety. Określone to <i>damene</i>, albo...'],
      answers: [
        { answer: '<i>kvinnene</i>', next: 'dame2' }
      ]
    },
    dame2: {
      bubbles: ['Świetnie!', '<img src="/las/c/i/rze-wsz/6288960204_23fcc5a01a_o.gif" />'],
      autoNext: 'RANDOM'
    },


    by1: {
      bubbles: ['<q>Miasto</q> nieokreślone?'],
      answers: [
        { answer: '<i>et by</i>', next: 'by1b' },
        { answer: '<i>en by</i>', next: 'by2' }
      ]

    },
    by1b: {
      bubbles: ['Nie będę się sprzeczać, ale w słowniku jest <i>en by</i>. Zgoda?'],
      answers: [
        { answer: 'no dobra, <i>en by</i>', next: 'by2' }
      ]
    },
    by2: {
      bubbles: ['<i>Veldig bra!</i>', '<img src="/las/c/i/rze-wsz/newspaper-man-429.gif" />'],
      autoNext: 'RANDOM'
    },


    liv1: {
      bubbles: ['<q>Życie</q> określone?'],
      answers: [
        { answer: '<i>livet</i>', next: 'liv2' },
        { answer: '<i>liva</i>', next: 'liv1b' }
      ]

    },
    liv1b: {
      bubbles: ['<i>et liv – livet – liv – livene</i> (el <i>liva</i>)', 'Jednak w formie określonej pojedynczej jest tylko jedna opcja:'],
      answers: [
        { answer: '<i>livet</i>', next: 'liv2' }
      ]
    },
    liv2: {
      bubbles: ['<img src="/las/c/i/rze-wsz/7177997572_fdeaeb4463_o.gif" />'],
      autoNext: 'RANDOM'
    },


    film1: {
      bubbles: ['Jakiś <q>film</q> to:'],
      answers: [
        { answer: '<i>en film</i>', next: 'film2' },
        { answer: '<i>en movie</i>', next: 'film1b' }
      ]

    },
    film1b: {
      bubbles: ['#emoji-1f926-1f3fb;'],
      answers: [
        { answer: '<i>en film</i>', next: 'film2' }
      ]
    },
    film2: {
      bubbles: ['<i>Flott!</i> #emoji-1f4fd;#emoji-1f39e;'],
      autoNext: 'RANDOM'
    },


    vindu1: {
      bubbles: ['Jakieś <q>okno</q>?'],
      answers: [
        { answer: '<i>et vindu</i>', next: 'vindu2' },
        { answer: '<i>en vindu</i>', next: 'vindu1b' }
      ]

    },
    vindu1b: {
      bubbles: ['Sorry, rodzajnik <i>et</i>. A w całości regularnie:', '<i>et vindu – vinduet – vinduer – vinduene</i>', 'To jak było to określone okno?'],
      answers: [
        { answer: '<i>vinduet</i>', next: 'vindu2' }
      ]
    },
    vindu2: {
      bubbles: ['<i>Jøss!</i>', '<img src="/las/c/i/rze-wsz/cab-window-429.gif" />'],
      autoNext: 'RANDOM'
    },


    venn1: {
      bubbles: ['<q>Przyjaciele</q>?'],
      answers: [
        { answer: '<i>friends</i>', next: 'venn1b' },
        { answer: '<i>venner</i>', next: 'venn2' }
      ]

    },
    venn1b: {
      bubbles: ['To nie ten serial. #emoji-1f609; W liczbie mnogiej przecież końcówka <i>-er</i> lub <i>-ene</i>. W nieokreślonej będzie...'],
      answers: [
        { answer: '<i>venner</i>', next: 'venn2' }
      ]
    },
    venn2: {
      bubbles: ['<i>Ja!</i>', '<img src="/las/c/i/rze-wsz/12UlfHpF05ielO.gif" />'],
      autoNext: 'RANDOM'
    },


    stol1: {
      bubbles: ['Nieokreślone <q>krzesła</q>?'],
      answers: [
        { answer: '<i>bord</i>', next: 'stol1b' },
        { answer: '<i>stoler</i>', next: 'stol2' }
      ]

    },
    stol1b: {
      bubbles: ['<i>Et bord</i> to stół.', 'Krzesło to <i>en stol</i>. Więc?'],
      answers: [
        { answer: '<i>stoler</i>', next: 'stol2' }
      ]
    },
    stol2: {
      bubbles: ['<i>Bra!</i>', '<img src="/las/c/i/rze-wsz/tumblr_nt2vth7sTX1qef46ho1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    tur1: {
      bubbles: ['Określone <q>wycieczki</q>?'],
      answers: [
        { answer: '<i>tur</i>', next: 'tur1b' },
        { answer: '<i>turene</i>', next: 'tur2' }
      ]

    },
    tur1b: {
      bubbles: ['<i>en tur – turen – turer – turene</i>', 'Co obstawiasz?'],
      answers: [
        { answer: '<i>turene</i>', next: 'tur2' }
      ]
    },
    tur2: {
      bubbles: ['Dobrze!', '<img src="/las/c/i/rze-wsz/rUlu713yOz2wM.gif" />'],
      autoNext: 'RANDOM'
    },


    baby1: {
      bubbles: ['Określone <q>niemowlę</q>?'],
      answers: [
        { answer: '<i>babyen</i>', next: 'baby2' },
        { answer: '<i>baby</i>', next: 'baby1b' }
      ]

    },
    baby1b: {
      bubbles: ['Końcóweczka <i>-en</i> śmiało może być dodana. Tak się robi norweski. #emoji-1f609;'],
      answers: [
        { answer: '<i>babyen</i>', next: 'baby2' }
      ]
    },
    baby2: {
      bubbles: ['<img src="/las/c/i/rze-wsz/8BdOabytiFWk8.gif" />'],
      autoNext: 'RANDOM'
    },


    jente1: {
      bubbles: ['Jak będzie <q>dziewczyna</q> w formie nieokreślonej?'],
      answers: [
        { answer: '<i>ei jenta</i>', next: 'jente1b' },
        { answer: '<i>ei jente</i>', next: 'jente2' }
      ]

    },
    jente1b: {
      bubbles: ['Mała podpowiedź: <i>ei jente – jenta</i>, więc będzie...'],
      answers: [
        { answer: '<i>ei jente</i>', next: 'jente2' }
      ]
    },
    jente2: {
      bubbles: ['<i>Lurt!</i>', '<img src="/las/c/i/rze-wsz/12hair.gif" />'],
      autoNext: 'RANDOM'
    },


    kontroll1: {
      bubbles: ['<q>Kontrola</q>, <q>sprawdzenie</q> #emoji-1f575; w nieokreślonej formie?'],
      answers: [
        { answer: '<i>en kontroll</i>', next: 'kontroll2' },
        { answer: '<i>en kontrol</i>', next: 'kontroll1b' }
      ]

    },
    kontroll1b: {
      bubbles: ['<img src="/las/c/i/rze-wsz/bkKvvzE9PEcTK.gif" />', 'Jednak przez dwa <q>ll</q>:', '<i>en kontroll – kontrollen – kontroller – kontrollene</i>'],
      answers: [
        { answer: 'OK, <i>en kontroll</i>', next: 'kontroll2' }
      ]
    },
    kontroll2: {
      bubbles: ['Dobrze.', 'Masz siłę na dalszą walkę?'],
      answers: [
        { answer: 'pewnie #emoji-1f4aa-1f3fc;', next: 'kontroll3' }
      ]
    },
    kontroll3: {
      bubbles: ['<img src="/las/c/i/rze-wsz/26BRJ42FrwYMrKXV6.gif" />'],
      autoNext: 'RANDOM'
    },


    gutt1: {
      bubbles: ['<q>Chłopiec</q> #emoji-1f466-1f3fc; nieokreślony?'],
      answers: [
        { answer: '<i>gutten</i>', next: 'gutt1b' },
        { answer: '<i>en gutt</i>', next: 'gutt2' }
      ]

    },
    gutt1b: {
      bubbles: ['<i>Gutten</i> to określony chłopak. Nieokreślony to ten z rodzajnikiem:'],
      answers: [
        { answer: 'no tak, <i>en gutt</i>', next: 'gutt2' }
      ]
    },
    gutt2: {
      bubbles: ['<i>High five!</i>', '<img src="/las/c/i/rze-wsz/tumblr_n6nl9svyjs1rc7zl1o1_400.gif" />'],
      autoNext: 'RANDOM'
    },


    baat1: {
      bubbles: ['<q>Łódka</q> #emoji-1f6a4; określona?'],
      answers: [
        { answer: '<i>båten</i>', next: 'baat2' },
        { answer: '<i>båter</i>', next: 'baat1b' }
      ]

    },
    baat1b: {
      bubbles: ['Końcówka <i>-er</i> jest w liczbie mnogiej.', '<i>en båt – båten</i>'],
      answers: [
        { answer: '<i>båten</i>', next: 'baat2' }
      ]
    },
    baat2: {
      bubbles: ['<i>Yeah!</i>', '<img src="/las/c/i/rze-wsz/tumblr_m9nbokxIgu1r6g7k5o1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    famielien1: {
      bubbles: ['Określona <q>rodzina</q>?'],
      answers: [
        { answer: '<i>familien</i>', next: 'famielien2' },
        { answer: '<i>familia</i>', next: 'famielien1b' }
      ]

    },
    famielien1b: {
      bubbles: ['<i>en familie – familien – familier – familiene</i>', 'Zatem jedna określona to...'],
      answers: [
        { answer: '<i>familien</i>', next: 'famielien2' }
      ]
    },
    famielien2: {
      bubbles: ['Jesteś niesamowity!', '<img src="/las/c/i/rze-wsz/YGJBp5EgyVP9K.gif" />'],
      autoNext: 'RANDOM'
    },


    netter1: {
      bubbles: ['<q>Noce</q> nieokreślone?'],
      answers: [
        { answer: '<i>netter</i>', next: 'netter2' },
        { answer: '<i>nøtter</i>', next: 'netter1b' }
      ]

    },
    netter1b: {
      bubbles: ['<i>Nøtter</i> to orzeszki. Noc jest nieregularna, zobacz:', '<i>ei natt – natta – netter – nettene</i>', 'Dlatego...'],
      answers: [
        { answer: '<i>netter</i>', next: 'netter2' }
      ]
    },
    netter2: {
      bubbles: ['Uff. Dobrze.', '<img src="/las/c/i/rze-wsz/tumblr_nhqepgKJqs1qef46ho1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    kompis1: {
      bubbles: ['<q>Kumpel</q>, <q>kolega</q> nieokreślony?'],
      answers: [
        { answer: '<i>en kompis</i>', next: 'kompis2' },
        { answer: '<i>kameraten</i>', next: 'kompis1b' }
      ]

    },
    kompis1b: {
      bubbles: ['<i>Kameraten</i> to określony kolega. Nieokreślony jest z rodzajnikiem:'],
      answers: [
        { answer: '<i>en kompis</i>', next: 'kompis2' }
      ]
    },
    kompis2: {
      bubbles: ['Świetnie! Bawimy się dalej.', '<img src="/las/c/i/rze-wsz/tumblr_myw0w7EBOA1t361sto1_400.gif" />'],
      autoNext: 'RANDOM'
    },


    laerer1: {
      bubbles: ['<q>Nauczyciel</q> określony?'],
      answers: [
        { answer: '<i>læreren</i>', next: 'laerer2' },
        { answer: '<i>lærer</i>', next: 'laerer1b' }
      ]

    },
    laerer1b: {
      bubbles: ['Musi być z końcówką określoną. Dlatego...'],
      answers: [
        { answer: '<i>læreren</i>', next: 'laerer2' }
      ]
    },
    laerer2: {
      bubbles: ['Brawo!', '<img src="/las/c/i/rze-wsz/StQCmtZt4GvqE.gif" />'],
      autoNext: 'RANDOM'
    },


    politi1: {
      bubbles: ['<q>Policja</q> #emoji-1f694; #emoji-1f52b; określona to:'],
      answers: [
        { answer: '<i>politi</i>', next: 'politi1b' },
        { answer: '<i>politiet</i>', next: 'politi2' }
      ]

    },
    politi1b: {
      bubbles: ['Musi być z końcówką odpowiednią dla rodzaju <i>et</i>, czyli...'],
      answers: [
        { answer: '<i>politiet</i>', next: 'politi2' }
      ]
    },
    politi2: {
      bubbles: ['<img src="/las/c/i/rze-wsz/NJXDSvnpx21.gif" />'],
      autoNext: 'RANDOM'
    },


    historie1: {
      bubbles: ['<q>Historia</q> nieokreślona?'],
      answers: [
        { answer: '<i>ei historie</i>', next: 'historie2' },
        { answer: '<i>ei historia</i>', next: 'historie1b' }
      ]

    },
    historie1b: {
      bubbles: ['<i>Historia</i> to jedna, określona. W nieokreślonej będzie...'],
      answers: [
        { answer: '<i>ei historie</i>', next: 'historie2' }
      ]
    },
    historie2: {
      bubbles: ['Może tak być.', '<img src="/las/c/i/rze-wsz/EF4UWro.gif" />'],
      autoNext: 'RANDOM'
    },


    vinner1: {
      bubbles: ['<q>Zwycięzca</q> #emoji-1f3c5; określony?'],
      answers: [
        { answer: '<i>vinner</i>', next: 'vinner1b' },
        { answer: '<i>vinneren</i>', next: 'vinner2' }
      ]

    },
    vinner1b: {
      bubbles: ['Końcówka <i>-er</i> jest w liczbie mnogiej. W pojedynczej zwycięzca jest tylko jeden:'],
      answers: [
        { answer: '<i>vinneren</i>', next: 'vinner2' }
      ]
    },
    vinner2: {
      bubbles: ['<img src="/las/c/i/rze-wsz/26ght2GFICFOl41Ak.gif" />'],
      autoNext: 'RANDOM'
    },


    finalen1: {
      bubbles: ['Jesteś tu jeszcze?', '<img src="/las/c/i/rze-wsz/GxRJqOTR2vv0Y.gif" />'],
      answers: [
        { answer: 'jestem', next: 'finalen2' }
      ]
    },
    finalen2: {
      bubbles: ['To dobrze, bo teraz kolejny etap. Zbliżamy się do finału.'],
      autoNext: 'RANDOM'
    },


    gang1: {
      bubbles: ['Jeden <q>korytarz</q> albo <q>raz</q>?'],
      answers: [
        { answer: '<i>en gang</i>', next: 'gang2' },
        { answer: '<i>ei gang</i>', next: 'gang1b' }
      ]

    },
    gang1b: {
      bubbles: ['<i>en gang – gangen – ganger – gangene</i>', 'To jaki rodzajnik?'],
      answers: [
        { answer: '<i>en gang</i>', next: 'gang2' }
      ]
    },
    gang2: {
      bubbles: ['<i>Veldig godt!</i> Tylko w którą stronę pójdziesz?', '<img src="/las/c/i/rze-wsz/KnXkh8WI2WCJO.gif" />'],
      autoNext: 'RANDOM'
    },


    tid1: {
      bubbles: ['<q>Czas</q> #emoji-23f1; określony?'],
      answers: [
        { answer: '<i>tid</i>', next: 'tid1b' },
        { answer: '<i>tida</i>', next: 'tid2' }
      ]

    },
    tid1b: {
      bubbles: ['<i>Tid</i> to nieokreślony czas. Np. <i>tid til å tenke</i> – czas na myślenie.', 'Ale: <i>tida flyr!</i> – czas leci.'],
      answers: [
        { answer: 'OK, <i>tida</i>', next: 'tid2' }
      ]
    },
    tid2: {
      bubbles: ['<i>Veldig bra!</i>'],
      autoNext: 'RANDOM'
    },


    morgen1: {
      bubbles: ['Jak będą określone <q>poranki</q>?'],
      answers: [
        { answer: '<i>morgenene</i>', next: 'morgen2' },
        { answer: '<i>morgene</i>', next: 'morgen1b' }
      ]

    },
    morgen1b: {
      bubbles: ['To wymaga uwagi i przećwiczenia wymowy:', '<i>en morgen – morgenen – morgener – morgenene</i>'],
      answers: [
        { answer: '<i>morgenene</i>', next: 'morgen2' }
      ]
    },
    morgen2: {
      bubbles: ['<i>Bra!</i>', '<img src="/las/c/i/rze-wsz/mNg6J8yQ3wRVK.gif" />'],
      autoNext: 'RANDOM'
    },


    modre1: {
      bubbles: ['<q>Matki</q> nieokreślone? #emoji-1f469-1f469-1f467-1f466;'],
      answers: [
        { answer: '<i>mødre</i>', next: 'modre2' },
        { answer: '<i>mødrene</i>', next: 'modre1b' }
      ]

    },
    modre1b: {
      bubbles: ['Matki są wyjątkowe:', '<i>ei mor – mora – mødre – mødrene</i>', 'Dlatego nie określone to...'],
      answers: [
        { answer: '<i>mødre</i>', next: 'modre2' }
      ]
    },
    modre2: {
      bubbles: ['<i>Flott!</i>'],
      autoNext: 'RANDOM'
    },


    fedrene1: {
      bubbles: ['<q>Ojcowie</q> #emoji-1f468-2764-1f468; określeni?'],
      answers: [
        { answer: '<i>fedre</i>', next: 'fedrene1b' },
        { answer: '<i>fedrene</i>', next: 'fedrene2' }
      ]

    },
    fedrene1b: {
      bubbles: ['<i>en far – faren – fedre – fedrene</i>', 'Wyjątek, co?'],
      answers: [
        { answer: '<i>fedrene</i>', next: 'fedrene2' }
      ]
    },
    fedrene2: {
      bubbles: ['<i>Jøss!</i>'],
      autoNext: 'RANDOM'
    },


    kvelder1: {
      bubbles: ['Nieokreślone <q>wieczory</q>?'],
      answers: [
        { answer: '<i>kvelder</i>', next: 'kvelder2' },
        { answer: '<i>kveld</i>', next: 'kvelder1b' }
      ]

    },
    kvelder1b: {
      bubbles: ['Jest <i>en kveld</i>, więc śmiało dodajemy końcówkę <i>-er</i> w liczbie mnogiej.'],
      answers: [
        { answer: 'OK, <i>kvelder</i>', next: 'kvelder2' }
      ]
    },
    kvelder2: {
      bubbles: ['<i>Ha en hyggelig kveld!</i>', '<img src="/las/c/i/rze-wsz/1kTH8ButyMnYs.gif" />'],
      autoNext: 'RANDOM'
    },


    steder1: {
      bubbles: ['<q>Wiele miejsc</q> #emoji-1f5fa; to:'],
      answers: [
        { answer: '<i>mange steder</i>', next: 'steder2' },
        { answer: '<i>mye steder</i>', next: 'steder1b' }
      ]

    },
    steder1b: {
      bubbles: ['Kiedy masz końcówkę <i>-er</i>, to z pewnością jest to coś policzalnego: 1, 2, 3... miejsca. Dla policzalnych jest <i>mange</i>. Dla niepoliczalnych <i>mye</i>.'],
      answers: [
        { answer: '<i>mange steder</i>', next: 'steder2' }
      ]
    },
    steder2: {
      bubbles: ['Tak. #emoji-1f642;'],
      autoNext: 'RANDOM'
    },


    guder1: {
      bubbles: ['Nieokreśleni <q>bogowie</q>?'],
      answers: [
        { answer: '<i>guder</i>', next: 'guder2' },
        { answer: '<i>Gud</i>', next: 'guder1b' }
      ]

    },
    guder1b: {
      bubbles: ['<i>en gud – guden – guder – gudene</i>', 'Dlatego...'],
      answers: [
        { answer: '<i>guder</i>', next: 'guder2' }
      ]
    },
    guder2: {
      bubbles: ['Lepiej z nimi nie zadzieraj.', '<img src="/las/c/i/rze-wsz/a8weqme-460sa.gif" />'],
      autoNext: 'RANDOM'
    },


    feil1: {
      bubbles: ['Jak powiedzieć <q>kilka błędów</q>?'],
      answers: [
        { answer: '<i>noen feil</i>', next: 'feil2' },
        { answer: '<i>noen feils</i>', next: 'feil1b' }
      ]

    },
    feil1b: {
      bubbles: ['<i>-s</i> dodajemy po angielsku, jak w...', '<img src="/las/c/i/rze-wsz/abf918a8d7e74da0cd8280037171f277.gif" />', 'A norweskie <i>feil</i> jest wyjątkiem:', '<i>en feil – feilen – feil – feilene</i>'],
      answers: [
        { answer: '<i>noen feil</i>', next: 'feil2' }
      ]
    },
    feil2: {
      bubbles: ['<i>Riktig svar!</i>', '<img src="/las/c/i/rze-wsz/5M94d.gif" />'],
      autoNext: 'RANDOM'
    },


    veier1: {
      bubbles: ['Nieokreślone #emoji-1f6e3; <q>drogi</q>?'],
      answers: [
        { answer: '<i>vei</i>', next: 'veier1b' },
        { answer: '<i>veier</i>', next: 'veier2' }
      ]

    },
    veier1b: {
      bubbles: ['Tu się nic dziwnego nie dzieje:', '<i>en vei – veien – veier – veiene</i>', 'Więc w liczbie mnogiej nieokreślonej będzie:'],
      answers: [
        { answer: '<i>veier</i>', next: 'veier2' }
      ]
    },
    veier2: {
      bubbles: ['<i>Nydelig!</i>', '<img src="/las/c/i/rze-wsz/obeFfKertEkBa.gif" />'],
      autoNext: 'RANDOM'
    },


    navn1: {
      bubbles: ['<q>Nazwa</q> lub <q>imię</q>?'],
      answers: [
        { answer: '<i>en navn</i>', next: 'navn1b' },
        { answer: '<i>et navn</i>', next: 'navn2' }
      ]

    },
    navn1b: {
      bubbles: ['Jednosylabowy <i>et</i>:', '<i>et navn – navnet – navn – navnene</i>'],
      answers: [
        { answer: 'OK, <i>et navn</i>', next: 'navn2' }
      ]
    },
    navn2: {
      bubbles: ['<i>Riktig!</i>', '<img src="/las/c/i/rze-wsz/3oEjHNCWpx4iQYytAA.gif" />'],
      autoNext: 'RANDOM'
    },


    hav1: {
      bubbles: ['Określone <q>morze</q> albo <q>ocean</q>?'],
      answers: [
        { answer: '<i>havet</i>', next: 'hav2' },
        { answer: '<i>hava</i>', next: 'hav1b' }
      ]

    },
    hav1b: {
      bubbles: ['Jednosylabowy <i>et</i>:', '<i>et hav – havet – hav – havene</i>', 'W formie określonej po prostu...'],
      answers: [
        { answer: '<i>havet</i>', next: 'hav2' }
      ]
    },
    hav2: {
      bubbles: ['<i>Imponerende!</i>', '<img src="/las/c/i/rze-wsz/l41m1a8cuTkchgHfy.gif" />'],
      autoNext: 'RANDOM'
    },


    jobb1: {
      bubbles: ['Określona <q>praca</q>?'],
      answers: [
        { answer: '<i>jobben</i>', next: 'jobb2' },
        { answer: '<i>et arbeid</i>', next: 'jobb1b' }
      ]

    },
    jobb1b: {
      bubbles: ['Czy może być rodzajnik z przodu, gdy mowa o formie okreslonej?', '<i>en jobb – jobben</i>'],
      answers: [
        { answer: '<i>jobben</i>', next: 'jobb2' }
      ]
    },
    jobb2: {
      bubbles: ['<i>Fint!</i> #emoji-1f6e0;#emoji-1f4b0;'],
      autoNext: 'RANDOM'
    },


    del1: {
      bubbles: ['Nieokreślone <q>części</q>?'],
      answers: [
        { answer: '<i>deler</i>', next: 'del2' },
        { answer: '<i>dealer</i>', next: 'del1b' }
      ]

    },
    del1b: {
      bubbles: ['<img src="/las/c/i/rze-wsz/11uPwtlLq91Rni.gif" />', 'Oj, nie tędy droga. Miało być o częściach:', '<i>en del – delen – deler – delene</i>', 'Więc, nieokreślone części to...'],
      answers: [
        { answer: '<i>deler</i>', next: 'del2' }
      ]
    },
    del2: {
      bubbles: ['<i>Så lurt!</i>'],
      autoNext: 'RANDOM'
    },


    ord1: {
      bubbles: ['Nieokreślone <q>słowo</q>?'],
      answers: [
        { answer: '<i>et ord</i>', next: 'ord2' },
        { answer: '<i>ei ord</i>', next: 'ord1b' }
      ]

    },
    ord1b: {
      bubbles: ['Jednak <i>et</i>. I na dodatek jednosylabowy.', '<i>et ord – ordet – ord – ordene</i>'],
      answers: [
        { answer: '<i>et ord</i>', next: 'ord2' }
      ]
    },
    ord2: {
      bubbles: ['<i>Utrolig!</i> #emoji-1f638;'],
      autoNext: 'RANDOM'
    },


    time1: {
      bubbles: ['Jedna <q>godzina</q> #emoji-1f570; to:'],
      answers: [
        { answer: '<i>en time</i>', next: 'time2' },
        { answer: '<i>ei tid</i>', next: 'time1b' }
      ]

    },
    time1b: {
      bubbles: ['<i>(Ei) tid</i> to czas. Jedna godzina to: <i>en time</i>, a dwie godziny: <i>to timer</i>.'],
      answers: [
        { answer: 'OK, <i>en time</i>', next: 'time2' }
      ]
    },
    time2: {
      bubbles: ['<i>Utmerket!</i>'],
      autoNext: 'RANDOM'
    },


    moete1: {
      bubbles: ['Nieokreślone <q>spotkanie</q>, <q>zebranie</q>?'],
      answers: [
        { answer: '<i>et møte</i>', next: 'moete2' },
        { answer: '<i>en måte</i>', next: 'moete1b' }
      ]

    },
    moete1b: {
      bubbles: ['<i>En måte</i> to sposób. Spotkanie to:'],
      answers: [
        { answer: '<i>et møte</i>', next: 'moete2' }
      ]
    },
    moete2: {
      bubbles: ['<i>Kjempefint!</i>', '<img src="/las/c/i/rze-wsz/YC6ZedMDgR1Fm.gif" />'],
      autoNext: 'RANDOM'
    },


    problem1: {
      bubbles: ['<q>Problem</q>, jakiś dowolny? #emoji-1f415;#emoji-1f4a9;'],
      answers: [
        { answer: '<i>et problem</i>', next: 'problem2' },
        { answer: '<i>ei problem</i>', next: 'problem1b' }
      ]

    },
    problem1b: {
      bubbles: ['Jednak <i>et</i>. Nie zapominaj o rodzajniku.'],
      answers: [
        { answer: '<i>et problem</i>', next: 'problem2' }
      ]
    },
    problem2: {
      bubbles: ['<i>Kjempegodt!</i>', '<img src="/las/c/i/rze-wsz/fmVbF5EpioNPy.gif" />'],
      autoNext: 'RANDOM'
    },


    rom1: {
      bubbles: ['Określony <q>pokój</q> #emoji-1f6cb; lub <q>przestrzeń</q>? #emoji-1f6f0;'],
      answers: [
        { answer: '<i>romet</i>', next: 'rom1b' },
        { answer: '<i>rommet</i>', next: 'rom2' }
      ]

    },
    rom1b: {
      bubbles: ['Podwajamy <i>m</i> w formie określonej.', '<i>et rom – rommet</i>', 'Takich słów spotkasz więcej. Np. kałuża: <i>en dam – dammen</i>.', 'Dlatego określony pokój to...'],
      answers: [
        { answer: '<i>rommet</i>', next: 'rom2' }
      ]
    },
    rom2: {
      bubbles: ['<i>Perfekt!</i>', '<img src="/las/c/i/rze-wsz/UmVFuejI8ntew.gif" />'],
      autoNext: 'RANDOM'
    },


    uke1: {
      bubbles: ['Określone <q>tygodnie</q>?'],
      answers: [
        { answer: '<i>ukene</i>', next: 'uke2' },
        { answer: '<i>veker</i>', next: 'uke1b' }
      ]

    },
    uke1b: {
      bubbles: ['W określonej mnogiej zawsze końcówka <i>-ene</i>'],
      answers: [
        { answer: '<i>ukene</i>', next: 'uke2' }
      ]
    },
    uke2: {
      bubbles: ['Raz w tygodniu warto zrobić trening.', '<img src="/las/c/i/rze-wsz/Mw1EyMExatybS.gif" />'],
      autoNext: 'RANDOM'
    },




    skole1: {
      bubbles: ['Jakaś dowolna <q>szkoła</q>?'],
      answers: [
        { answer: '<i>en skole</i>', next: 'skole2' },
        { answer: '<i>en skolen</i>', next: 'skole1b' }
      ]

    },
    skole1b: {
      bubbles: ['Nie może być jednocześnie rodzajnik z przodu i końcówka określona z tyłu. Nigdzie takiej formy nie spotkasz.'],
      answers: [
        { answer: 'OK, <i>en skole</i>', next: 'skole2' }
      ]
    },
    skole2: {
      bubbles: ['<i>Fint!</i>', '<img src="/las/c/i/rze-wsz/zr6jd.gif" />'],
      autoNext: 'RANDOM'
    },


    maaned1: {
      bubbles: ['Określony <q>miesiąc</q>? #emoji-1f315;'],
      answers: [
        { answer: '<i>månen</i>', next: 'maaned1b' },
        { answer: '<i>måneden</i>', next: 'maaned2' }
      ]

    },
    maaned1b: {
      bubbles: ['Zerknij na całość:', '<i>en måned – måneden – måneder – månedene</i>', 'Który to określony?'],
      answers: [
        { answer: '<i>måneden</i>', next: 'maaned2' }
      ]
    },
    maaned2: {
      bubbles: ['<i>Supert!</i>'],
      autoNext: 'RANDOM'
    },


    vaapen1: {
      bubbles: ['<q>Broń</q> #emoji-1f52b;#emoji-1f5e1;#emoji-26cf; w liczbie mnogiej nieokreślonej?'],
      answers: [
        { answer: '<i>våpen</i>', next: 'vaapen2' },
        { answer: '<i>våpnene</i>', next: 'vaapen1b' }
      ]

    },
    vaapen1b: {
      bubbles: ['To było trudniejsze, co? <i>-ene</i> odpada, bo to forma określona, ale czemu nie ma <i>-er</i>? Dobre pytanie.', '<i>en våpen – våpenet – våpen – våpnene</i>'],
      answers: [
        { answer: 'czyli <i>våpen</i>', next: 'vaapen2' }
      ]
    },
    vaapen2: {
      bubbles: ['Zastrzeliłeś mnie!', '<img src="/las/c/i/rze-wsz/OmBhM.gif" />'],
      autoNext: 'RANDOM'
    },


    tale1: {
      bubbles: ['Norwegowie lubią długie przemowy na uroczystościach. Jak są określone <q>przemowy</q>?'],
      answers: [
        { answer: '<i>taler</i>', next: 'tale1b' },
        { answer: '<i>talene</i>', next: 'tale2' }
      ]

    },
    tale1b: {
      bubbles: ['<i>en tale – talen – taler – talene</i>', 'Nic dziwnego z tym słowem się nie dzieje.'],
      answers: [
        { answer: '<i>talene</i>', next: 'tale2' }
      ]
    },
    tale2: {
      bubbles: ['Muszę powiedzieć, że dajesz radę.', '<img src="/las/c/i/rze-wsz/mtlwOSac6agE0.gif" />'],
      autoNext: 'RANDOM'
    },


    blod1: {
      bubbles: ['Czy możemy zrobić liczbę mnogą od słowa <q>krew</q>, czyli <i>blod</i>? #emoji-1f489;'],
      answers: [
        { answer: 'tak', next: 'blod1b' },
        { answer: 'nie', next: 'blod2' }
      ]

    },
    blod1b: {
      bubbles: ['Krew po norwesku jest niepoliczalna. Nie powiesz jedna krew, dwie krwie... czy coś podobnego. Czy możesz więc zrobić liczbę mnogą? Nie.'],
      answers: [
        { answer: 'OK', next: 'blod2' }
      ]
    },
    blod2: {
      bubbles: ['Słusznie.'],
      autoNext: 'RANDOM'
    },


    land1: {
      bubbles: ['Jak są po norwesku <q>kraje</q>, nieokreślone?'],
      answers: [
        { answer: '<i>land</i>', next: 'land2' },
        { answer: '<i>lander</i>', next: 'land1b' }
      ]

    },
    land1b: {
      bubbles: ['<i>et land – landet – land – landene</i>', 'Jak widzisz to słowo jest jednosylabowe rodzaju <i>et</i> i dlatego nie otrzymuje już końcówki <i>-er</i>.'],
      answers: [
        { answer: 'OK, <i>land</i>', next: 'land2' }
      ]
    },
    land2: {
      bubbles: ['Dobrze.', 'A przy okazji, <q>kraje nordyckie</q> to po norwesku <i>Norden</i>.', '#emoji-1f1e7-1f1fb;#emoji-1f1e9-1f1f0;#emoji-1f1f8-1f1ea;#emoji-1f1e9-1f1f0;#emoji-1f1eb-1f1ee;#emoji-1f1eb-1f1f4;#emoji-1f1ee-1f1f8;#emoji-1f1e6-1f1fd;#emoji-1f1ec-1f1f1;'],
      autoNext: 'RANDOM'
    },


    bord1: {
      bubbles: ['Jak jest nieokreślony <q>stół</q>?'],
      answers: [
        { answer: '<i>et bord</i>', next: 'bord2' },
        { answer: '<i>en stol</i>', next: 'bord1b' }
      ]

    },
    bord1b: {
      bubbles: ['<i>En stol</i> to krzesło, a stół?'],
      answers: [
        { answer: '<i>et bord</i>', next: 'bord2' }
      ]
    },
    bord2: {
      bubbles: ['OK', '<img src="/las/c/i/rze-wsz/10ZoZ6owAU8Bnq.gif" />'],
      autoNext: 'RANDOM'
    },


    krig1: {
      bubbles: ['Na świecie jest teraz wiele wojen. Jak są <q>wojny</q>, nieokreślone?'],
      answers: [
        { answer: '<i>kriger</i>', next: 'krig2' },
        { answer: '<i>krigene</i>', next: 'krig1b' }
      ]

    },
    krig1b: {
      bubbles: ['<i>Krigene</i> to określone wojny. Niestety. Nieokreślone to...'],
      answers: [
        { answer: '<i>kriger</i>', next: 'krig2' }
      ]
    },
    krig2: {
      bubbles: ['Dobra odpowiedź.', '<img src="/las/c/i/rze-wsz/XPmEZedldC1QA.gif" />'],
      autoNext: 'RANDOM'
    },


    pris1: {
      bubbles: ['Jak są określone ceny?'],
      answers: [
        { answer: '<i>priser</i>', next: 'pris1b' },
        { answer: '<i>prisene</i>', next: 'pris2' }
      ]

    },
    pris1b: {
      bubbles: ['<i>en pris – prisen – priser – prisene</i>', 'W liczbie mnogiej określonej zawsze <i>-ene</i>.'],
      answers: [
        { answer: '<i>prisene</i>', next: 'pris2' }
      ]
    },
    pris2: {
      bubbles: ['#emoji-263a;'],
      autoNext: 'RANDOM'
    },


    hjerte1: {
      bubbles: ['Jak jest <q>serce</q>? Określone.'],
      answers: [
        { answer: '<i>hjertet</i>', next: 'hjerte2' },
        { answer: '<i>hjernen</i>', next: 'hjerte1b' }
      ]

    },
    hjerte1b: {
      bubbles: ['<i>En hjerne</i> to mózg. <i>Et hjerte</i> to serce. A określone?'],
      answers: [
        { answer: '<i>hjertet</i>', next: 'hjerte2' }
      ]
    },
    hjerte2: {
      bubbles: ['#emoji-2764; #emoji-2764; #emoji-2764;', '<img src="/las/c/i/rze-wsz/szCjFvyBhXPYk.gif" />'],
      autoNext: 'RANDOM'
    },


    klokke1: {
      bubbles: ['<q>Zegar</q>, <q>zegarek</q> #emoji-231a; nieokreślony to:'],
      answers: [
        { answer: '<i>ei klokka</i>', next: 'klokke1b' },
        { answer: '<i>ei klokke</i>', next: 'klokke2' }
      ]

    },
    klokke1b: {
      bubbles: ['Zobacz: <i>ei klokke – klokka – klokker – klokkene</i>', 'Dlatego...'],
      answers: [
        { answer: '<i>ei klokke</i>', next: 'klokke2' }
      ]
    },
    klokke2: {
      bubbles: ['<i>Riktig!</i>', '<img src="/las/c/i/rze-wsz/IX89WTEnYgvM4.gif" />'],
      autoNext: 'RANDOM'
    },


    person1: {
      bubbles: ['Określona <q>osoba</q>? #emoji-1f470-1f3fb; #emoji-1f448-1f3fc;'],
      answers: [
        { answer: '<i>personer</i>', next: 'person1b' },
        { answer: '<i>personen</i>', next: 'person2' }
      ]

    },
    person1b: {
      bubbles: ['<i>Personer</i> to osoby, bo w liczbie mnogiej jest końcówka <i>-er</i>.', 'W pojedynczej masz do wyboru: <i>en person – personen</i>. Która jest określona?'],
      answers: [
        { answer: '<i>personen</i>', next: 'person2' }
      ]
    },
    person2: {
      bubbles: ['<i>Fint!</i>', '<img src="/las/c/i/rze-wsz/w9WS1R9ZAA1Ik.gif" />'],
      autoNext: 'RANDOM'
    },


    oel1: {
      bubbles: ['Kiedy zamawiasz jedno <q>piwo</q>, to mówisz:'],
      answers: [
        { answer: '<i>en øl</i>', next: 'oel2' },
        { answer: '<i>øl</i>', next: 'oel2' }
      ]

    },
    oel1b: {
      bubbles: ['Rodzajniki <i>en, ei, et</i> oznaczają jedną sztukę. Dlatego...'],
      answers: [
        { answer: '<i>en øl</i>', next: 'oel2' }
      ]
    },
    oel2: {
      bubbles: ['<i>Så flink du er!</i>'],
      autoNext: 'RANDOM'
    },


    ting1: {
      bubbles: ['<q>Rzeczy</q> bliżej nieokreślone #emoji-1f459;#emoji-1f452;#emoji-1f48d; to:'],
      answers: [
        { answer: '<i>ting</i>', next: 'ting2' },
        { answer: '<i>tinger</i>', next: 'ting1b' }
      ]

    },
    ting1b: {
      bubbles: ['Zobacz, to wyjątek:', '<i>en ting – tingen – ting – tingene</i>', 'To jak są jakieś <q>rzeczy</q>?'],
      answers: [
        { answer: '<i>ting</i>', next: 'ting2' }
      ]
    },
    ting2: {
      bubbles: ['<i>Uten feil!</i>'],
      autoNext: 'RANDOM'
    },


    konge1: {
      bubbles: ['<q>Król</q> #emoji-1f451; określony?'],
      answers: [
        { answer: '<i>kongen</i>', next: 'konge2' },
        { answer: '<i>King Kong</i>', next: 'konge1b' }
      ]

    },
    konge1b: {
      bubbles: ['<img src="/las/c/i/rze-wsz/3oEdv9Xaqm76AzUsvu.gif" />'],
      answers: [
        { answer: '<i>kongen</i>', next: 'konge2' }
      ]
    },
    konge2: {
      bubbles: ['<i>Det er helt konge!</i>', '<img src="/las/c/i/rze-wsz/jT698wBbaJX8c.gif" />'],
      autoNext: 'RANDOM'
    },


    eier1: {
      bubbles: ['<q>Właściciele</q> określeni?'],
      answers: [
        { answer: '<i>eiere</i>', next: 'eier1b' },
        { answer: '<i>eierne</i>', next: 'eier2' }
      ]

    },
    eier1b: {
      bubbles: ['<i>en eier – eieren – eiere – eierne</i>', 'Określeni to?'],
      answers: [
        { answer: '<i>eierne</i>', next: 'eier2' }
      ]
    },
    eier2: {
      bubbles: ['<i>Yes!</i> #emoji-1f474-1f3fb;#emoji-1f475-1f3fb;'],
      autoNext: 'RANDOM'
    },


    hjerne1: {
      bubbles: ['<q>Mózg</q> nieokreślony?'],
      answers: [
        { answer: '<i>en hjerne</i>', next: 'hjerne2' },
        { answer: '<i>en hjern</i>', next: 'hjerne1b' }
      ]

    },
    hjerne1b: {
      bubbles: ['<i>en hjerne – hjernen – hjerner – hjernene</i>', 'Więc?'],
      answers: [
        { answer: '<i>en hjerne</i>', next: 'hjerne2' }
      ]
    },
    hjerne2: {
      bubbles: ['Jest OK!', '<img src="/las/c/i/rze-wsz/tumblr_mvspokcAed1t0uxv8o1_250.gif" />'],
      autoNext: 'RANDOM'
    },


    tegn1: {
      bubbles: ['<q>Znak</q> #emoji-2622; nieokreślony? '],
      answers: [
        { answer: '<i>et tegn</i>', next: 'tegn2' },
        { answer: '<i>et tegne</i>', next: 'tegn1b' }
      ]

    },
    tegn1b: {
      bubbles: ['<i>et tegn – tegnet – tegn – tegnene</i>'],
      answers: [
        { answer: 'Aha, <i>et tegn</i>', next: 'tegn2' }
      ]
    },
    tegn2: {
      bubbles: ['<i>Godt.</i>'],
      autoNext: 'RANDOM'
    },


    svin1: {
      bubbles: ['<q>Świnia</q> #emoji-1f43d; nieokreślona? No co, też popularne słowo.'],
      answers: [
        { answer: '<i>et svin</i>', next: 'svin2' },
        { answer: '<i>et svina</i>', next: 'svin1b' }
      ]

    },
    svin1b: {
      bubbles: ['<i>et svin – svinet – svin – svinene</i>', 'To jak będą dwie świnie?', '<i>To svin</i>.', 'A jedna?'],
      answers: [
        { answer: '<i>et svin</i>', next: 'svin2' }
      ]
    },
    svin2: {
      bubbles: ['<img src="/las/c/i/rze-wsz/U8Mn2NSL6OR0Y.gif" />', 'Dobrze. A <i>et pinnsvin</i>? To oczywiście:', '<img src="/las/c/i/rze-wsz/hedgehog476r-2.gif" />'],
      autoNext: 'RANDOM'
    },


    tak1: {
      bubbles: ['Jak będą <q>dachy</q> lub <q>sufity</q> w formie nieokreślonej?'],
      answers: [
        { answer: '<i>takk</i>', next: 'tak1b' },
        { answer: '<i>tak</i>', next: 'tak2' }
      ]

    },
    tak1b: {
      bubbles: ['Dach odmieniamy tak:', '<i>et tak – taket – tak – takene</i>'],
      answers: [
        { answer: '<i>tak</i>', next: 'tak2' }
      ]
    },
    tak2: {
      bubbles: ['OK. <i>Takk for svaret</i>!', '<img src="/las/c/i/rze-wsz/XD0udYYcgeVRS.gif" />'],
      autoNext: 'RANDOM'
    },


    bad1: {
      bubbles: ['<q>Łazienka</q> lub <q>kąpiel</q> określona? #emoji-1f6c1;'],
      answers: [
        { answer: '<i>et bad</i>', next: 'bad1b' },
        { answer: '<i>badet</i>', next: 'bad2' }
      ]

    },
    bad1b: {
      bubbles: ['Rodzajnik z przodu oznacza zawsze formę nieokreśloną. Dlatego prawidłowo jest...'],
      answers: [
        { answer: '<i>badet</i>', next: 'bad2' }
      ]
    },
    bad2: {
      bubbles: ['<i>Korrekt!</i>', '<img src="/las/c/i/rze-wsz/ivMHHIEAG86t2.gif" />'],
      autoNext: 'RANDOM'
    },


    sykehus1: {
      bubbles: ['Nieokreślone <q>szpitale</q>?'],
      answers: [
        { answer: '<i>sykehuser</i>', next: 'sykehus1b' },
        { answer: '<i>sykehus</i>', next: 'sykehus2' }
      ]

    },
    sykehus1b: {
      bubbles: ['Pamiętasz jak odmieniamy dom?', '<i>et hus – huset – hus – husene</i>', 'Szpital odmieniamy tak samo. Ostatni człon jest jednosylabowy, rodzaju <i>et</i> i dlatego nie otrzymuje koncówki <i>-er</i>.'],
      answers: [
        { answer: '<i>sykehus</i>', next: 'sykehus2' }
      ]
    },
    sykehus2: {
      bubbles: ['<i>Riktig!</i>', '<img src="/las/c/i/rze-wsz/Scrubs-JD-pours-Kittens-on-Patient.gif" />'],
      autoNext: 'RANDOM'
    },


    kropp1: {
      bubbles: ['<q>Ciało</q> w formie określonej?'],
      answers: [
        { answer: '<i>koppen</i>', next: 'kropp1b' },
        { answer: '<i>kroppen</i>', next: 'kropp2' }
      ]

    },
    kropp1b: {
      bubbles: ['Wybrałeś #emoji-2615;', 'Ciało to <i>en kropp</i>, a w formie określonej...'],
      answers: [
        { answer: '<i>kroppen</i>', next: 'kropp2' }
      ]
    },
    kropp2: {
      bubbles: ['<i>Uten feil!</i>', '<img src="/las/c/i/rze-wsz/Dkv7sJS.gif" />'],
      autoNext: 'RANDOM'
    },


    jorda1: {
      bubbles: ['<q>Ziemia</q> #emoji-1f30d;, <q>gleba</q> określona?'],
      answers: [
        { answer: '<i>jorda</i>', next: 'jorda2' },
        { answer: '<i>jord</i>', next: 'jorda1b' }
      ]

    },
    jorda1b: {
      bubbles: ['Zabrakło końcówki odpowiedniej dla rodzaju <i>ei</i> Czyli?'],
      answers: [
        { answer: '<i>jorda</i>', next: 'jorda2' }
      ]
    },
    jorda2: {
      bubbles: ['Tak! Pędzimy dalej!', '<img src="/las/c/i/rze-wsz/toaC2uZnfTiWk.gif" />'],
      autoNext: 'RANDOM'
    },


    sjanse1: {
      bubbles: ['<q>Szansa</q> określona?'],
      answers: [
        { answer: '<i>sjansen</i>', next: 'sjanse2' },
        { answer: '<i>sjansa</i>', next: 'sjanse1b' }
      ]

    },
    sjanse1b: {
      bubbles: ['Nie ma więcej opcji poza:', '<i>en sjanse – sjansen – sjanser – sjansene</i>', 'Która jest określona?'],
      answers: [
        { answer: '<i>sjansen</i>', next: 'sjanse2' }
      ]
    },
    sjanse2: {
      bubbles: ['<i>Det var en god jobb!</i> (To była dobra robota!)', '<img src="/las/c/i/rze-wsz/3osxY8yHdijYBl6p2w.gif" />'],
      autoNext: 'RANDOM'
    },


    forelder1: {
      bubbles: ['<q>Rodzic</q> nieokreślony?'],
      answers: [
        { answer: '<i>en forelder</i>', next: 'forelder2' },
        { answer: '<i>fordeler</i>', next: 'forelder1b' }
      ]

    },
    forelder1b: {
      bubbles: ['<i>Fordeler</i> to <q>zalety</q>. A rodzic?'],
      answers: [
        { answer: '<i>en forelder</i>', next: 'forelder2' }
      ]
    },
    forelder2: {
      bubbles: ['<i>Det var bra!</i>', '<img src="/las/c/i/rze-wsz/original-2-roundround.gif" />'],
      autoNext: 'RANDOM'
    },


    lege1: {
      bubbles: ['<q>Lekarz</q> określony?'],
      answers: [
        { answer: '<i>en lege</i>', next: 'lege1b' },
        { answer: '<i>legen</i>', next: 'lege2' }
      ]

    },
    lege1b: {
      bubbles: ['<img src="/las/c/i/rze-wsz/UzHxxqF1WO6UE.gif" />', 'Określony z rodzajnikiem? Coś nie tak...'],
      answers: [
        { answer: '<i>legen</i>', next: 'lege2' }
      ]
    },
    lege2: {
      bubbles: ['Mhmm', '<img src="/las/c/i/rze-wsz/tumblr_m3viuiMFVr1ru06ato1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    saker1: {
      bubbles: ['<q>Sprawy</q> nieokreślone?'],
      answers: [
        { answer: '<i>saken</i>', next: 'saker1b' },
        { answer: '<i>saker</i>', next: 'saker2' }
      ]

    },
    saker1b: {
      bubbles: ['W liczbie mnogiej końcówka <i>-er</i>.'],
      answers: [
        { answer: '<i>saker</i>', next: 'saker2' }
      ]
    },
    saker2: {
      bubbles: ['Zgadza się.', '<img src="/las/c/i/rze-wsz/n6M6H9R0474ty.gif" />'],
      autoNext: 'RANDOM'
    },


    skade1: {
      bubbles: ['<q>Krzywdy</q>, <q>rany</q>, <q>szkody</q> określone?'],
      answers: [
        { answer: '<i>skadene</i>', next: 'skade2' },
        { answer: '<i>skader</i>', next: 'skade1b' }
      ]

    },
    skade1b: {
      bubbles: ['Końcówka <i>-er</i> jest dla nieokreślsonej. Dla określonej jest <i>-ene</i>. Dlatego...'],
      answers: [
        { answer: '<i>skadene</i>', next: 'skade2' }
      ]
    },
    skade2: {
      bubbles: ['<img src="/las/c/i/rze-wsz/13ZHjidRzoi7n2.gif" />'],
      autoNext: 'RANDOM'
    },


    peolse1: {
      bubbles: ['<q>Kiełbasy</q>, <q>parówki</q> nieokreślone?'],
      answers: [
        { answer: '<i>pølsa</i>', next: 'peolse1b' },
        { answer: '<i>pølser</i>', next: 'peolse2' }
      ]

    },
    peolse1b: {
      bubbles: ['<i>Pølsa</i> to jedna, konkret parówa. Jeśli chcesz kilka, to mówisz...'],
      answers: [
        { answer: '<i>pølser</i>', next: 'peolse2' }
      ]
    },
    peolse2: {
      bubbles: ['<img src="/las/c/i/rze-wsz/xNk979fe8QFck.gif" />'],
      autoNext: 'RANDOM'
    },


    fengsel1: {
      bubbles: ['<q>Więzienie</q> nieokreślone?'],
      answers: [
        { answer: '<i>et fengsel</i>', next: 'fengsel2' },
        { answer: '<i>fengsler</i>', next: 'fengsel1b' }
      ]

    },
    fengsel1b: {
      bubbles: ['To było w liczbie mnogiej.', '<i>et fengsel – fengselet – fengsler – fengslene</i>', 'Jak będzie jedno?'],
      answers: [
        { answer: '<i>et fengsel</i>', next: 'fengsel2' }
      ]
    },
    fengsel2: {
      bubbles: ['OK', '<img src="/las/c/i/rze-wsz/l0OWistc2HUjf6PKM.gif" />'],
      autoNext: 'RANDOM'
    },


    zzzz1: {
      bubbles: ['Nie zasypiasz?'],
      answers: [
        { answer: 'trochę', next: 'zzzz2' },
        { answer: 'daję radę #emoji-1f4aa-1f3ff;', next: 'RANDOM' }
      ]

    },
    zzzz2: {
      bubbles: ['#emoji-1f388;#emoji-1f4cc;', '<img src="/las/c/i/rze-wsz/4N8EsSk.gif" />'],
      autoNext: 'RANDOM'
    }


  };


  this.end = {
    a1: {
      bubbles: ['Gładko Ci poszło!', '<img src="/las/c/i/rze-wsz/When-Gang-Does-Group-Dance-Too.gif" />', ''],
      autoNext: 'END'
    },
    b1: {
      bubbles: ['To były najczęściej używane rzeczowniki w potocznym języku. Jeśli opanowałeś zasady tworzenia wszystkich czterech form, to na tej zasadzie będziesz już tworzyć kolejne!', '<img src="/las/c/i/rze-wsz/Bi6FcO7UoutWM.gif" />'],
      autoNext: 'END'
    },
    c1: {
      bubbles: ['Muszę już jechać.', '<img src="/las/c/i/rze-wsz/vjnLzg78di4wM.gif" />', 'Trzymaj się!'],
      autoNext: 'END'
    }
  };



}
</script>
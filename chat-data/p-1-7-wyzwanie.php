<script>
function ChatData() {

  this.intro = {
    a1: {
      bubbles: ['<i>Hallo, er det noen der?</i> (Czy ktoś tu jest?)', '<img src="http://giphy.com/gifs/owl-HetvlijUZmKic" />'],
      answerLeft: {answer: 'jestem, jestem', next: 'a2'}
    },
    a2: {
      bubbles: ['<i>Fint!</i> Przed nami sporo pracy.', 'Mam zamiar zrobić z Ciebie mistrza odmiany rzeczownika.', 'Piszesz się na to? (emot pisanie)'],
      answerLeft: {answer: 'z radością', next: 'a3'},
      answerRight: {answer: 'mogę zaryzykować', next: 'a3'}
    },
    a3: {
      bubbles: ['Zaczniemy od odmiany 50 najpopularniejszych rzeczowników w języku norweskim.'],
      answerLeft: {answer: 'brzmi super, robimy!', next: 'ENDINTRO'},
      answerRight: {answer: 'skąd znasz najpopularniejsze???', next: 'a4'},
    },
    a4: {
      bubbles: ['Z norweskich filmów. Proste. Przecież chcesz używać słów z życia, a nie nudnych czytanek?', '<img src="http://giphy.com/gifs/filmlinc-classic-film-nyff-2015-heaven-can-wait-l41lUYJGipkMD3NPa" />'],
      answerLeft: {answer: 'no raczej', next: 'ENDINTRO'}
    },

  };


  this.chat = {

    bil1: {
      bubbles: ['Jak powiedzieć samochody, kiedy masz na myśli jakieś dowolne, nieokreślone?', '<img src="http://giphy.com/gifs/bridge-cars-gif-city-AkKtWEPSyS9Pi" />'],
      answerLeft: {answer: '<i>bilen</i>', next: 'bil2'},
      answerRight: {answer: '<i>biler</i>', next: 'bil1b'}
    },
    bil1b: {
      bubbles: ['<i>Bilen</i> to jeden określony samochód. Skąd wiedzieć, że dodajemy końcówkę <i>-en</i>?', '<i>en bil -> bilen</i>', 'W liczbie mnogiej dodajemy końcówkę <i>-er</i> lub <i>-ene</i>', 'Dlatego <i>biler</i> (nieokreślone samochody), <i>bilene</i> (określone).'],
      answerLeft: {answer: 'OK, <i>biler</i>', next: 'bil2'},
    },
    bil2: {
      bubbles: ['Świetnie!'],
      autoNext: 'RANDOM'
    },


    blikk1: {
      bubbles: ['Jak powiedzieć “murugnięcie okiem” albo “chwila”?'],
      answerLeft: {answer: '<i>et øyeblikk</i>',  next: 'blikk2'},
      answerRight: {answer: '<i>ei øyeblikk</i>',  next: 'blikk1b'}
    },
    blikk1b: {
      bubbles: ['<i>Øyeblikk</i> jest rodzaju <i>et</i>. Zapamiętasz?'],
      answerLeft: {answer: 'zapamiętam', next: 'blikk2'},
    },
    blikk2: {
      bubbles: ['Dobrze!', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2013/08/tumblr_mpnbbcgkRO1rb324eo1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    oye1: {
      bubbles: ['Oczy – w formie określonej?'],
      answerLeft: {answer: '<i>øyene</i>',  next: 'oye2'},
      answerRight: {answer: '<i>øyet</i>',  next: 'oye2'}
    },
    oye1b: {
      bubbles: ['<i>Øyet</i> to jedno określone oko. W liczbie mnogiej określonej dodajemy zawsze końcówkę <i>-ene</i>. Dlatego prawidłowo będzie...'],
      answerLeft: {answer: '<i>øyene</i>', next: 'oye2'},
    },
    oye2: {
      bubbles: ['Znowu dobrze!', '<img src="https://media.giphy.com/media/3ornk3noLGE88V6xFK/giphy.gif" />'],
      autoNext: 'RANDOM'
    },


    moro1: {
      bubbles: ['Jak jest “zabawa, rozrywka, przyjemność”?', 'Przypominam, że jest to słowo niepoliczalne.'],
      answerLeft: {answer: '<i>(ei) moro</i>', next: 'moro2'},
      answerRight: {answer: '<i>moroer</i>', next: 'moro1b'}
    },
    moro1b: {
      bubbles: ['Końcówkę <i>-er</i> dodajemy w liczbie mnogiej, ale tylko do słów policzalnych. Rozrywki po norwesku nie można policzyć: jedna rozrywka, dwie rozrywki... nie pasuje. OK?'],
      answerLeft: {answer: 'OK', next: 'moro2'},
    },
    moro2: {
      bubbles: ['Yeah!', '<img src="https://media1.giphy.com/media/yoJC2GnSClbPOkV0eA/giphy.gif" />'],
      autoNext: 'RANDOM'
    },


    gave1: {
      bubbles: ['A “prezenty”? Określone?'],
      answerLeft: {answer: '<i>gavene</i>', next: 'gave2'},
      answerRight: {answer: '<i>gaver</i>', next: 'gave1b'}
    },
    gave1b: {
      bubbles: ['W formie określonej liczby mnogiej zawsze jest końcówka <i>-ene</i>. Proste.'],
      answerLeft: {answer: '<i>gavene</i>', next: '2'},
    },
    gave2: {
      bubbles: ['emot okejka i prezent'],
      autoNext: 'RANDOM'
    },


    idiot1: {
      bubbles: ['Jakie słowo przychodzi Ci do głowy, kiedy widzisz takiego gościa na Preikestolen?', '<img src="http://giphy.com/gifs/free-hanging-pulpit-NdbmK4ndXLTs4" />'],
      answerLeft: {answer: '<i>Idioten!</i>', next: 'idiot2'},
      answerRight: {answer: '<i>Jeg vil gifte ham!</i>', next: 'idiot1b'},
    },
    idiot1b: {
      bubbles: ['Miało być jedno słowo. ;-)'],
      autoNext: 'idiot2'
    },
    idiot2: {
      bubbles: ['W jakiej formie jest słowo “idioten”?'],
      answerLeft: {answer: 'określonej pojedynczej', next: 'idiot3'},
      answerRight: {answer: 'nieokreślonej pojedynczej', next: 'idiot2b'}
    },
    idiot2b: {
      bubbles: ['en idiot (jakiś idiota) -> idioten (określony idiota)'],
      answerLeft: {answer: 'OK', next: 'RANDOM'},
    },
    idiot3: {
      bubbles: ['OK!'],
      autoNext: 'RANDOM'
    },


    par1: {
      bubbles: ['Jak powiedzieć “para”? No wiesz, para butów albo ludzi. Najprościej, w nieokreślonej formie.'],
      answerLeft: {answer: '<i>et par</i>', next: 'par2'},
      answerRight: {answer: '<i>paret</i>', next: 'par1b'}
    },
    par1b: {
      bubbles: ['<i>Paret</i> to określona para.', '<i>et par -> paret</i>', 'A w liczbie mnogiej?', '<i>par -> parene</i>'],
      answerLeft: {answer: 'OK, <i>et par</i>', next: 'par2'}
    },
    par2:{
      bubbles: ['To jak będzie nieokreślona “para”?'],
      answerLeft: {answer: '<i>paret</i>', next: 'par3'},
    },
    par3: {
      bubbles: ['<i>Godt! Et par hamstere til deg!</i>', '<img src="http://funniest.1000notes.com/post/146598646254" />'],
      autoNext: 'RANDOM'
    },


    fyr1: {
      bubbles: ['Określony “ogień” to?'],
      answerLeft: {answer: '<i>fyr</i>', next: 'fyr1b'},
      answerRight: {answer: '<i>fyren</i>', next: 'fyr2'}
    },
    fyr1b: {
      bubbles: ['<i>(En) fyr</i> to forma nieokreślona. W nawiasie rodzajnik, żebyś pamiętał, że ogień jest niepoliczalny. Także określony ogień to:'],
      answerLeft: {answer: '<i>fyren</i>', next: 'fyr2'},
    },
    fyr2: {
      bubbles: ['Kjempebra! [emot ogien]', '<img src="http://cdn.sptndigital.com/sites/pl.axn/files/axn-cinemagraphs-11.gif" />'],
      autoNext: 'RANDOM'
    },


    enfyr1: {
      bubbles: ['Jak jest “facet”? Nie znasz gościa, dopiero wchodzi.'],
      answerLeft: {answer: '<i>en fyr</i>', next: 'enfyr2'},
      answerRight: {answer: '<i>karen</i>', next: 'enfyr1b'}
    },
    enfyr1b: {
      bubbles: ['<i>En kar</i> to jakiś facet, mężczyzna. Ale tu było <i>karen</i> – określony facet. Dlatego miało być...'],
      answerLeft: {answer: '<i>en fyr</i>', next: 'enfyr2'},
    },
    enfyr2: {
      bubbles: ['Fantastisk!'],
      autoNext: 'RANDOM'
    },


    dor1: {
      bubbles: ['A jak będą drzwi w liczbie mnogiej?'],
      answerLeft: {answer: '<i>døren, døra</i>', next: 'dor1b'},
      answerRight: {answer: '<i>dører, dørene</i>', next: 'dor2'}
    },
    dor1b: {
      bubbles: ['To była liczba pojedyncza. A w mnogiej?'],
      answerLeft: {answer: 'OK, <i>dører, dørene</i>', next: 'dor2'},
    },
    dor2: {
      bubbles: ['Dørene åpnes! [emot czarodziejska różdżka]', '<img src="http://funniest.1000notes.com/post/146460079239" />'],
      autoNext: 'RANDOM'
    },


    hund1: {
      bubbles: ['“Pies” określony?'],
      answerLeft: {answer: '<i>hunden</i>', next: 'hund2'},
      answerRight: {answer: '<i>hunder</i>', next: 'hund1b'}
    },
    hund1b: {
      bubbles: ['Końcówka <i>-er</i> jest przecież w liczbie mnogiej. ;-) Dlatego...'],
      answerLeft: {answer: '<i>hunden</i>', next: 'hund2'},
    },
    hund2: {
      bubbles: ['<i>Fint!</i>', '<img src="http://wifflegif.com/gifs/506544-sacha-baron-cohen-misunderstanding-gif" />'],
      autoNext: 'RANDOM'
    },


    vann1: {
      bubbles: ['“Woda” okeślona, np. taka w basenie.'],
      answerLeft: {answer: '<i>vannet</i>', next: 'vann2'},
      answerRight: {answer: '<i>vannene</i>', next: 'vann1b'}
    },
    vann1b: {
      bubbles: ['<i>Vannene</i> to określone wody albo jeziora. Określona woda to...'],
      answerLeft: {answer: 'Aha, <i>vannet</i>', next: 'vann2'},
    },
    vann2: {
      bubbles: ['Dobrze Ci idzie!', '<img src="http://funniest.1000notes.com/post/146174266444/ashmaniacc-dear-taeyeon" />'],
      autoNext: 'RANDOM'
    },


    barn1: {
      bubbles: ['Jak są “dzieci” w liczbie mnogiej nieokreślonej?'],
      answerLeft: {answer: '<i>barn</i>', next: 'barn2'},
      answerRight: {answer: '<i>barna</i>', next: 'barn1b'}
    },
    barn1b: {
      bubbles: ['Barna to określone dzieci. Pełna odmiana wygląda tak:', '<i>et barn – barnet – barn – barna</i>', 'Dlatego nieokreślone dzieci to...'],
      answerLeft: {answer: '<i>barn</i>', next: 'barn2'},
    },
    barn2: {
      bubbles: ['W nagrodę mały Azjata:', '<img src="https://media.giphy.com/media/3oEjHKtwp6WjUaJ0kM/giphy.gif" />'],
      autoNext: 'RANDOM'
    },


    syn1: {
      bubbles: ['Jak byś powiedział: “On ma syna.”?', '<i>Han har...</i>'],
      answerLeft: {answer: '<i>en sønn</i>', next: 'syn2'},
      answerRight: {answer: '<i>sønner</i>', next: 'syn1b'}
    },
    syn1b: {
      bubbles: ['<i>Sønner</i> to liczba mnoga. Więc...'],
      answerLeft: {answer: '<i>en sønn</i>', next: 'syn2'},
    },
    syn2: {
      bubbles: ['Wspaniale. A “córki”?'],
      answerLeft: {answer: '<i>datter</i>', next: 'syn2b'},
      answerRight: {answer: '<i>døtre</i>', next: 'syn3'}
    },
    syn2b: {
      bubbles: ['Zobacz:', '<i>ei datter – dattera – døtre – døtrene</i>', 'Jakieś córki to...'],
      answerLeft: {answer: '<i>døtre</i>', next: 'syn3'},
    },
    syn3: {
      bubbles: ['Zgadza się. <i>Han har søte døtre.</i>', '<img src="https://66.media.tumblr.com/e93dd21b5ef0fdc8fc45ea1c7ab5cf88/tumblr_mzwj71IIl51r6b6qeo1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    mat1: {
      bubbles: ['“Jedzenie” określone?'],
      answerLeft: {answer: '<i>mat</i>', next: 'mat1b'},
      answerRight: {answer: '<i>maten</i>', next: 'mat2'}
    },
    mat1b: {
      bubbles: ['Pełna odmiana to: <i>(en) mat – maten</i>, bo jedzenie jest niepoliczalne. Określone to...'],
      answerLeft: {answer: '', next: 'mat2'},
    },
    mat2: {
      bubbles: ['<i>Takk for maten!</i>', '<img src="http://giphy.com/gifs/1IejF9MZ0ivG8" />'],
      autoNext: 'RANDOM'
    },


    ben1: {
      bubbles: ['“Noga” określona?'],
      answerLeft: {answer: '<i>bein</i>', next: 'ben1b'},
      answerRight: {answer: '<i>beinet</i>', next: 'ben2'}
    },
    ben1b: {
      bubbles: ['<i>et bein – beinet – bein – beina</i>', 'To jak? Zmieniasz odpowiedź?'],
      answerLeft: {answer: '<i>beinet</i>', next: 'ben2'},
    },
    ben2: {
      bubbles: ['Dobra decyzja. Ćwiczymy dalej.', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2015/01/20.gif" />'],
      autoNext: 'RANDOM'
    },


    hand1: {
      bubbles: ['“Dłonie” nieokreślone?'],
      answerLeft: {answer: '<i>hender</i>', next: 'hand2'},
      answerRight: {answer: '<i>hendene</i>', next: 'hand1b'}
    },
    hand1b: {
      bubbles: ['Ach, bo to nieregularne słowo:','<i>ei hånd – hånda – hender – hendene</i>', 'Nieokreślone dłonie to...'],
      answerLeft: {answer: '<i>hender</i>', next: 'hand2'},
    },
    hand2: {
      bubbles: ['Jak Ty to robisz?', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2015/01/35.gif" />'],
      autoNext: 'RANDOM'
    },


    kaffe1: {
      bubbles: ['Jedna “kawa” nieokreślona? W domyśle jako kubek.'],
      answerLeft: {answer: '<i>en kaffe</i>', next: 'kaffe2'},
      answerRight: {answer: '<i>en kafé</i>', next: 'kaffe1b'}
    },
    kaffe1b: {
      bubbles: ['<i>En kafé</i> to kawiarnia. Wymawiamy długo. Kawę za to krótko:'],
      answerLeft: {answer: '<i>en kaffe</i>', next: 'kaffe2'},
    },
    kaffe2: {
      bubbles: ['Ammm', 'gifuuu'],
      autoNext: 'RANDOM'
    },


    bok1: {
      bubbles: ['“Książki” nieokreślone.'],
      answerLeft: {answer: '<i>boker</i>', next: 'bok1b'},
      answerRight: {answer: '<i>bøker</i>', next: 'bok2'}
    },
    bok1b: {
      bubbles: ['Zobacz:', '<i>ei bok – boka – bøker – bøkene</i>'],
      answerLeft: {answer: 'OK, <i>bøker</i>', next: 'bok2'},
    },
    bok2: {
      bubbles: ['<i>Fint!</i>', '<img src="http://bestanimations.com/Books/girl-reading-book-animation-16.gif" />'],
      autoNext: 'RANDOM'
    },


    spor1: {
      bubbles: ['“Tor” albo “ślad” nieokreślony to?'],
      answerLeft: {answer: '<i>et spor</i>', next: 'spor2'},
      answerRight: {answer: '<i>ei spor</i>', next: 'spor1b'}
    },
    spor1b: {
      bubbles: ['<i>Spor</i> jest rodzaju <i>et</i>. Więc?'],
      answerLeft: {answer: '<i>et spor</i>', next: 'spor2'},
    },
    spor2: {
      bubbles: ['<i>Greit</i>.', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2015/01/27.gif" />'],
      autoNext: 'RANDOM'
    },


    kvinne1: {
      bubbles: ['“Kobieta”? Jakaś na ulicy, której nie znasz.'],
      answerLeft: {answer: '<i>kvinna</i>', next: 'kvinne1b'},
      answerRight: {answer: '<i>ei kvinne</i>', next: 'kvinne2'}
    },
    kvinne1b: {
      bubbles: ['“Kvinna” to określona kobieta.', '<i>ei kvinne -> kvinna</i>', 'Co proponujesz?'],
      answerLeft: {answer: '<i>ei kvinne</i>', next: 'kvinne2'},
    },
    kvinne2: {
      bubbles: ['OK', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2015/01/7.gif" />'],
      autoNext: 'RANDOM'
    },


    venn1: {
      bubbles: ['“Przyjaciel” określony?'],
      answerLeft: {answer: '<i>venner</i>', next: 'venn1b'},
      answerRight: {answer: '<i>vennen</i>', next: 'venn2'}
    },
    venn1b: {
      bubbles: ['To słowo trzeba znać w każdej formie.', '<i>en venn – vennen – venner – vennene</i>', 'A jeden określony to...'],
      answerLeft: {answer: '<i>vennen</i>', next: 'venn2'},
    },
    venn2: {
      bubbles: ['<i>Ja!</i>', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2015/01/19.gif" />'],
      autoNext: 'RANDOM'
    },


    fly1: {
      bubbles: ['“Samoloty” nieokreślone? [emot samoloty]'],
      answerLeft: {answer: '<i>fly</i>', next: 'fly2'},
      answerRight: {answer: '<i>flyer</i>', next: 'fly1b'}
    },
    fly1b: {
      bubbles: ['Poznaj całość:', '<i>et fly – flyet – fly – flyene</i>', 'Dlatego nieokreślone to...'],
      answerLeft: {answer: '<i>fly</i>', next: 'fly2'},
    },
    fly2: {
      bubbles: ['<i>Kjempebra!</i>', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2015/01/32.gif" />'],
      autoNext: 'RANDOM'
    },


    tele1: {
      bubbles: ['“Telefony” określone? [emoty telefonow]'],
      answerLeft: {answer: '<i>mobiler</i>', next: 'tele1b'},
      answerRight: {answer: '<i>telefonene</i>', next: 'tele2'}
    },
    tele1b: {
      bubbles: ['Jedne i drugie to telefony, ale nieokreślone mają końcówkę <i>-er</i>, a określone <i>-ene</i>. Dlatego...'],
      answerLeft: {answer: '<i>telefonene</i>', next: 'tele2'},
    },
    tele2: {
      bubbles: ['<i>Bra!</i>', '<img src="http://66.media.tumblr.com/310def1617f49a405c43c98e02369057/tumblr_n3a7zcxaaY1qef46ho1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    bror1: {
      bubbles: ['“Brat” określony.'],
      answerLeft: {answer: '<i>en bror</i>', next: 'bror1b'},
      answerRight: {answer: '<i>broren</i>', next: 'bror2'}
    },
    bror1b: {
      bubbles: ['Rodzajnik z przodu oznacza jedną nieokreśloną sztukę czegoś lub kogoś. Dlatego określony brat to...'],
      answerLeft: {answer: '<i>broren</i>', next: 'bror2'},
    },
    bror2: {
      bubbles: ['<img src="http://www.robmydobrze.pl/wp-content/uploads/2014/12/17125c33392f0d050fe621fe04774793.gif" />'],
      autoNext: 'RANDOM'
    },


    lys1: {
      bubbles: ['“Światła” nieokreślone.'],
      answerLeft: {answer: '<i>lys</i>', next: 'lys2'},
      answerRight: {answer: '<i>lyset</i>', next: 'lys1b'}
    },
    lys1b: {
      bubbles: ['<i>Lyset</i> to określone światło. Przecież wiesz. W liczbie mnogiej nie dodajemy końcówki <i>-er</i>, bo <i>et lys</i> ma tylko jedną sylabę i jest rodzaju <i>et</i> ;-)'],
      answerLeft: {answer: 'OK, <i>lys</i>', next: 'lys2'},
    },
    lys2: {
      bubbles: ['<i>Bra!</i>', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2014/12/6b02617e5bdff55d16e8bb9775d4da68.gif" />'],
      autoNext: 'RANDOM'
    },


    onkel1: {
      bubbles: ['“Wujek” określony.'],
      answerLeft: {answer: '<i>onkel</i>', next: 'onkel1b'},
      answerRight: {answer: '<i>onkelen</i>', next: 'onkel2'}
    },
    onkel1b: {
      bubbles: ['<i>en onkel – onkelen – onkler – onklene</i>', 'Zobacz, nie było do wyboru samego <i>onkel</i>. Musi być...'],
      answerLeft: {answer: '<i>onkelen</i>', next: 'onkel2'},
    },
    onkel2: {
      bubbles: ['Super. Nie każdy ma takiego wujka.', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2015/01/5.gif" />'],
      autoNext: 'RANDOM'
    },


    kone1: {
      bubbles: ['“Żona” określona?'],
      answerLeft: {answer: '<i>kone</i>', next: 'kone1b'},
      answerRight: {answer: '<i>kona</i>', next: 'kone2'}
    },
    kone1b: {
      bubbles: ['To słowo warto znać, żeby uniknąć nieporozumień:', '<i>ei kone – kona – koner – konene</i>', 'Ale ta jedna, wymarzona żona to...'],
      answerLeft: {answer: '<i>kona</i>', next: 'kone2'},
    },
    kone2: {
      bubbles: ['Tak jest!', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2014/11/magda.gif" />'],
      autoNext: 'RANDOM'
    },


    kamp1: {
      bubbles: ['Określone “walki”, “bitwy” lub “mecze”?'],
      answerLeft: {answer: '<i>kamp</i>', next: 'kamp1b'},
      answerRight: {answer: '<i>kampene</i>', next: 'kamp2'}
    },
    kamp1b: {
      bubbles: ['Forma określona w liczbie mnogiej ma zawsze końcówkę <i>-ene</i>. Tak więc...'],
      answerLeft: {answer: '<i>kampene</i>', next: 'kamp2'},
    },
    kamp2: {
      bubbles: ['O tak!', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2014/11/magda.gif" />'],
      autoNext: 'RANDOM'
    },


    dame1: {
      bubbles: ['Określone “kobiety.”'],
      answerLeft: {answer: '<i>damer</i>', next: 'dame1b'},
      answerRight: {answer: '<i>kvinnene</i>', next: 'dame2'}
    },
    dame1b: {
      bubbles: ['<i>Damer</i> to nieokreślone kobiety. Określone to <i>damene</i>, albo...'],
      answerLeft: {answer: '<i>kvinnene</i>', next: 'dame2'},
    },
    dame2: {
      bubbles: ['Świetnie!', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2013/12/6288960204_23fcc5a01a_o.gif" />'],
      autoNext: 'RANDOM'
    },


    by1: {
      bubbles: ['“Miasto” nieokreślone.'],
      answerLeft: {answer: '<i>et by</i>', next: 'by1b'},
      answerRight: {answer: '<i>en by</i>', next: 'by2'}
    },
    by1b: {
      bubbles: ['Nie będę się sprzeczać, ale w słowniku jest <i>en by</i>. Zgoda?'],
      answerLeft: {answer: 'no dobra, <i>en by</i>', next: 'by2'},
    },
    by2: {
      bubbles: ['<i>Veldig bra</i>', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2013/12/newspaper-man-429.gif" />'],
      autoNext: 'RANDOM'
    },


    liv1: {
      bubbles: ['“Życie” określone.'],
      answerLeft: {answer: '<i>livet</i>', next: 'liv2'},
      answerRight: {answer: '<i>liva</i>', next: 'liv1b'}
    },
    liv1b: {
      bubbles: ['<i>et liv – livet – liv – livene</i> (el <i>liva</i>)', 'Jednak w formie określonej pojedynczej jest tylko jedna opcja:'],
      answerLeft: {answer: '<i>livet</i>', next: 'liv2'},
    },
    liv2: {
      bubbles: ['<img src="http://www.robmydobrze.pl/wp-content/uploads/2013/12/7177997572_fdeaeb4463_o.gif" />'],
      autoNext: 'RANDOM'
    },


    film1: {
      bubbles: ['Jakiś “film” to:'],
      answerLeft: {answer: '<i>en film</i>', next: 'film2'},
      answerRight: {answer: '<i>en movie</i>', next: 'film1b'}
    },
    film1b: {
      bubbles: ['[emot łapka w czoło]'],
      answerLeft: {answer: '<i>en film</i>', next: 'film2'},
    },
    film2: {
      bubbles: ['<i>Flott!</i>', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2013/12/coco-projector-429.gif" />'],
      autoNext: 'RANDOM'
    },


    tog1: {
      bubbles: ['“Pociąg” określony:'],
      answerLeft: {answer: '<i>toga</i>', next: 'tog1b'},
      answerRight: {answer: '<i>toget</i>', next: 'tog2'}
    },
    tog1b: {
      bubbles: ['<i>et tog -> toget</i> i już. Trzeba tylko znać rodzajnik. ;-)'],
      answerLeft: {answer: '<i>toget</i>', next: 'tog2'},
    },
    tog2: {
      bubbles: ['<img src="http://www.robmydobrze.pl/wp-content/uploads/2013/12/train-repeat-429.gif" />'],
      autoNext: 'RANDOM'
    },


    vindu1: {
      bubbles: ['Jakieś “okno”:'],
      answerLeft: {answer: '<i>et vindu</i>', next: 'vindu2'},
      answerRight: {answer: '<i>en vindu</i>', next: 'vindu1b'}
    },
    vindu1b: {
      bubbles: ['Sorry, rodzajnik <i>et</i>. A w całości regularnie:', '<i>et vindu – vinduet – vinduer – vinduene</i>', 'To jak było to określone okno?'],
      answerLeft: {answer: '<i>vinduet</i>', next: 'vindu2'},
    },
    vindu2: {
      bubbles: ['<i>Jøss!</i>', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2013/12/cab-window-429.gif" />'],
      autoNext: 'RANDOM'
    },


    venn1: {
      bubbles: ['“Przyjaciele”:'],
      answerLeft: {answer: '<i>friends</i>', next: 'venn1b'},
      answerRight: {answer: '<i>venner</i>', next: 'venn2'}
    },
    venn1b: {
      bubbles: ['To nie ten serial. ;) W liczbie mnogiej przecież końcówka <i>-er</i> lub <i>-ene</i>. W nieokreślonej będzie...'],
      answerLeft: {answer: '<i>venner</i>', next: 'venn2'},
    },
    venn2: {
      bubbles: ['<i>Ja!</i>', '<img src="http://giphy.com/gifs/excited-seinfeld-12UlfHpF05ielO" />'],
      autoNext: 'RANDOM'
    },


    stol1: {
      bubbles: ['Nieokreślone “krzesła”:'],
      answerLeft: {answer: '<i>bord</i>', next: 'stol1b'},
      answerRight: {answer: '<i>stoler</i>', next: 'stol2'}
    },
    stol1b: {
      bubbles: ['<i>Et bord</i> to stół.', 'Krzesło to <i>en stol</i>. Więc?'],
      answerLeft: {answer: '<i>stoler</i>', next: 'stol2'},
    },
    stol2: {
      bubbles: ['<i>Bra!</i>', '<img src="http://67.media.tumblr.com/dbbda86b9499bc783a14eb4366b98b72/tumblr_nt2vth7sTX1qef46ho1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    tur1: {
      bubbles: ['Określone “wycieczki”:'],
      answerLeft: {answer: '<i>tur</i>', next: 'tur1b'},
      answerRight: {answer: '<i>turene</i>', next: 'tur2'}
    },
    tur1b: {
      bubbles: ['<i>en tur – turen – turer – turene</i>', 'Co obstawiasz?'],
      answerLeft: {answer: '<i>turene</i>', next: 'tur2'},
    },
    tur2: {
      bubbles: ['Dobrze!', '<img src="http://giphy.com/gifs/car-drive-travel-rUlu713yOz2wM" />'],
      autoNext: 'RANDOM'
    },


    baby1: {
      bubbles: ['Określone “niemowlę”:'],
      answerLeft: {answer: '<i>babyen</i>', next: 'baby2'},
      answerRight: {answer: '<i>baby</i>', next: 'baby1b'}
    },
    baby1b: {
      bubbles: ['Końcóweczka <i>-en</i> śmiało może być dodana. Tak się robi norweski. ;-)'],
      answerLeft: {answer: '<i>babyen</i>', next: 'baby2'},
    },
    baby2: {
      bubbles: ['<img src="http://www.robmydobrze.pl/wp-content/uploads/2013/08/57624.gif" />'],
      autoNext: 'RANDOM'
    },


    jente1: {
      bubbles: ['Nabrałeś niezłego tempa. Super!', 'Jak będzie “dziewczyna” w formie nieokreślonej?'],
      answerLeft: {answer: '<i>ei jenta</i>', next: 'jente1b'},
      answerRight: {answer: '<i>ei jente</i>', next: 'jente2'}
    },
    jente1b: {
      bubbles: ['Mała podpowiedź: <i>ei jente -> jenta</i>, więc będzie...'],
      answerLeft: {answer: '<i>ei jente</i>', next: 'jente2'},
    },
    jente2: {
      bubbles: ['<i>Lurt!</i>', '<img src="http://www.robmydobrze.pl/wp-content/uploads/2015/01/12.gif" />'],
      autoNext: 'RANDOM'
    },


    kontroll1: {
      bubbles: ['“Kontrola”, “sprawdzenie” w nieokreślonej formie.'],
      answerLeft: {answer: '<i>en kontroll</i>', next: 'kontroll2'},
      answerRight: {answer: '<i>en kontrol</i>', next: 'kontroll1b'}
    },
    kontroll1b: {
      bubbles: ['<img src="http://giphy.com/gifs/bkKvvzE9PEcTK" />', 'Jednak przez dwa ll:', '<i>en kontroll – kontrollen – kontroller – kontrollene</i>'],
      answerLeft: {answer: 'OK, <i>en kontroll</i>', next: 'kontroll2'},
    },
    kontroll2: {
      bubbles: ['Dobrze.', 'Masz siłę na dalszą walkę?'],
      answerLeft: {answer: 'pewnie [emot]', next: 'kontroll3'},
    },
    kontroll3: {
      bubbles: ['<img src="http://giphy.com/gifs/gameofthrones-game-of-thrones-hbo-26BRJ42FrwYMrKXV6" />'],
      autoNext: 'RANDOM'
    },


    gutt1: {
      bubbles: ['“Chłopiec” nieokreślony:'],
      answerLeft: {answer: '<i>gutten</i>', next: 'gutt1b'},
      answerRight: {answer: '<i>en gutt</i>', next: 'gutt2'}
    },
    gutt1b: {
      bubbles: ['<i>Gutten</i> to określony chłopak. Nieokreślony to ten z rodzajnikiem:'],
      answerLeft: {answer: 'no tak, <i>en gutt</i>', next: 'gutt2'},
    },
    gutt2: {
      bubbles: ['<img src="http://funniest.1000notes.com/post/146457500444/sizvideos-cat-high-fives-kid-on-bike-video" />'],
      autoNext: 'RANDOM'
    },


    baat1: {
      bubbles: ['“Łódka” określona:'],
      answerLeft: {answer: '<i>båten</i>', next: 'baat2'},
      answerRight: {answer: '<i>båter</i>', next: 'baat1b'}
    },
    baat1b: {
      bubbles: ['Końcówka <i>-er</i> jest w l.mn.', '<i>en båt – båten</i>'],
      answerLeft: {answer: '<i>båten</i>', next: 'baat2'},
    },
    baat2: {
      bubbles: ['<i>Yeah!</i>', '<img src="http://funniest.1000notes.com/post/146707300894" />'],
      autoNext: 'RANDOM'
    },


    famielien1: {
      bubbles: ['Określona “rodzina”:'],
      answerLeft: {answer: '<i>familien</i>', next: 'famielien2'},
      answerRight: {answer: '<i>familia</i>', next: 'famielien1b'}
    },
    famielien1b: {
      bubbles: ['<i>en familie – familien – familier – familiene</i>', 'Zatem jedna określona to...'],
      answerLeft: {answer: '<i>familien</i>', next: 'famielien2'},
    },
    famielien2: {
      bubbles: ['Jesteś niesamowity!', '<img src="http://giphy.com/gifs/tennis-clapping-wimbledon-YGJBp5EgyVP9K" />'],
      autoNext: 'RANDOM'
    },


    netter1: {
      bubbles: ['“Noce” nieokreślone:'],
      answerLeft: {answer: '<i>netter</i>', next: 'netter2'},
      answerRight: {answer: '<i>nøtter</i>', next: 'netter1b'}
    },
    netter1b: {
      bubbles: ['<i>Nøtter</i> to orzeszki. Noc jest nieregularna, zobacz:', '<i>ei natt – natta – netter – nettene</i>', 'Dlatego...'],
      answerLeft: {answer: '<i>netter</i>', next: 'netter2'},
    },
    netter2: {
      bubbles: ['Uff. Dobrze.', '<img src="http://66.media.tumblr.com/f7840d1ff1b583084d3381a98168c137/tumblr_nhqepgKJqs1qef46ho1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    kompis1: {
      bubbles: ['“Kumpel”, “kolega” nieokreślony:'],
      answerLeft: {answer: '<i>en kompis</i>', next: 'kompis2'},
      answerRight: {answer: '<i>kameraten</i>', next: 'kompis1b'}
    },
    kompis1b: {
      bubbles: ['<i>Kameraten</i> to określony kolega. Nieokreślony jest z rodzajnikiem:'],
      answerLeft: {answer: '<i>en kompis</i>', next: 'kompis2'},
    },
    kompis2: {
      bubbles: ['Świetnie!', 'Bawimy się dalej.', '<img src="http://66.media.tumblr.com/50ecce445efd6b8260e1443a87449b2e/tumblr_myw0w7EBOA1t361sto1_400.gif" />'],
      autoNext: 'RANDOM'
    },


    laerer1: {
      bubbles: ['“Nauczyciel” określony:'],
      answerLeft: {answer: '<i>læreren</i>', next: 'laerer2'},
      answerRight: {answer: '<i>lærer</i>', next: 'laerer1b'}
    },
    laerer1b: {
      bubbles: ['Musi być z końcówką określoną. Dlatego...'],
      answerLeft: {answer: '<i>læreren</i>', next: 'laerer2'},
    },
    laerer2: {
      bubbles: ['Nauczyciel wszystko widzi.', '<img src="http://66.media.tumblr.com/dcb8b4c771cc57640859edd2822d8f5c/tumblr_mw9satSCOw1qef46ho1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    politi1: {
      bubbles: ['“Policja” określona.'],
      answerLeft: {answer: '<i>politi</i>', next: 'politi1b'},
      answerRight: {answer: '<i>politiet</i>', next: 'politi2'}
    },
    politi1b: {
      bubbles: ['Musi być z końcówką odpowiednią dla rodzaju <i>et</i>, czyli...'],
      answerLeft: {answer: '<i>politiet</i>', next: 'politi2'},
    },
    politi2: {
      bubbles: ['<img src="https://external.fsvg1-1.fna.fbcdn.net/safe_image.php?d=AQD9_NJXDSvnpx21&url=http%3A%2F%2Fi.imgur.com%2FBMcur.gif%3Fnoredirect&ext=gif" />'],
      autoNext: 'RANDOM'
    },


    historie1: {
      bubbles: ['“Historia” nieokreślona:'],
      answerLeft: {answer: '<i>ei historie</i>', next: 'historie2'},
      answerRight: {answer: '<i>ei historia</i>', next: 'historie1b'}
    },
    historie1b: {
      bubbles: ['<i>Historia</i> to jedna, określona. W nieokreślonej będzie...'],
      answerLeft: {answer: '', next: 'historie2'},
    },
    historie2: {
      bubbles: ['Może tak być.', '<img src="/i/p-1-7/EF4UWro.gif" />'],
      autoNext: 'RANDOM'
    },


    vinner1: {
      bubbles: ['“Zwycięzca” określony.'],
      answerLeft: {answer: '<i>vinner</i>', next: 'vinner1b'},
      answerRight: {answer: '<i>vinneren</i>', next: 'vinner2'}
    },
    vinner1b: {
      bubbles: ['Końcówka <i>-er</i> jest w l.mn. W pojedynczej zwycięzca jest tylko jeden:'],
      answerLeft: {answer: '<i>vinneren</i>', next: 'vinner2'},
    },
    vinner2: {
      bubbles: ['<img src="https://media.giphy.com/media/26ght2GFICFOl41Ak/giphy.gif" />'],
      autoNext: 'RANDOM'
    },


    finalen1: {
      bubbles: ['Jesteś tu jeszcze?', '<img src="http://giphy.com/gifs/reaction-jack-sparrow-stuff-and-things-GxRJqOTR2vv0Y" />'],
      answerLeft: {answer: 'jestem', next: 'finalen2'},
    },
    finalen2: {
      bubbles: ['To dobrze, bo teraz kolejny etap. Zbliżamy się do finału.', '<img src="https://67.media.tumblr.com/340fe3d3e1b80a11a5035c4ea405ea21/tumblr_o08353uHDA1sblcs4o1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    gang1: {
      bubbles: ['Jeden “Korytarz” albo “raz”:'],
      answerLeft: {answer: '<i>en gang</i>', next: 'gang2'},
      answerRight: {answer: '<i>ei gang</i>', next: 'gang1b'}
    },
    gang1b: {
      bubbles: ['<i>en gang – gangen – ganger – gangene</i>', 'To jaki rodzajnik?'],
      answerLeft: {answer: '<i>en gang</i>', next: 'gang2'},
    },
    gang2: {
      bubbles: ['<i>Veldig godt!</i> Tylko w którą stronę pójdziesz?', '<img src="https://media.giphy.com/media/KnXkh8WI2WCJO/giphy.gif" />'],
      autoNext: 'RANDOM'
    },


    tid1: {
      bubbles: ['“Czas” określony:'],
      answerLeft: {answer: '<i>tid</i>', next: 'tid1b'},
      answerRight: {answer: '<i>tida</i>', next: 'tid2'}
    },
    tid1b: {
      bubbles: ['<i>Tid</i> to nieokreślony czas. Np. <i>tid til å tenke</i> – czas na myślenie.', 'Ale: <i>tida flyr!</i> – czas leci.'],
      answerLeft: {answer: 'OK, <i>tida</i>', next: 'tid2'},
    },
    tid2: {
      bubbles: ['<i>Veldig bra!</i>'],
      autoNext: 'RANDOM'
    },


    morgen1: {
      bubbles: ['Jak będą określone “poranki”?'],
      answerLeft: {answer: '<i>morgenene</i>', next: 'morgen2'},
      answerRight: {answer: '<i>morgene</i>', next: 'morgen1b'}
    },
    morgen1b: {
      bubbles: ['To wymaga uwagi i przećwiczenia wymowy:', '<i>en morgen – morgenen – morgener – morgenene</i>'],
      answerLeft: {answer: '<i>morgenene</i>', next: 'morgen2'},
    },
    morgen2: {
      bubbles: ['<i>Bra!</i>'],
      autoNext: 'RANDOM'
    },


    modre1: {
      bubbles: ['“Matki” nieokreślone.'],
      answerLeft: {answer: '<i>mødre</i>', next: 'modre2'},
      answerRight: {answer: '<i>mødrene</i>', next: 'modre1b'}
    },
    modre1b: {
      bubbles: ['Matki są wyjątkowe:', '<i>ei mor – mora – mødre – mødrene</i>', 'Dlatego nie określone to...'],
      answerLeft: {answer: '<i>mødre</i>', next: 'modre2'},
    },
    modre2: {
      bubbles: ['Flott!'],
      autoNext: 'RANDOM'
    },


    fedrene1: {
      bubbles: ['“Ojcowie” określeni:'],
      answerLeft: {answer: '<i>fedre</i>', next: 'fedrene1b'},
      answerRight: {answer: '<i>fedrene</i>', next: 'fedrene2'}
    },
    fedrene1b: {
      bubbles: ['<i>en far – faren – fedre – fedrene</i>', 'Wyjątek, co?'],
      answerLeft: {answer: '<i>fedrene</i>', next: 'fedrene2'},
    },
    fedrene2: {
      bubbles: ['<i>Jøss!</i>'],
      autoNext: 'RANDOM'
    },


    kvelder1: {
      bubbles: ['Nieokreślone “wieczory”:'],
      answerLeft: {answer: '<i>kvelder</i>', next: 'kvelder2'},
      answerRight: {answer: '<i>kveld</i>', next: 'kvelder1b'}
    },
    kvelder1b: {
      bubbles: ['Jest <i>en kveld</i>, więc śmiało dodajemy końcówkę <i>-er</i> w l.mn.'],
      answerLeft: {answer: 'OK, <i>kvelder</i>', next: 'kvelder2'},
    },
    kvelder2: {
      bubbles: ['<i>Godt.</i>'],
      autoNext: 'RANDOM'
    },


    steder1: {
      bubbles: ['“Wiele miejsc” to:'],
      answerLeft: {answer: '<i>mange steder</i>', next: 'steder2'},
      answerRight: {answer: '<i>mye steder</i>', next: 'steder1b'}
    },
    steder1b: {
      bubbles: ['Kiedy masz końcówkę <i>-er</i>, to z pewnością jest to coś policzalnego: 1, 2, 3... miejsca. Dla policzalnych jest <i>mange</i>. Dla niepoliczalnych <i>mye</i>.'],
      answerLeft: {answer: '<i>mange steder</i>', next: 'steder2'},
    },
    steder2: {
      bubbles: ['Tak. :)'],
      autoNext: 'RANDOM'
    },


    guder1: {
      bubbles: ['Nieokreśleni “bogowie”:'],
      answerLeft: {answer: '<i>guder</i>', next: 'guder2'},
      answerRight: {answer: '<i>Gud</i>', next: 'guder1b'}
    },
    guder1b: {
      bubbles: ['<i>en gud – guden – guder – gudene</i>', 'Dlatego...'],
      answerLeft: {answer: '<i>guder</i>', next: 'guder2'},
    },
    guder2: {
      bubbles: ['<i>Himmelsk!</i>'],
      autoNext: 'RANDOM'
    },


    feil1: {
      bubbles: ['Jak powiedzieć “kilka błędów”?'],
      answerLeft: {answer: '<i>noen feil</i>', next: 'feil2'},
      answerRight: {answer: '<i>noen feils</i>', next: 'feil1b'}
    },
    feil1b: {
      bubbles: ['<i>-s</i> dodajemy po angielsku, jak w...', '<img src="http://img2.tvtome.com/i/u/abf918a8d7e74da0cd8280037171f277.gif" />', 'A norweskie <i>feil</i> jest wyjątkiem:', '<i>en feil – feilen – feil – feilene</i>'],
      answerLeft: {answer: '<i>noen feil</i>', next: 'feil2'},
    },
    feil2: {
      bubbles: ['<i>Riktig svar!</i>'],
      autoNext: 'RANDOM'
    },


    veier1: {
      bubbles: ['Nieokreślone “drogi”:'],
      answerLeft: {answer: '<i>vei</i>', next: 'veier1b'},
      answerRight: {answer: '<i>veier</i>', next: 'veier2'}
    },
    veier1b: {
      bubbles: ['Tu się nic dziwnego nie dzieje:', '<i>en vei – veien – veier – veiene</i>'],
      answerLeft: {answer: '<i>veier</i>', next: 'veier2'},
    },
    veier2: {
      bubbles: ['<i>Nydelig!</i>'],
      autoNext: 'RANDOM'
    },


    navn1: {
      bubbles: ['“Nazwa” lub “imię”:'],
      answerLeft: {answer: '<i>en navn</i>', next: 'navn1b'},
      answerRight: {answer: '<i>et navn</i>', next: 'navn2'}
    },
    navn1b: {
      bubbles: ['Jednosylabowy <i>et</i>:', '<i>et navn – navnet – navn – navnene</i>'],
      answerLeft: {answer: '', next: 'navn2'},
    },
    navn2: {
      bubbles: ['<i>Riktig!</i>'],
      autoNext: 'RANDOM'
    },


    hav1: {
      bubbles: ['Określone “morze” albo “ocean”:'],
      answerLeft: {answer: '<i>havet</i>', next: 'hav2'},
      answerRight: {answer: '<i>hava</i>', next: 'hav1b'}
    },
    hav1b: {
      bubbles: ['Jednosylabowy <i>et</i>:', '<i>et hav – havet – hav – havene</i>', 'W formie określonej po prostu...'],
      answerLeft: {answer: '<i>havet</i>', next: 'hav2'},
    },
    hav2: {
      bubbles: ['<i>Imponerende!</i>'],
      autoNext: 'RANDOM'
    },


    dag1: {
      bubbles: ['Nieokreślone “dni”:'],
      answerLeft: {answer: '<i>dager</i>', next: 'dag2'},
      answerRight: {answer: '<i>dag</i>', next: 'dag1b'}
    },
    dag1b: {
      bubbles: ['Patrzysz i wiesz:', 'i{en dag – dagen – dager – dagene}'],
      answerLeft: {answer: '<i>dager</i>', next: 'dag2'},
    },
    dag2: {
      bubbles: ['<i>Flott!</i>'],
      autoNext: 'RANDOM'
    },


    jobb1: {
      bubbles: ['Określona “praca”:'],
      answerLeft: {answer: '<i>jobben</i>', next: 'jobb2'},
      answerRight: {answer: '<i>et arbeid</i>', next: 'jobb1b'}
    },
    jobb1b: {
      bubbles: ['Czy może być rodzajnik z przodu, gdy mowa o formie okreslonej?', '<i>en jobb – jobben</i>'],
      answerLeft: {answer: '<i>jobben</i>', next: 'jobb2'},
    },
    jobb2: {
      bubbles: ['<i>Fint!</i>'],
      autoNext: 'RANDOM'
    },


    del1: {
      bubbles: ['Nieokreślone “części”:'],
      answerLeft: {answer: '<i>deler</i>', next: 'del2'},
      answerRight: {answer: '<i>dealer</i>', next: 'del1b'}
    },
    del1b: {
      bubbles: ['<img src="http://giphy.com/gifs/pulp-fiction-art-estrellamarilla-11uPwtlLq91Rni" />', 'Oj, nie tędy droga. Miało być o częściach:', '<i>en del – delen – deler – delene</i>', 'Więc, nieokreślone części to...'],
      answerLeft: {answer: '<i>deler</i>', next: 'del2'},
    },
    del2: {
      bubbles: ['<i>Så lurt!</i>'],
      autoNext: 'RANDOM'
    },


    ord1: {
      bubbles: ['Nieokreślone “słowo”:'],
      answerLeft: {answer: '<i>et ord</i>', next: 'ord2'},
      answerRight: {answer: '<i>ei ord</i>', next: 'ord1b'}
    },
    ord1b: {
      bubbles: ['Jednak <i>et</i>. I na dodatek jednosylabowy.', '<i>et ord – ordet – ord – ordene</i>'],
      answerLeft: {answer: '<i>ei ord</i>', next: 'ord2'},
    },
    ord2: {
      bubbles: ['<i>Utrolig!</i> [emot podziw]'],
      autoNext: 'RANDOM'
    },


    time1: {
      bubbles: ['Jedna “godzina”:'],
      answerLeft: {answer: '<i>en time</i>', next: 'time2'},
      answerRight: {answer: '<i>ei tid</i>', next: 'time1b'}
    },
    time1b: {
      bubbles: ['<i>(Ei) tid</i> to czas. Jedna godzina to: <i>en time</i>, a dwie godziny: <i>to timer</i>.'],
      answerLeft: {answer: 'OK, <i>en time</i>', next: 'time2'},
    },
    time2: {
      bubbles: ['<i>Utmerket!</i>'],
      autoNext: 'RANDOM'
    },


    moete1: {
      bubbles: ['Nieokreślone “spotkanie”, “zebranie”:'],
      answerLeft: {answer: '<i>et møte</i>', next: 'moete2'},
      answerRight: {answer: '<i>en måte</i>', next: 'moete1b'}
    },
    moete1b: {
      bubbles: ['<i>En måte</i> to sposób. Spotkanie to:'],
      answerLeft: {answer: '<i>et møte</i>', next: 'moete2'},
    },
    moete2: {
      bubbles: ['<i>Kjempefint!</i>', '<img src="http://media3.giphy.com/media/YC6ZedMDgR1Fm/giphy.gif" />'],
      autoNext: 'RANDOM'
    },


    problem1: {
      bubbles: ['“Problem”, jakiś dowolny:'],
      answerLeft: {answer: '<i>et problem</i>', next: 'problem2'},
      answerRight: {answer: '<i>ei problem</i>', next: 'problem1b'}
    },
    problem1b: {
      bubbles: ['Jednak <i>et</i>. Nie zapominaj o rodzajniku.'],
      answerLeft: {answer: '<i>et problem</i>', next: 'problem2'},
    },
    problem2: {
      bubbles: ['<i>Kjempebra!</i>'],
      autoNext: 'RANDOM'
    },


    rom1: {
      bubbles: ['Określony “pokój” lub “przestrzeń”:'],
      answerLeft: {answer: '<i>romet</i>', next: 'rom1b'},
      answerRight: {answer: '<i>rommet</i>', next: 'rom2'}
    },
    rom1b: {
      bubbles: ['Podwajamy <i>m</i> w formie określonej.', '<i>et rom – rommet</i>', 'Takich słów spotkasz więcej. Np. kałuża: <i>en dam – dammen</i>.', 'Dlatego określony pokój to...'],
      answerLeft: {answer: '<i>rommet</i>', next: 'rom2'},
    },
    rom2: {
      bubbles: ['<i>Perfekt!</i>'],
      autoNext: 'RANDOM'
    },


    uke1: {
      bubbles: ['Określone “tygodnie”:'],
      answerLeft: {answer: '<i>ukene</i>', next: 'uke2'},
      answerRight: {answer: '<i>veker</i>', next: 'uke1b'}
    },
    uke1b: {
      bubbles: ['W określonej mnogiej zawsze końcówka <i>-ene</i>'],
      answerLeft: {answer: '<i>ukene</i>', next: 'uke2'},
    },
    uke2: {
      bubbles: ['<i>Ja!</i>'],
      autoNext: 'RANDOM'
    },


    skole1: {
      bubbles: ['Jakaś dowolna “szkoła”:'],
      answerLeft: {answer: '<i>en skole</i>', next: 'skole2'},
      answerRight: {answer: '<i>en skolen</i>', next: 'skole1b'}
    },
    skole1b: {
      bubbles: ['Nie może być jednocześnie rodzajnik z przodu i końcówka określona z tyłu. Nigdzie takiej formy nie spotkasz.'],
      answerLeft: {answer: 'OK, <i>en skole</i>', next: 'skole2'},
    },
    skole2: {
      bubbles: ['<i>Fint!</i>'],
      autoNext: 'RANDOM'
    },


    maaned1: {
      bubbles: ['Określony “miesiąc”:'],
      answerLeft: {answer: '<i>månen</i>', next: 'maaned1b'},
      answerRight: {answer: '<i>måneden</i>', next: 'maaned2'}
    },
    maaned1b: {
      bubbles: ['Zerknij na całość:', '<i>en måned – måneden – måneder – månedene</i>', 'Który to określony?'],
      answerLeft: {answer: '<i>måneden</i>', next: 'maaned2'},
    },
    maaned2: {
      bubbles: ['<i>Supert!</i>'],
      autoNext: 'RANDOM'
    },


    vaapen1: {
      bubbles: ['“Broń” w liczbie mnogiej nieokreślonej:'],
      answerLeft: {answer: '<i>våpen</i>', next: 'vaapen2'},
      answerRight: {answer: '<i>våpnene</i>', next: 'vaapen1b'}
    },
    vaapen1b: {
      bubbles: ['To było trudniejsze, co? <i>-ene</i> odpada, bo to forma określona, ale czemu nie ma <i>-er</i>? Dobre pytanie.', '<i>en våpen – våpenet – våpen – våpnene</i>'],
      answerLeft: {answer: 'czyli <i>våpen</i>', next: 'vaapen2'},
    },
    vaapen2: {
      bubbles: ['<i>Så bra! Det var vanskelig!</i>'],
      autoNext: 'RANDOM'
    },


    tale1: {
      bubbles: ['Norwegowie lubią długie przemowy na uroczystościach. Jak są określone “przemowy”?'],
      answerLeft: {answer: '<i>taler</i>', next: 'tale1b'},
      answerRight: {answer: '<i>talene</i>', next: 'tale2'}
    },
    tale1b: {
      bubbles: ['<i>en tale – talen – taler – talene</i>', 'Nic dziwnego z tym słowem się nie dzieje.'],
      answerLeft: {answer: '<i>talene</i>', next: 'tale2'},
    },
    tale2: {
      bubbles: ['Muszę powiedzieć, że dajesz radę.'],
      autoNext: 'RANDOM'
    },


    blod1: {
      bubbles: ['Czy możemy zrobić liczbę mnogą od słowa “krew”, czyli <i>blod</i>?'],
      answerLeft: {answer: 'tak', next: 'blod1b'},
      answerRight: {answer: 'nie', next: 'blod2'}
    },
    blod1b: {
      bubbles: ['Krew po norwesku jest niepoliczalna. Nie powiesz jedna krew, dwie krwie... czy coś podobnego. Czy możesz więc zrobić liczbę mnogą? Nie.'],
      answerLeft: {answer: '', next: 'blod2'},
    },
    blod2: {
      bubbles: ['Słusznie.'],
      autoNext: 'RANDOM'
    },


    land1: {
      bubbles: ['Jak są po norwesku “kraje”, nieokreślone.'],
      answerLeft: {answer: '<i>land</i>', next: 'land2'},
      answerRight: {answer: '<i>lander</i>', next: 'land1b'}
    },
    land1b: {
      bubbles: ['<i>et land – landet – land – landene</i>', 'Jak widzisz to słowo jest jednosylabowe rodzaju <i>et</i> i dlatego nie otrzymuje już końcówki <i>-er</i>.'],
      answerLeft: {answer: 'OK, <i>land</i>', next: 'land2'},
    },
    land2: {
      bubbles: ['Dobrze.'],
      autoNext: 'RANDOM'
    },


    bord1: {
      bubbles: ['Jak jest nieokreślony “stół”:'],
      answerLeft: {answer: '<i>et bord</i>', next: 'bord2'},
      answerRight: {answer: '<i>en stol</i>', next: 'bord1b'}
    },
    bord1b: {
      bubbles: ['<i>En stol</i> to krzesło, a stół:'],
      answerLeft: {answer: '<i>et bord</i>', next: 'bord2'},
    },
    bord2: {
      bubbles: ['OK'],
      autoNext: 'RANDOM'
    },


    krig1: {
      bubbles: ['Na świecie jest teraz wiele wojen. Jak są “wojny”, nieokreślone?'],
      answerLeft: {answer: '<i>kriger</i>', next: 'krig2'},
      answerRight: {answer: '<i>krigene</i>', next: 'krig1b'}
    },
    krig1b: {
      bubbles: ['<i>Krigene</i> to określone wojny. Niestety. Nieokreślone to...'],
      answerLeft: {answer: '<i>kriger</i>', next: 'krig2'},
    },
    krig2: {
      bubbles: ['Dobra odpowiedź.'],
      autoNext: 'RANDOM'
    },


    pris1: {
      bubbles: ['Jak są określone ceny?'],
      answerLeft: {answer: '<i>priser</i>', next: 'pris1b'},
      answerRight: {answer: '<i>prisene</i>', next: 'pris2'}
    },
    pris1b: {
      bubbles: ['<i>en pris – prisen – priser – prisene</i>', 'W liczbie mnogiej określonej zawsze <i>-ene</i>.'],
      answerLeft: {answer: '<i>prisene</i>', next: 'pris2'},
    },
    pris2: {
      bubbles: [':-)'],
      autoNext: 'RANDOM'
    },


    hjerte1: {
      bubbles: ['Jak jest “serce”? <3 Określone.'],
      answerLeft: {answer: '<i>hjertet</i>', next: 'hjerte2'},
      answerRight: {answer: '<i>hjernen</i>', next: 'hjerte1b'}
    },
    hjerte1b: {
      bubbles: ['<i>En hjerne</i> to mózg. <i>Et hjerte</i> to serce. A określone?'],
      answerLeft: {answer: '<i>hjertet</i>', next: 'hjerte2'},
    },
    hjerte2: {
      bubbles: ['<3 <3 <3'],
      autoNext: 'RANDOM'
    },


    klokke1: {
      bubbles: ['“Zegar”, “zegarek” nieokreślony to:'],
      answerLeft: {answer: '<i>ei klokka</i>', next: 'klokke1b'},
      answerRight: {answer: '<i>ei klokke</i>', next: 'klokke2'}
    },
    klokke1b: {
      bubbles: ['Zobacz: <i>ei klokke – klokka – klokker – klokkene</i>', 'Dlatego...'],
      answerLeft: {answer: '<i>ei klokke</i>', next: 'klokke2'},
    },
    klokke2: {
      bubbles: ['<i>Riktig!</i>'],
      autoNext: 'RANDOM'
    },


    plan1: {
      bubbles: ['Jak jest nieokreślony “plan”?'],
      answerLeft: {answer: '<i>en plan</i>', next: 'plan2'},
      answerRight: {answer: '<i>et plan</i>', next: 'plan1b'}
    },
    plan1b: {
      bubbles: ['Niestety rodzaj męski.'],
      answerLeft: {answer: '<i>en plan</i>', next: 'plan2'},
    },
    plan2: {
      bubbles: ['<i>Det er rett!</i>'],
      autoNext: 'RANDOM'
    },


    sjef1: {
      bubbles: ['Jak jest “szef” nieokreślony?'],
      answerLeft: {answer: '<i>en sjef</i>', next: 'sjef2'},
      answerRight: {answer: '<i>en chief</i>', next: 'sjef1b'}
    },
    sjef1b: {
      bubbles: ['[emot lapka na czoło]'],
      answerLeft: {answer: '<i>en sjef</i>', next: 'sjef2'},
    },
    sjef2: {
      bubbles: ['<i>Det er norsk!</i>'],
      autoNext: 'RANDOM'
    },


    person1: {
      bubbles: ['Określona “osoba”:'],
      answerLeft: {answer: '<i>personer</i>', next: 'person1b'},
      answerRight: {answer: '<i>personen</i>', next: 'person2'}
    },
    person1b: {
      bubbles: ['<i>Personer</i> to osoby, bo w liczbie mnogiej jest końcówka <i>-er</i>.', 'W pojedynczej masz do wyboru: <i>en person – personen</i>. Która jest określona?'],
      answerLeft: {answer: '<i>personen</i>', next: 'person2'},
    },
    person2: {
      bubbles: ['<i>Fint!</i>'],
      autoNext: 'RANDOM'
    },


    oel1: {
      bubbles: ['Kiedy zamawiasz jedno “piwo”, to mówisz:'],
      answerLeft: {answer: '<i>en øl</i>', next: 'oel2'},
      answerRight: {answer: '<i>øl</i>', next: 'oel2'}
    },
    oel1b: {
      bubbles: ['Rodzajniki <i>en, ei, et</i> oznaczają jedną sztukę. Dlatego...'],
      answerLeft: {answer: '<i>en øl</i>', next: 'oel2'},
    },
    oel2: {
      bubbles: ['<i>Så flink du er!</i>'],
      autoNext: 'RANDOM'
    },


    ting1: {
      bubbles: ['“Rzeczy” bliżej nieokreślone, to:'],
      answerLeft: {answer: '<i>ting</i>', next: 'ting2'},
      answerRight: {answer: '<i>tinger</i>', next: 'ting1b'}
    },
    ting1b: {
      bubbles: ['Zobacz, to wyjątek:', '<i>en ting – tingen – ting – tingene</i>', 'To jak są jakieś “rzeczy”?'],
      answerLeft: {answer: '<i>ting</i>', next: 'ting2'},
    },
    ting2: {
      bubbles: ['<i>Uten feil!</i>'],
      autoNext: 'RANDOM'
    },


    kontakt1: {
      bubbles: ['Gdy masz wiele kontaktów, to powiesz: <i>Jeg har mange...</i>'],
      answerLeft: {answer: '<i>kontakter</i>', next: 'kontakt2'},
      answerRight: {answer: '<i>kontakt</i>', next: 'kontakt1b'}
    },
    kontakt1b: {
      bubbles: ['Jeśli <i>mange</i>, to z pewnością rzeczownik w liczbie mnogiej (z końcówką <i>-er</i>).'],
      answerLeft: {answer: '', next: 'kontakt2'},
    },
    kontakt2: {
      bubbles: ['<i>Så flott!</i>'],
      autoNext: 'RANDOM'
    },


    konge1: {
      bubbles: ['“Król” określony:'],
      answerLeft: {answer: '<i>kongen</i>', next: 'konge2'},
      answerRight: {answer: '<i>King Kong</i>', next: 'konge1b'}
    },
    konge1b: {
      bubbles: ['<img src="http://giphy.com/gifs/warnerarchive-classic-film-son-of-kong-3oEdv9Xaqm76AzUsvu" />'],
      answerLeft: {answer: '', next: 'konge2'},
    },
    konge2: {
      bubbles: ['<i>Det er helt konge!</i>'],
      autoNext: 'RANDOM'
    },


    eier1: {
      bubbles: ['“Właściciele” określeni.'],
      answerLeft: {answer: '<i>eiere</i>', next: 'eier1b'},
      answerRight: {answer: '<i>eierne</i>', next: 'eier2'}
    },
    eier1b: {
      bubbles: ['<i>en eier – eieren – eiere – eierne</i>', 'Określeni to?'],
      answerLeft: {answer: '<i>eierne</i>', next: 'eier2'},
    },
    eier2: {
      bubbles: ['<i>Yes!</i> [emot ludziki]'],
      autoNext: 'RANDOM'
    },


    hjerne1: {
      bubbles: ['“Mózg” nieokreślony.'],
      answerLeft: {answer: '<i>en hjerne</i>', next: 'hjerne2'},
      answerRight: {answer: '<i>en hjern</i>', next: 'hjerne1b'}
    },
    hjerne1b: {
      bubbles: ['<i>en hjerne – hjernen – hjerner – hjernene</i>', 'Więc?'],
      answerLeft: {answer: '<i>en hjerne</i>', next: 'hjerne2'},
    },
    hjerne2: {
      bubbles: ['OK'],
      autoNext: 'RANDOM'
    },


    tegn1: {
      bubbles: ['“Znak” nieokreślony:'],
      answerLeft: {answer: '<i>et tegn</i>', next: 'tegn2'},
      answerRight: {answer: '<i>et tegne</i>', next: 'tegn1b'}
    },
    tegn1b: {
      bubbles: ['<i>et tegn – tegnet – tegn – tegnene</i>'],
      answerLeft: {answer: 'Aha, <i>et tegn</i>', next: 'tegn2'},
    },
    tegn2: {
      bubbles: ['<i>Godt.</i>'],
      autoNext: 'RANDOM'
    },


    svin1: {
      bubbles: ['“Świnia” nieokreślona. No co, też popularne słowo.'],
      answerLeft: {answer: '<i>et svin</i>', next: 'svin2'},
      answerRight: {answer: '<i>et svina</i>', next: 'svin1b'}
    },
    svin1b: {
      bubbles: ['<i>et svin – svinet – svin – svinene</i>', 'To jak będą dwie świnie?', '<i>To svin</i>.', 'A jedna?'],
      answerLeft: {answer: '<i>et svin</i>', next: 'svin2'}
    },
    svin2: {
      bubbles: ['Dobrze. A <i>et pinnsvin</i>? To oczywiście: [emot jeż]'],
      autoNext: 'RANDOM'
    },


    tak1: {
      bubbles: ['Jak będą “dachy” lub “sufity” w formie nieokreślonej?'],
      answerLeft: {answer: '<i>takk</i>', next: 'tak1b'},
      answerRight: {answer: '<i>tak</i>', next: 'tak2'}
    },
    tak1b: {
      bubbles: ['Dach odmieniamy tak:', '<i>et tak – taket – tak – takene</i>'],
      answerLeft: {answer: '<i>tak</i>', next: 'tak2'},
    },
    tak2: {
      bubbles: ['OK. <i>Takk for svaret</i>!'],
      autoNext: 'RANDOM'
    },


    bad1: {
      bubbles: ['“Łazienka” lub “kąpiel” określona:'],
      answerLeft: {answer: '<i>et bad</i>', next: 'bad1b'},
      answerRight: {answer: '<i>badet</i>', next: 'bad2'}
    },
    bad1b: {
      bubbles: ['Rodzajnik z przodu oznacza zawsze formę nieokreśloną. Dlatego prawidłowo jest...'],
      answerLeft: {answer: '<i>badet</i>', next: 'bad2'},
    },
    bad2: {
      bubbles: ['<i>Korrekt!</i>'],
      autoNext: 'RANDOM'
    },


    sykehus1: {
      bubbles: ['Nieokreślone “szpitale”:'],
      answerLeft: {answer: '<i>sykehuser</i>', next: 'sykehus1b'},
      answerRight: {answer: '<i>sykehus</i>', next: 'sykehus2'}
    },
    sykehus1b: {
      bubbles: ['Pamiętasz jak odmieniamy dom?', '<i>et hus – huset – hus – husene</i>', 'Szpital odmieniamy tak samo. Ostatni człon jest jednosylabowy, rodzaju <i>et</i> i dlatego nie otrzymuje koncówki <i>-er</i>.'],
      answerLeft: {answer: '<i>sykehus</i>', next: 'sykehus2'},
    },
    sykehus2: {
      bubbles: ['Riktig!'],
      autoNext: 'RANDOM'
    },


    kropp1: {
      bubbles: ['“Ciało” w formie określonej:'],
      answerLeft: {answer: '<i>koppen</i>', next: 'kropp1b'},
      answerRight: {answer: '<i>kroppen</i>', next: 'kropp2'}
    },
    kropp1b: {
      bubbles: ['Wybrałeś [emot filiżanka]', 'Ciało to <i>en kropp</i>, a w formie określonej...'],
      answerLeft: {answer: '<i>kroppen</i>', next: 'kropp2'},
    },
    kropp2: {
      bubbles: ['<i>Uten feil!</i>'],
      autoNext: 'RANDOM'
    },


    jorda1: {
      bubbles: ['“Ziemia”, “gleba” określona:'],
      answerLeft: {answer: '<i>jorda</i>', next: 'jorda1b'},
      answerRight: {answer: '<i>jord</i>', next: 'jorda2'}
    },
    jorda1b: {
      bubbles: ['Zabrakło końcówki odpowiedniej dla rodzaju <i>ei</i> Czyli?'],
      answerLeft: {answer: '<i>jorda</i>', next: 'jorda2'},
    },
    jorda2: {
      bubbles: ['<i>Så kult!</i>'],
      autoNext: 'RANDOM'
    },


    sjanse1: {
      bubbles: ['“Szansa” określona:'],
      answerLeft: {answer: '<i>sjansen</i>', next: 'sjanse2'},
      answerRight: {answer: '<i>sjansa</i>', next: 'sjanse1b'}
    },
    sjanse1b: {
      bubbles: ['Nie ma więcej opcji poza:', '<i>en sjanse – sjansen – sjanser – sjansene</i>', 'Która jest określona?'],
      answerLeft: {answer: '<i>sjansen</i>', next: 'sjanse2'},
    },
    sjanse2: {
      bubbles: ['<i>Det var en god jobb!</i>', '<img src="http://giphy.com/gifs/applause-house-of-cards-robin-wright-3osxY8yHdijYBl6p2w" />'],
      autoNext: 'RANDOM'
    },


    forelder1: {
      bubbles: ['“Rodzic” nieokreślony'],
      answerLeft: {answer: '<i>en forelder</i>', next: 'forelder2'},
      answerRight: {answer: '<i>fordeler</i>', next: 'forelder1b'}
    },
    forelder1b: {
      bubbles: ['<i>Fordeler</i> to “zalety”. A rodzic?'],
      answerLeft: {answer: '<i>en forelder</i>', next: 'forelder2'},
    },
    forelder2: {
      bubbles: ['<i>Det var bra!</i>', '<img src="http://i1.wp.com/aftonnegrea.com/wp-content/uploads/2013/06/original-2.gif?fit=500%2C272" />'],
      autoNext: 'RANDOM'
    },


    lege1: {
      bubbles: ['“Lekarz” określony:'],
      answerLeft: {answer: '<i>en lege</i>', next: 'lege1b'},
      answerRight: {answer: '<i>legen</i>', next: 'lege2'}
    },
    lege1b: {
      bubbles: ['<img src="http://giphy.com/gifs/hugh-laurie-house-md-gregory-UzHxxqF1WO6UE" />', 'Określony z rodzajnikiem? Coś nie tak...'],
      answerLeft: {answer: '<i>legen</i>', next: 'lege2'},
    },
    lege2: {
      bubbles: ['Mhmm', '<img src="http://67.media.tumblr.com/tumblr_m3viuiMFVr1ru06ato1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    saker1: {
      bubbles: ['“Sprawy” nieokreślone:'],
      answerLeft: {answer: '<i>saken</i>', next: 'saker1b'},
      answerRight: {answer: '<i>saker</i>', next: 'saker2'}
    },
    saker1b: {
      bubbles: ['W liczbie mnogiej końcówka <i>-er</i>.'],
      answerLeft: {answer: '<i>saker</i>', next: 'saker2'},
    },
    saker2: {
      bubbles: ['Zgadza się. (Męskie sprawy)', '<img src="https://media.giphy.com/media/n6M6H9R0474ty/giphy.gif" />'],
      autoNext: 'RANDOM'
    },


    skade1: {
      bubbles: ['“Krzywdy”, “rany”, “szkody” określone:'],
      answerLeft: {answer: '<i>skadene</i>', next: 'skade2'},
      answerRight: {answer: '<i>skader</i>', next: 'skade1b'}
    },
    skade1b: {
      bubbles: ['Końcówka <i>-er</i> jest dla nieokreślsonej. Dla określonej jest <i>-ene</i>. Dlatego...'],
      answerLeft: {answer: '<i>skadene</i>', next: 'skade2'},
    },
    skade2: {
      bubbles: ['<img src="http://giphy.com/gifs/reactiongifs-13ZHjidRzoi7n2" />'],
      autoNext: 'RANDOM'
    },


    peolse1: {
      bubbles: ['“Kiełbasy”, “parówki” nieokreślone:'],
      answerLeft: {answer: '<i>pølsa</i>', next: 'peolse1b'},
      answerRight: {answer: '<i>pølser</i>', next: 'peolse2'}
    },
    peolse1b: {
      bubbles: ['<i>Pølsa</i> to jedna, konkret parówa. Jeśli chcesz kilka, to mówisz...'],
      answerLeft: {answer: '<i>pølser</i>', next: 'peolse2'},
    },
    peolse2: {
      bubbles: ['<img src="http://giphy.com/gifs/funny-games-xNk979fe8QFck" />'],
      autoNext: 'RANDOM'
    },


    fengsel1: {
      bubbles: ['“Więzienie” nieokreślone"'],
      answerLeft: {answer: '<i>et fengsel</i>', next: 'fengsel2'},
      answerRight: {answer: '<i>fengsler</i>', next: 'fengsel1b'}
    },
    fengsel1b: {
      bubbles: ['<i>et fengsel – fengselet – fengsler – fengslene</i>', 'Czyli?'],
      answerLeft: {answer: '<i>et fengsel</i>', next: 'fengsel2'},
    },
    fengsel2: {
      bubbles: ['<img src="http://giphy.com/gifs/dog-escape-yoink-l0OWistc2HUjf6PKM" />'],
      autoNext: 'RANDOM'
    },


    zzzz1: {
      bubbles: ['Nie zasypiasz?'],
      answerLeft: {answer: 'trochę', next: 'zzzz2'},
      answerRight: {answer: 'daję radę (emot dzilnego)', next: 'RANDOM'}
    },
    zzzz2: {
      bubbles: ['(gif na rozweselenie)'],
      autoNext: 'RANDOM'
    }

//    1: {
//      bubbles: [''],
//      answerLeft: {answer: '', next: '2'},
//      answerRight: {answer: '', next: '1b'}
//    },
//    1b: {
//      bubbles: [''],
//      answerLeft: {answer: '', next: '2'},
//    },
//    2: {
//      bubbles: [''],
//      autoNext: 'RANDOM'
//    }


  };


  this.end = {
    a1: {
      bubbles: ['Gładko Ci poszło!', '<img src="http://media1.popsugar-assets.com/files/thumbor/hpwcM43YoPta6y9Sw286KFJKsmM/fit-in/1024x1024/filters:format_auto-!!-:strip_icc-!!-/2014/07/02/996/n/1922283/91eb4125c5aa920d_Dancing/i/When-Gang-Does-Group-Dance-Too.gif" />', ''],
      autoNext: 'END'
    },
    b1: {
      bubbles: ['To były najczęściej używane rzeczowniki w potocznym języku. Jeśli opanowałeś zasady tworzenia wszystkich czterech form, to na tej zasadzie będziesz już tworzyć kolejne!', '<img src="https://media.giphy.com/media/Bi6FcO7UoutWM/giphy.gif" />'],
      autoNext: 'END'
    },
    c1: {
      bubbles: ['Muszę już jechać.', '<img src="http://giphy.com/gifs/lol-owl-vjnLzg78di4wM" />', 'Trzymaj się!'],
      autoNext: 'END'
    }
  };



}
</script>
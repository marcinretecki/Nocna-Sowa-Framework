<script>
function LasChatData() {

  var now = new Date(),
      hour = now.getHours(),
      poraDnia = "",
      mistakes,
      mistake;

  switch (true) {
    case hour >= 5 && hour < 10:
      poraDnia = "ranek";
      break;
    case hour >= 10 && hour < 12:
      poraDnia = "przedpołudnie";
      break;
    case hour >= 12 && hour < 18:
      poraDnia = "popołudnie";
      break;
    case hour >= 18 && hour < 22:
      poraDnia = "wieczór";
      break;
    default:
      poraDnia = "noc";
  };


  mistakes = ["Czy jesteś pewny?", "Jeszcze się zastanów.", "Masz jakąś inną propozycję?", "Masz jakiś inny pomysł?", "Czy to Twoja ostateczna odpowiedź?", "Czy aby na pewno?"];

  function mistake() {
    var r = mistakes[Math.floor(Math.random() * mistakes.length)];
    return r;
  };


  this.data = {
    intro1: {
      bubbles: ["Hej, tu Sowa.", "Co powiesz na " + poraDnia + " z norweskim rzeczownikiem?"],
      answerLeft: {answer: 'jasne!', next: 'intro2'},
      answerRight: {answer: 'mogę spróbować', next: 'intro2'}
    },
    intro2: {
      bubbles: ["Chcesz najpierw zrobić odpowiedni nastrój?"],
      answerLeft: {answer: 'świeczki, kąpiel, te sprawy', next: 'intro3'},
      answerRight: {answer: 'nie, dzięki', next: 'intro4'}
    },
    intro3: {
      bubbles: ["<img src='http://66.media.tumblr.com/7a838474e14eb3307c97cf2d91724d74/tumblr_mhnvxe11RD1qigluvo1_500.gif' />", "<i>Så koselig!</i>"],
      autoNext: 'intro4'
    },
    intro4: {
      bubbles: ["Czy pamiętasz, jak odmieniamy rzeczownik?"],
      answerLeft: {answer: 'pewnie', next: 'intro5'},
      answerRight: {answer: 'eee, chyba...', next: 'help1'}
    },
    intro5: {
      bubbles: ["Jaka będzie forma określona od <q class='no-break'>ei ugle</q>?"],
      answerLeft: {answer: '<i>ugla</i>', next: 'intro6'},
      answerRight: {answer: '<i>uglet</i>', next: 'intro5b'}
    },
    intro5b: {
      bubbles: ["Jesteś pewny?"],
      answerLeft: {answer: '<i>ugla</i>', next: 'intro6'},
      answerRight: {answer: '???', next: 'help1'}
    },
    intro6: {
      bubbles: ['<i>Fint</i>! <span class="emojione emojione-1f44c-1f3fc"></span>', "To jak będą <q>dwie sowy</q>?"],
      answerLeft: {answer: '<i>to ugler</i>', next: 'intro7'},
      answerRight: {answer: '<i>to ugla</i>', next: 'intro6b'}
    },
    intro6b: {
      bubbles: ['Hmm... <span class="emojione emojione-1f914"></span>', "<q>Ugla</q> to jedna, konkretna sowa, więc w liczbie mnogiej musi być jakaś inna forma."],
      answerLeft: {answer: '<i>to ugler</i>?', next: 'intro7'},
      answerRight: {answer: 'nie rozumiem', next: 'help1'}
    },
    intro7: {
      bubbles: ['Brawo!!', '<img src="http://reactiongifs.me/wp-content/uploads/2013/09/clapping-crowd-applause.gif" />', "Skoro już poznałeś sowy, to jak powiesz <q>Sowy śpią.</q>?"],
      answerLeft: {answer: '<i>uglene sover</i>', next: 'intro8'},
      answerRight: {answer: '<i>uglene står opp</i>', next: 'intro7b'}
    },
    intro7b: {
      bubbles: ["<span class='emojione emojione-1f926-1f3fb'></span>"],
      answerLeft: {answer: 'wiem, wiem: <i>uglene sover</i>', next: 'intro8'},
    },
    intro8: {
      bubbles: ["<i>Supert</i>!", '<img src="https://media.giphy.com/media/o405yKLOCbbCo/giphy.gif" />', "Odmianę rzeczownika podajemy zawsze w tej samej kolejności:", "<i>ei ugle, ugla, ugler, uglene</i>", "W taki   sposób podają odmianę dobre słowniki (Lexin, Bokmålsordboka)."],
      answerLeft: {answer: 'OK', next: 'ananas1'},
      answerRight: {answer: 'ale, co to w sumie znaczy?', next: 'intro8b'}
    },
    intro8b: {
      bubbles: ["<i>Ei ugle</i> – forma nieokreślona pojedyncza.", "Używasz jej, gdy mówisz o jednej, nieznanej Ci sowie."],
      answerLeft: {answer: 'OK <span class="emojione emojione-1f44d-1f3fc"></span>', next: "intro8b2"}
    },
    intro8b2: {
      bubbles: ["<i>Ugla</i> – forma określona pojedyncza.", '<img src="https://media.giphy.com/media/dEqwoizBLDKuI/giphy.gif" />', "To jest jedna, konkretna sowa. Ta, którą Ty i Twój przyjaciel dobrze znacie."],
      answerLeft: {answer: 'A liczba mnoga? <span class="emojione emojione-1f914"></span>', next: "intro8b3"}
    },
    intro8b3: {
      bubbles: ['<i>Ugler</i> – forma nieokreślona mnoga.', 'Czyli kilka dowolnych sów. <span class="emojione emojione-1f989"></span><span class="emojione emojione-1f989"></span><span class="emojione emojione-1f985"></span><span class="emojione emojione-1f989"></span>', '<i>Uglene</i> – forma określona mnoga.', '<img src="https://media.giphy.com/media/DddQsgwukpGne/giphy.gif" />', 'To są  konkretne sowy.'],
      answerLeft: {answer: 'OK, rozumiem <span class="emojione emojione-1f60e"></span>', next: "ananas1"},
    },


    help1: {
      bubbles: ["Norweskie rzeczowniki mają przynajmniej jeden z trzech rodzajów: <q>en</q> (męski), <q>ei</q> (żeński), <q>et</q> (nijaki)." , "Czy uczysz się rzeczowników razem z rodzajnikiem?"],
      answerLeft: {answer: 'tak <span class="emojione emojione-1f607"></span>', next: 'help2'},
      answerRight: {answer: 'a powinienem? <span class="emojione emojione-1f631"></span>', next: 'help1b'}
    },
    help1b: {
      bubbles: ['Rodzaje w języku polskim i norweskim są różne nawet dla słów o tym samym znaczeniu. Po polsku mamy <q>ten dom</q> (męski)  ale po norwesku <q>et hus</q> (nijaki).', 'Dlatego każdego rzeczownika musisz uczyć się razem z rodzajnikiem (<i>en, ei, et</i>).'],
      answerLeft: {answer: 'OK, <i>et</i> <span class="emojione emojione-1f3e0"></span>', next: 'help2'},
    },
    help2: {
      bubbles: ["W jakiej formie jest rzeczownik, gdy postawimy przed nim rodzajnik? (np: <q>et hus</q>)"],
      answerLeft: {answer: 'określonej', next: 'help2b'},
      answerRight: {answer: 'nieokreślonej', next: 'help2a'}
    },
    help2a:{
      bubbles: ['<img src="http://cdn.sptndigital.com/sites/pl.axn/files/axn-cinemagraphs-15.gif" />'],
      autoNext: "help3"
    },
    help2b: {
      bubbles: ["Niestety nie. <q>Et hus</q> to <q>jakiś dom</q>, czyli forma nieokreślona.", "<q>Huset</q> to konkretny jeden dom, czyli   forma określona. Czy podać Ci odmianę wszystkich rodzajów?"],
      answerLeft: {answer: 'tak <span class="emojione emojione-1f575-1f3fc"></span>', next: 'help3'},
      answerRight: {answer: 'nie, już ogarniam', next: 'ananas1'}
    },
    help3: {
      bubbles: ['<i>en hund &rarr; hunden</i> <span class="emojione emojione-1f436"></span>', '<i>ei bok &rarr; boka</i> <span class="emojione emojione-1f4d9"></span>', '<i>et hus &rarr; huset</i> <span class="emojione emojione-1f3da"></span>', "To jaka będzie forma określona  od <q>en mann</q>?"],
      answerLeft: {answer: '<i>mannen</i>', next: 'help4'},
      answerRight: {answer: '<i>manna</i>', next: 'help3b'}
    },
    help3b: {
      bubbles: ["Czy na pewno? Zerknij jeszcze raz."],
      answerLeft: {answer: '<i>mannen</i> <span class="emojione emojione-1f4aa-1f3fc"></span>', next: 'help4'},
    },
    help4: {
      bubbles: ['<img src="https://media.giphy.com/media/3o6Zt3L6FKKFJXSMUg/giphy.gif" />', "<i>Supert!</i> <span class='emojione emojione-1f44d-1f3fc'></span>", "<q>Ei ugle</q> to jedna sowa. <q>Ugler</q> to sowy w liczbie mnogiej nieokreślonej.", "Jaką więc końcówkę dodajemy w liczbie mnogiej nieokreślonej?"],
      answerLeft: {answer: '<i>-er</i>', next: 'help5'},
      answerRight: {answer: '<i>-ene</i>', next: 'help4b'}
    },
    help4b: {
      bubbles: ["Zobacz:", '<i>ei ugle &rarr; ugler</i>'],
      answerLeft: {answer: 'Aha, <i>-er</i>', next: 'help5'},
    },
    help5: {
      bubbles: ['<span class="emojione emojione-1f44f-1f3fc"></span><span class="emojione emojione-1f44f-1f3fc"></span><span class="emojione emojione-1f44f-1f3fc"></span>', "Końcówkę <i>-ene</i> dodajemy w liczbie mnogiej określonej. To jak  powiesz o konkretnych sowach?"],
      answerLeft: {answer: '<i>uglene</i>', next: 'help6'},
      answerRight: {answer: '<i>ugler</i>', next: 'help5b'}
    },
    help5b: {
      bubbles: ['<span class="emojione emojione-1f648"></span>', "<q>Ugler</q> to nieokreślone sowy. Żeby stworzyć formę określoną, musisz dodać końcówkę <i>-ene</i>."],
      answerLeft: {answer: '<i>uglene</i>', next: 'help6'}
    },
    help6: {
      bubbles: ["Wymiatasz!", '<img src="http://66.media.tumblr.com/4426150f6cda3452076012a7b92764c7/tumblr_n6qez6ppqU1qze60do1_400.gif" />', 'Jest jeszcze jedna zasada. <span class="emojione emojione-261d-1f3fc"></span>', "Rzeczowniki, które są jednoczeście jednosylabowe (np: <q>et hus</q>) oraz mają  rodzaj nijaki (<q>et</q>), nie otrzymują końcówki <i>-er</i>.", '<i>et hus &rarr; 2 hus</i>', '<i>et glass &rarr; 2 glass</i>', 'Wiem, że to długa regułka, ale postaraj się ją zapamiętać.'],
      answerLeft: {answer: 'OK, jednosylabowe <q>et</q> <span class="emojione emojione-1f4dd"></span>', next: 'help7'}
    },
    help7: {
      bubbles: ['Jeden pociąg to <q>et tog</q>. <span class="emojione emojione-1f69e"></span>', "Jak więc będzie pięć pociągów?"],
      answerLeft: {answer: '<i>fem tog</i>', next: 'help8'},
      answerRight: {answer: '<i>fem toger</i>', next: 'help7b'}
    },
    help7b: {
      bubbles: ['<span class="emojione emojione-1f926-1f3fb"></span>', 'Jednosylabowe rodzaju <q>et</q> nie otrzymują końcówki <i>-er</i>. Możemy powiedzieć <q>toger</q>?'],
      answerLeft: {answer: 'nie, powinno być: <q>fem tog</q>', next: 'help8'},
    },
    help8: {
      bubbles: ['Oł jee. <span class="emojione emojione-1f46f"></span><span class="emojione emojione-1f46f"></span>', '<img src="http://mixdabmedia.com/wp-content/uploads/2016/04/1.gif" />', "Gotowy na kolejne przykłady?"],
      answerLeft: {answer: 'zawsze!', next: 'ananas1'},
    },

    ananas1: {
      bubbles: ["Jak będzie po norwesku <q>ananas</q>?"],
      answerLeft: {answer: '<i>en ananas</i>', next: 'ananas2'},
      answerRight: {answer: '<i>a pineapple</i>', next: 'ananas1b'},
    },
    ananas1b: {
      bubbles: [mistake()],
      answerLeft: {answer: '<i>en ananas</i> <span class="emojione emojione-1f34d"></span>', next: 'ananas2'},
    },
    ananas2: {
      bubbles: ["OK, to jak będą <q>trzy ananasy</q>?", '<img src="http://www.robmydobrze.pl/wp-content/uploads/2014/12/0941a7fe77f7b159296bf940ba716db0.gif" />'],
      answerLeft: {answer: '<i>tre ananas</i>', next: 'ananas2b'},
      answerRight: {answer: '<i>tre ananaser</i>', next: 'ananasEnd'}
    },
    ananas2b: {
      bubbles: ["Czy nie powinieneś dodać tam jakiejś końcówki?"],
      answerLeft: {answer: '<i>tre ananaser</i> <span class="emojione emojione-1f34d"></span><span class="emojione emojione-1f34d"></span><span class="emojione emojione-1f34d"></span>', next: 'ananasEnd'},
    },
    ananasEnd: {
      bubbles: ['<i>Kjempebra!</i> <span class="emojione emojione-1f942"></span>', 'Widzę, ze bawisz się coraz lepiej.', '<img src="http://66.media.tumblr.com/6ddd98ebc25fc75ff2fca925196a77df/tumblr_mydtpe3UjO1rdfgw4o1_r1_500.gif" />'],
      autoNext: 'speil1'
    },

    speil1: {
      bubbles: ["Jak jest <q>lustro</q> po norwesku?"],
      answerLeft: {answer: '<i>speil</i>', next: 'speil1b'},
      answerRight: {answer: '<i>et speil</i>', next: 'speil2'}
    },
    speil1b: {
      bubbles: ["Powinieneś uczyć się rzeczowników razem z rodzajnikiem, dlatego:"],
      answerLeft: {answer: '<i>et speil</i>', next: 'speil2'},
    },
    speil2: {
      bubbles: ["Jak będzie <q>lustro</q> w formie określonej?", '<img src="http://www.robmydobrze.pl/wp-content/uploads/2014/12/43ce8c57fe7d23b4e0de490b35e4b8f5.gif" />'],
      answerLeft: {answer: '<i>speilet</i>', next: 'speil3'},
      answerRight: {answer: '<i>speilen</i>', next: 'speil2b'}
    },
    speil2b: {
      bubbles: [mistake()],
      answerLeft: {answer: '<i>speilet</i>', next: 'speil3'}
    },
    speil3: {
      bubbles: ['<i>Utmerket!</i>', 'Zostały nam jeszcze lustra w liczbie mnogiej.'],
      answerLeft: {answer: '<i>speiler, speilene</i>', next: 'speil3b'},
      answerRight: {answer: '<i>speil, speilene</i>', next: 'speilEnd'}
    },
    speil3b: {
      bubbles: ["<q>Speil</q> jest rodzaju <q>et</q> i ma jedną sylabę. Dlatego w liczbie mnogiej nieokreślonej, nie dodajemy <i>-er</i>."],
      answerLeft: {answer: '<i>speil, speilene</i>', next: 'speilEnd'},
    },
    speilEnd: {
      bubbles: ['Jesteś coraz lepszy! Publiczność nie może wyjść z podziwu.', '<img src="https://s-media-cache-ak0.pinimg.com/originals/f1/2d/ac/f12dace95494c385ff34f2d8e8fd34ed.gif" />'],
      autoNext: 'edder1'
    },

    edder1: {
      bubbles: ["Jeśli masz naprawdę mocne nerwy, to powiedz jak jest <q>pająk</q> po norwesku."],
      answerLeft: {answer: '<i>en edderkopp</i>', next: 'edder2'},
      answerRight: {answer: '<span class="emojione emojione-1f628"></span>', next: 'edder1b'}
    },
    edder1b: {
      bubbles: ["Nie bój się, nie gryzie.", "Jeden pająk to <q>en edderkopp</q>. Jak będzie konkretny pająk?"],
      answerLeft: {answer: '<i>edderkoppen</i>', next: 'edder3'},
      answerRight: {answer: '<i>edderkoppet</i>', next: 'edder2b'}
    },
    edder2: {
      bubbles: ['A w formie określonej? <span class="emojione emojione-1f578"></span>'],
      answerLeft: {answer: '<i>edderkoppen</i>', next: 'edder3'},
      answerRight: {answer: '<i>edderkoppet</i>', next: 'edder2b'}
    },
    edder2b: {
      bubbles: ['<span class="emojione emojione-1f421"></span>', mistake()],
      answerLeft: {answer: '<i>edderkoppen</i>', next: 'edder3'}
    },
    edder3: {
      bubbles: ['<span class="emojione emojione-1f44d-1f3fc"></span>', 'Zostały nam jeszcze <q>4 pająki</q>.'],
      answerLeft: {answer: '<i>fem edderkopp</i>', next: 'edder3b'},
      answerRight: {answer: '<i>fire edderkopper</i>', next: 'edderEnd'}
    },
    edder3b: {
      bubbles: ['Czy na pewno? <span class="emojione emojione-1f987"></span>'],
      answerLeft: {answer: '<i>fire edderkopper</i>', next: 'edderEnd'}
    },
    edderEnd: {
      bubbles: ['Jesteś mistrzem pająków! <span class="no-break"><span class="emojione emojione-1f577"></span><span class="emojione emojione-1f577"></span><span class="emojione emojione-1f577"></span><span class="emojione emojione-1f577"></span></span>', '<img src="http://66.media.tumblr.com/530d32e665881eb0b4186a56ddcf9618/tumblr_o7yzlecgzw1s01qkyo1_400.gif" />'],
      autoNext: 'troll1'
    },

    troll1: {
      bubbles: ['Teraz coś bardziej skandynawskiego.', 'Jak powiesz <q>jeden troll</q>? <span class="emojione emojione-1f43e"></span>'],
      answerLeft: {answer: '<i>en troll</i>', next: 'troll1b'},
      answerRight: {answer: '<i>et troll</i>', next: 'troll2'}
    },
    troll1b: {
      bubbles: ["Norweskie trolle są mało męskie. Bardziej nijakie, dlatego:"],
      answerLeft: {answer: '<i>et troll</i>', next: 'troll2'}
    },
    troll2: {
      bubbles: ["Jak będzie <q>kilka trolli</q>?"],
      answerLeft: {answer: '<i>noen troller</i>', next: 'troll2b'},
      answerRight: {answer: '<i>noen troll</i>', next: 'troll3'}
    },
    troll2b: {
      bubbles: ["<q>Troll</q> jest jednosylabowy rodzaju <i>et</i>. Nie dodajemy do niego końcówki <i>-er</i> w liczbie mnogiej."],
      answerLeft: {answer: '<i>noen troll</i>', next: 'troll3'}
    },
    troll3: {
      bubbles: ["Tak jest!", '<img src="http://67.media.tumblr.com/b30419e18fd0b4c2261e49df89ad4a06/tumblr_o228ldNkiO1rbhnqko1_400.gif" />', 'Jak powiesz <q>te trolle</q>?'],
      answerLeft: {answer: '<i>disse troll</i>', next: 'troll3b'},
      answerRight: {answer: '<i>disse trollene</i>', next: 'trollEnd'}
    },
    troll3b: {
      bubbles: ["Gdy wskazujesz na konkretne trolle, to trzeba dodać końcówkę mnogą określoną: <i>-ene</i>."],
      answerLeft: {answer: '<i>disse trollene</i>', next: 'trollEnd'}
    },
    trollEnd: {
      bubbles: ['<i>Bra</i>! <span class="emojione emojione-1f479"></span>'],
      autoNext: 'kjelke1'
    },

    kjelke1: {
      bubbles: ["Przed trollami najlepiej uciekać na sankach. Jak są <q>sanki</q> po norwesku?"],
      answerLeft: {answer: '<i>en kjelke</i>', next: 'kjelke1a'},
      answerRight: {answer: '<i>et kjelke</i>', next: 'kjelke1b'}
    },
    kjelke1a: {
      bubbles: ['<i>Flott</i>! <span class="emojione emojione-2744"></span>'],
      autoNext: 'kjelke2'
    },
    kjelke1b: {
      bubbles: ["<q>Kjelke</q> jest rodzaju <q>en</q>.", "Rodzaj rzeczownika zawsze znajdziesz w dobrym słowniku."],
      answerLeft: {answer: 'OK, jedziemy dalej <span class="emojione emojione-1f3c2"></span>', next: 'kjelke2'}
    },
    kjelke2: {
      bubbles: ['Jak będą określone <q>sanki</q>?'],
      answerLeft: {answer: '<i>kjelket</i>', next: 'kjelke2b'},
      answerRight: {answer: '<i>kjelken</i>', next: 'kjelke3'}
    },
    kjelke2b: {
      bubbles: ['<span class="emojione emojione-1f63f"></span>', 'Zerknij jeszcze raz, jakiego rodzaju było <q>kjelke</q>.'],
      answerLeft: {answer: '<i>kjelken</i>', next: 'kjelke3'}
    },
    kjelke3: {
      bubbles: ['<i>Fint!</i>', '<img src="https://media.giphy.com/media/UkGIDQEnFHOZq/giphy.gif" />', 'Zostały jeszcze sanki w liczbie mnogiej.'],
      answerLeft: {answer: '<i>kjelker, kjelkene</i>', next: 'kjelkeEnd'},
      answerRight: {answer: '<i>kjelke, kjelkene</i>', next: 'kjelke3b'}
    },
    kjelke3b: {
      bubbles: ['<q>Kjelke</q> jest rodzaju <q>en</q> i na dodatek ma dwie sylaby. Dlatego dodajemy normalnie końcówkę <i>-er</i>.'],
      answerLeft: {answer: '<i>kjelker, kjelkene</i>', next: 'kjelkeEnd'}
    },
    kjelkeEnd: {
      bubbles: ['<i>Kjempebra!</i> <span class="emojione emojione-2603"></span>'],
      autoNext: 'strand1'
    },

    strand1: {
      bubbles: ['Możemy teraz przejść do cieplejszych klimatów. Jak będzie <q>plaża</q> po norwesku?'],
      answerLeft: {answer: '<i>ei strand</i>', next: 'strand2'},
      answerRight: {answer: '<i>ei beach</i>', next: 'strand1b'}
    },
    strand1b: {
      bubbles: ['To było po angielsku <span class="no-break"><span class="emojione emojione-1f334"></span><span class="emojione emojione-2600"></span><span class="emojione emojione-1f643"></span></span>'],
      answerLeft: {answer: '<i>ei strand</i>', next: 'strand2'},
    },
    strand2: {
      bubbles: ['<i>Veldig bra!</i>', 'Jaka będzie forma określona <q>plaży</q>?'],
      answerLeft: {answer: '<i>strandet</i>', next: 'strand2b'},
      answerRight: {answer: '<i>stranda</i>', next: 'strand3'}
    },
    strand2b: {
      bubbles: ['<span class="emojione emojione-1f916"></span>', mistake()],
      answerLeft: {answer: '<i>stranda</i>', next: 'strand3'}
    },
    strand3: {
      bubbles: ['<img src="http://66.media.tumblr.com/c42c43ceb71694362ce4037a79b610b8/tumblr_numn2bQooJ1sh3d3po1_500.gif" />', 'Czy znasz liczbę mnogą od słowa <q>strand</q>?'],
      answerLeft: {answer: '<i>strander, strandene</i>', next: 'strand3b'},
      answerRight: {answer: '<i>strender, strendene</i>', next: 'strandEnd'}
    },
    strand3b: {
      bubbles: ['Niestety część rzeczowników ma nieregularną formę w liczbie mnogiej. <q>Strand</q> jest jednym z nich. <q>A</q> zamienia się tu na <q>e</q>. Nazywamy to przegłosem.'],
      answerLeft: {answer: '<i>strender, strendene</i>', next: 'strandEnd'}
    },
    strandEnd: {
      bubbles: ['<i>Supert!</i> <span class="emojione emojione-2600"></span><span class="emojione emojione-1f3c4"></span>'],
      autoNext: 'sang1'
    },

    sang1: {
      bubbles: ['Teraz coś regularnego. Piosenka po norwesku to <q>en sang</q>. Jak będzie wyglądała forma określona pojedyncza?'],
      answerLeft: {answer: '<i>sanger</i>', next: 'sang1b'},
      answerRight: {answer: '<i>sangen</i>', next: 'sang2'}
    },
    sang1b: {
      bubbles: ['Końcówkę <i>-er</i> dodajemy w liczbie mnogiej. Jaka końcówka będzie w formie określonej pojedynczej?'],
      answerLeft: {answer: '<i>sangen</i>', next: 'sang2'},
    },
    sang2: {
      bubbles: ['<span class="emojione emojione-1f3a4"></span>', 'Jaka więc będzie liczba mnoga nieokreślona?'],
      answerLeft: {answer: '<i>sanger</i>', next: 'sang3'},
      answerRight: {answer: '<i>sangen</i>', next: 'sang2b'}
    },
    sang2b: {
      bubbles: [mistake()],
      answerLeft: {answer: '<i>sanger</i>', next: 'sang3'},
    },
    sang3: {
      bubbles: ['<i>Bra!</i> W nagrodę występ.', '<img src="https://media.giphy.com/media/lO6LdSnlGrcoo/giphy.gif" />', 'Została jeszcze forma określona w liczbie mnogiej.'],
      answerLeft: {answer: '<i>sangene</i>', next: 'sangEnd'},
      answerRight: {answer: '<i>sanger</i>', next: 'sang3b'}
    },
    sang3b: {
      bubbles: [mistake()],
      answerLeft: {answer: '<i>sangene</i>', next: 'sangEnd'},
    },
    sangEnd: {
      bubbles: ['<span class="emojione emojione-1f3b6"></span><span class="emojione emojione-1f57a"></span><span class="emojione emojione-1f483"></span>'],
      autoNext: 'lyn1'
    },

    lyn1: {
      bubbles: ['Zrobiło się trochę mrocznie, nadeszły chmury, a z nimi błyskawica: <q>et lyn</q>. <span class="emojione emojione-1f329"></span>', 'Jaka będzie forma określona błyskawicy?'],
      answerLeft: {answer: '<i>lynet</i>', next: 'lyn2'},
      answerRight: {answer: '<i>lynen</i>', next: 'lyn1b'}
    },
    lyn1b: {
      bubbles: ['<span class="emojione emojione-1f647-1f3fb"></span>', mistake()],
      answerLeft: {answer: '<i>lynet</i>', next: 'lyn2'}
    },
    lyn2: {
      bubbles: ['<i>Supert!</i>', 'A błyskawice w liczbie mnogiej?'],
      answerLeft: {answer: '<i>lyner</i>', next: 'lyn2b'},
      answerRight: {answer: '<i>lyn</i>', next: 'lyn3'}
    },
    lyn2b: {
      bubbles: ['Czy <q>lyn</q> nie ma przypadkiem jednej sylaby? <span class="emojione emojione-1f646-1f3fb"></span>', 'I czy nie jest rodzaju <i>et</i>?'],
      answerLeft: {answer: 'no tak: <i>lyn</i>', next: 'lyn3'},
    },
    lyn3: {
      bubbles: ['<i>Du er så flink!</i>', '<img src="http://49.media.tumblr.com/d61c108245209328163171889a18d1d2/tumblr_nju3p7mMzc1u9vosqo1_500.gif" />', 'Jeszcze forma określona mnoga.'],
      answerLeft: {answer: '<i>lyn</i>', next: 'lyn3b'},
      answerRight: {answer: '<i>lynene</i>', next: 'lynEnd'}
    },
    lyn3b: {
      bubbles: ['W formie określonej mnogiej zawsze dodajemy końcówkę <i>-ene</i>.'],
      answerLeft: {answer: '<i>lynene</i>', next: 'lynEnd'}
    },
    lynEnd: {
      bubbles: ['<i>Hurra!</i> <span class="emojione emojione-26a1"></span><span class="emojione emojione-1f4a5"></span>'],
      autoNext: 'har1'
    },

    har1: {
      bubbles: ['Czy wiesz jak są <q>włosy</q> po norweksu?'],
      answerLeft: {answer: '<i>et hår</i>', next: 'har1b'},
      answerRight: {answer: '<i>(et) hår</i>', next: 'har2'}
    },
    har1b: {
      bubbles: ['<q>Hår</q> jest rodzaju <i>et</i>, ale jest to rzeczownik niepoliczalny. Dlatego używamy go bez rodzajnika.', 'Przy takich słowach możesz notować rodzajnik w nawiasie dla ułatwienia nauki.'],
      answerLeft: {answer: 'OK, <i>(et) hår</i>', next: 'har2'},
    },
    har2: {
      bubbles: ['Gdy mówisz o konkretnych włosach, jakiej formy użyjesz? <span class="emojione emojione-1f487-1f3fb"></span>'],
      answerLeft: {answer: '<i>hår</i>', next: 'har2b'},
      answerRight: {answer: '<i>håret</i>', next: 'har3'}
    },
    har2b: {
      bubbles: [mistake()],
      answerLeft: {answer: '<i>håret</i>', next: 'har3'}
    },
    har3: {
      bubbles: ['Właśnie tak.', '<img src="https://66.media.tumblr.com/f9cc3a0fa6e39a077d929adceaa277cf/tumblr_ncj53pNmiY1tejd70o1_500.gif" />', 'A czy możesz stworzyć liczbę mnogą od <q>hår</q>'],
      answerLeft: {answer: 'tak', next: 'har4'},
      answerRight: {answer: 'nie', next: 'har4'}
    },
    har4: {
      bubbles: ['Po norwesku traktujemy <q>(et) hår</q> jako całą fryzurę, a nie jeden włos. Mówimy, że jest to rzeczownik niepoliczalny i dlatego nie tworzymy od niego liczby mnogiej.', 'Gdy chcesz powiedzieć o jednym włosie, użyjesz <q>et hårstrå</q> (źdźbło włosa).'],
      answerLeft: {answer: 'OK <span class="emojione emojione-1f33e"></span>', next: 'harEnd'}
    },
    harEnd: {
      bubbles: ['<img src="/c/i/gif/har2.gif" />', 'Gdy już włosy masz ułożone, możesz jechać na urlop. <span class="emojione emojione-26f5"></span>'],
      autoNext: 'ferie1'
    },

    ferie1: {
      bubbles: ['Urlop albo wakacje to <q>en ferie</q>. Jak powiesz <q>te wakacje</q>?'],
      answerLeft: {answer: '<i>ferien</i>', next: 'ferie2'},
      answerRight: {answer: '<i>ferier</i>', next: 'ferie1b'}
    },
    ferie1b: {
      bubbles: [mistake()],
      answerLeft: {answer: '<i>ferien</i>', next: 'ferie2'}
    },
    ferie2: {
      bubbles: ['<i>Bra!</i> Niektórzy mają to szczęście, że mogą wziąć urlop kilka razy w roku. <span class="no-break"><span class="emojione emojione-26e9"></span><span class="emojione emojione-1f6a3"></span><span class="emojione emojione-26f7"></span><span class="emojione emojione-1f3a3"></span></span>', 'Jaka będzie forma mnoga nieokreślona?'],
      answerLeft: {answer: '<i>feriene</i>', next: 'ferie2b'},
      answerRight: {answer: '<i>ferier</i>', next: 'ferie3'}
    },
    ferie2b: {
      bubbles: [mistake()],
      answerLeft: {answer: '<i>ferier</i>', next: 'ferie3'}
    },
    ferie3: {
      bubbles: ['<img src="http://www.escapeartistes.com/wp-content/uploads/2015/11/piscina.gif" />', 'Powiedz jeszcze, jak będą <q>te urlopy</q>?'],
      answerLeft: {answer: '<i>feriene</i>', next: 'ferieEnd'},
      answerRight: {answer: '<i>ferien</i>', next: 'ferie3b'}
    },
    ferie3b: {
      bubbles: [mistake()],
      answerLeft: {answer: '<i>feriene</i>', next: 'ferieEnd'},
    },
    ferieEnd: {
      bubbles: ['Doskonale! <span class="emojione emojione-1f3d6"></span>'],
      autoNext: 'bie1'
    },

    bie1: {
      bubbles: ['Czasem na urlopie może Cię coś użądlić. Jak jest <q>pszczoła</q> po norwesku?'],
      answerLeft: {answer: '<i>ei bie</i>', next: 'bie2'},
      answerRight: {answer: '<i>a bee</i>', next: 'bie1b'}
    },
    bie1b: {
      bubbles: ['Piękna angielszczyzna! A po norwesku?'],
      answerLeft: {answer: '<i>ei bie</i>', next: 'bie2'}
    },
    bie2: {
      bubbles: ['To teraz <q>ta pszczoła</q>'],
      answerLeft: {answer: '<i>bia</i>', next: 'bie3'},
      answerRight: {answer: '<i>biea</i>', next: 'bie2b'}
    },
    bie2b: {
      bubbles: ['Gdy rzeczownik kończy się na <i>-e</i>, często ulega ono redukcji zanim dodamy końcówkę.', '<i>ei bie &rarr; bia</i> <span class="emojione emojione-1f41d"></span>', '<i>ei klokke &rarr; klokka</i> <span class="emojione emojione-1f570"></span>', '<i>ei rumpe &rarr; rumpa</i> <span class="emojione emojione-1f62f"></span>'],
      answerLeft: {answer: 'OK: <i>bia</i>', next: 'bie3'},
    },
    bie3: {
      bubbles: ['A pszczoły w liczbie mnogiej?'],
      answerLeft: {answer: '<i>bier, biene</i>', next: 'bieEnd'},
      answerRight: {answer: '<i>bien, biene</i>', next: 'bie3b'}
    },
    bie3b: {
      bubbles: [mistake()],
      answerLeft: {answer: '<i>bier, biene</i>', next: 'bieEnd'},
    },
    bieEnd: {
      bubbles: ['Uhuu!', '<img src="https://media.giphy.com/media/l0K4m0mzkJDAIdhHW/giphy.gif" />'],
      autoNext: 'fjord1'
    },

    fjord1: {
      bubbles: ['Lecimy dalej. <span class="emojione emojione-1f680"></span>', '<span class="emojione emojione-26f0"></span> <q>En fjord</q> to słowo, którego nie trzeba tłumaczyć, ale warto znać formę określoną.'],
      answerLeft: {answer: '<i>fjordet</i>', next: 'fjord1b'},
      answerRight: {answer: '<i>fjorden</i>', next: 'fjord2'}
    },
    fjord1b: {
      bubbles: [mistake()],
      answerLeft: {answer: '<i>fjorden</i>', next: 'fjord2'},
    },
    fjord2: {
      bubbles: ['<i>Godt!</i> <span class="emojione emojione-1f91d-1f3fc"></span>', 'W Norwegii jest więcej niż jeden. Jak będą <q>fiordy</q> w liczbie mnogiej?'],
      answerLeft: {answer: '<i>fjord</i>', next: 'fjord2b'},
      answerRight: {answer: '<i>fjorder</i>', next: 'fjord3'}
    },
    fjord2b: {
      bubbles: ['<q>Fjord</q> jest jednosylabowy, ale rodzaju <i>en</i>. Dlatego dodajemy do niego końcówkę <i>-er</i>, jak do każdego regularnego rzeczownika.'],
      answerLeft: {answer: '<i>fjorder</i>', next: 'fjord3'}
    },
    fjord3: {
      bubbles: ['Pięknie.', '<img src="https://66.media.tumblr.com/592d41eaae9af5816a04941417333e1f/tumblr_n24jfkM1yN1sfvlg3o1_500.gif" />', 'Powiedz jeszcze <q>te fiordy</q>.'],
      answerLeft: {answer: '<i>fjordene</i>', next: 'end1'},
      answerRight: {answer: '<i>fjorder</i>', next: 'fjord3b'}
    },
    fjord3b: {
      bubbles: [mistake()],
      answerLeft: {answer: '<i>fjordene</i>', next: 'end1'}
    },

    end1: {
      bubbles: ['Łał! Dajesz radę. <span class="emojione emojione-1f3cb-1f3fb"></span>'],
      answerLeft: {answer: 'dzięki', next: 'end2'},
    },
    end2: {
      bubbles: ['<img src="http://www.robmydobrze.pl/wp-content/uploads/2013/08/NhNpu.gif" />', 'Doskonale Ci poszło. Jestem z Ciebie dumna.', 'Mam nadzieję, że Tobie też się podobało.', 'Jeśli tak, możesz podzielić się tą apką albo napisać komentarz.'],
      answerLeft: {answer: 'jasne, mogę <span class="emojione emojione-1f934-1f3fc"></span>', next: 'end3'},
      answerRight: {answer: 'może innym razem', next: 'end4'}
    },
    end3: {
      bubbles: ['Dzięki. <span class="emojione emojione-2764"></span> Tu jest link:', '<a href="http://" title="">nocnasowa.pl/chat-rzeczownik/</a>'],
      autoNext: "endEnd"
    },
    end4: {
      bubbles: ['Nie ma sprawy.'],
      autoNext: 'endEnd'
    },
    endEnd: {
      bubbles: ['Ucz się dalej, a ja tymczasem lecę.', '<img src="https://media.giphy.com/media/pPHzXu7s8jM8E/giphy.gif" />'],
      autoNext: 'END'
    }

    //ex: {
    //  bubbles: [''],
    //  answerLeft: {answer: '<i></i>', next: ''},
    //  answerRight: {answer: '<i></i>', next: ''}
    //},

  }


  this.getBubble = function(no) {
    return this.data[no];
  }

}
</script>
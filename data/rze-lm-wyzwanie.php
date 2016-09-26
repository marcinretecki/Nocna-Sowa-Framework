<script>
function LasChatData() {

  this.intro = {
    a1: {
      bubbles: ['Cześć, tu Sowa.'],
      answerLeft: {answer: 'Co masz tam Sowo na dziś?', next: 'a2'}
    },
    a2: {
      bubbles: ['Liczbę mnogą rzeczownika w czasie jednej imprezy.', '<img src="/i/rze-lm/tumblr_o08353uHDA1sblcs4o1_500.gif" />', 'Wchodzisz w to?'],
      answerLeft: {answer: 'Pewnie!', next: 'a3'}
    },
    a3: {
      bubbles: ['OK. To zaczynamy!'],
      autoNext: 'ENDINTRO'
    },

    b1: {
      bubbles: ['Hej, tu Sowa.', 'Gotowy na liczbę mnogą rzeczownika? <span class="emojione emojione-1f575-1f3fc"></span>'],
      answerLeft: {answer: 'Pewnie! <span class="emojione emojione-1f493"></span>', next: 'b2'}
    },
    b2: {
      bubbles: ['<img src="/i/rze-lm/Countdown-321.gif" />', 'To zaczynamy!'],
      autoNext: 'ENDINTRO'
    }
  };


  this.chat = {
    hytte1: {
      bubbles: ['<i>Ei hytte</i> to jedna <q>hatka</q>. Jak powiesz o kilku nieokreślonych?'],
      answerLeft: {answer: '<i>hytter</i>', next: 'hytte2'},
      answerRight: {answer: '<i>hytten</i>', next: 'hytte1b'}
    },
    hytte1b: {
      bubbles: ['Końcówkę <i>-en</i> dodajemy w formie określonej liczby pojedynczej. Pamiętasz?', 'Np. <i>en bygning – bygningen</i>'],
      answerLeft: {answer: 'OK, już wiem: <i>hytter</i>', next: 'hytte2'},
    },

    hytte2: {
      bubbles: ['Joł men, ziom!', '<img src="/i/rze-lm/3b3d047d7f7b5a9eb3b656d548e81570fa6e1aa1-m.gif" />'],
      autoNext: 'RANDOM'
    },


    hylle1: {
      bubbles: ['<i>Hyllene</i> to <q>półki</q> w formie:'],
      answerLeft: {answer: 'określonej', next: 'hylle2'},
      answerRight: {answer: 'nieokreślonej', next: 'hylle1b'}
    },
    hylle1b: {
      bubbles: ['Końcówka <i>-ene</i> jest zawsze w formie określonej liczby mnogiej.'],
      answerLeft: {answer: 'OK', next: 'hylle2'},
    },
    hylle2: {
      bubbles: ['<i>Fint!</i> <span class="emojione emojione-1f36d"></span>'],
      autoNext: 'RANDOM'
    },


    vindu1: {
      bubbles: ['<i>Vinduer</i> to <q>okna</q> w formie:'],
      answerLeft: {answer: 'określonej', next: 'vindu1b'},
      answerRight: {answer: 'nieokreślonej', next: 'vindu2'}
    },
    vindu1b: {
      bubbles: ['Końcówka <i>-er</i> jest w formie nieokreślonej.'],
      answerLeft: {answer: 'dobra, już wiem', next: 'vindu2'},
    },
    vindu2: {
      bubbles: ['<i>Så bra!</i>', '<img src="/i/rze-lm/aurora-aksnes-auroraaksnes-13L5a20CR7NxUA.gif" />'],
      autoNext: 'RANDOM'
    },


    gulv1: {
      bubbles: ['<q>Podłogi</q> nieokreślone?'],
      answerLeft: {answer: '<i>gulver</i>', next: 'gulv1b'},
      answerRight: {answer: '<i>gulv</i>', next: 'gulv2'}
    },
    gulv1b: {
      bubbles: ['Pamiętasz rodzajnik? Podpowiem: <i>et</i>. A co się robi z jednosylabowymi rodzaju et? Nie dodaje końcówki <i>-er</i>.'],
      answerLeft: {answer: 'no tak, <i>gulv</i>', next: 'gulv2'}
    },
    gulv2: {
      bubbles: ['Na błysk!', '<img src="/i/rze-lm/tumblr-m3j9b02nnt1qedb29o1-500.gif" />'],
      autoNext: 'RANDOM'
    },



    bord1: {
      bubbles: ['Jak będą określone <q>stoły</q>?'],
      answerLeft: {answer: '<i>bord</i>', next: 'bord1b'},
      answerRight: {answer: '<i>bordene</i>', next: 'bord2'}
    },
    bord1b: {
      bubbles: ['Nieokreślone to: <i>bord</i>. Oczywiście bez końcówki <i>-er</i>, bo to jednosylabowy rodzaju <i>-et</i>. A określone zawsze dostają końcówkę <i>-ene</i>.'],
      answerLeft: {answer: '<i>bordene</i>', next: 'bord2'}
    },
    bord2: {
      bubbles: ['<i>Veldig godt! Det smaker bra.</i>', '<img src="/i/rze-lm/tumblr-m5rmpyxg9d1r3dfmuo3-250.gif" />'],
      autoNext: 'RANDOM'
    },

    skap1: {
      bubbles: ['Nieokreślone <q>szafki</q>, to:'],
      answerLeft: {answer: '<i>skap</i>', next: 'skap2'},
      answerRight: {answer: '<i>skaper</i>', next: 'skap1b'}
    },
    skap1b: {
      bubbles: ['A pamiętasz rodzajnik? No właśnie: <i>et</i>. Nie dodajemy <i>-er</i>. Dlatego <q>szafki</q> to:'],
      answerLeft: {answer: '<i>skap</i>', next: 'skap2'},
    },
    skap2: {
      bubbles: ['Bra-wo!', '<img src="/i/rze-lm/orson-welles-citizen-20kane-appl-xilv.gif" />'],
      autoNext: 'RANDOM'
    },


    kskap1: {
      bubbles: ['Jak będą nieokreślone <q>lodówki</q>? Podpowiem, że to chłodzące szafy.'],
      answerLeft: {answer: '<i>kjøleskap</i>', next: 'kskap2'},
      answerRight: {answer: '<i>kjøleskaper</i>', next: 'kskap1b'}
    },
    kskap1b: {
      bubbles: ['Odmieniasz zgodnie z ostatnim członem, czyli tak, jak słowo: <i>et skap</i>. Jednosylabowe <i>-et</i> nie dostają końcówki <i>-er</i>. Nawet jeśli na pierwszy rzut oka to dłuższe słowo, musisz je rozdzielić.'],
      answerLeft: {answer: 'OK, <i>kjøleskap</i>', next: 'kskap2'},
    },
    kskap2: {
      bubbles: ['<i>Du har overrasket meg!</i> (Zaskoczyłeś mnie!)', '<img src="/i/rze-lm/audrey-hepburn-breakfast-at-tiffanys-filmedit-qKN4EGv44HQ4g.gif" />'],
      autoNext: 'RANDOM'
    },


    stol1: {
      bubbles: ['<q>Krzesła</q> nieokreślone to:'],
      answerLeft: {answer: '<i>stoler</i>', next: 'stol2'},
      answerRight: {answer: '<i>stolen</i>', next: 'stol1b'}
    },
    stol1b: {
      bubbles: ['W liczbie mnogiej radzę jednak użyć końcówki <i>-er</i>, jeśli tylko nie jest to słowo jednosylabowe <i>-et</i>. A jakiego rodzaju jest krzesło?'],
      answerLeft: {answer: '<i>en</i>, dlatego: <i>stoler</i>', next: 'stol2'},
    },
    stol2: {
      bubbles: ['Brawo! <span class="emojione emojione-1f44f-1f3fb"></span> <span class="emojione emojione-1f36b"></span>'],
      autoNext: 'RANDOM'
    },


    lampe1: {
      bubbles: ['<q>Lampy</q> nieokreślone to:'],
      answerLeft: {answer: '<i>lampa</i>', next: 'lampe1b'},
      answerRight: {answer: '<i>lamper</i>', next: 'lampe2'}
    },
    lampe1b: {
      bubbles: ['<i>Lampa</i> to jedna określona. Nieokreślone odmieniają się regularnie. Dodajesz <i>-er</i>.'],
      answerLeft: {answer: '<i>lamper</i>', next: 'lampe2'},
    },
    lampe2: {
      bubbles: ['Świecisz!', '<img src="/i/rze-lm/tumblr-mlnzx84ur21qzw1qyo1-500.gif" />'],
      autoNext: 'RANDOM'
    },


    mobil1: {
      bubbles: ['<i>Mobiler</i> znaczy:'],
      answerLeft: {answer: 'samochody', next: 'mobil1b'},
      answerRight: {answer: 'telefony', next: 'mobil2'}
    },
    mobil1b: {
      bubbles: ['<img src="/i/rze-lm/bfm80.gif" />', 'Uuu... <q>samochody</q> to <i>biler</i>. <i>Mobiler</i> to <q>telefony komórkowe</q>.'],
      answerLeft: {answer: 'OK, zapamiętam', next: 'mobil2'},
    },
    mobil2: {
      bubbles: ['Dobrze! Możemy świętować?', '<img src="/i/rze-lm/the-blues-brothers-whisky-though-DpxPL8FXbccM0.gif" />'],
      autoNext: 'RANDOM'
    },


    melding1: {
      bubbles: ['<q>Mam dwie wiadomości.</q> Jak to powiesz po norwesku? <i>Jeg har to...</i>'],
      answerLeft: {answer: '<i>meldinge</i>', next: 'melding1b'},
      answerRight: {answer: '<i>meldinger</i>', next: 'melding2'}
    },
    melding1b: {
      bubbles: ['Jedna <q>wiadomość</q>, to <i>en melding</i>. W liczbie mnogiej dodajesz <i>-er</i>. To takie proste.'],
      answerLeft: {answer: '<i>meldinger</i>', next: 'melding2'},
    },
    melding2: {
      bubbles: ['Pierwsza, że dobrze teraz odpowiedziałeś. Druga, że ktoś nas chyba śledzi.', '<img src="/i/rze-lm/tumblr-mhtlawoisq1qcay1ao1-500.gif" />', 'Jedziemy dalej?'],
      answerLeft: {answer: '<i>ja, vi kjører videre</i>', next: 'RANDOM'},
    },


    speil1: {
      bubbles: ['<q>Lustra</q> nieokreślone to:'],
      answerLeft: {answer: '<i>speil</i>', next: 'speil2'},
      answerRight: {answer: '<i>speiler</i>', next: 'speil1b'}
    },
    speil1b: {
      bubbles: ['A ile to słowo ma sylab? Jedną.', 'Jakiego jest rodzaju? <i>Et</i>. Czyli?'],
      answerLeft: {answer: 'nie dodaję końcówki <i>-er</i>', next: 'speil2'},
    },
    speil2: {
      bubbles: ['Uff, dobrze.'  , '<img src="/i/rze-lm/tumblr_nrwenu8TfZ1s2yegdo1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    buss1: {
      bubbles: ['<q>Autobusy</q> nieokreślone to:'],
      answerLeft: {answer: '<i>busser</i>', next: 'buss2'},
      answerRight: {answer: '<i>buss</i>', next: 'buss1b'}
    },
    buss1b: {
      bubbles: ['<q>Autobus</q> to <i>en buss</i>. Nie ma znaczenia, że ma jedną sylabę. Dodajesz normalnie <i>-er</i>.'],
      answerLeft: {answer: '<i>busser</i>', next: 'buss2'},
    },
    buss2: {
      bubbles: ['Prosto z trasy...', '<img src="/i/rze-lm/hard-trying-catch-bus-sometimes.gif" />'],
      autoNext: 'RANDOM'
    },


    tog1: {
      bubbles: ['<q>Pociągi</q> nieokreślone to:'],
      answerLeft: {answer: '<i>toger</i>', next: 'tog1b'},
      answerRight: {answer: '<i>tog</i>', next: 'tog2'}
    },
    tog1b: {
      bubbles: ['<q>Pociąg</q> to <i>et tog</i>. Jednosylabowy nijaki. Dlatego nie dodajemy końcówki <i>-er</i> w l.mn. Więc...'],
      answerLeft: {answer: '<i>tog</i>', next: 'tog2'},
    },
    tog2: {
      bubbles: ['<i>Fint!</i> <span class="no-break"><span class="emojione emojione-1f682"></span><span class="emojione emojione-1f683"></span><span class="emojione emojione-1f683"></span></span>', 'A określone?'],
      answerLeft: {answer: '<i>tog</i>', next: 'tog2b'},
      answerRight: {answer: '<i>togene</i>', next: 'tog3'}
    },
    tog2b: {
      bubbles: ['W formie określonej liczby mnogiej zawsze dodajesz <i>-ene</i>.'],
      answerLeft: {answer: '<i>togene</i>', next: 'tog2'},
    },
    tog3: {
      bubbles: ['<i>Supert!</i>', '<img src="/i/rze-lm/vintage-train-animated-gif-3.gif" />'],
      autoNext: 'RANDOM'
    },


    blomst1: {
      bubbles: ['<q>Kwiaty</q> określone to:'],
      answerLeft: {answer: '<i>blomster</i>', next: 'blomst1b'},
      answerRight: {answer: '<i>blomstene</i>', next: 'blomst2'}
    },
    blomst1b: {
      bubbles: ['<i>Blomster</i> to na kwiaciarniach piszą, bo tam są różne nieokreślone kwiaty. Te konkretne to:'],
      answerLeft: {answer: '<i>blomstene</i>', next: 'blomst2'},
    },
    blomst2: {
      bubbles: ['<i>Pent!</i> <span class="emojione emojione-1f33b"></span><span class="emojione emojione-1f33b"></span><span class="emojione emojione-1f33b"></span>'],
      autoNext: 'RANDOM'
    },


    hus1: {
      bubbles: ['<q>Domy</q>, takie dowolne, to:'],
      answerLeft: {answer: '<i>hus</i>', next: 'hus2'},
      answerRight: {answer: '<i>husene</i>', next: 'hus1b'}
    },
    hus1b: {
      bubbles: ['<i>Husene</i> to określone domy, takie o których Twój rozmówca wie. Nieokreślone są bez końcówki <i>-er</i>, bo jeden to <i>et hus</i>, a dwa lub więcej to:'],
      answerLeft: {answer: '<i>hus</i>', next: 'hus2'},
    },
    hus2: {
      bubbles: ['Stare norweskie domy kryją wiele tajemnic...', '<img src="/i/rze-lm/tumblr-lxxcf8koi41qlh9eeo1-500.gif" />'],
      autoNext: 'RANDOM'
    },


    seng1: {
      bubbles: ['<q>Łóżka</q> nieokreślone?'],
      answerLeft: {answer: '<i>sengene</i>', next: 'seng1b'},
      answerRight: {answer: '<i>senger</i>', next: 'seng2'}
    },
    seng1b: {
      bubbles: ['Końcówka <i>-ene</i> tylko w określonej. Więc:'],
      answerLeft: {answer: '<i>senger</i>', next: 'seng2'},
    },
    seng2: {
      bubbles: ['Ta daaam!', '<img src="/i/rze-lm/tumblr-n89kkc8dkc1qcd94wo1-500.gif" />'],
      autoNext: 'RANDOM'
    },


    munn1: {
      bubbles: ['<i>En munn</i> to <q>usta</q>. Jedne, bo jest rodzajnik. A kilka dowolnych?'],
      answerLeft: {answer: '<i>munner</i>', next: 'munn2'},
      answerRight: {answer: '<i>munnene</i>', next: 'munn1b'}
    },
    munn1b: {
      bubbles: ['<i>Munnene</i> to określone usta w liczbie mnogiej. Nieokreślone to:'],
      answerLeft: {answer: '<i>munner</i>', next: 'munn2'},
    },
    munn2: {
      bubbles: ['<img src="/i/rze-lm/12NHUUk5iS6kDe.gif" />'],
      autoNext: 'RANDOM'
    },


    kontakt1: {
      bubbles: ['Jak powiesz: <q>On ma wiele kontaktów</q>?', '<i>Han har mange...</i>'],
      answerLeft: {answer: '<i>kontakter</i>', next: 'kontakt2'},
      answerRight: {answer: '<i>kontaktene</i>', next: 'kontakt1b'}
    },
    kontakt1b: {
      bubbles: ['To mogło być trudniejsze. Wiem. Jeśli ma czegoś wiele to zazwyczaj będzie to w formie nieokreślonej. Wyczujesz to z czasem.'],
      answerLeft: {answer: 'OK, <i>kontakter</i>', next: 'kontakt2'},
    },
    kontakt2: {
      bubbles: ['Tak jest. <span class="emojione emojione-260e"></span><span class="emojione emojione-1f4de"></span><span class="emojione emojione-1f4e0"></span><span class="emojione emojione-1f50c"></span>'],
      autoNext: 'RANDOM'
    },


    menneske1: {
      bubbles: ['Nieokreśleni <q>ludzie</q>?'],
      answerLeft: {answer: '<i>folkene</i>', next: 'menneske1b'},
      answerRight: {answer: '<i>mennesker</i>', next: 'menneske2'}
    },
    menneske1b: {
      bubbles: ['<i>Folkene</i> to już określona <q>ludność</q>. Nieokreśleni ludzie to:'],
      answerLeft: {answer: '<i>mennesker</i>', next: 'menneske2'},
    },
    menneske2: {
      bubbles: ['<img src="/i/rze-lm/a0h7sAqON67nO.gif" />'],
      autoNext: 'RANDOM'
    },


    skip1: {
      bubbles: ['Kilka nieokreślonych <q>statków</q> na fiordzie, to...'],
      answerLeft: {answer: '<i>skip</i>', next: 'skip2'},
      answerRight: {answer: '<i>skiper</i>', next: 'skip1b'}
    },
    skip1b: {
      bubbles: ['Jedna sylaba i <i>et</i>. Co to znaczy? Nie dodajemy <i>-er</i>.'],
      answerLeft: {answer: 'jasne, <i>skip</i>', next: 'skip2'},
    },
    skip2: {
      bubbles: ['<i>Bra!</i> <span class="emojione emojione-1f6f3"></span>'],
      autoNext: 'RANDOM'
    },


    dyr1: {
      bubbles: ['Określone <q>zwierzęta</q>? <span class="emojione emojione-1f429"></span><span class="emojione emojione-1f415"></span><span class="emojione emojione-1f408"></span>'],
      answerLeft: {answer: '<i>dyr</i>', next: 'dyr1b'},
      answerRight: {answer: '<i>dyrene</i>', next: 'dyr2'}
    },
    dyr1b: {
      bubbles: ['<i>Dyr</i> to nieokreślone <q>zwierzęta</q>. Określone mają końcówkę <i>-ene</i>.'],
      answerLeft: {answer: 'OK, <i>dyrene</i>', next: 'dyr2'},
    },
    dyr2: {
      bubbles: ['<i>Yes</i>! A teraz uwaga! Wchodzą:', '<img src="/i/rze-lm/c2OEMfj.gif" />'],
      autoNext: 'RANDOM'
    },


    avtale1: {
      bubbles: ['Jedna <q>umowa</q> to: <i>en avtale</i>. Kilka określonych to...'],
      answerLeft: {answer: '<i>avtalene</i>', next: 'avtale2'},
      answerRight: {answer: '<i>avtala</i>', next: 'avtale1b'}
    },
    avtale1b: {
      bubbles: ['Nie ma takiego słowa. W liczbie mnogiej dodajesz przecież <i>-ene</i>.'],
      answerLeft: {answer: 'OK, <i>avtalene</i>', next: 'avtale2'},
    },
    avtale2: {
      bubbles: ['<i>Skål!</i> <span class="emojione emojione-1f943"></span>'],
      autoNext: 'RANDOM'
    },


    topp1: {
      bubbles: ['Nieokreślone <q>szczyty</q>? <span class="no-break"><span class="emojione emojione-1f3d4"></span><span class="emojione emojione-1f3d4"></span></span>'],
      answerLeft: {answer: '<i>topp</i>', next: 'topp1b'},
      answerRight: {answer: '<i>topper</i>', next: 'topp2'}
    },
    topp1b: {
      bubbles: ['Jednak <i>topper</i>, bo jeden <q>szczyt</q> to <i>en topp</i>.'],
      answerLeft: {answer: 'OK', next: 'topp2'},
    },
    topp2: {
      bubbles: ['Dajesz radę!'],
      autoNext: 'RANDOM'
    },


    oy1: {
      bubbles: ['<q>Wyspy</q> określone to...'],
      answerLeft: {answer: '<i>øyer</i>', next: 'oy1b'},
      answerRight: {answer: '<i>øyene</i>', next: 'oy2'}
    },
    oy1b: {
      bubbles: ['To były nieokreślone. Dlatego:'],
      answerLeft: {answer: '<i>øyene</i>', next: 'oy2'},
    },
    oy2: {
      bubbles: ['<i>Grattis!</i>', '<img src="/i/rze-lm/tumblr_nt3kawqCC61s2wio8o4_500.gif" />'],
      autoNext: 'RANDOM'
    },


    dekk1: {
      bubbles: ['<q>Zmienić opony</q> (nieokreślone) to: <i>skifte ...</i>'],
      answerLeft: {answer: '<i>dekk</i>', next: 'dekk2'},
      answerRight: {answer: '<i>dekker</i>', next: 'dekk1b'}
    },
    dekk1b: {
      bubbles: ['Jedna <q>opona</q> to <i>et dekk</i>. Jednosylabowy nijaki nie dostaje końcówki <i>-er</i>.'],
      answerLeft: {answer: '<i>dekk</i>', next: 'dekk2'},
    },
    dekk2: {
      bubbles: ['OK, jedziemy. <span class="emojione emojione-1f69c"></span>'],
      autoNext: 'RANDOM'
    },


    spill1: {
      bubbles: ['Jak będą nieokreślone <q>gry</q> po norwesku?'],
      answerLeft: {answer: '<i>spill</i>', next: 'spill2'},
      answerRight: {answer: '<i>spiller</i>', next: 'spill1b'}
    },
    spill1b: {
      bubbles: ['Jednosylabowy rodzaju <i>et</i>. Nie dodajemy wtedy końcówki <i>-er</i>.'],
      answerLeft: {answer: 'Pamiętam!', next: 'spill2'},
    },
    spill2: {
      bubbles: ['Gra muzyka!', '<img src="/i/rze-lm/dhg-kb23.gif" />'],
      autoNext: 'RANDOM'
    },


    by1: {
      bubbles: ['<q>Miasta</q> <span class="emojione emojione-1f3d9"></span><span class="emojione emojione-1f3d9"></span> określone to:'],
      answerLeft: {answer: '<i>byen</i>', next: 'by1b'},
      answerRight: {answer: '<i>byene</i>', next: 'by2'}
    },
    by1b: {
      bubbles: ['<i>Byen</i> to jedno określone miasto. W liczbie mnogiej dodajemy <i>-ene</i>.'],
      answerLeft: {answer: '<i>byene</i>', next: 'by2'},
    },
    by2: {
      bubbles: ['<i>Nydelig!</i> <span class="emojione emojione-1f36c"></span>'],
      autoNext: 'RANDOM'
    },


    vits1: {
      bubbles: ['Jeden <q>żart</q> to <i>en vits</i>. <q>Dowcipy</q> to...'],
      answerLeft: {answer: '<i>vitser</i>', next: 'vits2'},
      answerRight: {answer: '<i>vitsen</i>', next: 'vits1b'}
    },
    vits1b: {
      bubbles: ['<i>Vitsen</i> to jeden określony. Kilka to już zależy czy określonych czy nie, ale miałeś do wyboru jedynie:'],
      answerLeft: {answer: '<i>vitser</i>', next: 'vits2'},
    },
    vits2: {
      bubbles: ['A teraz prawdziwa historia.', '<img src="/i/rze-lm/CN9OTYkCHlb2g.gif" />'],
      autoNext: 'RANDOM'
    }


//    a1: {
//      bubbles: [''],
//      answerLeft: {answer: '', next: 'a2'},
//      answerRight: {answer: '', next: 'a1b'}
//    },
//    a1b: {
//      bubbles: [''],
//      answerLeft: {answer: '', next: 'a2'},
//    },
//    a2: {
//      bubbles: [''],
//      autoNext: 'RANDOM'
//    }

  };


  this.end = {
    a1: {
      bubbles: ['To koniec na dziś, ale możesz zawsze tu wrócić i przećwiczyć te słowa w innej kolejności.', 'Ale czekaj. Zrobimy Ci jeszcze pamiątkową fotografię.', '<img src="/i/rze-lm/tumblr-lxl3cv0ulu1qe0eclo1-r1-500.gif" />', 'Jesteś piękny!'],
      autoNext: 'END'
    },
    b1: {
      bubbles: ['To koniec na dziś, ale możesz zawsze tu wrócić i przećwiczyć te słowa w innej kolejności.', 'God natt!', '<img src="/i/rze-lm/j3vao.gif" />'],
      autoNext: 'END'
    }
  };



}
</script>
<script>
function ChatData() {

  this.intro = {
    a1: {
      bubbles: ['Hej, tu Sowa.'],
      answerLeft: {answer: 'nóż', next: 'a2'},
      answerRight: {answer: 'widelec', next: 'a2'}
    },
    a2: {
      bubbles: ['To jazda'],
      autoNext: 'ENDINTRO'
    },
    b1: {
      bubbles: ['Hej, tu Sowa. B'],
      autoNext: 'ENDINTRO'
    }
  };


  this.chat = {
    hytte1: {
      bubbles: ['<i>Ei hytte</i> to jedna sztuka. Jak powiesz o kilku nieokreślonych?'],
      answerLeft: {answer: '<i>hytter</i>', next: 'hytte2'},
      answerRight: {answer: '<i>hytten</i>', next: 'hytte1b'}
    },
    hytte1b: {
      bubbles: ['Końcówkę <i>-en</i> dodajemy w formie określonej liczby pojedynczej. Pamiętasz?', 'Np. <i>en bygning -> bygningen</i>'],
      answerLeft: {answer: 'OK, już wiem: <i>hytter</i>', next: 'hytte2'},
    },

    hytte2: {
      bubbles: ['<i>Veldig bra!</i>', '<img src="/i/p-1-6/3b3d047d7f7b5a9eb3b656d548e81570fa6e1aa1-m.gif" />'],
      autoNext: 'RANDOM'
    },


    hylle1: {
      bubbles: ['<i>Hyllene</i> to półki w formie:'],
      answerLeft: {answer: 'określonej', next: 'hylle2'},
      answerRight: {answer: 'nieokreślonej', next: 'hylle1b'}
    },
    hylle1b: {
      bubbles: ['Końcówka <i>-ene</i> jest zawsze w formie określonej liczby mnogiej.'],
      answerLeft: {answer: 'OK', next: 'hylle2'},
    },
    hylle2: {
      bubbles: ['<i>Fint!</i>'],
      autoNext: 'RANDOM'
    },


    vindu1: {
      bubbles: ['Vinduer to okna w formie?'],
      answerLeft: {answer: 'określonej', next: 'vindu1b'},
      answerRight: {answer: 'nieokreślonej', next: 'vindu2'}
    },
    vindu1b: {
      bubbles: ['Końcówka <i>-er</i> jest w formie nieokreślonej.'],
      answerLeft: {answer: 'dobra, już wiem', next: '2'},
    },
    vindu2: {
      bubbles: ['<i>Så bra!</i>', '<img src="/i/p-1-6/aurora-aksnes-auroraaksnes-13L5a20CR7NxUA.gif" />'],
      autoNext: 'RANDOM'
    },


    gulv1: {
      bubbles: ['Podłogi nieokreślone to:'],
      answerLeft: {answer: 'gulver', next: 'gulv1b'},
      answerRight: {answer: 'gulv', next: 'gulv2'}
    },
    gulv1b: {
      bubbles: ['Pamiętasz rodzajnik? Podpowiem: <i>et</i>. A co się robi z jednosylabowymi rodzaju et? Nie dodaje końcówki <i>-er</i>.'],
      answerLeft: {answer: 'no tak, <i>gulv</i>', next: 'gulv2'}
    },
    gulv2b: {
      bubbles: ['<i>Fantastisk!</i>', '<img src="/i/p-1-6/tumblr-m3j9b02nnt1qedb29o1-500.gif" />'],
      autoNext: 'RANDOM'
    },



    bord1: {
      bubbles: ['Jak będą określone stoły?'],
      answerLeft: {answer: '<i>bord</i>', next: 'bord1b'},
      answerRight: {answer: '<i>bordene</i>', next: 'bord2'}
    },
    bord1b: {
      bubbles: ['Nieokreślone to: <i>bord</i>. Oczywiście bez końcówki <i>-er</i>, bo to jednosylabowy rodzaju <i>-et</i>. A określone zawsze dostają końcówkę <i>-ene</i>.'],
      answerLeft: {answer: '<i>bordene</i>', next: 'bord2'}
    },
    bord2: {
      bubbles: ['<i>Veldig godt!</i>', '<img src="/i/p-1-6/tumblr-m5rmpyxg9d1r3dfmuo3-250.gif" />'],
      autoNext: 'RANDOM'
    },

    askap1: {
      bubbles: ['Nieokreślone szafki, to:'],
      answerLeft: {answer: '<i>skap</i>', next: 'skap2'},
      answerRight: {answer: '<i>skaper</i>', next: 'skap1b'}
    },
    askap1b: {
      bubbles: ['A pamiętasz rodzajnik? No właśnie: et. Nie dodajemy -er. Dlatego szafki to:'],
      answerLeft: {answer: '<i>skap</i>', next: 'skap2'},
    },
    askap2: {
      bubbles: ['Bra-wo!', '<img src="/i/p-1-6/orson-welles-citizen-20kane-appl-xilv.gif" />'],
      autoNext: 'RANDOM'
    },


    kskap1: {
      bubbles: ['Jak będą nieokreślone lodówki? Podpowiem, że to chłodzące szafy.'],
      answerLeft: {answer: '<i>kjøleskap</i>', next: 'kskap2'},
      answerRight: {answer: '<i>kjøleskaper</i>', next: 'kskap1b'}
    },
    kskap1b: {
      bubbles: ['Odmieniasz zgodnie z ostatnim członem, czyli tak, jak słowo: <i>et skap</i>. Jednosylabowe <i>-et</i> nie dostają końcówki <i>-er</i>. Nawet jeśli na pierwszy rzut oka to dłuższe słowo, musisz je rozdzielić.'],
      answerLeft: {answer: 'OK, <i>kjøleskap</i>', next: 'kskap2'},
    },
    kskap2: {
      bubbles: ['<i>Du har overrasket meg!</i> (Zaskoczyłeś mnie!)', '<img src="/i/p-1-6/audrey-hepburn-breakfast-at-tiffanys-filmedit-qKN4EGv44HQ4g.gif" />'],
      autoNext: 'RANDOM'
    },


    stol1: {
      bubbles: ['Krzesła nieokreślone to:'],
      answerLeft: {answer: '<i>stoler</i>', next: 'stol2'},
      answerRight: {answer: '<i>stolen</i>', next: 'stol1b'}
    },
    stol1b: {
      bubbles: ['W liczbie mnogiej radzę jednak użyć końcówki <i>-er</i> jeśli tylko nie jest to słowo jednosylabowe <i>-et</i>. A jakiego rodzaju jest krzesło?'],
      answerLeft: {answer: '<i>en</i>, dlatego: <i>stoler</i>', next: 'stol2'},
    },
    stol2: {
      bubbles: ['<i>Flott!</i>'],
      autoNext: 'RANDOM'
    },


    lampe1: {
      bubbles: ['Lampy nieokreślone to:'],
      answerLeft: {answer: '<i>lampa</i>', next: 'lampe1b'},
      answerRight: {answer: '<i>lamper</i>', next: 'lampe2'}
    },
    lampe1b: {
      bubbles: ['<i>Lampa</i> to jedna określona. Nieokreślone odmieniają się regularnie. Dodajesz <i>-er</i>.'],
      answerLeft: {answer: '<i>lamper</i>', next: 'lampe2'},
    },
    lampe2: {
      bubbles: ['Brawo!'],
      autoNext: 'RANDOM'
    },


    mobil1: {
      bubbles: ['Mobiler znaczy:'],
      answerLeft: {answer: 'samochody', next: 'mobil1b'},
      answerRight: {answer: 'telefony', next: 'mobil2'}
    },
    mobil1b: {
      bubbles: ['<img src="/i/p-1-6/bfm80.gif" />', 'Uuu samochody to <i>biler</i>. <i>Mobiler</i> to telefony komórkowe.'],
      answerLeft: {answer: 'OK, zapamiętam', next: 'mobil2b'},
    },
    mobil2: {
      bubbles: ['Brawo! Sam wiedziałeś.', '<img src="/i/p-1-6/the-blues-brothers-whisky-though-DpxPL8FXbccM0.gif" />'],
      autoNext: 'RANDOM'
    },
    mobil2b: {
      bubbles: ['Brawo!', '<img src="/i/p-1-6/the-blues-brothers-whisky-though-DpxPL8FXbccM0.gif" />'],
      autoNext: 'RANDOM'
    },


    melding1: {
      bubbles: ['<q>Mam dwie wiadomości.</q> Jak to powiesz po norwesku? <i>Jeg har to...</i>'],
      answerLeft: {answer: '<i>meldinge</i>', next: 'melding1b'},
      answerRight: {answer: '<i>meldinger</i>', next: 'melding2'}
    },
    melding1b: {
      bubbles: ['Jedna wiadomość, to <i>en melding</i>. W liczbie mnogiej dodajesz <i>-er</i>. To takie proste.'],
      answerLeft: {answer: '<i>meldinger</i>', next: 'melding2'},
    },
    melding2: {
      bubbles: ['Pierwsza, że dobrze teraz odpowiedziałeś. Druga, że ktoś nas chyba śledzi.', '<img src="/i/p-1-6/tumblr-mhtlawoisq1qcay1ao1-500.gif" />', 'Jedziemy dalej?'],
      answerLeft: {answer: '<i>ja, vi kjører videre</i>', next: 'RANDOM'},
    },


    speil1: {
      bubbles: ['Lustra nieokreślone to:'],
      answerLeft: {answer: '<i>speil</i>', next: 'speil2'},
      answerRight: {answer: '<i>speiler</i>', next: 'speil1b'}
    },
    speil1b: {
      bubbles: ['A ile to słowo ma sylab? Jedną.', 'Jakiego jest rodzaju? <i>Et</i>. Czyli?'],
      answerLeft: {answer: 'nie dodaję końcówki <i>-er</i>', next: 'speil2'},
    },
    speil2: {
      bubbles: ['Właśnie tak!', '<img src="/i/p-1-6/tumblr_nrwenu8TfZ1s2yegdo1_500.gif" />'],
      autoNext: 'RANDOM'
    },


    buss1: {
      bubbles: ['Autobusy nieokreślone to:'],
      answerLeft: {answer: 'busser', next: 'buss2'},
      answerRight: {answer: 'buss', next: 'buss1b'}
    },
    buss1b: {
      bubbles: ['Autobus to <i>en buss</i>. Nie ma znaczenia, że ma jedną sylabę. Dodajesz normalnie <i>-er</i>.'],
      answerLeft: {answer: '<i>busser</i>', next: 'buss2'},
    },
    buss2: {
      bubbles: ['<i>Bra!</i>'],
      autoNext: 'RANDOM'
    },


    tog1: {
      bubbles: ['Pociągi nieokreślone to:'],
      answerLeft: {answer: '<i>toger</i>', next: 'tog1b'},
      answerRight: {answer: '<i>tog</i>', next: 'tog2'}
    },
    tog1b: {
      bubbles: ['Pociąg to <i>et tog</i>. Jednosylabowy nijaki. Dlatego nie dodajemy końcówki <i>-er</i> w l.mn. Więc...'],
      answerLeft: {answer: '<i>tog</i>', next: 'tog2'},
    },
    tog2: {
      bubbles: ['<i>Fint!</i>', 'Określone pociągi to:'],
      answerLeft: {answer: '<i>tog</i>', next: 'tog3'},
      answerRight: {answer: '<i>togene</i>', next: 'tog2b'}
    },
    tog2b: {
      bubbles: ['W formie określonej liczby mnogiej zawsze dodajesz <i>-ene</i>.'],
      answerLeft: {answer: '<i>togene</i>', next: 'tog2'},
    },
    tog3: {
      bubbles: ['<i>Supert!</i>'],
      autoNext: 'RANDOM'
    },


    blomst1: {
      bubbles: ['Kwiaty określone to:'],
      answerLeft: {answer: '<i>blomster</i>', next: 'blomst1b'},
      answerRight: {answer: '<i>blomstene</i>', next: 'blomst2'}
    },
    blomst1b: {
      bubbles: ['<i>Blomster</i> to na kwiaciarniach piszą, bo tam są różne nieokreślone kwiaty. Te konkretne to:'],
      answerLeft: {answer: '<i>blomstene</i>', next: 'blomst2'},
    },
    blomst2: {
      bubbles: ['<i>Pent!</i> Pięknie!'],
      autoNext: 'RANDOM'
    },


    hus1: {
      bubbles: ['Domy, takie dowolne, to?'],
      answerLeft: {answer: 'hus', next: 'hus2'},
      answerRight: {answer: 'husene', next: 'hus1b'}
    },
    hus1b: {
      bubbles: ['<i>Husene</i> to określone domy, takie o których Twój rozmówca wie. Nieokreślone są bez końcówki <i>-er</i>, bo jeden to <i>et hus</i>, a dwa lub więcej to:'],
      answerLeft: {answer: '<i>hus</i>', next: 'hus2'},
    },
    hus2: {
      bubbles: ['Naprawdę świetnie! Wszyscy są zaskoczeni.', '<img src="/i/p-1-6/tumblr-lxxcf8koi41qlh9eeo1-500.gif" />'],
      autoNext: 'RANDOM'
    },


    seng1: {
      bubbles: ['Łóżka nieokreślone to:'],
      answerLeft: {answer: '<i>sengene</i>', next: 'seng1b'},
      answerRight: {answer: '<i>senger</i>', next: 'seng2'}
    },
    seng1b: {
      bubbles: ['Końcówka <i>-ene</i> tylko w określonej. Więc:'],
      answerLeft: {answer: '<i>senger</i>', next: 'seng2'},
    },
    seng2: {
      bubbles: ['Ba dum tss!', '<img src="/i/p-1-6/tumblr-n89kkc8dkc1qcd94wo1-500.gif" />'],
      autoNext: 'RANDOM'
    },


    munn1: {
      bubbles: ['<i>En munn</i> to usta. Jedne, bo jest rodzajnik. A kilka dowolnych?'],
      answerLeft: {answer: '<i>munner</i>', next: 'munn2'},
      answerRight: {answer: '<i>munnene</i>', next: 'munn1b'}
    },
    munn1b: {
      bubbles: ['<i>Munnene</i> to określone usta w liczbie mnogiej. Nieokreślone to:'],
      answerLeft: {answer: '<i>munner</i>', next: 'munn2'},
    },
    munn2: {
      bubbles: ['<img src="/i/p-1-6/12NHUUk5iS6kDe.gif" />'],
      autoNext: 'RANDOM'
    },


    kontakt1: {
      bubbles: ['Jak powiesz: On ma wiele kontaktów. <i>Han har mange...</i>'],
      answerLeft: {answer: 'kontakter', next: 'kontakt2'},
      answerRight: {answer: 'kontaktene', next: 'kontakt1b'}
    },
    kontakt1b: {
      bubbles: ['To mogło być trudniejsze. Wiem. Jeśli ma czegoś wiele to zazwyczaj będzie to w formie nieokreślonej. Wyczujesz to z czasem.'],
      answerLeft: {answer: 'OK, <i>kontakter</i>', next: 'kontakt2'},
    },
    kontakt2: {
      bubbles: ['Dobrze. To Ci się opłaci.', '<img src="/i/p-1-6/tumblr-m618g4opwx1qdlbneo1-500.gif" />'],
      autoNext: 'RANDOM'
    },


    menneske1: {
      bubbles: ['Nieokreśleni ludzie to:'],
      answerLeft: {answer: '<i>folkene</i>', next: 'menneske1b'},
      answerRight: {answer: '<i>mennesker</i>', next: 'menneske2'}
    },
    menneske1b: {
      bubbles: ['<i>Folkene</i> to już określona ludność. Nieokreśleni ludzie to:'],
      answerLeft: {answer: '<i>mennesker</i>', next: 'menneske2'},
    },
    menneske2: {
      bubbles: ['<img src="/i/p-1-6/1842f8eb20d3067281c574ac8a35cb8c.gif" />', 'Mówią, że dobrze!'],
      autoNext: 'RANDOM'
    },


    skip1: {
      bubbles: ['Kilka nieokreślonych statków na fjordzie, to...'],
      answerLeft: {answer: '<i>skip</i>', next: 'skip2'},
      answerRight: {answer: '<i>skiper</i>', next: 'skip1b'}
    },
    skip1b: {
      bubbles: ['Jedna sylaba <i>et</i>. Co to znaczy? Nie dodajemy <i>-er</i>.'],
      answerLeft: {answer: 'jasne, <i>skip</i>', next: 'skip2'},
    },
    skip2: {
      bubbles: ['<i>Bra!</i>'],
      autoNext: 'RANDOM'
    },


    dyr1: {
      bubbles: ['Określone zwierzęta:'],
      answerLeft: {answer: '<i>dyr</i>', next: 'dyr1b'},
      answerRight: {answer: '<i>dyrene</i>', next: 'dyr2'}
    },
    dyr1b: {
      bubbles: ['<i>Dyr</i> to nieokreślone zwierzęta. Określone mają końcówkę <i>-ene</i>.'],
      answerLeft: {answer: 'OK, <i>dyrene</i>', next: 'dyr2'},
    },
    dyr2: {
      bubbles: ['Yes! A przy pizzy wyglądają tak:', '<img src="/i/p-1-6/c2OEMfj.gif" />'],
      autoNext: 'RANDOM'
    },


    avtale1: {
      bubbles: ['Jedna umowa to: <i>en avtale</i>. Kilka określonych to...'],
      answerLeft: {answer: 'avtalene', next: 'avtale2'},
      answerRight: {answer: 'avtala', next: 'avtale1b'}
    },
    avtale1b: {
      bubbles: ['Nie ma takiego słowa. W liczbie mnogiej dodajesz przecież <i>-ene</i>.'],
      answerLeft: {answer: 'OK, <i>avtalene</i>', next: 'avtale2'},
    },
    avtale2: {
      bubbles: ['<i>Bra!</i>'],
      autoNext: 'RANDOM'
    },


    topp1: {
      bubbles: ['Nieokreślone szczyty?'],
      answerLeft: {answer: 'topp', next: 'topp1b'},
      answerRight: {answer: 'topper', next: 'topp2'}
    },
    topp1b: {
      bubbles: ['<i>Topper</i>, bo jeden szczyt to <i>en topp</i>.'],
      answerLeft: {answer: 'OK', next: 'topp2'},
    },
    topp2: {
      bubbles: ['Dajesz radę!'],
      autoNext: 'RANDOM'
    },


    oy1: {
      bubbles: ['Wyspy określone to...'],
      answerLeft: {answer: '<i>øyer</i>', next: 'oy1b'},
      answerRight: {answer: '<i>øyene</i>', next: 'oy2'}
    },
    oy1b: {
      bubbles: ['To były nieokreślone. Dlatego:'],
      answerLeft: {answer: '<i>øyene</i>', next: 'oy2'},
    },
    oy2: {
      bubbles: ['<i>Veldig bra!</i>', '<img src="/i/p-1-6/tumblr_nt3kawqCC61s2wio8o4_500.gif" />'],
      autoNext: 'RANDOM'
    },


    dekk1: {
      bubbles: ['Zmienić opony (nieokreślone) to: <i>skifte ...</i>'],
      answerLeft: {answer: 'dekk', next: 'dekk2'},
      answerRight: {answer: 'dekker', next: 'dekk1b'}
    },
    dekk1b: {
      bubbles: ['Jedna opona to <i>et dekk</i>. Jednosylabowy nijaki nie dostaje końcówki <i>-er</i>.'],
      answerLeft: {answer: '<i>dekk</i>', next: 'dekk2'},
    },
    dekk2: {
      bubbles: ['OK'],
      autoNext: 'RANDOM'
    },


    spill1: {
      bubbles: ['Jak będą nieokreślone gry po norwesku?'],
      answerLeft: {answer: 'spill', next: 'spill2'},
      answerRight: {answer: 'spiller', next: 'spill1b'}
    },
    spill1b: {
      bubbles: ['Jednosylabowy rodzaju <i>et</i>. Nie dodajemy wtedy końcówki <i>-er</i>.'],
      answerLeft: {answer: 'Pamiętam!', next: 'spill2'},
    },
    spill2: {
      bubbles: ['Świetnie!', '<img src="/i/p-1-6/dhg-kb23.gif" />'],
      autoNext: 'RANDOM'
    },


    by1: {
      bubbles: ['Miasta określone to:'],
      answerLeft: {answer: '<i>byen</i>', next: 'by1b'},
      answerRight: {answer: '<i>byene</i>', next: 'by2'}
    },
    by1b: {
      bubbles: ['<i>Byen</i> to jedno określone miasto. W liczbie mnogiej dodajemy <i>-ene</i>.'],
      answerLeft: {answer: '<i>byene</i>', next: 'by2'},
    },
    by2: {
      bubbles: ['<i>Fint!</i>', '<img src="/i/p-1-6/demolizione_palazzo.gif" />'],
      autoNext: 'RANDOM'
    },


    vits1: {
      bubbles: ['Jeden żart to <i>en vits</i>. Dowcipy to...'],
      answerLeft: {answer: '<i>vitser</i>', next: 'vits2'},
      answerRight: {answer: '<i>vitsen</i>', next: 'vits1b'}
    },
    vits1b: {
      bubbles: ['<i>Vitsen</i> to jeden, określony. Kilka to już zależy czy określonych czy nie, ale miałeś do wyboru jedynie:'],
      answerLeft: {answer: '<i>vitser</i>', next: 'vits2'},
    },
    vits2: {
      bubbles: ['Jesteś perfekcyjny! To nie żart.'],
      answerLeft: {answer: 'dzięki', next: 'vits3'},
    },
    vits2: {
      bubbles: ['<img src="/i/p-1-6/vr47d.gif" />'],
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
      bubbles: ['To koniec na dziś, ale możesz zawsze tu wrócić i przećwiczyć te słowa w innej kolejności.', 'Ale czekaj. Zrobimy Ci jeszcze pamiątkową fotografię.', '<img src="/i/p-1-6/tumblr-lxl3cv0ulu1qe0eclo1-r1-500.gif" />', 'Jesteś piękny!'],
      autoNext: 'END'
    },
    b1: {
      bubbles: ['To koniec na dziś, ale możesz zawsze tu wrócić i przećwiczyć te słowa w innej kolejności.', 'God natt!', '<img src="/i/p-1-6/j3vao.gif" />'],
      autoNext: 'END'
    }
  };



}
</script>
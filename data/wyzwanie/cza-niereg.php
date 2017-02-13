<script>
function LasChatData() {

  this.intro = {
    a1: {
      bubbles: [ 'Hei!', 'Jest trochę przedziwnych, albo wyjątkowych sytuacji, z którymi się spotkasz. I chcę Cię na to przygotować.', '<img src="/las/c/i/cza-niereg/Trampoline-Swing-With-leaves.gif" />', 'Wchodzisz w to?' ],
      answerOne: { answer: 'emot ninja (nie znalazłem) <svg class="emojione-svg emojione-svg--text"><use xlink:href="/las/c/i/emojione.sprites.svg#emoji-1f93a"></use></svg>', next: 'a2' }
    },
    a2: {
      bubbles: [ '<img src="/las/c/i/cza-niereg/lIpKFSBdO4K2I.gif" />' ],
      autoNext: 'ENDINTRO'
    }
  };


  this.chat = {
    aa1: {
      bubbles: [ 'Być po norwesku to: <i>å være</i>. Powiedz: <q>Jesteś piękny</q>.' ],
      answerOne: { answer: '<i>Du er pen.</i>', next: 'aa2' },
      answerTwo: { answer: '<i>Du værer pen.</i>', next: 'aa1b' }
    },
    aa1b: {
      bubbles: [ 'Niestety. To wyjątek.', 'We wszystkich osobach czasu teraźniejszego użyjemy: <i>er</i>.', '<i>Jeg er.</i> – Ja jestem.<br /><i>Du er.</i> – Ty jesteś.<br /><i>Han er.</i> – On jest.' ],
      answerOne: { answer: 'OK, <i>Du er pen.</i>', next: 'aa2' },
    },
    aa2: {
      bubbles: [ 'Wspaniale!', '<img src="/las/c/i/cza-niereg/tumblr_meruyt3J3p1rmialto1_500.gif" />', 'Jesteś tu?' ],
      answerOne: { answer: '<i>Jeg er her.</i>', next: 'aa3' }
    },
    aa3: {
      bubbles: [ '<i>Bare sjekker deg.</i>', 'Tylko Cię sprawdzam. <svg class="emojione-svg emojione-svg--text"><use xlink:href="/las/c/i/emojione.sprites.svg#emoji-1f609"></use></svg>' ],
      autoNext: 'RANDOM'
    },


    ab1: {
      bubbles: [ 'Robić to <i>å gjøre</i>, ale', 'Ja robię. – <i>Jeg gjør.</i><br />Ty robisz. – <i>Du gjør.</i><br />Ona robi. – <i>Hun gjør.</i>', 'Oni robią. – ???' ],
      answerOne: { answer: '<i>De gjør.</i>', next: 'ab2' },
      answerTwo: { answer: '<i>De gjører.</i>', next: 'ab1b' }
    },
    ab1b: {
      bubbles: [ '<img src="/las/c/i/cza-niereg/E4hvU2Ee5TS1i.gif" />', 'Może się zastanów.' ],
      answerOne: { answer: 'no tak: <i>De gjør.</i>', next: 'ab2' },
    },

    ab2: {
      bubbles: [ 'Veldig bra!', '<img src="/las/c/i/cza-niereg/When-Gang-Does-Group-Dance-Too.gif" />' ],
      autoNext: 'RANDOM'
    },


    ac1: {
      bubbles: [ '<i>Å vite</i> znaczy wiedzieć. W czasie teraźniejszym: <i>vet</i>.', 'Jak powiesz <q>wiem to</q>?' ],
      answerOne: { answer: '<i>Jeg visste det.</i>', next: 'ac1b' },
      answerTwo: { answer: '<i>Jeg vet det.</i>', next: 'ac2' }
    },
    ac1b: {
      bubbles: [ 'Coś tu nie gra. Może?' ],
      answerOne: { answer: 'Jeg vet det!', next: 'ac2' },
    },
    ac2: {
      bubbles: [ 'Bra at du vet det!' ],
      autoNext: 'RANDOM'
    },


    ad1: {
      bubbles: [ 'Uważać, myśleć to <i>å synes</i>, ale w czasie teraźniejszym jest tak samo. Nie dodajesz końcówki.' ],
      answerOne: { answer: 'przykład?', next: 'ad2' }
    },
    ad2: {
      bubbles: [ '<q>Uważam, że Knut jest brzydki.</q>', '<i>Jeg synes at Knut er stygg.</i>', 'Albo nawet brzydki jak noc:', '<i>Jeg synes at Knut er stygg som et troll.</i>', 'Z resztą to kwestia gustu.', '<img src="/las/c/i/cza-niereg/25nEL3k.gif" />' ],
      answerOne: { answer: '.....monolog....', next: 'ad4ae' },
    },
    /*ad3: {
      bubbles: [ '.' ],
      autoNext: 'RANDOM'
    },*/


    ad4ae: {
      bubbles: [ 'Kolejny wyjątek to mówić: å si, ale:', '<i>Jeg sier.</i> <br/><i>Du sier.</i> <br /><i>Vi sier.</i>', 'Zapamiętałeś?' ],
      answerOne: { answer: 'na całe życie <svg class="emojione-svg emojione-svg--text"><use xlink:href="/las/c/i/emojione.sprites.svg#emoji-1f64b-1f3fb"></use></svg>', next: 'ae2' },
      answerTwo: { answer: 'nie łapię', next: 'ae1b' }
    },
    ae1b: {
      bubbles: [ 'Normalnie do czasownika dodajemy samo <i>-r</i>.', '<i>å gå</i> – <i>Jeg går.</i>', 'Ale w tym słwie dodajemy <i>-er</i>.', '<i>å si</i> – <i>Jeg sier.</i>', 'Jak powiesz <q>on mówi</q>?' ],
      answerOne: { answer: '<i>Han sir.</i>', next: 'ae2b' },
      answerTwo: { answer: '<i>Han sier.</i>', next: 'ae3' }
    },
    ae2b: {
      bubbles: [ 'Na pewno?' ],
      answerOne: { answer: '<i>Han sier.</i>', next: 'ae3' }
    },
    ae3: {
      bubbles: [ '<i>Bra!</i>' ],
      answerOne: { answer: 'no tak, ale jest jeszcze <i>å snakke</i>', next: 'ae4' }
    },
    ae4: {
      bubbles: [ '<i>Å snakke</i> znaczy mówić w jakimś języku, albo rozmawiać.', '<i>Jeg snakker norsk.</i> – Mówię po norwesku.', '<i>Jeg snakker med deg.</i> – Rozmawiam z Tobą.' ],
      answerOne: { answer: 'a <i>å si</i>?', next: 'ae5' }
    },
    ae5: {
      bubbles: [ '<i>Å si</i> znaczy mówić coś, mówić, że albo wypowiadać.', '<i>Jeg sier det.</i> – Mówię to.', '<i>Han sier at Norge er pen.</i> – On mówi, że Norwegia jest piękna.' ],
      answerOne: { answer: 'OK, mam to <svg class="emojione-svg emojione-svg--text"><use xlink:href="/las/c/i/emojione.sprites.svg#emoji-1f4dd></span>', next: 'ae6' }
    },
    ae6: {
      bubbles: [ 'Jest jeszcze jeden czasownik: <i>å snakkes</i>.', 'Spotkasz się z nim często w potocznym języku.', 'Wiesz jak go używać?' ],
      answerOne: { answer: 'obiło mi się o uszy', next: 'ae7' },
      answerTwo: { answer: '<i>Jeg vet ikke, dessverre.</i>', next: 'ae7' }
    },
    ae7: {
      bubbles: [ '<i>Å snakkes</i> w czasie teraźniejszym jest też <i>snakkes</i>. Użyjesz go w zdaniu:', '<i>Vi snakkes.</i> – Zgadamy się.' ],
      answerOne: { answer: 'OK, użyję!', next: 'ae8' }
    },
    ae8: {
      bubbles: [ 'Podobny do niego jest <i>å sees</i> (albo <i>ses</i>).', 'Jak myślisz, jak powiedzieć <q>widzimy się</q>? W kontekście <q>do zobaczenia</q>.' ],
      answerOne: { answer: '<i>Vi sees.</i>', next: 'ae9' },
      answerTwo: { answer: '<i>Dere sees.</i>', next: 'ae8b' }
    },
    ae8b: {
      bubbles: [ '<img src="/las/c/i/cza-niereg/3o6ZtlfHW4pbmqWZbi.gif" />', '<i>Dere</i> to <q>wy</q>. Powinno być: ' ],
      answerOne: { answer: '<i>Vi sees.</i> Albo <i>Vi ses.</i>', next: 'ae9' },
    },
    ae9: {
      bubbles: [ '<img src="/las/c/i/cza-niereg/3oz8xQr4vghemtkHbW.gif" />', 'Jak myślisz, co znaczy takie zdanie?', '<i>Vi treffes ofte.</i>' ],
      answerOne: { answer: 'Spotykaliśmy się często.', next: 'ae9b' },
      answerTwo: { answer: 'Spotykamy się często.', next: 'ae10' }
    },
    ae9b: {
      bubbles: [ 'To nie jest czas przeszły. To forma czasu teraźniejszego. ', 'Bezokolicznik: <i>å treffes</i>.', 'W czasie teraźniejszym: <i>treffes</i>.', 'Dlatego <i>Vi treffes ofte</i> znaczy:' ],
      answerOne: { answer: 'Spotykamy się często.', next: 'ae10' }
    },
    ae10: {
      bubbles: [ '<img src="/las/c/i/cza-niereg/tumblr-nxm9h7e9ng1uluepno1-400.gif" />' ],
      autoNext: 'RANDOM'
    },


    af1: {
      bubbles: [ 'Wiesz jak jest pytać albo prosić w bezokoliczniku?' ],
      answerOne: { answer: '<i>å spør</i>', next: 'af2' },
      answerTwo: { answer: '<i>å spørre</i>', next: 'af1b' }
    },
    af1b: {
      bubbles: [ 'Niestety. <i>Spør</i> to już forma czasu teraźniejszego. W bezokoliczniku jest:' ],
      answerOne: { answer: 'å spørre', next: 'af2' }
    },
    af2: {
      bubbles: [ 'Ok. To jak powiedzieć <q>ona pyta o drogę</q>?' ],
      answerOne: { answer: '<i>Han spør om veien.</i>', next: 'af2b' },
      answerTwo: { answer: '<i>Hun spør om veien.</i>', next: 'af3' }
    },
    af2b: {
      bubbles: [ 'On to: <i>han</i>. Ona to: <i>hun</i>.' ],
      answerOne: { answer: 'OK, już pamiętam', next: 'af3' }
    },
    af3: {
      bubbles: [ '<i>Flott!</i>', '<img src="/las/c/i/cza-niereg/mv7Q7X9QWxPdS.gif" />' ],
      autoNext: 'RANDOM'
    },


    ag1: {
      bubbles: [ 'Jak powiedzieć <q>on tylko prosi o pomoc</q>?' ],
      answerOne: { answer: '<i>Han vil bare hjelpe.</i>', next: 'ag1b' },
      answerTwo: { answer: '<i>Han bare spør om hjelp.</i>', next: 'ag2' }
    },
    ag1b: {
      bubbles: [ '.......' ],
      answerOne: { answer: 'OK....', next: 'ag2' },
    },
    ag2: {
      bubbles: [ '<img src="/las/c/i/cza-niereg/dmUjJNqY4tML6.gif" />' ],
      autoNext: 'RANDOM'
    }





//    xx1: {
//      bubbles: [ '' ],
//      answerOne: { answer: '<i></i>', next: 'xx2' },
//      answerTwo: { answer: '<i></i>', next: 'xx1b' }
//    },
//    xx1b: {
//      bubbles: [ '' ],
//      answerOne: { answer: '', next: 'xx2' },
//    },
//    xx2: {
//      bubbles: [ '' ],
//      autoNext: 'RANDOM'
//    }

  };


  this.end = {
    a1: {
      bubbles: [ 'Tak poznałeś wszystkie najważniejsze wyjątki czasowników w czasie teraźniejszym. Koniec.', '<img src="/las/c/i/cza-niereg/mX7EwTtsRcvKM.gif" />', '<i>Ha en fin dag! Vi sees i skogen!</i>', '<img src="/las/c/i/cza-niereg/gBxL0G0DqZd84.gif" />' ],
      autoNext: 'END'
    }
  };



}
</script>
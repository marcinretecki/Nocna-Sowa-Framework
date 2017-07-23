<script>
function LasChatData() {

  this.testNotes = [
    'ag1b – nie ma odpowiedzi od sowy',
    'ad2 – tu jest za dużo wiadomosci od sowy i nie ma interakcji'
  ];

  this.intro = {
    _a1: {
      bubbles: [ 'Hei!', 'Jest trochę przedziwnych, albo wyjątkowych sytuacji, z którymi się spotkasz. I chcę Cię na to przygotować.', '<img src="/las/c/i/cza-niereg/Trampoline-Swing-With-leaves.gif" />', 'Wchodzisz w to?' ],
      answers: [
        { answer: 'emot ninja (nie znalazłem) #emoji-1f93a;', next: '_a2' }
      ]
    },
    _a2: {
      bubbles: [ '<img src="/las/c/i/cza-niereg/lIpKFSBdO4K2I.gif" />' ],
      autoNext: 'ENDINTRO'
    }
  };


  this.chat = {
    _aa1: {
      bubbles: [ 'Być po norwesku to: <i>å være</i>. Powiedz: <q>Jesteś piękny</q>.' ],
      answers: [
        { answer: '<i>Du er pen.</i>', next: '_aa2' },
        { answer: '<i>Du værer pen.</i>', next: '_aa1b' }
      ]

    },
    _aa1b: {
      bubbles: [ 'Niestety. To wyjątek.', 'We wszystkich osobach czasu teraźniejszego użyjemy: <i>er</i>.', '<i>Jeg er.</i> – Ja jestem.<br /><i>Du er.</i> – Ty jesteś.<br /><i>Han er.</i> – On jest.' ],
      answers: [
        { answer: 'OK, <i>Du er pen.</i>', next: '_aa2' },
      ]
    },
    _aa2: {
      bubbles: [ 'Wspaniale!', '<img src="/las/c/i/cza-niereg/tumblr_meruyt3J3p1rmialto1_500.gif" />', 'Jesteś tu?' ],
      answers: [
        { answer: '<i>Jeg er her.</i>', next: '_aa3' }
      ]
    },
    _aa3: {
      bubbles: [ '<i>Bare sjekker deg.</i>', 'Tylko Cię sprawdzam. #emoji-1f609;' ],
      autoNext: 'RANDOM'
    },


    _ab1: {
      bubbles: [ 'Robić to <i>å gjøre</i>, ale', 'Ja robię. – <i>Jeg gjør.</i><br />Ty robisz. – <i>Du gjør.</i><br />Ona robi. – <i>Hun gjør.</i>', 'Oni robią. – ???' ],
      answers: [
        { answer: '<i>De gjør.</i>', next: '_ab2' },
        { answer: '<i>De gjører.</i>', next: '_ab1b' }
      ]

    },
    _ab1b: {
      bubbles: [ '<img src="/las/c/i/cza-niereg/E4hvU2Ee5TS1i.gif" />', 'Może się zastanów.' ],
      answers: [
        { answer: 'no tak: <i>De gjør.</i>', next: '_ab2' },
      ]
    },

    _ab2: {
      bubbles: [ 'Veldig bra!', '<img src="/las/c/i/cza-niereg/When-Gang-Does-Group-Dance-Too.gif" />' ],
      autoNext: 'RANDOM'
    },


    _ac1: {
      bubbles: [ '<i>Å vite</i> znaczy wiedzieć. W czasie teraźniejszym: <i>vet</i>.', 'Jak powiesz <q>wiem to</q>?' ],
      answers: [
        { answer: '<i>Jeg visste det.</i>', next: '_ac1b' },
        { answer: '<i>Jeg vet det.</i>', next: '_ac2' }
      ]

    },
    _ac1b: {
      bubbles: [ 'Coś tu nie gra. Może?' ],
      answers: [
        { answer: '<i>Jeg vet det!</i>', next: '_ac2' },
      ]
    },
    _ac2: {
      bubbles: [ '<i>Bra at du vet det!</i>' ],
      autoNext: 'RANDOM'
    },


    _ad1: {
      bubbles: [ 'Uważać, myśleć to <i>å synes</i>, ale w czasie teraźniejszym jest tak samo. Nie dodajesz końcówki.' ],
      answers: [
        { answer: 'przykład?', next: '_ad2' }
      ]
    },
    _ad2: {
      bubbles: [ '<q>Uważam, że Knut jest brzydki.</q>', '<i>Jeg synes at Knut er stygg.</i>', 'Albo nawet brzydki jak noc:', '<i>Jeg synes at Knut er stygg som et troll.</i>', 'Z resztą to kwestia gustu.', '<img src="/las/c/i/cza-niereg/25nEL3k.gif" />' ],
      answers: [
        { answer: '.....monolog....', next: '_ad4ae' },
      ]
    },
    _/*ad3: {
      bubbles: [ '.' ],
      autoNext: 'RANDOM'
    },*/


    _ad4ae: {
      bubbles: [ 'Kolejny wyjątek to mówić: å si, ale:', '<i>Jeg sier.</i> <br/><i>Du sier.</i> <br /><i>Vi sier.</i>', 'Zapamiętałeś?' ],
      answers: [
        { answer: 'na całe życie #emoji-1f64b-1f3fb;', next: '_ae2' },
        { answer: 'nie łapię', next: '_ae1b' }
      ]

    },
    _ae1b: {
      bubbles: [ 'Normalnie do czasownika dodajemy samo <i>-r</i>.', '<i>å gå</i> – <i>Jeg går.</i>', 'Ale w tym słwie dodajemy <i>-er</i>.', '<i>å si</i> – <i>Jeg sier.</i>', 'Jak powiesz <q>on mówi</q>?' ],
      answers: [
        { answer: '<i>Han sir.</i>', next: '_ae2b' },
        { answer: '<i>Han sier.</i>', next: '_ae3' }
      ]

    },
    _ae2b: {
      bubbles: [ 'Na pewno?' ],
      answers: [
        { answer: '<i>Han sier.</i>', next: '_ae3' }
      ]
    },
    _ae3: {
      bubbles: [ '<i>Bra!</i>' ],
      answers: [
        { answer: 'no tak, ale jest jeszcze <i>å snakke</i>', next: '_ae4' }
      ]
    },
    _ae4: {
      bubbles: [ '<i>Å snakke</i> znaczy mówić w jakimś języku, albo rozmawiać.', '<i>Jeg snakker norsk.</i> – Mówię po norwesku.', '<i>Jeg snakker med deg.</i> – Rozmawiam z Tobą.' ],
      answers: [
        { answer: 'a <i>å si</i>?', next: '_ae5' }
      ]
    },
    _ae5: {
      bubbles: [ '<i>Å si</i> znaczy mówić coś, mówić, że albo wypowiadać.', '<i>Jeg sier det.</i> – Mówię to.', '<i>Han sier at Norge er pen.</i> – On mówi, że Norwegia jest piękna.' ],
      answers: [
        { answer: 'OK, mam to #emoji-1f4dd></span>', next: '_ae6' }
      ]
    },
    _ae6: {
      bubbles: [ 'Jest jeszcze jeden czasownik: <i>å snakkes</i>.', 'Spotkasz się z nim często w potocznym języku.', 'Wiesz jak go używać?' ],
      answers: [
        { answer: 'obiło mi się o uszy', next: '_ae7' },
        { answer: '<i>Jeg vet ikke, dessverre.</i>', next: '_ae7' }
      ]

    },
    _ae7: {
      bubbles: [ '<i>Å snakkes</i> w czasie teraźniejszym jest też <i>snakkes</i>. Użyjesz go w zdaniu:', '<i>Vi snakkes.</i> – Zgadamy się.' ],
      answers: [
        { answer: 'OK, użyję!', next: '_ae8' }
      ]
    },
    _ae8: {
      bubbles: [ 'Podobny do niego jest <i>å sees</i> (albo <i>ses</i>).', 'Jak myślisz, jak powiedzieć <q>widzimy się</q>? W kontekście <q>do zobaczenia</q>.' ],
      answers: [
        { answer: '<i>Vi sees.</i>', next: '_ae9' },
        { answer: '<i>Dere sees.</i>', next: '_ae8b' }
      ]

    },
    _ae8b: {
      bubbles: [ '<img src="/las/c/i/cza-niereg/3o6ZtlfHW4pbmqWZbi.gif" />', '<i>Dere</i> to <q>wy</q>. Powinno być: ' ],
      answers: [
        { answer: '<i>Vi sees.</i> Albo <i>Vi ses.</i>', next: '_ae9' },
      ]
    },
    _ae9: {
      bubbles: [ '<img src="/las/c/i/cza-niereg/3oz8xQr4vghemtkHbW.gif" />', 'Jak myślisz, co znaczy takie zdanie?', '<i>Vi treffes ofte.</i>' ],
      answers: [
        { answer: 'Spotykaliśmy się często.', next: '_ae9b' },
        { answer: 'Spotykamy się często.', next: '_ae10' }
      ]

    },
    _ae9b: {
      bubbles: [ 'To nie jest czas przeszły. To forma czasu teraźniejszego. ', 'Bezokolicznik: <i>å treffes</i>.', 'W czasie teraźniejszym: <i>treffes</i>.', 'Dlatego <i>Vi treffes ofte</i> znaczy:' ],
      answers: [
        { answer: 'Spotykamy się często.', next: '_ae10' }
      ]
    },
    _ae10: {
      bubbles: [ '<img src="/las/c/i/cza-niereg/tumblr-nxm9h7e9ng1uluepno1-400.gif" />' ],
      autoNext: 'RANDOM'
    },


    _af1: {
      bubbles: [ 'Wiesz jak jest pytać albo prosić w bezokoliczniku?' ],
      answers: [
        { answer: '<i>å spør</i>', next: '_af2' },
        { answer: '<i>å spørre</i>', next: '_af1b' }
      ]

    },
    _af1b: {
      bubbles: [ 'Niestety. <i>Spør</i> to już forma czasu teraźniejszego. W bezokoliczniku jest:' ],
      answers: [
        { answer: 'å spørre', next: '_af2' }
      ]
    },
    _af2: {
      bubbles: [ 'Ok. To jak powiedzieć <q>ona pyta o drogę</q>?' ],
      answers: [
        { answer: '<i>Han spør om veien.</i>', next: '_af2b' },
        { answer: '<i>Hun spør om veien.</i>', next: '_af3' }
      ]

    },
    _af2b: {
      bubbles: [ 'On to: <i>han</i>. Ona to: <i>hun</i>.' ],
      answers: [
        { answer: 'OK, już pamiętam', next: '_af3' }
      ]
    },
    _af3: {
      bubbles: [ '<i>Flott!</i>', '<img src="/las/c/i/cza-niereg/mv7Q7X9QWxPdS.gif" />' ],
      autoNext: 'RANDOM'
    },


    _ag1: {
      bubbles: [ 'Jak powiedzieć <q>on tylko prosi o pomoc</q>?' ],
      answers: [
        { answer: '<i>Han vil bare hjelpe.</i>', next: '_ag1b' },
        { answer: '<i>Han bare spør om hjelp.</i>', next: '_ag2' }
      ]

    },
    _ag1b: {
      bubbles: [ '.......' ],
      answers: [
        { answer: 'OK....', next: '_ag2' },
      ]
    },
    _ag2: {
      bubbles: [ '<img src="/las/c/i/cza-niereg/dmUjJNqY4tML6.gif" />' ],
      autoNext: 'RANDOM'
    }


  };


  this.end = {
    _a1: {
      bubbles: [ 'Tak poznałeś wszystkie najważniejsze wyjątki czasowników w czasie teraźniejszym. Koniec.', '<img src="/las/c/i/cza-niereg/mX7EwTtsRcvKM.gif" />', '<i>Ha en fin dag! Vi sees i skogen!</i>', '<img src="/las/c/i/cza-niereg/gBxL0G0DqZd84.gif" />' ],
      answers: [
        { answer: '<i>Vi sees!</i>', next: 'END' }
      ]
    }
  };



}
</script>
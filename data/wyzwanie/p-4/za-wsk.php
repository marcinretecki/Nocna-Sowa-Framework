<script>
function LasData() {

  this.category = 'audio-test';   // chat|setninger|etc


  this.testNotes = [
    'nie ma nagrania'
  ];

  //  Albo answers
  //  albo autoNext
  //  ale nie oba na raz!
  //  msg jest dowolne
  //  more jest dowolne
  //  gdy nie startTime, mamy quiz
  //  answer jest poiminięte tylko w intro 1


  this.intro = {
    _intro1: {
      msg:          'Załóż słuchawki, jeśli chcesz. #emoji-1f3a7;',
      autoNext:     '_intro2'
    },
    _intro2: {
      msg:          '<p>Dopasuj zaimek wskazujący do rzeczownika w zdaniu.</p>' + '<p>Następnie powtórz na głos całe zdanie.</p>',
      autoNext:     'ENDINTRO'
    },
  };


  this.chat = {

    _aa1: {
      msg:        '<i>Hvorfor står #fill-space; tigeren foran Oslo S?</i>',
      trans:      'Dlaczego ten tygrys stoi przed Oslo S?',
      answers: [
        { answer: '<i>denne</i>',   score: 'correct', next: '_aa2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>disse</i>',   score: 'wrong' }
      ]
    },
    _aa2: {
      msg:        '<i>Hvorfor står <span class="mark mark--green">denne</span> tigeren foran Oslo S?</i>',
      trans:      'Dlaczego ten tygrys stoi przed Oslo S?',
      startTime:  0,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ab1: {
      msg:        '<i> #fill-space; jentene spiser her hver dag.</i>',
      trans:      'Te dziewczyny jedzą tu codziennie.',
      answers: [
        { answer: '<i>disse</i>',   score: 'correct', next: '_aa2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>denne</i>',   score: 'wrong' }
      ]
    },
    _ab2: {
      msg:        '<i><span class="mark mark--green">Disse</span> jentene spiser her hver dag.</i>',
      trans:      'Te dziewczyny jedzą tu codziennie.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ac1: {
      msg:        '<i> #fill-space; huset er ikke til salgs.</i>',
      trans:      'Ten dom nie jest na sprzedaż.',
      answers: [
        { answer: '<i>dette</i>',   score: 'correct', next: '_ac2' },
        { answer: '<i>denne</i>',   score: 'wrong' },
        { answer: '<i>disse</i>',   score: 'wrong' }
      ]
    },
    _ac2: {
      msg:        '<i><span class="mark mark--green">Dette</span> huset er ikke til salgs.</i>',
      trans:      'Ten dom nie jest na sprzedaż.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ad1: {
      msg:        '<i> #fill-space; krydderet kommer fra Bangladesh.</i>',
      trans:      'Ta przyprawa pochodzi z Bangladeszu.',
      answers: [
        { answer: '<i>dette</i>',   score: 'correct', next: '_ad2' },
        { answer: '<i>denne</i>',   score: 'wrong' },
        { answer: '<i>disse</i>',   score: 'wrong' }
      ]
    },
    _ad2: {
      msg:        '<i><span class="mark mark--green">Dette</span> krydderet kommer fra Bangladesh.</i>',
      trans:      'Ta przyprawa pochodzi z Bangladeszu.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ae1: {
      msg:        '<i> #fill-space; roboten kan snakke med deg.</i>',
      trans:      'Ten robot może rozmawiać z Tobą.',
      answers: [
        { answer: '<i>denne</i>',   score: 'correct', next: '_ae2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>disse</i>',   score: 'wrong' }
      ]
    },
    _ae2: {
      msg:        '<i><span class="mark mark--green">Denne</span> roboten kan snakke med deg.</i>',
      trans:      'Ten robot może rozmawiać z Tobą.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _af1: {
      msg:        '<i>Det er ikke mulig å åpne  #fill-space; vinduene.</i>',
      trans:      'Nie jest możliwe otworzenie tych okien.',
      answers: [
        { answer: '<i>disse</i>',   score: 'correct', next: '_af2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>denne</i>',   score: 'wrong' }
      ]
    },
    _af2: {
      msg:        '<i>Det er ikke mulig å åpne <span class="mark mark--green">disse</span> vinduene.</i>',
      trans:      'Nie jest możliwe otworzenie tych okien.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ag1: {
      msg:        '<i> #fill-space; vaskemaskinen virker ikke.</i>',
      trans:      'Ta pralka nie działa.',
      answers: [
        { answer: '<i>denne</i>',   score: 'correct', next: '_ag2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>disse</i>',   score: 'wrong' }
      ]
    },
    _ag2: {
      msg:        '<i><span class="mark mark--green">Denne</span> vaskemaskinen virker ikke.</i>',
      trans:      'Ta pralka nie działa.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ah1: {
      msg:        '<i> #fill-space; dagen kan være pen.</i>',
      trans:      'Ten dzień może być piękny.',
      answers: [
        { answer: '<i>denne</i>',   score: 'correct', next: '_ah2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>disse</i>',   score: 'wrong' }
      ]
    },
    _ah2: {
      msg:        '<i><span class="mark mark--green">Denne</span> dagen kan være pen.</i>',
      trans:      'Ten dzień może być piękny.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ai1: {
      msg:        '<i> #fill-space; krigen kan ikke avsluttes.</i>',
      trans:      'Ta wojna nie może się skończyć.',
      answers: [
        { answer: '<i>denne</i>',   score: 'correct', next: '_ai2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>disse</i>',   score: 'wrong' }
      ]
    },
    _ai2: {
      msg:        '<i><span class="mark mark--green">Denne</span> krigen kan ikke avsluttes.</i>',
      trans:      'Ta wojna nie może się skończyć.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _aj1: {
      msg:        '<i>#fill-space; mannen vil ikke slutte å røyke.</i>',
      trans:      'Ten mężczyzna nie chce rzucić palenia.',
      answers: [
        { answer: '<i>denne</i>',   score: 'correct', next: '_aj2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>disse</i>',   score: 'wrong' }
      ]
    },
    _aj2: {
      msg:        '<i><span class="mark mark--green">Denne</span> mannen vil ikke slutte å røyke.</i>',
      trans:      'Ten mężczyzna nie chce rzucić palenia.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ak1: {
      msg:        '<i>#fill-space; lysene er veldig sterke.</i>',
      trans:      'Te światła są bardzo silne.',
      answers: [
        { answer: '<i>disse</i>',   score: 'correct', next: '_ak2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>denne</i>',   score: 'wrong' }
      ]
    },
    _ak2: {
      msg:        '<i><span class="mark mark--green">Disse</span> lysene er veldig sterke.</i>',
      trans:      'Te światła są bardzo silne.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _al1: {
      msg:        '<i>#fill-space; flyet flyr til Dubai.</i>',
      trans:      'Ten samolot leci do Dubaju.',
      answers: [
        { answer: '<i>dette</i>',   score: 'correct', next: '_al2' },
        { answer: '<i>denne</i>',   score: 'wrong' },
        { answer: '<i>disse</i>',   score: 'wrong' }
      ]
    },
    _al2: {
      msg:        '<i><span class="mark mark--green">Dette</span> flyet flyr til Dubai.</i>',
      trans:      'Ten samolot leci do Dubaju.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _am1: {
      msg:        '<i>Det er morsomt på  #fill-space; kurset.</i>',
      trans:      'Jest wesoło na tym kursie.',
      answers: [
        { answer: '<i>dette</i>',   score: 'correct', next: '_am2' },
        { answer: '<i>denne</i>',   score: 'wrong' },
        { answer: '<i>disse</i>',   score: 'wrong' }
      ]
    },
    _am2: {
      msg:        '<i>Det er morsomt på <span class="mark mark--green">dette</span> kurset.</i>',
      trans:      'Jest wesoło na tym kursie.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _an1: {
      msg:        '<i>Det er koselig på #fill-space; hytta.</i>',
      trans:      'Jest przytulnie w tej chatce.',
      answers: [
        { answer: '<i>denne</i>',   score: 'correct', next: '_an2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>disse</i>',   score: 'wrong' }
      ]
    },
    _an2: {
      msg:        '<i>Det er koselig på <span class="mark mark--green">denne</span> hytta.</i>',
      trans:      'Jest przytulnie w tej chatce.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ao1: {
      msg:        '<i>#fill-space; bussene er veldig raske.</i>',
      trans:      'Te autobusy są bardzo szybkie.',
      answers: [
        { answer: '<i>disse</i>',   score: 'correct', next: '_ao2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>denne</i>',   score: 'wrong' }
      ]
    },
    _ao2: {
      msg:        '<i><span class="mark mark--green">Disse</span> bussene er veldig raske.</i>',
      trans:      'Te autobusy są bardzo szybkie.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ap1: {
      msg:        '<i>#fill-space; gummistøvlene er våte inne.</i>',
      trans:      'Te kalosze są mokre w środku.',
      answers: [
        { answer: '<i>disse</i>',   score: 'correct', next: '_ap2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>denne</i>',   score: 'wrong' }
      ]
    },
    _ap2: {
      msg:        '<i><span class="mark mark--green">Disse</span> gummistøvlene er våte inne.</i>',
      trans:      'Te kalosze są mokre w środku.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ba1: {
      msg:        '<i>Hvorfor ringer #fill-space; kvinna fra Aftenposten til oss?</i>',
      trans:      'Dlaczego dzwoni ta kobieta z Aftenposten do nas?',
      answers: [
        { answer: '<i>denne</i>',   score: 'correct', next: '_ba2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>disse</i>',   score: 'wrong' }
      ]
    },
    _ba2: {
      msg:        '<i>Hvorfor ringer <span class="mark mark--green">denne</span> kvinna fra Aftenposten til oss?</i>',
      trans:      'Dlaczego dzwoni ta kobieta z Aftenposten do nas?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bb1: {
      msg:        '<i>Hvor kan jeg legge #fill-space; pakkene?</i>',
      trans:      'Gdzie mogę położyć te paczki?',
      answers: [
        { answer: '<i>disse</i>',   score: 'correct', next: '_bb2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>denne</i>',   score: 'wrong' }
      ]
    },
    _bb2: {
      msg:        '<i>Hvor kan jeg legge <span class="mark mark--green">disse</span> pakkene?</i>',
      trans:      'Gdzie mogę położyć te paczki?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bc1: {
      msg:        '<i>Hvem er sjefen for #fill-space; firmaet?</i>',
      trans:      'Gdzie jest szef tej firmy?',
      answers: [
        { answer: '<i>dette</i>',   score: 'correct', next: '_bc2' },
        { answer: '<i>disse</i>',   score: 'wrong' },
        { answer: '<i>denne</i>',   score: 'wrong' }
      ]
    },
    _bc2: {
      msg:        '<i>Hvem er sjefen for <span class="mark mark--green">dette</span> firmaet?</i>',
      trans:      'Gdzie jest szef tej firmy?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bd1: {
      msg:        '<i>Hva gjør #fill-space; hunden her?</i>',
      trans:      'Co robi ten pies tutaj?',
      answers: [
        { answer: '<i>denne</i>',   score: 'correct', next: '_bd2' },
        { answer: '<i>dette</i>',   score: 'wrong' },
        { answer: '<i>disse</i>',   score: 'wrong' }
      ]
    },
    _bd2: {
      msg:        '<i>Hva gjør <span class="mark mark--green">denne</span> hunden her?</i>',
      trans:      'Co robi ten pies tutaj?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    }


  };



}
</script>
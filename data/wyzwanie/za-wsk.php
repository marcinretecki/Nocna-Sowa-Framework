<script>
function LasAudioData() {

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
    _a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO'/*,
      more: {
        startTime: 0,
        duration:   1.5,
      }*/
    }
  };


  this.chat = {

    _aa1: {
      msg:        'Hvorfor står  <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> tigeren foran Oslo S?',
      trans:      'Dlaczego ten tygrys stoi przed Oslo S?',
      answers: [
        { answer: 'denne',   next: '_aa2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    _aa2: {
      msg:        'Hvorfor står denne tigeren foran Oslo S?',
      trans:      'Dlaczego ten tygrys stoi przed Oslo S?',
      startTime:  0,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ab1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> jentene spiser her hver dag.',
      trans:      'Te dziewczyny jedzą tu codziennie.',
      answers: [
        { answer: 'disse',   next: '_aa2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    _ab2: {
      msg:        'Disse jentene spiser her hver dag.',
      trans:      'Te dziewczyny jedzą tu codziennie.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ac1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> huset er ikke til salgs.',
      trans:      'Ten dom nie jest na sprzedaż.',
      answers: [
        { answer: 'dette',   next: '_ac2' },
        { answer: 'denne',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    _ac2: {
      msg:        'Dette huset er ikke til salgs.',
      trans:      'Ten dom nie jest na sprzedaż.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ad1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> krydderet kommer fra Bangladesh.',
      trans:      'Ta przyprawa pochodzi z Bangladeszu.',
      answers: [
        { answer: 'dette',   next: '_ad2' },
        { answer: 'denne',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    _ad2: {
      msg:        'Dette krydderet kommer fra Bangladesh.',
      trans:      'Ta przyprawa pochodzi z Bangladeszu.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ae1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> roboten kan snakke med deg.',
      trans:      'Ten robot może rozmawiać z Tobą.',
      answers: [
        { answer: 'denne',   next: '_ae2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    _ae2: {
      msg:        'Denne roboten kan snakke med deg.',
      trans:      'Ten robot może rozmawiać z Tobą.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _af1: {
      msg:        'Det er ikke mulig å åpne  <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> vinduene.',
      trans:      'Nie jest możliwe otworzenie tych okien.',
      answers: [
        { answer: 'disse',   next: '_af2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    _af2: {
      msg:        'Det er ikke mulig å åpne disse vinduene.',
      trans:      'Nie jest możliwe otworzenie tych okien.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ag1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> vaskemaskinen virker ikke.',
      trans:      'Ta pralka nie działa.',
      answers: [
        { answer: 'denne',   next: '_ag2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    _ag2: {
      msg:        'Denne vaskemaskinen virker ikke.',
      trans:      'Ta pralka nie działa.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ah1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> dagen kan være pen.',
      trans:      'Ten dzień może być piękny.',
      answers: [
        { answer: 'denne',   next: '_ah2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    _ah2: {
      msg:        'Denne dagen kan være pen.',
      trans:      'Ten dzień może być piękny.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ai1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> krigen kan ikke avsluttes.',
      trans:      'Ta wojna nie może się skończyć.',
      answers: [
        { answer: 'denne',   next: '_ai2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    _ai2: {
      msg:        'Denne krigen kan ikke avsluttes.',
      trans:      'Ta wojna nie może się skończyć.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _aj1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> mannen vil ikke slutte å røyke.',
      trans:      'Ten mężczyzna nie chce rzucić palenia.',
      answers: [
        { answer: 'denne',   next: '_aj2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    _aj2: {
      msg:        'Denne mannen vil ikke slutte å røyke.',
      trans:      'Ten mężczyzna nie chce rzucić palenia.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ak1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> lysene er veldig sterke.',
      trans:      'Te światła są bardzo silne.',
      answers: [
        { answer: 'disse',   next: '_ak2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    _ak2: {
      msg:        'Disse lysene er veldig sterke.',
      trans:      'Te światła są bardzo silne.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _al1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> flyet flyr til Dubai.',
      trans:      'Ten samolot leci do Dubaju.',
      answers: [
        { answer: 'dette',   next: '_al2' },
        { answer: 'denne',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    _al2: {
      msg:        'Dette flyet flyr til Dubai.',
      trans:      'Ten samolot leci do Dubaju.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _am1: {
      msg:        'Det er morsomt på  <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> kurset.',
      trans:      'Jest wesoło na tym kursie.',
      answers: [
        { answer: 'dette',   next: '_am2' },
        { answer: 'denne',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    _am2: {
      msg:        'Det er morsomt på dette kurset.',
      trans:      'Jest wesoło na tym kursie.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _an1: {
      msg:        'Det er koselig på <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> hytta.',
      trans:      'Jest przytulnie w tej chatce.',
      answers: [
        { answer: 'denne',   next: '_an2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    _an2: {
      msg:        'Det er koselig på denne hytta.',
      trans:      'Jest przytulnie w tej chatce.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ao1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> bussene er veldig raske.',
      trans:      'Te autobusy są bardzo szybkie.',
      answers: [
        { answer: 'disse',   next: '_ao2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    _ao2: {
      msg:        'Disse bussene er veldig raske.',
      trans:      'Te autobusy są bardzo szybkie.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ap1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> gummistøvlene er våte inne.',
      trans:      'Te kalosze są mokre w środku.',
      answers: [
        { answer: 'disse',   next: '_ap2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    _ap2: {
      msg:        'Disse gummistøvlene er våte inne.',
      trans:      'Te kalosze są mokre w środku.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ba1: {
      msg:        'Hvorfor ringer <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> kvinna fra Aftenposten til oss?',
      trans:      'Dlaczego dzwoni ta kobieta z Aftenposten do nas?',
      answers: [
        { answer: 'denne',   next: '_ba2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    _ba2: {
      msg:        'Hvorfor ringer denne kvinna fra Aftenposten til oss?',
      trans:      'Dlaczego dzwoni ta kobieta z Aftenposten do nas?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bb1: {
      msg:        'Hvor kan jeg legge <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> pakkene?',
      trans:      'Gdzie mogę położyć te paczki?',
      answers: [
        { answer: 'disse',   next: '_bb2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    _bb2: {
      msg:        'Hvor kan jeg legge disse pakkene?',
      trans:      'Gdzie mogę położyć te paczki?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bc1: {
      msg:        'Hvem er sjefen for <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> firmaet?',
      trans:      'Gdzie jest szef tej firmy?',
      answers: [
        { answer: 'dette',   next: '_bc2' },
        { answer: 'disse',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    _bc2: {
      msg:        'Hvem er sjefen for dette firmaet?',
      trans:      'Gdzie jest szef tej firmy?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bd1: {
      msg:        'Hva gjør <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> hunden her?',
      trans:      'Co robi ten pies tutaj?',
      answers: [
        { answer: 'denne',   next: '_bd2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    _bd2: {
      msg:        'Hva gjør denne hunden her?',
      trans:      'Co robi ten pies tutaj?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    }


  };


  this.end = {

    _end1: {
      msg:        'END',
      startTime:  0,
      duration:   1.5
    }

  };



}
</script>
<script>
function LasAudioData() {

  this.testNotes = [
  ];

  //  Albo answers
  //  albo autoNext
  //  ale nie oba na raz!
  //  msg jest dowolne
  //  more jest dowolne
  //  gdy nie startTime, mamy quiz
  //  answer jest poiminięte tylko w intro 1


  this.intro = {
    a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO'/*,
      more: { startTime: 0, stopTime: 26 }*/
    }
  };


  this.chat = {

    aa1: {
      msg:        'Hvorfor står  <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> tigeren foran Oslo S?',
      trans:      'Dlaczego ten tygrys stoi przed Oslo S?',
      answers: [
        { answer: 'denne',   next: 'aa2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    aa2: {
      msg:        'Hvorfor står denne tigeren foran Oslo S?',
      trans:      'Dlaczego ten tygrys stoi przed Oslo S?',
//      startTime:  0,
//      stopTime:   2,
      autoNext:   'RANDOM'
    },


    ab1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> jentene spiser her hver dag.',
      trans:      'Te dziewczyny jedzą tu codziennie.',
      answers: [
        { answer: 'disse',   next: 'aa2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    ab2: {
      msg:        'Disse jentene spiser her hver dag.',
      trans:      'Te dziewczyny jedzą tu codziennie.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ac1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> huset er ikke til salgs.',
      trans:      'Ten dom nie jest na sprzedaż.',
      answers: [
        { answer: 'dette',   next: 'ac2' },
        { answer: 'denne',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ac2: {
      msg:        'Dette huset er ikke til salgs.',
      trans:      'Ten dom nie jest na sprzedaż.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ad1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> krydderet kommer fra Bangladesh.',
      trans:      'Ta przyprawa pochodzi z Bangladeszu.',
      answers: [
        { answer: 'dette',   next: 'ad2' },
        { answer: 'denne',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ad2: {
      msg:        'Dette krydderet kommer fra Bangladesh.',
      trans:      'Ta przyprawa pochodzi z Bangladeszu.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ae1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> roboten kan snakke med deg.',
      trans:      'Ten robot może rozmawiać z Tobą.',
      answers: [
        { answer: 'denne',   next: 'ae2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ae2: {
      msg:        'Denne roboten kan snakke med deg.',
      trans:      'Ten robot może rozmawiać z Tobą.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    af1: {
      msg:        'Det er ikke mulig å åpne  <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> vinduene.',
      trans:      'Nie jest możliwe otworzenie tych okien.',
      answers: [
        { answer: 'disse',   next: 'af2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    af2: {
      msg:        'Det er ikke mulig å åpne disse vinduene.',
      trans:      'Nie jest możliwe otworzenie tych okien.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ag1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> vaskemaskinen virker ikke.',
      trans:      'Ta pralka nie działa.',
      answers: [
        { answer: 'denne',   next: 'ag2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ag2: {
      msg:        'Denne vaskemaskinen virker ikke.',
      trans:      'Ta pralka nie działa.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ah1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> dagen kan være pen.',
      trans:      'Ten dzień może być piękny.',
      answers: [
        { answer: 'denne',   next: 'ah2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ah2: {
      msg:        'Denne dagen kan være pen.',
      trans:      'Ten dzień może być piękny.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ai1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> krigen kan ikke avsluttes.',
      trans:      'Ta wojna nie może się skończyć.',
      answers: [
        { answer: 'denne',   next: 'ai2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ai2: {
      msg:        'Denne krigen kan ikke avsluttes.',
      trans:      'Ta wojna nie może się skończyć.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    aj1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> mannen vil ikke slutte å røyke.',
      trans:      'Ten mężczyzna nie chce rzucić palenia.',
      answers: [
        { answer: 'denne',   next: 'aj2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    aj2: {
      msg:        'Denne mannen vil ikke slutte å røyke.',
      trans:      'Ten mężczyzna nie chce rzucić palenia.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ak1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> lysene er veldig sterke.',
      trans:      'Te światła są bardzo silne.',
      answers: [
        { answer: 'disse',   next: 'ak2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    ak2: {
      msg:        'Disse lysene er veldig sterke.',
      trans:      'Te światła są bardzo silne.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    al1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> flyet flyr til Dubai.',
      trans:      'Ten samolot leci do Dubaju.',
      answers: [
        { answer: 'dette',   next: 'al2' },
        { answer: 'denne',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    al2: {
      msg:        'Dette flyet flyr til Dubai.',
      trans:      'Ten samolot leci do Dubaju.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    am1: {
      msg:        'Det er morsomt på  <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> kurset.',
      trans:      'Jest wesoło na tym kursie.',
      answers: [
        { answer: 'dette',   next: 'am2' },
        { answer: 'denne',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    am2: {
      msg:        'Det er morsomt på dette kurset.',
      trans:      'Jest wesoło na tym kursie.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    an1: {
      msg:        'Det er koselig på <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> hytta.',
      trans:      'Jest przytulnie w tej chatce.',
      answers: [
        { answer: 'denne',   next: 'an2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    an2: {
      msg:        'Det er koselig på denne hytta.',
      trans:      'Jest przytulnie w tej chatce.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ao1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> bussene er veldig raske.',
      trans:      'Te autobusy są bardzo szybkie.',
      answers: [
        { answer: 'disse',   next: 'ao2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    ao2: {
      msg:        'Disse bussene er veldig raske.',
      trans:      'Te autobusy są bardzo szybkie.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ap1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> gummistøvlene er våte inne.',
      trans:      'Te kalosze są mokre w środku.',
      answers: [
        { answer: 'disse',   next: 'ap2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    ap2: {
      msg:        'Disse gummistøvlene er våte inne.',
      trans:      'Te kalosze są mokre w środku.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ba1: {
      msg:        'Hvorfor ringer <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> kvinna fra Aftenposten til oss?',
      trans:      'Dlaczego dzwoni ta kobieta z Aftenposten do nas?',
      answers: [
        { answer: 'denne',   next: 'ba2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ba2: {
      msg:        'Hvorfor ringer denne kvinna fra Aftenposten til oss?',
      trans:      'Dlaczego dzwoni ta kobieta z Aftenposten do nas?',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    bb1: {
      msg:        'Hvor kan jeg legge <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> pakkene?',
      trans:      'Gdzie mogę położyć te paczki?',
      answers: [
        { answer: 'disse',   next: 'bb2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    bb2: {
      msg:        'Hvor kan jeg legge disse pakkene?',
      trans:      'Gdzie mogę położyć te paczki?',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    bc1: {
      msg:        'Hvem er sjefen for <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> firmaet?',
      trans:      'Gdzie jest szef tej firmy?',
      answers: [
        { answer: 'dette',   next: 'bc2' },
        { answer: 'disse',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    bc2: {
      msg:        'Hvem er sjefen for dette firmaet?',
      trans:      'Gdzie jest szef tej firmy?',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    bd1: {
      msg:        'Hva gjør <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> hunden her?',
      trans:      'Co robi ten pies tutaj?',
      answers: [
        { answer: 'denne',   next: 'bd2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    bd2: {
      msg:        'Hva gjør denne hunden her?',
      trans:      'Co robi ten pies tutaj?',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    }


  };


  this.end = {

    end1: {
      msg: 'END'/*,
      startTime: 0,
      stopTime: 0*/
    }

  };



}
</script>
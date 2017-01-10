<script>
function LasAudioData() {

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
      answers: [
        { answer: 'denne',   next: 'aa2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    aa2: {
      msg:        'Hvorfor står denne tigeren foran Oslo S?',
//      startTime:  0,
//      stopTime:   2,
      autoNext:   'RANDOM'
    },


    ab1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> jentene spiser her hver dag.',
      answers: [
        { answer: 'disse',   next: 'aa2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    ab2: {
      msg:        'Disse jentene spiser her hver dag.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ac1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> huset er ikke til salgs.',
      answers: [
        { answer: 'dette',   next: 'ac2' },
        { answer: 'denne',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ac2: {
      msg:        'Dette huset er ikke til salgs.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ad1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> krydderet kommer fra Bangladesh.',
      answers: [
        { answer: 'dette',   next: 'ad2' },
        { answer: 'denne',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ad2: {
      msg:        'Dette krydderet kommer fra Bangladesh.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ae1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> roboten kan snakke med deg.',
      answers: [
        { answer: 'denne',   next: 'ae2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ae2: {
      msg:        'Denne roboten kan snakke med deg.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    af1: {
      msg:        'Det er ikke mulig å åpne  <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> vinduene.',
      answers: [
        { answer: 'disse',   next: 'af2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    af2: {
      msg:        'Det er ikke mulig å åpne disse vinduene.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ag1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> vaskemaskinen virker ikke.',
      answers: [
        { answer: 'denne',   next: 'ag2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ag2: {
      msg:        'Denne vaskemaskinen virker ikke.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ah1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> dagen kan være pen.',
      answers: [
        { answer: 'denne',   next: 'ah2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ah2: {
      msg:        'Denne dagen kan være pen.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ai1: {
      msg:        ' <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> krigen kan ikke slutte.',
      answers: [
        { answer: 'denne',   next: 'ai2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ai2: {
      msg:        'Denne krigen kan ikke slutte.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    aj1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> mannen vil ikke slutte å røyke.',
      answers: [
        { answer: 'denne',   next: 'aj2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    aj2: {
      msg:        'Denne mannen vil ikke slutte å røyke.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ak1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> lysene er veldig sterke.',
      answers: [
        { answer: 'disse',   next: 'ak2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    ak2: {
      msg:        'Disse lysene er veldig sterke.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    al1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> flyet flyr til Dubai.',
      answers: [
        { answer: 'dette',   next: 'al2' },
        { answer: 'denne',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    al2: {
      msg:        'Dette flyet flyr til Dubai.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    am1: {
      msg:        'Det er morsomt på  <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> kurset.',
      answers: [
        { answer: 'dette',   next: 'am2' },
        { answer: 'denne',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    am2: {
      msg:        'Det er morsomt på dette kurset.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    an1: {
      msg:        'Det er koselig på <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> hytta.',
      answers: [
        { answer: 'denne',   next: 'an2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    an2: {
      msg:        'Det er koselig på denne hytta.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ao1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> bussene er veldig raske.',
      answers: [
        { answer: 'disse',   next: 'ao2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    ao2: {
      msg:        'Disse bussene er veldig raske.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ap1: {
      msg:        '<span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> gummistøvlene er våte inne.',
      answers: [
        { answer: 'disse',   next: 'ap2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    ap2: {
      msg:        'Disse gummistøvlene er våte inne.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ba1: {
      msg:        'Hvorfor ringer <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> kvinna fra Aftenposten?',
      answers: [
        { answer: 'denne',   next: 'ba2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    ba2: {
      msg:        'Hvorfor ringer denne kvinna fra Aftenposten?',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    bb1: {
      msg:        'Hvor kan jeg legge <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> pakkene?',
      answers: [
        { answer: 'disse',   next: 'bb2' },
        { answer: 'dette',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    bb2: {
      msg:        'Hvor kan jeg legge disse pakkene?',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    bc1: {
      msg:        'Hvem er sjefen i <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> firmaet?',
      answers: [
        { answer: 'dette',   next: 'bc2' },
        { answer: 'disse',   wrong: true },
        { answer: 'denne',   wrong: true }
      ]
    },
    bc2: {
      msg:        'Hvem er sjefen i dette firmaet?',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    bd1: {
      msg:        'Hva gjør <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> hunden her?',
      answers: [
        { answer: 'denne',   next: 'bd2' },
        { answer: 'dette',   wrong: true },
        { answer: 'disse',   wrong: true }
      ]
    },
    bd2: {
      msg:        'Hva gjør denne hunden her?',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    }


  };


  this.end = {

    end1: {
      msg: 'END',
      startTime: 0,
      stopTime: 0
    }

  };



}
</script>
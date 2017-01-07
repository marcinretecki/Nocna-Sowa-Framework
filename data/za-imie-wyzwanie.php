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
      msg:        'Załóż słuchawki i usiądź wygodnie.<br />Gdy będziesz gotowy, naciśnij <i>play</i>.',
      autoNext:   'ENDINTRO'/*,
      more: { startTime: 0, stopTime: 26 }*/
    }
  };


  this.chat = {

    aa1: {
      msg:        'Politikerne vet ikke hvor pengene er.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er overraskede.',
      answers: [
        { answer: 'de',   next: 'aa2' },
        { answer: 'den',   wrong: true },
        { answer: 'han',   wrong: true }
      ]
    },
    aa2: {
      msg:        'Politikerne vet ikke hvor pengene er.<br />De er overraskede.',
//      startTime:  0,
//      stopTime:   2,
      autoNext:   'RANDOM'
    },


    ab1: {
      msg:        'Naboene vil bo på landet.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er 80 år gamle.',
      answers: [
        { answer: 'de',   next: 'ab2' },
        { answer: 'den',   wrong: true },
        { answer: 'hun',   wrong: true }
      ]
    },
    ab2: {
      msg:        'Naboene vil bo på landet.<br />De er 80 år gamle.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ac1: {
      msg:        'Tom ser etter en ring til kjæresta.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> heter Anne.',
      answers: [
        { answer: 'hun',   next: 'ac2' },
        { answer: 'de',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    ac2: {
      msg:        'Tom ser etter en ring til kjæresta.<br />Hun heter Anne.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ad1: {
      msg:        'Jesus går på vannet.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> kan mye.',
      answers: [
        { answer: 'han',   next: 'ad2' },
        { answer: 'det',   wrong: true },
        { answer: 'hun',   wrong: true }
      ]
    },
    ad2: {
      msg:        'Jesus går på vannet.<br />Han kan mye.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    af1: {
      msg:        'Barna lærer å bruke mobilen.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er flinke.',
      answers: [
        { answer: 'de',   next: 'af2' },
        { answer: 'det',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    af2: {
      msg:        'Barna lærer å bruke mobilen. De er flinke.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ag1: {
      msg:        'Henrik Ibsen skriver et drama.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> trenger stillhet.',
      answers: [
        { answer: 'han',   next: 'ag2' },
        { answer: 'hun',   wrong: true },
        { answer: 'vi',   wrong: true }
      ]
    },
    ag2: {
      msg:        'Henrik Ibsen skriver et drama.<br />Han trenger stillhet.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ah1: {
      msg:        'Edison setter inn ei lyspære.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> skifter dem ofte.',
      answers: [
        { answer: 'han',   next: 'ah2' },
        { answer: 'det',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    ah2: {
      msg:        'Edison setter inn ei lyspære.<br />Han skifter dem ofte.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ai1: {
      msg:        'Maleren maler veggen.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> blir kunstner.',
      answers: [
        { answer: 'han',   next: 'ai2' },
        { answer: 'det',   wrong: true },
        { answer: 'dere',   wrong: true }
      ]
    },
    ai2: {
      msg:        'Maleren maler veggen.<br />Han blir kunstner.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    aj1: {
      msg:        'Elvis synger for alle.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> lever fortsatt.',
      answers: [
        { answer: 'han',   next: 'aj2' },
        { answer: 'hun',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    aj2: {
      msg:        'Elvis synger for alle.<br />Han lever fortsatt.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ah1: {
      msg:        'Pamela soler seg på stranda.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> har ei rød badedrakt.',
      answers: [
        { answer: 'hun',   next: 'ah2' },
        { answer: 'det',   wrong: true },
        { answer: 'han',   wrong: true }
      ]
    },
    ah2: {
      msg:        'Pamela soler seg på stranda.<br />Hun har ei rød badedrakt.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ak1: {
      msg:        'Amundsen kan ikke komme tilbake hjem.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er noe sted i nord.',
      answers: [
        { answer: 'han',   next: 'ak2' },
        { answer: 'jeg',   wrong: true },
        { answer: 'du',   wrong: true }
      ]
    },
    ak2: {
      msg:        'Amundsen kan ikke komme tilbake hjem.<br />Han er noe sted i nord.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    al1: {
      msg:        'Skłodowska jobber i laboratoriet.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er den første kvinnelige professoren.',
      answers: [
        { answer: 'hun',   next: 'al2' },
        { answer: 'han',   wrong: true },
        { answer: 'henne',   wrong: true }
      ]
    },
    al2: {
      msg:        'Skłodowska jobber i laboratoriet.<br />Hun er den første kvinnelige professoren.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    am1: {
      msg:        'Folk streiker på gata.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er sinte..',
      answers: [
        { answer: 'de',   next: 'am2' },
        { answer: 'den',   wrong: true },
        { answer: 'han',   wrong: true }
      ]
    },
    am2: {
      msg:        'Folk streiker på gata.<br />De er sinte.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    an1: {
      msg:        'Jeg og Małysz spiser bananer.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> liker frukt.',
      answers: [
        { answer: 'vi',   next: 'an2' },
        { answer: 'jeg',   wrong: true },
        { answer: 'han',   wrong: true }
      ]
    },
    an2: {
      msg:        'Jeg og Małysz spiser bananer.<br />Vi liker frukt.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ba1: {
      msg:        'Hvor er Chuck Norris?<br/> Hvor er <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span>?',
      answers: [
        { answer: 'han',   next: 'ba2' },
        { answer: 'hun',   wrong: true },
        { answer: 'du',   wrong: true }
      ]
    },
    ba2: {
      msg:        'Hvor er Chuck Norris?<br/> Hvor er han?',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    bb1: {
      msg:        'Hva gjør Scarlett?<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> sitter ved vinduet.',
      answers: [
        { answer: 'hun',   next: 'bb2' },
        { answer: 'han',   wrong: true },
        { answer: 'jeg',   wrong: true }
      ]
    },
    bb2: {
      msg:        'Hva gjør Scarlett?<br /> Hun sitter ved vinduet.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    bc1: {
      msg:        'Lager Penelope og Woody en film?<br />Ja, <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> liker å jobbe sammen.',
      answers: [
        { answer: 'de',   next: 'bc2' },
        { answer: 'hun',   wrong: true },
        { answer: 'han',   wrong: true }
      ]
    },
    bc2: {
      msg:        'Lager Penelope og Woody en film?<br />Ja, de liker å jobbe sammen.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    bd1: {
      msg:        'Kommer Marilyn Monroe i dag?<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> kan ikke.',
      answers: [
        { answer: 'hun',   next: 'bd2' },
        { answer: 'han',   wrong: true },
        { answer: 'dere',   wrong: true }
      ]
    },
    bd2: {
      msg:        'Kommer Marilyn Monroe i dag?<br />Hun kan ikke.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    }/*,


    ao1: {
      msg:        '<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span>.',
      answers: [
        { answer: '',   next: 'ao2' },
        { answer: '',   wrong: true },
        { answer: '',   wrong: true }
      ]
    },
    ao2: {
      msg:        '',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    }*/

  };


  this.end = {

    end1: {
      msg: 'END',
      //startTime: 0,
      //stopTime: 0
    }

  };



}
</script>
<script>
function LasAudioData() {

  this.testNotes = [
    'nie ma zakończenia',
    'nie ma audio'
  ];


  this.intro = {
    a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie.<br />Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO'/*,
      more: {
        startTime: 0,
        duration:   1.5,
      }*/
    }
  };


  this.chat = {

    aa1: {
      msg:        'Politikerne vet ikke hvor pengene er.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er overraskede.',
      trans:      'Politycy nie wiedzą gdzie są pieniądze. <br />Oni są zaskoczeni.',
      answers: [
        { answer: 'de',   next: 'aa2' },
        { answer: 'den',   wrong: true },
        { answer: 'han',   wrong: true }
      ]
    },
    aa2: {
      msg:        'Politikerne vet ikke hvor pengene er.<br />De er overraskede.',
      trans:      'Politycy nie wiedzą gdzie są pieniądze. <br />Oni są zaskoczeni.',
      startTime:  0,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ab1: {
      msg:        'Naboene vil bo på landet.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er 80 år gamle.',
      trans:      'Sąsiedzi chcą mieszkać na wsi. <br />Oni mają 80 lat.',
      answers: [
        { answer: 'de',   next: 'ab2' },
        { answer: 'den',   wrong: true },
        { answer: 'hun',   wrong: true }
      ]
    },
    ab2: {
      msg:        'Naboene vil bo på landet.<br />De er 80 år gamle.',
      trans:      'Sąsiedzi chcą mieszkać na wsi. <br />Oni mają 80 lat.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ac1: {
      msg:        'Tom ser etter en ring til kjæresta.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> heter Anne.',
      trans:      'Tom szuka pierścionka dla dziewczyny. <br />Ona nazywa się Anne.',
      answers: [
        { answer: 'hun',   next: 'ac2' },
        { answer: 'de',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    ac2: {
      msg:        'Tom ser etter en ring til kjæresta.<br />Hun heter Anne.',
      trans:      'Tom szuka pierścionka dla dziewczyny. <br />Ona nazywa się Anne.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ad1: {
      msg:        'Jesus går på vannet.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> kan mye.',
      trans:      'Jezus chodzi po wodzie. <br />On może/potrafi dużo.',
      answers: [
        { answer: 'han',   next: 'ad2' },
        { answer: 'det',   wrong: true },
        { answer: 'hun',   wrong: true }
      ]
    },
    ad2: {
      msg:        'Jesus går på vannet.<br />Han kan mye.',
      trans:      'Jezus chodzi po wodzie. <br />On może/potrafi dużo.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    af1: {
      msg:        'Barna lærer å bruke mobilen.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er flinke.',
      trans:      'Dzieci uczą się używać telefon. <br />One są zdolne.',
      answers: [
        { answer: 'de',   next: 'af2' },
        { answer: 'det',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    af2: {
      msg:        'Barna lærer å bruke mobilen. De er flinke.',
      trans:      'Dzieci uczą się używać telefon. <br />One są zdolne.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ag1: {
      msg:        'Henrik Ibsen skriver et drama.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> trenger stillhet.',
      trans:      'Henrik Ibsen pisze dramat. <br />On potrzebuje ciszy.',
      answers: [
        { answer: 'han',   next: 'ag2' },
        { answer: 'hun',   wrong: true },
        { answer: 'vi',   wrong: true }
      ]
    },
    ag2: {
      msg:        'Henrik Ibsen skriver et drama.<br />Han trenger stillhet.',
      trans:      'Henrik Ibsen pisze dramat. <br />On potrzebuje ciszy.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ah1: {
      msg:        'Edison setter inn ei lyspære.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> skifter dem ofte.',
      trans:      'Edison wkręca żarówkę. <br />On wymienia je często.',
      answers: [
        { answer: 'han',   next: 'ah2' },
        { answer: 'det',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    ah2: {
      msg:        'Edison setter inn ei lyspære.<br />Han skifter dem ofte.',
      trans:      'Edison wkręca żarówkę. <br />On wymienia je często.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ai1: {
      msg:        'Maleren maler veggen.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> blir kunstner.',
      trans:      'Malarz maluje ścianę. <br />On zostanie artystą.',
      answers: [
        { answer: 'han',   next: 'ai2' },
        { answer: 'det',   wrong: true },
        { answer: 'dere',   wrong: true }
      ]
    },
    ai2: {
      msg:        'Maleren maler veggen.<br />Han blir kunstner.',
      trans:      'Malarz maluje ścianę. <br />On zostanie artystą.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    aj1: {
      msg:        'Elvis synger for alle.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> lever fortsatt.',
      trans:      'Elvis śpiewa dla wszystkich. On wciąż żyje.',
      answers: [
        { answer: 'han',   next: 'aj2' },
        { answer: 'hun',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    aj2: {
      msg:        'Elvis synger for alle.<br />Han lever fortsatt.',
      trans:      'Elvis śpiewa dla wszystkich. On wciąż żyje.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ah1: {
      msg:        'Pamela soler seg på stranda.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> har ei rød badedrakt.',
      trans:      'Pamela opala się na plaży. <br />Ona ma czerwony strój kąpielowy.',
      answers: [
        { answer: 'hun',   next: 'ah2' },
        { answer: 'det',   wrong: true },
        { answer: 'han',   wrong: true }
      ]
    },
    ah2: {
      msg:        'Pamela soler seg på stranda.<br />Hun har ei rød badedrakt.',
      trans:      'Pamela opala się na plaży. <br />Ona ma czerwony strój kąpielowy.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ak1: {
      msg:        'Amundsen kan ikke komme tilbake hjem.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er noe sted i nord.',
      trans:      'Amundsen nie może wrócić do domu. <br />On jest gdzieś na północy.',
      answers: [
        { answer: 'han',   next: 'ak2' },
        { answer: 'jeg',   wrong: true },
        { answer: 'du',   wrong: true }
      ]
    },
    ak2: {
      msg:        'Amundsen kan ikke komme tilbake hjem.<br />Han er noe sted i nord.',
      trans:      'Amundsen nie może wrócić do domu. <br />On jest gdzieś na północy.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    al1: {
      msg:        'Skłodowska jobber i laboratoriet.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er den første kvinnelige professoren.',
      trans:      'Skłodowska pracuje w laboratorium. <br />Ona jest pierwszą kobietą profesorem.',
      answers: [
        { answer: 'hun',   next: 'al2' },
        { answer: 'han',   wrong: true },
        { answer: 'henne',   wrong: true }
      ]
    },
    al2: {
      msg:        'Skłodowska jobber i laboratoriet.<br />Hun er den første kvinnelige professoren.',
      trans:      'Skłodowska pracuje w laboratorium. <br />Ona jest pierwszą kobietą profesorem.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    am1: {
      msg:        'Folk streiker på gata.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er sinte.',
      trans:      'Ludzie strajkują na ulicy. <br />Oni są źli.',
      answers: [
        { answer: 'de',   next: 'am2' },
        { answer: 'den',   wrong: true },
        { answer: 'han',   wrong: true }
      ]
    },
    am2: {
      msg:        'Folk streiker på gata.<br />De er sinte.',
      trans:      'Ludzie strajkują na ulicy. <br />Oni są źli.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ba1: {
      msg:        'Hvor er Chuck Norris? <br/> Hvor er <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span>?',
      trans:      'Gdzie jest Chuck Norris? <br />Gdzie on jest?',
      answers: [
        { answer: 'han',   next: 'ba2' },
        { answer: 'hun',   wrong: true },
        { answer: 'du',   wrong: true }
      ]
    },
    ba2: {
      msg:        'Hvor er Chuck Norris? <br/> Hvor er han?',
      trans:      'Gdzie jest Chuck Norris? <br />Gdzie on jest?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    bb1: {
      msg:        'Hva gjør Scarlett?<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> sitter ved vinduet.',
      trans:      'Co robi Scarlett? <br />Ona siedzi przy oknie.',
      answers: [
        { answer: 'hun',   next: 'bb2' },
        { answer: 'han',   wrong: true },
        { answer: 'jeg',   wrong: true }
      ]
    },
    bb2: {
      msg:        'Hva gjør Scarlett?<br /> Hun sitter ved vinduet.',
      trans:      'Co robi Scarlett? <br />Ona siedzi przy oknie.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    bc1: {
      msg:        'Lager Penelope og Woody en film?<br />Ja, <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> liker å jobbe sammen.',
      trans:      'Czy Penelope i Woody robią film? <br />Tak, oni lubią razem pracować.',
      answers: [
        { answer: 'de',   next: 'bc2' },
        { answer: 'hun',   wrong: true },
        { answer: 'han',   wrong: true }
      ]
    },
    bc2: {
      msg:        'Lager Penelope og Woody en film?<br />Ja, de liker å jobbe sammen.',
      trans:      'Czy Penelope i Woody robią film? <br />Tak, oni lubią razem pracować.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    bd1: {
      msg:        'Kommer Marilyn Monroe i dag?<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> kan ikke.',
      trans:      'Czy Marilyn Monroe przyjdzie dziś? <br />Ona nie może.',
      answers: [
        { answer: 'hun',   next: 'bd2' },
        { answer: 'han',   wrong: true },
        { answer: 'dere',   wrong: true }
      ]
    },
    bd2: {
      msg:        'Kommer Marilyn Monroe i dag?<br />Hun kan ikke.',
      trans:      'Czy Marilyn Monroe przyjdzie dziś? <br />Ona nie może.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ba1: {
      msg:        'Gutten spiser fort. <br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er veldig sulten.',
      trans:      'Chłopiec je szybko. <br />On jest bardzo głodny.',
      answers: [
        { answer: 'han',   next: 'ba2' },
        { answer: 'hun',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    ba2: {
      msg:        'Gutten spiser fort. <br />Han er veldig sulten.',
      trans:      'Chłopiec je szybko. <br />On jest bardzo głodny.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    bb1: {
      msg:        'Jeg og kona mi kjøper en sofa. <br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> må velge fargen.',
      trans:      'Ja i moja żona kupujemy sofę. <br />Musimy wybrać kolor.',
      answers: [
        { answer: 'vi',   next: 'bb2' },
        { answer: 'dere',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    bb2: {
      msg:        'Jeg og kona mi kjøper en sofa. <br />Vi må velge fargen.',
      trans:      'Ja i moja żona kupujemy sofę. <br />Musimy wybrać kolor.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    bc1: {
      msg:        'Barna spiser vafler med brunost og syltetøy. <br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> liker søtsaker.',
      trans:      'Dzieci jedzą gofry z brązowym serem i dżemem. <br />One lubią słodycze.',
      answers: [
        { answer: 'de',   next: 'bc2' },
        { answer: 'vi',   wrong: true },
        { answer: 'han',   wrong: true }
      ]
    },
    bc2: {
      msg:        'Barna spiser vafler med brunost og syltetøy. <br />De liker søtsaker.',
      trans:      'Dzieci jedzą gofry z brązowym serem i dżemem. <br />One lubią słodycze.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    }

  };


  this.end = {

    end1: {
      msg:        'END',
      startTime:  0,
      duration:   1.5
    }

  };



}
</script>
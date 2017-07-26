<script>
function LasData() {

  this.testNotes = [
    'nie ma zakończenia',
    'nie ma audio'
  ];


  this.intro = {
    _a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie.<br />Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO'/*,
      more: {
        startTime: 0,
        duration:   1.5,
      }*/
    }
  };


  this.chat = {

    _aa1: {
      msg:        'Politikerne vet ikke hvor pengene er.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er overraskede.',
      trans:      'Politycy nie wiedzą gdzie są pieniądze. <br />Oni są zaskoczeni.',
      answers: [
        { answer: 'de',   next: '_aa2', score: 'correct' },
        { answer: 'den',   score: 'wrong' },
        { answer: 'han',   score: 'wrong' }
      ]
    },
    _aa2: {
      msg:        'Politikerne vet ikke hvor pengene er.<br />De er overraskede.',
      trans:      'Politycy nie wiedzą gdzie są pieniądze. <br />Oni są zaskoczeni.',
      startTime:  0,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ab1: {
      msg:        'Naboene vil bo på landet.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er 80 år gamle.',
      trans:      'Sąsiedzi chcą mieszkać na wsi. <br />Oni mają 80 lat.',
      answers: [
        { answer: 'de',   next: '_ab2', score: 'correct' },
        { answer: 'den',   score: 'wrong' },
        { answer: 'hun',   score: 'wrong' }
      ]
    },
    _ab2: {
      msg:        'Naboene vil bo på landet.<br />De er 80 år gamle.',
      trans:      'Sąsiedzi chcą mieszkać na wsi. <br />Oni mają 80 lat.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ac1: {
      msg:        'Tom ser etter en ring til kjæresta.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> heter Anne.',
      trans:      'Tom szuka pierścionka dla dziewczyny. <br />Ona nazywa się Anne.',
      answers: [
        { answer: 'hun',   next: '_ac2', score: 'correct' },
        { answer: 'de',   score: 'wrong' },
        { answer: 'den',   score: 'wrong' }
      ]
    },
    _ac2: {
      msg:        'Tom ser etter en ring til kjæresta.<br />Hun heter Anne.',
      trans:      'Tom szuka pierścionka dla dziewczyny. <br />Ona nazywa się Anne.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ad1: {
      msg:        'Jesus går på vannet.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> kan mye.',
      trans:      'Jezus chodzi po wodzie. <br />On może/potrafi dużo.',
      answers: [
        { answer: 'han',   next: '_ad2', score: 'correct' },
        { answer: 'det',   score: 'wrong' },
        { answer: 'hun',   score: 'wrong' }
      ]
    },
    _ad2: {
      msg:        'Jesus går på vannet.<br />Han kan mye.',
      trans:      'Jezus chodzi po wodzie. <br />On może/potrafi dużo.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _af1: {
      msg:        'Barna lærer å bruke mobilen.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er flinke.',
      trans:      'Dzieci uczą się używać telefon. <br />One są zdolne.',
      answers: [
        { answer: 'de',   next: '_af2', score: 'correct' },
        { answer: 'det',   score: 'wrong' },
        { answer: 'den',   score: 'wrong' }
      ]
    },
    _af2: {
      msg:        'Barna lærer å bruke mobilen. De er flinke.',
      trans:      'Dzieci uczą się używać telefon. <br />One są zdolne.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ag1: {
      msg:        'Henrik Ibsen skriver et drama.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> trenger stillhet.',
      trans:      'Henrik Ibsen pisze dramat. <br />On potrzebuje ciszy.',
      answers: [
        { answer: 'han',   next: '_ag2', score: 'correct' },
        { answer: 'hun',   score: 'wrong' },
        { answer: 'vi',   score: 'wrong' }
      ]
    },
    _ag2: {
      msg:        'Henrik Ibsen skriver et drama.<br />Han trenger stillhet.',
      trans:      'Henrik Ibsen pisze dramat. <br />On potrzebuje ciszy.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ah1: {
      msg:        'Edison setter inn ei lyspære.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> skifter dem ofte.',
      trans:      'Edison wkręca żarówkę. <br />On wymienia je często.',
      answers: [
        { answer: 'han',   next: '_ah2', score: 'correct' },
        { answer: 'det',   score: 'wrong' },
        { answer: 'de',   score: 'wrong' }
      ]
    },
    _ah2: {
      msg:        'Edison setter inn ei lyspære.<br />Han skifter dem ofte.',
      trans:      'Edison wkręca żarówkę. <br />On wymienia je często.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ai1: {
      msg:        'Maleren maler veggen.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> blir kunstner.',
      trans:      'Malarz maluje ścianę. <br />On zostanie artystą.',
      answers: [
        { answer: 'han',   next: '_ai2', score: 'correct' },
        { answer: 'det',   score: 'wrong' },
        { answer: 'dere',   score: 'wrong' }
      ]
    },
    _ai2: {
      msg:        'Maleren maler veggen.<br />Han blir kunstner.',
      trans:      'Malarz maluje ścianę. <br />On zostanie artystą.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _aj1: {
      msg:        'Elvis synger for alle.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> lever fortsatt.',
      trans:      'Elvis śpiewa dla wszystkich. On wciąż żyje.',
      answers: [
        { answer: 'han',   next: '_aj2', score: 'correct' },
        { answer: 'hun',   score: 'wrong' },
        { answer: 'den',   score: 'wrong' }
      ]
    },
    _aj2: {
      msg:        'Elvis synger for alle.<br />Han lever fortsatt.',
      trans:      'Elvis śpiewa dla wszystkich. On wciąż żyje.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ah1: {
      msg:        'Pamela soler seg på stranda.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> har ei rød badedrakt.',
      trans:      'Pamela opala się na plaży. <br />Ona ma czerwony strój kąpielowy.',
      answers: [
        { answer: 'hun',   next: '_ah2', score: 'correct' },
        { answer: 'det',   score: 'wrong' },
        { answer: 'han',   score: 'wrong' }
      ]
    },
    _ah2: {
      msg:        'Pamela soler seg på stranda.<br />Hun har ei rød badedrakt.',
      trans:      'Pamela opala się na plaży. <br />Ona ma czerwony strój kąpielowy.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ak1: {
      msg:        'Amundsen kan ikke komme tilbake hjem.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er noe sted i nord.',
      trans:      'Amundsen nie może wrócić do domu. <br />On jest gdzieś na północy.',
      answers: [
        { answer: 'han',   next: '_ak2', score: 'correct' },
        { answer: 'jeg',   score: 'wrong' },
        { answer: 'du',   score: 'wrong' }
      ]
    },
    _ak2: {
      msg:        'Amundsen kan ikke komme tilbake hjem.<br />Han er noe sted i nord.',
      trans:      'Amundsen nie może wrócić do domu. <br />On jest gdzieś na północy.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _al1: {
      msg:        'Skłodowska jobber i laboratoriet.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er den første kvinnelige professoren.',
      trans:      'Skłodowska pracuje w laboratorium. <br />Ona jest pierwszą kobietą profesorem.',
      answers: [
        { answer: 'hun',   next: '_al2', score: 'correct' },
        { answer: 'han',   score: 'wrong' },
        { answer: 'henne',   score: 'wrong' }
      ]
    },
    _al2: {
      msg:        'Skłodowska jobber i laboratoriet.<br />Hun er den første kvinnelige professoren.',
      trans:      'Skłodowska pracuje w laboratorium. <br />Ona jest pierwszą kobietą profesorem.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _am1: {
      msg:        'Folk streiker på gata.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er sinte.',
      trans:      'Ludzie strajkują na ulicy. <br />Oni są źli.',
      answers: [
        { answer: 'de',   next: '_am2', score: 'correct' },
        { answer: 'den',   score: 'wrong' },
        { answer: 'han',   score: 'wrong' }
      ]
    },
    _am2: {
      msg:        'Folk streiker på gata.<br />De er sinte.',
      trans:      'Ludzie strajkują na ulicy. <br />Oni są źli.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ba1: {
      msg:        'Hvor er Chuck Norris? <br/> Hvor er <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span>?',
      trans:      'Gdzie jest Chuck Norris? <br />Gdzie on jest?',
      answers: [
        { answer: 'han',   next: '_ba2', score: 'correct' },
        { answer: 'hun',   score: 'wrong' },
        { answer: 'du',   score: 'wrong' }
      ]
    },
    _ba2: {
      msg:        'Hvor er Chuck Norris? <br/> Hvor er han?',
      trans:      'Gdzie jest Chuck Norris? <br />Gdzie on jest?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bb1: {
      msg:        'Hva gjør Scarlett?<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> sitter ved vinduet.',
      trans:      'Co robi Scarlett? <br />Ona siedzi przy oknie.',
      answers: [
        { answer: 'hun',   next: '_bb2', score: 'correct' },
        { answer: 'han',   score: 'wrong' },
        { answer: 'jeg',   score: 'wrong' }
      ]
    },
    _bb2: {
      msg:        'Hva gjør Scarlett?<br /> Hun sitter ved vinduet.',
      trans:      'Co robi Scarlett? <br />Ona siedzi przy oknie.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bc1: {
      msg:        'Lager Penelope og Woody en film?<br />Ja, <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> liker å jobbe sammen.',
      trans:      'Czy Penelope i Woody robią film? <br />Tak, oni lubią razem pracować.',
      answers: [
        { answer: 'de',   next: '_bc2', score: 'correct' },
        { answer: 'hun',   score: 'wrong' },
        { answer: 'han',   score: 'wrong' }
      ]
    },
    _bc2: {
      msg:        'Lager Penelope og Woody en film?<br />Ja, de liker å jobbe sammen.',
      trans:      'Czy Penelope i Woody robią film? <br />Tak, oni lubią razem pracować.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bd1: {
      msg:        'Kommer Marilyn Monroe i dag?<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> kan ikke.',
      trans:      'Czy Marilyn Monroe przyjdzie dziś? <br />Ona nie może.',
      answers: [
        { answer: 'hun',   next: '_bd2', score: 'correct' },
        { answer: 'han',   score: 'wrong' },
        { answer: 'dere',   score: 'wrong' }
      ]
    },
    _bd2: {
      msg:        'Kommer Marilyn Monroe i dag?<br />Hun kan ikke.',
      trans:      'Czy Marilyn Monroe przyjdzie dziś? <br />Ona nie może.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ba1: {
      msg:        'Gutten spiser fort. <br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er veldig sulten.',
      trans:      'Chłopiec je szybko. <br />On jest bardzo głodny.',
      answers: [
        { answer: 'han',   next: '_ba2', score: 'correct' },
        { answer: 'hun',   score: 'wrong' },
        { answer: 'de',   score: 'wrong' }
      ]
    },
    _ba2: {
      msg:        'Gutten spiser fort. <br />Han er veldig sulten.',
      trans:      'Chłopiec je szybko. <br />On jest bardzo głodny.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bb1: {
      msg:        'Jeg og kona mi kjøper en sofa. <br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> må velge fargen.',
      trans:      'Ja i moja żona kupujemy sofę. <br />Musimy wybrać kolor.',
      answers: [
        { answer: 'vi',   next: '_bb2', score: 'correct' },
        { answer: 'dere',   score: 'wrong' },
        { answer: 'de',   score: 'wrong' }
      ]
    },
    _bb2: {
      msg:        'Jeg og kona mi kjøper en sofa. <br />Vi må velge fargen.',
      trans:      'Ja i moja żona kupujemy sofę. <br />Musimy wybrać kolor.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bc1: {
      msg:        'Barna spiser vafler med brunost og syltetøy. <br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> liker søtsaker.',
      trans:      'Dzieci jedzą gofry z brązowym serem i dżemem. <br />One lubią słodycze.',
      answers: [
        { answer: 'de',   next: '_bc2', score: 'correct' },
        { answer: 'vi',   score: 'wrong' },
        { answer: 'han',   score: 'wrong' }
      ]
    },
    _bc2: {
      msg:        'Barna spiser vafler med brunost og syltetøy. <br />De liker søtsaker.',
      trans:      'Dzieci jedzą gofry z brązowym serem i dżemem. <br />One lubią słodycze.',
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
<script>
function LasData() {

  this.category = 'audio-test';   // chat|setninger|etc


  this.testNotes = [
    'nie ma audio',
  ];


  this.intro = {
    _intro1: {
      msg:          'Załóż słuchawki, jeśli chcesz. #emoji-1f3a7;',
      autoNext:     '_intro2'
    },
    _intro2: {
      msg:          '<p>Uzupełnij zdanie  poprawnym zaimkiem osobowym.</p>' + '<p>Następnie powtórz całość na głos.</p>',
      autoNext:     'ENDINTRO'
    },
  };


  this.chat = {

    _aa1: {
      msg:        '<i>Politikerne vet ikke hvor pengene er.<br />#fill-space; er overraskede.</i>',
      trans:      'Politycy nie wiedzą gdzie są pieniądze. <br />Oni są zaskoczeni.',
      answers: [
        { answer: '<i>de</i>',  score: 'correct',   next: '_aa2' },
        { answer: '<i>den</i>', score: 'wrong' },
        { answer: '<i>han</i>', score: 'wrong' }
      ]
    },
    _aa2: {
      msg:        '<i>Politikerne vet ikke hvor pengene er.<br /><span class="mark mark--green">De</span> er overraskede.</i>',
      trans:      'Politycy nie wiedzą gdzie są pieniądze. <br />Oni są zaskoczeni.',
      startTime:  0,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ab1: {
      msg:        '<i>Naboene vil bo på landet.<br />#fill-space; er 80 år gamle.</i>',
      trans:      'Sąsiedzi chcą mieszkać na wsi. <br />Oni mają 80 lat.',
      answers: [
        { answer: '<i>de</i>',  score: 'correct',   next: '_ab2' },
        { answer: '<i>den</i>', score: 'wrong' },
        { answer: '<i>hun</i>', score: 'wrong' }
      ]
    },
    _ab2: {
      msg:        '<i>Naboene vil bo på landet.<br /><span class="mark mark--green">De</span> er 80 år gamle.</i>',
      trans:      'Sąsiedzi chcą mieszkać na wsi. <br />Oni mają 80 lat.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ac1: {
      msg:        '<i>Tom ser etter en ring til kjæresta.<br />#fill-space; heter Anne.</i>',
      trans:      'Tom szuka pierścionka dla dziewczyny. <br />Ona nazywa się Anne.',
      answers: [
        { answer: '<i>hun</i>', score: 'correct',   next: '_ac2' },
        { answer: '<i>de</i>',  score: 'wrong' },
        { answer: '<i>den</i>', score: 'wrong' }
      ]
    },
    _ac2: {
      msg:        '<i>Tom ser etter en ring til kjæresta.<br /><span class="mark mark--green">Hun</span> heter Anne.</i>',
      trans:      'Tom szuka pierścionka dla dziewczyny. <br />Ona nazywa się Anne.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ad1: {
      msg:        '<i>Jesus går på vannet.<br />#fill-space; kan mye.</i>',
      trans:      'Jezus chodzi po wodzie. <br />On może/potrafi dużo.',
      answers: [
        { answer: '<i>han</i>', score: 'correct',   next: '_ad2' },
        { answer: '<i>det</i>', score: 'wrong' },
        { answer: '<i>hun</i>', score: 'wrong' }
      ]
    },
    _ad2: {
      msg:        '<i>Jesus går på vannet.<br /><span class="mark mark--green">Han</span> kan mye.</i>',
      trans:      'Jezus chodzi po wodzie. <br />On może/potrafi dużo.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _af1: {
      msg:        '<i>Barna lærer å bruke mobilen.<br />#fill-space; er flinke.</i>',
      trans:      'Dzieci uczą się używać telefon. <br />One są zdolne.',
      answers: [
        { answer: '<i>de</i>',  score: 'correct',   next: '_af2' },
        { answer: '<i>det</i>', score: 'wrong' },
        { answer: '<i>den</i>', score: 'wrong' }
      ]
    },
    _af2: {
      msg:        '<i>Barna lærer å bruke mobilen.<br /><span class="mark mark--green">De</span> er flinke.</i>',
      trans:      'Dzieci uczą się używać telefon. <br />One są zdolne.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ag1: {
      msg:        '<i>Henrik Ibsen skriver et drama.<br />#fill-space; trenger stillhet.</i>',
      trans:      'Henrik Ibsen pisze dramat. <br />On potrzebuje ciszy.',
      answers: [
        { answer: '<i>han</i>', score: 'correct',   next: '_ag2' },
        { answer: '<i>hun</i>', score: 'wrong' },
        { answer: '<i>vi</i>',  score: 'wrong' }
      ]
    },
    _ag2: {
      msg:        '<i>Henrik Ibsen skriver et drama.<br /><span class="mark mark--green">Han</span> trenger stillhet.</i>',
      trans:      'Henrik Ibsen pisze dramat. <br />On potrzebuje ciszy.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ah1: {
      msg:        '<i>Edison setter inn ei lyspære.<br />#fill-space; skifter dem ofte.</i>',
      trans:      'Edison wkręca żarówkę. <br />On wymienia je często.',
      answers: [
        { answer: '<i>han</i>', score: 'correct',   next: '_ah2' },
        { answer: '<i>det</i>', score: 'wrong' },
        { answer: '<i>de</i>',  score: 'wrong' }
      ]
    },
    _ah2: {
      msg:        '<i>Edison setter inn ei lyspære.<br /><span class="mark mark--green">Han</span> skifter dem ofte.</i>',
      trans:      'Edison wkręca żarówkę. <br />On wymienia je często.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ai1: {
      msg:        '<i>Maleren maler veggen.<br />#fill-space; blir kunstner.</i>',
      trans:      'Malarz maluje ścianę. <br />On zostanie artystą.',
      answers: [
        { answer: '<i>han</i>',  score: 'correct',   next: '_ai2' },
        { answer: '<i>det</i>',  score: 'wrong' },
        { answer: '<i>dere</i>', score: 'wrong' }
      ]
    },
    _ai2: {
      msg:        '<i>Maleren maler veggen.<br /><span class="mark mark--green">Han</span> blir kunstner.</i>',
      trans:      'Malarz maluje ścianę. <br />On zostanie artystą.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _aj1: {
      msg:        '<i>Elvis synger for alle.<br />#fill-space; lever fortsatt.</i>',
      trans:      'Elvis śpiewa dla wszystkich.<br />On wciąż żyje.',
      answers: [
        { answer: '<i>han</i>', score: 'correct',   next: '_aj2' },
        { answer: '<i>hun</i>', score: 'wrong' },
        { answer: '<i>den</i>', score: 'wrong' }
      ]
    },
    _aj2: {
      msg:        '<i>Elvis synger for alle.<br /><span class="mark mark--green">Han</span> lever fortsatt.</i>',
      trans:      'Elvis śpiewa dla wszystkich.<br />On wciąż żyje.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ah1: {
      msg:        '<i>Pamela soler seg på stranda.<br />#fill-space; har ei rød badedrakt.</i>',
      trans:      'Pamela opala się na plaży. <br />Ona ma czerwony strój kąpielowy.',
      answers: [
        { answer: '<i>hun</i>', score: 'correct',   next: '_ah2' },
        { answer: '<i>det</i>', score: 'wrong' },
        { answer: '<i>han</i>', score: 'wrong' }
      ]
    },
    _ah2: {
      msg:        '<i>Pamela soler seg på stranda.<br /><span class="mark mark--green">Hun</span> har ei rød badedrakt.</i>',
      trans:      'Pamela opala się na plaży. <br />Ona ma czerwony strój kąpielowy.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ak1: {
      msg:        '<i>Amundsen kan ikke komme tilbake hjem.<br />#fill-space; er noe sted i nord.</i>',
      trans:      'Amundsen nie może wrócić do domu. <br />On jest gdzieś na północy.',
      answers: [
        { answer: '<i>han</i>', score: 'correct',   next: '_ak2' },
        { answer: '<i>jeg</i>', score: 'wrong' },
        { answer: '<i>du</i>',  score: 'wrong' }
      ]
    },
    _ak2: {
      msg:        '<i>Amundsen kan ikke komme tilbake hjem.<br /><span class="mark mark--green">Han</span> er noe sted i nord.</i>',
      trans:      'Amundsen nie może wrócić do domu. <br />On jest gdzieś na północy.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _al1: {
      msg:        '<i>Skłodowska jobber i laboratoriet.<br />#fill-space; er den første kvinnelige professoren.</i>',
      trans:      'Skłodowska pracuje w laboratorium. <br />Ona jest pierwszą kobietą profesorem.',
      answers: [
        { answer: '<i>hun</i>',   score: 'correct',   next: '_al2' },
        { answer: '<i>han</i>',   score: 'wrong' },
        { answer: '<i>henne</i>', score: 'wrong' }
      ]
    },
    _al2: {
      msg:        '<i>Skłodowska jobber i laboratoriet.<br /><span class="mark mark--green">Hun</span> er den første kvinnelige professoren.</i>',
      trans:      'Skłodowska pracuje w laboratorium. <br />Ona jest pierwszą kobietą profesorem.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _am1: {
      msg:        '<i>Folk streiker på gata.<br />#fill-space; er sinte.</i>',
      trans:      'Ludzie strajkują na ulicy. <br />Oni są źli.',
      answers: [
        { answer: '<i>de</i>',  score: 'correct',   next: '_am2' },
        { answer: '<i>den</i>', score: 'wrong' },
        { answer: '<i>han</i>', score: 'wrong' }
      ]
    },
    _am2: {
      msg:        '<i>Folk streiker på gata.<br /><span class="mark mark--green">De</span> er sinte.</i>',
      trans:      'Ludzie strajkują na ulicy. <br />Oni są źli.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ba1: {
      msg:        '<i>Hvor er Chuck Norris? <br /> Hvor er #fill-space;?</i>',
      trans:      'Gdzie jest Chuck Norris? <br />Gdzie on jest?',
      answers: [
        { answer: '<i>han</i>', score: 'correct',   next: '_ba2' },
        { answer: '<i>hun</i>', score: 'wrong' },
        { answer: '<i>du</i>',  score: 'wrong' }
      ]
    },
    _ba2: {
      msg:        '<i>Hvor er Chuck Norris? <br /> Hvor er <span class="mark mark--green">han</span>?</i>',
      trans:      'Gdzie jest Chuck Norris? <br />Gdzie on jest?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bb1: {
      msg:        '<i>Hva gjør Scarlett?<br />#fill-space; sitter ved vinduet.</i>',
      trans:      'Co robi Scarlett? <br />Ona siedzi przy oknie.',
      answers: [
        { answer: '<i>hun</i>', score: 'correct',   next: '_bb2' },
        { answer: '<i>han</i>', score: 'wrong' },
        { answer: '<i>jeg</i>', score: 'wrong' }
      ]
    },
    _bb2: {
      msg:        '<i>Hva gjør Scarlett?<br /> <span class="mark mark--green">Hun</span> sitter ved vinduet.</i>',
      trans:      'Co robi Scarlett? <br />Ona siedzi przy oknie.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bc1: {
      msg:        '<i>Lager Penelope og Woody en film?<br />Ja, #fill-space; liker å jobbe sammen.</i>',
      trans:      'Czy Penelope i Woody robią film? <br />Tak, oni lubią razem pracować.',
      answers: [
        { answer: '<i>de</i>',  score: 'correct',   next: '_bc2' },
        { answer: '<i>hun</i>', score: 'wrong' },
        { answer: '<i>han</i>', score: 'wrong' }
      ]
    },
    _bc2: {
      msg:        '<i>Lager Penelope og Woody en film?<br />Ja, <span class="mark mark--green">de</span> liker å jobbe sammen.</i>',
      trans:      'Czy Penelope i Woody robią film? <br />Tak, oni lubią razem pracować.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bd1: {
      msg:        '<i>Kommer Marilyn Monroe i dag?<br />#fill-space; kan ikke.</i>',
      trans:      'Czy Marilyn Monroe przyjdzie dziś? <br />Ona nie może.',
      answers: [
        { answer: '<i>hun</i>',  score: 'correct',   next: '_bd2' },
        { answer: '<i>han</i>', score: 'wrong' },
        { answer: '<i>dere</i>', score: 'wrong' }
      ]
    },
    _bd2: {
      msg:        '<i>Kommer Marilyn Monroe i dag?<br /><span class="mark mark--green">Hun</span> kan ikke.</i>',
      trans:      'Czy Marilyn Monroe przyjdzie dziś? <br />Ona nie może.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ba1: {
      msg:        '<i>Gutten spiser fort. <br />#fill-space; er veldig sulten.</i>',
      trans:      'Chłopiec je szybko. <br />On jest bardzo głodny.',
      answers: [
        { answer: '<i>han</i>',  score: 'correct',   next: '_ba2' },
        { answer: '<i>hun</i>', score: 'wrong' },
        { answer: '<i>de</i>', score: 'wrong' }
      ]
    },
    _ba2: {
      msg:        '<i>Gutten spiser fort. <br /><span class="mark mark--green">Han</span> er veldig sulten.</i>',
      trans:      'Chłopiec je szybko. <br />On jest bardzo głodny.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bb1: {
      msg:        '<i>Jeg og kona mi kjøper en sofa. <br />#fill-space; må velge fargen.</i>',
      trans:      'Ja i moja żona kupujemy sofę. <br />Musimy wybrać kolor.',
      answers: [
        { answer: '<i>vi</i>',  score: 'correct',   next: '_bb2' },
        { answer: '<i>dere</i>', score: 'wrong' },
        { answer: '<i>de</i>', score: 'wrong' }
      ]
    },
    _bb2: {
      msg:        '<i>Jeg og kona mi kjøper en sofa. <br /><span class="mark mark--green">Vi</span> må velge fargen.</i>',
      trans:      'Ja i moja żona kupujemy sofę. <br />Musimy wybrać kolor.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bc1: {
      msg:        '<i>Barna spiser vafler med brunost og syltetøy. <br />#fill-space; liker søtsaker.</i>',
      trans:      'Dzieci jedzą gofry z brązowym serem i dżemem. <br />One lubią słodycze.',
      answers: [
        { answer: '<i>de</i>',  score: 'correct',   next: '_bc2' },
        { answer: '<i>vi</i>', score: 'wrong' },
        { answer: '<i>han</i>', score: 'wrong' }
      ]
    },
    _bc2: {
      msg:        '<i>Barna spiser vafler med brunost og syltetøy. <br /><span class="mark mark--green">De</span> liker søtsaker.</i>',
      trans:      'Dzieci jedzą gofry z brązowym serem i dżemem. <br />One lubią słodycze.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    }

  };



}
</script>
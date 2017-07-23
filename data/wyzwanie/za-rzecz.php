<script>
function LasAudioData() {

  this.testNotes = [
    'nie ma zakończenia',
    'nie ma nagrania'
  ];

  //  Uzupełnij zdania zaimkami: den, det, de.

  this.intro = {
    _a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie.<br />Gdy będziesz gotowy, naciśnij <i>play</i>.',
      autoNext:   'ENDINTRO'/*,
      more: {
        startTime:  0,
        duration:   1.5,
      }*/
    }
  };


  this.chat = {

    _aa1: {
      msg:        'Harald bor på slottet.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> ligger i Oslo sentrum.',
      trans:      'Harald mieszka w pałacu.<br />On leży w centrum Oslo.',
      answers: [
        { answer: 'det',   next: '_aa2' },
        { answer: 'den',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    _aa2: {
      msg:        'Harald bor på slottet.<br />Det ligger i Oslo sentrum.',
      trans:      'Harald mieszka w pałacu.<br />On leży w centrum Oslo.',
      startTime:  0,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ab1: {
      msg:        'Arnold trener i skogen.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er stor og grønn.',
      trans:      'Arnold trenuje w lesie.<br />On jest duży i zielony.',
      answers: [
        { answer: 'den',   next: '_ab2' },
        { answer: 'det',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    _ab2: {
      msg:        'Arnold trener i skogen.<br />Den er stor og grønn.',
      trans:      'Arnold trenuje w lesie.<br />On jest duży i zielony.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ac1: {
      msg:        'Jeg har ikke briller her.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er hjemme.',
      trans:      'Nie mam tu okularów.<br />One są w domu.',
      answers: [
        { answer: 'de',   next: '_ac2' },
        { answer: 'det',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    _ac2: {
      msg:        'Jeg har ikke briller her.<br />De er hjemme.',
      trans:      'Nie mam tu okularów.<br />One są w domu.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ad1: {
      msg:        'Adam vanner blomstene hver dag.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> som er i botanisk hage.',
      trans:      'Adam podlewa kwiaty codziennie.<br />Te, które są w ogrodzie botanicznym.',
      answers: [
        { answer: 'de',   next: '_ad2' },
        { answer: 'det',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    _ad2: {
      msg:        'Adam vanner blomstene hver dag.<br />De som er i botanisk hage.',
      trans:      'Adam podlewa kwiaty codziennie.<br />Te, które są w ogrodzie botanicznym.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ae1: {
      msg:        'Mobilen til bestemora ringer hver time.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er veldig høy.',
      trans:      'Babci telefon dzwoni co godzinę. <br />On jest bardzo głośny.',
      answers: [
        { answer: 'den',   next: '_ae2' },
        { answer: 'det',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    _ae2: {
      msg:        'Mobilen til bestemora ringer hver time.<br />Den er veldig høy.',
      trans:      'Babci telefon dzwoni co godzinę. <br />On jest bardzo głośny.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _af1: {
      msg:        'Marius strikker ei lue.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er rød, blå og hvit.',
      trans:      'Marius robi na drutach czapkę. <br />Ona jest czerwona, niebieska i biała.',
      answers: [
        { answer: 'den',   next: '_af2' },
        { answer: 'det',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    _af2: {
      msg:        'Marius strikker ei lue.<br />Den er rød, blå og hvit.',
      trans:      'Marius robi na drutach czapkę. <br />Ona jest czerwona, niebieska i biała.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ag1: {
      msg:        'Armstrong kjøper en ny sykkel.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er dyr.',
      trans:      'Armstrong kupuje nowy rower. <br />On jest drogi.',
      answers: [
        { answer: 'den',   next: '_ag2' },
        { answer: 'det',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    _ag2: {
      msg:        'Armstrong kjøper en ny sykkel.<br />Den er dyr.',
      trans:      'Armstrong kupuje nowy rower. <br />On jest drogi.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ah1: {
      msg:        'Det er mange biler i byen.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er på alle steder.',
      trans:      'Jest dużo samochodów w mieście. <br />One są wszędzie.',
      answers: [
        { answer: 'de',   next: '_ah2' },
        { answer: 'det',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    _ah2: {
      msg:        'Det er mange biler i byen.<br />De er på alle steder.',
      trans:      'Jest dużo samochodów w mieście. <br />One są wszędzie.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ai1: {
      msg:        'Klara klarer ikke prøven.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er vanskelig.',
      trans:      'Klara nie zalicza sprawdzianu. <br />On jest trudny.',
      answers: [
        { answer: 'den',   next: '_ai2' },
        { answer: 'det',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    _ai2: {
      msg:        'Klara klarer ikke prøven.<br />Den er vanskelig.',
      trans:      'Klara nie zalicza sprawdzianu. <br />On jest trudny.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _aj1: {
      msg:        'Trollene sier at treet er gammelt.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er høyest i hele skogen.',
      trans:      'Trole mówią, że drzewo jest stare. <br />Ono jest najwyższe w całym lesie.',
      answers: [
        { answer: 'det',   next: '_aj2' },
        { answer: 'den',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    _aj2: {
      msg:        'Trollene sier at treet er gammelt.<br />Det er høyest i hele skogen.',
      trans:      'Trole mówią, że drzewo jest stare. <br />Ono jest najwyższe w całym lesie.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ak1: {
      msg:        'Mennesker går på Opera-taket.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er hvitt.',
      trans:      'Ludzie idą na dach Opery. <br />On jest biały.',
      answers: [
        { answer: 'det',   next: '_ak2' },
        { answer: 'den',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    _ak2: {
      msg:        'Mennesker går på Opera-taket.<br />Det er hvitt.',
      trans:      'Ludzie idą na dach Opery. <br />On jest biały.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _al1: {
      msg:        'Madonna velger sko.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er svarte.',
      trans:      'Madonna wybiera buty. <br />One są czarne.',
      answers: [
        { answer: 'de',   next: '_al2' },
        { answer: 'det',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    _al2: {
      msg:        'Madonna velger sko.<br />De er svarte.',
      trans:      'Madonna wybiera buty. <br />One są czarne.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _am1: {
      msg:        'Flyet venter på passasjerer.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er tomt.',
      trans:      'Samolot czeka na pasażerów. <br />Jest pusty.',
      answers: [
        { answer: 'det',   next: '_am2' },
        { answer: 'den',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    _am2: {
      msg:        'Flyet venter på passasjerer.<br />Det er tomt.',
      trans:      'Samolot czeka na pasażerów. <br />Jest pusty.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ba1: {
      msg:        'Er rommet ferdig?<br /> Ja, <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er ferdig.',
      trans:      'Czy pokój jest gotowy?<br />Tak, on jest gotowy.',
      answers: [
        { answer: 'det',   next: '_ba2' },
        { answer: 'den',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    _ba2: {
      msg:        'Er rommet ferdig?<br />Ja, det er ferdig.',
      trans:      'Czy pokój jest gotowy?<br />Tak, on jest gotowy.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bb1: {
      msg:        'Er toalettet ledig? <br />Er <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> ledig?',
      trans:      'Czy łazienka jest wolna?<br />Czy ona jest wolna?',
      answers: [
        { answer: 'det',   next: '_bb2' },
        { answer: 'den',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    _bb2: {
      msg:        'Er toalettet ledig?<br />Er det ledig?',
      trans:      'Czy łazienka jest wolna?<br />Czy ona jest wolna?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bc1: {
      msg:        'Hvor kan jeg kjøpe en billett?<br />Du kan kjøpe <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> i kiosken.',
      trans:      'Gdzie mogę kupić bilet? <br />Możesz go kupić w kiosku.',
      answers: [
        { answer: 'den',   next: '_bc2' },
        { answer: 'de',   wrong: true },
        { answer: 'det',   wrong: true }
      ]
    },
    _bc2: {
      msg:        'Hvor kan jeg kjøpe en billett?<br />Du kan kjøpe den i kiosken.',
      trans:      'Gdzie mogę kupić bilet? <br />Możesz go kupić w kiosku.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bd1: {
      msg:        'Hvor er nøklene? <br />Hvor er <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span>?',
      trans:      'Gdzie są klucze?<br />Gdzie one są?',
      answers: [
        { answer: 'de',   next: '_bd2' },
        { answer: 'den',   wrong: true },
        { answer: 'det',   wrong: true }
      ]
    },
    _bd2: {
      msg:        'Hvor er nøklene? <br />Hvor er de?',
      trans:      'Gdzie są klucze?<br />Gdzie one są?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ca1: {
      msg:        'Er kassa åpen? <br /> Er <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> åpen?',
      trans:      'Czy kasa jest otwarta?<br />Czy ona jest otwarta?',
      answers: [
        { answer: 'den',   next: '_ca2' },
        { answer: 'de',   wrong: true },
        { answer: 'det',   wrong: true }
      ]
    },
    _ca2: {
      msg:        'Er kassa åpen? <br />Er den åpen?',
      trans:      'Czy kasa jest otwarta?<br/>Czy ona jest otwarta?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _cb1: {
      msg:        'Er butikken stengt? <br />Ja, <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er stengt.',
      trans:      'Czy sklep jest zamknięty?<br />Tak, on jest zamknięty.',
      answers: [
        { answer: 'den',   next: '_cb2' },
        { answer: 'de',   wrong: true },
        { answer: 'det',   wrong: true }
      ]
    },
    _cb2: {
      msg:        'Er butikken stengt? <br />Ja, den er stengt.',
      trans:      'Czy sklep jest zamknięty?<br />Tak, on jest zamknięty.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _cc1: {
      msg:        'Er toget komfortabelt?<br />Ja, <span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er komfortabelt og stille.',
      trans:      'Czy pociąg jest wygodny? Tak, on jest wygodny.',
      answers: [
        { answer: 'det',   next: '_cc2' },
        { answer: 'de',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    _cc2: {
      msg:        'Er toget komfortabelt?<br />Ja, det er komfortabelt og stille.',
      trans:      'Czy pociąg jest wygodny? Tak, on jest wygodny.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    }


  };


  this.end = {

    _end1: {
      msg:        '_END',
      startTime:  0,
      duration:   1.5
    }

  };



}
</script>
<script>
function LasData() {

  this.category = 'audio-test';   // chat|setninger|etc


  this.testNotes = [
    'nie ma nagrania'
  ];


  //  Uzupełnij zdania zaimkami: den, det, de.

  this.intro = {
    _intro1: {
      msg:          'Załóż słuchawki, jeśli chcesz. #emoji-1f3a7;',
      autoNext:     '_intro2'
    },
    _intro2: {
      msg:          '<p>Wybierz poprawny zaimek osobowy.</p>' + '<p>Następnie powtórz zdanie na głos.</p>',
      autoNext:     'ENDINTRO'
    },
  };


  this.chat = {

    _aa1: {
      msg:        '<i>Harald bor på slottet.<br />#fill-space; ligger i Oslo sentrum.</i>',
      trans:      'Harald mieszka w pałacu.<br />On leży w centrum Oslo.',
      answers: [
        { answer: '<i>det</i>',  score: 'correct', next: '_aa2' },
        { answer: '<i>den</i>',  score: 'wrong' },
        { answer: '<i>de</i>',   score: 'wrong' }
      ]
    },
    _aa2: {
      msg:        '<i>Harald bor på slottet.<br /><span class="mark mark--green">Det</span> ligger i Oslo sentrum.</i>',
      trans:      'Harald mieszka w pałacu.<br />On leży w centrum Oslo.',
      startTime:  0,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ab1: {
      msg:        '<i>Arnold trener i skogen.<br />#fill-space; er stor og grønn.</i>',
      trans:      'Arnold trenuje w lesie.<br />On jest duży i zielony.',
      answers: [
        { answer: '<i>den</i>',  score: 'correct', next: '_ab2' },
        { answer: '<i>det</i>',  score: 'wrong' },
        { answer: '<i>de</i>',   score: 'wrong' }
      ]
    },
    _ab2: {
      msg:        '<i>Arnold trener i skogen.<br /><span class="mark mark--green">Den</span> er stor og grønn.</i>',
      trans:      'Arnold trenuje w lesie.<br />On jest duży i zielony.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ac1: {
      msg:        '<i>Jeg har ikke briller her.<br />#fill-space; er hjemme.</i>',
      trans:      'Nie mam tu okularów.<br />One są w domu.',
      answers: [
        { answer: '<i>de</i>',    score: 'correct', next: '_ac2' },
        { answer: '<i>det</i>',   score: 'wrong' },
        { answer: '<i>den</i>',   score: 'wrong' }
      ]
    },
    _ac2: {
      msg:        '<i>Jeg har ikke briller her.<br /><span class="mark mark--green">De</span> er hjemme.</i>',
      trans:      'Nie mam tu okularów.<br />One są w domu.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ad1: {
      msg:        '<i>Adam vanner blomstene hver dag.<br />#fill-space; som er i botanisk hage.</i>',
      trans:      'Adam podlewa kwiaty codziennie.<br />Te, które są w ogrodzie botanicznym.',
      answers: [
        { answer: '<i>de</i>',    score: 'correct', next: '_ad2' },
        { answer: '<i>det</i>',   score: 'wrong' },
        { answer: '<i>den</i>',   score: 'wrong' }
      ]
    },
    _ad2: {
      msg:        '<i>Adam vanner blomstene hver dag.<br /><span class="mark mark--green">De</span> som er i botanisk hage.</i>',
      trans:      'Adam podlewa kwiaty codziennie.<br />Te, które są w ogrodzie botanicznym.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ae1: {
      msg:        '<i>Mobilen til bestemora ringer hver time.<br />#fill-space; er veldig høy.</i>',
      trans:      'Babci telefon dzwoni co godzinę. <br />On jest bardzo głośny.',
      answers: [
        { answer: '<i>den</i>',  score: 'correct', next: '_ae2' },
        { answer: '<i>det</i>',  score: 'wrong' },
        { answer: '<i>de</i>',   score: 'wrong' }
      ]
    },
    _ae2: {
      msg:        '<i>Mobilen til bestemora ringer hver time.<br /><span class="mark mark--green">Den</span> er veldig høy.</i>',
      trans:      'Babci telefon dzwoni co godzinę. <br />On jest bardzo głośny.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _af1: {
      msg:        '<i>Marius strikker ei lue.<br />#fill-space; er rød, blå og hvit.</i>',
      trans:      'Marius robi na drutach czapkę. <br />Ona jest czerwona, niebieska i biała.',
      answers: [
        { answer: '<i>den</i>',  score: 'correct', next: '_af2' },
        { answer: '<i>det</i>',  score: 'wrong' },
        { answer: '<i>de</i>',   score: 'wrong' }
      ]
    },
    _af2: {
      msg:        '<i>Marius strikker ei lue.<br /><span class="mark mark--green">Den</span> er rød, blå og hvit.</i>',
      trans:      'Marius robi na drutach czapkę. <br />Ona jest czerwona, niebieska i biała.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ag1: {
      msg:        '<i>Armstrong kjøper en ny sykkel.<br />#fill-space; er dyr.</i>',
      trans:      'Armstrong kupuje nowy rower. <br />On jest drogi.',
      answers: [
        { answer: '<i>den</i>',  score: 'correct', next: '_ag2' },
        { answer: '<i>det</i>',  score: 'wrong' },
        { answer: '<i>de</i>',   score: 'wrong' }
      ]
    },
    _ag2: {
      msg:        '<i>Armstrong kjøper en ny sykkel.<br /><span class="mark mark--green">Den</span> er dyr.</i>',
      trans:      'Armstrong kupuje nowy rower. <br />On jest drogi.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ah1: {
      msg:        '<i>Det er mange biler i byen.<br />#fill-space; er på alle steder.</i>',
      trans:      'Jest dużo samochodów w mieście. <br />One są wszędzie.',
      answers: [
        { answer: '<i>de</i>',    score: 'correct', next: '_ah2' },
        { answer: '<i>det</i>',   score: 'wrong' },
        { answer: '<i>den</i>',   score: 'wrong' }
      ]
    },
    _ah2: {
      msg:        '<i>Det er mange biler i byen.<br /><span class="mark mark--green">De</span> er på alle steder.</i>',
      trans:      'Jest dużo samochodów w mieście. <br />One są wszędzie.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ai1: {
      msg:        '<i>Klara klarer ikke prøven.<br />#fill-space; er vanskelig.</i>',
      trans:      'Klara nie zalicza sprawdzianu. <br />On jest trudny.',
      answers: [
        { answer: '<i>den</i>',  score: 'correct', next: '_ai2' },
        { answer: '<i>det</i>',  score: 'wrong' },
        { answer: '<i>de</i>',   score: 'wrong' }
      ]
    },
    _ai2: {
      msg:        '<i>Klara klarer ikke prøven.<br /><span class="mark mark--green">Den</span> er vanskelig.</i>',
      trans:      'Klara nie zalicza sprawdzianu. <br />On jest trudny.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _aj1: {
      msg:        '<i>Trollene sier at treet er gammelt.<br />#fill-space; er høyest i hele skogen.</i>',
      trans:      'Trole mówią, że drzewo jest stare. <br />Ono jest najwyższe w całym lesie.',
      answers: [
        { answer: '<i>det</i>',  score: 'correct', next: '_aj2' },
        { answer: '<i>den</i>',  score: 'wrong' },
        { answer: '<i>de</i>',   score: 'wrong' }
      ]
    },
    _aj2: {
      msg:        '<i>Trollene sier at treet er gammelt.<br /><span class="mark mark--green">Det</span> er høyest i hele skogen.</i>',
      trans:      'Trole mówią, że drzewo jest stare. <br />Ono jest najwyższe w całym lesie.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ak1: {
      msg:        '<i>Mennesker går på Opera-taket.<br />#fill-space; er hvitt.</i>',
      trans:      'Ludzie idą na dach Opery. <br />On jest biały.',
      answers: [
        { answer: '<i>det</i>',  score: 'correct', next: '_ak2' },
        { answer: '<i>den</i>',  score: 'wrong' },
        { answer: '<i>de</i>',   score: 'wrong' }
      ]
    },
    _ak2: {
      msg:        '<i>Mennesker går på Opera-taket.<br /><span class="mark mark--green">Det</span> er hvitt.</i>',
      trans:      'Ludzie idą na dach Opery. <br />On jest biały.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _al1: {
      msg:        '<i>Madonna velger sko.<br />#fill-space; er svarte.</i>',
      trans:      'Madonna wybiera buty. <br />One są czarne.',
      answers: [
        { answer: '<i>de</i>',    score: 'correct', next: '_al2' },
        { answer: '<i>det</i>',   score: 'wrong' },
        { answer: '<i>den</i>',   score: 'wrong' }
      ]
    },
    _al2: {
      msg:        '<i>Madonna velger sko.<br /><span class="mark mark--green">De</span> er svarte.</i>',
      trans:      'Madonna wybiera buty. <br />One są czarne.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _am1: {
      msg:        '<i>Flyet venter på passasjerer.<br />#fill-space; er tomt.</i>',
      trans:      'Samolot czeka na pasażerów. <br />Jest pusty.',
      answers: [
        { answer: '<i>det</i>',  score: 'correct', next: '_am2' },
        { answer: '<i>den</i>',  score: 'wrong' },
        { answer: '<i>de</i>',   score: 'wrong' }
      ]
    },
    _am2: {
      msg:        '<i>Flyet venter på passasjerer.<br /><span class="mark mark--green">Det</span> er tomt.</i>',
      trans:      'Samolot czeka na pasażerów. <br />Jest pusty.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ba1: {
      msg:        '<i>Er rommet ferdig?<br /> Ja, #fill-space; er ferdig.</i>',
      trans:      'Czy pokój jest gotowy?<br />Tak, on jest gotowy.',
      answers: [
        { answer: '<i>det</i>',  score: 'correct', next: '_ba2' },
        { answer: '<i>den</i>',  score: 'wrong' },
        { answer: '<i>de</i>',   score: 'wrong' }
      ]
    },
    _ba2: {
      msg:        '<i>Er rommet ferdig?<br />Ja, <span class="mark mark--green">det</span> er ferdig.</i>',
      trans:      'Czy pokój jest gotowy?<br />Tak, on jest gotowy.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bb1: {
      msg:        '<i>Er toalettet ledig? <br />Er #fill-space; ledig?</i>',
      trans:      'Czy łazienka jest wolna?<br />Czy ona jest wolna?',
      answers: [
        { answer: '<i>det</i>',  score: 'correct', next: '_bb2' },
        { answer: '<i>den</i>',  score: 'wrong' },
        { answer: '<i>de</i>',   score: 'wrong' }
      ]
    },
    _bb2: {
      msg:        '<i>Er toalettet ledig?<br />Er <span class="mark mark--green">det</span> ledig?</i>',
      trans:      'Czy łazienka jest wolna?<br />Czy ona jest wolna?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bc1: {
      msg:        '<i>Hvor kan jeg kjøpe en billett?<br />Du kan kjøpe #fill-space; i kiosken.</i>',
      trans:      'Gdzie mogę kupić bilet? <br />Możesz go kupić w kiosku.',
      answers: [
        { answer: '<i>den</i>',  score: 'correct', next: '_bc2' },
        { answer: '<i>de</i>',   score: 'wrong' },
        { answer: '<i>det</i>',  score: 'wrong' }
      ]
    },
    _bc2: {
      msg:        '<i>Hvor kan jeg kjøpe en billett?<br />Du kan kjøpe <span class="mark mark--green">den</span> i kiosken.</i>',
      trans:      'Gdzie mogę kupić bilet? <br />Możesz go kupić w kiosku.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _bd1: {
      msg:        '<i>Hvor er nøklene? <br />Hvor er #fill-space;?</i>',
      trans:      'Gdzie są klucze?<br />Gdzie one są?',
      answers: [
        { answer: '<i>de</i>',    score: 'correct', next: '_bd2' },
        { answer: '<i>den</i>',   score: 'wrong' },
        { answer: '<i>det</i>',   score: 'wrong' }
      ]
    },
    _bd2: {
      msg:        '<i>Hvor er nøklene? <br />Hvor er <span class="mark mark--green">de</span>?</i>',
      trans:      'Gdzie są klucze?<br />Gdzie one są?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _ca1: {
      msg:        '<i>Er kassa åpen? <br /> Er #fill-space; åpen?</i>',
      trans:      'Czy kasa jest otwarta?<br />Czy ona jest otwarta?',
      answers: [
        { answer: '<i>den</i>',  score: 'correct', next: '_ca2' },
        { answer: '<i>de</i>',   score: 'wrong' },
        { answer: '<i>det</i>',  score: 'wrong' }
      ]
    },
    _ca2: {
      msg:        '<i>Er kassa åpen? <br />Er <span class="mark mark--green">den</span> åpen?</i>',
      trans:      'Czy kasa jest otwarta?<br/>Czy ona jest otwarta?',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _cb1: {
      msg:        '<i>Er butikken stengt? <br />Ja, #fill-space; er stengt.</i>',
      trans:      'Czy sklep jest zamknięty?<br />Tak, on jest zamknięty.',
      answers: [
        { answer: '<i>den</i>',  score: 'correct', next: '_cb2' },
        { answer: '<i>de</i>',   score: 'wrong' },
        { answer: '<i>det</i>',  score: 'wrong' }
      ]
    },
    _cb2: {
      msg:        '<i>Er butikken stengt? <br />Ja, <span class="mark mark--green">den</span> er stengt.</i>',
      trans:      'Czy sklep jest zamknięty?<br />Tak, on jest zamknięty.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    _cc1: {
      msg:        '<i>Er toget komfortabelt?<br />Ja, #fill-space; er komfortabelt og stille.</i>',
      trans:      'Czy pociąg jest wygodny?<br />Tak, on jest wygodny.',
      answers: [
        { answer: '<i>det</i>',  score: 'correct', next: '_cc2' },
        { answer: '<i>de</i>',   score: 'wrong' },
        { answer: '<i>den</i>',  score: 'wrong' }
      ]
    },
    _cc2: {
      msg:        '<i>Er toget komfortabelt?<br />Ja, <span class="mark mark--green">det</span> er komfortabelt og stille.</i>',
      trans:      'Czy pociąg jest wygodny?<br />Tak, on jest wygodny.',
      startTime:  3,
      duration:   1.5,
      autoNext:   'RANDOM'
    }


  };



}
</script>
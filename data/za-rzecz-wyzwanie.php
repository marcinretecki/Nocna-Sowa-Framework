<script>
function LasAudioData() {

  //  Uzupełnij zdania zaimkami: den, det, de.

  this.intro = {
    a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie.<br />Gdy będziesz gotowy, naciśnij <i>play</i>.',
      autoNext:   'ENDINTRO'/*,
      more: { startTime: 0, stopTime: 26 }*/
    }
  };


  this.chat = {

    aa1: {
      msg:        'Harald bor på slottet.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> ligger i Oslo sentrum.',
      answers: [
        { answer: 'det',   next: 'aa2' },
        { answer: 'den',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    aa2: {
      msg:        'Harald bor på slottet.<br />Det ligger i Oslo sentrum.',
//      startTime:  0,
//      stopTime:   2,
      autoNext:   'RANDOM'
    },


    ab1: {
      msg:        'Arnold trener i skogen.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er stor og grønn.',
      answers: [
        { answer: 'den',   next: 'ab2' },
        { answer: 'det',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    ab2: {
      msg:        'Arnold trener i skogen.<br />Den er stor og grønn.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ac1: {
      msg:        'Jeg har ikke briller her.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er hjemme.',
      answers: [
        { answer: 'de',   next: 'ac2' },
        { answer: 'det',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    ac2: {
      msg:        'Jeg har ikke briller her.<br />De er hjemme.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ad1: {
      msg:        'Adam vanner blomstene hver dag.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> som er i botanisk hage.',
      answers: [
        { answer: 'de',   next: 'ad2' },
        { answer: 'det',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    ad2: {
      msg:        'Adam vanner blomstene hver dag.<br />De som er i botanisk hage.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ae1: {
      msg:        'Mobilen til bestemora ringer hver time.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er veldig høy.',
      answers: [
        { answer: 'den',   next: 'ae2' },
        { answer: 'det',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    ae2: {
      msg:        'Mobilen til bestemora ringer hver time.<br />Den er veldig høy.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    af1: {
      msg:        'Marius strikker ei lue.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er rød, blå og hvit.',
      answers: [
        { answer: 'den',   next: 'af2' },
        { answer: 'det',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    af2: {
      msg:        'Marius strikker ei lue.<br />Den er rød, blå og hvit.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ag1: {
      msg:        'Armstrong kjøper en ny sykkel.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er dyr.',
      answers: [
        { answer: 'den',   next: 'ag2' },
        { answer: 'det',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    ag2: {
      msg:        'Armstrong kjøper en ny sykkel.<br />Den er dyr.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ah1: {
      msg:        'Det er mange biler i byen.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er på alle steder.',
      answers: [
        { answer: 'de',   next: 'ah2' },
        { answer: 'det',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    ah2: {
      msg:        'Det er mange biler i byen.<br />De er på alle steder.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ai1: {
      msg:        'Klara klarer ikke prøven.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er vanskelig.',
      answers: [
        { answer: 'den',   next: 'ai2' },
        { answer: 'det',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    ai2: {
      msg:        'Klara klarer ikke prøven.<br />Den er vanskelig.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    aj1: {
      msg:        'Trollene sier at treet er gammelt.<br /> <br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er høyest i hele skogen.',
      answers: [
        { answer: 'det',   next: 'aj2' },
        { answer: 'den',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    aj2: {
      msg:        'Trollene sier at treet er gammelt.<br />Det er høyest i hele skogen.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    ak1: {
      msg:        'Mennesker går på Opera-taket.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er hvitt.',
      answers: [
        { answer: 'det',   next: 'ak2' },
        { answer: 'den',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    ak2: {
      msg:        'Mennesker går på Opera-taket.<br />Det er hvitt.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    al1: {
      msg:        'Madonna velger sko.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er svarte.',
      answers: [
        { answer: 'de',   next: 'al2' },
        { answer: 'det',   wrong: true },
        { answer: 'den',   wrong: true }
      ]
    },
    al2: {
      msg:        'Madonna velger sko.<br />De er svarte.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    },


    am1: {
      msg:        'Flyet venter på passasjerer.<br /><span class="audio-test-clue">&nbsp;&hellip;&nbsp;</span> er tomt.',
      answers: [
        { answer: 'det',   next: 'am2' },
        { answer: 'den',   wrong: true },
        { answer: 'de',   wrong: true }
      ]
    },
    am2: {
      msg:        'Flyet venter på passasjerer.<br />Det er tomt.',
//      startTime:  3,
//      stopTime:   5,
      autoNext:   'RANDOM'
    }


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
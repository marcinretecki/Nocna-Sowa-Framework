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
      msg: "Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i>start</i>.",
      autoNext: "ENDINTRO",
      more: { startTime: 0, stopTime: 26 }
    }
  };


  this.chat = {

    ikveld1: {
      msg: 'Vi går på en fest <span class="audio-test-clue">(dziś wieczorem)</span>.',
      answers: [
        { answer: '<i>i kveld</i>', next: 'ikveld2' },
        { answer: '<i>om kvelden</i>', wrong: true },
        { answer: '<i>i dag</i>', wrong: true },
        { answer: '<i>om natta</i>', wrong: true }
      ]
    },
    ikveld2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    omkvelden1: {
      msg: 'Jeg lærer norsk <span class="audio-test-clue">(wieczorami)</span>.',
      answers: [
        { answer: '<i>om kvelden</i>', next: 'omkvelden2' },
        { answer: '<i>i kveld</i>', wrong: true },
        { answer: '<i>hver dag</i>', wrong: true },
        { answer: '<i>i natt</i>', wrong: true }
      ]
    },
    omkvelden2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    imorgen1: {
      msg: 'Jeg går på jobb <span class="audio-test-clue">(jutro)</span>.',
      answers: [
        { answer: '<i>i morgen</i>', next: 'imorgen2' },
        { answer: '<i>om morgenen</i>', wrong: true },
        { answer: '<i>i dag</i>', wrong: true },
        { answer: '<i>om dagen</i>', wrong: true }
      ]
    },
    imorgen2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    imorgentidlig1: {
      msg: 'Jeg skal lage kaffe <span class="audio-test-clue">(jutro rano)</span>.',
      answers: [
        { answer: '<i>i morgen tidlig</i>', next: 'imorgentidlig2' },
        { answer: '<i>i morgen</i>', wrong: true },
        { answer: '<i>i morgen kveld</i>', wrong: true },
        { answer: '<i>om morgenen</i>', wrong: true }
      ]
    },
    imorgentidlig2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    ommorgen1: {
      msg: 'Han står opp tidlig <span class="audio-test-clue">(rano/rankami)</span>.',
      answers: [
        { answer: '<i>om morgenen</i>', next: 'ommorgen2' },
        { answer: '<i>i morges</i>', wrong: true },
        { answer: '<i>i morgen tidlig</i>', wrong: true },
        { answer: '<i>i dag</i>', wrong: true }
      ]
    },
    ommorgen2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    idag1: {
      msg: 'Takk for <span class="audio-test-clue">(dziś)</span>.',
      answers: [
        { answer: '<i>i dag</i>', next: 'idag2' },
        { answer: '<i>i morges</i>', wrong: true },
        { answer: '<i>i natt</i>', wrong: true },
        { answer: '<i>sist</i>', wrong: true }
      ]
    },
    idag2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    imorgenkveld1: {
      msg: 'De skal på treningssenter <span class="audio-test-clue">(jutro wieczorem)</span>.',
      answers: [
        { answer: '<i>i morgen kveld</i>', next: 'imorgenkveld2' },
        { answer: '<i>i kveld</i>', wrong: true },
        { answer: '<i>om kvelden</i>', wrong: true },
        { answer: '<i>i morgen tidlig</i>', wrong: true }
      ]
    },
    imorgenkveld2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    omettermiddagen1: {
      msg: 'Jeg vil løpe  <span class="audio-test-clue">(popołudniami)</span>.',
      answers: [
        { answer: '<i>om ettermiddagen</i>', next: 'omettermiddagen2' },
        { answer: '<i>om formiddagen</i>', wrong: true },
        { answer: '<i>i ettermiddag</i>', wrong: true },
        { answer: '<i>i formiddag</i>', wrong: true }
      ]
    },
    omettermiddagen2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    iettermiddag1: {
      msg: 'Jeg går til frisøren <span class="audio-test-clue">(dziś popołudniu)</span>.',
      answers: [
        { answer: '<i>i ettermiddag</i>', next: 'iettermiddag2' },
        { answer: '<i>i formiddag</i>', wrong: true },
        { answer: '<i>om formiddagen</i>', wrong: true },
        { answer: '<i>om ettermiddagen</i>', wrong: true }
      ]
    },
    iettermiddag2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    omformiddagen1: {
      msg: 'Han lufter hunden <span class="audio-test-clue">(przedpołudniami)</span>.',
      answers: [
        { answer: '<i>om formiddagen</i>', next: 'omformiddagen2' },
        { answer: '<i>om ettermiddagen</i>', wrong: true },
        { answer: '<i>i ettermiddag</i>', wrong: true },
        { answer: '<i>i formiddag</i>', wrong: true }
      ]
    },
    omformiddagen2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    omnatta1: {
      msg: 'Han kan ikke sove <span class="audio-test-clue">(w nocy/nocami)</span>.',
      answers: [
        { answer: '<i>om natta</i>', next: 'omnatta2' },
        { answer: '<i>om kvelden</i>', wrong: true },
        { answer: '<i>i natt</i>', wrong: true },
        { answer: '<i>i kveld</i>', wrong: true }
      ]
    },
    omnatta2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    inatt: {
      msg: 'Naboene fester <span class="audio-test-clue">(dziś w nocy)</span>.',
      answers: [
        { answer: '<i>i natt</i>', next: 'inatt' },
        { answer: '<i>i kveld</i>', wrong: true },
        { answer: '<i>om kvelden</i>', wrong: true },
        { answer: '<i>om ettermiddagen</i>', wrong: true }
      ]
    },
    inatt: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    omenstund1: {
      msg: 'Jeg kommer  <span class="audio-test-clue">(za chwilę)</span>.',
      answers: [
        { answer: '<i>om en stund</i>', next: 'omenstund2' },
        { answer: '<i>i en stund</i>', wrong: true },
        { answer: '<i>for en stund</i>', wrong: true },
        { answer: '<i>en stund</i>', wrong: true }
      ]
    },
    omenstund2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    na1: {
      msg: 'Jeg må stikke <span class="audio-test-clue">(teraz)</span>.',
      answers: [
        { answer: '<i>nå</i>', next: 'na2' },
        { answer: '<i>om en stund</i>', wrong: true },
        { answer: '<i>om et øyeblikk</i>', wrong: true },
        { answer: '<i>etterpå</i>', wrong: true }
      ]
    },
    na2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    omentime1: {
      msg: 'Vi skal reise <span class="audio-test-clue">(za godzinę)</span>.',
      answers: [
        { answer: '<i>om en time</i>', next: 'omentime2' },
        { answer: '<i>om en tid</i>', wrong: true },
        { answer: '<i>i en time</i>', wrong: true },
        { answer: '<i>timehvis</i>', wrong: true }
      ]
    },
    omentime2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    omettminutt1: {
      msg: 'Vi er på stedet <span class="audio-test-clue">(za minutę)</span>.',
      answers: [
        { answer: '<i>om ett minutt</i>', next: 'omettminutt2' },
        { answer: '<i>i et minutt</i>', wrong: true },
        { answer: '<i>om noen minutter</i>', wrong: true },
        { answer: '<i>på minutt</i>', wrong: true }
      ]
    },
    omettminutt2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    omtredager1: {
      msg: 'Han slutter prosjektet <span class="audio-test-clue">(za trzy dni)</span>.',
      answers: [
        { answer: '<i>om tre dager</i>', next: 'omtredager2' },
        { answer: '<i>i tre dager</i>', wrong: true },
        { answer: '<i>om tre timer</i>', wrong: true },
        { answer: '<i>på torsdag</i>', wrong: true }
      ]
    },
    omtredager2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    omfemuker1: {
      msg: 'Jeg kommer tilbake til Norge <span class="audio-test-clue">(za pięć tygodni)</span>.',
      answers: [
        { answer: '<i>om fem uker</i>', next: 'omfemuker2' },
        { answer: '<i>om fem måneder</i>', wrong: true },
        { answer: '<i>om ei uke</i>', wrong: true },
        { answer: '<i>om to måneder</i>', wrong: true }
      ]
    },
    omfemuker2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    omfireman1: {
      msg: 'Jeg åpner en ny butikk <span class="audio-test-clue">(za cztery miesiące)</span>.',
      answers: [
        { answer: '<i>om fire måneder</i>', next: 'omfireman2' },
        { answer: '<i>om et halvt år</i>', wrong: true },
        { answer: '<i>om fire uker</i>', wrong: true },
        { answer: '<i>i fire måneder</i>', wrong: true }
      ]
    },
    omfireman2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    omethalvtar1: {
      msg: 'Han vil slanke seg <span class="audio-test-clue">(za pół roku)</span>.',
      answers: [
        { answer: '<i>om et halvt år</i>', next: 'omethalvtar2' },
        { answer: '<i>om fem måneder</i>', wrong: true },
        { answer: '<i>i seks måneder</i>', wrong: true },
        { answer: '<i>om et år</i>', wrong: true }
      ]
    },
    omethalvtar2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    omnoenar1: {
      msg: 'Hun blir sjef her <span class="audio-test-clue">(za kilka lat)</span>.',
      answers: [
        { answer: '<i>om noen år</i>', next: 'omnoenar2' },
        { answer: '<i>i noen år</i>', wrong: true },
        { answer: '<i>hvert år</i>', wrong: true },
        { answer: '<i>neste år</i>', wrong: true }
      ]
    },
    omnoenar2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    nextar1: {
      msg: 'De gifter seg <span class="audio-test-clue">(w przyszłym roku)</span>.',
      answers: [
        { answer: '<i>neste år</i>', next: 'nextar2' },
        { answer: '<i>siste år</i>', wrong: true },
        { answer: '<i>i år</i>', wrong: true },
        { answer: '<i>om fem måneder</i>', wrong: true }
      ]
    },
    nextar2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    nesteuke: {
      msg: 'Vi sees <span class="audio-test-clue">(w przyszłym tygodniu)</span>.',
      answers: [
        { answer: '<i>neste uke</i>', next: 'nesteuke' },
        { answer: '<i>igjen</i>', wrong: true },
        { answer: '<i>om ei uke</i>', wrong: true },
        { answer: '<i>om sju dager</i>', wrong: true }
      ]
    },
    nesteuke: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    nestemaned1: {
      msg: 'Jeg begynner et dansekurs <span class="audio-test-clue">(w następnym/przyszłym miesiącu)</span>.',
      answers: [
        { answer: '<i>neste måned</i>', next: 'nestemaned2' },
        { answer: '<i>neste år</i>', wrong: true },
        { answer: '<i>neste gang</i>', wrong: true },
        { answer: '<i>om en måned</i>', wrong: true }
      ]
    },
    nestemaned2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    nestegang1: {
      msg: 'Jeg lærer noe nytt <span class="audio-test-clue">(codziennie)</span>.',
      answers: [
        { answer: '<i>hver dag</i>', next: 'nestegang2' },
        { answer: '<i>i dag</i>', wrong: true },
        { answer: '<i>om en dag</i>', wrong: true },
        { answer: '<i>hver andre dag</i>', wrong: true }
      ]
    },
    nestegang2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    hvermorgen1: {
      msg: 'Jeg løper i parken <span class="audio-test-clue">(każdego ranka)</span>.',
      answers: [
        { answer: '<i>hver morgen</i>', next: 'hvermorgen2' },
        { answer: '<i>i morgen</i>', wrong: true },
        { answer: '<i>i morges</i>', wrong: true },
        { answer: '<i>hver dag</i>', wrong: true }
      ]
    },
    hvermorgen2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    hvertime1: {
      msg: 'Jeg sjekker mobilen <span class="audio-test-clue">(co godzinę)</span>.',
      answers: [
        { answer: '<i>hver time</i>', next: 'hvertime2' },
        { answer: '<i>i en time</i>', wrong: true },
        { answer: '<i>på en time</i>', wrong: true },
        { answer: '<i>hver gang</i>', wrong: true }
      ]
    },
    hvertime2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    hveruke1: {
      msg: 'Hun ringer til foreldrene <span class="audio-test-clue">(co tydzień)</span>.',
      answers: [
        { answer: '<i>hver uke</i>', next: 'hveruke2' },
        { answer: '<i>hver søndag</i>', wrong: true },
        { answer: '<i>om uka</i>', wrong: true },
        { answer: '<i>mange ganger</i>', wrong: true }
      ]
    },
    hveruke2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    annenhveruke1: {
      msg: 'Han jobber om morgenen <span class="audio-test-clue">(co drugi tydzień)</span>.',
      answers: [
        { answer: '<i>annenhver uke</i>', next: 'annenhveruke2' },
        { answer: '<i>hver andre måned</i>', wrong: true },
        { answer: '<i>hver uke</i>', wrong: true },
        { answer: '<i>hver andre gang</i>', wrong: true }
      ]
    },
    annenhveruke2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    annenhvermaned1: {
      msg: 'Jeg flyr til Bergen <span class="audio-test-clue">(co drugi miesiąc)</span>.',
      answers: [
        { answer: '<i>annehver måned</i>', next: 'annenhvermaned2' },
        { answer: '<i>hver andre uke</i>', wrong: true },
        { answer: '<i>hver måned</i>', wrong: true },
        { answer: '<i>annenhver uke</i>', wrong: true }
      ]
    },
    annenhvermaned2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    hvergang1: {
      msg: 'Han kommer for sent <span class="audio-test-clue">(za każdym razem)</span>.',
      answers: [
        { answer: '<i>hver gang</i>', next: 'hvergang2' },
        { answer: '<i>annenhver gang</i>', wrong: true },
        { answer: '<i>hver time</i>', wrong: true },
        { answer: '<i>timevis</i>', wrong: true }
      ]
    },
    hvergang2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    hvertar: {
      msg: 'Dere betaler skatt <span class="audio-test-clue">(każdego roku)</span>.',
      answers: [
        { answer: '<i>hvert år</i>', next: 'hvertar' },
        { answer: '<i>hver andre år</i>', wrong: true },
        { answer: '<i>aldri</i>', wrong: true },
        { answer: '<i>hvis dere husker det</i>', wrong: true }
      ]
    },
    hvertar: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    hversommer1: {
      msg: 'De besøker venner <span class="audio-test-clue">(każdego lata)</span>.',
      answers: [
        { answer: '<i>hver sommer</i>', next: 'hversommer2' },
        { answer: '<i>hver vinter</i>', wrong: true },
        { answer: '<i>hver måned</i>', wrong: true },
        { answer: '<i>hver vår</i>', wrong: true }
      ]
    },
    hversommer2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    hvervinter1: {
      msg: 'De reiser til Spania <span class="audio-test-clue">(każdej zimy)</span>.',
      answers: [
        { answer: '<i>hver vinter</i>', next: 'hvervinter2' },
        { answer: '<i>om vinteren</i>', wrong: true },
        { answer: '<i>i helga</i>', wrong: true },
        { answer: '<i>hver ferie</i>', wrong: true }
      ]
    },
    hvervinter2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    ihost1: {
      msg: 'Det regner ikke <span class="audio-test-clue">(tej jesieni)</span>.',
      answers: [
        { answer: '<i>i høst</i>', next: 'ihost2' },
        { answer: '<i>siste høst</i>', wrong: true },
        { answer: '<i>om høsten</i>', wrong: true },
        { answer: '<i>hver høst</i>', wrong: true }
      ]
    },
    ihost2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    ivar1: {
      msg: 'De bytter dørklokka <span class="audio-test-clue">(tej wiosny)</span>.',
      answers: [
        { answer: '<i>i vår</i>', next: 'ivar2' },
        { answer: '<i>hver vår</i>', wrong: true },
        { answer: '<i>hver andre høst</i>', wrong: true },
        { answer: '<i>hver høst</i>', wrong: true }
      ]
    },
    ivar2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    itoar1: {
      msg: 'Vi skal bo i Ålesund <span class="audio-test-clue">(przez dwa lata)</span>.',
      answers: [
        { answer: '<i>i to år</i>', next: 'itoar2' },
        { answer: '<i>om to år</i>', wrong: true },
        { answer: '<i>for to år siden</i>', wrong: true },
        { answer: '<i>for to år</i>', wrong: true }
      ]
    },
    itoar2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    iovermorgen1: {
      msg: 'De leverer skapene <span class="audio-test-clue">(pojutrze)</span>.',
      answers: [
        { answer: '<i>i overmorgen</i>', next: 'iovermorgen2' },
        { answer: '<i>om noen dager</i>', wrong: true },
        { answer: '<i>på tirsdag</i>', wrong: true },
        { answer: '<i>i morgen</i>', wrong: true }
      ]
    },
    iovermorgen2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
      autoNext:   'RANDOM'
    },

    ihelga1: {
      msg: 'De leverer skapene <span class="audio-test-clue">(pojutrze)</span>.',
      answers: [
        { answer: '<i>i overmorgen</i>', next: 'ihelga2' },
        { answer: '<i>om noen dager</i>', wrong: true },
        { answer: '<i>på tirsdag</i>', wrong: true },
        { answer: '<i>i morgen</i>', wrong: true }
      ]
    },
    ihelga2: {
      msg: 'SCORE',
//      startTime:  0,
//      stopTime:   0,
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
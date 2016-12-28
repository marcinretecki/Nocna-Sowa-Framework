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
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i>play</i>.',
      autoNext:   'ENDINTRO',
      more: { startTime: 0, stopTime: 26 }
    }
  };


  this.chat = {

    ikveld1: {
      msg: 'Vi går på festen <span class="audio-test-clue">dziś wieczorem</span>.',
      answers: [
        { answer: 'i kveld', next: 'ikveld2' },
        { answer: 'om kvelden', wrong: true },
        { answer: 'i dag', wrong: true },
        { answer: 'om natta', wrong: true }
      ]
    },
    ikveld2: {
      msg: 'Vi går på festen i kveld.',
      score: true,
      startTime:  0,
      stopTime:   2,
      autoNext:     'RANDOM'
    },

    omkvelden1: {
      msg: 'Jeg lærer norsk <span class="audio-test-clue">wieczorami</span>.',
      answers: [
        { answer: 'om kvelden', next: 'omkvelden2' },
        { answer: 'i kveld', wrong: true },
        { answer: 'hver dag', wrong: true },
        { answer: 'i natt', wrong: true }
      ]
    },
    omkvelden2: {
      msg: 'Jeg lærer norsk om kvelden.',
      score: true,
      startTime:  3,
      stopTime:   5,
      autoNext:   'RANDOM'
    },

    imorgen1: {
      msg: 'Jeg går på jobb <span class="audio-test-clue">jutro</span>.',
      answers: [
        { answer: 'i morgen', next: 'imorgen2' },
        { answer: 'om morgenen', wrong: true },
        { answer: 'i dag', wrong: true },
        { answer: 'om dagen', wrong: true }
      ]
    },
    imorgen2: {
      msg: 'Jeg går på jobb i morgen.',
      score: true,
      startTime:  6,
      stopTime:   8,
      autoNext:   'RANDOM'
    },

    imorgentidlig1: {
      msg: 'Jeg skal lage kaffe <span class="audio-test-clue">jutro rano</span>.',
      answers: [
        { answer: 'i morgen tidlig', next: 'imorgentidlig2' },
        { answer: 'i morgen', wrong: true },
        { answer: 'i morgen kveld', wrong: true },
        { answer: 'om morgenen', wrong: true }
      ]
    },
    imorgentidlig2: {
      msg: 'Jeg skal lage kaffe i morgen tidlig',
      score: true,
      startTime:  9,
      stopTime:   12,
      autoNext:   'RANDOM'
    },

    ommorgen1: {
      msg: 'Han står opp tidlig <span class="audio-test-clue">rano/rankami</span>.',
      answers: [
        { answer: 'om morgenen', next: 'ommorgen2' },
        { answer: 'i morges', wrong: true },
        { answer: 'i morgen tidlig', wrong: true },
        { answer: 'i dag', wrong: true }
      ]
    },
    ommorgen2: {
      msg: 'Han står opp tidlig om morgenen.',
      score: true,
      startTime:  14,
      stopTime:   15.5,
      autoNext:   'RANDOM'
    },

    idag1: {
      msg: 'Takk for <span class="audio-test-clue">dziś</span>.',
      answers: [
        { answer: 'i dag', next: 'idag2' },
        { answer: 'i morges', wrong: true },
        { answer: 'i natt', wrong: true },
        { answer: 'sist', wrong: true }
      ]
    },
    idag2: {
      msg: 'Takk for i dag.',
      score: true,
      startTime:  17,
      stopTime:   18.5,
      autoNext:   'RANDOM'
    },

    imorgenkveld1: {
      msg: 'De skal på treningssenter <span class="audio-test-clue">jutro wieczorem</span>.',
      answers: [
        { answer: 'i morgen kveld', next: 'imorgenkveld2' },
        { answer: 'i kveld', wrong: true },
        { answer: 'om kvelden', wrong: true },
        { answer: 'i morgen tidlig', wrong: true }
      ]
    },
    imorgenkveld2: {
      msg: 'De skal på treningssenter i morgen kveld.',
      score: true,
      startTime:  20,
      stopTime:   23,
      autoNext:   'RANDOM'
    },

    omettermiddagen1: {
      msg: 'Jeg vil løpe  <span class="audio-test-clue">popołudniami</span>.',
      answers: [
        { answer: 'om ettermiddagen', next: 'omettermiddagen2' },
        { answer: 'om formiddagen', wrong: true },
        { answer: 'i ettermiddag', wrong: true },
        { answer: 'i formiddag', wrong: true }
      ]
    },
    omettermiddagen2: {
      msg: 'Jeg vil løpe om ettermiddagen.',
      score: true,
      startTime:  24,
      stopTime:   26,
      autoNext:   'RANDOM'
    },

    iettermiddag1: {
      msg: 'Jeg går til frisøren <span class="audio-test-clue">dziś popołudniu</span>.',
      answers: [
        { answer: 'i ettermiddag', next: 'iettermiddag2' },
        { answer: 'i formiddag', wrong: true },
        { answer: 'om formiddagen', wrong: true },
        { answer: 'om ettermiddagen', wrong: true }
      ]
    },
    iettermiddag2: {
      msg: 'Jeg går til frisøren i ettermiddag.',
      score: true,
      startTime:  27,
      stopTime:   30,
      autoNext:   'RANDOM'
    },

    omformiddagen1: {
      msg: 'Han lufter hunden <span class="audio-test-clue">przedpołudniami</span>.',
      answers: [
        { answer: 'om formiddagen', next: 'omformiddagen2' },
        { answer: 'om ettermiddagen', wrong: true },
        { answer: 'i ettermiddag', wrong: true },
        { answer: 'i formiddag', wrong: true }
      ]
    },
    omformiddagen2: {
      msg: 'Han lufter hunden om formiddagen.',
      score: true,
      startTime:  31,
      stopTime:   33.5,
      autoNext:   'RANDOM'
    },

    omnatta1: {
      msg: 'Han kan ikke sove <span class="audio-test-clue">w nocy/nocami</span>.',
      answers: [
        { answer: 'om natta', next: 'omnatta2' },
        { answer: 'om kvelden', wrong: true },
        { answer: 'i natt', wrong: true },
        { answer: 'i kveld', wrong: true }
      ]
    },
    omnatta2: {
      msg: 'Han kan ikke sove om natta.',
      score: true,
      startTime:  35,
      stopTime:   37,
      autoNext:   'RANDOM'
    },

    inatt: {
      msg: 'Naboene fester <span class="audio-test-clue">dziś w nocy</span>.',
      answers: [
        { answer: 'i natt', next: 'inatt' },
        { answer: 'i kveld', wrong: true },
        { answer: 'om kvelden', wrong: true },
        { answer: 'om ettermiddagen', wrong: true }
      ]
    },
    inatt: {
      msg: 'Naboene fester i natt.',
      score: true,
      startTime:  38,
      stopTime:   40,
      autoNext:   'RANDOM'
    },

    omenstund1: {
      msg: 'Jeg kommer  <span class="audio-test-clue">za chwilę</span>.',
      answers: [
        { answer: 'om en stund', next: 'omenstund2' },
        { answer: 'i en stund', wrong: true },
        { answer: 'for en stund', wrong: true },
        { answer: 'en stund', wrong: true }
      ]
    },
    omenstund2: {
      msg: 'Jeg kommer om en stund.',
      score: true,
      startTime:  41,
      stopTime:   42.5,
      autoNext:   'RANDOM'
    },

    na1: {
      msg: 'Jeg må stikke <span class="audio-test-clue">teraz</span>.',
      answers: [
        { answer: 'nå', next: 'na2' },
        { answer: 'om en stund', wrong: true },
        { answer: 'om et øyeblikk', wrong: true },
        { answer: 'etterpå', wrong: true }
      ]
    },
    na2: {
      msg: 'Jeg må stikke nå.',
      score: true,
      startTime:  44,
      stopTime:   45.5,
      autoNext:   'RANDOM'
    },

    omentime1: {
      msg: 'Vi skal reise <span class="audio-test-clue">za godzinę</span>.',
      answers: [
        { answer: 'om en time', next: 'omentime2' },
        { answer: 'om en tid', wrong: true },
        { answer: 'i en time', wrong: true },
        { answer: 'timehvis', wrong: true }
      ]
    },
    omentime2: {
      msg: 'Vi skal reise om en time.',
      score: true,
      startTime:  47,
      stopTime:   49,
      autoNext:   'RANDOM'
    },

    omettminutt1: {
      msg: 'Vi er på stedet <span class="audio-test-clue">za minutę</span>.',
      answers: [
        { answer: 'om ett minutt', next: 'omettminutt2' },
        { answer: 'i et minutt', wrong: true },
        { answer: 'om noen minutter', wrong: true },
        { answer: 'på minutt', wrong: true }
      ]
    },
    omettminutt2: {
      msg: 'Vi er på stedet om ett minutt.',
      score: true,
      startTime:  50,
      stopTime:   52,
      autoNext:   'RANDOM'
    },

    omtredager1: {
      msg: 'Han slutter prosjektet <span class="audio-test-clue">za trzy dni</span>.',
      answers: [
        { answer: 'om tre dager', next: 'omtredager2' },
        { answer: 'i tre dager', wrong: true },
        { answer: 'om tre timer', wrong: true },
        { answer: 'på torsdag', wrong: true }
      ]
    },
    omtredager2: {
      msg: 'Han slutter prosjektet om tre dager.',
      score: true,
      startTime:  53,
      stopTime:   56,
      autoNext:   'RANDOM'
    },

    omfemuker1: {
      msg: 'Jeg kommer tilbake til Norge <span class="audio-test-clue">za pięć tygodni</span>.',
      answers: [
        { answer: 'om fem uker', next: 'omfemuker2' },
        { answer: 'om fem måneder', wrong: true },
        { answer: 'om ei uke', wrong: true },
        { answer: 'om to måneder', wrong: true }
      ]
    },
    omfemuker2: {
      msg: 'Jeg kommer tilbake til Norge om fem uker.',
      score: true,
      startTime:  57,
      stopTime:   60,
      autoNext:   'RANDOM'
    },

    omfireman1: {
      msg: 'Jeg åpner en ny butikk <span class="audio-test-clue">za cztery miesiące</span>.',
      answers: [
        { answer: 'om fire måneder', next: 'omfireman2' },
        { answer: 'om et halvt år', wrong: true },
        { answer: 'om fire uker', wrong: true },
        { answer: 'i fire måneder', wrong: true }
      ]
    },
    omfireman2: {
      msg: 'Jeg åpner en ny butikk om fire måneder.',
      score: true,
      startTime:  61,
      stopTime:   64,
      autoNext:   'RANDOM'
    },

    omethalvtar1: {
      msg: 'Han vil slanke seg <span class="audio-test-clue">za pół roku</span>.',
      answers: [
        { answer: 'om et halvt år', next: 'omethalvtar2' },
        { answer: 'om fem måneder', wrong: true },
        { answer: 'i seks måneder', wrong: true },
        { answer: 'om et år', wrong: true }
      ]
    },
    omethalvtar2: {
      msg: 'Han vil slanke seg om et halvt år.',
      score: true,
      startTime:  65,
      stopTime:   67.5,
      autoNext:   'RANDOM'
    },

    omnoenar1: {
      msg: 'Hun blir sjef her <span class="audio-test-clue">za kilka lat</span>.',
      answers: [
        { answer: 'om noen år', next: 'omnoenar2' },
        { answer: 'i noen år', wrong: true },
        { answer: 'hvert år', wrong: true },
        { answer: 'neste år', wrong: true }
      ]
    },
    omnoenar2: {
      msg: 'Hun blir sjef her om noen år.',
      score: true,
      startTime:  69,
      stopTime:   71,
      autoNext:   'RANDOM'
    },

    nextar1: {
      msg: 'De gifter seg <span class="audio-test-clue">w przyszłym roku</span>.',
      answers: [
        { answer: 'neste år', next: 'nextar2' },
        { answer: 'siste år', wrong: true },
        { answer: 'i år', wrong: true },
        { answer: 'om fem måneder', wrong: true }
      ]
    },
    nextar2: {
      msg: 'De gifter seg neste år.',
      score: true,
      startTime:  72,
      stopTime:   74,
      autoNext:   'RANDOM'
    },

    nesteuke: {
      msg: 'Vi sees <span class="audio-test-clue">w przyszłym tygodniu</span>.',
      answers: [
        { answer: 'neste uke', next: 'nesteuke' },
        { answer: 'igjen', wrong: true },
        { answer: 'om ei uke', wrong: true },
        { answer: 'om sju dager', wrong: true }
      ]
    },
    nesteuke: {
      msg: 'Vi sees neste uke.',
      score: true,
      startTime:  75,
      stopTime:   77,
      autoNext:   'RANDOM'
    },

    nestemaned1: {
      msg: 'Jeg begynner et dansekurs <span class="audio-test-clue">w następnym/przyszłym miesiącu</span>.',
      answers: [
        { answer: 'neste måned', next: 'nestemaned2' },
        { answer: 'neste år', wrong: true },
        { answer: 'neste gang', wrong: true },
        { answer: 'om en måned', wrong: true }
      ]
    },
    nestemaned2: {
      msg: 'Jeg begynner et dansekurs neste måned.',
      score: true,
      startTime:  78,
      stopTime:   81,
      autoNext:   'RANDOM'
    },


    nestegang1: {
      msg: 'De vil ikke ta opp lån <span class="audio-test-clue">następnym razem</span>.',
      answers: [
        { answer: 'neste gang', next: 'nestegang2' },
        { answer: 'hver gang', wrong: true },
        { answer: 'om en stund', wrong: true },
        { answer: 'nesten gang', wrong: true }
      ]
    },
    nestegang2: {
      msg: 'Jeg lærer noe nytt hver dag.',
      score: true,
      startTime:  82,
      stopTime:   84.5,
      autoNext:   'RANDOM'
    },


    nytthverdag1: {
      msg: 'Jeg lærer noe nytt <span class="audio-test-clue">codziennie</span>.',
      answers: [
        { answer: 'hver dag', next: 'nytthverdag2' },
        { answer: 'i dag', wrong: true },
        { answer: 'om en dag', wrong: true },
        { answer: 'hver andre dag', wrong: true }
      ]
    },
    nytthverdag2: {
      msg: 'Jeg lærer noe nytt hver dag.',
      score: true,
      startTime:  86,
      stopTime:   88,
      autoNext:   'RANDOM'
    },


    hvermorgen1: {
      msg: 'Jeg løper i parken <span class="audio-test-clue">każdego ranka</span>.',
      answers: [
        { answer: 'hver morgen', next: 'hvermorgen2' },
        { answer: 'i morgen', wrong: true },
        { answer: 'i morges', wrong: true },
        { answer: 'hver dag', wrong: true }
      ]
    },
    hvermorgen2: {
      msg: 'Jeg løper i parken hver morgen.',
      score: true,
      startTime:  89,
      stopTime:   91.5,
      autoNext:   'RANDOM'
    },

    hvertime1: {
      msg: 'Jeg sjekker mobilen <span class="audio-test-clue">co godzinę</span>.',
      answers: [
        { answer: 'hver time', next: 'hvertime2' },
        { answer: 'i en time', wrong: true },
        { answer: 'på en time', wrong: true },
        { answer: 'hver gang', wrong: true }
      ]
    },
    hvertime2: {
      msg: 'Jeg sjekker mobilen hver time.',
      score: true,
      startTime:  93,
      stopTime:   95.5,
      autoNext:   'RANDOM'
    },

    hveruke1: {
      msg: 'Hun ringer til foreldrene <span class="audio-test-clue">co tydzień</span>.',
      answers: [
        { answer: 'hver uke', next: 'hveruke2' },
        { answer: 'hver søndag', wrong: true },
        { answer: 'om uka', wrong: true },
        { answer: 'mange ganger', wrong: true }
      ]
    },
    hveruke2: {
      msg: 'Hun ringer til foreldrene hver uke.',
      score: true,
      startTime:  97,
      stopTime:   100,
      autoNext:   'RANDOM'
    },

    annenhveruke1: {
      msg: 'Han jobber om morgenen <span class="audio-test-clue">co drugi tydzień</span>.',
      answers: [
        { answer: 'annenhver uke', next: 'annenhveruke2' },
        { answer: 'hver andre måned', wrong: true },
        { answer: 'hver uke', wrong: true },
        { answer: 'hver andre gang', wrong: true }
      ]
    },
    annenhveruke2: {
      msg: 'Han jobber om morgenen annenhver uke.',
      score: true,
      startTime:  101,
      stopTime:   104,
      autoNext:   'RANDOM'
    },

    annenhvermaned1: {
      msg: 'Jeg flyr til Bergen <span class="audio-test-clue">co drugi miesiąc</span>.',
      answers: [
        { answer: 'annehver måned', next: 'annenhvermaned2' },
        { answer: 'hver andre uke', wrong: true },
        { answer: 'hver måned', wrong: true },
        { answer: 'annenhver uke', wrong: true }
      ]
    },
    annenhvermaned2: {
      msg: 'Jeg flyr til Bergen annehver måned.',
      score: true,
      startTime:  105,
      stopTime:   108,
      autoNext:   'RANDOM'
    },

    hvergang1: {
      msg: 'Han kommer for sent <span class="audio-test-clue">za każdym razem</span>.',
      answers: [
        { answer: 'hver gang', next: 'hvergang2' },
        { answer: 'annenhver gang', wrong: true },
        { answer: 'hver time', wrong: true },
        { answer: 'timevis', wrong: true }
      ]
    },
    hvergang2: {
      msg: 'Han kommer for sent hver gang.',
      score: true,
      startTime:  109,
      stopTime:   111.5,
      autoNext:   'RANDOM'
    },

    hvertar: {
      msg: 'Dere betaler skatt <span class="audio-test-clue">każdego roku</span>.',
      answers: [
        { answer: 'hvert år', next: 'hvertar' },
        { answer: 'hver andre år', wrong: true },
        { answer: 'aldri', wrong: true },
        { answer: 'hvis dere husker det', wrong: true }
      ]
    },
    hvertar: {
      msg: 'Dere betaler skatt hvert år.',
      score: true,
      startTime:  113,
      stopTime:   115.5,
      autoNext:   'RANDOM'
    },

    hversommer1: {
      msg: 'De besøker venner <span class="audio-test-clue">każdego lata</span>.',
      answers: [
        { answer: 'hver sommer', next: 'hversommer2' },
        { answer: 'hver vinter', wrong: true },
        { answer: 'hver måned', wrong: true },
        { answer: 'hver vår', wrong: true }
      ]
    },
    hversommer2: {
      msg: 'De besøker venner hver sommer.',
      score: true,
      startTime:  117,
      stopTime:   119.5,
      autoNext:   'RANDOM'
    },

    hvervinter1: {
      msg: 'De reiser til Spania <span class="audio-test-clue">każdej zimy</span>.',
      answers: [
        { answer: 'hver vinter', next: 'hvervinter2' },
        { answer: 'om vinteren', wrong: true },
        { answer: 'i helga', wrong: true },
        { answer: 'hver ferie', wrong: true }
      ]
    },
    hvervinter2: {
      msg: 'De reiser til Spania hver vinter.',
      score: true,
      startTime:  121,
      stopTime:   123.5,
      autoNext:   'RANDOM'
    },

    ihost1: {
      msg: 'Det regner ikke <span class="audio-test-clue">tej jesieni</span>.',
      answers: [
        { answer: 'i høst', next: 'ihost2' },
        { answer: 'siste høst', wrong: true },
        { answer: 'om høsten', wrong: true },
        { answer: 'hver høst', wrong: true }
      ]
    },
    ihost2: {
      msg: 'Det regner ikke i høst.',
      score: true,
      startTime:  125,
      stopTime:  126.5,
      autoNext:   'RANDOM'
    },

    ivar1: {
      msg: 'De bytter dørklokka <span class="audio-test-clue">tej wiosny</span>.',
      answers: [
        { answer: 'i vår', next: 'ivar2' },
        { answer: 'hver vår', wrong: true },
        { answer: 'hver andre høst', wrong: true },
        { answer: 'hver høst', wrong: true }
      ]
    },
    ivar2: {
      msg: 'De bytter dørklokka i vår.',
      score: true,
      startTime:  128,
      stopTime:   130,
      autoNext:   'RANDOM'
    },

    itoar1: {
      msg: 'Vi skal bo i Ålesund <span class="audio-test-clue">przez dwa lata</span>.',
      answers: [
        { answer: 'i to år', next: 'itoar2' },
        { answer: 'om to år', wrong: true },
        { answer: 'for to år siden', wrong: true },
        { answer: 'for to år', wrong: true }
      ]
    },
    itoar2: {
      msg: 'Vi skal bo i Ålesund i to år.',
      score: true,
      startTime:  131,
      stopTime:   134,
      autoNext:   'RANDOM'
    },

    iovermorgen1: {
      msg: 'De leverer skapene <span class="audio-test-clue">pojutrze</span>.',
      answers: [
        { answer: 'i overmorgen', next: 'iovermorgen2' },
        { answer: 'om noen dager', wrong: true },
        { answer: 'på tirsdag', wrong: true },
        { answer: 'i morgen', wrong: true }
      ]
    },
    iovermorgen2: {
      msg: 'De leverer skapene i overmorgen.',
      score: true,
      startTime:  135,
      stopTime:   137,
      autoNext:   'RANDOM'
    },

    ihelga1: {
      msg: 'De leverer skapene <span class="audio-test-clue">pojutrze</span>.',
      answers: [
        { answer: 'i overmorgen', next: 'ihelga2' },
        { answer: 'om noen dager', wrong: true },
        { answer: 'på tirsdag', wrong: true },
        { answer: 'i morgen', wrong: true }
      ]
    },
    ihelga2: {
      msg: 'De leverer skapene i overmorgen.',
      score: true,
      startTime:  138,
      stopTime:   140.5,
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
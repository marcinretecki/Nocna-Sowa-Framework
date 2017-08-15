<script>
function LasData() {

  this.category = 'audio-test';   // chat|setninger|etc


  this.testNotes = [
  ];


  this.intro = {
    _intro1: {
      msg:        'Załóż słuchawki, jeśli chcesz. #emoji-1f3a7;',
      autoNext:   '_intro2',
    },
    _intro2: {
      msg:        '<p>W tym wyzwaniu nauczymy Cię wymowy liczb. Zrobimy to na wyrywki, bo na co dzień tak ich będziesz używać. Powtarzaj na głos, żeby nie mieć bariery mówienia.</p>',
      autoNext:   'ENDINTRO',
    },
  };


  this.words = {
    j:              [ 'null', 'en', 'to', 'tre', 'fire', 'fem', 'seks', 'sju', 'åtte', 'ni', 'ti',
                      'elleve', 'tolv', 'tretten', 'fjorten', 'femten', 'seksten', 'sytten', 'atten', 'nitten' ],
    d:              [ '', '', 'tjue', 'tretti', 'førti', 'femti', 'seksti', 'sytti', 'åtti', 'nitti' ],
    e: {
      ett:          'ett',
      numEnEiEt:    'én, éi, ett<br />zgodnie z rodzajem',
      hundre:       'hundre',
      tusen:        'tusen',
      og:           'og'
    }
  };


  this.chat = {

    num0: {
      startTime:  0.5,
      duration:   0.45
    },

    num1: {
      startTime:  1.5,
      duration:   0.45
    },

    numEnEiEt:  {
      startTime:  2.5,
      duration:   2.3
    },

    numEt:  {
      startTime:  5.5,
      duration:   0.5
    },

    num2: {
      startTime:  6.5,
      duration:   0.4
    },

    num3: {
      startTime:  7.5,
      duration:   0.5
    },

    num4: {
      startTime:  8.5,
      duration:   0.7
    },

    num5: {
      startTime:  10,
      duration:   0.5
    },

    num6: {
      startTime:  11.5,
      duration:   0.75
    },

    num7: {
      startTime:  13,
      duration:   0.6
    },

    num8: {
      startTime:  14.5,
      duration:   0.6
    },

    num9: {
      startTime:  16,
      duration:   0.5
    },

    num10: {
      startTime:  17.5,
      duration:   0.45
    },

    num11: {
      startTime:  18.5,
      duration:   0.62
    },

    num12: {
      startTime:  20,
      duration:   0.5
    },

    num13: {
      startTime:  21,
      duration:   0.72
    },

    num14: {
      startTime:  22.5,
      duration:   0.7
    },

    num15: {
      startTime:  24,
      duration:   0.8
    },

    num16: {
      startTime:  25.5,
      duration:   0.82
    },

    num17: {
      startTime:  27,
      duration:   0.7
    },

    num18: {
      startTime:  28.5,
      duration:   0.6
    },

    num19: {
      startTime:  30,
      duration:   0.7
    },

    num20: {
      startTime:  31.5,
      duration:   0.65
    },

    num30: {
      startTime:  33,
      duration:   0.68
    },

    num40: {
      startTime:  34.5,
      duration:   0.7
    },

    num50: {
      startTime:  36,
      duration:   0.8
    },

    num60: {
      startTime:  37.5,
      duration:   0.73
    },

    num70: {
      startTime:  39,
      duration:   0.7
    },

    num80: {
      startTime:  40.5,
      duration:   0.63
    },

    num90: {
      startTime:  42,
      duration:   0.6
    },

    num100: {
      startTime:  43.5,
      duration:   0.65
    },

    num1000: {
      startTime:  45,
      duration:   0.71
    },

    og: {
      startTime:  46.5,
      duration:   0.3
    },


    msg: {
      msg:        '',
      score:      'correct',
      autoNext:   'RANDOM'
    }


  };


}
</script>
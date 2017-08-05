<script>
function LasData() {

  this.category = 'setninger';   // chat|audio-test|etc


  this.testNotes = [
  ];


  this.intro = {
    _a1: {
      msg:        'Ułóż pytania z podanych słów.',
      autoNext:   'ENDINTRO'
    }
  };


  this.chat = {

    _aa1: {
      set: [
                  ['Tor', 'bor', 'i nord']
      ],
      trans:      'Tor mieszka na północy.',
      autoNext:   '_aa2'
    },

    _aa2: {
      set: [
                  ['Tor', 'bodde', 'i', 'nord', 'for 2 år siden'],
      ],
      trans:      'Tor mieszkał na północy dwa lata temu.',
      autoNext:   '_aa3'
    },

    _aa3: {
      set: [
                  ['Tor', 'bor', 'i', 'nord']
      ],
      trans:      'Tor mieszka na północy.',
      autoNext:   'RANDOM'
    },

  };


}
</script>
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
                  ['er', 'adam', 'fra', 'Norge', '?']
      ],
      trans:      'Czy Adam jest z Norwegii?',
      autoNext:   'RANDOM'
    },

    _aa2: {
      set: [
                  ['kommer', 'du', 'og', 'din', 'kone', 'fra', 'Norge', '?'],
                  ['kommer', 'din', 'kone', 'og', 'du', 'fra', 'Norge', '?']
      ],
      trans:      'Czy Ty i Twoja żona pochodzicie z Norwegii?',
      autoNext:   'RANDOM'
    }

  };


}
</script>
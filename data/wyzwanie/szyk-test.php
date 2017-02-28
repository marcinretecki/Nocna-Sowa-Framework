<script>
function LasSetningerData() {

  this.testNotes = [
  ];

  this.intro = {
    a1: {
      msg:        'Ułuż pytania z podanych słów.',
      autoNext:   'ENDINTRO'
    }
  };


  this.chat = {

    aa1: {
      set: [
                  ['er', 'adam', 'fra', 'Norge', '?']
      ],
      trans:      'Czy Adam jest z Norwegii?',
      autoNext:   'RANDOM'
    },

    aa2: {
      set: [
                  ['kommer', 'du', 'og', 'din', 'kone', 'fra', 'Norge', '?'],
                  ['kommer', 'din', 'kone', 'og', 'du', 'fra', 'Norge', '?']
      ],
      trans:      'Czy Ty i Twoja żona pochodzicie z Norwegii?',
      autoNext:   'RANDOM'
    }

  };


  this.end = {

    end1: {
      msg:        'END',
      startTime:  0,
      stopTime:   0
    }

  };

}
</script>
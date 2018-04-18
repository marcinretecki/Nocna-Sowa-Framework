<script>
function LasData() {

  this.category = 'word-quiz';   // chat|setninger|etc


  this.testNotes = [
    ''
  ];

  this.intro = {
    _intro1: {
      msg:        'Word Quiz msg 1',
      autoNext:   '_intro2',
    },
    _intro2: {
      msg:        '<p>MSG 2</p>',
      autoNext:   'ENDINTRO',
    },


  };

  //
  //  Main
  //
  this.chat = {

    _aa1: {
      msg:        '<span class="mark mark--green">kolej żelazna</span>',
      answers: [
        {
          answer: '<i>(et) jern</i>  <br /> <span class="size-0">żelazo</span>',
          score: 'partial',
          next: '_aa2',
        },
        {
          answer: '<i>en bane</i> <br /> <span class="size-0">kolej</span>',
          score: 'partial',
        },
        {
          answer: '<i>et tog</i> <br /> <span class="size-0">pociąg</span>',
          //score: 'wrong',
        },
        {
          answer: '<i>ei vogn</i> <br /> <span class="size-0">wagon</span>',
          //score: 'wrong',
        },
      ]
    },
    _aa2: {
      msg:        '',
      startTime:  0,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


  }


}
</script>
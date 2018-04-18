<script>
function LasData() {

  this.category = 'terminal';   // chat|setninger|etc


  this.testNotes = [
    ''
  ];

  this.intro = {
    _a1: {
      bubbles: [
        'Hei Terminal! #emoji-1f60e;',
        '<img src="/las/c/i/cza-niereg/Trampoline-Swing-With-leaves.gif" />',
        'Hvor bor du? #'
      ],
      command: 'Jeg er i #cmd|0|Norge; #cmd|1|Polen; ',
      answers: [
        { answer: 'Jeg er i Norge.', next: '_a2' },
        { answer: 'Jeg er i Polen.', next: '_a2' },
      ],
    },
    _a2: {
      bubbles: [
        'test'
      ],
      autoNext: 'ENDINTRO'
    }
  };



  //
  //  Main
  //
  this.chat = {


  };





}
</script>
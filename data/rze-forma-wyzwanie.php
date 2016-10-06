<script>
function LasAudioData() {

  //  Albo msg i answers
  //  albo autoNext
  //  ale nie oba na raz!
  //  time jest zawsze

  this.intro = {
    a1: {
      startTime: 0,
      stopTime:  5,
      msg: "To jak?",
      answers: [
        { answer: 'test 1', next: 'a3' },
        { answer: 'test 2', next: 'a2' }
      ]
    },
    a2: {
      startTime:  7,
      stopTime:  10,
      autoNext: 'RANDOM'
    },
    a3: {
      startTime: 11,
      stopTime:  13,
      autoNext: 'RANDOM'
    }
  };


  this.chat = {

    a1: {
      startTime:  1,
      stopTime:   3,
      answerOne:  {answer: '', next: 'a2'},
      answerTwo: {answer: '', next: 'a1b'}
    },
    a1b: {
      msg: '',
      startTime:  1,
      stopTime:   3,
      answerOne: {answer: '', next: 'a2'},
    },
    a2: {
      startTime:  1,
      stopTime:   3,
      autoNext: 'RANDOM'
    }

//    a1: {
//      msg: '',          //  message or question string showed over answer buttons
//      startTime:  1,        //  startTime time in seconds
//      stopTime:   3,        //  stopTime time in seconds
//      answerOne:  {answer: '', next: 'a2'},
//      answerTwo: {answer: '', next: 'a1b'}
//    },
//    a1b: {
//      msg: '',
//      startTime:  1,
//      stopTime:   3,
//      answerOne: {answer: '', next: 'a2'},
//    },
//    a2: {
//      startTime:  1,
//      stopTime:   3,
//      autoNext: 'RANDOM'
//    }

  };


  this.end = {

  };



}
</script>
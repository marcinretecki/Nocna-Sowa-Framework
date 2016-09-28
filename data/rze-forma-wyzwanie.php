<script>
function LasAudioData() {

  /*
    struktura danych
    - ładujemy i włączamy pierwszy plik dźwiękowy
    - user słucha, może zapałzować lub cofnąć
    - na koniec nagrania, pojawiają się możliwe odpowiedzi
    - każda z odpowiedzi prowadzi do innego nagrania
    - wszystkie możliwe nagrania są ładowane w tle
    - na koniec dziękujemy i user może wrócić do innych ćwiczeń

  */

  this.intro = {
    a1: {
      start:  0,
      stop:   4,
      answerLeft:  {answer: 'test 1', next: 'a2'},
      answerRight: {answer: 'test 2', next: 'a1b'}
    },
    a1b: {
      start:  5,
      stop:   10,
      answerLeft: {answer: 'test 3', next: 'a2'},
    },
    a2: {
      start:  7,
      stop:   10,
      autoNext: 'RANDOM'
    }
  };


  this.chat = {

    a1: {
      start:  1,
      stop:   3,
      answerLeft:  {answer: '', next: 'a2'},
      answerRight: {answer: '', next: 'a1b'}
    },
    a1b: {
      msg: '',
      start:  1,
      stop:   3,
      answerLeft: {answer: '', next: 'a2'},
    },
    a2: {
      start:  1,
      stop:   3,
      autoNext: 'RANDOM'
    }

//    a1: {
//      msg: '',          //  message or question string showed over answer buttons
//      start:  1,        //  start time in seconds
//      stop:   3,        //  stop time in seconds
//      answerLeft:  {answer: '', next: 'a2'},
//      answerRight: {answer: '', next: 'a1b'}
//    },
//    a1b: {
//      msg: '',
//      start:  1,
//      stop:   3,
//      answerLeft: {answer: '', next: 'a2'},
//    },
//    a2: {
//      start:  1,
//      stop:   3,
//      autoNext: 'RANDOM'
//    }

  };


  this.end = {

  };



}
</script>
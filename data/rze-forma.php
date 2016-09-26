<script>
function LasAudioData() {


  /*
    struktura danych
    - ładujemy i włączamy pierwszy plik dźwiękowy
    - user słucha, może zapałzować lub cofnąć
    - na koniec nagrania, pojawiają się możlie odpowiedzi
    - każda z odpowiedzi prowadzi do innego nagrania
    - wszystkie możliwe nagrania są ładowane w tle
    - na koniec dizękujemy i user może wrócić do innych ćwiczeń

  */

  this.intro = {
    a1: {
      bubbles: ['Cześć, tu Sowa.'],
      answerLeft: {answer: 'Co masz tam Sowo na dziś?', next: 'a2'}
    },
    a2: {
      bubbles: ['Liczbę mnogą rzeczownika w czasie jednej imprezy.', '<img src="/i/rze-lm/tumblr_o08353uHDA1sblcs4o1_500.gif" />', 'Wchodzisz w to?'],
      answerLeft: {answer: 'Pewnie!', next: 'a3'}
    },
    a3: {
      bubbles: ['OK. To zaczynamy!'],
      autoNext: 'ENDINTRO'
    },

    b1: {
      bubbles: ['Hej, tu Sowa.', 'Gotowy na liczbę mnogą rzeczownika? <span class="emojione emojione-1f575-1f3fc"></span>'],
      answerLeft: {answer: 'Pewnie! <span class="emojione emojione-1f493"></span>', next: 'b2'}
    },
    b2: {
      bubbles: ['<img src="/i/rze-lm/Countdown-321.gif" />', 'To zaczynamy!'],
      autoNext: 'ENDINTRO'
    }
  };


  this.chat = {


//    a1: {
//      bubbles: [''],
//      answerLeft: {answer: '', next: 'a2'},
//      answerRight: {answer: '', next: 'a1b'}
//    },
//    a1b: {
//      bubbles: [''],
//      answerLeft: {answer: '', next: 'a2'},
//    },
//    a2: {
//      bubbles: [''],
//      autoNext: 'RANDOM'
//    }

  };


  this.end = {
    a1: {
      bubbles: ['To koniec na dziś, ale możesz zawsze tu wrócić i przećwiczyć te słowa w innej kolejności.', 'Ale czekaj. Zrobimy Ci jeszcze pamiątkową fotografię.', '<img src="/i/rze-lm/tumblr-lxl3cv0ulu1qe0eclo1-r1-500.gif" />', 'Jesteś piękny!'],
      autoNext: 'END'
    },
    b1: {
      bubbles: ['To koniec na dziś, ale możesz zawsze tu wrócić i przećwiczyć te słowa w innej kolejności.', 'God natt!', '<img src="/i/rze-lm/j3vao.gif" />'],
      autoNext: 'END'
    }
  };



}
</script>
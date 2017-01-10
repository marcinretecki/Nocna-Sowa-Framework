<script>
function LasAudioData() {

  this.intro = {
    a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO'/*,
      more: { startTime: 0, stopTime: 0 }*/
    }
  };


  this.chat = {

    aa1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'aa2'
    },
    aa2: {
      msg:        'Bor Tom i Bergen?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'aa3'
    },
    aa3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'aa4'
    },
    aa4: {
      msg:        'Nei, Tom bor ikke i Bergen. Han bor i Bodø.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ab1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ab2'
    },
    ab2: {
      msg:        'Kommer du fra Norge?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ab3'
    },
    ab3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ab4'
    },
    ab4: {
      msg:        'Nei, jeg kommer ikke fra Norge. Jeg kommer fra Polen.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ac1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ac2'
    },
    ac2: {
      msg:        'Har du barn?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ac3'
    },
    ac3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ac4'
    },
    ac4: {
      msg:        'Ja, jeg har to barn.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ad1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ad2'
    },
    ad2: {
      msg:        'Har du en bil?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ad3'
    },
    ad3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ad4'
    },
    ad4: {
      msg:        'Nei, jeg har ikke en bil. Jeg har en sykkel.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ae1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ae2'
    },
    ae2: {
      msg:        'Liker du å kjøpe sko?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ae3'
    },
    ae3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ae4'
    },
    ae4: {
      msg:        'Ja, jeg liker å kjøpe sko.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    af1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'af2'
    },
    af2: {
      msg:        'Snakker du ofte med faren?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'af3'
    },
    af3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'af4'
    },
    af4: {
      msg:        'Ja, jeg snakker med ham hver dag.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ah1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ah2'
    },
    ah2: {
      msg:        'Har du mye energi?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ah3'
    },
    ah3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ah4'
    },
    ah4: {
      msg:        'Ja, jeg har mye energi.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ag1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ag2'
    },
    ag2: {
      msg:        'Har du mange venner?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ag3'
    },
    ag3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ag4'
    },
    ag4: {
      msg:        'Ja, jeg har mange venner.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    aj1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'aj2'
    },
    aj2: {
      msg:        'Er det mye sand på stranda?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'aj3'
    },
    aj3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'aj4'
    },
    aj4: {
      msg:        'Nei, det er ikke mye sand. Bare steiner.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ak1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ak2'
    },
    ak2: {
      msg:        'Har du mange klær?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ak3'
    },
    ak3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ak4'
    },
    ak4: {
      msg:        'Nei, jeg trenger ikke mange klær.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    al1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'al2'
    },
    al2: {
      msg:        'Har du vondt i kneet?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'al3'
    },
    al3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'al4'
    },
    al4: {
      msg:        'Ja, jeg har vondt i kneet.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    am1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'am2'
    },
    am2: {
      msg:        'Har du en båt i Norge?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'am3'
    },
    am3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'am4'
    },
    am4: {
      msg:        'Jeg har ikke. Jeg kan låne båten.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    an1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'an2'
    },
    an2: {
      msg:        'Ser du disse mennene?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'an3'
    },
    an3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'an4'
    },
    an4: {
      msg:        'Ja, jeg ser disse mennene.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ao1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ao2'
    },
    ao2: {
      msg:        'Bruker du mye sukker?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ao3'
    },
    ao3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ao4'
    },
    ao4: {
      msg:        'Ikke så mye.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ap1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ap2'
    },
    ap2: {
      msg:        'Får du mange gaver til bursdag?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ap3'
    },
    ap3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ap4'
    },
    ap4: {
      msg:        'Ja, jeg får mange gaver til bursdag.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ar1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ar2'
    },
    ar2: {
      msg:        'Liker han å se på fotballkamper?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ar3'
    },
    ar3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ar4'
    },
    ar4: {
      msg:        'Ja, han liker å se på fotballkamper.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    as1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'as2'
    },
    as2: {
      msg:        'Er kona di på jobben nå?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'as3'
    },
    as3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'as4'
    },
    as4: {
      msg:        'Nei, hun har fri i dag.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    at1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'at2'
    },
    at2: {
      msg:        'Er det ikke lys her?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'at3'
    },
    at3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'at4'
    },
    at4: {
      msg:        'Dessverre, det er ikke lys her.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ax1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ax2'
    },
    ax2: {
      msg:        'Er det mange mennesker på kurset?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ax3'
    },
    ax3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ax4'
    },
    ax4: {
      msg:        'Det er mange mennesker på kurset.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ay1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ay2'
    },
    ay2: {
      msg:        'Har tanta mange hunder?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ay3'
    },
    ay3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ay4'
    },
    ay4: {
      msg:        'Nei, hun har bare en hund.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    az1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'az2'
    },
    az2: {
      msg:        'Er det mye snø?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'az3'
    },
    az3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'az4'
    },
    az4: {
      msg:        'Ja, det er mye snø.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    ba1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'ba2'
    },
    ba2: {
      msg:        'Bor de på øya?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'ba3'
    },
    ba3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'ba4'
    },
    ba4: {
      msg:        'Ja, de bor på øya.',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    bb1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'bb2'
    },
    bb2: {
      msg:        'Hører du meg?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'bb3'
    },
    bb3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'bb4'
    },
    bb4: {
      msg:        'Jeg hører deg ikke. Kan du gjenta?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'RANDOM'
    },


    bc1: {
/*      startTime:  0,
      stopTime:   2.5,*/
      pauseTime:  8,
      autoNext:   'bc2'
    },
    bc2: {
      msg:        'Liker du å få blomster?',
/*      startTime:  4,
      stopTime:   6.5,*/
      autoNext:   'bc3'
    },
    bc3: {
/*      startTime:  4,
      stopTime:   6.5,*/
      pauseTime:  8,
      autoNext:   'bc4'
    },
    bc4: {
      msg:        'Jeg liker å få blomster veldig mye.',
/*      startTime:  4,
      stopTime:   6.5,*/
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
<script>
function LasAudioData() {

  this.testNotes = [
    'Jenta stopper å spise søtsaker. Może dodać więcej: godteri - bo niektórzy znają to słowo',
    'Hun lærer å konsentrere seg om en ting. - czy tu jest dobre czytanie slowa ting? moze jest ok. sprawdz.',
    'nie ma zakończenia'
  ];

  this.intro = {
    a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:     'ENDINTRO'/*,
      more: {
        startTime:  0,
        duration:   26,
      }*/
    }
  };


  this.chat = {

    aa1: {
      spokenWord: '',
      startTime:  0,
      duration:   3 - 0,
      pauseTime:  6,
      autoNext:   'aa2'
    },
    aa2: {
      msg:        'Jeg liker å være ute.',
      startTime:  4,
      duration:   7 - 4,
      autoNext:   'RANDOM'
    },


    ab1: {
      spokenWord: '',
      startTime:  8,
      duration:   11 - 8,
      pauseTime:  6,
      autoNext:   'ab2'
    },
    ab2: {
      msg:        'Hun liker å få gaver.',
      startTime:  12,
      duration:   15 - 12,
      autoNext:   'RANDOM'
    },


    ac1: {
      spokenWord: '',
      startTime:  16,
      duration:   18 - 16,
      pauseTime:  6,
      autoNext:   'ac2'
    },
    ac2: {
      msg:        'Vi liker å reise.',
      startTime:  19,
      duration:   21 - 19,
      autoNext:   'RANDOM'
    },


    ad1: {
      spokenWord: '',
      startTime:  22,
      duration:   24.5 - 22,
      pauseTime:  8,
      autoNext:   'ad2'
    },
    ad2: {
      msg:        'Du liker å fortelle eventyr.',
      startTime:  26,
      duration:   29 - 26,
      autoNext:   'RANDOM'
    },


    ae1: {
      spokenWord: '',
      startTime:  30,
      duration:   32.5 - 30,
      pauseTime:  8,
      autoNext:   'ae2'
    },
    ae2: {
      msg:        'Dere liker å bo i Oslo.',
      startTime:  34,
      duration:   36.5 - 34,
      autoNext:   'RANDOM'
    },


    af1: {
      spokenWord: '',
      startTime:  38,
      duration:   40.5 - 38,
      pauseTime:  6,
      autoNext:   'af2'
    },
    af2: {
      msg:        'Han trenger å snakke.',
      startTime:  42,
      duration:   44 - 42,
      autoNext:   'RANDOM'
    },


    ag1: {
      spokenWord: '',
      startTime:  45,
      duration:   48 - 45,
      pauseTime:  8,
      autoNext:   'ag2'
    },
    ag2: {
      msg:        'De trenger å tro i noe.',
      startTime:  49,
      duration:   51   - 49,
      autoNext:   'RANDOM'
    },


    ah1: {
      spokenWord: '',
      startTime:  52,
      duration:   55.5 - 52,
      pauseTime:  8,
      autoNext:   'ah2'
    },
    ah2: {
      msg:        'Han trenger å ligge og slappe av.',
      startTime:  57,
      duration:   59.5 - 57,
      autoNext:   'RANDOM'
    },


    aj1: {
      spokenWord: '',
      startTime:  61,
      duration:   64 - 61,
      pauseTime:  8,
      autoNext:   'aj2'
    },
    aj2: {
      msg:        'De trenger å kjøpe klær.',
      startTime:  65,
      duration:   67.5 - 65,
      autoNext:   'RANDOM'
    },


    ai1: {
      spokenWord: '',
      startTime:  69,
      duration:   71.5 - 69,
      pauseTime:  8,
      autoNext:   'ai2'
    },
    ai2: {
      msg:        'Vi prøver å lese på norsk.',
      startTime:  73,
      duration:   75.5 - 73,
      autoNext:   'RANDOM'
    },


    ak1: {
      spokenWord: '',
      startTime:  77,
      duration:   80 - 77,
      pauseTime:  6,
      autoNext:   'ak2'
    },
    ak2: {
      msg:        'Dere prøver å forstå.',
      startTime:  81,
      duration:   83 - 81,
      autoNext:   'RANDOM'
    },


    al1: {
      spokenWord: '',
      startTime:  84,
      duration:   87 - 84,
      pauseTime:  9,
      autoNext:   'al2'
    },
    al2: {
      msg:        'Jeg prøver å høre på norsk radio.',
      startTime:  88,
      duration:   91 - 88,
      autoNext:   'RANDOM'
    },


    ba1: {
      spokenWord: '',
      startTime:  92,
      duration:   95 - 92,
      pauseTime:  8,
      autoNext:   'ba2'
    },
    ba2: {
      msg:        'De prøver å kjøre i byen.',
      startTime:  96,
      duration:   98.5 - 96,
      autoNext:   'RANDOM'
    },


    bb1: {
      spokenWord: '',
      startTime:  100,
      duration:   102.5 - 100,
      pauseTime:  6,
      autoNext:   'bb2'
    },
    bb2: {
      msg:        'Hun lærer å gå.',
      startTime:  104,
      duration:   105.5 - 104,
      autoNext:   'RANDOM'
    },


    bc1: {
      spokenWord: '',
      startTime:  107,
      duration:   109.5 - 107,
      pauseTime:  6,
      autoNext:   'bc2'
    },
    bc2: {
      msg:        'Han lærer å vente.',
      startTime:  111,
      duration:   113 - 111,
      autoNext:   'RANDOM'
    },


    be1: {
      spokenWord: '',
      startTime:  121,
      duration:   124.5 - 121,
      pauseTime:  10,
      autoNext:   'be2'
    },
    be2: {
      msg:        'Hun lærer å konsentrere seg om en ting.',
      startTime:  126,
      duration:   129.5 - 126,
      autoNext:   'RANDOM'
    },


    bf1: {
      spokenWord: '',
      startTime:  131,
      duration:   134 - 131,
      pauseTime:  8,
      autoNext:   'bf2'
    },
    bf2: {
      msg:        'Barnet begynner å bli i barnehagen.',
      startTime:  135,
      duration:   138.5 - 135,
      autoNext:   'RANDOM'
    },


    bg1: {
      spokenWord: '',
      startTime:  140,
      duration:   143 - 140,
      pauseTime:  6,
      autoNext:   'bg2'
    },
    bg2: {
      msg:        'Mannen begynner å svømme.',
      startTime:  144,
      duration:   146 - 144,
      autoNext:   'RANDOM'
    },


    bh1: {
      spokenWord: '',
      startTime:  147,
      duration:   149.5 - 147,
      pauseTime:  6,
      autoNext:   'bh2'
    },
    bh2: {
      msg:        'Kvinna begynner å trene.',
      startTime:  151,
      duration:   153.5 - 151,
      autoNext:   'RANDOM'
    },


    bi1: {
      spokenWord: '',
      startTime:  155,
      duration:   158 - 155,
      pauseTime:  8,
      autoNext:   'bi2'
    },
    bi2: {
      msg:        'Hun begynner å klare på jobben.',
      startTime:  159,
      duration:   161.5 - 159,
      autoNext:   'RANDOM'
    },


    bk1: {
      spokenWord: '',
      startTime:  163,
      duration:   165.5 - 163,
      pauseTime:  6,
      autoNext:   'bk2'
    },
    bk2: {
      msg:        'De slutter å drikke.',
      startTime:  167,
      duration:   169 - 167,
      autoNext:   'RANDOM'
    },


    bl1: {
      spokenWord: '',
      startTime:  170,
      duration:   172.5 - 170,
      pauseTime:  8,
      autoNext:   'bl2'
    },
    bl2: {
      msg:        'Han slutter å studere økonomi.',
      startTime:  174,
      duration:   176.5 - 174,
      autoNext:   'RANDOM'
    },


    bm1: {
      spokenWord: '',
      startTime:  178,
      duration:   180.5 - 178,
      pauseTime:  6,
      autoNext:   'bm2'
    },
    bm2: {
      msg:        'Hun stopper å ringe.',
      startTime:  182,
      duration:   183.5 - 182,
      autoNext:   'RANDOM'
    },


    bn1: {
      spokenWord: '',
      startTime:  185,
      duration:   187.5 - 185,
      pauseTime:  6,
      autoNext:   'bn2'
    },
    bn2: {
      msg:        'Han stopper å komme.',
      startTime:  189,
      duration:   190.5 - 189,
      autoNext:   'RANDOM'
    },


    bp1: {
      spokenWord: '',
      startTime:  192,
      duration:   195 - 192,
      pauseTime:  8,
      autoNext:   'bp2'
    },
    bp2: {
      msg:        'Jenta stopper å spise godteri.',
      startTime:  196,
      duration:   199 - 196,
      autoNext:   'RANDOM'
    },


    bo1: {
      spokenWord: '',
      startTime:  200,
      duration:   203 - 200,
      pauseTime:  8,
      autoNext:   'bo2'
    },
    bo2: {
      msg:        'Faren stopper å gi penger.',
      startTime:  204,
      duration:   206.5 - 204,
      autoNext:   'RANDOM'
    }



  };


  this.end = {

    end1: {
      msg:        'END',
      startTime:  0,
      duration:   0
    }

  };



}
</script>
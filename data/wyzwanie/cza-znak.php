<script>
function LasData() {

  this.testNotes = [
    'Jenta stopper å spise søtsaker. Może dodać więcej: godteri - bo niektórzy znają to słowo',
    'Hun lærer å konsentrere seg om en ting. - czy tu jest dobre czytanie slowa ting? moze jest ok. sprawdz.',
    'nie ma zakończenia'
  ];

  this.intro = {
    _a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:     'ENDINTRO'/*,
      more: {
        startTime:  0,
        duration:   26,
      }*/
    }
  };


  this.chat = {

    _aa1: {
      spokenWord: '',
      startTime:  0,
      duration:   3 - 0,
      pauseTime:  6,
      autoNext:   '_aa2'
    },
    _aa2: {
      msg:        'Jeg liker å være ute.',
      startTime:  4,
      duration:   7 - 4,
      autoNext:   'RANDOM'
    },


    _ab1: {
      spokenWord: '',
      startTime:  8,
      duration:   11 - 8,
      pauseTime:  6,
      autoNext:   '_ab2'
    },
    _ab2: {
      msg:        'Hun liker å få gaver.',
      startTime:  12,
      duration:   15 - 12,
      autoNext:   'RANDOM'
    },


    _ac1: {
      spokenWord: '',
      startTime:  16,
      duration:   18 - 16,
      pauseTime:  6,
      autoNext:   '_ac2'
    },
    _ac2: {
      msg:        'Vi liker å reise.',
      startTime:  19,
      duration:   21 - 19,
      autoNext:   'RANDOM'
    },


    _ad1: {
      spokenWord: '',
      startTime:  22,
      duration:   24.5 - 22,
      pauseTime:  8,
      autoNext:   '_ad2'
    },
    _ad2: {
      msg:        'Du liker å fortelle eventyr.',
      startTime:  26,
      duration:   29 - 26,
      autoNext:   'RANDOM'
    },


    _ae1: {
      spokenWord: '',
      startTime:  30,
      duration:   32.5 - 30,
      pauseTime:  8,
      autoNext:   '_ae2'
    },
    _ae2: {
      msg:        'Dere liker å bo i Oslo.',
      startTime:  34,
      duration:   36.5 - 34,
      autoNext:   'RANDOM'
    },


    _af1: {
      spokenWord: '',
      startTime:  38,
      duration:   40.5 - 38,
      pauseTime:  6,
      autoNext:   '_af2'
    },
    _af2: {
      msg:        'Han trenger å snakke.',
      startTime:  42,
      duration:   44 - 42,
      autoNext:   'RANDOM'
    },


    _ag1: {
      spokenWord: '',
      startTime:  45,
      duration:   48 - 45,
      pauseTime:  8,
      autoNext:   '_ag2'
    },
    _ag2: {
      msg:        'De trenger å tro i noe.',
      startTime:  49,
      duration:   51   - 49,
      autoNext:   'RANDOM'
    },


    _ah1: {
      spokenWord: '',
      startTime:  52,
      duration:   55.5 - 52,
      pauseTime:  8,
      autoNext:   '_ah2'
    },
    _ah2: {
      msg:        'Han trenger å ligge og slappe av.',
      startTime:  57,
      duration:   59.5 - 57,
      autoNext:   'RANDOM'
    },


    _aj1: {
      spokenWord: '',
      startTime:  61,
      duration:   64 - 61,
      pauseTime:  8,
      autoNext:   '_aj2'
    },
    _aj2: {
      msg:        'De trenger å kjøpe klær.',
      startTime:  65,
      duration:   67.5 - 65,
      autoNext:   'RANDOM'
    },


    _ai1: {
      spokenWord: '',
      startTime:  69,
      duration:   71.5 - 69,
      pauseTime:  8,
      autoNext:   '_ai2'
    },
    _ai2: {
      msg:        'Vi prøver å lese på norsk.',
      startTime:  73,
      duration:   75.5 - 73,
      autoNext:   'RANDOM'
    },


    _ak1: {
      spokenWord: '',
      startTime:  77,
      duration:   80 - 77,
      pauseTime:  6,
      autoNext:   '_ak2'
    },
    _ak2: {
      msg:        'Dere prøver å forstå.',
      startTime:  81,
      duration:   83 - 81,
      autoNext:   'RANDOM'
    },


    _al1: {
      spokenWord: '',
      startTime:  84,
      duration:   87 - 84,
      pauseTime:  9,
      autoNext:   '_al2'
    },
    _al2: {
      msg:        'Jeg prøver å høre på norsk radio.',
      startTime:  88,
      duration:   91 - 88,
      autoNext:   'RANDOM'
    },


    _ba1: {
      spokenWord: '',
      startTime:  92,
      duration:   95 - 92,
      pauseTime:  8,
      autoNext:   '_ba2'
    },
    _ba2: {
      msg:        'De prøver å kjøre i byen.',
      startTime:  96,
      duration:   98.5 - 96,
      autoNext:   'RANDOM'
    },


    _bb1: {
      spokenWord: '',
      startTime:  100,
      duration:   102.5 - 100,
      pauseTime:  6,
      autoNext:   '_bb2'
    },
    _bb2: {
      msg:        'Hun lærer å gå.',
      startTime:  104,
      duration:   105.5 - 104,
      autoNext:   'RANDOM'
    },


    _bc1: {
      spokenWord: '',
      startTime:  107,
      duration:   109.5 - 107,
      pauseTime:  6,
      autoNext:   '_bc2'
    },
    _bc2: {
      msg:        'Han lærer å vente.',
      startTime:  111,
      duration:   113 - 111,
      autoNext:   'RANDOM'
    },


    _be1: {
      spokenWord: '',
      startTime:  121,
      duration:   124.5 - 121,
      pauseTime:  10,
      autoNext:   '_be2'
    },
    _be2: {
      msg:        'Hun lærer å konsentrere seg om en ting.',
      startTime:  126,
      duration:   129.5 - 126,
      autoNext:   'RANDOM'
    },


    _bf1: {
      spokenWord: '',
      startTime:  131,
      duration:   134 - 131,
      pauseTime:  8,
      autoNext:   '_bf2'
    },
    _bf2: {
      msg:        'Barnet begynner å bli i barnehagen.',
      startTime:  135,
      duration:   138.5 - 135,
      autoNext:   'RANDOM'
    },


    _bg1: {
      spokenWord: '',
      startTime:  140,
      duration:   143 - 140,
      pauseTime:  6,
      autoNext:   '_bg2'
    },
    _bg2: {
      msg:        'Mannen begynner å svømme.',
      startTime:  144,
      duration:   146 - 144,
      autoNext:   'RANDOM'
    },


    _bh1: {
      spokenWord: '',
      startTime:  147,
      duration:   149.5 - 147,
      pauseTime:  6,
      autoNext:   '_bh2'
    },
    _bh2: {
      msg:        'Kvinna begynner å trene.',
      startTime:  151,
      duration:   153.5 - 151,
      autoNext:   'RANDOM'
    },


    _bi1: {
      spokenWord: '',
      startTime:  155,
      duration:   158 - 155,
      pauseTime:  8,
      autoNext:   '_bi2'
    },
    _bi2: {
      msg:        'Hun begynner å klare på jobben.',
      startTime:  159,
      duration:   161.5 - 159,
      autoNext:   'RANDOM'
    },


    _bk1: {
      spokenWord: '',
      startTime:  163,
      duration:   165.5 - 163,
      pauseTime:  6,
      autoNext:   '_bk2'
    },
    _bk2: {
      msg:        'De slutter å drikke.',
      startTime:  167,
      duration:   169 - 167,
      autoNext:   'RANDOM'
    },


    _bl1: {
      spokenWord: '',
      startTime:  170,
      duration:   172.5 - 170,
      pauseTime:  8,
      autoNext:   '_bl2'
    },
    _bl2: {
      msg:        'Han slutter å studere økonomi.',
      startTime:  174,
      duration:   176.5 - 174,
      autoNext:   'RANDOM'
    },


    _bm1: {
      spokenWord: '',
      startTime:  178,
      duration:   180.5 - 178,
      pauseTime:  6,
      autoNext:   '_bm2'
    },
    _bm2: {
      msg:        'Hun stopper å ringe.',
      startTime:  182,
      duration:   183.5 - 182,
      autoNext:   'RANDOM'
    },


    _bn1: {
      spokenWord: '',
      startTime:  185,
      duration:   187.5 - 185,
      pauseTime:  6,
      autoNext:   '_bn2'
    },
    _bn2: {
      msg:        'Han stopper å komme.',
      startTime:  189,
      duration:   190.5 - 189,
      autoNext:   'RANDOM'
    },


    _bp1: {
      spokenWord: '',
      startTime:  192,
      duration:   195 - 192,
      pauseTime:  8,
      autoNext:   '_bp2'
    },
    _bp2: {
      msg:        'Jenta stopper å spise godteri.',
      startTime:  196,
      duration:   199 - 196,
      autoNext:   'RANDOM'
    },


    _bo1: {
      spokenWord: '',
      startTime:  200,
      duration:   203 - 200,
      pauseTime:  8,
      autoNext:   '_bo2'
    },
    _bo2: {
      msg:        'Faren stopper å gi penger.',
      startTime:  204,
      duration:   206.5 - 204,
      autoNext:   'RANDOM'
    }



  };


  this.end = {

    _end1: {
      msg:        'END',
      startTime:  0,
      duration:   0
    }

  };



}
</script>
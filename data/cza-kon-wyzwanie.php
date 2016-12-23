<script>
function LasAudioData() {

  //  Albo answers
  //  albo autoNext
  //  ale nie oba na raz!
  //  msg jest dowolne
  //  more jest dowolne
  //  gdy nie startTime, mamy quiz
  //  answer jest poiminięte tylko w intro 1


  this.intro = {
    a1: {
      msg:   "Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i>play</i>.",
      autoNext:   "ENDINTRO",
      more: { startTime: 0, stopTime: 26 }
    }
  };


  this.chat = {

    likerute1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "likerute2"
    },
    likerute2: {
      msg:        'Jeg liker å være ute.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    gaver1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "gaver2"
    },
    gaver2: {
      msg:        'Hun liker å få gaver.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    reise1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "reise2"
    },
    reise2: {
      msg:        'Vi liker å reise.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    eventyr1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "eventyr2"
    },
    eventyr2: {
      msg:        'Du liker å fortelle eventyr.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    oslo1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "oslo2"
    },
    oslo2: {
      msg:        'Dere liker å bo i Oslo.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    snakke1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "snakke2"
    },
    snakke2: {
      msg:        'Han trenger å snakke.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    tronoe1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "tronoe2"
    },
    tronoe2: {
      msg:        'De trenger å tro i noe.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    liggeslappe1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "liggeslappe2"
    },
    liggeslappe2: {
      msg:        'Han trenger å ligge og slappe av.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    klaer1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "klaer2"
    },
    klaer2: {
      msg:        'De trenger å kjøpe klær.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    lesenorsk1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "lesenorsk2"
    },
    lesenorsk2: {
      msg:        'Vi prøver å lese på norsk.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    proverforsta1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "proverforsta2"
    },
    proverforsta2: {
      msg:        'Dere prøver å forstå.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    norskradio1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "norskradio2"
    },
    norskradio2: {
      msg:        'Jeg prøver å høre på norsk radio.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    ibyen1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "ibyen2"
    },
    ibyen2: {
      msg:        'De prøver å kjøre i byen.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    laererga1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "laererga2"
    },
    laererga2: {
      msg:        'Hun lærer å gå.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    laerervente1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "laerervente2"
    },
    laerervente2: {
      msg:        'Han lærer å vente.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    elske1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "elske2"
    },
    elske2: {
      msg:        'Hun lærer å elske.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    konsentrere1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "konsentrere2"
    },
    konsentrere2: {
      msg:        'Hun lærer å konsentrere seg om én ting.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    barnehage1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "barnehage2"
    },
    barnehage2: {
      msg:        'Barnet begynner å bli i barnehagen.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    begynnersvomme1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "begynnersvomme2"
    },
    begynnersvomme2: {
      msg:        'Mannen begynner å svømme.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    begynnertrene1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "begynnertrene2"
    },
    begynnertrene2: {
      msg:        'Kvinna begynner å trene.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    klarejobben1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "klarejobben2"
    },
    klarejobben2: {
      msg:        'Hun begynner å klare på jobben.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    slutterdrikke1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "slutterdrikke2"
    },
    slutterdrikke2: {
      msg:        'De slutter å drikke.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    slutterstudere1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "slutterstudere2"
    },
    slutterstudere2: {
      msg:        'Han slutter å studere økonomi.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    stopperringe1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "stopperringe2"
    },
    stopperringe2: {
      msg:        'Hun stopper å ringe.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    stopperkomme1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "stopperkomme2"
    },
    stopperkomme2: {
      msg:        'Han stopper å komme.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    stoppersotsaker1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "stoppersotsaker2"
    },
    stoppersotsaker2: {
      msg:        'Jenta stopper å spise søtsaker.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    },


    stoppergi1: {
      startTime:  0,
      stopTime:   3,
      autoNext:   "stoppergi2"
    },
    stoppergi2: {
      msg:        'Faren stopper å gi penger.',
      startTime:  5,
      stopTime:   6,
      autoNext:   'RANDOM'
    }


  };


  this.end = {

    end1: {
      msg: 'D',
      startTime: 0,
      stopTime: 0
    }

  };



}
</script>
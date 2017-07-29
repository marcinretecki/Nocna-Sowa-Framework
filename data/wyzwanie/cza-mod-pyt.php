<script>
function LasData() {

  this.category = 'audio-test'; // chat|setninger|etc


  this.testNotes = [
    'nie ma nagrania ani czasów'
  ];


  this.intro = {
    _a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w las-icon-size-2"></i>.',
      autoNext:   'ENDINTRO'/*,
      more: {
        startTime:  0,
        duration:   1
      }*/
    }
  };


  this.chat = {

    _aa1: {
      spokenWord: 'Zapytaj: Czy możesz otworzyć drzwi?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_aa2'
    },
    _aa2: {
      msg:        '<i>Kan du åpne døra?</i>',
      trans:      'Czy możesz otworzyć drzwi?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_aa3'
    },
    _aa3: {
      spokenWord: 'Odpowiedz: Tak, mogę otworzyć drzwi.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_aa4'
    },
    _aa4: {
      msg:        '<i>Ja, jeg kan åpne døra.</i>',
      trans:      'Tak, mogę otworzyć drzwi.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ab1: {
      spokenWord: 'Zapytaj: Czy mogę zamknąć okno?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ab2'
    },
    _ab2: {
      msg:        '<i>Kan jeg lukke vinduet?</i>',
      trans:      'Czy mogę zamknąć okno?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_ab3'
    },
    _ab3: {
      spokenWord: 'Odpowiedz: Tak, możesz zamknąć okno.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ab4'
    },
    _ab4: {
      msg:        '<i>Ja, du kan lukke vinduet.</i>',
      trans:      'Tak, możesz zamknąć okno.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ac1: {
      spokenWord: 'Zapytaj: Czy możesz wysłać mi wiadomość z adresem?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ac2'
    },
    _ac2: {
      msg:        '<i>Kan du sende meg en melding med adressa?</i>',
      trans:      'Czy możesz wysłać mi wiadomość z adresem?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_ac3'
    },
    _ac3: {
      spokenWord: 'Odpowiedz: Oczywiście. Wyślę Ci adres.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ac4'
    },
    _ac4: {
      msg:        '<i>Selvfølgelig. Jeg sender deg adressa.</i>',
      trans:      'Oczywiście. Wyślę Ci adres.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ad1: {
      spokenWord: 'Zapytaj: Czy mogę przyjść z moim mężem?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ad2'
    },
    _ad2: {
      msg:        '<i>Kan jeg komme med mannen min?</i>',
      trans:      'Czy mogę przyjść z moim mężem?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_ad3'
    },
    _ad3: {
      spokenWord: 'Odpowiedz: Oczywiście. Możesz przyjść z mężem.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ad4'
    },
    _ad4: {
      msg:        '<i>Selvfølgelig. Du kan komme med mannen.</i>',
      trans:      'Oczywiście. Możesz przyjść z mężem.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ae1: {
      spokenWord: 'Zapytaj: Czy możesz dać mi maila?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ae2'
    },
    _ae2: {
      msg:        '<i>Kan du gi meg e-posten?</i>',
      trans:      'Czy możesz dać mi maila?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_ae3'
    },
    _ae3: {
      spokenWord: 'Odpowiedz: Tak, mogę napisać go tu.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ae4'
    },
    _ae4: {
      msg:        '<i>Ja, jeg kan skrive den her.</i>',
      trans:      'Tak, mogę napisać go tu.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _af1: {
      spokenWord: 'Zapytaj: Czy możesz dać mi klucz?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_af2'
    },
    _af2: {
      msg:        '<i>Kan du gi meg nøkkelen?</i>',
      trans:      'Czy możesz dać mi klucz?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_af3'
    },
    _af3: {
      spokenWord: 'Odpowiedz: Tak. Proszę.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_af4'
    },
    _af4: {
      msg:        '<i>Ja. Vær så god.</i>',
      trans:      'Tak. Proszę.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ah1: {
      spokenWord: 'Zapytaj: Chcesz iść w góry?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ah2'
    },
    _ah2: {
      msg:        '<i>Vil du gå på fjellet?</i>',
      trans:      'Chcesz iść w góry?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_ah3',
      more:       {
        spokenWord: 'Po polsku mówimy iść w góry w liczbie mnogiej. Po norwesku najczęściej mówi się “gå på fjellet” – czyli iść na jedną określoną górę.',
        startTime:  4,
        duration:   1.5
      }
    },
    _ah3: {
      spokenWord: 'Odpowiedz: Chętnie pójdę w góry.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ah4'
    },
    _ah4: {
      msg:        '<i>Jeg vil gjerne gå på fjellet.</i>',
      trans:      'Chętnie pójdę w góry.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ag1: {
      spokenWord: 'Zapytaj: Czy chcesz kawę?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ag2'
    },
    _ag2: {
      msg:        '<i>Vil du ha kaffe?</i>',
      trans:      'Czy chcesz kawę?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_ag3'
    },
    _ag3: {
      spokenWord: 'Odpowiedz: Poproszę kawę.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ag4'
    },
    _ag4: {
      msg:        '<i>Jeg vil gjerne ha kaffe.</i>',
      trans:      'Poproszę kawę.',
      startTime:  4,
      duration:   1.
      more:       {
        spokenWord: 'Po norwesku nie ma jednego słowa, które znaczyłoby “poporoszę”. “Jeg vil ha” albo “Jeg vil gjerne ha” pełni tę funkcję.',
        startTime:  0,
        duration:   1
      },
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _aj1: {
      spokenWord: 'Zapytaj: Czy chcesz kupić samolot?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_aj2'
    },
    _aj2: {
      msg:        '<i>Vil du kjøpe et fly?</i>',
      trans:      'Czy chcesz kupić samolot?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_aj3'
    },
    _aj3: {
      spokenWord: 'Odpowiedz: Nie, muszę kupić najpierw domek letniskowy.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_aj4'
    },
    _aj4: {
      msg:        '<i>Nei, jeg må kjøpe ei hytte først.</i>',
      trans:      'Nie, muszę kupić najpierw domek letniskowy.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ak1: {
      spokenWord: 'Zapytaj: Czy musimy kupić dom?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ak2'
    },
    _ak2: {
      msg:        '<i>Må vi kjøpe et hus?</i>',
      trans:      'Czy musimy kupić dom?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_ak3'
    },
    _ak3: {
      spokenWord: 'Odpowiedz: Nie musimy. Możemy go wynająć.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ak4'
    },
    _ak4: {
      msg:        '<i>Vi trenger ikke. Vi kan leie det.</i>',
      trans:      'Nie musimy. Możemy wynająć.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _al1: {
      spokenWord: 'Zapytaj: Czy ona może odebrać dziecko z przedszkola?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_al2'
    },
    _al2: {
      msg:        '<i>Kan hun hente barnet fra barnehagen?</i>',
      trans:      'Czy ona może odebrać dziecko z przedszkola?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_al3'
    },
    _al3: {
      spokenWord: 'Odpowiedz: Tak, może to zrobić.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_al4'
    },
    _al4: {
      msg:        '<i>Ja, hun kan gjøre det.</i>',
      trans:      'Tak, może to zrobić.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _am1: {
      spokenWord: 'Zapytaj: Czy ona może zawieźć dziecko do szkoły?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_am2'
    },
    _am2: {
      msg:        '<i>Kan hun levere barnet til skolen?</i>',
      trans:      'Czy ona może zawieźć dziecko do szkoły?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_am3'
    },
    _am3: {
      spokenWord: 'Odpowiedz: Tak, ona może zawieźć dziecko do szkoły.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_am4'
    },
    _am4: {
      msg:        '<i>Ja, hun kan levere barnet til skolen.</i>',
      trans:      'Tak, ona może zawieźć dziecko do szkoły.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _an1: {
      spokenWord: 'Zapytaj: Czy zamierzasz zmienić opony?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_an2'
    },
    _an2: {
      msg:        '<i>Skal du skifte dekk?</i>',
      trans:      'Czy zamierzasz zmienić opony?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_an3'
    },
    _an3: {
      spokenWord: 'Odpowiedz: Zamierzam zmienić opony.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_an4'
    },
    _an4: {
      msg:        '<i>Jeg skal skifte dekk.</i>',
      trans:      'Zamierzam zmienić opony.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ao1: {
      spokenWord: 'Zapytaj: Czy planujesz wejść na szczyt?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ao2'
    },
    _ao2: {
      msg:        '<i>Skal du gå på toppen?</i>',
      trans:      'Czy planujesz wejść na szczyt?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_ao3'
    },
    _ao3: {
      spokenWord: 'Odpowiedz: Planuję wejść na szczyt.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ao4'
    },
    _ao4: {
      msg:        '<i>Jeg skal gå på toppen.</i>',
      trans:      'Planuję wejść na szczyt.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ap1: {
      spokenWord: 'Zapytaj: Czy chcesz przymierzyć sweter?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ap2'
    },
    _ap2: {
      msg:        '<i>Vil du prøve genseren?</i>',
      trans:      'Czy chcesz przymierzyć sweter?',
      startTime:  4,
      duration:   1.5,
      more:       {
        spokenWord: 'Po polsku ubrania przymierzamy. Norwedzy je próbują, dlatego używają czasownika “å prøve”.',
        startTime:  4,
        duration:   1.5
      },
      autoNext:   '_ap3'
    },
    _ap3: {
      spokenWord: 'Odpowiedz: Nie, nie chcę czekać w kolejce do przymierzalni.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ap4'
    },
    _ap4: {
      msg:        '<i>Nei, jeg vil ikke vente i køen til prøverommet.</i>',
      trans:      'Nie, nie chcę czekać w kolejce do przymierzalni.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ar1: {
      spokenWord: 'Zapytaj: Czy możesz do mnie przyjść?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ar2'
    },
    _ar2: {
      msg:        '<i>Kan du komme til meg?</i>',
      trans:      'Czy możesz do mnie przyjść?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_ar3'
    },
    _ar3: {
      spokenWord: 'Odpowiedz: Nie mogę do Ciebie przyjść.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ar4'
    },
    _ar4: {
      msg:        '<i>Jeg kan ikke komme til deg.</i>',
      trans:      'Nie mogę do Ciebie przyjść.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _as1: {
      spokenWord: 'Zapytaj: Czy oni chcę zjeść w domu?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_as2'
    },
    _as2: {
      msg:        '<i>Vil de spise hjemme?</i>',
      trans:      'Czy oni chcę zjeść w domu?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_as3'
    },
    _as3: {
      spokenWord: 'Odpowiedz: Oni nie chcą jeść w domu.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_as4'
    },
    _as4: {
      msg:        '<i>De vil ikke spise hjemme.</i>',
      trans:      'Oni nie chcą jeść w domu.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _at1: {
      spokenWord: 'Zapytaj: Czy chcesz lecieć na północ Norwegii?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_at2'
    },
    _at2: {
      msg:        '<i>Vil du fly til Nord-Norge?</i>',
      trans:      'Czy chcesz lecieć na północ Norwegii?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_at3'
    },
    _at3: {
      spokenWord: 'Odpowiedz: Nie chcę lecieć na północ Norwegii.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_at4'
    },
    _at4: {
      msg:        '<i>Jeg vil ikke fly til Nord-Norge.</i>',
      trans:      'Nie chcę lecieć na północ Norwegii.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ax1: {
      spokenWord: 'Zapytaj: Czy musicie sprzątać?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ax2'
    },
    _ax2: {
      msg:        '<i>Må dere rydde?</i>',
      trans:      'Czy musicie sprzątać?',
      startTime:  4,
      duration:   1.5,
      more:       {
        spokenWord: 'Sprzątać albo porządkować to "å rydde". Myć albo zmywać to "å vaske".',
        startTime:  4,
        duration:   1
      },
      autoNext:   '_ax3'
    },
    _ax3: {
      spokenWord: 'Odpowiedz: Nie musimy sprzątać.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ax4'
    },
    _ax4: {
      msg:        '<i>Vi trenger ikke å rydde.</i>',
      trans:      'Nie musimy sprzątać.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _ay1: {
      spokenWord: 'Zapytaj: Czy to nie może zaczekać?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ay2'
    },
    _ay2: {
      msg:        '<i>Kan det ikke vente?</i>',
      trans:      'Czy to nie może zaczekać?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_ay3'
    },
    _ay3: {
      spokenWord: 'Odpowiedz: To nie może czekać.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_ay4'
    },
    _ay4: {
      msg:        '<i>Det kan ikke vente.</i>',
      trans:      'To nie może czekać.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    },


    _az1: {
      spokenWord: 'Zapytaj: Czy planujesz zmienić pracę?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_az2'
    },
    _az2: {
      msg:        '<i>Skal du bytte jobb?</i>',
      trans:      'Czy planujesz zmienić pracę?',
      startTime:  4,
      duration:   1.5,
      autoNext:   '_az3'
    },
    _az3: {
      spokenWord: 'Powiedz: Nie planuję zmieniać pracy.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   '_az4'
    },
    _az4: {
      msg:        '<i>Jeg skal ikke bytte jobb.</i>',
      trans:      'Nie planuję zmieniać pracy.',
      startTime:  4,
      duration:   1.5,
      score:      'correct',
      autoNext:   'RANDOM'
    }

  };



}
</script>
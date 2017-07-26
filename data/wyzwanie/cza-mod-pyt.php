<script>
function LasData() {

  this.testNotes = [
    'nie ma nagrania ani czasów'
  ];

  this.intro = {
    _a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w las-icon-size-2"></i>.',
      autoNext:     'ENDINTRO'/*,
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
      msg:        'Kan du åpne døra?',
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
      msg:        'Ja, jeg kan åpne døra.',
      trans:      'Tak, mogę otworzyć drzwi.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Kan jeg lukke vinduet?',
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
      msg:        'Ja, du kan lukke vinduet.',
      trans:      'Tak, możesz zamknąć okno.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Kan du sende meg en melding med adressa?',
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
      msg:        'Selvfølgelig. Jeg sender deg adressa.',
      trans:      'Oczywiście. Wyślę Ci adres.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Kan jeg komme med mannen min?',
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
      msg:        'Selvfølgelig. Du kan komme med mannen.',
      trans:      'Oczywiście. Możesz przyjść z mężem.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Kan du gi meg e-posten?',
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
      msg:        'Ja, jeg kan skrive den her.',
      trans:      'Tak, mogę napisać go tu.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Kan du gi meg nøkkelen?',
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
      msg:        'Ja. Vær så god.',
      trans:      'Tak. Proszę.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Vil du gå på fjellet?',
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
      msg:        'Jeg vil gjerne gå på fjellet.',
      trans:      'Chętnie pójdę w góry.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Vil du ha kaffe?',
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
      msg:        'Jeg vil gjerne ha kaffe.',
      trans:      'Poproszę kawę.',
      startTime:  4,
      duration:   1.
      more:       {
        spokenWord: 'Po norwesku nie ma jednego słowa, które znaczyłoby “poporoszę”. “Jeg vil ha” albo “Jeg vil gjerne ha” pełni tę funkcję.',
        startTime:  0,
        duration:   1
      },
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
      msg:        'Vil du kjøpe et fly?',
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
      msg:        'Nei, jeg må kjøpe ei hytte først.',
      trans:      'Nie, muszę kupić najpierw domek letniskowy.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Må vi kjøpe et hus?',
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
      msg:        'Vi trenger ikke. Vi kan leie det.',
      trans:      'Nie musimy. Możemy wynająć.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Kan hun hente barnet fra barnehagen?',
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
      msg:        'Ja, hun kan gjøre det.',
      trans:      'Tak, może to zrobić.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Kan hun levere barnet til skolen?',
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
      msg:        'Ja, hun kan levere barnet til skolen.',
      trans:      'Tak, ona może zawieźć dziecko do szkoły.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Skal du skifte dekk?',
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
      msg:        'Jeg skal skifte dekk.',
      trans:      'Zamierzam zmienić opony.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Skal du gå på toppen?',
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
      msg:        'Jeg skal gå på toppen.',
      trans:      'Planuję wejść na szczyt.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Vil du prøve genseren?',
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
      msg:        'Nei, jeg vil ikke vente i køen til prøverommet.',
      trans:      'Nie, nie chcę czekać w kolejce do przymierzalni.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Kan du komme til meg?',
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
      msg:        'Jeg kan ikke komme til deg.',
      trans:      'Nie mogę do Ciebie przyjść.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Vil de spise hjemme?',
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
      msg:        'De vil ikke spise hjemme.',
      trans:      'Oni nie chcą jeść w domu.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Vil du fly til Nord-Norge?',
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
      msg:        'Jeg vil ikke fly til Nord-Norge.',
      trans:      'Nie chcę lecieć na północ Norwegii.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Må dere rydde?',
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
      msg:        'Vi trenger ikke å rydde.',
      trans:      'Nie musimy sprzątać.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Kan det ikke vente?',
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
      msg:        'Det kan ikke vente.',
      trans:      'To nie może czekać.',
      startTime:  4,
      duration:   1.5,
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
      msg:        'Skal du bytte jobb?',
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
      msg:        'Jeg skal ikke bytte jobb.',
      trans:      'Nie planuję zmieniać pracy.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    }

  };


  this.end = {

    _end1: {
      msg: 'END',
      startTime: 0,
      duration: 1
    }

  };



}
</script>
<script>
function LasAudioData() {

  this.testNotes = [
    'nie ma nagrania ani czasów'
  ];

  this.intro = {
    a1: {
      msg:          'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:     'ENDINTRO'/*,
      more: {
        startTime:  0,
        duration:   1
      }*/
    }
  };


  this.chat = {

    aa1: {
      spokenWord: 'Zapytaj: Czy możesz otworzyć drzwi?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'aa2'
    },
    aa2: {
      msg:        'Kan du åpne døra?',
      trans:      'Czy możesz otworzyć drzwi?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'aa3'
    },
    aa3: {
      spokenWord: 'Odpowiedz: Tak, mogę otworzyć drzwi.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'aa4'
    },
    aa4: {
      msg:        'Ja, jeg kan åpne døra.',
      trans:      'Tak, mogę otworzyć drzwi.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ab1: {
      spokenWord: 'Zapytaj: Czy mogę zamknąć okno?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ab2'
    },
    ab2: {
      msg:        'Kan jeg lukke vinduet?',
      trans:      'Czy mogę zamknąć okno?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'ab3'
    },
    ab3: {
      spokenWord: 'Odpowiedz: Tak, możesz zamknąć okno.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ab4'
    },
    ab4: {
      msg:        'Ja, du kan lukke vinduet.',
      trans:      'Tak, możesz zamknąć okno.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ac1: {
      spokenWord: 'Zapytaj: Czy możesz wysłać mi wiadomość z adresem?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ac2'
    },
    ac2: {
      msg:        'Kan du sende meg en melding med adressa?',
      trans:      'Czy możesz wysłać mi wiadomość z adresem?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'ac3'
    },
    ac3: {
      spokenWord: 'Odpowiedz: Oczywiście. Wyślę Ci adres.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ac4'
    },
    ac4: {
      msg:        'Selvfølgelig. Jeg sender deg adressa.',
      trans:      'Oczywiście. Wyślę Ci adres.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ad1: {
      spokenWord: 'Zapytaj: Czy mogę przyjść z moim mężem?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ad2'
    },
    ad2: {
      msg:        'Kan jeg komme med mannen min?',
      trans:      'Czy mogę przyjść z moim mężem?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'ad3'
    },
    ad3: {
      spokenWord: 'Odpowiedz: Oczywiście. Możesz przyjść z mężem.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ad4'
    },
    ad4: {
      msg:        'Selvfølgelig. Du kan komme med mannen.',
      trans:      'Oczywiście. Możesz przyjść z mężem.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ae1: {
      spokenWord: 'Zapytaj: Czy możesz dać mi maila?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ae2'
    },
    ae2: {
      msg:        'Kan du gi meg e-posten?',
      trans:      'Czy możesz dać mi maila?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'ae3'
    },
    ae3: {
      spokenWord: 'Odpowiedz: Tak, mogę napisać go tu.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ae4'
    },
    ae4: {
      msg:        'Ja, jeg kan skrive den her.',
      trans:      'Tak, mogę napisać go tu.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    af1: {
      spokenWord: 'Zapytaj: Czy możesz dać mi klucz?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'af2'
    },
    af2: {
      msg:        'Kan du gi meg nøkkelen?',
      trans:      'Czy możesz dać mi klucz?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'af3'
    },
    af3: {
      spokenWord: 'Odpowiedz: Tak. Proszę.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'af4'
    },
    af4: {
      msg:        'Ja. Vær så god.',
      trans:      'Tak. Proszę.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ah1: {
      spokenWord: 'Zapytaj: Chcesz iść w góry?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ah2'
    },
    ah2: {
      msg:        'Vil du gå på fjellet?',
      trans:      'Chcesz iść w góry?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'ah3',
      more:       {
        spokenWord: 'Po polsku mówimy iść w góry w liczbie mnogiej. Po norwesku najczęściej mówi się “gå på fjellet” – czyli iść na jedną określoną górę.',
        startTime:  4,
        duration:   1.5
      }
    },
    ah3: {
      spokenWord: 'Odpowiedz: Chętnie pójdę w góry.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ah4'
    },
    ah4: {
      msg:        'Jeg vil gjerne gå på fjellet.',
      trans:      'Chętnie pójdę w góry.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ag1: {
      spokenWord: 'Zapytaj: Czy chcesz kawę?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ag2'
    },
    ag2: {
      msg:        'Vil du ha kaffe?',
      trans:      'Czy chcesz kawę?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'ag3'
    },
    ag3: {
      spokenWord: 'Odpowiedz: Poproszę kawę.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ag4'
    },
    ag4: {
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


    aj1: {
      spokenWord: 'Zapytaj: Czy chcesz kupić samolot?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'aj2'
    },
    aj2: {
      msg:        'Vil du kjøpe et fly?',
      trans:      'Czy chcesz kupić samolot?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'aj3'
    },
    aj3: {
      spokenWord: 'Odpowiedz: Nie, muszę kupić najpierw domek letniskowy.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'aj4'
    },
    aj4: {
      msg:        'Nei, jeg må kjøpe ei hytte først.',
      trans:      'Nie, muszę kupić najpierw domek letniskowy.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ak1: {
      spokenWord: 'Zapytaj: Czy musimy kupić dom?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ak2'
    },
    ak2: {
      msg:        'Må vi kjøpe et hus?',
      trans:      'Czy musimy kupić dom?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'ak3'
    },
    ak3: {
      spokenWord: 'Odpowiedz: Nie musimy. Możemy go wynająć.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ak4'
    },
    ak4: {
      msg:        'Vi trenger ikke. Vi kan leie det.',
      trans:      'Nie musimy. Możemy wynająć.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    al1: {
      spokenWord: 'Zapytaj: Czy ona może odebrać dziecko z przedszkola?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'al2'
    },
    al2: {
      msg:        'Kan hun hente barnet fra barnehagen?',
      trans:      'Czy ona może odebrać dziecko z przedszkola?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'al3'
    },
    al3: {
      spokenWord: 'Odpowiedz: Tak, może to zrobić.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'al4'
    },
    al4: {
      msg:        'Ja, hun kan gjøre det.',
      trans:      'Tak, może to zrobić.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    am1: {
      spokenWord: 'Zapytaj: Czy ona może zawieźć dziecko do szkoły?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'am2'
    },
    am2: {
      msg:        'Kan hun levere barnet til skolen?',
      trans:      'Czy ona może zawieźć dziecko do szkoły?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'am3'
    },
    am3: {
      spokenWord: 'Odpowiedz: Tak, ona może zawieźć dziecko do szkoły.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'am4'
    },
    am4: {
      msg:        'Ja, hun kan levere barnet til skolen.',
      trans:      'Tak, ona może zawieźć dziecko do szkoły.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    an1: {
      spokenWord: 'Zapytaj: Czy zamierzasz zmienić opony?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'an2'
    },
    an2: {
      msg:        'Skal du skifte dekk?',
      trans:      'Czy zamierzasz zmienić opony?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'an3'
    },
    an3: {
      spokenWord: 'Odpowiedz: Zamierzam zmienić opony.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'an4'
    },
    an4: {
      msg:        'Jeg skal skifte dekk.',
      trans:      'Zamierzam zmienić opony.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ao1: {
      spokenWord: 'Zapytaj: Czy planujesz wejść na szczyt?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ao2'
    },
    ao2: {
      msg:        'Skal du gå på toppen?',
      trans:      'Czy planujesz wejść na szczyt?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'ao3'
    },
    ao3: {
      spokenWord: 'Odpowiedz: Planuję wejść na szczyt.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ao4'
    },
    ao4: {
      msg:        'Jeg skal gå på toppen.',
      trans:      'Planuję wejść na szczyt.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ap1: {
      spokenWord: 'Zapytaj: Czy chcesz przymierzyć sweter?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ap2'
    },
    ap2: {
      msg:        'Vil du prøve genseren?',
      trans:      'Czy chcesz przymierzyć sweter?',
      startTime:  4,
      duration:   1.5,
      more:       {
        spokenWord: 'Po polsku ubrania przymierzamy. Norwedzy je próbują, dlatego używają czasownika “å prøve”.',
        startTime:  4,
        duration:   1.5
      },
      autoNext:   'ap3'
    },
    ap3: {
      spokenWord: 'Odpowiedz: Nie, nie chcę czekać w kolejce do przymierzalni.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ap4'
    },
    ap4: {
      msg:        'Nei, jeg vil ikke vente i køen til prøverommet.',
      trans:      'Nie, nie chcę czekać w kolejce do przymierzalni.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ar1: {
      spokenWord: 'Zapytaj: Czy możesz do mnie przyjść?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ar2'
    },
    ar2: {
      msg:        'Kan du komme til meg?',
      trans:      'Czy możesz do mnie przyjść?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'ar3'
    },
    ar3: {
      spokenWord: 'Odpowiedz: Nie mogę do Ciebie przyjść.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ar4'
    },
    ar4: {
      msg:        'Jeg kan ikke komme til deg.',
      trans:      'Nie mogę do Ciebie przyjść.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    as1: {
      spokenWord: 'Zapytaj: Czy oni chcę zjeść w domu?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'as2'
    },
    as2: {
      msg:        'Vil de spise hjemme?',
      trans:      'Czy oni chcę zjeść w domu?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'as3'
    },
    as3: {
      spokenWord: 'Odpowiedz: Oni nie chcą jeść w domu.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'as4'
    },
    as4: {
      msg:        'De vil ikke spise hjemme.',
      trans:      'Oni nie chcą jeść w domu.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    at1: {
      spokenWord: 'Zapytaj: Czy chcesz lecieć na północ Norwegii?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'at2'
    },
    at2: {
      msg:        'Vil du fly til Nord-Norge?',
      trans:      'Czy chcesz lecieć na północ Norwegii?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'at3'
    },
    at3: {
      spokenWord: 'Odpowiedz: Nie chcę lecieć na północ Norwegii.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'at4'
    },
    at4: {
      msg:        'Jeg vil ikke fly til Nord-Norge.',
      trans:      'Nie chcę lecieć na północ Norwegii.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ax1: {
      spokenWord: 'Zapytaj: Czy musicie sprzątać?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ax2'
    },
    ax2: {
      msg:        'Må dere rydde?',
      trans:      'Czy musicie sprzątać?',
      startTime:  4,
      duration:   1.5,
      more:       {
        spokenWord: 'Sprzątać albo porządkować to "å rydde". Myć albo zmywać to "å vaske".',
        startTime:  4,
        duration:   1
      },
      autoNext:   'ax3'
    },
    ax3: {
      spokenWord: 'Odpowiedz: Nie musimy sprzątać.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ax4'
    },
    ax4: {
      msg:        'Vi trenger ikke å rydde.',
      trans:      'Nie musimy sprzątać.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    ay1: {
      spokenWord: 'Zapytaj: Czy to nie może zaczekać?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ay2'
    },
    ay2: {
      msg:        'Kan det ikke vente?',
      trans:      'Czy to nie może zaczekać?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'ay3'
    },
    ay3: {
      spokenWord: 'Odpowiedz: To nie może czekać.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'ay4'
    },
    ay4: {
      msg:        'Det kan ikke vente.',
      trans:      'To nie może czekać.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    },


    az1: {
      spokenWord: 'Zapytaj: Czy planujesz zmienić pracę?',
      startTime:  0,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'az2'
    },
    az2: {
      msg:        'Skal du bytte jobb?',
      trans:      'Czy planujesz zmienić pracę?',
      startTime:  4,
      duration:   1.5,
      autoNext:   'az3'
    },
    az3: {
      spokenWord: 'Powiedz: Nie planuję zmieniać pracy.',
      startTime:  4,
      duration:   1.5,
      pauseTime:  8,
      autoNext:   'az4'
    },
    az4: {
      msg:        'Jeg skal ikke bytte jobb.',
      trans:      'Nie planuję zmieniać pracy.',
      startTime:  4,
      duration:   1.5,
      autoNext:   'RANDOM'
    }

  };


  this.end = {

    end1: {
      msg: 'END',
      startTime: 0,
      duration: 1
    }

  };



}
</script>
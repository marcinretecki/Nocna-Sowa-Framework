<script>
function LasAudioData() {

  this.testNotes = [
  ];

  this.intro = {
    _a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next"></i>.',
      autoNext:   'ENDINTRO'/*,
      more: {
        startTime: 0,
        duration: 0  -  0,
      }*/
    }
  };


  this.chat = {

    _aa1: {
      spokenWord: 'Zapytaj: Czy Tom mieszka w Bergen?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_aa2'
    },
    _aa2: {
      msg:        'Bor Tom i Bergen?',
      trans:      'Czy Tom mieszka w Bergen?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_aa3'
    },
    _aa3: {
      spokenWord: 'Odpowiedz: Nie, Tom nie mieszka w Bergen. On mieszka w Bodø.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_aa4'
    },
    _aa4: {
      msg:        'Nei, Tom bor ikke i Bergen. Han bor i Bodø.',
      trans:      'Nie, Tom nie mieszka w Bergen. On mieszka w Bodø.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _ab1: {
      spokenWord: 'Zapytaj: Czy pochodzisz z Norwegii?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_ab2'
    },
    _ab2: {
      msg:        'Kommer du fra Norge?',
      trans:      'Czy pochodzisz z Norwegii?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_ab3'
    },
    _ab3: {
      spokenWord: 'Odpowiedz: Nie, nie pochodzę z Norwegii. Pochodzę z Polski.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_ab4'
    },
    _ab4: {
      msg:        'Nei, jeg kommer ikke fra Norge. Jeg kommer fra Polen.',
      trans:      'Nie, nie pochodzę z Norwegii. Pochodzę z Polski.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _ac1: {
      spokenWord: 'Zapytaj: Czy masz dzieci?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_ac2'
    },
    _ac2: {
      msg:        'Har du barn?',
      trans:      'Czy masz dzieci?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_ac3'
    },
    _ac3: {
      spokenWord: 'Odpowiedz: Tak, mam dwoje dzieci.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_ac4'
    },
    _ac4: {
      msg:        'Ja, jeg har to barn.',
      trans:      'Tak, mam dwoje dzieci.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _ad1: {
      spokenWord: 'Zapytaj: Czy masz samochód?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_ad2'
    },
    _ad2: {
      msg:        'Har du en bil?',
      trans:      'Czy masz samochód?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_ad3'
    },
    _ad3: {
      spokenWord: 'Odpowiedz: Nie, nie mam samochodu. Mam rower.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_ad4'
    },
    _ad4: {
      msg:        'Nei, jeg har ikke en bil. Jeg har en sykkel.',
      trans:      'Nie, nie mam samochodu. Mam rower.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _ae1: {
      spokenWord: 'Zapytaj: Czy lubisz kupować buty?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_ae2'
    },
    _ae2: {
      msg:        'Liker du å kjøpe sko?',
      trans:      'Czy lubisz kupować buty?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_ae3'
    },
    _ae3: {
      spokenWord: 'Odpowiedz: Tak, lubię kupować buty.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_ae4'
    },
    _ae4: {
      msg:        'Ja, jeg liker å kjøpe sko.',
      trans:      'Tak, lubię kupować buty.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _af1: {
      spokenWord: 'Zapytaj: Czy często rozmawiasz z ojcem?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_af2'
    },
    _af2: {
      msg:        'Snakker du ofte med faren?',
      trans:      'Czy często rozmawiasz z ojcem?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_af3'
    },
    _af3: {
      spokenWord: 'Odpowiedz: Tak, rozmawiam z nim codziennie.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_af4'
    },
    _af4: {
      msg:        'Ja, jeg snakker med ham hver dag.',
      trans:      'Tak, rozmawiam z nim codziennie.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _ah1: {
      spokenWord: 'Zapytaj: Czy masz dużo energii?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_ah2'
    },
    _ah2: {
      msg:        'Har du mye energi?',
      trans:      'Czy masz dużo energii?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_ah3'
    },
    _ah3: {
      spokenWord: 'Odpowiedz: Tak, mam dużo energii.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_ah4'
    },
    _ah4: {
      msg:        'Ja, jeg har mye energi.',
      trans:      'Tak, mam dużo energii.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _ag1: {
      spokenWord: 'Zapytaj: Czy masz wielu przyjaciół?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_ag2'
    },
    _ag2: {
      msg:        'Har du mange venner?',
      trans:      'Czy masz wielu przyjaciół?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_ag3'
    },
    _ag3: {
      spokenWord: 'Odpowiedz: Tak, mam wielu przyjaciół.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_ag4'
    },
    _ag4: {
      msg:        'Ja, jeg har mange venner.',
      trans:      'Tak, mam wielu przyjaciół.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _aj1: {
      spokenWord: 'Zapytaj: Czy jest dużo piasku na plaży?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_aj2'
    },
    _aj2: {
      msg:        'Er det mye sand på stranda?',
      trans:      'Czy jest dużo piasku na plaży?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_aj3'
    },
    _aj3: {
      spokenWord: 'Odpowiedz: Nie, nie ma dużo piasku. Tylko kamienie.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_aj4'
    },
    _aj4: {
      msg:        'Nei, det er ikke mye sand. Bare steiner.',
      trans:      'Nie, nie ma dużo piasku. Tylko kamienie.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _ak1: {
      spokenWord: 'Zapytaj: Czy masz wiele ubrań?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_ak2'
    },
    _ak2: {
      msg:        'Har du mange klær?',
      trans:      'Czy masz wiele ubrań?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_ak3'
    },
    _ak3: {
      spokenWord: 'Odpowiedz: Nie, nie potrzebuję wielu ubrań.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_ak4'
    },
    _ak4: {
      msg:        'Nei, jeg trenger ikke mange klær.',
      trans:      'Nie, nie potrzebuję wielu ubrań.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _al1: {
      spokenWord: 'Zapytaj: Czy boli Cię kolano?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_al2'
    },
    _al2: {
      msg:        'Har du vondt i kneet?',
      trans:      'Czy boli Cię kolano?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_al3'
    },
    _al3: {
      spokenWord: 'Odpowiedz: Tak, boli mnie kolano.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_al4'
    },
    _al4: {
      msg:        'Ja, jeg har vondt i kneet.',
      trans:      'Tak, boli mnie kolano.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _am1: {
      spokenWord: 'Zapytaj: Czy masz łódkę w Norwegii?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_am2'
    },
    _am2: {
      msg:        'Har du en båt i Norge?',
      trans:      'Czy masz łódkę w Norwegii?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_am3'
    },
    _am3: {
      spokenWord: 'Odpowiedz: Nie mam. Mogę pożyczyć łódź.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_am4'
    },
    _am4: {
      msg:        'Jeg har ikke. Jeg kan låne en båt.',
      trans:      'Nie mam. Mogę pożyczyć łódź.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _an1: {
      spokenWord: 'Zapytaj: Czy widzisz tych mężczyzn?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_an2'
    },
    _an2: {
      msg:        'Ser du disse mennene?',
      trans:      'Czy widzisz tych mężczyzn?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_an3'
    },
    _an3: {
      spokenWord: 'Odpowiedz: Tak, widzę tych mężczyzn.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_an4'
    },
    _an4: {
      msg:        'Ja, jeg ser disse mennene.',
      trans:      'Tak, widzę tych mężczyzn.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _ao1: {
      spokenWord: 'Zapytaj: Czy używasz dużo cukru?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_ao2'
    },
    _ao2: {
      msg:        'Bruker du mye sukker?',
      trans:      'Czy używasz dużo cukru?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_ao3'
    },
    _ao3: {
      spokenWord: 'Odpowiedz: Nie tak dużo.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_ao4'
    },
    _ao4: {
      msg:        'Ikke så mye.',
      trans:      'Nie tak dużo.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _ap1: {
      spokenWord: 'Zapytaj: Czy dostajesz wiele prezentów na urodziny?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_ap2'
    },
    _ap2: {
      msg:        'Får du mange gaver til bursdag?',
      trans:      'Czy dostajesz wiele prezentów na urodziny?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_ap3'
    },
    _ap3: {
      spokenWord: 'Odpowiedz: Tak, dostaję wiele prezentów na urodziny.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_ap4'
    },
    _ap4: {
      msg:        'Ja, jeg får mange gaver til bursdag.',
      trans:      'Tak, dostaję wiele prezentów na urodziny.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _ar1: {
      spokenWord: 'Zapytaj: Czy on lubi oglądać mecze piłki nożnej?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_ar2'
    },
    _ar2: {
      msg:        'Liker han å se på fotballkamper?',
      trans:      'Czy on lubi oglądać mecze piłki nożnej?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_ar3'
    },
    _ar3: {
      spokenWord: 'Odpowiedz: Tak, on lubi oglądać mecze.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_ar4'
    },
    _ar4: {
      msg:        'Ja, han liker å se på fotballkamper.',
      trans:      'Tak, on lubi oglądać mecze.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _as1: {
      spokenWord: 'Zapytaj: Czy Twoja żona jest teraz w pracy?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_as2'
    },
    _as2: {
      msg:        'Er kona di på jobben nå?',
      trans:      'Czy Twoja żona jest teraz w pracy?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_as3'
    },
    _as3: {
      spokenWord: 'Odpowiedz: Nie, ona ma dzisiaj wolne.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_as4'
    },
    _as4: {
      msg:        'Nei, hun har fri i dag.',
      trans:      'Nie, ona ma dzisiaj wolne.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _at1: {
      spokenWord: 'Zapytaj: Czy nie ma tu światła?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_at2'
    },
    _at2: {
      msg:        'Er det ikke lys her?',
      trans:      'Czy nie ma tu światła?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_at3'
    },
    _at3: {
      spokenWord: 'Odpowiedz: Niestety. Nie ma tu światła.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_at4'
    },
    _at4: {
      msg:        'Dessverre. Det er ikke lys her.',
      trans:      'Niestety. Nie ma tu światła.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _ax1: {
      spokenWord: 'Zapytaj: Czy jest dużo ludzi na kursie?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_ax2'
    },
    _ax2: {
      msg:        'Er det mange mennesker på kurset?',
      trans:      'Czy jest dużo ludzi na kursie?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_ax3'
    },
    _ax3: {
      spokenWord: 'Odpowiedz: Tak, jest dużo ludzi na kursie.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_ax4'
    },
    _ax4: {
      msg:        'Ja, det er mange mennesker på kurset.',
      trans:      'Tak, jest dużo ludzi na kursie.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _ay1: {
      spokenWord: 'Zapytaj: Czy ciocia ma dużo psów?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_ay2'
    },
    _ay2: {
      msg:        'Har tanta mange hunder?',
      trans:      'Czy ciocia ma dużo psów?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_ay3'
    },
    _ay3: {
      spokenWord: 'Odpowiedz: Nie, ona ma tylko jednego psa.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_ay4'
    },
    _ay4: {
      msg:        'Nei, hun har bare en hund.',
      trans:      'Nie, ona ma tylko jednego psa.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _az1: {
      spokenWord: 'Zapytaj: Czy jest dużo śniegu?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_az2'
    },
    _az2: {
      msg:        'Er det mye snø?',
      trans:      'Czy jest dużo śniegu?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_az3'
    },
    _az3: {
      spokenWord: 'Odpowiedz: Tak, jest dużo śniegu.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_az4'
    },
    _az4: {
      msg:        'Ja, det er mye snø.',
      trans:      'Tak, jest dużo śniegu.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _ba1: {
      spokenWord: 'Zapytaj: Czy oni mieszkają na wyspie?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_ba2'
    },
    _ba2: {
      msg:        'Bor de på øya?',
      trans:      'Czy oni mieszkają na wyspie?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_ba3'
    },
    _ba3: {
      spokenWord: 'Odpowiedz: Tak, oni mieszkają na wyspie.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_ba4'
    },
    _ba4: {
      msg:        'Ja, de bor på øya.',
      trans:      'Tak, oni mieszkają na wyspie.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _bb1: {
      spokenWord: 'Zapytaj: Czy słyszysz mnie?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_bb2'
    },
    _bb2: {
      msg:        'Hører du meg?',
      trans:      'Czy słyszysz mnie?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_bb3'
    },
    _bb3: {
      spokenWord: 'Odpowiedz: Nie słyszę Cię. Czy możesz powtórzyć?',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_bb4'
    },
    _bb4: {
      msg:        'Jeg hører deg ikke. Kan du gjenta?',
      trans:      'Nie słyszę Cię. Czy możesz powtórzyć?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    },


    _bc1: {
      spokenWord: 'Zapytaj: Czy lubisz dostawać kwiaty?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_bc2'
    },
    _bc2: {
      msg:        'Liker du å få blomster?',
      trans:      'Czy lubisz dostawać kwiaty?',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   '_bc3'
    },
    _bc3: {
      spokenWord: 'Odpowiedz: Bardzo lubię dostawać kwiaty.',
      startTime:  4,
      duration:   6.5 - 4,
      pauseTime:  8,
      autoNext:   '_bc4'
    },
    _bc4: {
      msg:        'Jeg liker å få blomster veldig mye.',
      trans:      'Bardzo lubię dostawać kwiaty.',
      startTime:  4,
      duration:   6.5 - 4,
      autoNext:   'RANDOM'
    }

  };


  this.end = {

    _end1: {
      msg: 'END',
      startTime: 0,
      duration: 0 -  0,
    }

  };



}
</script>
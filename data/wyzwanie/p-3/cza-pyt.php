<script>
function LasData() {

  this.category = 'audio-test'; // chat|setninger|etc


  this.testNotes = [
  ];


  this.intro = {
    _a1: {
      msg:        'Załóż słuchawki i usiądź wygodnie. Gdy będziesz gotowy, naciśnij <i class="las-icon las-icon--next-w las-icon-size-2"></i>.',
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
      msg:        '<i>Bor Tom i Bergen?</i>',
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
      msg:        '<i>Nei, Tom bor ikke i Bergen. Han bor i Bodø.</i>',
      trans:      'Nie, Tom nie mieszka w Bergen. On mieszka w Bodø.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Kommer du fra Norge?</i>',
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
      msg:        '<i>Nei, jeg kommer ikke fra Norge. Jeg kommer fra Polen.</i>',
      trans:      'Nie, nie pochodzę z Norwegii. Pochodzę z Polski.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Har du barn?</i>',
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
      msg:        '<i>Ja, jeg har to barn.</i>',
      trans:      'Tak, mam dwoje dzieci.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Har du en bil?</i>',
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
      msg:        '<i>Nei, jeg har ikke en bil. Jeg har en sykkel.</i>',
      trans:      'Nie, nie mam samochodu. Mam rower.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Liker du å kjøpe sko?</i>',
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
      msg:        '<i>Ja, jeg liker å kjøpe sko.</i>',
      trans:      'Tak, lubię kupować buty.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Har du mange venner?</i>',
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
      msg:        '<i>Ja, jeg har mange venner.</i>',
      trans:      'Tak, mam wielu przyjaciół.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Har du vondt i kneet?</i>',
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
      msg:        '<i>Ja, jeg har vondt i kneet.</i>',
      trans:      'Tak, boli mnie kolano.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Har du en båt i Norge?</i>',
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
      msg:        '<i>Jeg har ikke. Jeg kan låne en båt.</i>',
      trans:      'Nie mam. Mogę pożyczyć łódź.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Ser du disse mennene?</i>',
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
      msg:        '<i>Ja, jeg ser disse mennene.</i>',
      trans:      'Tak, widzę tych mężczyzn.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Bruker du mye sukker?</i>',
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
      msg:        '<i>Ikke så mye.</i>',
      trans:      'Nie tak dużo.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Får du mange gaver til bursdag?</i>',
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
      msg:        '<i>Ja, jeg får mange gaver til bursdag.</i>',
      trans:      'Tak, dostaję wiele prezentów na urodziny.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Liker han å se på fotballkamper?</i>',
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
      msg:        '<i>Ja, han liker å se på fotballkamper.</i>',
      trans:      'Tak, on lubi oglądać mecze.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Er kona di på jobben nå?</i>',
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
      msg:        '<i>Nei, hun har fri i dag.</i>',
      trans:      'Nie, ona ma dzisiaj wolne.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Er det ikke lys her?</i>',
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
      msg:        '<i>Dessverre. Det er ikke lys her.</i>',
      trans:      'Niestety. Nie ma tu światła.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Er det mange mennesker på kurset?</i>',
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
      msg:        '<i>Ja, det er mange mennesker på kurset.</i>',
      trans:      'Tak, jest dużo ludzi na kursie.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Har tanta mange hunder?</i>',
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
      msg:        '<i>Nei, hun har bare en hund.</i>',
      trans:      'Nie, ona ma tylko jednego psa.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Er det mye snø?</i>',
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
      msg:        '<i>Ja, det er mye snø.</i>',
      trans:      'Tak, jest dużo śniegu.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Bor de på øya?</i>',
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
      msg:        '<i>Ja, de bor på øya.</i>',
      trans:      'Tak, oni mieszkają na wyspie.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Hører du meg?</i>',
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
      msg:        '<i>Jeg hører deg ikke. Kan du gjenta?</i>',
      trans:      'Nie słyszę Cię. Czy możesz powtórzyć?',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Liker du å få blomster?</i>',
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
      msg:        '<i>Jeg liker å få blomster veldig mye.</i>',
      trans:      'Bardzo lubię dostawać kwiaty.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
      autoNext:   'RANDOM'
    }

  };


  this.extra = {

    _af1: {
      spokenWord: 'Zapytaj: Czy często rozmawiasz z ojcem?',
      startTime:  0,
      duration:   2.5 - 0,
      pauseTime:  8,
      autoNext:   '_af2'
    },
    _af2: {
      msg:        '<i>Snakker du ofte med faren?</i>',
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
      msg:        '<i>Ja, jeg snakker med ham hver dag.</i>',
      trans:      'Tak, rozmawiam z nim codziennie.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Har du mye energi?</i>',
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
      msg:        '<i>Ja, jeg har mye energi.</i>',
      trans:      'Tak, mam dużo energii.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Er det mye sand på stranda?</i>',
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
      msg:        '<i>Nei, det er ikke mye sand. Bare steiner.</i>',
      trans:      'Nie, nie ma dużo piasku. Tylko kamienie.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
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
      msg:        '<i>Har du mange klær?</i>',
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
      msg:        '<i>Nei, jeg trenger ikke mange klær.</i>',
      trans:      'Nie, nie potrzebuję wielu ubrań.',
      startTime:  4,
      duration:   6.5 - 4,
      score:      'correct',
      autoNext:   'RANDOM'
    },


  };


}
</script>
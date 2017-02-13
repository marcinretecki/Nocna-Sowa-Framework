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
      spokenWord: 'Zapytaj: Czy Tom mieszka w Bergen?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'aa2'
    },
    aa2: {
      msg:        'Bor Tom i Bergen?',
      trans:      'Czy Tom mieszka w Bergen?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'aa3'
    },
    aa3: {
      spokenWord: 'Odpowiedz: Nie, Tom nie mieszka w Bergen. On mieszka w Bodø.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'aa4'
    },
    aa4: {
      msg:        'Nei, Tom bor ikke i Bergen. Han bor i Bodø.',
      trans:      'Nie, Tom nie mieszka w Bergen. On mieszka w Bodø.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ab1: {
      spokenWord: 'Zapytaj: Czy pochodzisz z Norwegii?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'ab2'
    },
    ab2: {
      msg:        'Kommer du fra Norge?',
      trans:      'Czy pochodzisz z Norwegii?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'ab3'
    },
    ab3: {
      spokenWord: 'Odpowiedz: Nie, nie pochodzę z Norwegii. Pochodzę z Polski.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'ab4'
    },
    ab4: {
      msg:        'Nei, jeg kommer ikke fra Norge. Jeg kommer fra Polen.',
      trans:      'Nie, nie pochodzę z Norwegii. Pochodzę z Polski.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ac1: {
      spokenWord: 'Zapytaj: Czy masz dzieci?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'ac2'
    },
    ac2: {
      msg:        'Har du barn?',
      trans:      'Czy masz dzieci?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'ac3'
    },
    ac3: {
      spokenWord: 'Odpowiedz: Tak, mam dwoje dzieci.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'ac4'
    },
    ac4: {
      msg:        'Ja, jeg har to barn.',
      trans:      'Tak, mam dwoje dzieci.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ad1: {
      spokenWord: 'Zapytaj: Czy masz samochód?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'ad2'
    },
    ad2: {
      msg:        'Har du en bil?',
      trans:      'Czy masz samochód?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'ad3'
    },
    ad3: {
      spokenWord: 'Odpowiedz: Nie, nie mam samochodu. Mam rower.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'ad4'
    },
    ad4: {
      msg:        'Nei, jeg har ikke en bil. Jeg har en sykkel.',
      trans:      'Nie, nie mam samochodu. Mam rower.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ae1: {
      spokenWord: 'Zapytaj: Czy lubisz kupować buty?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'ae2'
    },
    ae2: {
      msg:        'Liker du å kjøpe sko?',
      trans:      'Czy lubisz kupować buty?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'ae3'
    },
    ae3: {
      spokenWord: 'Odpowiedz: Tak, lubię kupować buty.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'ae4'
    },
    ae4: {
      msg:        'Ja, jeg liker å kjøpe sko.',
      trans:      'Tak, lubię kupować buty.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    af1: {
      spokenWord: 'Zapytaj: Czy często rozmawiasz z ojcem?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'af2'
    },
    af2: {
      msg:        'Snakker du ofte med faren?',
      trans:      'Czy często rozmawiasz z ojcem?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'af3'
    },
    af3: {
      spokenWord: 'Odpowiedz: Tak, rozmawiam z nim codziennie.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'af4'
    },
    af4: {
      msg:        'Ja, jeg snakker med ham hver dag.',
      trans:      'Tak, rozmawiam z nim codziennie.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ah1: {
      spokenWord: 'Zapytaj: Czy masz dużo energii?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'ah2'
    },
    ah2: {
      msg:        'Har du mye energi?',
      trans:      'Czy masz dużo energii?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'ah3'
    },
    ah3: {
      spokenWord: 'Odpowiedz: Tak, mam dużo energii.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'ah4'
    },
    ah4: {
      msg:        'Ja, jeg har mye energi.',
      trans:      'Tak, mam dużo energii.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ag1: {
      spokenWord: 'Zapytaj: Czy masz wielu przyjaciół?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'ag2'
    },
    ag2: {
      msg:        'Har du mange venner?',
      trans:      'Czy masz wielu przyjaciół?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'ag3'
    },
    ag3: {
      spokenWord: 'Odpowiedz: Tak, mam wielu przyjaciół.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'ag4'
    },
    ag4: {
      msg:        'Ja, jeg har mange venner.',
      trans:      'Tak, mam wielu przyjaciół.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    aj1: {
      spokenWord: 'Zapytaj: Czy jest dużo piasku na plaży?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'aj2'
    },
    aj2: {
      msg:        'Er det mye sand på stranda?',
      trans:      'Czy jest dużo piasku na plaży?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'aj3'
    },
    aj3: {
      spokenWord: 'Odpowiedz: Nie, nie ma dużo piasku. Tylko kamienie.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'aj4'
    },
    aj4: {
      msg:        'Nei, det er ikke mye sand. Bare steiner.',
      trans:      'Nie, nie ma dużo piasku. Tylko kamienie.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ak1: {
      spokenWord: 'Zapytaj: Czy masz wiele ubrań?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'ak2'
    },
    ak2: {
      msg:        'Har du mange klær?',
      trans:      'Czy masz wiele ubrań?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'ak3'
    },
    ak3: {
      spokenWord: 'Odpowiedz: Nie, nie potrzebuję wielu ubrań.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'ak4'
    },
    ak4: {
      msg:        'Nei, jeg trenger ikke mange klær.',
      trans:      'Nie, nie potrzebuję wielu ubrań.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    al1: {
      spokenWord: 'Zapytaj: Czy boli Cię kolano?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'al2'
    },
    al2: {
      msg:        'Har du vondt i kneet?',
      trans:      'Czy boli Cię kolano?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'al3'
    },
    al3: {
      spokenWord: 'Odpowiedz: Tak, boli mnie kolano.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'al4'
    },
    al4: {
      msg:        'Ja, jeg har vondt i kneet.',
      trans:      'Tak, boli mnie kolano.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    am1: {
      spokenWord: 'Zapytaj: Czy masz łódkę w Norwegii?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'am2'
    },
    am2: {
      msg:        'Har du en båt i Norge?',
      trans:      'Czy masz łódkę w Norwegii?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'am3'
    },
    am3: {
      spokenWord: 'Odpowiedz: Nie mam. Mogę pożyczyć łódź.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'am4'
    },
    am4: {
      msg:        'Jeg har ikke. Jeg kan låne en båt.',
      trans:      'Nie mam. Mogę pożyczyć łódź.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    an1: {
      spokenWord: 'Zapytaj: Czy widzisz tych mężczyzn?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'an2'
    },
    an2: {
      msg:        'Ser du disse mennene?',
      trans:      'Czy widzisz tych mężczyzn?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'an3'
    },
    an3: {
      spokenWord: 'Odpowiedz: Tak, widzę tych mężczyzn.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'an4'
    },
    an4: {
      msg:        'Ja, jeg ser disse mennene.',
      trans:      'Tak, widzę tych mężczyzn.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ao1: {
      spokenWord: 'Zapytaj: Czy używasz dużo cukru?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'ao2'
    },
    ao2: {
      msg:        'Bruker du mye sukker?',
      trans:      'Czy używasz dużo cukru?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'ao3'
    },
    ao3: {
      spokenWord: 'Odpowiedz: Nie tak dużo.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'ao4'
    },
    ao4: {
      msg:        'Ikke så mye.',
      trans:      'Nie tak dużo.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ap1: {
      spokenWord: 'Zapytaj: Czy dostajesz wiele prezentów na urodziny?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'ap2'
    },
    ap2: {
      msg:        'Får du mange gaver til bursdag?',
      trans:      'Czy dostajesz wiele prezentów na urodziny?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'ap3'
    },
    ap3: {
      spokenWord: 'Odpowiedz: Tak, dostaję wiele prezentów na urodziny.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'ap4'
    },
    ap4: {
      msg:        'Ja, jeg får mange gaver til bursdag.',
      trans:      'Tak, dostaję wiele prezentów na urodziny.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ar1: {
      spokenWord: 'Zapytaj: Czy on lubi oglądać mecze piłki nożnej?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'ar2'
    },
    ar2: {
      msg:        'Liker han å se på fotballkamper?',
      trans:      'Czy on lubi oglądać mecze piłki nożnej?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'ar3'
    },
    ar3: {
      spokenWord: 'Odpowiedz: Tak, on lubi oglądać mecze.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'ar4'
    },
    ar4: {
      msg:        'Ja, han liker å se på fotballkamper.',
      trans:      'Tak, on lubi oglądać mecze.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    as1: {
      spokenWord: 'Zapytaj: Czy Twoja żona jest teraz w pracy?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'as2'
    },
    as2: {
      msg:        'Er kona di på jobben nå?',
      trans:      'Czy Twoja żona jest teraz w pracy?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'as3'
    },
    as3: {
      spokenWord: 'Odpowiedz: Nie, ona ma dzisiaj wolne.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'as4'
    },
    as4: {
      msg:        'Nei, hun har fri i dag.',
      trans:      'Nie, ona ma dzisiaj wolne.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    at1: {
      spokenWord: 'Zapytaj: Czy nie ma tu światła?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'at2'
    },
    at2: {
      msg:        'Er det ikke lys her?',
      trans:      'Czy nie ma tu światła?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'at3'
    },
    at3: {
      spokenWord: 'Odpowiedz: Niestety. Nie ma tu światła.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'at4'
    },
    at4: {
      msg:        'Dessverre. Det er ikke lys her.',
      trans:      'Niestety. Nie ma tu światła.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ax1: {
      spokenWord: 'Zapytaj: Czy jest dużo ludzi na kursie?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'ax2'
    },
    ax2: {
      msg:        'Er det mange mennesker på kurset?',
      trans:      'Czy jest dużo ludzi na kursie?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'ax3'
    },
    ax3: {
      spokenWord: 'Odpowiedz: Tak, jest dużo ludzi na kursie.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'ax4'
    },
    ax4: {
      msg:        'Ja, det er mange mennesker på kurset.',
      trans:      'Tak, jest dużo ludzi na kursie.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ay1: {
      spokenWord: 'Zapytaj: Czy ciocia ma dużo psów?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'ay2'
    },
    ay2: {
      msg:        'Har tanta mange hunder?',
      trans:      'Czy ciocia ma dużo psów?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'ay3'
    },
    ay3: {
      spokenWord: 'Odpowiedz: Nie, ona ma tylko jednego psa.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'ay4'
    },
    ay4: {
      msg:        'Nei, hun har bare en hund.',
      trans:      'Nie, ona ma tylko jednego psa.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    az1: {
      spokenWord: 'Zapytaj: Czy jest dużo śniegu?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'az2'
    },
    az2: {
      msg:        'Er det mye snø?',
      trans:      'Czy jest dużo śniegu?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'az3'
    },
    az3: {
      spokenWord: 'Odpowiedz: Tak, jest dużo śniegu.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'az4'
    },
    az4: {
      msg:        'Ja, det er mye snø.',
      trans:      'Tak, jest dużo śniegu.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    ba1: {
      spokenWord: 'Zapytaj: Czy oni mieszkają na wyspie?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'ba2'
    },
    ba2: {
      msg:        'Bor de på øya?',
      trans:      'Czy oni mieszkają na wyspie?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'ba3'
    },
    ba3: {
      spokenWord: 'Odpowiedz: Tak, oni mieszkają na wyspie.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'ba4'
    },
    ba4: {
      msg:        'Ja, de bor på øya.',
      trans:      'Tak, oni mieszkają na wyspie.',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    bb1: {
      spokenWord: 'Zapytaj: Czy słyszysz mnie?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'bb2'
    },
    bb2: {
      msg:        'Hører du meg?',
      trans:      'Czy słyszysz mnie?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'bb3'
    },
    bb3: {
      spokenWord: 'Odpowiedz: Nie słyszę Cię. Czy możesz powtórzyć?',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'bb4'
    },
    bb4: {
      msg:        'Jeg hører deg ikke. Kan du gjenta?',
      trans:      'Nie słyszę Cię. Czy możesz powtórzyć?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'RANDOM'
    },


    bc1: {
      spokenWord: 'Zapytaj: Czy lubisz dostawać kwiaty?',
      startTime:  0,
      stopTime:   2.5,
      pauseTime:  8,
      autoNext:   'bc2'
    },
    bc2: {
      msg:        'Liker du å få blomster?',
      trans:      'Czy lubisz dostawać kwiaty?',
      startTime:  4,
      stopTime:   6.5,
      autoNext:   'bc3'
    },
    bc3: {
      spokenWord: 'Odpowiedz: Bardzo lubię dostawać kwiaty.',
      startTime:  4,
      stopTime:   6.5,
      pauseTime:  8,
      autoNext:   'bc4'
    },
    bc4: {
      msg:        'Jeg liker å få blomster veldig mye.',
      trans:      'Bardzo lubię dostawać kwiaty.',
      startTime:  4,
      stopTime:   6.5,
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
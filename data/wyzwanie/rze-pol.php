<script>
function LasChatData() {

  this.testNotes = [
  ];

  this.intro = {
    a1: {
      bubbles: [ '' ],
      answers: [
       { answer: '', next: 'a2' }
      ]
    },
    a2: {
      bubbles: [ '' ],
      answers: [
       { answer: '', next: 'a3' },
       { answer: '', next: 'a3' }
      ]
    },
    a3: {
      bubbles: [ '' ],
      answers: [
        { answer: '', next: 'a5' },
        { answer: '', next: 'a4' }
      ]
    },
    a4: {
      bubbles: [ '' ],
      answers: [
        { answer: '', next: 'a5' }
      ]
    },
    a5: {
      bubbles: [ '' ],
      autoNext: 'ENDINTRO'
    }

  };


  this.chat = {

    aa1: {
      bubbles: [ 'Czy drzewa są policzalne?' ],
      answers: [
        { answer: 'tak', next: 'aa2' },
        { answer: 'nie', next: 'aa1b' }
      ]
    },
    aa1b:  {
      bubbles: [
        'emoty drzew #emoji-aaaaa #emoji-aaaaa #emoji-aaaaa',
        'Zobacz da się je policzyć: et tre, to trær, tre trær...'
      ],
      answers:  [
        { answer: 'OK. Są policzalne.', next: 'aa2'}
      ]
    },
    aa2:  {
      bubbles:  [
        'Bra! Przy większej ilości czasu możesz zrobić nawet ich inwentaryzację.',
        '<img src="http://giphy.com/gifs/cinemagraph-cinemagraphs-3oGRFkoGqqLVycWg9y" />'
      ],
      autoNext: 'aa3'
    },
    aa3: {
      bubbles: [ 'Czy drewno jest policzalne?' ],
      answers: [
        { answer: 'nie', next: 'aa4' },
        { answer: 'tak', next: 'aa4' }
      ]
    },
    aa4:  {
      bubbles: [ 'To jak powiesz drewno?' ],
      answers:  [
        { answer: '<i>tre</i>', next: 'aa5'},
        { answer: '<i>et tre</i>', next: 'aa4b'}
      ]
    },
    aa4b:  {
      bubbles:  [ 'Rodzajnik oznacza jedną sztukę czegoś, co da się policzyć. Można policzyć kawałki drewna, bo kawałki są policzalne.' ],
      answers:  [
        { answer: 'tre = drewno', nest: 'aa5' }
      ]
    },
    aa5:  {
      bubbles:  [ '<i>Fint!</i>',
        'Drugim słowem na drewno jest <i>(en) ved</i>.',
        'I jest też...' ],
      answers:  [
        { answer: 'niepoliczalne!', nest: 'aa6' }
      ]
    },
    aa6:  {
      bubbles:  [ '#emoji-aaaaa' ],
      autoNext: 'RANDOM'
    },


    ab1: {
      bubbles: [
        'Przeanalizujmy taką sytuację.',
        '<img src="http://giphy.com/gifs/europeana-winter-Q3cJvgxtBUtqg" />',
        'Czy ten piasek, którym sypie miły pan jest policzalny?'
      ],
      answers: [
        { answer: 'nie', next: 'ab2' },
        { answer: 'tak', next: 'ab1b' }
      ]
    },
    ab1b:  {
      bubbles: [
        'Trudno zliczyć każde ziarenko.',
        'Można policzyć siatki piasku, garście, wiadra albo inne pojemniki. Samego piasku raczej nie policzysz.'
      ],
      autoNext: 'ab2'
    },
    ab2: {
      bubbles: [
        'Dlatego w zdaniu będziesz używać:'
      ],
      answers:  [
        { answer: 'en sand', next: 'ab2b' },
        { answer: 'sand', next: 'ab3' }
      ]
    },
    ab2b:  {
      bubbles:  [
        'Rodzajnik oznacza jedną sztukę. Nie powiesz o jednym piasku.',
        'Może czasem o jednym rodzaju piasku, ale to już rodzaje będą policzalne. Nie piasek.',
        'Dlatego w zdaniu użyjesz:'
      ],
      answers: [
        { answer: '<i>sand</i>', next: 'ab3' }
      ]
    },
    ab3: {
      bubbles: [
        'Dobrze!',
        'emoty....'
      ],

    },
    ab4: {
      bubbles: [ 'Co w takim razie ze śniegiem? Które zdanie jest poprawne.' ],
      answers: [
        { answer: 'det er mye snø.', next: 'ab5' },
        { answer: 'det er mange snøer.', next: 'ab4b' }
      ]
    },
    ab4b: {
      bubbles: [
        'Śnieg jest niepoliczalny, dlatego nie dodajemy nigdy końcówki -er.',
        'Nie pasuje też <i>mange</i>, które jest wyłącznie do rzeczowników policzalnych.'
      ],
      answers: [
        { answer: 'OK, <i>mye snø</i>', next: 'ab5' }
      ]
    },
    ab5:  {
      bubbles: [ '<i>Riktig svar!</i>' ],
      autoNext: 'ab2'
    },


    ac1: {
      bubbles: [
        'Przed Tobą tańczący tłum. Dużo ludu trudnego do zliczenia.',
        '<img src="http://giphy.com/gifs/europeana-dance-vintage-l0MYvqJRuImOuhFYY" />',
        'Jeśli pomyślisz o nich jako: <i>folk</i> (lud, ludność), to zazwyczaj użyjesz jako słowa w liczbie pojedynczej.',
        'Np. <i>Det er mye folk.</i>',
        'Zgodnie z tą zasadą, powiedz: Jest bardzo niewielu ludzi.'
      ],
      answers: [
        { answer: 'det er veldig lite folk.', next: 'ac2' },
        { answer: 'det er veldig få folk.', next: 'ac1b' }
      ]
    },
    ac1b: {
      bubbles: [ '<i>Få</i> znaczy niewiele i użyjesz go ze słowami policzalnymi. Tymi, których używasz z rodzajnikiem i możesz stworzyć liczbę mnogą.' ],
      answers: [
        { answer: 'OK. przyda się', next: 'ac2' }
      ]
    },
    ac2: {
      bubbles: [ 'Jak jest człowiek?' ],
      answers: [
        { answer: 'et menneske', next: 'ac3' },
        { answer: '(et) folk', next: 'ac2b' }
      ]
    },
    ac2b: {
      bubbles: [ '<i>(Et) folk,/i> to ludność, lud. Słowo używane najczęściej niepoliczalnie.', 'Jeden człowiek to:' ],
      answers: [
        { answer: '<i>et mennesket</i>', next: 'ac3' }
      ]
    },
    ac3: {
      bubbles: [ 'Czy ludzie są policzalni?' ],
      answers: [
        { answer: 'tak (mennesker/menneskene)', next: 'ac4' },
        { answer: 'nigdy', next: 'ac3b' }
      ]
    },
    ac3b: {
      bubbles: [ '{jakiś gif z załamką.' ],
      answers: [
        { answer: 'OK, policzalni', next: 'ac4' }
      ]
    },
    ac4: {
      bubbles: [ 'A osoby?' ],
      answers: [
        { answer: 'policzalne', next: 'ac5' },
        { answer: 'niepoliczalne', next: 'ac4b' }
      ]
    },
    ac4b: {
      bubbles: [ '<i>en person, to personer...</i>', 'Zobacz, da się policzyć.' ],
      answers: [
        { answer: 'OK. wiem przecież [czy to przecież nie jest za mocne?]', next: 'ac5' }
      ]
    },
    ac5:  {
      bubbles: [ 'pochwały, pochawały, pochwały' ],
      autoNext: 'RANDOM'
    },



    ad1: {
      bubbles: [
        'Załóżmy, że w tym pomieszczeniu jest dużo miłości. Mimo chłodu.',
        '<img src="http://giphy.com/gifs/europeana-vintage-PJSDuDAjOFCCY" />',
        'OK?'
      ],
      answers: [
        { answer: 'OK.', next: 'ad2' }
      ]
    },
    ad2: {
      bubbles: [ 'Czy ta miłość może być policzalna?' ],
      answers: [
        { answer: 'nie', next: 'ad3' },
        { answer: 'tak', next: 'ad2b' }
      ]
    },
    ad2b: {
      bubbles: [
        'W jakiej jednostce? Sowie nie przychodzi żadna do głowy.',
        'Dlatego zapamiętaj, że uczucia są niepoliczalne.'
      ],
      answers: [
        { answer: 'no dobra', next: 'ad3' }
      ]
    },
    ad3:  {
      bubbles: [
        '<i>Pent!</i>',
        'Jak zapiszesz sobie na fiszce słowo miłość?'
      ],
      answers:  [
        { answer: '(ei) kjærlighet', next: 'ad4'},
        { answer: 'ei kjærlighet', next: 'ad3b'},
        { answer: 'kjærlighet', next: 'ad3b'}
      ]
    },
    ad3b:  {
      bubbles:  [
        'My proponujemy wersje z nawiasem. Rodzajnik trzeba zawsze znać, bo czasem będziesz potrzebował użyć słowa w formie określonej.',
        'Np. Ich miłość jest zakazana: <i>Kjærligheta deres er forbudt.</i>'
      ],
      answers: [
        { answer: 'słusznie', next: 'ad4' }
      ]
    },
    ad4:  {
      bubbles:  [
        'pochwały pochwały pochwały'
      ],
      autoNext: 'RANDOM'
    },


    ae1: {
      bubbles: [
        'Woda, albo inne płyny trudne są do policzenia.',
        '<img src="http://giphy.com/gifs/europeana-sea-new-year-wZsnJfRdIN5Dy" />',
        'Możesz oczywiście policzyć litry wody, ale nie samą wodę.',
        'Możesz policzyć butelki wody, ale nie sam płyn.',
        'Jak powiedzieć, że on lubi pić dużo wody.',
        '<i>Han liker å drikke...</i>'
      ],
      answers: [
        { answer: 'mye vann', next: 'ae2' },
        { answer: 'mye et vann', next: 'ae1b' }
      ]
    },
    ae1b:  {
      bubbles: [ '[tu brakuje info o złej odp]' ],
      answers:  [
        { answer: 'ok', next: 'ae2'}
      ]
    },
    ae2: {
      bubbles: [
        '<i>Et vann</i> ma także drugie znaczenie. To jezioro.',
        'Czy jeziora mogą być policzalne?'
      ],
      answers: [
        { answer: 'tak', next: 'ae3' },
        { answer: 'nie', next: 'ae2b' }
      ]
    },
    ae2b:  {
      bubbles: [
        'Mogą. Jedno jezioro <i>et vann</i>, dwa jeziora <i>to vann</i> itd.',
        'Pamiętasz dlaczego nie dodaliśmy końcówki -er w liczbie mnogiej?'
      ],
      answers: [
        { answer: 'pamiętam', next: 'ae3' },
        { answer: 'nie za bardzo', next: 'ae2c' }
      ]
    },
    ae2c:  {
      bubbles:  [ 'To koniecznie wróć do ćwiczenia liczmy mnogiej' ],
      answers: [
        { answer: 'OK', next: 'ae' }
      ]
    },
    ae3: {
      bubbles: [
        'Dobrze.',
        'Czyli jeziora są policzalne?'
      ],
      answers: [
        { answer: 'jak najbardziej sowo!', next: 'ae4' }
      ]
    },
    ae4: {
      bubbles: [
        'Supert!',
        'Czy woda może być w formie określonej? <i>Vannet</i>?'
      ],
      answers: [
        { answer: 'pewnie', next: 'ae5' },
        { answer: 'raczej nie', next: 'ae5' }
      ]
    },
    ae5:  {
      bubbles: [
        'Oczywiście. Np. w zdaniu. Woda (ta konkretna) jest zimna.',
        '<i>Vannet er kaldt.</i>',
        'pochwała albo coś?'
      ],
      autoNext: 'RANDOM'
    },




    af1: {
      bubbles: [ 'Czy jedzenie jest policzalne?' ],
      answers: [
        { answer: 'nie', next: 'af2' },
        { answer: 'tak', next: 'af2' }
      ]
    },
    af2:  {
      bubbles: [
        'Trudno policzyć jedzenie.',
        '<img src="https://media3.giphy.com/media/PGJrojPdkZIT6/200.gif" />',
        'Policzalne za to mogą być posiłki: <i>retter</i> albo porcje: <i>porsjoner</i>.'
      ],
      autoNext: 'af3'
    },
    af3: {
      bubbles: [
        'Przeanalizujmy kolejną scenę.',
        '<img src="http://66.media.tumblr.com/1f648a0d3ea26bf842af9d602d0bf922/tumblr_nb8naxte8A1s2wio8o1_500.gif" />',
        'Czy pająk to:'
      ],
      answers: [
        { answer: 'en edderkopp', next: 'af' },
        { answer: 'edderkopp', next: 'afaf3b' }
      ]
    },
    af3b:  {
      bubbles: [
        'Ten był ewidentnie jeden, więc z rodzajnikiem.',

      ],
      autoNext: 'af4'
    },
    af4: {
      bubbles: [
        'Oczywiście. Jest policzalny.',
        'Nawet jeśli znajdziesz ich tyle, że nie da się policzyć...',
        '<img src="https://s-media-cache-ak0.pinimg.com/originals/28/e8/3c/28e83c3fe56daf1adc08a3a3c1128a0e.gif" />',
        '...to słowo <i>en edderkopp</i> nadal jest w słowniku policzalne.'
      ],
      answers: [
        { answer: 'OK, <i>mange edderkopper</i>', next: 'af5' }
      ]
    },
    af5: {
      bubbles: [ 'Zmieńmy scenerię.' ],
      answers: [
        { answer: 'poproszę.', next: 'af6' }
      ]
    },
    af6: {
      bubbles: [
        '<img src="https://media.giphy.com/media/cSCOzZpraxWtq/giphy.gif" />',
        'Czy kamienie mogą być policzalne?'
      ],
      answers: [
        { answer: 'tak', next: 'af7' },
        { answer: 'nie', next: 'af6b' }
      ]
    },
    af6b:  {
      bubbles: [
        'Jeśli ktoś użyje określenia <i>mye stein</i>, które znaczy, że chodzi mu o "dużo kamienia/skały".',
        'Materiału, którego nie da się policzyć.',
        'Jednak śmiało możesz policzyć pojedyncze kamienie: <i>en stein, to steiner, tre steiner</i>.'
      ],
      answers:  [
        { answer: 'OK', next: 'af7'}
      ]
    },
    af7: {
      bubbles: [
        '<i>steinkul!</i>',
        'jakieś emoty???'
      ],
      autoNext: 'RANDOM'
    },


    ag1: {
      bubbles: [
        'Załóżmy, że chcesz powiedzieć: Ona ma piękne włosy.',
        '<img src="http://giphy.com/gifs/the-tourist-WyJ5xM2FJ5frO" />',
        '<i>Hun har pent hår.</i><br />czy<br /><i>Hun har et pent hår.</i>',
        'Użyjesz rodzajnika?'
      ],
      answers: [
        { answer: 'nie', next: 'ag' },
        { answer: 'tak', next: 'ag' }
      ]
    },
    ag1b:  {
      bubbles: [
        'Kiedy mówisz o włosach to pamiętaj, że jest ich tak dużo, że nie da się policzyć.',
        'Czyli są niepoliczalne. Używasz w liczbie pojedynczej i nie dodajesz rodzajnika.'
      ],
      answers:  [
        { answer: 'rozumiem', next: 'ag2'}
      ]
    },
    ag2:  {
      bubbles:  [ '<i>Greit!</i>' ],
      answers: [
        { answer: 'sowo, jak powiedzieć w takim razie jeden włos?', next: 'ag3' }
      ]
    },
    ag4:  {
      bubbles: [
        'Jeden włos to: et hårstrå. Zapamiętaj źdźbło włosa, bo et strå to źdźbło.',
        '<img src="http://66.media.tumblr.com/cd1bab566d22799dcf70591b679752e8/tumblr_oc9hvlRcIe1r4or01o1_500.gif" />'
      ],
      answers:  [
        { answer: 'OK!', next: 'RANDOM'}
      ]
    },






    ah1: {
      bubbles: [ 'Co oznacza określenie: mye lys?' ],
      answers: [
        { answer: 'dużo światła', next: 'ah2' },
        { answer: 'wiele świateł', next: 'ah1b' }
      ]
    },
    ah1b:  {
      bubbles: [
        'Wiele świateł albo świeczek, to by było: <i>mange lys</i>.',
        '<i>Mye</i> używamy razem z rzeczownikami niepoliczalnymi.',
        '<i>Mange</i> jest dla policzalnych.',
        'Światło może być ...... tu jeszcze wyjasnienie'
      ],
      answers:  [
        { answer: '', next: 'ah2'}
      ]
    },


    aj1: {
      bubbles: [
        'Jeśli chcesz powiedzieć, że jest lokalna mgła.',
        '<img src="https://tana-the-dreamchaser.tumblr.com/post/124316768416" />',
        'Użyjesz rodzajnika czy nie?'
      ],
      answers: [
        { answer: 'lokal tåke', next: 'aj2' },
        { answer: 'ei lokal tåke', next: 'aj1b' }
      ]
    },
    aj1b:  {
      bubbles: [ 'Rodzajnik nie jest potrzebny, ponieważ nie chodzi Ci o jedną mgłę. Jest niepoliczalna.' ],
      autoNext: 'aj3'
    },
    aj2:  {
      bubbles:  [ '<i>Veldig bra!</i>' ],
      autoNext: 'aj3'
    },
    aj3: {
      bubbles: [
        'Zobaczmy kolejną scenę.',
        '<img src="http://giphy.com/gifs/the-x-files-x-files-the-xfiles-26FPDz479VIGSVKik" />',
        'Czy deszcz jest policzalny?'
      ],
      answers: [
        { answer: 'policzalny', next: 'aj3b' },
        { answer: 'niepoliczalny', next: 'aj' }
      ]
    },
    aj3b:  {
      bubbles: [
        'Niestety. Jest niepoliczalny.',
        '<img src="http://giphy.com/gifs/2xdzNrPE50WLC" />'
      ],
      answers:  [
        { answer: 'a, no to OK', next: 'aj2'}
      ]
    },
    aj4:  {
      bubbles:  [ '<i>Flott!</i>' ],
      autoNext: ''
    },


    ak1: {
      bubbles: [ 'Jest mało deszczu tej jesieni.' ],
      answers: [
        { answer: 'det er få regn i høst.', next: 'ak1b' },
        { answer: 'det er lite regn i høst.', next: 'ak2' }
      ]
    },
    ak1b:  {
      bubbles: [ 'Dla niepoliczalnych jest lite.' ],
      answers:  [
        { answer: 'OK', next: 'ak2'}
      ]
    },
    ak2:  {
      bubbles:  [
        'emot OKejki',
        '<img src="http://giphy.com/gifs/film-musical-singin-in-the-rain-yRTdekC5wR2Mw" />',
        '<img src="http://giphy.com/gifs/cute-dancing-39fj7g99qyD72" />'
      ],
      autoNext: 'ak3'
    },
    ak3: {
      bubbles: [ 'A radość, szczęście albo smutek?' ],
      answers: [
        { answer: 'niepoliczalne', next: 'ak' },
        { answer: 'policzalne', next: 'ak' }
      ]
    },
    ak1b:  {
      bubbles: [ '' ],
      answers:  [
        { answer: '', next: 'ak2'}
      ]
    },
    ak2:  {
      bubbles:  [ '' ],
      autoNext: ''
    },



    al1: {
      bubbles: [ 'Mąka, cukier, żwir?' ],
      answers: [
        { answer: 'niepoliczalne', next: 'al' },
        { answer: 'policzalne', next: 'al' }
      ]
    },
    al1b:  {
      bubbles: [ '' ],
      answers:  [
        { answer: '', next: 'al2'}
      ]
    },
    al2:  {
      bubbles:  [ '' ],
      autoNext: ''
    },



    am1: {
      bubbles: [ 'Gløgg, saft, cola?' ],
      answers: [
        { answer: 'niepoliczalne', next: 'am' },
        { answer: 'policzalne', next: 'am' }
      ]
    },
    am1b:  {
      bubbles: [ '' ],
      answers:  [
        { answer: '', next: 'am2'}
      ]
    },
    am2:  {
      bubbles:  [ '' ],
      autoNext: ''
    },



    xx1: {
      bubbles: [ 'A śmieci?' ],
      answers: [
        { answer: 'niepoliczalne', next: 'xx' },
        { answer: 'policzalne', next: 'xx' }
      ]
    },
    xx1b:  {
      bubbles: [ 'Śmieci to: (et) avfall lub (et) søppel. Oba niepoliczalne!' ],
      answers:  [
        { answer: '', next: 'xx2'}
      ]
    },
    xx2:  {
      bubbles:  [ '' ],
      autoNext: ''
    },




  };


  this.end = {
    a1: {
      bubbles: [
        'Brawo! Kawał dobrej roboty!',
        'To był trudny odcinek trasy, ale wróć do niego koniecznie.',
        'No i pamiętaj, że zawsze Ci pomogę.',
        '<img src="http://giphy.com/gifs/maudit-maudit-buster-keaton-one-week-vLmtj4W2vDirS" />',
        'Twoja Sowa.'
      ],
      autoNext: 'END'
    }
  };



}
</script>
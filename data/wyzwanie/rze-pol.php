<script>
function LasChatData() {

  this.testNotes = [
  ];

  this.intro = {
    _a1: {
      bubbles: [
        '<i>Halla!</i>',
        '<img src="/las/c/i/rze-pol/fvzQtgBkrEgLK.gif" />'
      ],
      answers: [
       { answer: '<i>halla!</i>', next: '_a2' },
       { answer: '<i>hei, hei!</i>', next: '_a2' }
      ]
    },
    _a2: {
      bubbles: [
        'Dzisiaj będzie ważna rozmowa między nami. W cztery oczy. Tylko Ty i ja. ',
        'Wiesz, bo niektórzy boją się myśleć na trudne tematy i odkładają je na później. A tu nie ma już na co czekać.',
        'Jak zwykle, mam do Ciebie trochę pytań, bo uważam, że jeśli sam znajdziesz na nie odpowiedź, to będziesz mądrzejszym podróżnikiem.',
        'To co, ruszamy?',
        '<img src="/las/c/i/rze-pol/3oz8xEpseMV1isTuJq.gif" />'
      ],
      answers: [
        { answer: '<i>jøss!</i>', next: 'ENDINTRO' }
      ]
    }

  };


  this.chat = {

    _aa1: {
      bubbles: [ 'Czy drzewa są policzalne?' ],
      answers: [
        { answer: 'tak', next: '_aa2', correct: true },
        { answer: 'nie', next: '_aa1b' }
      ]
    },
    _aa1b:  {
      bubbles: [
        '#emoji-1f333;#emoji-1f333;#emoji-1f333;',
        'Zobacz da się je policzyć: <i>et tre, to trær, tre trær</i>...'
      ],
      answers:  [
        { answer: 'OK. Są policzalne.', next: '_aa2', correct: true }
      ]
    },
    _aa2:  {
      bubbles:  [
        'Bra! Przy większej ilości czasu możesz zrobić nawet ich inwentaryzację.',
        '<img src="/las/c/i/rze-pol/3oGRFkoGqqLVycWg9y.gif" />'
      ],
      autoNext: '_aa3'
    },
    _aa3: {
      bubbles: [ 'Czy drewno jest policzalne?' ],
      answers: [
        { answer: 'nie', next: '_aa4', correct: true },
        { answer: 'tak', next: '_aa4' }
      ]
    },
    _aa4:  {
      bubbles: [ 'To jak powiesz: Gdzie jest drewno?' ],
      answers:  [
        { answer: '<i>Hvor er tre?</i>', next: '_aa5', correct: true },
        { answer: '<i>Hvor er et tre?</i>', next: '_aa4b' }
      ]
    },
    _aa4b:  {
      bubbles:  [
        'Rodzajnik oznacza jedną sztukę czegoś, co da się policzyć. Można policzyć drzewa i kawałki drewna, bo kawałki są policzalne.',
        'Ale gdy pytasz, gdzie jest drewno, nie użyjesz rodzajnika.'
      ],
      answers:  [
        { answer: '<i>tre</i> = drewno', nest: 'aa5' }
      ]
    },
    _aa5:  {
      bubbles:  [ '<i>Fint!</i>',
        'Drugim słowem na drewno jest <i>(en) ved</i>.',
        'I jest też...' ],
      answers:  [
        { answer: 'niepoliczalne!', nest: 'aa6' }
      ]
    },
    _aa6:  {
      bubbles:  [ '#emoji-1f920;' ],
      autoNext: 'RANDOM'
    },


    _ab1: {
      bubbles: [
        'Przeanalizujmy taką sytuację.',
        '<img src="/las/c/i/rze-pol/Q3cJvgxtBUtqg.gif" />',
        'Czy ten piasek, którym sypie miły pan jest policzalny?'
      ],
      answers: [
        { answer: 'nie', next: '_ab2', correct: true },
        { answer: 'tak', next: '_ab1b' }
      ]
    },
    _ab1b:  {
      bubbles: [
        'Trudno zliczyć każde ziarenko.',
        'Można policzyć siatki piasku, garście, wiadra albo inne pojemniki. Samego piasku raczej nie policzysz.'
      ],
      autoNext: '_ab2'
    },
    _ab2: {
      bubbles: [
        'Dlatego w zdaniu będziesz używać:'
      ],
      answers:  [
        { answer: '<i>en sand</i>', next: '_ab2b' },
        { answer: '<i>sand</i>', next: '_ab3', correct: true }
      ]
    },
    _ab2b:  {
      bubbles:  [
        'Rodzajnik oznacza jedną sztukę. Nie powiesz o jednym piasku.',
        'Może czasem o jednym rodzaju piasku, ale to już rodzaje będą policzalne. Nie piasek.',
        'Dlatego w zdaniu użyjesz:'
      ],
      answers: [
        { answer: '<i>sand</i>', next: '_ab3' }
      ]
    },
    _ab3: {
      bubbles: [
        'Dobrze!',
        '#emoji-1f3dc; #emoji-1f3d6; #emoji-1f3dd;'
      ],
      answers: [
        { answer: 'no raczej #emoji-1f60e;', next: '_ab4' }
      ]
    },
    _ab4: {
      bubbles: [
        '<img src="/las/c/i/rze-pol/OjB9Akf2ZXN7i.gif" />',
        'Co w takim razie ze śniegiem? Które zdanie jest poprawne?'
      ],
      answers: [
        { answer: '<i>det er mye snø</i>', next: '_ab5', correct: true },
        { answer: '<i>det er mange snøer</i>', next: '_ab4b' }
      ]
    },
    _ab4b: {
      bubbles: [
        'Śnieg jest niepoliczalny, dlatego nie dodajemy nigdy końcówki <i>-er</i>.',
        'Nie pasuje też <i>mange</i>, które jest wyłącznie do rzeczowników policzalnych.'
      ],
      answers: [
        { answer: 'OK, <i>mye snø</i>', next: '_ab5' }
      ]
    },
    _ab5:  {
      bubbles: [
        '<i>Riktig svar!</i>',
        '#emoji-2603;'
      ],
      autoNext: 'RANDOM'
    },


    _ac1: {
      bubbles: [
        'Przed Tobą tańczący tłum. Dużo ludu trudnego do zliczenia.',
        '<img src="/las/c/i/rze-pol/l0MYvqJRuImOuhFYY.gif" />',
        'Jeśli pomyślisz o nich jako: <i>folk</i> (lud, ludność), to zazwyczaj użyjesz jako słowa w liczbie pojedynczej.',
        'Np. <i>Det er mye folk.</i>',
        'Zgodnie z tą zasadą, powiedz: Jest bardzo niewielu ludzi.'
      ],
      answers: [
        { answer: '<i>det er veldig lite folk</i>', next: '_ac2', correct: true },
        { answer: '<i>det er veldig få folk</i>', next: '_ac1b' }
      ]
    },
    _ac1b: {
      bubbles: [ '<i>Få</i> znaczy niewiele i użyjesz go ze słowami policzalnymi. Tymi, których używasz z rodzajnikiem i możesz stworzyć liczbę mnogą.', 'Np. <i>få gutter</i> – niewielu chłopców' ],
      answers: [
        { answer: 'OK, przyda się', next: '_ac2' }
      ]
    },
    _ac2: {
      bubbles: [ 'Jak jest człowiek?' ],
      answers: [
        { answer: '<i>et menneske</i>', next: '_ac3', correct: true },
        { answer: '<i>(et) folk</i>', next: '_ac2b' }
      ]
    },
    _ac2b: {
      bubbles: [ '<i>(Et) folk</i> to ludność, lud. Słowo używane najczęściej niepoliczalnie.', 'Jeden człowiek to:' ],
      answers: [
        { answer: '<i>et menneske</i>', next: '_ac3' }
      ]
    },
    _ac3: {
      bubbles: [
        'Czy ludzie są policzalni?',
        '<img src="/las/c/i/rze-pol/vcAd8Fgt5yjvi.gif" />'
      ],
      answers: [
        { answer: 'tak (<i>mennesker/menneskene</i>)', next: '_ac4', correct: true },
        { answer: 'nigdy', next: '_ac3b' }
      ]
    },
    _ac3b: {
      bubbles: [ '#emoji-1f926-1f3fc;' ],
      answers: [
        { answer: 'OK, policzalni', next: '_ac4' }
      ]
    },
    _ac4: {
      bubbles: [ 'A osoby?' ],
      answers: [
        { answer: 'policzalne', next: '_ac5', correct: true },
        { answer: 'niepoliczalne', next: '_ac4b' }
      ]
    },
    _ac4b: {
      bubbles: [ '<i>en person, to personer...</i>', 'Zobacz, da się policzyć.' ],
      answers: [
        { answer: 'OK, już wiem', next: '_ac5' }
      ]
    },
    _ac5:  {
      bubbles: [ '#emoji-1f574;#emoji-1f574;' ],
      autoNext: 'RANDOM'
    },



    _ad1: {
      bubbles: [
        'Załóżmy, że w tym pomieszczeniu jest dużo miłości. Mimo chłodu.',
        '<img src="/las/c/i/rze-pol/PJSDuDAjOFCCY.gif" />',
        'OK?'
      ],
      answers: [
        { answer: 'OK.', next: '_ad2' }
      ]
    },
    _ad2: {
      bubbles: [ 'Czy ta miłość może być policzalna?' ],
      answers: [
        { answer: 'nie', next: '_ad3', correct: true },
        { answer: 'tak', next: '_ad2b' }
      ]
    },
    _ad2b: {
      bubbles: [
        'W jakiej jednostce? Sowie nie przychodzi żadna do głowy.',
        'Dlatego zapamiętaj, że uczucia są niepoliczalne.'
      ],
      answers: [
        { answer: 'no dobra', next: '_ad3' }
      ]
    },
    _ad3:  {
      bubbles: [
        '<i>Pent!</i>',
        'Jak zanotujesz sobie słowo miłość? #emoji-1f49f;'
      ],
      answers:  [
        { answer: '<i>(ei) kjærlighet</i>', next: '_ad4', correct: true },
        { answer: '<i>ei kjærlighet</i>', next: '_ad3b' },
        { answer: '<i>kjærlighet</i>', next: '_ad3b' }
      ]
    },
    _ad3b:  {
      bubbles:  [
        'My proponujemy wersje z nawiasem. Rodzajnik trzeba zawsze znać, bo czasem przyda Ci się słowo w formie określonej.',
        'Np. Ich miłość jest trudna.',
        '<i>Kjærligheta deres er vanskelig.</i> #emoji-1f470-1f3fc; #emoji-1f474-1f3fc;'
      ],
      answers: [
        { answer: 'OK, <i>(ei) kjærlighet</i>', next: '_ad4' }
      ]
    },
    _ad4:  {
      bubbles:  [
        '<img src="/las/c/i/rze-pol/26hitWmUPUGneG3Is.gif" />'
      ],
      autoNext: '_ad5'
    },
    _ad5: {
      bubbles: [ 'A radość, szczęście albo smutek?' ],
      answers: [
        { answer: 'policzalne', next: '_ad5b' },
        { answer: 'niepoliczalne', next: '_ad6', correct: true }
      ]
    },
    _ad5b:  {
      bubbles: [ 'Tak jak z miłością, uczucia są niepoliczalne.' ],
      answers:  [
        { answer: 'no tak!', next: '_ad6'}
      ]
    },
    _ad6:  {
      bubbles:  [
        '<i>(ei) glede, (ei) lykke, (ei) sorg</i>',
        '#emoji-1f601; #emoji-1f60a; #emoji-1f622;'
      ],
      autoNext: 'RANDOM'
    },


    _ae1: {
      bubbles: [
        'Woda, albo inne płyny trudne są do policzenia.',
        '<img src="/las/c/i/rze-pol/wZsnJfRdIN5Dy.gif" />',
        'Możesz oczywiście policzyć litry wody, ale nie samą wodę.',
        'Możesz policzyć butelki wody, ale nie sam płyn.',
        'Jak powiedzieć, że on lubi pić dużo wody. #emoji-1f6b0;',
        '<i>Han liker å drikke...</i>'
      ],
      answers: [
        { answer: '<i>mye vann</i>', next: '_ae2', correct: true },
        { answer: '<i>mye et vann</i>', next: '_ae1b' }
      ]
    },
    _ae1b:  {
      bubbles: [ 'Dużo jednej wody? Na pewno? #emoji-1f914;' ],
      answers:  [
        { answer: 'OK, bez rodzajnika', next: '_ae2'}
      ]
    },
    _ae2: {
      bubbles: [
        'Zgadza się, ale <i>et vann</i> ma także drugie znaczenie – jezioro.',
        'Czy jeziora mogą być policzalne?'
      ],
      answers: [
        { answer: 'tak', next: '_ae3', correct: true },
        { answer: 'nie', next: '_ae2b' }
      ]
    },
    _ae2b:  {
      bubbles: [
        'Mogą. Jedno jezioro <i>et vann</i>, dwa jeziora <i>to vann</i> itd.',
        'Pamiętasz dlaczego nie dodaliśmy końcówki <i>-er</i> w liczbie mnogiej?'
      ],
      answers: [
        { answer: 'pamiętam', next: '_ae4' },
        { answer: 'nie za bardzo', next: '_ae2c' }
      ]
    },
    _ae2c:  {
      bubbles:  [
        'To słow jest jednosylabowe rodzaju <i>et</i>.',
        'Koniecznie wróć do wyzwania na liczbę mnogą.'
      ],
      answers: [
        { answer: 'OK', next: '_ae4' }
      ]
    },
    _ae4: {
      bubbles: [
        '<i>Supert</i>!',
        'Czy woda może być w formie określonej? <i>Vannet</i>?'
      ],
      answers: [
        { answer: 'pewnie', next: '_ae5', correct: true },
        { answer: 'raczej nie', next: '_ae5' }
      ]
    },
    _ae5:  {
      bubbles: [
        'Oczywiście, że tak. Np. w zdaniu: Woda (ta konkretna) jest zimna.',
        '<i>Vannet er kaldt.</i> #emoji-1f4a6; #emoji-2744;',
      ],
      autoNext: '_ae6'
    },
    _ae6: {
      bubbles: [
        '<i>Gløgg, saft, vin?</i>'
      ],
      answers: [
        { answer: 'niepoliczalne', next: '_ae7', correct: true },
        { answer: 'policzalne', next: '_ae6b' },
        { answer: '<i>gløgg, saft??</i>', next: '_ae6c' }
      ]
    },
    _ae6b: {
      bubbles: [
        '<i>Gløgg</i> to taki grzaniec. Przed świętami Bożego Narodzenia we wszystkich sklepach sprzedają taką gotową miksturę do rozcieńczenia z wodą albo winem. Do tego wrzucasz mix orzechów i rodzynek. Słodkie jak nie wiem, ale za to koselig.',
        '<img src="/las/c/i/rze-pol/14pIkLtojn1S2A.gif" />',
        '<i>Saft</i> to skoncentrowany syrop owocowy, do rozcieńczania z wodą. Też słodki, zwłaszcza, że zawiera często cukier.',
        'Czyli policzalne czy nie?'
      ],
      answers: [
        { answer: 'niepoliczalne', next: '_ae7', correct: true },
        { answer: 'policzalne', next: '_ae6b' },
      ]
    },
    _ae6c: {
      bubbles: [
        'Zobacz, przecież płyny są niepoliczalne.',
        '<img src="/las/c/i/rze-pol/S8pg2cWArWgg0.gif" />'
      ],
      answers: [
        { answer: 'OK', next: '_ae7' }
      ]
    },
    _ae7: {
      bubbles: [
        '#emoji-1f377;'
      ],
      autoNext: 'RANDOM'
    },


    _af1: {
      bubbles: [ 'Czy jedzenie jest policzalne?' ],
      answers: [
        { answer: 'nie', next: '_af2', correct: true },
        { answer: 'tak', next: '_af2' }
      ]
    },
    _af2:  {
      bubbles: [
        'Trudno policzyć jedzenie.',
        '<img src="/las/c/i/rze-pol/PGJrojPdkZIT6.gif" />',
        'Policzalne za to mogą być posiłki: <i>retter</i> albo porcje: <i>porsjoner</i>.'
      ],
      answers: [
        { answer: 'OK', next: '_af3' }
      ]
    },
    _af3: {
      bubbles: [ 'A mąka, cukier, cynamon?' ],
      answers: [
        { answer: 'niepoliczalne', next: '_af4', correct: true },
        { answer: 'policzalne', next: '_af3b' }
      ]
    },
    _af3b:  {
      bubbles: [
        'Tak jak i jedzenia, mąki nie policzysz.',
        'Możesz policzyć kilogramy mąki, paczki albo typy, ale samej substancji nie.'
      ],
      answers:  [
        { answer: 'no tak', next: '_af4' }
      ]
    },
    _af4:  {
      bubbles:  [
        '<i>(et) mel, (et) sukker, (en) kanel</i>',
        '#emoji-1f35e;#emoji-1f95e;#emoji-1f36a;'
      ],
      autoNext: '_af5'
    },
    _af5: {
      bubbles: [
        'Przeanalizujmy kolejną scenę.',
        '<img src="/las/c/i/rze-pol/tumblr_nb8naxte8A1s2wio8o1_500.gif" />',
        'Czy pająk to:'
      ],
      answers: [
        { answer: '<i>en edderkopp</i>', next: '_af6', correct: true },
        { answer: '<i>edderkopp</i>', next: '_af5b' }
      ]
    },
    _af5b:  {
      bubbles: [
        'Ten był ewidentnie jeden, więc z rodzajnikiem.'
      ],
      autoNext: '_af6'
    },
    _af6: {
      bubbles: [
        'Nawet jeśli znajdziesz ich tyle, że nie da się policzyć...',
        '<img src="/las/c/i/rze-pol/28e83c3fe56daf1adc08a3a3c1128a0e.gif" />',
        '...to słowo <i>en edderkopp</i> nadal jest w słowniku policzalne.'
      ],
      answers: [
        { answer: 'OK, <i>mange edderkopper</i>', next: '_af7' }
      ]
    },
    _af7: {
      bubbles: [ 'Zmieńmy scenerię.' ],
      answers: [
        { answer: 'poproszę', next: '_af8' }
      ]
    },
    _af8: {
      bubbles: [
        '<img src="/las/c/i/rze-pol/cSCOzZpraxWtq.gif" />',
        'Czy kamienie mogą być policzalne?'
      ],
      answers: [
        { answer: 'tak', next: '_af9', correct: true },
        { answer: 'nie', next: '_af8b' }
      ]
    },
    _af8b:  {
      bubbles: [
        'Jeśli ktoś użyje określenia <i>mye stein</i>, to znaczy, że chodzi mu o "dużo kamienia/skały".',
        'Materiału, którego nie da się policzyć.',
        'Jednak śmiało możesz policzyć pojedyncze kamienie: <i>en stein, to steiner, tre steiner</i>.'
      ],
      answers:  [
        { answer: 'OK', next: '_af9'}
      ]
    },
    _af9: {
      bubbles: [
        '<i>Steinkul!</i>',
        '#emoji-1f5ff;'
      ],
      autoNext: 'RANDOM'
    },


    _ag1: {
      bubbles: [
        'Załóżmy, że chcesz powiedzieć: Ona ma piękne włosy.',
        '<img src="/las/c/i/rze-pol/WyJ5xM2FJ5frO.gif" />',
        'Użyjesz rodzajnika?'
      ],
      answers: [
        { answer: '<i>Hun har pent hår.</i>', next: '_ag2', correct: true },
        { answer: '<i>Hun har et pent hår.</i>', next: '_ag1b' }
      ]
    },
    _ag1b:  {
      bubbles: [
        'Kiedy mówisz o włosach to pamiętaj, że jest ich tak dużo, że nie da się policzyć.',
        'Czyli są niepoliczalne. Używasz w liczbie pojedynczej i nie dodajesz rodzajnika. #emoji-1f487-1f3fb;'
      ],
      answers:  [
        { answer: 'rozumiem', next: '_ag2' }
      ]
    },
    _ag2:  {
      bubbles:  [ '<i>Greit!</i>' ],
      answers: [
        { answer: 'sowo, jak powiedzieć w takim razie jeden włos?', next: '_ag3' },
        { answer: 'dalej', next: 'RANDOM' }
      ]
    },
    _ag3:  {
      bubbles: [
        'Jeden włos to: <i>et hårstrå</i>. Zapamiętaj źdźbło włosa, bo <i>et strå</i> to źdźbło.',
        '<img src="/las/c/i/rze-pol/tumblr_oc9hvlRcIe1r4or01o1_500.gif" />'
      ],
      answers:  [
        { answer: 'OK!', next: 'RANDOM'}
      ]
    },




    _ah1: {
      bubbles: [ 'Co oznacza określenie: <i>mye lys</i>?' ],
      answers: [
        { answer: 'dużo światła', next: '_ah2', correct: true },
        { answer: 'wiele świateł', next: '_ah1b', wrong: true }
      ]
    },
    _ah1b:  {
      bubbles: [
        'Wiele świateł albo świeczek, to by było: <i>mange lys</i>.',
        '<i>Mye</i> używamy razem z rzeczownikami niepoliczalnymi.',
        '<i>Mange</i> jest dla policzalnych.',
        'Dlatego:<br /><i>mye lys</i> – dużo światła<br /><i>mange lys</i> – wiele świateł'
      ],
      answers:  [
        { answer: 'zanotuję #emoji-1f4dc;', next: '_ah2'}
      ]
    },



    _aj1: {
      bubbles: [
        'Jeśli chcesz powiedzieć, że jest lokalna mgła.',
        '<img src="/las/c/i/rze-pol/tumblr_nriavkMnCz1tzv1dpo1_500.gif" />',
        'Użyjesz rodzajnika czy nie?'
      ],
      answers: [
        { answer: '<i>lokal tåke</i>', next: '_aj2', correct: true },
        { answer: '<i>ei lokal tåke</i>', next: '_aj1b', wrong: true }
      ]
    },
    _aj1b:  {
      bubbles: [ 'Rodzajnik nie jest potrzebny, ponieważ nie chodzi Ci o jedną mgłę. Jest niepoliczalna.' ],
      autoNext: '_aj3'
    },
    _aj2:  {
      bubbles:  [ '<i>Veldig bra!</i>' ],
      autoNext: '_aj3'
    },
    _aj3: {
      bubbles: [
        'Zobaczmy kolejną scenę.',
        '<img src="/las/c/i/rze-pol/26FPDz479VIGSVKik.gif" />',
        'Czy deszcz jest policzalny?'
      ],
      answers: [
        { answer: 'policzalny', next: '_aj3b' },
        { answer: 'niepoliczalny', next: '_aj4', correct: true }
      ]
    },
    _aj3b:  {
      bubbles: [
        'Niestety. Jest niepoliczalny.',
        '<img src="/las/c/i/rze-pol/2xdzNrPE50WLC.gif" />'
      ],
      answers:  [
        { answer: 'a, no to OK #emoji-1f622;', next: '_aj2'}
      ]
    },
    _aj4:  {
      bubbles:  [ 'Dobrze.' ],
      autoNext: '_aj5'
    },
    _aj5: {
      bubbles: [ 'Jest mało deszczu tej jesieni.' ],
      answers: [
        { answer: '<i>det er få regn i høst</i>', next: '_aj5b' },
        { answer: '<i>det er lite regn i høst</i>', next: '_aj6', correct: true }
      ]
    },
    _aj5b:  {
      bubbles: [ 'Dla niepoliczalnych jest <i>lite</i>.' ],
      answers:  [
        { answer: 'OK', next: '_aj6'}
      ]
    },
    _aj6:  {
      bubbles:  [
        '<img src="/las/c/i/rze-pol/39fj7g99qyD72.gif" />'
      ],
      autoNext: '_aj7'
    },



  };


  this.end = {
    _a1: {
      bubbles: [
        'Brawo! Kawał dobrej roboty!',
        '<img src="/las/c/i/rze-pol/l0IylyD2fD515YRS8.gif" />'
      ],
      answers:  [
        { answer: 'dzięki', next: '_a2'},
        { answer: 'jeszcze tu wrócę', next: '_a2'}
      ]
    },
    _a2: {
      bubbles: [
        'Mam nadzieję, że rozumiesz teraz co to są słowa policzalne i niepoliczalne. I że nie każdy rzeczownik z pełną odmianą w słowniku, musi w zdaniu mieć rodzajnik lub liczbę mnogą. Kieruj się logiką.',
        'Do zobaczenia w lesie! <i>Vi sees!</i>',
        '<img src="/las/c/i/rze-pol/hCA7B450D.gif" />'
      ],
      answers:  [
        { answer: '<i>Ha det!</i>', next: 'END'}
      ]
    }
  };



}
</script>
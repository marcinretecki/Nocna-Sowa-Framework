 <script>
function LasData() {

  this.category = 'chat';         // audio-test|setninger|etc


  this.testNotes = [
    ''
  ];


  this.intro = {
    _a1: {
      bubbles: [
        'Czas na kolejne wyzwanie!',
        'Porywam Cię znowu do lasu.',
        '<img src="/las/c/i/cza-mod-prze/8JXvtGt_opt.gif" /> ',
        'Muszę Cię poznać z moimi przyjaciółmi.',
        'Czy chcesz poznać moje świry?'
      ],
      answers: [
        { answer: 'jasne!', next: '_a2' },
        { answer: 'chyba nie mam wyboru...', next: '_a2' }
      ]
    },
    _a2: {
      bubbles: [
        'Ale nie ma tak łatwo. Musisz najpierw prawidłowo wstawić <i class="mark">ikke</i>.'
      ],
      answers: [
        { answer: 'OK', next: 'ENDINTRO' }
      ]

    }

  }

  this.chat = {

    _aa1: {
      bubbles: [
        '<q>Ryba nie może pływać.</q>',
        '<i>Fisknen #fill-space; svømme.</i>'
      ],
      answers: [
        { answer: '<i>kan ikke</i>', next: '_aa2', score: 'correct' },
        { answer: '<i>vil ikke</i>', next: '_aa1b', score: 'wrong' }
      ]
    },
    _aa1b: {
      bubbles: [
        '<i class="mark">Vil ikke</i> to <q>nie chce</q>. <q>Nie może</q> to:'
      ],
      answers: [
        { answer: '<i>kan ikke</i>', next: '_aa2' }
      ]
    },
    _aa2: {
      bubbles: [
        'Dobrze. Tylko co teraz zrobisz?',
        '<img src="/las/c/i/cza-mod-prze/HardFirsthandBeaver-small.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _ab1: {
      bubbles: [
        '<q>Ptaki nie mogą pojawiać się w telewizji kiedy chcą.</q>',
        '<i>Fuglene #fill-space; dukke opp på TV når de vil.</i>'
      ],
      answers: [
        { answer: '<i>kan ikke</i>', next: '_ab2', score: 'correct' },
        { answer: '<i>ikke kan</i>', next: '_ab1b', score: 'wrong' }
      ]
    },
    _ab1b: {
      bubbles: [
        'Proponuję <i class="mark">ikke</i> za pierwszym czasownikiem. Co Ty na to?'
      ],
      answers: [
        { answer: '<i>kan ikke</i>', next: '_ab2' }
      ]
    },
    _ab2: {
      bubbles: [
        '<i>Bra!</i>',
        'A jednak!',
        '<img src="/las/c/i/cza-mod-prze/h5D7D3FA0.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _ac1: {
      bubbles: [
        '<i>Hun skal #fill-space; hjemme.</i>'
      ],
      answers: [
        { answer: '<i>ikke sove</i>', next: '_ac2', score: 'correct' },
        { answer: '<i>sove ikke</i>', next: '_ac1b', score: 'wrong' }
      ]
    },
    _ac1b: {
      bubbles: [
        'Spróbuj <i class="mark">ikke</i> wstawić za pierwszym czasownikiem w zdaniu.'
      ],
      answers: [
        { answer: '<i>ikke sove</i>', next: '_ac2' }
      ]
    },
    _ac2: {
      bubbles: [
        '<i>Fint!</i> Piąteczka!',
        '<img src="/las/c/i/cza-mod-prze/w0PHxCk.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _ad1: {
      bubbles: [
        '<q>On ma zakaz jedzenia trawy.</q>',
        '<i>Den #fill-space; spise gress.</i>'
      ],
      answers: [
        { answer: '<i>må ikke</i>', next: '_ad2', score: 'correct' },
        { answer: '<i>kan ikke</i>', next: '_ad1b', score: 'wrong' }
      ]
    },
    _ad1b: {
      bubbles: [
        'Zapamiętaj, że <i class="mark">kan</i> oznacza <q>móc, potrafić, umieć</q>. Żeby wyrazić zakaz użyjesz:'
      ],
      answers: [
        { answer: '<i>må ikke</i>', next: '_ad2' }
      ]
    },
    _ad2: {
      bubbles: [
        '<i>Det stemmer. Men det er alltid en måte for å oppnå det som man vil.</i> <br /><span class="size-0">(Zgadza sie. Ale zawsze jest sposób, żeby osiągnąć to, co się chce.)</span>',
        '<img src="/las/c/i/cza-mod-prze/h42852731.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _ae1: {
      bubbles: [
        '<i>Terroristen kan #fill-space; med meg.</i>'
      ],
      answers: [
        { answer: '<i>ikke fly</i>', next: '_ae2', score: 'correct' },
        { answer: '<i>fly ikke</i>', next: '_ae1b', score: 'wrong' }
      ]
    },
    _ae1b: {
      bubbles: [
        '<i class="mark">Ikke</i> jest za pierwszym czasownikiem, czyli <i class="mark">kan</i>. Dlatego:'
      ],
      answers: [
        { answer: '<i>ikke fly</i>', next: '_ae2' }
      ]
    },
    _ae2: {
      bubbles: [
        '<i>Sant!</i>',
        '<img src="/las/c/i/cza-mod-prze/brYdY.gif" />'
      ],
      autoNext: 'RANDOM'
    },




    _af1: {
      bubbles: [
        '<i>Frosken klarer #fill-space; mobilen.</i>'
      ],
      answers: [
        { answer: '<i>ikke å bruke</i>', next: '_af2', score: 'correct' },
        { answer: '<i>ikke bruke</i>', next: '_af1b', score: 'wrong' }
      ]
    },
    _af1b: {
      bubbles: [
        'Czasownik <i class="mark">å klare</i> (dawać radę), nie jest modalny. To zwykły czasownik po którym stawiasz <i class="mark">å</i>.'
      ],
      answers: [
        { answer: '<i>ikke å bruke</i>', next: '_af2' }
      ]
    },
    _af2: {
      bubbles: [
        '<i>Jo, du klarer det!</i>',
        '<i>Frosken også!</i>',
        '<img src="/las/c/i/cza-mod-prze/sQnSh82_opt.gif" />'
      ],
      autoNext: 'RANDOM'
    },




    _ag1: {
      bubbles: [
        '<i>Bjørnene #fill-space; mye i morgen.</i>'
      ],
      answers: [
        { answer: '<i>skal ikke feste</i>', next: '_ag2', score: 'correct' },
        { answer: '<i>ikke fester</i>', next: '_ag1b', score: 'wrong' }
      ]
    },
    _ag1b: {
      bubbles: [
        'Możesz powiedzieć, że <q>Niedźwiedzie nie będą imprezowały dużo jutro</q>, ale nadal <i class="mark">ikke</i> powinno być za pierwszym czasownikem:',
        '<i>Bjørnene fester ikke mye i morgen.</i>',
        'Tylko, że tu nie było takiej opcji do wyboru. Gdzie wstawisz <i class="mark">ikke</i>, gdy w zdaniu jest modalny?'
      ],
      answers: [
        { answer: '<i>skal ikke feste</i>', next: '_ag2' }
      ]
    },
    _ag2: {
      bubbles: [
        '<i>Kult!</i>',
        '<img src="/las/c/i/cza-mod-prze/qxujYKm.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _ah1: {
      bubbles: [
        '<q>Mój kolega nie musi chodzić do sklepu, żeby czegoś spróbować.</q>',
        '<i>Kameraten min #fill-space; i butikken til å prøve noe.</i>'
      ],
      answers: [
        { answer: '<i>trenger ikke å gå</i>', next: '_ah2', score: 'correct' },
        { answer: '<i>trenger ikke gå</i>', next: '_ah1b', score: 'wrong' }
      ]
    },
    _ah1b: {
      bubbles: [
        'W <i>bokmål</i>, którego się uczysz, <i class="mark">trenger</i> nie może być traktowane, jak czasownik modalny. To zwykły czasownik, po którym stawisz <i class="mark">å</i>.'
      ],
      answers: [
        { answer: '<i>trenger ikke å gå</i>', next: '_ah2' }
      ]
    },
    _ah2: {
      bubbles: [
        '<img src="/las/c/i/cza-mod-prze/JCKQuyf_opt.gif" />'
      ],
      autoNext: 'RANDOM'
    },


    _ai1: {
      bubbles: [
        '<i>Venninna mi er vegetarianer, vet du?</i>',
        '<i>Og hun #fill-space; spise kjøtt.</i>'
      ],
      answers: [
        { answer: '<i>må ikke</i>', next: '_ai2', score: 'correct' },
        { answer: '<i>prøver ikke</i>', next: '_ai1b', score: 'wrong' }
      ]
    },
    _ai1b: {
      bubbles: [
        '<i class="mark">Prøver ikke</i> to znaczy <q>nie próbuje</q>. Coś tu nie pasuje logicznie. Poza tym kolejny czasownik powinen być w bezokoliczniku, czyli razem z <i class="mark">å</i>.'
      ],
      answers: [
        { answer: 'OK, już wiem: <i>må ikke</i>', next: '_ai2' }
      ]
    },
    _ai2: {
      bubbles: [
        '<i>Jo, jo. Bare av og til.</i>',
        '<img src="/las/c/i/cza-mod-prze/SecretPepperyAttwatersprairiechicken-mobile_opt.gif" /> ',
        'Norwegowie mówią na nich: <i class="mark">fleksitarianere</i>.',
        'Próbują nie jeść mięsa, ale jednak czasem zjedzą.'
      ],
      autoNext: 'RANDOM'
    },




    _aj1: {
      bubbles: [
        '<i>Jeg skal #fill-space; i svømmehallen med alle vennene.</i>'
      ],
      answers: [
        { answer: '<i>ikke gå</i>', next: '_aj2', score: 'correct' },
        { answer: '<i>ikke å fly</i>', next: '_aj1b', score: 'wrong' }
      ]
    },
    _aj1b: {
      bubbles: [
        'Po czasowniku modalnym <i class="mark">skal</i> następny czasownik będzie bez <i class="mark">å</i>.',
        'Jeśli pominiesz <i class="mark">gå</i> w tym zdaniu, to też będzie zrozumiałe. Jednak tu prawidłowe jest:'
      ],
      answers: [
        { answer: '<i>ikke gå</i>', next: '_aj2' }
      ]
    },
    _aj2: {
      bubbles: [
        'Zgadza się.',
        'Nie rób tego, bo będziesz czekać w kolejce do trampoliny.',
        '<img src="/las/c/i/cza-mod-prze/e4O5TrR_opt.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _al1: {
      bubbles: [
        '<q>Nie chcecie spalić kuchni.</q>',
        '<i>Dere #fill-space; brenne kjøkkenet.</i>'
      ],
      answers: [
        { answer: '<i>vil ikke</i>', next: '_al2', score: 'correct' },
        { answer: '<i>må ikke</i>', next: '_al1b', score: 'wrong' }
      ]
    },
    _al1b: {
      bubbles: [
        '<i class="mark">Må ikke</i> wyraża zakaz. Chcieć to <i class="mark">vil</i>.'
      ],
      answers: [
        { answer: 'OK, <i>vil ikke</i>', next: '_al2' }
      ]
    },
    _al2: {
      bubbles: [
        '<i>Jo. Det er alarmene i hver leilighet.</i>',
        '<i>Vennene mine er alltid klare til aksjon.</i>',
        '<img src="/las/c/i/cza-mod-prze/tumblr_n7kjmeh88b1ta83ebo1_250.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _am1: {
      bubbles: [
        '<q>Nie trzeba mieć podobnych przyjaciół.</q>',
        '<i>Man #fill-space; å ha like venner.</i>'
      ],
      answers: [
        { answer: '<i>trenger ikke</i>', next: '_am2', score: 'correct' },
        { answer: '<i>må ikke</i>', next: '_am1b', score: 'wrong' }
      ]
    },
    _am1b: {
      bubbles: [
        '<i class="mark">Må ikke</i> oznacza zakaz. To by znaczyło, że nie wolno mieć podobnych przyjaciół.',
        'Poza tym po <i class="mark">trenger</i> jest zawsze <i class="mark">å</i>.'
      ],
      answers: [
        { answer: '<i>trenger ikke</i>', next: '_am2' }
      ]
    },
    _am2: {
      bubbles: [
        '<i>Supert!</i>',
        '<img src="/las/c/i/cza-mod-prze/hB6B5CFB0.gif" /> ',
        '<i>pinnsvinet</i> + <i>katten</i> = #emoji-2764;'
      ],
      autoNext: 'RANDOM'
    },



    _an1: {
      bubbles: [
        '<i>Han #fill-space; reise til byen hver helg.</i>'
      ],
      answers: [
        { answer: '<i>skal ikke</i>', next: '_an2', score: 'correct' },
        { answer: '<i>trenger ikke</i>', next: '_an1b', score: 'wrong' }
      ]
    },
    _an1b: {
      bubbles: [
        '<i class="mark">Trenger</i> nie jest modalny, a kolejny czasownik jest bez <i class="mark">å</i>. Dlatego musi być:'
      ],
      answers: [
        { answer: '<i>skal ikke</i>', next: '_an2' }
      ]
    },
    _an2: {
      bubbles: [
        '<i>Men han gjør det. Han trener joga helt gratis.</i>',
        '<img src="/las/c/i/cza-mod-prze/f1LUzPb.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _ao1: {
      bubbles: [
        '<i>Kattene vil #fill-space; sultne.</i>'
      ],
      answers: [
        { answer: '<i>ikke være</i>', next: '_ao2', score: 'correct' },
        { answer: '<i>er ikke</i>', next: '_ao1b', score: 'wrong' }
      ]
    },
    _ao1b: {
      bubbles: [
        'Sowa wymiękła.',
        'Niech ktoś inny Ci pomoże.',
        '<img src="/las/c/i/cza-mod-prze/tenor.gif" />'
      ],
      answers: [
        { answer: '<i>ikke være</i>', next: '_ao2' }
      ]
    },
    _ao2: {
      bubbles: [
        'Pavlov miał swojego psa, a Sowa ma dwa koty.',
        '<img src="/las/c/i/cza-mod-prze/IVypqeA_opt.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _ap1: {
      bubbles: [
        '<q>Krab nie chce Cię zranić.</q>',
        '<i>Krabben #fill-space; skade deg.</i>'
      ],
      answers: [
        { answer: '<i>vil ikke</i>', next: '_ap2', score: 'correct' },
        { answer: '<i>kan ikke</i>', next: '_ap1b', score: 'wrong' }
      ]
    },
    _ap1b: {
      bubbles: [
        '<i class="mark">Kan ikke</i> to: nie może, nie potrafi. Spróbuj:'
      ],
      answers: [
        { answer: '<i>vil ikke</i>', next: '_ap2' }
      ]
    },
    _ap2: {
      bubbles: [
        '<i>Bra!</i>',
        '<i>Men husk at alt kan skje.</i> <br /><span class="size-0">(Ale pamiętaj, że wszystko może się wydarzyć.)</span>',
        '<img src="/las/c/i/cza-mod-prze/gKJOZ.gif" />'
      ],
      autoNext: 'RANDOM'
    },





    _aq1: {
      bubbles: [
        '<q>On nie chce dostawać takich prezentów.</q>',
        '<i>Den #fill-space; få sånne gaver.</i>'
      ],
      answers: [
        { answer: '<i>vil ikke</i>', next: '_aq2', score: 'correct' },
        { answer: '<i>ikke kan</i>', next: '_aq1b', score: 'wrong' }
      ]
    },
    _aq1b: {
      bubbles: [
        '<i class="mark">Kan</i> - może? umie? Pamiętaj, że <i class="mark">ikke</i> jest za pierwszym czasownikiem w zdaniu prostym.'
      ],
      answers: [
        { answer: '<i>vil ikke</i>', next: '_aq2' }
      ]
    },
    _aq2: {
      bubbles: [
        '<i>Godt!</i>',
        '<img src="/las/c/i/cza-mod-prze/Mw1wx.gif" />'
      ],
      autoNext: 'RANDOM'
    },



  };


  this.end = {
    _end1: {
      bubbles: [
        'Świetnie Ci poszło to wyzwanie. Moi przyjaciele są z Ciebie dumni.',
        'Papa! #emoji-1f984;',
        '<img src="/las/c/i/cza-mod-prze/XgE45.gif" />'
      ],
      answers: [
        { answer: '<i>Ha det!</i>', next: 'END' },
        { answer: '<i>Ha det bra kjære venner!</i>', next: 'END' }
      ]
    }
  };



}
</script>
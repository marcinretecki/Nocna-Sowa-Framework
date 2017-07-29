<script>
function LasData() {

  this.category = 'chat';


  this.testNotes = [
  ];


  this.intro = {

    _aa1: {
      bubbles: [
        'Witaj mój bohaterze!',
        'Mówię do Ciebie z kryjówki.',
        '<img src="/las/c/i/misja-czasownik/xFEphHtKWBamc.gif" />',
        'Bo czas na dodatkową, misję specjalną. Czy jesteś gotowy?'
      ],
      answers: [
        { answer: 'pewnie! #emoji-1f60e;', next: '_aa2' },
        { answer: 'mogę się przejść #emoji-1f644;', next: '_aa2' }
      ]
    },
    _aa2: {
      bubbles: [
        'OK. Myślę, że wiesz, co masz robić.',
        '<img src="/las/c/i/misja-czasownik/a038fd_3064633.gif" />',
        'Ruszaj!'
      ],
      autoNext: 'ENDINTRO'
    }

  };


  this.chat = {


    _aa1: {
      bubbles: [
        '<i>Erik skal #fill-space; til USA.</i> #emoji-1f5fd;'
      ],
      answers: [
        { answer: '<i>reiser</i>', next: '_aa1b', score: 'wrong' },
        { answer: '<i>reise</i>', next: '_aa2', score: 'correct' },
        { answer: '<i>å reise</i>', next: '_aa1b', score: 'wrong' }
      ]
    },
    _aa1b: {
      bubbles: [
        'No nie wiem.',
        'Po czasowniku modalnym jest bezokolicznik bez <i class="mark">å</i>.'
      ],
      answers: [
        { answer: '<i>reise</i>', next: '_aa2' }
      ]
    },
    _aa2: {
      bubbles: [
        '<i>Bra jobba!</i>'
      ],
      autoNext: 'RANDOM'
    },


    _ab1: {
      bubbles: [
        '<i>Folk flest #fill-space; i noen by.</i>'
      ],
      answers: [
        { answer: '<i>bo</i>', next: '_ab1b', score: 'wrong' },
        { answer: '<i>bor</i>', next: '_ab2', score: 'correct' },
        { answer: '<i>vil bor</i>', next: '_ab1b', score: 'wrong' }
      ]
    },
    _ab1b: {
      bubbles: [
        'Lepiej się dobrze nad tym zastanów.',
        '<img src="/las/c/i/misja-czasownik/12SBwtRR9BnWg.gif" />',
      ],
      answers: [
        { answer: 'OK. Już wiem: <i>bor</i>', next: '_ab2' }
      ]
    },
    _ab2: {
      bubbles: [
        '<i>Godt!</i>'
      ],
      autoNext: 'RANDOM'
    },


    _ac1: {
      bubbles: [
        '<i>Ikke alle #fill-space; testament i fritida.</i>'
      ],
      answers: [
        { answer: '<i>å skrive</i>', next: '_ac1b', score: 'wrong' },
        { answer: '<i>skrive</i>', next: '_ac1b', score: 'wrong' },
        { answer: '<i>skriver</i>', next: '_ac2', score: 'correct' }
      ]
    },
    _ac1b: {
      bubbles: [
        'Pierwszy czasownik w zdaniu powinen być odmieniony w jakimś czasie. Spróbuj w teraźniejszym. #emoji-1f609;'
      ],
      answers: [
        { answer: '<i>skriver</i>', next: '_ab2' }
      ]
    },
    _ac2: {
      bubbles: [
        '<i>Magisk!</i>',
        '<img src="/las/c/i/misja-czasownik/12NUbkX6p4xOO4.gif" />'
      ],
      autoNext: 'RANDOM'
    },





    _ad1: {
      bubbles: [
        '<i>Døtrene #fill-space; å leke med faren.</i>'
      ],
      answers: [
        { answer: '<i>vil</i>', next: '_ad1b', score: 'wrong' },
        { answer: '<i>liker</i>', next: '_ad2', score: 'correct' },
        { answer: '<i>trenge</i>', next: '_ad1b', score: 'wrong' }
      ]
    },
    _ad1b: {
      bubbles: [
        'Pierwszy czasownik musi być odmieniony w czasie teraźniejszym. Jednak nie może być modalny, bo kolejny ma <i class="mark">å</i>.'
      ],
      answers: [
        { answer: '<i>liker</i>', next: '_ad2' }
      ]
    },
    _ad2: {
      bubbles: [
        '<i>Flott!</i>',
        '<img src="/las/c/i/misja-czasownik/jkpVaBMVt0ZfW.gif" />'
      ],
      autoNext: 'RANDOM'
    },




    _ae1: {
      bubbles: [
        '<i>Jonas vil alltid #fill-space; bra ut.</i>'
      ],
      answers: [
        { answer: '<i>se</i>', next: '_ae2', score: 'correct' },
        { answer: '<i>ser</i>', next: '_ae1b', score: 'wrong' },
        { answer: '<i>å se</i>', next: '_ae1b', score: 'wrong' }
      ]
    },
    _ae1b: {
      bubbles: [
        '<i class="mark">Vil</i> to czasownik modalny. Kolejny po nim jest w bezokoliczniku, ale bez <i class="mark">å</i>.'
      ],
      answers: [
        { answer: '<i>se</i>', next: '_ae2' }
      ]
    },
    _ae2: {
      bubbles: [
        '<i>Utmerket!</i>',
        '<img src="/las/c/i/misja-czasownik/EldfH1VJdbrwY.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _af1: {
      bubbles: [
        '<i>Jeg kan #fill-space; kontrakten i morgen tidlig.</i> #emoji-1f4c4;'
      ],
      answers: [
        { answer: '<i>å skrive</i>', next: '_af1b', score: 'wrong' },
        { answer: '<i>skriver</i>', next: '_af1b', score: 'wrong' },
        { answer: '<i>skrive</i>', next: '_af2', score: 'correct' }
      ]
    },
    _af1b: {
      bubbles: [
        '<i class="mark">Kan</i> zjada <i class="mark">å</i>.'
      ],
      answers: [
        { answer: '<i>skrive</i>', next: '_af2' }
      ]
    },
    _af2: {
      bubbles: [
        '<i>Positivt!</i>'
      ],
      autoNext: 'RANDOM'
    },



    _ag1: {
      bubbles: [
        '<i>Hun prøver #fill-space; på skolen hver dag.</i>'
      ],
      answers: [
        { answer: '<i>å sykle</i>', next: '_ag2', score: 'correct' },
        { answer: '<i>sykler</i>', next: '_ag1b', score: 'wrong' },
        { answer: '<i>sykle</i>', next: '_ag1b', score: 'wrong' }
      ]
    },
    _ag1b: {
      bubbles: [
        'Po pierwszym czasowniku, kolejny jest bezokolicznik.'
      ],
      answers: [
        { answer: '<i>å sykle</i>', next: '_ag2' }
      ]
    },
    _ag2: {
      bubbles: [
        '<i>Ganske bra.</i>',
        '<img src="/las/c/i/misja-czasownik/qqRIXBSSUfSog.gif" />'
      ],
      autoNext: 'RANDOM'
    },




    _ah1: {
      bubbles: [
        '<i>Ugla #fill-space; mange kontakter her og der.</i> <span class="no-break">#emoji-1f98c; #emoji-1f43b; #emoji-1f43f;</span>'
      ],
      answers: [
        { answer: '<i>å ha</i>', next: '_ah1b', score: 'wrong' },
        { answer: '<i>har</i>', next: '_ah2', score: 'correct' },
        { answer: '<i>hatt</i>', next: '_ah1b', score: 'wrong' }
      ]
    },
    _ah1b: {
      bubbles: [
        'Pierwszy czasownik może być w czasie teraźniejszym lub przeszłym. Dlatego pasuje jedynie:'
      ],
      answers: [
        { answer: '<i>har</i>', next: '_ah2' }
      ]
    },
    _ah2: {
      bubbles: [
        '<i>Fint!</i>'
      ],
      autoNext: 'RANDOM'
    },



    _ai1: {
      bubbles: [
        '<i>Du #fill-space; så flink!</i>'
      ],
      answers: [
        { answer: '<i>å være</i>', next: '_ai1b', score: 'wrong' },
        { answer: '<i>være</i>', next: '_ai1b', score: 'wrong' },
        { answer: '<i>er</i>', next: '_ai2', score: 'correct' }
      ]
    },
    _ai1b: {
      bubbles: [
        'Pierwszy czasownik jest w czasie teraźniejszym. Pamiętasz, że być odmienia się nieregularnie? Dla wszystkich osób w czasie teraźniejszym jest:'
      ],
      answers: [
        { answer: '<i>er</i>', next: '_ai2' }
      ]
    },
    _ai2: {
      bubbles: [
        'Wooow... Tak bez zgadywania?',
        '<img src="/las/c/i/misja-czasownik/l0NwHXQy3kUSfFF60.gif" />'
      ],
      autoNext: 'RANDOM'
    },




    _aj1: {
      bubbles: [
        '<i>Jeg trenger #fill-space; å lære norsk hver dag.</i>'
      ],
      answers: [
        { answer: '<i>å kunne</i>', next: '_aj2', score: 'correct' },
        { answer: '<i>kunne</i>', next: '_aj1b', score: 'wrong' },
        { answer: '<i>kan</i>', next: '_aj1b', score: 'wrong' }
      ]
    },
    _aj1b: {
      bubbles: [
        'Po zwykłym czasowniku, następny jest w bezokoliczniku.'
      ],
      answers: [
        { answer: '<i>å kunne</i>', next: '_aj2' }
      ]
    },
    _aj2: {
      bubbles: [
        '<img src="/las/c/i/misja-czasownik/m8WOBJtskPsje_opt.gif" />'
      ],
      autoNext: 'RANDOM'
    },




    _ak1: {
      bubbles: [
        '<i>De elsker #fill-space; på radio på jobben.</i>'
      ],
      answers: [
        { answer: '<i>å høre</i>', next: '_ak2', score: 'correct' },
        { answer: '<i>hører</i>', next: '_ak1b', score: 'wrong' },
        { answer: '<i>høre</i>', next: '_ak1b', score: 'wrong' }
      ]
    },
    _ak1b: {
      bubbles: [
        'Po pierwszym czasowniku, który nie jest modalny, kolejny jest w bezokoliczniku.'
      ],
      answers: [
        { answer: '<i>å høre</i>', next: '_ak2' }
      ]
    },
    _ak2: {
      bubbles: [
        'Dobrze!',
        '<img src="/las/c/i/misja-czasownik/YYfEjWVqZ6NDG.gif" />'
      ],
      autoNext: 'RANDOM'
    },




    _al1: {
      bubbles: [
        '<i>Det kan ikke #fill-space; så dyrt i Norge.</i>'
      ],
      answers: [
        { answer: '<i>å være</i>', next: '_al1b', score: 'wrong' },
        { answer: '<i>er</i>', next: '_al1b', score: 'wrong' },
        { answer: '<i>være</i>', next: '_al2', score: 'correct' }
      ]
    },
    _al1b: {
      bubbles: [
        'Pamiętsz, że <i class="mark">kan</i> zjada <i class="mark">å</i>?'
      ],
      answers: [
        { answer: 'no tak: <i>være</i>', next: '_al2' }
      ]
    },
    _al2: {
      bubbles: [
        '<i>Ja, ja.</i>',
        '<img src="/las/c/i/misja-czasownik/BMBMMfVxZ2lOM.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _am1: {
      bubbles: [
        '<i>Han prøver å lære seg #fill-space; om å drikke mer vann.</i>'
      ],
      answers: [
        { answer: '<i>huske</i>', next: '_am1b', score: 'wrong' },
        { answer: '<i>å huske</i>', next: '_am2', score: 'correct' },
        { answer: '<i>husker</i>', next: '_am1b', score: 'wrong' }
      ]
    },
    _am1b: {
      bubbles: [
        'Po czasowniku <i class="mark">å lære</i>, kolejny będzie w bezokoliczniku. Czyli:'
      ],
      answers: [
        { answer: '<i>å huske</i>', next: '_am2' }
      ]
    },
    _am2: {
      bubbles: [
        '<i>Veldig bra!</i>'
      ],
      autoNext: 'RANDOM'
    },



    _an1: {
      bubbles: [
        '<i>Vi lager lunch for vi liker ikke #fill-space; sultne.</i>'
      ],
      answers: [
        { answer: '<i>være</i>', next: '_an1b', score: 'wrong' },
        { answer: '<i>å være</i>', next: '_an2', score: 'correct' },
        { answer: '<i>er</i>', next: '_an1b', score: 'wrong' }
      ]
    },
    _an1b: {
      bubbles: [
        'Po czasowniku <i class="amrk">liker</i> kolejny będzie w bezokoliczniku.'
      ],
      answers: [
        { answer: '<i>å være</i>', next: '_an2' }
      ]
    },
    _an2: {
      bubbles: [
        '<i>Godt!</i> <span class="no-break">#emoji-1f373; #emoji-1f363; #emoji-1f359; #emoji-1f362; #emoji-1f371;</span>'
      ],
      autoNext: 'RANDOM'
    },


    _ao1: {
      bubbles: [
        '<i>Jeg trenger ikke #fill-space; alle klær.</i> <span class="no-break">#emoji-1f452; #emoji-1f457; #emoji-1f461;</span>'
      ],
      answers: [
        { answer: '<i>å kjøpe</i>', next: '_ao2', score: 'correct' },
        { answer: '<i>kjøpe</i>', next: '_ao1b', score: 'wrong' },
        { answer: '<i>kjøper</i>', next: '_ao1b', score: 'wrong' }
      ]
    },
    _ao1b: {
      bubbles: [
        'Po czasowniku <i class="mark">å trenge</i> kolejny jest w bezokoliczniku.'
      ],
      answers: [
        { answer: '<i>å kjøpe</i>', next: '_ao2' }
      ]
    },
    _ao2: {
      bubbles: [
        'Wybierasz tylko najlepsze!',
        '<img src="/las/c/i/misja-czasownik/9T0XjON7RPAm4_opt.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _ap1: {
      bubbles: [
        '<i>Jeg #fill-space; å være alene.</i>'
      ],
      answers: [
        { answer: '<i>hate</i>', next: '_ap1b', score: 'wrong' },
        { answer: '<i>hater</i>', next: '_ap2', score: 'correct' },
        { answer: '<i>å hate</i>', next: '_ap1b', score: 'wrong' }
      ]
    },
    _ap1b: {
      bubbles: [
        'Pierwszy czasownik odmień w czasie teraźniejszym. Dodaj <i class="mark">-r</i>.'
      ],
      answers: [
        { answer: '<i>hater</i>', next: '_ap2' }
      ]
    },
    _ap2: {
      bubbles: [
        'Cóż za skuteczność!',
         '<img src="/las/c/i/misja-czasownik/Mr_T_Door_Burst.gif" />'
      ],
      autoNext: 'RANDOM'
    },




    _aq1: {
      bubbles: [
        '<i>Hun trenger #fill-space; mange forskjellige typer av te for å velge den beste.</i>'
      ],
      answers: [
        { answer: '<i>smaker</i>', next: '_aq1b', score: 'wrong' },
        { answer: '<i>å smake</i>', next: '_aq2', score: 'correct' },
        { answer: '<i>smake</i>', next: '_aq1b', score: 'wrong' }
      ]
    },
    _aq1b: {
      bubbles: [
        'Drugi czasownik w bezokoliczniku.'
      ],
      answers: [
        { answer: '<i>å smake</i>', next: '_aq2' }
      ]
    },
    _aq2: {
      bubbles: [
        '<i>Fint!</i> <span class="no-break">#emoji-1f38e; #emoji-1f375;</span>'
      ],
      autoNext: 'RANDOM'
    },




    _ar1: {
      bubbles: [
        '<i>Hun vil gjerne #fill-space; av på terrassen etter jobben.</i> <span class="no-break">#emoji-1f378; #emoji-1f349;</span>'
      ],
      answers: [
        { answer: '<i>å slappe</i>', next: '_ar1b', score: 'wrong' },
        { answer: '<i>slapper</i>', next: '_ar1b', score: 'wrong' },
        { answer: '<i>slappe</i>', next: '_ar2', score: 'correct' }
      ]
    },
    _ar1b: {
      bubbles: [
        'Po czasowniku modalnym <i class="mark">vil</i>, kolejny jest bez <i class="mark">å</i>.',
        'Pamiętasz? <i class="mark">Vil</i> zjada <i class="mark">å</i>? #emoji-1f608;'
      ],
      answers: [
        { answer: '<i>slappe</i>', next: '_ar2' }
      ]
    },
    _ar2: {
      bubbles: [
        '<img src="/las/c/i/misja-czasownik/Mr_T_Nose_Wipe.gif" />',
        'A właśnie, że OK.'
      ],
      autoNext: 'RANDOM'
    },


    _as1: {
      bubbles: [
        '<i>Vil du #fill-space; flere eksempler?</i>'
      ],
      answers: [
        { answer: '<i>å få</i>', next: '_as1b', score: 'wrong' },
        { answer: '<i>få</i>', next: '_as2', score: 'correct' },
        { answer: '<i>får</i>', next: '_as1b', score: 'wrong' }
      ]
    },
    _as1b: {
      bubbles: [
        '<i class="mark">Vil</i> zjada <i class="mark">å</i> w kolejnym czasowniku. emot pakman'
      ],
      answers: [
        { answer: '<i>få</i>', next: '_as2' }
      ]
    },
    _as2: {
      bubbles: [
        '<i>Ja!</i>',
        '<img src="/las/c/i/misja-czasownik/Mr_T_Bling.gif" />'
      ],
      autoNext: 'RANDOM'
    },




    _at1: {
      bubbles: [
        '<i>Man trenger #fill-space; indre krefter for å klare det.</i>'
      ],
      answers: [
        { answer: '<i>finner</i>', next: '_at1b', score: 'wrong' },
        { answer: '<i>finne</i>', next: '_at1b', score: 'wrong' },
        { answer: '<i>å finne</i>', next: '_at2', score: 'correct' }
      ]
    },
    _at1b: {
      bubbles: [
        'Nie zgrywaj się. Wiem, że to potrafisz.'
      ],
      answers: [
        { answer: '<i>å finne</i>', next: '_at2' }
      ]
    },
    _at2: {
      bubbles: [
        '<i>Slik gjør du det!</i> (Tak to robisz!)',
        '<img src="/las/c/i/misja-czasownik/29cx7UwNHwhxK_opt.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _au1: {
      bubbles: [
        '<i>Jenta kan ikke #fill-space; ut og leke med barn for mora sier nei.</i>'
      ],
      answers: [
        { answer: '<i>gå</i>', next: '_au2', score: 'correct' },
        { answer: '<i>går</i>', next: '_au1b', score: 'wrong' },
        { answer: '<i>skal</i>', next: '_au1b', score: 'wrong' },
      ]
    },
    _au1b: {
      bubbles: [
        'Po czasowniku modalnym <i class="mark">å kunne</i> kolejny jest w bezokoliczniku bez <i class="mark">å</i>.'
      ],
      answers: [
        { answer: '<i>gå</i>', next: '_au2' }
      ]
    },
    _au2: {
      bubbles: [
        '<i>Bra idé!</i>',
        '<img src="/las/c/i/misja-czasownik/tLJa032S2fkIw.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _av1: {
      bubbles: [
        '<i>Når skal du slutte å prøve #fill-space; henne?</i> #emoji-1f939-1f3fb;'
      ],
      answers: [
        { answer: '<i>imponere</i>', next: '_av1b', score: 'wrong' },
        { answer: '<i>å imponere</i>', next: '_av2', score: 'correct' },
        { answer: '<i>imponert</i>', next: '_av1b', score: 'wrong' }
      ]
    },
    _av1b: {
      bubbles: [
        'Po czasowniku <i class="mark">å prøve</i> kolejny jest zwyczajnie w bezokoliczniku.'
      ],
      answers: [
        { answer: '<i>å imponere</i>', next: '_av2' }
      ]
    },
    _av2: {
      bubbles: [
        '<i>Bra!</i>'
      ],
      autoNext: 'RANDOM'
    },


    _aw1: {
      bubbles: [
        '<i>Kan du #fill-space; henne med å åpne døra?</i>'
      ],
      answers: [
        { answer: '<i>hjelp</i>', next: '_aw1b', score: 'wrong' },
        { answer: '<i>hjalp</i>', next: '_aw1b', score: 'wrong' },
        { answer: '<i>hjelpe</i>', next: '_aw2', score: 'correct' }
      ]
    },
    _aw1b: {
      bubbles: [
        'Po kan jest bezokolicznik bez å'
      ],
      answers: [
        { answer: '<i>hjelpe</i>', next: '_aw2' }
      ]
    },
    _aw2: {
      bubbles: [
        'Jesteś moim bohaterem!',
        '<img src="/las/c/i/misja-czasownik/7K1OQmbCnKAa4.gif" />'
      ],
      autoNext: 'RANDOM'
    },



    _ax1: {
      bubbles: [
        '<i>Vil du prøve #fill-space; å skrive ei dagbok?</i>'
      ],
      answers: [
        { answer: '<i>begynner</i>', next: '_ax1b', score: 'wrong' },
        { answer: '<i>å begynne</i>', next: '_ax2', score: 'correct' },
        { answer: '<i>starter</i>', next: '_ax1b', score: 'wrong' }
      ]
    },
    _ax1b: {
      bubbles: [
        'Hmm no nie wiem. Może spróbuj bezokolicznik?'
      ],
      answers: [
        { answer: '<i>å begynne</i>', next: '_ax2' }
      ]
    },
    _ax2: {
      bubbles: [
        '<i>Fantastisk!</i>',
        '<img src="/las/c/i/misja-czasownik/dflct.gif" />'
      ],
      autoNext: 'RANDOM'
    }




};



  this.end = {

    _end1: {
      bubbles: [
        'Dobra. Muszę lecieć.',
        '<img src="/las/c/i/misja-czasownik/tumblr_nbtykbjiUc1tchrkco1_500.gif" />',
        'Mam umówiony masaż tajski.',
        '<img src="/las/c/i/misja-czasownik/SScbp2rQbuwLu.gif" />'
      ],
      answers: [
        { answer: '<i>Ha en fin masasje!</i>', next: 'END' }
      ]
    }


  };

}
</script>
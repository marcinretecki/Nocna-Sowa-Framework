<script>
function LasData() {

  this.category = 'chat';         // audio-test|setninger|etc


  this.testNotes = [
  ];


  this.intro = {
    _a1: {
      bubbles: [
        '<img src="/las/c/i/rze-lm/XZFbojt.gif" />',
        'O jeny!',
        'To ty?',
        'Rwiesz się tak do nauki, że nawet na chwilę nie mogłam zmrużyć oka.',
      ],
      answers: [
        { answer: 'Pragnę się pouczyć norweskiego Sowo.', next: '_a2' },
        { answer: 'Wstawaj Sowo, jest impreza!', next: '_a2' }
      ]
    },
    _a2: {
      bubbles: [
        'O, na to nie trzeba mnie namawiać. ',
        'Działam nawet nocami, dlatego znajomi mówią na mnie Nocna.',
        'Ale mniejsza z tym. Mam coś dla Ciebie. Czysty kosmos. Tylko najpierw Spock wylosuje dla Ciebie słowa, OK?',
      ],
      answers: [
        { answer: 'Pewnie!', next: '_a3' },
        { answer: 'Jasne! Chcę zobaczyć, jak to robi.', next: '_a3' }
      ]
    },
    _a3: {
      bubbles: [
        '<img src="/las/c/i/rze-lm/tumblr_maqfseZRIf1qj4b9to1_r1_500.gif" />',
        'OK. Gotowe.',
        'Mam dla Ciebie wyzwanie z tworzenia liczby mnogiej. Skoncentruj się i postaraj szybko udzielać odpowiedzi. Ale nie zgaduj, dobra?',
      ],
      answers: [
        { answer: 'No dobra.', next: '_a4' }
      ]
    },
    _a4: {
      bubbles: [
        '<img src="/las/c/i/rze-lm/Countdown-321.gif" />',
      ],
      autoNext: 'ENDINTRO'
    }
  };


  this.chat = {

    _vindu1: {
      bubbles: [
        '<i class="mark">Vinduer</i> to <q>okna</q> w formie:',
      ],
      answers: [
        { answer: 'nieokreślonej', next: '_vindu2', score: 'correct' },
        { answer: 'określonej', next: '_vindu1b', score: 'wrong' },
        { answer: 'yyy nie mam pewności', next: '_vindu1b' }
      ]
    },
    _vindu1b: {
      bubbles: [
        'Końcówka <i class="mark">-er</i> jest w formie nieokreślonej.',
      ],
      answers: [
        { answer: 'dobra, już wiem', next: '_vindu1c' }
      ]
    },
    _vindu1c: {
      bubbles: [
        'Dasz radę. Możesz to zrobić! ',
        '<img src="/las/c/i/rze-lm/f6e94ec71e4793db94fa14b5097c8459acdf4f33.gif" />',
      ],
      answers: [
        { answer: 'określonej', next: '_vindu1b', score: 'wrong' },
        { answer: 'nieokreślonej', next: '_vindu2', score: 'correct' },
      ]
    },
    _vindu2: {
      bubbles: [
        '<i>Bra!</i>',
        '<img src="/las/c/i/rze-lm/6sef6Q51v5IuA.gif" />',
      ],
      autoNext: 'RANDOM'
    },




    _skap1: {
      bubbles: [
        'Nieokreślone <q>szafki</q>, to:',
      ],
      answers: [
        { answer: '<i>skap</i>', next: '_skap2' },
        { answer: '<i>skaper</i>', next: '_skap1b' }
      ]

    },
    _skap1b: {
      bubbles: [
        'A pamiętasz rodzajnik? No właśnie: <i class="mark">et</i>. Nie dodajemy <i class="mark">-er</i>. Dlatego <q>szafki</q> to:',
      ],
      answers: [
        { answer: '<i>skap</i>', next: '_skap2' }
      ]
    },
    _skap2: {
      bubbles: [
        'Bra-wo!',
        '<img src="/las/c/i/rze-lm/orson-welles-citizen-20kane-appl-xilv.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _kskap1: {
      bubbles: [
        'Jak będą nieokreślone <q>lodówki</q>? Podpowiem, że to chłodzące szafy.',
      ],
      answers: [
        { answer: '<i>kjøleskap</i>', next: '_kskap2' },
        { answer: '<i>kjøleskaper</i>', next: '_kskap1b' }
      ]

    },
    _kskap1b: {
      bubbles: [
        'Odmieniasz zgodnie z ostatnim członem, czyli tak, jak słowo: <i class="mark">et skap</i>. Jednosylabowe <i class="mark">-et</i> nie dostają końcówki <i class="mark">-er</i>. Nawet jeśli na pierwszy rzut oka to dłuższe słowo, musisz je rozdzielić.',
      ],
      answers: [
        { answer: 'OK, <i>kjøleskap</i>', next: '_kskap2' }
      ]
    },
    _kskap2: {
      bubbles: [
        '<i>Du har overrasket meg!</i> <br /><span class="size-0">Zaskoczyłeś/aś mnie!</span>',
        '<img src="/las/c/i/rze-lm/audrey-hepburn-breakfast-at-tiffanys-filmedit-qKN4EGv44HQ4g.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _lampe1: {
      bubbles: [
        '<q>Lampy</q> nieokreślone to:',
      ],
      answers: [
        { answer: '<i>lampa</i>', next: '_lampe1b' },
        { answer: '<i>lamper</i>', next: '_lampe2' }
      ]

    },
    _lampe1b: {
      bubbles: [
        '<i class="mark">Lampa</i> to jedna określona. Nieokreślone odmieniają się regularnie. Dodajesz <i class="mark">-er</i>.',
      ],
      answers: [
        { answer: '<i>lamper</i>', next: '_lampe2' }
      ]
    },
    _lampe2: {
      bubbles: [
        'Dobrze! Widzisz, jest impreza!',
        '<img src="/las/c/i/rze-lm/tumblr-mlnzx84ur21qzw1qyo1-500.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _mobil1: {
      bubbles: [
        '<i class="mark">Mobiler</i> znaczy:',
      ],
      answers: [
        { answer: 'samochody', next: '_mobil1b', score: 'wrong' },
        { answer: 'telefony', next: '_mobil2', score: 'correct' }
      ]

    },
    _mobil1b: {
      bubbles: [
        'Uuu... <q>samochody</q> to <i class="mark">biler</i>. Jedno niewłaściwe spojrzenie i no wiesz...',
        '<img src="/las/c/i/rze-lm/816def61eb94d9d2b7af764297975d23adaf34fb.gif" />',
      ],
      answers: [
        { answer: 'OK, bardziej się skoncentruję', next: '_RANDOM' }
      ]
    },
    _mobil2: {
      bubbles: [
        'Dobrze. Możemy więc świętować.',
        '<img src="/las/c/i/rze-lm/the-blues-brothers-whisky-though-DpxPL8FXbccM0.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _melding1: {
      bubbles: [
        '<q>Mam dwie wiadomości.</q> Jak to powiesz po norwesku?',
        '<i>Jeg har to...</i>',
      ],
      answers: [
        { answer: '<i>meldinge</i>', next: '_melding1b', score: 'wrong' },
        { answer: '<i>meldinger</i>', next: '_melding2', score: 'correct' }
      ]

    },
    _melding1b: {
      bubbles: [
        'Jedna <q>wiadomość</q>, to <i class="mark">en melding</i>. W liczbie mnogiej dodajesz <i class="mark">-er</i>. To takie proste.',
      ],
      answers: [
        { answer: '<i>meldinger</i>', next: '_melding2' }
      ]
    },
    _melding2: {
      bubbles: [
        'Pierwsza, że dobrze teraz odpowiedziałeś. Druga, że ktoś nas chyba śledzi.',
        '<img src="/las/c/i/rze-lm/tumblr-mhtlawoisq1qcay1ao1-500.gif" />',
        'Jedziemy dalej?',
      ],
      answers: [
        { answer: '<i>ja, vi kjører videre</i>', next: '_RANDOM' }
      ]
    },


    _speil1: {
      bubbles: [
        '<q>Lustra</q> nieokreślone to:',
      ],
      answers: [
        { answer: '<i>speil</i>', next: '_speil2', score: 'correct' },
        { answer: '<i>speiler</i>', next: '_speil1b', score: 'wrong' }
      ]

    },
    _speil1b: {
      bubbles: [
        'A ile to słowo ma sylab?',
      ],
      answers: [
        { answer: 'Jedną', next: '_speil1c' }
      ]
    },
    _speil1c: {
      bubbles: [
        'Jakiego jest rodzaju <i class="mark">speil</i>?',
      ],
      answers: [
        { answer: '<i>et</i>', next: '_speil1d' }
      ]
    },
    _speil1d: {
      bubbles: [
        'Czyli?',
      ],
      answers: [
        { answer: 'nie dodajemy końcówki <i>-er</i>', next: '_speil2' }
      ]
    },
    _speil2: {
      bubbles: [
        'Uff, dobrze.'  ,
        '<img src="/las/c/i/rze-lm/tumblr_nrwenu8TfZ1s2yegdo1_500.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _blomst1: {
      bubbles: [
        '<q>Kwiaty</q> określone to:',
      ],
      answers: [
        { answer: '<i>blomster</i>', next: '_blomst1b', score: 'wrong' },
        { answer: '<i>blomstene</i>', next: '_blomst2', score: 'correct' }
      ]

    },
    _blomst1b: {
      bubbles: [
        '<i class="mark">Blomster</i> to na kwiaciarniach piszą, bo tam są różne nieokreślone kwiaty. Codziennie inne, mówię Ci.',
        'Te konkretne to:',
      ],
      answers: [
        { answer: '<i>blomstene</i>', next: '_blomst2' }
      ]
    },
    _blomst2: {
      bubbles: [
        '<i>Pent!</i>',
        'Jak masz w domu kwiaty, to pewnie są takie konkret. Kryją historię. Wywołują głębokie emocje.',
        '<img src="/las/c/i/rze-lm/3o7TKtfnCqdCPLilUs.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _hus1: {
      bubbles: [
        '<q>Domy</q>, takie dowolne, to:',
      ],
      answers: [
        { answer: '<i>hus</i>', next: '_hus2', score: 'correct' },
        { answer: '<i>husene</i>', next: '_hus1b', score: 'wrong' }
      ]

    },
    _hus1b: {
      bubbles: [
        '<i class="mark">Husene</i> to określone domy, takie o których Twój kumpel wie.',
        'Nieokreślone są bez końcówki <i class="mark">-er</i>, bo jeden to <i class="mark">et hus</i>, a dwa lub więcej to:',
      ],
      answers: [
        { answer: '<i>hus</i>', next: '_hus2' }
      ]
    },
    _hus2: {
      bubbles: [
        'Stare norweskie domy kryją wiele tajemnic...',
        '<img src="/las/c/i/rze-lm/tumblr-lxxcf8koi41qlh9eeo1-500.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _seng1: {
      bubbles: [
        '<q>Łóżka</q> określone?',
      ],
      answers: [
        { answer: '<i>sagene</i>', next: '_seng1b', score: 'wrong' },
        { answer: '<i>sengene</i>', next: '_seng2', score: 'correct' }
      ]

    },
    _seng1b: {
      bubbles: [
        '<i class="mark">Sagene</i> to określone <q>piły</q>. I jeszcze taka dzielnica w Oslo. Sowa tam nawet kiedyś zajęcia prowadziła. Co tam się działo...',
        'Ale wracając, łóżka to:',
      ],
      answers: [
        { answer: '<i>sengene</i>', next: '_seng2' }
      ]
    },
    _seng2: {
      bubbles: [
        'Ta daaam!',
        '<img src="/las/c/i/rze-lm/tumblr-n89kkc8dkc1qcd94wo1-500.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _munn1: {
      bubbles: [
        '<i class="mark">En munn</i> to <q>usta</q>. Jedne, bo jest rodzajnik. A kilka dowolnych?',
      ],
      answers: [
        { answer: '<i>munner</i>', next: '_munn2', score: 'correct' },
        { answer: '<i>munnene</i>', next: '_munn1b', score: 'wrong' }
      ]

    },
    _munn1b: {
      bubbles: [
        '<i class="mark">Munnene</i> to określone usta w liczbie mnogiej. Nieokreślone to:',
      ],
      answers: [
        { answer: '<i>munner</i>', next: '_munn2' }
      ]
    },
    _munn2: {
      bubbles: [
        '<img src="/las/c/i/rze-lm/12NHUUk5iS6kDe.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _kontakt1: {
      bubbles: [
        'Jak powiesz: <q>Ona ma wiele kontaktów</q>?',
        '<i>Hun har mange...</i>',
      ],
      answers: [
        { answer: '<i>kontakter</i>', next: '_kontakt2', score: 'correct' },
        { answer: '<i>kontaktene</i>', next: '_kontakt1b', score: 'wrong' }
      ]

    },
    _kontakt1b: {
      bubbles: [
        'To mogło być trudniejsze. Wiem. Jeśli ma czegoś wiele to zazwyczaj będzie to w formie nieokreślonej. Wyczujesz to z czasem.',
      ],
      answers: [
        { answer: 'OK, <i>kontakter</i>', next: '_kontakt2' }
      ]
    },
    _kontakt2: {
      bubbles: [
        '<i>Bra jobba!</i>',
        '<img src="/las/c/i/rze-lm/xT5LMAuwtyatXjME3m.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _menneske1: {
      bubbles: [
        'Nieokreśleni <q>ludzie</q> to:',
      ],
      answers: [
        { answer: '<i>folkene</i>', next: '_menneske1b', score: 'wrong' },
        { answer: '<i>mennesker</i>', next: '_menneske2', score: 'correct' }
      ]

    },
    _menneske1b: {
      bubbles: [
        '<i class="mark">Folkene</i> to już określona <q>ludność</q>. Nieokreśleni ludzie to:',
      ],
      answers: [
        { answer: '<i>mennesker</i>', next: '_menneske2' }
      ]
    },
    _menneske2: {
      bubbles: [
        '<i>Ja!</i>',
        '<img src="/las/c/i/rze-lm/tumblr_n1fnd9ztwT1qg4blro1_250.gif" />'],
      autoNext: 'RANDOM'
    },


    _skip1: {
      bubbles: [
        'Kilka nieokreślonych <q>statków</q> na fiordzie, to...',
      ],
      answers: [
        { answer: '<i>skip</i>', next: '_skip2', score: 'correct' },
        { answer: '<i>skiper</i>', next: '_skip1b', score: 'wrong' }
      ]
    },
    _skip1b: {
      bubbles: [
        'Jedna sylaba i <i class="mark">et</i>. Co to znaczy? Nie dodajemy <i class="mark">-er</i>.',
      ],
      answers: [
        { answer: 'jasne, <i>skip</i>', next: '_skip2' }
      ]
    },
    _skip2: {
      bubbles: [
        '<i>Bra!</i>',
        '<img src="/las/c/i/rze-lm/acid-april-gifdump-o5RW6QGVTm0g0.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _dyr1: {
      bubbles: [
        'Określone <q>zwierzęta</q>? #emoji-1f429;#emoji-1f415;#emoji-1f408;',
      ],
      answers: [
        { answer: '<i>dyr</i>', next: '_dyr1b', score: 'wrong' },
        { answer: '<i>dyrene</i>', next: '_dyr2', score: 'correct' }
      ]

    },
    _dyr1b: {
      bubbles: [
        '<i class="mark">Dyr</i> to nieokreślone <q>zwierzęta</q>. Określone mają końcówkę <i class="mark">-ene</i>.',
      ],
      answers: [
        { answer: 'OK, <i>dyrene</i>', next: '_dyr2' }
      ]
    },
    _dyr2: {
      bubbles: [
        '<i>Yes</i>! A teraz uwaga! Wchodzą:',
        '<img src="/las/c/i/rze-lm/c2OEMfj.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _avtale1: {
      bubbles: [
        'Jedna <q>umowa</q> to <i class="mark">en avtale</i>. Kilka określonych to...',
      ],
      answers: [
        { answer: '<i>avtalene</i>', next: '_avtale2', score: 'correct' },
        { answer: '<i>avtala</i>', next: '_avtale1b', score: 'wrong' }
      ]

    },
    _avtale1b: {
      bubbles: [
       'Nie ma takiego słowa. W liczbie mnogiej dodajesz przecież <i class="mark">-ene</i>.',
      ],
      answers: [
        { answer: 'OK, <i>avtalene</i>', next: '_avtale2' }
      ]
    },
    _avtale2: {
      bubbles: [
        '<i>Godt!</i> #emoji-1f943;',
      ],
      autoNext: 'RANDOM'
    },


    _topp1: {
      bubbles: [
        'Nieokreślone <q>szczyty</q>? <span class="no-break">#emoji-1f3d4;#emoji-1f3d4;</span>',
      ],
      answers: [
        { answer: '<i>topp</i>', next: '_topp1b', score: 'wrong' },
        { answer: '<i>topper</i>', next: '_topp2', score: 'correct' }
      ]

    },
    _topp1b: {
      bubbles: [
        '<i class="mark">Topper</i>, bo jeden <q>szczyt</q> to <i class="mark">en topp</i>.',
      ],
      answers: [
        { answer: 'OK, regularnie się odmienia', next: '_topp2' }
      ]
    },
    _topp2: {
      bubbles: [
        'Dajesz radę!',
      ],
      autoNext: 'RANDOM'
    },


    _oy1: {
      bubbles: [
        '<q>Wyspy</q> określone to...',
      ],
      answers: [
        { answer: '<i>øyer</i>', next: '_oy1b', score: 'wrong' },
        { answer: '<i>øyene</i>', next: '_oy2', score: 'correct' }
      ]

    },
    _oy1b: {
      bubbles: [
        'To były nieokreślone. Dlatego:',
      ],
      answers: [
        { answer: '<i>øyene</i>', next: '_oy2' }
      ]
    },
    _oy2: {
      bubbles: [
        '<i>Topp!</i>',
        '<img src="/las/c/i/rze-lm/tumblr_nt3kawqCC61s2wio8o4_500.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _dekk1: {
      bubbles: [
        '<q>Zmienić opony</q> (nieokreślone) to:',
        '<i>skifte ...</i>',
      ],
      answers: [
        { answer: '<i>dekk</i>', next: '_dekk2', score: 'correct' },
        { answer: '<i>dekker</i>', next: '_dekk1b', score: 'wrong' }
      ]

    },
    _dekk1b: {
      bubbles: [
        'Jedna <q>opona</q> to <i class="mark">et dekk</i>. Jednosylabowy nijaki nie dostaje końcówki <i class="mark">-er</i>.',
      ],
      answers: [
        { answer: '<i>dekk</i>', next: '_dekk2' }
      ]
    },
    _dekk2: {
      bubbles: [
        '<i>Velgjort!</i>',
      ],
      autoNext: 'RANDOM'
    },


    _spill1: {
      bubbles: [
        'Jak będą nieokreślone <q>gry</q> po norwesku?',
      ],
      answers: [
        { answer: '<i>spill</i>', next: '_spill2', score: 'correct' },
        { answer: '<i>spiller</i>', next: '_spill1b', score: 'wrong' }
      ]

    },
    _spill1b: {
      bubbles: [
        'Jednosylabowy rodzaju <i class="mark">et</i>. Nie dodajemy wtedy końcówki <i class="mark">-er</i>.',
      ],
      answers: [
        { answer: 'Pamiętam!', next: '_spill2' }
      ]
    },
    _spill2: {
      bubbles: [
        'Gra muzyka!',
        '<img src="/las/c/i/rze-lm/cats-j1ZZQpQ6SGDiU.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _by1: {
      bubbles: [
        '<q>Miasta</q> #emoji-1f3d9;#emoji-1f3d9; określone to:',
      ],
      answers: [
        { answer: '<i>byen</i>', next: '_by1b', score: 'correct' },
        { answer: '<i>byene</i>', next: '_by2', score: 'wrong' }
      ]

    },
    _by1b: {
      bubbles: [
        '<i class="mark">Byen</i> to jedno określone miasto. W liczbie mnogiej dodajemy <i class="mark">-ene</i>.',
      ],
      answers: [
        { answer: '<i>byene</i>', next: '_by2' }
      ]
    },
    _by2: {
      bubbles: [
        '<i>Riktig!</i> Jesteś uważnym obserwatorem.',
        '<img src="/las/c/i/rze-lm/demolizione_palazzo.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _vits1: {
      bubbles: [
        'Jeden <q>żart</q> to <i class="mark">en vits</i>. <q>Dowcipy</q> to...',
      ],
      answers: [
        { answer: '<i>vitser</i>', next: '_vits2', score: 'correct' },
        { answer: '<i>vitsen</i>', next: '_vits1b', score: 'wrong' }
      ]

    },
    _vits1b: {
      bubbles: [
        '<i class="mark">Vitsen</i> to jeden określony. Kilka, w formie nieokreślonej to jedynie:',
      ],
      answers: [
        { answer: '<i>vitser</i>', next: '_vits2' }
      ]
    },
    _vits2: {
      bubbles: [
        'Lurt!',
      ],
      autoNext: 'RANDOM'
    }



  };



  this.extra = {

    _hytte1: {
      bubbles: [
        '<i class="mark">Ei hytte</i> to <q>chatka</q>, albo <q>domek letniskowy</q>. Jak powiesz o kilku nieokreślonych?',
      ],
      answers: [
        { answer: '<i>hytter</i>', next: '_hytte2', score: 'correct' },
        { answer: '<i>hytten</i>', next: '_hytte1b', score: 'wrong' }
      ]

    },
    _hytte1b: {
      bubbles: [
        'Końcówkę <i class="mark">-en</i> dodajesz w formie określonej liczby pojedynczej. Pamiętasz?',
        'Np. <i class="mark">en bygning – bygningen</i>',
      ],
      answers: [
        { answer: 'OK, już wiem: <i>hytter</i>', next: '_hytte2' }
      ]
    },

    _hytte2: {
      bubbles: [
        '<i>Veldig bra!</i>',
        '<img src="/las/c/i/rze-lm/NIrQexy9Pv93a.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _hylle1: {
      bubbles: [
        '<i class="mark">Hyllene</i> to <q>półki</q> w formie:',
      ],
      answers: [
        { answer: 'określonej', next: '_hylle2', score: 'correct' },
        { answer: 'nieokreślonej', next: '_hylle1b', score: 'wrong' }
      ]

    },
    _hylle1b: {
      bubbles: [
        'Końcówka <i class="mark">-ene</i> jest zawsze w formie określonej liczby mnogiej.',
      ],
      answers: [
        { answer: 'OK', next: '_hylle2' }
      ]
    },
    _hylle2: {
      bubbles: [
        '<i>Fint!</i> #emoji-1f36d;',
      ],
      autoNext: 'RANDOM'
    },


    _gulv1: {
      bubbles: [
        '<q>Podłogi</q> nieokreślone to:',
      ],
      answers: [
        { answer: '<i>gulver</i>', next: '_gulv1b', score: 'wrong' },
        { answer: '<i>gulv</i>', next: '_gulv2', score: 'correct' }
      ]

    },
    _gulv1b: {
      bubbles: [
        'Pamiętasz rodzajnik? Podpowiem: <i class="mark">et</i>. A co się robi z jednosylabowymi rodzaju <i class="mark">et</i>? Nie dodaje końcówki <i class="mark">-er</i>.',
      ],
      answers: [
        { answer: 'no tak, <i>gulv</i>', next: '_gulv2' }
      ]
    },
    _gulv2: {
      bubbles: [
        '<i>Korrekt!</i>',
        '<img src="/las/c/i/rze-lm/tumblr-m3j9b02nnt1qedb29o1-500.gif" />',
      ],
      autoNext: 'RANDOM'
    },



    _bord1: {
      bubbles: [
        'Jak będą określone <q>stoły</q>?',
      ],
      answers: [
        { answer: '<i>bord</i>', next: '_bord1b', score: 'wrong' },
        { answer: '<i>bordene</i>', next: '_bord2', score: 'correct' }
      ]

    },
    _bord1b: {
      bubbles: [
        'Nieokreślone to: <i class="mark">bord</i>. Oczywiście bez końcówki <i class="mark">-er</i>, bo to jednosylabowy rodzaju <i class="mark">-et</i>. A określone zawsze dostają końcówkę <i class="mark">-ene</i>.'],
      answers: [
        { answer: '<i>bordene</i>', next: '_bord2' }
      ]
    },
    _bord2: {
      bubbles: [
        '<i>Veldig godt! Det smaker bra.</i>',
        '<img src="/las/c/i/rze-lm/tumblr-m5rmpyxg9d1r3dfmuo3-250.gif" />',
      ],
      autoNext: 'RANDOM'
    },


    _stol1: {
      bubbles: [
        '<q>Krzesła</q> nieokreślone to:',
      ],
      answers: [
        { answer: '<i>stoler</i>', next: '_stol2' },
        { answer: '<i>stolen</i>', next: '_stol1b' }
      ]

    },
    _stol1b: {
      bubbles: [
        'W liczbie mnogiej radzę jednak użyć końcówki <i class="mark">-er</i>, jeśli tylko nie jest to słowo jednosylabowe <i class="mark">et</i>. A jakiego rodzaju jest krzesło?',
      ],
      answers: [
        { answer: '<i>en</i>, dlatego: <i>stoler</i>', next: '_stol2' }
      ]
    },
    _stol2: {
      bubbles: [
        '<i>Flott!</i> #emoji-1f44f-1f3fb;',
      ],
      autoNext: 'RANDOM'
    },


    _buss1: {
      bubbles: [
        '<q>Autobusy</q> nieokreślone to:',
      ],
      answers: [
        { answer: '<i>busser</i>', next: '_buss2', score: 'correct' },
        { answer: '<i>buss</i>', next: '_buss1b', score: 'wrong' }
      ]

    },
    _buss1b: {
      bubbles: [
        '<q>Autobus</q> to <i class="mark">en buss</i>. Nie ma znaczenia, że ma jedną sylabę. Dodajesz normalnie <i class="mark">-er</i>.',
      ],
      answers: [
        { answer: '<i>busser</i>', next: '_buss2' }
      ]
    },
    _buss2: {
      bubbles: [
        '<i>Svært godt!</i>',
      ],
      autoNext: 'RANDOM'
    },


    _tog1: {
      bubbles: [
        '<q>Pociągi</q> nieokreślone to:',
      ],
      answers: [
        { answer: '<i>toger</i>', next: '_tog1b', score: 'wrong' },
        { answer: '<i>tog</i>', next: '_tog2', score: 'correct' }
      ]

    },
    _tog1b: {
      bubbles: [
        '<q>Pociąg</q> to <i class="mark">et tog</i>. Jednosylabowy nijaki. Dlatego nie dodajemy końcówki <i class="mark">-er</i> w l.mn. Więc...',
      ],
      answers: [
        { answer: '<i>tog</i>', next: '_tog2' }
      ]
    },
    _tog2: {
      bubbles: [
        '<i>Fint!</i> <span class="no-break">#emoji-1f682;#emoji-1f683;#emoji-1f683;</span>',
        'Określone <q>pociągi</q> to:',
      ],
      answers: [
        { answer: '<i>tog</i>', next: '_tog2b', score: 'wrong' },
        { answer: '<i>togene</i>', next: '_tog3', score: 'correct' }
      ]

    },
    _tog2b: {
      bubbles: [
        'W formie określonej liczby mnogiej zawsze dodajesz <i class="mark">-ene</i>.',
      ],
      answers: [
        { answer: '<i>togene</i>', next: '_tog2' }
      ]
    },
    _tog3: {
      bubbles: [
        '<i>Supert!</i>',
        '<img src="/las/c/i/rze-lm/gpaSUlq15zHpK.gif" />',
        '<img src="/las/c/i/rze-lm/vintage-train-animated-gif-3.gif" />',
      ],
      autoNext: 'RANDOM'
    },

  };


  this.end = {
    _a1: {
      bubbles: [
        'Ok. To by było tyle na dziś. Jednak radzę Ci tu wracać, aż poczujesz, że jesteś mistrzem liczby mnogiej.',
        'Zrobię Ci jeszcze mały zabieg wygrywania norweskich słów prosto do mózgu, jak chcesz.',
      ],
      answers: [
        { answer: 'Nie bardzo łapię, ale okeej.', next: '_a2' },
        { answer: 'Wgrywaj wszystko. Oddam za to nerkę.', next: '_a2' }
      ]
    },
    _a2: {
      bubbles: [
        'Spoko. Mamy jeszcze kilku ochotników. Nie powinno boleć.',
        '<img src="/las/c/i/rze-lm/the-gamma-people2.gif" />',
        'Wyśpij się dzisiaj dobrze. To wpłynie korzystnie na naukę. <i class="mark">Det er sant!</i> <span class="size-0">(To prawda!)</span>',
      ],
      answers: [
        { answer: '<i>Ha det!</i>', next: 'END' }
      ]
    },

    _b1: {
      bubbles: [
        'To koniec na dziś, ale możesz zawsze tu wrócić i przećwiczyć te słowa w innej kolejności.',
        '<i>God natt!</i>',
        '<img src="/las/c/i/rze-lm/j3vao.gif" />',
      ],
      answers: [
        { answer: '<i>God natt!</i>', next: 'END' }
      ]
    }
  };



}
</script>
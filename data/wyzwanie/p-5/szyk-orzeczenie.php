<?php
  // zabawa na logiczne myślenie
?>
<script>
function LasData() {

  this.category = 'setninger';   // chat|audio-test|etc


  this.testNotes = [
    'Orchidee w NO https://www.aftenposten.no/viten/Visste-du-at-vi-har-40-ville-orkid-arter-i-Norge-41444b.html',
    'zdjęcie misto polozone na kilku wyspach, albo jakaś mała wyspa przy zdaniu o wyspie',
  ];


  this.intro = {
    _a1: {
      msg:        'Ułóż zdania z podanych słów.',
      autoNext:   'ENDINTRO'
    }
  };


  //
  //  Main
  //
  this.chat = {


    _aa1: {
      set: [
                      [ 'Det', 'finnes', '40', 'ville', 'orkidé-arter', 'i', 'Norge', ]
      ],
      trans:          'Znajduje się 40 dzikich gatunków orchidei w Norwegii.',
      autoNext:       'RANDOM',
    },


    _ab1: {
      set: [
                      [ 'Du', 'kan', 'ta', 'buss', 'eller', 'trikk', ]
      ],
      trans:          'Możesz przyjechać autobusem albo tramwajem.',
      autoNext:       'RANDOM',
    },


    _ac1: {
      set: [
                      [ 'Barna', 'liker', 'å', 'leke', 'sammen', ]
      ],
      trans:          'Dzieci lubią bawić się razem.',
      autoNext:       'RANDOM',
    },


    _af1: {
      set: [
                      [ 'Rolf', 'begynner', 'å', 'lære', 'å', 'programmere', ]
      ],
      trans:          'Rolf zaczyna uczyć się programować.',
      autoNext:       'RANDOM',
    },


    _ag1: {
      set: [
                      [ 'Hun', 'slutter', 'å', 'se', 'på', 'dumme', 'serier', ]
      ],
      trans:          'On kończy oglądać głupie seriale.',
      autoNext:       'RANDOM',
    },


    _ah1: {
      set: [
                      [ 'Pål', 'vil', 'stoppe', 'å', 'kjøpe', 'så', 'mange', 'ting', ]
      ],
      trans:          'Pål chce przestać kupować tak wiele rzeczy.',
      autoNext:       'RANDOM',
    },


    _ai1: {
      set: [
                      [ 'De', 'må', 'slutte', 'å', 'jobbe', 'overtid', ]
      ],
      trans:          'Oni muszą skończyć pracować po godzinach.',
      autoNext:       'RANDOM',
    },


    _aj1: {
      set: [
                      [ 'Elise', 'prøver', 'å', 'spørre', 'så', 'mye', 'som', 'mulig', ]
      ],
      trans:          'Elise próbuje pytać tak dużo jak to możliwe.',
      autoNext:       'RANDOM',
    },


    _ak1: {
      set: [
                      [ 'Dere', 'prøver', 'å', 'lære', 'så', 'fort', 'som', 'mulig', ]
      ],
      trans:          'Wy próbujecie uczyć się tak szybko jak to możliwe.',
      autoNext:       'RANDOM',
    },





    _am1: {
      set: [
                      [ 'Jeg', 'kan', 'låne', 'deg', 'et', 'telt', ]
      ],
      trans:          'Mogę pożyczyć Ci namiot.',
      autoNext:       'RANDOM',
    },


    _an1: {
      set: [
                      [ 'Ørjan', 'kan', 'slå', 'av', 'lyset', ]
      ],
      trans:          'Ørjan może wyłączyć światło.',
      autoNext:       'RANDOM',
    },


    _ao1: {
      set: [
                      [ 'Jeg', 'må', 'sjekke', 'det', ]
      ],
      trans:          'Muszę to sprawdzić.',
      autoNext:       'RANDOM',
    },


    _aq1: {
      set: [
                      [ 'Jeg', 'hater', 'å', 'stå', 'i', 'køen', ]
      ],
      trans:          'Nienawidzę stać w kolejce.',
      autoNext:       'RANDOM',
    },


    _ar1: {
      set: [
                      [ 'Gro', 'hater', 'å', 'stå', 'opp', 'tidlig', 'om', 'morgenen', ]
      ],
      trans:          'Gro nienawidzi wstawać wcześnie rano.',
      autoNext:       'RANDOM',
    },


    _as1: {
      set: [
                      [ 'Det', 'er', 'gøy', 'å', 'bo', 'på', 'en', 'øy', ]
      ],
      trans:          'Jest wesoło mieszkać na wyspie.',
      autoNext:       'RANDOM',
    },


    _at1: {
      set: [
                      [ 'Jeg', 'må', 'stå', 'opp', 'klokka', 'seks', ]
      ],
      trans:          'Wstaję o godzinie szóstej.',
      autoNext:       'RANDOM',
    },


    _au1: {
      set: [
                      [ 'Fredrik', 'skal', 'rydde', 'hele', 'huset', ]
      ],
      trans:          'Fredrik zamierza posprzątać cały dom.',
      autoNext:       'RANDOM',
    },


    _ay1: {
      set: [
                      [ 'Jeg', 'vil', 'kunne', 'snakke', 'flyttende', ]
      ],
      trans:          'Chcę umieć mówić płynnie.',
      autoNext:       'RANDOM',
    },


    _az1: {
      set: [
                      [ 'Mona', 'skal', 'begynne', 'å', 'trene', 'brasiliansk', 'jiu-jitsu', ]
      ],
      trans:          'Mona zamierza zacząć trenować brazylijskie jiu-jitsu.',
      autoNext:       'RANDOM',
    },


    _ba1: {
      set: [
                      [ 'Eri', 'drømmer', 'om', 'å', 'lære', 'seg', 'å', 'fly', 'luftballong', ]
      ],
      trans:          'Eri marzy o tym, żeby nauczyć się latać balonem.',
      autoNext:       'RANDOM',
    },


    _bb1: {
      set: [
                      [ 'Nils', 'vil', 'slutte', 'å', 'strikke', 'vottene', ]
      ],
      trans:          'Nils chce skończyć robić na drutach rękawiczki.',
      autoNext:       'RANDOM',
    },



  };

  //
  //  Extra
  //
  this.extra = {

    _al1: {
      set: [
                      [ 'Jeg', 'vil', 'gjerne', 'ha', 'et', 'glass', 'vann', ]
      ],
      trans:          'Poproszę  szklankę wody.',
      autoNext:       'RANDOM',
    },


    _av1: {
      set: [
                      [ 'Siri', 'vil', 'ikke', 'miste', 'familien', 'i', 'terrorangrep', ]
      ],
      trans:          'Siri nie chce stracić rodziny w ataku terorystycznym.',
      autoNext:       'RANDOM',
    },


    _ae1: {
      set: [
                      [ 'Du', 'kan', 'bringe', 'noe å drikke', ]
      ],
      trans:          'Możesz przynieść coś do picia.',
      autoNext:       'RANDOM',
    },


    _ax1: {
      set: [
                      [ 'Jeg', 'skal', 'prøve', 'å', 'huske', 'så', 'mye', 'som', 'mulig', ]
      ],
      trans:          'Zamierzam spróbować zapamiętać tak dużo, jak to możliwe.',
      autoNext:       'RANDOM',
    },


    _aw1: {
      set: [
                      [ 'Jeg', 'skal', 'legge', 'meg', 'klokka', '23', ]
      ],
      trans:          'Położę się o godzinie 23.',
      autoNext:       'RANDOM',
    },


    _ad1: {
      set: [
                      [ 'Jeg', 'kan', 'betale', 'for', 'det', ]
      ],
      trans:          'Mogę za to zapłacić.',
      autoNext:       'RANDOM',
    },


    _ap1: {
      set: [
                      [ 'Dere', 'liker', 'å', 'kjøpe', 'pene', 'bøker', ]
      ],
      trans:          'Wy lubicie kupować piękne książki.',
      autoNext:       'RANDOM',
    },

  };


}
</script>


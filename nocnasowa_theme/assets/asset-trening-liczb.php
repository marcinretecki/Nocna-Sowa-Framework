<script>
function getRandomNumber(option) {
  var min, max;

  if ('0' === option) {
    min = 0;
    max = 9;
  } else if ('10' === option) {
    min = 10;
    max = 19;
  } else if ('20' === option) {
    min = 20;
    max = 99;
  } else {
    min = 1000;
    max = 9999;
  }

  return Math.floor(Math.random() * (max - min + 1)) + min;
}


function getWords(num) {
  var j = ['null', 'en', 'to', 'tre', 'fire', 'fem', 'seks', 'sju', 'åtte', 'ni', 'ti', 'elleve', 'tolv', 'tretten', 'fjorten', 'femten', 'seksten', 'sytten', 'atten', 'nitten'],
      d = ['', '', 'tjue', 'tretti', 'førti', 'femti', 'seksti', 'sytti', 'åtti', 'nitti'],
      r = '',
      tusen, hundre, ti, en;

  num = num.toString();

  if (20 > num) {

    if (1 == num) {
      r += 'én / ei / ett (zgodnie z rodzajem)';
    } else {
      r += j[num];
    }


  } else if (100 > num) {

    if (20 > num) {
      r += j[num];
    } else {
      ti = parseInt( num[0] );
      en = parseInt( num[1] );

      r += d[ti];
      if (0 < en) {
        r += j[en];
      }
    }

  } else {

    tusen = parseInt( num[0] );
    hundre = parseInt( num[1] );
    ti = parseInt( num[2] );
    en = parseInt( num[3] );

    if (1 < tusen) {
      r += j[tusen];
      r += ' ';
    } else if (1 == tusen) {
       r += 'ett ';
    }

    r += 'tusen';

    if (1 < hundre) {
      r += ' ';
      r += j[hundre];
    } else if (1 == hundre) {
      r += ' ett';
    }

    if (0 < hundre) {
      r += ' hundre';
    }

    if ( (0 < ti) || (0 < en) ) {
      r += ' og ';
    }

    if (1 == ti) {

      r += j[ti*10 + en];

    } else {

      if (0 < ti) {
        r += d[ti];
      }

      if  (0 < en) {
        r += j[en];
      }

    }

  }

  return r;

}


function treningLiczbShow(event) {
  var el = document.getElementById('trening-liczb'),
      numberEl = document.getElementById('trening-liczb-number'),
      option = document.querySelector('input[name = "option"]:checked').value,
      state = treningLiczbObject.state;

  if (el) {
    event.preventDefault();

    if ('hidden' === state) {
      treningLiczbObject.state = 'number';
    }

    sectionToggle('trening-liczb', 'trening-liczb-section-open', true);

    numberEl.innerHTML = getRandomNumber(option);
    numberEl.style.cssText = "opacity:1";

    ga('send', 'event', 'Ćwiczenie', 'Wylosuj liczbę', 'Trening Liczb');

  }
}

function treningLiczbClose(event) {
  var el = document.getElementById('trening-liczb'),
      wordsEl = document.getElementById('trening-liczb-words'),
      transparent = 'opacity:0;';

  if (el) {
    event.preventDefault();
    treningLiczbObject.state = 'hidden';

    sectionToggle('trening-liczb', 'trening-liczb-section-open', true);

    wordsEl.style.cssText = transparent;

    smoothScrollTo('trening-liczb-form');

    ga('send', 'event', 'Ćwiczenie', 'Zamknij', 'Trening Liczb');
  }
}

function treningLiczbObjectFn() {
  this.state = 'hidden';
}
var treningLiczbObject = new treningLiczbObjectFn();

 'hidden';

function treningLiczb(event) {
  var el = document.getElementById('trening-liczb'),
      numberEl = document.getElementById('trening-liczb-number'),
      wordsEl = document.getElementById('trening-liczb-words'),
      option = document.querySelector('input[name = "option"]:checked').value,
      state = treningLiczbObject.state,
      progress = el.getAttribute('data-progress'),
      progressEl = document.getElementById('trening-liczb-progress'),
      visible = 'opacity:1;',
      transparent = 'opacity:0;',
      randomNum,
      info;

  if (el) {
    event.preventDefault();

    if ( 'number' === state ) {

      wordsEl.innerHTML = '<i>' + getWords(numberEl.innerHTML) + '</i>';
      wordsEl.style.cssText = visible;
      treningLiczbObject.state = 'word';

    } else if ( 'word' === state  ) {

      randomNum = getRandomNumber(option);

      while (numberEl.innerHTML == randomNum) {
        randomNum = getRandomNumber(option);
      }

      progress = parseInt(progress) + 1;

      treningLiczbObject.state = 'number';
      el.setAttribute('data-progress', progress);

      numberEl.style.cssText = transparent;
      wordsEl.style.cssText = transparent;
      progressEl.innerHTML = progress;

      window.setTimeout(function() {
        numberEl.innerHTML = randomNum;
        numberEl.style.cssText = visible;
      }, 400);

    }

    if ( 1 === progress ) {
      info = document.getElementById('trening-liczb-info');
      info.style.cssText = transparent + 'position:absolute;top:-2.5rem;width:100%;';
    }

    ga('send', 'event', 'Ćwiczenie', 'Następna liczba ', 'Trening Liczb');

  }
}

function attachTreningLiczbShow(){
  var el = document.getElementById('trening-liczb-button');
  if (el) {
    el.innerHTML = 'Zacznij trening';
    el.addEventListener("click", treningLiczbShow, false);
  }
}

function attachTreningLiczbClose(){
  var el = document.getElementById('trening-liczb-close');
  if (el) {
    el.addEventListener("click", treningLiczbClose, false);
  }
}

function attachTreningLiczbNext(){
  var el = document.getElementById('trening-liczb-next');
  if (el) {
    el.addEventListener("click", treningLiczb, false);
  }
}

function createEl() {
  var wrapper = document.body,
      treningLiczb = document.createElement('div'),
      centered = document.createElement('div'),
      number = document.createElement('div'),
      words = document.createElement('div'),
      info = document.createElement('div'),
      progressContainer = document.createElement('div'),
      progress = document.createElement('span'),
      next = document.createElement('button'),
      close = document.createElement('button');

  treningLiczb.id = 'trening-liczb';
  treningLiczb.className = 'section-green';
  //treningLiczb.style.cssText = 'position:fixed;left:50%;top:50%;width:0%;height:0%;overflow:hidden;z-index:-1000;opacity:0;';
  treningLiczb.className = 'section-green trening-liczb-section';
  treningLiczb.setAttribute('data-progress', '0');

  centered.className = 'centered';
  centered.style.cssText = 'position:relative;top:50%;transform: translateY(-50%);';

  number.id = "trening-liczb-number";
  number.className = 'h1 size-6 space';
  number.style.opacity = '0';

  words.id = "trening-liczb-words";
  words.className = 'size-2';
  words.style.opacity = '0';
  words.innerHTML = '<i>&nbsp;</i>';

  centered.appendChild(number);
  centered.appendChild(words);

  treningLiczb.appendChild(centered);

  info.id = 'trening-liczb-info';
  info.style.cssText = 'position:absolute;top:2.5rem;width:100%;opacity:0.5;';
  info.className = 'centered';
  info.innerHTML = "Kliknij gdziekolwiek, żeby pokazać odpowiedź.";

  treningLiczb.appendChild(info);

  progressContainer.style.cssText = 'position:absolute;bottom:1.25rem;left:1.25rem;opacity:0.5;';
  progressContainer.innerHTML = 'Du har trent: <span id="trening-liczb-progress">0</span> tall.';

  treningLiczb.appendChild(progressContainer);

  next.id = "trening-liczb-next";
  next.style.cssText = 'position:absolute;left:0;top:0;right:0;bottom:0;background:transparent;border:0;padding:0;margin:0;width:100%;';
  next.role = 'button';

  treningLiczb.appendChild(next);

  close.id = 'trening-liczb-close';
  close.className = "btn btn-dark rounded btn-nav section-nav__search section-nav__search--x";
  close.style.cssText = "position:fixed;right:1.25rem;top:1.25rem;height:2.5rem;";
  close.role = "button";

  treningLiczb.appendChild(close);

  wrapper.appendChild(treningLiczb);
}


window.addEventListener('load', function() {

  createEl();

  attachTreningLiczbShow();
  attachTreningLiczbClose();
  attachTreningLiczbNext();

}, false);


</script>
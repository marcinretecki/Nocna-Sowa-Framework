<?php
/*
Template Name: Warsztaty w Oslo v2016
*/



include( 'functions/warsztaty-functions.php' );

$title = 'Kurs norweskiego w Oslo';

$rating = '<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"><meta itemprop="ratingValue" content="5"><meta itemprop="worstRating" content="1"><meta itemprop="bestRating" content="5"></div>';

$treningi_wymowy_arr = getTreningiDates('treningi_wymowy');
$treningi_slownictwa_arr = getTreningiDates('treningi_slownictwa');
?>

<!DOCTYPE html>
<html lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/WebPage">
<head>
  <title itemprop="name">Warsztaty i kursy języka norweskiego w Oslo | Nocna Sowa</title>

  <link href="http://nocnasowa.pl/kurs-norweskiego-oslo/" rel="canonical" />

  <?php include( 'includes/header-meta.php' ); ?>

  <meta name="description" itemprop="description" content="Bez nudnych podręczników. Aktywne i przyjemne kursy języka norweskiego w Oslo. Warsztatowe metody nauki norweskiego z Nocną Sową." />
  <meta itemprop="image" content="http://nocnasowa.pl/c/i/warsztaty/kurs_norweskiego_oslo.jpg">

  <?php // Facebook og: ?>
  <meta property="og:title" content="Warsztaty języka norweskiego w Oslo" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="http://nocnasowa.pl/c/i/advert_oslo_2016.jpg" />

  <?php
  function echo_ld_json() {
    $level_array = array('zaczynam', 'uczeSie', 'rozwijam', 'konwersacje');

    $return = '<script type="application/ld+json"> [';

    for ($i = 0; $i < count($level_array); $i++) {
      $level = $level_array[$i];
      $constants = getConstants( $level );
      $description = $constants["desc"];

      if ( getData($level) ) {
        foreach ( getData($level) as $kurs => $kursArray ) {
          if ( !isset($kursArray['msg']) ) {

            $url = 'http://nocnasowa.pl/kurs-norweskiego-oslo/zapisy/?' . urlencode('level=' . $level . '&kurs=' . $kurs);

            $lastDayArray = array_pop( $kursArray['dates'] );
            $lastHour = explode( " do ", $kursArray['time'] )[1];
            $endTime = mktime(0, 0, 0, $lastDayArray['m'], $lastDayArray['d'], $lastDayArray['y']);
            $endDate = date("Y-m-d", $endTime) . 'T' . $lastHour;

            if ($kursArray['soldOut'] ) {
              $availability = 'http://schema.org/OutOfStock';
            } else {
              $availability = 'http://schema.org/InStock';
            }

            $return .= '
              {
                "@context": "http://schema.org",
                "@type": "EducationEvent",
                "name": "' . $kursArray["kurs"] . ' – kurs norweskiego w Nocnej Sowie",
                "image": "http://nocnasowa.pl/c/i/advert_oslo_2016.jpg",
                "startDate": "' . $kurs . '",
                "endDate": "' . $endDate . '",
                "description": "' . $description . '",
                "location": {
                  "@type": "Place",
                  "name": "Nocna Sowa – szkoła języka norweskiego w Oslo",
                  "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "Valkyriegata 13A",
                    "addressLocality": "Oslo",
                    "addressRegion": "Oslo",
                    "addressCountry": "NO",
                    "postalCode": "0366",
                    "name": "Nocna Sowa"
                  }
                },
                "eventStatus": "EventScheduled",
                "offers": {
                   "@type": "Offer",
                   "url": "' . $url . '",
                   "category": "primary",
                   "price": "' . $kursArray['price'] . '",
                   "priceCurrency": "NOK",
                   "availability": "' . $availability . '"
                },
                "performer": {
                  "@type": "EducationalOrganization",
                  "name": "Nocna Sowa",
                  "sameAs": "http://nocnasowa.pl/"
                },
                "url": "' . $url . '"
              },';

          }

        } // end foreach
      }
    }
    $return = substr($return, 0, -1);
    $return .= ']</script>';

    echo $return;
  }
  echo_ld_json();
  ?>



</head>

<body>

  <?php include( 'includes/header.php' ); ?>

  <?php include( 'includes/header-warsztaty-oslo.php' ); ?>


  <div class="section section-trans section-trans--fixed img-oslo">
    <div id="heromatic" class="section-content section-8-6 centered">
      <h1 class="space-x2 size-6">
        <span class="space block">Warsztaty norweskiego</span>
        <span class="h2 size-2 block">Intensywne kursy języka norweskiego <span class="no-break">w Oslo.</span></span>
      </h1>
      <a class="hero-arrow" href="#warsztaty" data-ga-action="Arrow"></a>
    </div>
  </div>


  <section id="warsztaty" class="section section-beige">
    <div class="section-content">

      <h2 class="section-h-thin centered space">Dla kogo są Warsztaty?</h2>
      <div class="row">
        <div class="main-column space-x4">

          <p><i>Warsztaty</i> to intensywne 4-tygodniowe kursy języka norweskiego. Stworzyliśmy je dla osób otwartych i pracowitych, które chcą rozwijać siebie i czuć się dobrze w Norwegii.</p>


          <p>Na <i>Warsztatach</i> stawiamy na indywidualny rozwój każdego uczestnika, budujemy nawyk systematycznej, ale nie przytłaczającej nauki <span class="no-break">i ćwiczymy</span> tak długo, aż nie będzie mogło Ci nie wyjść.</p>

        </div>
      </div>


      <div class="row">
        <article class="recommends-mini" itemprop="review" itemscope itemtype="http://schema.org/Review">

          <meta itemprop="name" content="Nie mogę przestać">
          <meta itemprop="author" content="Żaneta">

          <?php echo $rating; ?>

          <img class="recommends-img" alt="Żaneta, uczestniczka warsztatów języka norweskiego" src="/c/i/opinie/zaneta_w_opinie_warsztaty_bw_h_D7K_6930.jpg" />

          <div class="recommends-block">
            <p class="recommends-text"><q itemprop="reviewBody">Uczestniczyłam już w większości zajęć Nocnej Sowy :D Aktualnie uczęszczam na treningi słownictwa i jakoś nie mogę przestać!</q><br />
            <a href="/opinie/zaneta-wit/" class="size-0" data-ga-action="Przeczytaj historie Zanety">Przeczytaj historię Żanety &raquo;</a></p>
          </div>

        </article>


        <article class="recommends-mini" itemprop="review" itemscope itemtype="http://schema.org/Review">

          <meta itemprop="name" content="Jestem przeszczęśliwy">
          <meta itemprop="author" content="Kuba">

          <?php echo $rating; ?>

          <img class="recommends-img" alt="Kuba, uczestnik kursu języka norweskiego" src="/c/i/opinie/kuba_opinie_warsztaty_bw_h_D7K_5283.jpg" />

          <div class="recommends-block">
            <p class="recommends-text"><q itemprop="reviewBody">Jestem przeszczęśliwy, że skorzystałem z polecenia <span class="no-break">i wybrałem</span> Sowę.</q><br />
            <a href="/opinie/kuba-s/" class="size-0" data-ga-action="Przeczytaj historie Kuby">Przeczytaj historię Kuby &raquo;</a></p>

          </div>

        </article>

      </div>


      <div class="row">

        <article class="recommends-mini" itemprop="review" itemscope itemtype="http://schema.org/Review">

          <meta itemprop="name" content="Poczułam się zmotywowana">
          <meta itemprop="author" content="Elwira">

          <?php echo $rating; ?>

          <img class="recommends-img" alt="Elwira, uczestniczka warsztatów języka norweskiego" src="/c/i/opinie/elwira_opinie_warsztaty_bw_h_D7K_3005.jpg" />

          <div class="recommends-block">
            <p class="recommends-text"><q itemprop="reviewBody">Uczenie się norweskiego z Nocną Sową to językowa przyjemność. Poczułam się zmotywowana do pracy i stan ten trwa :).</q><br />
            <a href="/opinie/elwira-2/" class="size-0" data-ga-action="Przeczytaj historie Elwiry">Przeczytaj historię Elwiry &raquo;</a></p>
          </div>

        </article>


        <article class="recommends-mini" itemprop="review" itemscope itemtype="http://schema.org/Review">

          <meta itemprop="name" content="Przezwycięż swoje słabości">
          <meta itemprop="author" content="Weronika">

          <?php echo $rating; ?>

          <img class="recommends-img" alt="Weronika, uczestniczka kursu języka norweskiego" src="/c/i/opinie/weronika_p_opinie_warsztaty_bw_h_D7K_4199.jpg" />

          <div class="recommends-block">
            <p class="recommends-text"><q itemprop="reviewBody">Bardzo polecam Martę i Marcina wszystkim tym, którzy stracili już nadzieję, że nauczą się norweskiego. Leniuchy i wstydliwe osoby, również przezwyciężą tu swoje słabości!</q><br />
            <a href="/opinie/weronika-p/" class="size-0" data-ga-action="Przeczytaj historie Weroniki">Przeczytaj historię Weroniki &raquo;</a></p>
          </div>

        </article>

      </div>


      <p class="centered space-x4">
        Na wszystkich zdjęciach są prawdziwi uczestnicy <i>Warsztatów</i>.<br />
        <a href="/opinie/" data-ga-action="Wszystkie opinie (top)">Zobacz pozostałe opinie &raquo;</a>
      </p>


      <h2 id="metody" class="centered section-h-thin">Aktywne metody</h2>
      <p class="intro centered space-x2">To nie jest tradycyjny kurs.</p>

      <div class="row">
        <div class="main-column space-x4">
          <p class="learn space-x2">
            <strong>Bez nudnych podręczników.</strong>
            <br />
            Podręcznik nie może przewidzieć jakie masz zainteresowania i co będzie Ci potrzebne w pracy. Dlatego na Warsztatach koncentrujemy się na słownictwie przydatnym w Twoim życiu. Pokażemy Ci aktywne metody, które ułatwiają zapamiętywanie.
          </p>

          <p class="learn space-x2">
            <strong>Zacznijmy od wymowy.</strong>
            <br />
            Uważamy, że naukę wymowy trzeba zacząć jak najwcześniej, by nie tracić później czasu na oduczanie się błędów. Chcemy żebyś czuł się pewnie ze swoim norweskim, żebyś słyszał i rozumiał co do Ciebie mówią. Każdy może spokojnie opanować norweską fonetykę, jeśli tylko zechce wykorzystać narzędzia, które mu zaproponujemy na zajęciach.
          </p>

          <p class="learn space-x2">
            <strong>Gramatyka po polsku.</strong>
            <br />
            Wiele szkół mówi, że naucza gramatyki w wyjątkowy sposób, po czym przerabia podręcznik &ldquo;dla wszystkich&rdquo;. Przez ostatnie 4 lata opracowaliśmy materiały przeznaczone specjalnie dla osób polskojęzycznych. Gramatykę tłumaczymy po polsku, krok po kroku, w sekwencji, która jest przystępna, zrozumiała i daje jak najszybsze efekty.
          </p>

          <p class="learn space-x2">
            <strong>Tylko 8 osób w grupie.</strong>
            <br />
            Na Warsztatach jest dwóch prowadzących, a grupy nie są większe niż <span class="no-break">8 uczestników</span>. Dzięki temu możemy lepiej obserwować Twój rozwój <span class="no-break">i pomóc</span> Ci z ewentualnymi problemami.
          </p>


        </div>
      </div>

    </div>

  </section>


  <div class="section-trans__fixed">
    <div class="section-trans__bg img-mountains"></div>
  </div>


  <section id="kto" class="section section-trans">

    <div class="section-content section-6-4">
      <h2 class="section-h-thin centered text-shadow">Kto to prowadzi?</h2>
      <p class="intro centered space-x8 text-shadow">Poznaj Martę i Marcina.</p>

      <div class="row">
        <div class="main-column"><?php // ommited .section-box here on purpose ?>

          <div class="section-box__box section-box__box--kto">

            <p>
              <span class="size-3">Hei,</span>
              <br />
              oto my. Małżeństwo, które głęboko wierzy w to, że możesz nauczyć się języka norweskiego. Pomogliśmy już setkom naprawdę różnych osób, czerpiąc przy tym radość i energię do dalszej pracy. Od 2012 roku prowadzimy Nocną Sowę. Niewiele krócej Warsztaty norweskiego <span class="no-break">w Oslo</span>.
            </p>

            <p>Przekazywanie wiedzy w jak najprostszy sposób stało się naszym celem. Jest to umiejętność nad którą ciągle pracujemy, bo chcemy żebyś szybciej nauczył się języka. Program Warsztatów opracowujemy w pełni samodzielnie, opierając się o najnowsze badania i metodykę nauczania dorosłych.</p>

            <p>Każdy kto nas poznał wie, że zajmujemy się nauczaniem, bo lubimy <span class="no-break">– nie dlatego</span>, że musimy. Mamy nadzieję, że i Ty masz w sobie równie dużo entuzjazmu do nauki norweskiego, ile my do nauczania Ciebie.</p>

            <p class="space-x2">
              Do zobaczenia,
              <br />
              Marta i Marcin
            </p>

          </div>

        </div>
      </div>
    </div>
  </section>




  <section id="filozofia" class="section section-beige">
    <div class="section-content">

      <h2 class="section-h-thin centered">Nasza filozofia</h2>
      <p class="intro centered space-x2">Uczymy się od najlepszych.</p>


      <div class="row">
        <div class="main-column">
          <p class="learn">
            <strong>Deliberate practice – świadomy trening.</strong>
            <br />
            Deliberate practice to metodyka oparta na najnowszych badaniach <span class="no-break">o pracy</span> ludzkiego mózgu. Polega na koncentracji na wybranych umiejętnościach, ciągłym wychodzeniu poza strefę komfortu <span class="no-break">i próbowaniu</span> nowych rzeczy.
          </p>

          <p class="space-x2">Inspirują nas: Anders Ericsson, Daniel Coyle, Josh Waitzkin.</p>


          <p class="learn">
            <strong>Kaizen 改善 – eliminacja błędów.</strong>
            <br />
            Kaizen to po japońsku &ldquo;zmiana na lepsze&rdquo;. To strategia, która prowadzi do ciągłego doskonalenia się. Uczy, jak eksperymentować <span class="no-break">i zauważać</span>, co daje pozytywne efekty, a co jest pracą na marne.
          </p>

          <p class="space-x2">Inspirują nas: Masaaki Imai, Kaoru Ishikawa.</p>


          <p class="learn">
            <strong>Mindfulness – sztuka robienia jednej rzeczy na raz.</strong>
            <br />
            Mindfulness to szczególny rodzaj uwagi: świadomej, skierowanej <span class="no-break">na bieżącą</span> chwilę, nieosądzającej, bez porównywania się.
          </p>

          <p>Na spotkaniach uczymy uwagi i koncentracji na jednym konkretnym zagadnieniu. Nie uczymy się w stresie i pośpiechu, ale budujemy spokojną i pełną zaufania atmosferę. W ten sposób nie tylko lepiej zapamiętasz nowe słownictwo i wymowę, ale też będziesz efektywniej uczyć się sam w domu.</p>

          <p class="space-x2">Inspirują nas: Sam Harris, Leo Babauta, Timothy Ferriss.</p>


          <p class="learn">
            <strong>Andragogika – materiały i metodologia dla dorosłych.</strong>
            <br />
            Nie zajmujemy się nauką dzieci. W pedagogice to nauczyciel <span class="no-break">i oficjalny</span> system edukacji decyduje, co uczeń musi znać, żeby zdać egzamin lub otrzymać dobrą ocenę. Naszym zdaniem oceny nie mają znaczenia, a &ldquo;wiedza dla wiedzy&rdquo; jest bezużyteczna.
          </p>

          <p>Warsztaty nie są wykładem, tylko aktywnym, angażującym treningiem ukierunkowanym na indywidualny rozwój. Naszą rolą jest nadanie kierunku pracy i pokazanie najlepszych metod, reszta zależy od Twoich chęci.</p>

          <p class="space-x4">Inspirują nas: Seth Godin, Malcolm Knowles.</p>

        </div>
      </div>


      <div class="row">
        <article class="recommends-mini" itemprop="review" itemscope itemtype="http://schema.org/Review">

          <meta itemprop="name" content="Rewelacyjny program warsztatów">

          <?php echo $rating; ?>

          <img class="recommends-img" alt="Wojtek, uczestnik kursu języka norweskiego" src="/c/i/opinie/wojtek_opinie_warsztaty_bw_h_D7K_9519.jpg" />

          <div class="recommends-block">
            <p class="recommends-text"><q itemprop="reviewBody">Rewelacyjny program warsztatów oraz postawa prowadzących zajęcia powoduje, że z dnia na dzień czujemy się pewniej używając języka norweskiego.</q><br />
            <small itemprop="author">Wojtek</small></p>
          </div>

        </article>


        <article class="recommends-mini" itemprop="review" itemscope itemtype="http://schema.org/Review">

          <meta itemprop="name" content="Krok siedmiomilowy">

          <?php echo $rating; ?>

          <img class="recommends-img" alt="Kasia, uczestniczka kursu języka norweskiego" src="/c/i/opinie/kasia_opinie_warsztaty_bw_h_D7K_1759.jpg" />

          <div class="recommends-block">
            <p class="recommends-text"><q itemprop="reviewBody">Czas warsztatów to krok siedmiomilowy w mojej nauce norweskiego.</q><br />
            <small itemprop="author">Kasia</small></p>
          </div>

        </article>
      </div>


      <div class="row">
        <article class="recommends-mini" itemprop="review" itemscope itemtype="http://schema.org/Review">
          <meta itemprop="name" content="Motywują do działania">

          <?php echo $rating; ?>

          <img class="recommends-img" alt="Ania, uczestniczka kursu języka norweskiego" src="/c/i/opinie/ania_opinie_warsztaty_bw_h_D7K_1827.jpg" />

          <div class="recommends-block">
            <p class="recommends-text"><q itemprop="reviewBody">Dwoje nauczycieli zaangażowanych w swoją pracę <span class="no-break">i wykonujących</span> ją z pasją, motywuje do działania.</q><br />
            <small itemprop="author">Ania</small></p>
          </div>
        </article>


        <article class="recommends-mini" itemprop="review" itemscope itemtype="http://schema.org/Review">
          <meta itemprop="name" content="Unikalna metoda">

          <?php echo $rating; ?>

          <img class="recommends-img" alt="Sebastian, uczestnik kursu języka norweskiego" src="/c/i/opinie/sebastian_opinie_warsztaty_bw_h_D7K_8725.jpg" />

          <div class="recommends-block">
            <p class="recommends-text"><q itemprop="reviewBody">Marta i Marcin nauczają języka norweskiego unikalną metodą, która pozwoliła mi na łatwe i szybkie przyswojenie wiedzy.</q><br />
            <small itemprop="author">Sebastian</small></p>
          </div>
        </article>
      </div>

      <div class="centered">
        <a href="/opinie/" data-ga-action="Wszystkie opinie (middle)">Zobacz pozostałe opinie &raquo;</a>
      </div>

    </div>
  </section>



  <section id="mapa" class="section section-trans section-trans--fixed img-map">
    <div class="section-content">
      <div class="row">
        <div class="col-8 section-box">
          <div class="section-box__box" itemscope itemtype="http://schema.org/EducationalOrganization">
            <h2 class="section-h-thin space">Majorstuen</h2>

            <meta itemprop="name" content="Nocna Sowa" />
            <meta itemprop="url" content="http://nocnasowa.pl/" />
            <meta itemprop="logo" content="http://nocnasowa.pl/c/i/sowa_fb_thumb.jpg" />
            <meta itemprop="description" content="Warsztaty języka norweskiego w Oslo, kursy norweskiego online." />

            <dl itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
              <dt>Nasz adres:</dt>
              <dd>
                <span itemprop="streetAddress">Valkyriegata 13A</span><br />
                <span itemprop="postalCode">0366</span> <span itemprop="addressLocality">Oslo</span>, Norwegia<br />
                <span class="size-0">(wejście od Kirkeveien, obok McDonald's)</span>
                <meta itemprop="addressCountry" content="NO">
                <meta itemprop="addressRegion" content="Oslo">
              </dd>
            </dl>

          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="section section-dark">

    <div id="grupy" class="section-content">
      <h2 class="section-h-thin centered space">Do której grupy chcesz dołączyć?</h2>

      <div class="row">
        <div class="main-column">
          <p>Przygotowaliśmy trzy kursy wiodące: <i>Zaczynam Mówić</i>, <i>Uczę się Mówić</i> <span class="no-break">i <i>Rozwijam</i></span>. Każdy z nich trwa miesiąc i daje Ci coraz szersze możliwości komunikacji.</p>
          <p class="space-x2">Dodatkowo, jako uzupełnienie możesz dołączyć do <i>Treningów Wymowy</i>, <i>Treningów Słownictwa</i> lub <i>Konwersacji</i>.</p>
        </div>
      </div>


      <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
        <meta itemprop="ratingValue" content="5" />
        <meta itemprop="reviewCount" content="65" />
        <meta itemprop="worstRating" content="1" />
        <meta itemprop="bestRating" content="5" />
      </div>


      <div id="zaczynam-mowic" class="section-beige top-green rounded space-x4 pad-x2">
        <h3 class="section-h-thin centered">Zaczynam Mówić</h3>
        <p class="intro centered space-half">Aktywny kurs norweskiego od zera.</p>


        <p class="no-margin centered space-x2 size-0">4500 kr (w cenie są wszystkie materiały) | 32 godziny lekcyjne | <span class="no-break">4–8 osób</span> w grupie</p>


        <div class="row">
          <dl class="col-8">
            <dt>Dla kogo są te Warsztaty?</dt>
            <dd>Dla wszystkich, którzy nie mieli styczności <span class="no-break">z językiem</span> norweskim lub dla tych, którzy <span class="no-break">chcą powtórzyć</span> i usystematyzować podstawy.</dd>
            <dd>Dzięki warsztatowym metodom już <span class="no-break">od pierwszych</span> zajęć zaczniesz mówić po norwesku.</dd>
          </dl>

          <dl class="col-8">
            <dt>Czego się nauczysz?</dt>
            <dd>Po pierwsze poprawnej wymowy. Nauczymy Cię mówić i czytać zgodnie z zasadami norweskiej fonetyki. Dowiesz się, jak w szybki sposób uczyć się nowych słów i jak je odmieniać.</dd>

            <dd>Nabierzesz płynności w opowiadaniu <span class="no-break">o sobie</span>, <span class="no-break">o tym</span> co robisz, czego potrzebujesz oraz jakie masz plany. Opanujesz czas teraźniejszy i przyszły, które są kluczowe w codziennej komunikacji. Zdobędziesz solidną podstawę z gramatyki, która umożliwi Ci w pełni samodzielną kontynuację nauki.</dd>
          </dl>
        </div>


        <?php createButtons( "zaczynam" ); ?>


        <div class="centered">
          Chciałbyś o coś zapytać? Zerknij do <a data-ga-action="Najczęściej zadawane pytania (pod Zaczynam)" href="/kurs-norweskiego-oslo/pytania/">najczęściej zadawanych pytań &raquo;</a>
        </div>
      </div>


      <div id="treningi" class="section-beige top-green rounded space-x4 pad-x2 relative">
        <div class="row">
          <div class="col-10">
            <h3 class="section-h-thin size-4">Treningi Wymowy</h3>
            <p>Jest to oferta wyłącznie dla uczestników naszych <i>Warsztatów</i>, którzy mają ochotę  na dodatkowe zajęcia <span class="no-break">z norweskiej</span> wymowy i rozumienia ze słuchu. Polecamy je osobom, które ukończyły <i>Zaczynam Mówić</i>.</p>

            <p class="no-margin">
              <?php echo $treningi_wymowy_arr[1]; ?>
            </p>
          </div>


          <div class="col-6">
            <a href="/kurs-norweskiego-oslo/treningi/" data-ga-action="Dowiedz się więcej (Treningi Wymowy)" class="btn btn-green btn-s-2 btn-warsztaty-list-alt">Dowiedz się więcej &raquo;</a>
          </div>

        </div>
      </div>


      <div id="ucze-sie-mowic" class="section-beige top-orange rounded space-x4 pad-x2">
        <h3 class="section-h-thin centered">Uczę się Mówić</h3>
        <p class="intro centered space-half">Zacznij używać czasów przeszłych na co dzień.</p>


        <p class="no-margin centered space-x2 size-0">4500 kr (w cenie są wszystkie materiały) | 32 godziny lekcyjne | 4–8 osób w grupie</p>


        <div class="row">
          <dl class="col-8">
            <dt>Dla kogo są te Warsztaty?</dt>
            <dd>Jeśli czujesz, że już sporo potrafisz, ale nadal masz problem ze swobodną komunikacją, to coś dla Ciebie.</dd>
            <dd>Na tym etapie powinieneś dobrze znać czas <i>presens</i>, odmianę rzeczownika i być gotowym na samodzielną naukę poza kursem.</dd>
          </dl>

          <dl class="col-8">
            <dt>Czego się nauczysz?</dt>
            <dd>Rozumienia i użycia czasów <i>preteritum</i> i <i>perfektum</i>, dzięki czemu będziesz w stanie wyrazić niemal każdą myśl po norwesku. Dowiesz się, w jaki sposób zmieniać szyk zdania i poprawnie odmieniać przymiotniki. Zaczniesz czytać norweską prasę, przez co rozwiniesz słownictwo <span class="no-break">i będziesz</span> lepiej rozumieć Norwegów.</dd>
          </dl>
        </div>


        <?php createButtons( "uczeSie" ); ?>


        <div class="centered">
          Czy masz pytania? Sprawdź <a data-ga-action="Najczęściej zadawane pytania (pod Uczę się)" href="/kurs-norweskiego-oslo/pytania/">najczęściej zadawane pytania &raquo;</a>
        </div>
      </div>


      <div id="treningi-slow" class="section-beige top-orange rounded pad-x2 relative">
        <div class="row">
          <div class="col-10">
            <h3 class="section-h-thin size-4">Treningi Słownictwa</h3>
            <p>Jest to oferta wyłącznie dla uczestników <i>Warsztatów</i>, którym spodobało się czytanie norweskich gazet i chcieliby kontynuować ten nawyk. Polecamy je osobom, które ukończyły <i>Uczę się Mówić</i>.</p>

            <p class="no-margin">
              <?php echo $treningi_slownictwa_arr[1]; ?>
            </p>
          </div>


          <div class="col-6">
            <a href="/kurs-norweskiego-oslo/treningi/" data-ga-action="Dowiedz się więcej (Treningi Słownictwa)" class="btn btn-orange btn-s-2 btn-warsztaty-list-alt">Więcej o Treningach &raquo;</a>
          </div>

        </div>
      </div>


    </div> <?php // end #grupy ?>
  </section>



  <div class="section section-trans section-trans--fixed img-water">
    <div class="section-content">
      <div class="row">
        <figure class="quote-white quote-big col-10 center">
          <blockquote>
            <p>Nigdy nie rezygnuj z celu tylko dlatego, <span class="no-break">że jego</span> osiągnięcie wymaga czasu.<br />Czas i tak upłynie.</p>
          </blockquote>
          <figcaption>H. Jackson Brown Jr</figcaption>
        </figure>
      </div>
    </div>
  </div>



  <section class="section section-dark">
    <div id="grupy-2" class="section-content">

      <?php
/*      <div id="warsztaty-pisania" class="section-beige top-orange rounded space-x4 pad-x2 relative">
        <div class="row">
          <div class="col-10">
            <h3 class="section-h-thin size-4">Warsztaty Pisania</h3>
            <p class="no-margin">Po kursie <i>Uczę się Mówić</i> możesz wziąć udział w <i>Warsztatach Pisania</i>. Jest to miesięczny kurs online, dzięki któremu uporządkujesz gramatykę i nabierzesz płynności <span class="no-break">w formułowaniu myśli</span>.</p>
          </div>


          <div class="col-6">
            <a href="/warsztaty-pisania/" data-ga-action="Dowiedz się więcej (Warsztaty Pisania)" class="btn btn-orange btn-s-2 btn-warsztaty-list-alt">Dowiedz się więcej &raquo;</a>
          </div>
        </div>
      </div>*/
      ?>

      <div id="rozwijam" class="section-beige top-red rounded space-x4 pad-x2">
        <h3 class="section-h-thin centered">Rozwijam</h3>
        <p class="intro centered space-half">Ostatni krok przed Konwersacjami.</p>


        <p class="no-margin centered space-x2 size-0">4500 kr | 32 godziny lekcyjne | 4–8 osób w grupie</p>


        <div class="row">
          <dl class="col-8">
            <dt>Dla kogo są te Warsztaty?</dt>
            <dd>Dla osób, które poznały już czas przeszły, konstrukcję <i>perfektum</i> i szyk prosty, ale nie czują się pewnie w rozmowach po norwesku.</dd>
            <dd>Jeśli chcesz, żeby Twoje wypowiedzi były poprawne, ale zamiast nudnej gramatyki wolisz aktywne ćwiczenia, dialogi i czytanie norweskiej prasy, te Warsztaty są dla Ciebie.</dd>
          </dl>


          <dl class="col-8">
            <dt>Czego się nauczysz?</dt>
            <dd>Poznasz szyk zdań podrzędnych, dzięki czemu będziesz bez trudu budować dłuższe zdania. Nabierzesz wprawy w używaniu przymiotników, co pozwoli Ci tworzyć barwne opisy miejsc <span class="no-break">i sytuacji.</span> Nauczysz się reagować, gdy ktoś zapyta Cię o drogę.</dd>
            <dd>Ten kurs to Twój przełomowy moment <span class="no-break">w rozumieniu</span> języka norweskiego.</dd>
          </dl>
        </div>


        <?php createButtons( "rozwijam" ); ?>


        <div class="centered">
          Jeśli masz pytania, zobacz odpowiedzi <a data-ga-action="Najczęściej zadawane pytania (pod Rozwijam)" href="/kurs-norweskiego-oslo/pytania/">na najczęściej zadawane &raquo;</a>
        </div>

      </div>

      <div id="konwersacje" class="section-beige top-red rounded space-x4 pad-x2">
        <h3 class="section-h-thin centered">Konwersacje</h3>
        <p class="intro centered space-half">By płynnie rozmawiać po norwesku.</p>


        <p class="no-margin centered space-x2 size-0">Pierwszy kurs: 1500 kr | Kontynuacja: 1000 kr | 8 godzin lekcyjnych | 3–6 osób w grupie</p>


        <div class="row">
          <dl class="col-8">
            <dt>Dla kogo są Konwersacje?</dt>
            <dd>Dla osób, które chcą czytać norweską prasę, dzielić się opiniami na temat codziennego życia w Norwegii i poznać nowych ciekawych ludzi.</dd>
            <dd>Nie musisz być mistrzem gramatyki, ale powinieneś rozumieć użycie czasów <i>preteritum</i> <span class="no-break">i <i>perfektum</i></span> oraz znać szyk norweskiego zdania.</dd>
          </dl>


          <dl class="col-8">
            <dt>Jak wyglądają zajęcia?</dt>
            <dd>Na Konwersacjach używamy tylko języka norweskiego. Na każde spotkanie przygotowujesz temat, który Cię fascynuje. Opowiadasz o nim, dzielisz się nowym słownictwem i dyskutujesz <span class="no-break">z innymi.</span> Na niektórych spotkaniach analizujemy szczegółowo błędy, które pojawiły się <span class="no-break">w wypowiedziach</span> i uczymy się je eliminować.</dd>
            <dd>Każdy kurs jest inny, dlatego możesz uczestniczyć w Konwersacjach wiele razy.</dd>
          </dl>
        </div>


        <?php createButtons( "konwersacje" ); ?>


        <div class="centered">
          Zobacz odpowiedzi <a data-ga-action="Najczęściej zadawane pytania (pod Konwersacjami)" href="/kurs-norweskiego-oslo/pytania/">na najczęściej zadawane pytania &raquo;</a>
        </div>
      </div>


      <div class="row">
        <article class="col-8 recommends-mini" itemprop="review" itemscope itemtype="http://schema.org/Review">
          <meta itemprop="name" content="Najlepiej zainwestowany czas">

          <?php echo $rating; ?>

          <img class="recommends-img" alt="Monika, uczestniczka kursu języka norweskiego" src="/c/i/opinie/monika_opinie_warsztaty_bw_h_D7K_4636.jpg" />

          <div class="recommends-block">
            <p class="recommends-text"><q itemprop="reviewBody">Warsztaty Nocnej Sowy to najlepiej zainwestowany czas <span class="no-break">w naukę</span> norweskiego.</q><br />
            <small itemprop="author">Monika</small></p>
          </div>
        </article>


        <article class="col-8 recommends-mini" itemprop="review" itemscope itemtype="http://schema.org/Review">
          <meta itemprop="name" content="Strzał w dziesiątkę">

          <?php echo $rating; ?>

          <img class="recommends-img" alt="Adrian, uczestnik kursu języka norweskiego>" src="/c/i/opinie/adrian_opinie_warsztaty_bw_h_D7K_5272.jpg" />

          <div class="recommends-block">
            <p class="recommends-text"><q itemprop="reviewBody">Jeśli nie lubisz wydawać bez sensu pieniędzy jak ja, to inwestycja <span class="no-break">w Nocną</span> Sowę będzie strzałem <span class="no-break">w dziesiątkę</span>.</q><br />
            <small itemprop="author">Adrian</small></p>
          </div>
        </article>
      </div>

      <div class="row">
        <article class="col-8 recommends-mini" itemprop="review" itemscope itemtype="http://schema.org/Review">
          <meta itemprop="name" content="Polecam wszystkim">

          <?php echo $rating; ?>

          <img class="recommends-img" alt="Łukasz, uczestnik kursu języka norweskiego" src="/c/i/opinie/lukasz_opinie_warsztaty_bw_h_D7K_1067.jpg" />

          <div class="recommends-block">
            <p class="recommends-text"><q itemprop="reviewBody">Polecam wszystkim szukającym właściwej drogi do nauki języka norweskiego.</q><br />
            <small itemprop="author">Łukasz</small></p>
          </div>
        </article>


        <article class="col-8 recommends-mini" itemprop="review" itemscope itemtype="http://schema.org/Review">
          <meta itemprop="name" content="Miesiąc intensywnej pracy">

          <?php echo $rating; ?>

          <img class="recommends-img" alt="Ewelina, uczestniczka kursu języka norweskiego" src="/c/i/opinie/ewelina_opinie_warsztaty_bw_h_D7K_5244.jpg" />

          <div class="recommends-block">
            <p class="recommends-text"><q itemprop="reviewBody">Był to dla mnie miesiąc intensywnej pracy, ale dzięki temu widzę efekty.</q><br />
            <small itemprop="author">Ewelina</small></p>
          </div>
        </article>
      </div>


      <p class="centered">
        <a data-ga-action="Więcej opinii naszych uczestników (bottom)" class="a-light" href="/opinie/">Zobacz wszystkie opinie naszych uczestników &raquo;</a>
      </p>

    </div> <?php // end #grupy-2 ?>
  </section>


<?php  /* <section id="kawa" class="section section-dark">

    <div class="section-content">

      <div class="row">
        <div class="col-8 section-box">
          <div class="section-box__box">
            <h2 class="section-h-thin">Piątek o 5</h2>
            <p class="intro space">Spotkajmy się przy kawie.</p>

            <p>Raz w miesiącu organizujemy spotkania <span class="no-break">w naszym</span> biurze na Majorstua. Możesz nas wtedy odwiedzić <span class="no-break">i porozmawiać</span> <span class="no-break">o norweskim</span>, podróżach, designie, Twojej pasji albo chociaż powiedzieć cześć.</p>

            <p>Na najbliższe spotkanie zapraszamy <?php createFika(); ?>.</p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section id="kawa" class="section section-black">

    <div class="section-content">

      <div class="row">
        <div class="col-10 center">
          <h2 class="section-h-thin centered">Piątek o 5</h2>
          <p class="intro space-x2 centered">Spotkajmy się przy kawie.</p>

          <p>Raz w miesiącu organizujemy spotkania <span class="no-break">w naszym</span> biurze na Majorstua. Możesz nas wtedy odwiedzić <span class="no-break">i porozmawiać</span> <span class="no-break">o norweskim</span>, podróżach, designie, Twojej pasji albo chociaż powiedzieć cześć.</p>

          <p>Na najbliższe spotkanie zapraszamy <?php createFika(); ?>.</p>
        </div>
      </div>

    </div>
  </section> */ ?>



  <?php include( 'includes/footer.php' ); ?>



<script>
window.addEventListener('load', function() {

  function navBarSmoothScroll() {
    var sections = document.querySelectorAll('#headerWarsztatyNav a'),
        i,
        section,
        len,
        array = [],
        targetSplit,
        currentUrlSplit;

    for (i = 0, len = sections.length; i < len; i++) {
      section = sections[i];

      if (section.href.split('#')[1]) {
        array.push(section.href.split('#')[1]);
      }

    }

    function clickHandler(event) {

      if (event.target.href == undefined) {
        // not a link, so ignore
        return;
      }

      currentUrlSplit = window.location.href.split('#');
      targetSplit = event.target.href.split('#');

      // If it is not an outgoing link, then scroll
      if ( ( currentUrlSplit[0] === targetSplit[0] ) && targetSplit[1] ) {

        smoothScrollTo(targetSplit[1]);

      }
    }
    window.addEventListener('click', clickHandler, false);
  }
  navBarSmoothScroll();



  // Gumshoe
  // track sections so user knows where he is
  //
  gumshoe.init({
    activeClass: 'btn-dark-outline--active',
    selector: '#headerWarsztatyNav a',
    offset: 50
  });


  //
  // Show navbar after scrolling below hero image
  //
  function warsztatyNavBar() {
    var h = document.getElementById("headerWarsztatyNav"),
        readout = document.getElementById("warsztaty"),
        stuck = false,
        stickPoint = getDistance(),
        topDist,
        distance,
        offset,
        waiting;

    function getDistance() {
      topDist = readout.offsetTop - 10;
      return topDist;
    }

    window.addEventListener('scroll', function() {
      if (waiting) {
          return;
      }
      waiting = true;
      distance = getDistance() - window.pageYOffset;
      offset = window.pageYOffset;

      if ( (distance <= 0) && !stuck) {
        h.className = "section-white header-top header-top--shadowed header-top--fixed";
        stuck = true;
      }
      else if (stuck && (offset <= stickPoint)){
        h.className = "section-white header-top header-top--shadowed header-top--fixed header-top--hidden";
        stuck = false;
      }

      setTimeout(function () {
        waiting = false;
      }, 200);

    }, false);
  }
  warsztatyNavBar();

}, false);
</script>
</body>
</html>
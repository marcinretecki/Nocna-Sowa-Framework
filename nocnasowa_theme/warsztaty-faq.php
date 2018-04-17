<?php
/*
Template Name: Warsztaty FAQ
*/



include( 'functions/warsztaty-functions.php' );

$title = 'Pytania i odpowiedzi o Warsztatach norweskiego w Oslo';

//
//  Questions
//  [ 'slug',
//    'Question?',
//    'Answer'
//  ],
//
$questions = [

  //  O warsztatach

  [ 'czym-warsztaty-roznia-sie',
    'Czym Warsztaty różnią się od innych kursów?',
    'Na Warsztatach nie ma stołów, bo najważniajsza jest dla nas nauka komunikacji po norwesku. Ponad 75% czasu spędzisz na używaniu języka. Wytłumaczymy Ci zagadnienie, które od razu zaczniesz używać w praktyce: budować zdania, zadawać pytania i rozmawiać.</dd><dd>
    Nie ogranicza nas podręcznik, z którego musimy przerobić konkretne rozdziały. Skupiamy się na poprawnej wymowie, sposobach skutecznej nauki i pracy nad nawykiem uczenia się.'
  ],

  [ 'plan-nauki',
    'Jak wygląda przykładowy plan nauki od zera?',
    'Pierwszy kurs to <em>Zaczynam Mówić</em>. Tam opanujesz najważniejsze podstawy z gramatyki, zasady wymowy, codzienne słownictwo <span class="no-break">i metody</span> samodzielnej nauki. (4 tygodnie)
     </dd><dd>
     <em>Treningi Wymowy</em> są doskonałą kontynuacją. Tu ćwiczymy wymowę, robimy dyktanda, czytamy opowiadania i fragmenty książek. Oprócz fonetyki będziesz dalej rozwijać słownictwo. (8–12 tygodni)
     </dd><dd>
     Po takich 3 miesiącach nauki będziesz gotowy na <em>Uczę się Mówić</em>. Tu opanujesz czas przeszły, zaczniesz czytać gazety i dyskutować o nich. (4 tygodnie)
     </dd><dd>
     Jeśli spodoba Ci się czytanie gazet, możesz kontynuować ten nawyk na <em>Treningach Słownictwa</em>. Na tych spotkaniach motywujemy do regularnego czytania, rozwijamy słownictwo i uczymy się użycia go <span class="no-break">w dyskusji</span>. (8–12 tygodni)
     </dd><dd>
     Po pół roku intensywnej nauki możesz dołączyć do <em>Rozwijam</em>. Na tym kursie połowę spotkania poświęcamy na dyskusję po norwesku na wybrany przez Ciebie temat. Przez drugą połowę ćwiczymy zaawansowane zagadnienia gramatyczne, które pomogą ubarwić Twoje wypowiedzi i zrozumieć skomplikowane teksty. (4 tygodnie)
     </dd><dd>
     Na koniec zostały <em>Konwersacje</em>, na których używamy tylko języka norweskiego i nie tłumaczymy gramatyki. Spotkasz tu osoby na zaawansowanym poziomie, również po Bergenstest. (12 tygodni)
     </dd><dd>
     To jest tylko przykład. Twój plan może wyglądać inaczej.
    '
  ],

  [ 'bardziej-intensywne-kursy',
    'Czy oferujecie bardziej intensywne kursy?',
    'Czy może być coś bardziej intensywnego niż codzienna nauka? Na spotkaniach pokazujemy, jak uczyć się skutecznie i dajemy dużo dodatkowych materiałów do samodzielnej pracy. Przygotuj się na intensywny miesiąc.'
  ],

  [ 'czy-moge-poznac-opinie',
    'Czy mogę poznać opinie uczestników?',
    'Jasne! Mamy całą stronę z <a href="/nocnasowa.pl/opinie/">opiniami naszych uczniów</a>. To są prawdziwi ludzie i ich prawdziwe słowa. Po każdych Warsztatach robimy małą sesję zdjęciową na białym tle. Dlatego wszystkie zdjęcia są w tym samym stylu. Też będziesz mógł dołączyć do tej strony po zakończonym kursie.'
  ],

  [ 'ile-trwa-nauka',
    'Ile trwa nauka norweskiego?',
    'Całe życie. My jesteśmy zadowoleni, kiedy uczestnicy Warsztatów są w pełni samodzielni po pół roku nauki. Nie wiemy, ile zajmie to Tobie. Każdy jest inny i ma inne doświadczenie z językami. Naszym zdaniem ważniejszym pytaniem jest, ile radości sprawi Ci sam proces.'
  ],

  [ 'czy-musze-przygotowywac-sie',
    'Czy muszę przygotowywać się na spotkania?',
    'Warsztaty to nie tylko spotkania, ale też samodzielny, codzienny rozwój siebie. Nie musisz rezygnować z pracy, ale będziesz musiał poświęcić trochę czasu na codzienną naukę. Tylko w taki sposób wyciągniesz z Warsztatów pełną ich wartość.'
  ],

  [ 'nie-moge-byc-na-spotkaniach',
    'Nie mogę być na wszystkich spotkaniach. Czy to problem?',
    'Możemy dać Ci materiały, możesz zrobić samodzielne ćwiczenia, ale to nigdy nie zastąpi kilku godzin intensywnego używania języka. Inni uczetnicy też liczą na Twoją obecność, bo wiele ćwiczeń polega na pracy w grupie i interakcji z ludźmi.'
  ],

  [ 'czy-moge-odrobic-w-innej-grupie',
    'Czy mogę odrobić zajęcia w innej grupie?',
    'Na Warsztatach jest maksymalnie 8 uczestników. Nie 9, ani 10. Z tego powodu nie możesz przyjść na zajęcia do innej grupy.'
  ],

  [ 'gdzie-odbywaja-sie-spotkania',
    'Gdzie odbywają się spotkania?',
    'Wszystkie Warsztaty odbywają się na Majorstuen. Nasz adres to Valkyriegata 13A (wejście od strony Kirkeveien). Zaraz obok jest przystanek T-bane (wszystkie linie metra), autobusowy (20, 28, 111, 112) i tramwajowy (11, 12, 19). Przed kursem wyślemy Ci mapę i zdjęcia, żeby ułatwić Ci dojazd.'
  ],

  [ 'gdzie-moge-zaparkowac',
    'Gdzie mogę zaparkować samochód?',
    'Niestety wszystkie parkiningi na Majorstuen są płatne. Darmowe parkiningi znajdziesz dopiero na Borgen, Frøen, Steinerud, Vinderen lub Smestad.'
  ],

  [ 'certyfikat',
    'Czy otrzymam certyfikat?',
    'Tak, po zakończeniu kursu otrzymasz od nas zaświadczenie. Jest ono w języku norweskim, więc możesz śmiało pochwalić się nim przed norweskim pracodawcą.'
  ],

  [ 'co-robicie-poza-nauczaniem',
    'Co robicie poza nauczaniem?',
    'Zrezygnowaliśmy z innych zajęć i poświęciliśmy nauczaniu cały nasz czas. Pracujemy nad Nocną Sową na pełen etat.'
  ],


  //  Który kurs?

  [ 'ktory-kurs-zaczynam-ucze-sie',
    'Nie wiem, który kurs wybrać: <em>Zaczynam Mówić</em> czy <em>Uczę się Mówić</em>.',
    'Do grupy <em><em>Zaczynam Mówić</em></em> trafiają osoby, które ukończyły jeden lub dwa poziomy w innych szkołach. Są też osoby, które dopiero przyjechały do Norwegii i nie miały wcześniej styczności z językiem, ale zależy im na intensywnej nauce. Naszą główną zasadą jest <q>nie porównujemy się</q>, dlatego poziom i staż uczestników nie ma znaczenia. Ważne jest jaki Ty masz cel, czy wyciągasz wnioski i koncentrujesz się na swoim rozwoju.</dd><dd>Jeśli nie uczyłeś się nigdy poprawnej wymowy, nie jesteś pewny czasu teraźniejszego, przyszłego, lub jak budujemy pytania, to grupa <em>Zaczynam Mówić</em> będzie dla Ciebie odpowiednia.</dd><dd>Jeśli powyższe rzeczy są dla Ciebie oczywiste – uczyłeś się wymowy i znasz czas teraźniejszy – ale nie możesz przełamać się z używaniem czasu przeszłego i chciałbyś w końcu zacząć czytać norweskie gazety, wybierz grupę <em>Uczę się Mówić</em>.'
  ],

  [ 'ktory-kurs-ucze-sie-<em>Rozwijam</em>',
    'Nie wiem, który kurs wybrać: <em>Uczę się Mówić</em> czy <em>Rozwijam</em>.',
    'Stworzyliśmy grupę <em>Rozwijam</em> z myślą o osobach, które dobrze czują się z norweskimi czasami, ale chciałyby budować dłuższe zdania oraz tworzyć bogate opisy miejsc i sytuacji.</dd><dd>Jeśli nie czujesz się pewnie z czasem przeszłym lub szykiem zdania, powinieneś zacząć od <em>Uczę się Mówić</em>, bo na <em>Rozwijam</em> nie będziemy ich już tłumaczyli.</dd><dd>Jeśli dobrze czujesz się już ze wszystkimi czasami i szykiem prostym, ale nie jesteś jeszcze gotowy na Konwersacje, wybierz grupę <em>Rozwijam</em>.'
  ],

  [ 'gotowy-na-konwersacje',
    'Czy jestem gotowy na <em>Konwersacje</em>?',
    'Na <em>Konwersacjach</em> czytamy norweską prasę i dyskutujemy o wszystkich tematach, które Cię fascynują. Czy jesteś gotowy przeczytać artykuł w Aftenposten i go opowiedzieć swoimi słowami? Czy potrafisz opowiedzieć o swojej pracy i zainteresowaniach? Czy czujesz się pewnie z norweskimi czasami i szykiem zdania? Jeśli tak, <em>Konwersacje</em> będą dla Ciebie idealne.'
  ],

  [ 'poziomy-a1-a2',
    'Czy Warsztaty odpowiadają poziomom A1, A2, B1 itd?',
    'Nie wierzymy w kategoryzację i ocenianie wiedzy. Dużo ważniejsze jest Twoje własne poczucie bezpieczeństwa, pewność siebie i otwartość na nowe sytuacje. Europejskie poziomy znajomości języka niestety nie biorą tego pod uwagę. Dla nas liczy się, jak sobie radzisz w życiu, a nie na egzaminie.'
  ],

  [ 'czy-moge-zobaczyc-zajecia',
    'Czy mogę zobaczyć, jak wyglądają zajęcia?',
    'Jak poczułbyś się, gdyby ktoś przyszedł na kurs, w którym uczestniczysz i obserwował, jak sobie radzisz? Możliwe, że niektórym to nie przeszkadza, ale z szacunku do całej grupy, nie robimy otwartych zajęć. Po rozpoczęciu Warsztatów, skład grupy jest stały.'
  ],

  [ 'kontakt',
    'Jak mogę skontakować się z Wami?',
    'Jeśli masz więcej pytań, możesz napisać do nas maila na <i>&#109;&#97;&#114;&#116;&#97;&#64;&#110;&#111;&#99;&#110;&#97;&#115;&#111;&#119;&#97;&#46;&#112;&#108;</i> lub wiadomość na <a href="https://www.facebook.com/NocnaSowaPL" target="_blank">Facebooku</a>.'
  ],


  //  Zapisy

  [ 'jak-zapisac',
    'Jak mogę dołączyć do Warsztatów?',
    'Wystarczy, że wypełnisz formularz do wybranej przez Ciebie grupy. Chwilę później otrzymasz od nas maila z podtwierdzeniem zgłoszenia. Odpisz na niego i napisz krótko o sobie: dlaczego chcesz uczyć się z nami, jak wygladała Twoja wcześniejsza nauka, jakie masz zainteresowania. '
  ],

  [ 'ile-osob',
    'Ile jest osób w grupie?',
    'Nie przyjmujemy tylu osób, ile pomieści sala. Na Warsztatach nigdy nie będzie więcej niż 8 uczestników. Dodatkowo jest dwóch prowadzących. Często pracujemy w zespołach i wtedy jeden prowadzący zajmuje się 4 osobami. To idealne połączenie kursu w grupie z indywidualnym podejściem do każdego uczestnika.'
  ],

  [ 'co-mam-zrobic-gdy-nie-ma-miejsc',
    'Co mam zrobić, gdy nie ma miejsc w grupie, do której chcę dołączyć?',
    'Jeśli bardzo zależy Ci na konkretnym terminie, <a href="#kontakt" onClick="smoothScrollTo(\'kontakt\');">napisz do nas maila</a>. Dodamy Cię do listy rezerwowej. Jeśli zwolni się miejsce, od razu skontaktujemy się z Tobą.'
  ],


  //  Płatność

  [ 'jak-wyglada-platnosc',
    'Jak wygląda płatność?',
    'Po wysłaniu zgłoszenia otrzymasz fakturę z danymi do przelewu. Ponieważ chcemy być fair wobec wszystkich uczestników, płatność jest z góry, przed rozpoczęciem Warsztatów. Jeśli w ciągu 7 dni nie otrzymamy Twojej płatności, przechodzimy do kolejnej osoby z listy.'
  ],

  [ 'faktura',
    'Czy możecie wystawić fakturę na firmę?',
    'Oczywiście. Wystarczy, że zaraz po zapisaniu się, wyślesz nam numer organizacyjny firmy.'
  ],

  [ 'dodatkowe-koszty',
    'Czy trzeba dokupić książkę? Czy są dodatkowe koszty?',
    'Nie ma u nas ukrytych kosztów. Na Warsztatach otrzymasz wszystkie niezbędne materiały.'
  ],




];
?>

<!DOCTYPE html>
<html lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/QAPage">
<head>
  <title itemprop="name"><?php echo $title; ?> | Nocna Sowa</title>

  <link href="http://nocnasowa.pl/kurs-norweskiego-oslo/pytania/" rel="canonical" />

  <?php include( 'includes/header-meta.php' ); ?>

  <meta name="description" itemprop="description" content="Najczęściej zadawane pytania i odpowiedzi o Warsztatach języka norweskiego w Oslo" />
  <meta itemprop="image" content="http://nocnasowa.pl/c/i/warsztaty/kurs_norweskiego_oslo.jpg">

  <?php // Facebook og: ?>
  <meta property="og:title" content="<?php echo $title; ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="http://nocnasowa.pl/c/i/advert_oslo.jpg" />

</head>

<body>

  <?php include( 'includes/header-warsztaty-oslo.php' ); ?>

  <div class="section-beige">
    <div class="section-content section-6-4">

      <h1 class="section-h-thin centered space-x4">Najczęściej zadawane pytania</h1>

      <div class="row space-x4">

          <?php

          foreach($questions as $q) {

            //  jeśli pierwsze to otwieramy ul
            //  zapełniamy ul aż do następnego heada
            //

            if ( $q[0] === 'czym-warsztaty-roznia-sie' ) {

              echo '<h3 class="centered">O Warsztatach</h3>';

              echo '<ul class="main-column" id="faq">';

            }
            elseif ( $q[0] === 'jak-zapisac' ) {

              echo '</ul>';

              echo '<h3 class="centered">Zapisy</h3>';

              echo '<ul class="main-column" id="faq">';

            }
            elseif ( $q[0] === 'jak-wyglada-platnosc' ) {

              echo '</ul>';

              echo '<h3 class="centered">Płatność</h3>';

              echo '<ul class="main-column" id="faq">';

            }
            elseif ( $q[0] === 'ktory-kurs-zaczynam-ucze-sie' ) {

              echo '</ul>';

              echo '<h3 class="centered">Wybór kursu</h3>';

              echo '<ul class="main-column" id="faq">';

            }

            echo '<li><a href="#' . $q[0] . '" onClick="smoothScrollTo(\'' . $q[0] . '\');">' . $q[1] . '</a></li>';



          }

          echo '</ul>';

          ?>


        <hr class="hr-short" />


        <dl class="main-column">

          <?php

          foreach($questions as $q) {
            echo '<dt id="' . $q[0] . '">' . $q[1] . '</dt><dd>' . $q[2] . '</dd>';
          }

          ?>

        </dl>

    </div>

    <div class="centered space-x2">
      <p>Czy jesteś gotowy na nową przygodę?</p>
      <a class="btn btn-green btn-s-4" href="/kurs-norweskiego-oslo/#grupy">Dołącz do Warsztatów norweskiego w Oslo</a>
    </div>
  </div>


<?php include( 'includes/footer.php' ); ?>
<?php
/*
Template Name: Warsztaty Pisania FAQ
*/



include( 'functions/warsztaty-functions.php' );

$title = 'Pytania i&nbsp;odpowiedzi o Warsztatach Pisania';
?>

<!DOCTYPE html>
<html lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/QAPage">
<head>
  <title itemprop="name"><?php echo $title; ?> | Nocna Sowa</title>

  <link href="http://nocnasowa.pl/warsztaty-pisania/pytania/" rel="canonical" />

  <?php include( 'includes/header-meta.php' ); ?>

  <meta name="description" itemprop="description" content="Najczęściej zadawane pytania i&nbsp;odpowiedzi o Warsztatach Pisania z języka norweskiego" />
  <meta itemprop="image" content="http://nocnasowa.pl/c/i/wp/warsztaty_pisania.jpg">

  <?php // Facebook og: ?>
  <meta property="og:title" content="<?php echo $title; ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="http://nocnasowa.pl/c/i/wp/warsztaty_pisania.jpg" />

</head>

<body>

<?php include( 'includes/header.php' ); ?>

<article>

  <div class="section-beige">
    <div class="section-content section-6-4">

      <h1 class="section-h-thin centered">Najczęściej zadawane pytania</h1>
      <p class="intro centered space-x2">Warsztaty Pisania</p>

      <div class="row space-x4">
        <ul class="col-10 center space-x4" id="faq">

          <?php
          //
          //  Questions
          //  [ 'slug',
          //    'Question?',
          //    'Answer'
          //  ],

          $questions = [
            [ 'odpowiednie',
              'Czy Warsztaty są odpowiednie dla mnie?',
              '<p>Warsztaty Pisania to inwestycja czasu i pieniędzy. Dobrze rozumiemy, że możesz nie mieć pewności, czy to dla Ciebie.</p>
                <p>Zawsze stawiamy na pełną szczerość i otwartość. Dlatego jeśli nigdy nie miałeś styczności z norweskim, albo właśnie teraz zaczynasz naukę, to nie ukrywajmy – jest jeszcze za wcześnie, żeby zacząć pisać dziennik.</p>
                <p>Jeśli uczysz się intensywnie od kilku tygodni i znasz już budowę zdania oraz czas teraźniejszy, to musisz odpowiedzieć sobie na pytanie: Czy dasz radę przez 30 dni pisać po norwesku? Chcemy, żeby każdy uczestnik w 100% skorzystał z Warsztatów Pisania, dlatego musisz mieć pewność, czy nie jest jeszcze za wcześnie.</p>
                <p>Jeśli uczysz się już kilka miesięcy albo dłużej i czujesz, że masz dużo chęci do dalszej nauki, to Warsztaty będą dla Ciebie idealne.</p>'
            ],
            [ 'dlaczego-dziennik',
              'Dlaczego dziennik?',
              'Bo to najlepszy sposób na wyrobienie nawyku uczenia się. Uczysz się w spokojnych warunkach, w wybranej przez Ciebie godzinie i bez stresu. Pisząc po norwesku rozwijasz swój zasób słów, a to ułatwia Ci komunikację po norwesku.'
            ],
            [ 'czas',
              'Ile czasu muszę przeznaczyć na Warsztaty?',
              '<p>Warsztaty Pisania nie działają jak rozwiązanie krótkiego ćwiczenia. W niektóre dni będziesz mieć dużo do powiedzienia i pomysły same będą przelawały się do dziennika. Innego dnia będziesz potrzebować trochę więcej czasu, żeby wejść w odpowiedni nastrój, przemyśleć temat i poszukać w słowniku nowych słów. Załóż, że zajmie Ci to 30 minut dziennie.</p>'
            ],
            [ 'sprawdzanie',
              'Jak będziecie sprawdzali dzienniki?',
              '<p>Nauczamy nie od dziś i dobrze wiemy, jak ważne jest indywidualne podejście do każdej osoby. Zgodnie z tą myślą będziemy też podchodzili do Twojego dziennika.</p>
                <p>Dla osób, które niedawno zaczęły naukę norweskiego najważniejsze jest opanowanie szyku zdania i poprawnego użycia czasu teraźniejszego. Dlatego tym osobom będziemy pomagali rozwijać przede wszystkim te zagadnienia.</p>
                <p>Jeśli jesteś bardziej doświadczony, to pomożemy Ci udoskonalać trudniejsze elementy języka, np: rozróżnianie między <i>preteritum</i> a <i>perfektum</i>, poprawne użycie form określonych, albo zgodność przymiotnika z rzeczownikiem.</p>
                <p>Gdy ktoś ma problem z szykiem podrzędnym (a kto go nie ma...), to zasugerujemy, w jaki sposób go opanować i zacząć stosować w swoim dzienniku.</p>
                <p>Sprawdzanie dziennika nie sprowadza się do poprawiania literówek. Naszą misją jest pomoc w rozwoju języka norweskiego, a nie wytykanie błędów.</p>'
            ],
            [ 'tematy',
              'O czym mogę pisać w dzienniku?',
              'Jeśli dołączyłeś do kursu przygotowującego, to już pewnie wiesz, że pisać możesz o wszystkim. O swoim dniu, o pracy, o dzieciach, o marzeniach lub wspomnieniach. Możesz wymyślać historie i opowiadania, albo przygotowywać się do rozmów, które Cię czekają. Możesz pisać o wszystkim, co Cię fascynuje.'
            ],
            [ 'forum',
              'Co to jest Forum Inspiracji?',
              '<p>Jest to prywatne forum, do którego dostęp będą mieli tylko uczestnicy Warsztatów. Każdego dnia będziemy umieszczali tam nowy temat. Możesz potraktować to jako pomysł do kolejnego wpisu w prywatnym dzienniku, albo zacząć dyskusję z innymi uczestnikami.</p>
                <p>(Wpisy na forum nie zaliczają się do limitu znaków Twojego dziennika i nie będziemy ich korygować. To miejsce spontanicznej komunikacji.)</p>'
            ],
            [ 'limit',
              'Co się stanie kiedy osiągnę limit znaków?',
              '<p>Wszystkie znaki w Twoim dzienniku będą automatycznie zliczane i wyświetlane. Kiedy osiągniesz wybrany limit znaków, nie będziesz mógł dodawać kolejnych wpisów.</p>
                <p>Nie masz limitów dziennych. Możesz pisać jednego dnia więcej, innego mniej. Czasem kilka razy dziennie, albo tylko raz.</p>
                <p>Dla Twojego norweskiego będzie najlepiej, jeśli będziesz pisać każdego dnia, ale jeśli Ci się nie uda, to nic się nie stanie.</p>
                <p>(Korekta nie jest wliczana w limit znaków Twojego dziennika.)</p>'
            ],
            [ 'pare-dni',
              'Czy mogę dołączyć na parę dni, żeby zobaczyć, czy mi się uda?',
              '<p>Jeśli chcesz tylko spróbować, bo nie wiesz czy Ci się uda, albo nie jesteś w stanie zainwestować 30 dni na rozwój swojego języka, to widocznie Warsztaty nie są dla Ciebie.</p>
                <p>Można całe życie odkładać na później to, czego się naprawdę chce. Nie rozwiniesz norweskiego &ldquo;próbując&rdquo; przez kilka dni. Rozwiniesz go mówiąc, pisząc i myśląc w tym języku. Warsztaty Pisania są po to, żeby działać – tak na poważnie.</p>'
            ],
            [ 'kontakt',
              'Jak mogę skontakować się z&nbsp;Wami?',
              'Jeśli masz więcej pytań, możesz napisać do nas maila na <i>&#109;&#97;&#114;&#116;&#97;&#64;&#110;&#111;&#99;&#110;&#97;&#115;&#111;&#119;&#97;&#46;&#112;&#108;</i> lub wiadomość na <a href="https://www.facebook.com/NocnaSowaPL" target="_blank">Facebooku</a>.'
            ]
          ];

          foreach($questions as $q) {
            echo '<li><a href="#' . $q[0] . '" onClick="smoothScrollTo(\'' . $q[0] . '\');">' . $q[1] . '</a></li>';
          }

          ?>

        </ul>

        <dl class="col-10 center">

          <?php

          foreach($questions as $q) {
            echo '<h3 id="' . $q[0] . '">' . $q[1] . '</h3>';
            echo $q[2];
          }

          ?>

        </dl>

    </div>

    <div class="centered space-x2">
      <p>Czy jesteś gotowy na nową przygodę?</p>
      <a class="btn btn-green btn-s-4" href="/warsztaty-pisania/#zapisy">Dołącz do Warsztatów Pisania</a>
    </div>
  </div>

</article>

<?php include( 'includes/footer.php' ); ?>
<?php
/*
Template Name: Treningi
*/

include( 'functions/warsztaty-functions.php' );


$title = 'Treningi języka norweskiego w Oslo';

$treningi_wymowy_arr = getTreningiDates('treningi_wymowy');
$treningi_slownictwa_arr = getTreningiDates('treningi_slownictwa');

?>

<!DOCTYPE html>
<html lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/WebPage">
<head>
  <title itemprop="name"><?php echo $title; ?> | Nocna Sowa</title>

  <link href="http://nocnasowa.pl/kurs-norweskiego-oslo/treningi/" rel="canonical" />

  <?php include( 'includes/header-meta.php' ); ?>

  <meta name="description" itemprop="description" content="Cotygodniowe spotkania w zaprzyjaźnionej grupie, które utrzymają Twoją motywację do systematycznej pracy nad norweskim." />
  <meta itemprop="image" content="http://nocnasowa.pl/c/i/treningi/20151225_Oslo_GOPR9075.jpg">

  <?php // Facebook og: ?>
  <meta property="og:title" content="<?php echo $title; ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="http://nocnasowa.pl/c/i/treningi/20151225_Oslo_GOPR9075.jpg" />

</head>

<body>

<?php include( 'includes/header.php' ); ?>

<article class="treningi">

  <div class="section-trans hero hero-treningi">

    <div class="section-content section-8-6">
      <div class="row">
        <h1 class="size-6 space-0 col-10 center centered">
          <span class="space block">Treningi</span>
          <span class="h2 size-1 block">Cotygodniowe spotkania w zaprzyjaźnionej grupie, które utrzymają Twoją motywację <span class="no-break">do systematycznej</span> pracy nad norweskim.</span>
        </h1>
        <p class="centered space-0 ">Udział możliwy jest wyłącznie na zaproszenie.</p>
      </div>
    </div>

  </div>

  <section id="treningi" class="section-beige">
    <div class="section-content section-4-6">

      <?php
        //var_dump($err);
      ?>

      <h2 class="section-h-thin centered">Siłownia dla umysłu</h2>
      <p class="intro centered space-x2">Z nauką języka jest jak z treningami na siłowni.</p>

      <div class="row">

        <div class="main-column">

          <p>Wszystko możesz wypracować samodzielnie, ale regularne spotkania z osobami, które mają podobny do Ciebie cel, dają kopa do działania.</p>

          <p>Wiemy, że najtrudniej jest zacząć – dopasować harmonogram, zapisać się i przyjść na pierwsze spotkanie. Ale kiedy już się zdecydujesz, nie masz miejsca na wymówki. Tak było na Warsztatach. Podobnie będzie z Treningami.</p>

          <p>Jeśli odkładasz norweski z tygodnia na tydzień lub nie wiesz od czego zacząć po przerwie, pomożemy Ci wrócić do pozytywnych nawyków. Na Treningach nie mają znaczenia zaległości. Po prostu zaczynasz rozwój od miejsca, w którym się teraz znajdujesz.</p>

          <p>Dzięki Treningom staniesz się odważniejszy, bardziej wytrzymały <span class="no-break">i pewny</span> siebie.</p>

          <p class="intro centered">To praca nad sobą, a nie zawody.</p>


          <hr class="divider" />


          <h2 class="section-h-thin centered">Trening Wymowy</h2>
          <p class="intro centered">Popraw swoją wymowę i rozumienie ze słuchu.</p>

          <p>Wierzymy, że każdy może mówić pięknie. Nauka wymowy to nic innego jak trening mięśni twarzy i zapamiętanie kilku zasad. Poprawiając wymowę sprawisz, że Twój norweski będzie postrzegany jako dużo lepszy, a Ty poczujesz się pewniej i odważniej.</p>

          <p class="plan">Jak wygląda Trening?</p>
          <ul>
            <li>Ćwiczymy wymowę w słowach i zdaniach, tak byś mówił czysto <span class="no-break">w dialekcie</span> <i>østnorsk</i>.</li>
            <li>Ćwiczymy słuch poprzez krótkie dyktanda. Pokażemy Ci, jak odróżniać podstawowe dialekty.</li>
            <li>Ćwiczymy czytanie na głos. Czytamy opowiadania i fragmenty książek, by wyłapać błędy, o których mogłeś nie wiedzieć.</li>
          </ul>



          <h4 class="size-1">Daty najbliższych Treningów Wymowy</h4>

          <p>
            <?php echo $treningi_wymowy_arr[0]; ?>
          </p>

          <p>
            <?php echo $treningi_wymowy_arr[1]; ?>
          </p>

          <p class="size-0 space-0"><i>Treningi Wymowy są dla wszystkich uczestników naszych Warsztatów.</i></p>



          <hr class="divider" />



          <h2 class="section-h-thin centered">Trening Słownictwa</h2>
          <p class="intro centered">Rozwijaj słownictwo z dziedzin, które Cię interesują.</p>

          <p>Lubisz rozmawiać z ludźmi, ale kiedy chcesz coś powiedzieć po norwesku, to zawsze brakuje Ci jakiegoś słowa? Pora rozbudować słownictwo.</p>

          <p class="plan">Jak wygląda Trening?</p>
          <ul>
            <li>Wybieramy dziedzinę, którą chcesz rozwinąć. Może to być architektura, anatomia albo podróże – każdy temat jest dobry.</li>
            <li>Czytamy artykuły z gazet, analizujemy nowe słowa i wyrażenia, uczymy się ich użycia w dyskusji.</li>
            <li>Robimy ćwiczenia rozwijające słownictwo: mapy myśli, quizy, gry, budowanie skojarzeń i dialogów.</li>
          </ul>


          <h4 class="size-1">Daty najbliższych Treningów Słownictwa</h4>

          <p>
            <?php echo $treningi_slownictwa_arr[0]; ?>
          </p>

          <p>
            <?php echo $treningi_slownictwa_arr[1]; ?>
          </p>

          <p class="size-0 space-0"><i>Treningi Słownictwa są tylko dla osób, które ukończyły <span class="no-break">Uczę się Mówić</span> <span class="no-break">lub Rozwijam</span>.</i></p>


          <hr class="divider" />


          <h2 class="centered">Jak mogę się zapisac?</h2>

          <p>Terminy Treningów ustalamy indywidualnie. Działa to na zasadzie karnetu. Kupując  12 spotkań, możesz je wykorzystać na raz lub z przerwami, na wymowie lub słownictwie.</p>

          <div class="space centered">
            <span class="btn white btn-s-2"><span class="size-1">4 spotkania<br><i>1500 kr</i></span></span>
            <span class="btn white btn-s-2"><span class="size-1">8 spotkań<br><i>2500 kr</i></span></span>
            <span class="btn white btn-s-2"><span class="size-1">12 spotkań<br><i>3500 kr</i></span></span>
          </div>

          <p>Jeśli chcesz dołączyć, wystarczy że napiszesz do nas maila albo powiesz nam na Warsztatach. Ustalimy, w jakich terminach możesz chodzić i gotowe.</p>

        </div>
      </div>
    </section>


  <?php include( 'includes/footer.php' ); ?>

</article>


</body>
</html>
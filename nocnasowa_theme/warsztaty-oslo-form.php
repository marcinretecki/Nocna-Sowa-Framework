<?php

/*
Template Name: Warsztaty w Oslo Form
*/

// tymczasowy sposób zapisu na Warsztaty w Oslo



include( 'functions/warsztaty-functions.php' );


$query = array();
$err = array();


if ( isset( $_POST["KURS"] ) && ( '' === $_POST["CONTROL"] ) ) {
  $err = form( $_POST );
}
elseif ( ( isset( $_POST['CONTROL'] ) ) && ( '' !== $_POST['CONTROL'] ) ) {
  wp_die( __('Tamtego pola miałeś nie wypełniać.') );
}

parse_str( urldecode( $_SERVER["QUERY_STRING"] ), $query);

$kursArray = getData( $query["level"], $query["kurs"] );
if ( ( $kursArray == false ) || isset($kursArray['msg']) ) {
  header( $_SERVER["SERVER_PROTOCOL"] . " 404 Not Found" );
  header( 'Location: /kurs-norweskiego-oslo/' );
  exit;
}
$kursConstants = getConstants( $query["level"] );

$color = getColor( $kursArray['kurs'] );
$btn = getBtn( $kursArray['kurs'] );
$dates = $kursArray["dates"];
$start = mktime( 0, 0, 11, $dates[0]["m"], $dates[0]["d"], $dates[0]["y"] );
$startNice = date( "j.m", $start );
$datesEnd = end($dates);
$end = mktime(0, 0, 11, $datesEnd["m"], $datesEnd["d"], $datesEnd["y"]);
$endNice = date( "j.m.Y",  $end);

$kursUrl = "http://nocnasowa.pl/kurs-norweskiego-oslo/zapisy/?" . $_SERVER["QUERY_STRING"];

// Title
$title = $kursArray["kurs"] . ' ' . $startNice . ' – ' . $endNice . ' ' . $kursArray["days"] . ' ' . $kursArray["time"];
?>

<!DOCTYPE html>
<html lang="pl" xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/EducationEvent">
<head>
  <title itemprop="name"><?php echo $title ?> | Nocna Sowa</title>

  <link href="<?php echo $kursUrl; ?>" rel="canonical" />

  <?php include( 'includes/header-meta.php' ); ?>

  <meta name="description" itemprop="description" content="<?php echo $title; ?> – <?php echo $kursConstants['desc']; ?>" />
  <meta itemprop="image" content="http://nocnasowa.pl/c/i/warsztaty/kurs_norweskiego_oslo.jpg" />

  <?php // Facebook og: ?>
  <meta property="og:title" content="<?php echo $title ?>" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="http://nocnasowa.pl/c/i/advert_oslo.jpg" />
</head>

<body>

<?php include( 'includes/header-minimal.php' ); ?>


  <div class="section-dark">
    <div class="section-content section-6-4">

      <h1 class="section-h-thin centered"><?php echo $kursArray['kurs']; ?></h1>
      <p class="centered space-half"><?php echo $kursConstants['desc']; ?></p>
      <p class="no-margin centered space-x2 size-0" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
        <span itemprop="price"><?php echo $kursArray['price']; ?></span> kr | <?php echo $kursArray['hoursNo']; ?> | <?php echo $kursConstants['ppl']; ?>
        <meta itemprop="priceCurrency" content="NOK" />
        <?php if ($kursArray['soldOut'] ) { ?>
          <link itemprop="availability" href="http://schema.org/OutOfStock" />
        <?php } else { ?>
          <link itemprop="availability" href="http://schema.org/InStock" />
          <meta itemprop="url" content="<?php echo $kursUrl; ?>" />
        <?php } ?>
      </p>

      <div itemprop="location" itemscope itemtype="http://schema.org/Place">
        <meta itemprop="name" content="Nocna Sowa" />
        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
          <meta itemprop="streetAddress" content="Valkyriegata 13A" />
          <meta itemprop="postalCode" content="0366" />
          <meta itemprop="addressLocality" content="Oslo" />
          <meta itemprop="addressCountry" content="Norwegia" />
        </div>
      </div>

      <meta itemprop="startDate" content="<?php echo $kursArray['mDate']; ?>" />
      <meta itemprop="duration" content="<?php echo $kursArray['duration']; ?>" />
      <meta itemprop="url" content="<?php echo $kursUrl; ?>" />

      <div class="warsztaty-calendar space-x4 center">
        <span class="warsztaty-calendar-line">
          <?php createCalendar($kursArray); ?>
        </span>
      </div>

      <?php
      if ( !empty($err) ) {
        echo '<p class="err centered">Obs! Chyba nie wypełniłeś wszystkich danych.</p>';
      }
      ?>
      <?php
      function checkPost() {
        global $_POST;
        echo '<pre>';
        echo 'POST: ';
        print_r($_POST);
        echo 'ERR: ';
        print_r($err);
        echo '</pre>';
      }
      //checkPost();
      ?>

      <form action="" method="post" id="<?php echo $query["kurs"]; ?>" name="warsztaty-oslo-form" class="warsztaty-oslo-form main-column white pad-x2 rounded top-<?php echo $color; ?>" style="color:#000;" autocomplete="on">

        <?php if ($kursArray['soldOut'] ) { ?>

          <p class="space centered">Na te Warsztaty nie mamy już miejsc.</p>
          <p class="space centered"><a href="/kurs-norweskiego-oslo/#grupy">Wybierz inny termin &rarr;</a></p>

        <?php } else { ?>

          <h2 class="size-2 centered space-half">Dane kontaktowe</h2>

          <div class="hidden-input">
            <input type="hidden" name="KURS" value="<?php echo $kursArray['kurs']; ?>" />
            <input type="hidden" name="DATY" value="<?php echo $startNice . ' – ' . $endNice; ?>" />
            <input type="hidden" name="MDATE" value="<?php echo $kursArray['mDate']; ?>" />
            <input type="hidden" name="DNI" value="<?php echo $kursArray['days']; ?>" />
            <input type="hidden" name="GODZINA" value="<?php echo $kursArray['time']; ?>" />
            <label for="CONTROL">Jeśli nie jesteś robotem, nie wypełniaj tego pola:</label>
            <input type="text" name="CONTROL" value="" />
          </div>

          <div class="warsztaty-oslo-form-section">
            <div class="row">
              <div class="main-column max-24">
                <p class="size-0 space centered"><i>Miło Cię poznać!</i></p>

                <?php if ( in_array( 'FNAME', $err ) ) { echo '<p class="err">Podaj proszę swoje imię.</p>'; } ?>
                <label for="FNAME<?php echo $query["kurs"]; ?>">Twoje imię</label>
                <input type="text" value="<?php if ( !empty($_POST['FNAME']) ) { echo $_POST['FNAME']; } ?>" name="FNAME" id="FNAME<?php echo $query["kurs"]; ?>" required="" autofocus="" />

                <?php if ( in_array( 'LNAME', $err ) ) { echo '<p class="err">Napisz proszę swoje nazwisko.</p>'; } ?>
                <label for="LNAME<?php echo $query["kurs"]; ?>">Nazwisko</label>
                <input type="text" value="<?php if ( !empty($_POST['LNAME']) ) { echo $_POST['LNAME']; } ?>" name="LNAME" id="LNAME<?php echo $query["kurs"]; ?>" required="" />

                <?php if ( in_array( 'EMAIL', $err ) ) { echo '<p class="err">Potrzebujemy Twój adres email, żeby wysłać potwierdzenie i rachunek.</p>'; } ?>
                <label for="EMAIL<?php echo $query["kurs"]; ?>">Adres email</label>
                <input type="email" value="<?php if ( !empty($_POST['EMAIL']) ) { echo $_POST['EMAIL']; } ?>" name="EMAIL" id="EMAIL<?php echo $query["kurs"]; ?>" required="" />

                <?php if ( in_array( 'TEL', $err ) ) { echo '<p class="err">Numeru telefonu użyjemy tylko, jeśli będziemy musieli się z Tobą pilnie skontaktować.</p>'; } ?>
                <label for="TEL<?php echo $query["kurs"]; ?>">Numer telefonu</label>
                <input type="tel" class="no-margin" name="TEL" value="<?php if ( !empty($_POST['TEL']) ) { echo $_POST['TEL']; } ?>" id="TEL<?php echo $query["kurs"]; ?>" required="" />
              </div>
            </div>
          </div>


          <h2 class="size-2 centered space-half">Dane do rachunku</h2>


          <div class="warsztaty-oslo-form-section">
            <div class="row">
              <div class="main-column max-24 space">

                <p class="size-0 space centered"><i>Twoje dane są bezpieczne. Nikomu ich <span class="no-break">nie udostępnimy</span> bez Twojej zgody. <span class="no-break">Sprawdź naszą</span> <a href="/polityka-prywatnosci-cookies/" target="_blank">Politykę Prywatności</a>.</i></p>


                <?php if ( in_array( 'ULICA', $err ) ) { echo '<p class="err">Niestety, bez adresu nie możemy wystawić rachunku.</p>'; } ?>
                <label for="ULICA<?php echo $query["kurs"]; ?>">Ulica i numer</label>
                <input type="text" value="<?php if ( !empty($_POST['ULICA']) ) { echo $_POST['ULICA']; } ?>" maxlength="70" name="ULICA" id="ULICA<?php echo $query["kurs"]; ?>" required="" />

                <?php if ( in_array( 'KOD', $err ) ) { echo '<p class="err">Uzupełnij proszę kod pocztowy.</p>'; } ?>
                <?php if ( in_array( 'MIASTO', $err ) ) { echo '<p class="err">Bez nazwy miasta nie możemy wystawić rachunku.</p>'; } ?>
                <div class="row">
                  <div class="col-6">
                    <label for="KOD<?php echo $query["kurs"]; ?>">Kod pocztowy</label>
                    <input type="text" value="<?php if ( !empty($_POST['KOD']) ) { echo $_POST['KOD']; } ?>" maxlength="10" name="KOD" id="KOD<?php echo $query["kurs"]; ?>" required="" />
                  </div>
                  <div class="col-10">
                    <label for="MIASTO<?php echo $query["kurs"]; ?>">Miasto</label>
                    <input type="text" value="<?php if ( !empty($_POST['MIASTO']) ) { echo $_POST['MIASTO']; } ?>" maxlength="40" name="MIASTO" id="MIASTO<?php echo $query["kurs"]; ?>" required="" />
                  </div>
                </div>

                <?php if ( in_array( 'PANSTWO', $err ) ) { echo '<p class="err">W jakim państwie mieszkasz?</p>'; } ?>
                <label for="PANSTWO<?php echo $query["kurs"]; ?>">Państwo</label>
                <input type="text" value="<?php if ( !empty($_POST['PANSTWO']) ) { echo $_POST['FNAME']; } else {echo 'Norge'; } ?>" name="PANSTWO" id="PANSTWO<?php echo $query["kurs"]; ?>" />
              </div>
            </div>

            <button type="submit" name="subscribe" value="true" id="mc-embedded-subscribe<?php echo $query["kurs"]; ?>" class="btn <?php echo $btn; ?> btn-s-4 center" onClick="ga('send', 'event', 'Submit', 'Dołączam do tej grupy (<?php echo $kursArray["kurs"]; ?>)', '<?php echo $query["kurs"]; ?>');" data-target="spinner">Dołączam do tej grupy<span class="raquo"></span></button>
            <p class="size-0 centered"><i>To Twój najważniejszy krok.</i></p>

          </div>

        <?php } ?>

      </form>

      <p class="centered space-x2">Czy masz pytania? <a class="a-light" href="/kurs-norweskiego-oslo/pytania/" title="Najczęściej zadawane pytania" data-ga-action="Najczęściej zadawane pytania (pod formularzem)">Zerknij tu &rarr;</a></p>

    </div>
  </div>

  <?php include( 'includes/footer.php' ); ?>



<script>
function btnHandler(event) {
  var eventTarget = event.target,
      dataTarget = eventTarget.getAttribute('data-target');

  console.log(event);

  if (dataTarget) {
    spin(eventTarget);
  }
  else if (eventTarget.className === 'raquo') {
    spin(eventTarget.parentNode);
  }
}
function spin(target) {
  var spans = target.getElementsByClassName('raquo');

  if (spans) {
    spans[0].innerHTML = '<div></div><div></div><div></div>';
    spans[0].className = 'ball-pulse-sync';
  }
}
document.addEventListener("click", btnHandler, false);
</script>

</body>
</html>
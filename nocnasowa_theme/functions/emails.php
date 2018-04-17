<?php

//
// DATA Scheme
//
//

function getStamp() {
  $time = ' (K-' . time() . ')';
  return $time;
}

function emailWarsztatyOslo( $data ) {
  $name = 'Marta';
  $email = 'marta@nocnasowa.pl';
  $subject = $data['FNAME'] . ' ' . $data['LNAME'] . ' zapisał się na ' . $data['KURS'] . getStamp();

  $content = $data['FNAME'] . ' ' . $data['LNAME'] . ' zapisał się na ' . $data['KURS'] . '<br /><br />';
  $content .= '<table style="font-size:16px;">';
    $content .= '<tr><td>Grupa</td><td>' . $data['KURS'] . '</td></tr>';
    $content .= '<tr><td>Daty</td><td>' . $data['DATY'] . '</td></tr>';
    $content .= '<tr><td>Dni</td><td>' . $data['DNI'] . '</td></tr>';
    $content .= '<tr><td>Godzina</td><td>' . $data['GODZINA'] . '</td></tr>';
    $content .= '<tr><td>Imię</td><td>' . $data['FNAME'] . '</td></tr>';
    $content .= '<tr><td>Nazwisko</td><td>' . $data['LNAME'] . '</td></tr>';
    $content .= '<tr><td>Email</td><td>' . $data['EMAIL'] . '</td></tr>';
    $content .= '<tr><td>Telefon</td><td>' . $data['TEL'] . '</td></tr>';
    $content .= '<tr><td>Ulica</td><td>' . $data['ULICA'] . '</td></tr>';
    $content .= '<tr><td>Kod pocztowy</td><td>' . $data['KOD'] . '</td></tr>';
    $content .= '<tr><td>Miasto</td><td>' . $data['MIASTO'] . '</td></tr>';
    $content .= '<tr><td>Państwo</td><td>' . $data['PANSTWO'] . '</td></tr>';
  $content .= '</table>';

  sendEmailMandrill( $name, $content, $email, $subject );
}

function emailTreningi( $data ) {
  $name = 'Marta';
  $email = 'marta@nocnasowa.pl';
  $subject = $data['EMAIL'] . ' zapisał się na ' . $data['KURS'] . getStamp();

  $content = $data['KURS'];
  $content .= '<table style="font-size:16px;">';
    $content .= '<tr><td>Start</td><td>' . $data['START'] . '</td></tr>';
    $content .= '<tr><td>Ile</td><td>' . $data['DURATION'] . '</td></tr>';
    $content .= '<tr><td>Email</td><td>' . $data['EMAIL'] . '</td></tr>';
  $content .= '</table>';

  sendEmailMandrill( $name, $content, $email, $subject );
}


function emailPotwierdzenie( $data ) {
  $name = $data['FNAME'] . ' ' . $data['LNAME'];
  $email = $data['EMAIL'];
  $subject = 'Witamy na Warsztatach' . getStamp();

  $content .= 'Hei ' . $data['FNAME'] . ',<br />';
  $content .= 'otrzymaliśmy Twoje zgłoszenie na <i>' . $data['KURS'] . '</i>.<br /><br />';
  $content .= 'Kurs odbędzie się w dniach ' . $data['DATY'] . ' ' . $data['GODZINA']  . '.<br /><br />';
  $content .= 'Jeśli dostaniesz się do tej grupy, w ciągu trzech dni otrzymasz rachunek wraz z danymi do przelewu.<br /><br />';
  $content .= 'W międzyczasie chcielibyśmy poznać Cię bliżej. Będzie nam miło, jeśli odpowiesz na tego maila i napiszesz, dlaczego chcesz wziąć udział w&nbsp;Warsztatach, a&nbsp;nie w tradycyjnym kursie.<br /><br />';
  $content .= 'Do usłyszenia,<br />Marta i Marcin<br /><br />';
  $content .= 'PS: Jeśli chcesz dowiedzieć się o nas więcej, <a href="http://nocnasowa.pl/o-nas/">zerknij tu</a>.';
  $content .= ' <div itemscope itemtype="http://schema.org/EventReservation" style="display:none;" class="metaDiv">
                  <meta itemprop="reservationNumber" content="' . getStamp() . '"/>
                  <link itemprop="reservationStatus" href="http://schema.org/Confirmed"/>
                  <div itemprop="underName" itemscope itemtype="http://schema.org/Person">
                    <meta itemprop="name" content="' . $name . '"/>
                  </div>
                  <div itemprop="reservationFor" itemscope itemtype="http://schema.org/Event">
                    <meta itemprop="name" content="' . $data['KURS'] . '"/>
                    <meta itemprop="startDate" content="' . $data['MDATE'] . '"/>
                    <div itemprop="location" itemscope itemtype="http://schema.org/Place">
                      <meta itemprop="name" content="Nocna Sowa"/>
                      <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                        <meta itemprop="streetAddress" content="Valkyriegata 13A"/>
                        <meta itemprop="addressLocality" content="Oslo"/>
                        <meta itemprop="addressRegion" content="Oslo"/>
                        <meta itemprop="postalCode" content="0366"/>
                        <meta itemprop="addressCountry" content="NO"/>
                      </div>
                    </div>
                  </div>
                </div>';

  sendEmailMandrill( $name, $content, $email, $subject );
}



require_once( '/c/w/themes/nocnasowa_theme/mandrill-api-php/src/Mandrill.php' );

function sendEmailMandrill( $name, $content, $email, $subject ) {

  try {
      $mandrill = new Mandrill('fb6f80ad-5aa1-4ab4-987c-dcf343c13f77');
      $template_name = 'zapisy-na-warsztaty';
      $template_content = array(
          array(
              'name' => 'std_content00',
              'content' => $content
          )
      );
      $message = array(
          'subject' => $subject,
          'from_email' => 'marta@nocnasowa.pl',
          'from_name' => 'Marta @NocnaSowa.pl',
          'to' => array(
              array(
                  'email' => $email,
                  'name' => $name,
                  'type' => 'to'
              )
          ),
          'headers' => array('Reply-To' => 'marta@nocnasowa.pl'),
          'important' => true,
          'track_opens' => true,
          'track_clicks' => true,
          'auto_text' => true,
          'auto_html' => false,
          'inline_css' => true,
          'url_strip_qs' => true,
          'preserve_recipients' => true
      );
      $async = false;
      $ip_pool = 'Main Pool';
      $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool, $send_at);
  } catch(Mandrill_Error $e) {
      echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
      // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
      throw $e;
  }
}
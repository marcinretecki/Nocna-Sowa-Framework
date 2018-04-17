<?php
include('emails.php');


function getData( $level, $kurs = false ) {
  $datyKursow = [

    "fika" => [
                    "meeting"     => 'w piątek, <span class="no-break">30 września</span> od 17:00'
    ],


    "treningi_slownictwa" => [
      "time" => "od 19:30 do 21:00",
      "days" => "soboty",
      "dates" => [
        "7.04",
        "14.04",
        "21.04",
        "28.04",
      ]

    ],


    "treningi_wymowy" => [
      "time" => "od 18:00 do 19:30.<br /> W kwietniu wyjątkowo spotykamy się w poniedzałki na 17:30",
      "days" => "środy",
      "dates" => [
        "9.04",
        "16.04",
        "23.04",
        "30.04",
      ]

    ],




    "zaczynam" => [

                    "2018-04-07T11:00" => [
                      "mDate"     => "2018-04-07T11:00",
                      "kurs"      => "Zaczynam Mówić",
                      "dates"     => [
                                        ["d" =>  7, "m" =>  4, "y" => 2018],
                                        ["d" =>  8, "m" =>  4, "y" => 2018],
                                        ["d" => 14, "m" =>  4, "y" => 2018],
                                        ["d" => 15, "m" =>  4, "y" => 2018],
                                        ["d" => 21, "m" =>  4, "y" => 2018],
                                        ["d" => 22, "m" =>  4, "y" => 2018],
                                        ["d" => 28, "m" =>  4, "y" => 2018],
                                        ["d" => 29, "m" =>  4, "y" => 2018]
                                      ],
                      "days"      => "w soboty i niedziele",
                      "time"      => "od 11:00 do 14:15",
                      "duration"  => "P1M",
                      "hoursNo"   => "32 godziny lekcyjne",
                      "price"     => "4500",
                      "soldOut"   => false,
                    ],

                    "2018-04-10T17:30" => [
                      "mDate"     => "2018-04-10T17:30",
                      "kurs"      => "Zaczynam Mówić",
                      "dates"     => [
                                        ["d" => 10, "m" =>  4, "y" => 2018],
                                        ["d" => 11, "m" =>  4, "y" => 2018],
                                        ["d" => 12, "m" =>  4, "y" => 2018],
                                        ["d" => 17, "m" =>  4, "y" => 2018],
                                        ["d" => 18, "m" =>  4, "y" => 2018],
                                        ["d" => 19, "m" =>  4, "y" => 2018],
                                        ["d" => 24, "m" =>  4, "y" => 2018],
                                        ["d" => 25, "m" =>  4, "y" => 2018]
                                      ],
                      "days"      => "we wtorki, środy i czwartki",
                      "time"      => "od 17:30 do 20:45",
                      "duration"  => "P1M",
                      "hoursNo"   => "32 godziny lekcyjne",
                      "price"     => "4500",
                      "soldOut"   => true,
                    ],

                    "2018-06-02T11:00" => [
                      "mDate"     => "2018-06-02T11:00",
                      "kurs"      => "Zaczynam Mówić",
                      "dates"     => [
                                        ["d" =>  2, "m" =>  6, "y" => 2018],
                                        ["d" =>  3, "m" =>  6, "y" => 2018],
                                        ["d" =>  9, "m" =>  6, "y" => 2018],
                                        ["d" => 10, "m" =>  6, "y" => 2018],
                                        ["d" => 16, "m" =>  6, "y" => 2018],
                                        ["d" => 17, "m" =>  6, "y" => 2018],
                                        ["d" => 23, "m" =>  6, "y" => 2018],
                                        ["d" => 24, "m" =>  6, "y" => 2018]
                                      ],
                      "days"      => "w soboty i niedziele",
                      "time"      => "od 11:00 do 14:15",
                      "duration"  => "P1M",
                      "hoursNo"   => "32 godziny lekcyjne",
                      "price"     => "4500",
                      "soldOut"   => false,
                    ],


    ],    // end Zaczynam


    "uczeSie" => [

                    "2018-04-07T16:00" => [
                      "mDate"     => "2018-04-07T16:00",
                      "kurs"      => "Uczę się Mówić",
                      "dates"     => [
                                        ["d" =>  7, "m" =>  4, "y" => 2018],
                                        ["d" =>  8, "m" =>  4, "y" => 2018],
                                        ["d" => 14, "m" =>  4, "y" => 2018],
                                        ["d" => 15, "m" =>  4, "y" => 2018],
                                        ["d" => 21, "m" =>  4, "y" => 2018],
                                        ["d" => 22, "m" =>  4, "y" => 2018],
                                        ["d" => 28, "m" =>  4, "y" => 2018],
                                        ["d" => 29, "m" =>  4, "y" => 2018]
                                      ],
                      "days"      => "w soboty i niedziele",
                      "time"      => "od 16:00 do 19:15",
                      "duration"  => "P1M",
                      "hoursNo"   => "32 godziny lekcyjne",
                      "price"     => "4500",
                      "soldOut"   => false,
                    ],

                    "2018-06-05T17:30" => [
                      "mDate"     => "2018-06-05T17:30",
                      "kurs"      => "Uczę się Mówić",
                      "dates"     => [
                                        ["d" =>  5, "m" =>  6, "y" => 2018],
                                        ["d" =>  7, "m" =>  6, "y" => 2018],
                                        ["d" => 12, "m" =>  6, "y" => 2018],
                                        ["d" => 14, "m" =>  6, "y" => 2018],
                                        ["d" => 19, "m" =>  6, "y" => 2018],
                                        ["d" => 21, "m" =>  6, "y" => 2018],
                                        ["d" => 26, "m" =>  6, "y" => 2018],
                                        ["d" => 28, "m" =>  6, "y" => 2018]
                                      ],
                      "days"      => "we wtorki i czwartki",
                      "time"      => "od 17:30 do 20:45",
                      "duration"  => "P1M",
                      "hoursNo"   => "32 godziny lekcyjne",
                      "price"     => "4500",
                      "soldOut"   => false,
                    ],

    ],    // end Uczę się


    "rozwijam" => [

                    "2018-06-02T16:00" => [
                      "mDate"     => "2018-06-02T16:00",
                      "kurs"      => "Rozwijam",
                      "dates"     => [
                                        ["d" =>  2, "m" =>  6, "y" => 2018],
                                        ["d" =>  3, "m" =>  6, "y" => 2018],
                                        ["d" =>  9, "m" =>  6, "y" => 2018],
                                        ["d" => 10, "m" =>  6, "y" => 2018],
                                        ["d" => 16, "m" =>  6, "y" => 2018],
                                        ["d" => 17, "m" =>  6, "y" => 2018],
                                        ["d" => 23, "m" =>  6, "y" => 2018],
                                        ["d" => 24, "m" =>  6, "y" => 2018]
                                      ],
                      "days"      => "w soboty i niedziele",
                      "time"      => "od 16:00 do 19:15",
                      "duration"  => "P1M",
                      "hoursNo"   => "32 godziny lekcyjne",
                      "price"     => "4500",
                      "soldOut"   => false,
                    ],

    ],    // end Rozwijam


    "konwersacje" => [

                    "2018-06-04T19:00" => [
                      "mDate"     => "2018-06-04T19:00",
                      "kurs"      => "Konwersacje",
                      "dates"     => [
                                        ["d" =>  4, "m" =>  6, "y" => 2018],
                                        ["d" => 11, "m" =>  6, "y" => 2018],
                                        ["d" => 18, "m" =>  6, "y" => 2018],
                                        ["d" => 25, "m" =>  6, "y" => 2018]
                                      ],
                      "days"      => "w poniedziałki",
                      "time"      => "od 19:00 do 20:30",
                      "duration"  => "P1M",
                      "hoursNo"   => "8 godzin lekcyjnych",
                      "price"     => "1500",
                      "soldOut"   => false,
                    ],

    ]    // end Konwersacje

  ];

  if ( empty( $datyKursow[$level] ) ) {
    return false;
  }
  elseif ( $kurs && $datyKursow[$level][$kurs] ) {
    return $datyKursow[$level][$kurs];
  }
  elseif ( $kurs && !array_key_exists($kurs, $datyKursow[$level]) ) {
    return false;
  }
  else {
    return $datyKursow[$level];
  }

}

function getConstants( $level ) {
  if ( $level === 'zaczynam' ) {
    $array = [
      "desc" => "Aktywny kurs norweskiego od zera.",
      "ppl" => "4–8 osób w grupie"
    ];
  } elseif ( $level === 'uczeSie' ) {
    $array = [
      "desc" => "Zacznij używać czasów przeszłych na co dzień.",
      "ppl" => "4–8 osób w grupie"
    ];
  } elseif ( $level === 'rozwijam' ) {
    $array = [
      "desc" => "Ostatni krok przed Konwersacjami.",
      "ppl" => "4–8 osób w grupie"
    ];
  } elseif ( $level === 'konwersacje' ) {
    $array = [
      "desc" => "By płynnie rozmawiać po norwesku.",
      "ppl" => "3–6 osób w grupie"
    ];
  }

  return $array;
}

function createButtons( $level ) {

  if ( getData($level) ) {
    echo '<ul class="warsztaty-list">';

    foreach ( getData($level) as $kurs => $kursArray ) {
      createButton($kurs, $kursArray, $level);
    }

    echo '</ul>';
  }
  else {
    echo '<p class="center centered"><em>W tej chwili nie mamy zaplanowanych terminów na te Warsztaty.</em></p>';
  }

}

function createCalendar( $kursArray ) {
  $dates = $kursArray["dates"];
  $seconds = 86400;
  $start = mktime( 11, 0, 0, $dates[0]["m"], $dates[0]["d"], $dates[0]["y"] );
  $datesEnd = end($dates);
  $end = mktime( 11, 0, 0, $datesEnd["m"], $datesEnd["d"], $datesEnd["y"] );
  $allDays = ($end - $start) / $seconds;
  $months = [ '', 'Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień' ];

  $color = getColor( $kursArray['kurs'] );

  for ( $x = 0, $y = 0; $x <= $allDays; $x++ ) {
    $day = date( "j", $start + ( $seconds * $x ) );
    $kursDay = date( "j", mktime( 11, 0, 0, $dates[$y]["m"], $dates[$y]["d"], $dates[$y]["y"] ) );
    $month = $months[ date( "n", mktime( 11, 0, 0, $dates[$y]["m"], $dates[$y]["d"], $dates[$y]["y"] ) ) ];

    if ( ( $x === 0 ) || ( $day === '1' ) ) {
      echo '<span class="warsztaty-calendar-month">' . $month . '</span>';
    }

    if ( $day === $kursDay ) {
      $span = '<span class="warsztaty-calendar-day warsztaty-calendar-day-active warsztaty-calendar-day-' . $color . '">';
      $y++;
    }
    else {
      $span = '<span class="warsztaty-calendar-day">';
    }

    echo $span . $day . '</span> ';
  }
}

function createButton( $kurs, $kursArray, $level ) {

  if ( isset($kursArray['msg']) ) {
    echo '<li class="inactive">' . $kursArray['msg'] . '</li>';
    return;
  }

  $dates = $kursArray["dates"];
  $today = time();
  $start = mktime( 11, 0, 0, $dates[0]["m"], $dates[0]["d"], $dates[0]["y"] );
  $startNice = date( "j.m", $start );
  $datesEnd = end($dates);
  $end = mktime( 11, 0, 0, $datesEnd["m"], $datesEnd["d"], $datesEnd["y"] );
  $endNice = date( "j.m.Y",  $end );

  if ( ( $end - $today ) < 0 ) {
    $li = '<li class="inactive">';
    $button = '<span class="btn btn-beige btn-warsztaty-list">Warsztaty zakończone</span>';
  }
  elseif ( ( $start - $today ) < 0 ) {
    $li = '<li class="inactive">';
    $button = '<span class="btn btn-beige btn-warsztaty-list">Warsztaty już trwają</span>';
  }
  elseif ( $kursArray["soldOut"] === true ) {
    $li = '<li class="inactive">';
    $button = '<span class="btn btn-beige btn-warsztaty-list">Nie ma miejsc</span>';
  }
  else {
    $li = '<li>';

    $btn = getBtn( $kursArray["kurs"] );

    $url = 'level=' . $level . '&kurs=' . $kurs;

    $button = '<a data-ga-action="Dołączam (' . $kursArray["kurs"] . ' ' . $kurs . ')" class="btn ' . $btn . ' btn-warsztaty-list btn-s-2" href="zapisy/?' . urlencode($url) . '" data-target="spinner">Dołączam <span class="raquo">&raquo;</span></a>';
  }

  echo $li;
    echo '<h3 class="h1 size-3">' . $startNice . ' – ' . $endNice . '</h3>';
    echo '<p>Ta grupa spotyka się ' . $kursArray["days"] . ' ' . $kursArray["time"] . '.</p>';
    echo $button;
  echo '</li>';

}


function createFika() {
  $fika = getData('fika');
  echo $fika['meeting'];
}


function getColor( $kurs ) {
  if ( $kurs === 'Rozwijam') { $color = 'red'; }
  elseif ( $kurs === 'Konwersacje') { $color = 'red'; }
  elseif ( $kurs === 'Uczę się Mówić') { $color = 'orange'; }
  else { $color = 'green'; }

  return $color;
}

function getBtn( $kurs ) {
  if ( $kurs === "Uczę się Mówić" ) { $btn = "btn-orange"; }
  elseif ( $kurs === "Rozwijam" ) { $btn = "btn-red"; }
  elseif ( $kurs === "Konwersacje" ) { $btn = "btn-red"; }
  else { $btn = "btn-green"; }
  return $btn;
}




function form( $post ) {
  $err = array();

  foreach ( $post as $input => $value ) {
    if ( $input === 'EMAIL' ) {
      if ( !filter_var( htmlentities( $_POST["EMAIL"], ENT_QUOTES, 'UTF-8' ), FILTER_VALIDATE_EMAIL ) ) {
        $err[] = $input;
      }
    }
    elseif ( ( $input != 'CONTROL' ) && ( $value == '' ) ) {
      $err[] = $input;
    }
  }

  if ( empty($err) ) {
    sendEmail( $post );
    success();
  }
  return $err;
}



function sendEmail( $post, $kurs = 'warsztaty' ) {
  $data = array();

  foreach ( $post as $input => $value ) {
    $data[$input] = htmlentities($value, ENT_QUOTES, 'UTF-8');
  }

  if ( 'warsztaty' == $kurs ) {
    emailWarsztatyOslo( $data );
    emailPotwierdzenie( $data );
  }

}


function success() {
  // redirect
  header( $_SERVER["SERVER_PROTOCOL"] . " 303 See Other" );
  header( "Location: /kurs-norweskiego-oslo/dziekujemy-za-zgloszenie/" );
}



function getTreningiDates( $trening ) {


  $treningi_data = getData($trening);


  if ( !$treningi_data ) {
    return false;

  }

  $time = $treningi_data["time"];
  $days = $treningi_data["days"];
  $dates = $treningi_data["dates"];

  $echo_dates = '';


  foreach ( $dates as $i => $date ) {


    $echo_dates .= '<span class="mark white">';
    $echo_dates .= $date;
    $echo_dates .= '</span> ';


  }

  $echo_weekday = 'Spotykamy się w ' . $days . ' ' . $time . '.';


  return [ $echo_dates, $echo_weekday ];

}


<?php
//
//  Includes - Display Char in Profile
//

function las_profile_show_data_table( $user_progress ) {

  $new_data_array = [
    [
      'ico',
      'Ile przykładów',
      $user_progress['totals']['ex']
    ],
    [
      'ico',
      'Ile błędów',
      $user_progress['totals']['wrong']
    ],
    [
      'ico',
      'Ile powtórek nagrań',
      $user_progress['totals']['repeat']
    ],
    [
      'ico',
      'Ile wyświetleń tłumaczeń',
      $user_progress['totals']['trans']
    ],
    [
      'ico',
      'Ile wysłuchań more',
      $user_progress['totals']['more']
    ],
    [
      'ico',
      'Ile dni',
      count( $user_progress['totals']['dates'] )
    ],
    [
      'ico',
      'Ile czasu w sumie na ćwiczeniach',
      las_format_t( $user_progress['totals']['t'] )
    ],
    [
      'ico',
      'Ile wejść na przewodniki',
      $user_progress['totals']['przewodnik']
    ],
    [
      'ico',
      'Ile wejść na wyzwania',
      $user_progress['totals']['wyzwanie']
    ],
    [
      'ico',
      'Ile wejść na inne strony',
      $user_progress['totals']['page']
    ],
    [
      'ico',
      'Ile wyzwań',
      ( count($user_progress) - 2 )
    ]
  ];

  $echo = '<table class="profile-table">';

  foreach ( $new_data_array as $value ) {

    $echo .= '<tr>';

      $echo .= '<th>';
        $echo .= '<i class="profile-table__icon profile-table__icon--' . $value[0] . '"></i>';
        $echo .= $value[1];
      $echo .= '</th>';

      $echo .= '<td class="profile-table__no">';
        $echo .= $value[2];
      $echo .= '</td>';

    $echo .= '</tr>';

  }

  $echo .= '</table>';

  echo $echo;

}





function las_profile_show_last_dates( $user_progress ) {

  $dates = $user_progress[ 'totals' ][ 'dates' ];

  $echo = '';

  $class = '';

  //  get previous 7 days
  for ( $i = 6; $i >= 0; $i-- ) {

    $date = date( 'Y-m-d', strtotime( $i . ' days ago' ) );
    $day = date( 'j', strtotime( $i . ' days ago' ) );

    //  date is in array
    if ( in_array( $date, $dates ) ) {
      $class = 'section-green';
    }
    else {
      $class = 'section-orange';
    }

    $echo .= '<span class="' . $class . '" style="display: inline-block; border-radius: 50%; width:2rem; line-height: 2rem; margin: 0.5rem; text-align:center;">';
    $echo .= $day;
    $echo .= '</span>';

  }

  echo $echo;

}
?>

<section class="section-trans group profile-back wrapper preload--hidden" style="background-image: url('<?php echo las_get_user_profile_back( $user_char ); ?>');">

      <div class="profile-header centered">

        <img class="profile-header__img" src="<?php echo las_get_user_profile_img( $user_char ); ?>" />

        <h1 class="h1 space-half"><?php echo las_get_user_char_name_nick( $user_char ); ?></h1>

        <p class="space-0"><i><?php echo las_get_user_char_type( $user_char ); ?></i></p>

      </div>

      <div class="profile-section">
        <div class="profile-section__data">

          <div class="pad-2">
            <div class="row space centered">
              <div class="col-8">
                <div id="profile-level" class="profile-level section-green space">
                  <div class="profile-level__line" style="width:<?php echo las_get_level_percent( $user_exp, $level_array ); ?>"></div>
                  <span class="relative"><?php echo 'Rang ' . $level_array[0]; ?></span>
                </div>
                <p>
                  <?php
                    echo '<i>Erfaring</i>: ' . $user_exp;
                    echo '<br />';
                    echo '<i>Neste rang</i>: ' . $level_array[1];
                  ?>
                </p>
              </div>

              <div class="col-8">
                <div id="profile-badges" class="profile-badges section-black space">
                         <span class="profile-badges__badge">
                  </span><span class="profile-badges__badge">
                  </span><span class="profile-badges__badge">
                  </span>
                  <?php
                    //   badges here
                  ?>
                </div>
                <p>
                  <?php echo '<i>Dine funn</i>: ' . '0'; ?>
                </p>
              </div>
            </div>

            <div class="centered">
              <p class="space-0">Ostatni tydzień:</p>
              <?php
                las_profile_show_last_dates( $user_progress );
              ?>
            </div>

          </div>

          <?php

            las_profile_show_data_table( $user_progress );

          ?>


        </div>

      </div>


</section>


<script>
//  init Las
var las = new LasDisplayProfile();
las.init();
</script>
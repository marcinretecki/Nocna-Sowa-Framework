<?php
//
//  TESTS
//

//  Echo function name
function las_test_echo_function_name( $name ) {

  echo '<strong style="display:block;margin:40px 0 20px;">';
  echo $name;
  echo '</strong>';

}




//
//  Test las_get_wyzwanie_finished_sum()
//
function test_las_get_wyzwanie_finished_sum() {

  las_test_echo_function_name( __FUNCTION__ );

  $user_progress = las_get_user_progress();

  $slug = 'test';

  $finished_no = las_get_wyzwanie_finished_sum( $user_progress, $slug );

  echo 'Previously finsihed: ' . $finished_no .  ' times';

}

//
//  Test las_get_wyzwanie_correct_sum()
//
function test_las_get_wyzwanie_correct_sum() {

  las_test_echo_function_name( __FUNCTION__ );

  $user_progress = las_get_user_progress();

  $correct_sum = las_get_wyzwanie_correct_sum( $user_progress, 'test' );

  echo 'Correct sum: ' . $correct_sum;

}

//
//  Test las_add_totals()
//
function test_las_add_totals() {

  las_test_echo_function_name( __FUNCTION__ );

  $user_progress = las_get_user_progress();

  $user_cookie_progress = [
    'progress' => [
      'exp'         => 800,
      'ex'          => 20,
      't'           => 544,
      'correct'     => 20,
      'wrong'       => 10,
      'repeat'      => 23,
      'more'        => 3,
      'trans'       => 12
    ],
    'id'          => 36,
    'first_time'  => true,
    'progress_type' => 'wyzwanie'
  ];

  $user_progress_after_add_totals = las_add_totals( $user_progress, $user_cookie_progress );

  echo '<div style="clear:both;overflow:hidden;">';

    echo '<div style="width:48%;float:left;padding:0 1%;">';
    echo '<p>Totals before:</p>';
    echo '<pre>';
      print_r( $user_progress['totals'] );
    echo '</pre>';
    echo '</div>';

    echo '<div style="width:48%;float:left;padding:0 1%;">';
    echo '<p>Totals after:</p>';
    echo '<pre>';
      print_r( $user_progress_after_add_totals['totals'] );
    echo '</pre>';
    echo '</div>';

  echo '</div>';

}




//
//  Test las_get_exp_from_progress()
//
function test_las_get_exp_from_progress() {

  $cookie_progress = [
    'ex' => 3
  ];


  echo las_get_exp_from_progress( $cookie_progress );


}



//
//  Test las_seconds_to_time_array()
//
function test_las_seconds_to_time_array() {

  las_test_echo_function_name( __FUNCTION__ );


  for ( $i = 0;  $i < 20; $i++ ) {

    $no = mt_rand( 1, 20000 );

    echo $no . ': ';
    print_r( las_seconds_to_time_array( $no ) );
    echo '<br />';

  }


  //  absurdalna liczba
  echo '457451230987' . ': ';
  print_r( las_seconds_to_time_array( 457451230987 ) );
  echo '<br />';


}


//
//  Test las_format_t()
//
function test_las_format_t() {

  las_test_echo_function_name( __FUNCTION__ );


  for ( $i = 0;  $i < 20; $i++ ) {

    $no = mt_rand( 1, 20000 );

    echo $no . ': ';
    echo las_format_t( $no );
    echo '<br />';

  }


  //  absurdalna liczba
  echo '457451230987' . ': ';
  echo las_format_t( 457451230987 );
  echo '<br />';


}
//
//  Test las_format_t()
//
function test_las_format_t_short() {

  las_test_echo_function_name( __FUNCTION__ );


  for ( $i = 0;  $i < 20; $i++ ) {

    $no = mt_rand( 1, 20000 );

    echo $no . ': ';
    echo las_format_t_short( $no );
    echo '<br />';

  }


  //  absurdalna liczba
  echo '457451230987' . ': ';
  echo las_format_t_short( 457451230987 );
  echo '<br />';


}



//
//  Return a testing wyzwanie result
//
function test_las_get_last_wyzwanie_result() {

  las_test_echo_function_name( __FUNCTION__ );

  $last_wyzwanie_result = [
    'progress' => [
      'exp'         => 800,
      'ex'          => 16,
      't'           => 544,
      'correct'     => 20,
      'wrong'       => 10,
      'repeat'      => 23,
      'more'        => 3,
      'trans'       => 12
    ],
    'id'          => 36,
    'first_time'  => true
  ];

  return $last_wyzwanie_result;

}





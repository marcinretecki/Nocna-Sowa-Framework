<?php
//
//  TESTS
//


function las_test_echo_function_name( $name ) {

  echo '<strong style="display:block;margin:40px 0 20px;">';
  echo $name;
  echo '</strong>';

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
    'exp'         => 800,
    'ex'          => 16,
    't'           => 544,
    'repeat'      => 23,
    'more'        => 3,
    'wrong'       => 17,
    'trans'       => 12,
    'id'          => 36,
    'first_time'  => true
  ];

  return $last_wyzwanie_result;

}





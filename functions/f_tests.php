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
//  Test las_format_t()
//
function test_las_format_t() {

  las_test_echo_function_name( __FUNCTION__ );


  for ( $i = 0;  $i < 20; $i++ ) {

    $no = mt_rand( 1, 6000 );

    echo $no . ': ';
    echo las_format_t( $no );
    echo '<br />';

  }


  //  absurdalna liczba
  echo '457451230987' . ': ';
  echo las_format_t( 457451230987 );
  echo '<br />';


}
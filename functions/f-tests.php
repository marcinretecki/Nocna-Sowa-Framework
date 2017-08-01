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
//  Test level arrays
//
function test_las_level_arrays() {

  las_test_echo_function_name( __FUNCTION__ );

  //  If user gets exp for 2 levels up
  echo las_get_level_percent( 800 );
  echo '<br />';
  echo las_get_level_percent( 0 );

  echo '<br />Random exp below for tests: <br />';

  $i = 0;
  $exp = 123;
  $exp_arr = [];

  for ( ; $i < 20; $i++ ) {

    $exp_arr[] = $exp + ( $i * 800 );

  }

  for ( ; $i < 40; $i++ ) {

    $exp_arr[] = $exp + ( $i * 2000 );

  }

  foreach ( $exp_arr as $exp ) {

    $level_arr = las_get_user_level_array( $exp );
    $level_percent = las_get_level_percent($exp );

    echo $exp;
    echo ' | Level now: ';
    echo $level_arr[0];
    echo ' | Exp for next level: ';
    echo $level_arr[1];
    echo ' | Exp for prev level: ';
    echo $level_arr[2];
    echo '<br />';

  }

}



//
//  Test las_mutate_user_meta()
//
function test_las_mutate_user_meta() {

  las_test_echo_function_name( __FUNCTION__ );


  $user_progress = [
    'chapter-name' => [
      'id' => 23,
      'przewodnik' => [
        '1490692099' => [],
        '1490658658' => []
      ],
      'wyzwanie' => [
        '1490692099' => [
          'exp'         => 240,
          'ex'          => 16,
          'correct'     => 10,
          'wrong'       => 17,
          'repeat'      => 23,
          'trans'       => 12,
          'more'        => 3,
          't'           => 544,
          'finished'    => 1
        ],
        '1490693000' => [
          'exp'         => 100,
          'ex'          => 10,
          'correct'     => 10,
          'wrong'       => 17,
          'repeat'      => 23,
          'trans'       => 12,
          'more'        => 3,
          't'           => 324,
          'finished'    => 0
        ]
      ]
    ],
    'test' => [
      'id' => '213',
      'wyzwanie' => [
        '1501354191' => []
      ]
    ],
    'totals'  =>  [
      'exp'             =>  340,
      'ex'              =>  26,
      'correct'         =>  20,
      'wrong'           =>  10,
      'repeat'          =>  22,
      'trans'           =>  92,
      'more'            =>  8,
      'przewodnik'      =>  2,
      'wyzwanie'        =>  2,
      't'               =>  1022,
      'dates'           =>  [ '2017-03-19', '2017-03-22' ]
    ]
  ];


  $user_progress_from_cookie = [
    '1501354191' => [
      'id' =>         "213",
      'type' =>       "wyzwanie",
      'chapter' =>    "test",
      'progress' =>   [
        'exp' =>        base_convert( '222', 10, 3 ),
        'wrong' =>      base_convert( '2', 10, 3 ),
        'correct' =>    base_convert( '10', 10, 3 ),
        'repeat' =>     base_convert( '2', 10, 3 ),
        'ex' =>         base_convert( '10', 10, 3 ),
        'more' =>       base_convert( '1', 10, 3 ),
        't' =>          base_convert( '221', 10, 3)
      ]
    ]

  ];

  echo '<p>It should show worning about headers because of cookie setting.</p>';

  echo '<div style="clear:both;overflow:hidden;">';

    echo '<div style="width:48%;float:left;padding:0 1%;">';
    echo '<p>user_progress before:</p>';
    echo '<pre>';
      print_r( $user_progress );
    echo '</pre>';
    echo '</div>';

  //  Mutate data
  $user_progress = las_mutate_user_meta( $user_progress, $user_progress_from_cookie );

    echo '<div style="width:48%;float:left;padding:0 1%;">';
    echo '<p>user_progress after:</p>';
    echo '<pre>';
      print_r( $user_progress );
    echo '</pre>';
    echo '</div>';

  echo '</div>';

}



//
//  Test las_create_new_access_struct()
//
function test_las_create_new_access_struct() {

  las_test_echo_function_name( __FUNCTION__ );

  $user_progress = null;

  $current_page_data = [
    'unit test chapter',
    'unit tests type',
    '123456789',
    '9999'
  ];

  $user_progress = las_create_new_access_struct( $user_progress, $current_page_data );

  echo '<pre>';
  print_r( $user_progress );
  echo '</pre>';

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

  $sanitized_progress_from_cookie = [
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
    'chapter'     => 'test',
    'type'        => 'wyzwanie',
    'id'          => 36,
    'first_time'  => true
  ];

  $user_progress_after_add_totals = las_add_totals( $user_progress, $sanitized_progress_from_cookie );

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
//  @return last_wyzwanie_result array( id, progress, first_time )
//
function test_las_get_last_wyzwanie_result() {

  //las_test_echo_function_name( __FUNCTION__ );

  $last_wyzwanie_result = [
    'progress' => [
      'exp'         => 800,
      'ex'          => 16,
      't'           => 544,
      'correct'     => 20,
      'wrong'       => 10,
      'repeat'      => 23,
      'more'        => 3,
      'trans'       => 12,
      'finished'    => 1
    ],
    'id'          => 30,
    'first_time'  => true
  ];

  return $last_wyzwanie_result;

}





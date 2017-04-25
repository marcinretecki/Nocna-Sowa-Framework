<?php


function test_las_get_exp_from_progress() {

  $cookie_progress = [
    'ex' => 3
  ];


  echo las_get_exp_from_progress( $cookie_progress );


}
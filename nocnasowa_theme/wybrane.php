<?php
/*
Template Name: Wybrane
*/

function wybrane() {

  if ( isset( $_COOKIE['nocnasowa_czytales'] ) ) {
    $czytales_cookie = $_COOKIE['nocnasowa_czytales'];
    $czytales_ids = json_decode( $czytales_cookie, true );
  }
  else {
    $czytales_ids = 0;
  }



  if ( is_page( 'wybrane' ) ) {

    $wybrane = array(
      'the-hard-way',
      'dlaczego-za-darmo',
      'nauka-jezyka-to-nie-nauka-tlumaczen',
      'porownywanie-sie',
      'brak-postepow',
      'nauczyciel-to-nie-magik',
      '17-mitow-o-nauce-jezyka',
      'pisanie-po-norwesku',
      'nawyk-uczenia-sie',
      'metody-rozwijania-slownictwa',
      'norweska-wymowa-fonetyka',
      'slowniki-jezyka-norweskiego',
      '16-powodow-nauka-jezyka-norweskiego',
    );

    // Zamień listę slug na id
    $wybrane_ids = array();
    foreach($wybrane as $one) {
      $get_posts_query = array(
        'fields' => 'ids',
        'name' => $one
      );
      $one_post = get_posts($get_posts_query);
      $wybrane_ids[] = $one_post[0];
    }
    shuffle($wybrane_ids);

    // Jeśli ktoś czytał jakieś arty to trzeba je odjąć od wybranych
    if ( is_array($czytales_ids) && ( count($czytales_ids) > 0 ) ) {
      $wybrane_bez_czytales = array_diff($wybrane_ids, $czytales_ids);
      ksort($wybrane_bez_czytales);

      // jeśli jest za mało wybranych artów to trzeba dodać random
      if (count($wybrane_bez_czytales) < 8) {
        $no = 8 - count($wybrane_bez_czytales);
        $get_rand_query = array(
        'fields' => 'ids',
        'post__not_in' => $wybrane_bez_czytales,
        'orderby' => 'rand',
        'posts_per_page' => $no
        );
        $rand_posts = get_posts($get_rand_query);

        $wybrane_ids = array_merge($wybrane_bez_czytales, $rand_posts);

      } else {
        $wybrane_ids = $wybrane_bez_czytales;
      }
    }

    $wybrane_query = array(
      'posts_per_page' => 8,
      'orderby' => 'post__in',
      'post__in' => $wybrane_ids
    );

    return array(
      'wybrane',
      'query' => $wybrane_query,
      'title' => 'Wybrane dla Ciebie artykuły',
    );

  } else {

    $czytales_query = array(
      'posts_per_page' => -1,
      'orderby' => 'post__in',
      'post__in' => $czytales_ids
    );

    return array('czytales', 'query' => $czytales_query, 'title' => 'Ostatnio czytałeś');
  }
}
$wybrane = wybrane();
$title = $wybrane['title'];
query_posts( $wybrane['query'] );
if ( 'wybrane' == $wybrane[0] ) {
  $is_wybrane = true;
} else {
  $is_czytales = true;
}


//$is_popular = true;
//$popular = array(
//      'posts_per_page' => 8,
//      'orderby' => 'comment_count',
//      'post__in' => $wybrane_ids
//    );
//
//query_posts( $popular );


include( 'index-include.php' );
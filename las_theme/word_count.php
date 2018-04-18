<?php
//
//  Template Name: Word Count
//


//  TODO
//  get all pages in the order, just like szlak does
//  count words from the top, so we know word-progress of the whole course


//  if not a dev, exit
if ( !las_is_developer() ) {
  exit;
}


//  GLOBALS
include( stream_resolve_include_path( __DIR__ . '/includes/globals.php' ) );



//
//  Count all words used in wyzwania
//
function las_count_all_words_in_wyzwania() {

  $file_words = [];
  $all_words_with_no = [];

  $numbers_to_remove = [ '1', '2', '3', '4', '5', '6', '7', '8', '9', '0' ];
  $words_to_remove = [ 'endintro', 'intro', 'end', 'random', 'emoji-', '&nbsp;', '&hellip;', '\'', '-' ];
  $words_to_remove_seconds_pass = [
    ' a ', ' b ', ' c ', ' d ', ' e ', ' f ', ' g ', ' h ', ' i ', ' j ', ' k ', ' l ', ' m ', ' n ', ' o ', ' p ', ' r ', ' s ', ' t ', ' u ', ' w ', ' v ', ' x ', ' y ', ' z ',
    'nbsp'
  ];

  //  get paths of all files
  $file_paths = [
    'rze-rodz',
    'rze-slownik',
    'rze-forma,',
    'rze-lm',
    'rze-wyj',
    'rze-pol',
    'rze-wsz',
    'cza-ter',
    'cza-znak',
    'cza-prze',
    'cza-pyt',
    'cza-niereg',
    'cza-modalne',
    //  tu chyba dojdzie jeszcze mod-prze
    'cza-mod-pyt',
    'cza-przy',
    'cza-okr',
    'cza-roz',
    'cza-mod-kr',
    'za-imie',
    'za-rzecz',
    'za-wsk'

  ];

  // get content of each file
  foreach ( $file_paths as $file ) {

    $new_content = '';

    $file_contents = stream_resolve_include_path( __DIR__ . '/data/wyzwanie/' .  $file . '.php' );

    if ( !$file_contents ) {
      continue;
    }

    //  get file content
    //  strip tags
    //  get to lower case
    $content = strtolower( strip_tags( file_get_contents( $file_contents ) ) );

    //  strtolower omits Å
    $content = str_replace( 'Å', 'å', $content );

    //  remove emoji code
    $content = preg_replace('/#[\s\S]+?;/', ' ', $content);

    //  get everything inside ''
    preg_match_all( '/\'.*?\'/', $content, $matches );

    foreach ( $matches[0] as $match ) {

      //  omit matches that contain polish characters
      if ( ( preg_match( '(ą|ś|ż|ź|ć|ó|ę|ń|ł|w|z|_)', $match ) === 0 ) ) {

        $new_content .= $match;

      }
    }

    //  remove unnecesary words
    $new_content = str_replace( $numbers_to_remove, ' ', $new_content );
    $new_content = str_replace( $words_to_remove, ' ', $new_content );
    //  this character is somehow omited if in array
    $new_content = str_replace( ' å ', ' ', $new_content );
    $new_content = str_replace( $words_to_remove_seconds_pass, ' ', $new_content );


    //  count words
    //  count array values
    $file_words[ $file ] = array_count_values( str_word_count( $new_content, 1, 'ąęśżźćńłóøåæéô' ) );


  }

  //  print words
  foreach ( $file_words as $file_name => $words ) {

    $new_words = [];

    //  make an array of all word counts
    foreach ( $words as $word => $count ) {

      //  if the word exists
      if ( $all_words_with_no[ $word ] ) {

        $all_words_with_no[ $word ] += $count;

      }
      //  if it is a new word
      else {

        $all_words_with_no[ $word ] = $count;

        $new_words[ $word ] = $count;

      }

    }

    echo '<h2>' . $file_name . '</h2>';

    arsort( $new_words );

    if ( count( $new_words ) > 0 ) {

      foreach ( $new_words as $word => $no ) {

        echo $word . ' (' . $no . ') | ';

      }
    }
    else {
      echo '<p>Nie ma nowych słów.</p>';
    }

  }


  echo '<h2>Sumy wszystkich słów</h2>';

  arsort( $all_words_with_no );

  foreach ( $all_words_with_no as $word => $no ) {

    echo $word . ' (' . $no . ') | ';

  }


  //  make an array of all words
  //  if a word exists in the array, count it as old
  //  if not, it is new
  //  old words are not showed under each exercises
  //  but they are counted and all sums are showed in the end

  //  how to exclude all the polish words?


}
?>

<!DOCTYPE html>
<html>
<head>
  <title itemprop="name"><?php wp_title(' ', true, 'right'); ?>| Las</title>
</head>
<body>

  <div style="width:1000px;max-width:100%;padding:20px;font-size:12;font-family:'DejaVu Sans Mono;">

  <h1><?php the_title(); ?></h1>

  <?php
    las_count_all_words_in_wyzwania();
  ?>


  </div>
</body>
</html>
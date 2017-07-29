<?php
//
// Template Name: Tests
//

//  if not a dev, exit
if ( !las_is_developer() ) {
  exit;
}

?>
<!DOCTYPE html>
<html>
<head>
  <title itemprop="name"><?php wp_title(' ', true, 'right'); ?>| Las</title>
</head>
<body>
<script src="//cdn.jsdelivr.net/velocity/1.4.1/velocity.min.js"></script>
<script src="<?php ns_auto_ver('/c/j-las-min.js'); ?>"></script>

<div style="width:1000px;max-width:100%;padding:20px;font-size:12;font-family:'DejaVu Sans Mono;">

<?php

  test_las_get_wyzwanie_finished_sum();

  test_las_get_wyzwanie_correct_sum();

  test_las_add_totals();

  test_las_seconds_to_time_array();

  test_las_format_t();

  test_las_format_t_short();


?>

<div id="tests"></div>


<?php
  include( stream_resolve_include_path( __DIR__ . '/data/las-nicknames.php' ) );
?>
<script>
//
//  JS Tests
//
var wrapper = document.getElementById('tests');

//
//  Draw nicknames
//
(function testDrawNickname() {

  var las = new LasCreateProfile();
  var target;
  var i;
  var nicknames;
  var nick;
  var h;

  target = document.createElement('div');
  target.className = 'space-2 size-2';

  h = document.createElement('strong');
  h.style.cssText = 'display:block;margin:40px 0 20px;';
  h.innerHTML = 'testDrawNickname';

  las.lasData = new LasNicknames();

  for ( i = 0; i < 10; i++ ) {

    nicknames = las.shuffleArray( las.lasData.nicknames );
    nick = nicknames[ 3 ].trim();

    target.innerHTML = nick + ', ' + target.innerHTML;

  }

  wrapper.appendChild( h );
  wrapper.appendChild( target );

}());


</script>
</div>
</body>
</html>
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
<div style="width:1000px;max-width:100%;padding:20px;font-size:12;font-family:'DejaVu Sans Mono;">

<?php

  test_las_format_t();


?>
</div>
</body>
</html>
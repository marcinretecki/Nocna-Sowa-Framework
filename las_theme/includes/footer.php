<?php
//
// Includes – Footer
//


//  Testing
$test_time_end = microtime(true);
$test_time = $test_time_end - $test_time_start;
?>

<div data-test-time="<?php echo $test_time; ?>" data-queries="<?php echo get_num_queries(); ?>" data-query-timer="<?php echo timer_stop(1); ?>">
<?php
//  if (current_user_can('administrator')){
//      global $wpdb;
//      echo "<pre>";
//      print_r($wpdb->queries);
//      echo "</pre>";
//  }
?>
</div>
</body>
</html>
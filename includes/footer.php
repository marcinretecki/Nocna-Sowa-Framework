<?php
//
// Includes – Footer
//


//  Testing
$test_time_end = microtime(true);
$test_time = $test_time_end - $test_time_start;
?>

<div data-test-time="<?php echo $test_time; ?>"></div>
</body>
</html>
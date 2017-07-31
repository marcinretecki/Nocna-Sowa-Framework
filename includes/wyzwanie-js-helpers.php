<?php
//
//  Includes - wyzwanie js helpers
//

//  globals available

//  @post (page.php)
//  @type (page.php)


echo 'las.helper.chapter = "' . $post->post_name . '";';
echo 'las.helper.type = "' . $type  . '";';
echo 'las.helper.chapterId = "' . $id . '";';
echo 'las.helper.finishedNo = "' . las_get_wyzwanie_finished_sum( $user_progress, $post->post_name ) . '";';


//  this needs reworing
//  it should be gathered from the $user_progress object or
//  or it will never be the same

echo 'las.helper.serverAccess = "' . $access_time . '";';
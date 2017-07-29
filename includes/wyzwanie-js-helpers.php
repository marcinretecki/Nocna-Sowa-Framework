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
echo 'las.helper.serverAccess = "' . time() . '";';
echo 'las.helper.finishedNo = "' . las_get_wyzwanie_finished_sum( $user_progress, $post->post_name ) . '";';
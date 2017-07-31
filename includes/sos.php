<?php
//
//  Includes - SOS, comment section
//

echo '<div class="section-content">';
echo '<h1>';
echo $heading;
echo '</h1>';

echo '<h2>SOS</h2>';

comments_template('', true);

echo '</div>';
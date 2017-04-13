<?php
/*
Template Name: Profile
*/



//  tu będzie potrzebny pełny profil łącznie z opcjami:
//  - reset progress
//  - stop payments
//  - etc



//
//  for now only reset data
//
//print_r( las_reset_user_meta() );


$user_progress = las_get_user_progress();

echo 'Ile przykładów: ' . $user_progress['totals']['ex'];
echo '<br />';
echo 'Ile błędów: ' . $user_progress['totals']['wrong'];
echo '<br />';
echo 'Ile powtórek nagrań: ' . $user_progress['totals']['repeat'];
echo '<br />';
echo 'Ile wyświetleń tłumaczeń: ' . $user_progress['totals']['trans'];
echo '<br />';
echo 'Ile wysłuchań more: ' . $user_progress['totals']['more'];
echo '<br />';
echo 'Ile dni: ' . count($user_progress['totals']['dates']);
echo '<br />';
echo 'Ile czasu w sumie na ćwiczeniach: ' . $user_progress['totals']['t'] . 's';
echo '<br />';
echo 'Ile wejść na przewodniki: ' . $user_progress['totals']['przewodnik'];
echo '<br />';
echo 'Ile wejść na wyzwania: ' . $user_progress['totals']['wyzwanie'];
echo '<br />';
echo 'Ile wejść na inne strony: ' . $user_progress['totals']['page'];
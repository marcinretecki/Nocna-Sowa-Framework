<?php
global $cookiehash;

/* Variables for the array with names */
$day_no = date('N');
$dagen = array('', 'mandag', 'tirsdag', 'onsdag', 'torsdag', 'fredag', 'lørdag', 'søndag' );

$comment_author = '';
if ( isset( $_COOKIE['comment_author_'.COOKIEHASH] ) ) {
  $comment_author = $_COOKIE['comment_author_'.COOKIEHASH];

  $msg01 =  $comment_author . ', jeg ventet på deg.';
  $msg02 =  $comment_author . ', sees vi neste helg?';
  $msg03 =  $comment_author . ', hyggelig å møte deg!';
  $msg04 =  $comment_author . ', kan jeg hjelpe deg?';
  $msg05 =  $comment_author . ', takk for et flott samarbeid.';
  $msg06 =  $comment_author . ', kjenner du kongen?';
  $msg07 =  $comment_author . ', lenge siden sist, ikke sant?';
  $msg08 =  $comment_author . ', hvordan går det?';
  $msg09 =  $comment_author . ', ha en god kveld!';
  $msg10 =  $comment_author . ', du gjør det godt! Prøv&nbsp;mer!';
  $msg11 = 'Velkommen, ' . $comment_author . '.';
  $msg12 = $comment_author . ', lykkelig ' . $dagen[$day_no] . '.';
} else {
  $msg01 = 'Jeg ventet på deg.';
  $msg02 = 'Sees vi neste helg?';
  $msg03 = 'Hyggelig å møte deg!';
  $msg04 = 'Kan jeg hjelpe deg?';
  $msg05 = 'Takk for et flott samarbeid.';
  $msg06 = 'Kjenner du kongen?';
  $msg07 = 'Lenge siden sist, ikke sant?';
  $msg08 = 'Hvordan går det?';
  $msg09 = 'Ha en god kveld!';
  $msg10 = 'Du gjør det godt! Prøv mer!';
  $msg11 = 'Velkommen!';
  $msg12 = 'Lykkelig ' . $dagen[$day_no] . '.';
};


$bubble = array(
  /* Teskty po polsku */
  'Słoń, żyrafa, panda, jeż,<br />Z Nocną Sową wszystko wiesz.',
  'Żadna droga nie jest kręta, gdy o&nbsp;Sowie się pamięta.',
  'Nie chcesz być dłużej źle odbierany? To proste, ucz się odmiany.',
  'Tor bor i nord. A gdzie ty bor?',
  'Czy zdarza Ci się podglądać odpowiedź zanim skończysz ćwiczenie?',
  'Mam dla Ciebie sprawdzone info. Szczegóły na newsletterze ;)',
  'Jesteś w kapciach? Pytam, bo chcę żebyś czuł się tutaj jak w domu.',

  /* Mylące się frazy */
  'Helten bor i teltet.<br />Nie myl bohatera z namiotem.',
  'Jeg hater røde hatter. <br />Nie myl nienawiści z kapeluszem.',

  /* Teskty po norwesku */
  'Jeg heter Sowa. Nocna Sowa.',
  'Liker du å løpe? Jeg bare flyr og&nbsp;flyr.',
  'Unnskyld at jeg ikke ringte, men jeg fikk ikke nummeret ditt.',
  'Ut på tur, aldri sur!',
  'Trikken er din venn, ikke slå på den! – cytat z tramwaju w Oslo',
  'Det er alltid gøy å lære noe nytt. :)',

  /* O Sowach, linki zewnętrzne */
  'Nocna Sowa o poranku: <a href="http://bit.ly/QrF7XY" target="_blank">bit.ly/QrF7XY</a>',
  'Kto wytrzyma dłużej bez mrugania? <a href="http://bit.ly/UlrVcu" target="_blank">bit.ly/UlrVcu</a>',
  'Mine venner: <a href="http://bit.ly/PuKmqL" target="_blank">bit.ly/PuKmqL</a>',
  'Najlepszy z naszych zawodników: <a href="http://bit.ly/PPxJEU " target="_blank">bit.ly/PPxJEU</a>',
  'Kapitan Sowa na tropie: <a href="http://bit.ly/SbHyRB" target="_blank">bit.ly/SbHyRB</a>',
  'Ro Ro Rotate your owl! <a href="http://bit.ly/QHTUhA" target="_blank">bit.ly/QHTUhA</a>',
  'W wolnych chwilach Taniec z Sowami: <a href="http://bit.ly/Ra5RyE" target="_blank">http://bit.ly/Ra5RyE</a>',
  'Sowa to czy kogut? <a href="http://bit.ly/Q0ftIP" target="_blank">http://bit.ly/Q0ftIP</a>',
  'Co tam chłopaki w lesie słychać? <a href="http://bit.ly/ZnV6vi" target="_blank">http://bit.ly/ZnV6vi</a>',
  'La meg ut! <a href="http://bit.ly/RIXabi" target="_blank">http://bit.ly/RIXabi</a>',
  'Trening czyni mistrza: <a href="http://bit.ly/OgnhLE" target="_blank">http://bit.ly/OgnhLE</a>',
  'Jeg elsker å spille i skogen: <a href="http://bit.ly/OJe3r5" target="_blank">http://bit.ly/OJe3r5</a>',
  'Rada Puchaczy: <a href="http://bit.ly/1isT0ay" target="_blank">http://bit.ly/1isT0ay</a>',
  'Hva gjør reven? <a href="http://bit.ly/18EgFet" target="_blank">http://bit.ly/18EgFet</a>',
  'Sowa w lisach nie chodzi, a ty? <a href="http://bit.ly/1cwos1U" target="_blank">http://bit.ly/1cwos1U</a>',

  /* Inne linki zewnętrzne */
  'Tina har lært seg <a href="http://bit.ly/YavaRI" target="_blank">alfabetet</a>.',
  'Gdzie chcialbyś się jutro obudzić? <a href="http://bit.ly/Z1gEy8" target="_blank">http://bit.ly/Z1gEy8</a>',
  'Norwescy strażnicy są <a href="http://bit.ly/10Fy6IO" target="_blank">taaacy straszni</a>.',
  'Duński, Norweski czy Szwedzki? <a href="http://bit.ly/Yaw3d6" target="_blank">http://bit.ly/Yaw3d6</a>',
  'Nøtteliten bor i toppen av et tre. <a href="http://bit.ly/ZI2BfO" target="_blank">http://bit.ly/ZI2BfO</a>',
  'I dag bare jazz <a href="http://radio.nrk.no/direkte/jazz">radio.nrk.no</a>',


  /* Linki wewnętrzne */
  'TurboDymoMan zawstydził swojego nauczyciela ucząc się <a href="http://bit.ly/SfWUXa" title="Jak skutecznie zacząć naukę języka norweskiego">20 min dziennie</a>',
  'Jak wymowić trudne słowa?<br />Już <a href="http://bit.ly/TTvEg9" title="Norweska wymowa, fonetyka">z pomocą</a> leci Sowa.',
  'Gdzie w Bokmålu znaleźć słowa?<br /><a href="http://bit.ly/SXZWi3" title="Słowniki języka norweskiego">Miejsca</a> te zna Nocna Sowa.',
  '<a href="http://nocnasowa.pl/czytanie-norweskiej-prasy/">Czytanie prasy</a> to prosta sztuka,<br />a płynie z tego wielka nauka.',

  /* Facebook */
  'Masz już Sowę na <a href="https://www.facebook.com/NocnaSowaPL" target="_blank">fejsie</a>?',
  'Sowa ma już <a href="https://www.facebook.com/NocnaSowaPL" target="_blank">tysiące</a> prawdziwych przyjaciół :D',

  /* Do użytkownika */
  $msg01,
  $msg02,
  $msg03,
  $msg04,
  $msg05,
  $msg06,
  $msg07,
  $msg08,
  $msg09,
  $msg10,
  $msg11,
  $msg12


);
/* <a href="" target="_blank"></a> */

// Better random
function array_mt_rand( Array $array ) {
  $count = count( $array ) ;
  if ( ! $count ) return null ;
  $chosen = $array[ mt_rand( 0 , $count - 1 ) ];
  $chosenClean = str_replace('"', '', $chosen);
  $replaceString = '<a';
  $replaced = str_replace('<a', $replaceString, $chosen);
  echo $replaced;
};


$nieskonczone = array(
  '(czy możesz schować coś do kieszeni...)',
  "Jeg har lyst på Rock'n'roll (link do radia)",

  'Liker du norske filmer? Jeg kjenner noen av de beste (link do listy?)',
  'Har du hørt om... (linki do cwiczen, albo artow z gazet)',
  'Jeg tar en kopp kaffe. Hva drikker du? / En kopp kaffe om kvelden er bra for... ?',

  'Słyszałeś, że Duńczycy muszą gadać po norwesku żeby się dogadać? (Link do filmu o dunczykach gadajacych po norwesku)',

  'Jak przyswoić trudne słowa? Sekret ten zna Nocna Sowa (link do postu o metodach slowka)',

  'Sowa terminator? Nie, inspirator motywator.',
  'Link do jakiegoś klasyka filmowego norweskiego.',
  'Liker du dette maleriet? (jakiś tekst o jakimś obrazie muncha albo innych)',


  'Dzwięki sów <a href="http://bit.ly/QHU1JT" target="_blank">http://bit.ly/QHU1JT</a>',


  'Wszak to nie odkrycie, że norweski lubisz skrycie.',
  'Lepiej zajmować się sowami niż krasnalem ogrodowym.',


  'Pamiętaj, że przed "men" zawsze jest przecinek. LINK...'
);


function check_date_aside() {
  $fools_day = '2013-4-1';
  $now = date( 'Y-m-d' );

  $fools_ts = strtotime( $fools_day );
  $now_ts = strtotime( $now );

  return ( $fools_ts == $now_ts );
}

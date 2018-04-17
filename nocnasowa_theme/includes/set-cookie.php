<?php
//
//  Includes – Set Cookie
//
//  Set Cookie if comes from newsletter
//


if (    isset($_GET["utm_source"])
     && ( ( 'Nocna+Sowa' == $_GET["utm_source"] ) || ( 'Nocna Sowa' == $_GET["utm_source"] ) || ( 'Nocna+Sowa+-+Newsletter' == $_GET["utm_source"] )  || ( 'Nocna Sowa - Newsletter' == $_GET["utm_source"] ) ) ) {

  setcookie( 'nocnasowa_from_newsletter', 'true', time()+60*60*24*30, '/', 'nocnasowa.pl' );
}
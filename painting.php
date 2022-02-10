<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
PrintHead();
PrintHeader();

if ( ! is_numeric( $_GET["kunst_id"] ) ) die("Foutieve GET parameter!");

$rows = GetData( "select * from kunst where kunst_id=" . $_GET["kunst_id"] );

foreach ($rows as $row){
    print '<div class="showcase">';

    //print naam kunstwerk + artiest naam + stijl + kunstomschrijving
    print '<h3>' . $row['kunst_naam'] . '</h3>';
    print '<h3>' . $row['artiest_voornaam'] . " " . $row['artiest_achternaam'] . '</h3>';
    print '<h3>' . $row['stijl_naam'] . '</h3>';
    print '<p>' . $row['kunst_omschrijving'] . '</p>';

    //afbeelding
    $link_image = "images/" . $row['afb_path'];
    print '<img src="' . $link_image . '">';

    print '</div>' ;
}
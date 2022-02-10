<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
PrintHead();
PrintHeader();

if ( ! is_numeric( $_GET["kunst_id"] ) ) die("Foutieve GET parameter!");

$rows = GetData( "select kunst_naam, kunst_omschrijving from Kunst where kunst_id=" . $_GET["kunst_id"] );

/*
$rows = GetData( "select kunst_naam, kunst_omschrijving, afb_path, artiest_voornaam, artiest_achternaam, stijl_naam
from Kunst inner join Afbeelding on Kunst.kunst_id = Afbeelding.kunst_id
inner join Artiest_Kunst on Kunst.kunst_id = Artiest_Kunst.kunst_id
inner join Artiest on Artiest_Kunst.artiest_id = Artiest.artiest_id
inner join Stijl on Kunst.stijl_id = Stijl.stijl_id where kunst_id=" . $_GET["kunst_id"] );
 */

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
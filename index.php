<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
PrintHead();
PrintHeader();
//get data
$data = GetData( "select * from Afbeelding where kunst_id=1" );

//get template
$template = file_get_contents("templates/index_main.html");

//merge
$output = MergeViewWithData( $template, $data );
print $output;
<?php
include_once ("lib/autoload.php");
function PrintHead()
{
    $head = file_get_contents("templates/head.html");
    print $head;
}

function PrintJumbo( $title = "", $subtitle = "" )
{
    $jumbo = file_get_contents("templates/jumbo.html");

    $jumbo = str_replace( "@jumbo_title@", $title, $jumbo );
    $jumbo = str_replace( "@jumbo_subtitle@", $subtitle, $jumbo );

    print $jumbo;
}

function PrintHeader( )
{
    $navbar = file_get_contents("templates/header.html");
    print $navbar;
}

function PrintCollection($type){
    $returnpage = file_get_contents("templates/collection_start.html");
    $item = file_get_contents("templates/collection_item.html");
    switch ($type){
        case 0:
            $sql = "select kunst_naam,kunst_omschrijving,afb_path from Kunst inner join Afbeelding on Kunst.kunst_id = Afbeelding.kunst_id;";
            break;
    }
    $data = GetData($sql);
    foreach ( $data as $row )
    {
        $output = $item;
        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $output = str_replace( "@$field@", $row["$field"], $output);
        }
        $returnpage .= $output;
    }

    $returnpage .= file_get_contents("templates/collection_end.html");

    print $returnpage;

}

function MergeViewWithData( $template, $data )
{
    $returnvalue = "";

    foreach ( $data as $row )
    {
        $output = $template;

        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $output = str_replace( "@$field@", $row["$field"], $output );
        }

        $returnvalue .= $output;
    }

    if ( $data == [] )
    {
        $returnvalue = $template;
    }

    return $returnvalue;
}

function MergeViewWithExtraElements( $template, $elements )
{
    foreach ( $elements as $key => $element )
    {
        $template = str_replace( "@$key@", $element, $template );
    }
    return $template;
}

function MergeViewWithErrors( $template, $errors )
{
    foreach ( $errors as $key => $error )
    {
        $template = str_replace( "@$key@", "<p style='color:red'>$error</p>", $template );
    }
    return $template;
}

function RemoveEmptyErrorTags( $template, $data )
{
    foreach ( $data as $row )
    {
        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $template = str_replace( "@$field" . "_error@", "", $template );
        }
    }

    return $template;
}
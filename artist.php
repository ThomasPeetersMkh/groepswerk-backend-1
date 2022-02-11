<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
PrintHead();
PrintHeader();

if ( ! is_numeric( $_GET["artiest_id"] ) ) die("Foutieve GET parameter!");

?>
<main class="detail">
    <?php
    //getting data
    $data = GetData('select artiest_voornaam, artiest_achternaam, geboortedatum, sterftedatum, 
    artiest_omschrijving, titel, nationaliteit_naam from Artiest
    inner join Geslacht on Artiest.geslacht_id = Geslacht.geslacht_id
    inner join Nationaliteit on Artiest.nationaliteit_id = Nationaliteit.nationaliteit_id
    where Artiest.artiest_id="' . $_GET["artiest_id"].'";');
    //get template
    $template = file_get_contents("templates/artist_detail.html");

    //fill template with data
    print MergeViewWithData($template,$data);

    ?>
</main>
</div>
</body>
</html>
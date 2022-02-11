<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
PrintHead();
PrintHeader();

//check of artiest_id had a numeric value
if ( ! is_numeric( $_GET["kunst_id"] ) ) die("Foutieve GET parameter!");

?>
<main class="detail">
    <?php
    //getting data
    $data = GetData( 'select artiest_voornaam,artiest_achternaam,kunst_naam,stijl_naam, kunst_omschrijving,afb_path from Artiest
inner join Artiest_Kunst AK on Artiest.artiest_id = AK.artiest_id
inner join Kunst K on AK.kunst_id = K.kunst_id
inner join Afbeelding A on K.kunst_id = A.kunst_id
inner join Stijl S on K.stijl_id = S.stijl_id 
where K.kunst_id="' . $_GET["kunst_id"].'";');
    //get template
    $template = file_get_contents("templates/painting_detail.html");

    //fill template with data
    print MergeViewWithData($template,$data);

    ?>
</main>
</div>
</body>
</html>
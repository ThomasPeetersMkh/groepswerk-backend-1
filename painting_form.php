<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
//load in templates
PrintHead();
PrintHeader();
?>
    <main class="fillform">

        <?php
        if ( ! is_numeric( $_GET['kunst_id']) ) die("Ongeldig argument " . $_GET['kunst_id'] . " opgegeven");

        //get data
        $data = GetData( 'select artiest_voornaam,artiest_achternaam,kunst_naam,K.stijl_id,K.kunst_id,stijl_naam, kunst_omschrijving,afb_path from Artiest
inner join Artiest_Kunst AK on Artiest.artiest_id = AK.artiest_id
inner join Kunst K on AK.kunst_id = K.kunst_id
inner join Afbeelding A on K.kunst_id = A.kunst_id
inner join Stijl S on K.stijl_id = S.stijl_id 
where K.kunst_id="' . $_GET["kunst_id"].'";');
        $row = $data[0]; //there's only 1 row in data

        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "painting_form.php"  );
        $extra_elements['select_stijl'] = MakeSelect( $fkey = 'stijl_id',
            $value = $row['stijl_id'] ,
            $sql = "select stijl_id, stijl_naam from Stijl" );


        //get template
        $output = file_get_contents("templates/painting_form.html");

        //merge
        $output = MergeViewWithData( $output, $data );
        $output = MergeViewWithExtraElements( $output, $extra_elements );
        $output = MergeViewWithErrors( $output, $errors );
        $output = RemoveEmptyErrorTags( $output, $data );

        print $output;
        ?>
    </main>
    </div>
</div>
</body>
</html>

<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
PrintHead();
PrintHeader();
?>
<main class="collection">
    <aside>
        <h2>Name</h2>
        <ul>
            <li>A-E</li>
            <li>F-J</li>
            <li>K-O</li>
            <li>P-T</li>
            <li>U-Z</li>
        </ul>
        <h2>Timeline</h2>
        <ul>
            <li>1300-1400</li>
            <li>1401-1500</li>
            <li>1501-1600</li>
            <li>1601-1700</li>
            <li>1701-1800</li>
            <li>1801-1900</li>
            <li>1901-2000</li>
            <li>from 2001</li>
        </ul>
    </aside>
    <div class="showcase">
        <?php
        //organise $GET
        $search = $_GET["search_term"];
        //get data from Artiest
        $data = GetData( 'select artiest_achternaam, geboortedatum,sterftedatum from Artiest where artiest_achternaam like "%'.$search.'%" or artiest_voornaam like "%'.$search.'%"');
        //get template from Artiest
        $template = file_get_contents("templates/artist_item.html");
        //print data from Artiest
        PrintCollection($template,$data);

        $search = $_GET["search_term"];
        //get data from Kunst
        $data = GetData( 'select kunst_naam, kunst_omschrijving, afb_path from Kunst inner join Afbeelding A on Kunst.kunst_id = A.kunst_id where kunst_naam like "%'.$search.'%"');
        //get template from Kunst
        $template = file_get_contents("templates/painting_item.html");
        //print data from Kunst
        PrintCollection($template,$data);


        ?>
    </div>

</main>
</div>
</body>
</html>

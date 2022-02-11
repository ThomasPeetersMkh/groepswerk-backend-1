<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
        //get data
        $data = GetData( "select artiest_id, artiest_achternaam, geboortedatum,sterftedatum from Artiest;" );

        //get template
        $template = file_get_contents("templates/artist_item.html");
        //merge
        PrintCollection($template,$data);
        ?>
    </div>

</main>
</div>
</body>
</html>



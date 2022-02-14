<?php
require_once("autoload.php");

DeleteItem();

//delete specific kunst_id from database plus the many to many table
function DeleteItem(){
    $sqlKunst = 'DELETE from Kunst WHERE kunst_id='.$_GET["kunst_id"].";";
    if(key_exists("kunst_id",$_GET)){
        ExecuteSQL($sqlKunst);
    }
    else{
        die;
    }
}

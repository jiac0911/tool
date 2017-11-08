<?php

if(isset($_POST["nroEntra"])){

    $nroEntra=$_POST["nroEntra"];

}if(isset($_POST["nroDatos"])){

    $nroDatos=$_POST["nroDatos"];

}if(isset($_POST["bias"])){

    $bias=$_POST["bias"];

}if(isset($_POST["alfa"])){

    $alfa=$_POST["alfa"];

}if(isset($_FILES['archivo'])){

    $tempFile = $_FILES['archivo']["tmp_name"];
    $tempFileName = $_FILES['archivo']["name"];

}

require_once('../functions/getexcel.php');

$datos=importData($bias,$tempFile);
var_dump($datos);
?>
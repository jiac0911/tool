<?php

if(isset($_POST["nroIte"])){

    $nroIte=$_POST["nroIte"];

}if(isset($_POST["bias"])){

    $bias=$_POST["bias"];

}if(isset($_POST["alfa"])){

    $alfa=$_POST["alfa"];

}if(isset($_FILES['archivo'])){

    $tempFile = $_FILES['archivo']["tmp_name"];
    $tempFileName = $_FILES['archivo']["name"];

}

require_once('../functions/getexcel.php');
require_once('../functions/perceptron.php');

$datos=importData($bias,$tempFile);
$nroEntra=sizeof($datos[1]);
$nroDatos=sizeof($datos--);


$perceptron=new Perceptron($nroEntra, $nroDatos, $alfa, $nroIte);
$perceptron->train($datos);

?>
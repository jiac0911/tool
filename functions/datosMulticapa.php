<?php

    if(isset($_POST["nroIte"])){

        $nroIte=$_POST["nroIte"];

    }if(isset($_POST["bias"])){

        $bias=$_POST["bias"];

    }if(isset($_POST["alfa"])){

        $alfa=$_POST["alfa"];

    }if(isset($_POST["nroOcultas"])){

        $alfa=$_POST["nroOcultas"];

    }if(isset($_FILES['archivo'])){

        $tempFile = $_FILES['archivo']["tmp_name"];
        $tempFileName = $_FILES['archivo']["name"];

    }

    require_once('../functions/getexcel.php');
    require_once('../functions/perceptron.php');
    require_once('../functions/adaline.php');

    $datos=importData($bias,$tempFile);
    $nroEntra=sizeof($datos[0])-2;
    $nroDatos=sizeof($datos);
    // var_dump($nroEntra);
    // die();



?>
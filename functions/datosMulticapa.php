<?php

    if(isset($_POST["numIter"])){

        $nroIte=$_POST["numIter"];

    }if(isset($_POST["bias"])){

        $bias=$_POST["bias"];

    }if(isset($_POST["alfa"])){

        $alfa=$_POST["alfa"];

    }if(isset($_POST["numOcu"])){

        $nroOcultas=$_POST["numOcu"];

    }if(isset($_POST["numSal"])){

        $nroSalidas=$_POST["numSal"];

    }if(isset($_FILES['archivo'])){

        $tempFile = $_FILES['archivo']["tmp_name"];
        $tempFileName = $_FILES['archivo']["name"];

    }

    require_once('../functions/getexcel.php');
    require_once('../perceptron/perceptron.php');
    require_once('../adaline/adaline.php');

    $datos=importDataMulti($bias,$tempFile,$nroSalidas);
    $nroEntra=sizeof($datos[1])-1-$nroSalidas;
    $nroDatos=sizeof($datos);



?>
<?php

    //require_once('../functions/datosMulticapa.php');

    include_once '../functions/perceptronMulticapa.php';

    $alfa=0.5;
    $numEntradas=2;
    $numOcultas=10;
    $numIteraciones=1000;
    $matrizDatos=array(
        array(0,0,1,0),
        array(0,1,1,1),
        array(1,0,1,1),
        array(1,1,1,0),
            );

    $perceptronM=new perceptronMulticapa($alfa,$numEntradas,$numOcultas,$numIteraciones,$matrizDatos);
    $perceptronM->entrenar();
    var_dump($perceptronM);
    die();

?>
   
<?php

    //require_once('../functions/datosMulticapa.php');

    include_once 'perceptronMulticapa.php';

    $alfa=0.05;
    $numEntradas=2;
    $numOcultas=10;
    $numSalidas=4;
    $numIteraciones=1000;
    $matrizDatos=array(
        array(0,0,1,0),
        array(0,1,1,1),
        array(1,0,1,1),
        array(1,1,1,0),
            );

    $perceptronM=new perceptronMulticapa($alfa,$numEntradas,$numOcultas,$numSalidas,$numIteraciones,$matrizDatos);
    $perceptronM->entrenar();
    var_dump($perceptronM);
    die();

?>

<?php

    //require_once('../functions/datosMulticapa.php');

    include_once '../functions/perceptronMulticapa.php';

    $alfa=0.005;
    $numEntradas=4;
    $numOcultas=3;
    $numSalidas=3;
    $numIteraciones=10000;
    /*$matrizDatos=array(
        array(0,1,1,1),
        array(1,0,1,1),
        array(1,1,1,0),
        array(0,0,1,0),
            );*/
    $matrizDatos=array(
        array(5.10,3.50,1.40,0.20,1,1,0.69735771,-0.29163324),
        array(4.90,3.00,1.40,0.20,1,1,0.69058914,-0.30860214),
        array(4.70,3.20,1.30,0.20,1,1,0.69304083,-0.2980321),
        array(4.60,3.10,1.50,0.20,1,1,0.69478335,-0.30233368)
            );

    $perceptronM=new perceptronMulticapa($alfa,$numEntradas,$numOcultas,$numSalidas,$numIteraciones,$matrizDatos);
    $perceptronM->entrenar();
    var_dump($perceptronM);
    die();

?>
   
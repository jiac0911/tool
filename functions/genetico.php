<?php

include_once 'perceptron.php';
include_once 'individuo.php';


function ruleta(){

    $individuos;
    $sumaAptitud=0;

    $datos=array(
        array(0,0,1,0);
        array(0,1,1,1);
        array(1,0,1,1);
        array(1,1,1,1);
    );

    for ($i=0; $i <100 ; $i++) {

        $perceptron =new Perceptron(2,4,0.5,1);
        $perceptron->train($datos);
        $ecm= $perceptron->ecm;
        $aptitud=(1/$ecm);

        $individuos[$i]=new Individuo($perceptron->vectorPesos,$aptitud);
        $sumaAptitud=$sumaAptitud+$aptitud;

    }

    for ($j=0; $j <100 ; $j++) {

        $individuos[$j]->setAptitudN($sumaAptitud);
    }


}






 ?>
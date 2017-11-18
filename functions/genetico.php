<?php

include_once 'perceptron.php';
include_once 'perceptronGenetico.php';
include_once 'individuo.php';

function ruleta($individuos){

    $sumaAptitud=0;
    $aptitudAcum=0;
    $hijos;

        $datos=array(
        array(0,0,1,0),
        array(0,1,1,1),
        array(1,0,1,1),
        array(1,1,1,1), );


    for ($i=0; $i <100 ; $i++) {

        $genes=$individuos[$i]->genes;
        $perceptron =new perceptronGenetico(2,4,0.5,1,$genes);
        $perceptron->train($datos);
        $ecm= $perceptron->ecm;
        $individuos[$i]->setEcm($ecm);
         if ($ecm>=0.0001) {
            $aptitud=(1/$ecm);
            $individuos[$i]->setAptitud($aptitud);
            $sumaAptitud=$sumaAptitud+$aptitud;
            $aptitud=$individuos[$i]->getAptitud();

         }
        else{
            $aptitud=(1/$ecm);
            $individuos[$i]->setAptitud($aptitud);
            $sumaAptitud=$sumaAptitud+$aptitud;
            $aptitud=$individuos[$i]->getAptitud();
            for ($j=0; $j <100 ; $j++) {
               $individuos[$j]= $individuos[$i];
            }

        }

    }

    for ($j=0; $j <100 ; $j++) {

        $aptitud=$individuos[$j]->getAptitud();
        $aptitudN=$aptitud/$sumaAptitud;
        $individuos[$j]->setAptitudN($aptitudN);
        $aptitudAcum=$aptitudAcum+$individuos[$j]->getAptitudN();
        $individuos[$j]->setAptitudAcum($aptitudAcum);

    }

    for ($k=0; $k <100 ; $k++) {
        $p=0;
        $m=0;
        $aleatorioP=mt_rand() / mt_getrandmax();
        $aleatorioM=mt_rand() / mt_getrandmax();


        while ($aleatorioP >= $individuos[$p]->getAptitudAcum()) {
            $p++;
        }
        while ($aleatorioM >= $individuos[$m]->getAptitudAcum()) {
            $m++;
        }

        $x=mt_rand() / mt_getrandmax();
        $vectorGenes[0]=$individuos[$p]->genes[0]*$x+(1-$individuos[$m]->genes[0]);
        $vectorGenes[1]=$individuos[$p]->genes[1]*$x+(1-$individuos[$m]->genes[1]);
        $vectorGenes[2]=$individuos[$p]->genes[2]*$x+(1-$individuos[$m]->genes[2]);
        $mut=1;
        if ($mut<=20) {
            $vectorGenes[0]=$vectorGenes[0]*(rand(-1,1));
            $vectorGenes[1]=$vectorGenes[1]*(rand(-1,1));
            $vectorGenes[2]=$vectorGenes[2]*(rand(-1,1));
            $mut+=1;
        }
        $hijos[$k]=new Individuo($vectorGenes);



    }
    $individuos=$hijos;
    return $individuos;

}


 ?>
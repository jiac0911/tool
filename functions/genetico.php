<?php

include_once 'perceptron.php';
include_once 'perceptronGenetico.php';
include_once 'individuo.php';

function ruleta($individuos){
    // var_dump($individuos);
    $sumaAptitud=0;
    $aptitudAcum=0;
    $hijos;
    $solved=0;

        $datos=array(
        array(0,0,1,0),
        array(1,1,1,1),
        array(1,0,1,0),
        array(0,1,1,0),
        );


    for ($i=0; $i <100 ; $i++) {

        $genes=$individuos[$i]->genes;
        $perceptron =new perceptronGenetico(2,4,0.1,1,$genes);
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
            $solved=1;
            $aptitud=$individuos[$i]->getAptitud();
            for ($j=0; $j <100 ; $j++) {
               $individuos[$j]= $individuos[$i];
            }
            $i=100;
            // var_dump($individuos[$i]);
        }

    }

    for ($j=0; $j <100 ; $j++) {

        $aptitud=$individuos[$j]->getAptitud();
        $aptitudN=$aptitud/$sumaAptitud;
        $individuos[$j]->setAptitudN($aptitudN);
        $aptitudAcum=$aptitudAcum+$individuos[$j]->getAptitudN();
        $individuos[$j]->setAptitudAcum($aptitudAcum);

    }
    // var_dump($individuos);
    for ($k=0; $k <100 ; $k++) {
        $p=0;
        $m=0;
        $aleatorioP=mt_rand() / mt_getrandmax();
        $aleatorioM=mt_rand() / mt_getrandmax();
        // $aleatorioP=0;
        // $aleatorioM=0;

        while ($aleatorioP >= $individuos[$p]->getAptitudAcum()) {
            $p++;

        }
        // echo $p."\r\n";
        while ($aleatorioM >= $individuos[$m]->getAptitudAcum()) {
            $m++;
        }
        // var_dump($individuos);
        $x=mt_rand() / mt_getrandmax();
        $y=mt_rand() / mt_getrandmax();
        $z=mt_rand() / mt_getrandmax();
        $vectorGenes[0]=$individuos[$p]->genes[0]*$x+((1-$x)*($individuos[$m]->genes[0]));
        $vectorGenes[1]=$individuos[$p]->genes[1]*$y+((1-$y)*($individuos[$m]->genes[1]));
        $vectorGenes[2]=$individuos[$p]->genes[2]*$z+((1-$z)*($individuos[$m]->genes[2]));
        // var_dump($vectorGenes);
        // $mut=1;
        // if ($mut<=20 && $solved!=1) {
        //     $vectorGenes[0]=$vectorGenes[0]+mt_rand() / mt_getrandmax()*2-1;;
        //     $vectorGenes[1]=$vectorGenes[1]+mt_rand() / mt_getrandmax()*2-1;;
        //     $vectorGenes[2]=$vectorGenes[2]+mt_rand() / mt_getrandmax()*2-1;;
        //     $mut+=1;
        // }
        $hijos[$k]=new Individuo($vectorGenes);



    }
    // echo "           otro:    ";
    $individuos=$hijos;
    // var_dump($individuos);
    return $individuos;

}


 ?>
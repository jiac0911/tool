<?php
set_time_limit ( 6000 );
require_once('../functions/genetico.php');
require_once('../functions/individuo.php');
require_once('../functions/perceptronGenetico.php');


$padres;

if(isset($_POST["nroIte"])){

    $nroIte=$_POST["nroIte"];

}

// var_dump($nroIte);
// die();
$nroIte=100;

for ($j=0; $j <100 ; $j++) {

    $x=mt_rand() / mt_getrandmax()*2-1;
    $y=mt_rand() / mt_getrandmax()*2-1;
    $z=mt_rand() / mt_getrandmax()*2-1;
    $vectorGenes[0]=$x;
    $vectorGenes[1]=$y;
    $vectorGenes[2]=$z;
    $padres[$j]=new Individuo($vectorGenes);

}
// var_dump($padres);
$individuos=$padres;

$i=0;
while ($i<$nroIte || ($individuos[0]->getEcm()>=0.0001)) {
    $individuos=ruleta($individuos);

    $i+=1;

}

        $datos=array(
        array(0,0,0,0),
        array(0,1,0,1),
        array(1,0,0,1),
        array(1,1,0,1), );

for ($i=0; $i <100 ; $i++) {

        $genes=$individuos[$i]->genes;
        $perceptron =new perceptronGenetico(2,4,0.5,1,$genes);
        $perceptron->train($datos);
        $ecm= $perceptron->ecm;
        $individuos[$i]->setEcm($ecm);
        $aptitud=(1/$ecm);
        $individuos[$i]->setAptitud($aptitud);
    }


var_dump($individuos);
die();
?>
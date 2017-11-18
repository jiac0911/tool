<?php
set_time_limit ( 600 );
require_once('../functions/genetico.php');
require_once('../functions/individuo.php');
require_once('../functions/perceptronGenetico.php');


$padres;

if(isset($_POST["nroIte"])){

    $nroIte=$_POST["nroIte"];

}

// var_dump($nroIte);
// die();
$nroIte=10000;

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
while ($i<=$nroIte || ($individuos->getEcm()>=0.0001) {
    $individuos=ruleta($individuos);
    $i+=1;
}

?>
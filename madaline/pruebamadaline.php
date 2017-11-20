<?php
require_once('madaline.php');

$datos=array(
        array(0,0,0,0,0,0),
        array(0,0,0,0,1,1),
        array(0,0,0,1,0,2),
        array(0,0,0,1,1,3),
        array(0,0,1,0,0,4),
        array(0,0,1,0,1,5),
        array(0,0,1,1,0,6),
        array(0,0,1,1,1,7),
        array(0,1,0,0,0,8),


    );
$madaline=new Madaline(5,9,0.05,10000,6);
$madaline->train($datos);
var_dump($madaline);



 ?>
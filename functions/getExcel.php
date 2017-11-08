<?php

function importData($bias, $ruta){
    $row = 1;
    $datos=array();
    $deseados=array();

    if (($handle = fopen($ruta, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            // echo "<p> $num fields in line $row: <br /></p>\n";
            for ($c=0; $c < $num; $c++) {
                // echo $data[$c] . "<br />\n";
                $datos[$row][$c]=(float)$data[$c];
            }
            $temp=array_pop($datos[$row]);
            array_push($datos[$row], (float)$bias);
            array_push($datos[$row],$temp);
            $row++;
        }
        fclose($handle);
    }
    return $datos;

}

function importDataMulti($bias, $ruta, $entradas){
    $row = 1;
    $datos=array();
    $deseados=array();

    if (($handle = fopen($ruta, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            // echo "<p> $num fields in line $row: <br /></p>\n";
            for ($c=0; $c < $num; $c++) {
                // echo $data[$c] . "<br />\n";
                if ($c==$entradas-1) {
                    # code...
                }else{
                    $datos[$row][$c]=(float)$data[$c];
                }
                $datos[$row][$c]=(float)$data[$c];

            }
            $temp=array_pop($datos[$row]);
            array_push($datos[$row], (float)$bias);
            array_push($datos[$row],$temp);
            $row++;
        }
        fclose($handle);
    }
    return $datos;

}

// $datos=importData(0,'test.csv');

// var_dump($datos);
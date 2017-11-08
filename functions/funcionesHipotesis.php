<?php

function datosGrafica($numEntradas,$numDatos,$entradas,$salidas,$pesos)
{
    $datos;
    for ($k=0; $k <$numDatos ; $k++) {
        # code...
        $terminoXW=0;
        for ($i=1; $i <$numEntradas ; $i++) {
            $terminoXW=$terminoXW+($entradas[$k][$i]*$pesos[$i]);

        }
        $datos[$k][0]=(($salidas[$k])-$terminoXW)/($pesos[0]);
        $datos[$k][1]=$entradas[$k][1];

    }
    return $datos;
}


?>
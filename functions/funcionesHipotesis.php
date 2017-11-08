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
        $datos[0][$k]=(($salidas[$k])-$terminoXW)/($pesos[0]);
        $datos[1][$k]=$entradas[$k][1];

    }
    return $datos;
}


?>
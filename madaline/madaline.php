<?php

class Madaline
{
    protected $numEntradas;
    protected $numDatos;
    public $numOcultas;
    protected $bias;
    protected $alpha;
    public $matrizPesos;
    public $vectorPesosC;
    public $iteraciones = 0;
    public $ecm = 0;
    protected $error = 0;
    public $salida = null;

    public function __construct($numEntradas,$numDatos, $alpha,$iteraciones,$ocultas)
    {
        if ($numEntradas < 1) {
            throw new \InvalidArgumentException();
        } elseif ($alpha <= 0 || $alpha > 1) {
            throw new \InvalidArgumentException();
        }
        $this->numEntradas = $numEntradas;
        $this->alpha = $alpha;
        $this->iteraciones = $iteraciones;
        $this->numDatos = $numDatos;
        $this->numOcultas = $ocultas;
        for ($j=0; $j < $this->numOcultas ; $j++) {

                for ($i = 0; $i < $this->numEntradas; $i++) {
                    $this->matrizPesos[$j][$i] = rand()/getrandmax() * 2 - 1;
                }

            $this->vectorPesosC[$j]=rand()/getrandmax() * 2 - 1;
        }

    }

    public function train($datos)
    {

        $a;
        $cont = 1;
        for ($l=1; $l < $this->iteraciones ; $l++) {
            # code...


            $this->ecm=0;
            for ($k=0; $k < $this->numDatos; $k++) {
                $y = 0;
                for ($j=0; $j < $this->numOcultas ; $j++) {

                    $a[$j] = 0;
                    if ($j==0) {
                        $a[$j] = 1;
                    }
                    else{
                        for ($h=0; $h < $this->numEntradas; $h++) {
                          $a[$j] = $a[$j] + ($datos[$k][$h])*($this->matrizPesos[$j][$h]);
                        }
                    }
                    $a[$j]=1/(1+(exp(-$a[$j])));
                    $y += $a[$j] * $this->vectorPesosC[$j];
                }
                $y = 1 / (1 + (exp(-$y)));
                echo $this->numEntradas;
                $er = $y - $datos[$k][$this->numEntradas];

                $this->ecm += abs($er);
                for ($j=0; $j < $this->numOcultas ; $j++) {
                    for ($i=0 ; $i < $this->numEntradas ; $i++ ) {
                        $this->matrizPesos[$j][$i] = $this->matrizPesos[$j][$i] - (($this->alpha) * $er * ($this->vectorPesosC[$j]) * ($datos[$k][$i] )* $y * (1 - $y) * $a[$j] * (1 - $a[$j]));
                    }
                    $this->vectorPesosC[$j] = $this->vectorPesosC[$j] - ($this->alpha * $er * $a[$j] * $y * (1 - $y));
                }
            }

            if ($this->ecm == 0) {
                $l = $this->iteraciones;

            }

        }
    }

}

?>
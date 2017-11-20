<?php

class PerceptronGenetico
{
    protected $numEntradas;
    protected $numDatos;
    protected $bias;
    protected $alpha;
    public $vectorPesos;
    public $iteraciones = 0;
    public $ecm = 0;
    protected $error = 0;
    public $salida = null;

    public function __construct($numEntradas,$numDatos, $alpha,$iteraciones,$vectorPesos)
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
        $this->vectorPesos = $vectorPesos;

    }
    public function getSalida()
    {
        if(is_null($this->salida))
        {
            throw new \RuntimeException();
        }
        else
        {
            return $this->salida;
        }
    }
    /**
     * @return array
     */
    public function getVectorPesos()
    {
        return $this->VectorPesos;
    }
    /**
     * @param array $weightVector
     *
     * @throws \InvalidArgumentException
     */
    public function setVectorPesos($VectorPesos)
    {
        if (!is_array($VectorPesos) || count($VectorPesos) != $this->numEntradas) {
            throw new \InvalidArgumentException();
        }
        $this->VectorPesos = $VectorPesos;
    }

    public function train($datos)
    {

        for ($j=0; $j < $this->iteraciones ; $j++) {
            # code...

        $this->ecm=0;


            for ($k=0; $k < $this->numDatos; $k++) {
                $a=0;

                for ($i=0 ; $i < $this->numEntradas ; $i++ ) {
                    $a=$a + ($datos[$k][$i] * $this->vectorPesos[$i]);
                }

                if ($a >= 0) {
                    $yk=1;
                }
                else{
                    $yk=0;
                }
                $this->salida[$k]=$yk;
                $this->error=$datos[$k][$this->numEntradas-1]-$yk;
                // echo $datos[$k][$this->numEntradas-1]."</br>";

                $this->ecm= $this->ecm + (pow($this->error,2))/(2*$this->numDatos);

                for ($i=0; $i < $this->numEntradas ; $i++) {
                    $this->vectorPesos[$i]=$this->vectorPesos[$i] + (($this->error)*$datos[$k][$i]);
                }
            }

            if ($this->ecm==0) {
                $j=$this->iteraciones;
            }

        }
    }
    private function dotProduct($vector1, $vector2)
    {
        return array_sum(
            array_map(
                function ($a, $b) {
                    return $a * $b;
                },
                $vector1,
                $vector2
            )
        );
    }
}
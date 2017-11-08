<?php

class Perceptron
{
    protected $numEntradas;
    protected $numDatos;
    protected $bias;
    protected $alpha;
    public $vectorPesos;
    protected $iteraciones = 0;
    protected $ecm = 0;
    protected $error = 0;
    protected $salida = null;

    public function __construct($numEntradas,$numDatos, $alpha,$iteraciones)
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

        for ($i = 0; $i < $this->numEntradas; $i++) {
            $this->vectorPesos[$i] = rand()/getrandmax() * 2 - 1;
        }
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


/*
    public function getLearningRate()
    {
        return $this->learningRate;
    }
    /**
     * @param float $learningRate
     *
     * @throws \InvalidArgumentException
     */
    /*
    public function setLearningRate($learningRate)
    {
        if (!is_numeric($learningRate) || $learningRate <= 0 || $learningRate > 1) {
            throw new \InvalidArgumentException();
        }
        $this->learningRate = $learningRate;
    }
    /**
     * @return int
     *//*
    public function getIterationError()
    {
        return $this->iterationError;
    }
    /**
     * @param array $entradas
     *
     * @return int (0 for false, 1 = true)
     * @throws \InvalidArgumentException
     *//*
    public function test($entradas)
    {
        if (!is_array($entradas) || count($entradas) != $this->vectorLength) {
            throw new \InvalidArgumentException();
        }
        $testResult = $this->dotProduct($this->weightVector, $entradas) + $this->bias;
        $this->output = $testResult > 0 ? 1 : 0;
        return $this->output;
    }
    /**
     * @param array $entradas array of input signals
     * @param int  $deseados      1 = true / 0 = false
     *
     * @throws \InvalidArgumentException
     */
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

                $this->ecm= $this->ecm + (($this->error)^2)/(2*$this->numDatos);

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
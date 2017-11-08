<?php

class perceptronMulticapa 
{
	var $alfa;
	var $numDatos;
	var $numEntradas;
	var $numOcultas;
	var $numSalidas;
	var $numIteraciones;
	var $matrizDatos=array();
	var $matrizW=array();
	var $matrizC=array();
	var $ecm;	
	
	function __construct($alfa,$numEntradas,$numOcultas,$numIteraciones,$matrizDatos)
	{
		$this->alfa=$alfa;
		$this->numEntradas=$numEntradas+1;
		$this->numOcultas=$numOcultas;
		$this->numIteraciones=$numIteraciones;
		$this->matrizDatos=$matrizDatos;
		$this->numDatos=count($this->matrizDatos);
		$this->numSalidas=count($this->matrizDatos[0])-$this->numEntradas;
	}

	function generarPesos(){

		for ($j=0; $j <$this->numOcultas; $j++) { 
			for ($i=0; $i <$this->numEntradas; $i++) { 
				$this->matrizW[$j][$i] = (-1) + 2 * rand();
			}
		}

		for ($k=0; $k <$this->numSalidas; $k++) { 
			for ($j=0; $j<=$this->numOcultas ; $j++) { 
				$this->matrizC[$k][$j] = (-1) + 2 * rand();
			}
		}
	}

	function actualizarPesos(){

		for ($j=0; $j <=$this->numOcultas; $j++) { 
			for ($k=0; $k<$this->numSalidas ; $k++) { 
				$this->matrizC[$k][$j] = $this->matrizC[$k][$j] + $this->alfa * $erk[$k] * $yk[$k] * (1 - $yk[$k]) * $h[$j];
			}
		}

		for ($i=0; $i <$this->numEntradas; $i++) { 
			for ($j=0; $j <$this->numOcultas; $j++) { 
				$this->matrizW[$j][$i] = $this->matrizW[$j][$i] + $this->alfa * $dl[$j] * $h[$j+1] * (1 - $h[j+1]) * $x[$i];
			}
		}
	}

	function entrenar(){

		generarPesos();

		for ($m=0; $m <$this->numIteraciones; $m++) { 
			
			$this->ecm=0;

			for ($n=0; $n <$this->numDatos; $n++) { 

				//Inicializan entradas y se calcula función de activación (ocultas)

				$h[0]=1

				for ($j=0; $j <$this->numOcultas; $j++) { 

					$aj[$j]=0;

					for ($i=0 ; $i <$this->numEntradas; $i++) { 
						
						$x[$i]=$this->matrizDatos[$n][$i];
						$aj[$j] =$aj[$j] + $x[$i] * $matrizW[$j][$i];
					}

					$h[$j+1] = 1 / (1 + exp(-$aj[$j]));
				}

				//Inicializan las entradas y se calcula función de activación (salida)

				for ($k=0; $k <$this->numSalidas; $k++) { 
					
					$ak[$k]=0;

					for ($j=0; $j <=$this->numOcultas; $j++) { 
						
						$ak[$k] = $ak[$k] + $h[$j] * $matrizC[$k][$j];
					}

					$yk[$k] = 1 / (1 + exp(-$ak[$k]));
					$desk[$k]=$this->matrizDatos[$n][$this->numEntradas+$k];
					$erk[$k] = $desk[$k] - $yk[$k];
					$this->ecm = $this->ecm + (pow($erk[$k],2) / (2 * $this->numDatos);
				}

				//Sensitividad: Cuánto error se envía a todas las salidas

				for ($j=0; $j <$this->numOcultas; $j++) { 
					
					$dl[$j]=0;

					for ($k=0; $k <$this->numSalidas; $k++) {

						$dl[$j] = $dl[$j] + $erk[$k] * $yk[$k] * (1 - $yk[$k]) * $matrizC[$k][$j+1];
					}
				}

				actualizarPesos();
			}

			if ($this->ecm < 0.001) {
				$m=$this->numIteraciones;
			}
		}
	}
}












?>
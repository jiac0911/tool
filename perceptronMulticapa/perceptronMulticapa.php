<?php

class perceptronMulticapa 
{
	protected $alfa;
	protected $numDatos;
	protected $numEntradas;
	protected $numOcultas;
	protected $numSalidas;
	protected $numIteraciones;
	protected $matrizDatos;
	protected $ecm,$erk,$yk,$h,$dl,$x;
	protected $ak,$desk,$aj;
	protected $matrizC,$matrizW;

	
	function __construct($alfa,$numEntradas,$numOcultas,$numSalidas,$numIteraciones,$matrizDatos)
	{
		$this->alfa=$alfa;
		$this->numEntradas=$numEntradas+1;
		$this->numOcultas=$numOcultas;
		$this->numSalidas=$numSalidas;
		$this->numIteraciones=$numIteraciones;
		$this->matrizDatos=$matrizDatos;
		$this->numDatos=count($this->matrizDatos);
		//$this->numSalidas=count($this->matrizDatos[0])-$this->numEntradas;
	}

	function generarPesos(){

		for ($j=0; $j <$this->numOcultas; $j++) { 
			for ($i=0; $i <$this->numEntradas; $i++) { 
				$this->matrizW[$j][$i] = mt_rand()/mt_getrandmax()*2-1;

			}
		}

		for ($k=0; $k <$this->numSalidas; $k++) { 
			for ($j=0; $j<=$this->numOcultas ; $j++) { 
				$this->matrizC[$k][$j] =  mt_rand()/mt_getrandmax()*2-1;
			}
		}
	}

	function actualizarPesos(){

		for ($j=0; $j<=$this->numOcultas; $j++) { 
			for ($k=0; $k<$this->numSalidas; $k++) { 
				$this->matrizC[$k][$j] = $this->matrizC[$k][$j] + $this->alfa * $this->erk[$k] * $this->yk[$k] * (1 - $this->yk[$k]) * $this->h[$j];
			}
		}

		for ($i=0; $i<$this->numEntradas; $i++) { 
			for ($j=0; $j<$this->numOcultas; $j++) { 
				$this->matrizW[$j][$i] = $this->matrizW[$j][$i] + $this->alfa * $this->dl[$j] * $this->h[$j+1] * (1 - $this->h[$j+1]) * $this->x[$i];
			}
		}

	}

	function entrenar(){

		$this->generarPesos();


		for ($m=0; $m<$this->numIteraciones; $m++) { 
			
			$this->ecm[$m]=0;

			for ($n=0; $n<$this->numDatos; $n++) { 

				//Inicializan entradas y se calcula función de activación (ocultas)

				$this->h[0]=1;

				for ($j=0; $j<$this->numOcultas; $j++) { 

					$this->aj[$j]=0;

					for ($i=0 ; $i<$this->numEntradas; $i++) { 
						
						$this->x[$i]=$this->matrizDatos[$n][$i];
						$this->aj[$j] =$this->aj[$j] + ($this->x[$i] * $this->matrizW[$j][$i]);
					}

					$this->h[$j+1] = 1/(1 + exp(-($this->aj[$j])));
				}

				//Inicializan las entradas y se calcula función de activación (salida)

				for ($k=0; $k<$this->numSalidas; $k++) { 
					
					$this->ak[$k]=0;

					for ($j=0; $j<=$this->numOcultas; $j++) { 
						
						$this->ak[$k] = $this->ak[$k] + ($this->h[$j] * $this->matrizC[$k][$j]);
					}

					$this->yk[$k] = 1/(1 + exp(-($this->ak[$k])));
					$this->desk[$k]= $this->matrizDatos[$n][$this->numEntradas+$k];
					$this->erk[$k] = $this->desk[$k] - $this->yk[$k];
					$this->ecm[$m] = $this->ecm[$m] + (pow($this->erk[$k],2))/(2 * $this->numDatos);
				}

				//Sensitividad: Cuánto error se envía a todas las salidas

				for ($j=0; $j<$this->numOcultas; $j++) { 
					
					$this->dl[$j]=0;

					for ($k=0; $k<$this->numSalidas; $k++) {

						$this->dl[$j] = $this->dl[$j] + $this->erk[$k] * $this->yk[$k] * (1 - $this->yk[$k]) * $this->matrizC[$k][$j];
					}
				}

				$this->actualizarPesos();
			}

			if ($this->ecm[$m] <= 0.0001) {
				$m=$this->numIteraciones;
			}
		}
	}
}












?>
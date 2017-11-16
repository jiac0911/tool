<?php

/**
*
*/
class Individuo
{
    protected $genes;
    protected $aptitud;
    protected $aptitudN;
    protected $aptitudAcum;

    public function __construct($genes,$aptitud)
    {
        $this->genes=$genes;
        $this->aptitud=$aptitud;
    }

    function setAptitudN($aptitudN){

        $this->aptitudN=$aptitudN;
    }

    function setAptitudAcum($aptitudAcum){

        $this->aptitudAcum=$aptitudAcum;
    }
}



 ?>
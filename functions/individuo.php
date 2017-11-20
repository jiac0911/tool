<?php

/**
*
*/
class Individuo
{
    public $genes;
    public $aptitud;
    public $aptitudN;
    public $aptitudAcum;
    public $ecm;

    public function __construct($genes)
    {
        $this->genes=$genes;
    }

    function setAptitudN($aptitudN){

        $this->aptitudN=$aptitudN;
    }

    function getAptitudN(){

        return $this->aptitudN;
    }

    function setAptitud($aptitud){

        $this->aptitud=$aptitud;
    }
    function getAptitud(){

        return $this->aptitud;
    }

    function setAptitudAcum($aptitudAcum){

        $this->aptitudAcum=$aptitudAcum;
    }
    function setEcm($ecm){

        $this->ecm=$ecm;
    }

    function getAptitudAcum(){

        return $this->aptitudAcum;
    }

        function getEcm(){

        return $this->ecm;
    }
}



 ?>
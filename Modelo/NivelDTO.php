<?php
class NivelDTO {
    public $IdNivel;
    public $RangoEdad;
    public $NombreNivel;

    public function NivelDTO(){
    }

    function getIdNivel() {
        return $this->IdNivel;
    }

    function setIdNivel($IdNivel) {
        return $this->IdNivel = $IdNivel;
    }

    function getRangoEdad() {
        return $this->RangoEdad;
    }

    function setRangoEdad($RangoEdad) {
        return $this->RangoEdad = $RangoEdad;
    }

    function getNombreNivel() {
        return $this->NombreNivel;
    }

    function setNombreNivel($NombreNivel) {
        return $this->NombreNivel = $NombreNivel;
    }

}
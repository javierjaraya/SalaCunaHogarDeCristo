<?php
class TipoopinionDTO {
    public $IdTipoOpinion;
    public $Nombre;

    public function TipoopinionDTO(){
    }

    function getIdTipoOpinion() {
        return $this->IdTipoOpinion;
    }

    function setIdTipoOpinion($IdTipoOpinion) {
        return $this->IdTipoOpinion = $IdTipoOpinion;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function setNombre($Nombre) {
        return $this->Nombre = $Nombre;
    }

}
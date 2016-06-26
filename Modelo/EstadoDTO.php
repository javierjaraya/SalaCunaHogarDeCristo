<?php
class EstadoDTO {
    public $IdEstado;
    public $Nombre;

    public function EstadoDTO(){
    }

    function getIdEstado() {
        return $this->IdEstado;
    }

    function setIdEstado($IdEstado) {
        return $this->IdEstado = $IdEstado;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function setNombre($Nombre) {
        return $this->Nombre = $Nombre;
    }

}
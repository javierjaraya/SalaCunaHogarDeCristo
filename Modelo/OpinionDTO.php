<?php
class OpinionDTO {
    public $IdOpinion;
    public $Fecha;
    public $Descripcion;
    public $IdTipoOpinion;
    public $RunPersona;
    public $Nombres;
    public $Apellidos;

    public function OpinionDTO(){
    }

    function getIdOpinion() {
        return $this->IdOpinion;
    }

    function setIdOpinion($IdOpinion) {
        return $this->IdOpinion = $IdOpinion;
    }
    function getNombres() {
        return $this->Nombres;
    }

    function getApellidos() {
        return $this->Apellidos;
    }

    function setNombres($Nombres) {
        $this->Nombres = $Nombres;
    }

    function setApellidos($Apellidos) {
        $this->Apellidos = $Apellidos;
    }

        function getFecha() {
        return $this->Fecha;
    }

    function setFecha($Fecha) {
        return $this->Fecha = $Fecha;
    }

    function getDescripcion() {
        return $this->Descripcion;
    }

    function setDescripcion($Descripcion) {
        return $this->Descripcion = $Descripcion;
    }

    function getIdTipoOpinion() {
        return $this->IdTipoOpinion;
    }

    function setIdTipoOpinion($IdTipoOpinion) {
        return $this->IdTipoOpinion = $IdTipoOpinion;
    }

    function getRunPersona() {
        return $this->RunPersona;
    }

    function setRunPersona($RunPersona) {
        return $this->RunPersona = $RunPersona;
    }

}
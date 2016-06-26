<?php
class MensajeDTO {
    public $idMensaje;
    public $runDesde;
    public $runPara;
    public $hora;
    public $mensaje;
    public $estado;
    
    public $nombreDesde;
    public $nombrePara;
    public $apellidosDesde;
    public $apallidosPara;

    public function MensajeDTO(){
    }

    function getIdMensaje() {
        return $this->idMensaje;
    }

    function setIdMensaje($idMensaje) {
        return $this->idMensaje = $idMensaje;
    }

    function getRunDesde() {
        return $this->runDesde;
    }

    function setRunDesde($runDesde) {
        $this->runDesde = $runDesde;
    }
    
    function getRunPara() {
        return $this->runPara;
    }

    function setRunPara($runPara) {
        return $this->runPara = $runPara;
    }

    function getHora() {
        return $this->hora;
    }

    function setHora($hora) {
        return $this->hora = $hora;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function setMensaje($mensaje) {
        return $this->mensaje = $mensaje;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        return $this->estado = $estado;
    }
    
    function getNombreDesde() {
        return $this->nombreDesde;
    }

    function getNombrePara() {
        return $this->nombrePara;
    }

    function getApellidosDesde() {
        return $this->apellidosDesde;
    }

    function getApallidosPara() {
        return $this->apallidosPara;
    }

    function setNombreDesde($nombreDesde) {
        $this->nombreDesde = $nombreDesde;
    }

    function setNombrePara($nombrePara) {
        $this->nombrePara = $nombrePara;
    }

    function setApellidosDesde($apellidosDesde) {
        $this->apellidosDesde = $apellidosDesde;
    }

    function setApallidosPara($apallidosPara) {
        $this->apallidosPara = $apallidosPara;
    }



}
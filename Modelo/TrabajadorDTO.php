<?php
class TrabajadorDTO {
    public $RunPersona;
    public $Titulo;
    public $Cargo;
    
    public $persona;
    public $usuario;

    public function TrabajadorDTO(){
    }

    function getRunPersona() {
        return $this->RunPersona;
    }

    function setRunPersona($RunPersona) {
        return $this->RunPersona = $RunPersona;
    }

    function getTitulo() {
        return $this->Titulo;
    }

    function setTitulo($Titulo) {
        return $this->Titulo = $Titulo;
    }

    function getCargo() {
        return $this->Cargo;
    }

    function setCargo($Cargo) {
        return $this->Cargo = $Cargo;
    }

    function getPersona() {
        return $this->persona;
    }

    function setPersona($persona) {
        $this->persona = $persona;
    }
    
    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }   
}
<?php
class UsuarioDTO {
    public $RunPersona;
    public $Clave;
    public $IdPerfil;

    public $persona;
    
    public function UsuarioDTO(){
    }

    function getRunPersona() {
        return $this->RunPersona;
    }

    function setRunPersona($RunPersona) {
        return $this->RunPersona = $RunPersona;
    }

    function getClave() {
        return $this->Clave;
    }

    function setClave($Clave) {
        return $this->Clave = $Clave;
    }

    function getIdPerfil() {
        return $this->IdPerfil;
    }

    function setIdPerfil($IdPerfil) {
        return $this->IdPerfil = $IdPerfil;
    }

    function getPersona() {
        return $this->persona;
    }

    function setPersona($persona) {
        $this->persona = $persona;
    }
}
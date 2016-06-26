<?php
class PerfilDTO {
    public $IdPerfil;
    public $Nombre;

    public function PerfilDTO(){
    }

    function getIdPerfil() {
        return $this->IdPerfil;
    }

    function setIdPerfil($IdPerfil) {
        return $this->IdPerfil = $IdPerfil;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function setNombre($Nombre) {
        return $this->Nombre = $Nombre;
    }

}
<?php
class ApoderadoDTO {
    public $RunPersona;
    public $SituacionSocioeconomica;
    
    public $Nombres;
    public $Apellidos;
    public $Sexo;
    public $FechaNacimiento;
    public $Telefono;
    public $Direccion;
    public $IdEstado;
    
    public $Clave;
    public $IdPerfil;

    public function ApoderadoDTO(){
    }

    function getClave() {
        return $this->Clave;
    }

    function getIdPerfil() {
        return $this->IdPerfil;
    }

    function setClave($Clave) {
        $this->Clave = $Clave;
    }

    function setIdPerfil($IdPerfil) {
        $this->IdPerfil = $IdPerfil;
    }

    function getRunPersona() {
        return $this->RunPersona;
    }

    function setRunPersona($RunPersona) {
        return $this->RunPersona = $RunPersona;
    }

    function getSituacionSocioeconomica() {
        return $this->SituacionSocioeconomica;
    }

    function setSituacionSocioeconomica($SituacionSocioeconomica) {
        return $this->SituacionSocioeconomica = $SituacionSocioeconomica;
    }

    function getNombres() {
        return $this->Nombres;
    }

    function getApellidos() {
        return $this->Apellidos;
    }

    function getSexo() {
        return $this->Sexo;
    }

    function getFechaNacimiento() {
        return $this->FechaNacimiento;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function getDireccion() {
        return $this->Direccion;
    }

    function getIdEstado() {
        return $this->IdEstado;
    }

    function setNombres($Nombres) {
        $this->Nombres = $Nombres;
    }

    function setApellidos($Apellidos) {
        $this->Apellidos = $Apellidos;
    }

    function setSexo($Sexo) {
        $this->Sexo = $Sexo;
    }

    function setFechaNacimiento($FechaNacimiento) {
        $this->FechaNacimiento = $FechaNacimiento;
    }

    function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }

    function setDireccion($Direccion) {
        $this->Direccion = $Direccion;
    }

    function setIdEstado($IdEstado) {
        $this->IdEstado = $IdEstado;
    }


}
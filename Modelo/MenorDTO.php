<?php
class MenorDTO {
    public $RunPersona;
    public $FechaMatricula;
    public $IdNivel;
    public $RunApoderado;
    
    public $Nombres;
    public $Apellidos;
    public $Sexo;
    public $FechaNacimiento;
    public $Telefono;
    public $Direccion;
    public $IdEstado;
    public $SituacionSocioeconomica;

    public function MenorDTO(){
    }
    function getSituacionSocioeconomica() {
        return $this->SituacionSocioeconomica;
    }

    function setSituacionSocioeconomica($SituacionSocioeconomica) {
        $this->SituacionSocioeconomica = $SituacionSocioeconomica;
    }

        function getRunPersona() {
        return $this->RunPersona;
    }

    function setRunPersona($RunPersona) {
        return $this->RunPersona = $RunPersona;
    }

    function getFechaMatricula() {
        return $this->FechaMatricula;
    }

    function setFechaMatricula($FechaMatricula) {
        return $this->FechaMatricula = $FechaMatricula;
    }

    function getIdNivel() {
        return $this->IdNivel;
    }

    function setIdNivel($IdNivel) {
        return $this->IdNivel = $IdNivel;
    }

    function getRunApoderado() {
        return $this->RunApoderado;
    }

    function setRunApoderado($RunApoderado) {
        return $this->RunApoderado = $RunApoderado;
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
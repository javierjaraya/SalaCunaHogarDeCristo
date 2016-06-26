<?php
class PersonaDTO {
    public $RunPersona;
    public $Nombres;
    public $Apellidos;
    public $Sexo;
    public $FechaNacimiento;
    public $Telefono;
    public $Direccion;
    public $IdEstado;

    public function PersonaDTO(){
    }

    function getRunPersona() {
        return $this->RunPersona;
    }

    function setRunPersona($RunPersona) {
        return $this->RunPersona = $RunPersona;
    }

    function getNombres() {
        return $this->Nombres;
    }

    function setNombres($Nombres) {
        return $this->Nombres = $Nombres;
    }

    function getApellidos() {
        return $this->Apellidos;
    }

    function setApellidos($Apellidos) {
        return $this->Apellidos = $Apellidos;
    }

    function getSexo() {
        return $this->Sexo;
    }

    function setSexo($Sexo) {
        return $this->Sexo = $Sexo;
    }

    function getFechaNacimiento() {
        return $this->FechaNacimiento;
    }

    function setFechaNacimiento($FechaNacimiento) {
        return $this->FechaNacimiento = $FechaNacimiento;
    }

    function getTelefono() {
        return $this->Telefono;
    }

    function setTelefono($Telefono) {
        return $this->Telefono = $Telefono;
    }

    function getDireccion() {
        return $this->Direccion;
    }

    function setDireccion($Direccion) {
        return $this->Direccion = $Direccion;
    }

    function getIdEstado() {
        return $this->IdEstado;
    }

    function setIdEstado($IdEstado) {
        return $this->IdEstado = $IdEstado;
    }

}
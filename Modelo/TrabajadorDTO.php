<?php
class TrabajadorDTO {
    public $RunPersona;
    public $Titulo;
    public $Cargo;
    
    public $IdNivel;
    
    public $Nombres;
    public $Apellidos;
    public $Sexo;
    public $FechaNacimiento;
    public $Telefono;
    public $Direccion;
    public $IdEstado;
    
    public $persona;
    public $usuario;

    public function TrabajadorDTO(){
    }
    
    function getIdNivel() {
        return $this->IdNivel;
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

    function setIdNivel($IdNivel) {
        $this->IdNivel = $IdNivel;
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
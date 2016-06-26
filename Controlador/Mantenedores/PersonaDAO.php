<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/PersonaDTO.php';

class PersonaDAO{
    private $conexion;

    public function PersonaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($RunPersona) {
        $this->conexion->conectar();
        $query = "DELETE FROM persona WHERE  RunPersona = '".$RunPersona."' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM persona";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $personas = array();
        while ($fila = $result->fetch_row()) {
            $persona = new PersonaDTO();
            $persona->setRunPersona($fila[0]);
            $persona->setNombres($fila[1]);
            $persona->setApellidos($fila[2]);
            $persona->setSexo($fila[3]);
            $persona->setFechaNacimiento($fila[4]);
            $persona->setTelefono($fila[5]);
            $persona->setDireccion($fila[6]);
            $persona->setIdEstado($fila[7]);
            $personas[$i] = $persona;
            $i++;
        }
        $this->conexion->desconectar();
        return $personas;
    }

    public function findByID($RunPersona) {
        $this->conexion->conectar();
        $query = "SELECT * FROM persona WHERE  RunPersona = '".$RunPersona."' ";
        $result = $this->conexion->ejecutar($query);
        $persona = new PersonaDTO();
        while ($fila = $result->fetch_row()) {
            $persona->setRunPersona($fila[0]);
            $persona->setNombres($fila[1]);
            $persona->setApellidos($fila[2]);
            $persona->setSexo($fila[3]);
            $persona->setFechaNacimiento($fila[4]);
            $persona->setTelefono($fila[5]);
            $persona->setDireccion($fila[6]);
            $persona->setIdEstado($fila[7]);
        }
        $this->conexion->desconectar();
        return $persona;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM persona WHERE  upper(RunPersona) LIKE upper('".$cadena."')  OR  upper(Nombres) LIKE upper('".$cadena."')  OR  upper(Apellidos) LIKE upper('".$cadena."')  OR  upper(Sexo) LIKE upper('".$cadena."')  OR  upper(FechaNacimiento) LIKE upper('".$cadena."')  OR  upper(Telefono) LIKE upper(".$cadena.")  OR  upper(Direccion) LIKE upper('".$cadena."')  OR  upper(IdEstado) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $personas = array();
        while ($fila = $result->fetch_row()) {
            $persona = new PersonaDTO();
            $persona->setRunPersona($fila[0]);
            $persona->setNombres($fila[1]);
            $persona->setApellidos($fila[2]);
            $persona->setSexo($fila[3]);
            $persona->setFechaNacimiento($fila[4]);
            $persona->setTelefono($fila[5]);
            $persona->setDireccion($fila[6]);
            $persona->setIdEstado($fila[7]);
            $personas[$i] = $persona;
            $i++;
        }
        $this->conexion->desconectar();
        return $personas;
    }

    public function save($persona) {
        $this->conexion->conectar();
        $query = "INSERT INTO persona (RunPersona,Nombres,Apellidos,Sexo,FechaNacimiento,Telefono,Direccion,IdEstado)"
                . " VALUES ('".$persona->getRunPersona()."' , '".$persona->getNombres()."' , '".$persona->getApellidos()."' , '".$persona->getSexo()."' , '".$persona->getFechaNacimiento()."' ,  ".$persona->getTelefono()." , '".$persona->getDireccion()."' ,  ".$persona->getIdEstado()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($persona) {
        $this->conexion->conectar();
        $query = "UPDATE persona SET "
                . "  Nombres = '".$persona->getNombres()."' ,"
                . "  Apellidos = '".$persona->getApellidos()."' ,"
                . "  Sexo = '".$persona->getSexo()."' ,"
                . "  FechaNacimiento = '".$persona->getFechaNacimiento()."' ,"
                . "  Telefono =  ".$persona->getTelefono()." ,"
                . "  Direccion = '".$persona->getDireccion()."' ,"
                . "  IdEstado =  ".$persona->getIdEstado()." "
                . " WHERE  RunPersona = '".$persona->getRunPersona()."' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}
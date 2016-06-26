<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/EstadoDTO.php';

class EstadoDAO{
    private $conexion;

    public function EstadoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($IdEstado) {
        $this->conexion->conectar();
        $query = "DELETE FROM estado WHERE  IdEstado =  ".$IdEstado." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM estado";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $estados = array();
        while ($fila = $result->fetch_row()) {
            $estado = new EstadoDTO();
            $estado->setIdEstado($fila[0]);
            $estado->setNombre($fila[1]);
            $estados[$i] = $estado;
            $i++;
        }
        $this->conexion->desconectar();
        return $estados;
    }

    public function findByID($IdEstado) {
        $this->conexion->conectar();
        $query = "SELECT * FROM estado WHERE  IdEstado =  ".$IdEstado." ";
        $result = $this->conexion->ejecutar($query);
        $estado = new EstadoDTO();
        while ($fila = $result->fetch_row()) {
            $estado->setIdEstado($fila[0]);
            $estado->setNombre($fila[1]);
        }
        $this->conexion->desconectar();
        return $estado;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM estado WHERE  upper(IdEstado) LIKE upper(".$cadena.")  OR  upper(Nombre) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $estados = array();
        while ($fila = $result->fetch_row()) {
            $estado = new EstadoDTO();
            $estado->setIdEstado($fila[0]);
            $estado->setNombre($fila[1]);
            $estados[$i] = $estado;
            $i++;
        }
        $this->conexion->desconectar();
        return $estados;
    }

    public function save($estado) {
        $this->conexion->conectar();
        $query = "INSERT INTO estado (IdEstado,Nombre)"
                . " VALUES ( ".$estado->getIdEstado()." , '".$estado->getNombre()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($estado) {
        $this->conexion->conectar();
        $query = "UPDATE estado SET "
                . "  Nombre = '".$estado->getNombre()."' "
                . " WHERE  IdEstado =  ".$estado->getIdEstado()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}
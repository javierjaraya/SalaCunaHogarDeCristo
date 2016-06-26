<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/TipoopinionDTO.php';

class TipoopinionDAO{
    private $conexion;

    public function TipoopinionDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($IdTipoOpinion) {
        $this->conexion->conectar();
        $query = "DELETE FROM tipoopinion WHERE  IdTipoOpinion =  ".$IdTipoOpinion." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM tipoopinion";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $tipoopinions = array();
        while ($fila = $result->fetch_row()) {
            $tipoopinion = new TipoopinionDTO();
            $tipoopinion->setIdTipoOpinion($fila[0]);
            $tipoopinion->setNombre($fila[1]);
            $tipoopinions[$i] = $tipoopinion;
            $i++;
        }
        $this->conexion->desconectar();
        return $tipoopinions;
    }

    public function findByID($IdTipoOpinion) {
        $this->conexion->conectar();
        $query = "SELECT * FROM tipoopinion WHERE  IdTipoOpinion =  ".$IdTipoOpinion." ";
        $result = $this->conexion->ejecutar($query);
        $tipoopinion = new TipoopinionDTO();
        while ($fila = $result->fetch_row()) {
            $tipoopinion->setIdTipoOpinion($fila[0]);
            $tipoopinion->setNombre($fila[1]);
        }
        $this->conexion->desconectar();
        return $tipoopinion;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM tipoopinion WHERE  upper(IdTipoOpinion) LIKE upper(".$cadena.")  OR  upper(Nombre) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $tipoopinions = array();
        while ($fila = $result->fetch_row()) {
            $tipoopinion = new TipoopinionDTO();
            $tipoopinion->setIdTipoOpinion($fila[0]);
            $tipoopinion->setNombre($fila[1]);
            $tipoopinions[$i] = $tipoopinion;
            $i++;
        }
        $this->conexion->desconectar();
        return $tipoopinions;
    }

    public function save($tipoopinion) {
        $this->conexion->conectar();
        $query = "INSERT INTO tipoopinion (IdTipoOpinion,Nombre)"
                . " VALUES ( ".$tipoopinion->getIdTipoOpinion()." , '".$tipoopinion->getNombre()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($tipoopinion) {
        $this->conexion->conectar();
        $query = "UPDATE tipoopinion SET "
                . "  Nombre = '".$tipoopinion->getNombre()."' "
                . " WHERE  IdTipoOpinion =  ".$tipoopinion->getIdTipoOpinion()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}
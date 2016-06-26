<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/OpinionDTO.php';

class OpinionDAO{
    private $conexion;

    public function OpinionDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($IdOpinion) {
        $this->conexion->conectar();
        $query = "DELETE FROM opinion WHERE  IdOpinion =  ".$IdOpinion." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM opinion";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $opinions = array();
        while ($fila = $result->fetch_row()) {
            $opinion = new OpinionDTO();
            $opinion->setIdOpinion($fila[0]);
            $opinion->setFecha($fila[1]);
            $opinion->setDescripcion($fila[2]);
            $opinion->setIdTipoOpinion($fila[3]);
            $opinion->setRunPersona($fila[4]);
            $opinions[$i] = $opinion;
            $i++;
        }
        $this->conexion->desconectar();
        return $opinions;
    }

    public function findByID($IdOpinion) {
        $this->conexion->conectar();
        $query = "SELECT * FROM opinion WHERE  IdOpinion =  ".$IdOpinion." ";
        $result = $this->conexion->ejecutar($query);
        $opinion = new OpinionDTO();
        while ($fila = $result->fetch_row()) {
            $opinion->setIdOpinion($fila[0]);
            $opinion->setFecha($fila[1]);
            $opinion->setDescripcion($fila[2]);
            $opinion->setIdTipoOpinion($fila[3]);
            $opinion->setRunPersona($fila[4]);
        }
        $this->conexion->desconectar();
        return $opinion;
    }
public function findByTipoOpinion($IdTipoOpinion) {
        $this->conexion->conectar();
        $query = "SELECT * FROM opinion WHERE  IdTipoOpinion =  ".$IdTipoOpinion." ";
        $result = $this->conexion->ejecutar($query);
        $opinion = new OpinionDTO();
        while ($fila = $result->fetch_row()) {
            $opinion->setIdOpinion($fila[0]);
            $opinion->setFecha($fila[1]);
            $opinion->setDescripcion($fila[2]);
            $opinion->setIdTipoOpinion($fila[3]);
            $opinion->setRunPersona($fila[4]);
        }
        $this->conexion->desconectar();
        return $opinion;
    }
    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM opinion WHERE  upper(IdOpinion) LIKE upper(".$cadena.")  OR  upper(Fecha) LIKE upper('".$cadena."')  OR  upper(Descripcion) LIKE upper('".$cadena."')  OR  upper(IdTipoOpinion) LIKE upper(".$cadena.")  OR  upper(RunPersona) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $opinions = array();
        while ($fila = $result->fetch_row()) {
            $opinion = new OpinionDTO();
            $opinion->setIdOpinion($fila[0]);
            $opinion->setFecha($fila[1]);
            $opinion->setDescripcion($fila[2]);
            $opinion->setIdTipoOpinion($fila[3]);
            $opinion->setRunPersona($fila[4]);
            $opinions[$i] = $opinion;
            $i++;
        }
        $this->conexion->desconectar();
        return $opinions;
    }

    public function save($opinion) {
        $this->conexion->conectar();
        $query = "INSERT INTO opinion (IdOpinion,Fecha,Descripcion,IdTipoOpinion,RunPersona)"
                . " VALUES ( ".$opinion->getIdOpinion()." , '".$opinion->getFecha()."' , '".$opinion->getDescripcion()."' ,  ".$opinion->getIdTipoOpinion()." , '".$opinion->getRunPersona()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($opinion) {
        $this->conexion->conectar();
        $query = "UPDATE opinion SET "
                . "  Fecha = '".$opinion->getFecha()."' ,"
                . "  Descripcion = '".$opinion->getDescripcion()."' ,"
                . "  IdTipoOpinion =  ".$opinion->getIdTipoOpinion()." ,"
                . "  RunPersona = '".$opinion->getRunPersona()."' "
                . " WHERE  IdOpinion =  ".$opinion->getIdOpinion()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}
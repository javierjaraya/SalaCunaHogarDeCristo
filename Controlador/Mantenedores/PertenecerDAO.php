<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/PertenecerDTO.php';

class PertenecerDAO{
    private $conexion;

    public function PertenecerDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($RunPersona) {
        $this->conexion->conectar();
        $query = "DELETE FROM pertenecer WHERE  runPersona =  ".$RunPersona." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM pertenecer";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $pertenecers = array();
        while ($fila = $result->fetch_row()) {
            $pertenecer = new PertenecerDTO();
            $pertenecer->setIdNivel($fila[0]);
            $pertenecer->setRunPersona($fila[1]);
            $pertenecers[$i] = $pertenecer;
            $i++;
        }
        $this->conexion->desconectar();
        return $pertenecers;
    }

    public function findByID($IdNivel) {
        $this->conexion->conectar();
        $query = "SELECT * FROM pertenecer WHERE  IdNivel =  ".$IdNivel." ";
        $result = $this->conexion->ejecutar($query);
        $pertenecer = new PertenecerDTO();
        while ($fila = $result->fetch_row()) {
            $pertenecer->setIdNivel($fila[0]);
            $pertenecer->setRunPersona($fila[1]);
        }
        $this->conexion->desconectar();
        return $pertenecer;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM pertenecer WHERE  upper(IdNivel) LIKE upper(".$cadena.")  OR  upper(RunPersona) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $pertenecers = array();
        while ($fila = $result->fetch_row()) {
            $pertenecer = new PertenecerDTO();
            $pertenecer->setIdNivel($fila[0]);
            $pertenecer->setRunPersona($fila[1]);
            $pertenecers[$i] = $pertenecer;
            $i++;
        }
        $this->conexion->desconectar();
        return $pertenecers;
    }

    public function save($pertenecer) {
        $this->conexion->conectar();
        $query = "INSERT INTO pertenecer (IdNivel,RunPersona)"
                . " VALUES ( ".$pertenecer->getIdNivel()." , '".$pertenecer->getRunPersona()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($pertenecer) {
        $this->conexion->conectar();
        $query = "UPDATE pertenecer SET "
                . "  RunPersona = '".$pertenecer->getRunPersona()."' "
                . " WHERE  IdNivel =  ".$pertenecer->getIdNivel()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}
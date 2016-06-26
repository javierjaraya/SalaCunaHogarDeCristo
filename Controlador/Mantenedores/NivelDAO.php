<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/NivelDTO.php';

class NivelDAO{
    private $conexion;

    public function NivelDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($IdNivel) {
        $this->conexion->conectar();
        $query = "DELETE FROM nivel WHERE  IdNivel =  ".$IdNivel." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM nivel";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $nivels = array();
        while ($fila = $result->fetch_row()) {
            $nivel = new NivelDTO();
            $nivel->setIdNivel($fila[0]);
            $nivel->setRangoEdad($fila[1]);
            $nivel->setNombreNivel($fila[2]);
            $nivels[$i] = $nivel;
            $i++;
        }
        $this->conexion->desconectar();
        return $nivels;
    }

    public function findByID($IdNivel) {
        $this->conexion->conectar();
        $query = "SELECT * FROM nivel WHERE  IdNivel =  ".$IdNivel." ";
        $result = $this->conexion->ejecutar($query);
        $nivel = new NivelDTO();
        while ($fila = $result->fetch_row()) {
            $nivel->setIdNivel($fila[0]);
            $nivel->setRangoEdad($fila[1]);
            $nivel->setNombreNivel($fila[2]);
        }
        $this->conexion->desconectar();
        return $nivel;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM nivel WHERE  upper(IdNivel) LIKE upper(".$cadena.")  OR  upper(RangoEdad) LIKE upper('".$cadena."')  OR  upper(NombreNivel) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $nivels = array();
        while ($fila = $result->fetch_row()) {
            $nivel = new NivelDTO();
            $nivel->setIdNivel($fila[0]);
            $nivel->setRangoEdad($fila[1]);
            $nivel->setNombreNivel($fila[2]);
            $nivels[$i] = $nivel;
            $i++;
        }
        $this->conexion->desconectar();
        return $nivels;
    }

    public function save($nivel) {
        $this->conexion->conectar();
        $query = "INSERT INTO nivel (IdNivel,RangoEdad,NombreNivel)"
                . " VALUES ( ".$nivel->getIdNivel()." , '".$nivel->getRangoEdad()."' , '".$nivel->getNombreNivel()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($nivel) {
        $this->conexion->conectar();
        $query = "UPDATE nivel SET "
                . "  RangoEdad = '".$nivel->getRangoEdad()."' ,"
                . "  NombreNivel = '".$nivel->getNombreNivel()."' "
                . " WHERE  IdNivel =  ".$nivel->getIdNivel()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}
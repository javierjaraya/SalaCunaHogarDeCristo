<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/PerfilDTO.php';

class PerfilDAO{
    private $conexion;

    public function PerfilDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($IdPerfil) {
        $this->conexion->conectar();
        $query = "DELETE FROM perfil WHERE  IdPerfil =  ".$IdPerfil." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM perfil";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $perfils = array();
        while ($fila = $result->fetch_row()) {
            $perfil = new PerfilDTO();
            $perfil->setIdPerfil($fila[0]);
            $perfil->setNombre($fila[1]);
            $perfils[$i] = $perfil;
            $i++;
        }
        $this->conexion->desconectar();
        return $perfils;
    }

    public function findByID($IdPerfil) {
        $this->conexion->conectar();
        $query = "SELECT * FROM perfil WHERE  IdPerfil =  ".$IdPerfil." ";
        $result = $this->conexion->ejecutar($query);
        $perfil = new PerfilDTO();
        while ($fila = $result->fetch_row()) {
            $perfil->setIdPerfil($fila[0]);
            $perfil->setNombre($fila[1]);
        }
        $this->conexion->desconectar();
        return $perfil;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM perfil WHERE  upper(IdPerfil) LIKE upper(".$cadena.")  OR  upper(Nombre) LIKE upper('".$cadena."') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $perfils = array();
        while ($fila = $result->fetch_row()) {
            $perfil = new PerfilDTO();
            $perfil->setIdPerfil($fila[0]);
            $perfil->setNombre($fila[1]);
            $perfils[$i] = $perfil;
            $i++;
        }
        $this->conexion->desconectar();
        return $perfils;
    }

    public function save($perfil) {
        $this->conexion->conectar();
        $query = "INSERT INTO perfil (IdPerfil,Nombre)"
                . " VALUES ( ".$perfil->getIdPerfil()." , '".$perfil->getNombre()."' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($perfil) {
        $this->conexion->conectar();
        $query = "UPDATE perfil SET "
                . "  Nombre = '".$perfil->getNombre()."' "
                . " WHERE  IdPerfil =  ".$perfil->getIdPerfil()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}
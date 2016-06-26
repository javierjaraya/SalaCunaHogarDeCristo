<?php
include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/FotografiaDTO.php';

class FotografiaDAO{
    private $conexion;

    public function FotografiaDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($IdFotografia) {
        $this->conexion->conectar();
        $query = "DELETE FROM fotografia WHERE  IdFotografia =  ".$IdFotografia." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM fotografia";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $fotografias = array();
        while ($fila = $result->fetch_row()) {
            $fotografia = new FotografiaDTO();
            $fotografia->setIdFotografia($fila[0]);
            $fotografia->setNombreImagen($fila[1]);
            $fotografia->setFecha($fila[2]);
            $fotografia->setRuta($fila[3]);
            $fotografia->setIdAlbum($fila[4]);
            $fotografias[$i] = $fotografia;
            $i++;
        }
        $this->conexion->desconectar();
        return $fotografias;
    }

    public function findByID($IdFotografia) {
        $this->conexion->conectar();
        $query = "SELECT * FROM fotografia WHERE  IdFotografia =  ".$IdFotografia." ";
        $result = $this->conexion->ejecutar($query);
        $fotografia = new FotografiaDTO();
        while ($fila = $result->fetch_row()) {
            $fotografia->setIdFotografia($fila[0]);
            $fotografia->setNombreImagen($fila[1]);
            $fotografia->setFecha($fila[2]);
            $fotografia->setRuta($fila[3]);
            $fotografia->setIdAlbum($fila[4]);
        }
        $this->conexion->desconectar();
        return $fotografia;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM fotografia WHERE  upper(IdFotografia) LIKE upper(".$cadena.")  OR  upper(NombreImagen) LIKE upper('".$cadena."')  OR  upper(Fecha) LIKE upper('".$cadena."')  OR  upper(Ruta) LIKE upper('".$cadena."')  OR  upper(IdAlbum) LIKE upper(".$cadena.") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $fotografias = array();
        while ($fila = $result->fetch_row()) {
            $fotografia = new FotografiaDTO();
            $fotografia->setIdFotografia($fila[0]);
            $fotografia->setNombreImagen($fila[1]);
            $fotografia->setFecha($fila[2]);
            $fotografia->setRuta($fila[3]);
            $fotografia->setIdAlbum($fila[4]);
            $fotografias[$i] = $fotografia;
            $i++;
        }
        $this->conexion->desconectar();
        return $fotografias;
    }

    public function save($fotografia) {
        $this->conexion->conectar();
        $query = "INSERT INTO fotografia (IdFotografia,NombreImagen,Fecha,Ruta,IdAlbum)"
                . " VALUES ( ".$fotografia->getIdFotografia()." , '".$fotografia->getNombreImagen()."' , '".$fotografia->getFecha()."' , '".$fotografia->getRuta()."' ,  ".$fotografia->getIdAlbum()." )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($fotografia) {
        $this->conexion->conectar();
        $query = "UPDATE fotografia SET "
                . "  NombreImagen = '".$fotografia->getNombreImagen()."' ,"
                . "  Fecha = '".$fotografia->getFecha()."' ,"
                . "  Ruta = '".$fotografia->getRuta()."' ,"
                . "  IdAlbum =  ".$fotografia->getIdAlbum()." "
                . " WHERE  IdFotografia =  ".$fotografia->getIdFotografia()." ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }
}
<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/AlbumDTO.php';

class AlbumDAO {

    private $conexion;

    public function AlbumDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($IdAlbum) {
        $this->conexion->conectar();
        $query = "DELETE FROM album WHERE  IdAlbum =  " . $IdAlbum . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function getIdDisponible() {
        $this->conexion->conectar();
        $query = "SELECT (max(idAlbum)+1) as id FROM album ";
        $result = $this->conexion->ejecutar($query);
        $id = 1;
        while ($fila = $result->fetch_row()) {
            $id = $fila[0];
        }
        $this->conexion->desconectar();
        return $id;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT a.IdAlbum, a.Titulo, a.Fecha, a.Descripcion, a.RunPersona, f.NombreImagen, f.Ruta FROM album a JOIN fotografia f ON a.IdAlbum = f.IdAlbum GROUP BY a.IdAlbum ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $albums = array();
        while ($fila = $result->fetch_row()) {
            $album = new AlbumDTO();
            $album->setIdAlbum($fila[0]);
            $album->setTitulo($fila[1]);
            $album->setFecha($fila[2]);
            $album->setDescripcion($fila[3]);
            $album->setRunPersona($fila[4]);
            $album->setNombresImagen($fila[5]);
            $album->setRuta($fila[6]);
            
            $albums[$i] = $album;
            $i++;
        }
        $this->conexion->desconectar();
        return $albums;
    }

    public function findByID($IdAlbum) {
        $this->conexion->conectar();
        $query = "SELECT * FROM album WHERE  IdAlbum =  " . $IdAlbum . " ";
        $result = $this->conexion->ejecutar($query);
        $album = new AlbumDTO();
        while ($fila = $result->fetch_row()) {
            $album->setIdAlbum($fila[0]);
            $album->setTitulo($fila[1]);
            $album->setFecha($fila[2]);
            $album->setDescripcion($fila[3]);
            $album->setRunPersona($fila[4]);
        }
        $this->conexion->desconectar();
        return $album;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM album WHERE  upper(IdAlbum) LIKE upper(" . $cadena . ")  OR  upper(Titulo) LIKE upper('" . $cadena . "')  OR  upper(Fecha) LIKE upper('" . $cadena . "')  OR  upper(Descripcion) LIKE upper('" . $cadena . "')  OR  upper(RunPersona) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $albums = array();
        while ($fila = $result->fetch_row()) {
            $album = new AlbumDTO();
            $album->setIdAlbum($fila[0]);
            $album->setTitulo($fila[1]);
            $album->setFecha($fila[2]);
            $album->setDescripcion($fila[3]);
            $album->setRunPersona($fila[4]);
            $albums[$i] = $album;
            $i++;
        }
        $this->conexion->desconectar();
        return $albums;
    }

    public function save($album) {
        $this->conexion->conectar();
        $query = "INSERT INTO album (IdAlbum,Titulo,Fecha,Descripcion,RunPersona)"
                . " VALUES ( " . $album->getIdAlbum() . ", '" . $album->getTitulo() . "' , now() , '" . $album->getDescripcion() . "' , '" . $album->getRunPersona() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($album) {
        $this->conexion->conectar();
        $query = "UPDATE album SET "
                . "  Titulo = '" . $album->getTitulo() . "' ,"
                . "  Fecha = '" . $album->getFecha() . "' ,"
                . "  Descripcion = '" . $album->getDescripcion() . "' ,"
                . "  RunPersona = '" . $album->getRunPersona() . "' "
                . " WHERE  IdAlbum =  " . $album->getIdAlbum() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}

<?php
class FotografiaDTO {
    public $IdFotografia;
    public $NombreImagen;
    public $Fecha;
    public $Ruta;
    public $IdAlbum;

    public function FotografiaDTO(){
    }

    function getIdFotografia() {
        return $this->IdFotografia;
    }

    function setIdFotografia($IdFotografia) {
        return $this->IdFotografia = $IdFotografia;
    }

    function getNombreImagen() {
        return $this->NombreImagen;
    }

    function setNombreImagen($NombreImagen) {
        return $this->NombreImagen = $NombreImagen;
    }

    function getFecha() {
        return $this->Fecha;
    }

    function setFecha($Fecha) {
        return $this->Fecha = $Fecha;
    }

    function getRuta() {
        return $this->Ruta;
    }

    function setRuta($Ruta) {
        return $this->Ruta = $Ruta;
    }

    function getIdAlbum() {
        return $this->IdAlbum;
    }

    function setIdAlbum($IdAlbum) {
        return $this->IdAlbum = $IdAlbum;
    }

}
<?php
class AlbumDTO {
    public $IdAlbum;
    public $Titulo;
    public $Fecha;
    public $Descripcion;
    public $RunPersona;
    
    public $NombresImagen;
    public $Ruta;

    public function AlbumDTO(){
    }

    function getIdAlbum() {
        return $this->IdAlbum;
    }

    function setIdAlbum($IdAlbum) {
        return $this->IdAlbum = $IdAlbum;
    }

    function getTitulo() {
        return $this->Titulo;
    }

    function setTitulo($Titulo) {
        return $this->Titulo = $Titulo;
    }

    function getFecha() {
        return $this->Fecha;
    }

    function setFecha($Fecha) {
        return $this->Fecha = $Fecha;
    }

    function getDescripcion() {
        return $this->Descripcion;
    }

    function setDescripcion($Descripcion) {
        return $this->Descripcion = $Descripcion;
    }

    function getRunPersona() {
        return $this->RunPersona;
    }

    function setRunPersona($RunPersona) {
        return $this->RunPersona = $RunPersona;
    }
    
    function getNombresImagen() {
        return $this->NombresImagen;
    }

    function getRuta() {
        return $this->Ruta;
    }

    function setNombresImagen($NombresImagen) {
        $this->NombresImagen = $NombresImagen;
    }

    function setRuta($Ruta) {
        $this->Ruta = $Ruta;
    }
}
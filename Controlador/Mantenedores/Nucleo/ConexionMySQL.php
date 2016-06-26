<?php

include_once ("Configuracion.php");

class ConexionMySQL {
    private $host;
    private $db;
    private $user;
    private $password;
    private $puerto;
    private $conexion;
    private $configuracion;

    function __construct() {
        $this->configuracion = new Configuracion();
        $this->user = $this->configuracion->user;
        $this->password = $this->configuracion->password;
        $this->host = $this->configuracion->host;
        $this->db = $this->configuracion->db;
        $this->puerto = $this->configuracion->puerto;
    }

    public function conectar() {
        if ($this->puerto != "") {            
            $this->conexion = new mysqli($this->host.":".$this->puerto, $this->user, $this->password,$this->db);
        }else{
            $this->conexion = new mysqli($this->host, $this->user, $this->password,$this->db);                    
        }        
    }

    public function desconectar() {
        //mysql_close($this->conexion)or die('Consulta fallida : '.  mysql_error());        ();
        $this->conexion->close();
    }

    public function ejecutar($strComando) {
        try {
             $result = $this->conexion->query($strComando);
            return $result;
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
}
?>
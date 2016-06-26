<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/TrabajadorDTO.php';
include_once '../../Modelo/PersonaDTO.php';

class TrabajadorDAO {

    private $conexion;

    public function TrabajadorDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($RunPersona) {
        $this->conexion->conectar();
        $query = "DELETE FROM trabajador WHERE  RunPersona = '" . $RunPersona . "' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM trabajador";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $trabajadors = array();
        while ($fila = $result->fetch_row()) {
            $trabajador = new TrabajadorDTO();
            $trabajador->setRunPersona($fila[0]);
            $trabajador->setTitulo($fila[1]);
            $trabajador->setCargo($fila[2]);
            $trabajadors[$i] = $trabajador;
            $i++;
        }
        $this->conexion->desconectar();
        return $trabajadors;
    }

    public function findByID($RunPersona) {
        $this->conexion->conectar();
        $query = "SELECT t.RunPersona, t.Titulo, t.Cargo, p.Nombres, p.Apellidos, p.Sexo, p.FechaNacimiento, p.Telefono, p.Direccion, p.IdEstado, u.Clave, u.IdPerfil FROM trabajador t JOIN persona p ON t.RunPersona = p.RunPersona JOIN usuario u ON u.RunPersona = p.RunPersona WHERE  t.RunPersona = '" . $RunPersona . "' ";
        $result = $this->conexion->ejecutar($query);
        $trabajador = new TrabajadorDTO();
        while ($fila = $result->fetch_row()) {
            $trabajador->setRunPersona($fila[0]);
            $trabajador->setTitulo($fila[1]);
            $trabajador->setCargo($fila[2]);
            
            $persona = new PersonaDTO();
            $persona->setRunPersona($fila[0]);
            $persona->setNombres($fila[3]);
            $persona->setApellidos($fila[4]);
            $persona->setSexo($fila[5]);
            $persona->setFechaNacimiento($fila[6]);
            $persona->setTelefono($fila[7]);
            $persona->setDireccion($fila[8]);
            $persona->setIdEstado($fila[9]);
            
            $usuario = new UsuarioDTO();
            $usuario->setClave($fila[10]);
            $usuario->setIdPerfil($fila[11]);
            
            $trabajador->setPersona($persona);
            $trabajador->setUsuario($usuario);
        }
        $this->conexion->desconectar();
        return $trabajador;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM trabajador WHERE  upper(RunPersona) LIKE upper('" . $cadena . "')  OR  upper(Titulo) LIKE upper('" . $cadena . "')  OR  upper(Cargo) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $trabajadors = array();
        while ($fila = $result->fetch_row()) {
            $trabajador = new TrabajadorDTO();
            $trabajador->setRunPersona($fila[0]);
            $trabajador->setTitulo($fila[1]);
            $trabajador->setCargo($fila[2]);
            $trabajadors[$i] = $trabajador;
            $i++;
        }
        $this->conexion->desconectar();
        return $trabajadors;
    }

    public function save($trabajador) {
        $this->conexion->conectar();
        $query = "INSERT INTO trabajador (RunPersona,Titulo,Cargo)"
                . " VALUES ('" . $trabajador->getRunPersona() . "' , '" . $trabajador->getTitulo() . "' , '" . $trabajador->getCargo() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($trabajador) {
        $this->conexion->conectar();
        $query = "UPDATE trabajador SET "
                . "  Titulo = '" . $trabajador->getTitulo() . "' ,"
                . "  Cargo = '" . $trabajador->getCargo() . "' "
                . " WHERE  RunPersona = '" . $trabajador->getRunPersona() . "' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function getTrabajadoresActivos() {
        $this->conexion->conectar();
        $query = "SELECT t.RunPersona, t.Titulo, t.Cargo, p.Nombres, p.Apellidos, p.Sexo, p.FechaNacimiento, p.Telefono, p.Direccion, p.IdEstado FROM trabajador t JOIN persona p ON t.runPersona = p.runPersona "
                . " WHERE p.idEstado = 2";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $trabajadors = array();
        while ($fila = $result->fetch_row()) {
            $trabajador = new TrabajadorDTO();
            $trabajador->setRunPersona($fila[0]);
            $trabajador->setTitulo($fila[1]);
            $trabajador->setCargo($fila[2]);
            
            $persona = new PersonaDTO();
            $persona->setRunPersona($fila[0]);
            $persona->setNombres($fila[3]);
            $persona->setApellidos($fila[4]);
            $persona->setSexo($fila[5]);
            $persona->setFechaNacimiento($fila[6]);
            $persona->setTelefono($fila[7]);
            $persona->setDireccion($fila[8]);
            $persona->setIdEstado($fila[9]);
            
            $trabajador->setPersona($persona);
            
            $trabajadors[$i] = $trabajador;
            $i++;
        }
        $this->conexion->desconectar();
        return $trabajadors;
    }

}

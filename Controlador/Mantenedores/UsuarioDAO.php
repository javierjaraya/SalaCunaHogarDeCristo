<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/UsuarioDTO.php';
include_once '../../Modelo/PersonaDTO.php';

class UsuarioDAO {

    private $conexion;

    public function UsuarioDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($RunPersona) {
        $this->conexion->conectar();
        $query = "DELETE FROM usuario WHERE  RunPersona = '" . $RunPersona . "' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT * FROM usuario";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $usuarios = array();
        while ($fila = $result->fetch_row()) {//a este
            $usuario = new UsuarioDTO();
            $usuario->setRunPersona($fila[0]);
            $usuario->setClave($fila[1]);
            $usuario->setIdPerfil($fila[2]);
            $usuarios[$i] = $usuario;
            $i++;
        }
        $this->conexion->desconectar();
        return $usuarios;
    }

    public function findByID($RunPersona) {
        $this->conexion->conectar();
        $query = "SELECT u.RunPersona, u.Clave, u.IdPerfil, p.Nombres, p.Apellidos, p.Sexo, p.FechaNacimiento, p.Telefono, p.Direccion, p.IdEstado FROM usuario u JOIN persona p ON u.RunPersona = p.RunPersona "
                . " WHERE p.IdEstado = 2 AND u.RunPersona = '" . $RunPersona . "' ";
        $result = $this->conexion->ejecutar($query);
        $usuario = new UsuarioDTO();
        while ($fila = $result->fetch_row()) {//este
            //echo json_encode($fila);
            $usuario->setRunPersona($fila[0]);
            $usuario->setClave($fila[1]);
            $usuario->setIdPerfil($fila[2]);
            
            $persona = new PersonaDTO();
            $persona->setRunPersona($fila[0]);
            $persona->setNombres($fila[3]);
            $persona->setApellidos($fila[4]);
            $persona->setSexo($fila[5]);
            $persona->setFechaNacimiento($fila[6]);
            $persona->setTelefono($fila[7]);
            $persona->setDireccion($fila[8]);
            $persona->setIdEstado($fila[9]);
            
            $usuario->setPersona($persona);
        }
        $this->conexion->desconectar();
        return $usuario;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM usuario WHERE  upper(RunPersona) LIKE upper('" . $cadena . "')  OR  upper(Clave) LIKE upper('" . $cadena . "')  OR  upper(IdPerfil) LIKE upper(" . $cadena . ") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $usuarios = array();
        while ($fila = $result->fetch_row()) {
            $usuario = new UsuarioDTO();
            $usuario->setRunPersona($fila[0]);
            $usuario->setClave($fila[1]);
            $usuario->setIdPerfil($fila[2]);
            $usuarios[$i] = $usuario;
            $i++;
        }
        $this->conexion->desconectar();
        return $usuarios;
    }

    public function save($usuario) {
        $this->conexion->conectar();
        $query = "INSERT INTO usuario (RunPersona,Clave,IdPerfil)"
                . " VALUES ('" . $usuario->getRunPersona() . "' , '" . $usuario->getClave() . "' ,  " . $usuario->getIdPerfil() . " )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($usuario) {
        $this->conexion->conectar();
        $query = "UPDATE usuario SET "
                . "  Clave = '" . $usuario->getClave() . "' ,"
                . "  IdPerfil =  " . $usuario->getIdPerfil() . " "
                . " WHERE  RunPersona = '" . $usuario->getRunPersona() . "' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}

<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/ApoderadoDTO.php';

class ApoderadoDAO {

    private $conexion;

    public function ApoderadoDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($RunPersona) {
        $this->conexion->conectar();
        $query = "DELETE FROM apoderado WHERE  RunPersona = '" . $RunPersona . "' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT a.RunPersona, a.SituacionSocioeconomica, p.Nombres, p.Apellidos, p.Sexo, p.FechaNacimiento, p.Telefono, p.Direccion, p.IdEstado FROM apoderado as a JOIN persona as p ON a.RunPersona = p.RunPersona";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $apoderados = array();
        while ($fila = $result->fetch_row()) {
            $apoderado = new ApoderadoDTO();
            $apoderado->setRunPersona($fila[0]);
            $apoderado->setSituacionSocioeconomica($fila[1]);
            $apoderado->setNombres($fila[2]);
            $apoderado->setApellidos($fila[3]);
            $apoderado->setSexo($fila[4]);
            $apoderado->setFechaNacimiento($fila[5]);
            $apoderado->setTelefono($fila[6]);
            $apoderado->setDireccion($fila[7]);
            $apoderado->setIdEstado($fila[8]);

            $apoderados[$i] = $apoderado;
            $i++;
        }
        $this->conexion->desconectar();
        return $apoderados;
    }

    public function findByID($RunPersona) {
        $this->conexion->conectar();
        $query = "SELECT a.RunPersona, a.SituacionSocioeconomica, p.Nombres, p.Apellidos, p.Sexo, p.FechaNacimiento, p.Telefono, p.Direccion, p.IdEstado, u.Clave, u.IdPerfil FROM apoderado as a JOIN persona as p ON a.RunPersona = p.RunPersona JOIN usuario as u ON u.RunPersona = p.RunPersona WHERE  a.RunPersona = '" . $RunPersona . "' ";
        $result = $this->conexion->ejecutar($query);
        $apoderado = new ApoderadoDTO();
        while ($fila = $result->fetch_row()) {
            $apoderado->setRunPersona($fila[0]);
            $apoderado->setSituacionSocioeconomica($fila[1]);
            $apoderado->setNombres($fila[2]);
            $apoderado->setApellidos($fila[3]);
            $apoderado->setSexo($fila[4]);
            $apoderado->setFechaNacimiento($fila[5]);
            $apoderado->setTelefono($fila[6]);
            $apoderado->setDireccion($fila[7]);
            $apoderado->setIdEstado($fila[8]);
            $apoderado->setClave($fila[9]);
            $apoderado->setIdPerfil($fila[10]);
        }
        $this->conexion->desconectar();
        return $apoderado;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM apoderado WHERE  upper(RunPersona) LIKE upper('" . $cadena . "')  OR  upper(SituacionSocioeconomica) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $apoderados = array();
        while ($fila = $result->fetch_row()) {
            $apoderado = new ApoderadoDTO();
            $apoderado->setRunPersona($fila[0]);
            $apoderado->setSituacionSocioeconomica($fila[1]);
            $apoderados[$i] = $apoderado;
            $i++;
        }
        $this->conexion->desconectar();
        return $apoderados;
    }

    public function save($apoderado) {
        $this->conexion->conectar();
        $query = "INSERT INTO apoderado (RunPersona,SituacionSocioeconomica)"
                . " VALUES ('" . $apoderado->getRunPersona() . "' , '" . $apoderado->getSituacionSocioeconomica() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($apoderado) {
        $this->conexion->conectar();
        $query = "UPDATE apoderado SET "
                . "  SituacionSocioeconomica = '" . $apoderado->getSituacionSocioeconomica() . "' "
                . " WHERE  RunPersona = '" . $apoderado->getRunPersona() . "' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function getApoderadosActivos() {
        $this->conexion->conectar();
        $query = "SELECT a.RunPersona, a.SituacionSocioeconomica, p.Nombres, p.Apellidos, p.Sexo, p.FechaNacimiento, p.Telefono, p.Direccion, p.IdEstado FROM apoderado as a JOIN persona as p ON a.RunPersona = p.RunPersona "
                . " WHERE p.IdEstado = 2";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $apoderados = array();
        while ($fila = $result->fetch_row()) {
            $apoderado = new ApoderadoDTO();
            $apoderado->setRunPersona($fila[0]);
            $apoderado->setSituacionSocioeconomica($fila[1]);
            $apoderado->setNombres($fila[2]);
            $apoderado->setApellidos($fila[3]);
            $apoderado->setSexo($fila[4]);
            $apoderado->setFechaNacimiento($fila[5]);
            $apoderado->setTelefono($fila[6]);
            $apoderado->setDireccion($fila[7]);
            $apoderado->setIdEstado($fila[8]);

            $apoderados[$i] = $apoderado;
            $i++;
        }
        $this->conexion->desconectar();
        return $apoderados;
    }

}

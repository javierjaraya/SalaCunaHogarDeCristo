<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/MenorDTO.php';

class MenorDAO {

    private $conexion;

    public function MenorDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($RunPersona) {
        $this->conexion->conectar();
        $query = "DELETE FROM menor WHERE  RunPersona = '" . $RunPersona . "' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT m.RunPersona, p.Nombres, p.Apellidos, p.Sexo, p.FechaNacimiento, p.Telefono, p.Direccion, p.IdEstado, m.IdNivel, m.RunApoderado, m.FechaMatricula , ap.SituacionSocioeconomica FROM menor as m JOIN persona as p ON m.RunPersona = p.RunPersona JOIN apoderado as ap ON  m.RunApoderado = ap.RunPersona";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $menors = array();
        while ($fila = $result->fetch_row()) {
            $menor = new MenorDTO();
            $menor->setRunPersona($fila[0]);
            $menor->setNombres($fila[1]);
            $menor->setApellidos($fila[2]);
            $menor->setSexo($fila[3]);
            $menor->setFechaNacimiento($fila[4]);
            $menor->setTelefono($fila[5]);
            $menor->setDireccion($fila[6]);
            $menor->setIdEstado($fila[7]);
            $menor->setIdNivel($fila[8]);
            $menor->setRunApoderado($fila[9]);
            $menor->setFechaMatricula($fila[10]);
            $menor->setSituacionSocioeconomica($fila[11]);
            $menors[$i] = $menor;
            $i++;
        }
        $this->conexion->desconectar();
        return $menors;
    }

    public function findByID($RunPersona) {
        $this->conexion->conectar();
        $query = "SELECT m.RunPersona, p.Nombres, p.Apellidos, p.Sexo, p.FechaNacimiento, p.Telefono, p.Direccion, p.IdEstado, m.IdNivel, m.RunApoderado, m.FechaMatricula , ap.SituacionSocioeconomica FROM menor as m JOIN persona as p ON m.RunPersona = p.RunPersona JOIN apoderado as ap ON  m.RunApoderado = ap.RunPersona WHERE  m.RunPersona = '" . $RunPersona . "' ";
        $result = $this->conexion->ejecutar($query);
        $menor = new MenorDTO();
        while ($fila = $result->fetch_row()) {
            $menor->setRunPersona($fila[0]);
            $menor->setNombres($fila[1]);
            $menor->setApellidos($fila[2]);
            $menor->setSexo($fila[3]);
            $menor->setFechaNacimiento($fila[4]);
            $menor->setTelefono($fila[5]);
            $menor->setDireccion($fila[6]);
            $menor->setIdEstado($fila[7]);
            $menor->setIdNivel($fila[8]);
            $menor->setRunApoderado($fila[9]);
            $menor->setFechaMatricula($fila[10]);
            $menor->setSituacionSocioeconomica($fila[11]);
        }
        $this->conexion->desconectar();
        return $menor;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT * FROM menor WHERE  upper(RunPersona) LIKE upper('" . $cadena . "')  OR  upper(FechaMatricula) LIKE upper('" . $cadena . "')  OR  upper(IdNivel) LIKE upper(" . $cadena . ")  OR  upper(RunApoderado) LIKE upper('" . $cadena . "') ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $menors = array();
        while ($fila = $result->fetch_row()) {
            $menor = new MenorDTO();
            $menor->setRunPersona($fila[0]);
            $menor->setFechaMatricula($fila[1]);
            $menor->setIdNivel($fila[2]);
            $menor->setRunApoderado($fila[3]);
            $menors[$i] = $menor;
            $i++;
        }
        $this->conexion->desconectar();
        return $menors;
    }

    public function save($menor) {
        $this->conexion->conectar();
        $query = "INSERT INTO menor (RunPersona,FechaMatricula,IdNivel,RunApoderado)"
                . " VALUES ('" . $menor->getRunPersona() . "' , '" . $menor->getFechaMatricula() . "' ,  " . $menor->getIdNivel() . " , '" . $menor->getRunApoderado() . "' )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($menor) {
        $this->conexion->conectar();
        $query = "UPDATE menor SET "
                . "  FechaMatricula = '" . $menor->getFechaMatricula() . "' ,"
                . "  IdNivel =  " . $menor->getIdNivel() . " ,"
                . "  RunApoderado = '" . $menor->getRunApoderado() . "' "
                . " WHERE  RunPersona = '" . $menor->getRunPersona() . "' ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

}

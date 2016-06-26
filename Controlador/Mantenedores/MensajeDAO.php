<?php

include_once 'Nucleo/ConexionMySQL.php';
include_once '../../Modelo/MensajeDTO.php';

class MensajeDAO {

    private $conexion;

    public function MensajeDAO() {
        $this->conexion = new ConexionMySQL();
    }

    public function delete($idMensaje) {
        $this->conexion->conectar();
        $query = "DELETE FROM mensaje WHERE  idMensaje =  " . $idMensaje . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findAll() {
        $this->conexion->conectar();
        $query = "SELECT m.idMensaje, m.runDesde, m.runPara,m.hora, m.mensaje, m.estado FROM mensaje m ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $mensajes = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $mensaje = new MensajeDTO();
            $mensaje->setIdMensaje($fila[0]);
            $mensaje->setRunDesde($fila[1]);
            $mensaje->setRunPara($fila[2]);
            $mensaje->setHora($fila[3]);
            $mensaje->setMensaje($fila[4]);
            $mensaje->setEstado($fila[5]);
            $mensajes[$i] = $mensaje;
            $i++;
        }
        $this->conexion->desconectar();
        return $mensajes;
    }

    public function findByID($idMensaje) {
        $this->conexion->conectar();
        $query = "SELECT m.idMensaje, m.runDesde, m.runPara,m.hora, m.mensaje, m.estado FROM mensaje m WHERE  idMensaje =  " . $idMensaje . " ";
        $result = $this->conexion->ejecutar($query);
        $mensaje = new MensajeDTO();
        while ($fila = mysql_fetch_assoc($result)) {
            $mensaje->setIdMensaje($fila[0]);
            $mensaje->setRunDesde($fila[1]);
            $mensaje->setRunPara($fila[2]);
            $mensaje->setHora($fila[3]);
            $mensaje->setMensaje($fila[4]);
            $mensaje->setEstado($fila[5]);
        }
        $this->conexion->desconectar();
        return $mensaje;
    }

    public function findLikeAtrr($cadena) {
        $this->conexion->conectar();
        $query = "SELECT m.idMensaje, m.runDesde, m.runPara,m.hora, m.mensaje, m.estado FROM mensaje m WHERE  upper(idMensaje) LIKE upper(" . $cadena . ")  OR  upper(runApoderado) LIKE upper('" . $cadena . "')  OR  upper(runTrabajador) LIKE upper('" . $cadena . "')  OR  upper(hora) LIKE upper(" . $cadena . ")  OR  upper(mensaje) LIKE upper('" . $cadena . "')  OR  upper(estado) LIKE upper(" . $cadena . ") ";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $mensajes = array();
        while ($fila = mysql_fetch_assoc($result)) {
            $mensaje = new MensajeDTO();
            $mensaje->setIdMensaje($fila[0]);
            $mensaje->setRunDesde($fila[1]);
            $mensaje->setRunPara($fila[2]);
            $mensaje->setHora($fila[3]);
            $mensaje->setMensaje($fila[4]);
            $mensaje->setEstado($fila[5]);
            $mensajes[$i] = $mensaje;
            $i++;
        }
        $this->conexion->desconectar();
        return $mensajes;
    }

    public function save($mensaje) {
        $this->conexion->conectar();
        $query = "INSERT INTO mensaje (runDesde,runPara,hora,mensaje,estado)"
                . " VALUES ('" . $mensaje->getRunDesde() . "' , '" . $mensaje->getRunPara() . "' , now() , '" . $mensaje->getMensaje() . "' ,  " . $mensaje->getEstado() . " )";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function update($mensaje) {
        $this->conexion->conectar();
        $query = "UPDATE mensaje SET "
                . "  runDesde = '" . $mensaje->getRunDesde() . "' ,"
                . "  runPara = '" . $mensaje->getRunPara() . "' ,"
                . "  hora = " . $mensaje->getHora() . " ,"
                . "  mensaje = '" . $mensaje->getMensaje() . "' ,"
                . "  estado =  " . $mensaje->getEstado() . " "
                . " WHERE  idMensaje =  " . $mensaje->getIdMensaje() . " ";
        $result = $this->conexion->ejecutar($query);
        $this->conexion->desconectar();
        return $result;
    }

    public function findByRunDesdeAndPara($runDesde, $runPara) {
        $this->conexion->conectar();
        $query = "SELECT m.idMensaje, m.runDesde, m.runPara,m.hora, m.mensaje, m.estado, p.Nombres as nombresDesde, p.Apellidos as apellidosDesde, pp.Nombres as nombresPara, pp.Apellidos as apellidosPara "
                . " FROM mensaje m JOIN persona p ON m.runDesde = p.runPersona  "
                . " JOIN persona pp ON m.runPara = pp.runPersona "
                . " WHERE (m.runDesde = '".$runDesde."' AND m.runPara = '".$runPara."') "
                . " OR (m.runDesde = '".$runPara."' AND m.runPara = '".$runDesde."') "
                . " ORDER BY m.hora";
        $result = $this->conexion->ejecutar($query);
        $i = 0;
        $mensajes = array();
        while ($fila = $result->fetch_row()) {
            $mensaje = new MensajeDTO();
            $mensaje->setIdMensaje($fila[0]);
            $mensaje->setRunDesde($fila[1]);
            $mensaje->setRunPara($fila[2]);
            $mensaje->setHora($fila[3]);
            $mensaje->setMensaje($fila[4]);
            $mensaje->setEstado($fila[5]);
            
            $mensaje->setNombreDesde($fila[6]);
            $mensaje->setApellidosDesde($fila[7]);
            $mensaje->setNombrePara($fila[8]);
            $mensaje->setApallidosPara($fila[9]);
            
            $mensajes[$i] = $mensaje;
            $i++;
            
        }
        $this->conexion->desconectar();
        return $mensajes;
    }

}

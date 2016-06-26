<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $estados = $control->getAllEstados();
        $json = json_encode($estados);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $IdEstado = htmlspecialchars($_REQUEST['IdEstado']);
        $Nombre = htmlspecialchars($_REQUEST['Nombre']);

        $object = $control->getEstadoByID($IdEstado);
        if (($object->getIdEstado() == null || $object->getIdEstado() == "")) {
            $estado = new EstadoDTO();
            $estado->setIdEstado($IdEstado);
            $estado->setNombre($Nombre);

            $result = $control->addEstado($estado);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Estado ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la estado ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $IdEstado = htmlspecialchars($_REQUEST['IdEstado']);

        $result = $control->removeEstado($IdEstado);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Estado borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $estados = $control->getEstadoLikeAtrr($cadena);
        $json = json_encode($estados);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $IdEstado = htmlspecialchars($_REQUEST['IdEstado']);

        $estado = $control->getEstadoByID($IdEstado);
        $json = json_encode($estado);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $IdEstado = htmlspecialchars($_REQUEST['IdEstado']);
        $Nombre = htmlspecialchars($_REQUEST['Nombre']);

            $estado = new EstadoDTO();
            $estado->setIdEstado($IdEstado);
            $estado->setNombre($Nombre);

        $result = $control->updateEstado($estado);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Estado actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

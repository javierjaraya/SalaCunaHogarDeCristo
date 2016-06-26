<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $trabajadors = $control->getAllTrabajadors();
        $json = json_encode($trabajadors);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);
        $Titulo = htmlspecialchars($_REQUEST['Titulo']);
        $Cargo = htmlspecialchars($_REQUEST['Cargo']);

        $object = $control->getTrabajadorByID($RunPersona);
        if (($object->getRunPersona() == null || $object->getRunPersona() == "")) {
            $trabajador = new TrabajadorDTO();
            $trabajador->setRunPersona($RunPersona);
            $trabajador->setTitulo($Titulo);
            $trabajador->setCargo($Cargo);

            $result = $control->addTrabajador($trabajador);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Trabajador ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la trabajador ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

        $result = $control->removeTrabajador($RunPersona);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Trabajador borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $trabajadors = $control->getTrabajadorLikeAtrr($cadena);
        $json = json_encode($trabajadors);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

        $trabajador = $control->getTrabajadorByID($RunPersona);
        $json = json_encode($trabajador);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);
        $Titulo = htmlspecialchars($_REQUEST['Titulo']);
        $Cargo = htmlspecialchars($_REQUEST['Cargo']);

            $trabajador = new TrabajadorDTO();
            $trabajador->setRunPersona($RunPersona);
            $trabajador->setTitulo($Titulo);
            $trabajador->setCargo($Cargo);

        $result = $control->updateTrabajador($trabajador);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Trabajador actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

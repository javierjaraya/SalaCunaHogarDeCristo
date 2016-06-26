<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $pertenecers = $control->getAllPertenecers();
        $json = json_encode($pertenecers);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $IdNivel = htmlspecialchars($_REQUEST['IdNivel']);
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

        $object = $control->getPertenecerByID($IdNivel);
        if (($object->getIdNivel() == null || $object->getIdNivel() == "")) {
            $pertenecer = new PertenecerDTO();
            $pertenecer->setIdNivel($IdNivel);
            $pertenecer->setRunPersona($RunPersona);

            $result = $control->addPertenecer($pertenecer);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Pertenecer ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la pertenecer ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $IdNivel = htmlspecialchars($_REQUEST['IdNivel']);

        $result = $control->removePertenecer($IdNivel);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Pertenecer borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $pertenecers = $control->getPertenecerLikeAtrr($cadena);
        $json = json_encode($pertenecers);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $IdNivel = htmlspecialchars($_REQUEST['IdNivel']);

        $pertenecer = $control->getPertenecerByID($IdNivel);
        $json = json_encode($pertenecer);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $IdNivel = htmlspecialchars($_REQUEST['IdNivel']);
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

            $pertenecer = new PertenecerDTO();
            $pertenecer->setIdNivel($IdNivel);
            $pertenecer->setRunPersona($RunPersona);

        $result = $control->updatePertenecer($pertenecer);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Pertenecer actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

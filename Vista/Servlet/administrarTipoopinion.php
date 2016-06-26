<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $tipoopinions = $control->getAllTipoopinions();
        $json = json_encode($tipoopinions);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $IdTipoOpinion = htmlspecialchars($_REQUEST['IdTipoOpinion']);
        $Nombre = htmlspecialchars($_REQUEST['Nombre']);

        $object = $control->getTipoopinionByID($IdTipoOpinion);
        if (($object->getIdTipoOpinion() == null || $object->getIdTipoOpinion() == "")) {
            $tipoopinion = new TipoopinionDTO();
            $tipoopinion->setIdTipoOpinion($IdTipoOpinion);
            $tipoopinion->setNombre($Nombre);

            $result = $control->addTipoopinion($tipoopinion);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Tipoopinion ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la tipoopinion ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $IdTipoOpinion = htmlspecialchars($_REQUEST['IdTipoOpinion']);

        $result = $control->removeTipoopinion($IdTipoOpinion);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Tipoopinion borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $tipoopinions = $control->getTipoopinionLikeAtrr($cadena);
        $json = json_encode($tipoopinions);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $IdTipoOpinion = htmlspecialchars($_REQUEST['IdTipoOpinion']);

        $tipoopinion = $control->getTipoopinionByID($IdTipoOpinion);
        $json = json_encode($tipoopinion);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $IdTipoOpinion = htmlspecialchars($_REQUEST['IdTipoOpinion']);
        $Nombre = htmlspecialchars($_REQUEST['Nombre']);

            $tipoopinion = new TipoopinionDTO();
            $tipoopinion->setIdTipoOpinion($IdTipoOpinion);
            $tipoopinion->setNombre($Nombre);

        $result = $control->updateTipoopinion($tipoopinion);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Tipoopinion actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $opinions = $control->getAllOpinions();
        $json = json_encode($opinions);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $IdOpinion = htmlspecialchars($_REQUEST['IdOpinion']);
        $Fecha = htmlspecialchars($_REQUEST['Fecha']);
        $Descripcion = htmlspecialchars($_REQUEST['Descripcion']);
        $IdTipoOpinion = htmlspecialchars($_REQUEST['IdTipoOpinion']);
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

        $object = $control->getOpinionByID($IdOpinion);
        if (($object->getIdOpinion() == null || $object->getIdOpinion() == "")) {
            $opinion = new OpinionDTO();
            $opinion->setIdOpinion($IdOpinion);
            $opinion->setFecha($Fecha);
            $opinion->setDescripcion($Descripcion);
            $opinion->setIdTipoOpinion($IdTipoOpinion);
            $opinion->setRunPersona($RunPersona);

            $result = $control->addOpinion($opinion);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Opinion ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la opinion ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $IdOpinion = htmlspecialchars($_REQUEST['IdOpinion']);

        $result = $control->removeOpinion($IdOpinion);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Opinion borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $opinions = $control->getOpinionLikeAtrr($cadena);
        $json = json_encode($opinions);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $IdOpinion = htmlspecialchars($_REQUEST['IdOpinion']);

        $opinion = $control->getOpinionByID($IdOpinion);
        $json = json_encode($opinion);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $IdOpinion = htmlspecialchars($_REQUEST['IdOpinion']);
        $Fecha = htmlspecialchars($_REQUEST['Fecha']);
        $Descripcion = htmlspecialchars($_REQUEST['Descripcion']);
        $IdTipoOpinion = htmlspecialchars($_REQUEST['IdTipoOpinion']);
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

            $opinion = new OpinionDTO();
            $opinion->setIdOpinion($IdOpinion);
            $opinion->setFecha($Fecha);
            $opinion->setDescripcion($Descripcion);
            $opinion->setIdTipoOpinion($IdTipoOpinion);
            $opinion->setRunPersona($RunPersona);

        $result = $control->updateOpinion($opinion);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Opinion actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

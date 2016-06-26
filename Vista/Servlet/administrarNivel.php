<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $nivels = $control->getAllNivels();
        $json = json_encode($nivels);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $IdNivel = htmlspecialchars($_REQUEST['IdNivel']);
        $RangoEdad = htmlspecialchars($_REQUEST['RangoEdad']);
        $NombreNivel = htmlspecialchars($_REQUEST['NombreNivel']);

        $object = $control->getNivelByID($IdNivel);
        if (($object->getIdNivel() == null || $object->getIdNivel() == "")) {
            $nivel = new NivelDTO();
            $nivel->setIdNivel($IdNivel);
            $nivel->setRangoEdad($RangoEdad);
            $nivel->setNombreNivel($NombreNivel);

            $result = $control->addNivel($nivel);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Nivel ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la nivel ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $IdNivel = htmlspecialchars($_REQUEST['IdNivel']);

        $result = $control->removeNivel($IdNivel);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Nivel borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $nivels = $control->getNivelLikeAtrr($cadena);
        $json = json_encode($nivels);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $IdNivel = htmlspecialchars($_REQUEST['IdNivel']);

        $nivel = $control->getNivelByID($IdNivel);
        $json = json_encode($nivel);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $IdNivel = htmlspecialchars($_REQUEST['IdNivel']);
        $RangoEdad = htmlspecialchars($_REQUEST['RangoEdad']);
        $NombreNivel = htmlspecialchars($_REQUEST['NombreNivel']);

            $nivel = new NivelDTO();
            $nivel->setIdNivel($IdNivel);
            $nivel->setRangoEdad($RangoEdad);
            $nivel->setNombreNivel($NombreNivel);

        $result = $control->updateNivel($nivel);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Nivel actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

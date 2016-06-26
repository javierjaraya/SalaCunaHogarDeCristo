<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $perfils = $control->getAllPerfils();
        $json = json_encode($perfils);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $IdPerfil = htmlspecialchars($_REQUEST['IdPerfil']);
        $Nombre = htmlspecialchars($_REQUEST['Nombre']);

        $object = $control->getPerfilByID($IdPerfil);
        if (($object->getIdPerfil() == null || $object->getIdPerfil() == "")) {
            $perfil = new PerfilDTO();
            $perfil->setIdPerfil($IdPerfil);
            $perfil->setNombre($Nombre);

            $result = $control->addPerfil($perfil);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Perfil ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la perfil ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $IdPerfil = htmlspecialchars($_REQUEST['IdPerfil']);

        $result = $control->removePerfil($IdPerfil);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Perfil borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $perfils = $control->getPerfilLikeAtrr($cadena);
        $json = json_encode($perfils);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $IdPerfil = htmlspecialchars($_REQUEST['IdPerfil']);

        $perfil = $control->getPerfilByID($IdPerfil);
        $json = json_encode($perfil);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $IdPerfil = htmlspecialchars($_REQUEST['IdPerfil']);
        $Nombre = htmlspecialchars($_REQUEST['Nombre']);

            $perfil = new PerfilDTO();
            $perfil->setIdPerfil($IdPerfil);
            $perfil->setNombre($Nombre);

        $result = $control->updatePerfil($perfil);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Perfil actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

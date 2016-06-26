<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $usuarios = $control->getAllUsuarios();
        $json = json_encode($usuarios);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);
        $Clave = htmlspecialchars($_REQUEST['Clave']);
        $IdPerfil = htmlspecialchars($_REQUEST['IdPerfil']);

        $object = $control->getUsuarioByID($RunPersona);
        if (($object->getRunPersona() == null || $object->getRunPersona() == "")) {
            $usuario = new UsuarioDTO();
            $usuario->setRunPersona($RunPersona);
            $usuario->setClave($Clave);
            $usuario->setIdPerfil($IdPerfil);

            $result = $control->addUsuario($usuario);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Usuario ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la usuario ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

        $result = $control->removeUsuario($RunPersona);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Usuario borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $usuarios = $control->getUsuarioLikeAtrr($cadena);
        $json = json_encode($usuarios);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

        $usuario = $control->getUsuarioByID($RunPersona);
        $json = json_encode($usuario);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);
        $Clave = htmlspecialchars($_REQUEST['Clave']);
        $IdPerfil = htmlspecialchars($_REQUEST['IdPerfil']);

            $usuario = new UsuarioDTO();
            $usuario->setRunPersona($RunPersona);
            $usuario->setClave($Clave);
            $usuario->setIdPerfil($IdPerfil);

        $result = $control->updateUsuario($usuario);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Usuario actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

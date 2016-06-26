<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $personas = $control->getAllPersonas();
        $json = json_encode($personas);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);
        $Nombres = htmlspecialchars($_REQUEST['Nombres']);
        $Apellidos = htmlspecialchars($_REQUEST['Apellidos']);
        $Sexo = htmlspecialchars($_REQUEST['Sexo']);
        $FechaNacimiento = htmlspecialchars($_REQUEST['FechaNacimiento']);
        $Telefono = htmlspecialchars($_REQUEST['Telefono']);
        $Direccion = htmlspecialchars($_REQUEST['Direccion']);
        $IdEstado = htmlspecialchars($_REQUEST['IdEstado']);

        $object = $control->getPersonaByID($RunPersona);
        if (($object->getRunPersona() == null || $object->getRunPersona() == "")) {
            $persona = new PersonaDTO();
            $persona->setRunPersona($RunPersona);
            $persona->setNombres($Nombres);
            $persona->setApellidos($Apellidos);
            $persona->setSexo($Sexo);
            $persona->setFechaNacimiento($FechaNacimiento);
            $persona->setTelefono($Telefono);
            $persona->setDireccion($Direccion);
            $persona->setIdEstado($IdEstado);

            $result = $control->addPersona($persona);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Persona ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la persona ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

        $result = $control->removePersona($RunPersona);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Persona borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $personas = $control->getPersonaLikeAtrr($cadena);
        $json = json_encode($personas);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

        $persona = $control->getPersonaByID($RunPersona);
        $json = json_encode($persona);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);
        $Nombres = htmlspecialchars($_REQUEST['Nombres']);
        $Apellidos = htmlspecialchars($_REQUEST['Apellidos']);
        $Sexo = htmlspecialchars($_REQUEST['Sexo']);
        $FechaNacimiento = htmlspecialchars($_REQUEST['FechaNacimiento']);
        $Telefono = htmlspecialchars($_REQUEST['Telefono']);
        $Direccion = htmlspecialchars($_REQUEST['Direccion']);
        $IdEstado = htmlspecialchars($_REQUEST['IdEstado']);

        $persona = new PersonaDTO();
        $persona->setRunPersona($RunPersona);
        $persona->setNombres($Nombres);
        $persona->setApellidos($Apellidos);
        $persona->setSexo($Sexo);
        $persona->setFechaNacimiento($FechaNacimiento);
        $persona->setTelefono($Telefono);
        $persona->setDireccion($Direccion);
        $persona->setIdEstado($IdEstado);

        $result = $control->updatePersona($persona);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Persona actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "ACTUALIZAR_MI_PERFIL_APODERADO") {
        $RunPersona = htmlspecialchars($_REQUEST['runPersonaEditar']);
        $Telefono = htmlspecialchars($_REQUEST['Telefono']);
        $Direccion = htmlspecialchars($_REQUEST['Direccion']);
        $clave = htmlspecialchars($_REQUEST['Clave']);

        $persona = $control->getPersonaByID($RunPersona);        
        $persona->setTelefono($Telefono);
        $persona->setDireccion($Direccion);
        
        $usuario = $control->getUsuarioByRun($RunPersona);
        $usuario->setClave($clave);
        
        $resultPersona = $control->updatePersona($persona);
        $resulUsuario = $control->updateUsuario($usuario);
        
        if($resultPersona && $resulUsuario){
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Datos actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "ACTUALIZAR_MI_PERFIL_TRABAJADOR") {
        $RunPersona = htmlspecialchars($_REQUEST['runPersonaEditar']);
        $Telefono = htmlspecialchars($_REQUEST['Telefono']);
        $Direccion = htmlspecialchars($_REQUEST['Direccion']);
        $clave = htmlspecialchars($_REQUEST['Clave']);
    }
}

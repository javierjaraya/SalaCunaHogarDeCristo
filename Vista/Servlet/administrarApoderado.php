<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADOHABILITADOS") {
        $apoderados = $control->getAllApoderadosHabilitados();
        $json = json_encode($apoderados);
        echo $json;
    }if ($accion == "LISTADODESHABILITADOS") {
        $apoderados = $control->getAllApoderadosDeshabilitados();
        $json = json_encode($apoderados);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $RunApoderado = htmlspecialchars($_REQUEST['Run']);
        $Nombres = htmlspecialchars($_REQUEST['Nombres']);
        $Apellidos = htmlspecialchars($_REQUEST['Apellidos']);
        $Sexo = htmlspecialchars($_REQUEST['Sexo']);
        $SituacionSocioeconomica = htmlspecialchars($_REQUEST['Quintil']);
        $FechaNacimiento = htmlspecialchars($_REQUEST['FechaNacimiento']);
        $Telefono = htmlspecialchars($_REQUEST['Telefono']);
        $Direccion = htmlspecialchars($_REQUEST['Direccion']);
        $Clave = htmlspecialchars($_REQUEST['Clave']);

        //Validamos que el apoderado no exista anteriormente
        $object = $control->getApoderadoByID($RunApoderado);
        if (($object->getRunPersona() == null || $object->getRunPersona() == "")) {
            $apoderado = new ApoderadoDTO();
            $apoderado->setRunPersona($RunApoderado);
            $apoderado->setSituacionSocioeconomica($SituacionSocioeconomica);
            //Validamos que la persona no sea un trabajador
            $object = $control->getTrabajadorByID($RunApoderado);
            if (($object->getRunPersona() == null || $object->getRunPersona() == "")) {
                $resultPersona;
                //VALIDAMOS QUE LA PERSONA EXISTA O ACTUALIZAMOS SUS DATOS
                $personaAux = $control->getPersonaByID($RunApoderado);
                if (($personaAux->getRunPersona() == null || $personaAux->getRunPersona() == "")) {
                    $persona = new PersonaDTO();
                    $persona->setRunPersona($RunApoderado);
                    $persona->setNombres($Nombres);
                    $persona->setApellidos($Apellidos);
                    $persona->setSexo($Sexo);
                    $persona->setFechaNacimiento($FechaNacimiento);
                    $persona->setTelefono($Telefono);
                    $persona->setDireccion($Direccion);

                    $resultPersona = $control->addPersona($persona);
                } else {
                    $persona = new PersonaDTO();
                    $persona->setRunPersona($RunApoderado);
                    $persona->setNombres($Nombres);
                    $persona->setApellidos($Apellidos);
                    $persona->setSexo($Sexo);
                    $persona->setFechaNacimiento($FechaNacimiento);
                    $persona->setTelefono($Telefono);
                    $persona->setDireccion($Direccion);

                    $resultPersona = $control->updatePersona($persona);
                }
                //GUARDAMOS EL APODERADO

                $resultApoderado = $control->addApoderado($apoderado);

                $usuario = new UsuarioDTO();
                $usuario->setIdPerfil(3); //1 = Directo , 2 = Trabajador, 3 = Apoderado
                $usuario->setClave($Clave);
                $usuario->setRunPersona($RunApoderado);

                $resulUsuario = $control->addUsuario($usuario);

                $result = $resultPersona && $resultApoderado && $resulUsuario ? true : false;

                if ($result) {
                    echo json_encode(array(
                        'success' => true,
                        'mensaje' => "Apoderado ingresada correctamente"
                    ));
                } else {
                    echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
                }
            } else {
                echo json_encode(array('errorMsg' => 'El o la persona es un trabajador, no puede ser apoderado.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la apoderado ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $RunPersona = htmlspecialchars($_REQUEST['RunEditar']);
        $persona = $control->getPersonaByID($RunPersona);
        //cantidad alumnos
        $cantidadMenores = $control->contarMenoresActivos($RunPersona);
        $result = false;
        if ($cantidadMenores == 0) {
            $persona->setIdEstado(1); //1 = Inactivo , 2 = Activo
            $resulPersona = $control->updatePersona($persona);
            $resultUsuario = $control->removeUsuario($RunApoderado); //se borra el usuario
            $result = $resulPersona && $resultUsuario ? true : false;
        }
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Apoderado borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $apoderados = $control->getApoderadoLikeAtrr($cadena);
        $json = json_encode($apoderados);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

        $apoderado = $control->getApoderadoByID($RunPersona);
        $json = json_encode($apoderado);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $SituacionSocioeconomica = htmlspecialchars($_REQUEST['Quintil']);
        $Telefono = htmlspecialchars($_REQUEST['Telefono']);
        $Direccion = htmlspecialchars($_REQUEST['Direccion']);
        $RunEditar = htmlspecialchars($_REQUEST['RunEditar']);
        $Clave = htmlspecialchars($_REQUEST['Clave']);

        $apoderado = $control->getApoderadoById($RunEditar);
        $apoderado->setRunPersona($RunEditar);
        $apoderado->setSituacionSocioeconomica($SituacionSocioeconomica);
        $resultApoderado = $control->updateApoderado($apoderado);

        $persona = $control->getPersonaById($RunEditar);

        $persona->setTelefono($Telefono);
        $persona->setDireccion($Direccion);

        $resultPersona = $control->updatePersona($persona);

        $usuario = $control->getUsuarioByRun($RunEditar);
        $usuario->setClave($Clave);

        $resultUsuario = $control->updateUsuario($usuario);

        $result = $resultApoderado && $resultPersona && $resultUsuario ? true : false;

        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Apoderado actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error. AQUI RESULT APODERADO' . $resultApoderado . 'PERSONA' . $resultPersona . 'USUARIO' . $resultUsuario));
        }
    }
}

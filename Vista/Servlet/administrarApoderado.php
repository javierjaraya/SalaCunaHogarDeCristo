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
        //Apoderado
        $RunApoderado = htmlspecialchars($_REQUEST['RunApoderado']);
        $NombresApoderado = htmlspecialchars($_REQUEST['NombresApoderado']);
        $ApellidosApoderado = htmlspecialchars($_REQUEST['ApellidosApoderado']);
        $SexoApoderado = htmlspecialchars($_REQUEST['SexoApoderado']);
        $SituacionSocioeconomicaApoderado = htmlspecialchars($_REQUEST['QuintilApoderado']);
        $FechaNacimientoApoderado = htmlspecialchars($_REQUEST['FechaNacimientoApoderado']);
        $TelefonoApoderado = htmlspecialchars($_REQUEST['TelefonoApoderado']);
        $DireccionApoderado = htmlspecialchars($_REQUEST['DireccionApoderado']);
        $Clave = htmlspecialchars($_REQUEST['Clave']);
        //Menor 
        $RunMenor = htmlspecialchars($_REQUEST['RunMenor']);
        $NombresMenor = htmlspecialchars($_REQUEST['NombresMenor']);
        $ApellidosMenor = htmlspecialchars($_REQUEST['ApellidosMenor']);
        $SexoMenor = htmlspecialchars($_REQUEST['SexoMenor']);
        $FechaNacimientoMenor = htmlspecialchars($_REQUEST['FechaNacimientoMenor']);
        $TelefonoMenor = htmlspecialchars($_REQUEST['TelefonoMenor']);
        $DireccionMenor = htmlspecialchars($_REQUEST['DireccionMenor']);
        $FechaMatriculaMenor = htmlspecialchars($_REQUEST['FechaMatriculaMenor']);
        $IdNivelMenor = htmlspecialchars($_REQUEST['IdNivelMenor']);

        //Validamos que el apoderado no exista anteriormente
        $objectApoderado = $control->getApoderadoByID($RunApoderado);
        $objectMenor = $control->getMenorByID($RunMenor);

        if (($objectApoderado->getRunPersona() == null || $objectApoderado->getRunPersona() == "")) {//Si no existe apoderado
            if (($objectMenor->getRunPersona() == null || $objectMenor->getRunPersona() == "")) { //Si no existe menor
                $apoderado = new ApoderadoDTO();
                $apoderado->setRunPersona($RunApoderado);
                $apoderado->setSituacionSocioeconomica($SituacionSocioeconomicaApoderado);
                $menor = new MenorDTO();
                $menor->setRunPersona($RunMenor);
                $menor->setFechaMatricula($FechaMatriculaMenor);
                $menor->setIdNivel($IdNivelMenor);
                $menor->setRunApoderado($RunApoderado);
                //Validamos que la persona no sea un trabajador
                $objectA = $control->getTrabajadorByID($RunApoderado);
                $objectM = $control->getTrabajadorByID($RunMenor);
                if (($objectA->getRunPersona() == null || $objectA->getRunPersona() == "")) {//si no es trabajador
                    if ($objectM->getRunPersona() == null || $objectM->getRunPersona() == "") {
                        $resultPersonaApoderado;
                        $resultPersonaMenor;
                        //VALIDAMOS QUE LA PERSONA EXISTA O ACTUALIZAMOS SUS DATOS
                        $personaAuxApoderado = $control->getPersonaByID($RunApoderado);
                        $personaAuxMenor = $control->getPersonaByID($RunMenor);

                        $persona = new PersonaDTO();
                        $persona->setRunPersona($RunApoderado);
                        $persona->setNombres($NombresApoderado);
                        $persona->setApellidos($ApellidosApoderado);
                        $persona->setSexo($SexoApoderado);
                        $persona->setFechaNacimiento($FechaNacimientoApoderado);
                        $persona->setTelefono($TelefonoApoderado);
                        $persona->setDireccion($DireccionApoderado);
                        $persona->setIdEstado(2);

                        $personaMenor = new PersonaDTO();
                        $personaMenor->setRunPersona($RunMenor);
                        $personaMenor->setNombres($NombresMenor);
                        $personaMenor->setApellidos($ApellidosMenor);
                        $personaMenor->setSexo($SexoMenor);
                        $personaMenor->setFechaNacimiento($FechaNacimientoMenor);
                        $personaMenor->setTelefono($TelefonoMenor);
                        $personaMenor->setDireccion($DireccionMenor);
                        $personaMenor->setIdEstado(2);
                                               
                        $usuario = new UsuarioDTO();
                        $usuario->setIdPerfil(3); //1 = Directo , 2 = Trabajador, 3 = Apoderado
                        $usuario->setClave($Clave);
                        $usuario->setRunPersona($RunApoderado);

                        if (($personaAuxApoderado->getRunPersona() == null || $personaAuxApoderado->getRunPersona() == "")) {//Si la persona Apoderado no existe
                            $resultPersonaApoderado = $control->addPersona($persona);
                        } else {
                            $resultPersonaApoderado = $control->updatePersona($persona);
                        }
                        
                        if (($personaAuxMenor->getRunPersona() == null || $personaAuxMenor->getRunPersona() == "")) {//Si la persona Menor no existe
                            $resultPersonaMenor = $control->addPersona($personaMenor);
                        } else {
                            $resultPersonaMenor = $control->updatePersona($personaMenor);
                        }
                        //GUARDAMOS EL APODERADO y menor
                        $resultApoderado = $control->addApoderado($apoderado);
                        $resultMenor = $control->addMenor($menor);
                        $resulUsuario = $control->addUsuario($usuario);

                        $result = $resultPersonaMenor && $resultPersonaApoderado && $resultApoderado && $resulUsuario && $resultMenor ? true : false;

                        if ($result) {
                            echo json_encode(array(
                                'success' => true,
                                'mensaje' => "Apoderado ingresada correctamente"
                            ));
                        } else {
                            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.Persona menor :' . $resultPersonaMenor . '. Persona apoder: ' . $resultPersonaApoderado . '. apoder ' . $resultApoderado . ' usuario ' . $resulUsuario . ' menor ' . $resultMenor));
                        }
                    } else {
                        echo json_encode(array('errorMsg' => 'El run que intenta poner como menor es un trabajador, no puede ser menor.'));
                    }
                } else {
                    echo json_encode(array('errorMsg' => 'El o la persona es un trabajador, no puede ser apoderado.'));
                }
            } else {
                echo json_encode(array('errorMsg' => 'El menor ya existe, intento nuevamente.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la apoderad@ ya existe, intento nuevamente.'));
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
    
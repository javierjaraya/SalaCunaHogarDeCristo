<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $menors = $control->getAllMenorsHabilitados();
        $json = json_encode($menors);
        echo $json;
    } else if ($accion == "LISTADOHISTORICO") {
        $menors = $control->getAllMenorsDesHabilitados();
        $json = json_encode($menors);
        echo $json;
    } else if ($accion == "LISTADO_BY_APODERADO") {
        session_start();
        $runApoderado = $_SESSION["run"];
        $menors = $control->getAllMenorsHabilitadosByRunApoderado($runApoderado);
        $json = json_encode($menors);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $RunPersona = htmlspecialchars($_REQUEST['Run']);
        $Nombres = htmlspecialchars($_REQUEST['Nombres']);
        $Apellidos = htmlspecialchars($_REQUEST['Apellidos']);
        $Sexo = htmlspecialchars($_REQUEST['Sexo']);
        $FechaNacimiento = htmlspecialchars($_REQUEST['FechaNacimiento']);
        $Telefono = htmlspecialchars($_REQUEST['Telefono']);
        $Direccion = htmlspecialchars($_REQUEST['Direccion']);
        $FechaMatricula = htmlspecialchars($_REQUEST['FechaMatricula']);
        $IdNivel = htmlspecialchars($_REQUEST['IdNivel']);
        $RunApoderado = htmlspecialchars($_REQUEST['RunApoderado']);

        //Validamos que el Menor no exista anteriormente
        $object = $control->getMenorByID($RunPersona);
        if (($object->getRunPersona() == null || $object->getRunPersona() == "")) {
            $menors = new MenorDTO();
            $menors->setRunPersona($RunPersona);
            $menors->setFechaMatricula($FechaMatricula);
            $menors->setIdNivel($IdNivel);
            $menors->setRunApoderado($RunApoderado);
            //Validamos que la persona no sea un trabajador
            $object = $control->getTrabajadorByID($RunPersona);
            if (($object->getRunPersona() == null || $object->getRunPersona() == "")) {
                //VALIDAMOS QUE EXISTA EL APODERADO
                $objetctApoderado = $control->getApoderadoByID($RunApoderado);
                if (($objetctApoderado->getRunPersona() != null || $objetctApoderado->getRunPersona() != "")) {
                    $resultPersona;

                    $persona = new PersonaDTO();
                    $persona->setRunPersona($RunPersona);
                    $persona->setNombres($Nombres);
                    $persona->setApellidos($Apellidos);
                    $persona->setSexo($Sexo);
                    $persona->setFechaNacimiento($FechaNacimiento);
                    $persona->setTelefono($Telefono);
                    $persona->setDireccion($Direccion);
                    $persona->setIdEstado(2);

                    //VALIDAMOS QUE LA PERSONA EXISTA O ACTUALIZAMOS SUS DATOS
                    $personaAux = $control->getPersonaByID($RunPersona);
                    if (($personaAux->getRunPersona() == null || $personaAux->getRunPersona() == "")) {
                        $resultPersona = $control->addPersona($persona);
                    } else {
                        $resultPersona = $control->updatePersona($persona);
                    }
                    //GUARDAMOS EL Menor
                    $resultMenor = $control->addMenor($menors);

                    $result = $resultPersona && $resultMenor ? true : false;

                    if ($result) {
                        echo json_encode(array(
                            'success' => true,
                            'mensaje' => "Menor ingresado correctamente"
                        ));
                    } else {
                        $control->removeMenor($RunPersona);
                        echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
                    }
                } else {
                    echo json_encode(array('errorMsg' => 'El apoderado no existe'));
                }
            } else {
                echo json_encode(array('errorMsg' => 'El o la persona es un trabajador, no puede ser Menor.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El menor ya existe, intente nuevamente.'));
        }
    } else if ($accion == "DESHABILITAR") {
        $RunPersona = htmlspecialchars($_REQUEST['RunEditar']);
        $persona = $control->getPersonaByID($RunPersona);
        //cantidad alumnos
        $RunApoderado = $control->BuscaApoderadoMenor($RunPersona);
        $cantidadMenores = $control->contarMenoresActivos($RunApoderado);
        $result = false;
        if ($cantidadMenores == 1) {
            $persona->setIdEstado(1); //1 = Inactivo , 2 = Activo
            $resulPersona = $control->updatePersona($persona);
            //Apoderado
            $PersonaApoderado = $control->getPersonaByID($RunApoderado);
            $PersonaApoderado->setIdEstado(1); //si es el unico alumno
            $resulPersonaApod = $control->updatePersona($PersonaApoderado);
            $resultUsuario = $control->removeUsuario($RunApoderado); //se borra el usuario
            $result = $resulPersona && $resultUsuario && $resulPersonaApod ? true : false;
        } else {
            if ($cantidadMenores > 1) {
                $persona->setIdEstado(1); //1 = Inactivo , 2 = Activo
                $resulPersona = $control->updatePersona($persona);
                $result = $resulPersona;
            }
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
        $menor = $control->getMenorByID($RunPersona);
        $json = json_encode($menor);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $RunMenor = htmlspecialchars($_REQUEST['Run']);
        $Nombres = htmlspecialchars($_REQUEST['Nombres']);
        $Apellidos = htmlspecialchars($_REQUEST['Apellidos']);
        $IdNivel = htmlspecialchars($_REQUEST['IdNivel']);
        $Sexo = htmlspecialchars($_REQUEST['Sexo']);
        $FechaNacimiento = htmlspecialchars($_REQUEST['FechaNacimiento']);
        $FechaMatricula = htmlspecialchars($_REQUEST['FechaMatricula']);
        $Telefono = htmlspecialchars($_REQUEST['Telefono']);
        $Direccion = htmlspecialchars($_REQUEST['Direccion']);
        $RunEditar = htmlspecialchars($_REQUEST['RunEditar']);
        $RunApoderado = htmlspecialchars($_REQUEST['RunApoderado']);        

        //ACTUALIZAR MENOR
        $menor = $control->getMenorByID($RunEditar);
        $menor->setRunPersona($RunEditar);
        $menor->setFechaMatricula($FechaMatricula);
        $menor->setIdNivel($IdNivel);
        
        $persona = $control->getPersonaByID($RunEditar);
        $persona->setRunPersona($RunEditar);
        $persona->setNombres($Nombres);
        $persona->setApellidos($Apellidos);
        $persona->setSexo($Sexo);
        $persona->setFechaNacimiento($FechaNacimiento);
        $persona->setTelefono($Telefono);
        $persona->setDireccion($Direccion);
        
        $resultMenor = false;
        $resultPersona = false;
        if(strcmp($menor->getRunApoderado(),$RunApoderado)== 0) {
            //ACTUALIZAMOS EL MENOR CON EL MISMO APODERADO
            $resultPersona = $control->updatePersona($persona);
            $resultMenor = $control->updateMenor($menor); 
        }else {
            //ACTUALIZAMOS EL MENOR CON EL NUEVO APODERADO
            $runApoderadoAnterior = $menor->getRunApoderado();
            $menor->setRunApoderado($RunApoderado);
            
            $resultPersona = $control->updatePersona($persona);
            $resultMenor = $control->updateMenor($menor); 
            
            //VALIDAMOS QUE EL APODERADO ANTERIOR TENGAS AL MENOR UN MENOR
            $cantidadMenores = $control->contarMenoresActivos($runApoderadoAnterior);
            if($cantidadMenores == 0){
                $personaApoderadoAnterior = $control->getPersonaByID($runApoderadoAnterior);
                $personaApoderadoAnterior->setIdEstado(1);
                $control->updatePersona($personaApoderadoAnterior);
                $control->removeUsuario($runApoderadoAnterior);
            }
        }
        
        $result = $resultMenor && $resultPersona ? true : false;

        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Menor actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

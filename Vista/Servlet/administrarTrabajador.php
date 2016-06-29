<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $trabajadors = $control->getAllTrabajadors();
        $json = json_encode($trabajadors);
        echo $json;
    } else if ($accion == "LISTADOHABILITADOS") {
        $trabajadors = $control->getAllTrabajadorsHabilitados();
        $json = json_encode($trabajadors);
        echo $json;
    } else if ($accion == "LISTADODESHABILITADOS") {
        $trabajadors = $control->getAllTrabajadorsDesHabilitados();
        $json = json_encode($trabajadors);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $RunPersona = htmlspecialchars($_REQUEST['Run']);
        $Titulo = htmlspecialchars($_REQUEST['Titulo']);
        $Cargo = htmlspecialchars($_REQUEST['Cargo']);

        $Clave = htmlspecialchars($_REQUEST['Clave']);

        $IdNivel = htmlspecialchars($_REQUEST['IdNivel']);

        $Nombres = htmlspecialchars($_REQUEST['Nombres']);
        $Apellidos = htmlspecialchars($_REQUEST['Apellidos']);
        $Sexo = htmlspecialchars($_REQUEST['Sexo']);
        $FechaNacimiento = htmlspecialchars($_REQUEST['FechaNacimiento']);
        $Telefono = htmlspecialchars($_REQUEST['Telefono']);
        $Direccion = htmlspecialchars($_REQUEST['Direccion']);

        $object = $control->getTrabajadorByID($RunPersona);
        if (($object->getRunPersona() == null || $object->getRunPersona() == "")) {//No existe el trabajador
            $resultPersona;

            $trabajador = new TrabajadorDTO();
            $trabajador->setRunPersona($RunPersona);
            $trabajador->setTitulo($Titulo);
            $trabajador->setCargo($Cargo);
            $resultTrabajador = $control->addTrabajador($trabajador);

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
            //La agregamos a un nivel
            $pertenece = new PertenecerDTO();
            $pertenece->setIdNivel($IdNivel);
            $pertenece->setRunPersona($RunPersona);

            $resultPertenece = $control->addPertenecer($pertenece);

            $usuario = new UsuarioDTO();
            $usuario->setClave($Clave);
            $usuario->setIdPerfil(2);
            $usuario->setRunPersona($RunPersona);

            $resultUsuario = $control->addUsuario($usuario);

            $result = $resultPersona && $resultTrabajador && $resultUsuario && $resultPertenece ? true : false;

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Trabajador ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la trabajador ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

        $result = $control->removeTrabajador($RunPersona);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Trabajador borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $trabajadors = $control->getTrabajadorLikeAtrr($cadena);
        $json = json_encode($trabajadors);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);
        $trabajador = $control->getTrabajadorByID($RunPersona);
        $json = json_encode($trabajador);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $Telefono = htmlspecialchars($_REQUEST['Telefono']);
        $Direccion = htmlspecialchars($_REQUEST['Direccion']);
        $Titulo = htmlspecialchars($_REQUEST['Titulo']);
        $Cargo = htmlspecialchars($_REQUEST['Cargo']);
        $IdNivel = htmlspecialchars($_REQUEST['IdNivel']);
        $Clave = htmlspecialchars($_REQUEST['Clave']);
        $RunEditar = htmlspecialchars($_REQUEST['RunEditar']);       
        
        $trabajador= $control->getTrabajadorByID($RunEditar);
        $trabajador->setTitulo($Titulo);
        $trabajador->setCargo($Cargo);
        $persona = $control->getPersonaById($RunEditar);
        $persona->setDireccion($Direccion);
        $persona->setTelefono($Telefono);
        
        $usuario = $control->getUsuarioByRun($RunEditar);
        $usuario->setClave($Clave);
        
        $pertenece = $control->getPertenecerById($RunEditar);
        $pertenece->setIdNivel($IdNivel);
        $trabajador->setPersona($persona);
        $trabajador->setUsuario($usuario);
        $trabajador->setPertenece($pertenece);

        $result = $control->updateTrabajador($trabajador);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Trabajador actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

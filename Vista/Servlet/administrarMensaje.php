<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $mensajes = $control->getAllMensajes();
        $json = json_encode($mensajes);
        echo $json;
    } else if ($accion == "AGREGAR") {        
        $runPara = htmlspecialchars($_REQUEST['runPara']);
        $texto = htmlspecialchars($_REQUEST['texto']);
        session_start();
        $runDesde = $_SESSION['run'];

        $mensaje = new MensajeDTO();        
        $mensaje->setRunDesde($runDesde);
        $mensaje->setRunPara($runPara);       
        $mensaje->setMensaje($texto);
        $mensaje->setEstado(0);//0 = no visto   1 = visto
        
        echo json_encode($mensaje);

        $result = $control->addMensaje($mensaje);

        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Mensaje ingresada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BORRAR") {
        $idMensaje = htmlspecialchars($_REQUEST['idMensaje']);

        $result = $control->removeMensaje($idMensaje);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Mensaje borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $mensajes = $control->getMensajeLikeAtrr($cadena);
        $json = json_encode($mensajes);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $idMensaje = htmlspecialchars($_REQUEST['idMensaje']);

        $mensaje = $control->getMensajeByID($idMensaje);
        $json = json_encode($mensaje);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $idMensaje = htmlspecialchars($_REQUEST['idMensaje']);
        $runDesde = htmlspecialchars($_REQUEST['runDesde']);
        $runPara = htmlspecialchars($_REQUEST['runPara']);
        $hora = htmlspecialchars($_REQUEST['hora']);
        $mensaje = htmlspecialchars($_REQUEST['mensaje']);
        $estado = htmlspecialchars($_REQUEST['estado']);

        $mensaje = new MensajeDTO();
        $mensaje->setIdMensaje($idMensaje);
        $mensaje->setRunDesde($runDesde);
        $mensaje->setRunPara($runPara);
        $mensaje->setHora($hora);
        $mensaje->setMensaje($mensaje);
        $mensaje->setEstado($estado);

        $result = $control->updateMensaje($mensaje);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Mensaje actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "OBTIENE_LISTA_CONTACTOS_HTML") {
        //1 = directora   2 = parvularia  3 = apoderado
        session_start();
        $perfil = $_SESSION['idPerfil'];
        
        $usuarios = array();
        $i = 0;
        if ($perfil == 3) {
            $trabajadors = $control->getTrabajadoresActivos();

            foreach ($trabajadors as $key => $trabajador) {
                $persona = $trabajador->getPersona();
                $usuario = array(
                    'Run' => $persona->getRunPersona(),
                    'Nombres' => $persona->getNombres(),
                    'Apellidos' => $persona->getApellidos(),
                    'Sexo' => $persona->getSexo()
                );
                $usuarios[$i] = $usuario;
                $i++;
            }
        } else {
            $apoderados = $control->getApoderadosActivos();

            foreach ($apoderados as $key => $apoderado) {
                $usuario = array(
                    'Run' => $apoderado->getRunPersona(),
                    'Nombres' => $apoderado->getNombres(),
                    'Apellidos' => $apoderado->getApellidos(),
                    'Sexo' => $apoderado->getSexo()
                );
                $usuarios[$i] = $usuario;
                $i++;
            }
        }

        echo json_encode(array(
            'usuarios' => $usuarios,
            'perfil' => $perfil
        ));
    } else if ($accion == "OBTIENE_MENSAJES_DE_CONTACTO_BY_RUN") {
        $runPara = htmlspecialchars($_REQUEST['runPara']);
        session_start();
        $runDesde = $_SESSION['run'];

        $mensajes = $control->getMensajesEntreContactos($runDesde, $runPara);
        
        for($i = 0; $i < count($mensajes); $i++){            
            //Marcaar mensaje como leido
            $mensaje = $mensajes[$i];            
            $result = $control->marcarLeidoMensajeLiedo($mensaje->getIdMensaje(),1);             
        }

        echo json_encode(array('mensajes' => $mensajes));
    } else if ($accion == "OBTENER_MENSAJES_NO_LEIDOS") {
        session_start();
        $runPara = $_SESSION['run'];
        $mensajes = $control->getMensajesNoLeidosByRunPara($runPara);
        $count = count($mensajes);
        echo json_encode(array(
            'mensajes' => $mensajes,
            'cantidad' => $count
        ));
    }
}

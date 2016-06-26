<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $albums = $control->getAllAlbums();
        $json = json_encode($albums);
        echo $json;
    } else if ($accion == "AGREGAR") {
        $IdAlbum = htmlspecialchars($_REQUEST['IdAlbum']);
        $Titulo = htmlspecialchars($_REQUEST['Titulo']);
        $Fecha = htmlspecialchars($_REQUEST['Fecha']);
        $Descripcion = htmlspecialchars($_REQUEST['Descripcion']);
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

        $object = $control->getAlbumByID($IdAlbum);
        if (($object->getIdAlbum() == null || $object->getIdAlbum() == "")) {
            $album = new AlbumDTO();
            $album->setIdAlbum($IdAlbum);
            $album->setTitulo($Titulo);
            $album->setFecha($Fecha);
            $album->setDescripcion($Descripcion);
            $album->setRunPersona($RunPersona);

            $result = $control->addAlbum($album);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Album ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la album ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $IdAlbum = htmlspecialchars($_REQUEST['IdAlbum']);

        $result = $control->removeAlbum($IdAlbum);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Album borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $albums = $control->getAlbumLikeAtrr($cadena);
        $json = json_encode($albums);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $IdAlbum = htmlspecialchars($_REQUEST['IdAlbum']);

        $album = $control->getAlbumByID($IdAlbum);
        $json = json_encode($album);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $IdAlbum = htmlspecialchars($_REQUEST['IdAlbum']);
        $Titulo = htmlspecialchars($_REQUEST['Titulo']);
        $Fecha = htmlspecialchars($_REQUEST['Fecha']);
        $Descripcion = htmlspecialchars($_REQUEST['Descripcion']);
        $RunPersona = htmlspecialchars($_REQUEST['RunPersona']);

            $album = new AlbumDTO();
            $album->setIdAlbum($IdAlbum);
            $album->setTitulo($Titulo);
            $album->setFecha($Fecha);
            $album->setDescripcion($Descripcion);
            $album->setRunPersona($RunPersona);

        $result = $control->updateAlbum($album);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Album actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

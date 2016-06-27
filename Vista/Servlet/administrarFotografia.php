<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';

$control = SalaCunaHogarDeCristo::getInstancia();

$accion = htmlspecialchars($_REQUEST['accion']);
if ($accion != null) {
    if ($accion == "LISTADO") {
        $fotografias = $control->getAllFotografias();
        $json = json_encode($fotografias);
        echo $json;
    } if ($accion == "LISTADO_BY_ALBUM") {
        $IdAlbum = htmlspecialchars($_REQUEST['idAlbum']);
        $fotografias = $control->getAllFotografiasByAlbum($IdAlbum);
        $album = $control->getAlbumByID($IdAlbum);
        $json = json_encode(array(
            'fotografias' => $fotografias,
            'album' => $album
                ));
        echo $json;
    }else if ($accion == "AGREGAR") {
        $IdFotografia = htmlspecialchars($_REQUEST['IdFotografia']);
        $NombreImagen = htmlspecialchars($_REQUEST['NombreImagen']);
        $Fecha = htmlspecialchars($_REQUEST['Fecha']);
        $Ruta = htmlspecialchars($_REQUEST['Ruta']);
        $IdAlbum = htmlspecialchars($_REQUEST['IdAlbum']);

        $object = $control->getFotografiaByID($IdFotografia);
        if (($object->getIdFotografia() == null || $object->getIdFotografia() == "")) {
            $fotografia = new FotografiaDTO();
            $fotografia->setIdFotografia($IdFotografia);
            $fotografia->setNombreImagen($NombreImagen);
            $fotografia->setFecha($Fecha);
            $fotografia->setRuta($Ruta);
            $fotografia->setIdAlbum($IdAlbum);

            $result = $control->addFotografia($fotografia);

            if ($result) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Fotografia ingresada correctamente"
                ));
            } else {
                echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('errorMsg' => 'El o la fotografia ya existe, intento nuevamente.'));
        }
    } else if ($accion == "BORRAR") {
        $IdFotografia = htmlspecialchars($_REQUEST['IdFotografia']);

        $result = $control->removeFotografia($IdFotografia);
        if ($result) {
            echo json_encode(array('success' => true, 'mensaje' => "Fotografia borrado correctamente"));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    } else if ($accion == "BUSCAR") {
        $cadena = htmlspecialchars($_REQUEST['cadena']);
        $fotografias = $control->getFotografiaLikeAtrr($cadena);
        $json = json_encode($fotografias);
        echo $json;
    } else if ($accion == "BUSCAR_BY_ID") {
        $IdFotografia = htmlspecialchars($_REQUEST['IdFotografia']);

        $fotografia = $control->getFotografiaByID($IdFotografia);
        $json = json_encode($fotografia);
        echo $json;
    } else if ($accion == "ACTUALIZAR") {
        $IdFotografia = htmlspecialchars($_REQUEST['IdFotografia']);
        $NombreImagen = htmlspecialchars($_REQUEST['NombreImagen']);
        $Fecha = htmlspecialchars($_REQUEST['Fecha']);
        $Ruta = htmlspecialchars($_REQUEST['Ruta']);
        $IdAlbum = htmlspecialchars($_REQUEST['IdAlbum']);

            $fotografia = new FotografiaDTO();
            $fotografia->setIdFotografia($IdFotografia);
            $fotografia->setNombreImagen($NombreImagen);
            $fotografia->setFecha($Fecha);
            $fotografia->setRuta($Ruta);
            $fotografia->setIdAlbum($IdAlbum);

        $result = $control->updateFotografia($fotografia);
        if ($result) {
            echo json_encode(array(
                'success' => true,
                'mensaje' => "Fotografia actualizada correctamente"
            ));
        } else {
            echo json_encode(array('errorMsg' => 'Ha ocurrido un error.'));
        }
    }
}

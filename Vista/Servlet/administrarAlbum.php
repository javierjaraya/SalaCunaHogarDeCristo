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
        include_once("../../Util/SubirImagen.php");
        session_start();
        $RunPersona = $_SESSION["run"];
        $Titulo = htmlspecialchars($_REQUEST['Titulo']);
        $Descripcion = htmlspecialchars($_REQUEST['Descripcion']);

        $idAlbum = $control->getIdAlbumDisponible();  
        
        if($idAlbum == "" || $idAlbum == null || $idAlbum == 0){
            $idAlbum = 1;
        }
        
        $album = new AlbumDTO();
        $album->setIdAlbum($idAlbum);
        $album->setRunPersona($RunPersona);        
        $album->setTitulo($Titulo);
        $album->setDescripcion($Descripcion);
        
        if (validarTamaños($_FILES["Fotografias"], 10000000) == true) {
            $resulAlbum = $control->addAlbum($album);                        
            if ($resulAlbum) {
                //REGISTRO IMAGENES MODELO
                for ($i = 0; $i < count($_FILES["Fotografias"]["name"]); $i++) {
                    $subirImagen = new SubirImagen("../../Files/img/Fotografias/");
                    $fecha = date("Y") . date("m") . date("d") . date("H") . date("i") . date("s" . $i);
                    $nombreImagen = $subirImagen->asignaNombre($_FILES['Fotografias']['type'][$i], $fecha);
                    $subirImagen->setName($fecha);
                    $subirImagen->setMaximoSize(10000000); //10mb
                    //$subirImagen->set(300, 200);

                    $respuesta = $subirImagen->subirImagenEspecifica($_FILES["Fotografias"], $i);

                    if ($respuesta == true) {
                        $imagen = new FotografiaDTO();
                        $imagen->setRuta("Files/img/Fotografias/" . $nombreImagen);
                        $imagen->setNombreImagen($nombreImagen);
                        $imagen->setIdAlbum($idAlbum);

                        $valor = ($_FILES["Fotografias"]["size"][$i] / 1024) / 1024;
                        $tamaño = round($valor, 2, PHP_ROUND_HALF_UP);

                        $resultFotografia = $control->addFotografia($imagen); //Registramos la imagen en la BD
                    }
                }//FIN registro imagenes
            }

            if ($resulAlbum) {
                echo json_encode(array(
                    'success' => true,
                    'mensaje' => "Album Creado correctamente"
                ));
            } else {
                echo json_encode(array('success' => false, 'errorMsg' => 'Ha ocurrido un error.'));
            }
        } else {
            echo json_encode(array('success' => false, 'errorMsg' => 'Algunos Fotografias exceden el tamaño maximo permitido.'));
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

function validarTamaños($imagenes, $tamañoMaximo) {
    $validar = true;
    if ($imagenes["name"][0]) {
        for ($i = 0; $i < count($imagenes["name"]); $i++) {
            if ($imagenes["size"][$i] <= $tamañoMaximo) {
                //Imagen con tamaño permitido
            } else {
                $validar = false;
            }
        }
    } else {
        $validar = false;
    }
    return $validar;
}

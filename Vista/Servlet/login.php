<?php

include_once '../../Controlador/SalaCunaHogarDeCristo.php';
$control = SalaCunaHogarDeCristo::getInstancia();

$run = $_POST['inputRun'];
$clave = $_POST['inputPassword'];
$success = true;
$mensajes;
$pagina = "";
if (($run != null || $run != "") && ($clave != null || $clave != "")) {
    $usuario = $control->getUsuarioByRun($run);
    if ($usuario->getRunPersona() == $run) {
        if ($usuario->getClave() == $clave) {
            $usuario = $control->getUsuarioByRun($run);
            session_start();
            $_SESSION["autentificado"] = "SI";
            $_SESSION["idPerfil"] = $usuario->getIdPerfil();
            $_SESSION["run"] = $usuario->getRunPersona();
            
            $persona = $usuario->getPersona();
            $nombres = split(" ", $persona->getNombres());
            $apellidos = split(" ", $persona->getApellidos());
            $_SESSION["nombre"] = $nombres[0]." ".$apellidos[0];
            $_SESSION["sexo"] = $persona->getSexo();
            
            if ($usuario->getIdPerfil() == 1) {//administrador
                $pagina = "Vista/Layout/home.php";
            } else if ($usuario->getIdPerfil() == 2) {//Persona
                $pagina = "Vista/Layout/home.php";
            } else if ($usuario->getIdPerfil() == 3) {//Cuidador
                $pagina = "Vista/Layout/home.php";
            }
            $success = true;
            $mensajes = "Iniciando...";
        } else {
            $success = false;
            $mensajes = "La clave ingresada es incorrecta.";
        }
    } else {
        $success = false;
        $mensajes = "Usuario no existe.";
    }
} else {
    $success = false;
    $mensajes = "Ninguna casilla puede estar vacia.";
}
echo json_encode(array(
    'success' => $success,
    'mensaje' => $mensajes,
    'pagina' => $pagina
));
?>
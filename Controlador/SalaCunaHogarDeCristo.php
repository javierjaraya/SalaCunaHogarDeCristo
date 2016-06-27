<?php

include_once 'Mantenedores/AlbumDAO.php';
include_once 'Mantenedores/ApoderadoDAO.php';
include_once 'Mantenedores/EstadoDAO.php';
include_once 'Mantenedores/FotografiaDAO.php';
include_once 'Mantenedores/MenorDAO.php';
include_once 'Mantenedores/MensajeDAO.php';
include_once 'Mantenedores/NivelDAO.php';
include_once 'Mantenedores/OpinionDAO.php';
include_once 'Mantenedores/PerfilDAO.php';
include_once 'Mantenedores/PersonaDAO.php';
include_once 'Mantenedores/PertenecerDAO.php';
include_once 'Mantenedores/TipoopinionDAO.php';
include_once 'Mantenedores/TrabajadorDAO.php';
include_once 'Mantenedores/UsuarioDAO.php';

class SalaCunaHogarDeCristo {

    private static $instancia = NULL;
    private $albumDAO;
    private $apoderadoDAO;
    private $estadoDAO;
    private $fotografiaDAO;
    private $menorDAO;
    private $mensajeDAO;
    private $nivelDAO;
    private $opinionDAO;
    private $perfilDAO;
    private $personaDAO;
    private $pertenecerDAO;
    private $tipoopinionDAO;
    private $trabajadorDAO;
    private $usuarioDAO;

    public function SalaCunaHogarDeCristo() {
        $this->albumDAO = new AlbumDAO();
        $this->apoderadoDAO = new ApoderadoDAO();
        $this->estadoDAO = new EstadoDAO();
        $this->fotografiaDAO = new FotografiaDAO();
        $this->menorDAO = new MenorDAO();
        $this->mensajeDAO = new MensajeDAO();
        $this->nivelDAO = new NivelDAO();
        $this->opinionDAO = new OpinionDAO();
        $this->perfilDAO = new PerfilDAO();
        $this->personaDAO = new PersonaDAO();
        $this->pertenecerDAO = new PertenecerDAO();
        $this->tipoopinionDAO = new TipoopinionDAO();
        $this->trabajadorDAO = new TrabajadorDAO();
        $this->usuarioDAO = new UsuarioDAO();
    }

    public static function getInstancia() {
        if (self::$instancia == NULL) {
            self::$instancia = new SalaCunaHogarDeCristo();
        }
        return self::$instancia;
    }

    public function getAllAlbums() {
        return $this->albumDAO->findAll();
    }

    public function addAlbum($album) {
        return $this->albumDAO->save($album);
    }

    public function removeAlbum($IdAlbum) {
        return $this->albumDAO->delete($IdAlbum);
    }

    public function updateAlbum($album) {
        return $this->albumDAO->update($album);
    }

    public function getAlbumByID($IdAlbum) {
        return $this->albumDAO->findByID($IdAlbum);
    }

    public function getAlbumLikeAtrr($cadena) {
        return $this->albumDAO->findLikeAtrr($cadena);
    }
    
    public function getIdAlbumDisponible() {
        return $this->albumDAO->getIdDisponible();
    }

    public function getAllApoderados() {
        return $this->apoderadoDAO->findAll();
    }

    public function addApoderado($apoderado) {
        return $this->apoderadoDAO->save($apoderado);
    }

    public function removeApoderado($RunPersona) {
        return $this->apoderadoDAO->delete($RunPersona);
    }

    public function updateApoderado($apoderado) {
        return $this->apoderadoDAO->update($apoderado);
    }

    public function getApoderadoByID($RunPersona) {
        return $this->apoderadoDAO->findByID($RunPersona);
    }

    public function getApoderadoLikeAtrr($cadena) {
        return $this->apoderadoDAO->findLikeAtrr($cadena);
    }

    public function getApoderadosActivos() {
        return $this->apoderadoDAO->getApoderadosActivos();
    }

    public function getAllEstados() {
        return $this->estadoDAO->findAll();
    }

    public function addEstado($estado) {
        return $this->estadoDAO->save($estado);
    }

    public function removeEstado($IdEstado) {
        return $this->estadoDAO->delete($IdEstado);
    }

    public function updateEstado($estado) {
        return $this->estadoDAO->update($estado);
    }

    public function getEstadoByID($IdEstado) {
        return $this->estadoDAO->findByID($IdEstado);
    }

    public function getEstadoLikeAtrr($cadena) {
        return $this->estadoDAO->findLikeAtrr($cadena);
    }

    public function getAllFotografias() {
        return $this->fotografiaDAO->findAll();
    }
    
    public function getAllFotografiasByAlbum($IdAlbum) {
        return $this->fotografiaDAO->findAllByIdAlbum($IdAlbum);
    }

    public function addFotografia($fotografia) {
        return $this->fotografiaDAO->save($fotografia);
    }

    public function removeFotografia($IdFotografia) {
        return $this->fotografiaDAO->delete($IdFotografia);
    }

    public function updateFotografia($fotografia) {
        return $this->fotografiaDAO->update($fotografia);
    }

    public function getFotografiaByID($IdFotografia) {
        return $this->fotografiaDAO->findByID($IdFotografia);
    }

    public function getFotografiaLikeAtrr($cadena) {
        return $this->fotografiaDAO->findLikeAtrr($cadena);
    }

    public function getAllMenors() {
        return $this->menorDAO->findAll();
    }

    public function addMenor($menor) {
        return $this->menorDAO->save($menor);
    }

    public function removeMenor($RunPersona) {
        return $this->menorDAO->delete($RunPersona);
    }

    public function updateMenor($menor) {
        return $this->menorDAO->update($menor);
    }

    public function getMenorByID($RunPersona) {
        return $this->menorDAO->findByID($RunPersona);
    }

    public function getMenorLikeAtrr($cadena) {
        return $this->menorDAO->findLikeAtrr($cadena);
    }

    public function getAllMenorsHabilitados() {
        return $this->menorDAO->findAllHabilitados();
    }
    
    public function getAllMenorsHabilitadosByRunApoderado($runApoderado) {
        return $this->menorDAO->findAllHabilitadosByApoderado($runApoderado);
    }

    public function getAllMenorsDesHabilitados() {
        return $this->menorDAO->findAllDesHabilitados();
    }

    public function BuscaApoderadoMenor($runPersona) {
        return $this->menorDAO->BuscaApoderado($runPersona);
    }

    public function contarMenoresActivos($RunApoderado) {
        return $this->menorDAO->contarMenoresActivos($RunApoderado);
    }

    public function getAllMensajes() {
        return $this->mensajeDAO->findAll();
    }

    public function addMensaje($mensaje) {
        return $this->mensajeDAO->save($mensaje);
    }

    public function removeMensaje($idMensaje) {
        return $this->mensajeDAO->delete($idMensaje);
    }

    public function updateMensaje($mensaje) {
        return $this->mensajeDAO->update($mensaje);
    }

    public function getMensajeByID($idMensaje) {
        return $this->mensajeDAO->findByID($idMensaje);
    }

    public function getMensajeLikeAtrr($cadena) {
        return $this->mensajeDAO->findLikeAtrr($cadena);
    }

    public function getMensajesEntreContactos($runDesde, $runPara) {
        return $this->mensajeDAO->findByRunDesdeAndPara($runDesde, $runPara);
    }

    public function getAllNivels() {
        return $this->nivelDAO->findAll();
    }

    public function addNivel($nivel) {
        return $this->nivelDAO->save($nivel);
    }

    public function removeNivel($IdNivel) {
        return $this->nivelDAO->delete($IdNivel);
    }

    public function updateNivel($nivel) {
        return $this->nivelDAO->update($nivel);
    }

    public function getNivelByID($IdNivel) {
        return $this->nivelDAO->findByID($IdNivel);
    }

    public function getNivelLikeAtrr($cadena) {
        return $this->nivelDAO->findLikeAtrr($cadena);
    }

    public function getAllOpinions() {
        return $this->opinionDAO->findAll();
    }

    public function addOpinion($opinion) {
        return $this->opinionDAO->save($opinion);
    }

    public function removeOpinion($IdOpinion) {
        return $this->opinionDAO->delete($IdOpinion);
    }

    public function updateOpinion($opinion) {
        return $this->opinionDAO->update($opinion);
    }

    public function getOpinionByID($IdOpinion) {
        return $this->opinionDAO->findByID($IdOpinion);
    }

    public function getOpinionLikeAtrr($cadena) {
        return $this->opinionDAO->findLikeAtrr($cadena);
    }

    public function getAllPerfils() {
        return $this->perfilDAO->findAll();
    }

    public function addPerfil($perfil) {
        return $this->perfilDAO->save($perfil);
    }

    public function removePerfil($IdPerfil) {
        return $this->perfilDAO->delete($IdPerfil);
    }

    public function updatePerfil($perfil) {
        return $this->perfilDAO->update($perfil);
    }

    public function getPerfilByID($IdPerfil) {
        return $this->perfilDAO->findByID($IdPerfil);
    }

    public function getPerfilLikeAtrr($cadena) {
        return $this->perfilDAO->findLikeAtrr($cadena);
    }

    public function getAllPersonas() {
        return $this->personaDAO->findAll();
    }

    public function addPersona($persona) {
        return $this->personaDAO->save($persona);
    }

    public function removePersona($RunPersona) {
        return $this->personaDAO->delete($RunPersona);
    }

    public function updatePersona($persona) {
        return $this->personaDAO->update($persona);
    }

    public function getPersonaByID($RunPersona) {
        return $this->personaDAO->findByID($RunPersona);
    }

    public function getPersonaLikeAtrr($cadena) {
        return $this->personaDAO->findLikeAtrr($cadena);
    }

    public function getAllPertenecers() {
        return $this->pertenecerDAO->findAll();
    }

    public function addPertenecer($pertenecer) {
        return $this->pertenecerDAO->save($pertenecer);
    }

    public function removePertenecer($IdNivel) {
        return $this->pertenecerDAO->delete($IdNivel);
    }

    public function updatePertenecer($pertenecer) {
        return $this->pertenecerDAO->update($pertenecer);
    }

    public function getPertenecerByID($IdNivel) {
        return $this->pertenecerDAO->findByID($IdNivel);
    }

    public function getPertenecerLikeAtrr($cadena) {
        return $this->pertenecerDAO->findLikeAtrr($cadena);
    }

    public function getAllTipoopinions() {
        return $this->tipoopinionDAO->findAll();
    }

    public function addTipoopinion($tipoopinion) {
        return $this->tipoopinionDAO->save($tipoopinion);
    }

    public function removeTipoopinion($IdTipoOpinion) {
        return $this->tipoopinionDAO->delete($IdTipoOpinion);
    }

    public function updateTipoopinion($tipoopinion) {
        return $this->tipoopinionDAO->update($tipoopinion);
    }

    public function getTipoopinionByID($IdTipoOpinion) {
        return $this->tipoopinionDAO->findByID($IdTipoOpinion);
    }

    public function getTipoopinionLikeAtrr($cadena) {
        return $this->tipoopinionDAO->findLikeAtrr($cadena);
    }

    public function getAllopinionPorTipoOpinion($IdTipoOpinion) {
        return $this->opinionDAO->findByTipoOpinion($IdTipoOpinion);
    }

    public function getAllTrabajadors() {
        return $this->trabajadorDAO->findAll();
    }

    public function addTrabajador($trabajador) {
        return $this->trabajadorDAO->save($trabajador);
    }

    public function removeTrabajador($RunPersona) {
        return $this->trabajadorDAO->delete($RunPersona);
    }

    public function updateTrabajador($trabajador) {
        return $this->trabajadorDAO->update($trabajador);
    }

    public function getTrabajadorByID($RunPersona) {
        return $this->trabajadorDAO->findByID($RunPersona);
    }

    public function getTrabajadorLikeAtrr($cadena) {
        return $this->trabajadorDAO->findLikeAtrr($cadena);
    }

    public function getTrabajadoresActivos() {
        return $this->trabajadorDAO->getTrabajadoresActivos();
    }

    public function getAllUsuarios() {
        return $this->usuarioDAO->findAll();
    }

    public function addUsuario($usuario) {
        return $this->usuarioDAO->save($usuario);
    }

    public function removeUsuario($RunPersona) {
        return $this->usuarioDAO->delete($RunPersona);
    }

    public function updateUsuario($usuario) {
        return $this->usuarioDAO->update($usuario);
    }

    public function getUsuarioByRun($RunPersona) {
        return $this->usuarioDAO->findByID($RunPersona);
    }

    public function getUsuarioLikeAtrr($cadena) {
        return $this->usuarioDAO->findLikeAtrr($cadena);
    }

}

?>
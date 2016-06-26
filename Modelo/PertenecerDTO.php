<?php
class PertenecerDTO {
    public $IdNivel;
    public $RunPersona;

    public function PertenecerDTO(){
    }

    function getIdNivel() {
        return $this->IdNivel;
    }

    function setIdNivel($IdNivel) {
        return $this->IdNivel = $IdNivel;
    }

    function getRunPersona() {
        return $this->RunPersona;
    }

    function setRunPersona($RunPersona) {
        return $this->RunPersona = $RunPersona;
    }

}
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of grupo
 *
 * @author Only Dev & OP
 */
class grupo {
    private $idgrupo_empresarial;
    private $nombre_grupo_empresarial;
    private $estado_grupo_empresarial;
    
    function __construct($idgrupo_empresarial, $nombre_grupo_empresarial, $estado_grupo_empresarial) {
        $this->idgrupo_empresarial = $idgrupo_empresarial;
        $this->nombre_grupo_empresarial = $nombre_grupo_empresarial;
        $this->estado_grupo_empresarial = $estado_grupo_empresarial;
    }

    
    function getIdgrupo_empresarial() {
        return $this->idgrupo_empresarial;
    }

    function getNombre_grupo_empresarial() {
        return $this->nombre_grupo_empresarial;
    }

    function getEstado_grupo_empresarial() {
        return $this->estado_grupo_empresarial;
    }

    function setIdgrupo_empresarial($idgrupo_empresarial) {
        $this->idgrupo_empresarial = $idgrupo_empresarial;
    }

    function setNombre_grupo_empresarial($nombre_grupo_empresarial) {
        $this->nombre_grupo_empresarial = $nombre_grupo_empresarial;
    }

    function setEstado_grupo_empresarial($estado_grupo_empresarial) {
        $this->estado_grupo_empresarial = $estado_grupo_empresarial;
    }


}

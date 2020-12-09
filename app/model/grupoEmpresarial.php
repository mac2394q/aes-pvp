<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of grupoEmpresarial
 *
 * @author Only Dev & OP
 */
class grupoEmpresarial {
    private $idgrupo_empresarial;
    private $nombre_grupoEmpresarial;
    private $estado_grupoEmpresarial;
    
    function __construct($idgrupo_empresarial, $nombre_grupoEmpresarial, $estado_grupoEmpresarial) {
        $this->idgrupo_empresarial = $idgrupo_empresarial;
        $this->nombre_grupoEmpresarial = $nombre_grupoEmpresarial;
        $this->estado_grupoEmpresarial = $estado_grupoEmpresarial;
        
        
        
    }
    
    
    function getIdgrupo_empresarial() {
        return $this->idgrupo_empresarial;
    }

    function getNombre_grupoEmpresarial() {
        return $this->nombre_grupoEmpresarial;
    }

    function getEstado_grupoEmpresarial() {
        return $this->estado_grupoEmpresarial;
    }

    function setIdgrupo_empresarial($idgrupo_empresarial) {
        $this->idgrupo_empresarial = $idgrupo_empresarial;
    }

    function setNombre_grupoEmpresarial($nombre_grupoEmpresarial) {
        $this->nombre_grupoEmpresarial = $nombre_grupoEmpresarial;
    }

    function setEstado_grupoEmpresarial($estado_grupoEmpresarial) {
        $this->estado_grupoEmpresarial = $estado_grupoEmpresarial;
    }



}

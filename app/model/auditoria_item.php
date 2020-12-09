<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auditoria_item
 *
 * @author Only Dev & OP
 */
class auditoria_item {
    private $idauditoria_item;
    private $idauditoria;
    private $iditem_grupo_plantilla_auditoria_item;
    private $observacion_empresa;
    private $observacion_auditor;
    private $archivo_evidencia;
    private $estado_auditoria_item;
    
    function __construct($idauditoria_item,$idauditoria, $iditem_grupo_plantilla_auditoria_item, $observacion_empresa, $observacion_auditor, $archivo_evidencia, $estado_auditoria_item) {
        $this->idauditoria_item = $idauditoria_item;
        $this->idauditoria = $idauditoria;
        $this->iditem_grupo_plantilla_auditoria_item = $iditem_grupo_plantilla_auditoria_item;
        $this->observacion_empresa = $observacion_empresa;
        $this->observacion_auditor = $observacion_auditor;
        $this->archivo_evidencia = $archivo_evidencia;
        $this->estado_auditoria_item = $estado_auditoria_item;
    }

    
    function getIdauditoria_item() {
        return $this->idauditoria_item;
    }

    function getIdauditoria() {
        return $this->idauditoria;
    }

    function getIditem_grupo_plantilla_auditoria_item() {
        return $this->iditem_grupo_plantilla_auditoria_item;
    }

    function getObservacion_empresa() {
        return $this->observacion_empresa;
    }

    function getObservacion_auditor() {
        return $this->observacion_auditor;
    }

    function getArchivo_evidencia() {
        return $this->archivo_evidencia;
    }

    function getEstado_auditoria_item() {
        return $this->estado_auditoria_item;
    }

    function setIdauditoria_item($idauditoria_item) {
        $this->idauditoria_item = $idauditoria_item;
    }

    function setIdauditoria($idauditoria) {
        $this->idauditoria = $idauditoria;
    }

    function setIditem_grupo_plantilla_auditoria_item($iditem_grupo_plantilla_auditoria_item) {
        $this->iditem_grupo_plantilla_auditoria_item = $iditem_grupo_plantilla_auditoria_item;
    }

    function setObservacion_empresa($observacion_empresa) {
        $this->observacion_empresa = $observacion_empresa;
    }

    function setObservacion_auditor($observacion_auditor) {
        $this->observacion_auditor = $observacion_auditor;
    }

    function setArchivo_evidencia($archivo_evidencia) {
        $this->archivo_evidencia = $archivo_evidencia;
    }

    function setEstado_auditoria_item($estado_auditoria_item) {
        $this->estado_auditoria_item = $estado_auditoria_item;
    }


    
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of auditoria
 *
 * @author Only Dev & OP
 */
class auditoria {
    private $idauditoria;
    private $idempresa_ancla;
    private $idempresa_asociada;
    private $idsede_auditoria;
    private $fecha_programada_auditoria;
    private $fecha_cierre_auditoria;
    private $idusuario_auditor;
    private $idplantilla_madre_aditoria;
    private $idusuario_crear_auditoria;
    private $estado_auditoria;
    private $objetivo_auditoria;
    private $criterios_auditoria;
    private $direccion_auditoria;
    private $observacion_auditoria;
    private $descripcion_auditoria;
    private $localidad_auditoria;
    private $link_auditoria;
    private $descripcion_condiciones_entorno_auditoria;
    private $descripcion_condiciones_interna_auditoria;
    private $actividades_auditoria;
    private $conclusion_auditoria;
    private $recomendacion_auditoria;
    
    function __construct($idauditoria, $idempresa_ancla, $idempresa_asociada, $idsede_auditoria, $fecha_programada_auditoria, $fecha_cierre_auditoria, $idusuario_auditor, $idplantilla_madre_aditoria, $idusuario_crear_auditoria, $estado_auditoria, $objetivo_auditoria, $criterios_auditoria, $direccion_auditoria, $observacion_auditoria, $descripcion_auditoria, $localidad_auditoria, $link_auditoria, $descripcion_condiciones_entorno_auditoria, $descripcion_condiciones_interna_auditoria, $actividades_auditoria, $conclusion_auditoria, $recomendacion_auditoria) {
        $this->idauditoria = $idauditoria;
        $this->idempresa_ancla = $idempresa_ancla;
        $this->idempresa_asociada = $idempresa_asociada;
        $this->idsede_auditoria = $idsede_auditoria;
        $this->fecha_programada_auditoria = $fecha_programada_auditoria;
        $this->fecha_cierre_auditoria = $fecha_cierre_auditoria;
        $this->idusuario_auditor = $idusuario_auditor;
        $this->idplantilla_madre_aditoria = $idplantilla_madre_aditoria;
        $this->idusuario_crear_auditoria = $idusuario_crear_auditoria;
        $this->estado_auditoria = $estado_auditoria;
        $this->objetivo_auditoria = $objetivo_auditoria;
        $this->criterios_auditoria = $criterios_auditoria;
        $this->direccion_auditoria = $direccion_auditoria;
        $this->observacion_auditoria = $observacion_auditoria;
        $this->descripcion_auditoria = $descripcion_auditoria;
        $this->localidad_auditoria = $localidad_auditoria;
        $this->link_auditoria = $link_auditoria;
        $this->descripcion_condiciones_entorno_auditoria = $descripcion_condiciones_entorno_auditoria;
        $this->descripcion_condiciones_interna_auditoria = $descripcion_condiciones_interna_auditoria;
        $this->actividades_auditoria = $actividades_auditoria;
        $this->conclusion_auditoria = $conclusion_auditoria;
        $this->recomendacion_auditoria = $recomendacion_auditoria;
    }
    function getIdauditoria() {
        return $this->idauditoria;
    }

    function getIdempresa_ancla() {
        return $this->idempresa_ancla;
    }

    function getIdempresa_asociada() {
        return $this->idempresa_asociada;
    }

    function getIdsede_auditoria() {
        return $this->idsede_auditoria;
    }

    function getFecha_programada_auditoria() {
        return $this->fecha_programada_auditoria;
    }

    function getFecha_cierre_auditoria() {
        return $this->fecha_cierre_auditoria;
    }

    function getIdusuario_auditor() {
        return $this->idusuario_auditor;
    }

    function getIdplantilla_madre_aditoria() {
        return $this->idplantilla_madre_aditoria;
    }

    function getIdusuario_crear_auditoria() {
        return $this->idusuario_crear_auditoria;
    }

    function getEstado_auditoria() {
        return $this->estado_auditoria;
    }

    function getObjetivo_auditoria() {
        return $this->objetivo_auditoria;
    }

    function getCriterios_auditoria() {
        return $this->criterios_auditoria;
    }

    function getDireccion_auditoria() {
        return $this->direccion_auditoria;
    }

    function getObservacion_auditoria() {
        return $this->observacion_auditoria;
    }

    function getDescripcion_auditoria() {
        return $this->descripcion_auditoria;
    }

    function getLocalidad_auditoria() {
        return $this->localidad_auditoria;
    }

    function getLink_auditoria() {
        return $this->link_auditoria;
    }

    function getDescripcion_condiciones_entorno_auditoria() {
        return $this->descripcion_condiciones_entorno_auditoria;
    }

    function getDescripcion_condiciones_interna_auditoria() {
        return $this->descripcion_condiciones_interna_auditoria;
    }

    function getActividades_auditoria() {
        return $this->actividades_auditoria;
    }

    function getConclusion_auditoria() {
        return $this->conclusion_auditoria;
    }

    function getRecomendacion_auditoria() {
        return $this->recomendacion_auditoria;
    }

    function setIdauditoria($idauditoria) {
        $this->idauditoria = $idauditoria;
    }

    function setIdempresa_ancla($idempresa_ancla) {
        $this->idempresa_ancla = $idempresa_ancla;
    }

    function setIdempresa_asociada($idempresa_asociada) {
        $this->idempresa_asociada = $idempresa_asociada;
    }

    function setIdsede_auditoria($idsede_auditoria) {
        $this->idsede_auditoria = $idsede_auditoria;
    }

    function setFecha_programada_auditoria($fecha_programada_auditoria) {
        $this->fecha_programada_auditoria = $fecha_programada_auditoria;
    }

    function setFecha_cierre_auditoria($fecha_cierre_auditoria) {
        $this->fecha_cierre_auditoria = $fecha_cierre_auditoria;
    }

    function setIdusuario_auditor($idusuario_auditor) {
        $this->idusuario_auditor = $idusuario_auditor;
    }

    function setIdplantilla_madre_aditoria($idplantilla_madre_aditoria) {
        $this->idplantilla_madre_aditoria = $idplantilla_madre_aditoria;
    }

    function setIdusuario_crear_auditoria($idusuario_crear_auditoria) {
        $this->idusuario_crear_auditoria = $idusuario_crear_auditoria;
    }

    function setEstado_auditoria($estado_auditoria) {
        $this->estado_auditoria = $estado_auditoria;
    }

    function setObjetivo_auditoria($objetivo_auditoria) {
        $this->objetivo_auditoria = $objetivo_auditoria;
    }

    function setCriterios_auditoria($criterios_auditoria) {
        $this->criterios_auditoria = $criterios_auditoria;
    }

    function setDireccion_auditoria($direccion_auditoria) {
        $this->direccion_auditoria = $direccion_auditoria;
    }

    function setObservacion_auditoria($observacion_auditoria) {
        $this->observacion_auditoria = $observacion_auditoria;
    }

    function setDescripcion_auditoria($descripcion_auditoria) {
        $this->descripcion_auditoria = $descripcion_auditoria;
    }

    function setLocalidad_auditoria($localidad_auditoria) {
        $this->localidad_auditoria = $localidad_auditoria;
    }

    function setLink_auditoria($link_auditoria) {
        $this->link_auditoria = $link_auditoria;
    }

    function setDescripcion_condiciones_entorno_auditoria($descripcion_condiciones_entorno_auditoria) {
        $this->descripcion_condiciones_entorno_auditoria = $descripcion_condiciones_entorno_auditoria;
    }

    function setDescripcion_condiciones_interna_auditoria($descripcion_condiciones_interna_auditoria) {
        $this->descripcion_condiciones_interna_auditoria = $descripcion_condiciones_interna_auditoria;
    }

    function setActividades_auditoria($actividades_auditoria) {
        $this->actividades_auditoria = $actividades_auditoria;
    }

    function setConclusion_auditoria($conclusion_auditoria) {
        $this->conclusion_auditoria = $conclusion_auditoria;
    }

    function setRecomendacion_auditoria($recomendacion_auditoria) {
        $this->recomendacion_auditoria = $recomendacion_auditoria;
    }


}
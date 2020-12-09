<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detalle_item_plan_accion
 *
 * @author Only Dev & OP
 */
class detalle_item_plan_accion {
    private $iddetalle_item_plan_accion;
    private $idauditoria_item_detalle_item;
    private $idplan_accion_detalle_item;
    private $accion_realizar;
    private $responsable;
    private $fecha_realizar;
    private $porcentaje_avance;
    private $adjunto_evidencia;
    
    function __construct($iddetalle_item_plan_accion, $idauditoria_item_detalle_item, $idplan_accion_detalle_item, $accion_realizar, $responsable, $fecha_realizar, $porcentaje_avance, $adjunto_evidencia) {
        $this->iddetalle_item_plan_accion = $iddetalle_item_plan_accion;
        $this->idauditoria_item_detalle_item = $idauditoria_item_detalle_item;
        $this->idplan_accion_detalle_item = $idplan_accion_detalle_item;
        $this->accion_realizar = $accion_realizar;
        $this->responsable = $responsable;
        $this->fecha_realizar = $fecha_realizar;
        $this->porcentaje_avance = $porcentaje_avance;
        $this->adjunto_evidencia = $adjunto_evidencia;
    }

    function getIddetalle_item_plan_accion() {
        return $this->iddetalle_item_plan_accion;
    }

    function getIdauditoria_item_detalle_item() {
        return $this->idauditoria_item_detalle_item;
    }

    function getIdplan_accion_detalle_item() {
        return $this->idplan_accion_detalle_item;
    }

    function getAccion_realizar() {
        return $this->accion_realizar;
    }

    function getResponsable() {
        return $this->responsable;
    }

    function getFecha_realizar() {
        return $this->fecha_realizar;
    }

    function getPorcentaje_avance() {
        return $this->porcentaje_avance;
    }

    function getAdjunto_evidencia() {
        return $this->adjunto_evidencia;
    }

    function setIddetalle_item_plan_accion($iddetalle_item_plan_accion) {
        $this->iddetalle_item_plan_accion = $iddetalle_item_plan_accion;
    }

    function setIdauditoria_item_detalle_item($idauditoria_item_detalle_item) {
        $this->idauditoria_item_detalle_item = $idauditoria_item_detalle_item;
    }

    function setIdplan_accion_detalle_item($idplan_accion_detalle_item) {
        $this->idplan_accion_detalle_item = $idplan_accion_detalle_item;
    }

    function setAccion_realizar($accion_realizar) {
        $this->accion_realizar = $accion_realizar;
    }

    function setResponsable($responsable) {
        $this->responsable = $responsable;
    }

    function setFecha_realizar($fecha_realizar) {
        $this->fecha_realizar = $fecha_realizar;
    }

    function setPorcentaje_avance($porcentaje_avance) {
        $this->porcentaje_avance = $porcentaje_avance;
    }

    function setAdjunto_evidencia($adjunto_evidencia) {
        $this->adjunto_evidencia = $adjunto_evidencia;
    }


}

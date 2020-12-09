<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of plan_accion
 *
 * @author Only Dev & OP
 */
class plan_accion {
    private $idplan_accion;
    private $idauditoria_plan_accion;
    private $fecha_realizacion;
    private $estado_plan_accion;
    
    
    function __construct($idplan_accion, $idauditoria_plan_accion, $fecha_realizacion, $estado_plan_accion) {
        $this->idplan_accion = $idplan_accion;
        $this->idauditoria_plan_accion = $idauditoria_plan_accion;
        $this->fecha_realizacion = $fecha_realizacion;
        $this->estado_plan_accion = $estado_plan_accion;
    }
    
    function getIdplan_accion() {
        return $this->idplan_accion;
    }

    function getIdauditoria_plan_accion() {
        return $this->idauditoria_plan_accion;
    }

    function getFecha_realizacion() {
        return $this->fecha_realizacion;
    }

    function getEstado_plan_accion() {
        return $this->estado_plan_accion;
    }

    function setIdplan_accion($idplan_accion) {
        $this->idplan_accion = $idplan_accion;
    }

    function setIdauditoria_plan_accion($idauditoria_plan_accion) {
        $this->idauditoria_plan_accion = $idauditoria_plan_accion;
    }

    function setFecha_realizacion($fecha_realizacion) {
        $this->fecha_realizacion = $fecha_realizacion;
    }

    function setEstado_plan_accion($estado_plan_accion) {
        $this->estado_plan_accion = $estado_plan_accion;
    }



}

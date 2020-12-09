<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estatus
 *
 * @author Only Dev & OP
 */
class estatus {
    private $nombre;
    private $ciudad;
    private $estatus;
    private $fecha_auditoria;
    private $fecha_plan;
    private $cumplimiento;
    function __construct($nombre, $ciudad, $estatus, $fecha_auditoria, $fecha_plan, $cumplimiento) {
        $this->nombre = $nombre;
        $this->ciudad = $ciudad;
        $this->estatus = $estatus;
        $this->fecha_auditoria = $fecha_auditoria;
        $this->fecha_plan = $fecha_plan;
        $this->cumplimiento = $cumplimiento;
    }
    function getNombre() {
        return $this->nombre;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getEstatus() {
        return $this->estatus;
    }

    function getFecha_auditoria() {
        return $this->fecha_auditoria;
    }

    function getFecha_plan() {
        return $this->fecha_plan;
    }

    function getCumplimiento() {
        return $this->cumplimiento;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setEstatus($estatus) {
        $this->estatus = $estatus;
    }

    function setFecha_auditoria($fecha_auditoria) {
        $this->fecha_auditoria = $fecha_auditoria;
    }

    function setFecha_plan($fecha_plan) {
        $this->fecha_plan = $fecha_plan;
    }

    function setCumplimiento($cumplimiento) {
        $this->cumplimiento = $cumplimiento;
    }



}

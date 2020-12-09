<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of sede
 *
 * @author Only Dev & OP
 */
class sede {
    
    private $idsede;
    private $idempresa_sede;
    private $ciudad_sede;
    private $n_empleados;
    private $direccion_sede;
    private $cantidad_procesos_sede;
    private $contacto_sede;
    private $cargo_Sede;
    private $telefono_movil_contacto_sede;
    private $correo_empresarial_sede;
    
    function __construct($idsede, $idempresa_sede, $ciudad_sede, $n_empleados, $direccion_sede, $cantidad_procesos_sede, $contacto_sede, $cargo_Sede, $telefono_movil_contacto_sede, $correo_empresarial_sede) {
        $this->idsede = $idsede;
        $this->idempresa_sede = $idempresa_sede;
        $this->ciudad_sede = $ciudad_sede;
        $this->n_empleados = $n_empleados;
        $this->direccion_sede = $direccion_sede;
        $this->cantidad_procesos_sede = $cantidad_procesos_sede;
        $this->contacto_sede = $contacto_sede;
        $this->cargo_Sede = $cargo_Sede;
        $this->telefono_movil_contacto_sede = $telefono_movil_contacto_sede;
        $this->correo_empresarial_sede = $correo_empresarial_sede;
    }
    
    function getIdsede() {
        return $this->idsede;
    }
    function getIdempresa_sede() {
        return $this->idempresa_sede;
    }
    function getCiudad_sede() {
        return $this->ciudad_sede;
    }
    function getN_empleados() {
        return $this->n_empleados;
    }
    function getDireccion_sede() {
        return $this->direccion_sede;
    }
    function getCantidad_procesos_sede() {
        return $this->cantidad_procesos_sede;
    }
    function getContacto_sede() {
        return $this->contacto_sede;
    }
    function getCargo_Sede() {
        return $this->cargo_Sede;
    }
    function getTelefono_movil_contacto_sede() {
        return $this->telefono_movil_contacto_sede;
    }
    function getCorreo_empresarial_sede() {
        return $this->correo_empresarial_sede;
    }
    function setIdsede($idsede) {
        $this->idsede = $idsede;
    }
    function setIdempresa_sede($idempresa_sede) {
        $this->idempresa_sede = $idempresa_sede;
    }
    function setCiudad_sede($ciudad_sede) {
        $this->ciudad_sede = $ciudad_sede;
    }
    function setN_empleados($n_empleados) {
        $this->n_empleados = $n_empleados;
    }
    function setDireccion_sede($direccion_sede) {
        $this->direccion_sede = $direccion_sede;
    }
    function setCantidad_procesos_sede($cantidad_procesos_sede) {
        $this->cantidad_procesos_sede = $cantidad_procesos_sede;
    }
    function setContacto_sede($contacto_sede) {
        $this->contacto_sede = $contacto_sede;
    }
    function setCargo_Sede($cargo_Sede) {
        $this->cargo_Sede = $cargo_Sede;
    }
    function setTelefono_movil_contacto_sede($telefono_movil_contacto_sede) {
        $this->telefono_movil_contacto_sede = $telefono_movil_contacto_sede;
    }
    function setCorreo_empresarial_sede($correo_empresarial_sede) {
        $this->correo_empresarial_sede = $correo_empresarial_sede;
    }
    
    
    
    
    
    
    
}

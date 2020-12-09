<?php

class sesion {
    private $idsesion;
    private $usuario_sesion;
    private $clave_sesion;
    private $rol_sesion;
    private $ultima_conexion_sesion;
    private $estado_sesion;
    
    function __construct($idsesion, $usuario_sesion, $clave_sesion, $rol_sesion, $ultima_conexion_sesion, $estado_sesion) {
        $this->idsesion = $idsesion;
        $this->usuario_sesion = $usuario_sesion;
        $this->clave_sesion = $clave_sesion;
        $this->rol_sesion = $rol_sesion;
        $this->ultima_conexion_sesion = $ultima_conexion_sesion;
        $this->estado_sesion = $estado_sesion;
    }
    
    function getIdsesion() {
        return $this->idsesion;
    }

    function getUsuario_sesion() {
        return $this->usuario_sesion;
    }

    function getClave_sesion() {
        return $this->clave_sesion;
    }

    function getRol_sesion() {
        return $this->rol_sesion;
    }

    function getUltima_conexion_sesion() {
        return $this->ultima_conexion_sesion;
    }

    function getEstado_sesion() {
        return $this->estado_sesion;
    }

    function setIdsesion($idsesion) {
        $this->idsesion = $idsesion;
    }

    function setUsuario_sesion($usuario_sesion) {
        $this->usuario_sesion = $usuario_sesion;
    }

    function setClave_sesion($clave_sesion) {
        $this->clave_sesion = $clave_sesion;
    }

    function setRol_sesion($rol_sesion) {
        $this->rol_sesion = $rol_sesion;
    }

    function setUltima_conexion_sesion($ultima_conexion_sesion) {
        $this->ultima_conexion_sesion = $ultima_conexion_sesion;
    }

    function setEstado_sesion($estado_sesion) {
        $this->estado_sesion = $estado_sesion;
    }



}

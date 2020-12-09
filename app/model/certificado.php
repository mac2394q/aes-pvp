<?php

class certificado {
    private $idcertificado;
    private $idempresa_certificado;
    private $etiqueta_certificado;
    private $entidad_certificado;
    private $codigo_certificado;
    private $fecha_certificado;
    
    function __construct($idcertificado, $idempresa_certificado, $etiqueta_certificado,$entidad_certificado, $codigo_certificado, $fecha_certificado) {
        $this->idcertificado = $idcertificado;
        $this->idempresa_certificado = $idempresa_certificado;
        $this->etiqueta_certificado = $etiqueta_certificado;
        $this->entidad_certificado = $entidad_certificado;
        $this->codigo_certificado = $codigo_certificado;
        $this->fecha_certificado = $fecha_certificado;
    }
    
    function getIdcertificado() {
        return $this->idcertificado;
    }

    function getIdempresa_certificado() {
        return $this->idempresa_certificado;
    }

    function getEtiqueta_certificado() {
        return $this->etiqueta_certificado;
    }

    function getEntidad_certificado() {
        return $this->entidad_certificado;
    }

    function getCodigo_certificado() {
        return $this->codigo_certificado;
    }

    function getFecha_certificado() {
        return $this->fecha_certificado;
    }

    function setIdcertificado($idcertificado) {
        $this->idcertificado = $idcertificado;
    }

    function setIdempresa_certificado($idempresa_certificado) {
        $this->idempresa_certificado = $idempresa_certificado;
    }

    function setEtiqueta_certificado($etiqueta_certificado) {
        $this->etiqueta_certificado = $etiqueta_certificado;
    }

    function setEntidad_certificado($entidad_certificado) {
        $this->entidad_certificado = $entidad_certificado;
    }

    function setCodigo_certificado($codigo_certificado) {
        $this->codigo_certificado = $codigo_certificado;
    }

    function setFecha_certificado($fecha_certificado) {
        $this->fecha_certificado = $fecha_certificado;
    }



    
    
}

<?php
class asignacion_validacion_empresa {
    
    private $idempresa_asignacion;
    private $idvalidacion_empresa;
    private $concepto;
  

    function __construct($idempresa_asignacion, $idvalidacion_empresa, $concepto) {
    
        $this->idempresa_asignacion = $idempresa_asignacion;
        $this->idvalidacion_empresa = $idvalidacion_empresa;
        $this->concepto = $concepto;
    }
    function getidempresa_asignacion() {
        return $this->idempresa_asignacion;
    }

    function getidvalidacion_empresa() {
        return $this->idvalidacion_empresa;
    }

    function getconcepto() {
        return $this->concepto;
    }
   
    function setidempresa_asignacion($idempresa_asignacion) {
        $this->idempresa_asignacion = $idempresa_asignacion;
    }
   
    function setfecha_registro_validacion_empresa($fecha_registro_validacion_empresa) {
        $this->fecha_registro_validacion_empresa = $fecha_registro_validacion_empresa;
    }
    function setidvalidacion_empresa($idvalidacion_empresa) {
        $this->idvalidacion_empresa = $idvalidacion_empresa;
    }
    function setconcepto($concepto) {
        $this->concepto = $concepto;
    }
 
    
}

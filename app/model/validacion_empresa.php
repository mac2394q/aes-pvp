<?php
class validacion_empresa {
    
    private $id_validacion_empresa;
    private $fecha_registro_validacion_empresa;
    private $documento_validacion_empresa;
    private $concepto_validacion_empresa;
    private $estado_validacion_empresa;

    function __construct($id_validacion_empresa, $fecha_registro_validacion_empresa, $documento_validacion_empresa, $concepto_validacion_empresa,$estado_validacion_empresa) {
        $this->id_validacion_empresa = $id_validacion_empresa;
        
        $this->fecha_registro_validacion_empresa = $fecha_registro_validacion_empresa;
        $this->documento_validacion_empresa = $documento_validacion_empresa;
        $this->concepto_validacion_empresa = $concepto_validacion_empresa;
        $this->estado_validacion_empresa = $estado_validacion_empresa;
    }
    function getid_validacion_empresa() {
        return $this->id_validacion_empresa;
    }

    function getfecha_registro_validacion_empresa() {
        return $this->fecha_registro_validacion_empresa;
    }
    function getdocumento_validacion_empresa() {
        return $this->documento_validacion_empresa;
    }
    function getconcepto_validacion_empresa() {
        return $this->concepto_validacion_empresa;
    }
    function getestado_validacion_empresa() {
        return $this->estado_validacion_empresa;
    }
    function setid_validacion_empresa($id_validacion_empresa) {
        $this->id_validacion_empresa = $id_validacion_empresa;
    }
   
    function setfecha_registro_validacion_empresa($fecha_registro_validacion_empresa) {
        $this->fecha_registro_validacion_empresa = $fecha_registro_validacion_empresa;
    }
    function setdocumento_validacion_empresa($documento_validacion_empresa) {
        $this->documento_validacion_empresa = $documento_validacion_empresa;
    }
    function setconcepto_validacion_empresa($concepto_validacion_empresa) {
        $this->concepto_validacion_empresa = $concepto_validacion_empresa;
    }
    function setestado_validacion_empresa($estado_validacion_empresa) {
        $this->estado_validacion_empresa = $estado_validacion_empresa;
    }
    
}

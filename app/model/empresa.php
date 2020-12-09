<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of empresa
 *
 * @author Only Dev & OP
 */
class empresa {
    
    private $idempresarial;
    private $idgrupoEmpresarial;
    private $nombre_empresa;
    private $nit_empresa;
    private $ciudad_principal_empresa;
    private $departamento;
    private $direccion_empresa;
    private $pais_empresa;
    private $correo_empresa;
    private $idarea_tecnica_empresa;
    private $representante_legal_empresa;
    private $cargo_representante_empresa;
    private $telefono_movil_representante_empresa;
    private $sitio_web_empresa;
    private $fecha_corte_facturacion_empresa;
    private $correo_facturacion_empresa;
    private $idsesion_empresa;
    private $estado_empresa;
    private $representante_sistema_gestion;
    private $cargo_representante_sistema_gestion_empresa;
    private $telefono_movil_representante_sistema_gestion_empresa;
    private $correo_sistema_gestion_empresa;
    
    function __construct($idempresarial, $idgrupoEmpresarial, $nombre_empresa, $nit_empresa, $ciudad_principal_empresa,$departamento ,$direccion_empresa, $pais_empresa, $correo_empresa, $idarea_tecnica_empresa, $representante_legal_empresa, $cargo_representante_empresa, $telefono_movil_representante_empresa, $sitio_web_empresa, $fecha_corte_facturacion_empresa, $correo_facturacion_empresa, $idsesion_empresa, $estado_empresa, $representante_sistema_gestion, $cargo_representante_sistema_gestion_empresa, $telefono_movil_representante_sistema_gestion_empresa, $correo_sistema_gestion_empresa) {
        $this->idempresarial = $idempresarial;
        $this->idgrupoEmpresarial = $idgrupoEmpresarial;
        $this->nombre_empresa = $nombre_empresa;
        $this->nit_empresa = $nit_empresa;
        $this->ciudad_principal_empresa = $ciudad_principal_empresa;
        $this->departamento = $departamento;
        $this->direccion_empresa = $direccion_empresa;
        $this->pais_empresa = $pais_empresa;
        $this->correo_empresa = $correo_empresa;
        $this->idarea_tecnica_empresa = $idarea_tecnica_empresa;
        $this->representante_legal_empresa = $representante_legal_empresa;
        $this->cargo_representante_empresa = $cargo_representante_empresa;
        $this->telefono_movil_representante_empresa = $telefono_movil_representante_empresa;
        $this->sitio_web_empresa = $sitio_web_empresa;
        $this->fecha_corte_facturacion_empresa = $fecha_corte_facturacion_empresa;
        $this->correo_facturacion_empresa = $correo_facturacion_empresa;
        $this->idsesion_empresa = $idsesion_empresa;
        $this->estado_empresa = $estado_empresa;
        $this->representante_sistema_gestion = $representante_sistema_gestion;
        $this->cargo_representante_sistema_gestion_empresa = $cargo_representante_sistema_gestion_empresa;
        $this->telefono_movil_representante_sistema_gestion_empresa = $telefono_movil_representante_sistema_gestion_empresa;
        $this->correo_sistema_gestion_empresa = $correo_sistema_gestion_empresa;
    }
    
    function getIdempresarial() {
        return $this->idempresarial;
    }
    function getIdgrupoEmpresarial() {
        return $this->idgrupoEmpresarial;
    }
    function getNombre_empresa() {
        return $this->nombre_empresa;
    }
    function getNit_empresa() {
        return $this->nit_empresa;
    }
    function getCiudad_principal_empresa() {
        return $this->ciudad_principal_empresa;
    }
    function getDepartamento() {
        return $this->departamento;
    }
    function getDireccion_empresa() {
        return $this->direccion_empresa;
    }
    function getPais_empresa() {
        return $this->pais_empresa;
    }
    function getCorreo_empresa() {
        return $this->correo_empresa;
    }
    function getIdarea_tecnica_empresa() {
        return $this->idarea_tecnica_empresa;
    }
    function getRepresentante_legal_empresa() {
        return $this->representante_legal_empresa;
    }
    function getCargo_representante_empresa() {
        return $this->cargo_representante_empresa;
    }
    function getTelefono_movil_representante_empresa() {
        return $this->telefono_movil_representante_empresa;
    }
    function getSitio_web_empresa() {
        return $this->sitio_web_empresa;
    }
    function getFecha_corte_facturacion_empresa() {
        return $this->fecha_corte_facturacion_empresa;
    }
    function getCorreo_facturacion_empresa() {
        return $this->correo_facturacion_empresa;
    }
    function getIdsesion_empresa() {
        return $this->idsesion_empresa;
    }
    function getEstado_empresa() {
        return $this->estado_empresa;
    }
    function getRepresentante_sistema_gestion() {
        return $this->representante_sistema_gestion;
    }
    function getCargo_representante_sistema_gestion_empresa() {
        return $this->cargo_representante_sistema_gestion_empresa;
    }
    function getTelefono_movil_representante_sistema_gestion_empresa() {
        return $this->telefono_movil_representante_sistema_gestion_empresa;
    }
    function getCorreo_sistema_gestion_empresa() {
        return $this->correo_sistema_gestion_empresa;
    }
    function setIdempresarial($idempresarial) {
        $this->idempresarial = $idempresarial;
    }
    function setIdgrupoEmpresarial($idgrupoEmpresarial) {
        $this->idgrupoEmpresarial = $idgrupoEmpresarial;
    }
    function setNombre_empresa($nombre_empresa) {
        $this->nombre_empresa = $nombre_empresa;
    }
    function setNit_empresa($nit_empresa) {
        $this->nit_empresa = $nit_empresa;
    }
    function setCiudad_principal_empresa($ciudad_principal_empresa) {
        $this->ciudad_principal_empresa = $ciudad_principal_empresa;
    }
    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }
    function setDireccion_empresa($direccion_empresa) {
        $this->direccion_empresa = $direccion_empresa;
    }
    function setPais_empresa($pais_empresa) {
        $this->pais_empresa = $pais_empresa;
    }
    function setCorreo_empresa($correo_empresa) {
        $this->correo_empresa = $correo_empresa;
    }
    function setIdarea_tecnica_empresa($idarea_tecnica_empresa) {
        $this->idarea_tecnica_empresa = $idarea_tecnica_empresa;
    }
    function setRepresentante_legal_empresa($representante_legal_empresa) {
        $this->representante_legal_empresa = $representante_legal_empresa;
    }
    function setCargo_representante_empresa($cargo_representante_empresa) {
        $this->cargo_representante_empresa = $cargo_representante_empresa;
    }
    function setTelefono_movil_representante_empresa($telefono_movil_representante_empresa) {
        $this->telefono_movil_representante_empresa = $telefono_movil_representante_empresa;
    }
    function setSitio_web_empresa($sitio_web_empresa) {
        $this->sitio_web_empresa = $sitio_web_empresa;
    }
    function setFecha_corte_facturacion_empresa($fecha_corte_facturacion_empresa) {
        $this->fecha_corte_facturacion_empresa = $fecha_corte_facturacion_empresa;
    }
    function setCorreo_facturacion_empresa($correo_facturacion_empresa) {
        $this->correo_facturacion_empresa = $correo_facturacion_empresa;
    }
    function setIdsesion_empresa($idsesion_empresa) {
        $this->idsesion_empresa = $idsesion_empresa;
    }
    function setEstado_empresa($estado_empresa) {
        $this->estado_empresa = $estado_empresa;
    }
    function setRepresentante_sistema_gestion($representante_sistema_gestion) {
        $this->representante_sistema_gestion = $representante_sistema_gestion;
    }
    function setCargo_representante_sistema_gestion_empresa($cargo_representante_sistema_gestion_empresa) {
        $this->cargo_representante_sistema_gestion_empresa = $cargo_representante_sistema_gestion_empresa;
    }
    function setTelefono_movil_representante_sistema_gestion_empresa($telefono_movil_representante_sistema_gestion_empresa) {
        $this->telefono_movil_representante_sistema_gestion_empresa = $telefono_movil_representante_sistema_gestion_empresa;
    }
    function setCorreo_sistema_gestion_empresa($correo_sistema_gestion_empresa) {
        $this->correo_sistema_gestion_empresa = $correo_sistema_gestion_empresa;
    }
    
    
    
    
            
}

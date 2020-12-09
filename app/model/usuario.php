<?php

class usuario {
   private $idusuario;
   private $idsesion_usuario;
   private $tipo_usuario;
   private $nombre_usuario;
   private $documento_usuario;
   private $correo_usuario;
   private $telefono_usuario;
   private $direccion_usuario;
   private $mail_usuario;
   private $ciudad_usuario;
   private $pais_usuario;
   function __construct($idusuario, $idsesion_usuario, $tipo_usuario, $nombre_usuario, $documento_usuario, $correo_usuario, $telefono_usuario, $direccion_usuario, $mail_usuario, $ciudad_usuario, $pais_usuario) {
       $this->idusuario = $idusuario;
       $this->idsesion_usuario = $idsesion_usuario;
       $this->tipo_usuario = $tipo_usuario;
       $this->nombre_usuario = $nombre_usuario;
       $this->documento_usuario = $documento_usuario;
       $this->correo_usuario = $correo_usuario;
       $this->telefono_usuario = $telefono_usuario;
       $this->direccion_usuario = $direccion_usuario;
       $this->mail_usuario = $mail_usuario;
       $this->ciudad_usuario = $ciudad_usuario;
       $this->pais_usuario = $pais_usuario;
   }
   
   function getIdusuario() {
       return $this->idusuario;
   }

   function getIdsesion_usuario() {
       return $this->idsesion_usuario;
   }

   function getTipo_usuario() {
       return $this->tipo_usuario;
   }

   function getNombre_usuario() {
       return $this->nombre_usuario;
   }

   function getDocumento_usuario() {
       return $this->documento_usuario;
   }

   function getCorreo_usuario() {
       return $this->correo_usuario;
   }

   function getTelefono_usuario() {
       return $this->telefono_usuario;
   }

   function getDireccion_usuario() {
       return $this->direccion_usuario;
   }

   function getMail_usuario() {
       return $this->mail_usuario;
   }

   function getCiudad_usuario() {
       return $this->ciudad_usuario;
   }

   function getPais_usuario() {
       return $this->pais_usuario;
   }

   function setIdusuario($idusuario) {
       $this->idusuario = $idusuario;
   }

   function setIdsesion_usuario($idsesion_usuario) {
       $this->idsesion_usuario = $idsesion_usuario;
   }

   function setTipo_usuario($tipo_usuario) {
       $this->tipo_usuario = $tipo_usuario;
   }

   function setNombre_usuario($nombre_usuario) {
       $this->nombre_usuario = $nombre_usuario;
   }

   function setDocumento_usuario($documento_usuario) {
       $this->documento_usuario = $documento_usuario;
   }

   function setCorreo_usuario($correo_usuario) {
       $this->correo_usuario = $correo_usuario;
   }

   function setTelefono_usuario($telefono_usuario) {
       $this->telefono_usuario = $telefono_usuario;
   }

   function setDireccion_usuario($direccion_usuario) {
       $this->direccion_usuario = $direccion_usuario;
   }

   function setMail_usuario($mail_usuario) {
       $this->mail_usuario = $mail_usuario;
   }

   function setCiudad_usuario($ciudad_usuario) {
       $this->ciudad_usuario = $ciudad_usuario;
   }

   function setPais_usuario($pais_usuario) {
       $this->pais_usuario = $pais_usuario;
   }




}

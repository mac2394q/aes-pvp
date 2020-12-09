<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of item_grupo_plantilla
 *
 * @author Only Dev & OP
 */
class item_grupo_plantilla {
    private $iditem_grupo_plantilla;
    private $idgrupo_plantilla_item;
    private $etiqueta_item_grupo_plantilla;
    private $descripcion_item_grupo_plantilla;
    
    function __construct($iditem_grupo_plantilla, $idgrupo_plantilla_item, $etiqueta_item_grupo_plantilla, $descripcion_item_grupo_plantilla) {
        $this->iditem_grupo_plantilla = $iditem_grupo_plantilla;
        $this->idgrupo_plantilla_item = $idgrupo_plantilla_item;
        $this->etiqueta_item_grupo_plantilla = $etiqueta_item_grupo_plantilla;
        $this->descripcion_item_grupo_plantilla = $descripcion_item_grupo_plantilla;
    }
    
    
    function getIditem_grupo_plantilla() {
        return $this->iditem_grupo_plantilla;
    }
    function getIdgrupo_plantilla_item() {
        return $this->idgrupo_plantilla_item;
    }
    function getEtiqueta_item_grupo_plantilla() {
        return $this->etiqueta_item_grupo_plantilla;
    }
    function getDescripcion_item_grupo_plantilla() {
        return $this->descripcion_item_grupo_plantilla;
    }
    function setIditem_grupo_plantilla($iditem_grupo_plantilla) {
        $this->iditem_grupo_plantilla = $iditem_grupo_plantilla;
    }
    function setIdgrupo_plantilla_item($idgrupo_plantilla_item) {
        $this->idgrupo_plantilla_item = $idgrupo_plantilla_item;
    }
    function setEtiqueta_item_grupo_plantilla($etiqueta_item_grupo_plantilla) {
        $this->etiqueta_item_grupo_plantilla = $etiqueta_item_grupo_plantilla;
    }
    function setDescripcion_item_grupo_plantilla($descripcion_item_grupo_plantilla) {
        $this->descripcion_item_grupo_plantilla = $descripcion_item_grupo_plantilla;
    }
}

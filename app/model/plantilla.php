<?php
class plantilla {
    
    private $idplantilla_maestra;
    private $idarea_tecnica_plantilla;
    private $etiqueta_plantilla;
    private $pais_plantilla;
    private $estado_plantilla;
    
    function __construct($idplantilla_maestra, $idarea_tecnica_plantilla, $etiqueta_plantilla, $pais_plantilla, $estado_plantilla) {
        $this->idplantilla_maestra = $idplantilla_maestra;
        $this->idarea_tecnica_plantilla = $idarea_tecnica_plantilla;
        $this->etiqueta_plantilla = $etiqueta_plantilla;
        $this->pais_plantilla = $pais_plantilla;
        $this->estado_plantilla = $estado_plantilla;
    }
    
    function getIdplantilla_maestra() {
        return $this->idplantilla_maestra;
    }
    function getIdarea_tecnica_plantilla() {
        return $this->idarea_tecnica_plantilla;
    }
    function getEtiqueta_plantilla() {
        return $this->etiqueta_plantilla;
    }
    function getPais_plantilla() {
        return $this->pais_plantilla;
    }
    function getEstado_plantilla() {
        return $this->estado_plantilla;
    }
    function setIdplantilla_maestra($idplantilla_maestra) {
        $this->idplantilla_maestra = $idplantilla_maestra;
    }
    function setIdarea_tecnica_plantilla($idarea_tecnica_plantilla) {
        $this->idarea_tecnica_plantilla = $idarea_tecnica_plantilla;
    }
    function setEtiqueta_plantilla($etiqueta_plantilla) {
        $this->etiqueta_plantilla = $etiqueta_plantilla;
    }
    function setPais_plantilla($pais_plantilla) {
        $this->pais_plantilla = $pais_plantilla;
    }
    function setEstado_plantilla($estado_plantilla) {
        $this->estado_plantilla = $estado_plantilla;
    }
    
}

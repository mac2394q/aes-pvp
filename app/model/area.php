<?php

class area {
    private $idarea_tecnica;
    private $etiqueta_area_tecnica;
    private $descripcion_area_tecnica;
    
    function __construct($idarea_tecnica, $etiqueta_area_tecnica, $descripcion_area_tecnica) {
        $this->idarea_tecnica = $idarea_tecnica;
        $this->etiqueta_area_tecnica = $etiqueta_area_tecnica;
        $this->descripcion_area_tecnica = $descripcion_area_tecnica;
    }
    
    function getIdarea_tecnica() {
        return $this->idarea_tecnica;
    }

    function getEtiqueta_area_tecnica() {
        return $this->etiqueta_area_tecnica;
    }

    function getDescripcion_area_tecnica() {
        return $this->descripcion_area_tecnica;
    }

    function setIdarea_tecnica($idarea_tecnica) {
        $this->idarea_tecnica = $idarea_tecnica;
    }

    function setEtiqueta_area_tecnica($etiqueta_area_tecnica) {
        $this->etiqueta_area_tecnica = $etiqueta_area_tecnica;
    }

    function setDescripcion_area_tecnica($descripcion_area_tecnica) {
        $this->descripcion_area_tecnica = $descripcion_area_tecnica;
    }



    
}

<?php
class grupoPlantilla {
    
    private $idgrupo_plantilla;
    private $idplantilla_maestra_grupo;
    private $etiqueta_grupo_plantilla;
    private $titulo_conjunto;
    function __construct($idgrupo_plantilla, $idplantilla_maestra_grupo, $etiqueta_grupo_plantilla, $titulo_conjunto) {
        $this->idgrupo_plantilla = $idgrupo_plantilla;
        $this->idplantilla_maestra_grupo = $idplantilla_maestra_grupo;
        $this->etiqueta_grupo_plantilla = $etiqueta_grupo_plantilla;
        $this->titulo_conjunto = $titulo_conjunto;
    }
    function getIdgrupo_plantilla() {
        return $this->idgrupo_plantilla;
    }
    function getIdplantilla_maestra_grupo() {
        return $this->idplantilla_maestra_grupo;
    }
    function getEtiqueta_grupo_plantilla() {
        return $this->etiqueta_grupo_plantilla;
    }
    function getTitulo_conjunto() {
        return $this->titulo_conjunto;
    }
    function setIdgrupo_plantilla($idgrupo_plantilla) {
        $this->idgrupo_plantilla = $idgrupo_plantilla;
    }
    function setIdplantilla_maestra_grupo($idplantilla_maestra_grupo) {
        $this->idplantilla_maestra_grupo = $idplantilla_maestra_grupo;
    }
    function setEtiqueta_grupo_plantilla($etiqueta_grupo_plantilla) {
        $this->etiqueta_grupo_plantilla = $etiqueta_grupo_plantilla;
    }
    function setTitulo_conjunto($titulo_conjunto) {
        $this->titulo_conjunto = $titulo_conjunto;
    }
    
}

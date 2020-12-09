<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of grupoEmpresarial
 *
 * @author Only Dev & OP
 */
class paises {
    private $id;
    private $nombre;

    
    function __construct($id, $nombre) {
     
        $this->nombre = $nombre;
        $this->id = $id;

    }

    function getid() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getnombre() {
        return $this->nombre;
    }

    function setnombre($nombre) {
        $this->nombre = $nombre;
    }




}

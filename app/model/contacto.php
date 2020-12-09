<?php


class contacto_sede {
    private $idcontacto_sede;
    private $idsede_contacto;
    private $nombre_contacto;
    private $cargo_contacto;
    private $telefono_contacto;
    
    function __construct($idcontacto_sede, $idsede_contacto, $nombre_contacto, $cargo_contacto, $telefono_contacto) {
        $this->idcontacto_sede = $idcontacto_sede;
        $this->idsede_contacto = $idsede_contacto;
        $this->nombre_contacto = $nombre_contacto;
        $this->cargo_contacto = $cargo_contacto;
        $this->telefono_contacto = $telefono_contacto;
    }
    
    function getIdcontacto_sede() {
        return $this->idcontacto_sede;
    }

    function getIdsede_contacto() {
        return $this->idsede_contacto;
    }

    function getNombre_contacto() {
        return $this->nombre_contacto;
    }

    function getCargo_contacto() {
        return $this->cargo_contacto;
    }

    function getTelefono_contacto() {
        return $this->telefono_contacto;
    }

    function setIdcontacto_sede($idcontacto_sede) {
        $this->idcontacto_sede = $idcontacto_sede;
    }

    function setIdsede_contacto($idsede_contacto) {
        $this->idsede_contacto = $idsede_contacto;
    }

    function setNombre_contacto($nombre_contacto) {
        $this->nombre_contacto = $nombre_contacto;
    }

    function setCargo_contacto($cargo_contacto) {
        $this->cargo_contacto = $cargo_contacto;
    }

    function setTelefono_contacto($telefono_contacto) {
        $this->telefono_contacto = $telefono_contacto;
    }



    
}

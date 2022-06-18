<?php

class Usuario {
    private $nombre;
    private $cedula;
    private $fecha;
    private $sexo;
    private $tipo;
    private $estado;

    function __construct() {
        
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getEstado() {
        return $this->estado;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
}

<?php

class Libro {
    private $nombre;
    private $isbn;
    private $codigo;
    private $categoria;
    private $estado;

    function __construct() {
        
    }

    function getNombre() {
        return $this->nombre;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getEstado() {
        return $this->estado;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
}

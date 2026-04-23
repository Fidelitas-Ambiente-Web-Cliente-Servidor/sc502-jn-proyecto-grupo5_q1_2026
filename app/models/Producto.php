<?php

class Producto {
    public $id_producto;
    public $nombre_categoria;
    public $nombre_producto;
    public $descripcion;
    public $precio_unitario;
    public $cantidad_stock;
    public $url_imagen;
    public $tallasDisponibles;
    public $coloresDisponibles;
    public $variantes;

    public function __construct($id_producto, $nombre_categoria, $nombre_producto, $descripcion, $precio_unitario, $url_imagen) {
        $this->id_producto = $id_producto;
        $this->nombre_categoria = $nombre_categoria;
        $this->nombre_producto = $nombre_producto;
        $this->descripcion = $descripcion;
        $this->precio_unitario = $precio_unitario;
        $this->url_imagen = $url_imagen;
        $this->cantidad_stock = 0;
        $this->tallasDisponibles = [];
        $this->coloresDisponibles = [];
        $this->variantes = [];
    }

}
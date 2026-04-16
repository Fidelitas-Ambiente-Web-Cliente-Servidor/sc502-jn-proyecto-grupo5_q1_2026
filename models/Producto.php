<?php

class Producto
{
    public $id_producto;
    public $id_categoria;
    public $nombre_producto;
    public $descripcion_producto;
    public $precio;
    public $talla;
    public $color;
    public $imagen;
    public $stock_disponible;
    public $estado;

    public function __construct($datos = [])
    {
        $this->id_producto = $datos['id_producto'] ?? null;
        $this->id_categoria = $datos['id_categoria'] ?? null;
        $this->nombre_producto = $datos['nombre_producto'] ?? null;
        $this->descripcion_producto = $datos['descripcion_producto'] ?? null;
        $this->precio = $datos['precio'] ?? 0.0;
        $this->talla = $datos['talla'] ?? null;
        $this->color = $datos['color'] ?? null;
        $this->imagen = $datos['imagen'] ?? null;
        $this->stock_disponible = $datos['stock_disponible'] ?? 0;
        $this->estado = $datos['estado'] ?? false;
    }
}

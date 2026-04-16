<?php
require_once __DIR__ . '/../config/conexion.php';

class ProductRepository
{
    private $conexionBD;

    public function __construct()
    {
        $this->conexionBD = new BaseDatos();
    }

    public function obtenerProductoPorId($id)
    {
        $sql = "SELECT * FROM PRODUCTOS WHERE id_producto = ? AND estado = 1";
        $stmt = $this->conexionBD->getConexion()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function obtenerProductosDestacados()
    {
        $sql = "SELECT * FROM PRODUCTOS WHERE estado = 1 LIMIT 4";
        $resultado = $this->conexionBD->getConexion()->query($sql);

        $productos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $productos[] = $fila;
        }
        return $productos;
    }
}

<?php
require_once BASE_PATH. '/app/config/conexion.php';

class ProductoRepository
{
    private $conexionBD;
    public $succesConexion = true;

    public function __construct(){
        $basDatos = new BaseDatos();
        $this->conexionBD = $basDatos->getConexion();
        $this->succesConexion;
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM PRODUCTOS";
        if(!$this->conexionBD)  return $this->succesConexion = false;

        $statement = $this->conexionBD->prepare($sql);
        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllProductsDetails() {
        $sql = "SELECT * FROM VISTA_PRODUCTOS_VARIANTES";
        if (!$this->conexionBD)  return $this->succesConexion = false;

        $statement = $this->conexionBD->prepare($sql);
        $statement->execute();
        $result = $statement->get_result();
        return  $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductID($id) {
        $sql = 'CALL sp_obtener_producto_id(?)';
        $statement = $this->conexionBD->prepare($sql);
        $statement->bind_param('i', $id);
        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_assoc();
    }

    public function getProductDetailID($id) {
        $sql = 'CALL sp_obtener_Datos_Producto_Id(?)';
        $statement = $this->conexionBD->prepare($sql);
        $statement->bind_param('i', $id);
        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    


}

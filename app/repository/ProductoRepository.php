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
        $sql = "SELECT p.*, c.nombre as nombre_categoria, COALESCE(SUM(v.stock), 0) as cantidad_stock 
                FROM PRODUCTOS p
                LEFT JOIN CATEGORIAS c ON p.id_categoria = c.id_categoria
                LEFT JOIN VARIANTES v ON p.id_producto = v.id_producto
                GROUP BY p.id_producto, c.nombre";
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

    public function insertProduct($idCategoria, $nombre, $descripcion, $urlImagen, $precio) {
        $sql = 'CALL sp_insertar_producto(?, ?, ?, ?, ?)';
        $statement = $this->conexionBD->prepare($sql);
        if (!$statement) {
            return false;
        }
        $statement->bind_param('isssd', $idCategoria, $nombre, $descripcion, $urlImagen, $precio);
        return $statement->execute();
    }

    public function insertVariant($idProducto, $idColor, $idTalla, $stock) {
        $sql = 'CALL sp_insertar_variante(?, ?, ?, ?)';
        $statement = $this->conexionBD->prepare($sql);
        if (!$statement) {
            return false;
        }
        $statement->bind_param('iiii', $idProducto, $idColor, $idTalla, $stock);
        return $statement->execute();
    }

    public function getCountProducts() {
        $sql = "SELECT COALESCE(SUM(stock), 0) as total FROM VARIANTES";
        $result = $this->conexionBD->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'] ?? 0;
    }

    public function getCategorias() {
        $sql = "SELECT * FROM CATEGORIAS";
        $result = $this->conexionBD->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getColores() {
        $sql = "SELECT * FROM COLORES";
        $result = $this->conexionBD->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTallas() {
        $sql = "SELECT * FROM TALLAS";
        $result = $this->conexionBD->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getVariantsByProductId($idProducto) {
        $sql = "SELECT v.*, c.color, t.talla 
                FROM VARIANTES v
                JOIN COLORES c ON v.id_color = c.id_color
                JOIN TALLAS t ON v.id_talla = t.id_talla
                WHERE v.id_producto = ?";
        $statement = $this->conexionBD->prepare($sql);
        $statement->bind_param('i', $idProducto);
        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertCategoria($nombre, $descripcion) {
        $sql = "CALL sp_insertar_categoria(?, ?)";
        $stmt = $this->conexionBD->prepare($sql);
        $stmt->bind_param("ss", $nombre, $descripcion);
        return $stmt->execute();
    }
}

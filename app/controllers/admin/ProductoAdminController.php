<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config/config.php';
require_once BASE_PATH . '/app/repository/ProductoRepository.php';
require_once BASE_PATH . '/app/utils/funciones.php';
require_once __DIR__ . '/../../utils/subirImagenes.php';

class ProductoAdminController {
    private $productoRepository;

    public function __construct() {
        $this->productoRepository = new ProductoRepository();
    }

    public function procesarPeticion() {
        if (!isset($_SESSION['rol']) || strtolower($_SESSION['rol']) !== 'admin') {
            enviarRespuestJson(["status" => "error", "message" => "No autorizado", "code" => 403]);
            exit;
        }

        $accion = $_POST['action'] ?? $_GET['action'] ?? null;
        if (!$accion && isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
            $jsonDatos = json_decode(file_get_contents('php://input'), true);
            $accion = $jsonDatos['action'] ?? null;
            $_POST = array_merge($_POST, $jsonDatos);
        }

        switch ($accion) {
            case 'add':
                $this->agregarProducto();
                break;
            case 'addVariant':
                $this->agregarVariante();
                break;
            default:
                enviarRespuestJson(["status" => "error", "message" => "Acción no encontrada", "code" => 404]);
                break;
        }
    }

    private function agregarVariante() {
        $idProducto = $_POST['id_producto'] ?? 0;
        $idColor = $_POST['id_color'] ?? 0;
        $idTalla = $_POST['id_talla'] ?? 0;
        $stock = $_POST['stock'] ?? 0;

        if ($idProducto <= 0 || $idColor <= 0 || $idTalla <= 0 || $stock <= 0) {
            enviarRespuestJson(["status" => "error", "message" => "Faltan datos obligatorios o el stock es inválido.", "code" => 400]);
            exit;
        }

        $isOk = $this->productoRepository->insertVariant($idProducto, $idColor, $idTalla, $stock);

        if ($isOk) {
            enviarRespuestJson(["status" => "success", "message" => "Variante agregada exitosamente", "code" => 200]);
        } else {
            enviarRespuestJson(["status" => "error", "message" => "Error al guardar la variante en la base de datos", "code" => 500]);
        }
    }

    private function agregarProducto() {
        $nombre = $_POST['nombre_producto'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';
        $precio = $_POST['precio_unitario'] ?? 0;
        $idCategoria = $_POST['id_categoria'] ?? 0;

        if (empty($nombre) || empty($descripcion) || $precio <= 0 || $idCategoria <= 0) {
            enviarRespuestJson(["status" => "error", "message" => "Faltan datos obligatorios.", "code" => 400]);
            exit;
        }

        $urlImagen = "";
        if (isset($_FILES['imagen_producto']) && $_FILES['imagen_producto']['error'] === UPLOAD_ERR_OK) {
            $urlImagen = subirACloudinary($_FILES['imagen_producto']['tmp_name']);
        }

        if (empty($urlImagen)) {
            enviarRespuestJson(["status" => "error", "message" => "Error al subir la imagen a Cloudinary.", "code" => 500]);
            exit;
        }

        $isOk = $this->productoRepository->insertProduct($idCategoria, $nombre, $descripcion, $urlImagen, $precio);

        if ($isOk) {
            enviarRespuestJson(["status" => "success", "message" => "Producto agregado exitosamente", "code" => 200]);
        } else {
            enviarRespuestJson(["status" => "error", "message" => "Error al guardar en la base de datos", "code" => 500]);
        }
    }
}

$controller = new ProductoAdminController();
$controller->procesarPeticion();

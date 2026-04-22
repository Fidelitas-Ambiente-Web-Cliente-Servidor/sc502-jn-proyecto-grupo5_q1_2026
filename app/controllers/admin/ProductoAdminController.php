<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config/config.php';
require_once BASE_PATH . '/app/repository/ProductoRepository.php';
require_once BASE_PATH . '/app/utils/funciones.php';

class ProductoAdminController {
    private $productoRepository;

    public function __construct() {
        $this->productoRepository = new ProductoRepository();
    }

    public function procesarPeticion() {
        if (ob_get_length()) ob_clean();

        $rolUsuario = strtolower($_SESSION['rol'] ?? '');
        if ($rolUsuario !== 'admin' && $rolUsuario !== 'administrador') {
            enviarRespuestJson(["status" => "error", "message" => "No autorizado", "code" => 403]);
            exit;
        }

        $jsonDatos = json_decode(file_get_contents('php://input'), true) ?? [];
        $accion = $_GET['action'] ?? $_POST['action'] ?? $jsonDatos['action'] ?? null;

        switch ($accion) {
            case 'list':
                $this->listarProductos();
                break;
            case 'add':
                $this->agregarProducto();
                break;
            case 'getFormData':
                $this->obtenerDatosFormulario();
                break;
            case 'addVariant':
                $this->agregarVariante($jsonDatos);
                break;
            case 'getVariants':
                $this->obtenerVariantes();
                break;
            default:
                enviarRespuestJson(["status" => "error", "message" => "Acción no válida", "code" => 404]);
                break;
        }
    }

    private function listarProductos() {
        $productos = $this->productoRepository->getAllProducts();
        enviarRespuestJson([
            "status" => "success",
            "code" => 200,
            "data" => $productos
        ]);
    }

    private function agregarProducto() {
        $idCategoria = $_POST['id_categoria'] ?? null;
        $nombre = $_POST['nombre_producto'] ?? null;
        $descripcion = $_POST['descripcion'] ?? null;
        $precio = $_POST['precio_unitario'] ?? null;
        $imagenUrl = '';

        if (isset($_FILES['imagen_producto']) && $_FILES['imagen_producto']['error'] === 0) {
            $check = getimagesize($_FILES["imagen_producto"]["tmp_name"]);
            if($check !== false) {
                $targetDir = BASE_PATH . "/public/assets/img/products/";
                if (!file_exists($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
                $fileName = time() . '_' . basename($_FILES["imagen_producto"]["name"]);
                $targetFile = $targetDir . $fileName;
                
                if (move_uploaded_file($_FILES["imagen_producto"]["tmp_name"], $targetFile)) {
                    $imagenUrl = BASE_URL . "/public/assets/img/products/" . $fileName;
                }
            }
        }

        $isOk = $this->productoRepository->insertProduct($idCategoria, $nombre, $descripcion, $imagenUrl, $precio);
        
        if ($isOk) {
            enviarRespuestJson(["status" => "success", "message" => "Producto creado"]);
        } else {
            enviarRespuestJson(["status" => "error", "message" => "Error al guardar el producto"]);
        }
    }

    private function obtenerDatosFormulario() {
        $categorias = $this->productoRepository->getCategorias();
        $colores = $this->productoRepository->getColores();
        $tallas = $this->productoRepository->getTallas();
        $productos = $this->productoRepository->getAllProducts();

        enviarRespuestJson([
            "status" => "success",
            "data" => [
                "categorias" => $categorias,
                "colores" => $colores,
                "tallas" => $tallas,
                "productos" => $productos
            ]
        ]);
    }

    private function agregarVariante($datos) {
        $idProducto = $datos['id_producto'] ?? null;
        $idColor = $datos['id_color'] ?? null;
        $idTalla = $datos['id_talla'] ?? null;
        $stock = $datos['stock'] ?? 0;

        if (!$idProducto || !$idColor || !$idTalla) {
            enviarRespuestJson(["status" => "error", "message" => "Faltan datos obligatorios"]);
            exit;
        }

        $isOk = $this->productoRepository->insertVariant($idProducto, $idColor, $idTalla, $stock);
        enviarRespuestJson([
            "status" => $isOk ? "success" : "error",
            "message" => $isOk ? "Variante agregada" : "Error al guardar variante"
        ]);
    }

    private function obtenerVariantes() {
        $idProducto = $_GET['id_producto'] ?? null;
        if (!$idProducto) {
            enviarRespuestJson(["status" => "error", "message" => "ID de producto requerido"]);
            exit;
        }
        $variantes = $this->productoRepository->getVariantsByProductId($idProducto);
        enviarRespuestJson(["status" => "success", "data" => $variantes]);
    }
}

$controller = new ProductoAdminController();
$controller->procesarPeticion();

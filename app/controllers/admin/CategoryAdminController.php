<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config/config.php';
require_once BASE_PATH . '/app/repository/ProductoRepository.php';
require_once BASE_PATH . '/app/utils/funciones.php';

class CategoryAdminController {
    private $repository;

    public function __construct() {
        $this->repository = new ProductoRepository();
    }

    public function procesarPeticion() {
        $rolUsuario = strtolower($_SESSION['rol'] ?? '');
        if ($rolUsuario !== 'admin' && $rolUsuario !== 'administrador') {
            enviarRespuestJson(["status" => "error", "message" => "No autorizado", "code" => 403]);
            exit;
        }

        $jsonDatos = json_decode(file_get_contents('php://input'), true) ?? [];
        $accion = $_GET['action'] ?? $_POST['action'] ?? $jsonDatos['action'] ?? null;

        switch ($accion) {
            case 'list':
                $this->listarCategorias();
                break;
            case 'add':
                $this->agregarCategoria();
                break;
            default:
                enviarRespuestJson(["status" => "error", "message" => "Acción no válida", "code" => 404]);
                break;
        }
    }

    private function listarCategorias() {
        $categorias = $this->repository->getCategorias();
        enviarRespuestJson([
            "status" => "success",
            "code" => 200,
            "data" => $categorias
        ]);
    }

    private function agregarCategoria() {
        $nombre = $_POST['nombre'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        if (empty($nombre)) {
            enviarRespuestJson(["status" => "error", "message" => "El nombre es obligatorio"]);
            exit;
        }

        $isOk = $this->repository->insertCategoria($nombre, $descripcion);
        if ($isOk) {
            enviarRespuestJson(["status" => "success", "message" => "Categoría creada"]);
        } else {
            enviarRespuestJson(["status" => "error", "message" => "Error al guardar la categoría"]);
        }
    }
}

$controller = new CategoryAdminController();
$controller->procesarPeticion();

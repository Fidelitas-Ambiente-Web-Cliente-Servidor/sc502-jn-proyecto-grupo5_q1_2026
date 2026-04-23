<?php
require_once __DIR__ . '/../../config/config.php';
require_once BASE_PATH . '/app/repository/ProductoRepository.php';
require_once __DIR__ . '/../../utils/funciones.php';

class CategoryController {
    private $repository;

    public function __construct() {
        $this->repository = new ProductoRepository();
    }

    public function procesarPeticion() {
        $accion = $_GET['action'] ?? null;

        switch ($accion) {
            case 'getAll':
                $this->obtenerCategorias();
                break;
            default:
                enviarRespuestJson(["status" => "error", "message" => "Acción no válida", "code" => 404]);
                break;
        }
    }

    private function obtenerCategorias() {
        $categorias = $this->repository->getCategorias();
        enviarRespuestJson(["status" => "success", "data" => $categorias]);
    }
}

$controller = new CategoryController();
$controller->procesarPeticion();

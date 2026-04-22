<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config/config.php';
require_once BASE_PATH . '/app/repository/OrderRepository.php';
require_once BASE_PATH . '/app/utils/funciones.php';

class OrderAdminController {
    private $orderRepository;

    public function __construct() {
        $this->orderRepository = new OrderRepository();
    }

    public function procesarPeticion() {
        if (!isset($_SESSION['rol']) || strtolower($_SESSION['rol']) !== 'admin') {
            enviarRespuestJson(["status" => "error", "message" => "No autorizado", "code" => 403]);
            exit;
        }

        $jsonDatos = json_decode(file_get_contents('php://input'), true) ?? [];
        $accion = $_GET['action'] ?? $jsonDatos['action'] ?? null;

        switch ($accion) {
            case 'getAll':
                $this->obtenerTodos();
                break;
            case 'updateStatus':
                $this->actualizarEstado($jsonDatos);
                break;
            default:
                enviarRespuestJson(["status" => "error", "message" => "Acción no encontrada", "code" => 404]);
                break;
        }
    }

    private function obtenerTodos() {
        $pedidos = $this->orderRepository->getAllOrders();
        enviarRespuestJson([
            "status" => "success",
            "code" => 200,
            "message" => "Pedidos obtenidos",
            "data" => $pedidos
        ]);
    }

    private function actualizarEstado($datos) {
        $idPedido = $datos['id_pedido'] ?? 0;
        $estado = $datos['estado'] ?? '';

        if ($idPedido <= 0 || empty($estado)) {
            enviarRespuestJson(["status" => "error", "message" => "Datos inválidos", "code" => 400]);
            exit;
        }

        $isOk = $this->orderRepository->updateOrderStatus($idPedido, $estado);
        enviarRespuestJson([
            "status" => $isOk ? "success" : "error",
            "code" => $isOk ? 200 : 500,
            "message" => $isOk ? "Estado actualizado" : "Error al actualizar estado",
            "data" => null
        ]);
    }
}

$controller = new OrderAdminController();
$controller->procesarPeticion();

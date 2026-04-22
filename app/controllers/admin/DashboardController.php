<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config/config.php';
require_once BASE_PATH . '/app/repository/OrderRepository.php';
require_once BASE_PATH . '/app/repository/AuthRepository.php';
require_once BASE_PATH . '/app/repository/ProductoRepository.php';
require_once BASE_PATH . '/app/utils/funciones.php';

class DashboardController {
    private $orderRepo;
    private $authRepo;
    private $prodRepo;

    public function __construct() {
        $this->orderRepo = new OrderRepository();
        $this->authRepo = new AuthRepository();
        $this->prodRepo = new ProductoRepository();
    }

    public function procesarPeticion() {
        $rolUsuario = strtolower($_SESSION['rol'] ?? '');
        if ($rolUsuario !== 'admin' && $rolUsuario !== 'administrador') {
            enviarRespuestJson(["status" => "error", "message" => "No autorizado", "code" => 403]);
            exit;
        }

        $accion = $_GET['action'] ?? null;

        switch ($accion) {
            case 'getStats':
                $this->obtenerEstadisticas();
                break;
            default:
                enviarRespuestJson(["status" => "error", "message" => "Acción no válida", "code" => 404]);
                break;
        }
    }

    private function obtenerEstadisticas() {
        $totalVentas = $this->orderRepo->getTotalVentas();
        $totalPedidos = $this->orderRepo->getCountPedidos();
        $totalUsuarios = $this->authRepo->getCountUsers();
        $totalProductos = $this->prodRepo->getCountProducts();
        $pedidosRecientes = $this->orderRepo->getRecentOrders(5);

        enviarRespuestJson([
            "status" => "success",
            "code" => 200,
            "data" => [
                "stats" => [
                    "total_ventas" => $totalVentas,
                    "total_pedidos" => $totalPedidos,
                    "total_usuarios" => $totalUsuarios,
                    "total_productos" => $totalProductos
                ],
                "recent_orders" => $pedidosRecientes
            ]
        ]);
    }
}

$controller = new DashboardController();
$controller->procesarPeticion();

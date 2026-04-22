<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../../config/config.php';
require_once BASE_PATH . '/app/repository/OrderRepository.php';
require_once BASE_PATH . '/app/utils/funciones.php';

class OrderController
{
    private $orderRepo;
    private $datosEnviados;

    public function __construct()
    {
        $this->orderRepo = new OrderRepository();
        $this->datosEnviados = obtenerJsonDeJs() ?? [];
    }

    public function procesar()
    {
        $accion = $this->datosEnviados['action'] ?? null;

        if ($accion === 'placeOrder') {
            if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
                enviarRespuestJson(["status" => "error", "message" => "Carrito vacío"]);
                return;
            }

            $id_usuario = $_SESSION['id_usuario'] ?? null;
            $direccion = $this->datosEnviados['direccion'] ?? '';
            $metodo_pago = $this->datosEnviados['metodo_pago'] ?? 'no especificado';

            $datosFacturacion = [
                'nombre' => $this->datosEnviados['nombre'] ?? '',
                'email' => $this->datosEnviados['email'] ?? '',
                'provincia' => $this->datosEnviados['provincia'] ?? '',
                'direccion_exacta' => $this->datosEnviados['direccion_exacta'] ?? '',
                'detalles_pago' => $this->datosEnviados['detalles_pago'] ?? ''
            ];

            $total = 0;
            foreach ($_SESSION['carrito'] as $item) {
                $total += ($item['precio'] * $item['cantidad']);
            }
            
            $idPedido = $this->orderRepo->crearPedido($id_usuario, $total, $direccion, $metodo_pago, $datosFacturacion, $_SESSION['carrito']);

            if ($idPedido) {
                unset($_SESSION['carrito']);
                enviarRespuestJson(["status" => "success", "message" => "Pedido guardado"]);
            } else {
                enviarRespuestJson(["status" => "error", "message" => "Error en base de datos"]);
            }
        }
    }
}

$controller = new OrderController();
$controller->procesar();

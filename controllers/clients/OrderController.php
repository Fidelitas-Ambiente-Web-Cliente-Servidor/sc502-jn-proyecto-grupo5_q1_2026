
<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../../config/config.php';
require_once BASE_PATH . '/repository/OrderRepository.php';
require_once BASE_PATH . '/utils/funciones.php';

class OrderController
{
    private $orderRepo;
    private $datosEnviados;

    public function __construct()
    {
        $this->orderRepo = new OrderRepository();
        $this->datosEnviados = obtenerJsonDeJs();
    }

    public function procesar()
    {
        $accion = $this->datosEnviados['action'] ?? null;

        if ($accion === 'placeOrder') {
            if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
                enviarRespuestJson(["status" => "error", "message" => "Carrito vacío"]);
                return;
            }

            $id_usuario = $_SESSION['usuario']['id'] ?? null; 
            $direccion = $this->datosEnviados['direccion'];

            $total = 0;
            foreach ($_SESSION['carrito'] as $item) {
                $total += ($item['precio'] * $item['cantidad']);
            }
            $idPedido = $this->orderRepo->crearPedido($id_usuario, $total, $direccion, $_SESSION['carrito']);

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

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../config/config.php';
require_once BASE_PATH . '/app/repository/ProductoRepository.php';
require_once BASE_PATH . '/app/utils/funciones.php';

class CartController
{
    private $productRepo;
    private $datosEnviados;

    public function __construct()
    {
        $this->productRepo = new ProductoRepository();
        $this->datosEnviados = obtenerJsonDeJs();
    }

    public function procesarPeticion()
    {
        $accion = $_GET['action'] ?? $this->datosEnviados['action'] ?? null;
        switch ($accion) {
            case 'add':
                $this->agregarAlCarrito();
                break;
            case 'sync':
                $this->syncCart();
                break;
            case 'getCount':
                $this->obtenerConteo();
                break;

            case 'increase':
        $id = $this->datosEnviados['id_producto'];
        $_SESSION['carrito'][$id]['cantidad']++;
        enviarRespuestJson(["status" => "success"]);
        break;

    case 'decrease':
        $id = $this->datosEnviados['id_producto'];
        if ($_SESSION['carrito'][$id]['cantidad'] > 1) {
            $_SESSION['carrito'][$id]['cantidad']--;
        } else {
            unset($_SESSION['carrito'][$id]);
        }
        enviarRespuestJson(["status" => "success"]);
        break;

    case 'remove':
        $id = $this->datosEnviados['id_producto'];
        unset($_SESSION['carrito'][$id]);
        enviarRespuestJson(["status" => "success"]);
        break;
            default:
                enviarRespuestJson(["status" => "error", "message" => "Acción no válida"]);
                break;

        }
    }

    private function agregarAlCarrito()
    {
        $id = $this->datosEnviados['id_producto'] ?? null;

        if (!$id) {
            enviarRespuestJson(["status" => "error", "message" => "ID de producto no proporcionado"]);
            return;
        }

        $productoDB = $this->productRepo->getProductID($id);

        if ($productoDB) {
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = [];
            }

            if (isset($_SESSION['carrito'][$id])) {
                $_SESSION['carrito'][$id]['cantidad']++;
            } else {
                $_SESSION['carrito'][$id] = [
                    "id" => $productoDB['id_producto'],
                    "nombre" => $productoDB['nombre_producto'],
                    "precio" => $productoDB['precio'],
                    "imagen" => $productoDB['imagen'],
                    "cantidad" => 1
                ];
            }

            enviarRespuestJson([
                "status" => "success",
                "message" => "¡" . $productoDB['nombre_producto'] . " añadido!",
                "count" => count($_SESSION['carrito'])
            ]);
        } else {
            enviarRespuestJson(["status" => "error", "message" => "Producto no disponible"]);
        }
    }

    private function obtenerConteo()
    {
        $totalProductos = 0;
        if (isset($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                $totalProductos += $item['cantidad'];
            }
        }
        enviarRespuestJson(["status" => "success", "count" => $totalProductos]);
    }

    private function syncCart()
    {
        $carritoJs = $this->datosEnviados['carrito'] ?? [];
        $_SESSION['carrito'] = [];

        foreach ($carritoJs as $item) {
            $idUnico = $item['id_producto'] . '_' . $item['talla'] . '_' . $item['color'];
            $_SESSION['carrito'][$idUnico] = [
                "id" => $item['id_producto'],
                "nombre" => $item['nombre'],
                "precio" => $item['precio'],
                "imagen" => $item['imagen'],
                "cantidad" => $item['cantidad'],
                "talla" => $item['talla'],
                "color" => $item['color']
            ];
        }

        enviarRespuestJson(["status" => "success", "message" => "Carrito sincronizado con el servidor"]);
    }
}

$cartController = new CartController();
$cartController->procesarPeticion();

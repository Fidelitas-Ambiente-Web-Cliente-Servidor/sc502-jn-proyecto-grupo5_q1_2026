<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../utils/funciones.php';
require_once BASE_PATH . '/app/services/ProductoService.php';


class ProductoController
{
    private $productoService;

    public function __construct()
    {
        $this->productoService = new ProductoService();
    }

    public function manejarPeticon()
    {
        $metodo = $_SERVER['REQUEST_METHOD'];

        switch ($metodo) {
            case 'GET':
                $this->procesarGet();
                break;
        }
    }

    public function procesarGet()
    {
        if (isset($_GET['id'])) {
            $datos = $this->productoService->getProductIdDetail($_GET['id']);
        } else if (isset($_GET['category'])) {
            $datos = $this->productoService->getProductsByCategoryDetails($_GET['category']);
        } else if (isset($_GET['search'])) {
            $datos = $this->productoService->getProductsBySearchDetails($_GET['search']);
        } else {
            $datos = $this->productoService->getProductAllDetails();
        }

        $response = cuerpoResponse('success', 200, 'Datos enviados exitosamente', $datos ?? []);
        enviarRespuestJson($response);
    }
}

$productoController = new ProductoController();
$productoController->manejarPeticon();

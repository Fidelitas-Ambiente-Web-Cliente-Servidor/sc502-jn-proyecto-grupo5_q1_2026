<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../utils/funciones.php';
require_once BASE_PATH . '/app/services/ProductoService.php';


 class ProductoController {
    private $productoService;

    public function __construct() {
        $this->productoService = new ProductoService();
    }

    public function manejarPeticon() {
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        switch($metodo) {
            case 'GET':
                $this->procesarGet();
                break;
        }
    }

    public function procesarGet() {
        $datos = (isset($_GET['id'])) ? "En construccion" : $this->productoService->getProductAllDetails();
        $response = (!empty($datos)) ? cuerpoResponse('success',200,'Datos enviados exitosamente', $datos) : cuerpoResponse('error', 500, 'Error al obtener los productos', null);
        enviarRespuestJson($response);
    } 

 }

$productoController = new ProductoController();
$productoController->manejarPeticon();
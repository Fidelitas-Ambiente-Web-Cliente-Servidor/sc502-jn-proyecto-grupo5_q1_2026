<?php
require_once './config.php';
require_once BASE_PATH . '/app/controllers/clients/ProductoController.php';
require_once BASE_PATH . '/app/services/ProductoService.php';
require_once BASE_PATH . '/app/controllers/clients/ProductoController.php';

$pr = new ProductoService();
$datos = $pr->getProductAllDetails();
echo ("<pre>");
print_r($datos['data']);
echo ("<hr/>");
echo ("</pre>");
echo ("<hr/>");





/* echo ("<pre>");
echo ("<hr/>");
echo ("</pre>"); */
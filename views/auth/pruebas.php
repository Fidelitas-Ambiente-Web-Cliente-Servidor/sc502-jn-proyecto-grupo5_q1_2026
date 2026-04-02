<?php

require_once __DIR__ . "/../../controllers/UsuarioController.php";

$usuarioController = new UsuarioController();
$usuarios = $usuarioController->obtenerUsuarios();

var_dump($usuarios);
echo "<br>";
print_r($usuarios);

echo "<br>";

$usuario = $usuarioController->obtenerUsuarioPorEmail("erick@prueba.com");
echo "<br>";
var_dump($usuario);
echo "<br>";
print_r($usuario);

if (!$usuario) {
    echo "No se encontró el usuario con el email proporcionado.";
} else {
    echo "usuaruio eencontrado " . $usuario['email'] . " con el rol: " . $usuario['rol'];
}

echo "<br>";
echo ($_REQUEST['REQUEST_URI']);
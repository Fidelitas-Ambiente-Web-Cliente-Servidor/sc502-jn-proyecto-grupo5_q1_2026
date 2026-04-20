<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/app/config/config.php';

$page = $_GET['page'] ?? 'home';

require match ($page) {
    'home'     => './app/views/clients/home.php',
    'login'    => './app/views/auth/login.php',
    'register' => './app/views/auth/register.php',
    'products' => './app/views/clients/products.php',
    'carrito' => './app/views/clients/cart.php',
    'checkout' => './app/views/clients/checkout.php',
    default    => './app/views/404.php',
};

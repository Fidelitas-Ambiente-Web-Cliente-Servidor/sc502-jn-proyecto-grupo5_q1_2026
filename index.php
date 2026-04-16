<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/config/config.php';

$page = $_GET['page'] ?? 'home';

require match ($page) {
    'home'     => './views/clients/home.php',
    'login'    => './views/auth/login.php',
    'register' => './views/auth/register.php',
    'products' => './views/clients/products.php',
    default    => './views/404.php',
};

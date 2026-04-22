<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/app/config/config.php';

$page = $_GET['page'] ?? 'home';

// Rutas del cliente
$clientRoutes = [
    'home'     => './app/views/clients/home.php',
    'login'    => './app/views/auth/login.php',
    'register' => './app/views/auth/register.php',
    'products' => './app/views/clients/products.php',
    'product-detail' => './app/views/clients/product-detail.php',
    'carrito' => './app/views/clients/cart.php',
    'checkout' => './app/views/clients/checkout.php',
];

// Rutas del admin
$adminRoutes = [
    'admin-category'  => './app/views/admin/category-management.php',
    'admin-inventory' => './app/views/admin/inventory-management.php',    
    'admin-order'     => './app/views/admin/order-management.php',
    'admin-payment'   => './app/views/admin/payment-management.php',
    'admin-user'      => './app/views/admin/user-management.php',
    'dashboard'       => './app/views/admin/dashboard.php',
];

// Rutas del vendedor
$sellerRoutes = [
    'seller-inventory' => './app/views/vendedor/inventory-seller.php',
    'seller-order'     => './app/views/vendedor/order-seller.php',
];

if (array_key_exists($page, $clientRoutes)) {
    require $clientRoutes[$page];
} elseif (array_key_exists($page, $adminRoutes)) {
    if (!isset($_SESSION['rol']) || strtolower($_SESSION['rol']) !== 'administrador') {
        header('Location: ?page=home');
        exit;
    }
    require $adminRoutes[$page];
} elseif (array_key_exists($page, $sellerRoutes)) {
    if (!isset($_SESSION['rol']) || strtolower($_SESSION['rol']) !== 'vendedor') {
        header('Location: ?page=home');
        exit;
    }
    require $sellerRoutes[$page];
} else {
    require './app/views/404.php';
}
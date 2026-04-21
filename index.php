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
    'product-detail' => './app/views/clients/product-detail.php',
    'carrito' => './app/views/clients/cart.php',
    'checkout' => './app/views/clients/checkout.php',
    default    => './app/views/404.php',
};

/* 
    'admin-category'     => './views/admin/category-management.php',
    'admin-inventory'    => './views/admin/inventory-management.php',    
    'admin-order'     => './views/admin/order-management.php',
    'admin-payment'    => './views/admin/payment-management.php',
    'admin-user'     => './views/admin/user-management.php',
    'dashboard'    => './views/admin/dashboard.php',

    'seller-inventory'    => './views/vendedor/inventory-seller.php',
    'seller-order'    => './views/vendedor/order-seller.php',

*/
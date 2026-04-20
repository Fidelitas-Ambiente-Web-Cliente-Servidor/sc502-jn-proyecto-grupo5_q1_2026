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
    'productos' => './views/clients/products.php',
    default    => './views/404.php',
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
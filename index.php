<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/config/config.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case "home":
        require './views/clients/home.php';
        break;

    case "login":
        require './views/auth/login.php';
        break;
    case "register":
        require './views/auth/register.php';
        break;
    default:
        require './views/404.php';
}
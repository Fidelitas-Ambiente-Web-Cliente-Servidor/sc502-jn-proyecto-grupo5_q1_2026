<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config/config.php';
require_once BASE_PATH . '/app/repository/AuthRepository.php';
require_once BASE_PATH . '/app/utils/funciones.php';

class UserAdminController {
    private $authRepository;

    public function __construct() {
        $this->authRepository = new AuthRepository();
    }

    public function procesarPeticion() {
        if (!isset($_SESSION['rol']) || strtolower($_SESSION['rol']) !== 'admin') {
            enviarRespuestJson(["status" => "error", "message" => "No autorizado", "code" => 403]);
            exit;
        }

        $jsonDatos = json_decode(file_get_contents('php://input'), true) ?? [];
        $accion = $_GET['action'] ?? $jsonDatos['action'] ?? null;

        switch ($accion) {
            case 'getAll':
                $this->obtenerTodos();
                break;
            case 'updateRole':
                $this->actualizarRol($jsonDatos);
                break;
            case 'updateStatus':
                $this->actualizarEstado($jsonDatos);
                break;
            default:
                enviarRespuestJson(["status" => "error", "message" => "Acción no encontrada", "code" => 404]);
                break;
        }
    }

    private function obtenerTodos() {
        $usuarios = $this->authRepository->getAllUsers();
        enviarRespuestJson([
            "status" => "success",
            "code" => 200,
            "message" => "Usuarios obtenidos",
            "data" => $usuarios
        ]);
    }

    private function actualizarRol($datos) {
        $idUsuario = $datos['id_usuario'] ?? 0;
        $rol = $datos['rol'] ?? '';

        if ($idUsuario <= 0 || empty($rol)) {
            enviarRespuestJson(["status" => "error", "message" => "Datos inválidos", "code" => 400]);
            exit;
        }

        $isOk = $this->authRepository->updateUserRole($idUsuario, $rol);
        enviarRespuestJson([
            "status" => $isOk ? "success" : "error",
            "code" => $isOk ? 200 : 500,
            "message" => $isOk ? "Rol actualizado" : "Error al actualizar el rol",
            "data" => null
        ]);
    }

    private function actualizarEstado($datos) {
        $idUsuario = $datos['id_usuario'] ?? 0;
        $estado = $datos['estado'] ?? null;

        if ($idUsuario <= 0 || !isset($datos['estado'])) {
            enviarRespuestJson(["status" => "error", "message" => "Datos inválidos", "code" => 400]);
            exit;
        }

        $isOk = $this->authRepository->updateUserStatus($idUsuario, $estado);
        enviarRespuestJson([
            "status" => $isOk ? "success" : "error",
            "code" => $isOk ? 200 : 500,
            "message" => $isOk ? "Estado actualizado" : "Error al actualizar el estado",
            "data" => null
        ]);
    }
}

$controller = new UserAdminController();
$controller->procesarPeticion();

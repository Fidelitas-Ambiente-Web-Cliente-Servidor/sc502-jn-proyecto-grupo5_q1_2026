<?php

class User {
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'sc502_grupo5_app';
    private const DB_USER = 'root';
    private const DB_PASSWORD = '';
    private const DB_CHARSET = 'utf8mb4';

    private static $connection = null;

    public $id;
    public $name;
    public $email;
    public $password;
    public $role;

    public function __construct($name, $email, $password, $role = 'client', $id = null) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    private static function getConnection() {
        if (self::$connection instanceof PDO) {
            return self::$connection;
        }

        $dsn = "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . ";charset=" . self::DB_CHARSET;
        self::$connection = new PDO($dsn, self::DB_USER, self::DB_PASSWORD);
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$connection;
    }

    public static function authenticate($email, $password) {
        try {
            $db = self::getConnection();
            $sql = "SELECT id, name, email, password, role FROM users WHERE email = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result && password_verify($password, $result['password'])) {
                return new User(
                    $result['name'],
                    $result['email'],
                    $result['password'],
                    $result['role'],
                    $result['id']
                );
            }
        } catch (Exception $e) {
            error_log("Error en authenticate: " . $e->getMessage());
        }
        return null;
    }

    public static function register($name, $email, $password, $role = 'client') {
        try {
            $db = self::getConnection();
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            
            $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->execute([$name, $email, $hashedPassword, $role]);
            
            $userId = $db->lastInsertId();
            return new User($name, $email, $hashedPassword, $role, $userId);
        } catch (Exception $e) {
            error_log("Error en register: " . $e->getMessage());
            return null;
        }
    }

    public static function findByEmail($email) {
        try {
            $db = self::getConnection();
            $sql = "SELECT id, name, email, role FROM users WHERE email = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                return new User($result['name'], $result['email'], '', $result['role'], $result['id']);
            }
        } catch (Exception $e) {
            error_log("Error en findByEmail: " . $e->getMessage());
        }
        return null;
    }

    public static function findById($id) {
        try {
            $db = self::getConnection();
            $sql = "SELECT id, name, email, role FROM users WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                return new User($result['name'], $result['email'], '', $result['role'], $result['id']);
            }
        } catch (Exception $e) {
            error_log("Error en findById: " . $e->getMessage());
        }
        return null;
    }

    public static function emailExists($email) {
        $user = self::findByEmail($email);
        return $user !== null;
    }
}

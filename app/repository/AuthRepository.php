<?php
require_once __DIR__ . '/../config/conexion.php';

class AuthRepository
{
    private $conexionBD;

    public function __construct()
    {
        $this->conexionBD = new BaseDatos();
    }

    public function shareUserForEmail($email)
    {
        $sql = 'SELECT * FROM USUARIOS WHERE email = ?';
        $statement = $this->conexionBD->getConexion()->prepare($sql);
        $statement->bind_param('s', $email);
        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_assoc();
    }

    public function saveUser($nombre, $apellidos, $email, $password, $rol)
    {
        try {
            $isNull = ($rol !== null) ? false : true;
            $sql = $isNull ? 'INSERT INTO USUARIOS (nombre,apellidos,email,password) VALUES(?,?,?,?)' : 'INSERT INTO USUARIOS (nombre,apellidos,email,password,rol) VALUES(?,?,?,?,?)';
            $typeBindParam = $isNull ? ['ssss', $nombre, $apellidos, $email, $password] : ['sssss', $nombre, $apellidos, $email, $password, $rol];
            $statement = $this->conexionBD->getConexion()->prepare($sql);
            $statement->bind_param(...$typeBindParam);
            $statement->execute();
            return $statement->affected_rows;
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) return -2;
            return -1;
        }
    }

    public function getAllUsers()
    {
        $sql = 'SELECT * FROM USUARIOS';
        $statement = $this->conexionBD->getConexion()->prepare($sql);
        $statement->execute();
        $result = $statement->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateUserRole($id_usuario, $rol)
    {
        $sql = 'UPDATE USUARIOS SET rol = ? WHERE id_usuario = ?';
        $statement = $this->conexionBD->getConexion()->prepare($sql);
        $statement->bind_param('si', $rol, $id_usuario);
        return $statement->execute();
    }

    public function updateUserStatus($id_usuario, $estado)
    {
        $sql = 'UPDATE USUARIOS SET estado_usuario = ? WHERE id_usuario = ?';
        $statement = $this->conexionBD->getConexion()->prepare($sql);
        $statement->bind_param('si', $estado, $id_usuario);
        return $statement->execute();
    }

    public function getCountUsers()
    {
        $con = $this->conexionBD->getConexion();
        $sql = "SELECT COUNT(*) as total FROM USUARIOS WHERE rol != 'ADMINISTRADOR'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'] ?? 0;
    }
}

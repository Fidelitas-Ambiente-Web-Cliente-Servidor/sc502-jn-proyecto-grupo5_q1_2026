<?php

class Usuarios {

    private $id_usuario;
    private $email;
    private $password;
    private $rol;

    public function __construct($id_usuario, $email, $password, $rol) {
        $this->id_usuario = $id_usuario;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }

    public function saludar() {
        return "Hola, soy el usuario con email: " . $this->email;
    }
}
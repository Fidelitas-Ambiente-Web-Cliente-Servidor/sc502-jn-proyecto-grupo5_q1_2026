<?php

class Usuario {

    public $id_usuario;
    public $nombre;
    public $apellidos;
    public $email;
    public $rol;
    public $listaFavoritos;
    public $listaCarrito;

    public function __construct($id_usuario, $nombre, $apellidos, $email, $rol, $listaFavoritos, $listaCarrito) {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->rol = $rol;
        $this->listaCarrito = [];
        $this->listaFavoritos = [];
    }

    

    

    


}
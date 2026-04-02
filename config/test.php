<?php
/* require_once "conexion.php";
$nuevaConexion = new BaseDatos();
$conexion = $nuevaConexion->conectarBD();
if ($conexion) {
    echo "Conexión exitosa a la base de datos.";
} else {
    echo "Error al conectar a la base de datos.";
};

$sql =  "SELECT * FROM USUARIOS WHERE ID_USUARIO = 20";
$resultado = $conexion->query($sql);
echo("<br>");
print_r($resultado);
 */
/* mysqli_result Object ( [current_field] => 0 [field_count] => 1 [lengths] => [num_rows] => 0 [type] => 0 ) */



$contraseña = "prueba123";
$hash = password_hash($contraseña, PASSWORD_DEFAULT);
echo($hash);
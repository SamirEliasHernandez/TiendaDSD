<?php

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "tienda";
$port=3307;

$conexion = mysqli_connect(
    $servidor,
    $usuario,
    $contrasena,
    $base_datos,
    $port
);

if (!$conexion) {
    die("Error de conexion con la base de datos");
}

mysqli_set_charset($conexion, "utf8mb4");

?>
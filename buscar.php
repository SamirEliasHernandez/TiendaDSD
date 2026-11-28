<?php

$nombre = trim($_GET["nombre"] ?? "");
$resultado = null;

try {

    require_once "conexion.php";

    if ($nombre == "") {

        $sql = "SELECT * FROM productos";

        $resultado = mysqli_query($conexion, $sql);

    } else {

        $sql = "SELECT * FROM productos WHERE nombre LIKE ?";

        $consulta = mysqli_prepare($conexion, $sql);

        $busqueda = "%" . $nombre . "%";

        mysqli_stmt_bind_param($consulta, "s", $busqueda);

        mysqli_stmt_execute($consulta);

        $resultado = mysqli_stmt_get_result($consulta);

        mysqli_stmt_close($consulta);

    }

    if ($resultado === false) {
        $resultado = null;
    }

} catch (mysqli_sql_exception $error) {

    $resultado = null;

}

?>
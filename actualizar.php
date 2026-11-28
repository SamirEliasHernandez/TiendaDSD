<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $id = filter_input(INPUT_POST, 'id_producto', FILTER_VALIDATE_INT);
    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $precio = $_POST['precio'] ?? '';
    $cantidad = $_POST['cantidad'] ?? '';
    $categoria = trim($_POST['categoria'] ?? '');


    if (
        !$id ||
        $nombre === '' ||
        $descripcion === '' ||
        $categoria === '' ||
        !is_numeric($precio) ||
        !is_numeric($cantidad) ||
        !is_finite((float)$precio) ||
        !is_finite((float)$cantidad) ||
        (float)$precio < 0 ||
        (float)$cantidad < 0 ||
        (float)$cantidad != (int)$cantidad
    ) {
        header("Location: index.php?error=datos_invalidos");
        exit();
    }


    $sql = "UPDATE productos
            SET nombre = ?,
                descripcion = ?,
                precio = ?,
                cantidad = ?,
                categoria = ?
            WHERE id_producto = ?";

    $stmt = mysqli_prepare($conexion, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssdisi",
        $nombre,
        $descripcion,
        $precio,
        $cantidad,
        $categoria,
        $id
    );

    
    if (mysqli_stmt_execute($stmt)) {

        if (mysqli_stmt_affected_rows($stmt) >= 0) {
            header("Location: index.php?mensaje=actualizado");
            exit();
        }

    } else {
        header("Location: index.php?error=actualizacion");
        exit();
    }

    mysqli_stmt_close($stmt);

} else {
    header("Location: index.php");
    exit();
}

?>
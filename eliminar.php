<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = filter_input(INPUT_POST, 'id_producto', FILTER_VALIDATE_INT);

    if (!$id || $id <= 0) {
        header("Location: index.php?error=id_invalido");
        exit();
    }

    $sql = "DELETE FROM productos WHERE id_producto = ?";

    $stmt = mysqli_prepare($conexion, $sql);

    if (!$stmt) {
        header("Location: index.php?error=eliminacion");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {

     
        if (mysqli_stmt_affected_rows($stmt) == 1) {

            header("Location: index.php?mensaje=eliminado");
            exit();

        } else {

            header("Location: index.php?error=no_encontrado");
            exit();
        }

    } else {

        header("Location: index.php?error=eliminacion");
        exit();
    }

    mysqli_stmt_close($stmt);

} else {

    header("Location: index.php");
    exit();
}

?>
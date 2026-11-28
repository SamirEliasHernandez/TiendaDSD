
<?php
include("conexion.php");

if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    header("Location: index.php");
    exit();
}

$id = (int) $_GET['id'];

$sql = "SELECT * FROM productos WHERE id_producto = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$producto = $resultado->fetch_assoc();

if (!$producto) {
    header("Location: index.php?error=no_encontrado");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3>Actualizar producto</h3>
        </div>

        <div class="card-body">

            <form action="actualizar.php" method="POST"
                  onsubmit="return validarProducto(this);">

                <input type="hidden" name="id_producto"
                       value="<?= $producto['id_producto'] ?>">

                <div class="mb-3">
                    <label class="form-label">Nombre del producto</label>
                    <input type="text" name="nombre"
                           class="form-control"
                           value="<?= htmlspecialchars($producto['nombre']) ?>"
                           maxlength="100" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion"
                              class="form-control"
                              maxlength="255"
                              required><?= htmlspecialchars($producto['descripcion']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" name="precio"
                           class="form-control"
                           min="0" step="0.01"
                           value="<?= $producto['precio'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cantidad disponible</label>
                    <input type="number" name="cantidad"
                           class="form-control"
                           min="0" step="1"
                           value="<?= $producto['cantidad'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoría</label>
                    <input type="text" name="categoria"
                           class="form-control"
                           value="<?= htmlspecialchars($producto['categoria']) ?>"
                           maxlength="50" required>
                </div>

                <button type="submit" class="btn btn-success">
                    Guardar cambios
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Cancelar
                </a>

            </form>

        </div>
    </div>

</div>

<script src="script.js"></script>

</body>
</html>

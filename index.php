<?php
require_once "buscar.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TiendaDSD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

    <header class="encabezado">

        <h1>TiendaDSD</h1>
        <p>Sistema de gestión de productos</p>

    </header>

    <main class="contenedor">

        <section class="presentacion">

            <h2>Gestión de inventario</h2>
            <p>Consulta y administra los productos de la tienda.</p>

        </section>

        <section class="panel">

            <div class="barra-superior">

                <h3>Listado de productos</h3>

                <a href="registrar.php" class="btn btn-success">
                    + Registrar producto
                </a>

            </div>


            <form action="index.php" method="GET" class="buscador">

                <input type="text"
                       name="nombre"
                       class="form-control"
                       placeholder="Ingrese el nombre del producto"
                       value="<?php echo htmlspecialchars($nombre); ?>">

                <button type="submit" class="btn btn-primary">
                    Buscar
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Limpiar
                </a>

            </form>


            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if ($resultado === null) { ?>

                            <tr>
                                <td colspan="7" class="mensaje text-danger">
                                    Error al consultar los productos.
                                </td>
                            </tr>

                        <?php } elseif (mysqli_num_rows($resultado) > 0) { ?>

                            <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>

                                <tr>

                                    <td>
                                        <?php echo $fila["id_producto"]; ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($fila["nombre"]); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($fila["descripcion"]); ?>
                                    </td>

                                    <td>
                                        $<?php echo number_format($fila["precio"], 2, ",", "."); ?>
                                    </td>

                                    <td>
                                        <?php echo $fila["cantidad"]; ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($fila["categoria"]); ?>
                                    </td>

                                    <td class="acciones">

                                        <a href="editar.php?id=<?php echo $fila["id_producto"]; ?>"
                                           class="btn btn-warning btn-sm">
                                            Editar
                                        </a>

                                        <form action="eliminar.php" method="POST"
                                              onsubmit="return confirm('¿Desea eliminar este producto?');">

                                            <input type="hidden" name="id_producto"
                                                   value="<?php echo $fila["id_producto"]; ?>">

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Eliminar
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            <?php } ?>

                        <?php } else { ?>

                            <tr>
                                <td colspan="7" class="mensaje">
                                    No se encontraron productos
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </section>

    </main>

    <footer>
        <p>TiendaDSD | Sistema de gestión de productos</p>
    </footer>

</body>
</html>
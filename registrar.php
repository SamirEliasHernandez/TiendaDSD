<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar producto</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" href="estilos.css">

</head>
<body class="pagina-registro">

    <h1 class="titulo-registro">Registrar producto</h1>

    <form action="guardar.php" method="POST" class="formulario-registro">

        <label for="nombre" class="form-label">Nombre:</label>
        <input
            type="text"
            id="nombre"
            name="nombre"
            maxlength="100"
            class="form-control"
            required
        >

        <br><br>

        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea
            id="descripcion"
            name="descripcion"
            maxlength="255"
            class="form-control"
            required
        ></textarea>

        <br><br>

        <label for="precio" class="form-label">Precio:</label>
        <input
            type="number"
            id="precio"
            name="precio"
            min="0"
            step="0.01"
            class="form-control"
            required
        >

        <br><br>

        <label for="cantidad" class="form-label">Cantidad:</label>
        <input
            type="number"
            id="cantidad"
            name="cantidad"
            min="0"
            step="1"
            class="form-control"
            required
        >

        <br><br>

        <label for="categoria" class="form-label">Categoría:</label>
        <input
            type="text"
            id="categoria"
            name="categoria"
            maxlength="50"
            class="form-control"
            required
        >

        <br><br>

        <button type="submit" class="btn btn-success">
            Guardar producto
        </button>

    </form>

</body>
</html>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar producto</title>
</head>
<body>

    <h1>Registrar producto</h1>

    <form action="guardar.php" method="POST">

        <label for="nombre">Nombre:</label>
        <input
            type="text"
            id="nombre"
            name="nombre"
            maxlength="100"
            required
        >

        <br><br>

        <label for="descripcion">Descripción:</label>
        <textarea
            id="descripcion"
            name="descripcion"
            maxlength="255"
            required
        ></textarea>

        <br><br>

        <label for="precio">Precio:</label>
        <input
            type="number"
            id="precio"
            name="precio"
            min="0"
            step="0.01"
            required
        >

        <br><br>

        <label for="cantidad">Cantidad:</label>
        <input
            type="number"
            id="cantidad"
            name="cantidad"
            min="0"
            step="1"
            required
        >

        <br><br>

        <label for="categoria">Categoría:</label>
        <input
            type="text"
            id="categoria"
            name="categoria"
            maxlength="50"
            required
        >

        <br><br>

        <button type="submit">Guardar producto</button>

    </form>

</body>
</html>


<?php

// 1. Incluir la conexión a la base de datos
require_once 'conexion.php';

// 2. Verificar que los datos lleguen mediante POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Acceso no permitido.");
}

// 3. Recibir los datos del formulario
$nombre = trim($_POST['nombre'] ?? '');
$descripcion = trim($_POST['descripcion'] ?? '');
$precio = $_POST['precio'] ?? '';
$cantidad = $_POST['cantidad'] ?? '';
$categoria = trim($_POST['categoria'] ?? '');

// 4. Validar campos obligatorios
if (
    $nombre === '' ||
    $descripcion === '' ||
    $precio === '' ||
    $cantidad === '' ||
    $categoria === ''
) {
    die("Error: todos los campos son obligatorios.");
}

// 5. Validar precio
if (!is_numeric($precio) || $precio < 0) {
    die("Error: el precio debe ser un número válido y no negativo.");
}

// 6. Validar cantidad
$cantidadValidada = filter_var($cantidad, FILTER_VALIDATE_INT);

if ($cantidadValidada === false || $cantidadValidada < 0) {
    die("Error: la cantidad debe ser un entero no negativo.");
}

// 7. Validar longitudes según la base de datos
if (
    mb_strlen($nombre) > 100 ||
    mb_strlen($descripcion) > 255 ||
    mb_strlen($categoria) > 50
) {
    die("Error: uno de los campos supera la longitud permitida.");
}

// 8. Preparar la consulta SQL
$sql = "INSERT INTO productos
        (nombre, descripcion, precio, cantidad, categoria)
        VALUES (?, ?, ?, ?, ?)";

// 9. Preparar la sentencia
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error al preparar la consulta: " . $conexion->error);
}

// 10. Asociar los valores a la consulta
$stmt->bind_param(
    "ssdis",
    $nombre,
    $descripcion,
    $precio,
    $cantidadValidada,
    $categoria
);

// 11. Ejecutar el registro
if ($stmt->execute()) {

    echo "¡Producto registrado correctamente!";

} else {

    echo "Error al registrar el producto: " . $stmt->error;

}

// 12. Cerrar la sentencia y la conexión
$stmt->close();
$conexion->close();

?>

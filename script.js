```javascript
// Confirmar antes de eliminar un producto
function confirmarEliminacion() {

    return confirm("¿Estás segura de que deseas eliminar este producto? Esta acción no se puede deshacer.");
}


// Validar los datos del formulario de productos
function validarProducto(formulario) {

    // Obtener los valores
    const nombre = formulario.nombre.value.trim();
    const descripcion = formulario.descripcion.value.trim();
    const precio = formulario.precio.value;
    const cantidad = formulario.cantidad.value;
    const categoria = formulario.categoria.value.trim();


    // Validar campos obligatorios
    if (
        nombre === "" ||
        descripcion === "" ||
        precio === "" ||
        cantidad === "" ||
        categoria === ""
    ) {
        alert("Todos los campos son obligatorios.");
        return false;
    }


    // Validar precio
    if (
        !Number.isFinite(Number(precio)) ||
        Number(precio) < 0
    ) {
        alert("El precio debe ser un número válido y no negativo.");
        return false;
    }


    // Validar cantidad
    if (
        !Number.isInteger(Number(cantidad)) ||
        Number(cantidad) < 0
    ) {
        alert("La cantidad debe ser un número entero y no negativo.");
        return false;
    }


    // Confirmar que los datos son válidos
    return true;
}
```
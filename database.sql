CREATE DATABASE IF NOT EXISTS tienda;

USE tienda;

CREATE TABLE productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    precio DECIMAL(10,2) NOT NULL CHECK (precio >= 0),
    cantidad INT NOT NULL CHECK (cantidad >= 0),
    categoria VARCHAR(50) NOT NULL
);

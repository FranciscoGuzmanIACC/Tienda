<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Preparar y ejecutar la consulta
$sql = "SELECT nombre, descripcion, precio, stock, imagen, desarrollador FROM producto";
$resultado = $conn->query($sql);

$productos = array();

if ($resultado->num_rows > 0) {
    // Almacenar los resultados en un array
    while($fila = $resultado->fetch_assoc()) {
        $productos[] = $fila;
    }
} else {
    echo "No se encontraron productos.";
}

// Cerrar conexión
$conn->close();

?>

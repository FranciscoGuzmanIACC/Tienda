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

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$desarrollador = $_POST['desarrollador'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$imagen = $_POST['imagen'];

// Preparar y vincular
$stmt = $conn->prepare("INSERT INTO producto (nombre, descripcion, desarrollador, precio, stock, imagen) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssdis", $nombre, $descripcion, $desarrollador, $precio, $stock, $imagen);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Redirigir a la página de confirmación 
    header("Location: confirmacion-producto.php"); 
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>

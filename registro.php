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
$email = $_POST['email'];
$direccion = $_POST['direccion'];

// Insertar datos en la tabla cliente
$sql = "INSERT INTO cliente (nombre, email, direccion) VALUES ('$nombre', '$email', '$direccion')";

if ($conn->query($sql) === TRUE) {
    header("Location: confirmacion-cliente.php"); 
    exit();} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>

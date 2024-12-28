<?php
session_start(); // Iniciar la sesión

// Obtener el correo electrónico del formulario
$email = $_POST['email'];

// Verificar si el carrito existe y no está vacío
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    die("El carrito está vacío.");
}

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Validar si el correo existe en la base de datos
$sql_cliente = "SELECT id_cliente FROM cliente WHERE email = '$email'";
$result_cliente = $conn->query($sql_cliente);

if ($result_cliente->num_rows == 0) {
    // Si el correo no existe, mostrar una alerta y redirigir de nuevo al carrito
    echo "<script>alert('El correo electrónico no está registrado.'); window.location.href = 'carrito.php';</script>";
    exit();
}

$row_cliente = $result_cliente->fetch_assoc();
$id_cliente = $row_cliente['id_cliente'];

// Procesar cada producto en el carrito
foreach ($_SESSION['carrito'] as $item) {
    // Obtener el id_producto usando el nombre del producto
    $nombre_producto = $item['nombre'];
    $sql_producto = "SELECT id_producto FROM producto WHERE nombre = '$nombre_producto'";
    $result_producto = $conn->query($sql_producto);

    if ($result_producto->num_rows > 0) {
        $row_producto = $result_producto->fetch_assoc();
        $id_producto = $row_producto['id_producto'];

        // Insertar la compra en la tabla compra
        $cantidad = $item['cantidad'];
        $total = $item['precio'] * $cantidad;
        $fecha = date('Y-m-d H:i:s');

        $sql_compra = "INSERT INTO compra (cantidad, total, fecha, id_producto, id_cliente)
                       VALUES ('$cantidad', '$total', '$fecha', '$id_producto', '$id_cliente')";

        if (!$conn->query($sql_compra)) {
            die("Error al insertar la compra: " . $conn->error);
        }
    } else {
        die("No se encontró el producto con el nombre: " . $nombre_producto);
    }
}

// Vaciar el carrito después de la compra
unset($_SESSION['carrito']);

// Cerrar conexión
$conn->close();

// Redirigir a una página de confirmación de compra
header("Location: confirmacion_compra.php");
exit();
?>

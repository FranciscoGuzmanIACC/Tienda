<?php
session_start();
$conexion = new mysqli('localhost', 'root', '', 'tienda');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['carro'])) {
    // Generar un ID único para la compra
    $stmt = $conexion->prepare("INSERT INTO compras (estado) VALUES (?)");
    $estado = "En camino";
    $stmt->bind_param("s", $estado);

    if ($stmt->execute()) {
        $id_compra = $stmt->insert_id; // Obtener el ID de la compra generada

        // Registrar cada producto del carrito con el mismo ID de compra
        $stmt_producto = $conexion->prepare("INSERT INTO productos_compra (id_compra, nombre, precio, cantidad, total) VALUES (?, ?, ?, ?, ?)");
        foreach ($_SESSION['carro'] as $producto) {
            $total = $producto['precio'] * $producto['cantidad'];
            $stmt_producto->bind_param("isddi", $id_compra, $producto['nombre'], $producto['precio'], $producto['cantidad'], $total);
            $stmt_producto->execute();
        }

        $stmt_producto->close();
        unset($_SESSION['carro']); // Limpiar el carrito después de registrar la compra
        header("Location: confirmacion-compra.php?id_compra=$id_compra");
        exit;
    } else {
        echo "Error al registrar la compra: " . $stmt->error;
    }

    $stmt->close();
}
$conexion->close();
?>

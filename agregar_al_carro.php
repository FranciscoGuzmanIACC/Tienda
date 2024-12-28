<?php
session_start(); // Iniciar la sesión

// Obtener datos del formulario
$imagen = $_POST['imagen'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Verificar si el producto ya está en el carrito
$encontrado = false;
foreach ($_SESSION['carrito'] as &$item) {
    if ($item['nombre'] == $nombre) {
        $item['cantidad']++;
        $encontrado = true;
        break;
    }
}

// Si el producto no está en el carrito, agregarlo como nuevo
if (!$encontrado) {
    $nuevo_producto = array(
        'imagen' => $imagen,
        'nombre' => $nombre,
        'precio' => $precio,
        'cantidad' => 1
    );
    $_SESSION['carrito'][] = $nuevo_producto;
}

// Redirigir al carrito para mostrar los productos agregados
header("Location: carrito.php");
exit();
?>

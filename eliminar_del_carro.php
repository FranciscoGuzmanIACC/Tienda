<?php
session_start();

if (isset($_POST['index'])) {
    $index = $_POST['index'];

    // Eliminar producto del carrito
    if (isset($_SESSION['carro'][$index])) {
        unset($_SESSION['carro'][$index]);
        $_SESSION['carro'] = array_values($_SESSION['carro']); // Reindexar el array
    }
}

// Redirigir al carrito
header("Location: carrito.php");
exit;
?>

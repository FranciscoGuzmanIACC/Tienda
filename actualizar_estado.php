<?php
$conn = new mysqli("localhost", "root", "", "tienda");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_compra = intval($_POST["id_compra"]);
    $estado = $conn->real_escape_string($_POST["estado"]);

    $sql = "UPDATE compra SET estado = '$estado' WHERE id_compra = $id_compra";
    if ($conn->query($sql) === TRUE) {
        echo "Estado actualizado correctamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
header("Location: gestion_pedidos.php");
exit();
?>
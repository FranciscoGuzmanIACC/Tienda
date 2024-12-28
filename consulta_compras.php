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

// Consulta avanzada para calcular el número de compras por cliente
$sql = "SELECT cliente.nombre, cliente.email, COUNT(compra.id_compra) AS num_compra
        FROM cliente
        INNER JOIN compra ON cliente.id_cliente = compra.id_cliente
        GROUP BY cliente.id_cliente
        HAVING num_compra > 2
        ORDER BY num_compra DESC";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['email']) . "</td>";
        echo "<td>" . $fila['num_compra'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No se encontraron clientes con más de dos compras registradas.</td></tr>";
}

// Cerrar conexión
$conn->close();
?>

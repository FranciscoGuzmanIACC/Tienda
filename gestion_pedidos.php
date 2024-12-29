<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Pedidos</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #333;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #3e439b;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        select, button {
            padding: 5px;
            border: 1px solid #3e439b;
            border-radius: 5px;
        }
        button {
            background-color: #3e439b;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #2e348b;
        }
    </style>
</head>
<body>

<header>

<!------------>
<!-- Header -->
<!------------>

<section class="row">

  <div>
    <img src="Recursos/icon.png" alt="Icono de la tienda">
  </div>

  <div>
    <h1>Games for you!</h1>
      <p>Tu tienda de videojuegos!</p>
  </div>

</section>

<section class="carrito">

  <a href="carrito.php">
    <img src="Recursos/carrito.png" alt="Icono de carrito de compras">
  </a>

</section>

<!------------>
<!-- Navbar -->
<!------------>
<nav>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="producto_nuevo.php">Producto Nuevo</a></li>
    <li><a href="cliente_nuevo.php">Registrarse</a></li>
    <li><a href="consulta_clientes.php">Consulta Clientes</a></li>
    <li><a href="gestion_pedidos.php">Gestión de Pedidos</a></li>
  </ul>
</nav>


</header>



    <h1 style="text-align: center; color: #3e439b;">Gestión de Pedidos</h1>
    <table>
        <thead>
            <tr>
                <th>ID Compra</th>
                <th>ID Producto</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>email</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = new mysqli("localhost", "root", "", "tienda");
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta con JOIN para obtener información adicional
            $sql = "SELECT 
                        c.id_compra, c.cantidad, c.total, c.fecha, c.estado, 
                        p.id_producto, p.nombre AS producto, 
                        cl.nombre AS cliente, cl.email, cl.direccion
                    FROM compra c
                    JOIN producto p ON c.id_producto = p.id_producto
                    JOIN cliente cl ON c.id_cliente = cl.id_cliente";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id_compra']}</td>
                        <td>{$row['id_producto']}</td>
                        <td>{$row['producto']}</td>
                        <td>{$row['cantidad']}</td>
                        <td>{$row['total']}</td>
                        <td>{$row['fecha']}</td>
                        <td>{$row['cliente']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['direccion']}</td>
                        <td>{$row['estado']}</td>
                        <td class='actions'>
                            <form method='POST' action='actualizar_estado.php'>
                                <select name='estado'>
                                    <option value='En fila'>En fila</option>
                                    <option value='En preparación'>En preparación</option>
                                    <option value='Despachado'>Despachado</option>
                                    <option value='Entregado'>Entregado</option>
                                </select>
                                <input type='hidden' name='id_compra' value='{$row['id_compra']}'>
                                <button type='submit'>Asignar Estado</button>
                            </form>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No hay pedidos registrados.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>

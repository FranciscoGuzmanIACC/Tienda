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
$precio = $_POST['precio'];
$desarrollador = $_POST['desarrollador'];
$imagen = $_POST['imagen'];

// Consulta para obtener el id_producto
$q_id = "SELECT id_producto FROM producto WHERE nombre = '$nombre'";
$result_id = $conn->query($q_id);

if ($result_id->num_rows > 0) {
    $row = $result_id->fetch_assoc();
    $id_producto = $row['id_producto'];
} else {
    die("No se encontró el producto con el nombre: " . $nombre);
}

// Consulta para obtener los datos completos del producto
$sql = "SELECT * FROM producto WHERE id_producto = $id_producto";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $producto = $resultado->fetch_assoc();
} else {
    die("No se encontraron datos del producto.");
}

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<header>

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

</header>



      <!------------>
      <!-- Navbar -->
      <!------------>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="producto_nuevo.php">Producto Nuevo</a></li>
          <li><a href="cliente_nuevo.php">Registrarse</a></li>
        </ul>
      </nav>

<body>
    <div class="contenedor-producto">
        <img src="Recursos/<?php echo $producto['imagen']; ?>" alt="Imagen del producto">
        <h3><?php echo $producto['nombre']; ?></h3>
        <p><?php echo $producto['descripcion']; ?></p>
        <p>Precio: $<?php echo $producto['precio']; ?></p>
        <p>Stock: <?php echo $producto['stock']; ?> unidades</p>
        <form action="agregar_al_carro.php" method="POST">
            <input type="hidden" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>">
            <input type="hidden" name="precio" value="<?= $producto['precio'] ?>">
            <input type="hidden" name="imagen" value="Recursos/<?= htmlspecialchars($producto['imagen']) ?>">
        <button class="button">Agregar al Carro</button>
    </div>
</body>
</html>

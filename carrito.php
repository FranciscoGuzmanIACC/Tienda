<?php
session_start(); // Iniciar la sesión

// Verificar si el carrito existe en la sesión
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "El carrito está vacío.";
    exit();
}

// Función para eliminar un producto del carrito
if (isset($_POST['eliminar'])) {
    $nombre = $_POST['nombre'];
    foreach ($_SESSION['carrito'] as $key => $item) {
        if ($item['nombre'] === $nombre) {
            unset($_SESSION['carrito'][$key]);
            break;
        }
    }
    // Redirigir de nuevo a carrito.php después de eliminar el producto
    header("Location: carrito.php");
    exit();
}

// Calcular el total del carrito
$total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total += $item['precio'] * $item['cantidad'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="styles.css">
</head>

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
    </ul>
  </nav>


  </header>



<body>
  <section class="table-container">
    <div class="tabla">
      <h2>Carrito de Compras</h2>
      <table>
          <thead>
              <tr>
                  <th>Portada</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Total</th>
                  <th>Eliminar</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($_SESSION['carrito'] as $item): ?>
              <tr>
                  <td><img src="<?= htmlspecialchars($item['imagen']) ?>" alt="Imagen de <?= htmlspecialchars($item['nombre']) ?>" class="img-carrito"></td>
                  <td><?= htmlspecialchars($item['nombre']) ?></td>
                  <td>$<?= number_format($item['precio'], 2) ?></td>
                  <td><?= $item['cantidad'] ?></td>
                  <td>$<?= number_format($item['precio'] * $item['cantidad'], 2) ?></td>
                  <td>
                      <form action="carrito.php" method="POST">
                          <input type="hidden" name="nombre" value="<?= htmlspecialchars($item['nombre']) ?>">
                          <button type="submit" name="eliminar">X</button>
                      </form>
                  </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
          <tfoot>
              <tr>
                  <td colspan="4">Total</td>
                  <td colspan="2">$<?= number_format($total, 2) ?></td>
              </tr>
          </tfoot>
      </table>
      <br>
      <form action="comprar.php" method="POST" onsubmit="return validarEmail()">
          <label for="email">Correo Electrónico:</label>
          <input type="email" id="email" name="email" required>
          <button type="submit">Comprar</button>
      </form>
      <script>
          function validarEmail() {
              const email = document.getElementById('email').value;
              if (!email) {
                  alert('Por favor, ingrese su correo electrónico.');
                  return false;
              }
              return true;
          }
      </script>
    </div>
  </section>
</body>
</html>

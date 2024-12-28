<?php
  require_once('consulta_producto.php');
?>



<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8">
    <link rel="icon"  type="image/png" href="Recursos/icon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games for you!</title>
    <link rel="stylesheet" href="styles.css">
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
        </ul>
      </nav>


    </header>

      <main>  
    
        <!-- Catalogo -->

          <h3>Productos</h3>
    
          <div class="catalogo">

            <?php foreach ($productos as $producto): ?>
              <div class="juego">
                <form action="mostrar_producto.php" method="POST">
                  <img class="img-catalogo" src="Recursos/<?= htmlspecialchars($producto['imagen']) ?>" alt="Imagen de <?= htmlspecialchars($producto['nombre']) ?>">
                  <p><strong>Nombre:</strong> <?= htmlspecialchars($producto['nombre']) ?></p>
                  <p><strong>Precio:</strong> $<?= number_format($producto['precio']) ?></p>
                  <p><strong>Desarrollador:</strong> <?= htmlspecialchars($producto['desarrollador']) ?></p>
                  <input type="hidden" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>">
                  <input type="hidden" name="precio" value="<?= $producto['precio'] ?>">
                  <input type="hidden" name="desarrollador" value="<?= htmlspecialchars($producto['desarrollador']) ?>">
                  <input type="hidden" name="imagen" value="Recursos/<?= htmlspecialchars($producto['imagen']) ?>">
                  <button type="submit" class="btn">Más Información</button>
                </form>
                </div>
            <?php endforeach; ?>
          </div>
          
      </main>

      <script src="script.js"></script>

  </body>

</html>

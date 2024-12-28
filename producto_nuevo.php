<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Registro de Producto Nuevo</title>
    <link rel="icon"  type="image/png" href="Recursos/icon.png"/>

    <meta name="description" content="Formulario para el ingreso de productos a la base de datos">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <script src="validaciones.js"></script>
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

    <main >
      <h2>Registro de Producto Nuevo</h2> 
      <form action="registro_producto.php" method="POST" onsubmit="return validarProducto()"> 
        <label for="nombre">Nombre:</label> 
        <input type="text" id="nombre" name="nombre"><br><br> 
        <div class="form-descripcion">
            <label for="descripcion">Descripción:</label> 
            <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea><br><br>
        </div>
        <label for="desarrollador">Desarrollador:</label> 
        <input type="text" id="desarrollador" name="desarrollador"><br><br> 
        <label for="precio">Precio:</label> 
        <input type="number" id="precio" name="precio"><br><br> 
        <label for="stock">Stock:</label> 
        <input type="number" id="stock" name="stock" min="0"><br>
        <label for="imagen">Ruta Imagen:</label> 
        <input type="text" id="imagen" name="imagen"><br><br> 
        <button type="submit">Registrar</button> 
      </form>
    </main>      
  </body>
</html>
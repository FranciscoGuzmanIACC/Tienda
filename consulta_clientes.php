<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes con Más de Dos Compras</title>
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
                <li><a href="consulta_clientes.php">Consulta Clientes</a></li>
            </ul>
        </nav>


    </header>


<body>
    <h2>Clientes con Más de Dos Compras</h2>
    <section class="table-container">
        <table class="tabla">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Número de Compras</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'consulta_compras.php'; ?>
            </tbody>
        </table>
    </section>
</body>
</html>

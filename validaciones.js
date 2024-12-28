function validarCliente() {
    let nombre = document.getElementById("nombre").value;
    let email = document.getElementById("email").value;
    let direccion = document.getElementById("direccion").value;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (nombre.trim() === "") {
        alert("Por favor, ingrese su nombre.");
        return false;
    }
    if (!emailRegex.test(email)) {
        alert("Por favor, ingrese un correo electrónico válido.");
        return false;
    }
    if (direccion.trim() === "") {
        alert("Por favor, ingrese su dirección.");
        return false;
    }
    return true;
}


function validarProducto() { 
    let nombre = document.getElementById("nombre").value; 
    let descripcion = document.getElementById("descripcion").value; 
    let precio = document.getElementById("precio").value; 
    let stock = document.getElementById("stock").value; 
    let precioRegex = /^[0-9]+(\.[0-9]{1,2})?$/; 
    // Validar nombre 
    if (nombre.trim() === "") { 
        alert("Por favor, ingrese el nombre del producto."); 
    return false; 
    } 
    // Validar descripción 
    if (descripcion.trim() === "") { 
        alert("Por favor, ingrese la descripción del producto."); 
        return false; 
    } 
    // Validar precio 
    if (precio.trim() === "") { 
        alert("Por favor, ingrese el precio del producto."); 
        return false; 
    } else if (!precioRegex.test(precio)) { 
        alert("Por favor, ingrese un precio válido (número con hasta dos decimales)."); 
        return false; 
    } 
    // Validar stock 
    if (stock.trim() === "") { 
        alert("Por favor, ingrese el stock del producto."); 
        return false; 
    } else if (parseInt(stock) < 0) { 
        alert("Por favor, ingrese un valor de stock válido (mayor o igual a cero)."); 
        return false; 
    } 
    // Si todas las validaciones pasan 
    return true; 
}

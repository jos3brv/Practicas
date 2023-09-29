<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesamiento de Producto</title>
</head>
<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuperar y validar los datos del formulario
        $nombre = validarInput($_POST["nombre"]);
        $marca = validarInput($_POST["marca"]);
        $modelo = validarInput($_POST["modelo"]);
        $precio = validarPrecio($_POST["precio"]);
        $unidades = validarUnidades($_POST["unidades"]);
        $detalles = validarInput($_POST["detalles"]);
        $imagen = validarInput($_POST["imagen"]);

        $link = new mysqli('localhost', 'root', '123456789', 'marketzone');

        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error . '<br/>');
        }

        $sql = "INSERT INTO productos (nombre, marca, modelo, precio, unidades, detalles, imagen) 
                VALUES ('$nombre', '$marca', '$modelo', $precio, $unidades, '$detalles', '$imagen')";

        if ($link->query($sql)) {
            echo '<p>Producto registrado con éxito:</p>';
            echo '<ul>';
            echo "<li>Nombre: $nombre</li>";
            echo "<li>Marca: $marca</li>";
            echo "<li>Modelo: $modelo</li>";
            echo "<li>Precio: $precio</li>";
            echo "<li>Unidades: $unidades</li>";
            echo "<li>Detalles: $detalles</li>";
            echo "<li>Imagen: <img src='$imagen' alt='Imagen del Producto'></li>";
            echo '</ul>';
        } else {
            echo '<p>Error al registrar el producto: ' . $link->error . '</p>';
        }

        $link->close();
    } else {
        echo '<p>Error en la solicitud.</p>';
    }

    function validarInput($dato) {
        return htmlspecialchars(trim($dato));
    }

    function validarPrecio($dato) {
        if (is_numeric($dato)) {
            return $dato;
        } else {
            die('Error: El precio debe ser un número.');
        }
    }

    function validarUnidades($dato) {
        if (ctype_digit($dato)) {
            return $dato;
        } else {
            die('Error: Las unidades deben ser un número entero.');
        }
    }
    ?>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $precio = $_POST["precio"];
    $detalles = $_POST["detalles"];
    $unidades = $_POST["unidades"];
    $imagen = $_POST["imagen"];
    $conexion = new mysqli('localhost', 'root', '123456789', 'marketzone');

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES ('$nombre', '$marca', '$modelo', '$precio', '$detalles', '$unidades', '$imagen')";

    if ($conexion->query($sql) === TRUE) {
        echo "Producto guardado correctamente.";
    } else {
        echo "Error al guardar el producto: " . $conexion->error;
    }

    $conexion->close();
}
?>

       
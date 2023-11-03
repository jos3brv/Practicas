<?php
require_once 'Productos.php';

use MiNamespace\Productos;
$productos = new Productos('marketzone');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre_producto'])) {
        $nombreProducto = $_POST['nombre_producto'];
        $productos->search('SELECT * FROM productos WHERE nombre = "' . $nombreProducto . '"');
        $response = $productos->getResponse();
        echo "<h2>Resultado de la búsqueda:</h2>";
        echo $response;
    } elseif (isset($_POST['nombre'])) {
        $productoNuevo = new stdClass();
        $productoNuevo->nombre = $_POST['nombre'];
        $productoNuevo->marca = $_POST['marca'];
        $productoNuevo->modelo = $_POST['modelo'];
        $productoNuevo->precio = $_POST['precio'];
        $productoNuevo->detalles = $_POST['detalles'];
        $productoNuevo->unidades = $_POST['unidades'];
        $productoNuevo->imagen = $_POST['imagen'];
        $productoNuevo->eliminado = $_POST['eliminado'];

        $productos->add($productoNuevo);
        $response = $productos->getResponse();
        echo "<h2>Resultado de la inserción:</h2>";
        echo $response;
    } elseif (isset($_POST['id_eliminar'])) {
        $idEliminar = $_POST['id_eliminar'];
        $productos->delete($idEliminar);
        $response = $productos->getResponse();
        echo "<h2>Resultado de la eliminación:</h2>";
        echo $response;
    } elseif (isset($_POST['id_editar'])) {
        // Procesar la edición de un producto por ID
        $idEditar = $_POST['id_editar'];
        $productos->single($idEditar);
        $productoEditar = json_decode($productos->getResponse());

        if (!empty($productoEditar)) {
            // Modifica los datos del producto
            $productoEditar->nombre = $_POST['nuevo_nombre'];
            $productoEditar->marca = $_POST['nueva_marca'];
            $productoEditar->modelo = $_POST['nuevo_modelo'];
            $productoEditar->precio = $_POST['nuevo_precio'];
            $productoEditar->detalles = $_POST['nuevos_detalles'];
            $productoEditar->unidades = $_POST['nuevas_unidades'];
            $productoEditar->imagen = $_POST['nueva_imagen'];

            // Actualiza el producto en la base de datos
            $productos->update($productoEditar);
            $response = $productos->getResponse();
            echo "<h2>Resultado de la edición:</h2>";
            echo $response;
        } else {
            echo "El producto no se encontró.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
</head>
<body>
    <h1>Productos</h1>
    
    <!--Formulario para buscar-->
    <h2>Búsqueda de Productos por Nombre</h2>
    <form method="POST">
        <label>Nombre del Producto:</label>
        <input type="text" name="nombre_producto">
        <input type="submit" value="Buscar">
    </form>

 <!--Formulario para agregar-->
<h2>Insertar un Nuevo Producto</h2>
<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre">
    <br>
    <label>Marca:</label>
    <input type="text" name="marca">
    <br>
    <label>Modelo:</label>
    <input type="text" name="modelo">
    <br>
    <label>Precio:</label>
    <input type="text" name="precio">
    <br>
    <label>Detalles:</label>
    <input type="text" name="detalles">
    <br>
    <label>Unidades:</label>
    <input type="text" name="unidades">
    <br>
    <label>Imagen:</label>
    <input type="text" name="imagen">
    <input type="hidden" name="eliminado" value="0">
    <br>
    <input type="submit" value="Insertar Producto">
</form>


    <!--Formulario para eliminar-->
    <h2>Eliminar Producto</h2>
    <form method="POST">
        <label>Id del Producto:</label>
        <input type="text" name="id_eliminar">
        <input type="submit" value="Eliminar Producto">
    </form>

<!--Formulario para editar-->
<h2>Editar Producto</h2>
    <form method="POST">
        <label>ID del Producto:</label>
        <input type="text" name="id_editar">
        <br>
        <label>Nuevo Nombre:</label>
        <input type="text" name="nuevo_nombre">
        <br>
        <label>Nueva Marca:</label>
        <input type="text" name="nueva_marca">
        <br>
        <label>Nuevo Modelo:</label>
        <input type="text" name="nuevo_modelo">
        <br>
        <label>Nuevo Precio:</label>
        <input type="text" name="nuevo_precio">
        <br>
        <label>Nuevos Detalles:</label>
        <input type="text" name="nuevos_detalles">
        <br>
        <label>Nuevas Unidades:</label>
        <input type="text" name="nuevas_unidades">
        <br>
        <label>Nueva Imagen:</label>
        <input type="text" name="nueva_imagen">

        <br>
        <input type="submit" value="Editar Producto">
    </form>


</body>
</html>


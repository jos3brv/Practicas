<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Edición de Productos</title>
    <style>
        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 15%;
            padding: 4px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h2>Formulario de Edición de Productos</h2>

    <?php
    if (isset($_GET['id'])) {
        $id_producto = $_GET['id'];
        @$link = new mysqli('localhost', 'root', '123456789', 'marketzone');

        // Verificar la conexión
        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error . '<br/>');
        }

        // Obtener los datos del producto
        $result = $link->query("SELECT * FROM productos WHERE id = $id_producto");

        if ($result && $result->num_rows > 0) {
            $producto = $result->fetch_assoc();
    ?>
            <form action="actualizar_producto.php" method="post">
                <input type="hidden" name="id" value="<?= $producto['id'] ?>">

                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?= $producto['nombre'] ?>" required>

                <label for="marca">Marca:</label>
                <input type="text" name="marca" value="<?= $producto['marca'] ?>" required>

                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" value="<?= $producto['modelo'] ?>" required>

                <label for="precio">Precio:</label>
                <input type="text" name="precio" value="<?= $producto['precio'] ?>" required>

                <label for="unidades">Unidades:</label>
                <input type="text" name="unidades" value="<?= $producto['unidades'] ?>" required>

                <label for="detalles">Detalles:</label>
                <textarea name="detalles" required><?= $producto['detalles'] ?></textarea>

                <label for="imagen">URL de la Imagen:</label>
                <input type="text" name="imagen" value="<?= $producto['imagen'] ?>" required>

                <br>
                <input type="submit" value="Actualizar Producto">
            </form>

    <?php
            $result->free();
            $link->close();
        } else {
            echo 'No se encontró el producto con el ID proporcionado.';
        }
    } else {
        echo 'ID de producto no proporcionado.';
    }
    ?>
</body>
</html>

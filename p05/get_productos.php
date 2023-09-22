<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>
<body>
    <?php
    if (isset($_GET['tope'])) {
        $tope = $_GET['tope'];
    } else {
        die('Parámetro "tope" no detectado...');
    }

    if (!empty($tope)) {
        $link = new mysqli('localhost', 'root', '123456789', 'marketzone');

        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error . '<br/>');
        }

        if ($result = $link->query("SELECT * FROM productos WHERE unidades <= $tope")) {
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Unidades</th></tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . utf8_encode($row['nombre']) . '</td>';
                echo '<td>' . $row['precio'] . '</td>';
                echo '<td>' . $row['unidades'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';

            $result->free();
        }

        $link->close();
    }
    ?>
</body>
</html>

<?php
// Conexión a la base de datos
include_once 'database.php';

// Obtener el nombre enviado desde el cliente
$nombre = $_POST['nombre'];

// Consultar la base de datos para verificar si el nombre existe
$query = "SELECT * FROM productos WHERE nombre = '$nombre'";
$result = $conexion->query($query);

if ($result->num_rows > 0) {
  // El nombre existe en la base de datos
  echo 'existe';
} else {
  // El nombre no existe en la base de datos
  echo 'noexiste';
}

$conexion->close();
?>

<?php
if (isset($_POST["edad"]) && isset($_POST["sexo"])) {
    $edad = intval($_POST["edad"]);
    $sexo = $_POST["sexo"];

    if ($sexo === "femenino" && $edad >= 18 && $edad <= 35) {
        echo "Bienvenida, usted está en el rango de edad permitido.";
    } else {
        echo "Lo sentimos, no cumple con los requisitos de edad o sexo.";
    }
}
?>

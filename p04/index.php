<form action="http://localhost/practicas/p04/index.php" method="post">
        Edad: <input type="number" name="edad" min="1"><br>
        Sexo:
        <input type="radio" name="sexo" value="masculino"> Masculino
        <input type="radio" name="sexo" value="femenino"> Femenino<br>
        <input type="submit" value="Enviar">
    </form>

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

<?php
$parqueVehicular = array(
    "UBN6338" => array(
        "Auto" => array(
            "marca" => "HONDA",
            "modelo" => 2020,
            "tipo" => "camioneta"
        ),
        "Propietario" => array(
            "nombre" => "Alfonzo Esparza",
            "ciudad" => "Puebla, Pue.",
            "direccion" => "C.U., Jardines de San Manuel"
        )
    ),
    "UBN6339" => array(
        "Auto" => array(
            "marca" => "MAZDA",
            "modelo" => 2019,
            "tipo" => "sedan"
        ),
        "Propietario" => array(
            "nombre" => "Ma. del Consuelo Molina",
            "ciudad" => "Puebla, Pue.",
            "direccion" => "97 oriente"
        )
    ),
);

if (isset($_POST["matricula"])) {
    $matriculaConsulta = $_POST["matricula"];
    
    if (isset($parqueVehicular[$matriculaConsulta])) {
        $informacionAuto = $parqueVehicular[$matriculaConsulta];
    } else {
        $informacionAuto = "Auto con Matrícula $matriculaConsulta no encontrado.";
    }
} elseif (isset($_POST["consultar_todos"]) && $_POST["consultar_todos"] === "true") {
    
    $informacionAuto = $parqueVehicular;
} else {
    $informacionAuto = "No se ha realizado una consulta.";
}


?>


    <?php
    if (is_array($informacionAuto)) {

        echo "<h1>Información del Auto:</h1>";
        echo "<pre>";
        print_r($informacionAuto);
        echo "</pre>";
    } else {
        
        echo "<h2>$informacionAuto</h2>";
    }
    ?>
</body>
</html>

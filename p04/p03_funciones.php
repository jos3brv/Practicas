<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else 
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    ?>

    <h2>Ejercicio 2</h2>
    <?php
    
    function generarImpar() {
        return rand(1, 100) * 2 - 1;
    }

    
    function generarPar() {
        return rand(1, 100) * 2;
    }

    
    $matriz = array();
    $iteraciones = 0;
    $numerosGenerados = 0;

    
    while (true) {
        $numero1 = generarImpar();
        $numero2 = generarPar();
        $numero3 = generarImpar();
        
       
        if ($numero1 % 2 == 1 && $numero2 % 2 == 0 && $numero3 % 2 == 1) {
           
            $matriz[] = array($numero1, $numero2, $numero3);
            $iteraciones++;
            $numerosGenerados += 3;
            
           
            if ($iteraciones >= 4) {
                break;
            }
        }
    }

    
    echo "<p>Matriz: </p>";
    echo "<table border='1'>";
    foreach ($matriz as $fila) {
        echo "<tr>";
        foreach ($fila as $numero) {
            echo "<td>$numero</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    
    echo "<p>Número de iteraciones: $iteraciones</p>";
    echo "<p>Cantidad de números generados: $numerosGenerados</p>";
    ?>

    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p04/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>
</body>
</html>
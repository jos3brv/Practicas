<form action="http://localhost/practicas/p04/form1.php" method="post">
    Edad: <input type="number" name="edad" min="1"><br>
    Sexo:
    <input type="radio" name="sexo" value="masculino"> Masculino
    <input type="radio" name="sexo" value="femenino"> Femenino<br>
    <input type="submit" value="Enviar">
</form>



    <form action="http://localhost/practicas/p04/form2.php" method="post">
        <label for="matricula">Matrícula del Auto:</label>
        <input type="text" name="matricula" id="matricula">
        <input type="submit" value="Consultar">
    </form>
    
    <h2>Consultar Todos los Autos Registrados:</h2>
    <form action="http://localhost/practicas/p04/form2.php" method="post">
        <input type="hidden" name="consultar_todos" value="true">
        <input type="submit" value="Consultar Todos">
    </form>


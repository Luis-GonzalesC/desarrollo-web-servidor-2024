<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
    <!--
        Crea un formulario que reciba dos valores: nombre Y edad de una persona

        SI la persona tiene:
        <18 años, se mostrará "X ES MENOR DE EDAD" (x es el nombre)
        >= 18 && <= 65, mostrará "X ES MAYOR DE EDAD"
        >= 65, se mostrará "X SE HA JUBILADO"

        HACER LA LOGICA CON LA ESTRUCTURA MATCH
    -->
    <form action="" method="post">
        <label
        <input type="text" name="nombre"> <br>
        <input type="text" name="edad"> <br>
        <input type = "submit" value = "Enviar">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST['nombre'];
            $age = (int)$_POST['edad'];

            $resultado = match (true) {
                ($age < 18) => "<p>$name ES MENOR DE EDAD</p>",
                ($age >= 18 && $age <= 65) => "<p>$name ES MAYOR DE EDAD</p>",
                ($age >= 65) => "<p>$name SE HA JUBILADO</p>",
            };

            echo $resultado;
        }
    ?>
</body>
</html>
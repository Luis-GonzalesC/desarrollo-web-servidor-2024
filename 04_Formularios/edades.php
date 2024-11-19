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
        <input type="text" name="nombre"> <br>
        <input type="text" name="edad"> <br>
        <input type = "submit" value = "Enviar">
    </form>

    <?php
        function depurar(string $entrada) : string{ //Recibe un string y retorna un string
            $salida = htmlspecialchars($entrada);//Esto lo que hace simplemente es imprirmir un texto y no lo pone como HTML real
            $salida = trim($salida);//trim => elimina los espacios que queden al final o al inicio
            $salida = preg_replace('/\$+/', ' ', $salida);//Me quita los espacion en blavco demás de después de otra palabra
            return $salida;
        }
    ?>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = depurar($_POST['nombre']);
            $age = depurar($_POST['edad']);

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="num1">Número 1</label>
        <input type="text" name="numero1" id="num1"><br>
        <label for="num2">Número 2</label>
        <input type="text" name="numero2" id="num2"><br>
        <label for="num3">Número 3</label>
        <input type="text" name="numero3"><br><br>
        <input type = "submit" value = "Comprobar el mayor">
    </form>

    <?php
        /*Realiza un formulario que reciba 3 números y devuelva el mayor de ellos.*/
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $numero1 = (int)$_POST["numero1"];
            $numero2 = (int)$_POST["numero2"];
            $numero3 = (int)$_POST["numero3"];

            $mayor = $numero1;
            $i = 0;

            if($mayor < $numero2) $mayor = $numero2;
            if($mayor < $numero3) $mayor = $numero3;
            echo "El mayor es: $mayor";
        }
    ?>
</body>
</html>
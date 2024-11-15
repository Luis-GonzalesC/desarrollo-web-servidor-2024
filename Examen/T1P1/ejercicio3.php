<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        <input type= "text" name="numero" placeholder= "Ingrese un número">
        <select name="par_impar">
            <option value="par">Par</option>
            <option value="primo">Primo</option>
        </select>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $num = (int)$_POST["numero"];
            $par_impar = $_POST["par_impar"];

            $resultado = null;
            if($par_impar == "par"){
                echo $resultado;
                $par = $num % 2; //Operacion que comprueba si es par o no
                //Un match para poder verificar y sacar el resultado por pantalla
                $resultado = match($par) {
                    0 => "<p>El número $num es par</p>",
                    1 =>  "<p>El número $num es impar</p>"
                };
                echo $resultado;
            }else{
                $esPrimo = TRUE;
                $j = 2;
                while($j < $num){
                    if(($num % $j == 0)) {
                        $esPrimo = FALSE;
                        $j = $num;
                    }
                    $j++;
                }
                if($esPrimo) {
                    echo "<p>El número $num es primo</p>";
                }else{
                    echo "<p>El número $num no es primo</p>";
                }
           }
        }
    ?>
</body>
</html>
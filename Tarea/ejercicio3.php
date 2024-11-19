<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <title>Ejecicio 3</title>
</head>
<body>
    <form action="" method="post">
        <label for="num1">Numero 1</label>
        <input type="text" name="numero1" id="num1"><br>
        <label for="num2">Numero 2</label>
        <input type="text" name="numero2" id="num2"><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $num1 = (int)$_POST["numero1"];
            $num2 = (int)$_POST["numero2"];

            for ($i=$num1; $i <= $num2; $i++) { 
                $esPrimo = TRUE;
                if($i <= 1) $esPrimo = FALSE;
                $j = 2;
                while($j < $i){
                    if(($i % $j == 0) && ($i != 1)) {
                        $esPrimo = FALSE;
                        $j = $i;
                    }
                    $j++;
                }
                if($esPrimo) {
                    echo "<li>$i</li>";
                }
            }
        }
        
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros aleatorio</title>
</head>
<body>
    <?php
    /*$n = rand(1,3);
    Forma 1
    switch($n){
        case 1:
            echo "<p>El número aleatorio es $n</p>";
            break;
        case 2:
            echo "<p>El número aleatorio es $n</p>";
            break;
        default:
            echo "<p>El número aleatorio es $n</p>";
            break;
    }*/


    
    /*COMPROBAR CON UN SWITCH SI UN NUMERO ES PAR O IMPAR*/
    /*
    $aleatorio = rand(1,10);
    $par = $aleatorio % 2;
    switch($par){
        case 0:
            echo "<p>El número $aleatorio es par</p>";
            break;
        case 1:
            echo "<p>El número $aleatorio es impar</p>";
            break;
    }*/

    $aleatorio = rand(1,10);
    $par = $aleatorio % 2;
    $resultado = match($par) {
        0 => "<p>El número $aleatorio es par</p>",
        1 =>  "<p>El número $aleatorio es impar</p>"
    };

    echo $resultado;
    ?>
</body>
</html>
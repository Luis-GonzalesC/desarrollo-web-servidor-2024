<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
    /*
    $numero = 0;

    if ($numero > 0){
        echo "<p>El número es positivo</p>";
    } 
    elseif ($numero == 0){
        echo "<p>El número es igual a 0</p>";
    }
    else{
        echo "<p>El número no es positivo</p>";
    }*/

    /*

    if ($numero > 0) echo "<p>El número es positivo</p>";
    elseif ($numero == 0) echo "<p>El número es igual a 0</p>";
    else echo "<p>El número no es positivo</p>";

    ========OTRA FORMA=============
    if ($numero > 0):
        echo "<p>EL número es positvo</p>";
    elseif ($numero == 0):
        echo "<p>EL número es igual a 0</p>";
    else:
        echo "<p>El número no es positivo</p>";
    endif;*/

    

    //Corchetes incluye rangos y parentesis no incluye
    # Rangos: [-10,0), [0,10], (10,20]
    //$numero = 20;
    /*
    if($numero >= -10 && $numero < 0){
        echo "Está entre -10 y 0";
    }elseif ($numero >= 0 && $numero <= 10){
        echo "Está entre 0 y 10";
    }elseif ($numero > 10 && $numero <= 20){
        echo "Está entre 10 y 20";
    }else{
        echo "No se encuentra en un rango permitido";
    }


    if($numero >= -10 && $numero < 0):
        echo "Está entre -10 y 0";
    elseif ($numero >= 0 && $numero <= 10):
        echo "Está entre 0 y 10";
    elseif ($numero > 10 && $numero <= 20):
        echo "Está entre 10 y 20";
    else:
        echo "No se encuentra en un rango permitido";
    endif;*/

    /*
    $numero1 = 3;
    $numero2 = 4;
    
    Escribir un if que decida cual de los numeros es mayor, o si son iguales

    HACERLO DE DOS FORMAS DIFERENTES*/
    /*
    $numero1 =  -7;
    $numero2 = 0;
    
    if ($numero1 > $numero2) echo "<p>El numero 1 es mayor al numero 2</p>";
    elseif ($numero2 > $numero1) echo "<p>El numero 2 es mayor al numero 1</p>";
    else echo "<p>Ambos numeros son iguales</p>";
     

    if ($numero1 > $numero2):
        echo "<p>$numero1 es mayor que $numero2</p>";
    elseif ($numero2 > $numero1):
        echo "<p>$numero 2 es mayor que $numero1</p>";
    else:
        echo "<p>Ambos numeros son iguales</p>";
    endif;
    */

    /*MATCH CON LOS RANGOS*/
    $numero = rand(-10,20);
    $resultado = match (true) {
        $numero >= -10 && $numero < 0 => "El numero $numero está en el rango [-10,0]",
        $numero >= 0 && $numero <=10 => "El número $numero está en el rango [0,10]",
        $numero >10 && $numero <= 20 => "El número $numero está en el rango [10,20]"
    };
    echo $resultado;
    ?>
</body>
</html>
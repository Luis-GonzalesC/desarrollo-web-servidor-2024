<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
        CREAR CON NUMEROS ALEATORIOS CON UN ARRAY CON 10 ENTEROS DEL 1 AL 50

        MOSTRAR DICHOS NUMEROS DE LA FORMA QUE MAS OS GUSTE

        CREA UN FORMULARIO DONDE SE INTENTE INTRODUCIR EL MÁXIMO VALOR Y SE COMPRUEBE SI HAS ACERTADO
    -->

    <?php
        $array = [];
        for ($i=0; $i < 10; $i++) { 
            array_push($array, rand(1,50));
        }

        foreach($array as $value){
            echo $value;
            echo "<br>";
        }


    ?>
</body>
</html>
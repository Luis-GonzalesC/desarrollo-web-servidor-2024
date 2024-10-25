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
        $array = [1,5,3,9,20,15,22,11];

        for ($i=0; $i < count($array); $i++) { 
            echo "$array[$i] ";
        }
    ?>
    <form action="" method="post">
        <label for="maximo">Máximo</label>
        <input type="text" name="valor_min" id="maximo" placeholder="Introduce el máximo"><br>
        <input type="submit" value="Comprobar">
    </form>

    
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $valormin = $_POST['valor_min'];
            //$valormax = max($array);
            $candidato = $array[0];
            for ($i=1; $i < count($array); $i++) { 
                if($array[$i] > $candidato){
                    $candidato = $array[$i];
                }
            }
            $valormax = $candidato;

            if($valormin == $valormax){
                echo "<h1>ACERTASTE</h1>";
            }else {
                echo "<h1>NO ACERTASTE</h1>";
            }


            echo "Tu valor fue $valormin y el más alto es $valormax";
        }
    ?>
</body>
</html>
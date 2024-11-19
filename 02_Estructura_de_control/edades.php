<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
    <?php
    $edad = rand(-10,140);

    /*
        CON IF Y CON MATCH:
        -SI LA PERSONA TIENE ENTRE 0 Y 4 AÑOS, ES UN BEBE
        -SI LA PERSONA TIENE ENTRE 5 Y 17 AÑOS, ES MENOR DE EDAD
        -SI LA PERSONA TIENE ENTRE 18 Y 65 AÑOS, ES ADULTO
        -SI LA PERSONA TIENE ENTRE 66 Y 120 AÑOS, ES JUBILADO
        -SI LA EDAD ESTÁ FUERA DE RANGO ES ERROR
    */

    /*FORMA 1
    if($edad >= 0 && $edad <=4) echo "<p>La persona tiene $edad y es un bebe</p>";
    elseif($edad >= 5 && $edad <= 17) echo "<p>La persona tiene $edad y es menor de edad</p>";
    elseif($edad >= 18 && $edad <= 65) echo "<p>La persona tiene $edad y es un adulto</p>";
    elseif($edad >= 66 && $edad <= 120) echo "<p>La persona tiene $edad y es jubilad@</p>";
    else echo "<p>La edad está fuera de rango (ES UN ERROR)</p>";
    */

    $resultado = match (true) {
        $edad >= 0 && $edad <=4 => "<p>La persona tiene $edad y es un bebe</p>",
        $edad >= 5 && $edad <= 17 => "<p>La persona tiene $edad y es menor de edad</p>",
        $edad >= 18 && $edad <= 65 => "<p>La persona tiene $edad y es un adulto</p>",
        $edad >= 66 && $edad <= 120 => "<p>La persona tiene $edad y es jubilad@</p>",
        default => "<p>La edad está fuera de rango (ES UN ERROR)</p>"
    };
    echo $resultado;
    ?>


</body>
</html>
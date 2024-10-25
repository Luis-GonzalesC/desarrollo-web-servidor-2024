<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
    <?php
    echo date("j");

    //Verificar si se puede comparar y hacer su módulo
    $numero = date("j");

    if ($numero % 2 == 0){
        echo "<p>El dia de la semana es par $numero</p>";
    }
    else{
        echo "<p>El día de la semana no es par $numero</p>";
    }
    
    ?>
</body>
</html>
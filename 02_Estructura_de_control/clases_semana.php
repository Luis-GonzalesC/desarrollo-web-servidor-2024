<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases de la Semana</title>
</head>
<body>
    <?php
    $dia = date("l");
    echo "<h1>Hoy es $dia</h1>";

    /*
        HACER UN SWITCH QUE MUESTRE POR PANTALLA SI HOY HAY CLASES DE WEB SERVIDOR    
    */
    /*
    switch($dia){
        case "Tuesday":
        case "Wednesday":
        case "Friday":
            echo "<p> Tenemos clase de Web Servidor</p>";
            break;
        default:
            echo "<p> No tenemos clase de Web Servidor</p>";
            break;
    }

    switch($dia){
        case "Sunday":
        case "Monday":
        case "Thursday":
        case "Saturday":
            echo "<p> No tenemos clase de Web Servidor</p>";
            break;
        default:
            echo "<p> Tenemos clase de Web Servidor</p>";
            break;
    }*/

    /*
        1.CREAR UN SWITCH QUE SEGUN EL DIA DE LA SEMANA EN QUE ESTEMOS, ALMACENE EN UNA VARIABLE EL DIA EN ESPAÑOL

        2.REESCRIBIR EL SWITCH DE LA ASIGNATURA CON LOS DIAS EN ESPAÑOL
    */

    $semana = null;
    switch($dia){
        case "Monday":
            $semana = "Lunes";
            break;
        case "Tuesday":
            $semana = "Martes";
            break;
        case "Wednesday":
            $semana = "Miercoles";
            break;
        case "Thursday":
            $semana = "Jueves";
            break;
        case "Friday":
            $semana = "Viernes";
            break;
        case "Saturday":
            $semana = "Sabado";
            break;
        case "Sunday":
            $semana = "Domingo";
            break;
    }
    echo "<p>$semana</p>";

    /*2*/
    switch($semana){
        case "Martes":
        case "Miercoles":
        case "Viernes":
            echo "<p> Tenemos clase de Web Servidor</p>";
            break;
        default:
            echo "<p> No tenemos clase de Web Servidor</p>";
    }

    
    /*ES UN COMO SWITCH (TENGO MIEDO)

    $resultado = match ($semana) {
        "Martes" => "<p> Tenemos clase de Web Servidor</p>",
        "Miercoles" => "<p> Tenemos clase de Web Servidor</p>",
        "Viernes" => "<p> Tenemos clase de Web Servidor</p>",
        default => "<p> No tenemos clase de Web Servidor</p>"
    };*/

    $resultado = match ($semana) {
        "Martes", 
        "Miercoles",
        "Viernes" => "<p> Tenemos clase de Web Servidor</p>",
        default => "<p> No tenemos clase de Web Servidor</p>"
    };

    echo $resultado;
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>
    <?php
    /*
        *EJERCICIO 1
        *
        *CALCULA LA SUMA DE TODOS LOS NUMEROS PARES DEL 0 AL 20
        */
    
    $suma = 0;
    for($i = 0; $i <= 20; $i++){
        if($i % 2 == 0){
            $suma += $i;
        }
    }
    echo "La suma es $suma";
    /**
     * EJERCICIO 2
     * 
     * (hay que investigar un poco)
     * 
     * Muestra por pantalla la fecha actual con el siguiente formato:
     * "Miercoles 25 de septiembre de 2024"
     * 
     */

     $dia_ingles = date('l');//Una representación textual completa del día de la semana
    $dia_numerico = date("d");//Día del mes, 2 dígitos con ceros iniciales
    $dia_espaniol = null;
    switch ($dia_ingles){
        case "Monday":
            $dia_espaniol = "Lune";
            break;
        case "Tuesday":
            $dia_espaniol = "Martes";
            break;
        case "Wednesday":
            $dia_espaniol = "Miercoles";
            break;
        case "Thursday":
            $dia_espaniol = "Jueves";
            break;
        case "Friday":
            $dia_espaniol = "Viernes";
            break;
        case "Saturday":
            $dia_espaniol = "Sábado";
            break;
        default:
            $dia_espaniol = "Domingo";
    }

    $mes_ingles = date('F');//Una representación textual completa de un mes, como January o March
    $mes_espaniol = null;
    switch ($mes_ingles){
        case "January":
            $mes_espaniol = "Enero";
            break;
        case "February":
            $mes_espaniol = "Febrero";
            break;
        case "March":
            $mes_espaniol = "Marzo";
            break;
        case "April":
            $mes_espaniol = "Abril";
            break;
        case "May":
            $mes_espaniol = "Mayo";
            break;
        case "June":
            $mes_espaniol = "Junio";
            break;
        case "July":
            $mes_espaniol = "Julio";
            break;
        case "August":
            $mes_espaniol = "Agosto";
            break;
        case "September":
            $mes_espaniol = "Septiembre";
            break;
        case "October":
            $mes_espaniol = "Octubre";
            break;
        case "November":
            $mes_espaniol = "Noviembre";
            break;
        default:
            $mes_espaniol = "Diciembre";
    }

    $anio = date("Y");//Una representación numérica completa de un año, 4 dígitos
    echo "$dia_espaniol $dia_numerico de $mes_espaniol de $anio";
    ?>
</body>
</html>
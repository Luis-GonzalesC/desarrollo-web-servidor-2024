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
    /*$dia_espaniol = null;
    switch ($dia_ingles){
        case "Monday":
            $dia_espaniol = "Lunes";
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
    }*/

    $dia_espanol = match ($dia_ingles) {
        "Monday" => $dia_espaniol = "Lunes",
        "Tuesday" => $dia_espaniol = "Martes",
        "Wednesday" => $dia_espaniol = "Miercoles",
        "Thursday" => $dia_espaniol = "Jueves",
        "Friday" => $dia_espaniol = "Viernes",
        "Saturday" => $dia_espaniol = "Sabado",
        "Sunday" => $dia_espaniol ="Domingo", 
    };

    $mes_ingles = date('F');//Una representación textual completa de un mes, como January o March
    /*
    //Puedo utilizar la misma varible para signar, 1era forma
    $mes_ingles = match($mes_ingles){
        "January" =>  $mes_ingles = "Enero",
        "February" =>  $mes_ingles = "Febrero",
        "March" =>  $mes_ingles = "Marzo",
        "April" =>  $mes_ingles = "Abril",
        "May" =>  $mes_ingles = "Mayo",
        "June" =>  $mes_ingles = "Junio",
        "July" =>  $mes_ingles = "Julio",
        "August" =>  $mes_ingles = "Agosto",
        "September" =>  $mes_ingles = "Septiembre",
        "October" =>  $mes_ingles = "Octubre",
        "November" =>  $mes_ingles = "Noviembre",
        "December" =>  $mes_ingles = "Diciembre",
    };*/
    //Puedo utilizar la misma varible
    $mes_ingles = match($mes_ingles){
        "January" => "Enero",
        "February" => "Febrero",
        "March" => "Marzo",
        "April" => "Abril",
        "May" => "Mayo",
        "June" => "Junio",
        "July" => "Julio",
        "August" => "Agosto",
        "September" => "Septiembre",
        "October" => "Octubre",
        "November" => "Noviembre",
        "December" => "Diciembre",
    };
    /*$mes_espaniol = null;
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
    }*/

    echo "<br>";
    $anio = date("Y");//Una representación numérica completa de un año, 4 dígitos
    echo "$dia_espaniol $dia_numerico de $mes_ingles de $anio";
    ?>

    <?php
    /*
        /*MUESTRA POR PANTALLA LOS 50 PRIMEROS NUMERO PRIMO
        
        UN NUMERO ES PRIMO CUANDO SUS UNICOS DIVISORES SON 1 Y EL MISMO
        
        $n = 8;
        $esPrimo = null;
        for($i = 2; $i < $n; $i++){
            $esPrimo = true;
            if ($n % $i == 0){
                $esPrimo = false;
            }
        }
        if ($esPrimo)echo "<p>El numero $n es primo</p>";
        else echo "<p>El numero $n no primo</p>";
    */
    
    $num = 2;
    $contador = 0;
    echo "<ol>";
    while($contador < 50){
        $esPrimo = TRUE;
        for($i = 2; $i < $num; $i++){
            if($num % $i == 0){
                $esPrimo = FALSE;
                $i = $num;
            }
        }
        if($esPrimo){
            $contador++;
            echo "<li>$num</li>";
        }
        $num++;
    }
    echo "</ol>";


        //CALCULAR EL FIBONACCI DE LOS 10 PRIMEROS NUMEROS PRIMOS
        //FIB(0) = 0            FIB(4) = 3
        //FIB(1) = 1            FIB(5) = 5
        //FIB(2) = 1            FIB(6) = 8
        //FIB(3) = 2            FIB(7) = 14
        $v1 = 0;
        $v2 = 1;
        echo "<p>FIB(0) = 0 </p>";
        for($i = 1; $i <= 10; $i++){
            $esPrimo = TRUE;

            $temp = $v1;
            $v1 = $v2;
            $v2 = $temp + $v1;

            echo "<p>FIB($i) = $v1</p>";
            if($v1 % $i == 0){
                $esPrimo = FALSE;
                echo "<p>El número $v1 no primo</p>";
            }

            if ($esPrimo)echo "<p>El numero $v1 es primo</p>";
            else echo "<p>El numero $v1 no primo</p>";
        }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        /*
        $frutas = array(
            "clave 1" => "Manzana",
            "clave 2" => "Naranja",
            "clave 3" => "Cereza"   
        );*/
        //print_r($frutas)

        //echo $frutas["clave 4"];
/*
        $frutas = [
            "Manzana",
            "Naranja",
            "Cereza"   
        ];
        //Agregamos en el array
        array_push($frutas, "Mango","Melocoton");
        $frutas[7] = "Uva";
        $frutas[] = "Sandía";
        $frutas[] = "Melon";
        echo "<br>";
        //echo $frutas[1];
        //FUncion para inxear (ordenar las pos)
        $frutas = array_values($frutas);

        //Para borrar y cargarse algo del array
        unset($frutas[1]);

        print_r($frutas);
        /*
            CREAR UN ARRAY CON UNA LISTA DE PERSONAS DONDE LA CLAVE SEA EL DNI Y EL VALOR EL NOMBRE

            QUE HAYA TENIDO 3 PERSONAS

            MOSTRAR EL ARRAY COMPLETO CON PRINT_R Y A ALGUNA PERSONA INDIVIDUAL

            AÑADIR ELEMENTOS CON Y SIN CLAVE 

            BORRAR ALGUN ELEMENTO 

            PROBAR A RESETEAR LAS CLAVES
        */
      
        $personas = [
            "79866306C" => "Emilio",
            "12345678E" => "Estela",
            "99192017E" => "Enya",
            "87654321L" => "Luis"
        ];

        $personas["567489321E"] = "Dani";
        array_push($personas, "Jaime");

        //$personas = array_values($personas);
        
        unset($personas[0]);
        
        print_r($personas);
        /*print_r($personas);
        echo "<br>";
        print_r($personas["87654321L"]);*/
    ?>
</body>
</html>
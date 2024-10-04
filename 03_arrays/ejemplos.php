<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos.css" rel="stylesheet">;
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

        echo "<h3>Mis frutas con For</h3>";
        echo "<ol>";
        for($i = 0; $i < count($frutas); $i++){
            echo "<li>" . $frutas[$i] . "</li>";
        }
        echo "</ol>";
        echo "===============";

        echo "<h3>Mis frutas con while</h3>";
        echo "<ol>";
        $i = 0;
        while ($i < count($frutas)){
            echo "<li>" . $frutas[$i] . "</li>";
            $i++;
        }
        echo "</ol>";
        echo "===============";

        echo "<h3>Mis frutas con FOREACH</h3>";
        echo "<ol>";
        foreach($frutas as $fruta) {
            echo "<li>" . $fruta . "</li>";
        }
        echo "</ol>";
        echo "===============";

        echo "<h3>Mis frutas con FOREACH CON CLAVES</h3>";
        echo "<ol>";
        foreach($frutas as $clave => $fruta) {
            echo "<li>$clave, $fruta</li>";
        }
        echo "</ol>";
        echo "===============";
        /*
        //Agregamos en el array
        array_push($frutas, "Mango","Melocoton");
        $frutas[7] = "Uva";
        $frutas[] = "Sandía";
        $frutas[] = "Melon";
        echo "<br>";
        //echo $frutas[1];
        //FUncion para ordenar las pos)
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

        $personas["567489321E"] = "Dani";//Añadir con clave
        array_push($personas, "Jaime");

        //$personas = array_values($personas);
        
        unset($personas[0]);
        
        print_r($personas);
        /*print_r($personas);
        echo "<br>";
        print_r($personas["87654321L"]);*/

        $tamaño = count($personas);
        echo "<h3>$tamaño</h3>";


        echo "<h3>Recorriendo el array de personas con clave y valor </h3>";
        echo "<ol>";
        foreach ($personas as $clave => $nombre) {
            echo "<li>$clave, $nombre</li>";
        }
        echo "</ol>";
    ?>

    <h3>TABLA FORMA 1</h3>
    <table border=1>
        <thead>
            <tr>
                <th>DNI</th>
                <th>NOMBRE</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    foreach ($personas as $clave => $nombre) {
                        echo "<tr>";
                        echo "<td>$clave</td>";
                        echo "<td>$nombre</td>";
                        echo "</tr>";
                    }
                ?>
        </tbody>
    </table>

    <h3>TABLA FORMA 2</h3>
    <table border=1>
        <thead>
            <tr>
                <th>DNI</th>
                <th>NOMBRE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($personas as $clave => $nombre) { ?>
                <tr>
                    <td><?php echo $clave?></td>
                    <td><?php echo $nombre?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>

    <!--Comparar arrays-->
    <?php
        $frutas = [
            "Manzana",
            "Naranja",
            "Cereza"   
        ];

        $numeros1 = [1,2,3,4,5];
        $numeros2 = ["1","2","3","4","5"];

        if($numeros1 == $numeros2){
            echo "<h3>Los arrays de números son iguales</h3>";
        }else{
            echo "<h3>Los arrays de números no son iguales</h3>";
        }

        $frutas1 = [
            "Cereza",
            "Naranja",
            "Manzana"   
        ];

        $frutas2 = [
            0 => "Manzana",
            1 => "Naranja",
            2 => "Cereza"   
        ];

        $frutas3 = [
            1 => "Manzana",
            0 => "Naranja",
            2 => "Cereza"   
        ];

        if($frutas3 == $frutas2){
            echo "<h3>Los arrays son iguales</h3>";
        }else{
            echo "<h3>Los arrays no son iguales</h3>";
        }
    ?>

    <h1>Tabla Buena</h1>
    <table border=1>
        <thead>
            <tr>
                <th>DNI</th>
                <th>NOMBRE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    $personas["00112211"] = "Paquito de la Torre";
                    $personas["22110044"] = "Paco Fiesta";
                    /*
                        arsort = asociative reverse sort
                        rsort = reverse sort
                        asort = asociative sort
                    */
                    //sort($personas); ordena sin las claves
                    //asort($personas); ordena de forma ascendente los nombres
                    //rsort($personas);//ordena de mayor a menor de forma descendiente y se carga las claves
                    //arsort($personas);//ordena de forma ascendente las claves
                    //ksort($personas); ordena por claves alfabeticamente
                    //krsort($personas); //ordena por clave de forma descendente
                foreach ($personas as $clave => $nombre) { ?>
                <tr>
                    <td><?php echo $clave?></td>
                    <td><?php echo $nombre?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>

    <!--
                    DESARROLLO WEB SERVIDOR => ALEJANDRA
                    DESARROLLO WEB CLIENTE => JAIME
                    DESARROLLO DE INTERFACES => JOSE
                    DESPLIEGUE DE APLICACIONES WEB => ALEJANDRO
                    EMPRESA E INICIATIVA EMPRENDEDORA => GLORIA
                    INGLÉS => VIRGINIA
                    

                    MOSTRAR EN UNA TABLA LAS ASIGNATURAS Y SUS RESPECTIVOS PROFESORES

                    LUEGO:
                    MOSTRAR UNA TABLA ADICIONAL ORDENADA POR LA ASIGNATURA EN ORDEN ALFABETICO

                    MOSTRAR UNA TABLA ADICIONAL ORDENADA POR LOS PROFESORES EN ORDEN ALFABETICO INVERSO
    -->
    <h1>TABLA DE LAS ASIGNATURAS DEL INSTITUTO</h1>
    <h2>MOSTRAR UNA TABLA ADICIONAL ORDENADA POR LA ASIGNATURA EN ORDEN ALFABETICO</h2>
    <table>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $instituto = [
            "DESARROLLO WEB SERVIDOR" => "ALEJANDRA",
            "DESARROLLO WEB CLIENTE" => "JAIME",
            "DESARROLLO DE INTERFACES" => "JOSE",
            "DESPLIEGUE DE APLICACIONES WEB" => "ALEJANDRO",
            "EMPRESA E INICIATIVA EMPRENDEDORA" => "GLORIA",
            "INGLÉS" => "VIRGINIA"
        ];
        ksort($instituto);
            foreach ($instituto as $asignatura => $nombre) {
                echo "<tr>";
                echo "<td>$asignatura</td>";
                echo "<td>$nombre</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>


    <h2>MOSTRAR UNA TABLA ADICIONAL ORDENADA POR LOS PROFESORES EN ORDEN ALFABETICO INVERSO</h2>
    <table>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $instituto = [
            "DESARROLLO WEB SERVIDOR" => "ALEJANDRA",
            "DESARROLLO WEB CLIENTE" => "JAIME",
            "DESARROLLO DE INTERFACES" => "JOSE",
            "DESPLIEGUE DE APLICACIONES WEB" => "ALEJANDRO",
            "EMPRESA E INICIATIVA EMPRENDEDORA" => "GLORIA",
            "INGLÉS" => "VIRGINIA"
        ];
        asort($instituto);
            foreach ($instituto as $asignatura => $nombre) {
                echo "<tr>";
                echo "<td>$asignatura</td>";
                echo "<td>$nombre</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>


        <!--
            GUILLERMO => 3  SUSPENSO
            ESTELA =>  10   APROBADA
            SOFIA   => 10   APROBADA
            ENYA    => 8    APROBADA
            EMILIO  => 10   APROBADA
            CAPITAN => 9    APROBADO
            ALEJANDRA => 1  SUSPENSO
            JAIME =>  2     SUSPENSO
            DANI => 10      APROBADO
            MEDINILLA => 8  APROBADO
            JORGE => 1      SUSPENSO
        -->

    <h2>MOSTRAR UNA TABLA LOS NOMBRES Y VER SI ESTAS SUSPENSO O APROBADO</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Notas</th>
                <th>Boletin de notas </th>
            </tr>
        </thead>
        <tbody>
        <?php
        $alumnos = [
            "GUILLERMO" => 3,  //SUSPENSO
            "ESTELA" =>  10,   //APROBADA
            "SOFIA"   => 10,  //APROBADA
            "ENYA"    => 8,   //APROBADA
            "EMILIO"  => 10,  //APROBADA
            "CAPITAN" => 9,//   APROBADO
            "ALEJANDRA" => 1, // SUSPENSO
            "JAIME" =>  2,  //  SUSPENSO
            "DANI" => 10,    //APROBADO
            "MEDINILLA" => 8,  //APROBADO
            "JORGE" => 1,   //   SUSPENSO
        ];

        foreach ($alumnos as $nombre => $notas) {
            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>$notas</td>";
            $colores = match (true) {
                ($notas <= 5) => "<td style = 'background-color: red'>Suspenso</td>",
                ($notas <= 7) =>  "<td style = 'background-color: green';>Aprobado</td>",
                ($notas <= 9) => "<td style = 'background-color: orange';>Notable</td>",
                ($notas <= 10) => "<td style = 'background-color: green';>Sobresaliente</td>",
            };
            echo $colores;
            /*if($notas > 5) echo "<td style = 'background-color: green';>Aprobado</td>";
            else echo "<td style = 'background-color: red'>Suspenso</td>";*/
            echo "</tr>";
        }        
        ?>
        </tbody>
    </table>
    <h2>MOSTRAR UNA TABLA LOS NOMBRES Y VER SI ESTAS SUSPENSO O APROBADO (VERSION 2)</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Notas</th>
                <th>Calificacion </th>
            </tr>
        </thead>
        <tbody>
        <?php
            $estudiantes = [
                "GUILLERMO" => 3,  //SUSPENSO
                "ESTELA" =>  10,   //APROBADA
                "SOFIA"   => 10,  //APROBADA
                "ENYA"    => 8,   //APROBADA
                "EMILIO"  => 10,  //APROBADA
                "CAPITAN" => 9,//   APROBADO
                "ALEJANDRA" => 1, // SUSPENSO
                "JAIME" =>  2,  //  SUSPENSO
                "DANI" => 10,    //APROBADO
                "MEDINILLA" => 8,  //APROBADO
                "JORGE" => 1,   //   SUSPENSO
            ];
            foreach($estudiantes as $estudiante => $nota){?>
                <?php if($nota < 5) echo "<tr class='suspenso'>"?>
                <?php if($nota >= 5) echo "<tr class='aprobado'>"?>
                    <?php echo "<td>$estudiante</td>" ?>
                    <?php echo "<td>$nota</td>" ?>
                    <?php
                    if($nota < 5){ echo "<td>Suspenso</td>"?>
                    <?php } else{ echo "<td>Aprobado</td>" ?>
                    <?php }?>
                </tr>
        <?php  }?>
        </tbody>
    </table>
</body>
</html>
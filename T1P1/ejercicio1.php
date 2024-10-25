<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        //Nombre y elemento
        $personajes = [
            ["Kokomi", "Agua"],
            ["Neuvillete", "Agua"],
            ["Zhongli", "Tierra"],
            ["Hu Tao", "Fuego"],
            ["Shogun Raiden", "Electricidad"],
        ];

        //1.1 Inserta dos nuevos personajes en el array
        array_push($personajes, ["Xiangli", "Fuego"]);
        array_push($personajes, ["Kazuha","Aire"]);

        //1.2 Eliminar el último personaje del array
        unset($personajes[6]);

        //1.3 Añade una tercera columna al array (puntos de ataque => Aleatorio (entre 500 y 2000))
        for ($i=0; $i < count($personajes); $i++) {
            $personajes[$i][2] = rand(500, 2000);
        }
        
        //1.4 Añade una cuarta columna (puntos de vida => Aleatorio (entre 10000 y 30000))
        for ($i=0; $i < count($personajes); $i++) {
            $personajes[$i][3] = rand(10000, 30000);
        }

        //1.5 Añade una quinta columna (tipo de personaje en funcion de sus puntos de ataque y vida)
        /*TANQUE SALUD >= 20000
          ATAQUE ATAQUE >= 1500 y que no sea tipo tanque
          SOPORTE EN DEFAULT
        */
        for ($i=0; $i < count($personajes); $i++) {
            if($personajes[$i][3] >= 20000){
                $personajes[$i][4] = "Tanque";
            }
            if($personajes[$i][2] >= 1500 && $personajes[$i][3] < 20000){
                $personajes[$i][4] = "Ataque";
            }
            else{
                $personajes[$i][4] = "Soporte";
            }
        }

        //1.6 Ordenar los personajes
        $_ataque = array_column($personajes, 2);
        $_salud = array_column($personajes, 3);
        $_elemento = array_column($personajes, 4);
        $_nombre = array_column($personajes, 0);

        array_multisort($_ataque, SORT_ASC, $_salud, SORT_ASC, $_elemento, SORT_ASC, $_nombre, SORT_ASC, $personajes);
    ?>

    <table border=1>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Elemento</th>
                <th>Ataque</th>
                <th>Salud</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($personajes as $personaje){
                    list($nombre, $ele, $ataque, $salud, $tipo) = $personaje;
                    echo "<tr>";
                    echo "<td>$nombre</td>";
                    echo "<td>$ele</td>";
                    echo "<td>$ataque</td>";
                    echo "<td>$salud</td>";
                    echo "<td>$tipo</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
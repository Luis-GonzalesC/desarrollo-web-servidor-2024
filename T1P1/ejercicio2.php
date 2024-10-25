<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        $barrios = [
            ["Centro", 2543],
            ["Huelin", 1109],
            ["Málaga Este", 890],
            ["Palma/Palmilla", 49]
        ]
    ?>
    <table border=1>
        <thead>
            <tr>
                <th>Nombre del Barrio</th>
                <th>Numero de Pisos Turísticos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Mostrando en una tabla los barrios
                foreach($barrios as $barrio){
                    echo "<tr>";
                    echo "<td>$barrio[0]</td>";
                    echo "<td>$barrio[1]</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <br>

            <!--2.1 FORMULARIO-->
    <form action="" method="post">
        <input type="text" name ="a_encontrar">
        <input type="submit" value="Comprobar Barrio">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $a_encontrar = $_POST["a_encontrar"];
            $encontrado = false;
            $i = 0;

            while(!$encontrado && $i < count($barrios)){
                if($a_encontrar == $barrios[$i][0]){
                    $encontrado = true;
                }
                $i++;
            }

            $resultado = null;
            if($encontrado){
                //Le resto 1 a la i por la vuelta de más que doy en el bucle en el caso que lo encuentre
                $resultado = match (true) {
                    $barrios[$i - 1][1] >= 1 && $barrios[$i -1][1] <= 50 => "Hay unas pocas viviendas turisticas",//2.1.2
                    $barrios[$i - 1][1] > 50 && $barrios[$i - 1][1] <= 1000 => "Hay bastantes viviendas turisticas",//2.1.3
                    $barrios[$i - 1][1] > 1000 => "Hay unas demasiadas viviendas turisticas",//2.1.4
                    default => "No hay viviendas turísticas"//2.1.1
                };
                echo "El nombre del barrio es ". $barrios[$i - 1][0] . " y " . $resultado;
            }else{
                echo "El nombre del barrio no se encuentra";
            }
        }
    ?>
</body>
</html>
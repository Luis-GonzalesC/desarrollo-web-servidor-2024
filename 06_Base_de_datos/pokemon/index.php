<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MI POKE API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);

        require('conexion.php');//Importando la conexion php del servidor (BBDD)
    ?>
</head>
<body>
<div class="container">
        <?php
            /**
             * Mostrar en una tabla la consulta sobre la conexión de BBDD
             * Si no hay unidades vendidas mostrar ("NO HAY DATOS")
            */

            $sql = "SELECT * FROM pokemon";//Escribimos la consulta
            //Esto ejecuta la conexión con la consulta que le pasamos
            $resultado = $_conexion -> query($sql); // => Devuelve un objeto
        ?>

        <table class = "table table-striped">
            <thead class = "table-primary">
                <tr>
                    <th>Id del pokemon</th>
                    <th>Nombre</th>
                    <th>Tipo 1</th>
                    <th>Tipo 2</th>
                    <th>Habilidad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //Le decimos que es eobjeto lo trate como un array
                    while($fila = $resultado -> fetch_assoc()){//Esto se ejecutara mientras tenga filas
                        // EL OBJETO SERIA ALGO ASI => id_consola, nombre, fabricante, generacion,unidades_vendidas
                        echo "<tr>";
                        echo "<td>". $fila["id"] ."</td>";
                        echo "<td>". $fila["nombre"] ."</td>";
                        echo "<td>". $fila["tipo1"] ."</td>";
                        // ESTO PARA VER EL TIPO DE VARIABLE Y SABER QUE COMPARAR => var_dump($fila["unidades_vendidas"]);
                        if($fila["tipo2"] == null){
                            echo "<td>No hay datos</td>";
                        }else{
                            echo "<td>". $fila["tipo2"] ."</td>";
                        }
                        echo "<td>". $fila["habilidad"] ."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
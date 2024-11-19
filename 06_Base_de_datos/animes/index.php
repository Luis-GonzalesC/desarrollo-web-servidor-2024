<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);

        require('conexion.php');//Importando la conexion php del servidor (BBDD)
    ?>
    <title>Animes</title>
    <style>
        th{
            background-color: #681DA8;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            $sql = "SELECT * FROM animes";//Escribimos la consulta
            //Esto ejecuta la conexión con la consulta que le pasamos
            $resultado = $_conexion -> query($sql); // => Devuelve un objeto
        ?>
        <a href="nuevo_anime.php">Nuevo anime</a>
        <a href="nuevo_estudio.php">Nuevo estudio</a>

        <table class = "table table-striped">
            <thead class = "table-primary">
                <tr>
                    <th>Título</th>
                    <th>Estudio</th>
                    <th>Año</th>
                    <th>Número de temporadas</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //Le decimos que es eobjeto lo trate como un array
                    while($fila = $resultado -> fetch_assoc()){//Esto se ejecutara mientras tenga filas
                        // EL OBJETO SERIA ALGO ASI => ["titulo" => "Fieren", "nombre_estudio"="Pierrot"...]
                        echo "<tr>";
                        echo "<td>". $fila["titulo"] ."</td>";
                        echo "<td>". $fila["nombre_estudio"] ."</td>";
                        echo "<td>". $fila["anno_estreno"] ."</td>";
                        echo "<td>". $fila["num_temporadas"] ."</td>";
                        ?>
                        <td>
                            <img src="<?php echo $fila["imagen"] ?>">
                        </td>
                        <?php
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
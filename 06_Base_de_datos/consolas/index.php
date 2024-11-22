<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);

        require('conexion.php');//Importando la conexion php del servidor (BBDD)
    ?>
    <style>
        th{
            background-color: #681DA8;
        }

        .imagen{
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
<div class="container">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_consola = $_POST["id_consola"];
                
                $sql = "DELETE FROM consolas WHERE id_consola = '$id_consola'";

                $_conexion -> query($sql);
            }
        ?>

        <br>
        <a class="btn btn-primary" href="nuevo_consola.php">Nuevas consolas</a>
        <a class="btn btn-primary" href="nuevo_fabricante.php">Nuevo fabricante</a>
        <br><br>

        <?php
            /**
             * Mostrar en una tabla la consulta sobre la conexión de BBDD
             * Si no hay unidades vendidas mostrar ("NO HAY DATOS")
            */

            $sql = "SELECT * FROM consolas";//Escribimos la consulta
            //Esto ejecuta la conexión con la consulta que le pasamos
            $resultado = $_conexion -> query($sql); // => Devuelve un objeto
        ?>

        <table class = "table table-striped">
            <thead class = "table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Fabricante</th>
                    <th>Generación</th>
                    <th>Unidades vendidas</th>
                    <th>Imagen</th>
                    <th>Borrar Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //Le decimos que es eobjeto lo trate como un array
                    while($fila = $resultado -> fetch_assoc()){//Esto se ejecutara mientras tenga filas
                        // EL OBJETO SERIA ALGO ASI => id_consola, nombre, fabricante, generacion,unidades_vendidas
                        echo "<tr>";
                        echo "<td>". $fila["nombre"] ."</td>";
                        echo "<td>". $fila["fabricante"] ."</td>";
                        echo "<td>". $fila["generacion"] ."</td>";
                        // ESTO PARA VER EL TIPO DE VARIABLE Y SABER QUE COMPARAR => var_dump($fila["unidades_vendidas"]);
                        if($fila["unidades_vendidas"] == null){
                            echo "<td>No hay datos</td>";
                        }else{
                            echo "<td>". $fila["unidades_vendidas"] ."</td>";
                        }?>
                        <td>
                            <img src="<?php echo $fila["imagen"] ?>" class="imagen">
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_consola" value="<?php echo $fila["id_consola"] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
              <?php     echo "</tr>"; 
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
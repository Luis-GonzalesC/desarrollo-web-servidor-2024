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

        session_start(); //Para recuperar lo que sea iniciado porque no podemos acceder a ese valor
        /*Comprobamos si un usuario se ha logueado en claso contrario
        cortamos la ejecucion*/
        if(!isset($_SESSION["usuario"])){
            header("location: usuario/iniciar_sesion.php");
            exit;
        }
    ?>
    <title>Animes</title>
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
        <h2>Bienvenid@ <?php echo $_SESSION["usuario"] ?></h2>
        <a class ="btn btn-danger" href="usuario/cerrar_sesion.php">Cerrar Sesión</a>
        <h2>Listado de animes</h2>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_anime = $_POST["id_anime"];
                //echo "<h1>$id_anime</h1>";
                $sql = "DELETE FROM animes WHERE id_anime = '$id_anime'";
                $_conexion -> query($sql);
            }

            $sql = "SELECT * FROM animes";//Escribimos la consulta
            //Esto ejecuta la conexión con la consulta que le pasamos
            $resultado = $_conexion -> query($sql); // => Devuelve un objeto
        ?>
        <br>
        <a class="btn btn-primary" href="nuevo_anime.php">Nuevo anime</a>
        <a class="btn btn-primary" href="nuevo_estudio.php">Nuevo estudio</a>
        <br><br>

        <table class = "table table-striped">
            <thead class = "table-primary">
                <tr>
                    <th>Título</th>
                    <th>Estudio</th>
                    <th>Año</th>
                    <th>Número de temporadas</th>
                    <th>Imagen</th>
                    <th>Borrar Imagen</th>
                    <th>Editar anime</th>
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
                            <img src="<?php echo $fila["imagen"] ?>" class="imagen">
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_anime" value="<?php echo $fila["id_anime"] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-primary" 
                            href="editar_anime.php?id_anime=<?php echo $fila["id_anime"] ?>">EDITAR</a>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Index Productos</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);

        require('util/conexion.php');//Importando la conexion php del servidor (BBDD)

        session_start(); //Para recuperar lo que sea iniciado porque no podemos acceder a ese valor
    ?>
    <style>
        .imagen{
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            if(isset($_SESSION["usuario"])){ ?>
                <h2>Bienvenid@ <?php echo $_SESSION["usuario"] ?></h2>
                <a class ="btn btn-primary" href="productos/index.php">Productos</a>
                <a class ="btn btn-primary" href="categorias/index.php">Categorias</a>
                <a class ="btn btn-danger" href="usuarios/cerrar_sesion.php">Cerrar Sesión</a>
        <?php }else{ ?>
                <a class ="btn btn-danger" href="usuarios/iniciar_sesion.php">Iniciar Sesión</a>
        <?php }
        ?>
        
        <h2>Listado de Productos</h2>
        <?php
            $sql = "SELECT * FROM productos";
            $resultado = $_conexion -> query($sql); // => Devuelve un objeto

        ?>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()){
                        echo "<tr>";
                        echo "<td>". $fila["nombre"] ."</td>";
                        echo "<td>". $fila["precio"] ."</td>";
                        echo "<td>". $fila["categoria"] ."</td>";
                        echo "<td>". $fila["stock"] ."</td>"; ?>
                        <td>
                            <img src="<?php echo $fila["imagen"] ?>" class="imagen">
                        </td>
                <?php   echo "<td>". $fila["descripcion"] ."</td>"; 
                        echo "</tr>";
                    } ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
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

        require('../util/conexion.php');//Importando la conexion php del servidor (BBDD)

        session_start(); //Para recuperar lo que sea iniciado porque no podemos acceder a ese valor
        /*Comprobamos si un usuario se ha logueado en claso contrario
        cortamos la ejecucion*/
        if(!isset($_SESSION["usuario"])){
            header("location: ../usuarios/iniciar_sesion.php");
            exit;
        }
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
        <h2>Bienvenid@ <?php echo $_SESSION["usuario"] ?></h2>
        <a class ="btn btn-danger" href="../usuarios/cerrar_sesion.php">Cerrar Sesión</a>
        <h2>Listado de Productos</h2>
        <?php
            //Esto para borrar
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_producto = $_POST["id_producto"];
                //echo "<h1>$id_anime</h1>";
                $sql = "DELETE FROM productos WHERE id_producto = '$id_producto'";
                $_conexion -> query($sql);
            }

            $sql = "SELECT * FROM productos";
            $resultado = $_conexion -> query($sql); // => Devuelve un objeto

        ?>

        <a class="btn btn-primary" href="nuevo_producto.php">Nuevo Producto</a>
        <a class ="btn btn-secondary" href="../categorias/index.php">Categorias</a>
        <a class ="btn btn-info" href="../index.php">Index de la tienda</a>

        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Editar Producto</th>
                    <th>Borrar</th>
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
                            <img src="<?php echo "../".$fila["imagen"] ?>" class="imagen">
                        </td>
                <?php   echo "<td>". $fila["descripcion"] ."</td>"; ?>
                        <td>
                            <a class="btn btn-primary" 
                                href="editar_producto.php?id_producto=<?php echo $fila["id_producto"] ?>">EDITAR</a>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_producto" value="<?php echo $fila["id_producto"] ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                    <?php 
                        echo "</tr>";
                    } ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
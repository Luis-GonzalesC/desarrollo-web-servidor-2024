<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Index Categorias</title>
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
</head>
<body>
    <div class="container">
        <h2>Bienvenid@ <?php echo $_SESSION["usuario"] ?></h2>
        <a class ="btn btn-danger" href="../usuarios/cerrar_sesion.php">Cerrar Sesión</a>
        <a class ="btn btn-primary" href="../usuarios/cambiar_credenciales.php">Modificar la Contraseña</a>
        <h2>Listado de Categorias</h2>
        <?php
            //Esto para borrar
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $categoria = $_POST["categoria"];
                /*$sql = "DELETE FROM categorias WHERE categoria = '$categoria'";
                $_conexion -> query($sql);*/

                #1. Prepare
                $sql = $_conexion -> prepare("DELETE FROM categorias WHERE categoria = ?");
                #2. Binding
                $sql -> bind_param("s", $categoria);
                #3. Execute
                $sql -> execute();
            }

            $sql = "SELECT * FROM categorias";
            $resultado = $_conexion -> query($sql); // => Devuelve un objeto*

        ?>

        <a class="btn btn-primary" href="nueva_categoria.php">Nueva Categoria</a>
        <a class ="btn btn-secondary" href="../productos/index.php">Productos</a>
        <a class ="btn btn-info" href="../index.php">Index de la tienda</a>

        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Para editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()){
                        echo "<tr>";
                        echo "<td>". $fila["categoria"] ."</td>";
                        echo "<td>". $fila["descripcion"] ."</td>"; ?>
                            <td>
                                <a class="btn btn-primary" 
                                    href="editar_categoria.php?categoria=<?php echo $fila["categoria"] ?>">EDITAR</a>
                            </td>

                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="categoria" value="<?php echo $fila["categoria"] ?>">
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
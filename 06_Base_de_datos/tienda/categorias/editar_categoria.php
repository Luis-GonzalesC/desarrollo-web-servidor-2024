<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        <?php
            function depurar(string $entrada) : string{
                $salida = htmlspecialchars($entrada);
                $salida = trim($salida);
                $salida = preg_replace('/\$+/', ' ', $salida);
                return $salida;
            }

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $categoria = $_POST["categoria"];
                $tmp_descripcion = depurar($_POST["descripcion"]);

                if($tmp_descripcion != ''){
                    if(strlen($tmp_descripcion) <= 255) {
                        $patron = "/^[0-9a-zA-ZáéíóúñÑÁÉÍÓÚ., ]+$/";
                        if(!preg_match($patron, $tmp_descripcion)) $err_descripcion = "La descripción no cumple el patron correspondiente";
                        else $descripcion = $tmp_descripcion;
                    }else $err_descripcion = "La descripción tiene que tener 255 carácteres como máximo";
                }else $err_descripcion = "La descripción es obligatoria";

                if(isset($categoria) && isset($descripcion)){
                    $sql = "UPDATE categorias SET 
                                descripcion = '$descripcion'
                                WHERE categoria = '$categoria'";

                    $_conexion -> query($sql);
                    echo "<div class='col-4 alert alert-success'>SE HA ACTUALIZADO</div>";
                }else echo "<div class='col-4 alert alert-danger'>NO SE HA ACTUALIZADO</div>";
            }


            /*Esto es el bloque de código para poder modificar y mostrar lo que hay en cada cosa*/
            $categoria = $_GET["categoria"];
            $sql = "SELECT * FROM categorias WHERE categoria = '$categoria'";//El id de anime viene desde el otro lado
            $resultado = $_conexion -> query($sql);
            $cate = $resultado -> fetch_assoc();
        ?>
        <form class="col-4" action="" method="post">
        <div class="mb-3">
                <label class="form-label">Categoria</label>
                <input disabled class="form-control" type="text" value="<?php echo $cate["categoria"] ?>">
                <input type="hidden" name="categoria" value="<?php echo $cate["categoria"] ?>">
        </div>

        <div class="mb-3">
                <label class="form-label">Descripción</label>
                <?php if(isset($err_descripcion)) echo "<div class='alert alert-danger'>$err_descripcion</div>"?>
                <input class="form-control" type="text" name="descripcion" value="<?php echo $cate["descripcion"] ?>">
        </div>

        <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a class="btn btn-secondary" href="index.php">Regresar</a>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Nueva Categoria</title>
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
                $tmp_categoria = depurar($_POST["categoria"]);
                $tmp_descripcion = depurar($_POST["descripcion"]);

                //Validación de la categoria
                if($tmp_categoria != '') {
                    $minimo_BBDD = 2; //El número minimo de caracteres exigido
                    $maximo_BBDD = 30; //El número máximo de caracteres de la BBDD
                    if(strlen($tmp_categoria) >= $minimo_BBDD && strlen($tmp_categoria) <= $maximo_BBDD){
                        $patron = "/^[a-zA-ZáéíóúñÑÁÉÍÓÚ ]+$/";
                        if(!preg_match($patron, $tmp_categoria)) $err_categoria = "La categoria no cumple el patron correspondiente";
                        else $categoria = $tmp_categoria;
                    }else $err_categoria = "La categoria debe tener entre 2 y ". $maximo_BBDD . " caracteres";
                }else $err_categoria = "La categoria es obligatoria";

                //Validación de la descripción
                if($tmp_descripcion != ''){
                    if(strlen($tmp_descripcion) <= 255) {
                        $patron = "/^[0-9a-zA-ZáéíóúñÑÁÉÍÓÚ., ]+$/";
                        if(!preg_match($patron, $tmp_descripcion)) $err_descripcion = "La descripción no cumple el patron correspondiente";
                        else $descripcion = $tmp_descripcion;
                    }else $err_descripcion = "La descripción tiene que tener 255 carácteres como máximo";
                }else $err_descripcion = "La descripción es obligatoria";

                if(isset($categoria) && isset($descripcion)){
                    $sql = "SELECT categoria FROM categorias WHERE categoria = '$categoria'";
                    $resultado = $_conexion -> query($sql);

                    //Si no hay columnas es nulo quiere decir que no hay usuarios registrados
                    if($resultado -> num_rows == 0){
                        $sql = "INSERT INTO categorias 
                        (categoria, descripcion) 
                        VALUES 
                        ('$categoria', '$descripcion')";

                        $_conexion -> query($sql); //Con esto se puede rellenar el formulario y se agregará a la base de datos
                        echo "<div class='col-4 alert alert-success'>SE HA INSERTADO CORRECTAMENTE</div>";
                    }else echo "<div class='col-4 alert alert-danger'>LA CATEGORIA YA EXISTE INGRESE OTRA</div>";
                } 
            }
        ?>

        <form class="col-4" action="" method="post">
        
        <div class="mb-3">
                <label class="form-label">Categoria</label>

                <?php if(isset($err_categoria)) echo "<div class='alert alert-danger'>$err_categoria</div>"?>
                <input class="form-control" type="text" name="categoria">
        </div>

        <div class="mb-3">
                <label class="form-label">Descripción</label>
                <?php if(isset($err_descripcion)) echo "<div class='alert alert-danger'>$err_descripcion</div>"?>
                <input class="form-control" type="text" name="descripcion">
        </div>

        <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
                <a class="btn btn-secondary" href="index.php">Regresar</a>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
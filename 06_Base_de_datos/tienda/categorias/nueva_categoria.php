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
                $categoria = depurar($_POST["categoria"]);
                $descripcion = depurar($_POST["descripcion"]);

                $sql = "INSERT INTO categorias
                    (categoria, descripcion) 
                    VALUES 
                    ('$categoria', '$descripcion')";

                $_conexion -> query($sql); //Con esto se puede rellenar el formulario y se agregará a la base de datos
            }
        ?>

        <form class="col-4" action="" method="post">
        
        <div class="mb-3">
                <label class="form-label">Categoria</label>
                <input class="form-control" type="text" name="categoria">
        </div>

        <div class="mb-3">
                <label class="form-label">Descripción</label>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevas consolas</title>
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
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                $nombre = $_POST["nombre"];
                $fabricante = $_POST["fabricante"];
                $generacion = $_POST["generacion"];
                $unidades_vendidas = $_POST["unidades_vendidas"];

                $sql = "INSERT INTO consolas
                    (nombre, fabricante, generacion, unidades_vendidas) 
                    VALUES 
                    ('$nombre', '$fabricante', $generacion, $unidades_vendidas)";

                $_conexion -> query($sql); //Con esto se puede rellenar el formulario y se agregará a la base de datos

            }
        ?>
        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nombre de Consola</label>
                <input class="form-control" type="text" name="nombre">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Fabricante</label>
                <input class="form-control" type="text" name="fabricante">
            </div>

            <div class="mb-3">
                <label class="form-label">Generación</label>
                <input class="form-control" type="text" name="generacion">
            </div>

            <div class="mb-3">
                <label class="form-label">Unidades vendidas</label>
                <input class="form-control" type="text" name="unidades_vendidas">
            </div>

            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
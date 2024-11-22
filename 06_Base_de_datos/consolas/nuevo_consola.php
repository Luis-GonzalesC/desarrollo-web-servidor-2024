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
            $sql = "SELECT * FROM fabricantes ORDER BY fabricante";
            $resultado = $_conexion -> query($sql);

            $fabricante = [];

            while($fila = $resultado -> fetch_assoc()){
                array_push($fabricante, $fila["fabricante"]);    
            }

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                $nombre = $_POST["nombre"];
                $fabricante = $_POST["fabricante"];
                $generacion = $_POST["generacion"];
                $unidades_vendidas = $_POST["unidades_vendidas"];

                //PARA PODER AGREGAR UNA IMAGEN
                // $_FILES, QUE ES UN ARRAY DOBLE !!!!!!
                $nombre_imagen = $_FILES["imagen"]["name"];
                //var_dump($_FILES["imagen"]);
                $direccion_temporal = $_FILES["imagen"]["tmp_name"]; //se guarda la ruta temporalmente
                move_uploaded_file($direccion_temporal, "imagenes/$nombre_imagen"); // => FUNCION QUE MUEVE LA IMAGEN DE LA RUTA A NUESTRA IMAGEN

                $sql = "INSERT INTO consolas
                    (nombre, fabricante, generacion, unidades_vendidas, imagen) 
                    VALUES 
                    ('$nombre', '$fabricante', $generacion, $unidades_vendidas, './imagenes/$nombre_imagen')";

                $_conexion -> query($sql); //Con esto se puede rellenar el formulario y se agregará a la base de datos

            }
        ?>
        <form class="col-4" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre de Consola</label>
                <input class="form-control" type="text" name="nombre">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Fabricante</label>
                <select class="form-select" name="nombre_fabricante">
                    <option value="" selected disabled hidden>---ELIGE UN FABRICANTE---</option>
                    <?php
                        foreach ($fabricante as $fabri) { ?>
                            <option value="<?php echo $fabri ?>">
                                <?php echo $fabri ?>
                            </option>
                    <?php } ?>
                </select>
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
                <label class="form-label">Imagen</label>
                <input class="form-control" type="file" name="imagen">
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
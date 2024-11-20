<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo anime</title>
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
            $sql = "SELECT * FROM estudios ORDER BY nombre_estudio";
            $resultado = $_conexion -> query($sql);

            $estudios = [];

            while($fila = $resultado -> fetch_assoc()){
                array_push($estudios, $fila["nombre_estudio"]);    
            }
            //print_r($estudios);

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $titulo = $_POST["titulo"];
                $nombre_estudio = $_POST["nombre_estudio"];
                $anno_estreno = $_POST["anno_estreno"];
                $num_temporadas = $_POST["num_temporadas"];

                // $_FILES, QUE ES UN ARRAY DOBLE !!!!!!
                $nombre_imagen = $_FILES["imagen"]["name"];
                var_dump($_FILES["imagen"]);
                $direccion_temporal = $_FILES["imagen"]["tmp_name"]; //se guarda la ruta temporalmente
                move_uploaded_file($direccion_temporal, "imagenes/$nombre_imagen"); // => FUNCION QUE MUEVE LA IMAGEN DE LA RUTA A NUESTRA IMAGEN

                $sql = "INSERT INTO animes 
                    (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen)
                    VALUES 
                    ('$titulo', '$nombre_estudio', $anno_estreno, $num_temporadas, './imagenes/$nombre_imagen')";

                $_conexion -> query($sql); //Con esto se puede rellenar el formulario y se agregará a la base de datos

                //enctype="multipart/form" encripta el fichero que se mande para el formulario
            }
        ?>
        <form class="col-4" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Estudio</label>
                <select class="form-select" name="nombre_estudio">
                    <option value="" selected disabled hidden>---ELIGE UN ESTUDIO---</option>
                    <?php
                        foreach ($estudios as $estudio) { ?>
                            <option value="<?php echo $estudio ?>">
                                <?php echo $estudio ?>
                            </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Año estreno</label>
                <input class="form-control" type="text" name="anno_estreno">
            </div>

            <div class="mb-3">
                <label class="form-label">Número de temporadas</label>
                <input class="form-control" type="text" name="num_temporadas">
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
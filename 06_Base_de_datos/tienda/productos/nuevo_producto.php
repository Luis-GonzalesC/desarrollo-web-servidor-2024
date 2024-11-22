<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Nuevo Producto</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);

        require('../util/conexion.php');//Importando la conexion php del servidor (BBDD)
    ?>
</head>
<body>
    <div class="container">
        <?php
            $sql = "SELECT categoria FROM productos ORDER BY categoria";
            $resultado = $_conexion -> query($sql);

            $categorias = [];

            while($fila = $resultado -> fetch_assoc()){
                array_push($categorias, $fila["categoria"]);    
            }

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $nombre_producto = $_POST["nombre"];
                $precio_producto = $_POST["precio"];
                $categoria = $_POST["categoria"];
                $stock = $_POST["stock"];

                $nombre_imagen = $_FILES["imagen"]["name"];
                $direccion_temporal = $_FILES["imagen"]["tmp_name"]; //se guarda la ruta temporalmente
                move_uploaded_file($direccion_temporal, "../imagenes/$nombre_imagen"); // => FUNCION QUE MUEVE LA IMAGEN DE LA RUTA A NUESTRA IMAGEN

                $descripcion = $_POST["descripcion"];

                $sql = "INSERT INTO productos 
                    (nombre, precio, categoria, stock, imagen, descripcion)
                    VALUES 
                    ('$nombre_producto', '$precio_producto', $categoria, $stock, '../imagenes/$nombre_imagen', '$descripcion')";

                $_conexion -> query($sql); //Con esto se puede rellenar el formulario y se agregará a la base de datos

                $sql = "INSERT INTO categorias
                    (categoria, descripcion) 
                    VALUES 
                    ('$categoria', '$descripcion')";

                $_conexion -> query($sql); //Con esto se puede rellenar el formulario y se agregará a la base de datos
            }
        ?>

        <form class="col-4" action="" method="post" enctype="multipart/form-data">
        
            <div class="mb-3">
                    <label class="form-label">Nombre del producto</label>
                    <input class="form-control" type="text" name="nombre">
            </div>

            <div class="mb-3">
                    <label class="form-label">Precio del producto</label>
                    <input class="form-control" type="text" name="precio">
            </div>

            <div class="mb-3">
                <label class="form-label">Categorias</label>
                <select class="form-select" name="categoria">
                    <option value="" selected disabled hidden>---ELIGE UNA CATEGORIA---</option>
                <?php 
                    foreach($categorias as $cate){ ?>
                        <option value="<?php echo $cate?>">
                            <?php echo $cate?>
                        </option>
                <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                    <label class="form-label">Stock del producto</label>
                    <input class="form-control" type="text" name="stock">
            </div>

            <div class="mb-3">
                    <label class="form-label">Imagen</label>
                    <input class="form-control" type="file" name="imagen">
                </div>

            <div class="mb-3">
                    <label class="form-label">Descripción del producto</label>
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
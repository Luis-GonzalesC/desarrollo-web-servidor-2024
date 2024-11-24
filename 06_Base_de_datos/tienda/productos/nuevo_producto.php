<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Nuevo Producto</title>
    <style>
        .error{
            color:red;
        }
    </style>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);

        require('../util/conexion.php');//Importando la conexion php del servidor (BBDD)
    ?>
</head>
<body>
    <div class="container">
        <?php
            //De la tabla categorias saco todas las que existan
            $sql = "SELECT categoria FROM categorias ORDER BY categoria";
            $resultado = $_conexion -> query($sql);

            $categorias = [];

            while($fila = $resultado -> fetch_assoc()){
                array_push($categorias, $fila["categoria"]);
            }

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                /*$nombre_producto = $_POST["nombre"];
                $precio_producto = $_POST["precio"];
                $categoria = $_POST["categoria"];
                $stock = $_POST["stock"];
                //IMAGEN ABAJO
                $descripcion = $_POST["descripcion"];*/

                $tmp_nombre_producto = $_POST["nombre"];
                $tmp_precio_producto = $_POST["precio"];
                if(isset($_POST["categoria"])) $tmp_categoria = $_POST["categoria"];
                else $tmp_categoria = "";
                $tmp_stock = $_POST["stock"];
                $tmp_descripcion = $_POST["descripcion"];

                //Validación del nombre
                if($tmp_nombre_producto != ''){
                    if(strlen($tmp_nombre_producto) > 50) $err_nombre_producto = "El nombre del producto no puedo ser mayor que 50 caracteres";
                    else $nombre_producto = $tmp_nombre_producto;
                } else $err_nombre_producto = "EL nombre del producto tiene que ser obligatorio";

                //Validacion del precio
                if($tmp_precio_producto != ''){
                    if(filter_var($tmp_precio_producto, FILTER_VALIDATE_FLOAT) !== FALSE)
                        $precio_producto = $tmp_precio_producto;
                    else $err_precio_producto = "El precio del producto tiene que ser un número";
                } else $err_precio_producto = "EL precio del producto es obligatorio";
                
                //Validacion de la categoria
                if($tmp_categoria != ''){
                    if(in_array($tmp_categoria, $categorias)) $categoria = $tmp_categoria;
                    else $err_categoria = "La categoria seleccionada no es la correcta";
                }else $err_categoria = "La categoria tiene que ser obligatorio";
                
                if($tmp_stock != ''){
                    if(filter_var($tmp_stock, FILTER_VALIDATE_INT) !== FALSE) $stock = $tmp_stock;
                    else $err_stock = "El precio del producto tiene que ser un número ENTERO";
                } else $stock = 0;

                //Falta validación de imagen
                $nombre_imagen = $_FILES["imagen"]["name"];
                $direccion_temporal = $_FILES["imagen"]["tmp_name"]; //se guarda la ruta temporalmente
                move_uploaded_file($direccion_temporal, "../imagenes/$nombre_imagen"); // => FUNCION QUE MUEVE LA IMAGEN DE LA RUTA A NUESTRA IMAGEN

                if($tmp_descripcion != ''){
                    if(strlen($tmp_descripcion) > 255) $err_descripcion = "La descripción tiene que tener 255 carácteres";
                    else $descripcion = $tmp_descripcion;
                }else $err_descripcion = "La descripción es obligatoria";

                if(isset($nombre_producto) && isset($precio_producto) && isset($categoria) && isset($stock) && isset($descripcion)){
                    $sql = "INSERT INTO productos 
                    (nombre, precio, categoria, stock, imagen, descripcion) 
                    VALUES 
                    ('$nombre_producto', $precio_producto, '$categoria', $stock, '../imagenes/$nombre_imagen', '$descripcion')";

                    $_conexion -> query($sql); //Con esto se puede rellenar el formulario y se agregará a la base de datos
                }else echo "<h1>NO SE HA INSERTADO NA</h1>";
                
            }
        ?>

        <form class="col-4" action="" method="post" enctype="multipart/form-data">
        
            <div class="mb-3">
                    <label class="form-label">Nombre del producto</label>
                    <input class="form-control" type="text" name="nombre">
                    <?php if(isset($err_nombre_producto)) echo "<span class='error'>$err_nombre_producto</span>"?>
            </div>

            <div class="mb-3">
                    <label class="form-label">Precio del producto</label>
                    <input class="form-control" type="text" name="precio">
                    <?php if(isset($err_precio_producto)) echo "<span class='error'>$err_precio_producto</span>"?>
            </div>

            <div class="mb-3">
                <label class="form-label">Categorias</label>
                <!--<input class="form-control" type="text" name="categoria">-->

                <select class="form-select" name="categoria">
                    <option selected disabled hidden>---ELIGE UNA CATEGORIA---</option>
                <?php 
                    foreach($categorias as $cate){ ?>
                        <option value="<?php echo $cate?>">
                            <?php echo $cate?>
                        </option>
                <?php } ?>
                </select>
                <?php if(isset($err_categoria)) echo "<span class='error'>$err_categoria</span>"?>
            </div>

            <div class="mb-3">
                    <label class="form-label">Stock del producto</label>
                    <input class="form-control" type="text" name="stock">
                    <?php if(isset($err_stock)) echo "<span class='error'>$err_stock</span>"?>
            </div>

            <div class="mb-3">
                    <label class="form-label">Imagen</label>
                    <input class="form-control" type="file" name="imagen">
                </div>

            <div class="mb-3">
                    <label class="form-label">Descripción del producto</label>
                    <textarea class="form-control" name="descripcion"></textarea>
                    <!--<input class="form-control" type="text" name="descripcion">-->
                    <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"?>
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
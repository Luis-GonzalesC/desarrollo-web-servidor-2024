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

            //De la tabla categorias saco todas las que existan
            $sql = "SELECT categoria FROM categorias ORDER BY categoria";
            $resultado = $_conexion -> query($sql);

            $categorias = [];

            while($fila = $resultado -> fetch_assoc()){
                array_push($categorias, $fila["categoria"]);
            }

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $tmp_nombre_producto = depurar($_POST["nombre"]);
                $tmp_precio_producto = depurar($_POST["precio"]);
                if(isset($_POST["categoria"])) $tmp_categoria = depurar($_POST["categoria"]);
                else $tmp_categoria = "";
                $tmp_stock = depurar($_POST["stock"]);
                $tmp_descripcion = depurar($_POST["descripcion"]);

                //Validación del nombre
                if($tmp_nombre_producto != ''){
                    if(strlen($tmp_nombre_producto) >= 2 && strlen($tmp_nombre_producto) <= 50){
                        $patron = "/^[a-zA-Z0-9 ]+$/";
                        if(!preg_match($patron, $tmp_nombre_producto)) $err_nombre_producto = "El nombre del producto solo debe tener letras, espacios en blanco y números";
                        else $nombre_producto = $tmp_nombre_producto;
                    }else $err_nombre_producto = "El nombre del producto debe tener entre 2 y 50 caracteres";
                } else $err_nombre_producto = "EL nombre del producto tiene que ser obligatorio";

                //Validacion del precio
                if($tmp_precio_producto != ''){
                    if(filter_var($tmp_precio_producto, FILTER_VALIDATE_FLOAT) !== FALSE){
                        $valor_maximo_BBDD = 9999.99;
                        if($tmp_precio_producto >= 0 && $tmp_precio_producto <= $valor_maximo_BBDD){
                            $patron = "/^[0-9]{1,4}(\.[0-9]{1,2})?$/";
                            if(!preg_match($patron, $tmp_precio_producto)) $err_precio_producto = "El precio del producto no cumple el patrón";
                            else $precio_producto = $tmp_precio_producto;
                        } else $err_precio_producto = "El precio del producto es debe ser estar entre 0 y ". $valor_maximo_BBDD . " como máximo";
                    } else $err_precio_producto = "El precio del producto tiene que ser un número";
                } else $err_precio_producto = "El precio del producto es obligatorio";
                
                //Validación de la descripción
                if($tmp_descripcion != ''){
                    if(strlen($tmp_descripcion) <= 255) $descripcion = $tmp_descripcion;
                    else $err_descripcion = "La descripción tiene que tener 255 carácteres como máximo";
                }else $err_descripcion = "La descripción es obligatoria";

                //Por defecto se podrá 0
                if($tmp_stock != ''){
                    if(filter_var($tmp_stock, FILTER_VALIDATE_INT) !== FALSE){
                        if($tmp_stock >= 0 && $tmp_stock <= 999) $stock = $tmp_stock;
                        else $err_stock = "El stock del producto tiene que ser un número entre 0 y 999";
                    } else $err_stock = "El stock del producto tiene que ser un número ENTERO";
                } else $stock = 0;

                //Validacion de la categoria
                if($tmp_categoria != ''){
                    if(in_array($tmp_categoria, $categorias)) $categoria = $tmp_categoria;
                    else $err_categoria = "La categoria seleccionada no es la correcta";
                }else $err_categoria = "La categoria tiene que ser obligatorio";
                
                //Validación de la imagen
                if(($_FILES["imagen"]["name"] != '')) {
                    $tipos_imagen = ["image/png", "image/jpg", "image/jpeg", "image/webp"];
                    if(in_array($_FILES["imagen"]["type"], $tipos_imagen)){
                        $nombre_imagen = $_FILES["imagen"]["name"];
                        $direccion_temporal = $_FILES["imagen"]["tmp_name"]; //se guarda la ruta temporalmente
                        move_uploaded_file($direccion_temporal, "../imagenes/$nombre_imagen"); // => FUNCION QUE MUEVE LA IMAGEN DE LA RUTA A NUESTRA IMAGEN
                    } $err_imagen = "El tipo de imagen no es el correcto";
                } else $err_imagen = "Por favor, selecciona una imagen.";
                
                //SI TODO TA BIEN SE AGREGA
                if(isset($nombre_producto) && isset($precio_producto) && isset($categoria) && isset($stock) && isset($descripcion) && isset($nombre_imagen)){
                    /*$sql = "INSERT INTO productos 
                    (nombre, precio, categoria, stock, imagen, descripcion) 
                    VALUES 
                    ('$nombre_producto', $precio_producto, '$categoria', $stock, 'imagenes/$nombre_imagen', '$descripcion')";

                    $_conexion -> query($sql); //Con esto se puede rellenar el formulario y se agregará a la base de datos*/

                    $imagen = "imagenes/$nombre_imagen";
                    #1. Prepare
                    $sql = $_conexion -> prepare("INSERT INTO productos 
                    (nombre, precio, categoria, stock, imagen, descripcion) 
                    VALUES (?,?,?,?,?,?)");

                    #2. Binding
                    $sql -> bind_param("sisiss", $nombre_producto, $precio_producto, $categoria, $stock, $imagen, $descripcion);

                    #3. Execute
                    $sql -> execute();
                    echo "<div class='col-4 alert alert-success'>SE HA INSERTADO CORRECTAMENTE</div>";
                }
                
            }
        ?>

        <form class="col-4" action="" method="post" enctype="multipart/form-data">
        
            <div class="mb-3">
                    <label class="form-label">Nombre del producto</label>
                    <?php if(isset($err_nombre_producto)) echo "<div class='alert alert-danger'>$err_nombre_producto</div>"?>
                    <input class="form-control" type="text" name="nombre">
            </div>

            <div class="mb-3">
                    <label class="form-label">Precio del producto</label>
                    <?php if(isset($err_precio_producto)) echo "<div class='alert alert-danger'>$err_precio_producto</div>"?>
                    <input class="form-control" type="text" name="precio">
            </div>

            <div class="mb-3">
                <label class="form-label">Categorias</label>
                <!--<input class="form-control" type="text" name="categoria">-->

                <?php if(isset($err_categoria)) echo "<div class='alert alert-danger'>$err_categoria</div>"?>
                <select class="form-select" name="categoria">
                    <option selected disabled hidden>---ELIGE UNA CATEGORIA---</option>
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
                    <?php if(isset($err_stock)) echo "<div class='alert alert-danger'>$err_stock</div>"?>
            </div>

            <div class="mb-3">
                    <label class="form-label">Imagen</label>
                    <?php if(isset($err_imagen)) echo "<div class='alert alert-danger'>$err_imagen</div>"?>
                    <input class="form-control" type="file" name="imagen">

                </div>

            <div class="mb-3">
                    <label class="form-label">Descripción del producto</label>
                    <?php if(isset($err_descripcion)) echo "<div class='alert alert-danger'>$err_descripcion</div>"?>
                    <textarea class="form-control" name="descripcion"></textarea>
                    <!--<input class="form-control" type="text" name="descripcion">-->
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
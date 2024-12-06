<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar credenciales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);

        require('../util/conexion.php');//Importando la conexion php del servidor (BBDD)

        session_start();//Recuperando la sesion creada
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
                $tmp_usuario = depurar($_POST["usuario"]);
                $tmp_contrasena = depurar($_POST["contrasena"]);

                if($tmp_usuario != ''){
                    if(strlen($tmp_usuario) >= 3 && strlen($tmp_usuario) <= 15){
                        $patron = "/^[a-zA-Z0-9]+$/";
                        if(!preg_match($patron, $tmp_usuario)) $err_usuario = "El nombre de usuario no cumple con el patrón, solo puede tener letras y números";
                        else $usuario = $tmp_usuario;
                    }else $err_usuario = "El nombre de usuario debe tener entre 3 y 15 caracteres";
                }else $err_usuario = "El nombre de usuario es obligatorio";

                if($tmp_contrasena != ''){
                    if(strlen($tmp_contrasena) >= 8 && strlen($tmp_contrasena) <= 15){
                        $patron = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
                        if(!preg_match($patron, $tmp_contrasena)) $err_contrasena = "La contraseña debe tener letras en mayúsculas y minúsculas, algún número y puede tener caracteres especiales";
                        else $contrasena = $tmp_contrasena;
                    }else $err_contrasena = "La contraseña debe tener entre 8 y 15 carácteres";
                }else $err_contra = "Cambiar la contraseña es obligatoria";
                

                if(isset($usuario) && isset($contrasena)){
                    $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);//Coge por defecto la contraseña y la cifra

                    $sql = "UPDATE usuarios SET 
                                contrasena = '$contrasena_cifrada'
                                WHERE usuario = '$usuario'";

                    $_conexion -> query($sql);
                    echo "<div class='col-4 alert alert-success'>SE HA ACTUALIZADO LA CONTRASEÑA</div>";
                }else echo "<div class='col-4 alert alert-danger'>NO SE HA ACTUALIZADO LA CONTRASEÑA</div>";
            }
        ?>
        <h1>Cambiar Contraseña</h1>
        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <?php if(isset($err_usuario)) echo "<div class='alert alert-danger'>$err_usuario</div>"?>
                <input disabled class="form-control" type="text" value="<?php echo $_SESSION["usuario"] ?>">
                <input type="hidden" name="usuario" value="<?php echo $_SESSION["usuario"] ?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Nueva Contraseña</label>
                <?php if(isset($err_contrasena)) echo "<div class='alert alert-danger'>$err_contrasena</div>"?>
                <input class="form-control" type="password" name="contrasena">
            </div>

            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Cambiar Credenciales">
                <a class ="btn btn-danger" href="./cerrar_sesion.php">Cerrar Sesión</a>
            </div>
        </form>
        <a class="btn btn-info" href="../../tienda">Index de la tienda</a>
        <a class="btn btn-secondary" href="../productos/index.php">Index de los Productos</a>
        <a class="btn btn-secondary" href="../categorias/index.php">Index de las Categorias</a>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
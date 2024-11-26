<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro para animes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);

        require('../../util/conexion.php');//Importando la conexion php del servidor (BBDD)
    ?>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_usuario = $_POST["usuario"];
            $tmp_contrasena = $_POST["contrasena"];

            if($tmp_usuario != ''){
                if(strlen($tmp_usuario) >= 15) $err_usuario = "El usuario no puede tener más de 15 carácteres";
                else $usuario = $tmp_usuario;
            }else $err_usuario = "El usuario es obligatorio";

            if($tmp_contrasena != ''){
                if(strlen($tmp_contrasena) >= 255) $err_contrasena = "La contraseña no puede tener más de 225 carácteres";
                else $contrasena = $tmp_contrasena;
            }else $err_contrasena = "La contraseña es obligatoria";

            if(isset($usuario) && isset($contrasena)){
                $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);//Coge por defecto la contraseña y la cifra

                $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrada')";

                $_conexion -> query($sql);
            }
            
        }
    ?>
    <div class="container">
        <h1>Formulario de Registro</h1>
        <form class="col-4" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" type="text" name="usuario">
                <?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>"?>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" type="password" name="contrasena">
                <?php if(isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>"?>
            </div>

            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Registrarse">
            </div>
        </form>
        <h3>O, si ya tienes cuenta, Inicia Sesión</h3>
        <a class="btn btn-secondary" href="iniciar_sesion.php">Iniciar Sesión</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Registro</title>
</head>
<body>
    <?php
        function depurar(string $entrada) : string{
            $salida = htmlspecialchars($entrada);
            return $salida;
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_usuario = depurar($_POST["usuario"]);
            $tmp_contrasena = depurar($_POST["contrasena"]);
            
            //Validando el usuario
            if($tmp_usuario != '') $usuario = $tmp_usuario;
            else $err_usuario = "El usuario es obligatorio";

            //Validando la contraseña
            if($tmp_contrasena != '') $contrasena = $tmp_contrasena;
            else $err_contra = "La contraseña es obligatorio";

            if(isset($usuario) && isset($contrasena)){
                
            }
        }
    ?>
    <form action="" method="post">
        <div class="box">
            <div class="form">
                <h2> Registro</h2>
                <div class="inputBox">
                    <span>Usuario</span>
                    <?php if(isset($err_usuario)) echo "<div class='alert alert-danger'>$err_usuario</div>"?>
                    <input type="text" name="usuario">
                </div>
                <div class="inputBox">
                    <span>Contraseña</span>
                    <?php if(isset($err_contra)) echo "<div class='alert alert-danger'>$err_contra</div>"?>
                    <input type="password" name="contrasena">
                </div>
                <div class="links">
                    <a href="iniciar_sesion.php">Iniciar Sesión</a>
                </div>
                <input type="submit" value="Iniciar">
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
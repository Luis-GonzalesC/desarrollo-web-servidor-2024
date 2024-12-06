<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);

        require('../util/conexion.php');//Importando la conexion php del servidor (BBDD)
    ?>
</head>
<body>
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
                $usuario = $tmp_usuario;
            }else $err_usuario = "El usuario es obligatorio";

            if($tmp_contrasena != ''){
                $contrasena = $tmp_contrasena;
            }else $err_contra = "La contraseña es obligatorio";

            if(isset($usuario) && isset($contrasena)){
                $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";//Sacamos los usuarios de la base de datos

                $resultado = $_conexion -> query($sql);//cogemos la consulta
                //var_dump($resultado); cogemos el campo num_rows para ver si hay algo o no
                if($resultado -> num_rows == 0){
                    $err_usuario = "El usuario no existe";
                }else{
                    $info_usuario = $resultado -> fetch_assoc(); //Cogemos la fila en la cual accedemos por la columna de la tabla
                    $acceso_concedido = password_verify($contrasena, $info_usuario["contrasena"]);//metodo que verifica si la contraseña es correcta (true/false)
                    if(!$acceso_concedido) $err_contra = "Contraseña equivocada";
                    else {
                        //echo "<h2>P' dentro</h2>";
                        session_start(); //Se crea una sesión
                        $_SESSION["usuario"] = $usuario; //Usuario logueado es usuario
                        header("location: ../index.php"); //Me redirige al index si se ha logueado
                        exit; //para cortar el fichero y liberar memoria
                    }
                }
            }
            
        }
    ?>
    <div class="container">
        <h1>Iniciar Sesión</h1>
        <form class="col-4" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <?php if(isset($err_usuario)) echo "<div class='alert alert-danger'>$err_usuario</div>"?>
                <input class="form-control" type="text" name="usuario">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <?php if(isset($err_contra)) echo "<div class='alert alert-danger'>$err_contra</div>"?>
                <input class="form-control" type="password" name="contrasena">
            </div>

            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Iniciar Sesión">
            </div>
        </form>
        <h3>O, si aún no tienes cuenta, regístrate</h3>
        <a class="btn btn-secondary" href="registro.php">Registrarse</a>
        <a class="btn btn-info" href="../../tienda">Index de la tienda</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
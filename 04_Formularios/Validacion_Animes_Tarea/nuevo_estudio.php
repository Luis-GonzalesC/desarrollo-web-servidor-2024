<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Estudio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .error{
            color:red;
        }
    </style>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
        /*
            El formulario de los estudios lo crearemos en un fichero llamado “nuevo_estudio.php” y tendrá los siguientes campos:
            nombre_estudio: Es obligatorio y solo podrá contener letras, números y espacios en blanco.
            ciudad: Es obligatorio y solo podrá contener letras y espacios en blanco.
        */
    ?>
</head>
<body>
    <div class="container">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $tmp_nombre_estudio = $_POST["nombre_estudio"];
                $tmp_ciudad = $_POST["ciudad"];

                if($tmp_nombre_estudio != ''){
                    $patron = "/^[a-zA-Z0-9 ]+$/";
                    if(preg_match($patron, $tmp_nombre_estudio)){
                        $nombre_estudio = $tmp_nombre_estudio;
                    }else $err_nombre_estudio = "EL nombre del estudio no cumple con el patron, solo letras, números y espacios en blanco";
                }else $err_nombre_estudio = "EL nombre del estudio es obligatorio";

                if($tmp_ciudad != ''){
                    $patron = "/^[a-zA-Z ]+$/";
                    if(preg_match($patron, $tmp_ciudad)){
                        $ciudad = $tmp_ciudad;
                    }else $err_ciudad = "La ciudad no cumple con el patron correspondiente, solo puede contener letras y espacios";
                }else $err_ciudad = "La ciudad es obligatoria";
            }
        ?>

        <form action="" method="post" class="col-4">
            <div class="mb-3">
                <input class="form-control" type="text" name="nombre_estudio" placeholder="Nombre de estudio">
                <?php if(isset($err_nombre_estudio)) echo "<span class='error'> $err_nombre_estudio </span>"?>
            </div>
            
            <div class="mb-3">
                <input class="form-control" type="text" name="ciudad" placeholder="Nombre de la Ciudad">
                <?php if(isset($err_ciudad)) echo "<span class='error'> $err_ciudad </span>"?>
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value = "Enviar">
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
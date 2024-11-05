<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Videojuegos</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <style>
        .error{
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_titulo = $_POST["titulo"];
            $tmp_descripcion = $_POST["descripcion"];
            $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];

            if($tmp_titulo != ''){
                if(strlen($tmp_titulo) > 60){
                    $err_titulo = "El título debe tener entre 1 y 60 caracteres";
                }else{
                    $patron = "/^[a-zA-Z0-9 ]+$/";
                    if(!preg_match($patron, $tmp_titulo)) $err_titulo = "El título no cumple el patron, solo puede tener letras, números y espacios en blanco";
                    else{
                        $titulo = $tmp_titulo;
                    }
                }
                
            }else $err_titulo = "El título es obligatorio";

            //Verifico si en los radio button tiene algo, si es así lo guardo, caso contrario lo inicializo a vacio
            if(isset($_POST["consola"])){//verifica para los radio button si está seleccionado o no (ESTO OBLIGATORIO SI NO PETA FUERTE)
                $tmp_consola = $_POST["consola"];
                $consola_valida = ["pc", "nintendo_switch", "ps4", "ps5", "xbox_x", "xbox_s"];
                if(!in_array($tmp_consola, $consola_valida)){
                    $err_consola = "Consola seleccionada no válida";
                }else{
                    $consola = $tmp_consola;
                }
            }
            else $err_consola = "Este campo es obligatorio, no puede estar vacio";


            if ($tmp_descripcion != '') {
                if(strlen($tmp_descripcion) < 60 ){
                    $patron = "/^[a-zA-Z0-9\ .,]+$/";//sin saltos de linea
                    if(!preg_match($patron, $tmp_descripcion)) $err_descripcion = "La descripción no cumple el patron";
                    else $tmp_descripcion = $tmp_descripcion;
                }
                else{
                    $err_descripcion = "El título debe contener entre 1 y 60 caracteres";
                }
                
            }

            if($tmp_fecha_lanzamiento != ''){
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron, $tmp_fecha_lanzamiento)){
                    $err_fecha_lanzamiento = "El formato de la fecha es incorrecta";
                }else{
                    $fecha_actual = date("Y-m-d");
                    list($anno_actual, $mes_actual, $dia_actual) = explode('-', $fecha_actual); //Esto es como un split para separar
                    list($anio, $_mes, $_dia) = explode('-', $tmp_fecha_lanzamiento);
                    if($anio < 1947){
                        $err_fecha_lanzamiento = "El año de lanzamiento es menor que 1947";
                    }
                    else if ($anio > ($anno_actual + 10)) {
                        $err_fecha_lanzamiento = "El año de lanzamiento es mayor que " . ($anno_actual + 10);
                    }else if ($anio >= 1947 && $anio < ($anno_actual + 10)){
                        $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                    }else if ($anio == ($anno_actual + 10)){
                        if($_mes < $mes_actual){
                            $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                        }else if($_mes > $mes_actual){
                            $err_fecha_lanzamiento = "El año de lanzamiento es mayor que el límite";
                        }else{
                            if($_dia <= $dia_actual){
                                $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                            }else{
                                $err_fecha_lanzamiento = "Te pasaste del día límite";
                            }
                        }
                    }
                }
            }else{
                $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria";
            }

        }
    ?>

    <!--container here-->
        <h1>Formulario de videojuegos</h1>
        <form class="col-4" action="" method="post">
            <div class= "mb-3">
                <label class="form-label">Titulo</label>
                <input class="form-control" type="text" name = "titulo">
                <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>"?>
            </div>
            
            <div class="mb-3">
                <label class = "form-check-label">Consola</label>
                <div class="form-check">
                    <input class = "form-check-input" type="radio" name="consola" value = "ps4">
                    <label class = "form-check-label">Playtation 4</label>
                </div>
                <div class="form-check">
                    <input class = "form-check-input" type="radio" name="consola" value = "ps5">
                    <label class = "form-check-label">Playtation 5</label>
                </div>
                <div class="form-check">
                    <input class = "form-check-input" type="radio" name="consola" value = "switch">
                    <label class = "form-check-label">Nintendo Switch</label>
                </div>
                <div class="form-check">
                    <input class = "form-check-input" type="radio" name="consola" value = "xbox_x">
                    <label class = "form-check-label">Xbox Series X</label>
                </div>
                <div class="form-check">
                    <input class = "form-check-input" type="radio" name="consola" value = "xbox_s">
                    <label class = "form-check-label">Xbox Series S</label>
                </div>
                <div class="form-check">
                    <input class = "form-check-input" type="radio" name="consola" value = "pc">
                    <label class = "form-check-label">Pc</label>
                </div>
                <?php if(isset($err_consola)) echo "<span class='error'>$err_consola</span>"?>
            </div>

            <div class= "mb-3">
                <label class="form-label">Descripcion</label>
                <textarea class="form-control" name = "descripcion"></textarea>
                <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"?>
            </div>

            <div class= "mb-3">
                <label class="form-label">Fecha de lanzamiento</label>
                <input class = "form-control" type="date" name="fecha_lanzamiento">
                <?php if(isset($err_fecha_lanzamiento)) echo "<span class='error'>$err_fecha_lanzamiento</span>"?>
            </div>

            <div class = "mb-3">
                <input type="submit" class="btn btn-primary" value = "Enviar">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
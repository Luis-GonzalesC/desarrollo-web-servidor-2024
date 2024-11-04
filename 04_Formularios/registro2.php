<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro 2</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
        /**
         * Titulo: entre 1 y 60 caracteres letras o números
         * Consola (radio button): PC, Nintendo Switch, PS4, PS5, XBOX Series, XBOX Series S
         * Descripcion(text area): opcional, y máximo 255 caracteres, solo admite letras o números, y comas y puntos
         * Fecha de lanzamiento: entre el 1 de enero de 1947 y dentro de 10 años (dinámico)
        */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_titulo = $_POST["titulo"];
            $tmp_descripcion = $_POST["descripcion"];
            $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];

            if($tmp_titulo != ''){
                $patron = "/^[a-zA-Z0-9]{1,60}$/";
                if(!preg_match($patron, $tmp_titulo)) $err_titulo = "El título no cumple el patron";
                else{
                    $titulo = $tmp_titulo;
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
                $patron = "/^[a-zA-Z0-9\.,]{0,255}$/";//sin saltos de linea
                if(!preg_match($patron, $tmp_descripcion)) $err_descripcion = "La descripción no cumple el patron";
                else $tmp_descripcion = $tmp_descripcion;
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
                    }else if ($anio >= 1947 || $anio <= ($anno_actual + 10)){
                        $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                    }else if ($anio == ($anno_actual + 10)){
                        if($mes < $mes_actual){
                            $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                        }else if($mes > $mes_actual){
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
    <form action="" method="post">
        <input type="text" name="titulo" placeholder="Ingrese un título">
        <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>"?>
        <br>
        <input type="radio" id="pc" name="consola" value="pc">
        <label for="pc">PC</label>
        <br>
        <input type="radio" id="switch" name="consola" value="nintendo_switch">
        <label for="switch">Nintendo Switch</label>
        <br>
        <input type="radio" id="ps4" name="consola" value="ps4">
        <label for="ps4">PS4</label>
        <br>
        <input type="radio" id="ps5" name="consola" value="ps5">
        <label for="ps5">PS5</label>
        <br>
        <input type="radio" id="xbox_x" name="consola" value="xbox_x">
        <label for="xbox_x">XBOX Series X</label>
        <br>
        <input type="radio" id="xbox_s" name="consola" value="xbox_s">
        <label for="xbox_s">XBOX Series S</label>
        <?php if(isset($err_consola)) echo "<span class='error'>$err_consola</span>"?>
        <br>
        <textarea name="descripcion" id="descripcion" placeholder="Descripcion" rows="4" cols="50"></textarea>
        <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"?>
        <br>
        <input type="date" name="fecha_lanzamiento" placeholder="Fecha de nacimiento">
        <?php if(isset($err_fecha_lanzamiento)) echo "<span class='error'>$err_fecha_lanzamiento</span>"?>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
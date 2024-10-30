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
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //$tmp_consola = $_POST["consola"];
            $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];

            /*$consola_valida = ["pc", "nintendo_switch", "ps4", "ps5", "xbox_x", "xbox_s"];
            if(!in_array($tmp_consola, $consola_valida)){
                $err_consola = "Elegir una consola es obligatorio";
            }else{
                $consola = $tmp_consola;
            }*/
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
        <br>
        <input type="date" name="fecha_lanzamiento" placeholder="Fecha de nacimiento">
        <?php if(isset($err_fecha_lanzamiento)) echo "<span class='error'>$err_fecha_lanzamiento</span>"?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
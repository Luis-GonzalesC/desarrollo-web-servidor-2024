<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <style>
        .error{
            color: red;
        }
    </style>
    <title>Futbol</title>
</head>
<body>
    <?php
        /*FORMULARIO EQUIPOS DE FUTBOL DE ESPAÑA
        - Equipo: entre 3 y 20 caracteres. Puede contener letras, espacios en blaco y puntos
        - Iniciales: 3 caracteres exactos. (ej. "MFC")
        - Liga: Opciones con select, Liga EA Sports, Liga Hypermotion, Primera RFEF (primera federacion/ divison)
        - Números de jugadores: entre 26 y 32
        - Fecha de fundación: entre hoy (dinámico) y 18 de diciembre de 1889 (inclusive)*/ 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_equipo = $_POST["equipo"];
            $tmp_iniciales = $_POST["iniciales"];
            if(isset($_POST["liga"])) $tmp_liga = $_POST["liga"];
            else $tmp_liga = "";
            $tmp_jugadores = $_POST["numero_jugadores"];
            $tmp_fecha_fundacion = $_POST["fecha_fundacion"];

            if($tmp_equipo != ''){
                if(strlen($tmp_equipo) < 3 || strlen($tmp_equipo) > 20){
                    $err_equipo = "El equipo debe contener entre 3 y 20 caracteres";
                }else{
                    $patron = "/^[a-zA-Z .]+$/";
                    if(!preg_match($patron, $tmp_equipo)){
                        $err_equipo = "El equipo no cumple el patrón adecuado, SOLO LETRAS, ESPACIOS EN BLANCO O PUNTOS";
                    }else{
                        $equipo = $tmp_equipo;
                    }
                }
            }else $err_equipo = "El equipo no puede estar vacío";

            if($tmp_iniciales != ''){
                if(strlen($tmp_iniciales) != 3){
                    $err_iniciales = "Solo puede contener 3 caracteres";
                }else{
                    $iniciales = $tmp_iniciales;
                }
            }else $err_iniciales = "Las iniciales no pueden estar vacías";
            

            if($tmp_liga != ''){
                $array_ligas = ["Liga EA Sports", "Liga HyperMotion", "Primera RFEF"];
                if(!in_array($tmp_liga, $array_ligas)) $err_ligas = "La liga seleccionada no es correcta";
                else $liga = $tmp_liga;
            }else $err_ligas = "La liga no puede estar vácia";

            if($tmp_jugadores != ''){
                if((int)$tmp_jugadores < 26 || (int)$tmp_jugadores > 32){
                    $err_jugadores = "Solo jugadores entre 26 y 32 personas";
                }else{
                    $jugadores = $tmp_jugadores;
                }
            }else $err_jugadores = "Los jugadores no pueden estar vacios";

            if($tmp_fecha_fundacion != ''){
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron, $tmp_fecha_fundacion)) $err_fecha_fundacion = "La fecha de fundación no cumple el patrón correspondiente";
                else{
                    $fecha_actual = date("Y-m-d");
                    list($anno_actual, $mes_actual, $dia_actual) = explode("-", $fecha_actual);
                    list($anno, $_mes, $_dia) = explode("-", $tmp_fecha_fundacion);
                    //Primero validación del año 1889
                    if($anno < 1889){
                        $err_fecha_fundacion = "La fecha de fundación no puede ser menor a 1889";
                    }else if($anno > 1889){
                        $fecha_fundacion = $tmp_fecha_fundacion;
                    }else{
                        //comparando mes de diciembre => 12
                        if($_mes < 12) $err_fecha_fundacion = "El año de fecha de fundación antes de diciembre";
                        else if ($_mes == 12){
                            //comparando el día => 18
                            if($_dia >= 18){
                                $fecha_fundacion = $tmp_fecha_fundacion; //estás dentro
                            }else{
                                $err_fecha_fundacion = "La fecha de fundación no puede ser menor al día 18 de diciembre";
                            }
                        }
                    }

                    //Validación del año actual para que no se cree un equipo de una fecha pasada a la actual
                    if($anno < $anno_actual){
                        $fecha_fundacion = $tmp_fecha_fundacion;
                    }else if ($anno == $anno_actual){
                        //compruebo el mes
                        if($_mes < $mes_actual){
                            $fecha_fundacion = $tmp_fecha_fundacion;
                        }else if ($_mes == $mes_actual){
                            //compruebo el día
                            if($_dia <= $dia_actual)$fecha_fundacion = $tmp_fecha_fundacion;
                            else $err_fecha_fundacion = "El día de creación no puede superar el día actual";
                        }else $err_fecha_fundacion = "El mes de creación no puede superar al mes actual";
                    }else $err_fecha_fundacion = "El año de creación no puede superar al año actual";
                }
            }else $err_fecha_fundacion = "La fecha de fundación es obligatoria";
        }
    ?>
    
    <div class="container">
    <!--container here-->
        <h1>Formulario de FURBOOOOOOOOOOO</h1>
        <form class="col-4" action="" method="post">
            <div class= "mb-3">
                <label class="form-label">Equipo</label>
                <input class="form-control" type="text" name = "equipo">
                <?php if(isset($err_equipo)) echo "<span class='error'>$err_equipo</span>"?>
            </div>

            <div class= "mb-3">
                <label class="form-label">Iniciales</label>
                <input class="form-control" type="text" name = "iniciales">
                <?php if(isset($err_iniciales)) echo "<span class='error'>$err_iniciales</span>"?>
            </div>

            <div class = "mb-3">
                <label class = "form-label">Ligas</label>
                <div class = "mb-3">
                    <select name = "liga" class = "form-select">
                        <option disable selected hidden>---ELIGE TIPO DE LIGA---</option>
                        <option value = "Liga EA Sports">Liga EA Sports</option>
                        <option value = "Liga HyperMotion">Liga HyperMotion</option>
                        <option value = "Primera RFEF">Primera RFEF</option>
                    </select>
                </div>
                <?php if(isset($err_ligas)) echo "<span class = 'error'>$err_ligas</span>";?><br>
            </div>

            <div class = "mb-3">
                <label class="form-label">Numero de Jugadores</label>
                <input type="text" class="form-control" name = "numero_jugadores">
                <?php if(isset($err_jugadores)) echo "<span class = 'error'>$err_jugadores</span>";?><br>
            </div>

            <div class= "mb-3">
                <label class="form-label">Fecha de fundación</label>
                <input class = "form-control" type="date" name="fecha_fundacion">
                <?php if(isset($err_fecha_fundacion)) echo "<span class='error'>$err_fecha_fundacion</span>"?>
            </div>

            <div class = "mb-3">
                <input type="submit" class="btn btn-primary" value = "Enviar">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
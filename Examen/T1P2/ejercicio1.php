<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ejercicio 1</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    <?php
        //Para el saneamiento de los datos
        function depurar(string $entrada) : string{
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            $salida = preg_replace('/\$+/', ' ', $salida);
            return $salida;
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_nombre = depurar($_POST["nombre"]);
            $tmp_peso = depurar($_POST["peso"]);
            
            if(isset($_POST["tipo"])) $tmp_tipo = depurar($_POST["tipo"]);
            else $tmp_tipo = "";
            $tmp_fecha_captura = depurar($_POST["fecha_captura"]);
            $tmp_descripcion = depurar($_POST["descripcion"]);

            //Validación para el nombre 1.1
            if($tmp_nombre != ''){
                if(strlen($tmp_nombre) >= 3 && strlen($tmp_nombre) <= 30){
                    $patron = "/^[a-zA-ZáéíóúñÑ]+$/";
                    if(preg_match($patron, $tmp_nombre)){
                        $nombre = $tmp_nombre;
                    }else $err_nombre = "El nombre no cumple con el patrón correspondiente, solo letras, con tildes o sin tildes y la letra ñ";
                }else $err_nombre = "El nombre debe tener entre 3 y 30 caracteres";
               
            }else $err_nombre = "El nombre es obligatorio";

            //Validación para el peso 1.2
            if($tmp_peso != ''){
                if(filter_var($tmp_peso, FILTER_VALIDATE_FLOAT) !== FALSE){
                    if($tmp_peso >= 0.1 && $tmp_peso <= 999.99){
                        $peso = $tmp_peso;
                    }else $err_peso = "El peso tiene que ser un numero entre 0,1 y 999,99";
                }else $err_peso = "El peso tiene que ser un numero";
            }else $err_peso = "El peso es obligatorio";

            //Validación para el género (OPCIONAL) 1.3
            if(isset($_POST["genero"])) $genero = depurar($_POST["genero"]);
            else $genero = "Desconocido";

            //Validación para el tipo de pokemon
            if($tmp_tipo != ''){
                $array_tipos = ["agua", "fuego", "volador", "planta", "electrico"];
                if(in_array($tmp_tipo, $array_tipos)){
                    $tipo = $tmp_tipo;
                }else $err_tipo = "El tipo seleccionado no es el correcto";
            }else $err_tipo = "Seleccionar un tipo es obligatorio";

            //Validación para la fecha de captura
            if($tmp_fecha_captura != ''){
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(preg_match($patron, $tmp_fecha_captura)) {
                    $fecha_actual = date("Y-m-d");
                    list($anno_actual, $mes_actual, $dia_actual) = explode('-', $fecha_actual);
                    list($tmp_anno, $tmp_mes, $tmp_dia) = explode('-', $tmp_fecha_captura);
                    //Para saber la fecha de hace 30 años debo restar el año actual - 30
                    if($tmp_anno > ($anno_actual - 30)){
                        $fecha_catura = $tmp_fecha_captura;
                    }else if ($tmp_anno == ($anno_actual - 30)){
                    }else $err_fecha_captura = "La fecha no puede ser menor que ". ($anno_actual - 30);
                    //Se comprueba con la fecha del día de hoy
                    if($tmp_anno < $anno_actual){
                        $fecha_catura = $tmp_fecha_captura;
                    }else if ($tmp_anno == $anno_actual){
                        if($tmp_mes < $mes_actual){
                            $fecha_catura = $tmp_fecha_captura;
                        }else if ($tmp_mes == $mes_actual){
                            if($tmp_dia < $dia_actual){
                                $fecha_catura = $tmp_fecha_captura;
                            }else if ($tmp_dia == $dia_actual){
                                $fecha_catura = $tmp_fecha_captura;
                            }else $err_fecha_captura = "Te has pasado del día límite";
                        }else $err_fecha_captura = "Te has pasado del mes límite";
                    }else $err_fecha_captura = "Te has pasado del año límite";
                }
                else $err_fecha_captura = "La fecha de captura no cumple el patrón correspondiente";
            }else $err_fecha_captura = "La fecha de captura es obligatorio";

            //Validación para la descripción
            if ($tmp_descripcion != '') {
                if(strlen($tmp_descripcion) <= 200 ){
                    $patron = "/^[a-zA-ZáéíóúÑñ ]+$/";
                    if(!preg_match($patron, $tmp_descripcion)) $err_descripcion = "La descripción no cumple el patron";
                    else $tmp_descripcion = $tmp_descripcion;
                }
                else{
                    $err_descripcion = "La descripción debe contener hasta 200 letras";
                }
            }
        }
    ?>
    <div class="container">
        <h1>Formulario sobre Pokemon</h1>
        <form class="col-4" action="" method="post">
            <!--NOMBRE DEL POKEMON-->
            <div class="mb-3">
                <label class="form-label">Nombre del pokemon</label>
                <input class="form-control" type="text" name="nombre">
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"?>
            </div>
            <!--PESO DEL POKEMON-->
            <div class="mb-3">
                <label class="form-label">Peso del pokemon</label>
                <input class="form-control" type="text" name="peso">
                <?php if(isset($err_peso)) echo "<span class='error'>$err_peso</span>"?>
            </div>
            <!--GENERO DEL POKEMON-->
            <div class="mb-3">
                <label class="form-label">Género del pokemon</label>
                <div class="form-check">
                    <input class = "form-check-input" type="radio" name="genero" value = "hembra">
                    <label class = "form-check-label">Hembra</label>
                </div>
                <div class="form-check">
                    <input class = "form-check-input" type="radio" name="genero" value = "macho">
                    <label class = "form-check-label">Macho</label>
                </div>
            </div>
            <!--TIPO DEL POKEMON-->
            <div class = "mb-3">
                <label class = "form-label">Tipo del pokemon</label>
                <div class = "mb-3">
                    <select name = "tipo" class = "form-select">
                        <option disable selected hidden>---ELIGE EL TIPO DE POKEMON---</option>
                        <option value="agua">Agua</option>
                        <option value="fuego">Fuego</option>
                        <option value="volador">Volador</option>
                        <option value="planta">Planta</option>
                        <option value="electrico">Eléctrico</option>
                    </select>
                </div>
                <?php if(isset($err_tipo)) echo "<span class='error'>$err_tipo</span>"?>
            </div>
            <!--FECHA DE CAPTURA-->
            <div class= "mb-3">
                <label class="form-label">Fecha de Captura</label>
                <input class = "form-control" type="date" name="fecha_captura">
                <?php if(isset($err_fecha_captura)) echo "<span class='error'>$err_fecha_captura</span>"?>
            </div>
            <!--DESCRIPCIÓN-->
            <div class= "mb-3">
                <label class="form-label">Descripcion</label>
                <textarea class="form-control" name = "descripcion"></textarea>
                <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"?>
            </div>
            <!--BOTON PARA ENVIAR EL FOMULARIO-->
            <div class = "mb-3">
                <input type="submit" class="btn btn-primary" value = "Enviar">
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Anime</title>
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
            Vamos a crear dos formularios: uno para animes y otro para los estudios de animación de la base de datos proporcionada en clase.
            El formulario de los animes lo crearemos en un fichero llamado “nuevo_anime.php” y tendrá los siguientes campos:
            titulo: Es obligatorio y tendrá como máximo 80 caracteres. Admite cualquier tipo de carácter.
            nombre_estudio: Es obligatorio y se elegirá mediante un campo de tipo select. Para crear este select primero haremos un array unidimensional con nombres de estudios de anime (al menos 5, puedes coger los nombres de la base de datos). Los option del select se crearán de manera dinámica en un bucle recorriendo dicho array y creando un option por cada valor del mismo. 
            anno_estreno: Es opcional y se elegirá mediante un campo de texto. Sólo aceptará valores numéricos entre 1960 y dentro de 5 años (inclusive). 
            num_temporadas: Es obligatorio y será un valor numérico entre 1 y 99.
        */
    ?>
</head>
<body>
    <?php
        /*$array = [
            //Clave                Valor
            "toei_animation" => "Toei Animation",
            "diomedea" => "Diomedéa",
            "kyoto_animation" => "Kyoto Animation",
            "mappa" => "Mappa",
            "a1_pictures" => "A-1 Pictures",
            "olm" => "OLM"
        ];*/
        $array = ["Toei Animation", "Diomedéa", "Kyoto Animation", "Mappa", "A-1 Pictures", "OLM"];

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_titulo = $_POST["titulo"];
            if(isset($_POST["nombre_estudio"])) $tmp_nombre_estudio = $_POST["nombre_estudio"];
            else $tmp_nombre_estudio = "";
            $tmp_anno_estreno = $_POST["anno_estreno"];
            $tmp_num_temporadas = $_POST["num_temporadas"];

            //Validacion título
            if($tmp_titulo != ''){
                if(strlen($tmp_titulo) > 80){
                    $err_titulo = "El titulo debe contener como máximo 80 caracteres";
                }else $titulo = $tmp_titulo;
            }else $err_titulo= "El título es obligatorio";

            //Validación nombre de estudio
            if($tmp_nombre_estudio != ''){
                if(in_array($tmp_nombre_estudio, $array)) $nombre_estudio = $tmp_nombre_estudio;
                else $err_nombre_estudio = "El campo seleccionado no es válido, seleccione uno correcto";
            }
            else $err_nombre_estudio = "Seleccionar un campo del Nombre de estudio es obligatorio";

            //Validación del año de estreno
            if($tmp_anno_estreno != '') {
                $patron = "/^[0-9]{4}$/";
                if(preg_match($patron, $tmp_anno_estreno)) {
                    $anno_actual = date("Y");
                    if ($tmp_anno_estreno >= 1960) {
                        $anno_estreno = $tmp_anno_estreno;
                    } else $err_anno_estreno = "El año de estreno no puede ser anterior a 1960";
                    if ($tmp_anno_estreno <= ($anno_actual + 5)) {
                        $anno_estreno = $tmp_anno_estreno;
                    } else $err_anno_estreno = "El año de estreno no puede ser mayor a " . ($anno_actual + 5);
                } else $err_anno_estreno = "El año de estreno solo puede contener 4 números.";
            }

            if($tmp_num_temporadas != ''){
                $patron = "/^[0-9]{1,2}$/";
                if (preg_match($patron, $tmp_num_temporadas)) {
                    $num_temporadas = $tmp_num_temporadas;
                } else $err_num_temporadas = "El número de temporadas solo puede contener caracteres numéricos y entre 2 dígitos";
            }else $err_num_temporadas = "El número de temporadas es obligatorio";
            
        }
    ?>

    <div class="container">
        <form class="col-4" action = "" method = "post">
            <div class = "mb-3">
                <input class="form-control" type="text" name="titulo" placeholder="Ingrese un título">
                <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>"?>
            </div>
            
            <div class="mb-3">
                <select name = "nombre_estudio" class = "form-select">
                    <option disable selected hidden>---ELIGE UN NOMBRE DE ESTUDIO---</option>
                    <?php for ($i=0; $i < count($array); $i++) { ?>
                        <option value="<?php echo $array[$i]?>"><?php echo $array[$i]?></option>
                    <?php } ?>
                </select>
                <?php if(isset($err_nombre_estudio)) echo "<span class='error'>$err_nombre_estudio</span>"?>
            </div>
            
            <div class="mb-3">
                <input class="form-control" type="text" name="anno_estreno" placeholder="Año de estreno">
                <?php if(isset($err_anno_estreno)) echo "<span class='error'>$err_anno_estreno</span>" ?>
            </div>

            <div class="mb-3">
                <input class="form-control" type="text" name="num_temporadas" placeholder="Número de temporadas">
                <?php if(isset($err_num_temporadas)) echo "<span class='error'>$err_num_temporadas</span>" ?>
            </div>
            
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value = "Enviar">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
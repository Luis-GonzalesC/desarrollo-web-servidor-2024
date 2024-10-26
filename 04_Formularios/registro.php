<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio validación de Formularios</title>
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
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_dni = $_POST["dni"];
            $tmp_nombre = $_POST["nombre"];
            $tmp_apellido1 = $_POST["apellido1"];
            $tmp_apellido2 = $_POST["apellido2"];
            $tmp_fecha_nacimiento = $_POST["fecha_nacimiento"];
            $tmp_correo = $_POST["correo"];

            //Verificando DNI
            if($tmp_dni != ''){
                $patron = "/^[0-9]{8}[A-Z]$/";
                if(!preg_match($patron, $tmp_dni)) $err_dni = "El DNI deberá contener 8 caracteres y una letra";
                else{
                    $verificar = ["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
                    $comprobar_letra = substr($tmp_dni, 0, 8);
                    $ultima_letra = substr($tmp_dni, 8, 9);
                    $calculo_digito = (int)$comprobar_letra % 23;

                    if($verificar[$calculo_digito] == $ultima_letra) $dni = $tmp_dni;
                    else $err_dni = "La última letra no es correcta";
                }
            }else $err_dni = "El DNI es OBLIGATORIO";

            //Verificando nombre
            if($tmp_nombre != ''){
                $patron = "/^[A-Za-z ]{2,25}$/";
                if(!preg_match($patron, $tmp_nombre)) $err_nombre = "El nombre no debe contener carácteres especiales";
                else{
                    $tmp_nombre = ucwords(strtolower($tmp_nombre));
                    $nombre = $tmp_nombre;
                }
            }else $err_nombre = "El nombre es OBLIGATORIO";

            //Verificando apellido 1
            if($tmp_apellido1 != ''){
                $patron = "/^[A-Za-z ]{2,25}$/";
                if(!preg_match($patron, $tmp_apellido1)) $err_apellido1 = "El primer apellido no debe contener carácteres especiales";
                else{
                    $tmp_apellido1 = ucfirst(strtolower($tmp_apellido1));
                    $apellido1 = $tmp_apellido1;
                }
            }else $err_apellido1 = "El primer apellido es OBLIGATORIO";

            //Verificando apelido 2
            if($tmp_apellido2 != ''){
                $patron = "/^[A-Za-z ]{2,25}$/";
                if(!preg_match($patron, $tmp_apellido2)) $err_apellido2 = "El segundo apellido no debe contener carácteres especiales";
                else{
                    $tmp_apellido2 = ucfirst(strtolower($tmp_apellido2));
                    $apellido2 = $tmp_apellido2;
                }
            }else $err_apellido2 = "El segundo apellido es OBLIGATORIO";

            //Verificando la fecha de nacimiento
            if($tmp_fecha_nacimiento != ''){
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron, $tmp_fecha_nacimiento)) $err_fecha_nacimiento = "El formato de la fecha es incorrecta";
                else{
                    $fecha_actual = date("Y-m-d");
                    list($anno_actual, $mes_actual, $dia_actual) = explode("-", $fecha_actual);
                    list($anio, $mes, $_dia) = explode('-', $tmp_fecha_nacimiento);
                    //si es es menor que 18 y no podrá tener más de 120
                    $edad = $anno_actual - $anio;
                    if($edad >= 18 && $edad <= 120) $fecha_nacimiento = $tmp_fecha_nacimiento;
                    else if($edad < 18) $err_fecha_nacimiento = "Edad no válida eres menor de edad";
                    else if($edad > 121) $err_fecha_nacimiento = "Edad no válida no puedes tener más de 120 años";
                    else{
                        if($mes < $mes_actual) $err_fecha_nacimiento = "EDAD NO VALIDA";
                        else if ($mes > $mes_actual) $fecha_nacimiento = $tmp_fecha_nacimiento;
                        else{
                            if($_dia <= $dia_actual) $err_fecha_nacimiento = "EDAD NO VALIDA";
                            else $fecha_nacimiento = $tmp_fecha_nacimiento;
                        }
                    }
                }
            }else $err_fecha_nacimiento = "La fecha de nacimiento es OBLIGATORIA";

            //Verificando el correo
            if($tmp_correo != ''){
                $patron = "/^[a-zA-Z0-9_]+\@[a-z]+\.[a-z]{1,3}$/";
                if(!preg_match($patron, $tmp_correo)) $err_correo = "El formato del correo es incorrecto";
                else{
                    $palabrotas = ["tonto", "bobo", "sucio", "feo"];
                    $encontrada = false;
                    for ($i=0; $i < count($palabrotas); $i++) { 
                        if(str_contains($tmp_correo, $palabrotas[$i])){
                            $i = count($palabrotas);
                            $encontrada = true;
                        }
                    }
                    if(!$encontrada) $correo = $tmp_correo;
                    else $err_correo = "No pueden contener palabrotas";
                    
                }
            }else $err_correo = "El correo es OBLIGATORIO";
        }
    ?>

    <form action="" method="post">
        <input type="text" name="dni" placeholder="DNI">
        <?php if(isset($err_dni)) echo "<span class='error'>$err_dni</span>"?>
        <br><br>
        <input type="text" name="nombre" placeholder="Nombre">
        <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"?>
        <br><br>
        <input type="text" name="apellido1" placeholder="Primer Apellido">
        <?php if(isset($err_apellido1)) echo "<span class='error'>$err_apellido1</span>"?>
        <br><br>
        <input type="text" name="apellido2" placeholder="Segundo Apellido">
        <?php if(isset($err_apellido2)) echo "<span class='error'>$err_apellido2</span>"?>
        <br><br>
        <input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
        <?php if(isset($err_fecha_nacimiento)) echo "<span class='error'>$err_fecha_nacimiento</span>"?>
        <br><br>
        <input type="text" name="correo" placeholder="Correo electrónico">
        <?php if(isset($err_correo)) echo "<span class='error'>$err_correo</span>"?>
        <br><br>
        <input type="submit" name="Enviar">
    </form>
</body>
</html>
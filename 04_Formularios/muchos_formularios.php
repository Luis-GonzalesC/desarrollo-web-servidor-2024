<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        require('../05_Funciones/iva.php');
        require('../05_Funciones/irpf.php');
        require('../05_Funciones/primos.php');
        require('../05_Funciones/temperatura.php');
    ?>
</head>
<body>
    <?php
        /**
         * Crear en está página formularios y funciones para los ejercicios:
         * 
         *  - iva
         *  - irpf
         *  - primosRango
         *  - temperaturas
         */
    ?>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["accion"] == "formulario_iva"){
                $tpm_precio = $_POST["precio"];
                if(isset($_POST["iva"])) $tmp_iva = $_POST["iva"];
                else $tmp_iva = "";

                if($tpm_precio == ""){
                    $err_precio = "EL precio es obligatorio";
                }else{
                    /*if(filter_var($tpm_precio, FILTER_VALIDATE_FLOAT) === FALSE){
                        $err_precio = "El precio debe ser un número";
                    }else{
                        if($tpm_precio < 0){
                            $err_precio = "EL precio no puede ser un número negativo";
                        }else{
                            $precio = $tpm_precio;
                        }
                    }*/
                    $precio = $tpm_precio;
                }
            }

            if($tmp_iva == ""){
                $err_iva = "EL tipo de iva es obligatorio";
            }else{
                $iva_validos = ["general", "reducido", "superreducido"];
                if(!in_array($tmp_iva, $iva_validos)){ //funcion que funciona como el include devuelve true o false
                    $err_iva = "El tipo de IVA no es válido";
                }else{
                    $iva = $tmp_iva;
                }
            }
        }
    ?>

    <style>
        .error{
            color:red;
        }
    </style>

    <h1>FORMULARIO IVA</h1>
    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio">
        <?php if(isset($err_precio)) echo "<span class='error'>$err_precio<span>"?>
        <br><br>
        <label for="iva">IVA</label>
        <select name="iva" id="iva">
            <option disable selected hidden>---ELIGE TIPO IVA---</option>
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">SuperReducido</option>
        </select>
        <?php if(isset($err_iva)) echo "<span class='error'>$err_iva<span>"?>
        <br><br>
        <input type="hidden" name="accion" value="formulario_iva">
        <input type="submit" value="Calcular PVP">
    </form>
    
    <?php
        if(isset($iva) && isset($precio)){
            $pvp = calcularIva($precio, $iva);
            echo $pvp;
        }
    ?>
    

    <h1>FORMULARIO IRPF</h1>
    <form action="" method="post">
        <label for="sueldo">Ingrese el Sueldo</label>
        <input type="text" name="sueldo" id="sueldo"><br>
        <input type="hidden" name="accion" value="formulario_irpf">
        <input type="submit" value = "Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["accion"] == "formulario_irpf"){
                $tmp_sueldo = $_POST["sueldo"];
                if($tmp_sueldo != ''){
                    if(filter_var($tmp_sueldo, FILTER_VALIDATE_FLOAT) != FALSE){
                        if($tmp_sueldo > 0){
                            $sueldo = $tmp_sueldo;
                        }else{
                            echo "<p>Que el sueldo sea mayor a 0</p>";
                        }
                    }else{
                        echo "<p>Ingrese un número POSITIVO</p>";
                    }
                }else{
                    echo "<p>El sueldo es obligatorio</p>";
                }
            }

            if(isset($sueldo)){
                $resultado = calcularirpf($sueldo);
                echo "<p>EL resultado es $resultado</p>";
            }
        }
    ?>

    <h1>FORMULARIO RANGO PRIMOS</h1>
    <form action="" method="post">
        <label for="num1">Numero 1</label>
        <input type="text" name="numero1" id="num1"><br>
        <label for="num2">Numero 2</label>
        <input type="text" name="numero2" id="num2"><br>
        <input type="hidden" name="accion" value="formulario_primo">
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["accion"] == "formulario_primo"){
                $num1 = $_POST["numero1"];
                $num2 = $_POST["numero2"];

                calcularPrimo($num1, $num2);
            }
        }
    ?>

    <h1>FORMULARIO TEMPERATURAS</h1>
    <form action="" method="post">
        <label for="temperatura">Temperatura</label>
        <input type="number" name="temperatura" id="temperatura"><br><br>
        <label for="tipo_temp">Tipo de Temperatura</label>
        <select name="tipo_temp" id="tipo_temp">
            <option value="fahrenheit">FAHRENHEIT</option>
            <option value="celsius">CELSIUS</option>
            <option value="kelvin">KELVIN</option>
        </select><br><br>
        <label for="tipo_temp_calcular">Tipo de Temperatura a Calcular</label>
        <select name="tipo_calcular" id="tipo_temp_calcular">
            <option value="fahrenheit">FAHRENHEIT</option>
            <option value="celsius">CELSIUS</option>
            <option value="kelvin">KELVIN</option>
        </select><br><br>
        <input type="hidden" name="accion" value="formulario_temperatura">
        <input type="submit" value="Calcular Temperatura">

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if($_POST["accion"] == "formulario_temperatura"){
                    $temp = $_POST["temperatura"];
                    $tipo_temperatura = $_POST["tipo_temp"];
                    $tipo_calcular = $_POST["tipo_calcular"];
    
                    calcularTemperatura($temp, $tipo_temperatura, $tipo_calcular);
                }
            }
        ?>
    </form>
</body>
</html>
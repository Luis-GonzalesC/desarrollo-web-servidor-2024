<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        <input type="submit" value="Calcular Temperatura">
    </form>

    <?php
    //DE FAHRENTHEIT A CELSIU(temp − 32) × 5 / 9 = -17,78 °C
    //DE FAHRENTHEIT A KELVIN (TEMP − 32) × 5 / 9 + 273,15 =  K


    //DE CELSIUS A FAHRENTHEIT =>(temp × 9 / 5) + 32
    //DE CELSIUA A KELVIN => TEMP + 273,15

    //DE KELVIN A FAHRENHEIT => (temp − 273,15) × 9 / 5 + 32
    //DE KELVIN A CELSIUS => temp − 273,15
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $temp = $_POST["temperatura"];
        $tipo_temperatura = $_POST["tipo_temp"];
        $tipo_calcular = $_POST["tipo_calcular"];


        $result = match (true) {
            ($tipo_temperatura == "fahrenheit" && $tipo_calcular == "celsius") => (($temp - 32) * 5 / 9),
            ($tipo_temperatura == "fahrenheit" && $tipo_calcular == "kelvin") => (($temp - 32) * 5 / 9 + 273.15),
            ($tipo_temperatura == "celsius" && $tipo_calcular == "fahrenheit") => ((($temp * 9 / 5) + 32)),
            ($tipo_temperatura == "celsius" && $tipo_calcular == "kelvin") => ($temp + 273.15),
            ($tipo_temperatura == "kelvin" && $tipo_calcular == "fahrenheit") => (($temp - 273.15) * 9 / 5 + 32),
            ($tipo_temperatura == "kelvin" && $tipo_calcular == "celsius") => ($temp - 273.15),
            default => $temp
        };

        echo "El calculo de $tipo_temperatura a $tipo_calcular es: $result";
    }
    ?>
</body>
</html>
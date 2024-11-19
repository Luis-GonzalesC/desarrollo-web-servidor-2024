<?php
    function calcularTemperatura($temp, $tipo_temperatura, $tipo_calcular){
        if($temp != '' && $tipo_temperatura != '' && $tipo_calcular != ''){
            $result = match (true) {
                ($tipo_temperatura == "fahrenheit" && $tipo_calcular == "celsius") => (($temp - 32) * 5 / 9),
                ($tipo_temperatura == "fahrenheit" && $tipo_calcular == "kelvin") => (($temp - 32) * 5 / 9 + 273.15),
                ($tipo_temperatura == "celsius" && $tipo_calcular == "fahrenheit") => ((($temp * 9 / 5) + 32)),
                ($tipo_temperatura == "celsius" && $tipo_calcular == "kelvin") => ($temp + 273.15),
                ($tipo_temperatura == "kelvin" && $tipo_calcular == "fahrenheit") => (($temp - 273.15) * 9 / 5 + 32),
                ($tipo_temperatura == "kelvin" && $tipo_calcular == "celsius") => ($temp - 273.15),
                default => $temp
            };
    
            echo "<p>El calculo de $tipo_temperatura a $tipo_calcular es: $result</p>";
        }else{
            echo "<h1 style='color:red'>Ingrese una temperatura a calcular</h1>";
        }
    }
?>
<?php
    function comprobarEdad($nombre, $edad){
        if($nombre == '' || $edad == ''){
            echo "<h2>Por favor, introduce el nombre y la edad</h2>";
        }else{
            echo "<p>$nombre tiene $edad años</p>";
        }
    }
?>
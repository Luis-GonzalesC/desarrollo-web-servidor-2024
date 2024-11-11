<?php
    $_servidor = "localhost";
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "poke_bd";

    $_conexion = new Mysqli($_servidor, $_usuario, $_contrasena, $_base_de_datos) //Creando la conexión
        or die("Error de conexión"); //Si no consigue conectarse da error de conexión

?>
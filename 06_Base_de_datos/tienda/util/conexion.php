<?php
    $_servidor = "localhost"; // 127.0.0.1 (loopback) IP DEL ORDENADOR
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "tienda_bd";

    //  Tnemos 2 opciones para crear una conexion con BBDD
    // Mysqli (más simple) ó PDO (más compleja)(librerías)
    $_conexion = new Mysqli($_servidor, $_usuario, $_contrasena, $_base_de_datos) //Creando la conexión
        or die("Error de conexión"); //Si no consigue conectarse da error de conexión

?>
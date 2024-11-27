<?php
    session_start();//Recuperamos la sesión que existe
    session_destroy();//Cerramos la sesión
    header("location: iniciar_sesion.php"); //Regresamos al iniciar sesión
    exit;
?>
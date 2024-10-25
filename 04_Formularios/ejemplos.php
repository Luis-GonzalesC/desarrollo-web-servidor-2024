<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
</head>
<body>
    <?php
        /**
         * SINGPLE PAGE FORM => TODA LA INFORMACION SE PROCESA EN LA MISM PÁGINA
         * 
         * MULTI PAGE FORM => REENVIA A OTRA PÁGINA
         */
    ?>
    <!--con las comillas vacias en el action se recarga en la misma página-->
    <form action="" method = "post">
        <input type = "text" name = "mensaje">
        <input type = "text" name = "numero">
        <input type = "submit" value = "Enviar">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            /**
             * El servidor ejecutara este bloque de codigo cuando resiva una peticion atravez de un metodo post
             */
            $mensaje = $_POST['mensaje'];
            $numero = (int)$_POST['numero'];
            $i = 0;
            while($i < $numero){
                echo "<h1>$mensaje</h1>";
                $i++;
            }
            /**
             * MODIFICAR EL FORMULARIO ANTERIOR PARA QUE SE PUEDAN INTRODUCIR TAMBIEN UN NUMERO
             * 
             * El mensaje se mostrará tanta veces como indique el número
             */
        }
    ?>
</body>
</html>
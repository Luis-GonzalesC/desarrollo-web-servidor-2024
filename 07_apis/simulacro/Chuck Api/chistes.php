<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api de chistes del señor Chuck</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
</head>
<body>
    <?php 
        $url = "https://api.chucknorris.io/jokes/categories";//Link de la conexion

        $curl = curl_init();//Iniciar la conexion
        curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
        $respuesta = curl_exec($curl);//Ejecutamos
        curl_close($curl);//Cerramos el curl

        $datos = json_decode($respuesta, true);
        $chistes_categorias = $datos;

        //===========Realizando la peticion al servidor con la categoria del juego==========//
        if(isset($_GET["categorias"])){
            $seleccion_categoria = $_GET["categorias"];
            $url = "https://api.chucknorris.io/jokes/random?category=$seleccion_categoria";

            $curl = curl_init();//Iniciar la conexion
            curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
            $resultado = curl_exec($curl);//Ejecutamos
            curl_close($curl);//Cerramos el curl

            $datos = json_decode($resultado, true);
            $chiste = $datos["value"];
        }
    ?>

    <div class="container">
        <form action="" method="get">
            <label class="form-label" for="cate">Seleccione una categoria</label> <br>
            <select class="form-select" id="cate" name="categorias" style="width: 30rem;">
                <?php foreach ($chistes_categorias as $cate) { ?>
                    <option value="<?php echo $cate?>"><?php echo $cate?></option>
                <?php } ?>
            </select>
            <br>
            <input type="submit" class="btn btn-primary" value="Enviar">
        </form>

        <h3><?php if(isset($chiste)) echo $chiste?></h3>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
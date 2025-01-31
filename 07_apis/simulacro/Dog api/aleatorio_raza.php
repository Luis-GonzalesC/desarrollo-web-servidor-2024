<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perro aleatorio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            if(isset($_GET["raza"])){
                $raza = $_GET["raza"];
                $url = "https://dog.ceo/api/breed/$raza/images/random";//Link de la conexion
            }else{
                $url = "https://dog.ceo/api/breeds/image/random";//Link de la conexion
            }

            $curl = curl_init();//Iniciar la conexion
            curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
            $respuesta = curl_exec($curl);//Ejecutamos
            curl_close($curl);//Cerramos el curl
            $datos = json_decode($respuesta, true);
            $imagen_perro = $datos["message"];
            print_r($imagen_perro);
        }

        $url = "https://dog.ceo/api/breeds/list/all";//Link de la conexion

        $curl = curl_init();//Iniciar la conexion
        curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
        $respuesta = curl_exec($curl);//Ejecutamos
        curl_close($curl);//Cerramos el curl

        $datos = json_decode($respuesta, true);
        $perros = $datos["message"];
    ?>

    <div class="container">
        <form action="" method="get">
            <h1>Seleccione una raza de Perro a mostrar</h1>
            <select name="raza">
                <?php 
                    foreach ($perros as $perrito => $subraza) {//Saco de cada perro su valor y su clave
                        if(count($subraza) > 0){ //Si el cajon del array (valor) no está vacio quiero concatenarlo
                            foreach ($subraza as $raza) {
                                $concatenado_raza = $raza . " " . $perrito; //Me muestra tanto el valor como la clave concatenada ?> 
                                <option value="<?php echo $perrito . "/" . $raza ?> ">
                                    <?php echo ucwords($concatenado_raza); //Muestro la clave concatenada ?>
                                </option> 
                            <?php 
                            }
                        }else { ?>
                            <option value="<?php echo $perrito //Muestro la clave concatenada ?>">
                                <?php echo ucwords($perrito);//Muestro solo la clave si está vacío ?>
                            </option>
                <?php   }
                    }
                ?>
            </select>
            <br><br>
            <img src="<?php echo $imagen_perro?>" alt="Foto Perro" width="500px"> <br><br>
            <input class="btn btn-primary" type="submit" value ="Aleatorio">
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
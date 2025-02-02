<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attack on titan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
</head>
<body>
    <?php
        $url = "https://api.attackontitanapi.com/characters";//Link de la conexion

        $curl = curl_init();//Iniciar la conexion
        curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
        $respuesta = curl_exec($curl);//Ejecutamos
        curl_close($curl);//Cerramos el curl
        $datos = json_decode($respuesta, true);
        $personajes = $datos["results"];
    ?>

    <div class="container">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Alias</th>
                    <th>Species</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($personajes as $personaje) { ?>
                        <tr>
                            <td><?php echo $personaje["id"]?></td>
                            <td><?php echo $personaje["name"]?></td>
                            <td>
                                <?php 
                                    if(!empty($personaje["alias"][0])) echo $personaje["alias"][0];
                                    else echo "Sin alias";
                                ?>
                            </td>
                            <td><?php echo $personaje["species"][0]?></td>
                            <td><img src="<?php 
                                    if(!empty($personaje["img"])) echo $personaje["img"];
                                    else echo "Sin imagen"?>" alt="<?php echo $personaje["name"]?>"></td>
                        </tr>  
                <?php }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
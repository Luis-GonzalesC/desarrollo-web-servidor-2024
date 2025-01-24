<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Animes</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <?php
        $url = "https://api.jikan.moe/v4/top/anime";//Link de la conexion

        $curl = curl_init();//Iniciar la conexion
        curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
        $respuesta = curl_exec($curl);//Ejecutamos
        curl_close($curl);//Cerramos el curl

        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];
        //print_r($animes);
    ?>

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Notas</th>
                    <th>Imagen</th>
                    <th>Enlace Anime</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($animes as $anime){ ?>
                    <tr>
                        <td><?php echo $anime["title"] ?></td>
                        <td><?php echo $anime["score"] ?></td>
                        <td> <img src="<?php echo $anime["images"]["jpg"]["image_url"] ?>" alt="Imagen"></td>
                        <td> <a class ="btn btn-danger" href="id_anime.php?id_anime=<?php echo $anime["mal_id"]?>">Enlace Anime</a> </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
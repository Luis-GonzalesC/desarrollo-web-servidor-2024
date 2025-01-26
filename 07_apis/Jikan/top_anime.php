<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Animes</title>
    <link rel="stylesheet" href="bootstrap.css">
    <style>
        *{
            font-size: 1.1rem;
        }
    </style>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>

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
        <h1 class="text-center mt-5 mb-5">LISTA TOP ANIMES</h1>
        <table class="table table-striped align-middle">
            <thead>
                <tr class="text-center">
                    <th>Top</th>
                    <th>Titulo</th>
                    <th>Notas</th>
                    <th>Imagen</th>
                    <th>Enlace Anime</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($animes as $anime){ ?>
                    <tr class="text-center">
                        <td><?php echo $anime["rank"] ?></td>
                        <td><?php echo $anime["title"] ?></td>
                        <td><?php echo $anime["score"] ?></td>
                        <td> <img src="<?php echo $anime["images"]["jpg"]["image_url"] ?>" alt="Imagen"></td>
                        <td> <a class ="btn btn-danger" href="anime.php?id_anime=<?php echo $anime["mal_id"]?>">Enlace Anime</a> </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
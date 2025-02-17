<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Id de los animes</title>
    <link rel="stylesheet" href="bootstrap.css">
    <style>
        *{
            font-size: 1.1rem;
            text-align: justify;
        }
    </style>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>

</head>
<body>
    <?php
        if(!isset($_GET["id_anime"])){
            header("location: top_anime.php");
        }
        $id_anime = $_GET["id_anime"];
        $tipo = $_GET["type"];
        $pagina = $_GET["page"];

        $url = "https://api.jikan.moe/v4/anime/$id_anime/full";//Link de la conexion

        $curl = curl_init();//Iniciar la conexion
        curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
        $respuesta = curl_exec($curl);//Ejecutamos
        curl_close($curl);//Cerramos el curl

        $datos = json_decode($respuesta, true);
        $anime = $datos["data"];
        //print_r($animes);
    ?>

    <div class="container">
        <a class ="btn btn-danger mt-5" href="top_anime.php?type=<?php echo $tipo?>&page=<?php echo $pagina?>">Regresar</a>

        <div class="row">
            <div class="col mt-5">
                <h1><?php echo $anime["title"] ?> </h1>
            </div>
            <div class="col-1 offset mt-5">
                <h3> <?php echo $anime["year"] ?> </h3>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center">
                <img src="<?php echo $anime["images"]["jpg"]["image_url"]?>" alt="<?php echo $anime["title"] ?>">
            </div>
            <div class="col mt-3">
                <p> <?php echo $anime["synopsis"] ?> </p>
            </div>
        </div>

        <div class="offset-4 mt-5 mb-3">
            <iframe allowfullscreen width="600" height="350" src="<?php echo $anime["trailer"]["embed_url"]?>"> </iframe>
        </div>

        <div class="row">
            <div class="col-5 mt-5 mb-3 offset-2">
                <h1>---LISTA GENERO---</h1>
                <ul>
                    <?php
                        foreach ($anime["genres"] as $genero) { ?>
                            <li> Nombre : <?php echo $genero["name"] ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-5 mt-5 mb-3">
                <h1>---LISTA PRODUCTORAS---</h1>
                <ul>
                    <?php
                        foreach ($anime["producers"] as $genero) { ?>
                            <li> Nombre : <?php echo $genero["name"] ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col mt-5 mb-3 offset-4">
                <h1>---LISTA DE ANIMES---</h1>
                <ul>
                    <?php
                        foreach ($anime["relations"] as $anime) { 
                            foreach ($anime["entry"] as $seriesita){
                                if($seriesita["type"] == "anime"){?>
                                    <ul>
                                        <li><?php echo $seriesita["name"]?></li>
                                    </ul>
                            <?php } ?>
                    <?php
                            }
                        }?>
                </ul>
            </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
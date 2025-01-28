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
        $tipo = "";
        if(isset($_GET["type"])){//verifica para los radio button si está seleccionado o no (ESTO OBLIGATORIO SI NO PETA FUERTE)
            $tmp_tipo = $_GET["type"];
            $tipo_valido = ["tv", "movie", ""];
            if(!in_array($tmp_tipo, $tipo_valido)) $err_tipo = "Tipo no válido";
            else $tipo = $tmp_tipo;
        }

        if(!isset($_GET["page"])) $pagina = 1;
        else $pagina = $_GET["page"];


        $url = "https://api.jikan.moe/v4/top/anime?type=$tipo&page=$pagina";//Link de la conexion

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
        <form class="col-4 text-center offset-4" action="" method="get">
            <h1>Elige el tipo de filtro</h1>
            <div class="row">
                <div class="col-4 mb-3">
                        <input class="form-check-input" type="radio" name="type" value="tv"> TV
                </div>
                <div class="col-4 mb-3">
                        <input class="form-check-input" type="radio" name="type" value="movie"> MOVIE
                </div>
                <div class="col-4 mb-3">
                        <input class="form-check-input" type="radio" name="type" value=""> TODOS
                        <?php if(isset($err_tipo)) echo "<div class='alert alert-danger'>$err_tipo</div>"?>
                </div>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value = "Enviar">
            </div>
        </form>

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
                        <td>
                            <a class ="btn btn-danger" href="anime.php?id_anime=<?php echo $anime["mal_id"]?>&type=<?php echo $tipo ?>&page=<?php echo $pagina?>"> Enlace Anime</a>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>

        <?php 
            $siguiente = $pagina + 1;
            $atras = $pagina - 1;
        ?>
        
        <?php if($atras != 0){ ?>
            <div class="row mt-4 mb-3">
                <div class="col-3 offset-4">
                    <a class="btn btn-info" href="top_anime.php?type=<?php echo $tipo ?>&page=<?php echo $atras?>">PA ATRAS</a>
                </div>
                <div class="col-3">
                    <a class="btn btn-info" href="top_anime.php?type=<?php echo $tipo ?>&page=<?php echo $siguiente?>">PA LANTE</a>
                </div>
            </div>
        <?php } else {?>
            <div class="col-2 offset-7">
                    <a class="btn btn-info" href="top_anime.php?type=<?php echo $tipo ?>&page=<?php echo $siguiente?>">PA LANTE</a>
                </div>
        <?php }?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
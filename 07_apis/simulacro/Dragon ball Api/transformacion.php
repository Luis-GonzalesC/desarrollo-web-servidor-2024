<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Id de los transformacion_personajes</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: "Inconsolata";
        }
        .img{
            width: 160px;
            height: 250px;
        }
        .planeta{
            width: 500px;
        }
    </style>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>

</head>
<body>
    <?php
        if(!isset($_GET["id_perso"])){
            header("location: index.php");
        }
        $id_perso = $_GET["id_perso"];

        $url = "https://dragonball-api.com/api/characters/$id_perso";//Link de la conexion

        $curl = curl_init();//Iniciar la conexion
        curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
        $respuesta = curl_exec($curl);//Ejecutamos
        curl_close($curl);//Cerramos el curl

        $datos = json_decode($respuesta, true);
        $transformacion_personaje = $datos;
    ?>

    <div class="container">
        <img class="offset-4 mt-5" src="https://fontmeme.com/permalink/250202/8da68975794bc7e6c673a75f48dfae0b.png" alt="fuente-de-dragon-ball-z" border="0"> <br>
        <a class ="btn btn-danger mt-5" href="index.php">Regresar</a>

        <div class="row">
            <div class="col mt-5">
                <h1><?php echo $transformacion_personaje["name"] ?> </h1>
            </div>
            <div class="col-1 offset mt-5">
                <h3><?php echo $transformacion_personaje["race"] ?> </h3>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center">
                <img class="img" src="<?php echo $transformacion_personaje["image"]?>" alt="<?php echo $transformacion_personaje["name"] ?>">
            </div>
            <div class="col mt-3">
                <p> <?php echo $transformacion_personaje["description"] ?> </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 mt-3">
                <h1>Lugar donde pertenece</h1>
                <p> <?php echo $transformacion_personaje["originPlanet"]["name"] ?> </p>
                <p class="justify-content-center"> <?php echo $transformacion_personaje["originPlanet"]["description"] ?> </p>
            </div>
            <div class="col-6 mt-3">
                <img class="planeta" src="<?php echo $transformacion_personaje["originPlanet"]["image"]?>" alt="<?php echo $transformacion_personaje["originPlanet"]["name"]?>">
            </div>
        </div>

        <?php if(!empty($transformacion_personaje["transformations"])){ ?>
        <img class="mt-5 mb-5"  src="https://fontmeme.com/permalink/250202/56762fee4a3886e184a44d30a405afac.png" alt="fuente-de-dragon-ball-z" border="0">
        <div class="offset-2 row text-center">
            <?php
                foreach($transformacion_personaje["transformations"] as $transformations){?>
                    <div class="col-6 mb-4">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo $transformations["image"]?>" class="img" alt="<?php echo $transformations["name"]?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $transformations["id"]?></h5>
                                <p class="card-text"><?php echo $transformations["name"]?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?php echo $transformations["ki"]?></li>
                            </ul>
                        </div>
                    </div>
            <?php 
                }
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrando los personajes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background-color: #0f2537;
            color: white;
        }
        .img{
            width: 160px;
            height: 250px;
        }
        .encabezado{
            --bs-table-bg: #df6919;
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

        $pagina = $_GET["page"];
        $limite = $_GET["limit"];
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
        <a class ="btn btn-danger mt-5" href="index.php?page=<?php echo $pagina ?>&limit=<?php echo $limite?>">Regresar</a>

        <div class="row">
            <div class="col mt-5">
                <h1><?php echo $transformacion_personaje["name"] ?> </h1>
            </div>
            <div class="col-1 offset mt-5">
                <h3>Raza: <?php echo $transformacion_personaje["race"] ?> </h3>
            </div>
            <div class="col-1 offset mt-5">
                <h3>Género: <?php echo $transformacion_personaje["gender"] ?> </h3>
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

        <?php if(!empty($transformacion_personaje["transformations"])){ ?>
            <img class="mt-5 mb-5"  src="https://fontmeme.com/permalink/250202/56762fee4a3886e184a44d30a405afac.png" alt="fuente-de-dragon-ball-z" border="0">
            <div class="offset-3 row text-center">
                <div class="col-6 mb-4">
                    <table class="table table-striped mt-5">
                        <thead class="encabezado">
                            <tr>
                                <th>Nombre de transformación</th>
                                <th>Imagen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($transformacion_personaje["transformations"] as $transformations){?>
                                <tr>
                                    <td><?php echo $transformations["name"]?></td>
                                    <td><img class="img" src="<?php echo $transformations["image"]?>" alt="<?php echo $transformations["name"]?>"></td>
                                </tr>
                                                        
                            <?php 
                                } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } else{ ?>
                <h3><?php echo $transformacion_personaje["name"]?> no tiene transformaciones</h3>
        <?php }?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
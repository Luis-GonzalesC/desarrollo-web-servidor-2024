<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personajes</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200..900&display=swap" rel="stylesheet">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
    <style>
        *{
            font-family: "Inconsolata";
        }
        .img{
            width: 160px;
            height: 250px;
        }
        .logo{
            width: 50px;
        }
    </style>
</head>
<body>
    <?php

        $url = "https://dragonball-api.com/api/characters";//Link de la conexion

        $curl = curl_init();//Iniciar la conexion
        curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
        $respuesta = curl_exec($curl);//Ejecutamos
        curl_close($curl);//Cerramos el curl
        $datos = json_decode($respuesta, true);
        $personajes = $datos["items"];
    ?>

    <nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="imagenes/logo.png" class="logo" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-sm-2" type="search" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>

    <div class="container text-center">
        <img src="https://fontmeme.com/permalink/250202/29802f6f3fc3c57025bb4f6c383ce449.png" alt="fuente-de-dragon-ball-z" border="0">
        <img class="mt-5" src="https://fontmeme.com/permalink/250202/08555906a1337443ea37eb4ebc53e3c7.png" alt="fuente-de-dragon-ball-z" border="0">
        <table class="table table-striped mt-5">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>KI</th>
                    <th>Raza</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Tranformaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($personajes as $personaje){?>
                        <tr>
                            <td><?php echo $personaje["id"]?></td>
                            <td><?php echo $personaje["name"]?></td>
                            <td><?php echo $personaje["ki"]?></td>
                            <td><?php echo $personaje["race"]?></td>
                            <td><?php echo $personaje["description"]?></td>
                            <td><img class="img" src="<?php echo $personaje["image"]?>" alt="<?php echo $personaje["name"]?>"></td>
                            <td>
                                <a class ="btn btn-danger" href="transformacion.php?id_perso=<?php echo $personaje["id"]?>">Transformación</a>
                            </td>
                        </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrando datos pokemon</title>
    <link rel="stylesheet" href="bootstrap.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
    <style>
        .img{
            width: 150px;
        }
    </style>
</head>
<body>
    <?php
        $id = $_GET["id_pokemon"];

        $url = "https://pokeapi.co/api/v2/pokemon/$id/";//Link de la conexion

        $curl = curl_init();//Iniciar la conexion
        curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
        $respuesta = curl_exec($curl);//Ejecutamos
        curl_close($curl);//Cerramos el curl
        $datos = json_decode($respuesta, true);
        $pokemons = $datos;
    ?>

    <div class="container">
        <table class="table table-striped mt-5">
            <thead class="table-primary">
                <tr>
                    <th>Nombre Pokemon</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $pokemons["name"]?></td>
                    <td><img class="img" src="<?php echo $pokemons["sprites"]["front_default"]?>" alt="<?php echo $pokemons["name"]?>"</td>

                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
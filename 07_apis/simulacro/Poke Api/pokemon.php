<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POKE API</title>
    <link rel="stylesheet" href="bootstrap.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
</head>
<body>
    <?php
        $url = "https://pokeapi.co/api/v2/pokemon/";//Link de la conexion

        $curl = curl_init();//Iniciar la conexion
        curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
        $respuesta = curl_exec($curl);//Ejecutamos
        curl_close($curl);//Cerramos el curl
        $datos = json_decode($respuesta, true);
        $pokemons = $datos["results"];
        
        $id = 1;
    ?>
    <div class="container">
        <table class="table table-striped mt-5">
            <thead class="table-primary">
                <tr>
                    <th>Nombre Pokemon</th>
                    <th>Cositas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($pokemons as $pokemon) { ?>
                    <tr>
                        <td><?php echo $pokemon['name'] ?></td>
                        <td><a class="btn btn-primary" href="datos_pokemon.php?id_pokemon=<?php echo $id?>">COSITAS</a></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
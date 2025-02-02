<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api de Rick y Morty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
</head>
<body>
    <?php 
        if(isset($_GET["count"]) && isset($_GET["gender"]) && isset($_GET["species"])){
            $count = $_GET["count"];
            $gender = $_GET["gender"];
            $species = $_GET["species"];

            $url = "https://rickandmortyapi.com/api/character/?gender=$gender&species=$species";//Link de la conexion

            $curl = curl_init();//Iniciar la conexion
            curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
            $respuesta = curl_exec($curl);//Ejecutamos
            curl_close($curl);//Cerramos el curl

            $datos = json_decode($respuesta, true);
            $personajes = $datos["results"];

        }else echo "<div style='width: 30rem;' class='alert alert-danger'>Rellenar todos los campos</div>";
    ?>

    <div class="container">
        <form class="col-4" action="" method="get">
            <div class="mb-3">
                Cantidad de personajes: <input class="form-control" type="text" name="count">
            </div>

            <div class="mb-3">
                <select class="form-select" name="gender">
                    <option value="" selected disabled hidden>---SELECCIONE UN GÉNERO---</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            
            <div class="mb-3">
                <select class="form-select" name="species">
                    <option value="" selected disabled hidden>---SELECCIONE UNA ESPECIE---</option>
                    <option value="human">Human</option>
                    <option value="alien">Alien</option>
                </select>
            </div>
            
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>

        <?php
        if(isset($personajes)){ //Si mi personaje existe quiero mostrar lo que pide en una tabla?>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th>Nombre del personaje</th>
                        <th>Género</th>
                        <th>Especie</th>
                        <th>Origen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        while($i < $count){ //En un bucle saco todos los personajes con el número que me pasen por parámnetros
                            if(!empty($personajes[$i])){
                                echo "<tr>";
                                echo "<td>" . $personajes[$i]["name"] . "</td>";
                                echo "<td>" . $personajes[$i]["gender"] . "</td>";
                                echo "<td>" . $personajes[$i]["species"] . "</td>";
                                echo "<td>" . $personajes[$i]["origin"]["name"] . "</td>";
                            }else $i = $count;
                            $i++;
                        }
                        echo "</tr>";
                    ?>
                </tbody>
            </table>
    <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
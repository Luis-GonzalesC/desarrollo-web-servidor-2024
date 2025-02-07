<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
    <style>
        body{
            background-color: #0f2537;
        }
        .img{
            width: 160px;
            height: 250px;
        }
        .encabezado{
            --bs-table-bg: #df6919;
        }
    </style>
</head>
<body>
    <?php
        $ultimo = false;
        if(!isset($_GET["page"])) $pagina = 1;
        else $pagina = $_GET["page"];

        if(!isset($_GET["limit"])) $limite = 5;
        else $limite = $_GET["limit"];
    

        $url = "https://dragonball-api.com/api/characters?page=$pagina&limit=$limite";//Link de la conexion

        $curl = curl_init();//Iniciar la conexion
        curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
        $respuesta = curl_exec($curl);//Ejecutamos
        curl_close($curl);//Cerramos el curl
        $datos = json_decode($respuesta, true);
        $personajes = $datos["items"];
    ?>

    <div class="container text-center">
        <form class="offset-4 col-4 text-center" action="" method="get">
            <div class="mb-3">
                <label class="form-label text-light">Ingrese el número de personajes</label>
                <input class="form-control" type="text" name="limit">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Hacer Petición">
            </div>
        </form>

        <img class="mt-5" src="https://fontmeme.com/permalink/250202/08555906a1337443ea37eb4ebc53e3c7.png" alt="fuente-de-dragon-ball-z" border="0">
        <table class="table table-striped mt-5">
            <thead class="table-primary encabezado">
                <tr>
                    <th>Nombre</th>
                    <th>Raza</th>
                    <th>Género</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($personajes as $personaje){ 
                            if($personaje["id"] == 78) $ultimo = true;
                        ?>
                        <tr>
                            <td>
                                <a class="btn btn-primary" href="personaje.php?id_perso=<?php echo $personaje["id"]?>&page=<?php echo $pagina ?>&limit=<?php echo $limite?>"><?php echo $personaje["name"]?></a>
                            </td>
                            <td><?php echo $personaje["race"]?></td>
                            <td><?php echo $personaje["gender"]?></td>
                            <td><img class="img" src="<?php echo $personaje["image"]?>" alt="<?php echo $personaje["name"]?>"></td>
                        </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    
        <?php 
            $siguiente = $pagina + 1;
            $atras = $pagina - 1;
        ?>
        
        <?php if($ultimo){?>
                <div class="col-2 offset-7">
                    <a class="btn btn-danger"href="index.php?&page=1&limit=<?php echo $limite?>">Inicio</a>
                    <a class="btn btn-info" href="index.php?page=<?php echo $atras ?>&limit=10">PA ATRAS</a>
                </div>
        <?php }else if($atras != 0){ ?>
                <div class="row mt-4 mb-3">
                    <div class="col-3 offset-4">
                        <?php if($pagina >= 3){?>
                            <a class="btn btn-danger"href="index.php?&page=1&limit=<?php echo $limite?>">Inicio</a>
                        <?php } ?>
                        <a class="btn btn-info" href="index.php?page=<?php echo $atras ?>&limit=<?php echo $limite?>">Anterior</a>
                    </div>
                    <div class="col-3">
                        <?php if($pagina >= 0 && $pagina <= 11){ ?>
                            <a class="btn btn-danger" href="index.php?&page=12&limit=<?php echo $limite?>">Final</a>
                            <a class="btn btn-info" href="index.php?page=<?php echo $siguiente ?>&limit=<?php echo $limite?>">Siguiente</a>
                        <?php } ?>
                    </div>
                </div>
        <?php } else {?>
            <div class="col-2 offset-7">
                <?php if($pagina >= 0 && $pagina <= 11){ ?>
                    <a class="btn btn-danger" href="index.php?&page=12&limit=<?php echo $limite?>">Final</a>
                <?php } ?>
                    <a class="btn btn-info" href="index.php?page=<?php echo $siguiente ?>&limit=<?php echo $limite?>">Siguiente</a>
                </div>
        <?php }?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
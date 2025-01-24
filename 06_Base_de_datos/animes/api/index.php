<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index de Api</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1);
    ?>
</head>
<body>
    <?php
        /*if($_SERVER["REQUEST_METHOD"] == "GET"){
            $ciudad = $_GET["ciudad"];
            //!empty
            if(isset($_GET["ciudad"]) && $ciudad != ''){
                $url = "http://localhost/Ejercicios/06_Base_de_datos/animes/api/api_estudios.php?ciudad=$ciudad";//Link de la conexion
            }else{
                $url = "http://localhost/Ejercicios/06_Base_de_datos/animes/api/api_estudios.php";//Link de la conexion
            }
            $curl = curl_init();//Iniciar la conexion
            curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
            $respuesta = curl_exec($curl);//Ejecutamos
            curl_close($curl);//Cerramos el curl

            $estudios = json_decode($respuesta, true);
            //print_r($estudios);
            
        }*/
        //Forma de Alejandra
        $url = "http://localhost/Ejercicios/06_Base_de_datos/animes/api/api_estudios.php";//Link de la conexion
        if(!empty($_GET["ciudad"])){
            $ciudad = $_GET["ciudad"];
            $url = $url .  "?ciudad=$ciudad";
        }
        $curl = curl_init();//Iniciar la conexion
        curl_setopt($curl, CURLOPT_URL, $url); //Accedemos a la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Cuando acceda, que me de ese fichero
        $respuesta = curl_exec($curl);//Ejecutamos
        curl_close($curl);//Cerramos el curl

        $estudios = json_decode($respuesta, true);
        //print_r($estudios);
        
    ?>

    <form action="" method="get">
        <label for="ciudad">Escribe una ciudad</label>
        <input type="text" name="ciudad" id="ciudad"> <br>
        <input type="submit" value="Enviar">
    </form>

    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Año de fundacion</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($estudios as $ele) {
                    echo "<tr>";
                    echo "<td>" . $ele["nombre_estudio"] . "</td>";
                    echo "<td>" . $ele["ciudad"]. "</td>";
                    echo "<td>" . $ele["anno_fundacion"] . "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
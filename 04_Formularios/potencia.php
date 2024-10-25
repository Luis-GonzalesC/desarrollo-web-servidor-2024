<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencias</title>
</head>
<body>
    <!--Crea un formulario que reciba dos numeros: BASE Y EXPONENTE
    
    SE MOSTRARA EL RESULTADO DE ELEVAR LA BASE AL EXPONENTE:

    2 ELEVADO A 3 = 8, 2 X 2 X 2
    3 ELEVADO A 2 = 9, 3 X 3
    2 ELEVADO A 1 = 2
    3 ELEVADO A 0 = 1
    -->
    <form action="" method="post">
        <input type="text" name="base"> <br>
        <input type="text" name="exponente"> <br>
        <input type = "submit" value = "Enviar">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $base = (int)$_POST['base'];
            $expo = (int)$_POST['exponente'];

            if($expo == 0){
                echo 1;
            }else{
                $resul = 1;
                for ($i=0; $i < $expo; $i++) { 
                    $resul *= $base;
                }
                echo $resul;
            }
            
        }
    ?>
</body>
</html>
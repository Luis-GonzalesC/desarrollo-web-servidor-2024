<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculando el IRPF</title>
</head>
<body>

    <form action="" method="post">
        <label for="sueldo">Ingrese el Sueldo</label>
        <input type="text" name="sueldo" id="sueldo"><br>
        <input type="submit" value = "Enviar">
    
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $sueldo = $_POST["sueldo"];
            
            $resultado = 0;
            $IRPF_1 = 12450 * 0.19;

            if($sueldo < 12450){
                $resultado = $sueldo - $IRPF_1;
            }elseif($sueldo >= 12450 && $sueldo <= 20199){

                $IRPF_2 = ($sueldo - 12450) * 0.24;
                $IRPF_total = $IRPF_1 + $IRPF_2;
                $resultado = $sueldo - $IRPF_total;

            }elseif($sueldo >= 20200 && $sueldo <= 35199) {

                $IRPF_2 = (20200 - 12450) * 0.24;
                $IRPF_3 = ($sueldo - 20200) * 0.30;
                $IRPF_total = $IRPF_1 + $IRPF_2 + $IRPF_3;
                $resultado = $sueldo - $IRPF_total;

            }elseif($sueldo >= 35200 && $sueldo <= 59999){

                $IRPF_2 = (20200 - 12450) * 0.24;
                $IRPF_3 = (35200 - 20200) * 0.30;
                $IRPF_4 = ($sueldo - 35200) * 0.37;
                $IRPF_total = $IRPF_1 + $IRPF_2 + $IRPF_3 + $IRPF_4;
                $resultado = $sueldo - $IRPF_total;

            }elseif($sueldo >= 60000 && $sueldo <= 299999){


                $IRPF_2 = (20200 - 12450) * 0.24;
                $IRPF_3 = (35200 - 20200) * 0.30;
                $IRPF_4 = (60000 - 35200) * 0.37;
                $IRPF_5 = ($sueldo - 60000) * 0.45;

                $IRPF_total = $IRPF_1 + $IRPF_2 + $IRPF_3 + $IRPF_4 + $IRPF_5;
                $resultado = $sueldo - $IRPF_total;
            }else{
                $IRPF_2 = (20200 - 12450) * 0.24;
                $IRPF_3 = (35200 - 20200) * 0.30;
                $IRPF_4 = (60000 - 35200) * 0.37;
                $IRPF_5 = (300000 - 60000) * 0.45;
                $IRPF_6 = ($sueldo - 300000) * 0.47;

                $IRPF_total = $IRPF_1 + $IRPF_2 + $IRPF_3 + $IRPF_4 + $IRPF_5 + $IRPF_6;
                $resultado = $sueldo - $IRPF_total;
            }
        }

        echo $resultado;
    ?>
</body>
</html>
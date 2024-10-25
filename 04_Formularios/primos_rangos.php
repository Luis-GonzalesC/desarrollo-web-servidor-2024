<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rango de primos</title>
</head>
<body>

    <form action="" method="post">
        <label for="num1">Numero 1</label>
        <input type="text" name="numero1" id="num1"><br>
        <label for="num2">Numero 2</label>
        <input type="text" name="numero2" id="num2"><br>
        <input type="hidden" name="accion" value="formulario_primo">
        <input type="submit" value="Enviar">
    </form>

    <?php
    //  El numero menor debera ser 2 o más
    //  El otro debe ser superior al primero
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["accion"] == "formulario_primo"){

                $tmp_num1 = $_POST["numero1"];
                $tmp_num2 = $_POST["numero2"];
                //validar numero 1
                if($tmp_num1 != ''){
                    if(is_numeric($tmp_num1)){
                        if($tmp_num1 > 2){

                        }
                    } else{
                        echo "<p>El número 1 debe ser un número</p>";
                    }
                } else{
                    echo "<p>El primer número es obligatorio</p>";
                }

                calcularPrimo($num1, $num2);
            }
        }
    ?>
    
</body>
</html>
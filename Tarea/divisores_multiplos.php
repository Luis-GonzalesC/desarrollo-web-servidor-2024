<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisores</title>
</head>
<body>

    <form action="" method="post">
        <label for="divi">Divisores</label>
        <input type="text" name="divisores" id="divi">
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $i = 1;

            $divi = $_POST["divisores"];
            
            //AQUI LOS DIVISORES
            while($i <= $divi){
                if($divi % $i  == 0) echo "<p>Divisor $i</p>";
                $i++;
            }
            
            //AQUI LOS MULTIPLOS
            while($i <= 10){
                if($i % $divi  == 0) echo "<p>Multiplo $i</p>";
                $i++;
            }
        }
        
    ?>
</body>
</html>
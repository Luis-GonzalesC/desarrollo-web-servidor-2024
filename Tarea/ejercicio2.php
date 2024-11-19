<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="a">Numero A</label>
        <input type="text" name="numeroa" id="a"><br>
        <label for="b">Numero B</label>
        <input type="text" name="numerob" id="b"><br>
        <label for="c">Numero C</label>
        <input type="text" name="numeroc" id="c"><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $a = $_POST["numeroa"];
            $b = $_POST["numerob"];
            $c = $_POST["numeroc"];
            echo "<p>Los múltiplos de $c que se encuentran entre $a y $b son:</p>";
            echo "<ul>";
            for ($i= $a; $i <= $b ; $i++){ 
                if($i % $c == 0){
                    echo "<li>$i</li>";
                }
            }
            echo "</ul>";
        }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar</title>
    <style>
        table{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        tr td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <!--
        Crear un formulario que reciba un número. Se mostrará en una tabla de multiplicar de ese número. Ejemplo:
        3 x 1 = 3
        3 x 2 = 6

        3 x 10 = 30
    -->
    <form action="" method="post">
        <label for="numero">Número</label>
        <input type="text" name="valor" id="numero" placeholder="Introduce un número"><br>
        <input type="submit" value="Generar">
    </form>

    <br><br>
    
    <table>
        <thead>
            <tr>
                <th>MULTIPLICACION</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $valor = $_POST['valor'];
                    $i = 1;
                    do{
                        $multi = $valor * $i;
                        echo "<tr>";
                        echo "<td>";
                        echo "$valor x $i = $multi";
                        echo "</td>";
                        echo "</tr>";
                        $i++;
                    }while($i <= 10);
                    /*
                    while($i <= 10){
                        $multi = $valor * $i;
                        echo "<tr>";
                        echo "<td>";
                        echo "$valor x $i = $multi";
                        echo "</td>";
                        echo "</tr>";
                        $i++;
                    }*/
                }
            ?>
            </tr>
        </tbody>
    </table>
</body>
</html>
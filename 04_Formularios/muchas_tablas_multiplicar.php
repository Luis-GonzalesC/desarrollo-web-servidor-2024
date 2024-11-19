<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Multiplicar</title>
</head>
<body>
     <!--
        Crear un formulario que reciba un número. Se mostrará en una tabla
        HTML la tabla de multiplicar de ese número. Ejemplo:

        3 x 1 = 3
        3 x 2 = 6
        3 x 3 = 9
        ...
        3 x 10 = 30
    -->
    <form action = "" method = "post">
        <label for="num">Número de tablas de multiplicar</label>
        <input type="text" name="numero" id="num">
        <input type="submit" value = "Enviar">
    </form>
    <br>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $total_tablas = $_POST["numero"];

            for ($i=1; $i <= $total_tablas; $i++) {?>
                <table border=1 style= "text-align: center">
                    <thead>
                        <tr>
                            <th>Tabla de multiplicar</th>
                            <th>Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                for ($j=1; $j <= 10; $j++) {
                                    $multi = $i * $j;
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $j;
                                    echo "</td>";
                                    echo "<td>";
                                    echo "$i x $j =  " . $multi;
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                            </tr>
                    </tbody>
                </table>
                <br>
            <?php }
        }
    ?>
</body>
</html>
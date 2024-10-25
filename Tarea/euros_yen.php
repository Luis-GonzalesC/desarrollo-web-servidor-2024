<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Euros a Yen</title>
</head>
<body>
    <form action = "" method = "post">
        <input type="number" name = "cantidad">
        <select name = "a_calcular">
            <option value = "euro">Euro</option>
            <option value = "yen">Yen</option>
            <option value = "dolar">Dolar</option>
        </select>

        <select name = "b_calcular">
            <option value = "yen">Yen</option>
            <option value = "euro">Euro</option>
            <option value = "dolar">Dolar</option>
        </select>

        <input type="submit" value="Enviar">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $canti = $_POST["cantidad"];
            $a = $_POST["a_calcular"];
            $b = $_POST["b_calcular"];

            $result = match (true) {
                ($a == "euro" && $b == "yen") => $canti * 162.63,
                ($a == "euro" && $b == "dolar") => $canti * 1.08,
                ($a == "yen" && $b == "euro") => $canti * 0.0061,
                ($a == "yen" && $b == "dolar") => $canti * 0.0067,
                ($a == "dolar" && $b == "yen") => $canti * 150.21,
                ($a == "dolar" && $b == "euro") => $canti * 0.92,
                default => $canti
            };

            echo "La conversión entre " . $a . " a " . $b . " es $result";
        }
    ?>
</body>
</html>
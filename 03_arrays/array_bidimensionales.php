<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays Bidimensionales</title>
</head>
<body>
    <?php
        $videojuegos = [
            ["FIFA 24", "DEPORTE", 70],
            ["Dark Souls", "Soulslike", 50],
            ["Hollow Knigth", "Plataformas",30]
        ];

        foreach($videojuegos as $juego){
            list($titulo, $categoria, $precio) = $juego;
            echo "<p>$titulo, $categoria, $precio</p>";
        }
    ?>
</body>
</html>
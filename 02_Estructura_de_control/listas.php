<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas</title>
</head>
<body>
    <h3>Lista 1</h3>
    <?php
    $i = 1;
    
    echo "<ul type='square'>";
    while($i < 10){
        echo "<li>$i</li>";
        $i++;
    }
    echo "</ul>";
    ?>

    <h3>Lista 2</h3>
    <?php
    $i = 1;
    echo "<ul>";
    while($i < 10):
        echo "<li>$i</li>";
        $i++;
    endwhile;
    echo "</ul>";
    ?>

    <h3>Lista 3</h3>
    <?php
    /*
        CON WHILE Y LAS ESTRUCTURAS DE CONTROL NECESARIAS, MUESTRA EN UNA LISTA SIN ORDENAR TODOS LOS MULTIPLOS DE 3 ENTRE 1 Y 30
    */
    $i = 1;
    
    echo "<ul type='square'>";
    while($i <= 30){
        if($i % 3 == 0) echo "<li>$i</li>";
        $i++;
    }
    echo "</ul>";
    ?>

    <h1>Lista DO WHILE</h1>
    <?php
    echo "<ul>";
    $i = 1;
    do{
        echo "<li>$i</li>";
        $i++;
    }while($i <= 10);
    ?>

    <h3>Listas con for</h3>

    <?php
    $var = true;
    echo "<ul>";
        for($i = 1; $i <=10 && $var == true; $i++){
            echo "<li>$i</li>";
        }
        echo "</ul>";
    ?>

    <h3>Listas con for 2</h3>
    
    <?php
        echo "<ul>";
        for($i = 1; ; $i++){
            if($i >= 10) break;
            echo "<li>$i</li>";
        }
    ?>

    <h3>Listas con for 3</h3>

    <?php
    $var = true;
    echo "<ul>";
    $i = 1;
    for(;;){
        if($i >=10) break;
        echo "<li>$i</li>";
        $i++;
    }
    echo "</ul>";
    ?>
</body>
</html>
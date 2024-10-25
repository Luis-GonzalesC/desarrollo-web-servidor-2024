<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--DECIRLE A ALEJANDRA QUE PARA AGREGAR LAS TABLAS DENTRO DE UN BUCLE NO PONER LOS ERRORES PORQUE DA ERROR XD-->
    
    <title>Notas</title>
    <style>
        table{
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php

    $notas = [
        ["Paco", "Desarrollo web servidor"],
        ["Paco", "Desarrollo web cliente"],
        ["Manu", "Desarrollo web servidor"],
        ["Manu", "Desarrollo web cliente"],
    ];

    /*
        Ejercicio 1: añadir al array 4 estudiantes con sus asignaturas.

        Ejercicio 2: eliminar un estudiante y su asignatura a libre elección.

        Ejercicio 3: añadir una tercera columna que será la nota, obtenida aleatoriamente entre 1 y 10.

        Ejercicio 4: añadir una cuarta columna que indique APTO o NO APTO dependiendo de si la nota es igual o superior a 5 o no.

        Ejercicio 5: ordenar alfabeticamente por los alumnos, y luego por nota. Si hay varios filas con el mismo nombre y la misma nota, ordenar por la asignatura alfabeticamente.

        Ejercicio 6: mostrarlo todo en una tabla.
    */

    //Ejercicio 1: añadir al array 4 estudiantes con sus asignaturas.
    array_push($notas, ["Estela", "Desarrollo web servidor"]);
    array_push($notas, ["Luis", "Desarrollo web cliente"]);

    //Ejercicio 2: eliminar un estudiante y su asignatura a libre elección.
    unset($notas[0]); //se carga la posicion que este en ese momento
    unset($notas[3]);

    //LUEGO DE BORRAR LAS FILAS HAY QUE REORDENADAR EL ARRAY RETRASAO
    $notas = array_values($notas);

    //Ejercicio 3: añadir una tercera columna que será la nota, obtenida aleatoriamente entre 1 y 10.
    for ($i = 0; $i < count($notas); $i++) { //el count va a devolver cuantos arrays tiene dentro
        $notas[$i][2] = rand(1, 10);
    }
    
    //Ejercicio 4: añadir una cuarta columna que indique APTO o NO APTO dependiendo de si la nota es igual o superior a 5 o no.
    for ($i = 0; $i < count($notas); $i++) { //el count va a devolver cuantos arrays tiene dentro
        $nota = $notas[$i][2];
        if($nota >= 5) $notas[$i][3] = "APTO";
        else $notas[$i][3] = "NO APTO";
    }
    //Ejercicio 5: ordenar alfabeticamente por los alumnos, y luego por nota. Si hay varios filas con el mismo nombre y la misma nota, ordenar por la asignatura alfabeticamente.
    //NO ME SALE PIPIPI
    $_alumnos = array_column($notas, 0);
    $_notas = array_column($notas, 2);
    $_asig = array_column($notas, 1);
    array_multisort($_alumnos, SORT_ASC, $_notas, SORT_ASC, $_asig, SORT_ASC, $notas);
    ?>

    <h1>MI FORMA DE HACERLO</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Asignatura</th>
                <th>Nota</th>
                <th>Ingreso</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($notas as $notitas){
                    list($nombre, $asignatura, $nota, $ingreso) = $notitas;
                    echo "<tr>";
                    echo "<td>$nombre</td>";
                    echo "<td>$asignatura</td>";
                    echo "<td>$nota</td>";
                    echo "<td>$ingreso</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <h1>OTRA FORMA DE HACERLO</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Asignatura</th>
                <th>Nota</th>
                <th>Ingreso</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($notas as $notitas){
                    list($nombre, $asignatura, $nota, $ingreso) = $notitas; ?>
                    <tr>
                        <td><?php echo $nombre?></td>
                        <td><?php echo $asignatura?></td>
                        <td><?php echo $nota?></td>
                        <td><?php echo $ingreso?></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>


    <h1>LA FORMA QUE LE GUSTA A ALEJANDRA</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Asignatura</th>
                <th>Nota</th>
                <th>Ingreso</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($notas as $notitas){
                    echo "<tr>";
                    echo "<td>$notitas[0]</td>";
                    echo "<td>$notitas[1]</td>";
                    echo "<td>$notitas[2]</td>";
                    echo "<td>$notitas[3]</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        $productos = [
            ["Nintendo Switch", 300],
            ["Play Station 5 Slim", 450],
            ["Play Station 5 Pro", 800],
            ["XBOX Series S", 300],
            ["XBOX Series x", 400],
        ];
        
        /**
         * Añadir al array una tercera columna que será el stock, y se generará con un rand entre 0 y 5
         * 
         * MOstrar en una tabla cada producto junto a su precio y su stock
         * 
         * Crear un formulario donde se introduzca el nombre de un producto, y:
         * 
         *  -Si hay stock, decimos que está disponible y su precio
         *  -Si no hay. decimos que está agotado
         */
        for($i = 0; $i < count($productos); $i++) { 
           $productos[$i][2] = rand(0,5);
        }

    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($productos as $producto){
                    list($name, $precio, $stock) = $producto;
                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$precio</td>";
                    echo "<td>$stock</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <br>
    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="name" id="nombre" placeholder="Nombre del producto">
        <input type="submit" value="Verificar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre_producto = $_POST['name'];

            $encontrado = false;
            $i = 0;
            while($i < count($productos) && (!$encontrado)){
                if($productos[$i][0] == $nombre_producto && $productos[$i][2] > 0){
                    echo "DISPONIBLE";
                    $encontrado = true;
                }
                $i++;
            }
            if(!$encontrado) echo "NO DISPONIBLE";

            /*DECIRLE A ALEJANDRA QUE DENTRO DE MI CODIGO ME PILLA EL (POSIBLE)= SIGUIENTE DISPONIBLE O NO*/
        }
    ?>
</body>
</html>
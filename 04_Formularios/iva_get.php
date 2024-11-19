<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IVA</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <?php
        define("IVA_GENERAL",1.21);
        define("IVA_REDUCIDO",1.10);
        define("IVA_SUPERREDUCIDO",1.04);
        /*
        const iva_general = 1.21;
        const iva_reducido = 1.10;
        const iva_superreducido = 1.04;*/
    ?>
</head>
<body>
    <form action="" method="get">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio"><br><br>
        <label for="iva">IVA</label>
        <select name="iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">SuperReducido</option>
        </select><br><br>
        <input type="submit" value="Calcular PVP">
    </form>

    <?php
        // isset => SE UTILIZA PARA QUE UNA VARIABLE ESTE DEFINIDA
        if(isset($_GET["precio"]) && isset($_GET["iva"])){ // => comprobamos si se ha escrito algo en precio y se ha seleccinado algo en iva
            //aqui solo entra si se le da al boton
            // haya o no datos
            $precio = $_GET["precio"];
            $iva = $_GET["iva"];
    
            if($precio != '' && $iva != ''){
                $pvp = match ($iva) {
                    ("general") => $precio * IVA_GENERAL,
                    ("reducido") => $precio * IVA_REDUCIDO,
                    ("superreducido") => $precio * IVA_SUPERREDUCIDO
                };
        
                echo "El IVA de $precio € es: $pvp";
            }else{
                echo "<p>Por favor, rellena todos los datos</p>";
            }
        }
    ?>
</body>
</html>
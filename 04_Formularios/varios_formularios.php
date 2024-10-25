<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        require('../05_Funciones/edades.php');
        require('../05_Funciones/potencia.php');
    ?>
</head>
<body>
    <h1>Formulario edad</h1>
    <form action="" method="post">
        <input type="text" name="nombre" placeholder="Nombre"> <br><br>
        <input type="text" name="edad" placeholder="Edad"> <br><br>
        <input type="hidden" name="accion" value="formulario_edad">
        <input type = "submit" value = "Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["accion"] == "formulario_edad"){
                $nombre = $_POST["nombre"];
                $edad = $_POST["edad"];

                //Comprobar que se han introducido los dos campos. Si no
                //mostrar por pantalla algun error
                //Resolver el ejercicio en caso de que se hayan introducido algo
                comprobarEdad($nombre, $edad);
            }
        }
    ?>
    <h1>Formulario Potencia</h1>
    <form action="" method="post">
        <input type="text" name="base" placeholder="Base"> <br><br>
        <input type="text" name="exponente" placeholder="Exponente"> <br><br>
        <input type="hidden" name="accion" value="formulario_potencia">
        <input type = "submit" value = "Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            if($_POST["accion"] == "formulario_potencia"){
                $tmp_base = $_POST["base"];
                $tmp_exponente = $_POST["exponente"];
                /*
                //Validacion de la base
                if($tmp_base != ''){
                    if(filter_var($tmp_base, FILTER_VALIDATE_INT) != FALSE){
                        if($tmp_base >= 0){
                            $base = $tmp_base;
                        } else {
                            echo "<p>La base debe ser mayor que 0</p>";
                        }
                    } else {
                        echo "<p>La base debe ser un número ENTERO</p>";
                    }
                } else {
                    echo  "<p>La base es obligatoria</p>";
                }*/

                if($tmp_base == ''){
                    echo  "<p>La base es obligatoria</p>";
                }else{
                    if(filter_var($tmp_base, FILTER_VALIDATE_INT) != FALSE){
                        echo "<p>La base debe ser mayor que 0</p>";
                    } else {
                        if($tmp_base < 0) echo "<p>La base debe ser un número ENTERO</p>";
                        else $base = $tmp_base;
                    }
                }

                /*
                //Validacion de la exponente
                if($tmp_exponente != ''){
                    if(filter_var($tmp_exponente, FILTER_VALIDATE_INT) !== FALSE){
                        if($tmp_exponente >= 0){
                            $exponente = $tmp_exponente;
                        } else {
                            echo "<p>El exponente debe ser mayor que 0</p>";
                        }
                    } else {
                        echo "<p>El exponente debe ser un número ENTERO</p>";
                    }
                } else {
                    echo  "<p>El exponente es obligatoria</p>";
                }*/

                if($tmp_exponente == ''){
                    echo  "<p>El exponente es obligatoria</p>";
                }else{
                    if(filter_var($tmp_exponente, FILTER_VALIDATE_INT) === FALSE){
                        echo "<p>El exponente debe ser un número ENTERO</p>";
                    }else{
                        if($tmp_exponente < 0) echo "<p>El exponente debe ser mayor que 0</p>";
                        else $exponente = $tmp_exponente;
                    }
                }

                if(isset($base) && isset($exponente)){
                    $resultado = calcularPotencia($base, $exponente);
                    echo $resultado;
                }
                /*
                //validar base y exponente
                if($base != '' || $exponente != ''){
                    //Se ha introducido algo pero no sabemos si es correcto
                    if(is_numeric($base) && is_numeric($exponente)){
                        //se ha introducido algo y sabemos que es numero
                        //pero no sabemos si los numeros son validos
                        if($base > 0 && $exponente > 0){
                            $resultado = calcularPotencia($base, $exponente);
                        }else{
                            echo "<h2>Introduce números mayores a 0</h2>";
                        }
                    }else{
                        echo "<p>Introduce valores númericos</p>";
                    }
                }else{
                    //no se ha introducido nada
                    echo "<h2 style='color:red'>Introduce una base y un exponente</h2>";
                }*/
                
            }
            

        }
    ?>
</body>
</html>
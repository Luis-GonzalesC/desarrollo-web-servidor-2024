<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1);

    header("Content-type: application/json");
    include("conexion_pdo.php");

    $metodo = $_SERVER["REQUEST_METHOD"];
    $entrada = json_decode(file_get_contents("php://input"),true);//Almacena en la entrada los parámetros que almacena un formularios

    switch ($metodo) {
        case "GET":
            manejarGet($_conexion);
            break;
        case "POST":
            manejarPost($_conexion, $entrada);
            break;
        case "PUT":
            manejarPut($_conexion, $entrada);
            break;
        case "DELETE":
            manejarDelete($_conexion, $entrada);
            break;
        default:
            echo json_encode(["mensaje" => "Petición no válida"]);
    }

    function manejarGet($_conexion) { //select
        /*if(isset($_GET["ciudad"])){
            $sql = "SELECT * FROM estudios WHERE ciudad = :ciudad";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "ciudad" => $_GET["ciudad"]
            ]);
        }else{
            $sql = "SELECT * FROM estudios";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute();
        }
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);*/

        if(isset($_GET["ciudad"]) && isset($_GET["anno_fundacion"])){
            $sql = "SELECT * FROM estudios WHERE ciudad = :ciudad AND anno_fundacion = :anno_fundacion";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "ciudad" => $_GET["ciudad"],
                "anno_fundacion" => $_GET["anno_fundacion"]
            ]);
        }else if(isset($_GET["ciudad"])){
            $sql = "SELECT * FROM estudios WHERE ciudad = :ciudad";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "ciudad" => $_GET["ciudad"]
            ]);
        }else if(isset($_GET["anno_fundacion"])){
            $sql = "SELECT * FROM estudios WHERE anno_fundacion = :anno_fundacion";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "anno_fundacion" => $_GET["anno_fundacion"]
            ]);
        } else{
            $sql = "SELECT * from estudios";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute();
        }
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);

        //echo json_encode(["metodo" => "get"]);
        /*$sql = "SELECT * FROM estudios";
        //statement
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute(); //statement
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);*/
        //echo json_encode(["ciudad" => $_GET["ciudad"]]);

    }

    function manejarPost($_conexion, $entrada) { //insertar
        //echo json_encode(["metodo" => "post"]);
        $sql = "INSERT INTO estudios VALUES (:nombre_estudio, :ciudad, :anno_fundacion)";
        //en vez de poner interrogacion, se usan dos puntos y el nombre de la variable correspondiente
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            //pilla la variable (lo que esta entre comillas) de la query y el valor (comillas despues de la flecha) lo pilla del formulario
            "nombre_estudio" => $entrada["nombre_estudio"],
            "ciudad" => $entrada["ciudad"],
            "anno_fundacion" => $entrada["anno_fundacion"]
        ]);

        if ($stmt) { //si se ha ejecutado bien
            echo json_encode(["mensaje" => "El estudio se ha creado."]);
        } else {
            echo json_encode(["mensaje" => "Error al crear el estudio."]);
        }
    }

    function manejarPut($_conexion, $entrada) { //update
        echo json_encode(["metodo" => "put"]);
    }

    function manejarDelete($_conexion, $entrada) {
        //echo json_encode(["metodo" => "delete"]);
        $sql = "DELETE FROM estudios WHERE nombre_estudio = :nombre_estudio";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "nombre_estudio" => $entrada["nombre_estudio"]
        ]);

        if ($stmt) {
            echo json_encode(["mensaje" => "El estudio se ha borrado."]);
        } else {
            echo json_encode(["mensaje" => "Error al borrar el estudio."]);
        }
    }
?>
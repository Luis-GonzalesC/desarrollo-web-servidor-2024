<?php
    define("IVA_GENERAL",1.21);
    define("IVA_REDUCIDO",1.10);
    define("IVA_SUPERREDUCIDO",1.04);

    function calcularIva(int|float $precio, string $iva) : float{
            $pvp = match ($iva) {
                ("general") => $precio * IVA_GENERAL,
                ("reducido") => $precio * IVA_REDUCIDO,
                ("superreducido") => $precio * IVA_SUPERREDUCIDO
            };
            return $pvp;   
    }

    function example(int $entrada) : int | bool{
        if($entrada > 0){
            return $entrada;
        }else{
            return false;
        }
    }
?>
<?php
    define("IVA_GENERAL",1.21);
    define("IVA_REDUCIDO",1.10);
    define("IVA_SUPERREDUCIDO",1.04);

    function calcularIva($precio, $iva){
            $pvp = match ($iva) {
                ("general") => $precio * IVA_GENERAL,
                ("reducido") => $precio * IVA_REDUCIDO,
                ("superreducido") => $precio * IVA_SUPERREDUCIDO
            };
            return $pvp;
        
    }
?>
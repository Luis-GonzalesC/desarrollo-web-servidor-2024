<?php
    function calcularPotencia($base, $exponente){
        if($exponente == 0){
            return 1;
        }else{
            $resul = 1;
            for ($i=0; $i < $exponente; $i++) { 
                $resul *= $base;
            }
            return $resul;
        }
    }
    
?>
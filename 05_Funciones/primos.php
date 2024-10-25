<?php
    function calcularPrimo($num1, $num2){
        if($num1 != '' && $num2 != ''){
            for ($i=$num1; $i <= $num2; $i++) { 
                $esPrimo = TRUE;
                if($i <= 1) $esPrimo = FALSE;
                $j = 2;
                while($j < $i){
                    if(($i % $j == 0) && ($i != 1)) {
                        $esPrimo = FALSE;
                        $j = $i;
                    }
                    $j++;
                }
                if($esPrimo) {
                    echo "<li>$i</li>";
                }
            }
        }else{
            echo "<h1 style='color:red'>Ingrese un número para calcular el primo</h1>";
        }
        
    }
?>
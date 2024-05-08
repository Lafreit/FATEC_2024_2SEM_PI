<?php

$alfabeto = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

$numerico = array('0','1','2','3','4','5','6','7','8','9');

$aleatorio_texto_numero = 0;

for($j = 0; $j < 2; $j++){

    $senha = "";

    for($i = 0; $i < 8; $i++){

        $aleatorio_texto_numero = random_int(0, 10);
        // echo "aleatorio: ".$aleatorio_texto_numero."<br>";

        if($aleatorio_texto_numero >= 0 && $aleatorio_texto_numero < 5){

            if(($aleatorio_texto_numero % 2) == 0){


            $senha.= strtoupper($alfabeto[random_int(0, 25)]);
            }else{
                
                $senha.= $alfabeto[random_int(0, 25)];
            }

        // echo"Senha parcial Texto: ".$senha."<br>";

        }else{

            $senha.= $numerico[random_int(0, 9)];
        //  echo"Senha parcial Numero: ".$senha."<br>";
            
        }
    }   
    echo $senha."<br>";
}











?>
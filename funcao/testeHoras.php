<?php

function horasPorgurupo($horaI,$horaH) {
    $arreyHora[0] = $horaI;
    date_default_timezone_set('America/Sao_Paulo');
    IF($horaI<$horaH){    
        $h0 = $horaH - $horaI;
        echo "h0 : $h0 <br> ";
        $h1 = abs(ceil($h0 * 0.95));
         echo "h1 : $h1 <br> ";
        $h2 = abs(ceil($h1 * 60)); 
         echo "h2 : $h2 <br> ";
        $h3 = abs(ceil(($h2 * 100) / 60));
         echo "h3 : $h3 <br> ";
        $h4 = abs(ceil(($h3 / 60) * 10));
         echo "h4 : $h4 <br> <br> ";
        $horaNovaFormatada = "$horaI:00";
        for ($i = 1; $i < $h1 ; $i++) {
            $horaNova = strtotime("$horaNovaFormatada + $h4 minutes");
             // Formato o resultado
                $horaNovaFormatada = date("H:i",$horaNova);
                // Mostro na tela
                //echo "h".($i+1).":  ".$horaNovaFormatada."<br>";
                $arreyHora[$i] = $horaNovaFormatada;
                
                }  
        $arreyHora[($i)] = $horaH;
        return $arreyHora;
    } else {
        echo 'HORA HORA FINAL     <BR> '; 
}}

$horas = horasPorgurupo(19, 22);

for ($index = 0; $index < count($horas); $index++) {
    echo "Horas $index ".$horas[$index] . "<BR> ";
}
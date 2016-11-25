
        <?php
        $hi = 19;
        $hf = 22;
       
        function calculahoras($horai,$horaf) {
        $hora = $horaf - $horai;
        echo $hora;
        echo "<br>";
        $horaAula = $hora * 0.9;
        echo $horaAula; 
        echo "<br>";
        $horaAulaMinu = $horaAula * 60; 
        echo $horaAulaMinu;
        $horaPorAluno = $horaAulaMinu /3;
         echo "<br>";
        echo $horaPorAluno;
         echo "<br>";
        echo $horaPorAluno / 60;
        
        $data = date("h-m-s");
        echo $data;
}
        calculahoras($hi, $hf)
        ?>
 

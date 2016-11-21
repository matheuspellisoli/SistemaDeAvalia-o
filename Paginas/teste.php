<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        $idget = $_GET['id'];
        include '../funcao/conecta.php';
      $consulta = mysql_query("SELECT * FROM `calendario` where id = $idget");
      $linhas = mysql_num_rows($consulta);
      for($i=0; $i< $linhas; $i++){
                                    $Id = mysql_result($consulta,$i,"id");
                                    $Titulo = mysql_result($consulta,$i,"titulo");
                                    $DInicio = mysql_result($consulta,$i,"dataInicio");
                                    $DFinal=mysql_result($consulta,$i,"dataFim");
                                    $Descricao = mysql_result($consulta,$i,"descricao");
                                   
        echo "$Id , $Titulo , $DInicio , $DFinal ,$Descricao <br>";  
      }
                    ?>
       
    </body>
</html>

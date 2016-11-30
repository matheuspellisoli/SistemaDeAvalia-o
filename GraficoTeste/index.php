<?php
include './conecta.php';
include_once './phplot-6.2.0/phplot.php';
$grafico=new PHPlot(600,400);
$id=$_GET['id'];
$consulta= mysql_query("SELECT `idAvaliacao`,`nota` FROM `nota` WHERE `idUsuario` ='$id'");
$linhas = mysql_num_rows($consulta);
      for($i=0; $i< $linhas; $i++){
        $nome = mysql_result($consulta,$i,"idAvaliacao");
        $nota = mysql_result($consulta,$i,"nota");
        $dados[$i][0]="$nome";
        $dados[$i][1]=$nota;                                            
      }
$grafico->SetTitle("Notas do(a) ".$id);
$grafico->SetYTitle("Pontos");
$grafico->SetXTitle("Atividades");
$grafico->SetPlotAreaWorld(null,0,null,10.5);
$grafico->SetYTickIncrement(1);
$grafico->SetDataValues($dados);
$grafico->SetLineStyles('solid');



$grafico->DrawGraph();  
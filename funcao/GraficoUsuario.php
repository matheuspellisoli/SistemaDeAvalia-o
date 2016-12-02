<?php
include './conecta.php';
include_once '../phplot-6.2.0/phplot.php';
$grafico=new PHPlot(600,300);
$id=$_GET['id'];
$consulta= mysql_query("SELECT nota.idUsuario , calendario.titulo , usuarios.nome , nota.nota from calendario,usuarios , nota where nota.idUsuario = usuarios.idUsuario and calendario.tipo = 2 and calendario.id = nota.idAvaliacao and usuarios.idUsuario = $id");
$linhas = mysql_num_rows($consulta);
      for($i=0; $i< $linhas; $i++){
        $nome = mysql_result($consulta,$i,"calendario.titulo");
        $nota = mysql_result($consulta,$i,"nota.nota");
        $nomeUser =mysql_result($consulta,$i,"usuarios.nome");
        $dados[$i][0]="$nome";
        $dados[$i][1]=$nota;
      }
      
$grafico->SetTitle("Notas do(a) ".$nomeUser);
$grafico->SetYTitle("Pontos");
$grafico->SetXTitle("Atividades");
$grafico->SetPlotAreaWorld(null,0,null,10.5);
$grafico->SetYTickIncrement(1);
$grafico->SetDataValues($dados);
$grafico->SetLineStyles('solid');
$grafico->SetLineWidths(4);
$grafico->SetPointSizes(8);

$grafico->DrawGraph();  
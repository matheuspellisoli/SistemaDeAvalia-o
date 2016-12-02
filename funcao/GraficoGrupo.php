<?php
include './conecta.php';
include_once '../phplot-6.2.0/phplot.php';
$grafico=new PHPlot(600,300);
$id=$_GET['id'];
$consulta= mysql_query("SELECT `id` FROM `calendario` WHERE `tipo`=2 and `grupo`=$id");
$linhas = mysql_num_rows($consulta);
      for($i=0; $i< $linhas; $i++){
           $idAvaliacao= mysql_result($consulta,$i,"id");
        //---------------------------------------------
        $consulta1= mysql_query("SELECT nota.idUsuario , calendario.titulo , usuarios.nome , nota.nota,grupos.nome from calendario,usuarios , nota,grupos where nota.idUsuario = usuarios.idUsuario and calendario.tipo = 2 and calendario.id = nota.idAvaliacao and usuarios.idgrupo =grupos.idGrupo and nota.idAvaliacao= '$idAvaliacao'");
        $linhas1 = mysql_num_rows($consulta1);
        for($x=0; $x< $linhas1; $x++){
        $nome = mysql_result($consulta1,$x,"calendario.titulo");
        $nota = mysql_result($consulta1,$x,"nota.nota");
        $nomeUser =mysql_result($consulta1,$x,"usuarios.nome");
        $nomeGrupoGraf=mysql_result($consulta1,$x,"grupos.nome");
      $dados[$i][0]="$nome";
      $dados[$i][$x+1]="$nota";
      $leg[$x]="$nomeUser";
        }
      }
$grafico->SetTitle("Notas do grupo ".$nomeGrupoGraf);
$grafico->SetYTitle("Pontos");
$grafico->SetXTitle("Atividades");
$grafico->SetLegend(array_unique($leg));
$grafico->SetPlotAreaWorld(null,0,null,10.5);
$grafico->SetYTickIncrement(1);
$grafico->SetDataValues($dados);
$grafico->SetLineStyles('solid');
$grafico->SetLineWidths(4);
$grafico->SetPointSizes(8);
$grafico->DrawGraph();  
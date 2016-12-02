<?php
include './conecta.php';
$id=1;
$consulta= mysql_query("SELECT `nome` FROM `grupos` WHERE `idGrupo` =$id");
$linhas = mysql_num_rows($consulta);
      for($i=0; $i< $linhas; $i++){
        $nomeGrupoGraf=mysql_result($consulta,$i,"nome");
        echo "$nomeGrupoGraf";
        $consulta1= mysql_query("SELECT nota.idUsuario , calendario.titulo , usuarios.nome , nota.nota,grupos.nome from calendario,usuarios , nota,grupos where nota.idUsuario = usuarios.idUsuario and calendario.tipo = 2 and calendario.id = nota.idAvaliacao and usuarios.idgrupo =grupos.idGrupo and grupos.idGrupo = $id");
        $linhas1 = mysql_num_rows($consulta1);
        for($x=0; $x< $linhas1; $x++){
        $nome = mysql_result($consulta1,$x,"calendario.titulo");
        $nota = mysql_result($consulta1,$x,"nota.nota");
        $nomeUser =mysql_result($consulta1,$x,"usuarios.nome");
        $dados[$x][0]="$nome";
        $dados[$x][$x+1]=$nota;
        echo"<br>";
        echo "$nomeUser";
        echo"<br>";
        echo "$nome";
        echo"<br>";
        echo "$nota";
        echo"<br>";

        } 
      }
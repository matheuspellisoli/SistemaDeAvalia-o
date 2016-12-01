<?php
include '../funcao/conecta.php';
$idtarefa = $_POST['id'];
$idTurma = $_POST['idTurma'];
$notas = $_POST['nota'];
$idgrupo = $_POST['idgrupo'];

$sql_user = mysql_query("SELECT * FROM `usuarioinfo` WHERE  idturma = 
        $idTurma and nivelAcesso_idnivelAcesso = 1  and idGrupo = $idgrupo  ORDER BY `nome` ASC");

        $consulta = mysql_query("SELECT * FROM `usuarioinfo` WHERE  idturma = $idTurma and nivelAcesso_idnivelAcesso = 1  and idGrupo = $idgrupo  ORDER BY `nome` ASC");
         $linhas = mysql_num_rows($consulta);        
        for($j=0; $j< $linhas; $j++){
				$idaluno[$j] = mysql_result($consulta,$j,"idUsuario");
                                 $nome[$j] = mysql_result($consulta,$j,"nome");        
        }
     echo "Tarefa $idtarefa <br>";
     echo "Turma $idTurma <br>";
for ($i = 0; $i < count($notas); $i++) {
    $sql = (" INSERT INTO `nota`(`idNota`, `idAvaliacao`, `idUsuario`, `nota`)
            VALUES ('null','$idtarefa','$idaluno[$i]','$notas[$i]');");
    mysql_query("$sql") or die (mysql_error());  
echo "  ($idtarefa,$idaluno[$i],$notas[$i]) <br>";
}
 $sql2 = ("UPDATE `calendario` SET `nota`='1' WHERE `id` = '$idtarefa';");
    mysql_query("$sql2") or die (mysql_error());
    
header("Location:..//Paginas/tarefaVerDetalhes.php?id=$idtarefa&&idTurma=$idTurma");   
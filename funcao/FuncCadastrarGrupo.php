<?php
include '../funcao/conecta.php';

$nome = $_POST['nome'];
$idTurma = $_POST['idTurma'];


$sql = "INSERT INTO `grupos`(`idGrupo`, `idTurma`, `nome`, `numeroIntegrantes`)
                            VALUES ('null','$idTurma','$nome','1000')";
mysql_query("$sql") or die (mysql_error());  
header('Location:..//Paginas/PaginaDaTurma.php?idTurma='.$idTurma);   


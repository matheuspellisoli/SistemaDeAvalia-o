<?php
include '../funcao/conecta.php';

$iduser = $_POST['UserId'];
$idTurma = $_POST['idTurma'];
$idgrupo = $_POST['grupo'];
$sql = "UPDATE `usuarios` SET`idgrupo`= $idgrupo WHERE `idUsuario` = $iduser";
mysql_query("$sql") or die (mysql_error());  
header('Location:..//Paginas/PaginaDaTurma.php?idTurma='.$idTurma);   


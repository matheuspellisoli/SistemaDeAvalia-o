<?php
include '../funcao/conecta.php';

$idTarefa = $_POST['idTarefa'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$grupo = $_POST['id'];
$idTurma = $_POST['idTurma'];

   $sql2 = "UPDATE `calendario` SET `titulo`='$titulo',`descricao`='$descricao',
                                    `cor`='#FF0000',`tipo`= '2',
                                    `grupo`='$grupo'
                                    WHERE `id`= $idTarefa";
//executamos a instução SQL
    mysql_query("$sql2") or die (mysql_error()); 
    
   header('Location:..//Paginas/PaginaDaTurma.php?idTurma='.$idTurma);        

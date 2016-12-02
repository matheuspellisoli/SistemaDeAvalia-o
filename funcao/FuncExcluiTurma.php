<?php
include '../funcao/conecta.php';

$idTurma = $_POST['id'];

$sql5 = "DELETE FROM `calendario` WHERE `turma` =  $idTurma";
//executamos a instução SQL
    mysql_query("$sql5") or die (mysql_error()); 
    

$sql3 = "DELETE FROM `grupos` WHERE `idTurma` = $idTurma";
//executamos a instução SQL
    mysql_query("$sql3") or die (mysql_error()); 
    
    $sql7 = "DELETE FROM `nota` WHERE `turma`= $idTurma";
//executamos a instução SQL
    mysql_query("$sql7") or die (mysql_error()); 
    
       $sql4 = "DELETE FROM `usuarios` WHERE `idturma`= $idTurma";
//executamos a instução SQL
    mysql_query("$sql4") or die (mysql_error()); 



   $sql2 = "DELETE FROM `turma` WHERE `id`= $idTurma";
//executamos a instução SQL
    mysql_query("$sql2") or die (mysql_error()); 
    
      
    
   header('Location:../Paginas/PaginaDoProfessor.php');     


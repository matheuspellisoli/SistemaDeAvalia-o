<?php
include '../funcao/conecta.php';

$idTurma = $_POST['id'];

echo "Nome $nome / id $idTurma";

   $sql2 = "DELETE FROM `turma` WHERE `id`= $idTurma";
//executamos a instução SQL
    mysql_query("$sql2") or die (mysql_error()); 
    
   header('Location:../Paginas/PaginaDoProfessor.php');     


<?php
include '../funcao/conecta.php';
$resposta = $_POST['pergunta'];
$Idusuer = $_POST['idUser'];

   $sql2 = "INSERT INTO `forumpergunta` (`idpergunta`, `descricao`, `idturma`, `data`, `Idusuer`)
       VALUES (NULL, '$resposta', '0', CURRENT_TIMESTAMP, '$Idusuer')";
//executamos a instução SQL
   
  mysql_query("$sql2") or die (mysql_error()); 
    
header('Location:../Paginas/Forum.php');     

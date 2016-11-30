<?php
include '../funcao/conecta.php';
$idpergunta = $_POST['idPergunta'];
$resposta = $_POST['resposta'];
$Idusuer = $_POST['idUser'];

   $sql2 = "INSERT INTO `forumresposta` (`idpergunta`, `resposta`, `Iduser`) "
           . "VALUES ('$idpergunta', '$resposta','$Idusuer')";
//executamos a instução SQL
   
  mysql_query("$sql2") or die (mysql_error()); 
    
header('Location:../Paginas/Forum.php');     

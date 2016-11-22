<?php
include '../funcao/conecta.php';

$nome = $_POST['nome'];
$idTurma = $_POST['id'];

echo "Nome $nome / id $idTurma";

if(file_exists($file_tmp = $_FILES["file"]["tmp_name"] )){ 
$file_tmp = $_FILES["file"]["tmp_name"];
 //NOME DO ARQUIVO NO COMPUTADOR
$file_name = $_FILES["file"]["name"];
//TAMANHO DO ARQUIVO
$file_size = $_FILES["file"]["size"];
//MIME DO ARQUIVO
$file_type = $_FILES["file"]["type"];
 

//antes de ler o conteudo do arquivo você pode fazer upload para compactar em .ZIP ou .RAR, no caso de imagem você poderá redimensionar o tamanho antes de gravar no banco. Claro que depende da sua necessidade.
 
//Para fazer UPLOAD poderá usar COPY ou MOVE_UPLOADED_FILE
//copy($file_tmp, "caminho/pasta/$file_name");
//move_uploaded_file($file_tmp,"caminho/pasta/$file_name");
 
//lemos o  conteudo do arquivo usando afunção do PHP  file_get_contents
$binario = file_get_contents($file_tmp);
// evitamos erro de sintaxe do MySQL
$binario = mysql_real_escape_string($binario);

//montamos o SQL para envio dos dados
$sql1 = "UPDATE `turma` SET `nome`='$nome',`tipo_img`='$file_type',`binario`='$binario' WHERE `id`= $idTurma";
//executamos a instução SQL
    mysql_query("$sql1") or die (mysql_error());
    
    header('Location:..//Paginas/PaginaDaTurma.php?idTurma='.$idTurma); 
                    }  else {
   $sql2 = "UPDATE `turma` SET `nome`='$nome' WHERE `id`= $idTurma";
//executamos a instução SQL
    mysql_query("$sql2") or die (mysql_error()); 
    
   header('Location:..//Paginas/PaginaDaTurma.php?idTurma='.$idTurma);     
}

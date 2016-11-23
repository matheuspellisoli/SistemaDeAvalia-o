<?php
global $con;
$con = mysqli_connect('localhost','root','260398');
if (!$con){
die('Não pode conectar:' .mysql_error($con));
}

$id=$_GET['id'];
mysqli_select_db($con,"banca");
$sql=("SELECT `id`, `titulo` as `title`,`dataInicio` as `start`, `dataFim` as `end`, `cor` as `color`, `url`FROM `calendario` WHERE `turma` ='$id'");
$result = mysqli_query($con,$sql);
while($resultado = mysqli_fetch_assoc($result) ){
     $vetor[] = array_map('utf8_encode', $resultado); 
    }    
    //Passando vetor em forma de json
    echo json_encode($vetor);     





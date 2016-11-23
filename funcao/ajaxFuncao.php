<?php
global $con;
$con = mysqli_connect('localhost','root','260398');
if (!$con){
die('Não pode conectar:' .mysql_error($con));
}
mysqli_select_db($con,"banca");
if(!isset($_POST['parm'])){
call_user_func($_POST['func']);
}else{
    call_user_func_array($_POST['func'],($_POST['parm']));
}

function TurmasCalendario($id){ 
global $con;
$sql=("SELECT * FROM `calendario` where `turma` = '$id'");
$result = mysqli_query($con,$sql);
while($resultado = mysqli_fetch_assoc($result) ){
     $vetor[] = array_map('utf8_encode', $resultado); 
}
 echo json_encode($vetor);   
}

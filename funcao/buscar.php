<?php
global $con;
$con = mysqli_connect('localhost','root','260398');
if (!$con){
die('Não pode conectar:' .mysql_error($con));
}
mysqli_select_db($con,"testeSelctsCareg");
if(!isset($_POST['parm'])){
call_user_func($_POST['func']);
}else{
    call_user_func_array($_POST['func'],($_POST['parm']));
}
function buscarTurmas(){ 
global $con;
$sql=("SELECT * FROM `turmas`");
$result = mysqli_query($con,$sql);
while($resultado = mysqli_fetch_assoc($result) ){
     $vetor[] = array_map('utf8_encode', $resultado); 
    }    
    //Passando vetor em forma de json
    echo json_encode($vetor);   
}
function buscarGrupos($id){
     global $con;
$sql=("SELECT * FROM `grupos` WHERE `idTurma` ='$id'");
$result = mysqli_query($con,$sql);
while($resultado = mysqli_fetch_assoc($result) ){
     $vetor[] = array_map('utf8_encode', $resultado); 
    }    
    //Passando vetor em forma de json
    echo json_encode($vetor);   
}
function buscarUsuarios($id){
     global $con;
$sql=("SELECT `idUsuario`, `nomeUsuario` FROM `usuario` WHERE `idGrupo` ='$id'");
$result = mysqli_query($con,$sql);
while($resultado = mysqli_fetch_assoc($result) ){
     $vetor[] = array_map('utf8_encode', $resultado); 
    }    
    //Passando vetor em forma de json
    echo json_encode($vetor);   
}
function buscarNotas($id){
     global $con;
$sql=("SELECT * FROM `notas` WHERE `idUsuario` ='$id'");
$result = mysqli_query($con,$sql);
while($resultado = mysqli_fetch_assoc($result) ){
     $vetor[] = array_map('utf8_encode', $resultado); 
    }    
    //Passando vetor em forma de json
    echo json_encode($vetor);     
}
function buscarNotasN($id){
     global $con;
$sql=("SELECT `nota` as y from `notas` WHERE `idUsuario` ='$id' order by idUsuario");
$result = mysqli_query($con,$sql);
while($resultado = mysqli_fetch_assoc($result) ){
     $vetor[] = array_map('utf8_encode', $resultado); 
    }    
    //Passando vetor em forma de json
    echo json_encode($vetor);     
}
function buscarNotasNU($id){
     global $con;
$sql=("SELECT `idNota` as id,`nota` as y from `notas` WHERE `idUsuario` ='$id' order by id desc LIMIT 0,1");
$result = mysqli_query($con,$sql);
while($resultado = mysqli_fetch_assoc($result) ){
     $vetor[] = array_map('utf8_encode', $resultado); 
    }    
    //Passando vetor em forma de json
    echo json_encode($vetor);     
}




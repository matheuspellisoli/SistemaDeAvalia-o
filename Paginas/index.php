<?php 
$erro=0;
if(!empty($_GET['erro'])){ 
$erro=$_GET['erro'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="httss://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        <div class="jumbotron text-center">
  <h1>Sistema de avaliação</h1>
  <p>Faça login para acessar o sistema de avaliação.</p> 
</div>
<div class=" col-lg-12">
            <div class=" col-lg-4"></div>
            <div class=" col-lg-4">     
                 <?php
           if($erro==='0110'){
           echo"<div class='alert alert-danger' style='width:100%;' align='center'>
               !! Faça Login antes de acessar outras páginas !!
           </div> ";
           }
           if($erro==='1001'){
           echo"<div class='alert alert-danger' style='width:100%;' align='center'>
               !! Email incorreto !!
           </div> ";
           }
            if($erro==='0101'){
           echo"<div class='alert alert-danger' style='width:100%;' align='center'>
               !! Senha incorreto !!
           </div> ";
           }
            if($erro==='1010'){
           echo"<div class='alert alert-success' style='width:100%;' align='center'>
               !! Você saiu com sucesso !!
           </div> ";
           }
            if($erro==='1100'){
           echo"<div class='alert alert-danger' style='width:100%;' align='center'>
               !!  Acesso bloqueado !!
           </div> ";
           }
                   ?>
                <form action="../funcao/funcLogin.php" method="post">
           <h2>Login</h2>
          
  <div class="form-group">
    
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    
      <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
  </div>
  
           <button name="Entrar" type="submit" class="btn btn-default col-sm-3" style="float: right">Logar</button>
</form>
                </div>
            <div class=" col-lg-4"></div>
        </div>

       
    </body>
</html>
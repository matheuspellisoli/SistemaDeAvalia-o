<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
   <meta charset="UTF-8">
        <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script language="javascript" src="../funcao/javaScript.js"></script>
  <link href='../fullcalendar-3.0.1/fullcalendar.css' rel='stylesheet' />
  <link href='../fullcalendar-3.0.1/fullcalendar.print.css' rel='stylesheet' media='print' />
  <script src='../fullcalendar-3.0.1/lib/moment.min.js'></script>
  <script src='../fullcalendar-3.0.1/lib/jquery.min.js'></script>
  <script src='../fullcalendar-3.0.1/fullcalendar.min.js'></script>
  
        <title></title>
        
    </head>
    <body>
       
        
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">Logo</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="../Paginas/PaginaDoProfessor.php" >Home</a></li>
      <li><a href="#">forum</a></li>
      <li><a href="#">Page 2</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user disabled" style="margin-right:8px;"></span><?php echo "Tiago Marques alves";?></a></li>
        <li><a href="#"><span class="glyphicon glyphicon glyphicon-log-in disabled" style="margin-right:8px;"></span>Sair</a></li>
    </ul>
  </div>
</nav>
        
      <?php
       // header("Content-Type: text/html; charset=ISO-8859-1", true);
        include '../funcao/conecta.php';        
       $IdTurma = 20; 
        if ($_GET["pag"]){
                    $pagatual = $_GET["pag"];                    
                }  else {
                header("Location:../Paginas/forum.php?pag=1");
                }                      
                    $qtitenspag = 4;                    
                              
           
      ?>
        
        
        <div class="col-lg-12" style="margin-top: 5%">
    <div class="col-lg-2"></div>
            <div class="panel panel-default col-lg-8">
                <div class="panel-body" style="text-align:center;"><h3>Forum</h3></div>
            </div>
    
    <?php    
    $consulta = mysql_query("SELECT * FROM `forumpergunta` WHERE `idturma`= $IdTurma ORDER BY `forumpergunta`.`data` DESC ");
                    $linhas = mysql_num_rows($consulta);
                //quantidade de conteudo exibido por pagina		
                
		$qtpaginas = ceil($linhas/$qtitenspag);		 
                    
                    $aPartirDeQual = ($qtitenspag * ($pagatual-1));
 
                $terminaEm = $aPartirDeQual+$qtitenspag;
		if($terminaEm > $linhas){
			$terminaEm = $linhas;
                }
    
    ?>
    <?php                   if ($linhas>0 ){
		//echo "$aPartirDeQual - $terminaEm";
			//selecione no banco as tabelas que deseja exibir
			for($i=$aPartirDeQual; $i< $terminaEm; $i++){	
                            $pergunta = mysql_result($consulta,$i,"descricao");
                            $idpergunta = mysql_result($consulta,$i,"idpergunta");
                            
    ?>
    <div class="col-lg-12"> 
        <div class="col-lg-1"></div>
        <div class="col-lg-10"> 
            
            <div class="container panel panel-default" style="padding: 1%   "> 
  <!-- Left-aligned media object -->
  <div class="media">
    <div class="media-left">
        <img src="../user.jpg" class="media-object" style="width:60px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Tiago marcos alves</h4>
      <p><?php echo "$pergunta";  ?></p>
    </div>
  </div>
  <hr>
  <?php
   $sql_user = mysql_query("SELECT * FROM `forumresposta` WHERE `idpergunta` = $idpergunta ");
        while ($resp = mysql_fetch_object($sql_user)) {
            $resposta = $resp->resposta;
            ?>
  <!-- Right-aligned media object -->
  <div class="media">
    <div class="media-body">
      <h4 class="media-heading">Right-aligned</h4>
    <p><?php echo "$resposta";  ?></p>  
    </div>
    <div class="media-right">
        <img src="../user.jpg" class="media-object" style="width:60px">
    </div>
  </div>
  <hr>
      <?php 
       
                   }
                   
 				
  ?>
</div>
    </div>
        </div>
      <?php 
       
                   }
                   }
 				
  ?>
   <div class="col-sm-12" align="center">
 
  <nav aria-label="Page navigation">
      <div style="margin:0 auto">
  <ul class="pagination pagination-lg">
         
    <?php        
    if ($pagatual > 1 ) {
         ?>
      <li>
      <a href="../Paginas/forum.php?pag=<?php echo $pagatual -1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
     
       <?php        
     }     
 for ($i = 1; $i <= $qtpaginas; $i++) {
     
     if ($pagatual == $i){      
   ?>  
      <li class="active"><a href="../Paginas/forum.php?pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
            <?php }  else {
 ?>
      <li><a href="../Paginas/forum.php?pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
    
 <?php } }
    if ($pagatual != $qtpaginas ) {
         ?>
      <li>
      <a href="../Paginas/forum.php?pag=<?php echo $pagatual +1;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
     
       <?php 
     }
 ?>    
  </ul>
      </div>
</nav>

  </div>
     
    
    </div>
</body>
</html>


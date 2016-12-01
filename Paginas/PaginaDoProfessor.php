<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
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
      <li><a href="../Paginas/forum.php">forum</a></li>
      <li><a href="#">Page 2</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user disabled" style="margin-right:8px;"></span><?php echo "Tiago Marques alves";?></a></li>
        <li><a href="#"><span class="glyphicon glyphicon glyphicon-log-in disabled" style="margin-right:8px;"></span>Sair</a></li>
    </ul>
  </div>
</nav>
       
      <?php
        header("Content-Type: text/html; charset=ISO-8859-1", true);
        include '../funcao/conecta.php';        
        
        if ($_GET["pag"]){
                    $pagatual = $_GET["pag"];                    
                }  else {
                  header("Location:../Paginas/PaginaDoProfessor.php?pag=1");
                }
                
        if ($_GET["pag"] == 1){
                    $qtitenspag = 11;                    
                }  else {
                  $qtitenspag = 12;
                }              
           
      ?>
        
        
        <div class="col-lg-12" style="margin-top: 5%">
    <div class="col-lg-2"></div>
            <div class="panel panel-default col-lg-8">
                <div class="panel-body" style="text-align:center;"><h3>Turmas</h3></div>
            </div>
    <?php
    if ($_GET["pag"] == 1){
    ?>
     <!--inicio bloco de turmas--> 
   <div class="panel-group col-lg-4">
     
    <div class="panel panel-default">
        <div class="panel-heading col-lg-12">
             <div class="col-lg-5"  style="margin:5% ; font-size: 380%" >          
                 <span class="glyphicon glyphicon glyphicon-plus " style="margin-left:20%;"></span>      </div>            
            <div class="col-lg-5" style="margin-top: 15%;">          
           <h4>Nova Turma</h4>
      </div>   
        </div> 
        <div class="panel-body" style="margin-top: 1% ;" >
          <div class="col-lg-12"   > 
                            <div class="col-lg-12" style="margin-bottom: 1.5%"><h4>Adicionar uma nova turma</h4></div>              
        </div> 
          <div class="col-lg-12" > 
              <form action="../Paginas/CadastrarTurma.php" method="get">                                    
                  <button  accept="" type="submit" class="btn btn-default col-lg-12" >Adionar turma</button>              
              </form>           
        </div> 
          </div>
    </div>
    <div class="col-lg-2"></div>       
        </div>
     <!--fim do bloco de turmas-->
    <?php
    }
    $consulta = mysql_query("SELECT * FROM `turma` where idOrientador = 2 ");
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
				$IdTurma = mysql_result($consulta,$i,"id");
                                $nomeTurma = mysql_result($consulta,$i,"nome");
                ?>
    <!--inicio bloco de turmas--> 
   <div class="panel-group col-lg-4">
     
    <div class="panel panel-default">
        <div class="panel-heading col-lg-12">
             <div class="col-lg-5"  style="margin:5%" >          
                 <img  class="img-responsive  col-lg-10 img-circle" src="imgTurma.php?codigo=<?php echo"$IdTurma";?>"/>
      </div>            
            <div class="col-lg-4" style="margin-top: 15%;">          
           <h4><?php echo "$nomeTurma";?></h4>
      </div>   
        </div> 
        <div class="panel-body" style="margin-top: 5 " >
          <div class="col-lg-12" > 
              <div class="col-lg-3"><h4>Orientador:</h4></div>
              <div class="col-md-7"></div>
              <div class="col-lg-7"><h4><?php echo "Tiago Marques alves";?></h4></div>              
        </div> 
          <div class="col-lg-12" > 
              <form action="../Paginas/PaginaDaTurma.php" method="get">
                  <input type="hidden" name="idTurma" value="<?php echo "$IdTurma";?>">    
                  
                  <button  accept="" type="submit" class="btn btn-default col-lg-12" >Ver detalhes</button>              
              </form>           
        </div> 
          </div>
    </div>
    <div class="col-lg-2"></div>       
        </div>
     <!--fim do bloco de turmas--> 
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
      <a href="../Paginas/PaginaDoProfessor.php?pag=<?php echo $pagatual -1;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
     
       <?php        
     }     
 for ($i = 1; $i <= $qtpaginas; $i++) {
     
     if ($pagatual == $i){      
   ?>  
      <li class="active"><a href="../Paginas/PaginaDoProfessor.php?pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
            <?php }  else {
 ?>
      <li><a href="../Paginas/PaginaDoProfessor.php?pag=<?php echo "$i";?>"><?php echo "$i";?></a></li>
    
 <?php } }
    if ($pagatual != $qtpaginas ) {
         ?>
      <li>
      <a href="../Paginas/PaginaDoProfessor.php?pag=<?php echo $pagatual +1;?>" aria-label="Next">
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

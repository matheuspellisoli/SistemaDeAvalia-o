<!DOCTYPE html>
<html>
<head>
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
    <script src='../ckeditor/ckeditor.js'></script>
</head>
<body>
    <?php
    $pergunta = $_POST['pergunta'];
    $Idusuer = 2;
    $idPergumta = $_POST['idPergunta'];   
   
    ?>
          
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
    <div class="col-lg-12" style="margin-top: 5%">   
        <div class="col-lg-1" ></div>
        <div class="panel panel-body col-lg-10">      
      <p><?php echo "$pergunta"?></p>
    </div>        
        <div class="col-lg-1" ></div>
        <div class="col-lg-2" ></div>
         <div class="col-lg-8">
             <form method="post" class="col-lg-12" action="../funcao/FuncRespondeForum.php">        
            <textarea name="resposta" id="editor1"></textarea>
            <script>
                CKEDITOR.replace( 'resposta' );
            </script>       
            
            <button class="col-lg-12 btn btn-default" type="submit">Responder</button>
            <input type="hidden" name="idUser" value="<?php echo "$Idusuer";  ?>">
            <input type="hidden" name="idPergunta" value="<?php echo "$idPergumta";  ?>">
    </form>
             </div>
        <div class="col-lg-2"></div>
        </div>
</body>
</html>
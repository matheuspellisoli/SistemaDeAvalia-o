<?php 
include '../funcao/conecta.php';
session_start();

        if (!isset($_SESSION['Login'])) {
               
            die(header('Location:../Paginas/index.php?erro=0110'));
                
        }
         if ($_SESSION['nivel']!='2' && $_SESSION['nivel']!='1'){
               
            die(header('Location:../Paginas/index.php?erro=1100'));         
        }
        
       $nivel = $_SESSION['nivel'];
        if ($nivel == 1) {
    $home = '../Paginas/PaginaDoAluno.php';
}  else {
    $home = '../Paginas/PaginaDoProfessor.php';
}
?>
<html>
<head>
            <title>Sistema de avaliação</title>
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
    $Idusuer = $_SESSION['id'];     
   
    ?>
          
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class=""><a href="<?php echo "$home";  ?>" >Home</a></li>
      <li><a href="../Paginas/forum.php">forum</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user disabled" style="margin-right:8px;"></span><?php echo $_SESSION['nome'];?></a></li>
        <li><a href="../funcao/sair.php"><span class="glyphicon glyphicon glyphicon-log-in disabled" style="margin-right:8px;"></span>Sair</a></li>
    </ul>
  </div>
</nav>
    <div class="col-lg-12" style="margin-top: 5%">   
        <div class="col-lg-1" ></div>
        <div class="panel panel-body col-lg-10">      
            <p style="text-align: center; font-size: 150%">Faça sua pergunta</p>
    </div>        
        <div class="col-lg-1" ></div>
        <div class="col-lg-2" ></div>
         <div class="col-lg-8">
             <form method="post" class="col-lg-12" action="../funcao/FuncPerguntarForum.php">        
            <textarea name="pergunta" id="editor1"></textarea>
            <script>
                CKEDITOR.replace( 'pergunta' );
            </script>       
            
            <button class="col-lg-12 btn btn-default" type="submit">Fazer pergunta</button>
            <input type="hidden" name="idUser" value="<?php echo "$Idusuer";  ?>">         
    </form>
             </div>
        <div class="col-lg-2"></div>
        </div>
</body>
</html>
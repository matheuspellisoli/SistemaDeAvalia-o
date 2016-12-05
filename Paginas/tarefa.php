<?php 
include '../funcao/conecta.php';
session_start();

        if (!isset($_SESSION['Login'])) {
               
            die(header('Location:../Paginas/index.php?erro=0110'));
                
        }
          if ($_SESSION['nivel']!='2'){
               
            die(header('Location:../Paginas/index.php?erro=1100'));         
        }
?>
<html>
     <?php
          $IdTurma = $_GET['idTurma'];
          $id = $_GET['id'];
                    ?>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
                    <title>Sistema de avaliação</title>

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
    <script src='../ckeditor/ckeditor.js'></script>
 
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class=""><a href="../Paginas/PaginaDoProfessor.php" >Home</a></li>
      <li><a href="../Paginas/forum.php">forum</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user disabled" style="margin-right:8px;"></span><?php echo $_SESSION['nome'];?></a></li>
        <li><a href="../funcao/sair.php"><span class="glyphicon glyphicon glyphicon-log-in disabled" style="margin-right:8px;"></span>Sair</a></li>
    </ul>
  </div>
</nav>
        <div class=" col-lg-12">
            <div class=" col-lg-2"></div>
            <div class=" col-lg-8">
            <div class="form-group"> 
                <h2>Criar tarefa</h2>
                <form method="Post" enctype="multipart/form-data" action="../funcao/FuncCriaTarefa.php">
            <div class="col-lg-12" style="margin-top: 1% ">
            <label for="titulo" style="margin-top: 1%" >Nome da tarefa</label>
        <input type="text"  name="titulo" class="form-control" id="email" >
            </div>
                    <label for="descricao" style="margin-top: 1%" >Descrição da tarefa </label>
                   
        
         <textarea name="descricao" id="editor1"></textarea>
            <script>
                CKEDITOR.replace( 'descricao' );
            </script> 
            <label for="avaliacao" style="margin-top: 1% ">Essa tarefa ira contar pontos?</label>
            <select name="avaliacao"  class="form-control">
                <option value="2">Vale pontos de 0 até 10</option>
                <option value="1">Não vale pontos</option>
            </select>
               <label for="descricao" style="margin-top: 1%" >Grupo resonsavel pela realixação da tarefa</label>
            <select name="grupo"  class="form-control">
                <?php
                        $sql5 = mysql_query("SELECT * FROM `grupos` where idTurma = $IdTurma ");
                    while ($estado = mysql_fetch_object($sql5)) {
                        $estado_id = $estado->idGrupo;
                        $estado_desc = $estado->nome;
                        echo "<option value='$estado_id'>$estado_desc</option> ";
                    }
                    ?>
            </select>
               <input type="hidden" name="idTarefa" value="<?php echo "$id"; ?>" >    
                  <input type="hidden" name="idTurma" value="<?php echo "$IdTurma"; ?>" > 
            
             <input type="submit" class="btn btn-default  col-lg-12" style="margin-top: 2%;margin-bottom: 5%" value="Resgistrar tarefa">
       </form>
     </div>
           </div>
            <div class=" col-lg-2"></div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>


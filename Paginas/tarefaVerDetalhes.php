<?php 
include '../funcao/conecta.php';
session_start();
if ($_SESSION['nivel']===2) {
        if (!isset($_SESSION['Login'])) {
               
            die(header('Location:../Paginas/index.php?erro=0110'));
                
        }
        die(header('Location:../Paginas/index.php?erro=0110'));
}
        ?>
<html>
     <?php
          $idTurma =$_GET['idTurma'];
          $id = $_GET['id'];
          
          
          $sql_tarefa = mysql_query("SELECT * FROM `calendario` WHERE `id` = $id and `turma`= $idTurma");
        while ($tarefa = mysql_fetch_object($sql_tarefa)) {
            $titulo = $tarefa->titulo;
            $descricao = $tarefa->descricao;
            $dataI= $tarefa->dataInicio;
            $dataF= $tarefa->dataFim;
            $horaf= $tarefa->horaF;
            $hora= $tarefa->hora;
            $tipo= $tarefa->tipo;
            $grupo= $tarefa->grupo;
            $nota= $tarefa->nota;
        }
                    ?>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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
    <div class="navbar-header">
      <a class="navbar-brand" href="">Logo</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="../Paginas/PaginaDoProfessor.php" >Home</a></li>
      <li><a href="../Paginas/forum.php">forum</a></li>
      <li><a href="#">Page 2</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user disabled" style="margin-right:8px;"></span><?php echo $_SESSION['nome'];?></a></li>
        <li><a href="../funcao/sair.php"><span class="glyphicon glyphicon glyphicon-log-in disabled" style="margin-right:8px;"></span>Sair</a></li>
    </ul>
  </div>
</nav>        
            <div class="col-lg-12" style="margin-top: 5%">
    <div class="col-lg-2"></div>
            <div class="panel panel-default col-lg-8">
                <div class="panel-body" style="text-align:center;"><h3>Detalhes da tarefa </h3></div>
                 
            </div>
    
    <div class="col-lg-12" >
    <div class="col-lg-2"></div>
            <div class=" col-lg-8">
               <form action="../Paginas/PaginaDaTurma.php?idTurma=<?php echo $idTurma;?>" style="margin:1%" method="post">          
      <button class="col-lg-12 btn btn-default" type="submit">Voltar para pagina da turma</button>
      
  </form> 
            </div>
    </div>
     
           <div class="col-lg-2"></div>
           
            <div class="col-lg-12">
                <div class="col-lg-2"></div>
    <div class="col-lg-8">
                <div class="" style="text-align:center;"><h3><?php echo $titulo;?></h3></div>
            </div>
            </div>
           
           <div class="col-lg-12">
                <div class="col-lg-2"></div>
    <div class="col-lg-8">
                <div class="panel panel-default">
  <div class="panel-heading">Descrição</div>
  <div class="panel-body"><?php echo $descricao;?></div>
</div>
            </div>
   
        </div>
           <div class="col-lg-12">
                <div class="col-lg-2"></div>
    <div class="col-lg-8">
                <div class="panel panel-default">
  <div class="panel-heading">Data e Horarios</div>
  <div class="panel-body">DATA:  <?php echo $dataI;?></div>
 <!--<?php echo $dataF;?>-->
  <hr>
  <div class="panel-body">HORA: <?php echo $hora;?> --- <?php echo $horaf;?></div></div>
</div>
            </div>
   
        </div>
         <div class="col-lg-12">
                <div class="col-lg-2"></div>
    <div class="col-lg-8">
                <div class="panel panel-default">
  <div class="panel-heading">Alunos</div>
  <div class="panel-body">
      <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Grupo</th>
        <th>Nota</th>  
      </tr>
    </thead>
    <tbody>
    <form method="Post" enctype="multipart/form-data" action="../funcao/FuncNotaAvaliacao.php">
        
        
        
        <?php
        $sql_user = mysql_query("SELECT * FROM `usuarioinfo` WHERE  idturma = $idTurma and nivelAcesso_idnivelAcesso = 1  and idGrupo = $grupo  ORDER BY `nome` ASC");
        while ($User = mysql_fetch_object($sql_user)) {
            $UserId = $User->idUsuario;
            $UserNome = $User->nome;
            $Useremail= $User->email;
            $Usergrup= $User->grupo;
        
?>    
      <tr>
          <td><?php echo $UserId;?></td>
        <td><?php echo $UserNome;?></td>
        <td><?php echo $Useremail;?></td>
         <td><?php echo $Usergrup;?></td>
         <td>
             <?php 
             if ($nota == 0 ) { 
                 if ($tipo == 2) { 
             ?>
              
                     <select name="nota[]" class="form-control">
            <?php 
                    for ($notai = 0; $notai < 11; $notai++) {
                     echo "<option value='$notai'>$notai</option>";
                    }
                    
                      ?>
            </select>
                 <?php
                 } else {
                       echo "Tarefa não vale pontos";
                 }
                
                 } else {
                        $sql8 = mysql_query("SELECT * FROM `nota` WHERE idAvaliacao = $id and idUsuario = $UserId");
                    while ($notasql = mysql_fetch_object($sql8)) {                        
                        $userNota = $notasql->nota;                        
                        }                     
                     ?>
                  <?php echo $userNota;?>
                 
                  <?php 
                 }
                 
                 ?>
         </td>  
          
      </tr>
     <?php }?>
    </tbody>    
  </table>
      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
      <input type="hidden" name="idTurma" value="<?php echo $idTurma; ?>"/>
      <input type="hidden" name="idgrupo" value="<?php echo $grupo; ?>"/>
      <?php 
      if ($nota == 0 ) {
           if ($tipo == 2 ) {
          ?>
      
      <button  accept="" type="submit" class="btn btn-default col-lg-12" >Avaliar</button>
      <?php 
      }
      }
          ?>
       </form>
  </div>
</div>
            </div>
   
        </div>
           
           
        </body>
</html>

            
            
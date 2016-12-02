<?php 
include '../funcao/conecta.php';
session_start();

        if (!isset($_SESSION['Login'])) {
               
            die(header('Location:../Paginas/index.php?erro=0110'));
                
        }
          if ($_SESSION['nivel']!='1'){
               
            die(header('Location:../Paginas/index.php?erro=1100'));         
        }
?>
    <html>
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
<?php
        $idSUser = $_SESSION['id'];
        include '../funcao/conecta.php';
      ?>
        
<script>

	$(document).ready(function() {
         var initialLocaleCode = 'es';
        $('#calendar').fullCalendar({
			header: {
				left: 'title ,prev,next ',
				center: 'today',
				right: ''
			},                        
			defaultDate: '<?php echo date("Y-m-d");?>',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
                        locale:initialLocaleCode,
			events: [
<?php 
  $sql_user = mysql_query("SELECT * FROM `usuarioinfo` WHERE  idUsuario = $idSUser  ORDER BY `nome` ASC");
        while ($User = mysql_fetch_object($sql_user)) {
            $UserId = $User->idUsuario;
            $UserNome = $User->nome;
            $Useremail= $User->email;
            $Usergrup= $User->idgrupo;
            $UserTurma= $User->idturma;
            
        }
$eventos;
$consulta = mysql_query("SELECT * FROM `calendario` WHERE `grupo` = $Usergrup ");
$linhas = mysql_num_rows($consulta);
for ($i = 0; $i < $linhas; $i++) {
    $Id = mysql_result($consulta, $i, "id");
    $Titulo = mysql_result($consulta, $i, "titulo");

    $DInicio = mysql_result($consulta, $i, "dataInicio");
    $DFinal = mysql_result($consulta, $i, "dataFim");
    $color = mysql_result($consulta, $i, "cor");
    $hora = mysql_result($consulta, $i, "hora");
    $horaf = mysql_result($consulta, $i, "horaf");
    $tipo = mysql_result($consulta, $i, "tipo");
    ?>
    <?php echo "{"; ?>
    <?php echo "id: $Id,"; ?>
    <?php echo "title:'$Titulo',"; ?>
    <?php echo "start:'$DInicio" . "T$hora:00' ,"; ?>
    <?php echo "end:'$DFinal" . "T$horaf:00' ,"; ?>
        <?php echo "url:'http://localhost/SistemaDeAvalia-o/Paginas/tarefaVerDetalhesAluno.php?id=$Id&&idTurma=$UserTurma',";?>
    <?php echo "color: '$color'"; ?>    
    <?php echo "}"; ?>
    <?php echo ","; ?>
<?php } ?> 
   ]
		});
	});

</script>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="">Logo</a>
        </div>
        <ul class="nav navbar-nav">
          <li class=""><a href="../Paginas/PaginaDoAluno.php" >Home</a></li>
      <li><a href="../Paginas/forum.php">forum</a></li>
          
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user disabled" style="margin-right:8px;"></span><?php echo $_SESSION['nome'];?></a></li>
        <li><a href="../funcao/sair.php"><span class="glyphicon glyphicon glyphicon-log-in disabled" style="margin-right:8px;"></span>Sair</a></li>
        </ul>
      </div>
    </nav>        

        <div class="col-lg-12" style="margin-top: 5%">
           <div class="col-lg-12"></div>        
            <div class="col-lg-5"></div>   
            <div class="col-lg-2">
                <img src="http://localhost/SistemaDeAvalia-o/Paginas/imgUser.php?codigo=<?php echo $UserId; ?>" class="img-thumbnail" style="max-width: 100%"/>
            </div>   
            <div class="col-lg-5"></div>   
        </div>
            <div class="col-lg-12"></div>        
            <div class="col-lg-5"></div>   
            <div class="col-lg-2" style="text-align:center ; font-size:200%">
               <?php echo $UserNome; ?>
            </div>   
            <div class="col-lg-5"></div>            
            <div class="col-lg-12">
                <div class="col-lg-12">
                  <div class="col-lg-2"></div>  
                     <div class="panel panel-default col-lg-8">
                <div class="panel-body" style="text-align:center;"><h3>Calendario</h3></div>
                 
            </div>
                </div>   
                <div class="col-lg-2"></div>
                <div id='calendar' class="col-lg-8"></div> 
                <div class="col-lg-2"></div>
            </div>     
            <div class="col-lg-12" style="margin-bottom: 2%;"></div>           
            </body>
    </html>



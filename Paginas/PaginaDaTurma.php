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
      <?php
        header("Content-Type: text/html; charset=ISO-8859-1", true);
        include '../funcao/conecta.php';
        $idTurma = $_GET['idTurma'];
      ?>
       
<script>   
   
	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: ''
			},
                            //month
			// customize the button names,
			// otherwise they'd all just say "list"
			views: {
				listDay: { buttonText: 'list day' },
				listWeek: { buttonText: 'list week' }
			},                        
			defaultView: 'month',
			defaultDate: '<?php echo date("Y-m-d");?>   ',
			navLinks: false, // can click day/week names to navigate views
			editable: false,
			eventLimit: true, // allow "more" link when too many events
                        locale:'pt-br',
			events: [
                           <?php 
                                  $eventos;
      $consulta = mysql_query("SELECT * FROM `calendario` where `turma` = $idTurma");
      $linhas = mysql_num_rows($consulta);
      for($i=0; $i< $linhas; $i++){
                                    $Id = mysql_result($consulta,$i,"id");
                                    $Titulo = mysql_result($consulta,$i,"titulo");                   
                 
                                    $DInicio = mysql_result($consulta,$i,"dataInicio");
                                    $DFinal=mysql_result($consulta,$i,"dataFim");      
                                    $color = mysql_result($consulta,$i,"cor");  ;
      
                    ?>	
                       <?php echo "{";?>
                           <?php echo "id: $Id,";?>
                               <?php echo "title:'$Titulo',";?>
                                   <?php echo "url:'http://localhost/Calendario/Paginas/teste.php?id=$Id',";?>
                                       <?php echo "start:'$DInicio"."T14:30:00' ,";?>
                                          <?php echo "end:'$DFinal"."T14:40:00' ,";?> 
                                             <?php echo "color: '$color'";?>   
                                               <?php echo "}";?>
                                                   <?php echo ",";?>
            
           
      <?php } ?>
                        ]
		});
	
	});

</script>

<style>

	
	#calendar {
		max-width: 900px;
		margin: 0 auto;
                margin-bottom: 5%;
        }

</style>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li> 
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user disabled" style="margin-right:8px;"></span><?php echo "Tiago Marques alves";?></a></li>
        <li><a href="#"><span class="glyphicon glyphicon glyphicon-log-in disabled" style="margin-right:8px;"></span>Sair</a></li>
    </ul>
  </div>
</nav>

  
<div class="container" style="margin-top: 5%">
  <div class="row">
    <div class="col-sm-3">  </div>
    <div class="col-sm-6"></div>
      <div class="container">
  <div class="col-lg-12 ">      
      <button class="col-lg-3  panel panel-default" style="padding:1%;" id="btnAluno">
          <div class="glyphicon glyphicon-user col-lg-2" style="font-size: 200%"></div>
          <div class=" col-lg-9" style="font-size: 150%;">Alunos</div>
      </button>
      <button class="col-lg-3  panel panel-default" style="padding:1%" id="btnCalendario">
          <div class="glyphicon glyphicon-calendar col-lg-2" style="font-size: 200%"></div>
          <div class=" col-lg-9" style="font-size: 150%">Calendario</div>
      </button>
      <button class="col-lg-3  panel panel-default" style="padding:1%" id="btnGrafico">
          <div class="glyphicon glyphicon-random col-lg-2" style="font-size: 200%"></div>
          <div class=" col-lg-9" style="font-size: 150%">Graficos</div>
      </button>
      <button class="col-lg-3  panel panel-default" style="padding:1%" id="btnEditarTutma">
          <div class="glyphicon glyphicon-pencil col-lg-2" style="font-size: 200%"></div>
          <div class=" col-lg-9" style="font-size: 150%">Editar turma</div>
      </button>      
  </div>
          <div class="col-lg-12  panel panel-default"> 
              <!---------------------------------------->
               <div id='Aluno' style="margin-top: 2%">

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Grupo</th>
        <th>Media</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
         <td>gp1</td>
        <td>10</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
         <td>gp1</td>
        <td>10</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
        <td>gp1</td>
        <td>10</td>
      </tr>
    </tbody>
  </table>
               </div>
              <!---------------------------------------->
              <div id='calendar' style="margin-top: 2%"></div>
              <!---------------------------------------->
              <div id='grafico' style="margin-top: 2%">
                   Teste grafico
               </div>
              <!---------------------------------------->
              <div id='editarTurma' style="margin-top: 2%">
                   Teste editar turma
               </div>
          </div>
         
        
    <div class="col-sm-3"> </div>
  </div>
</div>
    <script type="text/javascript">
    $(document).ready(function(){             
     //------------------------------
        
        $('#Aluno').show();
        $('#calendar').hide();
        $('#grafico').hide();
        $('#editarTurma').hide();
    //--------------------------------
          
    	$('#btnAluno').on('click',toggleAluno);
    	$('#btnCalendario').on('click',toggleCalendario);
        $('#btnGrafico').on('click',toggleGrafico);
        $('#btnEditarTutma').on('click',toggleEditarTurma);
        
     //------------------------------------------------------
        function toggleAluno(){
            $('#calendar').hide();
            $('#grafico').hide();
            $('#editarTurma').hide();
            $('#Aluno').slideToggle('slwo',null);

        };
        function toggleCalendario(){
            $('#Aluno').hide();
            $('#grafico').hide();
            $('#editarTurma').hide();
            $('#calendar').slideToggle('slwo',null);
        };
        function toggleGrafico(){
            $('#calendar').hide();
            $('#Aluno').hide();
            $('#editarTurma').hide();
            $('#grafico').slideToggle('slwo',null);
        };
        function toggleEditarTurma(){
            $('#calendar').hide();
            $('#grafico').hide();
            $('#Aluno').hide();
            $('#editarTurma').slideToggle('slwo',null);

        };
        
        
});
    </script>

</body>
</html>

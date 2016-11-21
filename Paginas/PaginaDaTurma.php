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
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
        <title></title>
        
    </head>
    <body>
      <?php
        header("Content-Type: text/html; charset=ISO-8859-1", true);
        include '../funcao/conecta.php';
        $idTurma = $_GET['idTurma'];
        $nomeTurma = $_GET['nomeTurma'];
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
                                   <?php echo "url:'http://localhost/SistemaDeAvalia-o/Paginas/teste.php?id=$Id',";?>
                                       <?php echo "start:'$DInicio"."T14:30:00' ,";?>
                                          <?php echo "end:'$DFinal"."T14:40:00' ,";?> 
                                             <?php echo "color: '$color'";?>   
                                               <?php echo "}";?>
                                                   <?php echo ",";?>
            
           
      <?php } ?>
                        ]
		});
	
	
        $(function () {
    $('#container').highcharts({
        title: {
            text: 'Monthly Average Temperature',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
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
<div class="col-lg-2"></div>
            <div class="panel panel-default col-lg-8">
                <div class="panel-body" style="text-align:center;"><h3><?php echo "$nomeTurma";?></h3></div>
            </div>
  
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
                  <div id="container" class="col-lg-6"></div>
               </div>
              <!---------------------------------------->
              <div id='editarTurma' style="margin-top: 2%">
                   <div class=" col-lg-4"></div>
            <div class=" col-lg-4">
            <div class="form-group"> 
                <h2>Editar turma</h2>
                <form method="Post" enctype="multipart/form-data" action="../funcao/funcCadastrarTurma.php">
            <div class="col-lg-12" style="margin-top: 8px ">
            <label for="titulo">Nome da turma</label>
        <input type="text"  name="titulo" class="form-control" id="email" >
            </div> 
           <div class="col-lg-12" style="margin-top: 2%">
            <label for="file">Icone da turma </label>
        <input type="file"  name="file" class="form-control" >
           </div>   
               </div>
                  <button type="submit" class="btn btn-default  col-lg-12" style="margin-top: 2%; margin-bottom: 5%;" value="">Alterar</button>
          </div>
                 
       </form>
         <div class=" col-lg-4"></div>
        
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

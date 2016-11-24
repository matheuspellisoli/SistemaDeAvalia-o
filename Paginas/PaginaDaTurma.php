<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?Php 
date_default_timezone_set('America/Sao_Paulo');
?>
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
  <script src='../jquery-3.1.1.min.js'></script>

  <script src='../fullcalendar-3.0.1/fullcalendar.min.js'></script>  
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
        <title></title>
        
    </head>
    <body>
      <?php
       // header("Content-Type: text/html; charset=ISO-8859-1", true);
        include '../funcao/conecta.php';
        $idTurma = $_GET['idTurma'];
        $consulta2 = mysql_query("SELECT * FROM `turma` WHERE `id` = $idTurma");
         $linhas2 = mysql_num_rows($consulta2);
        for($i=0; $i< $linhas2; $i++){	
        $nomeTurma = mysql_result($consulta2,$i,"nome");
        
        }
      ?>
       
<script>   
   
	$(document).ready(function() {  
            var id=<?php echo $idTurma?>;
            
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
               
        $(function grafico(){
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
        
        //------------------------------
        
        $('#Aluno').show();
        $('#calendar').hide();
        $('#grafico').hide();
        $('#editarTurma').hide();
        $('#forum').hide();
    //--------------------------------
          
    	$('#btnAluno').on('click',toggleAluno);
    	$('#btnCalendario').on('click',toggleCalendario);
        $('#btnGrafico').on('click',toggleGrafico);
        $('#btnEditarTutma').on('click',toggleEditarTurma);
         $('#btnForunTutma').on('click',toggleForumTurma);
        
     //------------------------------------------------------
        function toggleAluno(){
            $('#calendar').hide();
            $('#grafico').hide();
            $('#editarTurma').hide();
            $('#forum').hide();
            $('#Aluno').slideToggle('slwo',null);

        };
        function toggleCalendario(){
            $('#Aluno').hide();
            $('#grafico').hide();
            $('#editarTurma').hide();
            $('#forum').hide();
            $('#calendar').slideToggle('slwo',null);
        };
        function toggleGrafico(){
            $('#calendar').hide();
            $('#Aluno').hide();
            $('#editarTurma').hide();
            $('#forum').hide();
            $('#grafico').slideToggle('slwo',null);
        };
        function toggleEditarTurma(){
            $('#calendar').hide();
            $('#grafico').hide();
            $('#Aluno').hide();
            $('#forum').hide();
            $('#editarTurma').slideToggle('slwo',null);

        };
        function toggleForumTurma(){
            $('#calendar').hide();
            $('#grafico').hide();
            $('#Aluno').hide();
            $('#editarTurma').hide();
            $('#forum').slideToggle('slwo',null);

        };
        
      
        
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
      <div class="col-lg-1 "></div> 
      <button class="col-lg-2  panel panel-default" style="padding:1%;" id="btnAluno">
          <div class="glyphicon glyphicon-user col-lg-2" style="font-size: 200%"></div>
          <div class=" col-lg-9" style="font-size: 150%;">Alunos</div>
      </button>
      <button class="col-lg-2  panel panel-default" style="padding:1%" id="btnCalendario">
          <div class="glyphicon glyphicon-calendar col-lg-2" style="font-size: 200%"></div>
          <div class=" col-lg-9" style="font-size: 150%">Calendario</div>
      </button>
      <button class="col-lg-2  panel panel-default" style="padding:1%" id="btnGrafico">
          <div class="glyphicon glyphicon-random col-lg-2" style="font-size: 200%"></div>
          <div class=" col-lg-9" style="font-size: 150%">Graficos</div>
      </button>
      <button class="col-lg-2  panel panel-default" style="padding:1%" id="btnForunTutma">
          <div class="glyphicon glyphicon-comment col-lg-2" style="font-size: 200%"></div>
          <div class=" col-lg-9" style="font-size: 150%">forum</div>
      </button>  
      <button class="col-lg-2  panel panel-default" style="padding:1%" id="btnEditarTutma">
          <div class="glyphicon glyphicon-cog col-lg-2" style="font-size: 200%"></div>
          <div class=" col-lg-9" style="font-size: 150%">Configurar</div>
      </button> 
       <div class="col-lg-1 "></div>   
  </div>
         
      </div>
          <div class="col-lg-12  panel panel-default"> 
              <!---------------------------------------->
               <div id='Aluno' style="margin-top: 2%">
                   
                   <div class="col-lg-12">
               <div class="col-lg-2 "></div>            
        <button class="col-lg-4  panel panel-default" style="padding:1%" id="btnCalendario">
          <div class="glyphicon glyphicon-plus col-lg-2" style="font-size: 200%"></div>
          <div class=" col-lg-9" style="font-size: 150%">Adicionar aluno</div>
      </button>
      <button class="col-lg-4  panel panel-default" style="padding:1%" id="btnGrafico">
          <div class="glyphicon glyphicon-list-alt col-lg-2" style="font-size: 200%"></div>
          <div class=" col-lg-9" style="font-size: 150%">Gerengiar grupos</div>
      </button>
                    <div class="col-lg-2 "></div>           
                   </div>

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
                <h2>Configurar</h2>
                <form method="post" enctype="multipart/form-data" action="../funcao/FuncEditarTurma.php">
            <div class="col-lg-12" style="margin-top: 8px ">
            <label for="titulo">Nome da turma</label>
        <input type="text"  name="nome" class="form-control" id="email" >
        <input type="hidden" name="id" value="<?php echo $idTurma;?>">
            </div>             
           <div class="col-lg-12" style="margin-top: 2%">
            <label for="file">Icone da turma </label>
        <input type="file"  name="file" class="form-control" >
           </div>   
              
                <button type="submit" class="btn btn-default  col-lg-12" style="margin-top: 4%; margin-bottom: 5%;">
                  <span class="glyphicon glyphicon-edit"></span>
                    Alterar
                </button>
          </div>
                  
       </form>
                
            <div class="form-group">                
        <input type="hidden" name="id" value="<?php echo $idTurma;?>">
           
        <button type="submit" class="btn btn-default  col-lg-12"  data-toggle="modal" data-target="#myModal" style=" margin-bottom: 5%;">   
             <span class="glyphicon glyphicon-trash"></span>
            Excluir
</button>
          </div></div> 
         <div class=" col-lg-4"></div>
    <div class="col-sm-3"> </div>
  </div>
     <div id='forum' style="margin-top: 2%">
         <div  class="col-lg-12">
             <!-- Media inicio-->
<div class="media">
  <div class="media-left">
      <img src="../user.jpg" class="media-object" style="width:60px">
  </div>
  <div class="media-body">
    <h4 class="media-heading">Tiago</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
  </div>
</div>       
    <!-- Midia Final -->
     <!-- Media inicio-->
<div class="media">
  <div class="media-right">
      <img src="../user.jpg" class="media-object" style="width:60px">
  </div>
  <div class="media-body" >
    <h4 class="media-heading">Paula</h4>
    <h1><em>uohjcildbte</em></h1>

<p>gf n,kgfjdhg</p>

<p>]gjvladbv&nbsp;</p>

<p>tkjo mhlyio</p>

<p>dfssoj bmhlohgti</p>

<p>kugrbva</p>

<p>]</p>

  </div>
</div>       
    <!-- Midia Final -->
             </div>
    </div>         
</div>
    </script>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="margin-top: 15%">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span>  Excluir</h4>
      </div>
      <div class="modal-body">
        <p>Deseja excluir o turma</p>
      </div>
      <div class="modal-footer">    
          <div class="form-group col-lg-12">              
            <form action="../funcao/FuncExcluiTurma.php" method="Post">
                <button type="submit" class="btn btn-default " data-dismiss="modal">Não</button> 
              <input type="hidden" name="id" value="<?php echo $idTurma;?>">
              <button type="submit" class="btn btn-default">Sim</button>
          </form>  
          </div>         
          
      </div>
    </div>

  </div>
</div>
</body>
</html>

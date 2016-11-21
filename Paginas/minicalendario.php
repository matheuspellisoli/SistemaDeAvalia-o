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
      <?php
        
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
			eventLimit: false, // allow "more" link when too many events
                        locale:initialLocaleCode,
			events: [
				<?php 
                                
                                  $eventos;
      $consulta = mysql_query("SELECT * FROM `calendario`");
      $linhas = mysql_num_rows($consulta);
      for($i=0; $i< $linhas; $i++){
                                    $Id = mysql_result($consulta,$i,"id");
                                    $Titulo = mysql_result($consulta,$i,"titulo");                                    
                                    $DInicio = mysql_result($consulta,$i,"dataInicio");
                                    $DFinal=mysql_result($consulta,$i,"dataFim");      
                  
      
                    ?>	
                       <?php echo "{";?>
                           <?php echo "id: $Id,";?>
                               <?php echo "title:'$Titulo',";?>
                                   <?php echo "url:'http://localhost/Calendario/Paginas/teste.php?id=$Id',";?>
                                       <?php echo "start:'$DInicio' ,";?>
                                           <?php echo "end:'$DFinal' ";?>
                                               <?php echo "}";?>
                                                   <?php echo ",";?>
      <?php }?>
                                
                            ]
		});
		//$('#calendar').fullCalendar( 'removeEvents' , [12] )
               
	});

</script>

<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>


<div class="jumbotron text-center">
  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">  </div>
    <div class="col-sm-4">
      
        <div id='calendar'></div>
        
    </div>
    <div class="col-sm-4">  </div>
  </div>
</div>

</body>
</html>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
 
  <div class="jumbotron text-center">
  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p>
</div>
        <div class=" col-lg-12">
            <div class=" col-lg-4"></div>
            <div class=" col-lg-4">
            <div class="form-group"> 
                <h2>Cadastrar turma</h2>
                <form method="Post" enctype="multipart/form-data" action="../funcao/funcCadastrarTurma.php">
            <div class="col-lg-12" style="margin-top: 8px ">
            <label for="titulo">Nome da turma</label>
        <input type="text"  name="titulo" class="form-control" id="email" >
            </div> 
           <div class="col-lg-12" style="margin-top: 2%">
            <label for="file">Icone da turma </label>
        <input type="file"  name="file" class="form-control" >
           </div>    
       <div class="col-lg-12" style="margin-top: 2%">  
                    <label for="semanas">Quantas semanas</label>                
                 <input type="text"  name="semanas" class="form-control" id="email" >         
                 </div>
                    <div class="col-lg-12" style="margin-top: 2%">  
                    <label for="horas">Horario inicial da aula por dia</label>
                  <input type="text"  name=" horasI" class="form-control" id="email" >         
                 </div>
                    <div class="col-lg-12" style="margin-top: 2%">  
                    <label for="horas">Horario final da aula por dia</label>
                    <input type="text"  name=" horasF" class="form-control" id="email" >        
                 </div>
                    
                   
                    
                    <div class="col-lg-12" style="margin-top: 2%">  
                    <label for="Dia">Dias da semana</label>
                  <div class="col-lg-12 panel panel-default" style="padding-bottom:2%;"> 
    <div class="checkbox">
       <label><input name="check_list[]" type="checkbox" value="segunda">Segunda</label>
    </div>
    <div class="checkbox">
      <label><input name="check_list[]" type="checkbox" value="terça">Terça</label>
    </div>
    <div class="checkbox ">
      <label><input name="check_list[]" type="checkbox" value="quarta" >Quarta</label>
    </div>
        <div class="checkbox ">
      <label><input name="check_list[]" type="checkbox" value="quinta" >Quinta</label>
    </div>
        <div class="checkbox ">
      <label><input name="check_list[]" type="checkbox" value="sexta" >Sexta</label>
    </div>
                   
                   
               </div>       
                 </div>
              
               
                    
                  
        <input type="hidden" name="idUserOrientador" value="1" >      
         
        <input type="submit" class="btn btn-default  col-lg-12" style="margin-top: 2%" value="" title="Cadastrar">
       </form>
     </div>
           </div>
            <div class=" col-lg-4"></div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>

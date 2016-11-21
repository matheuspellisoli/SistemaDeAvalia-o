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
  
        <div class=" col-lg-12">
            <div class=" col-lg-4"></div>
            <div class=" col-lg-4">
            <div class="form-group"> 
                <h2>Agendar Tarefa</h2>
                <form method="Post" enctype="multipart/form-data" action="../funcao/agendarTarefa.php">
            <div class="col-lg-12">
            <label for="titulo">Titulo</label>
        <input type="text"  name="titulo" class="form-control" id="email" style="margin-top: 8px ">
            </div>
            <div class="col-lg-12">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" style="resize: none"></textarea>
            </div>         
         <div class="col-lg-12" >
             <label for="turma">Turma</label>
             <select name="turma" class="form-control" >
            <option>Turma</option>            
        </select>
         </div>        
         <div class="col-lg-12" >
              <label for="grupo">Grupo</label>
             <select name="grupo" class="form-control">
            <option>Grupo</option>            
        </select>
         </div>
            
            <div class="col-lg-12">
                <label for="">Data de inicio</label> 
            
            <div class="col-lg-12 panel panel-default" style="padding-bottom:2%;">
                <div class="col-lg-12">
                    <label for="Ano">Ano</label>
                    <select  name="anoInicio" class="col-lg-12">
                       <?php
                       $ano = date('Y',time());
                       $ano10 = $ano + 51  ;
                       for ($d = $ano; $d < $ano10; $d++) {
                           ?>
                        <option value='<?php echo "$d";?>'> <?php echo "$d";?></option>             
                    <?php       
                    }
                       ?>  
                    </select>        
                    
                
            </div>
                <div class="col-lg-12">
                    <label name="mesInicio" for="Mes">Mes</label>
                    <select class="col-lg-12">
                        <option value="01">Janeiro</option>
                        <option value="02">Fevereiro</option>
                        <option value="03">Março</option>
                        <option value="04">Abril</option>
                        <option value="05">Maio</option>
                        <option value="06">Junho</option>
                        <option value="07">Julho</option>
                        <option value="08">Agosto</option>
                        <option value="09">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>    
                    
                </div>
                
                <div class="col-lg-12">
                    <label for="Dia">Dia</label>
                    <select name="diaInicio" class="col-lg-12">
                       <?php
                       for ($d = 1; $d < 32; $d++) {
                           ?>
                        <option value='<?php echo "$d";?>'> <?php echo "$d";?></option>             
                    <?php       
                    }
                       ?> 
                    </select>                    
                </div>
                  
         </div>
        </div>
            <div class="col-lg-12">
                <label for="">Data de Final</label> 
            
            <div class="col-lg-12 panel panel-default" style="padding-bottom:2%;">
               <div class="col-lg-12">
                    <label for="Ano">Ano</label>
                    <select  name="anoFim" class="col-lg-12">
                         <?php
                       $ano = date('Y',time());
                       $ano10 = $ano + 51  ;
                       for ($d = $ano; $d < $ano10; $d++) {
                           ?>
                        <option value='<?php echo "$d";?>'> <?php echo "$d";?></option>             
                    <?php       
                    }
                       ?>  
                    </select>        
                    
                
        
        </div> 
                <div class="col-lg-12">
                    <label name="mesFim" for="Mes">Mes</label>
                    <select class="col-lg-12">
                        <option value="01">Janeiro</option>
                        <option value="02">Fevereiro</option>
                        <option value="03">Março</option>
                        <option value="04">Abril</option>
                        <option value="05">Maio</option>
                        <option value="06">Junho</option>
                        <option value="07">Julho</option>
                        <option value="08">Agosto</option>
                        <option value="09">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>                    
                </div>
                 
                <div class="col-lg-12">
                    <label for="Dia">Dia</label>
                    <select name="diaFim" class="col-lg-12">
                       <?php
                       for ($d = 1; $d < 32; $d++) {
                           ?>
                        <option value='<?php echo "$d";?>'> <?php echo "$d";?></option>             
                    <?php       
                    }
                       ?> 
                    </select>                    
                </div>
                 
         </div>
        </div>
        <input type="hidden" name="idUserOrientador" value="1" >     
         
         <input type="submit" class="btn btn-default  col-lg-12" style="margin-top: 2%" value="Agendar" style="margin-top: 8px">
       </form>
     </div>
           </div>
            <div class=" col-lg-4"></div>
        </div>
  <?php 
  /*
  $diasemana_numero = date('w',time());
  echo $diasemana_numero;      
   */
  ?>
    </body>
</html>

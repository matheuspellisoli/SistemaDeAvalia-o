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
        <?php
        /*
          if (isset($_GET['id'])){
          $idturma = $_GET['id'];
          $key = $_GET['key'];
          echo "tem id $idturma -  ".sha1($idturma);
          echo "<br>";
          echo "tem id $key - ".sha1($key);
          }
         */
        ?> 
        <div class=" col-lg-12">
            <div class=" col-lg-4"></div>
            <div class=" col-lg-4">
                <div class="form-group"> 
                    <h2>Cadastro de aluno</h2>
                    <form method="Post" enctype="multipart/form-data" action="#">
                        <div class="col-lg-12">
                            <label for="titulo">Nome</label>
                            <input type="text"  name="titulo" class="form-control" id="email" style="margin-top: 8px ">
                        </div>
                        <div class="col-lg-12">
                            <label for="descricao">E-mail</label>
                            <input type="email"  name="email" class="form-control" id="email" style="margin-top: 8px ">
                        </div>       
                        <div class="col-lg-12" style="margin-top: 2%">
                            <label for="file">Foto do aluno </label>
                            <input type="file"  name="file" class="form-control" >
                        </div> 

                        <input type="hidden" name="idUserOrientador" value="1" >     

                        <input type="submit" class="btn btn-default  col-lg-12" style="margin-top: 2%" value="Cadastrar aluno" style="margin-top: 8px">
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

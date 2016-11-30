<?php
include './conecta.php';
$id=1;
$consulta= mysql_query("SELECT `idAvaliacao`FROM `nota` WHERE `idUsuario` ='$id'");
$linhas = mysql_num_rows($consulta);
   $linhas = mysql_num_rows($consulta);
      for($i=0; $i< $linhas; $i++){
        $nome = mysql_result($consulta,$i,"idAvaliacao");
        echo "$nome";
        echo '<br>';
        
                $consulta1= mysql_query("SELECT `nota` FROM `nota` WHERE `idAvaliacao`='$nome'");
                        $linhas1 = mysql_num_rows($consulta1);
                            $linhas1 = mysql_num_rows($consulta1);
                          for($i1=0; $i1< $linhas1; $i1++){
                            $nota = mysql_result($consulta1,$i1,"nota");
                            echo "$nota";
                                    echo '<br>';
                      }
      }
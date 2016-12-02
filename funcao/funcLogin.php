<?php 
include './conecta.php';
if ((isset($_POST['Entrar']))){          
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            echo "$email";
            echo "$senha";
            $sql = "SELECT`idUsuario`,`nome`,`email`,`senha`,`nivelAcesso_idnivelAcesso` FROM `usuarios`  WHERE `email`='$email'";
           $res = mysql_query($sql);
            if ($row = mysql_fetch_array($res)){
                if ($senha == $row['senha']) {                                      
                  session_start();
                  $_SESSION['Login']=$email;
                  $_SESSION['nivel']=$row['nivelAcesso_idnivelAcesso'];
                  $_SESSION['id']=$row['idUsuario'];
                  $_SESSION['nome']=$row['nome'];
                  
                  if($row['nivelAcesso_idnivelAcesso']==2){
                  
                  header('Location:../Paginas/PaginaDoProfessor.php?pag=1');    
                  }else{
                     header('Location:../Paginas/PaginaDoAluno.php');  
                  }
                    }
        else {
                    header('Location:../Paginas/index.php?erro=0101');
             }            
                
            } else {
                    header('Location:../Paginas/index.php?erro=1001');
             } 

        }
?>
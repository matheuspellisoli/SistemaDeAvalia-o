<?php
        session_start();
        session_encode();
        session_destroy();     
header('Location:../Paginas/index.php?erro=1010'); 
?>


<?php
$conn = @mysql_connect('127.0.0.1','root','') or die("Problema na conecção");
$db = @mysql_select_db('banca1', $conn)or die("Problema na conecção 2"); 
?>
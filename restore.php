<?php

$nombrebackup = $_POST['nombrerestore'];
session_start();

exec('(C:\xampp\mysql\bin\mysql.exe -uroot palomiz1 < '.$nombrebackup.'.sql)',$output, $exit_status);
if(var_dump($exit_status)==0){
  $_SESSION['message']='Montado exitoso';
}else {
  $_SESSION['message']='ocurrio un fallo';
}

header('location: index.php');
 ?>

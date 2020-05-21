<?php

$nombrebackup = $_POST['nombreback'];
session_start();

exec('(C:\xampp\mysql\bin\mysqldump.exe -uroot palomiz1 > '.$nombrebackup.'.sql)', $output, $exit_status);

if(var_dump($exit_status)==0){
  $_SESSION['message']='respaldo exitoso';
}else {
  $_SESSION['message']='ocurrio un fallo';
}
$_SESSION['backup']=$nombrebackup;
$_SESSION['descarga']=1;

header('location: correo.php');
 ?>

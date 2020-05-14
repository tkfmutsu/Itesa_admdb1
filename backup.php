<?php

$nombrebackup = $_POST['nombreback'];
session_start();

exec('(C:\xampp\mysql\bin\mysqldump.exe -uroot palomiz1 > '.$nombrebackup.'.sql)', $output, $exit_status);
//exec('(C:\xampp\mysql\bin\mysqldump.exe -uroot palomiz1 > '.$nombrebackup.'.sql) 2>&1', $output, $exit_status);

if(var_dump($exit_status)==0){
  $_SESSION['message']='respaldo exitoso';
}else {
  $_SESSION['message']='ocurrio un fallo';

}
$_SESSION['backup']=$nombrebackup;
$_SESSION['descarga']=1;

//var_dump($exit_status); // (int) The exit status of the command (0 for success, > 0 for errors)
//echo "<br />";
//var_dump($output);

header('location: index.php');
 ?>

<?php
session_start();
include_once('connection.php');

$numero = $_POST['reg'];
// if (isset($_POST['submit'])) {
// if(isset($_POST['reg']))
// {
// echo "You have selected :".$_POST['reg'];  //  Displaying Selected Value
// }
// }

if(isset($_POST['submit'])){
  $database = new Connection();
  $db = $database->open();
  $resultado=0;
  try{
    for ($i=0; $i < $numero; $i++) {
      $sql = 'DELETE from misifu order by id desc limit 1';
      $db->query($sql);
    }

    $sql = 'SELECT * FROM misifu order by id desc limit 1';
    foreach ($db->query($sql) as $row){
    $resultado =  $row['id'];
    }

  if($resultado=='' || $resultado==0){
  $resultado=1;
  }

  $sql2 = 'ALTER TABLE misifu AUTO_INCREMENT = '.$resultado.'';
  //$db->query($sql);
  $_SESSION['message'] = ( $db->query($sql2) ) ? 'Eliminado correctamente' : 'Ocurrió un error. No se pudo eliminar';
  }
  catch(PDOException $e){
    $_SESSION['message'] = $e->getMessage();
  }

  //cerrar conexión
  $database->close();
}

else{
  $_SESSION['message'] = 'Fill up add form first';
}

header('location: index.php');

 ?>

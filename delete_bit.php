<?php

	session_start();
	include_once('connection.php');

	$database = new Connection();
  $db = $database->open();
  $resultado=0;
  try{
    $sql = 'DELETE from bitacora';
    $db->query($sql);

    $sql = 'SELECT * FROM bitacora';
    foreach ($db->query($sql) as $row){
    $resultado =  $row['id_bit'];
    }

  if($resultado=='' || $resultado==0){
  $resultado=1;
  }

  $sql2 = 'ALTER TABLE bitacora AUTO_INCREMENT = '.$resultado.'';
  //$db->query($sql);
  $_SESSION['message'] = ( $db->query($sql2) ) ? 'Eliminado correctamente' : 'Ocurrió un error. No se pudo eliminar';
  }
  catch(PDOException $e){
    $_SESSION['message'] = $e->getMessage();
  }

  //cerrar conexión
  $database->close();

	header('location: index.php');

?>

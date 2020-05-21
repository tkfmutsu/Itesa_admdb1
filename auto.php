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

  try{
    for ($i=0; $i < $numero; $i++) {
      $stmt = $db->prepare("INSERT INTO misifu (nombre, caracteristica) VALUES (:nombre, :cosa)");
      // declaración if-else en la ejecución de nuestra declaración preparada
      $_SESSION['message'] = ( $stmt->execute(array(':nombre' => 'llenador' , ':cosa' => 'automatico')) ) ? 'Generado correctamente' : 'Error';
    }

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

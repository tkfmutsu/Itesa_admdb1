<?php

session_start();
include_once('connection.php');

  $lim = $_POST['limita'];
  $database = new Connection();
  $db = $database->open();
  try{
    $sql = "DROP TRIGGER `limite_test`;
    CREATE TRIGGER `limite_test` BEFORE INSERT ON `misifu` FOR EACH ROW BEGIN
        DECLARE cnt INT;

        SELECT count(*) INTO cnt FROM misifu;

        IF cnt = ".$lim." THEN
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error, tabla llena';
        END IF;
    END;";

    // declaración if-else en la ejecución de nuestra consulta
    $_SESSION['message'] = ( $db->query($sql) ) ? 'Ahora la tabla solo puede almacenar '.$lim.' registros' : 'Ocurrió un error';
  }
  catch(PDOException $e){
    $_SESSION['message'] = $e->getMessage();
  }

  //cerrar conexión
  $database->close();

header('location: index.php');





 ?>

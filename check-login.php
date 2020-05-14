<?php
session_start();

include_once('connection.php');
$usuario=$_POST['usuario'];
$contra=$_POST['contra'];

  $database = new Connection();
  $db = $database->open();
  $considencias=false;
  try{
    $cadena = "SELECT * FROM usuarios where usuario='".$usuario."'and contraseña='".$contra."'";
    $sql = $cadena;
    // declaración if-else en la ejecución de nuestra declaración preparada
    foreach ($db->query($sql) as $row){
      if($row['usuario']==$usuario && $row['contraseña']==$contra){
          $_SESSION['loggedin'] = true;
          $_SESSION['usuario'] = $usuario;
          $_SESSION['tipo'] = $row['tipo'];
          $_SESSION['tabla']=1;
      }
    }
    // if($resultado){
    //   $_SESSION['loggedin'] = true;
    //   $_SESSION['usuario'] = $usuario;
    //   //$_SESSION['tipo'] = $tipo;
    // }

    //$tipo=$row['tipo'];
    }catch(PDOException $e){

		}
  //cerrar conexión
  $database->close();
header('location: index.php');
 ?>

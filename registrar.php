<?php

  session_start();
	include_once('connection.php');

		$database = new Connection();
		$db = $database->open();
		try{
			// hacer uso de una declaración preparada para evitar la inyección de sql
			$stmt = $db->prepare("INSERT INTO usuarios (usuario, contraseña, tipo) VALUES (:nombre, :contra,'normal')");
			// declaración if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['usuario'] , ':contra' => $_POST['contraseña'])) ) ? 'Miembro agregado correctamente, porfavor inicie sesion <a href="login.php">aqui</a>' : 'Ha ocurrido un error';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión
		$database->close();

	header('location: registro.php');

?>

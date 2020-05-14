<?php

	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{


			$id = $_GET['id'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];

			$use_table=$_SESSION['tabla'];
			switch ($use_table) {
				case 1:
				$completar = "misifu SET nombre = '$firstname', caracteristica = '$lastname' WHERE id = '$id'";
				$tu="misifu";
				break;
			case 2:
				$completar = "frase SET frase ='$firstname', fuente = '$lastname' WHERE id = '$id'";
				$tu="frase";
				break;
			case 3:
				$completar = "comida SET alimento = '$firstname', tipo = '$lastname' WHERE id = '$id'";
				$tu="comida";
				break;
				default:
					// code...

					//$completar = "misifu (nombre, caracteristica) VALUES (:firstname, :lastname)";
					//$completar_exe=array(':firstname' => $_POST['firstname'] , ':lastname' => $_POST['lastname']);
					break;
			}

			$sql = "UPDATE ".$completar;
			// declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Los datos se actualizaron' : 'Ocurrio un error. No se pudo actualizar';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}


		$now = date_create('now')->format('Y-m-d H:i:s');
		$us = $_SESSION['usuario'];
		$sql="INSERT INTO bitacora (usuario_bit, tabla_bit, accion_bit, fecha_bit) VALUES ('$us','$tu','UPDATE','$now')";
		$db->query($sql);
		//cerrar conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Primero debe llenar el form';
	}

	header('location: index.php');

?>

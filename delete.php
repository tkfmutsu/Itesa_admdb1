<?php

	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{

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

			$sql = "DELETE FROM $tu WHERE id = '".$_GET['id']."'";


			// declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Miembro eliminado correctamente' : 'Ocurrió un error. No se pudo eliminar al miembro';

			$sql = "SELECT * FROM $tu order by id desc limit 1";
			foreach ($db->query($sql) as $row){
			$resultado =  $row['id'];
			}

			if($resultado=='' || $resultado==0){
			$resultado=1;
			}

			$sql = "ALTER TABLE $tu AUTO_INCREMENT = ".$resultado."";
			$db->query($sql);


			$var2 = $_GET['id'];
			//$sql = "UPDAT{{E indice SET id_ind = (id_ind - 1) where id_ind>=(SELECT id_ind FROM indice where id_tabla='".$tu.".".$var2."')";
			//echo $sql."";
			//$db->query($sql);


			$sql = "SELECT id_ind FROM indice where id_tabla = '".$tu.".".$var2."' order by id_ind desc limit 1";
			foreach ($db->query($sql) as $row){
			$desde =  $row['id_ind'];
			}



			$sql = "DELETE FROM indice WHERE id_tabla = '".$tu.".".$var2."'";


			// declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'borrado de indice' : 'Ocurrió un error en indice';

			$var2 = $_GET['id'];


			$sql = "UPDATE indice SET id_ind = id_ind - 1 where id_ind>$desde";
			$db->query($sql);

			$sql = 'SELECT * FROM indice order by id_ind desc limit 1;';
			foreach ($db->query($sql) as $row){
			$resultado =  $row['id_ind'];
			}
			if($resultado=='' || $resultado==0){
			$resultado=1;
			}
			$sql = 'ALTER TABLE indice AUTO_INCREMENT = '.$resultado.'';
			$db->query($sql);
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}



		$now = date_create('now')->format('Y-m-d H:i:s');
		$us = $_SESSION['usuario'];
		$sql="INSERT INTO bitacora (usuario_bit, tabla_bit, accion_bit, fecha_bit) VALUES ('$us','$tu','DELETE','$now')";
		$db->query($sql);
		//cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccione miembro para eliminar';
	}

	header('location: index.php');

?>

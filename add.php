<?php

	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$use_table=$_SESSION['tabla'];
			switch ($use_table) {
				case 1:
					// code...
					$completar = "misifu (nombre, caracteristica) VALUES (:t1, :t2)";
					$completar_exe=array(':t1' => $_POST['firstname'] , ':t2' => $_POST['lastname']);
					$tu="misifu";
					break;
				case 2:
					$completar = "frase (frase, fuente) VALUES (:t1, :t2)";
					$completar_exe=array(':t1' => $_POST['firstname'] , ':t2' => $_POST['lastname']);
					$tu="frase";
					break;
				case 3:
					$completar = "comida (alimento, tipo) VALUES (:t1, :t2)";
					$completar_exe=array(':t1' => $_POST['firstname'] , ':t2' => $_POST['lastname']);
					$tu="comida";
					break;
				default:
					// code...

					//$completar = "misifu (nombre, caracteristica) VALUES (:firstname, :lastname)";
					//$completar_exe=array(':firstname' => $_POST['firstname'] , ':lastname' => $_POST['lastname']);
					break;
			}
			// hacer uso de una declaración preparada para evitar la inyección de sql
			$stmt = $db->prepare("INSERT INTO $completar");
			// declaración if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute($completar_exe) ) ? 'Miembro agregado correctamente' : 'Something went wrong. Cannot add member';
			$now = date_create('now')->format('Y-m-d H:i:s');
			$us = $_SESSION['usuario'];
			$sql="INSERT INTO bitacora (usuario_bit, tabla_bit, accion_bit, fecha_bit) VALUES ('$us','$tu','INSERT','$now')";
			$db->query($sql);
			$resultado = $tu;
			$sql = "SELECT * FROM $tu order by id desc limit 1";
	    foreach ($db->query($sql) as $row){
	    $resultado =  $resultado+""+$row['id'];
			$var1=$_POST['firstname'];

	    }
			$sql2="INSERT INTO indice (id_tabla, contenido) VALUES ('$tu.$resultado','$var1')";
			$db->query($sql2);
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

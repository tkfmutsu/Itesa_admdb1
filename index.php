<?php
	session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
   //  echo "Bienvenido , " . $_SESSION['usuario'] . "!";

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Interfaz DB v 0.937</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.css">
</head>
<body style="background-color: white" onload="startTime()">
<img src="itesalogo.png" width="160" height="70" style="position: absolute; top:10px; right:50%;">
<?php

	if(isset($_SESSION['descarga'])){
		?>
		<a href="<?php echo $_SESSION['backup'];?>.sql" download id="download" hidden></a>
		<script type="text/javascript">
			document.getElementById('download').click().window.open();
		</script>

<?php
		$_SESSION['descarga']=NULL;
		$_SESSION['backup']=NULL;
		}
?>
<div class="container">
	<div class="container" style="width: 170px; position: absolute; right: 30px;" >
		<form action="login.php" method="post">
			<label >usuario: <?php
			 echo $_SESSION['usuario']."  (".$_SESSION['tipo'].")";
			 ?></label>
			<button type="submit" name="button">Desconectarse</button>
		</form>
	</div>
	<div id='hora'></div>
	<h1 class="page-header text-center">Administrador de base de datos</h1>

<!-- ZONA PARA PRUEBAS DE PHP AQUI
/
/
/
<?php

 ?>
/
/
-->

	<div class="row">
		<form action="backup.php" method="post">
			<input type="text" name="nombreback" value="" style="height: 20px; width: 80px;">
			<button class="btn btn-success" type="submit" name="button"><span class="fa fa-copy"></span>&nbsp;&nbsp;&nbsp; Hacer respaldo</button>
		</form>
		<?php if($_SESSION['tipo']=="admin"){?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<form action="restore.php" method="post">
			<input type="text" name="nombrerestore" value="" style="height: 20px; width: 80px;">
			<button class="btn btn-warning" type="submit" name="button"><span class="fa fa-copy"></span>&nbsp;&nbsp;&nbsp; Montar respaldo</button>
		</form>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<h5 style="padding-top: 15px;">El montar respaldo es con el nombre que se uso en "Hacer respaldo"</h1>
		<?php } ?>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="fa fa-plus"></span> Nuevo</a>
			<?php
				if($_SESSION['tipo']=="admin"){
			?>
			<a href="#bit" class="btn btn-secondary" data-toggle="modal"><span class="fa fa-search"></span> Mostrar bitacora</a>

		<?php  } ?>


			<a href="#myModal" class="btn btn-info" data-toggle="modal"><span class="fa fa-info"></span> Mostrar indice</a>
			<h2>Automatizador </h2>
			<p>solo funciona por ahora en la tabla misifu y no se ve reflejado en bitacora</p>
			<div class="row">
				<div class="col-sm-3">
					<form action="auto.php" method="POST">
						<p>Llenador</p>
							<label class="text-inline">
									<input type="text" name="reg" size="10" style="height:30px;"> cantidad </label>

							<input type="submit" name="submit" value="generar">

					</form>
    		</div>
				<div class="col-sm-3">
						<form action="deleter.php" method="POST">
						<p>Eliminador</p>
							<label class="text-inline">
									<input type="text" name="reg" size="10" style="height:30px;"> cantidad </label>
							<input type="submit" name="submit" value="eliminar">

					</form>
    		</div>
				<div class="col-sm-3">
						<form action="limit.php" method="POST">
						<p>Limitador</p>
							<label class="text-inline">
									<input type="text" name="limita" size="10" style="height:30px;"> cantidad </label>
							<input type="submit" name="submit" value="limitar">

					</form>
    		</div>
			</div>
			<div class="container" style="right: 50%; top:20%">
				<form action="index.php" method="POST">
					<button class="btn btn-secondary" name='anterior'><span class="fa fa-chevron-left"></span> Tabla anterior</a>
					<button class="btn btn-secondary" name='siguiente'><span class="fa fa-chevron-right"></span>Tabla siguiente</a>
				</form>
			</div>
		</div>
	</div>

            <?php
                //session_start();
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-dismissible alert-success" style="margin-top:20px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>

					<?php

					if(isset($_POST['anterior'])){
						if($_SESSION['tabla']==1){
							$_SESSION['tabla']=3;
						}else{
							$_SESSION['tabla']-=1;
						}
					}

					if(isset($_POST['siguiente'])){
						if($_SESSION['tabla']==3){
							$_SESSION['tabla']=1;
						}else{
							$_SESSION['tabla']+=1;
						}
					}

					switch ($_SESSION['tabla']) {
						case 1:

							$usar = 'misifu';
							$titulo1 = 'id';
							$titulo2 = 'nombre';
							$titulo3 = 'caracteristica';
							echo $usar." esto es una prueba ".$_SESSION['tabla'];
							?><th>ID</th>
							<th>Nombre</th>
							<th>caracteristica</th>
							<th>Acción</th><?php
								// code...
							break;
						case 2:

							$usar = 'frase';
							$titulo1 = 'id';
							$titulo2 = 'frase';
							$titulo3 = 'fuente';
							echo $usar." esto es una prueba ".$_SESSION['tabla'];
							?><th>ID</th>
							<th>Frase</th>
							<th>Fuente</th>
							<th>Acción</th><?php
							break;
						case 3:

							$usar = 'comida';
							$titulo1 = 'id';
							$titulo2 = 'alimento';
							$titulo3 = 'tipo';
							echo $usar." esto es una prueba ".$_SESSION['tabla'];
							?><th>ID</th>
							<th>Alimento</th>
							<th>Tipo</th>
							<th>Acción</th><?php
							break;


						default:
							// code...
							break;
					}

					 ?>


				</thead>
				<tbody>
					<?php
						// incluye la conexión
						include_once('connection.php');



						$database = new Connection();
    					$db = $database->open();
						try{
						    $sql = 'SELECT * FROM '.$usar;
						    foreach ($db->query($sql) as $row) {
						    	?>
						    	<tr>
						    		<td><?php echo $row[$titulo1]; ?></td>
						    		<td><?php echo $row[$titulo2]; ?></td>
						    		<td><?php echo $row[$titulo3]; ?></td>
						    		<td>
						    			<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
						    			<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
						    		</td>
						    		<?php include('edit_delete_modal.php'); ?>
						    	</tr>
						    	<?php
						    }
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						//cerrar conexión
						$database->close();

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
<?php
include('add_modal.php');

if($_SESSION['tipo']=="admin"){
	require('bitacora.php');
}
include('indice.php');
?>

<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/custom.js"></script>
<script>
		function startTime()
		{
		var today=new Date();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		// add a zero in front of numbers<10
		h=checkTime(h);
		m=checkTime(m);
		s=checkTime(s);
		document.getElementById('hora').innerHTML=h+":"+m+":"+s;
		t=setTimeout(function(){startTime()},1000);
		}

		function checkTime(i)
		{
		if (i<10){
		  	i="0" + i;
		  }
		return i;
		}
</script>
</body>
</html>
<?php }else{

 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="utf-8">
 	<title>Interfaz DB v 0.811</title>
 	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
 	<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
 	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.css">
 </head>
 	<body>

		<div class="container">

			<h1 class="page-header text-center">Administrador de base de datos</h1>
 			<h2 style="position:center;">No se ha iniciado session <a href="login.php">Click aqui</a> para iniciar sesion</h1>
		</div>
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<script src="bootstrap/js/custom.js"></script>
 	</body>
 </html>
<?php } ?>

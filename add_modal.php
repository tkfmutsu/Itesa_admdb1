<!-- Agregar Nuevo -->
<?php
$base=$_SESSION['tabla'];
switch ($base) {
  case 1:
      // code...
      $text1="Nombre: ";
      $text2="Comentario: ";
    break;
  case 2:
      // code...
      $text1="Frase: ";
      $text2="Fuente: ";
    break;
  case 3:
      // code...
      $text1="Alimento: ";
      $text2="Tipo: ";
    break;
  default:
    // code...
    break;
}

 ?>

<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Agregar</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;"><?php echo $text1; ?> </label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="firstname">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;"><?php echo $text2; ?> </label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="lastname">
					</div>
				</div>
			</div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</a>
			</form>
            </div>

        </div>
    </div>
</div>

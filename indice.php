<div class="modal fade" id="ind" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 600px;">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Indice</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

            </div>
      <form method="POST" action="index.php">
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table table-bordered table-striped" style="margin-top:20px; width: 500px;">
            <thead>
              <th>Numero indice2</th>
              <th>Id del elemento</th>
              <th>contenido</th>
            </thead>
            <tbody>
              <?php
                // incluye la conexión
                include_once('connection.php');

                $database = new Connection();
                  $db = $database->open();
                try{
                    $sql = 'SELECT * FROM indice';
                    foreach ($db->query($sql) as $row) {
                      ?>
                      <tr>
                        <!--td><?php //echo $row['id_bit']; ?></td-->
                        <td><?php echo $row['id_ind']; ?></td>
                        <td><?php echo $row['id_tabla']; ?></td>
                        <td><?php echo $row['contenido']; ?></td>
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
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cerrar</button>
              <button type="submit" name="button">Recargar</button>
            </div>
      		</form>
        </div>
    </div>
</div>


<div id="myModal" class="modal" >
<center> <div class="modal-content" style="width: 600px">
        <table class="table table-bordered table-striped" style="margin-top:20px; width: 500px; background-color: white;">
          <thead>
            <th>Numero indice</th><th>Id del elemento</th><th>contenido</th>
          </thead>
          <tbody>
            <?php
              include_once('connection.php');
              $database = new Connection();
                $db = $database->open();
              try{
                  $sql = 'SELECT * FROM indice';
                  foreach ($db->query($sql) as $row) {
                    ?>
                    <tr>
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
              $database->close();
            ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer" id='ID_DIV'>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cerrar</button>
      </div>
  </div>
</div>
</center>
</div>

<div class="modal fade" id="bit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 600px;">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Bitacora</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

            </div>
      <form id="bitacora_imp" method="POST" action="delete_bit.php">
      <div class="modal-body">
        <div class="container-fluid" id="cont">
          <table id="contenido" class="table table-bordered table-striped" style="margin-top:20px; width: 500px;">
            <thead>
              <th>Usuario</th>
              <th>Tabla utilizada</th>
              <th>Accion</th>
              <th>Fecha</th>
            </thead>
            <tbody>
              <?php
                // incluye la conexión
                include_once('connection.php');

                $database = new Connection();
                  $db = $database->open();
                try{
                    $sql = 'SELECT * FROM bitacora';
                    foreach ($db->query($sql) as $row) {
                      ?>
                      <tr>
                        <!--td><?php //echo $row['id_bit']; ?></td-->
                        <td><?php echo $row['usuario_bit']; ?></td>
                        <td><?php echo $row['tabla_bit']; ?></td>
                        <td><?php echo $row['accion_bit']; ?></td>
                        <td><?php echo $row['fecha_bit']; ?></td>
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
            <div class="modal-footer" id='ID_DIV'>
              <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
              <a onclick="javascript:window.imprimirDIV('ID_DIV');"> <button type="button" name="imprimir" class="btn btn-primary"><span class="fa fa-print"></span> Guardar PDF</a>
                <script>
                    function imprimirDIV(contenido) {
                        var ficha = document.getElementById("cont");
                        var ventanaImpresion = window.open(' ', 'popUp');
                        ventanaImpresion.document.write(ficha.innerHTML);
                        ventanaImpresion.document.close();
                        ventanaImpresion.print();
                        ventanaImpresion.close();
                        document.getElementById("bitacora_imp").submit();
                    }
                </script>
            </div>
            <h4>ALERTA: se limpiara la bitacora al momento de dar click en "Guardar PDF"</h4>
      		</form>
        </div>
    </div>
</div>

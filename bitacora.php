
<div id="myModal" class="modal">
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
        <div class="modal-content" style="width: 670px; right:10%;">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Bitacora</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

            </div>
      <form id="bitacora_imp" method="POST" action="#">
      <div class="modal-body">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <p>Solo utilizar uno</p>
      <div class="row">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" class="col-xm-4" id="myInput" onkeyup="myFunction()" placeholder="Buscar por usuario.." title="Type in a name">&nbsp;&nbsp;
        <input type="text" class="col-xm-4" id="myInput2" onkeyup="myFunction2()" placeholder="Buscar por tablas.." title="Type in a name">&nbsp;&nbsp;
        <input type="text" class="col-xm-4" id="myInput3" onkeyup="myFunction3()" placeholder="Buscar por acciones.." title="Type in a name">&nbsp;&nbsp;
      </div>
        <div class="container-fluid" id="cont">
          <table id="contenido" class="table table-bordered table-striped" style="margin-top:20px; width: 620px;">
            <thead>
              <th>Usuario</th>
              <th>Tabla utilizada</th>
              <th>Accion</th>
              <th>Fecha</th>
            </thead>
            <tbody>
              <?php
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
                        //document.getElementById("bitacora_imp").submit();
                    }
                </script>
            </div>
      		</form>
        </div>
    </div>
  </div>
</div>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("cont");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<script>
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("cont");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<script>
function myFunction3() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("cont");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

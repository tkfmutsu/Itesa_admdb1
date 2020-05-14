<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Interfaz DB v 0.731</title>
 <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
 <link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
 <link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.css">
</head>
 <body>
   <h1 class="page-header text-center">Registro</h1><br><br>
   <div class="container" align=middle>
     <?php
         session_start();
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
     <form name="form-reg" action="registrar.php" method="POST">
       <table class="table table-bordered table-striped" style="margin-top:20px; width: 75%">
         <thead>
           <th>Usuario</th>
           <th>Contraseña</th>
           <th>Confirmar contraseña</th>
         </thead>
         <tr>
           <td> <input type="text" name="usuario" value="" size="10" maxlength="10" style="height: 25px" required> </td>
           <td> <input type="password" name="contraseña" value="" size="10" maxlength="10" style="height: 25px" required> </td>
           </td> <td> <input type="password" name="contraseña" value="" size="10" maxlength="10" style="height: 25px" required> </td>
         </tr>
       </table>
       <button type="submit" name="registrar">Registrar</button>
     </form>
     <form action="login.php" method="post">
       <button type="submit" name="button">Login</button>
     </form>
   </div>

   <script src="bootstrap/js/jquery.min.js"></script>
   <script src="bootstrap/js/bootstrap.js"></script>
   <script src="bootstrap/js/custom.js"></script>
 </body>
</html>

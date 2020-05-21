<?php
  session_start();
  session_unset();
  session_destroy();
  session_abort();
 ?>
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
   	<h1 class="page-header text-center">Inicio de sesion</h1><br><br>
   <div class="container" align=middle>
     <div class="row" style="background-color: lightcyan">
       <form action="check-login.php" method="POST" >
         <div style="height: 50px; position: relative; top:10px; left: 20px;">
           <label class="text-inline">
             <input type="text" name="usuario" value="" size="10" maxlength="10" style="height: 25px" required> &emsp; usuario </label> &emsp;
           <label class="text-inline">
             <input type="password" name="contra" value="" size="10" maxlength="10" style="height: 25px" required> &emsp; contraseña </label>
           &emsp;&emsp;&emsp;<button type="submit" name="iniciar" style="height: 25px"> Iniciar sesion</button>
         </div>
       </form>
     </div>
       <form action="registro.php" method="POST" style="position: center;">
         <div class="row">
           Si no cuenta con un usuario, haga click en el boton para registrarse &emsp;&emsp;&emsp;&emsp;&ensp;<button type="submit" name="registrar">Registrarse</button>
         </div>
       </form>
   </div>
   <script src="bootstrap/js/jquery.min.js"></script>
   <script src="bootstrap/js/bootstrap.js"></script>
   <script src="bootstrap/js/custom.js"></script>
 </body>
</html>

<?php session_start();  
include ("../configuracion/conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>- Login -</title>
  <link rel="stylesheet" href="../plugins/sweetalert2-master/dist/sweetalert2.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="../assets/css/style.css">

  
</head>

<body>
  
<div class="container">
  <div class="info">
    <h1 style="color: white; font-family: Verdana;">-LOGIN-</h1>
  </div>
</div>
<div class="form">
  <div ><img style="height: 150px; width: 150px;" src="../assets/img/find_user.png"/></div>
  <form class="login-form" name="usuarios" action='validalogin.php' method="post">
    <input type="text" placeholder="No-Empleado" name="usuario" autofocus/>
    <input type="password" placeholder="Contraseña" name="contrasena"/>
    <button>LOGIN</button>
  </form>
</div>


 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="../assets/js/index.js"></script>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="../plugins/sweetalert2-master/dist/sweetalert2.js"></script>

</body>

</html>

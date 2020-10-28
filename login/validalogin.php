<?php
/////////////////////////////////////////////parte de sesiones
include("../configuracion/conexion.php");
/////////////////////////////
$pUser=$_POST["usuario"];
$pContra=$_POST["contrasena"];
//Se realiza la consulta para creditar el usuario
$qry = "SELECT no_empleado, password, estatus, CONCAT(nombres, ' ', ap_paterno, ' ', ap_materno) AS persona FROM c_usuarios WHERE no_empleado = '$pUser' AND password = '$pContra' AND estatus = '1'";
$consulta = mysqli_query($conexion,$qry) or die  (mysqli_connect_errno());				   
//Descargamos el arreglo que arroja la consulta
$row = mysqli_fetch_array($consulta);
//Se cuenta el numero de filas
$num = mysqli_num_rows($consulta);
//Verificar si es un usuario existente o no
if($num==1)
{
	//asigno un nombre a la session
	session_name("login_supsys");
	session_start();
	//$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
	$_SESSION["autentificado"]= "SI";
	$_SESSION["s_IdUser"]= $row[0];
	$_SESSION["s_IdPass"]= $row[1];	
	$_SESSION["s_Persona"]= $row[3];	
    ////////////////////////////////////////////////////////////////////////////
	 // echo"<script language=\"javascript\">window.location=\"../capturas.php\"</script>";
	header("Location: ../capturas.php");
}
else
{
	//Redirecciona a una pagina especifica
	// echo'<script type="text/javascript">
 //    alert("No.Empleado y/o Contrasena Incorrecta");
 //    window.location.href="../index.php";
 //    </script>';
	header("Location: login.php?ErrorAutentificacion");
  //    echo"<script></script>";
	 // echo"<script language=\"javascript\">window.location=\"../index.php\"</script>";
}
?>
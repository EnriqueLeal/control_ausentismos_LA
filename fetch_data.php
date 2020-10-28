<?php
include 'configuracion/conexion.php';
$dia = jddayofweek(1, 0); // obtiene el dia en modo numero alv :v
if(isset($_POST['get_option']))
{

 $nombre_curso = $_POST['get_option'];
 
 $result = mysqli_query($conexion, "select h.id, h.orden, c.nombre_curso
 	                from horarios h
 	                inner join cursos c
 	                on h.id = c.id
 	                where c.nombre_curso = '$nombre_curso' and dia = '$dia'");
  $bool = mysqli_num_rows($result);

  while ($row=mysqli_fetch_array($result))
                   {
                      echo "<option>".$row['orden']."</option>";
                   }
 
 exit;
}
?>
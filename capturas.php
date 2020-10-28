<?php 
include 'configuracion/conexion.php';
include("global_seguridad/verificar_sesion.php");
$s_idUsuario = $_SESSION["s_IdUser"];
$s_Name = $_SESSION["s_Persona"];
date_default_timezone_set('America/Monterrey');
$fecha = date("Y-m-d"); //aqui pinches obtengo la pvta fecha para evaluar el periodo :v
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="jquery-3.2.1.min.js"></script>
<script type="text/javascript">
function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response; 
 }
 });
}

</script>
      <meta charset="utf-8" />
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Control de Ausenstimos</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Navegar</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="capturas.php" style="font-size: 25px;">Control Ausentismos</a> 
            </div>
  <div><div  style="color: white;
padding: 15px 50px 5px 50px;
float: left;
font-size: 25px;">UNIVERSIDAD TECNOLÓGICA LINARES</div><div style="float: right; padding: 15px 50px 5px 50px;"><a href="login/cerrarsesion.php" class="btn btn-danger square-btn-adjust" style="background-color: #095219">Salir</a> </div></div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="index.html"><i class="fa fa-credit-card fa-3x"></i> Captura</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2 class="h2a">CAPTURA DE ASISTENCIAS <div style="font-size: 20px;" class="pull-right">Bienvenido(a): <?php echo $s_Name;?></div></h2>  
                    </div>
                </div>
				<span id="liveclock"></span>
				<form id="personas" method="post" action="">
					<div class="row">

					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
						<div class="form-group">
								<label for="curso" class="control-label">Curso: </label>
								<select onchange="fetch_select(this.value);" class="selectpicker form-control">
                                  <option>Selecciona el curso prro :v</option>
                                  <?php
                                 
    $result = mysqli_query($conexion, "SELECT c.id,c.nombre_curso, h.id, c.id_periodo, p.id,p.fecha_fin
                                                                FROM cursos c
                                                                INNER JOIN horarios h
                                                                ON c.id = h.id
                                                                INNER JOIN periodos p
                                                                ON c.id_periodo = p.id
                                                                WHERE estatus=1 
                                                                AND id_usuario = '$s_idUsuario' 
                                                                AND p.fecha_fin >= '$fecha' 
                                                                AND p.fecha_inicio <= '$fecha'");

                                   while ($row=mysqli_fetch_array($result))
                                    {
                                      echo "<option>".$row['nombre_curso']."</option>";
                                    }
                                  
                                 ?>
                                </select>
						</div>	
					</div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
            <div class="form-group">
                <label for="curso" class="control-label">Orden Hora Clase: </label>
                <select id="new_select" class="selectpicker form-control"></select>
            </div>  
          </div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
						<div class="form-group">
							<label for="oculta" class="control-label"></label>
							<a href="#" class="btn btn-success btn-block">Aceptar</a>
						</div>		
					</div>

					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
						<div class="form-group">
							<label for="nombre" class="control-label">Fecha: </label>
							<input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="" readonly value="<?php echo date("Y-m-d");?>">
						</div>
					</div>
				</div>
				<hr>

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-4 col-lg-3">
						<div class="form-group">
							<label for="nombre" class="control-label">Matricula:</label>
							<input type="text" class="form-control" id="matricula" name="matricula" placeholder="Ingrese Su Matricula" >
						</div>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
						<div class="form-group">
						<label for="mensajes" class="control-label" id="mensajes"></label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-2 col-lg-3">
						<div class="form-group">
							<label for="oculta" class="control-label"></label>
							 <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Inicio" readonly="">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-2 col-lg-3">	
						<div class="form-group">
							<label for="oculta" class="control-label"></label>
							 <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Salida" readonly="">
						</div>	
					</div>
				</div>
		   		</form>
<hr>
      

      
      </div>


		 </div>


                
  </div>



     <!-- /. WRAPPER  -->



    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
  
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    <script language="JavaScript" type="text/javascript">
    function show5(){
        if (!document.layers&&!document.all&&!document.getElementById)
        return

         var Digital=new Date()
         var hours=Digital.getHours()
         var minutes=Digital.getMinutes()
         var seconds=Digital.getSeconds()

        var dn="PM"
        if (hours<12)
        dn="AM"
        if (hours>12)
        hours=hours-12
        if (hours==0)
        hours=12

         if (minutes<=9)
         minutes="0"+minutes
         if (seconds<=9)
         seconds="0"+seconds
        //change font size here to your desire
        myclock="<font size='20' face='Arial' ><b><font size='5'>Hora actual:</font></br>"+hours+":"+minutes+":"
         +seconds+" "+dn+"</b></font>"
        if (document.layers){
        document.layers.liveclock.document.write(myclock)
        document.layers.liveclock.document.close()
        }
        else if (document.all)
        liveclock.innerHTML=myclock
        else if (document.getElementById)
        document.getElementById("liveclock").innerHTML=myclock
        setTimeout("show5()",1000)
         }


        window.onload=show5
         //-->
     </script>


 
 
</body>
</html>

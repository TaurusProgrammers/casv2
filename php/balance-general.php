<?php
/*~ Archivo balance-general.php
.---------------------------------------------------------------------------.
|    Software: CAS - Computerized Accountancy System                        |
|     Versión: 1.0                                                          |
|   Lenguajes: PHP, HTML, CSS3 y Javascript                                 |
| ------------------------------------------------------------------------- |
|   Autores: Ricardo Vigil (alexcontreras@outlook.com)                      |
|          : Vanessa Campos                                                 |
|          : Ingrid Aguilar                                                 |
|          : Jhosseline Rodriguez                                           |
| Copyright (C) 2013, FIA-UES. Todos los derechos reservados.               |
| ------------------------------------------------------------------------- |
|                                                                           |
| Este archivo es parte del sistema de contabilidad C.A.S para la cátedra   |
| de Sistemas Contables de la Facultad de Ingeniería y Arquitectura de la   |
| Universidad de El Salvador.                                               |
|                                                                           |
'---------------------------------------------------------------------------'
*/
?>
<?php 
	include("sesion.php");
	if(!$_COOKIE["sesion"]){
		header("Location: salir.php");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
	<script>
	    !window.jQuery && document.write("<script src='../js/jquery.min.js'><\/script>");
	</script>
	<title>C.A.S | </title>
</head>

<body>
	<!-- Barra de navegación -->
	<?php include("nav.php"); ?>

	<!-- Contenido de la página -->
	<div class="container" id="contenido">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9">
				<div class="page-header">
        			<h3>Título de la página</h3>
        		</div>
        		<div class="row">
        			<div class="col-lg-12">
        				<table class="table table-bordered">
        					<thead>
        						<tr >
        							<th colspan="4">
        								<h2 class="text-center">Vinos Nonualcos y Cia. S.A</h2>
        								<p align="center">
        									<strong>Balance General al Inicio de Operaciones</strong>
        								</p>
        								<p align="center">
        									1 de Enero de 2013
        								</p>
        							</th>
        						</tr>
        					</thead>
        					<tbody>
        						<tr>
        							<th colspan="2">ACTIVOS</th>
        							<th colspan="2">PASIVOS</th>
        						</tr>
        						<tr>
        							<?php 
        							include("funciones.php");
        							include("conexion.php");
        							generarMayor($conexion);
        							$sql = "SELECT * FROM mayor";
        							$ejecutar_consulta = $conexion->query($sql);
        							if($ejecutar_consulta->num_rows > 0){
        								while ($regs = $ejecutar_consulta->fetch_assoc()) {
        									$cuenta = $regs["cuenta"];
        									$nombre = $regs["nombre"];
        									$debe = $regs["debe"];
        									$haber = $regs["haber"];
        									if(substr($cuenta, 0,1)=="1"){
        										// Es activo
        										echo "<tr colspan='2'>";
        										echo "<td>".$cuenta." ".$nombre."</td>";
        										echo "<td>".number_format($debe-$haber,2)."</td>";
        										echo "</tr>";
        									}
        									if(substr($cuenta, 0,1)=="2"){
        										// Es Pasivo
        										
        										echo "<td>".$cuenta." ".$nombre."</td>";
        										
        									}
        									if(substr($cuenta, 0,1)=="3"){
        										// Es Pasivo
        										echo "<tr>";
        										echo "<td>".$cuenta." ".$nombre."</td>";
        										echo "</tr>";
        									}
        									if(substr($cuenta, 0,1)=="4"){
        										// Es Pasivo
        										echo "<tr>";
        										echo "<td>".$cuenta." ".$nombre."</td>";
        										echo "</tr>";
        									}
        								}
        							}
        							?>
        						</tr>
        						
        					</tbody>
        						
        					
        				</table>
        			</div>
        		</div>
        	</div><!--/span-->

			<!-- Barra lateral o sidebar -->
        	<?php include("sidebar.php"); ?>
        	
        </div>
    </div>

	<!-- Pie de página o Footer -->
	<?php include("footer.php"); ?>

	<!-- Ventanas flotantes -->
	<?php include("modal.php"); ?>

	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
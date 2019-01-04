<!-- PANEL DE CONTROL -->
<!doctype html>
<html lang="es">

 <head>
 	<?php include_once("../internal/info.php"); ?>
 	<title><?php echo $nombreDelSitio; ?> | Panel de control</title>
	<link rel="stylesheet" href="css/panel.css" /> 
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>

		<!-- Acá se colocan noticias sobre el CMS, un resúmen del internal -->
<?php 
	include_once(locacion()."function/sesion.php");
	if( isLogIn() ) {
	 include_once(locacion()."internal/importUser.php");
	 if($rank < 2) { // 1: redactor || 0: administrador	
	?>
	<!-- Si el usuario está logueado y cumple con el rango mínimo, verá el panel que se codea
	a continuación -->

<div id="root">

			<!--<div id="sidebar">
				<ul>
					<li>Inicio</li>
					<li>Entradas</li>
					<li>Usuarios</li>
					<li>Complementos</li>
					<li>Configuración</li> 
				</ul> 
			</div>

		<div id="lastPosts">
			<h3>Últimas notas</h3> 
			<ul><?php include_once("../notas/notas.php"); ?></ul>
		</div>-->

		<div class="box dashed">
			<p>¡Bienvenido, <?php echo $aliasUsuario; ?>!</p>
			<p>CI_CMS Versión <?php echo $version; ?></p>
			<p>¡Versión actualizada!</p>
		</div>

		
			<?php include_once("include/users.php"); ?> <!-- Ya hay un "box users" dentro de este archivo -->
			<?php include_once("include/posts.php"); ?> <!-- Ya hay un "box users" dentro de este archivo -->
		
	<?php 
	 } // Cierre if($rank < 2)
	} // Cierre if( chequeoSesionActiva() ) ?>
</div>
</body>
</html>

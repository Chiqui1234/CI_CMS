<!doctype html>
<html lang="es">

 <head>
 	<?php include_once("internal/info.php"); ?>
 	<title><?php echo $nombreDelSitio; ?> | Recursos</title>
 	<?php include_once("internal/header.php"); ?> <!-- Para insertar estilos CSS -->
 	<link rel="stylesheet" href="plug-in/recursos/estilo/estilo.css" />
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
 
<body>
<?php

if( (isset($_COOKIE["emailCookie"])) && (isset($_COOKIE["contrasenaCookie"])) ) {
$rutaUsuario = "user/".strip_tags(htmlspecialchars($_COOKIE["emailCookie"]));
	include_once($rutaUsuario."/credenciales.php");
	include_once("internal/header.php");
	include_once($rutaUsuario."/recursos-adquiridos.php"); ?>
	<div id="contenido" style="margin-top: 65px;"><ul>
	<?php
		include_once("plug-in/recursos/lista-recursos.php");
	?>
	</ul></div>
<?php } else { ?>

<?php }?>
</body>
</html>
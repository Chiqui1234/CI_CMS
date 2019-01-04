<?php
include_once("../function/sesion.php");
	if( isLogIn() ) {
		$rutaUsuario = "../usuario/".$_COOKIE["emailCookie"];
		// Chau cookies a nivel servidor
		unset($_COOKIE["emailCookie"]);
		unset($_COOKIE["contrasenaCookie"]);
		// Reseteamos cookies a nivel cliente
		setcookie ("emailCookie", "", time() - 86400);
		setcookie ("contrasenaCookie", "", time() - 86400);
		//
		/* Borramos el token de sesión
		$tokenABorrar = fopen($rutaUsuario."/contrasena-token.php", "a");
		fwrite($tokenABorrar, "");
		fclose($tokenABorrar);
		unlink($rutaUsuario."/contrasena-token.php");
		BORRAR EL TOKEN NO TIENE SENTIDO */
		$bandera = true;
	} else {
		$bandera = false;
	}
?>
<!doctype html>
<html lang="es">

 <head>
 	<?php include_once("info.php"); ?>
 	<title><?php echo $nombreDelSitio; ?> | Cerrar sesión</title>
 	<?php include_once("header.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta http-equiv="refresh" content="3; url=../ingresar.php" />
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
 
<body>
	<?php include_once("nav.php"); ?>
 	<div id="contenido" style="margin-top: 62px;">
		<?php if($bandera) { ?>
		<p>Se cerró la sesión.</p>
		<p>Si no sos redirigido en breves segundos, <a href="../ingresar.php">hacé clic acá</a>.</p>
		<?php } else { ?>
		<p>No se pudo cerrar la sesión, ¿estabas logueado?</p>
		<?php }?>
 	</div>
</body>
</html>
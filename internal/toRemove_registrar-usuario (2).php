<?php include_once("info.php"); ?>
<!doctype html>
<html lang="es">

 <head>
 	<title><?php echo $nombreDelSitio; ?> | Registrar usuario</title>
 	<?php include_once("internal/header.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
 
<body>
<div id="contenido" style="margin-top: 62px;">
 <?php
 include_once("internal/header.php");
 	/* Escape de simbolos html y php, tanto de manera explicita
		como en alternativas. Ejemplo "&gt" es igual a ">"
	*/
	$emailSaneado = strip_tags(htmlspecialchars($_REQUEST["email"]));
	$contrasenaSaneada = strip_tags(htmlspecialchars($_REQUEST["contrasena"]));
	$contrasenaRepetidaSaneada = strip_tags(htmlspecialchars($_REQUEST["contrasenaRepetida"]));
	/* Se crea tu carpeta de usuario con las credenciales y archivos
	basicos de usuario, si las contraseñas son idénticas */
	$rutaUsuario = "user/".$emailSaneado; /* La ruta completa al usuario. Se le puede agregar "credenciales.php" 
												para referirse al archivo que almacena las credenciales del usuario.
												Tené en cuenta que el usuario tiene archivos de configuración extra,
												cómo opciones-de-perfil.php y configuracion.php */
	if($contrasenaSaneada === $contrasenaRepetidaSaneada) {
		
		if(!file_exists($rutaUsuario)){
			mkdir($rutaUsuario, 0777) OR DIE("No se pudo crear el usuario, contactate con la
				<a href=´".$emailAdm."´>administración</a>. <a href='javascript:history.back();'>Volver</a>");
			// Credenciales de usuario
			date_default_timezone_set('GMT-3'); // Pongo la zona en GMT-3 para Buenos Aires/Brasilia
			$diaDeRegistro = strip_tags(htmlspecialchars(date("m.d.y")));
			$credencialesOpen = fopen("../".$rutaUsuario."/credenciales.php", "w");
			fwrite($credencialesOpen, '<?php $post=false; $emailUsuario="'.$emailSaneado.'"; $contrasenaUsuario="'.$contrasenaSaneada.'"; $diaDeRegistro="'.$diaDeRegistro.'"; $rank="adm"; ?>');
			fclose($credencialesOpen);
			// Opciones de perfil (avatar, portada, si es público o no, etc)
			$opcionesDePerfil = fopen("../".$rutaUsuario."/opciones-de-perfil.php", "w");
			fwrite($opcionesDePerfil, '<?php $avatar="https://images.template.net/wp-content/uploads/2014/09/Beautiful-Logo-Design1.jpg"; $portada="https://www.wallpaperup.com/uploads/wallpapers/2013/01/19/30279/5c6a16b1beb546791242243ea712831f.jpg";  $publico=false; ?>');
			fclose($opcionesDePerfil);
			// Configuración (notificaciones en la APP (si existe), notificaciones vía email)
			$configuracionArchivo = fopen("../".$rutaUsuario."/configuracion.php", "w");
			fwrite($configuracionArchivo, '<?php $notificacionesEnApp=false; $notificacionesViaEmail=false; ?>');
			fclose($configuracionArchivo);
			/* Se crea este archivo para indexar los posts del usuario, que por defecto (cuando no hay posts)
			imprime el mensaje "No tenés posts de tu autoria." */
			$misPostsArchivo = fopen("../".$rutaUsuario."/mis-posts.php", "w");
			fwrite($misPostsArchivo, "<?php echo 'No tenés posts de tu autoría.';");
			fclose($misPostsArchivo);
			echo "¡Gracias por registrarte! Te enviaremos un email a ".$emailSaneado." con tus credenciales.";
		} else {
			echo "Este mail ya fue registrado, <a href='recuperar-contrasena.php'>¿perdiste tu contraseña?</a>.";
		}

	} else {
		echo "Las contraseñas no coinciden. <a href='javascript:history.back();'>Volver</a>.";
	}
	
 ?>
</div>
</body>
</html>
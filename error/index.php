<!-- ERROR -->
<!doctype html>
<html lang="es">

 <head>
 	<?php include_once("../internal/info.php"); ?>
 	<title><?php echo $nombreDelSitio; ?> | Error</title>
     <?php include_once("../internal/header.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>
<style>
body {background-color: #1b386f;color: #fff;}
img {float: left;}
</style>
<!-- Navegación -->
<?php include_once(locacion()."template/main/include/nav.php"); ?>
		

<div id="root"><div id="reviews">
<img src="animacion.gif" />
<?php 
	include_once(locacion()."function/sesion.php");
	if( isLogIn() ) {
        include_once(locacion()."internal/importUser.php");
        echo "<p>¡Hola ".$aliasUsuario."! Ocurrió un error.</p>";
    } else {
        echo "<p>¡Hola! Ocurrió un error. ¿Quisiste ingresar a un perfil prohibido o que no existe?</p>";
    }
?>
<p><a href="javascript:window.history.back();">Volvé a la página anterior</a></p>
</div></div>
</body>
</html>
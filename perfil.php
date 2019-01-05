<!doctype html>
<html lang="es">

 <head>
 	<?php include_once("internal/info.php"); ?>
 	<title><?php echo $nombreDelSitio; ?> | Mi perfil</title>
 	<?php include_once(locacion()."internal/header.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
<!-- Tomar este archivo PHP como template para los demás, porque está organizadito <3 -->
<body>

<?php include_once(locacion()."template/main/include/nav.php"); ?>

<div id="centrado" style="margin-top: 52px;">
<?php	
include_once(locacion()."function/sesion.php");
if(isLogIn()) {
	include_once(locacion()."internal/importUser.php");
?>
	<div id="portada">

	perfil.php
	</div>
<?php } else {
    echo "<div id='centrado' style='margin-top:72px;'><p>No iniciaste sesión correctamente. <a href='ingresar.php'>Iniciar sesión</a></p></div>";
    }
?>
</div>
</body>
</html>
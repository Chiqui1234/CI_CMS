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
<div id="root">
<?php	
include_once(locacion()."function/sesion.php");
if(isLogIn()) {
	include_once(locacion()."internal/importUser.php");
?>
<div class="profileSidebar">
	<div class="nickname">@<?php echo $aliasUsuario; ?></div>
	<div class="email"><?php echo $emailUsuario; ?></div>
		<div id="posts"><h2>Posts</h2>
			<ul><?php include_once("user/".$_COOKIE["emailCookie"]."/mis-posts.php"); ?></ul>
		</div>
</div>


	<div id="portrait" style="background-image:url('https://i.imgur.com/pLpuOYG.png');">
	 <div class="configuration">
	 	<div class="theming"><a href="internal/themingUser.php"></a></div>
		<div class="credentials"><a href="internal/credentials.php"></a></div>
	 </div>
	</div>

<?php } else {
    echo "<p>No iniciaste sesión correctamente. <a href='ingresar.php'>Iniciar sesión</a></p>";
    }
?>
</div>
</body>
</html>
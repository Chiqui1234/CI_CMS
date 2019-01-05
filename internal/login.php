<?php
include_once("info.php");
include_once(locacion()."function/purify.php");
$start = array(
	$_REQUEST["email"],
	$_REQUEST["contrasena"]
);
$end = sanear($start, 2);
$contrasenaToken = md5($end[1]);

$estadoLogin = false;
$rutaUsuario = locacion()."user/".$end[0];
require_once(locacion()."function/sesion.php");
if(file_exists($rutaUsuario)) {
	require_once($rutaUsuario."/credenciales.php"); // Dónde tengo a $contrasenaUsuario, para comparar después
	require_once($rutaUsuario."/contrasena-token.php"); // Dónde tengo a $contrasenaTokenUsuario, que se instancia al crear usuario / editar contraseña del usuario
	if( $end[1] == $contrasenaUsuario && $contrasenaTokenUsuario == $contrasenaToken ) {
		$estadoLogin = true;
		setcookie("emailCookie", $end[0], time() + (86400 * 30), "/"); // 86400 = 1 day
		setcookie("contrasenaCookie", $end[1], time() + (86400 * 30), "/");
		//	 
		$contrasenaTokenAEscribir = '<?php $contrasenaTokenUsuario=md5("'.$contrasenaUsuario.'"); ?>';
    	$tokenRuta = fopen($rutaUsuario."/contrasena-token.php", "w");
    	fwrite($tokenRuta, $contrasenaTokenAEscribir);
		fclose($tokenRuta);
		//
		require_once($rutaUsuario."/contrasena-token.php"); // DEBE EXISTIR SIEMPRE
	}
} else {
	echo "file_exists() no encontró la ruta del usuario";
}

?>

<!doctype html>
<html lang="es">

 <head>
 	<title><?php echo $nombreDelSitio; ?> | Mi perfil</title>
 	<?php include_once(locacion()."internal/header.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
<body>

<?php include_once(locacion()."internal/header.php"); ?>

<div id="centrado" style="margin-top: 52px;">
<?php
	if($estadoLogin) {
		echo "<p>¡Bienvenido ".$end[0]."!</p>";
 		//echo "<p>Hash: <strong>".$contrasenaToken."</strong></p>";
 		echo "<p>Si tu navegador no te redirige en unos pocos segundos, <a href='../perfil.php'>hacé clic acá</a>.</p>";
	} else {
		echo "<p>Revisá tus datos. <br/>DEBUG:</p>";
		if(isLogIn()){
			echo "<p>El usuario <a href='".$rutaUsuario."'>".$end[0]."</a> logueó.</p>";
		} else{
			echo "<p>El usuario <a href='".$rutaUsuario."'>".$end[0]."</a> no está logueado.</p>";
		}
		echo "<p>Ruta del usuario: ".$rutaUsuario."</p>";
		echo "<p>Contraseña usuario: ".$contrasenaUsuario."</p>";
		echo "<p>Contraseña saneada: ".$end[1]."</p>";
		echo "<p>Contraseña saneada (md5): ".md5($end[1])."</p>";
		echo "<p>Contraseña (token) (md5): ".$contrasenaToken."</p>";
	} 
?>
</div>
</body>
</html>
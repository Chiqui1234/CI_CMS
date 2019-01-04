<!doctype html>
<html lang="es">

 <head>
 	<?php include_once("informacion-sub.php"); ?>
 	<title><?php echo $nombreDelSitio; ?> | Editar perfil</title>
 	<?php include_once("header-html-sub.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
 
<body>

<?php
	include_once("../usuario/".strip_tags(htmlspecialchars($_COOKIE["emailCookie"]))."/credenciales.php");
	include_once("../usuario/".strip_tags(htmlspecialchars($_COOKIE["emailCookie"]))."/opciones-de-perfil.php");
	include_once("../usuario/".strip_tags(htmlspecialchars($_COOKIE["emailCookie"]))."/configuracion.php");
$avatar = $_REQUEST["avatar"];
$portada = $_REQUEST["portada"];
$publico = $_REQUEST["publico"];

if(isset($avatar)) {
	$avatarUsuario = $avatar;
	echo "Avatar: ".$avatar."<br />AvatarUsuario: ".$avatarUsuario;
}
if(isset($portada)) {
	$portadaUsuario = $portada;
	echo "Portada: ".$portada."<br />PortadaUsuario: ".$portadaUsuario;
}
if(isset($publico)) {
	$publicoUsuario = $publico;
	echo "Público: ".$publicoUsuario;
}

$editado = '<?php $avatarUsuario="'.$avatarUsuario.'"; $portadaUsuario="'.$portadaUsuario.'";  $publicoUsuario='.$publicoUsuario.'; ?>';

$opcionesdeperfil = fopen("../usuario/".strip_tags(htmlspecialchars($_COOKIE["emailCookie"]))."/opciones-de-perfil.php", "a+");
fwrite($opcionesdeperfil, $editado);
fclose($opcionesdeperfil);
?>

</body>
</html>
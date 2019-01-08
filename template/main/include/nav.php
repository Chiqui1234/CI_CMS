<?php
/*	Esta porción de código sirve para cambiar los dos últimos elementos de la navegación. */
include_once(locacion()."function/sesion.php");
$user = "";
$urlUser = "";
$urlUserNav = "";
if( isLogIn() ) { // Si la sesión está iniciada, el anteúltimo <li> tendrá el nombre de usuario
	$user = $_COOKIE["emailCookie"];
	$urlUser = locacion()."user/".$user."/credenciales.php";
	if(file_exists($urlUser)) {
		$urlUserNav = "perfil.php";
	} else { // En caso de que se esté inyectando una cookie o el usuario esté con archivos corruptos
		$urlUserNav = "error/";
		$user = "Tu usuario no existe";
	}
} else { // Si la sesión no está iniciada, se lleva a la página ingresar.php, para el logIn :D
	$urlUserNav = "ingresar.php";
	$user = "Ingresar";
}
?>
<div class="opener"><a href="#nav"></a></div>

<div id="nav">
	<div class="close"><a href="#"></a></div>
	<div class="logo">CHIQUI'S</div>

	<div class="links">
		<ul>
			<li><a href="<?php echo locacion(); ?>index.php">Inicio</a></li>
			<li><a href="<?php echo locacion(); ?>index.php#reviews">Reviews</a></li>
			<li><a href="<?php echo locacion(); ?>index.php#notas">Notas</a></li>
			<li><a href="<?php echo locacion(); ?>taller.php">Taller</a></li>
			<li><a href="<?php echo locacion().$urlUserNav; ?>"><?php echo $user; ?></a></li>
			<?php if( isLogIn() ) { ?><li><a href="<?php echo locacion(); ?>panel">Escritorio</a></li><?php } ?>
		</ul>
	</div>
</div>
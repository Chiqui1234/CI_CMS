<?php
include_once(locacion()."function/sesion.php");
$user = "";
$urlUser = "";
$urlUserNav = "";
if( isLogIn() ) {
	$user = $_COOKIE["emailCookie"];
	$urlUser = locacion()."user/".$user."/credenciales.php";
	if(file_exists($urlUser)) {
		$urlUserNav = "perfil.php";
	} else {
		$urlUserNav = "error/";
		$user = "Tu usuario no existe";
	}
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
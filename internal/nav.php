<?php include_once(locacion()."function/sesion.php"); ?>
<header>
<div id="logo"><a href="<?php if(strpos($_SERVER['PHP_SELF'], "index.php")){ ?>sobre-mi.php<?php } else { ?>index.php<?php } ?>">CHIQUI'S</a></div> <!-- Tiene que dirigirse a sobre-chiqui.php, cuándo estoy en index.php -->
	<div id="nav">
		<ul>
			<li><a href="<?php locacion(); ?>index.php#reviews" class="preOculto">Reviews</a></li>
			<li><a href="<?php locacion(); ?>index.php#notasNav" class="preOculto">Notas</a></li>
			<li><a href="<?php locacion(); ?>taller.php" class="preOculto">Taller</a></li>
			<?php if(isLogIn()) {
				include_once(locacion()."user/".$_COOKIE["emailCookie"]."/credenciales.php");
			?>
			<li><a href="<?php locacion(); ?>perfil.php">Perfil</a></li>
			<?php 
				if($rank=0 || $rank=1) { ?>
					<li><a href="<?php locacion(); ?>panel">Panel</a></li>
				<?php }
			} else {
			?>			
			<li><a href="<?php locacion(); ?>ingresar.php">Ingresar</a></li>
			<?php
			}
			?>
		</ul>
	</div>
	<div id="busqueda">
		<form action="buscar.php" method="get">
			<input type="text" name="busqueda" placeholder="Buscá lo que quieras..." />
			<input type="submit" value="" />
		</form>
	</div>
</header>

<?php include_once("internal/info.php"); ?>

<!doctype html>
<html lang="es">

 <head>
 	<title><?php echo $nombreDelSitio; ?> | Ingresar</title>
 	<?php include_once("internal/header.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>
<?php include_once("internal/nav.php");
include_once("function/sesion.php");
if(isLogIn()) {
  include_once("internal/importUser.php");
  echo "¡Ya iniciaste sesión! <a href='perfil.php'>Andá a tu perfil</a>";
} else {
?>
<div id="contacto" style="margin-top:62px;">
 <div id="reCentrado">
	<form action="internal/login.php" method="post">
		<input type="text" name="email" placeholder="E-mail" />
		<input type="password" name="contrasena" placeholder="Contraseña" />
		<input type="submit" name="ingresar" value="Ingresar a infosegura" />
	</form>
	<p>¿No tenés cuenta? <a href="internal/registrarme.php">Registrate</a></p><br />
  <p>Si olvidaste tu contraseña, <a href="internal/recuperar-contrasena.php">recuperala acá</a>.</p>
 </div>
</div>

<div id="anuncio">
 <div id="contenido">
 <h1>¿Por qué registrarte en InfoSegura?</h1>
  <ul>
  	<li>Podrás acceder al contenido digital de nuestras charlas.</li>
  	<li>Te avisamos de cosas interesantes por email, de verdad.</li>
  	<li>Con cada charla que asistís, ¡sumás puntos para canjear por material!</li>
  </ul>
  <p>Leete los <a href="#">términos y condiciones</a> de nuestro sitio web. Al registrarte se sobre entiende que
  los aceptaste. No es muy largo, ¡vale la pena!</p>
  <p><a href="registrarme.php">Hacé clic acá para registrarte</a>.</p>
 <h1>¿Es obligatorio?</h1>
  <p>Para nada. Si ya asististe a charlas y seminarios nuestros, podrás acceder al material digital de igual forma,
  sólo que no sumarás puntos para canjear, próximamente, por productos de nuestra autoría. Podés subscribirte
  igualmente a nuestro newsletter más abajo, para estar pendiente de nuestras noticias y eventos más importantes.</p>
  <p>De hecho, para comentar nuestros posts será suficiente con una cuenta de Facebook que ya tengas.</p>
  <form action="newsletter.php" method="post">
  		<input type="text" name="email" placeholder="E-mail" />
  		<input type="submit" name="ingresar" value="Subscribirme al newsletter" />
  </form>
 </div>
</div>
<?php
  }
?>
</body>
</html>

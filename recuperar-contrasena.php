<?php include_once("internal/info.php"); ?>
<!doctype html>
<html lang="es">

 <head>
 	<title><?php echo $nombreDelSitio; ?> | Recuperar contraseña</title>
 	<?php include_once(locacion()."internal/header.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>
<?php include_once(locacion()."internal/nav.php"); ?>
<div id="contacto" style="margin-top:62px;">
 <div id="reCentrado">
 <h1>¿Perdiste tu contraseña?</h1>
 <p>Si tenés un email registrado en este sitio web y te olvidaste tu contraseña, solicitá la recuperación de
 tu cuenta.</p>
 <p>Introducí tu email:</p>
   <form action="internal/recuperar-contrasena-email.php" method="post">
  	<input type="text" name="email" placeholder="E-mail" />
  	<input type="submit" value="Recuperar contraseña" />
   </form>
 </div>
</div>

</body>
</html>

<?php include_once("internal/info.php"); ?>
<!doctype html>
<html lang="es">

 <head>
 	<title><?php echo $nombreDelSitio; ?> | Registrarme</title>
 	<?php include_once("internal/header.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>
  <?php
  include_once("template/main/include/nav.php");
  include_once("function/sesion.php");
  if(isLogIn()) {
    echo '<div id="centrado" style="margin-top: 62px;">¡Ya estás registrado!</div>';
  } else {
  ?>
<div id="contenido" style="margin-top: 62px;">
 <form action="" method="post">
  <input type="text" name="email" placeholder="Nombre de usuario" />
  <input type="text" name="email" placeholder="E-mail" />
	<input type="password" name="contrasena" placeholder="Contraseña" />
	<input type="password" name="contrasenaRepetida" placeholder="Repetí contraseña" />
	<input type="submit" name="registro" value="Registrarte" />
 </form>
 <p>Si olvidaste tu contraseña, <a href="recuperar-contrasena.php">recuperala acá</a>.</p>
</div>
<?php 
if( isset($_REQUEST["alias"]) && isset($_REQUEST["email"]) && isset($_REQUEST["contrasena"]) && isset($_REQUEST["contrasenaRepetida"]) ) {
  crearUsuario($_REQUEST["alias"], $_REQUEST["email"], $_REQUEST["contrasena"], $_REQUEST["contrasenaRepetida"], 2, 0, 0);
} else {
  echo '<div id="centrado" style="margin-top: 62px;">Rellená todos los campos.</div>';
}

} ?>
</body>
</html>

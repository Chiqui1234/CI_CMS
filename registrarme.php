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
  include_once("internal/nav.php");
  include_once("function/sesion.php");
  if(chequeoSesionActiva()) {
    /*$rutaUsuario = "user/".strip_tags(htmlspecialchars($_COOKIE["emailCookie"]));
    include_once($rutaUsuario."/credenciales.php");
    include_once($rutaUsuario."/opciones-de-perfil.php");
    include_once($rutaUsuario."/configuracion.php");*/
    echo '<div id="centrado" style="margin-top: 62px;">¡Ya estás registrado!</div>';
  } else {
  ?>
<!-- Recordemos que los permisos se escriben como:
PropietarioGrupoOtros y tenemos que sumar estos valores según querramos:
    Lectura: 4
    Escritura: 2
    Ejecución: 1
Por lo que si le queremos aplicar permisos de
lectura y escritura a todos (usuario propietario, grupo y usuario), sería 666 porque
Lectura+Escritura, es decir, 4+2, resulta en 6). -->
<div id="contenido" style="margin-top: 62px;">
 <form action="internal/registrar-usuario.php" method="post">
	<input type="text" name="email" placeholder="Tu email" />
	<input type="password" name="contrasena" placeholder="Tu contraseña" />
	<input type="password" name="contrasenaRepetida" placeholder="Repetí tu contraseña" />
	<input type="submit" name="registro" value="Registrarte en infosegura" />
 </form>
 <p>Si olvidaste tu contraseña, <a href="recuperar-contrasena.php">recuperala acá</a>.</p>
</div>
<?php } ?>
</body>
</html>

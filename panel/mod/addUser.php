<!doctype html>
<html lang="es">

 <head>
 	<?php include_once("../../internal/info.php"); ?>
 	<title><?php echo $nombreDelSitio; ?> | Agregar <?php $_REQUEST["alias"]; ?></title>
 	<link rel="stylesheet" href="../css/panel.css" />
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>
  <?php include_once("../function/addUser.php");

	$rutaUsuario = "../usuario/".$_REQUEST["email"]; /* La ruta completa al usuario. Se le puede agregar "credenciales.php"
	para referirse al archivo que almacena las credenciales del usuario.
	Tené en cuenta que el usuario tiene archivos de configuración extra,
	cómo opciones-de-perfil.php y configuracion.php */
  if( isset($_REQUEST["email"]) && isset($_REQUEST["contrasena"]) && isset($_REQUEST["contrasenaRepetida"]) && $_REQUEST["contrasena"]===$_REQUEST["contrasenaRepetida"] && !strpos($_REQUEST["contrasena"], " ") || strlen($_REQUEST["contrasena"]) > 8 ) {
    if(strpos($_REQUEST["email"], "@outlook") || strpos($_REQUEST["email"], "@gmail") || strpos($_REQUEST["email"], "@yahoo")) {
      
      crearUsuario($_REQUEST["alias"], $_REQUEST["email"], $_REQUEST["contrasena"], $_REQUEST["contrasenaRepetida"], $_REQUEST["rank"], $_REQUEST["active"], $end[5]);
      // Arranca el ELSE de la validación de servidores de email
      } else {
        echo "<p>Sólo se admiten correos electrónicos de Outlook, Gmail o Yahoo. ¿Estás usando un email de tu empresa? Por favor, nunca utilices esos correos para registrarte en ningún sitio. El uso debe ser exclusivo de la empresa, caso contrario podrías sufrir de:</p>
        <ul>
        <li>Spam en tu casilla de correo.</li>
        <li>Un ciberataque a tu casilla de correo o empresa.</li>
        </ul>
        <p>¿Creés que tu empresa no se toma muy en serio la seguridad? ¡<a href='../pedir-charla.php'>Pedinos una charla</a>!</p>";
        }
      } else {
        echo "<p>Asegurate de haber rellenado todos los campos y que tu contraseña sea de al menos 8 caracteres y sin espacios.</p>";
      }
  ?>
</body>
</html>

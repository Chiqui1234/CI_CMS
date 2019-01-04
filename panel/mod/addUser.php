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
  include_once("../../function/purify.php"); /* Purify (función que sanea cadenas de texto) está en /function
  (en directorio raíz) porque es una función global que se usa para diversas partes del CMS  */
 
  $start = array(
    $_REQUEST["alias"],
    $_REQUEST["email"],
    $_REQUEST["contrasena"],
    $_REQUEST["contrasenaRepetida"],
    $_REQUEST["active"],
    $public = 0, // El usuario no es público (por defecto)
    $_REQUEST["rank"]
  );

  $end = sanear($start, 7);

	$rutaUsuario = "../usuario/".$end[1]; /* La ruta completa al usuario. Se le puede agregar "credenciales.php"
	para referirse al archivo que almacena las credenciales del usuario.
	Tené en cuenta que el usuario tiene archivos de configuración extra,
	cómo opciones-de-perfil.php y configuracion.php */
  if( isset($end[1]) && isset($end[2]) && isset($end[3]) && $end[2]===$end[3] && !strpos($end[2], " ") || strlen($end[2]) > 8 ) {
    if(strpos($end[1], "@outlook") || strpos($end[1], "@gmail") || strpos($end[1], "@yahoo")) {
      
      crearUsuario($end[0], $end[1], $end[2], $end[3], $end[6], $end[4], $end[5]);
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

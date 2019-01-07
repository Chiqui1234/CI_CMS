<?php /* HAY QUE ACTUALIZAR ESTE ARCHIVO CON LAS NUEVAS FUNCIONES QUE DESARROLLÉ */ ?>
<?php include_once("info.php"); ?>
<!doctype html>
<html lang="es">

 <head>
 	<title><?php echo $nombreDelSitio; ?> | Registrar usuario</title>
 	<?php include_once(locacion()."internal/header.php"); ?> <!-- Para insertar estilos CSS -->
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>

<body>
<?php include_once(locacion()."internal/header.php"); ?>
<?php include_once(locacion()."function/sesion.php");
if(chequeoSesionActiva()) {
    $rutaUsuario = "user/".strip_tags(htmlspecialchars($_COOKIE["emailCookie"]));
    include_once($rutaUsuario."/credenciales.php");
    include_once($rutaUsuario."/opciones-de-perfil.php");
    include_once($rutaUsuario."/configuracion.php");
    echo '<div id="centrado" style="margin-top: 62px;">¡Ya estás registrado!</div>';
} else {
  /* Escape de simbolos html y php, tanto de manera explicita
		como en alternativas. Ejemplo "&gt" es igual a ">"
	*/
	$emailContacto = strip_tags(htmlspecialchars($_REQUEST["email"]));
	$contrasenaSaneada = strip_tags(htmlspecialchars($_REQUEST["contrasena"]));
	$contrasenaRepetidaSaneada = strip_tags(htmlspecialchars($_REQUEST["contrasenaRepetida"]));
	/* Se crea tu carpeta de usuario con las credenciales y archivos
	basicos de usuario, si las contraseñas son idénticas */
	$rutaUsuario = "../usuario/".$emailContacto; /* La ruta completa al usuario. Se le puede agregar "credenciales.php"
												para referirse al archivo que almacena las credenciales del usuario.
												Tené en cuenta que el usuario tiene archivos de configuración extra,
												cómo opciones-de-perfil.php y configuracion.php */
	if( isset($emailContacto) && isset($contrasenaSaneada) && isset($contrasenaRepetidaSaneada) && !strpos($contrasenaSaneada, " ") && strlen($contrasenaSaneada) > 8 ) {
   if(strpos($emailContacto, "@outlook") || strpos($emailContacto, "@gmail") || strpos($emailContacto, "@yahoo")) {
      if($contrasenaSaneada === $contrasenaRepetidaSaneada){
        include_once(locacion()."funcion/crearUsuario.php");
        crearUsuario($emailAdm, $nombreDelSitio, $rutaUsuario, $emailContacto, $contrasenaSaneada, $contrasenaRepetidaSaneada);
      } else {
        echo '<div id="centrado" style="margin-top: 62px;">Las contraseñas no pueden tener espacios y deben tener 8 caracteres o más.</div>';
      }
   // Arranca el ELSE de la validación de servidores de email
   } else {
     echo "<div id='centrado'><p>Sólo se admiten correos electrónicos de Outlook, Gmail o Yahoo. ¿Estás usando un email de tu empresa? Por favor, nunca utilices esos correos para registrarte en ningún sitio. El uso debe ser exclusivo de la empresa, caso contrario podrías sufrir de:</p>
     <ul>
      <li>Spam en tu casilla de correo.</li>
      <li>Un ciberataque a tu casilla de correo o empresa.</li>
     </ul>
     <p>¿Creés que tu empresa no se toma muy en serio la seguridad? ¡<a href='../pedir-charla.php'>Pedinos una charla</a>!</p></div>";
   }
 } else {
    echo "<div id='centrado'><p>Asegurate de haber rellenado todos los campos y que tu contraseña sea de al menos 8 caracteres y sin espacios.</p></div>";
 }

} // Se cierra ELSE de chequeoSesionActiva()
?>
</body>
</html>

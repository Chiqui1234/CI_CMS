<?php 
if(strpos($_SERVER['PHP_SELF'], "panel/mod") || strpos($_SERVER['PHP_SELF'], "panel/function")) {
    include_once("../../internal/info.php");
} else if(strpos($_SERVER['PHP_SELF'], "internal")) {
    include_once("info.php");
} else {
    include_once("internal/info.php");
} ?>

<?php
include_once(locacion()."function/sesion.php");
include_once(locacion()."internal/importUser.php");
include_once(locacion()."function/purify.php"); // Para el saneamiento de entrada del usuario
function crearUsuario($alias, $email, $contrasena, $contrasenaRepetida, $rank, $active, $public) {
if(isLogIn() && $rol==0 || $active==0) { // Si el usuario es Administrador y está logueado, o bien si se va a crear una cuenta inactiva... le damos para adelante
    include_once(locacion()."internal/importUser.php");
  $start = array ($alias, $email, $contrasena, $contrasenaRepetida, $rank, $active, $public);
  $end = sanear($start, 7);
  if( (strpos($end[1], "@outlook") || strpos($end[1], "@hotmail") || strpos($end[1], "@live") || strpos($end[1], "@gmail") || strpos($end[1], "@yahoo")) && (!preg_match("/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:\<\>,\.\?\\\]/", $end[0])) ) { /* Ese preg_match le faltan filtros, revisar */
   $rutaUsuario = locacion()."user/".$end[0];
    if(!file_exists($rutaUsuario) && $end[2] === $end[3]) { // Si el usuario no existe y las contraseñas coinciden, se puede crear ;D
      mkdir($rutaUsuario, 0777) OR DIE("<div id='centrado'><p><b>ERROR</b>: No se puede crear el espacio del usuario.</p>
      <p>Contactate con la <a href=´mailto:".$emailAdm."´>administración</a>. <a href='javascript:history.back();'>Volver</a>.</p></div>");
    // Credenciales de usuario
    date_default_timezone_set("America/Argentina/Buenos_Aires"); // Pongo la zona en GMT-3 para Buenos Aires
    $diaDeRegistro = strip_tags(htmlspecialchars(date("m.d.y")));
    $credencialesOpen = fopen($rutaUsuario."/credenciales.php", "w");
    fwrite($credencialesOpen, '<?php $activoUsuario='.$end[5].'; $aliasUsuario="'.$end[0].'"; $emailUsuario="'.$end[1].'"; $contrasenaUsuario="'.$end[2].'"; $diaDeRegistro="'.$diaDeRegistro.'"; $rank='.$end[4].'; /* 0: administrador | 1: autor | 2: visitante */ ?>');
    fclose($credencialesOpen);
    /* Cómo el estado por defecto al crear la cuenta es "inactiva", debemos enviar un e-mail con un link para activar la cuenta	*/
    // Así que primero debemos crear la página que active la cuenta
    $codigoPaginaActivadora = '<!doctype html>
    <html lang="es">
    <head>
      <?php include_once("../../internal/info.php"); ?>
      <title><?php echo $nombreDelSitio; ?></title>
      <?php include_once("../../internal/header.php"); ?> <!-- Para insertar estilos CSS -->
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      <?php
      if( file_exists("credenciales.php") ) {
      include_once("credenciales.php");
        if(!$active) {
          $editarCredenciales = fopen("credenciales.php", "r+");
          $nuevasCredenciales = "<?php $activoUsuario='.$end[5].'; $aliasUsuario='.$end[0].'; $emailUsuario="'.$end[1].'"; $contrasenaUsuario="'.$end[2].'"; $diaDeRegistro="'.$diaDeRegistro.'"; $rank='.$end[4].'; /* 0: administrador | 1: autor | 2: visitante */ ?>");
          fwrite($editarCredenciales, $nuevasCredenciales);
          fclose($editarCredenciales);
          echo "<p>¡Tu cuenta fue activada!</p>";
        } else {
          echo "<p>Tu cuenta fue activada anteriormente.</p>";
        }
      }
      ?>
    </body>
    </html>';
    $paginaActivadora = fopen($rutaUsuario."/activar.php", "w");
    fwrite($paginaActivadora, $codigoPaginaActivadora);
    fclose($paginaActivadora);
    //include_once("../plug-in/formulario-de-contacto/contacto.php");
    //emailMain("Activar tu cuenta de ".$nombreDelSitio);
    //
    // Opciones de perfil (avatar, portada, si es público o no, etc)
    $opcionesDePerfil = fopen($rutaUsuario."/opciones-de-perfil.php", "w");
    fwrite($opcionesDePerfil, '<?php $avatarUsuario="https://scontent.faep4-1.fna.fbcdn.net/v/t1.0-9/31351289_1778476068842197_8811803553015267328_n.jpg?_nc_cat=0&oh=01408922f19b269638b3aa996b57e965&oe=5C0A98AA";
    $portadaUsuario="img/portada/space3.jpg";  $publicoUsuario='.$end[6].'; ?>');
    fclose($opcionesDePerfil);
    // Configuración (notificaciones en la APP (si existe), notificaciones vía email)
    $configuracionArchivo = fopen($rutaUsuario."/configuracion.php", "w");
    fwrite($configuracionArchivo, '<?php $notificacionesEnApp=false; $notificacionesViaEmail=false; ?>');
    fclose($configuracionArchivo);
    /* Se crea este archivo para indexar los posts del usuario, que por defecto (cuando no hay posts)
    imprime el mensaje "No tenés posts de tu autoria." */
    $misPostsArchivo = fopen($rutaUsuario."/mis-posts.php", "w");
    fwrite($misPostsArchivo, "<?php echo 'No tenés posts de tu autoría.'; ?>");
    fclose($misPostsArchivo);
    /* Creamos el token */
    $contrasenaTokenAEscribir = '<?php $contrasenaTokenUsuario=md5("'.$end[2].'"); ?>';
    $tokenRuta = fopen($rutaUsuario."/contrasena-token.php", "w");
    fwrite($tokenRuta, $contrasenaTokenAEscribir);
    fclose($tokenRuta);
    echo "<div id='centrado'>¡Gracias por registrarte! Te enviaremos un email a ".$end[1]." con tus credenciales. ¡Validá tu cuenta e <a href='../../ingresar.php'>iniciá sesión</a>!</div>";
  } else {
    echo "<div id='centrado'>Este mail ya fue registrado, <a href='../../recuperar-contrasena.php'>¿perdiste tu contraseña?</a>.</div>";
  }
} else {
  echo "<div id='centrado'>Debés usar emails reconocidos, cómo gmail, outlook/hotmail/live y yahoo. Además, tu nombre de usuario no debe contener caracteres especiales.</div>";
} // Cierre chequeo de emails
} /* Cierre logIn */ else {
  echo "<div id='centrado'>No iniciaste sesión.</div>";
}
} // Cierre función
?>
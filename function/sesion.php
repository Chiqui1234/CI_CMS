<?php
//
// Esta función debe estar presente en todas las páginas que requieran de un inicio de sesión
// INCLUIR LOCACION() NUEVAMENTE ACÁ ES UNA GRASADA, TENGO QUE CORREGIRLO C:
function locacionP() {
$ruta = $_SERVER['PHP_SELF'];
  if(strpos($ruta, "panel/mod") || strpos($ruta, "panel/function")) { // Directorios de archivos internos del CMS
    return "../../";
  } elseif(strpos($ruta, "function") || strpos($ruta, "plug-in") || strpos($ruta, "panel") || strpos($ruta, "internal")) {
    return "../";
  } else { // Todo lo demás
    return "";
  }
}
include_once(locacionP()."internal/info.php"); // Se lo llama desde un directorio raíz, casi siempre
include_once(locacionP()."function/purify.php"); // Sanear entrada del usuario (o en este caso, cookies)
function isLogIn() {
    if( (isset($_COOKIE["emailCookie"])) && (isset($_COOKIE["contrasenaCookie"])) && file_exists(locacionP()."user/".$_COOKIE["emailCookie"]) ) {
      // Si están seteadas las cookies, el usuario logueó y se importan sus archivos de configuración
      // Por las dudas, se revisa que el usuario sea válido. Sin esta comprobación se podrían inyectar usuarios falsos mediante cookies
      return TRUE;
      } else {return FALSE;}
} // Cierre de función
?>

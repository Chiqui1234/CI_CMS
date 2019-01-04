<?php
$nombreDelSitio = "Chiqui's";
$sloganDelSitio = "";
$emailAdm = "santiagogimenez@outlook.com.ar";
$version = 0.3; // Versión del sitio
/*  El script necesita saber en que carpeta está siendo
  ejecutado para poder llamar a las funciones, estilos,
  e imágenes necesarios para la correcta visualización
  del sitio web.  */
  function locacion() {
  $ruta = $_SERVER['PHP_SELF'];
  
  if(strpos($ruta, "panel/mod") || strpos($ruta, "panel/function")) { // Directorios de archivos internos del CMS
    return "../../";
  } elseif(strpos($ruta, "function") || strpos($ruta, "plug-in") || strpos($ruta, "panel") || strpos($ruta, "internal")) {
    return "../";
  } else { // Todo lo demás
  return "";
  }
  }
?>

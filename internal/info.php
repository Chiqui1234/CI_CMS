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
    if( strpos($ruta, "tienda") || strpos($ruta, "panel/mod") || strpos($ruta, "panel/function") || strpos($ruta, "panel/mod") || strpos($ruta, "template/main") || strpos($ruta, "notas") || strpos($ruta, "reviews") ) { // "reviews" y "notas" agregado por el creador de páginas
        /* A pesar de que "reviews" y "notas" está un nivel por abajo del directorio raíz, tengamos en cuenta que estas dos carpetas tienen subcarpetas, no archivos. Por eso, info.php es llamado desde la subcarpeta, es
        decir por ejemplo: /notas/BienvenidoaCI_CMS/index.php (se sube dos directorios y estamos en la raíz) */
        return "../../";
    } elseif( strpos($ruta, "error") || strpos($ruta, "function") || strpos($ruta, "plug-in") || strpos($ruta, "panel") || strpos($ruta, "internal") ) {
        return "../"; // Cuándo estoy un nivel por debajo de la raíz
    } else {
        return ""; // Cuándo estoy en directorio raíz
    }
  }
  $location = locacion(); /* Guardo el resultado en una variable para no llamar constantemente a la función */
?>

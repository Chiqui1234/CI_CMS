<?php
function locacion() {
  $ruta = $_SERVER['PHP_SELF'];
  if(strpos($ruta, "funcion") || strpos($ruta, "plug-in") || strpos($ruta, "internal")) {
    return "../";
  } else {
    return "";
  }
}
?>

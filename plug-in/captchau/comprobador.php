<?php
function comprobadorCaptchaVisual() {
  $opcionCorrecta = $_REQUEST["opcionCorrecta"]; // La opción correcta que determina el internal
  $opcion = $_REQUEST["opcion"]; // La opción que selecciona el usuario.
  //echo $opcion."<br />".$opcionCorrecta."<br />"; A modo de DEBUG
  if($opcionCorrecta == $opcion) {
    return TRUE;
  } else {return FALSE;}
}
?>

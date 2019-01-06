<?php
function isLogIn() {
    if( (isset($_COOKIE["emailCookie"])) && (isset($_COOKIE["contrasenaCookie"])) && file_exists(locacion()."user/".$_COOKIE["emailCookie"]) ) {
      // Si están seteadas las cookies, el usuario logueó y se importan sus archivos de configuración
      // Por las dudas, se revisa que el usuario sea válido. Sin esta comprobación se podrían inyectar usuarios falsos mediante cookies
      return TRUE;
      } else {return FALSE;}
} // Cierre de función
?>

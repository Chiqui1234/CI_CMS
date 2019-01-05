<?php
if(isset($_COOKIE["emailCookie"]) && isset($_COOKIE["contrasenaCookie"])) {
    $userRoute = locacion()."user/".strip_tags(htmlspecialchars($_COOKIE["emailCookie"]));
    include_once($userRoute."/credenciales.php");
    include_once($userRoute."/opciones-de-perfil.php");
    include_once($userRoute."/configuracion.php");
}
?>
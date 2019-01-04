<?php

$rutaUsuario = locacion()."user/".strip_tags(htmlspecialchars($_COOKIE["emailCookie"]));
include_once($rutaUsuario."/credenciales.php");
include_once($rutaUsuario."/opciones-de-perfil.php");
include_once($rutaUsuario."/configuracion.php");

?>